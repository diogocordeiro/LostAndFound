/**
 * Created by root on 08/11/16.
 */


$('document').ready(function() {

    /*Validação de dados*/
    $("#add-item-form").validate({
        rules:
        {
            titulo:
            {
                required: true,

            },

            marca: {
                required: true
            },

            identificador: {
                required: true,
            },

            categoria: {
                required: true
            },

            subcategoria: {
                required: true
            },

            cor1: {
                required: true,
            },

            cor2: {
                required: false,
            },

            caracteristicas: {
                required: true
            },

            descricao: {
                required: true
            },

            enderFoto: {
                required: true
            }
        },
        messages:
        {
            titulo: "Por favor, entre com um título válido.",
            marca: "Por favor, entre com uma marca válido.",
            identificador: "Por favor, entre com um identificador para seu objeto.",
            categoria: "Por favor, escolha uma categoria.",
            subcategoria: "Por favor, escolha uma subcategoria.",
            cor1: "Escolha uma cor predominante para seu objeto.",
            cor2: "Escolha uma cor predominante para seu objeto.",
            caracteristicas: "Descreva as características de seu objeto.",
            descricao: "Descreva outras informações relevantes.",
            enderFoto: "Selecione uma foto e envie-nos para que possamos saber que o objeto é realmente seu."
        },
        errorElement: 'div',
        errorLabelContainer: '#error-editar-perfil',
        submitHandler: submitForm
    });

    /*Form submit*/
    function submitForm() {

        var dados = new FormData($('#add-item-form')[0]);

        $.ajax({
            type: 'POST',
            url: "../backend/Item.php?tipo=novo",
            data: dados,
            contentType: false,
            processData: false,
            beforeSend: function () {

                $('error').fadeOut();
                $("#btnAdicionar").val('Salvando...');
            },
            success: function (data) {

                console.log(data);
                if (data == "Novo item inserido com sucesso!") {

                    $("#btnAdicionar").val('Adicionar');
                    //setTimeout('$("#edit-profile-form").fadeOut(500, function(){ $("#edit-profile-form").load("form-editar-perfil.php"); }); ', 5000);
                    console.log(data);
                }

                else {

                    $('#error').fadeIn(1000, function () {

                        $("#error").html('<div class=""><span class=""></span> &nbsp; '+data+'</div>');
                        $("#btnAdicionar").val('Adicionar');
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