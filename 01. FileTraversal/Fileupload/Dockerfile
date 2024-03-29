FROM php:7.3-apache
WORKDIR /var/www/html/

COPY ./src .
COPY docker-php.conf /etc/apache2/conf-available/docker-php.conf
RUN chown -R root:www-data /var/www/html

RUN chmod 750 /var/www/html

RUN find . -type f -exec chmod 640 {} \;
RUN find . -type d -exec chmod 750 {} \;

RUN echo "Congratulations. /secret.html" > /var/www/html/hidden/fakesecret.txt
RUN chmod a+r /var/www/html/hidden/fakesecret.txt

RUN chmod g+w /var/www/html/upload
RUN chmod +t -R /var/www/html/upload
RUN echo "Congratulations. I'm so proud of you my boys. You got not only flag but also my respect. " > /var/www/html/upload/secret.txt
RUN chmod +r robots.txt


