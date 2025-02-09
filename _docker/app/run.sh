#!/bin/bash
set -e

composer install

if [ ! -f .env ]; then
  cp .env.example .env
fi

php artisan load:all

exec "$@"
