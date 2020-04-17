drop schema if exists shop;
create schema shop;
use shop;

create table goods(
id bigint unsigned auto_increment primary key,
name varchar (256) unique,
price decimal (10,2),
opt_price decimal (10,2),
stock_1 bigint unsigned,
stock_2 bigint unsigned,
manufactured varchar (256)
);
