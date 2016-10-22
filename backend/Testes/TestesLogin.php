<?php

// use PHPUnit\Framework\TestCase;
// require __DIR__."/.."."/Usuario.php";
// require __DIR__."/.."."/funcoes.php";
// require __DIR__."/.."."/nomesTabelas.php";
// require __DIR__."/.."."/default_timezone.php";
require __DIR__."/.."."/login.php";
	
// class TestesUsuario extends TestCase
class TestesLogin extends PHPUnit_Framework_TestCase{

	private $mysqli;
	private $dadosForm = ["teste876@teste876.com", "teste567", "teste567", "1995-01-10"];

	//Funcao que prepara o ambiente
	public function setUp(){

		//Carrega os dados de bd do phpunit.xml
		$this->mysqli = new mysqli($GLOBALS['dbHost'], $GLOBALS['dbUser'], $GLOBALS['dbPwd'], $GLOBALS['db']);

		//Query para criar a tabela de usuarios
		$tabelaUsuariosQuery = "CREATE TABLE usuarios (id int(11) NOT NULL AUTO_INCREMENT,nome varchar(20) DEFAULT NULL,sobrenome varchar(30) DEFAULT NULL,email varchar(40) NOT NULL,senha varchar(32) NOT NULL,dNascimento date NOT NULL,situacao int(1) NOT NULL,PRIMARY KEY ( id ))";

		//Cria tabela de usuarios
		$this->mysqli->query($tabelaUsuariosQuery);
	}

	//Funcao para que a tabela seja eliminada ao fim do uso
	public function __destruct(){
		$this->mysqli->query("DROP TABLE usuarios");
	}

	//Funcao para testar login (legitimidade dos dados)
	public function testeFazLogin(){

		// incluirUsuario($this->mysqli, $this->dadosForm);
		//Assert
		$this->assertEquals("sucesso", fazLogin($this->mysqli, $this->dadosForm[0], $this->dadosForm[1]));
	}

	//Funcao para testar login com um e-mail invalido e uma senha invalida
	public function testeFazLoginInexistente(){
		
		//Assert
		$this->assertEquals("invalido", fazLogin($this->mysqli, "a", "a"));
	}

	//Funcao para testar login com um e-mail invalido e uma senha valida
	public function testeFazLoginEmailInexistente(){
		
		//Assert
		$this->assertEquals("invalido", fazLogin($this->mysqli, "a", $this->dadosForm[1]));
	}

	//Funcao para testar login com um e-mail valido e uma senha invalida
	public function testeFazLoginSenhaInexistente(){
		
		//Assert
		$this->assertEquals("invalido", fazLogin($this->mysqli, $this->dadosForm[0], "a"));
	}

}
	
?>