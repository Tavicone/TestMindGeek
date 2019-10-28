# MindGeek test description
You will need to write a program that downloads all the items in https://mgtechtest.blob.core.windows.net/files/showcase.json and cache images within each asset. To make it efficient, it is desired to only call the URLs in the JSON file only once. Demonstrate, by using a framework of your choice, your software architectural skills. How you use the framework will be highly important in the evaluation.

How you display the feed and how many layers/pages you use is up to you, but please ensure that we can see the complete list and the details of every item. You will likely hitsome road blocks and errors along the way, please use your own initiative to deal with these issues, it’s part of the test.

Please ensure all code is tested before sending it back, it would be good to also see unit tests too. Ideally, alongside supplying the code base and all packages/libraries required to deploy, you will also have to supply deployment instructions too.

#### Framework

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
