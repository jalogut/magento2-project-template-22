# Magento 2 Project template for versions >=2.2

## Docker installation

```
docker-compose up app
docker-compose exec phpfpm composer install
docker-compose exec phpfpm bin/mg2-builder install
sudo vim /etc/hosts
// Add -> 127.0.0.1 magento2-docker.lo
```

Eh voila! -> [http://magento2-docker.lo/](http://magento2-docker.lo/)

### Sync vendor and generated

There are 2 options to sync the volumes `vendor` and `generated`

#### Option 1: One time sync

This option must be used most of the times. You should only need to sync `vendor` and `generated` from time to time for debugging purposes

```
docker-compose exec sync "sync -path <path_to_sync>"
```

**NOTE:** `<path_to_sync>` should be `vendor` or `generated`. For faster and more specific syncs, you can include the subfolder path inside `vendor` like `sync -path vendor/<company_name>`.

#### Option 2: Watch

This option is only recommended if you are implementing code in a vendor module.

```
docker-compose exec sync "watch -path <path_to_sync>"
```

Example: `docker-compose exec sync "watch -path vendor/<company_name>/<module_name>"`

### Frontend

0. Start node container

	```
	docker-compose up node
	```

0. NPM config setup (Only first time)

	```
	docker-compose exec node bash
	cd magento && cp package.json.sample package.json && cp Gruntfile.js.sample Gruntfile.js
	npm install
	```

0. Grunt watch

	```
	docker-compose exec node bash
	grunt exec:<theme>
	grunt watch
	```

## Setup using following resources:

### Proper Magento 2 Composer Setup

* [https://dev.to/jalogut/proper-magento-2-composer-setup-40dm](https://dev.to/jalogut/proper-magento-2-composer-setup-40dm)

### Magento 2 Builder Tool

* [https://github.com/staempfli/magento2-builder-tool](https://github.com/staempfli/magento2-builder-tool)

### Magento 2 Deployer Plus

* [https://github.com/jalogut/magento2-deployer-plus](https://github.com/jalogut/magento2-deployer-plus)