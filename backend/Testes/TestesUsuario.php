<?php

// use PHPUnit\Framework\TestCase;
require __DIR__."/.."."/Usuario.php";
require __DIR__."/.."."/funcoes.php";
require __DIR__."/.."."/nomesTabelas.php.php";
require __DIR__."/.."."/default_timezone.php";
	
// class TestesUsuario extends TestCase
class TestesUsuario extends PHPUnit_Framework_TestCase{
	/**
	* @var mysqli
	*/
	private $mysqli;

	public function setUp(){

		//Carrega os dados de bd do phpunit.xml
		$this->mysqli = new mysqli($GLOBALS['dbHost'], $GLOBALS['dbUser'], $GLOBALS['dbPwd'], $GLOBALS['db']);

		//Query para criar a tabela de usuarios
		$tabelaUsuariosQuery = "create TABLE usuarios (id int(11) NOT NULL AUTO_INCREMENT,nome varchar(20) DEFAULT NULL,sobrenome varchar(30) DEFAULT NULL,email varchar(40) NOT NULL,senha varchar(32) NOT NULL,dNascimento date NOT NULL,situacao int(1) NOT NULL,PRIMARY KEY ( id ))";

		//Cria tabela de usuarios
		$this->mysqli->query($tabelaUsuariosQuery);
	}

	//Funcao para testar a insercao de uma novo usuario
	public function testeIncluirUsuario(){
		$dadosForm = ["teste123@teste123.com", "teste123", "teste123", "1995-01-10"];

		//Assert
		$this->assertEquals("Novo usuário inserido com sucesso!", incluirUsuario($this->mysqli, $dadosForm));
	}

	//Funcao para testar indisponibilidade do e-mail
	public function testeIncluirUsuarioEmailJaEmUso(){
		$dadosForm = ["teste123@teste123.com", "111111", "111111", "1989-06-30"];

		//Assert
		$this->assertEquals("Erro: e-mail indisponível.", incluirUsuario($this->mysqli, $dadosForm));
	}
}
	
?>