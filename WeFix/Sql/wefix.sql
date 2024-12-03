create database wefix;

create table wefix(linha varchar(100), 
sentido varchar(100), 
horario varchar(100),
 passageiros int);

create table man( 
id int primary key,
tipo varchar (12),
datahora varchar(100),
num int,
responsavel varchar(100));