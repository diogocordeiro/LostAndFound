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
                        <input type="text" id="nome" class=" form-control input-lg " placeholder="Nome..." required />

                      </div>

                      <div class="input-group input-size-small-device">

                        <span class="input-group-addon">
                        <i class="material-icons">label</i>
                        </span>
                        <input type="text" id="sobrenome" class=" form-control input-lg " placeholder="Sobrenome..." required />

                      </div>

                      <div class="input-group">

                        <div class="label-sexo">

                            <span class="label label-default">Sexo</span><br><br>

                        </div>

                        <div class="radio-sexo-feminino">

                          <input type="radio" id="sexoF" name="sexo" value="feminino"> Feminino<br>

                        </div>

                        <div class="radio-sexo-masculino">

                          <input type="radio" id="sexoM" name="sexo" value="masculino"> Masculino<br>

                        </div>

                      </div>

                      <div class="row">

                        <div class="col-md-4">

                          <div class="lista-pais">

                            <div class="btn-group posicao-dropdown dropdown-small-device">
                              <button type="button" class="btn-cor-estilo-escuro btn-sm btn btn-default dropdown-toggle" data-toggle="dropdown">
                                País <span class="caret"></span>
                              </button>

                                <ul class="dropdown-menu scroll-dropdown " role="menu">
                                                                </ul>

                              </div>

                          </div>





                        </div>

                        </div>


                      <div class="input-group input-size-small-device">
                        <span class="input-group-addon">
                        <i class="material-icons">label</i>
                      </span>
                        <input id="celular" type="text" class=" form-control input-lg " placeholder="Celular...     Ex:081XXXXXXXXX " required />
                      </div>

                      <div class="input-group input-size-small-device">
                        <span class="input-group-addon">
                        <i class="material-icons">label</i>
                      </span>
                        <input id="telefone" type="text" class=" form-control input-lg " placeholder="Telefone...     Ex:081XXXXXXXX " required />
                      </div>

                      <div class="input-group input-size-small-device">
                        <span class="input-group-addon">
                        <i class="material-icons">label</i>
                      </span>
                        <input type="link" id="facebook" class=" form-control input-lg " placeholder="Facebook Link..." required />
                      </div>

                      <div class="input-group btn-upload-imagem">
                        <label class="btn btn-md btn-default btn-cor-estilo-escuro"><i class="material-icons">file_upload</i>
                          Imagem <input type="file" id="imagemPerfil" style="display: none;">
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

                    <button class="btn-salvar btn btn-default  btn-lg btn-cor-estilo-escuro" type="button">
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
