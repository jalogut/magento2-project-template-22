# Magento 2 Project template for versions >=2.2

# Installation

There are 2 installation options. Just use the one you prefer:

* Local installation
* Docker installation

## Local Installation

0. Clone repository and run composer install

	```
	git clone https://github.com/jalogut/magento2-project-template-22.git magento2-template
	cd magento2-template
	composer install
	```

0. Execute [mg2-builder](https://github.com/staempfli/magento2-builder-tool) task to setup a new project:

    ```
    bin/mg2-builder install
    ```

0. Set the new host:
	* `sudo vim /etc/hosts`
	* add `127.0.0.1 magento2-template.lo`

0. Restart Apache/Nginx

### Frontend

* [Frontend Documentation](docs/local-install/frontend.md)

## Docker Installation

1. Configure your docker `File Sharing` settings

	![File Sharing Configuration](docs/docker-install/img/file_sharing.png)
	
	NOTE: You do not need to have `Composer` installed. You only need to create a `.composer` folder in your computer, so it can be used by containers to cache composer dependencies instead of downloading them every time.

2. Install [magento2-dockergento-console](https://github.com/ModestCoders/magento2-dockergento-console) in your pc.

3. Execute

	```
	git clone https://github.com/jalogut/magento2-project-template-22.git magento2-docker
	cd magento2-docker
	dockergento start
	dockergento composer install
	dockergento exec bin/mg2-builder install
	sudo vim /etc/hosts
	// Add -> 127.0.0.1 magento2-docker.lo
	```

Eh voila! -> [http://magento2-docker.lo/](http://magento2-docker.lo/)

### Workflow

See detailed documentation about development workflow with dockergento

* `magento2-dockergento-console` > [Development Workflow](https://github.com/ModestCoders/magento2-dockergento-console/blob/master/docs/workflow.md)

## Resources and tools used for this setup

### Proper Magento 2 Composer Setup

* [https://dev.to/jalogut/proper-magento-2-composer-setup-40dm](https://dev.to/jalogut/proper-magento-2-composer-setup-40dm)

### Magento 2 Builder Tool

* [https://github.com/staempfli/magento2-builder-tool](https://github.com/staempfli/magento2-builder-tool)

### Magento 2 Deployer Plus

* [https://github.com/jalogut/magento2-deployer-plus](https://github.com/jalogut/magento2-deployer-plus)

### Magento 2 Dockergento

* [https://github.com/ModestCoders/magento2-dockergento](https://github.com/ModestCoders/magento2-dockergento)
