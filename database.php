<?php
/* --*--*--*--Criar Base de Dados--*--*--*-
Abrir o phpmyadmin e executar a query
Create database curriculo;
create table curriculo.candidato (
	nome varchar(255) not null,
	email varchar(255) not null,
	tel1 varchar(16) not null,
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
$conecao = mysqli_connect("localhost", "root", "", "curriculo");
if (!$conecao){
	die("Connection failed: " . mysqli_connect_error());
}

$query = "";
$erro = "false";
$tel1_erro = $email_erro = $nome_erro = "";
$tel1_r = $email_r = $nome_r = "false";
$nome = $email = $tel1 = $esc = "";
$tel2 = $excel = $word = $ingles = NULL;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (empty($_POST["nome"])){
		$erro = $nome_r = "true";
		$nome_erro = "O Nome é necessário";

	}
	else{
		$nome = normalizar($_POST["nome"]);
		if (!preg_match("/^[a-zA-Z ]*$/", $nome)) {
			$erro = $nome_r = "true";
			$nome_erro = "É permitido somente letras e espaços";
		}
	}
	if(empty($_POST["email"])){
		$erro = $email_r = "true";
		$email_erro = "O Email é necessário";
	}
	else {
		$email = normalizar($_POST["email"]);
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
			$erro = $email_r = "true";
			$email_erro = "Insira um email válido";
		}
	}
	if (empty($_POST["tel"])){
		$erro = $tel1_r = "true";
		$tel1_erro = "O telefone é necessário";
	}
	else {
		$tel1 = normalizar($_POST["tel"]);
	}
	if (empty($_POST["ensino"])){
		$erro = $tel1_r = "true";
		$tel1_erro = "A escolaridade é necessária";
	}
	else {
		$esc = $_POST["ensino"];
	}
	if ($erro == "false"){
		$query = "INSERT INTO candidato(nome, email, tel1, escolaridade) VALUES ('$nome', '$email', '$tel1', '$esc')";
		if(mysqli_query($conecao, $query)){
			echo "Enviado com sucesso";
		}
		 else {
    		echo "Error: " . $query . "<br>" . mysqli_error($conecao);
		}

	}
}
function normalizar($var){
	$var = trim($var);
	$var = stripslashes($var);
	$var = htmlspecialchars($var);
	return $var;
}
?>