$('document').ready(function() {

    /*Validação de dados*/
    $("#edit-profile-form").validate({
        rules:
        {
            nome:
            {
                required: true,

            },
            sobrenome: {
                required: true
            },
            sexo: {
                required: true,
            },
            cidade: {
                required: true
            },

            pais: {
                required: true
            },

            celular: {
                required: true,
                minlength: 12
            },

            telefone: {
                required: false,
                minlength: 11
            },

            facebook: {
                required: true
            }
        },
        messages:
        {
            nome: "Por favor, entre com um nome válido.",
            sobrenome: "Por favor, entre com sobrenome válido.",
            sexo: "Por favor, escolha uma opção para sexo.",
            cidade: "Por favor, informe uma cidade.",
            pais: "Por favor, escolha um país.",
            celular: {
                required: "Por favor, informe um número de celular.",
                minlength: "Por favor, informe um número de celular válido.",
            },
            telefone: {
                minlength: "Por favor, informe um número de telefone válido.",
            },
            facebook: "Por favor, informe seu perfil no facebook."
        },
        errorElement: 'div',
        errorLabelContainer: '#error-perfil-usuario',
        submitHandler: submitForm
    });

    /*Form submit*/
    function submitForm() {

        var dados = $('#edit-profile-form').serialize();

        $.ajax({
            type: 'POST',
            url: "../backend/Usuario.php?tipo=edita",
            data: dados,
            beforeSend: function () {

                $('error').fadeOut();
                $("#btnSalvar").val('Alterando...');
            },
            success: function (data) {

                if (data == "successo") {

                    $("#btnSalvar").val('Salvar');
                    //setTimeout('$("#edit-profile-form").fadeOut(500, function(){ $("#edit-profile-form").load("form-editar-perfil.php"); }); ', 5000);
                }

                else {

                    $('#error').fadeIn(1000, function () {

                        $("#error").html('<div class=""><span class=""></span> &nbsp; '+data+'</div>');
                        $("#btnSalvar").val('Salvar');
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