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

	//POST para inclusão de novo usuário
	if ($tipo == "novo") {
		$arr = [];

		array_push($arr, $_POST['email']);
		array_push($arr, $_POST['senha']);
		array_push($arr, $_POST['confirmaSenha']);
		array_push($arr, $_POST['dNascimento']);

		$dbIncluiUser = BaseDados::conBdUser();

		$sucesso = incluirUsuario($dbIncluiUser, $arr);

		if ($sucesso[count($sucesso)-1] == "sucesso") {
			//print_r($sucesso);exit;

			//Query para coletar os dados
			$sqlDados = "SELECT * FROM `".$tabUsuarios."` WHERE `email` = ? AND `senha` = ?";

			//Prepara o statement
			$stmtDados = $dbIncluiUser->prepare($sqlDados);

			//Checa erros no statement
			if(!$stmtDados){
				//echo 'erros: '. $dbIncluiUser->errno .' - '. $dbIncluiUser->error;
				echo 'Erro: no statement do Mysql. (Usuario.php)';
				exit;
			}

			//Valida os atributos
			$stmtDados->bind_param("ss", $sucesso[0], $sucesso[1]);

			//Executa o statement
			$stmtDados->execute();

			//Executa o fetch do resultado
			$dados = fetch($stmtDados);

			$id = $dados[0]["id"];
			$email = $dados[0]["email"];
			$nome = $dados[0]["nome"];
			$chave = "3a1cf8gk78ej64gf784kh89fo9";
			$hora = time();
			$chave = md5($email . $chave . $hora);
			
			session_start();

			//Constroi a session
			$_SESSION['Lost_Found'] = array("id" => $id, "nome" => $nome, "email" => $email, "situacao" => $dados[0]["situacao"], "chave" => $chave, "hora" => $hora);

			//Redireciona para pagina inicial restrita
			echo "Novo usuário inserido com sucesso! Redirecionando...";
			echo "<meta HTTP-EQUIV=\"refresh\" CONTENT=\"2; URL=http:../templates/index-logado.php\">";
		} else {
			echo "<br/>Erro: usuário não cadastrado!";
			exit;
		  }

	//POST para alteração do usuário
	} elseif ($tipo == "edita") {
		
		session_start();
		
		//Verifica se o id da session e' o mesmo que o do id passado
		if ($_SESSION['Lost_Found']["id"] == $_GET['id']) {
			$arr = [];

			array_push($arr, $_POST['nome']); #0
			array_push($arr, $_POST['sobrenome']); #1
			array_push($arr, $_POST['sexo']); #2
			array_push($arr, $_POST['pais']); #3
			array_push($arr, $_POST['celular']); #4
			array_push($arr, $_POST['telefone']); #5
			array_push($arr, $_POST['facebook']); #6
			array_push($arr, $_POST['imagemPerfil']); #7

			alterarUsuario(BaseDados::conBdUser(), $_GET['id'], $arr);
		} else {
			echo "Erro: id da session inválido.";
			exit;
		  }
		

	//POST para desativação da conta do usuário
	} elseif ($tipo == "desativa") {
		$idUsuario = validarString($_GET['id']);
		desativarUsuario(BaseDados::conBdUser(), $idUsuario);
	}
} else {
	echo "Defina o tipo do POST";
  }

//Função para validar todos os campos passados nos formulários de cadastro
function validarDadosCadastro($arrDados){

	for ($i=0; $i < count($arrDados); $i++) { 
		
		//Valida contra XSS
		$arrDados[$i] = validarString($arrDados[$i]);

		//Data Nascimento
		$anoNascimento = date('Y', strtotime($arrDados[3]));

		//Senha
		$mascaraPwd = '/[^a-z_\-0-9]/i';
		//$containsLetter  = preg_match('/[a-zA-Z]/',    $string);
		//$containsDigit   = preg_match('/\d/',          $string);

		//Mascara para e-mail
		$mascaraEmail = '/^(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){255,})(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){65,}@)(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22))(?:\\.(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22)))*@(?:(?:(?!.*[^.]{64,})(?:(?:(?:xn--)?[a-z0-9]+(?:-+[a-z0-9]+)*\\.){1,126}){1,}(?:(?:[a-z][a-z0-9]*)|(?:(?:xn--)[a-z0-9]+))(?:-+[a-z0-9]+)*)|(?:\\[(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){7})|(?:(?!(?:.*[a-f0-9][:\\]]){7,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?)))|(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){5}:)|(?:(?!(?:.*[a-f0-9]:){5,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3}:)?)))?(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))(?:\\.(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))){3}))\\]))$/iD';

		//Valida campos em branco
		if ($i == 0 && strlen($arrDados[$i]) == 0) {
			echo "Erro: e-mail não pode ficar vazio.";
			exit;
		} elseif (!(preg_match($mascaraEmail, $arrDados[0]) === 1)) {
			echo "Erro: e-mail inválido.";
			exit;
		  } elseif ($i == 1 && strlen($arrDados[$i]) == 0) {
				echo "Erro: senha não pode ficar vazia.";
				exit;
			  } elseif (strlen($arrDados[1]) < 8) {
					echo "Erro: senha não pode ter menos de 8 dígitos.";
					exit;
			    } elseif (preg_match($mascaraPwd, $arrDados[1])) {
					echo "Erro: senha inválida.";
					exit;
			    	} elseif ($arrDados[1] != $arrDados[2]) {
				  		echo "Erro: as senhas devem ser iguais.";
						exit;
					    } elseif ($i == 3 && strlen($arrDados[$i]) == 0) {
					  		echo "Erro: data de nascimento não pode ficar vazia.";
							exit;
					  	  } elseif ($anoNascimento > 1997) {
					  			echo "Erro: Você precisa ser maior de 18 anos.";
								exit;
					  	    }
	}//for
}//validarDadosCadastro()

//Função para checar a disponibilidade do e-mail
function emailDisponivel($myDb, $email){
	
	global $tabUsuarios;

	//Nome do atributo e-mail na tabela
	$nomeAttEmail = "email";

	//Tenta coletar o usuário com o e-mail passado
	$myUser = getData($myDb, $tabUsuarios, $nomeAttEmail, $email, "s");

	//Caso o e-mail já exista retorna falso
	if(count($myUser) > 0){
		return false;
	} else {
		return true;
	  }
} //function emailDisponivel()

//Método para incluir o usuário
function incluirUsuario($myDb, $arrDados){

	global $tabUsuarios;

	//Valida cada campo passado
	validarDadosCadastro($arrDados);

	//Checa se o e-mail informado está disponível
	if(!emailDisponivel($myDb, $arrDados[0])){
		echo "Erro: e-mail indisponível.";
		return "falha";
	} 

	$arrDados[3] = date('Y-m-d', strtotime($arrDados[3]));
	$arrDados[1] = md5($arrDados[1]);
	$dataHoje = date('Y-m-d');

	//Situacao inicial dos usuários
	$situacao = 1;

	//Tipos dos atributos passados (para validação)
	//i, s, d, b (http://php.net/manual/en/mysqli-stmt.bind-param.php)
	$tiposAtts = "sssis";

	$sql = "INSERT INTO ".$tabUsuarios." (email, senha, dNascimento, situacao, dataCadastro) VALUES (?, ?, ?, ?, ?)";

	//Prepara o statement
	$stmt = $myDb->prepare($sql);

	if(!$stmt){
		//echo 'error: '. $myDb->errno .' - '. $myDb->error;
		echo 'Erro: no statement do Mysql. (Usuario.php)';
		exit;
	}

	//Valida os atributos
	$stmt->bind_param($tiposAtts, $arrDados[0], $arrDados[1], $arrDados[3], $situacao, $dataHoje);

	//Executa o statement
	if ($stmt->execute()){

		array_push($arrDados, "sucesso");
		return $arrDados;
	} else {
		//echo 'error: '. $myDb->errno .' - '. $myDb->error;
		return "falha";
	  }
}//function incluirUsuario()

//Função para validar todos os campos passados nos formulários de edicao do perfil
function validarDadosPerfil($myDb, $arrDados){

	for ($i=0; $i < count($arrDados); $i++) { 
		
		//Valida contra XSS
		$arrDados[$i] = validarString($arrDados[$i]);

		//Valida campo de sexo
		if ($i == 2 && ($arrDados[$i] != 0 && $arrDados[$i] != 1)) {
			echo "Erro: sexo inválido.";
			exit;
		
		//Valida o pais
		} elseif ($i == 3) {
			
			global $tabPais;

			//Coleta as informacoes do pais
			$meuPais = getData($myDb, $tabPais, "abrev", $arrDados[$i], "s");
			
			//Caso haja o pais passado
			if (count($meuPais) > 0) {
				
				//Atribui o id do pais
				$arrDados[$i] = $meuPais[0]['id'];
			} else {
				echo "Erro: país inválido.";
				exit;
			  }

		  //Valida a imagem
		  } elseif ($i == 7) {
				
				//Tratamnto para imagem

			} 
	}//for
}//validarDadosPerfil()

//Método para alterar o usuário
function alterarUsuario($myDb, $idUsuario, $arrDados){
	
	//Valida contra XSS
	$idUsuario = validarString($idUsuario);

	//Trata os campos passados
	validarDadosPerfil($myDb, $arrDados);

}//function alterarUsuario()

//Método para desativar o usuário
function desativarUsuario($myDb, $idUsuario){

}//function desativarUsuario()


?>