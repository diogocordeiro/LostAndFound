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
		
		$email = validarString($_POST['email']);

		session_start();
		
		//Verifica se realmente ha' uma session
		if (isset($_SESSION['Lost_Found'])) {
			$sucesso = linkNovaSenha(BaseDados::conBdUser(), $email);

			if ($sucesso[0] == "sucesso") {
				echo "As instruçōes de alteração de senha, foram enviadas para seu E-mail.";
			}
		}

	//Quando for solicitado por um usuario nao logado
	} elseif ($tipo == "off") {
		# code...
	  }
}

//
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

	$dataHoje = date('Y-m-d');
	$situacao = 1;

	$tiposAtts = "sisis";

	$sql = "INSERT INTO ".$tabSenhas." (link, idUsuario, email, situacao,
		 dataSolicitacao) VALUES (?, ?, ?, ?, ?)";

	//Prepara o statement
	$stmt = $myDb->prepare($sql);

	//Checa erros
	if(!$stmt){
		echo 'error: '. $myDb->errno .' - '. $myDb->error;
	}

	//Valida o atributo
	$stmt->bind_param($tiposAtts, $linkPwd, $dados[0]['id'], $email, $situacao, $dataHoje);

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
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

	// Additional headers
	$headers .= 'To: '.$dados[0]['nome'].' '.$dados[0]['sobrenome'].' <'.$para.'>' . "\r\n";
	$headers .= 'From: Lost and Found Project <suporte@lostandfoundproject.herokuapp.com>' . "\r\n";

	//Envia e-mail
	return mail($para, $assunto, $mensagem, $headers);
}//function enviarEmail()

	
?>