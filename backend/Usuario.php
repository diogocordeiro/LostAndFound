<?
// $postdata = file_get_contents("php://input");
// $request = json_decode($postdata);
// echo $request->name;
// echo $request->email;

// exit;
//Verifica se o tipo do POST foi passado
if (isset($_GET['tipo'])) {

	//Carrega nomes das tabelas do bd
	require("nomesTabelas.php");

	//Carrega funções básicas
	require("funcoes.php");

	//Carrega o banco
	require("conBd.php");

	//Carrega o timezone padrão
	require("default_timezone.php");

	//Valida query string
	$tipo = validarString($_GET['tipo']);

	//POST para inclusão de novo usuário
	if ($tipo == "novo") {
		$arr = [];

		array_push($arr, $_POST['email']);
		array_push($arr, $_POST['senha']);
		array_push($arr, $_POST['confirmaSenha']);
		array_push($arr, $_POST['dNascimento']);

		$sucesso = incluirUsuario(BaseDados::conBdUser(), $arr);

		if ($sucesso) {
			echo "Novo usuário inserido com sucesso!";
			exit;
		} else {
			echo "Erro: usuário não cadastrado!";
			exit;
		  }

	//POST para alteração do usuário
	} elseif ($tipo == "edita") {
		$idUsuario = validarString($_GET['id']);
		alterarUsuario(BaseDados::conBdUser(), $idUsuario, $arrDados);

	//POST para desativação da conta do usuário
	} elseif ($tipo == "desativa") {
		$idUsuario = validarString($_GET['id']);
		desativarUsuario(BaseDados::conBdUser(), $idUsuario);
	}
} else {
	echo "Defina o tipo do POST";
  }

//Função para checar a disponibilidade do e-mail
function emailDisponivel($email){
	
	global $tabUsuarios;

	//Nome do atributo e-mail na tabela
	$nomeAttEmail = "email";

	//Tenta coletar o usuário com o e-mail passado
	$myUser = getData(BaseDados::conBdUser(), $tabUsuarios, $nomeAttEmail, $email, "s");

	//Caso o e-mail já exista retorna falso
	if(count($myUser) > 0){
		return false;
	} else {
		return true;
	  }
} //function emailDisponivel()

//Método para incluir o usuário
function incluirUsuario($myDb, $arrDados){

	global $tabUsuarios;

	//Valida cada campo passado
	validarDadosCadastro($arrDados);

	//Checa se o e-mail informado está disponível
	if(!emailDisponivel($arrDados[0])){
		echo "Erro: e-mail indisponível.";
		exit;
	} 

	$arrDados[3] = date('Y-m-d', strtotime($arrDados[3]));
	$arrDados[1] = md5($arrDados[1]);

	//Situacao inicial dos usuários
	$situacao = 1;

	//Tipos dos atributos passados (para validação)
	//i, s, d, b (http://php.net/manual/en/mysqli-stmt.bind-param.php)
	$tiposAtts = "sssi";

	$sql = "INSERT INTO ".$tabUsuarios." (email, senha, dNascimento, situacao) VALUES (?, ?, ?, ?)";

	//Prepara o statement
	$stmt = $myDb->prepare($sql);

	if(!$stmt){
		echo 'error: '. $myDb->errno .' - '. $myDb->error;
	}

	//Valida os atributos
	$stmt->bind_param($tiposAtts, $arrDados[0], $arrDados[1], $arrDados[3], $situacao);

	//Executa o statement
	return $stmt->execute();
}//function incluirUsuario()

//Função para validar todos os campos passados nos formulários de cadastro
function validarDadosCadastro($arrDados){

	for ($i=0; $i < count($arrDados); $i++) { 
		
		//Valida contra XSS
		$arrDados[$i] = validarString($arrDados[$i]);

		//Valida campos em branco
		if ($i == 0 && strlen($arrDados[$i]) == 0) {
			echo "Erro: E-mail não pode ficar vazio.";
			exit;
		} elseif ($i == 1 && strlen($arrDados[$i]) == 0) {
			echo "Erro: senha não pode ficar vazia.";
			exit;
		  } elseif ($arrDados[1] != $arrDados[2]) {
		  		echo "Erro: as senhas devem ser iguais.";
				exit;
		    } elseif ($i == 3 && strlen($arrDados[$i]) == 0) {
		  		echo "Erro: Data de nascimento não pode ficar vazia.";
				exit;
		  	  }
	}//for
}//validarDadosCadastro()

//Método para alterar o usuário
function alterarUsuario($myDb, $idUsuario, $arrDados){

}//function alterarUsuario()

//Método para desativar o usuário
function desativarUsuario($myDb, $idUsuario){

}//function desativarUsuario()


?>