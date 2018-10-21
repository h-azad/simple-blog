# Welcome to Simple Blog!

A Simple Blog built on **Laravel Framework 5.4**

# Features

 - Simple & Attractive Design
 - Multi Auth for Admin Login
 - Add Blog
 - Manage Blog (Edit & Delete)
 - Admin Profile Setting

## Frameworks/Libraries

-   [laravel/laravel](https://github.com/laravel/laravel) - A PHP Framework For Web Artisans
-   [summernote/summernote](https://github.com/summernote/summernote) - Super simple WYSIWYG editor


# How to setup

-   Run `composer install` in project directory
-   Run `php artisan key:generate`
-   Setting `.env` with your database configuration
[see `.env.example` for reference]
-   Run `php artisan migrate --seed` in your terminal
-   Run `php artisan storage:link` in your terminal
-   Run `php artisan serve` to serve with address `http://localhost:8000/`
-   Open in your browser with address `http://localhost:8000/`


# ToDo

-   Add Admin Role Using [spatie/laravel-permission](https://github.com/spatie/laravel-permission) - This package allows to manage user permissions and roles in a database.
-   Manage Roles From Admin Panel.
-   Email Verification For Users.
-   Set Verification Email Template From Admin Panel.
