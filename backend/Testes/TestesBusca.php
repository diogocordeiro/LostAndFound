<?php

// require __DIR__."/.."."/funcoes.php";
// require __DIR__."/.."."/nomesTabelas.php";
// require __DIR__."/.."."/default_timezone.php";
// require __DIR__."/.."."/Item.php";
// require __DIR__."/.."."/Report.php";

class TestesBusca extends PHPUnit_Framework_TestCase{

	private $mysqli;
	private $idReport;
	private $dadosForm = ["Iphone", "Apple", "az1234567890", 1, 2, "FFFFFF", "000000", "caracteristicas", "descricao",  "enderFoto.jpg", 1, "2016-11-22", "14h35", "informacao"];
	private $endCompleto = "Rua Paissandú - São Francisco, Caruaru - PE, Brasil";


	//Metodo que prepara o ambiente
	public function setUp(){

		//Carrega os dados de bd do phpunit.xml
		$this->mysqli = new mysqli($GLOBALS['dbHost'], $GLOBALS['dbUser'], $GLOBALS['dbPwd'], $GLOBALS['db']);

		//Query para criar a tabela de itens
		// $tabelaItensQuery = "CREATE TABLE itens (id varchar(32) NOT NULL,idUsuario int(11) DEFAULT NULL,idRelAchado varchar(32) DEFAULT NULL,idRelPerdido varchar(32) DEFAULT NULL,identificador varchar(50) DEFAULT NULL,marca varchar(25) DEFAULT NULL,titulo varchar(30) NOT NULL,descricao text NOT NULL,caracteristicas text NOT NULL,idCategoria int(11) NOT NULL,idSubcategoria int(11) DEFAULT NULL,cor1 varchar(15) NOT NULL,cor2 varchar(15) DEFAULT NULL,enderFoto varchar(40) NOT NULL,dataInsercao date NOT NULL,PRIMARY KEY ( id ))";
		
		//Query para criar a tabela de reports achados
		$tabelaReports1Query = "CREATE TABLE relatorios_achados (id varchar(32) NOT NULL,idItem varchar(32) NOT NULL,idUsuario int(11) NOT NULL,mapsLocal varchar(100) NOT NULL,mapsLat float NOT NULL,mapsLng float NOT NULL,informacao text,data date NOT NULL,hora varchar(10) NOT NULL,situacao int(1) NOT NULL,dataCadastro date NOT NULL, PRIMARY KEY (id))";
		
		//Query para criar a tabela de reports perdidos
		$tabelaReports2Query = "CREATE TABLE relatorios_perdidos (id varchar(32) NOT NULL,idItem varchar(32) NOT NULL,idUsuario int(11) NOT NULL,mapsLocal varchar(100) NOT NULL,mapsLat float NOT NULL,mapsLng float NOT NULL,informacao text,data date NOT NULL,hora varchar(10) NOT NULL,situacao int(1) NOT NULL,dataCadastro date NOT NULL, PRIMARY KEY (id))";
		
		//Cria tabelas
		// $this->mysqli->query($tabelaItensQuery);
		$this->mysqli->query($tabelaReports1Query);
		$this->mysqli->query($tabelaReports2Query);
	}

	//Metodo para que a tabela seja eliminada ao fim do uso
	public function __destruct(){
		$this->mysqli->query("DROP TABLE relatorios_achados");
		$this->mysqli->query("DROP TABLE relatorios_perdidos");
		// $this->mysqli->query("DROP TABLE itens");
	}

	//Metodo para testar procura de reports por local
	public function testeProcurarReportPorLocal(){
		
		incluirReport($this->mysqli, $this->dadosForm, $this->endCompleto, "achado");

		$busca = procurarReports($this->mysqli, "Paissandú", "local");

		//Assert
		$this->assertEquals(1, count($busca));
	}

	//Metodo para testar procura de reports por data
	public function testeProcurarReportPorData(){

		$busca = procurarReports($this->mysqli, "2016", "data");

		//Assert
		$this->assertEquals(1, count($busca));
	}

	//Metodo para testar procura de reports por titulo
	public function testeProcurarReportPorTitulo(){

		$busca = procurarReports($this->mysqli, "Iphone", "titulo");

		//Assert
		$this->assertEquals(1, count($busca));
	}

	//Metodo para testar procura de reports por identificador
	public function testeProcurarReportPorIdentificador(){

		$busca = procurarReports($this->mysqli, "az1234567890", "identificador");

		//Assert
		$this->assertEquals(1, count($busca));
	}
	
	//Metodo para testar procura de reports por marca
	public function testeProcurarReportPorMarca(){

		$busca = procurarReports($this->mysqli, "Apple", "marca");

		//Assert
		$this->assertEquals(1, count($busca));
	}	

	//Metodo para testar procura de reports por marca que nao existe
	public function testeProcurarReportPorMarcaInexistente(){

		$busca = procurarReports($this->mysqli, "Swiss Legend", "marca");

		//Assert
		$this->assertEquals(0, count($busca));
	}
	
}
	
?>