FROM markoshust/magento-php:7.1-fpm-3

USER root:root

RUN apt-get install -y procps

RUN mkdir /var/www/_conf
COPY ./_conf/environment.properties /var/www/_conf/environment.properties

USER app:app