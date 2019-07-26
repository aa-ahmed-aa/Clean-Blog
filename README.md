# Clean Blog Using Laravel and Vuejs

A Clean Code Designed Blog 

## Architecture

The Architecture we followed to design the application

```
	\App\Models
```
Models Used in Application


```
	\App\Contracts
```
Interfaces Used in Application Contains any app contract in this simple example the database contract (Repository Interface)


```
	\App\Repositories
```
Repositories and Repository Base Class to handle interaction with database instead of using regular ORM that laravel introduce.

```
	\App\Managers
```
Manager Classes to handel Application Logic


```
	\App\Traits
```
Traits created and used in Application

## Technology
- Laravel 5.8
- Vue js

## Installation 
- Run `cp .env.example .env` and edit `.env` file with your db configurations
- Run `composer install`
- Run `php artisan key:generate`
- Run `php artisan migrate --seed`
- Run `php artisan serve`

## Routes 
> /admin/home 
> /