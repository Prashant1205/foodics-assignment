composer:
	composer install
tables:
	php artisan migrate
test:
	php artisan test
app-serve:
	php artisan serve
seed:
	php artisan db:seed

.PHONY: tables seed composer test app-serve
