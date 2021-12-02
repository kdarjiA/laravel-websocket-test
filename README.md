## Installation
Clone the repository

    git clone git@github.com:kdarjiA/laravel-websocket-test.git

Switch to the repo folder

    cd laravel-websocket-test

Install all the dependencies using composer

    composer install

Run the database migrations (**Set the database connection in .env before migrating**)

    php artisan migrate
    php artisan db:seed
***Note*** : db:seed will create one test user with email "admin@admin.com" and password "password".
For creating new user you can you can visit this URL {host_name}/register

Run below command to install node packages

    npm install
    npm run dev     
    npm install -g laravel-echo-server
    laravel-echo-server init
    laravel-echo-server start    

Start the local development server

    php artisan serve

You can now access the server at http://localhost:8000

## Docker

To install with [Docker](https://www.docker.com), run following commands:

```
docker-compose up -d
```
Once the container have been started we need to run below command inside docker container to run seed
database

```
php artisan db:seed
