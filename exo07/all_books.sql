create database if not exists books default character set utf8 collate utf8_general_ci;
 
use books;
drop table if exists books;
 
create table if not exists books (
 id int not null auto_increment primary key,
 titre varchar(32) not null,
 auteur varchar(32) not null,
 datepub date not null,
 isarchived boolean not null default false 
);
 
insert into books (id, titre, auteur, datepub, isarchived) values
(1,'Le mirage','Martine Delaporte','2010-12-10',0),
(2,'Les oiseaux','Alex Laon','2010-05-26',0),
(3,'Les chiens','Marie Dupont','2020-01-01',0),
(5,'Les poissons','Alex Lepetit','1999-12-12',0),
(12,'les lapins','Alex Lepetit','1969-05-13',0),
(26,'zgdfg','zdfgdfg','2020-05-05',1);