INSERT INTO category (name) VALUES ("Доски и лыжи"), ("Крепления"), ("Ботинки"), ("Одежда"), ("Инструменты"), ("Разное");

INSERT INTO user (registry, email, username, password, contact) VALUES ("2001-01-01 11:11:11", "test1@gmail.com", "user1", "123", "ВолкинСтрит, дом 1"),
																																			 ("2002-02-02 22:22:22", "test2@gmail.com", "user2", "123", "ВолкинСтрит, дом 2");

INSERT INTO lot (date_create, title, description, category_id, image_file, start_price, date_completed, step_price) 
VALUES ("2003-03-03 03:03:03", "Доски и лыжи", "2014 Rossignol District Snowboard", 1, "img/lot-1.jpg", "10999", "2013-03-13 13:13:13", "3000"),
			 ("2004-04-04 04:04:04", "Доски и лыжи", "DC Ply Mens 2016/2017 Snowboard", 2, "img/lot-2.jpg", "159999", "2014-04-14 14:14:14", "4000"),
			 ("2005-05-05 05:05:05", "Крепления", "Крепления Union Contact Pro 2015 года размер L/XL", 3, "img/lot-3.jpg", "8000", "2015-05-15 15:15:15", "5000"),
			 ("2006-06-06 06:06:06", "Ботинки", "Ботинки для сноуборда DC Mutiny Charocal", 4, "img/lot-4.jpg", "10999", "2016-06-16 16:16:16", "6000"),
			 ("2007-07-07 07:07:07", "Одежда", "Куртка для сноуборда DC Mutiny Charocal", 5, "img/lot-5.jpg", "7500", "2017-07-17 17:17:17", "7000"),
			 ("2008-08-08 08:08:08", "Разное", "Маска Oakley Canopy", 6, "img/lot-6.jpg", "5400", "2018-08-18 18:18:18", "8000");

INSERT INTO rate (date_create, amount) VALUES ("2009-09-09 09:09:09", "9000"),
																							("2010-10-10 10:10:10", "10000");




SELECT * FROM category;

SELECT MAX(date_completed) FROM lot;

SELECT * FROM lot WHERE id=(SELECT MAX(id) FROM lot);

UPDATE lot SET title = 'new name' WHERE id='8';

SELECT * FROM rate WHERE lot_id = (SELECT MAX(id) FROM rate) ORDER BY date_create DESC;