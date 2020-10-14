FROM webdevops/php-nginx-dev:7.4

COPY ./cron /etc/cron.d/everyminute

RUN docker-php-ext-install pdo pdo_mysql

WORKDIR /home/application/

