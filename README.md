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


https://www.postman.com/universal-comet-792262/workspace/plentymarkets/collection/22585496-8ea05aa8-bcc3-42a9-badd-aed94ee59b26?action=share&creator=22585496

https://www.postman.com/universal-comet-792262/workspace/plentymarkets/collection/22585496-66e7d8f5-4428-4fca-9ace-cf2edd4afe54?action=share&creator=22585496