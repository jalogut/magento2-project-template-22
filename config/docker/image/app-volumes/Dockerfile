FROM alpine:latest

RUN mkdir -p /var/www/html/magento/vendor \
    /var/www/html/magento/generated \
    /var/www/html/magento/var \
    /var/www/html/magento/pub/static \
    /var/www/html/magento/pub/media

RUN chown -R 1000:1000 /var/www/html/vendor \
    /var/www/html/magento/vendor \
    /var/www/html/magento/generated \
    /var/www/html/magento/var \
    /var/www/html/magento/pub/static \
    /var/www/html/magento/pub/media