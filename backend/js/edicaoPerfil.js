$('document').ready(function() {

    /*Validação de dados*/
    $("#edit-profile-form").validate({
        // rules:
        // {
        //     email:
        //     {
        //         required: true,
        //         email: true
        //     },
        //     senha: {
        //         required: true
        //     },
        //     confirmaSenha: {
        //         required: true,
        //         equalTo: '#senha'
        //     }
        // },
        // messages:
        // {
        //     email: "Por favor, entre com um e-mail válido.",
        //     senha: {
        //         required: "Por favor, forneça uma senha."
        //     },
        //     confirmaSenha: {
        //         required: "Por favor, re-insira sua senha.",
        //         equalTo: "As senhas não são iguais!"
        //     }
        // },
        submitHandler: submitForm
    });

    /*Form submit*/
    function submitForm() {

        var dados = $('#edit-profile-form').serialize();

        $.ajax({
            type: 'POST',
            url: "../backend/Usuario.php?tipo=edita",
            //url: "../../testphp.php",
            data: dados,
            beforeSend: function () {

                $('error').fadeOut();
                $("#btnSalvar").val('Alterando...');
            },
            success: function (data) {

                // if (data == 1) {

                //     $('#error').fadeIn(1000, function () {

                //         $("#error").html('E-mail já existente!');
                //         $("#btnSalvar").val('Cadastrar');
                //     });
                // }

                if (data == "successo") {

                    $("#btnSalvar").val('Salvar');
                    console.log("suceso");
                    //setTimeout('$("#edit-profile-form").fadeOut(500, function(){ $("#edit-profile-form").load("form-editar-perfil.php"); }); ', 5000);
                }

                // else {

                //     $('#error').fadeIn(1000, function () {

                //         $("#error").html('<div class=""><span class=""></span> &nbsp; '+data+' !</div>');
                //         $("#btnSalvar").val('Salvar');
                //     });
                // }
            },
            error: function (data) {
                console.log(data);
            }
        });

        return false;
    }
});


// $(document).ready(function() {
//     $("#btnSalvar").click(function() {
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