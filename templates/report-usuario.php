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

          <div class="col-md-10 col-md-offset-1">

            <div class="card card-content">

              <h2 class="title titulo-adicionar-item">Report</h2>

              <div class="row">

                <div class="row">

                  <div class="col-md-4">

                  </div>

                  <div class="col-md-4">

                    <!-- style="width: 250px;height:250px;border-radius:150px;-webkit-border-radius: 150px;-moz-border-radius: 150px" -->

                    <img src="../static/img/bg3.jpg" class="img-rounded img-responsive img-raised">


                  </div>

                  <div class="col-md-4">

                    <!-- style="width: 250px;height:250px;border-radius:150px;-webkit-border-radius: 150px;-moz-border-radius: 150px" -->

                    <img src="../static/img/badge.jpg" class="img-badge img-circle img-responsive img-raised">

                    <p>
                      BADGE CASO O ITEM SEJA CADSATRADO PREVIAMENTE NO SITE
                    </p>


                  </div>



                </div>



                    <div class="row">

                      <div class="col-md-4 col-md-offset-4">

                        <dl class="dl-horizontal">

                          <dt>Data Criação do Report: </dt>
                          <dd class="dd-data"></dd>

                          <br><br><br>

                          <dt>Marca: </dt>
                          <dd></dd>

                          <br><br><br>

                          <dt>Identificador: </dt>
                          <dd></dd>

                          <br><br><br>

                          <dt>Cor Predominante: </dt>
                          <dd></dd>

                          <br><br><br>

                          <dt>Cor Secundária: </dt>
                          <dd></dd>

                          <br><br><br>

                          <dt>Categoria: </dt>
                          <dd></dd>

                          <br><br><br>

                          <dt>Subcategoria: </dt>
                          <dd></dd>

                          <br><br><br>

                          <dt>Caracteristicas: </dt>
                          <dd class="dd-caracteristicas" ></dd>

                          <br><br><br>

                          <dt>Descrição: </dt>

                            <dd class="dd-descricao"></dd>

                          <br><br><br>

                          <dt>Informação: </dt>

                            <dd class="dd-descricao"></dd>

                          <br><br><br>


                          </dl>

                      </div>

                    </div>


                    <div class="row">
                      <div class="col-md-4 col-md-offset-4">

                        <p>
                          OBS: AQUI VAI A JANELA DA API DO MAPS, Não uma imagem
                        </p>

                        <!-- style="width: 250px;height:250px;border-radius:150px;-webkit-border-radius: 150px;-moz-border-radius: 150px" -->

                        <img src="../static/img/map.jpg" class="img-rounded img-responsive img-raised">

                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-4 col-md-offset-4">

                        <dl class="dl-horizontal">

                          <dt>Data : </dt>
                          <dd class="dd-data"></dd>

                          <br><br><br>

                          <dt>Endereço: </dt>
                          <dd></dd>

                          <br><br><br>

                          <dt>Complemento: </dt>
                          <dd></dd>

                          <br><br><br>

                          <dt>Estado: </dt>
                          <dd></dd>

                          <br><br><br>

                          <dt>Cidade: </dt>
                          <dd></dd>

                          <br><br><br>

                          <dt>CEP: </dt>
                          <dd></dd>

                          <br><br><br>

                          <dt>País: </dt>
                          <dd></dd>

                          <br><br><br>



                          </dl>


                      </div>
                    </div>


                    <div class="row">
                      <div class="col-md-4 col-md-offset-4">

                        <p>
                          OBS: AQUI VAI A JANELA Dos comentarios, Não uma imagem
                        </p>

                        <!-- style="width: 250px;height:250px;border-radius:150px;-webkit-border-radius: 150px;-moz-border-radius: 150px" -->

                        <img src="../static/img/comentario.png" class="img-rounded img-responsive img-raised">

                      </div>
                    </div>

                    <br><br><br>

                    <p>
                      CASO O USUARIO LOGADO SEJA O DONO DO REPORT, ELE VERA OS BOTOES.
                    </p>
                  <div class="footer text-center">
                      <a class="btn-salvar btn btn-default  btn-lg btn-cor-estilo-escuro" href="form-editar-item.php?id=<?php echo $dados[0]['id'];?>">Editar Report</a>
                      <a class="btn-salvar btn btn-default  btn-lg btn-cor-estilo-escuro" href="meus-itens.php">Deletar Report</a>
                      <a class="btn-salvar btn btn-default  btn-lg btn-cor-estilo-escuro" href="#" >Encerrar o Report</a>
                  </div>

              </div>

            </div>

          </div>

        </div>

      </div>

    </div>

  </body>

  <?php require 'footer.php'; ?>

  </html>
