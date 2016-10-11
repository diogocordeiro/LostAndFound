<?php

//Carrega funções básicas
require("funcoes.php");

//Página de login
$pgFormLogin = "fazLogin.php";

//Variáveis do POST
$email = validarString($_POST["email"]);
$senha = validarString($_POST["senha"]);

//Checa se e-mail ou senha está em branco
if (!($email) || !($senha)){
	echo "<script language=\"javascript\">";
	echo "alert(\"Por favor, digite um e-mail e uma senha.\")";
	echo "</script>";
	//header("location: fazLogin.php");
	echo "<meta HTTP-EQUIV=\"refresh\" CONTENT=\"0; URL=http:".$pgFormLogin."\">";
	exit;
} 

//Efetua o md5 da senha
$senha = md5($senha);

//Carrega o timezone padrão
require("default_timezone.php");

//Inicia as sessions
session_start();

//Para checar as tentativas de login
if(isset($_SESSION['Lost_FoundLoginAttempts'])){
	$tentativas = $_SESSION['Lost_FoundLoginAttempts']['tentativas'];
	$difMinutos =  (strtotime(date('H:i')) - strtotime($_SESSION['Lost_FoundLoginAttempts']['ultimaAtividade']))/60;
	
	//Para depois de 5 minutos remover a session
	if($difMinutos > 5){
		unset($_SESSION['Lost_FoundLoginAttempts']);
	
	//Caso haja mais de três tentativas erradas
	} elseif($tentativas > 3){
		echo "<br>Limite de tentativas excedido!";
		exit;
	}
}

//Carrega nomes das tabelas do bd
require("nomesTabelas.php");

//Carrega o banco
require("conBd.php");

//Faz a conexão com o banco
$dbChecaLogin = BaseDados::conBdUser();

//Query para coletar o login
$sqlLogin = "SELECT * FROM `".$tabUsuarios."` WHERE `email` = ? AND `senha` = ?";

//Prepara o statement
$stmtLogin = $dbChecaLogin->prepare($sqlLogin);

//Checa erros no statement
if(!$stmtLogin){
	echo 'erros: '. $dbChecaLogin->errno .' - '. $dbChecaLogin->error;
}

//Valida os atributos
$stmtLogin->bind_param("ss", $email, $senha);

//Executa o statement
$stmtLogin->execute();

//Executa o fetch do resultado
$dados = fetch($stmtLogin);

//Se os dados foram corretos
if (count($dados) > 0) {
	
	//Para limpar a sesion, caso entre dados corretos
	if(isset($_SESSION['Lost_FoundLoginAttempts'])){
		unset($_SESSION['Lost_FoundLoginAttempts']);
	}

	$situacao = $dados[0]["situacao"]; 

 	//Checa se o usuário está ativo
	if ($situacao == 0) {
		echo "<script language=\"javascript\">";
		echo "alert(\"Sua conta esta inativa. Por favor, va na pagina de suporte.\");";
		echo "window.history.back();";
		echo "</script>";
		exit;
	}

	$id = $dados[0]["id"];
	$email = $dados[0]["email"];
	$nome = $dados[0]["nome"];
	$chave = "3a1cf8gk78ej64gf784kh89fo9";
	$ip = $_SERVER['REMOTE_ADDR'];
	$hora = time();
	$chave = md5($email . $chave . $ip . $hora);
	    
	//Constrói a session
	$_SESSION['Lost_Found'] = array("id" => $id, "nome" => $nome, "email" => $email, "situacao" => $situacao, "chave" => $chave, "hora" => $hora);

	//Direciona para página inicial restrita
	header("location: inicio.php");

//Caso o e-mail ou senha sejam inválidos
} else {	

	//Para contar as tentativas falhas de login
	if (!isset($_SESSION['Lost_FoundLoginAttempts'])){ //Caso não haja tentativas falhas anteriormente
		$_SESSION['Lost_FoundLoginAttempts'] = array("tentativas" => 1, "ultimaAtividade" => date('H:i'));
	} else {

		//Coleta a quantidade de tentativas atual
	  	$tentativas = $_SESSION['Lost_FoundLoginAttempts']['tentativas'];
	  	$tentativas++;

	  	//Atualiza a session
	  	$_SESSION['Lost_FoundLoginAttempts'] = array("tentativas" => $tentativas, "ultimaAtividade" => date('H:i'));
	  }
	
	echo "<script language=\"javascript\">";
	echo "alert(\"E-mail ou senha invalido.\");";
	echo "</script>";
	echo "<meta HTTP-EQUIV=\"refresh\" CONTENT=\"0; URL=http:".$pgFormLogin."\">";
	//header("location: fazLogin.php");
	exit;
  }

?>