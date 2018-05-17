CREATE DATABASE YetiCave CHARACTER SET 'utf8';


CREATE TABLE category (
	id INT AUTO_INCREMENT PRIMARY KEY,
	name VARCHAR(64),
	css_class VARCHAR(16) #для CSS
)
ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

CREATE TABLE lot (
	id INT AUTO_INCREMENT PRIMARY KEY,
	date_create DATETIME,
	title VARCHAR(64),
	description TEXT(1024),
	image_file VARCHAR(255),
	start_price INT(8),
	date_completed DATETIME,
	step_price INT(8),

	author_id INT(8),
	winner_id INT(8),
	category_id INT(8)	
) 
ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

CREATE TABLE rate (
	id INT AUTO_INCREMENT PRIMARY KEY,
	date_create DATETIME,
	amount INT(8),

	user_id INT(8),
	lot_id INT(8)
);

CREATE TABLE user (
	id INT AUTO_INCREMENT PRIMARY KEY,
	registry DATETIME,
	email VARCHAR(32),
	username VARCHAR(32),
	password CHAR(64),
	avatar VARCHAR(255),
	contact VARCHAR(64),

	lot_id INT(8),
	rate_id INT(8)
);


CREATE INDEX index_title ON lot(title);
CREATE FULLTEXT INDEX index_description ON lot(description);
ALTER TABLE lot ADD FOREIGN KEY (author_id) REFERENCES user(id);
ALTER TABLE lot ADD FOREIGN KEY (winner_id) REFERENCES user(id);
ALTER TABLE lot ADD FOREIGN KEY (category_id) REFERENCES category(id);

ALTER TABLE rate ADD FOREIGN KEY (user_id) REFERENCES user(id);
ALTER TABLE rate ADD FOREIGN KEY (lot_id) REFERENCES lot(id);

CREATE UNIQUE INDEX index_email ON user(email);
ALTER TABLE user ADD FOREIGN KEY (lot_id) REFERENCES lot(id);
ALTER TABLE user ADD FOREIGN KEY (rate_id) REFERENCES rate(id);