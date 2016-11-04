$('document').ready(function() {

    /*Validação de dados*/
    $("form[name='login']").validate({
        rules:
        {
            email:
            {
                required: true,
                email: true
            },
            senha: {
                required: true,
                minlength: 5
            }
        },
        messages:
        {
            email: "Por favor, entre com um e-mail válido.",
            senha: {
                required: "Por favor, forneça uma senha.",
                minlength: "Sua senha deve conter no mínimo 8 caracteres."
            },
            confirmaSenha: {
                required: "Por favor, re-insira sua senha.",
                equalTo: "As senhas não são iguais!"
            }
        },
        errorElement: 'div',
        errorLabelContainer: '#error-container',
        submitHandler: submitLogin
    });

    /*Form submit*/
    function submitLogin() {

        var dados = $('#login').serialize();

        $.ajax({
            type: 'POST',
            url: "../backend/funcoes.php",
            data: dados,
            beforeSend: function () {

                $('error-backend').fadeOut();
                $("#login-user").val('Logando...');
            },
            success: function (data) {

                $('#error-backend').fadeIn(1000, function () {

                    $("#error-backend").html('<div class=""><span class=""></span> &nbsp; '+data+'!</div>');
                });
                console.log(data);
            },
            error: function (data) {
                console.log(data);
            }
        });

        return false;
    }
});