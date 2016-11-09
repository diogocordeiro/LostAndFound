<?php

//Nome da imagem padrao dos itens
global $imgPadrao; $imgPadrao = "camera.jpg";

//Tamanho maximo da imagem 3MB
global $tamImg; $tamImg = 3;

//Pasta onde ficam as imagens dos itens
global $pastaImgs; $pastaImgs = "../itens/fotos/";

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
			array_push($arr, $imgPadrao); #9
		  }

		session_start();

		//Adiciona id do usuario que esta' inserindo o item
		array_push($arr, $_SESSION['Lost_Found']["id"]); #10

		$sucesso = incluirItem(BaseDados::conBdUser(), $arr);

		//Caso o item seja inserido
		if ($sucesso[0] == "sucesso") {
			echo "Novo item inserido com sucesso!";
			// echo "<meta HTTP-EQUIV=\"refresh\" CONTENT=\"2; URL=http:../templates/meus-itens.php\">";
		} else {
			echo "<br/>Erro: item não inserido!";
		  }

	//POST para alteração do usuário
	} elseif ($tipo == "edita") {

		//Valida contra XSS
		$idSession = validarString($_POST['idSession']);
		$idItem = validarString($_POST['idItem']);

		session_start();
		
		//Verifica se o id da session e' o mesmo que o do id passado
		if ($_SESSION['Lost_Found']["id"] == $idSession) {
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

			//Caso contrario, passa o endereco da imagem atual
			} else {
				array_push($arr, $_POST['enderFotoAtual']); #9
			  }

			$sucesso = alterarItem(BaseDados::conBdUser(), $idItem, $arr);

			if ($sucesso == "sucesso") {
				echo "Atualizado!";
			} else {
				echo "Não atualizado!";
			  }

		} else {
			echo "Erro: id da session inválido.";
		  }
		
	}// elseif alteracao
}

//Função para validar todos os campos passados nos formulários de cadastro
function validarDadosCadastroItem($arrDados, $idUnico){

	for ($i=0; $i < count($arrDados); $i++) { 
		
		//Quando for um array(imagem) nao faz essa validacao
		if (!is_array($arrDados[$i])){

			//Valida contra XSS
			$arrDados[$i] = validarString($arrDados[$i]);
		
		//Tratamento para imagem
		} else {

			global $pastaImgs;
			global $tamImg;

			if(!$arrDados[$i]['error']){

				//Caso seja uma extensao valida
				if ($arrDados[$i]['type'] == "image/jpg"
					|| $arrDados[$i]['type'] == "image/jpeg"
					|| $arrDados[$i]['type'] == "image/png") {
					
					//Extensao da imagem
					$tipoArr = explode(".", $arrDados[$i]['name']);
					$tipoImg = $tipoArr[count($tipoArr)-1];

					//Verifica tamanho da imagem
					if($arrDados[$i]['size'] > (1024000*$tamImg)){
						echo 'Erro: a imagem é muito grande.';
						return "falha";
					}

					//Renomea da imagem
					$nomeImg = $idUnico.".".$tipoImg;

					//Sobe a imagem para pasta desejada
					move_uploaded_file($arrDados[$i]['tmp_name'], $pastaImgs.$nomeImg);

					$arrDados[$i] = $nomeImg;
				} else {
					echo "Erro: extensão da imagem inválida." ;
					return "falha";
				  }

			//Caso haja erros
			} else {
				echo "Erro (".$arrDados[$i]['error']."): escolha outra imagem.<br/>";
				return "falha";
			}
		  } //else tratamento para imagem

		//Valida campos em branco
		if ($i == 0 && strlen($arrDados[$i]) == 0) {
			echo "Erro: título não pode ficar em branco.";
			return "falha";
		} elseif ($i == 1 && strlen($arrDados[$i]) == 0) {
			echo "Erro: marca não pode ficar em branco.";
			return "falha";
		  } elseif ($i == 3 && strlen($arrDados[$i]) == 0) {
				echo "Erro: categoria não pode ficar em branco.";
				return "falha";
			  } elseif ($i == 5 && strlen($arrDados[$i]) == 0) {
					echo "Erro: categoria não pode ficar em branco.";
					return "falha";
			    } elseif ($i == 7 && strlen($arrDados[$i]) == 0) {
					echo "Erro: caracteristicas não pode ficar em branco.";
					return "falha";
			    	} elseif ($i == 8 && strlen($arrDados[$i]) == 0) {
						echo "Erro: descrição não pode ficar em branco.";
						return "falha";
					  } elseif ($i == 10 && strlen($arrDados[$i]) == 0) {
							echo "Erro: id da session em branco.";
							return "falha";
						}
	}//for

	return $arrDados;
}//validarDadosCadastroItem()

//Método para incluir o item
function incluirItem($myDb, $arrDados){

	global $tabItens;

	//id do item
	$idUnico = md5(uniqid(rand(), true));

	//Valida cada campo passado
	$arrDados = validarDadosCadastroItem($arrDados, $idUnico);

	//Caso haja algum erro na validacao
	if ($arrDados == "falha") {
		return "falha";
	}

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
		return array("sucesso", $idUnico);
	} else {
		//echo '<br/><br/>Error: '. $myDb->errno .' - '. $myDb->error;
		return "falha";
	  }
}//function incluirItem()

//Método para alterar o item
function alterarItem($myDb, $idItem, $arrDados){

	//$idItem ja' vem validado com validarString()

	global $tabItens;

	//Valida cada campo passado
	$arrDados = validarDadosCadastroItem($arrDados, $idItem);

	//Caso haja algum erro na validacao
	if ($arrDados == "falha") {
		return "falha";
	}

	$tiposAtts = "sssssiissss";

	$sql = "UPDATE ".$tabItens." SET identificador=?, marca=?, titulo=?, descricao=?, caracteristicas=?,
	idCategoria=?, idSubcategoria=?, cor1=?, cor2=?, enderFoto=? WHERE id=?";

	//Prepara o statement
	$stmt = $myDb->prepare($sql);

	if(!$stmt){
		//echo 'error: '. $myDb->errno .' - '. $myDb->error;
		echo '<br>Erro: no statement do Mysql. Item.php:alterarItem()';
		exit;
	}

	//Valida os atributos
	$stmt->bind_param($tiposAtts, $arrDados[2], $arrDados[1], $arrDados[0], $arrDados[8], $arrDados[7],
		$arrDados[3], $arrDados[4], $arrDados[5], $arrDados[6], $arrDados[9], $idItem);

	//Executa o statement
	if ($stmt->execute()){
		return "sucesso";
	} else {
		//echo 'error: '. $myDb->errno .' - '. $myDb->error;
		return "falha";
	  }
}//function alterarItem()

//Funcao para remover um item do usuariao no bd
function removeItem($myDb, $idItem, $tipo, $nomeImg = null){

	//$idItem ja' vem validado com validarString()

	//Carrega nomes das tabelas do bd
	require("nomesTabelas.php");

	global $tabItens;

	//Caso o item NAO pertenca a nenhum report (remove o item completamente)
	if ($tipo == "tudo" || $tipo == "tudo_teste") {
		$sql = "DELETE FROM ".$tabItens." WHERE id = ?";

	//Caso o item pertenca a algum report (remove apenas a referencia entre o item e o usuario)
	} elseif ($tipo == "ref") {
		$sql = "UPDATE ".$tabItens." SET idUsuario=? WHERE id=?";
	  }

	//Novo id para eliminar a referencia
	$novoId = 0;

	//Prepara o statement
	$stmt = $myDb->prepare($sql);

	//Checa erros
	if(!$stmt){
		echo 'error: '. $myDb->errno .' - '. $myDb->error;
	}

	//Valida o atributo
	if ($tipo == "tudo" || $tipo == "tudo_teste") {
		$stmt->bind_param("s", $idItem);
	} elseif ($tipo == "ref") {
		$stmt->bind_param("is", $novoId, $idItem);
	  }

	//Executa o statement
	if ($stmt->execute()) {

		global $imgPadrao;

		//Exclui a imagem do servidor (se nao for a imagem padrao)
		if ($tipo == "tudo" && strcmp($nomeImg, $imgPadrao) != 0) {
			global $pastaImgs;
			unlink($pastaImgs.$nomeImg);
		}

		return "sucesso";
	} else {
		echo '<br/><br/>Error: '. $myDb->errno .' - '. $myDb->error;
		return "falha";
	  }
}//removeItem()

//Funcao para coletar um item do usuariao no bd
function getItensUsuario($myDb, $idSession){

	//Carrega funções básicas
	require("funcoes.php");

	//Carrega nomes das tabelas do bd
	require("nomesTabelas.php");

	global $tabItens;

	//Valida a string
	$id = validarString($idSession);

	$sql = "SELECT * FROM ".$tabItens." WHERE idUsuario = ? ORDER BY dataInsercao DESC";

	//Prepara o statement
	$stmt = $myDb->prepare($sql);

	//Checa erros
	if(!$stmt){
		echo 'error: '. $myDb->errno .' - '. $myDb->error;
	}

	//Valida o atributo
	$stmt->bind_param("i", $id);

	//Executa o statement
	$stmt->execute();

	//Executa o fetch do resultado e atribuí a variável $myArr
	$myArr = fetch($stmt);

	//Retornar os itens encontrados
	return $myArr;
}//getItensUsuario()

?>