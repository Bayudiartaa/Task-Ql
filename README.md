## What Inside?

- Laravel ^8.x - [Laravel Docs](https://laravel.com/docs/8.x/)
- Laravel/Ui - [Laravel Ui](https://github.com/laravel/ui)
- Stisla Admin Template ^2.2.0 - [Stisla](https://getstisla.com/)

## How To Use This?

Download or clone this repo
```shell
$ git clone https://github.com/Bayudiartaa/Task-Ql.git
```

Install all dependency required by laravel.
```shell
$ composer install
```

Generate app key, configure `.env` file and do migration.
```shell
# create copy of .env
$ cp .env.example .env

# create laravel key
$ php artisan key:generate

# run migration
$ php artisan migrate

# run seeders
$ php artisan db:seed

# create storage links
$ php artisan storage:link

# run npm auth
$ npm install 
```

## Screenshot
![Alt text](public/assets/img/ss.png?raw=true "Title")

## Fitur On Going

```
Setting Profile users
Change Password Users
Switch DB Mysql To Postgresql
```
