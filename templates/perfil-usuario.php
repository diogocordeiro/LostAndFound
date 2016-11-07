<!DOCTYPE html>
<html ng-app="login">

<head>

  <?php require 'header.php'; ?>

    <!-- Custom Theme CSS -->

    <link href="../static/css/index-logado.css" rel="stylesheet">
    <link href="../static/css/perfil-usuario.css" rel="stylesheet">

</head>

<body>

  <?php require 'top-menu-logado.php'; ?>

  <!-- coletar informacoes no banco -->
  <?php
    require('../backend/funcoes.php');
    require('../backend/conBd.php');

    $dados = getPerfil(BaseDados::conBdUser(), $_SESSION['Lost_Found']["id"]);
  ?>

  <div class="container-fluid">

    <div class="section text-center section-landing">

      <div class="row">

        <div class="col-md-10 col-md-offset-1">

          <div class="card card-content">

            <h2 class="title titulo-adicionar-item">Perfil</h2>

            <div class="row">

              <div class="col-md-4 col-md-offset-1">

                <img src="../usuarios/fotos/<?php echo $dados[0]['imagemPerfil'];?>" class="img-circle img-responsive img-raised">

              </div>

              <div class="col-md-6 ">

                <div class="card card-content-item">

                  <div class="row">

                    <div class="col-md-4 col-md-offset-1">

                      <dl class="dl-horizontal">
                        <dt>E-mail: </dt>
                        <dd class="dd-conteudo-email"><?php echo $dados[0]['email'];?></dd>

                        <br><br>

                        <dt>Data Nascimento: </dt>
                        <dd class="dd-conteudo-data"><?php echo $dados[0]['dNascimento'];?></dd>

                        <br><br>

                        <dt>Senha: </dt>
                        <dd class="dd-conteudo-senha"><a href="#">Alterar</a></dd>

                        <br><br>

                        <dt>Nome: </dt>
                        <dd class="dd-conteudo"><?php echo $dados[0]['nome'];?></dd>

                        <br><br>

                        <dt>Sobrenome: </dt>
                        <dd class="dd-conteudo-sobrenome"><?php echo $dados[0]['sobrenome'];?></dd>

                        <br><br>


                        <dt>Sexo: </dt>
                        <dd class="dd-conteudo">
                          <?php
                              if($dados[0]['sexo'] == 1){
                                echo "Feminino";
                              } else {
                                  echo "Masculino";
                                }
                          ?>
                        </dd>

                        <br><br>

                        <dt>Cidade: </dt>
                        <dd class="dd-conteudo" ><?php echo $dados[0]['cidade'];?></dd>

                        <br><br>

                        <dt>País: </dt>
                        <dd class="dd-conteudo-pais"><?php echo $dados[0]['pais'];?></dd>

                        <br><br>

                        <dt>Celular: </dt>
                        <dd class="dd-conteudo-telefone"><?php echo $dados[0]['celular'];?></dd>

                        <br><br>

                        <dt>Telefone: </dt>
                        <dd class="dd-conteudo-telefone"><?php echo $dados[0]['telefone'];?></dd>

                        <br><br>

                        <dt>Facebook: </dt>
                        <dd class="dd-conteudo"><?php echo $dados[0]['facebook'];?></dd>

                        <br><br>

                        </dl>

                    </div>

                  </div>

                </div>

                <div class="footer text-center">
                    <a class="btn-editar btn-salvar btn btn-default  btn-lg btn-cor-estilo-escuro" href="form-editar-perfil.php">Editar Perfil</a>
                </div>

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
