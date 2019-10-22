# MindGeek test

Application based on Laravel 6.2 framework

#### Prerequisites:

PHP 7.2+

#### Installation with Composer:
###### *you need to have the latest composer version installed

#### Clone the project files
```bash
git clone git@github.com:OctavianLelescu/TestMindGeek.git
```

#### Go to folder mindgeek and update application packages and dependencies
```bash
cd TestMindGeek/
cd mindgeek/
composer install
```
--> Change the file **.env.example** to **.env**

#### Add the cripting key for laravel
```bash
php artisan key:generate
```

#### Need to link the storage disk to be able to save images from json file
```bash
php artisan storage:link
```

#### This command will start a development server at http://localhost:8000
```bash
php artisan serve
```
###### *let this terminal window run during testing application on browser

##### Unit tests can be run using the command
```bash
./vendor/bin/phpunit
```
