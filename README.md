# RodrigoStore

Well... I'm studying PHP now, and I'm doing this project to guide my studies

This project is basically an e-commerce development made with OOP MVC PHP

## Requirements

- php >= 8.0.9
- composer >= 2.0.13
- mariadb 10.4.20 or equivalent compatible database

## Installation

Run this code on terminal to start composer and create the vendor folder:

```bash
composer update
```

### Database Model

Execute **database_model/rodrigostore.sql** to create the database.

Execute **database_model/Insert.sql to create** the products of page.

## Using Tools

### Set ADMIN user

With admin user you can add, delete or update products.

TO set a admin user, you need to create a normal user in the login page and change the value of admin column to 1 manually in the database(default value is 0).

- admin column
    - admin   **1**
    - costumer    **0(default)**

### Adding new products

You can add new products on admin page(you have to be logged in as an admin user).

To add an image to the product, you need to put the image in the app/Content/images folder and put its name as the product id number in the database.

You can only add jpg images.

