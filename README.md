Requirement

PHP 8.1+
Laravel V10.0+
Mysql 8
===================================================

1. Install composer, php, webserver, mysql
2. Install phpmyadmin and create new database
3. Clone the repository.
4. Run:composer install.
5. change .env db configuration.
6. run:php artisan migrate, php artisan key:generate
7. optional commands: run only if needed
	php artisan route:clear
	php artisan view:clear
	php artisan cache:clear
	php artisan config:clear
8. run php artisan storage:link(to fix image storage issues)
9 start webserver.

