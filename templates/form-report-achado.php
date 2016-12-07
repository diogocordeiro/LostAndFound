<!DOCTYPE html>
<html ng-app="login">

<head>

  <?php require 'header.php'; ?>

    <!-- Custom Theme CSS -->

    <link href="../static/css/form-report-achado.css" rel="stylesheet">
    <script type="text/javascript" language="javascript" src="../backend/js/reportAchado.js"></script>

</head>

<body>
  <?php require 'top-menu-logado.php'; ?>


    <div class="wrapper">

      <div class="container-fluid">
        <div class="section text-center section-landing">
          <div class="row">

            <div class="col-md-8 col-md-offset-2">

              <div class="card card-adicionar-item">


                <h2 class="title titulo-adicionar-item">Reportar Item Encontrado</h2>

                <h5 class="description descricao-adicionar-item">Por favor preencha os campos obrigatorios para criar o seu report de item encontrado.</h5>

                <!-- carrega itens do user em um drop-down list -->


                <form class="form" id="add-report-form" enctype="multipart/form-data" method="POST" action="../backend/Report.php?tipo=novoReport&report=achado">
                  <input type="hidden" name="idItemExistente" id="idItemExistente" value=""  />
                  <div class="content">

                    <div class="row">

                      <div class="col-md-8 col-md-offset-2 ">

                        <div class="input-group input-size-small-device">
                          <span class="input-group-addon">
                            <i class="material-icons">label</i>
                          </span>
                          <input name="titulo" id="formTitulo" type="text" class=" form-control input-lg " placeholder="Nome/Título... Ex: casaco preto" required />
                        </div>

                        <div class="input-group input-size-small-device">
                          <span class="input-group-addon">
                            <i class="material-icons">label</i>
                          </span>
                          <input name="marca" id="formMarca" type="text" class=" form-control input-lg " placeholder="Marca... Ex: Samsung" required />
                        </div>

                        <div class="input-group input-size-small-device">
                          <span class="input-group-addon">
                            <i class="material-icons">label</i>
                          </span>
                          <input name="identificador" id="formIdentificador" type="text" class=" form-control input-lg " placeholder="Identificador único... Ex: N de Serie, ID, e etc..." required />
                        </div>

                        <div class="row">

                          <div class="col-md-8">

                            <div class="input-group data">
                              <span class="input-group-addon">
                              <i class="material-icons">today</i>
                            </span>

                              <p class="data-nascimento-label">Data</p>
                              <input type="date" place class="form-control input-lg" id="dataItem" name="dataItem" ng-model="data_achado" placeholder="Data..." required>
                              <p class="informacao-data-nascimento">
                                *Data que o item foi encontrado.
                              </p>
                            </div>

                          </div>

                        </div>

                        <div class="row">

                          <div class="col-md-8">

                            <div class="input-group data">
                              <span class="input-group-addon">
                              <i class="material-icons">today</i>
                            </span>

                              <p class="data-nascimento-label">Hora</p>
                              <input type="text" place class="form-control input-lg" id="horaItem" name="horaItem" ng-model="hora_achado" placeholder="Hora..." required>
                              <p class="informacao-data-nascimento">
                                *Hora aproximada em que o item foi encontrado.
                              </p>
                            </div>

                          </div>

                        </div>

                        <div class="row">
                          <div class="col-md-3">
                            <select class="form-control" name="categoria" id="formCategoria">
                              <option value="">Categoria</option>
                              <?php

                                    //Php com categorias
                                    require('listaCategorias.php');
                                    echo $minhasCategorias;
                                  ?>
                            </select>
                          </div>

                          <div class="col-md-3">
                            <select class="form-control" name="subcategoria" id="formSubcategoria">
                              <option value="">Subcategoria</option>
                              <?php

                                    //Php com subcategorias
                                    require('listaSubcategorias.php');
                                    echo $minhasSubcategorias;
                                  ?>
                            </select>
                          </div>

                          <div class="col-md-3">
                            <select class="form-control" id="SelectCor1" name="cor1" onChange="javascript:var s = document.getElementById('SelectCor1');document.getElementById('divCor1').style.backgroundColor = '#'+s.options[s.selectedIndex].value;">
                              <option value="">Cor Predominante</option>
                              <?php

                                    //Php com as cores
                                    require('listaCores.php');
                                    echo $minhasCores;
                                  ?>
                            </select>
                            <span id="divCor1" align="center" style="font-size:10px;color:black;border-radius:10px;padding:6px 8px">P</span>
                          </div>

                          <div class="col-md-3">
                            <select class="form-control" id="SelectCor2" name="cor2" onChange="javascript:var s = document.getElementById('SelectCor2');document.getElementById('divCor2').style.backgroundColor = '#'+s.options[s.selectedIndex].value;">
                              <option value="">Cor Secudária</option>
                              <?php
                                    echo $minhasCores;
                                  ?>
                            </select>
                            <span id="divCor2" align="center" style="font-size:10px;color:black;border-radius:10px;padding:6px 8px">S</span>
                          </div>

                          <br>

                          <div class="input-group input-size-small-device">
                            <span class="input-group-addon">
                                <i class="material-icons">label</i>
                              </span>
                            <textarea name="caracteristicas" id="formCaracteristicas" class="form-control" placeholder="Caracteristicas únicas... Ex: arranhoes, amaçados, adesivos, etc." rows="5"></textarea>
                          </div>

                          <div class="input-group input-size-small-device">
                            <span class="input-group-addon">
                                <i class="material-icons">label</i>
                              </span>
                            <textarea name="descricao" id="formDescricao" class="form-control" placeholder="Escreva uma pequena DESCRIÇÃO do item. Você pode informar algumas de suas principais caracteristicas..." rows="10"></textarea>
                          </div>

                          <div class="input-group input-size-small-device">
                            <span class="input-group-addon">
                                <i class="material-icons">label</i>
                              </span>
                            <textarea name="informacao" id="formInformacao" class="form-control" placeholder="Escreva um pequeno texto sobre a situação onde o item foi encontrado. Ex: Econtrei sobre um banco de madeira, que fica na estação de metro N 22, era domingo a tarde, aproximadamente 15h" rows="10"></textarea>
                          </div>

                          <div class="input-group btn-upload-imagem">
                            <label class="btn btn-md btn-default btn-cor-estilo-escuro"><i class="material-icons">file_upload</i> Imagem
                              <input style="display: none;" name="enderFoto" id="formEnderFoto" type="file">
                            </label>
                            <p class="informacao-imagem-upload">
                              Enviar foto do item
                            </p>
                          </div>


                          <h3 class="title titulo-adicionar-item">Por favor, preencha o endereço onde <strong>o Item</strong> foi encontrado.</h2>

                          <!-- input auto-complete para o endereço -->
                          <script>
                            // This example displays an address form, using the autocomplete feature
                            // of the Google Places API to help users fill in the information.

                            var placeSearch, autocomplete;
                            var componentForm = {
                              street_number: 'short_name',
                              route: 'long_name',
                              locality: 'long_name',
                              administrative_area_level_1: 'short_name',
                              country: 'long_name',
                              postal_code: 'short_name'
                            };

                            function initAutocomplete() {
                              // Create the autocomplete object, restricting the search to geographical
                              // location types.
                              autocomplete = new google.maps.places.Autocomplete(
                                  /** @type {!HTMLInputElement} */(document.getElementById('autocomplete')),
                                  {types: ['geocode']});

                              // When the user selects an address from the dropdown, populate the address
                              // fields in the form.
                              autocomplete.addListener('place_changed', fillInAddress);
                            }

                            // [START region_fillform]
                            function fillInAddress() {
                              // Get the place details from the autocomplete object.
                              var place = autocomplete.getPlace();

                              for (var component in componentForm) {
                                document.getElementById(component).value = '';
                                document.getElementById(component).disabled = false;
                              }

                              // Get each component of the address from the place details
                              // and fill the corresponding field on the form.
                              for (var i = 0; i < place.address_components.length; i++) {
                                var addressType = place.address_components[i].types[0];

                                if (componentForm[addressType]) {
                                  var val = place.address_components[i][componentForm[addressType]];
                                  document.getElementById(addressType).value = val;
                                }
                              }
                            }
                            // [END region_fillform]

                            // [START region_geolocation]
                            // Bias the autocomplete object to the user's geographical location,
                            // as supplied by the browser's 'navigator.geolocation' object.
                            function geolocate() {
                              if (navigator.geolocation) {
                                navigator.geolocation.getCurrentPosition(function(position) {
                                  var geolocation = {
                                    lat: position.coords.latitude,
                                    lng: position.coords.longitude
                                  };
                                  var circle = new google.maps.Circle({
                                    center: geolocation,
                                    radius: position.coords.accuracy
                                  });
                                  autocomplete.setBounds(circle.getBounds());
                                });
                              }
                            }
                            // [END region_geolocation]

                        </script>
                        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC1jcQdqAcbQSi0yuUDshqpLiz-fPqQ3m8&signed_in=true&libraries=places&callback=initAutocomplete" async defer></script>

                          <div class="input-group input-size-small-device">
                            <input id="autocomplete" name="autocomplete" class=" form-control input-lg " placeholder="Digite o endeço aqui" onFocus="geolocate()" type="text" size="50" required></input>
                          </div>

                          <div class="input-group input-size-small-device">

                            <span class="input-group-addon">
                              <i class="material-icons">home</i>
                            </span>
                            <input disabled="true" id="route" name="rua" type="text" class=" form-control input-lg " placeholder="Avenida/Rua... Ex: Rua dos Bobos" required></input>
                          </div>

                          <div class="input-group input-size-small-device">
                            <span class="input-group-addon">
                              <i class="material-icons">label</i>
                            </span>
                            <input disabled="true" id="street_number" name="numero" type="text" class=" form-control input-lg " placeholder="Número... Ex: 1254"></input>
                          </div>

                          <div class="input-group input-size-small-device">
                            <span class="input-group-addon">
                              <i class="material-icons">label</i>
                            </span>
                            <input disabled="true" id="administrative_area_level_1" name="estado" type="text" class=" form-control input-lg " placeholder="Estado... Ex: Pernambuco" required></input>
                          </div>

                          <div class="input-group input-size-small-device">
                            <span class="input-group-addon">
                              <i class="material-icons">location_city</i>
                            </span>
                            <input disabled="true" id="locality" name="cidade" type="text" class=" form-control input-lg " placeholder="Cidade... Ex: Garanhuns" required></input>
                          </div>

                          <div class="input-group input-size-small-device">
                            <span class="input-group-addon">
                              <i class="material-icons">local_post_office</i>
                            </span>
                            <input disabled="true" id="postal_code" name="cep" type="text" class=" form-control input-lg " placeholder="CEP... Ex: xxxxx-xxx"></input>
                          </div>

                          <div class="input-group input-size-small-device">
                            <span class="input-group-addon">
                              <i class="material-icons">label</i>
                            </span>
                            <input disabled="true" id="country" name="pais" type="text" class=" form-control input-lg " placeholder="Pais... Ex: Brasil" required></input>
                          </div>

                          <div class="col-md-4">

                          </div>

                          <div class="col-md-4">

                          </div>

                          <br>
                          <br>
                          <br>
                          <br>

                          <div class="" id="error-editar-report">

                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="footer text-center">
                      <input id="btnAdicionar" value="Criar" class="btn btn-default  btn-lg btn-cor-estilo-escuro" type="submit" />
                    </div>

                </form>

                <!-- script para preencher os campos -->
                <script type="text/javascript">
                  function preencher(id){

                    //Pega a variavel coletada no php acima e converte para json
                    var meuArray = <?php echo json_encode($dados); ?>;
                    var valuesCampos = null;

                    //Procura pelo id passado
                    for(var i = 0; i<meuArray.length; i++) {
                      if (meuArray[i]['id'] == id) {
                        valuesCampos = meuArray[i];
                      };
                    };

                    //Caso o id passado seja valido, preenche os campos do form
                    if (valuesCampos != null) {
                      document.getElementById("idItemExistente").value = valuesCampos['id'];
                      document.getElementById("formTitulo").value = valuesCampos['titulo'];
                      document.getElementById("formMarca").value = valuesCampos['marca'];
                      document.getElementById("formIdentificador").value = valuesCampos['identificador'];
                      document.getElementById("formCategoria").value = valuesCampos['idCategoria'];
                      document.getElementById("formSubcategoria").value = valuesCampos['idSubcategoria'];
                      document.getElementById("SelectCor1").value = valuesCampos['cor1'];
                      document.getElementById("SelectCor2").value = valuesCampos['cor2'];
                      document.getElementById("formCaracteristicas").value = valuesCampos['caracteristicas'];
                      document.getElementById("formDescricao").value = valuesCampos['descricao'];
                      document.getElementById("formEnderFoto").disabled = true;

                    } else {
                      // document.getElementById("add-report-form").reset();
                      document.getElementById("idItemExistente").value = "";
                      document.getElementById("formTitulo").value = "";
                      document.getElementById("formMarca").value = "";
                      document.getElementById("formIdentificador").value = "";
                      document.getElementById("formCategoria").value = "";
                      document.getElementById("formSubcategoria").value = "";
                      document.getElementById("SelectCor1").value = "";
                      document.getElementById("SelectCor2").value = "";
                      document.getElementById("formCaracteristicas").value = "";
                      document.getElementById("formDescricao").value = "";
                      document.getElementById("formEnderFoto").disabled = false;
                    };

                  }//function preencher()
                </script>

                </div>

              </div>

            </div>
          </div>
        </div>
      </div>


</body>

<?php require 'footer.php'; ?>

</html>
