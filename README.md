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

### Frontend

1. NPM config setup (Only first time)

	```
	docker-compose exec nodejsphp bash
	cd magento && cp package.json.sample package.json && cp 	Gruntfile.js.sample Gruntfile.js
	npm install
	```

2. Grunt watch

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