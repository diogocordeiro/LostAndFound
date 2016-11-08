<?php

// use PHPUnit\Framework\TestCase;
require __DIR__."/.."."/Usuario.php";
require __DIR__."/.."."/funcoes.php";
require __DIR__."/.."."/nomesTabelas.php";
require __DIR__."/.."."/default_timezone.php";
	
// class TestesUsuario extends TestCase
class TestesUsuario extends PHPUnit_Framework_TestCase{

	private $mysqli;
	private $dadosForm = ["teste876@teste876.com", "teste567", "teste567", "1995-01-10"];

	//Metodo que prepara o ambiente
	public function setUp(){

		//Carrega os dados de bd do phpunit.xml
		$this->mysqli = new mysqli($GLOBALS['dbHost'], $GLOBALS['dbUser'], $GLOBALS['dbPwd'], $GLOBALS['db']);
 
		//Query para criar a tabela de usuarios
		$tabelaUsuariosQuery = "CREATE TABLE usuarios (id int(11) NOT NULL AUTO_INCREMENT,nome varchar(20) DEFAULT NULL,sobrenome varchar(30) DEFAULT NULL,email varchar(40) NOT NULL,senha varchar(32) NOT NULL,dNascimento date NOT NULL,sexo int(11) DEFAULT NULL,cidade text DEFAULT NULL,idPais int(11) DEFAULT NULL,celular varchar(15) DEFAULT NULL,telefone varchar(15) DEFAULT NULL,facebook varchar(30) DEFAULT NULL,imagemPerfil varchar(32) DEFAULT NULL,situacao int(1) NOT NULL,dataCadastro date NOT NULL,PRIMARY KEY ( id ))";

		//Query para criar a tabela de paises
		$tabelaPaisesQuery = "CREATE TABLE paises (id int(11) NOT NULL,abrev varchar(2) NOT NULL,pais varchar(40) NOT NULL,PRIMARY KEY ( id ))";

		//Cria tabela de usuarios
		$this->mysqli->query($tabelaUsuariosQuery);
		
		//Cria tabela de paises
		$this->mysqli->query($tabelaPaisesQuery);	

		//Adciona o pais de cadastro padrao (id 31)
		$this->mysqli->query("INSERT INTO paises (id, abrev, pais) VALUES (31, 'BR', 'Brazil')");
	}

	//Metodo para que a tabela seja eliminada ao fim do uso
	public function __destruct(){
		$this->mysqli->query("DROP TABLE usuarios");
		$this->mysqli->query("DROP TABLE paises");
	}

	//Metodo para testar a insercao de uma novo usuario - US cadastrar usuario
	public function testeIncluirUsuario(){
		
		$varIncluir = incluirUsuario($this->mysqli, $this->dadosForm);

		//Assert
		$this->assertEquals("sucesso", $varIncluir[count($varIncluir)-1]);
	}

	/**
	* @depends testeIncluirUsuario
	*/
	//Metodo para testar indisponibilidade do e-mail - US cadastrar usuario
	public function testeEmailDisponivel(){

		//Assert
		$this->assertFalse(emailDisponivel($this->mysqli, $this->dadosForm[0]));
	}
	
	/**
	* @depends testeIncluirUsuario
	*/
	//Metodo para testar alteracao de dados do perfil - US editar perfil
	public function testeAlterarPerfil(){

		//Dados para 
		$dadosForm = ["PrimeiroNome", "SegundoNome", "0", "Garanhuns", "BR", "", "", "", "cam.jpg"];

		//Assert
		$this->assertEquals("sucesso", alterarUsuario($this->mysqli, 1, $dadosForm));
	}
	
	/**
	* @depends testeIncluirUsuario
	*/
	//Metodo para testar alteracao de dados do perfil com uma imagem de extensao nao permitida - US editar perfil
	public function testeAlterarPerfilImagemInvalida(){

		//Dados para 
		$dadosForm = array("PrimeiroNome", "SegundoNome", "0", "Garanhuns", "BR", "", "", "", array('name' => "Sem título.txt", 'type' => "txt", 'tmp_name' => "C:\Windows\Temp\php47DA.tmp", 'error' => 0, 'size' => 77322));

		//Assert
		$this->assertEquals("falha", alterarUsuario($this->mysqli, 1, $dadosForm));
	}
}
	
?>