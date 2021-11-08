CREATE DATABASE bd_meatprime;

CREATE TABLE categoria(
    codigo int(6) primary key AUTO_INCREMENT,
    titulo varchar(50) not null,
    autor varchar(50),
    datahora varchar(20));

CREATE TABLE produtos(
    codigo int(6) primary key AUTO_INCREMENT,
    titulo varchar(100) not null,
    categoria varchar(50),
    imagem varchar(50),
    descricao varchar(50),
    peso varchar(50),
    preco varchar(50),
    autor varchar(100),
    datahora varchar(20));

CREATE TABLE videos(
    codigo int(6) primary key AUTO_INCREMENT,
    titulo varchar(50) not null,
    video varchar(50),
    descricao varchar (100),
    autor varchar(50),
    datahora varchar(20));

CREATE TABLE cliente(
    codigo int(6) primary key AUTO_INCREMENT,
    nome varchar(25) not null,
    sobrenome varchar(25),
    datanascimento varchar(10),
    cpf varchar(25),
    telefone varchar (25),
    email varchar (50),
    senha varchar (50)
)

CREATE TABLE peso(
    codigo int(6) primary key AUTO_INCREMENT,
    peso varchar (25) not null,
    produto varchar (25)
)

CREATE TABLE carrossel(
    codigo int(6) primary key AUTO_INCREMENT,
    imagem varchar (25) not null,
    Autor varchar (50),
    Datahora varchar (20)
)

CREATE TABLE administrador(
    codigo int (6) primary key AUTO_INCREMENT,
    nome varchar (25) not null,
    email varchar (25),
    cpf varchar (25),
    nascimento varchar (25),
    cargo varchar (25),
    salario varchar (25)
)