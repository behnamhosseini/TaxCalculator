### How To install
```
composer install
php artisan sail:install - (select 0,1)
./vendor/bin/sail up
./vendor/bin/sail artisan migrate:fresh --seed
```

### for change TaxRepository database
```
Change the `initial` value in the database config file

```