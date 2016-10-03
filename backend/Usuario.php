<?

//Nome das tabelas no bd
$tUsuarios = "usuarios";
$tItens = "itens";

//Verifica se o tipo do POST foi passado
if (isset($_GET['tipo'])) {

	//Carrega funções básicas
	require("funcoes.php");

	//Carrega o banco
	require("conBd.php");

	//Carrega o timezone padrão
	require("default_timezone.php");

	//Valida query string
	$tipo = validarQString($_GET['tipo']);

	//POST para inclusão de novo usuário
	if ($tipo == "novo") {
		incluirUsuario(BaseDados::conBdUser(), $arrDados);

	//POST para alteração do usuário
	} elseif ($tipo == "edita") {
		$idUsuario = validarQString($_GET['id']);
		alterarUsuario(BaseDados::conBdUser(), $idUsuario, $arrDados);

	//POST para desativação da conta do usuário
	} elseif ($tipo == "desativa") {
		$idUsuario = validarQString($_GET['id']);
		desativarUsuario(BaseDados::conBdUser(), $idUsuario);
	}
} else {
	echo "Defina o tipo do POST";
  }

//Função para checar a disponibilidade do e-mail
function emailDisponivel($email){

	//Nome do atributo e-mail na tabela
	$nomeAttEmail = "email";

	//Tenta coletar o usuário com o e-mail passado
	$myUser = getData(BaseDados::conBdUser(), $tUsuarios, $nomeAttEmail, $email, 's');

	//Caso o e-mail já exista retorna falso
	if(count($myUser) > 0){
		return false;
	} else {
		return true;
	  }
} //function emailDisponivel()

//Método para incluir o usuário
function incluirUsuario($myDb, $arrDados){

	//Tipos dos atributos passados (para validação)
	//i, s, d, b (http://php.net/manual/en/mysqli-stmt.bind-param.php)
	$tiposAtts = "sssssssssssss";

	$sql = "INSERT INTO ".$tUsuarios." (firstName, lastName, dob, email, pwd, country,
		state, city, vType, status, level, dos, dola) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

	//Prepara o statement
	$stmt = $myDb->prepare($sql);

	if(!$stmt){
		echo 'error: '. $myDb->errno .' - '. $myDb->error;
	}

	//Valida os atributos
	$stmt->bind_param($tiposAtts, $firstName, $lastName, $dob, $email, $pwd, $country,
		$state, $city, $vType, $status, $level, $dos, $dola);

	//Executa o statement
	$stmt->execute();
}//function incluirUsuario()

//Método para alterar o usuário
function alterarUsuario($myDb, $idUsuario, $arrDados){

}//function alterarUsuario()

//Método para desativar o usuário
function desativarUsuario($myDb, $idUsuario){

}//function desativarUsuario()


?>