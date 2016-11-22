<!DOCTYPE html>
<html ng-app="login">

<head>

  <?php require 'header.php'; ?>

    <!-- Custom Theme CSS -->

    <link href="../static/css/form-adicionar-item.css" rel="stylesheet">
    <!-- <script type="text/javascript" language="javascript" src="../backend/js/editarItens.js"></script> -->

</head>

<body>
  <?php require 'top-menu-logado.php'; ?>
  
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
        $report = "achado";
      } elseif (count($perdidos) > 0) {
          $dados = $perdidos;
          $report = "perdido";
        }

      session_start();

      //Caso o report nao exista no bd
      if (count($dados) == 0) {
        echo "<center>Erro: o Report não foi encontrado<br/><a href='javascript:history.go(-1);'>voltar</a></center>";
        exit;

      //Caso o id da session nao bata com o id do report
      } elseif ($dados[0]['idUsuario'] != $_SESSION['Lost_Found']["id"]) {
          echo "<center>Erro: o Report não foi encontrado<br/><a href='javascript:history.go(-1);'>voltar</a></center>";
          exit;
        }

    //Caso a variavel id nao seja informada
    } else {
        echo "<center>Erro: informe o ID do Report<br/><a href='javascript:history.go(-1);>voltar</a></center>";
        exit;
      }
  ?>

    <div class="wrapper">

      <div class="container-fluid">
        <div class="section text-center section-landing">
          <div class="row">

            <div class="col-md-8 col-md-offset-2">

              <div class="card card-adicionar-item">


                <h2 class="title titulo-adicionar-item">Editar Report</h2>

                <h5 class="description descricao-adicionar-item">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum. Praesent mauris.</h5>

                  <form class="form" id="edit-item-form" enctype="multipart/form-data" method="POST" action="../backend/Report.php?tipo=editaReport">
                    <?php echo '<input type="hidden" name="idSession" value="'.$_SESSION["Lost_Found"]["id"].'"/>'; ?>
                    <?php echo '<input type="hidden" name="idReport" value="'.$idReport.'"/>'; ?>
                    <?php echo '<input type="hidden" name="report" value="'.$report.'"/>'; ?>

                    <div class="content">

                      <div class="row">

                        <div class="col-md-8 col-md-offset-2 ">

                          <div class="input-group input-size-small-device">
                            <span class="input-group-addon">
                            <i class="material-icons">label</i>
                          </span>
                            <input value="<?php echo $dados[0]['titulo']; ?>" name="titulo" type="text" class=" form-control input-lg " placeholder="Título... Ex: casaco preto" required />
                          </div>

                          <div class="input-group input-size-small-device">
                            <span class="input-group-addon">
                            <i class="material-icons">label</i>
                          </span>
                            <input value="<?php echo $dados[0]['marca']; ?>" name="marca" type="text" class=" form-control input-lg " placeholder="Marca... Ex: Samsung" required />
                          </div>

                          <div class="input-group input-size-small-device">
                            <span class="input-group-addon">
                            <i class="material-icons">label</i>
                          </span>
                            <input value="<?php echo $dados[0]['identificador']; ?>" name="identificador" type="text" class=" form-control input-lg " placeholder="Identificador único... Ex: N de Serie, ID, e etc..." required />
                          </div>

                          <div class="row">
                            <div class="col-md-4">
                              <select name="categoria">
                                <option value="">Categoria</option>
                                  <?php
                            
                                    //Php com categorias
                                    require('listaCategorias.php');

                                    //Procura qual a categoria (na lista de categorias), para poder seleciona-lo para preencher o select
                                    $pos = strpos($minhasCategorias, $dados[0]['idCategoria']."");
                                    $minhasCategorias = substr($minhasCategorias, 0, $pos+2)." selected".substr($minhasCategorias, $pos+2, strlen($minhasCategorias));
                                    
                                    echo $minhasCategorias;
                                  ?> 
                              </select>
                            </div>

                            <div class="col-md-4">
                              <select name="subcategoria">
                                <option value="">Subcategoria</option>
                                  <?php
                            
                                    //Php com subcategorias
                                    require('listaSubcategorias.php');

                                    //Procura qual a subcategoria (na lista de subcategorias), para poder seleciona-lo para preencher o select
                                    $pos = strpos($minhasSubcategorias, $dados[0]['idSubcategoria']."");
                                    $minhasSubcategorias = substr($minhasSubcategorias, 0, $pos+2)." selected".substr($minhasSubcategorias, $pos+2, strlen($minhasSubcategorias));
                                    
                                    echo $minhasSubcategorias;
                                  ?>   
                              </select>
                            </div>

                            <div class="col-md-4">
                              <select id="SelectCor1" name="cor1" onChange="javascript:var s = document.getElementById('SelectCor1');document.getElementById('divCor1').style.backgroundColor = '#'+s.options[s.selectedIndex].value;">
                                <option value="">Cor Predominante</option>
                                  <?php
                            
                                    //Php com as cores
                                    require('listaCores.php');

                                    $cores1 = $minhasCores;

                                    //Procura qual a cor (na lista de cores), para poder seleciona-lo para preencher o select
                                    $pos = strpos($cores1, $dados[0]['cor1']."");
                                    $cores1 = substr($cores1, 0, $pos+7)." selected".substr($cores1, $pos+7, strlen($cores1));
                                    
                                    echo $cores1;
                                  ?>                                 
                              </select>
                              <span id="divCor1" align="center" style="font-size:10px;color:black;border-radius:10px;padding:6px 8px">P</span>
                            </div>
                            
                            <div class="col-md-4">
                              <select id="SelectCor2" name="cor2" onChange="javascript:var s = document.getElementById('SelectCor2');document.getElementById('divCor2').style.backgroundColor = '#'+s.options[s.selectedIndex].value;">
                                <option value="">Cor Secudária</option>
                                  <?php 
                                    $cores2 = $minhasCores;

                                    //Procura qual a cor (na lista de cores), para poder seleciona-lo para preencher o select
                                    $pos = strpos($cores2, $dados[0]['cor2']."");
                                    $cores2 = substr($cores2, 0, $pos+7)." selected".substr($cores2, $pos+7, strlen($cores2));
                                    
                                    echo $cores2;
                                  ?>
                              </select>
                              <span id="divCor2" align="center" style="font-size:10px;color:black;border-radius:10px;padding:6px 8px">S</span>
                            </div>

                            <div class="input-group input-size-small-device">
                              <span class="input-group-addon">
                                <i class="material-icons">label</i>
                              </span>
                              <textarea name="caracteristicas" class="form-control" placeholder="Caracteristicas únicas... Ex: arranhoes, amaçados, adesivos, etc." rows="5"><?php echo $dados[0]['caracteristicas']; ?></textarea>
                            </div>

                            <div class="input-group input-size-small-device">
                              <span class="input-group-addon">
                                <i class="material-icons">label</i>
                              </span>
                              <textarea name="descricao" class="form-control" placeholder="Escreva uma pequena DESCRIÇÃO do item. Você pode informar algumas de suas principais caracteristicas..." rows="10"><?php echo $dados[0]['descricao']; ?></textarea>
                            </div>

                            <div class="input-group input-size-small-device">
                              <span class="input-group-addon">
                                  <i class="material-icons">label</i>
                                </span>
                              <textarea name="informacao" class="form-control" placeholder="Escreva um pequeno texto sobre a situação onde o item foi encontrado. Ex: Econtrei sobre um banco de madeira, que fica na estação de metro N 22, era domingo a tarde, aproximadamente 15h" rows="10"><?php echo $dados[0]['informacao']; ?></textarea>
                            </div>
                            
                            <div class="input-group input-size-small-device">
                              <span class="input-group-addon">
                              <i class="material-icons">label</i>
                            </span>
                              <input value="<?php echo $dados[0]['data']; ?>" id="horaItem" id="dataItem" name="dataItem"  type="date" class=" form-control input-lg " placeholder="Data..." required />
                            </div>

                            <div class="input-group input-size-small-device">
                              <span class="input-group-addon">
                              <i class="material-icons">label</i>
                            </span>
                              <input value="<?php echo $dados[0]['hora']; ?>" id="horaItem" name="horaItem" type="text" class=" form-control input-lg " placeholder="Hora..." required />
                            </div>

                            <!-- input auto-complete para o endereço -->
                           <script>
                              // This example displays an address form, using the autocomplete feature
                              // of the Google Places API to help users fill in the information.

                              var autocomplete;

                              function initAutocomplete() {
                                // Create the autocomplete object, restricting the search to geographical
                                // location types.
                                autocomplete = new google.maps.places.Autocomplete(
                                    /** @type {!HTMLInputElement} */(document.getElementById('autocomplete')),
                                    {types: ['geocode']});

                              }
                            </script>
                            <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC1jcQdqAcbQSi0yuUDshqpLiz-fPqQ3m8&signed_in=true&libraries=places&callback=initAutocomplete" async defer></script>

                            <div class="input-group input-size-small-device">
                              <input value="<?php echo $dados[0]['mapsLocal']; ?>" id="autocomplete" name="autocomplete" class=" form-control input-lg " placeholder="Digite o endeço aqui" onload="geolocate()" type="text" size="50" required></input>
                            </div>

                            <div class="input-group btn-upload-imagem">
                              <?php echo '<input type="hidden" name="enderFotoAtual" value="'.$dados[0]['enderFoto'].'"/>'; ?>
                              <label class="btn btn-md btn-default btn-cor-estilo-escuro"><i class="material-icons">file_upload</i>
                                Imagem <input type="file" name="enderFoto" id="enderFoto">
                              </label>
                              <p class="informacao-imagem-upload">
                                Enviar foto do item
                              </p>
                            </div>

                            <div class="" id="error-editar-perfil">
                              
                            </div>
                        </div>
                      </div>
                    </div>

                    <div class="footer text-center">
                      <input id="btnSalvar" value="Salvar" class="btn btn-default  btn-lg btn-cor-estilo-escuro" type="submit" />
                    </div>

                  </form>


            </div>

          </div>

        </div>
      </div>
    </div>
  </div>


</body>

<?php require 'footer.php'; ?>

</html>
