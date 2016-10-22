<?php

// use PHPUnit\Framework\TestCase;
require __DIR__."/.."."/Usuario.php";
require __DIR__."/.."."/funcoes.php";
require __DIR__."/.."."/nomesTabelas.php";
require __DIR__."/.."."/default_timezone.php";
	
// class TestesUsuario extends TestCase
class TestesUsuario extends PHPUnit_Framework_TestCase{

	private $mysqli;
	private $dadosForm = ["teste567@teste567.com", "teste567", "teste567", "1995-01-10"];

	//Funcao que prepara o ambiente
	public function setUp(){

		//Carrega os dados de bd do phpunit.xml
		$this->mysqli = new mysqli($GLOBALS['dbHost'], $GLOBALS['dbUser'], $GLOBALS['dbPwd'], $GLOBALS['db']);

		//Query para criar a tabela de usuarios
		$tabelaUsuariosQuery = "CREATE TABLE usuarios (id int(11) NOT NULL AUTO_INCREMENT,nome varchar(20) DEFAULT NULL,sobrenome varchar(30) DEFAULT NULL,email varchar(40) NOT NULL,senha varchar(32) NOT NULL,dNascimento date NOT NULL,situacao int(1) NOT NULL,PRIMARY KEY ( id ))";

		//Cria tabela de usuarios
		$this->mysqli->query($tabelaUsuariosQuery);
	}

	//Funcao para que a tabela seja eliminada pelo garbage collector
	public function tearDown(){
		$this->mysqli->query("DROP TABLE usuarios");
	}

	//Funcao para testar a insercao de uma novo usuario
	public function testeIncluirUsuario(){

		//Assert
		$$this->assertEquals(1, incluirUsuario($this->mysqli, $this->dadosForm));
	}

	/**
	* @depends testeIncluirUsuario
	*/
	//Funcao para testar indisponibilidade do e-mail
	public function testeIncluirUsuarioEmailJaEmUso(){

		//Assert
		$this->assertEquals("", incluirUsuario($this->mysqli, $this->dadosForm));
	}
}
	
?>