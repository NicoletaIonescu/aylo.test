FROM nginx:1.15.10-alpine

ADD ./docker/nginx/aylo.test.conf /etc/nginx/conf.d/default.conf

RUN ln -sf /dev/stdout /var/log/nginx/access.log && ln -sf /dev/stderr /var/log/nginx/error.log

WORKDIR /var/www
