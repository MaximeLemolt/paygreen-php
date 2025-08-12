#!/bin/sh
set -e

# first arg is `-f` or `--some-option`
if [ "${1#-}" != "$1" ]; then
	set -- php-fpm "$@"
fi

chown -R www-data:www-data tests/Application/var

composer install --prefer-dist --no-progress --no-interaction

exec docker-php-entrypoint "$@"
