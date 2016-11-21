<?php

//Verifica se o tipo do POST foi passado
if (isset($_GET['tipo'])) {

	//Valida query string
	$tipo = validarString2($_GET['tipo']);
	$report = validarString2($_GET['report']);

	if (strlen($report) == 0) {
		echo "Erro: informar o tipo de report.";
		exit;
	}

	//POST para inclusão de novo usuário
	if ($tipo == "novoReport") {

		//Carrega a pagina de itens
		require("Item.php");

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

		array_push($arr, $_POST['dataItem']); #11
		array_push($arr, $_POST['horaItem']); #12
		array_push($arr, $_POST['informacao']); #13

		$sucesso = incluirReport(BaseDados::conBdUser(), $arr, $_POST['autocomplete'], $report);

		//Caso o report seja inserido
		if ($sucesso[0] == "sucesso") {

			echo "Novo relatório inserido com sucesso!";
			// echo "<meta HTTP-EQUIV=\"refresh\" CONTENT=\"2; URL=http:../templates/meus-itens.php\">";
		} else {
			echo "<br/>Erro: relatório não inserido!";
		  }

	//POST para alteração do usuário
	} elseif ($tipo == "editaReport") {

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

//Função para validar queries strings, assegurando contra Cross-Side Scripting (XSS)
function validarString2($qString){

	//Remove tags <>
	$str = strip_tags($qString);

	//Convete caracteres especiais para htmlcode
	$str = htmlspecialchars($str);

	return $str;
}//function validarString2()

// function to geocode address, it will return false if unable to geocode address
function geocode($address){
 
    // url encode the address
    $address = urlencode($address);
    $myKey = "AIzaSyC1jcQdqAcbQSi0yuUDshqpLiz-fPqQ3m8";
    
    // google map geocode api url
    $url = "http://maps.google.com/maps/api/geocode/json?address={$address}";
 
    // get the json response
    $resp_json = file_get_contents($url);
     
    // decode the json
    $resp = json_decode($resp_json, true);
 
    // response status will be 'OK', if able to geocode given address 
    if($resp['status']=='OK'){
 
        // get the important data
        $lati = $resp['results'][0]['geometry']['location']['lat'];
        $longi = $resp['results'][0]['geometry']['location']['lng'];
        $formatted_address = $resp['results'][0]['formatted_address'];
         
        // verify if data is complete
        if($lati && $longi && $formatted_address){
         
            // put the data in the array
            $data_arr = array();            
             
            array_push(
                $data_arr, 
                    $lati, 
                    $longi, 
                    $formatted_address
                );
             
            return $data_arr;
             
        }else{
            return false;
        }
         
    }else{
        return false;
    }
}//function geocode()

//Método para incluir os reports
function incluirReport($myDb, $arrDados, $endCompleto, $tipoReport, $idItemExistente=null){

	global $tabAchados;
	global $tabPerdidos;
	$tabReport = null;
	$itemSucesso = null;
	$idReportAchado = null;
	$idReportPerdido = null;
	$idUser = $arrDados[10];

	//Elimina referencia do usuario ao item, pois a referencia e' apenas do relatorio
	$arrDados[10] = 0;

	//id do report
	$idUnicoReport = md5(uniqid(rand(), true));

	//Seleciona tabela correta e seta o devido id para tabela de itens
	if ($tipoReport == "achado") {
		$tabReport = $tabAchados;
		$idReportAchado = $idUnicoReport;
		$idReportPerdido = 0;
	} else {
		$tabReport = $tabPerdidos;
		$idReportAchado = 0;
		$idReportPerdido = $idUnicoReport;
	  }

	//Caso seja um novo item
	if ($idItemExistente == null) {
		$itemSucesso = incluirItem($myDb, $arrDados, $idReportAchado, $idReportPerdido);
	
	//Caso seja um item ja' existente
	} else {
		$itemSucesso = array("sucesso", $idItemExistente);
	  }
	
	//Caso o item nao seja inserido com sucesso
	if($itemSucesso[0] != "sucesso") {
		echo "Erro: falha ao inserir o item.";
		return "falha";
	}

	//Valida query string contra XSS
	$localidade = validarString2($endCompleto);

	if (strlen($localidade) == 0) {
		echo "Erro: endereço completo não foi preenchido.";
		return "falha";
	} else {
		
		//Coleta coordenadas do endereco
		$localidade = geocode($localidade);

		//Caso as coordenadas nao sejam coletadas
		if (count($localidade) != 3) {
			echo "Erro: coordenadas não foram coletadas.";
			return "falha";
		}
	  }

	//Valida hora e data do achado
	if (strlen($arrDados[11]) == 0) {
		echo "Erro: a data não pode ficar em branco.";
		return "falha";
	} elseif (strlen($arrDados[12]) == 0) {
		echo "Erro: a hora não pode ficar em branco.";
		return "falha";
	  }

	$arrDados[11] = date('Y-m-d', strtotime($arrDados[11]));
	$dataHoje = date('Y-m-d');
	$situacao = 1;

	//Tipos dos atributos passados (para validação)
	//i, s, d, b (http://php.net/manual/en/mysqli-stmt.bind-param.php)
	$tiposAtts = "ssissssssis";

	$sql = "INSERT INTO ".$tabReport." (id, idItem, idUsuario, mapsLocal, mapsLat, mapsLng,
		informacao, data, hora, situacao, dataCadastro) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

	//Prepara o statement
	$stmt = $myDb->prepare($sql);

	if(!$stmt){
		//echo 'error: '. $myDb->errno .' - '. $myDb->error;
		echo 'Erro: no statement do Mysql. Item.php:incluirReport()';
		exit;
	}

	//Valida os atributos
	$stmt->bind_param($tiposAtts, $idUnicoReport, $itemSucesso[1], $idUser, $localidade[2], $localidade[0],
		 $localidade[1], $arrDados[13], $arrDados[11], $arrDados[12], $situacao, $dataHoje);

	//Executa o statement
	if ($stmt->execute()){
		return array("sucesso", $idUnicoReport);
	} else {
		//echo '<br/><br/>Error: '. $myDb->errno .' - '. $myDb->error;
		return "falha";
	  }
}//function incluirReport()

// //Método para alterar o item
// function alterarItem($myDb, $idItem, $arrDados){

// 	//$idItem ja' vem validado com validarString()

// 	global $tabItens;

// 	//Valida cada campo passado
// 	$arrDados = validarDadosCadastroItem($arrDados, $idItem);

// 	//Caso haja algum erro na validacao
// 	if ($arrDados == "falha") {
// 		return "falha";
// 	}

// 	$tiposAtts = "sssssiissss";

// 	$sql = "UPDATE ".$tabItens." SET identificador=?, marca=?, titulo=?, descricao=?, caracteristicas=?,
// 	idCategoria=?, idSubcategoria=?, cor1=?, cor2=?, enderFoto=? WHERE id=?";

// 	//Prepara o statement
// 	$stmt = $myDb->prepare($sql);

// 	if(!$stmt){
// 		//echo 'error: '. $myDb->errno .' - '. $myDb->error;
// 		echo '<br>Erro: no statement do Mysql. Item.php:alterarItem()';
// 		exit;
// 	}

// 	//Valida os atributos
// 	$stmt->bind_param($tiposAtts, $arrDados[2], $arrDados[1], $arrDados[0], $arrDados[8], $arrDados[7],
// 		$arrDados[3], $arrDados[4], $arrDados[5], $arrDados[6], $arrDados[9], $idItem);

// 	//Executa o statement
// 	if ($stmt->execute()){
// 		return "sucesso";
// 	} else {
// 		//echo 'error: '. $myDb->errno .' - '. $myDb->error;
// 		return "falha";
// 	  }
// }//function alterarItem()

//Funcao para remover um report do usuariao no bd
function removeReport($myDb, $idReport, $tab){

	$sql = "DELETE FROM ".$tab." WHERE id = ?";

	//Prepara o statement
	$stmt = $myDb->prepare($sql);

	//Checa erros
	if(!$stmt){
		echo 'error: '. $myDb->errno .' - '. $myDb->error;
	}

	//Valida o atributo
	$stmt->bind_param("s", $idReport);

	//Executa o statement
	if ($stmt->execute()) {
		return "sucesso";
	} else {
		echo '<br/><br/>Error: '. $myDb->errno .' - '. $myDb->error;
		return "falha";
	  }
}//removeReport()

//Funcao para coletar os reports do usuariao no bd
function getReportsUsuario($myDb, $idSession, $tab){

	require('nomesTabelas.php');

	//Valida a string
	$id = validarString($idSession);
	$tabReport = validarString($tab);

	$sql = "SELECT r.*, i.titulo FROM ".$tabReport." as r, ".$tabItens." as i WHERE r.idUsuario = ? AND i.id = r.idItem ORDER BY dataCadastro DESC";

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
}//getReportsUsuario()

?>