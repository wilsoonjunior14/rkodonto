FROM ubuntu

ENV DEBIAN_FRONTEND=noninteractive

EXPOSE 80

WORKDIR /var/www/html

COPY . /var/www/html

RUN apt-get update -y

RUN apt-get install php wget zip unzip php-intl php-mysql php-simplexml php-mbstring -y 
