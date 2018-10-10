DB_CONTAINER_NAME:=wwothlo-mysql
DBNAME:=wwothlo

migrate/init:
	mysql -u root -h localhost --protocol tcp -e "create database \`$(DBNAME)\`" -p

docker/build:
	docker-compose build

docker/start:
	docker-compose up -d

docker/logs:
	docker-compose logs

docker/stop:
	docker-compose stop

docker/clean:
	docker-compose rm

nginx/bash:
	docker-compose exec nginx bash

db/bash:
	docker-compose exec db bash

node/bash:
	docker-compose exec node bash

npm/install:
	docker-compose exec node npm install

npm/start:
	docker-compose exec node npm run watch