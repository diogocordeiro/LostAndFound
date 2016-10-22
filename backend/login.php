<?php

if (isset($_POST["email"]) && isset($_POST["senha"])) {

	//Carrega funções básicas
	require("funcoes.php");

	//Variáveis do POST
	$emailP = $_POST["email"];
	$senhaP = $_POST["senha"];

	//Carrega o banco
	require("conBd.php");

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
			echo "<br/>Erro: limite de tentativas excedido!";
			return "limite";
		  }
	}

	//Redireciona para para inicial quando logado
	if (fazLogin(BaseDados::conBdUser(), $emailP, $senhaP) == "sucesso"){

		//Direciona para página inicial restrita
		header("location: inicio.php");
	}
}

function fazLogin($dbChecaLogin, $email, $senha){

	//Valida as strings
	$email = validarString($email);
	$senha = validarString($senha);

	//Checa se e-mail ou senha está em branco
	if (!($email) || !($senha)){
		echo "<br/>Erro: por favor, digite um e-mail e uma senha.";
		return "falta";
	}

	//Efetua o md5 da senha
	$senha = md5($senha);

	//Carrega nomes das tabelas do bd
	require("nomesTabelas.php");

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
			echo "<br/>Erro: usuário inativo.";
			return "inativo";
		}

		$id = $dados[0]["id"];
		$email = $dados[0]["email"];
		$nome = $dados[0]["nome"];
		$chave = "3a1cf8gk78ej64gf784kh89fo9";
		$hora = time();
		$chave = md5($email . $chave . $hora);
		    
		//Constroi a session
		$_SESSION['Lost_Found'] = array("id" => $id, "nome" => $nome, "email" => $email, "situacao" => $situacao, "chave" => $chave, "hora" => $hora);

		return "sucesso";
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
		
		echo "<br/>Erro: e-mail ou senha inválidos.";
		return "invalido";
	  }

}

?>