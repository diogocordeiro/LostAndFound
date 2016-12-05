$('document').ready(function() {    
    
    var typingTimer;                //timer identifier
    var doneTypingInterval = 1000;  //time in ms
    var $input = $('#stringBusca');

    //on keyup, start the countdown
    $input.on('keyup', function () {
      clearTimeout(typingTimer);
      typingTimer = setTimeout(submitBusca, doneTypingInterval);
    });

    //on keydown, clear the countdown 
    $input.on('keydown', function () {
      clearTimeout(typingTimer);
    });

    $('#filtroBusca').change(function() {
        submitBusca();
    });

    function submitBusca() {

        var str = $('#stringBusca').val();
        var filtro = $('#filtroBusca').val();

        if (str.length < 2) {
            $("#resultados-pesquisa").html("Por favor, digite algo para ser buscado.");
        } else if (filtro.length < 2){
            $("#resultados-pesquisa").html("Por favor, escolha um filtro.");
        } else {
            $("#resultados-pesquisa").html("");

            var dados = $('#form-search-reports').serialize();

            $.ajax({
                type: 'POST',
                url: "../backend/Report.php?tipo=procuraReport",
                data: dados,
                beforeSend: function () {

                    $("#resultados-pesquisa").fadeOut();
                    $("#resultados-pesquisa").html('Procurando...');
                },
                success: function (data) {

                    $("#resultados-pesquisa").fadeIn(1000, function () {

                        $("#resultados-pesquisa").html(''+data+'');
                    });
                    // console.log(data);
                },
                error: function (data) {
                    console.log(data);
                    $("#resultados-pesquisa").html(''+data+'');
                }
            });
        };
    }
});
