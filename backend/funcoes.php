<?php

//Função para validar queries strings, assegurando contra Cross-Side Scripting (XSS)
function validarString($qString){

	//Remove tags <>
	$str = strip_tags($qString);

	//Convete caracteres especiais para htmlcode
	$str = htmlspecialchars($str);

	return $str;
}//function validarQString()

//from http://br1.php.net/manual/en/mysqli-stmt.bind-result.php
function fetch($result){
	$array = array();

	if($result instanceof mysqli_stmt){
		$result->store_result();

		$variables = array();
		$data = array();
		$meta = $result->result_metadata();

		while($field = $meta->fetch_field())
			$variables[] = &$data[$field->name];

		call_user_func_array(array($result, 'bind_result'), $variables);

		$i=0;
		while($result->fetch()){
			$array[$i] = array();
			foreach($data as $k=>$v)
				$array[$i][$k] = $v;
			$i++;

		}
	} elseif($result instanceof mysqli_result){
		while($row = $result->fetch_assoc())
			$array[] = $row;
	}

	return $array;
}//fetch()

//Função pincipal para coletar dados do bd
//$attType i, s, d, b (http://php.net/manual/en/mysqli-stmt.bind-param.php)
function getData($myDb, $dbTable, $comparisonBdAtt, $att, $tipoAtt){

	//Postgres
	// $result = pg_prepare($myDb, "query_id", "SELECT * FROM ".$dbTable." WHERE ".$comparisonBdAtt." = $1");
	// $result = pg_execute($myDb, "query_id", array($att));
	// $myArr = pg_fetch_array($result);
	//Essa query coleta dados específicos da tabela passada por argumento
	$sql = "SELECT * FROM `".$dbTable."` WHERE `".$comparisonBdAtt."` = ?";

	//Prepara o statement
	$stmt = $myDb->prepare($sql);

	//Checa erros
	if(!$stmt){
		echo 'error: '. $myDb->errno .' - '. $myDb->error;
	}
	// if (!$myDb->status()){
	// 	die("Sem conexao");
	// }
	

	//Valida o atributo
	$stmt->bind_param($tipoAtt, $att);

	//Executa o statement
	$stmt->execute();

	//Executa o fetch do resultado e atribuí a variável $myArr
	$myArr = fetch($stmt);

	//Retornar os itens encontrados
	return $myArr;
}//function getData()

//Funcao para coletar um perfil no bd
function getPerfil($myDb, $idSession){

	//Carrega nomes das tabelas do bd
	require("nomesTabelas.php");

	global $tabUsuarios;
	global $tabPais;

	//Valida a string
	$id = validarString($idSession);

	$sql = "SELECT * FROM `".$tabUsuarios."` as u, `".$tabPais."` as p WHERE u.id = ? and u.idPais = p.id ORDER BY u.id ASC";
	
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
}//getPerfil()

?>