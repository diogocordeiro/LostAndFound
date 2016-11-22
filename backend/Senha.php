<?php
	
//Verifica se o tipo do POST foi passado
if (isset($_GET['tipo'])) {

	//Carrega nomes das tabelas do bd
	require("nomesTabelas.php");

	//Carrega funções básicas
	require("funcoes.php");

	//Carrega o banco
	require("conBd.php");

	//Carrega o timezone padrão
	require("default_timezone.php");

	//Valida query string
	$tipo = validarString($_GET['tipo']);

	//Quando for solicitado por um usuario logado
	if ($tipo == "on") {

		session_start();
		
		//Verifica se realmente ha' uma session
		if (isset($_SESSION['Lost_Found'])) {

			//Coleta os dados do usuario da session
	  		$dados = getData(BaseDados::conBdUser(), $tabUsuarios, "id", $_SESSION['Lost_Found']["id"], "i");
			
			$sucesso = linkNovaSenha(BaseDados::conBdUser(), $dados[0]['email']);

			if ($sucesso[0] == "sucesso") {
				echo "As instruçōes de alteração de senha, foram enviadas para seu E-mail.";
			}
		}

	//Quando for solicitado por um usuario nao logado
	} elseif ($tipo == "off") {
		
		$email = validarString($_POST['email']);
	  	
	  	$sucesso = linkNovaSenha(BaseDados::conBdUser(), $email);

		if ($sucesso[0] == "sucesso") {
			echo "As instruçōes de alteração de senha, foram enviadas para seu E-mail.";
		}

	  //Quando for alterar a senha
	  } elseif ($tipo == "altera") {

	  		//Valida string contra xss
	  		$idLink = validarString($_POST['id']);

	  		//Verifica se o usuario da session e' o dono do link
	  		$dados = getData(BaseDados::conBdUser(), $tabSenhas, "link", $idLink, "s");

	  		// session_start();

	  		// if ($dados[0]['idUsuario'] != $_SESSION['Lost_Found']["id"]) {
	  		// 	echo "Erro: o link não foi encontrado.";
	  		// 	exit;
	  		// }

	  		$alteraSenha = alterarSenha(BaseDados::conBdUser(), $_POST['email'], $_POST['senha'],
	  		 $_POST['confirmaSenha'], $idLink);

	  		if ($alteraSenha == "sucesso") {
	  			echo "Senha alterada com sucesso!";
	  		} else {
	  			echo "Erro ao redefinir a senha.";
	  		  }

	    }
}//isset POST

//Funcao para gerar um novo link e envia-lo para o solicitante
function linkNovaSenha($myDb, $email){
	
	global $tabUsuarios;
	global $tabSenhas;

	if (strlen($email) == 0) {
		echo "Erro: e-mail não pode ficar em branco.";
		return "falha";
	}
	
	//Coleta os dados do usuario
	$dados = getData($myDb, $tabUsuarios, "email", $email, "s");

	if (count($dados) == 0) {
		echo "Erro: e-mail não encontrado.";
		return "falha";
	}

	//Gera um link unico
	$linkPwd = md5(uniqid(rand(), true));

	$dataHoje = date('Y-m-d h:i:s');
	$situacao = 1;

	$tiposAtts = "ssis";

	$sql = "INSERT INTO ".$tabSenhas." (link, email, situacao,
		 dataSolicitacao) VALUES (?, ?, ?, ?)";

	//Prepara o statement
	$stmt = $myDb->prepare($sql);

	//Checa erros
	if(!$stmt){
		echo 'error: '. $myDb->errno .' - '. $myDb->error;
	}

	//Valida o atributo
	$stmt->bind_param($tiposAtts, $linkPwd, $email, $situacao, $dataHoje);

	//Executa o statement
	if ($stmt->execute()){

		//Envia o e-mail para o destinatario
		$enviaEmail = enviarEmail($dados, $linkPwd);

		if ($enviaEmail) {
			echo "Solicitação efetuada com sucesso. Por favor, cheque sua caixa de entrada.";
			return "sucesso";
		} else {
			echo "Erro ao enviar e-mail. Tente novamente!";
			return "falha";
		  }

	} else {
		echo "Erro ao gerar o link. Tente novamente!";
		return "falha";
	  }

}//function linkNovaSenha()

//Funcao para enviar e-mail
function enviarEmail($dados, $link){
	
	$enderecoAlterarSenha = 'http://lostandfoundproject.herokuapp.com/templates/form-alterar-senha.php?id=';

	$para = $dados[0]['email'];

	//Assunto
	$assunto = 'Lost and Found Project - Instruçōes para alteração de senha';

	//Mensagem
	$mensagem = '
	<html>
	<head>
	  <title>'.$assunto.'</title>
	</head>
	<body>
	  <p>Olá, '.$dados[0]['nome'].',<br/><br/>
	  você solicitou a alteração de sua senha. Para prosseguir, basta clicar no endereço abaixo e informar sua nova senha.
	  </p>
	  <table>
	    <tr>
	      <td>link: </td><td><a href="'.$enderecoAlterarSenha.$link.'">'.$enderecoAlterarSenha.$link.'</a></td>
	    </tr>
	    <tr>
	      <td>Validade: </td><td>24 horas</td>
	    </tr>
	  </table>

	  <p>Caso você não tenha solicitado essa alteração, ingnore essa mensagem.</p>
	  <hr size="1">
	  <p><strong>Lost and Found Project</strong><br>lostandfoundproject.herokuapp.com</p>
	</body>
	</html>
	';

	//Headers para o e-mail
	$headers  = "MIME-Version: 1.0\r\n";
  	$headers .= "Content-type: text/html; charset=utf-8\r\n";

	// Additional headers
	$headers .= 'To: '.$dados[0]['nome'].' '.$dados[0]['sobrenome'].' <'.$para.'>' . "\r\n";
	$headers .= 'From: Lost and Found Project <suporte@lostandfoundproject.herokuapp.com>' . "\r\n";

	//Envia e-mail
	$enviou = mail($para, $assunto, $mensagem, $headers);

	//Caso o e-mail nao seja enviado
	if (!$enviou) { 
   		print_r(error_get_last());
   		return false;
  	}
	
	return $enviou;
}//function enviarEmail()

//Funcao para alterar a senha
function alterarSenha($myDb, $email, $senha, $confirmaSenha, $link){

	global $tabUsuarios;
	global $tabSenhas;

	//Valida strings contra XSS 
	//$link ja' vem validado
	$email = validarString($email);
	$senha = validarString($senha);
	$confirmaSenha = validarString($confirmaSenha);

	if (strlen($link) < 32) {
		echo "Erro: ID do link inválido. ";
		return "falha";
	}

	//Mascara senha
	$mascaraPwd = '/[^a-z_\-0-9]/i';
	
	//Verifica se a senha tem letras e numeros
	$temLetras = preg_match('/[a-zA-Z]/', $senha);
	$temNumeros = preg_match('/\d/', $senha);

	//Efetua validacoes
	if (strlen($email) == 0) {
		echo "Erro: e-mail não pode ficar em branco.";
		return "falha";
	} elseif (strlen($senha) == 0) {
		echo "Erro: senha não pode ficar em branco.";
		return "falha";
	  } elseif ($senha != $confirmaSenha) {
			echo "Erro: as senhas devem ser iguais.";
			exit;
	    } elseif (strlen($senha) < 8) {
				echo "Erro: senha não pode ter menos de 8 dígitos.";
				exit;
	      } elseif (preg_match($mascaraPwd, $senha)) {
				echo "Erro: senha inválida. Não é permitido caracteres especiais.";
				exit;
	    	} elseif (!$temLetras) {
				echo "Erro: a senha deve conter letras.";
				exit;
	    	  } elseif (!$temNumeros) {
					echo "Erro: a senha deve conter números.";
					exit;
			    }

	//Nova senha
	$novaSenha = md5($senha);

	$tiposAtts = "sss";

	$sql = "UPDATE ".$tabUsuarios." as u, ".$tabSenhas." as s SET u.senha=?, s.situacao=0 WHERE u.email=? AND s.link=?";

	//Prepara o statement
	$stmt = $myDb->prepare($sql);

	if(!$stmt){
		//echo 'error: '. $myDb->errno .' - '. $myDb->error;
		echo 'Erro: no statement do Mysql. Usuario.php:alterarUsuario()';
		exit;
	}

	//Valida os atributos
	$stmt->bind_param($tiposAtts, $novaSenha, $email, $link);

	//Executa o statement
	if ($stmt->execute()){
		return "sucesso";
	} else {
		return "falha";
	  }
}//function alterarSenha()
	
?>