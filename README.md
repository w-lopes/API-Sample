### Run

touch database/database.db

mv .env.example .env

php artisan migrate

php artisan db:seed --class=UserSeeder

php artisan serve

### Requests

Inside ''POSTMAN'' path.
