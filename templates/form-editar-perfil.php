<!DOCTYPE html>
<html>

<head>

  <?php require 'header.php'; ?>

    <!-- Custom Theme CSS -->
    <link href="../static/css/index-logado.css" rel="stylesheet">
    <link href="../static/css/form-editar-perfil.css" rel="stylesheet">

</head>

<body>
  <?php require 'top-menu-logado.php'; ?>
  
  <!-- coletar informacoes no banco -->
  <?php
    require('../backend/getPerfil.php');
    require('../backend/conBd.php');

    $dados = getPerfil(BaseDados::conBdUser(), $_SESSION['Lost_Found']["id"]);

    // print_r($dados);exit;
  ?>

  <div class="wrapper">

    <div class="container-fluid">

      <div class="section text-center section-landing">

        <div class="row">

          <div class="col-md-8 col-md-offset-2">

            <div class="card card-adicionar-item">

              <h2 class="title titulo-adicionar-item">Perfil</h2>

              <h5 class="description descricao-adicionar-item">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum. Praesent mauris.</h5>

              <form class="form">

                <div class="content">

                  <div class="row">

                    <div class="col-md-8 col-md-offset-2 ">

                      <div class="input-group input-size-small-device">

                        <span class="input-group-addon">
                        <i class="material-icons">label</i>
                        </span>
                        <input value="<?php echo $dados[0]['nome']; ?> " type="text" name="nome" id="nome" class=" form-control input-lg " placeholder="Nome..." required />

                      </div>

                      <div class="input-group input-size-small-device">

                        <span class="input-group-addon">
                        <i class="material-icons">label</i>
                        </span>
                        <input value="<?php echo $dados[0]['sobrenome']; ?> " type="text" name="sobrenome" id="sobrenome" class=" form-control input-lg " placeholder="Sobrenome..." required />

                      </div>

                      <div class="input-group">

                        <div class="label-sexo">

                            <span class="label label-default">Sexo</span><br><br>

                        </div>

                        
                        <?php if($dados[0]['sexo'] == 1){ ?>
                          <div class="radio-sexo-feminino"><input value="1" type="radio" name="sexoF" id="sexoF" name="sexo" checked> Feminino<br></div>
                          <div class="radio-sexo-masculino"><input value="0" type="radio" name="sexoM" id="sexoM" name="sexo" > Masculino<br></div>
                        <?php } else { ?>
                          <div class="radio-sexo-feminino"><input value="1" type="radio" name="sexo" id="sexoF" name="sexo" > Feminino<br></div>
                          <div class="radio-sexo-masculino"><input value="0" type="radio" name="sexo" id="sexoM" name="sexo" checked> Masculino<br></div>
                        <?php } ?>
                      
                      </div>

                      <div class="row">

                        <div class="col-md-4">
                        <select name="pais">
                          <?php
                            
                            //Lista dos paises
                            require('listaPaises.php');

                            //Procura qual o pais (na lista de paises), para poder seleciona-lo para preencher o select
                            $pos = strpos($paises, $dados[0]['abrev']);
                            $paises = substr($paises, 0, $pos+3)." selected".substr($paises, $pos+3, strlen($paises));
                            
                            echo $paises;
                          ?>
                        </select>

                        </div>

                        </div>


                      <div class="input-group input-size-small-device">
                        <span class="input-group-addon">
                        <i class="material-icons">label</i>
                      </span>
                        <input value="<?php echo $dados[0]['celular']; ?> " id="celular" name="celular" type="text" class=" form-control input-lg " placeholder="Celular...     Ex:081XXXXXXXXX " required />
                      </div>

                      <div class="input-group input-size-small-device">
                        <span class="input-group-addon">
                        <i class="material-icons">label</i>
                      </span>
                        <input value="<?php echo $dados[0]['telefone']; ?> " id="telefone" name="telefone" type="text" class=" form-control input-lg " placeholder="Telefone...     Ex:081XXXXXXXX " required />
                      </div>

                      <div class="input-group input-size-small-device">
                        <span class="input-group-addon">
                        <i class="material-icons">label</i>
                      </span>
                        <input value="<?php echo $dados[0]['facebook']; ?> " type="text" name="facebook" id="facebook" class=" form-control input-lg " placeholder="Facebook Link..." required />
                      </div>

                      <div class="input-group btn-upload-imagem">
                        <label class="btn btn-md btn-default btn-cor-estilo-escuro"><i class="material-icons">file_upload</i>
                          Imagem <input value="<?php echo $dados[0]['imagemPerfil']; ?> " type="file" name="imagemPerfil" id="imagemPerfil" style="display: none;">
                        </label>
                        <p class="informacao-imagem-upload">

                          Foto de perfil.

                        </p>
                    </div>



                      </div>

                    </div>

                  </div>

                </div>

                  <div class="footer text-center">

                    <button id="btnSalvar" name="btnSalvar" class="btn-salvar btn btn-default  btn-lg btn-cor-estilo-escuro" type="button">
                      Salvar
                    </button>



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
