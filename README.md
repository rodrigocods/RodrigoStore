# RodrigoStore

Well... I'm studying PHP now, and I'm doing this project to guide my studies

This project is basically an e-commerce development

## Technologies Used

- php "7.2.24"
- laravel "5.8.38"
- composer
- mariadb 10.1.32 or equivalent compatible database

## Installation

Run this code on terminal to start composer and create the vendor folder:

```bash
composer install
```

### Database Model

Create a database
```sql
CREATE DATABASE rodrigostore;
```

### Laravel Configuration
Duplicate the ".env-example";
Rename to ".env";
Open ".env" with text editor;
Configure the app(Setup Database Connection for the created database(rodrigostore));
Generate the Encryptation Key
```bash
php artisan key:generate
```
