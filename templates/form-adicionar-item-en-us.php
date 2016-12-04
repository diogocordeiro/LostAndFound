<!DOCTYPE html>
<html ng-app="login">

<head>

  <?php require 'header.php'; ?>

    <!-- Custom Theme CSS -->

    <link href="../static/css/form-adicionar-item.css" rel="stylesheet">
    <script type="text/javascript" language="javascript" src="../backend/js/adicionarItens.js"></script>

</head>

<body>
  <?php require 'top-menu-logado-en-us.php'; ?>


    <div class="wrapper">

      <div class="container-fluid">
        <div class="section text-center section-landing">
          <div class="row">

            <div class="col-md-8 col-md-offset-2">

              <div class="card card-adicionar-item">


                <h2 class="title titulo-adicionar-item">Add New Item</h2>

                <h5 class="description descricao-adicionar-item">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum. Praesent mauris.</h5>

                  <form class="form" id="add-item-form" enctype="multipart/form-data">

                    <div class="content">

                      <div class="row">

                        <div class="col-md-8 col-md-offset-2 ">

                          <div class="input-group input-size-small-device">
                            <span class="input-group-addon">
                            <i class="material-icons">label</i>
                          </span>
                            <input name="titulo" type="text" class=" form-control input-lg " placeholder="Title... Ex: Black Jacket" required />
                          </div>

                          <div class="input-group input-size-small-device">
                            <span class="input-group-addon">
                            <i class="material-icons">label</i>
                          </span>
                            <input name="marca" type="text" class=" form-control input-lg " placeholder="Brand... Ex: Samsung" required />
                          </div>

                          <div class="input-group input-size-small-device">
                            <span class="input-group-addon">
                            <i class="material-icons">label</i>
                          </span>
                            <input name="identificador" type="text" class=" form-control input-lg " placeholder="Unique ID... Ex: Serial number, ID..." required />
                          </div>

                          <div class="row">
                            <div class="col-md-3">
                              <select class="form-control"  name="categoria">
                                <option value="">Category</option>
                                <?php

                                    //Php com categorias
                                    require('listaCategorias.php');
                                    echo $minhasCategorias;
                                  ?>
                              </select>
                            </div>

                            <div class="col-md-3">
                              <select class="form-control" name="subcategoria">
                                <option value="">Subcategory</option>
                                <?php

                                    //Php com subcategorias
                                    require('listaSubcategorias.php');
                                    echo $minhasSubcategorias;
                                  ?>
                              </select>
                            </div>

                            <div class="col-md-3">
                              <select class="form-control" id="SelectCor1" name="cor1" onChange="javascript:var s = document.getElementById('SelectCor1');document.getElementById('divCor1').style.backgroundColor = '#'+s.options[s.selectedIndex].value;">
                                <option value="">Main Color</option>
                                  <?php

                                    //Php com as cores
                                    require('listaCores.php');
                                    echo $minhasCores;
                                  ?>
                              </select>
                              <span id="divCor1" align="center" style="font-size:10px;color:black;border-radius:10px;padding:6px 8px">MC</span>
                            </div>

                            <div class="col-md-3">
                              <select class="form-control" id="SelectCor2" name="cor2" onChange="javascript:var s = document.getElementById('SelectCor2');document.getElementById('divCor2').style.backgroundColor = '#'+s.options[s.selectedIndex].value;">
                                <option value="">Secundary Color</option>
                                  <?php
                                    echo $minhasCores;
                                  ?>
                              </select>
                              <span id="divCor2" align="center" style="font-size:10px;color:black;border-radius:10px;padding:6px 8px">SC</span>
                            </div>

                            <br>

                            <div class="input-group input-size-small-device">
                              <span class="input-group-addon">
                                <i class="material-icons">label</i>
                              </span>
                              <textarea name="caracteristicas" class="form-control" placeholder="Unique Characteristics... Ex: scratches, crumpled, stickers, etc." rows="5"></textarea>
                            </div>

                            <div class="input-group input-size-small-device">
                              <span class="input-group-addon">
                                <i class="material-icons">label</i>
                              </span>
                              <textarea name="descricao" class="form-control" placeholder="Write a little description of the item...." rows="10"></textarea>
                            </div>

                            <div class="input-group btn-upload-imagem">
                              <label class="btn btn-md btn-default btn-cor-estilo-escuro"><i class="material-icons">file_upload</i>
                                Picture <input style="display: none;" name="enderFoto" type="file" >
                              </label>
                              <p class="informacao-imagem-upload">
                                Item picture
                              </p>
                            </div>

                            <div class="" id="error-editar-perfil">

                            </div>
                        </div>
                      </div>
                    </div>

                    <div class="footer text-center">
                      <input id="btnAdicionar" value="Submit" class="btn btn-default  btn-lg btn-cor-estilo-escuro" type="submit" />
                    </div>

                  </form>


            </div>

          </div>

        </div>
      </div>
    </div>
  </div>


</body>

<?php require 'footer-en-us.php'; ?>

</html>
