FROM alpine:latest

RUN mkdir -p /var/www/html/magento/vendor \
    /var/www/html/magento/generated \
    /var/www/html/magento/var \
    /var/www/html/magento/pub/static \
    /var/www/html/magento/pub/media \
    /var/www/html/magento/dev/tests/integration/tmp \
    && chown -R 1000:1000 /var/www/html/magento

# Keep container running until all other containers are created. This avoid issues when this container is started multiple times
CMD sleep 30