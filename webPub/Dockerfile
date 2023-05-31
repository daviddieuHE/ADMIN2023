FROM php:7.4-apache

RUN apt-get update && \
    apt-get install -y libzip-dev libicu-dev libonig-dev zlib1g-dev mariadb-client && \
    docker-php-ext-install mysqli pdo pdo_mysql && \
    docker-php-ext-enable mysqli && \
    a2enmod rewrite && \
    a2enmod ssl && \
    apt update -y && \
    apt install -y net-tools nano iputils-ping traceroute dnsutils links tcpdump

COPY 000-default.conf /etc/apache2/sites-available/000-default.conf
COPY b2b.conf /etc/apache2/sites-available/b2b.conf

RUN a2ensite 000-default.conf
RUN a2ensite b2b.conf

COPY ./site_vitrine /var/www/html/site_vitrine
COPY ./b2b /var/www/html/b2b

COPY fullchain.pem /etc/ssl/certs/fullchain.pem
COPY privkey.pem /etc/ssl/private/privkey.pem

RUN echo '\n<VirtualHost *:443>\n\
    ServerName b2b.l1-8.ephec-ti.be\n\
    DocumentRoot /var/www/html/b2b\n\
    SSLEngine on\n\
    SSLCertificateFile /etc/ssl/certs/fullchain.pem\n\
    SSLCertificateKeyFile /etc/ssl/private/privkey.pem\n\
    </VirtualHost>' >> /etc/apache2/sites-available/b2b.conf

CMD ["apache2ctl", "-D", "FOREGROUND"]
