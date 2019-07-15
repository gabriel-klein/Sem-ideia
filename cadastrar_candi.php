<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	// Nome
	if (empty($_POST["nome"])){
		$erro = $nome_r = "true";
		$nome_erro = "O Nome é necessário";
	}
	else{
		$nome = normalizar($_POST["nome"]);
		if (!preg_match("/^[a-zA-ZãÃâÂÊêíÍ ]*$/", $nome)) {
			$erro = $nome_r = "true";
			$nome_erro = "É permitido somente letras e espaços";
		}
	}
	// Email
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
	// Telefone 1
	if (empty($_POST["tel"])){
		$erro = $tel1_r = "true";
		$tel1_erro = "O telefone é necessário";
	}
	else {
		$tel1 = normalizar($_POST["tel"]);
	}
	// Telefone 2
	if (!empty($_POST["tel2"])){
		$tel2 = normalizar($_POST["tel2"]);
	}
	else{
		$tel2 = NULL;
	}
	// Escolaridade 
	if (empty($_POST["ensino"])){
		$erro = $esc_r = "true";
		$esc_erro = "A escolaridade é necessária";
	}
	else {
		$esc = normalizar($_POST["ensino"]);
	}
	// Excel 
	if (!empty($_POST["excel"])){
		$excel = normalizar($_POST["excel"]);
	}
        else
        {
            $excel="NULL";
        }
	// Word 
	if (!empty($_POST["word"])) {
		$word = normalizar($_POST["word"]);
	}
        else
        {
            $word="NULL";
        }
	// Ingles
	if (!empty($_POST["ingles"])){
		$ingles = normalizar($_POST["ingles"]);
	}
        else
        {
            $ingles="NULL";
        }
	// Turno
	if (!empty($_POST["horario"])){
		$turno = normalizar($_POST["horario"]);
	}
        else
        {
            $turno="NULL";
        }
	//Trabalhos anteriores
	if (!empty($_POST["trab"])){
		if (empty($_POST["operador"])){
			$operador = "NULL";
		}
		else{
			$operador = normalizar($_POST["operador"]);
		}
		if (empty($_POST["aulixiar"])){
			$auxiliar = "NULL";
		}
		else{
			$auxiliar = normalizar($_POST["aulixiar"]);
		}
		if (empty($_POST["vendedor"])){
			$vendedor = "NULL";
		}
		else{
			$vendedor = normalizar($_POST["vendedor"]);
		}
		if (empty($_POST["coordenador"])){
			$coordenador = "NULL";
		}
		else{
			$coordenador = normalizar($_POST["coordenador"]);
		}
		if (empty($_POST["vigia"])){
			$vigia = "NULL";
		}
		else{
			$vigia = normalizar($_POST["vigia"]);
		}
		if (empty($_POST["estoquista"])){
			$estoquista = "NULL";
		}
		else{
			$estoquista = normalizar($_POST["estoquista"]);
		}
		if (empty($_POST["baba"])){
			$baba = "NULL";
		}
		else{
			$baba = normalizar($_POST["baba"]);
		}
		if (empty($_POST["cozinheiro"])){
			$cozinheiro = "NULL";
		}
		else{
			$cozinheiro = normalizar($_POST["cozinheiro"]);
		}
                if (empty($_POST["garçom"])){
			$garçom = "NULL";
		}
		else{
			$garçom = normalizar($_POST["garçom"]);
		}
		if (empty($_POST["atendente"])){
			$atendente = "NULL";
		}
		else{
			$atendente = normalizar($_POST["atendente"]);
		}
		if (empty($_POST["frentista"])){
			$frentista = "NULL";
		}
		else{
			$frentista = normalizar($_POST["frentista"]);
		}
		if (empty($_POST["outra"])){
			$outra = "NULL";
		}
		else {
			$outra = normalizar($_POST["outra"]);
		}
	}
	else{
		$estoquista = $vendedor = $operador = $outra = $frentista = $atendente = $cozinheiro = $baba = $estoquista = $vigia = $coordenador = $auxiliar = $garçom = NULL;
	}
	if (empty($_POST["jovem"])){
		$jovem = "NULL";
	}
	else {
		$jovem = normalizar($_POST["jovem"]);
	}
	// Query
	if (!isset($erro)){
		$query = "INSERT INTO candidato VALUES ('$nome', '$email', '$tel1', '$tel2', '$esc', '$excel', '$word', '$ingles', '$turno', '$operador', '$auxiliar', '$vendedor', '$coordenador', '$vigia', '$estoquista', '$baba', '$cozinheiro', '$garçom', '$atendente', '$frentista', '$outra', '$jovem')";
		if($conecao->query($query) === TRUE){
			$info = "true";
			$info_tit = "Formulário enviado com Sucesso!";
			$info_ico = "fas fa-check-circle";
			$info_text = "Seu Currículo foi salvo com sucesso!";
			$info_css = "color: #40ee40;";
		}
		else {
			$info = "true";
    		$info_tit = "Erro ao enviar o foumulário!";
			$info_ico = "fas fa-exclamation-circle";
			$info_text = "Dados já Cadastrados!";
			$info_css = "color: #DB2525;";
		}
	}
	else {
		$info = "true";
		$info_tit = "Erro ao enviar o foumulário!";
		$info_ico = "fas fa-exclamation-circle";
		$info_text = "Preencha os campos corretamente!";
		$info_css = "color: #DB2525;";
	}
}
function normalizar($var){
	$var = trim($var);
	$var = stripslashes($var);
	$var = htmlspecialchars($var);
	return $var;
}
?>
<script type="text/javascript">
	function show() {
		if (<?php echo (isset($info))? $info: "false"; ?>){
			$("#info").modal("show");
		}
	}
</script>
