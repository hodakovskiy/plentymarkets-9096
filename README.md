# plentymarkets-9096

git clone https://github.com/hodakovskiy/plentymarkets-9096.git
cd plentymarkets-9096
composer install

edit file .env.local

docker-compose build --pull --no-cache
docker-compose up

php bin/console doctrine:database:create
php bin/console make:migration
php bin/console doctrine:migrations:migrate

php -S localhost:8002 -t 
