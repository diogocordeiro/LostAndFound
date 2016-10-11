<?

class BaseDados{

	// static function conBdUser(){
	// 	$dbhost = "localhost";
	// 	$dbuser = "postgres";
	// 	$db = "lostandfound";
	// 	$dbport = "5432";

	// 	return pg_connect("host=localhost port=5432 dbname=lostandfound user=postgres"); 
	// }
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
		//pg_close($this);
	}

	
	//conBdUser();

}
//$oi = pg_connect("host=localhost port=5432 dbname=lostandfound user=postgres");
// $minhaConexao = BaseDados::conBdUser();
// require("funcoes.php");
// $myUser = getData(BaseDados::conBdUser(), "usuarios", "email", "paulinelym@gmail.com");
// print count($myUser);
// $id = 1;
// $query_id = "query_id1";
// $result = pg_prepare($minhaConexao, $query_id, "SELECT * FROM usuarios WHERE id = $1");
// $result = pg_execute($minhaConexao, $query_id, array(1));
// while ($row = pg_fetch_array($result)) { //ou "pg_fetch_array($result, PGSQL_ASSOC)". Vai fazer o array de retorno ser mapeado para o mesmo label da coluna, igual a mysql(i)_fetch_array
// 	 echo "data: ".$row[3]; 
// } 


?>