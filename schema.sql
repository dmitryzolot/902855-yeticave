create database yeticave
default character set utf8
default collate utf8_general_ci;
use yeticave;

create table categories (
id int auto_increment primary key,
name char(30) not null unique
);

create table items (
id int auto_increment primary key,
created_at TIMESTAMP,
name char(50) not null,
description char(240),
picture char(200),
initial_price int,
sale_end DATETIME,
bid_step int,
users_id INT(11),
winners_id INT(11),
categories_id INT(11)
);

create table bid (
id int auto_increment primary key,
bid_date TIMESTAMP,
amount int,
users_id INT(11),
items_id INT(11)
);

create table users (
id int auto_increment primary key,
reg_at DATETIME,
email char(128) not null unique,
password char(50) not null,
profile_photo char(200),
contact char(50),
items_id INT(11),
bids_id INT(11)
);

create unique index category_name on categories(name);
create unique index user_email on users(email);
create index item_name on items(name);
create index sales_date on items(sale_end);
create index item_date on items(created_at);

