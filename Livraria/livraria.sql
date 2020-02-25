create database if not exists livraria;
use livraria;
create table if not exists usuarios(
	idUsuario integer not null primary key auto_increment,
    nome varchar(128) not null,
    email varchar(64) not null,
    senha varchar(64) not null
);

create table if not exists livros(
	idLivro integer not null primary key auto_increment,
    nome varchar(128) not null,
    autor varchar(128) not null,
    ISBN varchar(13) not null,
    paginas integer not null,
    preco decimal(18,2)
);

insert into livros(nome, autor, ISBN, paginas, preco) value('O Nome do Vento', 'Patrick Rothfuss', '1234567890123', 512, 27.90);
insert into livros(nome, autor, ISBN, paginas, preco) value('O Temor do sábio', 'Patrick Rothfuss', '1579845321559', 599, 32.29);
insert into usuarios(nome, email, senha) values('admin','admin@gmail.com', md5('admin'));
insert into usuarios(nome, email, senha) values('Bartolomeu Santiago','bartiago@gmail.com', md5('987654321'));