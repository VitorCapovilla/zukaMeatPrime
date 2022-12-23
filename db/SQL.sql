CREATE DATABASE bd_meatprime;

CREATE TABLE CATEGORIAS(
    codigo int(6) primary key AUTO_INCREMENT,
    titulo varchar(50) not null,
    autor int(6),
    datahora date
);

CREATE TABLE PRODUTOS(
    codigo int(6) primary key AUTO_INCREMENT,
    titulo varchar(100) not null,
    categoria int(6),
    imagem varchar(50),
    descricao varchar(50),
    peso varchar(50),
    preco varchar(50),
    autor int(6),
    datahora date
);

CREATE TABLE VIDEOS(
    codigo int(6) primary key AUTO_INCREMENT,
    titulo varchar(50) not null,
    video varchar(50),
    descricao varchar (100),
    autor int(6),
    datahora date
);

CREATE TABLE CLIENTE(
    codigo int(6) primary key AUTO_INCREMENT,
    nome varchar(25) not null,
    sobrenome varchar(25),
    datanascimento varchar(10),
    cpf varchar(25),
    telefone varchar (25),
    email varchar (50),
    senha varchar (50),
    endereco int(6)
)

CREATE TABLE CARROSSEL(
    codigo int(6) primary key AUTO_INCREMENT,
    imagem varchar (25) not null,
    autor int(6),
    datahora date
)

CREATE TABLE ADMINISTRADORES(
    codigo int (6) primary key AUTO_INCREMENT,
    nome varchar (25) not null,
    email varchar (25),
    cpf varchar (25),
    nascimento date,
    nivel varchar (25),
    salario varchar (25)
)