<!DOCTYPE html>
<html ng-app="login">

<head>

  <?php require 'header.php'; ?>
    <!-- Custom Theme CSS -->

    <link href="../static/css/index-logado.css" rel="stylesheet">
    <link href="../static/css/perfil-usuario.css" rel="stylesheet">

    <link href="../static/css/report-usuario.css" rel="stylesheet">

  </head>

  <body>

    <?php require 'top-menu-logado.php'; ?>

    <div class="container-fluid">

      <div class="section text-center section-landing">

        <div class="row">

        <!-- coletar informacoes no banco -->
        <?php
          require('../backend/Report.php');
          require('../backend/nomesTabelas.php');
          require('../backend/funcoes.php');
          require('../backend/conBd.php');
          require('listaCores.php');
          require('listaCategorias.php');
          require('listaSubcategorias.php');

          if(isset($_GET['id'])){

            //Valida string
            $idReport = validarString($_GET['id']);

            $dados = [];
            $achados = getReport(BaseDados::conBdUser(), $idReport, $tabAchados);
            $perdidos = getReport(BaseDados::conBdUser(), $idReport, $tabPerdidos);

            if (count($achados) > 0) {
              $dados = $achados;
              $tituloTipo = "Achado";
            } elseif (count($perdidos) > 0) {
                $dados = $perdidos;
                $tituloTipo = "Perdido";
              }

            //Caso o report nao exista no bd
            if (count($dados) == 0) {
              echo "<br/><br/><br/><center>Erro: o Report não foi encontrado.<br/><a href='javascript:history.go(-1);'>voltar</a></center>";
              exit;
            }

          //Caso a variavel id nao seja informada
          } else {
              echo "<br/><br/><br/><center>Erro: informe o ID do Report.<br/><a href='javascript:history.go(-1);>voltar</a></center>";
              exit;
            }
        ?>

          <div class="col-md-10 col-md-offset-1">

            <div class="card card-content">

              <h2 class="title titulo-adicionar-item"><?php echo $tituloTipo.": ".$dados[0]['titulo'];?></h2>

              <div class="row">

                <div class="row">

                  <div class="col-md-4">

                  </div>

                  <div class="col-md-4">
                    <!-- <img src="../static/img/bg3.jpg" class="img-rounded img-responsive img-raised"> -->
                    <img src="../itens/fotos/<?php echo $dados[0]['enderFoto'];?>" class="img-rounded img-responsive img-raised">
                  </div>

                  <div class="col-md-4">

                    <!-- badge quando for um item previamente cadastrado -->
                    <?php

                    $dadosItem = getData(BaseDados::conBdUser(), $tabItens, "id", $dados[0]['idItem'], "s");

                    if ($dadosItem[0]['idUsuario'] != 0) {

                    ?>
                      <img src="../static/img/badge.jpg" class="img-badge img-circle img-responsive img-raised">

                      <p>
                        ITEM CADASTRADO PREVIAMENTE
                      </p>
                    <?php } ?>
                  </div>

                </div>

                    <div class="row">

                      <div class="col-md-4 col-md-offset-4">

                        <dl class="dl-horizontal">

                          <dt>Data Criação do Report: </dt>
                          <dd class="dd-data"><?php echo $dados[0]['dataCadastro'];?></dd>

                          <br><br><br>

                          <dt>Marca: </dt>
                          <dd><?php echo $dados[0]['marca'];?></dd>

                          <br><br><br>

                          <dt>Identificador: </dt>
                          <dd><?php echo $dados[0]['identificador'];?></dd>

                          <br><br><br>

                          <dt>Cor Predominante: </dt>
                          <dd><span style="background-color:#<?php echo $dados[0]['cor1'];?>;color:#000000;padding:6px 8px"><?php echo $arrCores[$dados[0]['cor1']];?></span></dd>

                          <br><br><br>

                          <dt>Cor Secundária: </dt>
                          <dd><span style="background-color:#<?php echo $dados[0]['cor2'];?>;color:#000000;padding:6px 8px"><?php echo $arrCores[$dados[0]['cor2']];?></span></dd>

                          <br><br><br>

                          <dt>Categoria: </dt>
                          <dd><?php echo $arrCategorias[$dados[0]['idCategoria']];?></dd>

                          <br><br><br>

                          <dt>Subcategoria: </dt>
                          <dd><?php echo $arrSubcategorias[$dados[0]['idSubcategoria']];?></dd>

                          <br><br><br>

                          <dt>Caracteristicas: </dt>
                          <dd class="dd-caracteristicas"><?php echo $dados[0]['caracteristicas'];?></dd>

                          <br><br><br>

                          <dt>Descrição: </dt>
                          <dd class="dd-descricao"><?php echo $dados[0]['descricao'];?></dd>

                          <br><br><br>

                          <dt>Informação: </dt>
                          <dd class="dd-descricao"><?php echo $dados[0]['informacao'];?></dd>

                          <br><br><br>

                          <dt>Data aproximada: </dt>
                          <dd class="dd-data"><?php echo $dados[0]['data'];?></dd>
                          <br>

                          <dt>Hora aproximada : </dt>
                          <dd class="dd-data"><?php echo $dados[0]['hora'];?></dd>
                          <br>

                          <dt>Localização : </dt>
                          <dd class="dd-data"><?php echo $dados[0]['mapsLocal'];?></dd>

                          <br><hr>

                          </dl>

                      </div>

                    </div>


                    <div class="row">
                      <div class="col-md-4 col-md-offset-4">

                        <!-- maps -->

                            <center><div style="width:100%;height:20em" id="gmap_canvas">Loading map...</div></center>
                            <center><div id='map-label'>Map shows approximate location.</div></center>

                            <script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyC1jcQdqAcbQSi0yuUDshqpLiz-fPqQ3m8"></script>
                            <script type="text/javascript">
                                function init_map() {
                                    var myOptions = {
                                        zoom: 14,
                                        center: new google.maps.LatLng(<?php echo $dados[0]['mapsLat']; ?>, <?php echo $dados[0]['mapsLng']; ?>),
                                        mapTypeId: google.maps.MapTypeId.ROADMAP
                                    };

                                    map = new google.maps.Map(document.getElementById("gmap_canvas"), myOptions);

                              var myIcon = {
                                url: "../static/img/icon.png", // url
                                scaledSize: new google.maps.Size(18, 35), // scaled size
                                origin: new google.maps.Point(0, 0), // origin
                            anchor: new google.maps.Point(0, 0) // anchor
                              };

                                    marker = new google.maps.Marker({
                                        map: map,
                                        position: new google.maps.LatLng(<?php echo $dados[0]['mapsLat']; ?>, <?php echo $dados[0]['mapsLng']; ?>),
                                        icon: myIcon
                                    });

                                    infowindow = new google.maps.InfoWindow({
                                        content: "Local onde o item foi marcado:<br/><strong><?php echo $dados[0]['mapsLocal']; ?></strong>"
                                    });
                                    google.maps.event.addListener(marker, "click", function () {
                                        infowindow.open(map, marker);
                                    });

                                    infowindow.open(map, marker);
                                }
                                google.maps.event.addDomListener(window, 'load', init_map);
                            </script>

                        <!-- maps -->

                      </div>
                    </div>



                    <div class="row">
                      <div class="col-md-4 col-md-offset-4">
                      <br>
                      <br>
                      <br>
                      <br>
                      <br>

                      <strong><h4>Se este item é seu, comente em baixo e fale com a pessoa que cirou o report</h4></strong>
                        <br>
                    <hr>
                    <div id="disqus_thread"></div>
<script>

    /**
     *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
     *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/

     var disqus_config = function () {
     this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
     this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
     };

    (function() { // DON'T EDIT BELOW THIS LINE
        var d = document, s = d.createElement('script');
        s.src = '//los-1.disqus.com/embed.js';
        s.setAttribute('data-timestamp', +new Date());
        (d.head || d.body).appendChild(s);
    })();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
                      </div>
                    </div>

                    <br><br><br>


              </div>

            </div>

          </div>

        </div>

      </div>


    </div>

  </body>

  <?php require 'footer.php'; ?>

  </html>
