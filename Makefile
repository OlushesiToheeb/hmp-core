setup:
	@make build
	@make up 
	@make composer-update
build:
	docker-compose build --no-cache --force-rm
down:
	docker-compose stop
up:
	docker-compose up -d
composer-update:
	docker exec hmp-core bash -c "composer update"
data:
	docker exec hmp-core bash -c "php artisan migrate"
	docker exec hmp-core bash -c "php artisan db:seed"