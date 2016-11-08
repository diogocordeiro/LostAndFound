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

		array_push($arr, $_POST['titulo']); #0
		array_push($arr, $_POST['marca']); #1
		array_push($arr, $_POST['identificador']); #2
		array_push($arr, $_POST['categoria']); #3
		array_push($arr, $_POST['subcategoria']); #4
		array_push($arr, $_POST['cor1']); #5
		array_push($arr, $_POST['cor2']); #6
		array_push($arr, $_POST['caracteristicas']); #7
		array_push($arr, $_POST['descricao']); #8

		//Caso haja imagem
		if ($_FILES['enderFoto']['name'] != ""){
			array_push($arr, $_FILES['enderFoto']); #9
		
		//Caso nao haja imagem, insere o endereco padrao
		} else {
			array_push($arr, "camera.jpg"); #9
		  }

		session_start();

		//Adiciona id do usuario que esta' inserindo o item
		array_push($arr, $_SESSION['Lost_Found']["id"]); #10

		$sucesso = incluirItem(BaseDados::conBdUser(), $arr);

		//Caso o item seja inserido
		if ($sucesso == "Novo item inserido com sucesso!") {
			echo "Novo item inserido com sucesso!";
			echo "<meta HTTP-EQUIV=\"refresh\" CONTENT=\"2; URL=http:../templates/meus-itens.php\">";
		} else {
			echo "<br/>Erro: item não inserido!";
			exit;
		  }

	//POST para alteração do usuário
	} elseif ($tipo == "edita") {

		exit;
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
		

	//POST para exlcuir item da conta do usuário
	} elseif ($tipo == "excluir") {
		$idUsuario = validarString($_GET['id']);
		desativarItem(BaseDados::conBdUser(), $idUsuario, $idItem);
	}
} else {
	echo "Defina o tipo do POST";
  }

//Função para validar todos os campos passados nos formulários de cadastro
function validarDadosCadastro($arrDados, $idUnico){

	//Tamanho maximo da imagem 3MB
	$tamImg = 3;

	//Pasta onde ficam as imagens dos itens
	$pastaImgs = "../itens/fotos/";

	for ($i=0; $i < count($arrDados); $i++) { 
		
		//Quando for um array(imagem) nao faz essa validacao
		if (!is_array($arrDados[$i])){

			//Valida contra XSS
			$arrDados[$i] = validarString($arrDados[$i]);
		
		//Tratamento para imagem
		} else {
			if(!$arrDados[$i]['error']){

				//Caso seja uma extensao valida
				if ($arrDados[$i]['type'] == "image/jpg"
					|| $arrDados[$i]['type'] == "image/jpeg"
					|| $arrDados[$i]['type'] == "image/png") {
					
					//Extensao da imagem
					$tipoImg = explode(".", $arrDados[$i]['name'])[1];

					//Verifica tamanho da imagem
					if($arrDados[$i]['size'] > (1024000*$tamImg)){
						echo 'Erro: a imagem é muito grande.';
						exit;
					}

					//Renomea da imagem
					$nomeImg = $idUnico.".".$tipoImg;

					//Sobe a imagem para pasta desejada
					move_uploaded_file($arrDados[$i]['tmp_name'], $pastaImgs.$nomeImg);

					$arrDados[$i] = $nomeImg;
				} else {
					echo "Erro: extensão da imagem inválida." ;
					exit;
				  }

			//Caso haja erros
			} else {
				echo 'Erro: '.$arrDados[$i]['error'];
				exit;
			}
		  } //else tratamento para imagem

		//Valida campos em branco
		if ($i == 0 && strlen($arrDados[$i]) == 0) {
			echo "Erro: título não pode ficar em branco.";
			exit;
		} elseif ($i == 1 && strlen($arrDados[$i]) == 0) {
			echo "Erro: marca não pode ficar em branco.";
			exit;
		  } elseif ($i == 3 && strlen($arrDados[$i]) == 0) {
				echo "Erro: categoria não pode ficar em branco.";
				exit;
			  } elseif ($i == 5 && strlen($arrDados[$i]) == 0) {
					echo "Erro: categoria não pode ficar em branco.";
					exit;
			    } elseif ($i == 7 && strlen($arrDados[$i]) == 0) {
					echo "Erro: caracteristicas não pode ficar em branco.";
					exit;
			    	} elseif ($i == 8 && strlen($arrDados[$i]) == 0) {
						echo "Erro: descrição não pode ficar em branco.";
						exit;
					  } elseif ($i == 10 && strlen($arrDados[$i]) == 0) {
							echo "Erro: id da session em branco.";
							exit;
						}
	}//for

	return $arrDados;
}//validarDadosCadastro()


//Método para incluir o item
function incluirItem($myDb, $arrDados){

	global $tabItens;

	//id do item
	$idUnico = md5(uniqid(rand(), true));

	//Valida cada campo passado
	$arrDados = validarDadosCadastro($arrDados, $idUnico);

	$dataHoje = date('Y-m-d');

	$idReport = 0;

	//Tipos dos atributos passados (para validação)
	//i, s, d, b (http://php.net/manual/en/mysqli-stmt.bind-param.php)
	$tiposAtts = "siiisssssiissss";

	$sql = "INSERT INTO ".$tabItens." (id, idUsuario, idRelAchado, idRelPerdido, identificador, marca, titulo, descricao,
		caracteristicas, idCategoria, idSubcategoria, cor1, cor2, enderFoto, dataInsercao) 
		VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

	//Prepara o statement
	$stmt = $myDb->prepare($sql);

	if(!$stmt){
		//echo 'error: '. $myDb->errno .' - '. $myDb->error;
		echo 'Erro: no statement do Mysql. Item.php:incluirItem()';
		exit;
	}

	//Valida os atributos
	$stmt->bind_param($tiposAtts, $idUnico, $arrDados[10], $idReport, $idReport, $arrDados[2], $arrDados[1], $arrDados[0],
		$arrDados[8], $arrDados[7], $arrDados[3], $arrDados[4], $arrDados[5], $arrDados[6], $arrDados[9], $dataHoje);

	//Executa o statement
	if ($stmt->execute()){
		return "sucesso";
	} else {
		//echo '<br/><br/>Error: '. $myDb->errno .' - '. $myDb->error;
		return "falha";
	  }
}//function incluirItem()

//Função para validar todos os campos passados nos formulários de edicao do perfil
function validarDadosAlterarItem($myDb, $arrDados, $idUsuario){

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
							|| $arrDados[$key]['type'] == "image/jpeg"
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

//Método para alterar o item
function alterarItem($myDb, $idUsuario, $idItem, $arrDados){

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
}//function alterarItem()

//Método para desativar o item
function removerItem($myDb, $idUsuario, $idItem){

}//function removerItem()


?>
