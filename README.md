## How to install App

This app is made in Laravel and VueJS 
for database yiu've two options 
1- you can add sample.db as sqlite and write it's path to .env 
2- create mysql database and add it's credentials in .env and run php artisan migrate --seed

#### for backend 
- php artisan key:generate
- for MySQL php artisan migrate --seed
- php artisan serve

#### for frontend 
 - npm install
 - npm run dev 

and now you can open served URL [http://localhost:8000](http://localhost:8000/#)


## Code instructions
- route in api.php
- controller ClientController.php 
- ClientService.php that contains buisniess logic and queries and applied filters 
- Fiters classes is under Folder App/Filters (Country - Phone)
- model Client.php contains appened data to resources and constants we used in app and validation 
    like countries with codes and also regex for each and accessories for appended data to resource like getCountryCodeAttribute, getPhoneStateAttribute
- unit test for service layer under tests/unit/ClientServiceTest.php 


## Resources 
- appending data to resources in model [https://laravel.com/docs/8.x/eloquent-serialization#appending-values-to-json](https://laravel.com/docs/8.x/eloquent-serialization#appending-values-to-json)
- applying filters [Filters article](https://dev.to/mohammadfouladgar/laravel-making-filter-for-model-with-checking-authorization-filter-2af)
