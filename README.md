# Livraria Online com PHP

## Projeto realizado para obter proficiência na matéria de Linguagens de Programação na faculdade FATEC - JAÚ

### 🛠 Tecnologias

As seguintes ferramentas foram usadas na construção do projeto:

- [PHP 7](https://www.php.net/)
- [MySql](https://www.mysql.com/)
- [framework CSS : Milligram](https://milligram.io/)


##### Execute os scripts SQL a seguir para criar as tabelas do banco de dados e usuários para teste:

```
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
```

##### Configurando o acesso ao banco através do PHP

Em bd/db.php você irá encontrar o seguinte código:
```
function connect()
{
    try {
        return new PDO('mysql:host=localhost;dbname=livraria', 'root', '');
    } catch (PDOException $e) {
        return "Error!: " . $e->getMessage() . "<br/>";
        die();
    }
}
```

Preencha da seguinte maneira:

```
function connect()
{
    try {
        return new PDO('mysql:host=localhost;dbname=livraria', 'usuario_banco', 'senha_banco');
    } catch (PDOException $e) {
        return "Error!: " . $e->getMessage() . "<br/>";
        die();
    }
}
```

