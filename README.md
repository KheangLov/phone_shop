<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 1500 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## To use this project

### Clone the project
```
git clone https://github.com/KheangLov/phone_shop.git
```
then
```
git checkout -b your_branch_name
```
then
```
cd phone_shop
```

### copy .env file from .env.example
```
cp .env.example .env
```

### Install composer dependencies
```
composer install
```

### Install node modules
```
npm install
```
or
```
yarn
```

### Compile webpack and node modules
```
npm run dev
```
or
```
yarn dev
```

## Database configuration

### Config database connection in .env file

create datebase
```
php artisan db:create
```
then
```
php artisan migrate --seed
```

Default user email => `admin@gmail.com` password => `not4you`<br />
or<br />
Change in DatabaseSeeder

**Don't forget to config mail server in .env file**

## To generate key

```
php artisan key:generate
```

## Start project

```
php artisan serve
```
127.0.0.1:8000

## Use browsersync

run
```
npm run watch
```
or
```
yarn watch
```
**Make sure to start the project first**
