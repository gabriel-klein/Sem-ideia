.PHONY: up down mysql_bash app_bash migrate

up: 
	cd laradock && \
	docker-compose up -d nginx mysql
	
install:
	cd laradock && \
	docker-compose up -d nginx mysql
	cd laradock && \
	docker-compose exec workspace bash -c "\
		composer install && \
		php artisan migrate:install && \
		php artisan migrate \
	"

migrate: 
	cd laradock && \
	docker-compose run --rm workspace php artisan migrate

down: 
	cd laradock && \
	docker-compose down

mysql_bash: 
	cd laradock && \
	docker-compose exec mysql bash

app_bash: 
	cd laradock && \
	docker-compose exec workspace bash