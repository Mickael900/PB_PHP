create database bibloteca;
use biblioteca;

create table livros(
	ID integer auto_increment primary key,
    titulo varchar(255),
    autor varchar(255),
    ano_publicacao year,
    editora varchar(255)

);

select * from livros;
