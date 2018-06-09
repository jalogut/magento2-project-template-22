<?php

namespace Deployer;

require 'recipe/magento_2_2.php';

// Use timestamp for release name
set('release_name', function () {
    return date('YmdHis');
});

// Magento dir into the project root. Set "." if magento is installed on project root
set('magento_dir', 'magento');
// [Optional] Git repository. Only needed if not using build + artifact strategy
set('repository', 'https://github.com/jalogut/magento2-project-template-2.2.git');

// Space separated list of languages for static-content:deploy
set('languages', 'en_US de_CH fr_FR');

// OPcache configuration
task('cache:clear:opcache', 'sudo /usr/sbin/service php7.1-fpm reload');
after('cache:clear', 'cache:clear:opcache');

// Build host
localhost('build');

// Remote Servers
host('dev_master')
    ->hostname('<dev_hostname>')
    ->user('<dev_user>')
    ->set('deploy_path', '~')
    ->stage('dev')
    ->roles('master');

host('prod_master')
    ->hostname('<prod_hostname>')
    ->user('<prod_user>')
    ->set('deploy_path', '~')
    ->stage('prod')
    ->roles('master');
