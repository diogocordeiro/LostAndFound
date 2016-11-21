/**
 * Created by root on 08/11/16.
 */


$('document').ready(function() {

    /*Validação de dados*/
    $("#add-report-form").validate({
        rules:
        {
            titulo:
            {
                required: true

            },

            marca: {
                required: true
            },

            identificador: {
                required: true
            },

            dataItem: {
                required: true
            },

            horaItem: {
                required: true
            },

            categoria: {
                required: true
            },

            subcategoria: {
                required: true
            },

            cor1: {
                required: true
            },

            cor2: {
                required: false
            },

            caracteristicas: {
                required: true
            },

            descricao: {
                required: true
            },

            autocomplete: {
                required: true
            }

        },
        messages:
        {
            titulo: "Por favor, entre com um título válido.",
            marca: "Por favor, entre com uma marca válido.",
            identificador: "Por favor, entre com um identificador para seu objeto.",
            dataItem: "Por favor, informe uma data.",
            horaItem: "Por favor, informa a hora que você achou o item.",
            categoria: "Por favor, escolha uma categoria.",
            subcategoria: "Por favor, escolha uma subcategoria.",
            cor1: "Escolha uma cor predominante para seu objeto.",
            cor2: "Escolha uma cor predominante para seu objeto.",
            caracteristicas: "Descreva as características de seu objeto.",
            descricao: "Descreva outras informações relevantes.",
            enderFoto: "Selecione uma foto e envie-nos para que possamos saber que o objeto é realmente seu.",
            autocomplete: "Por favor, informe um enfereço válido."
        },
        errorElement: 'div',
        errorLabelContainer: '#error-criar-report-perdido',
        submitHandler: submitForm
    });

    /*Form submit*/
    function submitForm() {

        var dados = new FormData($('#add-report-form')[0]);

        $.ajax({
            type: 'POST',
            url: "../backend/Report.php?tipo=novoReport&report=perdido",
            data: dados,
            contentType: false,
            processData: false,
            beforeSend: function () {

                $('error-criar-report-achado').fadeOut();
                $("#btnAdicionar").val('Salvando...');
            },
            success: function (data) {
                    $("#btnAdicionar").val('Adicionar');
                    console.log(data);
                    setTimeout(function () {
                        window.location.href = "meus-reports.php";
                    }, 2000);
            },
            error: function (data) {
                console.log(data);
            }
        });

        return false;
    }
});