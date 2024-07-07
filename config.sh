#!/bin/bash

echo "##### Inicializa os Containers ######"
docker-compose up -d --build

echo "##### Copia o .env #####"
docker exec jefffrade-gran-backend-php-fpm cp .env.example .env

echo "##### Remove a vendor #####"
docker exec jefffrade-gran-backend-php-fpm rm -rf vendor

echo "##### Instala os Pacotes da Aplicação #####"
docker exec jefffrade-gran-backend-php-fpm composer install

echo "##### Gera a Chave da Aplicação #####"
docker exec jefffrade-gran-backend-php-fpm php artisan key:generate

echo "##### Cria as Tabelas e Popula o Banco de Dados #####"
docker exec jefffrade-gran-backend-php-fpm php artisan migrate:fresh --seed

echo "##### Gera as chaves do JWT #####"
docker exec jefffrade-gran-backend-php-fpm php artisan jwt:secret
