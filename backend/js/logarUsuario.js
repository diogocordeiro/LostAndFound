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

                        $("#error").html('<div class=""><span class=""></span> &nbsp; '+data+' !</div>');
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