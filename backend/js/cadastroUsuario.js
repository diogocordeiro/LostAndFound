$('document').ready(function() {

    /*Validação de dados*/
    $("#register-form").validate({
        rules:
        {
            email:
            {
                required: true,
                email: true
            },
            senha: {
                required: true
            },
            confirmaSenha: {
                required: true,
                equalTo: '#senha'
            }
        },
        messages:
        {
            email: "Por favor, entre com um e-mail válido.",
            senha: {
                required: "Por favor, forneça uma senha."
            },
            confirmaSenha: {
                required: "Por favor, re-insira sua senha.",
                equalTo: "As senhas não são iguais!"
            }
        },
        submitHandler: submitForm
    });

    /*Form submit*/
    function submitForm() {

        var dados = $('#register-form').serialize();

        $.ajax({
            type: 'POST',
            url: "../backend/Usuario.php?tipo=novo",
            //url: "../../testphp.php",
            data: dados,
            beforeSend: function () {

                $('error').fadeOut();
                $("#btnCadastrarUsuario").val('Enviando...');
            },
            success: function (data) {

                if (data == 1) {

                    $('#error').fadeIn(1000, function () {

                        $("#error").html('E-mail já existente!');
                        $("#btnCadastrarUsuario").val('Cadastrar');
                    });
                }

                else if (data=="Novo usuário inserido com sucesso!") {

                    $("#btnCadastrarUsuario").val('Cadastrando...');
                    setTimeout('$("#register-form").fadeOut(500, function(){ $("#register-form").load("index-logado.php"); }); ', 5000);
                }

                else {

                    $('#error').fadeIn(1000, function () {

                        $("#error").html('<div class="alert alert-warning"> <div class="container-fluid"> <div class="alert-icon"> <i class="material-icons">info_outline</i> </div> <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true"><i class="material-icons">clear</i></span>   </button>'+data+' !</div> </div>');
                        $("#btnCadastrarUsuario").val('Cadastrar');
                    });
                }
            },
            error: function (data) {
                console.log(data);
            }
        });

        return false;
    }
});


// $(document).ready(function() {
//     $("#btnCadastrarUsuario").click(function() {
//
//         var emailP = $("#email").val();
//         var senhaP = $("#senha").val();
//         var confirmaSenhaP = $("#confirmaSenha").val();
//         var dNascimentoP = $("#dNascimento").val();
//
//         $.post("../backend/Usuario.php?tipo=novo", {email: emailP, senha: senhaP, confirmaSenha: confirmaSenhaP, dNascimento: dNascimentoP},
//             function(response){
//
//                 // $("resultados").html("<div class=\"modal fade bs-example-modal-sm\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"mySmallModalLabel\" > <div class=\"modal-dialog modal-sm\" role=\"document\"> <div class=\"modal-content\">"+response+"</div> </div> </div>");
//
//                 $("body").html("<div class=\"center-block card mensagem-alerta\" id=\"alert\"> "+response+"<button onclick=\"Nova()\" class=\"btn btn-default btn-alerta\" type=\"button\" name=\"button\">Ok!</button> </div>");
//
//
//                 // $(".resultados").html(response);
//             }
//             , "html");
//     });
// });
