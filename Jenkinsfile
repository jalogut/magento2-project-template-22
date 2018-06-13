node {
    // Clean workspace before doing anything
    deleteDir()
    
    def hostStage
    def deployStatus

    try {
        stage ('Preparations') {
            if (BRANCH_NAME == 'develop') {
                hostStage = 'dev'
            }
            if (BRANCH_NAME == 'stage') {
                hostStage = 'stage'
            }
            if (BRANCH_NAME == 'master') {
                hostStage = 'prod'
            }
            echo "Deploy to: ${hostStage}"
        }
        stage ('Clone') {
            checkout scm
        }
        stage ('Composer') {
            sh "composer install"
        }
        stage ('Tests') {
            sh "bin/mg2-builder tests-setup:install -Dproject.name=${PROJECT_NAME} -Ddatabase.admin.username=${DATABASE_USER} -Ddatabase.admin.password=${DATABASE_PASS} -Ddatabase.user=${DATABASE_USER} -Ddatabase.password=${DATABASE_PASS} -DskipDbUserCreation"
            parallel (
                'static': {sh "bin/grumphp run"},
                'unit': { sh "magento/bin/magento dev:test:run unit" },
                'integration': { sh "magento/bin/magento dev:test:run integration" },
                failFast: true
            )
            sh "bin/mg2-builder util:db:clean -Dproject.name=${PROJECT_NAME} -Ddatabase.admin.username=${DATABASE_USER} -Ddatabase.admin.password=${DATABASE_PASS}"
        }
        stage ('Build') {
            sh "bin/dep build -vvv"
        }
        if (hostStage) {
            stage ("Deploy ${hostStage}") {
                deployStatus = 'start'
                sh "bin/dep deploy-artifact ${hostStage} -vvv"
                deployStatus = 'finish'
            }
        } else {
            stage ("Deploy Skipped") {
                echo "Branch not valid for deployment: ${BRANCH_NAME}"
            }
        }
      	stage ('Clean Up') {
            deleteDir()
        }
    } catch (err) {
        if (deployStatus == 'start') {
            stage ('Deploy Unlock') {
                sh "bin/dep deploy:unlock ${hostStage} -vvv"
            }
        }
        currentBuild.result = 'FAILED'
        throw err
    }
}