insert into categories (name) values ('Доски и лыжи'), ('Крепления'), ('Ботинки'), ('Одежда'), ('Инструменты'), ('Разное');

insert into users set reg_at = now(), email = "useruser@user.com", password = "12345", contact = "+7 900 000 00 00";
insert into users set reg_at = now(), email = "testtest@user.com", password = "qwerty", contact = "+7 900 000 00 01";
-- создали двух новых пользователей

insert into items set created_at = now(), name = "2014 Rossignol District Snowboard", description = "Легкий маневренный сноуборд...", picture = "img/lot-1.jpg", initial_price = "10999", sale_end = CURDATE() + 5, bid_step = "100", users_id = "1", categories_id = "1";
insert into items set created_at = now(), name = "DC Ply Mens 2016/2017 Snowboard", description = "Легкий маневренный сноуборд...", picture = "img/lot-2.jpg", initial_price = "159999", sale_end = CURDATE() + 5, bid_step = "1000", users_id = "1", categories_id = "1";
insert into items set created_at = now(), name = "Крепления Union Contact Pro 2015 года размер L/XL", description = "Крепление для...", picture = "img/lot-3.jpg", initial_price = "8000", sale_end = CURDATE() + 5, bid_step = "100", users_id = "1", categories_id = "2";
insert into items set created_at = now(), name = "Ботинки для сноуборда DC Mutiny Charocal", description = "Ботинки для...", picture = "img/lot-4.jpg", initial_price = "10999", sale_end = CURDATE() + 5, bid_step = "100", users_id = "2", categories_id = "3";
insert into items set created_at = now(), name = "Куртка для сноуборда DC Mutiny Charocal", description = "Куртка для...", picture = "img/lot-5.jpg", initial_price = "7500", sale_end = CURDATE() + 5, bid_step = "500", users_id = "2", categories_id = "4";
insert into items set created_at = now(), name = "Маска Oakley Canopy", description = "Маска для...", picture = "img/lot-6.jpg", initial_price = "5400", sale_end = CURDATE() + 5, bid_step = "100", users_id = "2", categories_id = "6";

insert into bid set bid_date = now(), amount = "8100", users_id = "1", items_id = "3";
insert into bid set bid_date = now(), amount = "8200", users_id = "2", items_id = "3";

SELECT * FROM categories;
-- получить все категории

SELECT items.name, categories.name AS category_name, items.initial_price, items.picture FROM items 
JOIN categories ON items.categories_id = categories.id
WHERE CURDATE() < sale_end;
-- получить самые новые, открытые лоты. Каждый лот должен включать название, стартовую цену, ссылку на изображение, цену, название категории

SELECT items.name, categories.name AS category_name FROM items 
JOIN categories ON items.categories_id = categories.id
WHERE items.id = "4";
-- показать лот по его id. Получите также название категории, к которой принадлежит лот

UPDATE items SET name = "сноубордные ботинки" WHERE id = "4";
-- обновить название лота по его идентификатору

SELECT name, initial_price, picture FROM items ORDER BY id DESC LIMIT 3;
-- получить список самых свежих лотов по его идентификатору 3 последние


