FROM php:8.3-apache
WORKDIR /var/www/html/

COPY ./src .
COPY docker-php.conf /etc/apache2/conf-available/docker-php.conf
RUN chown -R root:www-data /var/www/html

RUN chmod 750 /var/www/html

RUN find . -type f -exec chmod 640 {} \;
RUN find . -type d -exec chmod 750 {} \;

RUN mkdir -p /var/www/html/upload && \
    chown -R www-data:www-data /var/www/html/upload && \
    chmod -R 750 /var/www/html/upload

RUN mkdir -p /var/www/html/secret && \
    chown -R www-data:www-data /var/www/html/secret && \
    chmod -R 750 /var/www/html/secret
RUN echo "{Th1s_1s_y0ur_fl4g_n1ce_try!}" > /var/www/html/secret/flag.txt
RUN chmod 644 /var/www/html/secret/flag.txt
RUN chmod 644 /var/www/html/robots.txt



