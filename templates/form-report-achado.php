<!DOCTYPE html>
<html ng-app="login">

<head>

  <?php require 'header.php'; ?>

    <!-- Custom Theme CSS -->

    <link href="../static/css/form-adicionar-item.css" rel="stylesheet">
    <script type="text/javascript" language="javascript" src="../backend/js/adicionarItens.js"></script>

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

                <h5 class="description descricao-adicionar-item">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum. Praesent mauris.</h5>

                <form class="form" id="add-report-form" enctype="multipart/form-data">

                  <div class="content">

                    <div class="row">

                      <div class="col-md-8 col-md-offset-2 ">

                        <div class="input-group input-size-small-device">
                          <span class="input-group-addon">
                            <i class="material-icons">label</i>
                          </span>
                          <input name="titulo" type="text" class=" form-control input-lg " placeholder="Nome/Título... Ex: casaco preto" required />
                        </div>

                        <div class="input-group input-size-small-device">
                          <span class="input-group-addon">
                            <i class="material-icons">label</i>
                          </span>
                          <input name="marca" type="text" class=" form-control input-lg " placeholder="Marca... Ex: Samsung" required />
                        </div>

                        <div class="input-group input-size-small-device">
                          <span class="input-group-addon">
                            <i class="material-icons">label</i>
                          </span>
                          <input name="identificador" type="text" class=" form-control input-lg " placeholder="Identificador único... Ex: N de Serie, ID, e etc..." required />
                        </div>

                        <div class="row">
                          <div class="col-md-3">
                            <select class="form-control" name="categoria">
                              <option value="">Categoria</option>
                              <?php

                                    //Php com categorias
                                    require('listaCategorias.php');
                                    echo $minhasCategorias;
                                  ?>
                            </select>
                          </div>

                          <div class="col-md-3">
                            <select class="form-control" name="subcategoria">
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
                            <textarea name="caracteristicas" class="form-control" placeholder="Caracteristicas únicas... Ex: arranhoes, amaçados, adesivos, etc." rows="5"></textarea>
                          </div>

                          <div class="input-group input-size-small-device">
                            <span class="input-group-addon">
                                <i class="material-icons">label</i>
                              </span>
                            <textarea name="descricao" class="form-control" placeholder="Escreva uma pequena DESCRIÇÃO do item. Você pode informar algumas de suas principais caracteristicas..." rows="10"></textarea>
                          </div>

                          <div class="input-group btn-upload-imagem">
                            <label class="btn btn-md btn-default btn-cor-estilo-escuro"><i class="material-icons">file_upload</i> Imagem
                              <input style="display: none;" name="enderFoto" type="file">
                            </label>
                            <p class="informacao-imagem-upload">
                              Enviar foto do item
                            </p>
                          </div>


                          <h2 class="title titulo-adicionar-item">Edereço Onde O Foi Item Encontrado</h2>

                          <h5 class="description descricao-adicionar-item">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. </h5>

                          <div class="input-group input-size-small-device">
                            <span class="input-group-addon">
                              <i class="material-icons">home</i>
                            </span>
                            <input name="endereco" type="text" class=" form-control input-lg " placeholder="Endereço/Rua... Ex: Rua dos Bobos, N 0" required />
                          </div>

                          <div class="input-group input-size-small-device">
                            <span class="input-group-addon">
                              <i class="material-icons">label</i>
                            </span>
                            <input name="complemento" type="text" class=" form-control input-lg " placeholder="Complemento... Ex: Proximo ao viaduto" required />
                          </div>

                          <div class="input-group input-size-small-device">
                            <span class="input-group-addon">
                              <i class="material-icons">label</i>
                            </span>
                            <input name="estado" type="text" class=" form-control input-lg " placeholder="Estado... Ex: Pernambuco" required />
                          </div>

                          <div class="input-group input-size-small-device">
                            <span class="input-group-addon">
                              <i class="material-icons">location_city</i>
                            </span>
                            <input name="cidade" type="text" class=" form-control input-lg " placeholder="Cidade... Ex: Garanhuns" required />
                          </div>

                          <div class="input-group input-size-small-device">
                            <span class="input-group-addon">
                              <i class="material-icons">local_post_office</i>
                            </span>
                            <input name="cep" type="text" class=" form-control input-lg " placeholder="CEP... Ex: xxxxx-xxx" required />
                          </div>

                          <div class="col-md-4">

                          </div>

                          <div class=" col-md-4">
                            <select class=" form-control" name="pais">
                              <option value="">País</option>
                              <?php

                                    //Php com categorias
                                    require('listaPaises.php');
                                    echo $minhasCategorias;
                                  ?>
                            </select>
                          </div>

                          <div class="col-md-4">

                          </div>

                          <br><br><br><br>

                          <div class="" id="error-editar-report">

                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="footer text-center">
                      <input id="btnAdicionar" value="Criar" class="btn btn-default  btn-lg btn-cor-estilo-escuro" type="submit" />
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
