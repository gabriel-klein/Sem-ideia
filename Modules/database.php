<?php
/* --*--*--*--Criar Base de Dados--*--*--*-
Abrir o phpmyadmin e executar a query
Create database curriculo DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
create table curriculo.candidato (
	nome varchar(100) not null,
	email varchar(100) not null UNIQUE,
	tel1 varchar(16) not null UNIQUE,
	tel2 varchar (16),
	escolaridade varchar(50) not null,
	excel varchar(20),
	word varchar(20),
	ingles varchar(20),
	turno varchar(20),
	operador varchar(5),
	aulixiar varchar(5),
	vendedor varchar(5),
	coordenador varchar(5),
	vigia varchar(5),
	estoquista varchar(5),
	baba varchar(5),
	cozinheiro varchar(5),
	garçom varchar(5),
	atendente varchar(5),
	frentista varchar(5),
	outra varchar(40),
	jovem char(3),
	primary key(nome, email)
);
*/
header('Content-Type: text/html; charset=utf-8');
$conecao = new mysqli("localhost", "root", "", "curriculo");

if ($conecao->connect_error){
	die("Connection failed: " . $conecao->connect_error);
}
$conecao->set_charset("utf8");
$query = "";
