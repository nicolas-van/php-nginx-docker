
PHP Nginx Docker Image
======================

Current version uses php 7.1.0 and nginx 1.10.2. This image starts with the official php-fpm distribution and installs
nginx + [multirun](https://github.com/nicolas-van/multirun) on top of it.

Nginx is packed with a classical PHP configuration that serves files from /var/www/public and redirect all unmatched
requests to /var/www/public/index.php .
