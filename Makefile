RUN_ARGS := $(wordlist 2,$(words $(MAKECMDGOALS)),$(MAKECMDGOALS))
PROJECT_PATH := $(CURDIR)
PROJECT_KEY := $(notdir $(PROJECT_PATH))
PROJECT_NAME := $(shell echo $(PROJECT_KEY) | tr A-Z a-z | tr " " _)
SHARED_NETWORK := amco-net
DOCKER_COMPOSE := docker compose -p $(PROJECT_NAME)
DOCKER_EXEC := docker exec $(PROJECT_NAME)-php-1
REDIS_CLI := docker exec -it redis redis-cli
PHPUNIT := $(DOCKER_EXEC) //var/www/vendor/bin/phpunit

$(eval $(RUN_ARGS):;@:)
.PHONY: help tests
help: ## Print this help
	@grep -E '^[a-zA-Z_-]+:.*?## .*$$' $(MAKEFILE_LIST) | awk 'BEGIN {FS = ":.*?## "}; {printf "\033[36m%-20s\033[0m %s\n", $$1, $$2}'
build: prepare ## Build all containers
	$(DOCKER_COMPOSE) build
up: prepare ## Run all containers
	$(DOCKER_COMPOSE) up -d
fresh-up: up ## Run all containers for the first time
	$(DOCKER_EXEC) composer install
	$(DOCKER_EXEC) chmod 777 -R storage
down: ## Down all containers
	$(DOCKER_COMPOSE) down
shell: ## Enter shell php container
	docker exec -it $(PROJECT_NAME)-php-1 bash
exec: ## Run a command php container
	$(DOCKER_EXEC) $(RUN_ARGS) $(params)
redis: ## Enter redis-cli
	$(REDIS_CLI)
rediskeys: ## Get all redis keys
	$(REDIS_CLI) --scan --pattern '*'
redisflush: ## Delete all redis keys
	$(REDIS_CLI) FLUSHALL
prepare:
	docker network inspect $(SHARED_NETWORK) >/dev/null 2>&1 || docker network create --driver bridge $(SHARED_NETWORK)
	docker container inspect newrelicdaemon >/dev/null 2>&1 || docker run -d --network=$(SHARED_NETWORK) --name newrelicdaemon newrelic/php-daemon:latest

tests: ## Run all test
	$(PHPUNIT) || true
	make -- --tests-fix-directory-files
testsunit: ## Run unit test
	$(PHPUNIT) --testsuite=unit || true
	make -- --tests-fix-directory-files
testsintegration: ## Run integration test
	$(PHPUNIT) --testsuite=integration || true
	make -- --tests-fix-directory-files

sonarqube: tests ## Run SonarQube reports
	docker container inspect sonarqube >/dev/null 2>&1 || COMPOSE_IGNORE_ORPHANS=true docker compose -f docker-compose-common.yml -p common up -d
	(docker container logs sonarqube -f & ) | grep -q "SonarQube is up"
	docker exec -it $(PROJECT_NAME)-php-1 curl --location --request POST 'http://sonarqube:9000/api/users/change_password?login=admin&previousPassword=admin&password=123123' --header 'Authorization: Basic YWRtaW46YWRtaW4='
	docker run --rm --network=$(SHARED_NETWORK) -e SONAR_HOST_URL="http://sonarqube:9000" -v "$(PROJECT_PATH):/usr/src" 10.136.44.42:5000/sonarsource/sonar-scanner-cli:4.6 -Dsonar.projectKey=$(notdir $(PROJECT_KEY)) -X

--tests-fix-directory-files:
	sed -i 's/\/var\/www\///g' ./storage/logs/tests-coverage.xml
	sed -i 's/\/var\/www\///g' ./storage/logs/tests-unit.xml
