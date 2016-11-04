<?php

function getPerfil($myDb, $idSession){
	
	//Carrega funções básicas
	require("funcoes.php");

	//Carrega nomes das tabelas do bd
	require("nomesTabelas.php");

	global $tabUsuarios;
	global $tabPais;

	//Valida as strings
	$id = validarString($idSession);

	$sql = "SELECT * FROM `".$tabUsuarios."` as u, `".$tabPais."` as p WHERE u.id = ? and u.idPais = p.id ORDER BY u.id ASC";
	
	//Prepara o statement
	$stmt = $myDb->prepare($sql);

	//Checa erros
	if(!$stmt){
		echo 'error: '. $myDb->errno .' - '. $myDb->error;
	}

	//Validas o atributo
	$stmt->bind_param("i", $id);

	//Executa o statement
	$stmt->execute();

	//Executa o fetch do resultado e atribuí a variável $myArr
	$myArr = fetch($stmt);

	//Retornar apenas um item
	return $myArr;
}

?>