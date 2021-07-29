CREATE DATABASE rodrigostore;
USE rodrigostore;

CREATE TABLE person(
	id INT PRIMARY KEY AUTO_INCREMENT,
	username VARCHAR(50),
	email VARCHAR(255),
	password_hashed VARCHAR(255),
	admin INT(1) DEFAULT 0
);

CREATE TABLE address(
	id INT PRIMARY KEY AUTO_INCREMENT,
	street VARCHAR(50),
	city VARCHAR(50),
	country VARCHAR(50),
	state VARCHAR(50),
	postal_code VARCHAR(255),
	user_id INT,
	FOREIGN KEY (user_id) REFERENCES person(id)
);

CREATE TABLE payment(
	id INT PRIMARY KEY AUTO_INCREMENT,
	amount DECIMAL(20,2),
	pay_status VARCHAR(30)
);

CREATE TABLE order_detail(
	id INT PRIMARY KEY AUTO_INCREMENT,
	total DECIMAL(20,2),
	created_at TIMESTAMP NULL DEFAULT NULL,
	shipped_at TIMESTAMP NULL DEFAULT NULL,
	payment_id INT,
	user_id INT,
	FOREIGN KEY (payment_id) REFERENCES payment(id),
	FOREIGN KEY (user_id) REFERENCES person(id)
);

CREATE TABLE product(
	id INT PRIMARY KEY AUTO_INCREMENT,
	product_name VARCHAR(50),
	description TEXT,
	price DECIMAL(20,2),
	quantity INT
);

CREATE TABLE order_item(
	id INT PRIMARY KEY AUTO_INCREMENT,
	quantity INT,
	order_id INT,
	product_id INT,
	FOREIGN KEY (order_id) REFERENCES order_detail(id),
	FOREIGN KEY (product_id) REFERENCES product(id)
);

CREATE TABLE cart(
	id INT PRIMARY KEY AUTO_INCREMENT,
	total DECIMAL(20,2),
	user_id INT,
	FOREIGN KEY (user_id) REFERENCES person(id)
);

CREATE TABLE cart_item(
	id INT PRIMARY KEY AUTO_INCREMENT,
	quantity INT,
	cart_id INT,
	product_id INT,
	FOREIGN KEY (cart_id) REFERENCES cart(id),
	FOREIGN KEY (product_id) REFERENCES product(id)
);