.SILENT:

##
## Prod
## -----
##

## TODO Ansible stuff

update: ## Update project
	./scripts/linux/update_version.sh
	make back-db-schema-update
	docker-compose exec php composer install
	docker-compose exec php bin/console c:c
	docker-compose exec client yarn

setup: ## Setup the project
	docker-compose exec php bin/console doctrine:schema:update --force --no-interaction

##
## Dev
## -----
##

install: ## Install project
	# Download the latest versions of the pre-built images.
	docker-compose pull
	# Rebuild images.
	docker-compose up --build -d
	# Update version.
	#./scripts/linux/update_version.sh

start: ## Start project
	# Running in detached mode.
	docker-compose up -d --remove-orphans --no-recreate

stop: ## Stop project
	docker-compose stop

checkout: ## Git checkout helper
	docker container stop family_cooking_client_1
	docker-compose exec php composer install
	make back-db-schema-update
	make back-db-reset
	docker-compose exec php rm -rf var/cache
	docker container start family_cooking_client_1

logs: ## Show logs
	# Follow the logs.
	docker-compose logs -f

reset: ## Reset all (use it with precaution!)
	make uninstall
	make install

uninstall:
	make stop
	# Kill containers.
	docker-compose kill
	# Remove containers.
	docker-compose down --volumes --remove-orphans
	./scripts/linux/uninstall.sh

##
## Backend specific
## -----
##

back-ssh: ## Connect to the container in ssh
	docker exec -it family_cooking_php_1 sh

back-db-test: ## Update database schema
	docker-compose exec php bin/console doctrine:database:create --env=test
	docker-compose exec php bin/console doctrine:schema:update --dump-sql --force --env=test

back-db-schema-update: ## Update database schema
	docker-compose exec php bin/console doctrine:schema:update --dump-sql --force

back-db-reset: ## Reset the database with alice fixtures data
	docker-compose exec php bin/console hautelook:fixtures:load -n --purge-with-truncate

back-rm-cache: ## Clear cache
	docker-compose exec php bin/console cache:clear

##
## Frontend specific
## -----
##

front-ssh: ## Connect to the container in ssh
	docker exec -it family_cooking_client_1 sh

front-lint: ## Run lint
	docker-compose exec client yarn lint --fix

##
## Tests & CI
## -----
##

test: ## Run all tests
	make cs
	make phpunit
	make stan
	#docker-compose exec client yarn lint

cs: ## Run php cs fixer
	docker-compose exec php ./vendor/friendsofphp/php-cs-fixer/php-cs-fixer fix --dry-run --stop-on-violation --diff

cs-fix: ## Run php cs fixer and fix errors
	docker-compose exec php ./vendor/friendsofphp/php-cs-fixer/php-cs-fixer fix

phpunit: ## Run PHPUnit
	docker-compose exec php bin/phpunit

stan: ## Run php stan
	docker-compose exec php ./vendor/phpstan/phpstan/bin/phpstan analyse -c phpstan.neon src --level 6

.DEFAULT_GOAL := help
help:
	@grep -E '(^[a-zA-Z_-]+:.*?##.*$$)|(^##)' $(MAKEFILE_LIST) | awk 'BEGIN {FS = ":.*?## "}; {printf "\033[32m%-30s\033[0m %s\n", $$1, $$2}' | sed -e 's/\[32m##/[33m/'
.PHONY: help
