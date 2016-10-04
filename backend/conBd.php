<?

class BaseDados{

	//Função que retorna uma conexão com o banco que tem a tabela de usuários
	static function conBdUser(){
		$dbHost = "localhost";
		$dbUser = "root";
		$dbPwd = "654321";
		$db = "lostandfound";

		return new mysqli($dbHost, $dbUser, $dbPwd, $db);
	}//function objBdUser()

	//Sempre que o script para de rodar, fecha a conexão
	public function __destruct(){
		mysql_close($this->connection);
	}
}


?>