up:
	docker-compose up -d

down:
	docker-compose down

test:
	docker-compose exec backend-php-fpm vendor/bin/phpunit --colors=always

bash:
	docker-compose exec backend-php-fpm bash
ci:
	docker-compose exec backend-php-fpm composer install

frontend-bash:
	docker-compose exec frontend-nodejs bash
frontend-install:
	docker-compose exec frontend-nodejs npm install

frontend-build:
	docker-compose exec frontend-nodejs npm run build

frontend-watch:
	docker-compose exec frontend-nodejs npm run watch