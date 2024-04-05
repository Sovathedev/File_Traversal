FROM php:7.3-apache
WORKDIR /var/www/html/
COPY ./anything .
COPY ./handleconfig/docker-php.conf /etc/apache2/conf-available/docker-php.conf
RUN chown -R root:www-data /var/www/html
RUN chmod 777 /var/www/html
RUN find . -type f -exec chmod 777 {} \;
RUN find . -type d -exec chmod 777 {} \;
RUN chmod g+w /var/www/html/anything/uploads
RUN chmod +t -R /var/www/html/
RUN apt update && apt install -y unzip;

