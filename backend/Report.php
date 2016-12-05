<?php

//Verifica se o tipo do POST foi passado
if (isset($_GET['tipo'])) {

	//Valida query string
	$tipo = validarString2($_GET['tipo']);

	//POST para inclusão de novo report
	if ($tipo == "novoReport") {

		$controleItemExistente = false;

		$report = validarString2($_GET['report']);

		if (strlen($report) == 0) {
			echo "Erro: informar o tipo de report.";
			exit;
		}

		//Verifica se esta' adicionando um item ja' existente
		if ($_POST['idItemExistente'] != "") {
			$controleItemExistente = true;
		} 

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

		if ($controleItemExistente) {
			$sucesso = incluirReport(BaseDados::conBdUser(), $arr, $_POST['autocomplete'], $report, $_POST['idItemExistente']);
		} else {
			$sucesso = incluirReport(BaseDados::conBdUser(), $arr, $_POST['autocomplete'], $report);
		  }

		//Caso o report seja inserido
		if ($sucesso[0] == "sucesso") {

			echo "Novo relatório inserido com sucesso!";
		} else {
			echo "<br/>Erro: relatório não inserido!";
		  }

	//POST para alteração do reports
	} elseif ($tipo == "editaReport") {

		//Carrega a pagina de itens
		require("Item.php");

		//Valida contra XSS
		$idSession = validarString($_POST['idSession']);
		$idReport = validarString($_POST['idReport']);
		$report = validarString($_POST['report']);

		if (strlen($report) == 0) {
			echo "Erro: informar o tipo de report.";
			exit;
		}

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

			//Adiciona id do usuario que esta' editando o item
			array_push($arr, $_SESSION['Lost_Found']["id"]); #10

			array_push($arr, $_POST['dataItem']); #11
			array_push($arr, $_POST['horaItem']); #12
			array_push($arr, $_POST['informacao']); #13

			$sucesso = alterarReport(BaseDados::conBdUser(), $idReport, $arr, $_POST['autocomplete'], $report);

			if ($sucesso == "sucesso") {
				echo "Atualizado!";
			} else {
				echo "Não atualizado!";
			  }

		} else {
			echo "Erro: Report não encontrado.";
		  }
		
	//POST para procurar reports
	} elseif ($tipo == "procuraReport") {
		
		require('conBd.php');

		//
		if (isset($_POST['stringBusca']) && isset($_POST['filtroBusca'])) {
			
			require('funcoes.php');
			require('nomesTabelas.php');

			//Procura por reports
			$resultatos = procurarReports(BaseDados::conBdUser(), $_POST['stringBusca'], $_POST['filtroBusca']);

			//Imprime resultado
			imprimeResultados(BaseDados::conBdUser(), $resultatos);
		}

	}//if procuraReport
}//if isset($_GET['tipo'])

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
		$idMeuItem = validarString2($idItemExistente);

		//Para atualizar o id do report do item
		if (updateItemReport($myDb, $idMeuItem, $idUnicoReport, $tabReport) != "sucesso") {
			echo "Erro: falha ao alterar o item.";
			return "falha";
		}
		
		//Garante que o id tem 32 bits
		if (strlen($idMeuItem) > 31) {
			$itemSucesso = array("sucesso", $idMeuItem);
		}
		
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

	$arrDados[11] = date('Y-m-d', strtotime($arrDados[11])); //Formata a data
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

//Método para alterar o report
function alterarReport($myDb, $idReport, $arrDados, $endCompleto, $tipoReport){

	//$idReport ja' vem validado com validarString()

	global $tabAchados;
	global $tabPerdidos;

	$dados = [];
	$achados = getReport($myDb, $idReport, $tabAchados);
	$perdidos = getReport($myDb, $idReport, $tabPerdidos);

	if (count($achados) > 0) {
		$dados = $achados;
	} elseif (count($perdidos) > 0) {
		$dados = $perdidos;
	}

	//Altera o item passado
	$itemSucesso = alterarItem($myDb, $dados[0]['idItem'], $arrDados);

	//Caso o item nao seja inserido com sucesso
	if($itemSucesso != "sucesso") {
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

	$arrDados[11] = date('Y-m-d', strtotime($arrDados[11])); //Formata a data

	//Seleciona tabela correta e seta o devido id para tabela de itens
	if ($tipoReport == "achado") {
		$tabReport = $tabAchados;
	} else {
		$tabReport = $tabPerdidos;
	  }

	$tiposAtts = "sssssss";

	$sql = "UPDATE ".$tabReport." SET mapsLocal=?, mapsLat=?, mapsLng=?, informacao=?,
	 data=?, hora=? WHERE id=?";

	//Prepara o statement
	$stmt = $myDb->prepare($sql);

	if(!$stmt){
		//echo 'error: '. $myDb->errno .' - '. $myDb->error;
		echo '<br>Erro: no statement do Mysql. Item.php:alterarReport()';
		exit;
	}

	//Valida os atributos
	$stmt->bind_param($tiposAtts, $localidade[2], $localidade[0], $localidade[1], $arrDados[13],
	 $arrDados[11], $arrDados[12], $idReport);

	//Executa o statement
	if ($stmt->execute()){
		return "sucesso";
	} else {
		//echo 'error: '. $myDb->errno .' - '. $myDb->error;
		return "falha";
	  }
}//function alterarReport()

//Funcao para remover um report do usuariao no bd
function removeReport($myDb, $idReport, $tab, $idItem=null){

	//Remove referencia do item com o report
	if ($idItem != null && resetIdReportItem($myDb, $idItem, $tab) != "sucesso") {
		return "falha";
	}

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
		//echo '<br/><br/>Error: '. $myDb->errno .' - '. $myDb->error;
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

//Funcao para coletar um report
function getReport($myDb, $idReport, $tab){

	require('nomesTabelas.php');

	//Valida a string
	$id = validarString($idReport);
	$tabReport = validarString($tab);

	//Para saber o atributo do item ao qual sera' comparado
	if (strcmp($tabReport, $tabAchados) == 0) {
		$atributoItem = "i.idRelAchado";
	} elseif (strcmp($tabReport, $tabPerdidos) == 0) {
		$atributoItem = "i.idRelPerdido";
	  } else {
	  		echo "Erro: tabela de Item inexistente - getReport()";
	  		return null;
	    }

	$sql = "SELECT r.*, i.idRelAchado, i.idRelPerdido, i.identificador, i.marca, 
	i.titulo, i.descricao, i.caracteristicas, i.idCategoria, i.idSubcategoria, i.cor1, i.cor2, 
	i.enderFoto, i.dataInsercao FROM ".$tabReport." as r, ".$tabItens.
	" as i WHERE r.id = ? AND ".$atributoItem." = r.id ORDER BY r.dataCadastro DESC";

	//Prepara o statement
	$stmt = $myDb->prepare($sql);

	//Checa erros
	if(!$stmt){
		echo 'error: '. $myDb->errno .' - '. $myDb->error;
	}

	//Valida o atributo
	$stmt->bind_param("s", $id);

	//Executa o statement
	$stmt->execute();

	//Executa o fetch do resultado e atribuí a variável $myArr
	$myArr = fetch($stmt);

	//Retornar os itens encontrados
	return $myArr;
}//getReport()

//Funcao que procura reports
function procurarReports($myDb, $string, $filtro){

	global $tabAchados;
	global $tabPerdidos;
	global $tabItens;

	//Valida a string
	$string = validarString2($string);
	$filtro = validarString2($filtro);

	if (strlen($string) < 1) {
		echo "Erro: informar algo para ser buscado.";
		return "falha";
	}

	if (strlen($filtro) < 1) {
		echo "Erro: informar o filtro.";
		return "falha";
	}

	//Busca por data
	if (strcmp($filtro, "data") == 0) {

		//Busca na tabela de achados
		$resultatosBusca = searchData($myDb, $tabAchados, "data", $string, "s");
		
		//Busca na tabela de perdidos
		$temp = searchData($myDb, $tabPerdidos, "data", $string, "s");
		
		for ($i=0; $i<count($temp); $i++) { 
			array_push($resultatosBusca, $temp[$i]);
		}
		
		return $resultatosBusca;
	
	//Busca por local de marcacao
	} elseif (strcmp($filtro, "local") == 0) {

		//Busca na tabela de achados
		$resultatosBusca = searchData($myDb, $tabAchados, "mapsLocal", $string, "s");
		
		//Busca na tabela de perdidos
		$temp = searchData($myDb, $tabPerdidos, "mapsLocal", $string, "s");
		
		for ($i=0; $i<count($temp); $i++) { 
			array_push($resultatosBusca, $temp[$i]);
		}
		
		return $resultatosBusca;
	  
	  //Busca por titulo do item
	  } elseif (strcmp($filtro, "titulo") == 0) {
			return seachTabelaItens($myDb, $tabItens, "titulo", $string, "s");
			
		//Busca por marca do item
		} elseif (strcmp($filtro, "marca") == 0) {
			return seachTabelaItens($myDb, $tabItens, "marca", $string, "s");
	      
	      //Busca por identificador do item
		  } elseif (strcmp($filtro, "identificador") == 0) {
				return seachTabelaItens($myDb, $tabItens, "identificador", $string, "s");
	        }

}//procurarReports()

//Funcao para procurar na tabela de itens e retornar apenas itens que estao em reports
function seachTabelaItens($myDb, $tabItens, $atributo, $string, $tiposAtts){
	
	global $tabAchados;
	global $tabPerdidos;

	$resultatosBusca = [];

	//Primeiro pesquisa o titulo do item no bd
	$temp = searchData($myDb, $tabItens, $atributo, $string, $tiposAtts);

	//Segundo verifica quais desses itens estao em reports
	for ($i=0; $i<count($temp); $i++) { //Terceiro coleta os dados de cada report
		
		if (strcmp($temp[$i]['idRelAchado'], "0") != 0) {
			array_push($resultatosBusca, searchData($myDb, $tabAchados, "id", $temp[$i]['idRelAchado'], "s")[0]);
		}

		if (strcmp($temp[$i]['idRelPerdido'], "0") != 0) {
			array_push($resultatosBusca, searchData($myDb, $tabPerdidos, "id", $temp[$i]['idRelPerdido'], "s")[0]);
		}
	}

	return $resultatosBusca;
}//seachTabelaItens()

//Metodo para imprimir os resultados das buscas
function imprimeResultados($myDb, $resultatos){

	global $tabAchados;
	global $tabPerdidos;

	if (count($resultatos) < 1) {
		echo "Nenhum Report foi encontrado.";
	
	} else {
		echo "<strong>".count($resultatos)."</strong> Report(s) encontrado(s).<br/><br/>";

		for ($i=0; $i<count($resultatos); $i++) { 
			
			$dados = [];
            $achados = getReport($myDb, $resultatos[$i]['id'], $tabAchados);
            $perdidos = getReport($myDb, $resultatos[$i]['id'], $tabPerdidos);
            
            if (count($achados) > 0) {
              $dados = $achados;
              $tituloTipo = "Achado";
            } elseif (count($perdidos) > 0) {
                $dados = $perdidos;
                $tituloTipo = "Perdido";
              }

            echo "<div id='div-resultados'><a href='report.php?id=".$dados[0]['id']."'>".$dados[0]['titulo']."</a><br/>".$dados[0]['marca']."<br/>Local: ".$dados[0]['mapsLocal']."</div>";
		}//for
	  }
}//imprimeResultados()

?>