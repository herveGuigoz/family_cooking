.SILENT:

##
## Prod
## -----
##

deploy@prod: ## Deploy in production to all clients
	# Tip: use this commnand with `--limit "client_0029,client_0032"` to deploy just some clients.
	ansible-playbook -i .ansible/hosts.ini .ansible/linux/deploy.yml -K
	ansible-playbook -i .ansible/hosts.ini .ansible/linux/deploy_4padel.yml -K
	export OBJC_DISABLE_INITIALIZE_FORK_SAFETY=YES
	ansible-playbook -i .ansible/hosts.ini .ansible/windows/deploy.yml -K

update: ## Update project
	./scripts/linux/update_version.sh
	make back-db-schema-update
	docker-compose exec php composer install
	docker-compose exec php bin/console c:c
	docker-compose exec frontend yarn

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

back-db-create:
	docker-compose exec php bin/console doctrine:database:create
	docker-compose exec php bin/console doctrine:schema:create

back-db-schema-update: ## Update database schema
	docker-compose exec php bin/console doctrine:schema:update --dump-sql --force

back-db-reset: ## Reset the database with alice fixtures data
	docker-compose exec php bin/console hautelook:fixtures:load -n --purge-with-truncate

back-rm-cache: ## Clear cache
	docker-compose exec php rm -rf var/cache

##
## Frontend specific
## -----
##

front-ssh: ## Connect to the container in ssh
	docker exec -it client sh

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
