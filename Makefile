.PHONY: build up run stop down logs ps

build:
	docker compose build

up:
	docker compose up --build

run:
	docker compose up -d

stop:
	docker compose stop

down:
	docker compose down

logs:
	docker compose logs -f

ps:
	docker compose ps