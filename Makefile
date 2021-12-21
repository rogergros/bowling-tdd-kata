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

ts-start:
	docker build -f docker/ts-kata.Dockerfile -t ts-kata:latest ./
	docker run -id --name ts-kata -v ${PWD}/src/ts:/app ts-kata:latest

ts-stop:
	docker stop $$(docker ps -a -q --filter="name=ts-kata")
	docker rm $$(docker ps -a -q --filter="name=ts-kata")

ts-bash:
	docker exec -it ts-kata /bin/bash

ts-setup:
	docker exec -it ts-kata yarn install

ts-run-tests:
	docker exec -it ts-kata yarn test

ts-run-tests-watch:
	docker exec -it ts-kata yarn test:watch