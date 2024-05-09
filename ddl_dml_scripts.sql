--DDL [Data Defintion Language]
-- -CREATE
-- -ALTER
-- -DROP
-- -Truncate
-- -Rename

CREATE database cms;
show tables;

select now();

INSERT INTO cms.customer (name,email,city,age,dob)
	VALUES ('31232','1232132','123213',123123,'2024-05-09');

create table Customer4 (
	custId int  auto_increment primary key,
	name varchar(100) not null,
	email varchar(100) not null,
	city varchar(50),
	age int,
	dob date
);

-- drop table customer4;

alter table customer add column country varchar(20);
alter table customer change column name  first_name varchar(100);
alter table customer drop column age;

truncate table customer; 


rename table cust to customer;


-- create table Customer1 (
-- 	custId int primary key,
-- 	name varchar(100) not null,
-- 	email varchar(100) not null,
-- 	city varchar(50),
-- 	age int,
-- 	dob date
-- );
-- 
-- create table Customer2 (
-- 	custId int,
-- 	name varchar(100) not null,
-- 	email varchar(100) not null,
-- 	city varchar(50),
-- 	age int,
-- 	dob date,
-- 	primary key(custId)
-- );



-- DML [data manipulation language]
-- select 
-- insert 
-- update
-- delete

`custId` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `city` varchar(50) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `country` varchar(20) DEFAULT NULL,
  
  alter table customer modify column city varchar(50) not null;
  
  select * from customer;
 
 insert into customer(first_name, email, city)
 values
 ("Sara","Sara@gmail.com", "Hyderabad"),
 ("Sara1","Sara@gmail.com", "Hyderabad"),
 ("Sara2","Sara@gmail.com", "Hyderabad"),
 ("Sara3","Sara@gmail.com", "Hyderabad")
 
 delete from customer where city = "Hyderabad" and country  = "india";

update customer set dob = now(), city  = "Lahore" where custId = 10;




