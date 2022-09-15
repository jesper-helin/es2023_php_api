- Make sure you have [composer](https://getcomposer.org/) installed
- Clone this repository
- Start up Apache and Mysql in [Xampp](https://www.apachefriends.org/)
- Create a new database inside phpmyadmin named concerts
- Import concerts.sql from database-directory
- Copy .env.example file and rename it to .env
- Change database-settings to the correct ones inside .env
- Run the next commands in a terminal:
```
composer i
php artisan serve
```
- The api is reachable at http://localhost:8000/api/v1/
