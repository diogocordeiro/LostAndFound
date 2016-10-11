$(document).ready(function() {
	$("#btnCadastrarUsuario").click(function() {

		var emailP = $("#email").val();
		var senhaP = $("#senha").val();
		var confirmaSenhaP = $("#confirmaSenha").val();
		var dNascimentoP = $("#dNascimento").val();
		  
		$.post("/templates/backend/usuario.php?tipo=novo", {email: emailP, senha: senhaP, confirmaSenha: confirmaSenhaP, dNascimento: dNascimentoP},
		function(response){
		 $(".resultados").html(response);
		 }
		 , "html");
	});
});
