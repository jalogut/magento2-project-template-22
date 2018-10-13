FROM modestcoders/php:7.1-fpm-1

USER root:root

RUN mkdir /var/www/_conf
COPY ./_conf/environment.properties /var/www/_conf/environment.properties

USER app:app