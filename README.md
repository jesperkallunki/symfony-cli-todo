## Install

Clone the repository or manually download.

Run the following command in the project root folder.

`composer install`  

Edit the .env file to set up your database and run the following commands in the project root folder.

`php bin/console doctrine:database:create`  
`php bin/console make:migration`  
`php bin/console doctrine:migrations:migrate`

## Usage

`php bin/console todo:new  `
`php bin/console todo:display  `
`php bin/console todo:complete  `
`php bin/console todo:remove`
