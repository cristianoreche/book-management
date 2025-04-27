#!/bin/bash

echo "==> Rodando setup do projeto Laravel..."

docker-compose down -v --remove-orphans

docker-compose up --build -d

echo "==> Instalando dependências PHP (composer install)..."
docker-compose exec app composer install

echo "==> Criando arquivo .env..."
cp .env.example .env

echo "==> Gerando chave da aplicação..."
docker-compose exec app php artisan key:generate

echo "==> Rodando migrations..."
docker-compose exec app php artisan migrate

echo "==> Setup completo! Acesse: http://localhost:8080"
