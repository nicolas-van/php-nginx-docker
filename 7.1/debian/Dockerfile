
FROM php:7.1.0-fpm

# nginx install
# -------------

ENV NGINX_VERSION 1.10.2-1~jessie

RUN apt-key adv --keyserver hkp://pgp.mit.edu:80 --recv-keys 573BFD6B3D8FBC641079A6ABABF5BD827BD9BF62 \
	&& echo "deb http://nginx.org/packages/debian/ jessie nginx" >> /etc/apt/sources.list \
	&& apt-get update \
	&& apt-get install --no-install-recommends --no-install-suggests -y \
						ca-certificates \
						nginx=${NGINX_VERSION} \
						nginx-module-xslt \
						nginx-module-geoip \
						nginx-module-image-filter \
						nginx-module-perl \
						nginx-module-njs \
						gettext-base \
	&& rm -rf /var/lib/apt/lists/*

# forward request and error logs to docker log collector
RUN ln -sf /dev/stdout /var/log/nginx/access.log \
	&& ln -sf /dev/stderr /var/log/nginx/error.log

    
# additional configuration
# ------------------------

# install multirun

RUN curl -OL https://github.com/nicolas-van/multirun/releases/download/0.3.0/multirun-ubuntu-0.3.0.tar.gz \
    && tar -zxvf multirun-ubuntu-0.3.0.tar.gz \
    && mv multirun /bin \
    && rm multirun-ubuntu-0.3.0.tar.gz
    
# configure folders to serve from /var/www/public

RUN rmdir /var/www/html \
    && mkdir /var/www/public \
    && chown -R www-data:www-data /var/www
    
WORKDIR /var/www

# add nginx & php-fpm configuration

COPY nginx.conf /etc/nginx/nginx.conf
COPY nginx.vh.default.conf /etc/nginx/conf.d/default.conf

EXPOSE 80 443
CMD ["multirun", "-v", "php-fpm", "nginx -g \"daemon off;\""]
