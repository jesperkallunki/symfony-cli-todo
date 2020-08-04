## Install

git clone https://github.com/Jepulisk/symfony-cli-todo.git  
composer install

## Database

Edit the .env file to set up your database.

php bin/console doctrine:database:create  
php bin/console make:migration  
php bin/console doctrine:migrations:migrate

## Commands

php bin/console todo:new  
php bin/console todo:all  
php bin/console todo:complete  
php bin/console todo:remove
