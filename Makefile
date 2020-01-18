up:
	docker-compose up -d

down:
	docker-compose down

test:
	docker-compose exec backend-php-fpm vendor/bin/phpunit --colors=always

bash:
	docker-compose exec backend-php-fpm bash
