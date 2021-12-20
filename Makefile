# PHP commands

php-start:
	docker build -f docker/php-kata.Dockerfile -t php-kata:latest ./
	docker run -id --name php-kata -v ${PWD}/src/php:/var/www/app php-kata:latest

php-stop:
	docker stop $$(docker ps -a -q --filter="name=php-kata")
	docker rm $$(docker ps -a -q --filter="name=php-kata")

php-bash:
	docker exec -it php-kata /bin/bash

php-setup:
	docker exec -it php-kata composer install

php-run-tests:
	docker exec -it php-kata vendor/bin/phpunit --colors ./

# NodeJS run tests
