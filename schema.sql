CREATE TABLE category (
	id INT AUTO_INCREMENT PRIMARY KEY,
	name VARCHAR(64)
);
CREATE INDEX index_name ON category(name);

CREATE TABLE lot (
	id INT AUTO_INCREMENT PRIMARY KEY,
	date_create DATETIME,
	title VARCHAR(64),
	description VARCHAR(255),
	image_file VARCHAR(255),
	start_price INT(8),
	date_completed DATETIME,
	step_price INT(8)
);
CREATE INDEX index_title ON lot(title);

CREATE TABLE rate (
	id INT AUTO_INCREMENT PRIMARY KEY,
	date_create DATETIME,
	amount INT(8)
);
CREATE INDEX index_amount ON rate(amount);

CREATE TABLE user (
	id INT AUTO_INCREMENT PRIMARY KEY,
	registry DATETIME,
	email VARCHAR(32),
	username VARCHAR(32),
	password CHAR(64),
	avatar VARCHAR(255),
	contact VARCHAR(64)
);
CREATE INDEX index_name ON user(name);
CREATE UNIQUE INDEX index_email ON user(email);