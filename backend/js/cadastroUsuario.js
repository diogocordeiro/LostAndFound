$(document).ready(function() {
	$("#btnCadastrarUsuario").click(function() {

		var emailP = $("#email").val();
		var senhaP = $("#senha").val();
		var confirmaSenhaP = $("#confirmaSenha").val();
		var dNascimentoP = $("#dNascimento").val();

		$.post("/backend/Usuario.php?tipo=novo", {email: emailP, senha: senhaP, confirmaSenha: confirmaSenhaP, dNascimento: dNascimentoP},
		function(response){


                          autoOpen: false,
                          height: 180,
                          width: 250,
                          title: "Sucesso!",
                          modal: true,
                          buttons: {
                              "OK": function(){
                                  dialog.dialog( "close" );
                              }
                          }
                      });
                    dialog.dialog("open");

			// $("body").html("<div class=\"x\" id=\"alert\">"+response+"</div>");
		  $(".resultados-function").html(response);
		 }
		 , "html");
	});
});
