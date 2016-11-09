<?php

// use PHPUnit\Framework\TestCase;
// require __DIR__."/.."."/funcoes.php";
// require __DIR__."/.."."/nomesTabelas.php";
// require __DIR__."/.."."/default_timezone.php";
require __DIR__."/.."."/Item.php";
	
// class TestesUsuario extends TestCase
class TestesItem extends PHPUnit_Framework_TestCase{

	private $mysqli;
	private $idItem;
	private $dadosForm = ["identificador", "marca", "titulo", "descricao", "caracteristicas", 1, 1, "FFFFFF", "000000", "enderFoto.jpg", 8];

	//Metodo que prepara o ambiente
	public function setUp(){

		//Carrega os dados de bd do phpunit.xml
		$this->mysqli = new mysqli($GLOBALS['dbHost'], $GLOBALS['dbUser'], $GLOBALS['dbPwd'], $GLOBALS['db']);

		//Query para criar a tabela de paises
		$tabelaItensQuery = "CREATE TABLE itens (id varchar(32) NOT NULL,idUsuario int(11) DEFAULT NULL,idRelAchado int(11) DEFAULT NULL,idRelPerdido int(11) DEFAULT NULL,identificador varchar(50) DEFAULT NULL,marca varchar(25) DEFAULT NULL,titulo varchar(30) NOT NULL,descricao text NOT NULL,caracteristicas text NOT NULL,idCategoria int(11) NOT NULL,idSubcategoria int(11) DEFAULT NULL,cor1 varchar(15) NOT NULL,cor2 varchar(15) DEFAULT NULL,enderFoto varchar(40) NOT NULL,dataInsercao date NOT NULL,PRIMARY KEY ( id ))";
		
		//Cria tabela de itens
		$this->mysqli->query($tabelaItensQuery);
	}

	//Metodo para que a tabela seja eliminada ao fim do uso
	public function __destruct(){
		$this->mysqli->query("DROP TABLE itens");
	}

	//Metodo para testar a insercao de um novo item - US adicionar item
	public function testeIncluirItem(){
		
		$varIncluir = incluirItem($this->mysqli, $this->dadosForm);

		//Assert
		$this->assertEquals("sucesso", $varIncluir[0]);
	}

	//Metodo para testar edicao de item - US editar item
	public function testeAlterarItem(){
		
		global $tabItens;

		//Novos dados
		$dadosForm = ["identificador2", "marca2", "titulo2", "descricao2", "caracteristicas2", 1, 1, "CCCCCC", "FFCCEE", "enderFoto.jpg"];

		$this->idItem = incluirItem($this->mysqli, $this->dadosForm)[1];

		//Assert
		$this->assertEquals("sucesso", alterarItem($this->mysqli, $this->idItem, $dadosForm));
	}

	//Metodo para testar edicao de item com uma imagem de extensao nao permitida - US editar item
	public function testeAlterarItemImagemInvalida(){
		
		global $tabItens;

		//Novos dados
		$dadosForm = ["identificador2", "marca2", "titulo2", "descricao2", "caracteristicas2", 1, 1, "CCCCCC", "FFCCEE", array('name' => "Sem título.txt", 'type' => "txt", 'tmp_name' => "C:\Windows\Temp\php47DA.tmp", 'error' => 0, 'size' => 77322)];

		$this->idItem = incluirItem($this->mysqli, $this->dadosForm)[1];

		//Assert
		$this->assertEquals("falha", alterarItem($this->mysqli, $this->idItem, $dadosForm));
	}

	//Metodo para testar remocao de item - US remover item
	public function testeRemoverItemSemReport(){
		
		global $tabItens;

		$this->idItem = incluirItem($this->mysqli, $this->dadosForm)[1];

		//Assert
		$this->assertEquals("sucesso", removeItem($this->mysqli, $this->idItem, "tudo_teste"));
	}
	
}
	
?>