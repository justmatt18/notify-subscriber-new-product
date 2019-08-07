CREATE DATABASE sourcingsecret;
USE sourcingsecret;

CREATE TABLE subscriber (
	ID int AUTO_INCREMENT PRIMARY KEY,
	email varchar(100),
	category_name varchar(200),
	UNIQUE KEY unique_email (email)
);

CREATE TABLE product (
	ID int AUTO_INCREMENT PRIMARY KEY,
	product_item varchar(255),
	category_id int,
	FOREIGN KEY (category_id) REFERENCES category (ID),
	UNIQUE KEY unique_product (product_item)
);

CREATE TABLE category (
	ID int AUTO_INCREMENT PRIMARY KEY,
	category_name varchar(255) NOT NULL,
	UNIQUE KEY unique_category (category_name)
);

CREATE TABLE subscriber_category (
	ID int AUTO_INCREMENT PRIMARY KEY,
	subscriber_id int,
	category_id int,
	FOREIGN KEY (subscriber_id) REFERENCES subscriber (ID),
	FOREIGN KEY (category_id) REFERENCES category (ID)
)

# LOGIC 
1. insert new product 
2. get the product's category 
3. get all subscribers for that category 
3.1 Loop subscribers + notify new product_name 
if done : 
 update table -> subscribers_category -> notify_subscribers from 0 to 1;

