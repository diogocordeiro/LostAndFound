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

		//Valida contra XSS
		$idSession = validarString($_POST['idSession']);

		session_start();
		
		//Verifica se o id da session e' o mesmo que o do id passado
		if ($_SESSION['Lost_Found']["id"] == $idSession) {
			$arr = [];

			array_push($arr, $_POST['nome']); #0
			array_push($arr, $_POST['sobrenome']); #1
			array_push($arr, $_POST['sexo']); #2
			array_push($arr, $_POST['cidade']); #3
			array_push($arr, $_POST['pais']); #4
			array_push($arr, $_POST['celular']); #5
			array_push($arr, $_POST['telefone']); #6
			array_push($arr, $_POST['facebook']); #7

			//Caso haja imagem 
			if ($_FILES['imagemPerfil']['name'] != ""){
				array_push($arr, $_FILES['imagemPerfil']); #8

			//Caso contrario, passa o endereco da imagem atual
			} else {
				array_push($arr, $_POST['imagemPerfilAtual']); #7
			  }

			$sucesso = alterarUsuario(BaseDados::conBdUser(), $_SESSION['Lost_Found']["id"], $arr);

			if ($sucesso == "sucesso") {
				echo "Atualizado!";
			}

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

	//Id do pais (Brazil)
	$idPais = 31;

	//Tipos dos atributos passados (para validação)
	//i, s, d, b (http://php.net/manual/en/mysqli-stmt.bind-param.php)
	$tiposAtts = "sssisi";

	$sql = "INSERT INTO ".$tabUsuarios." (email, senha, dNascimento, situacao, dataCadastro, idPais) VALUES (?, ?, ?, ?, ?, ?)";

	//Prepara o statement
	$stmt = $myDb->prepare($sql);

	if(!$stmt){
		//echo 'error: '. $myDb->errno .' - '. $myDb->error;
		echo 'Erro: no statement do Mysql. Usuario.php:incluirUsuario()';
		exit;
	}

	//Valida os atributos
	$stmt->bind_param($tiposAtts, $arrDados[0], $arrDados[1], $arrDados[3], $situacao, $dataHoje, $idPais);

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
function validarDadosPerfil($myDb, $arrDados, $idUsuario){

	//Tamanho maximo da imagem 3MB
	$tamImg = 3;

	//Pasta onde ficam as imagens dos perfis
	$pastaImgs = "../usuarios/fotos/";

	foreach ($arrDados as $key => $value) {

		//Valida contra XSS (exceto a imagem)
		if ($key != 8) {
			$arrDados[$key] = validarString($arrDados[$key]);
		}

		//Valida campo de sexo
		if ($key == 2 && ($arrDados[$key] != 0 && $arrDados[$key] != 1)) {
			echo "Erro: sexo inválido.";
			exit;
		
		//Valida o pais
		} elseif ($key == 4) {

			global $tabPais;

			//Coleta as informacoes do pais
			$meuPais = getData($myDb, $tabPais, "abrev", $arrDados[$key], "s");

			//Caso haja o pais passado
			if (count($meuPais) > 0) {
				
				//Atribui o id do pais
				$arrDados[$key] = $meuPais[0]['id'];
			} else {
				echo "Erro: país inválido.";
				exit;
			  }

		  //Valida a imagem
		  } elseif ($key == 8) {
		  		//[8] => Array ( [name] => Sem título.png [type] => image/png [tmp_name] => C:\Windows\Temp\php47DA.tmp [error] => 0 [size] => 77322 ) )

				//Caso haja alguma imagem sera um array
				if (is_array($value)){
					if(!$arrDados[$key]['error']){

						//Caso seja uma extensao valida
						if ($arrDados[$key]['type'] == "image/jpg"
							|| $arrDados[$key]['type'] == "image/png") {
							
							//Extensao da imagem
							$tipoImg = explode(".", $arrDados[$key]['name'])[1];

							//Verifica tamanho da imagem
							if($arrDados[$key]['size'] > (1024000*$tamImg)){
								echo 'Erro: a imagem é muito grande.';
								exit;
							}

							//Renomea da imagem
							$nomeImg = md5($idUsuario).".".$tipoImg;

							//Sobe a imagem para pasta desejada
							move_uploaded_file($arrDados[$key]['tmp_name'], $pastaImgs.$nomeImg);

							$arrDados[$key] = $nomeImg;
						} else {
							echo "Erro: extensão da imagem inválida." ;
							exit;
						  }

					//Caso haja erros
					} else {
						echo 'Erro: '.$arrDados[$key]['error'];
						exit;
					}
				} else {
					$arrDados[$key] = validarString($arrDados[$key]);
				  }
			} //elsif
	}//for

	return $arrDados;
}//validarDadosPerfil()

//Método para alterar o usuário
function alterarUsuario($myDb, $idUsuario, $arrDados){

	global $tabUsuarios;
	
	//Valida contra XSS
	$idUsuario = validarString($idUsuario);

	//Trata os campos passados
	$arrDados = validarDadosPerfil($myDb, $arrDados, $idUsuario);

	$tiposAtts = "ssisissssi";

	$sql = "UPDATE ".$tabUsuarios." SET nome=?, sobrenome=?, sexo=?, cidade=?, idPais=?, celular=?, telefone=?, facebook=?, imagemPerfil=? WHERE id=?";

	//Prepara o statement
	$stmt = $myDb->prepare($sql);

	if(!$stmt){
		//echo 'error: '. $myDb->errno .' - '. $myDb->error;
		echo 'Erro: no statement do Mysql. Usuario.php:alterarUsuario()';
		exit;
	}

	//Valida os atributos
	$stmt->bind_param($tiposAtts, $arrDados[0], $arrDados[1], $arrDados[2], $arrDados[3], $arrDados[4],
		$arrDados[5], $arrDados[6], $arrDados[7], $arrDados[8], $idUsuario);

	//Executa o statement
	if ($stmt->execute()){
		return "sucesso";
	} else {
		//echo 'error: '. $myDb->errno .' - '. $myDb->error;
		return "falha";
	  }
}//function alterarUsuario()

//Método para desativar o usuário
function desativarUsuario($myDb, $idUsuario){

}//function desativarUsuario()


?>