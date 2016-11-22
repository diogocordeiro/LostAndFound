<?php

// require __DIR__."/.."."/funcoes.php";
// require __DIR__."/.."."/nomesTabelas.php";
// require __DIR__."/.."."/default_timezone.php";
// require __DIR__."/.."."/Item.php";
require __DIR__."/.."."/Report.php";
	
class TestesReport extends PHPUnit_Framework_TestCase{

	private $mysqli;
	private $idReport;
	private $dadosForm = ["titulo", "marca", "identificador", 1, 2, "FFFFFF", "000000", "caracteristicas", "descricao",  "enderFoto.jpg", 1, "2016-11-22", "14h35", "informacao"];
	private $endCompleto = "Av. Bom Pastor - Boa Vista, Garanhuns - PE, Brazil";

	//Metodo que prepara o ambiente
	public function setUp(){

		//Carrega os dados de bd do phpunit.xml
		$this->mysqli = new mysqli($GLOBALS['dbHost'], $GLOBALS['dbUser'], $GLOBALS['dbPwd'], $GLOBALS['db']);

		//Query para criar a tabela de itens
		//$tabelaItensQuery = "CREATE TABLE itens (id varchar(32) NOT NULL,idUsuario int(11) DEFAULT NULL,idRelAchado varchar(32) DEFAULT NULL,idRelPerdido varchar(32) DEFAULT NULL,identificador varchar(50) DEFAULT NULL,marca varchar(25) DEFAULT NULL,titulo varchar(30) NOT NULL,descricao text NOT NULL,caracteristicas text NOT NULL,idCategoria int(11) NOT NULL,idSubcategoria int(11) DEFAULT NULL,cor1 varchar(15) NOT NULL,cor2 varchar(15) DEFAULT NULL,enderFoto varchar(40) NOT NULL,dataInsercao date NOT NULL,PRIMARY KEY ( id ))";
		
		//Query para criar a tabela de reports achados
		$tabelaReports1Query = "CREATE TABLE relatorios_achados (id varchar(32) NOT NULL,idItem varchar(32) NOT NULL,idUsuario int(11) NOT NULL,mapsLocal varchar(100) NOT NULL,mapsLat float NOT NULL,mapsLng float NOT NULL,informacao text,data date NOT NULL,hora varchar(10) NOT NULL,situacao int(1) NOT NULL,dataCadastro date NOT NULL, PRIMARY KEY (id))";
		
		//Query para criar a tabela de reports perdidos
		$tabelaReports2Query = "CREATE TABLE relatorios_perdidos (id varchar(32) NOT NULL,idItem varchar(32) NOT NULL,idUsuario int(11) NOT NULL,mapsLocal varchar(100) NOT NULL,mapsLat float NOT NULL,mapsLng float NOT NULL,informacao text,data date NOT NULL,hora varchar(10) NOT NULL,situacao int(1) NOT NULL,dataCadastro date NOT NULL, PRIMARY KEY (id))";
		
		//Cria tabelas
		//$this->mysqli->query($tabelaItensQuery);
		$this->mysqli->query($tabelaReports1Query);
		$this->mysqli->query($tabelaReports2Query);
	}

	//Metodo para que a tabela seja eliminada ao fim do uso
	public function __destruct(){
		$this->mysqli->query("DROP TABLE relatorios_achados");
		$this->mysqli->query("DROP TABLE relatorios_perdidos");
		//$this->mysqli->query("DROP TABLE itens");
	}

	//Metodo para testar a insercao de um novo report achado - US reportar achado
	public function testeReportarAchado(){
		
		$varIncluir = incluirReport($this->mysqli, $this->dadosForm, $this->endCompleto, "achado");

		//Assert
		$this->assertEquals("sucesso", $varIncluir[0]);
	}

	//Metodo para testar a insercao de um novo report perdido - US reportar perdido
	public function testeReportarPerdido(){
		
		$varIncluir = incluirReport($this->mysqli, $this->dadosForm, $this->endCompleto, "perdido");

		//Assert
		$this->assertEquals("sucesso", $varIncluir[0]);
	}

	//Metodo para testar remocao de reports - US remover reports (achado)
	public function testeRemoverItemSemReportAchado(){
		
		global $tabAchados;

		$this->idReport = incluirReport($this->mysqli, $this->dadosForm, $this->endCompleto, "achado")[1];

		//Assert
		$this->assertEquals("sucesso", removeReport($this->mysqli, $this->idReport, $tabAchados));

		// $teste = getData($this->mysqli, $tabAchados, "id", $this->idReport, "s");
		// print_r($teste);
	}

	//Metodo para testar remocao de reports - US remover reports (perdido)
	public function testeRemoverItemSemReportPerdido(){
		
		global $tabPerdidos;

		$this->idReport = incluirReport($this->mysqli, $this->dadosForm, $this->endCompleto, "perdido")[1];

		//Assert
		$this->assertEquals("sucesso", removeReport($this->mysqli, $this->idReport, $tabPerdidos));

		// $teste = getData($this->mysqli, $tabPerdidos, "id", $this->idReport, "s");
		// print_r($teste);	
	}
	
}
	
?>