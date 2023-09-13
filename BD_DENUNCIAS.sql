create database Denuncias;

use Denuncias;

create table Report (
id_report int primary key not null auto_increment,
meu_usuario varchar(30) not null,
denunciado_usuario varchar(30) not null,
jogo varchar (30) not null,
tipo varchar(50) not null,
explicacao text not null
);

drop table Report;

select * from Report;

Delete from Report where id_report = 6;