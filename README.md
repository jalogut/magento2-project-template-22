# Magento 2 Project template for versions >=2.2

## Docker installation

```
docker-compose up app
docker-compose exec phpfpm composer install
docker-compose exec phpfpm bin/mg2-builder install
sudo vim /etc/hosts
// 127.0.0.1 magento2-docker.lo
```

### Temporal workaround for nginx.conf

```
docker-compose exec -u root app bash
apt-get update && apt-get install -y nano
nano /etc/nginx/conf.d/default.conf
// set $MAGE_ROOT /var/www/html/magento
Stop container
docker-compose up app
```

Eh voila! -> [http://magento2-docker.lo/](http://magento2-docker.lo/)


## Setup using following resources:

### Proper Magento 2 Composer Setup

* [https://dev.to/jalogut/proper-magento-2-composer-setup-40dm](https://dev.to/jalogut/proper-magento-2-composer-setup-40dm)

### Magento 2 Builder Tool

* [https://github.com/staempfli/magento2-builder-tool](https://github.com/staempfli/magento2-builder-tool)

### Magento 2 Deployer Plus

* [https://github.com/jalogut/magento2-deployer-plus](https://github.com/jalogut/magento2-deployer-plus)