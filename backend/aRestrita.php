<?php
	
	//Página de login
	$pgFormLogin = "fazLogin.php";

	session_start();
	
	if (isset($_SESSION['Lost_Found'])) {
	
		$id = $_SESSION['Lost_Found']["id"];
		$email = $_SESSION['Lost_Found']["email"];
		$nome = $_SESSION['Lost_Found']["nome"];
		$chave = "3a1cf8gk78ej64gf784kh89fo9";
		$situacao = $_SESSION['Lost_Found']['situacao'];
		$hora = $_SESSION['Lost_Found']["hora"];
		
		if ($_SESSION['Lost_Found']['chave'] != md5($email . $chave . $hora)) {
			echo "<meta charset='UTF-8'>Erro: chave da session é iválida.";
			exit();
		}
		
		//Atualizando a chave com a nova hora do acesso
		$hora = time();
		$chave = md5($email . $chave . $hora);
		
		//session_start();
		
		//Salvando os novos dados na session
		$_SESSION['Lost_Found'] = array("id" => $id, "nome" => $nome, "email" => $email, "situacao" => $situacao, "chave" => $chave, "hora" => $hora);
	} else {
		echo "
			<meta charset='UTF-8'>
			<center>
 			<style type='text/css'>body {
	 				font-family: Verdana, Arial, Helvetica, sans-serif;
					font-size: 20px;
					color: #000000;
					background: #ffffff; 
			  	}
			</style>
			<br><br><br><br><br><br><br><br>Área restrita. Por favor, faça o login...<br></center>
			<meta HTTP-EQUIV=\"refresh\" CONTENT=\"3; URL=http:".$pgFormLogin."\">";
			exit;
	  }

?>