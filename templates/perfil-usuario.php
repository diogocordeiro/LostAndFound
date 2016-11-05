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
    require('../backend/getPerfil.php');
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

                <img style="width: 250px;height:250px;border-radius:150px;-webkit-border-radius: 150px;-moz-border-radius: 150px"src="../usuarios/fotos/<?php echo $dados[0]['imagemPerfil'];?>" class="img-rounded img-responsive img-raised">

              </div>

              <div class="col-md-6 ">

                <div class="card card-content-item">

                  <div class="row">

                    <div class="col-md-4 col-md-offset-1">

                      <dl class="dl-horizontal">
                        <dt>E-mail: </dt>
                        <dd><?php echo $dados[0]['email'];?></dd>

                        <dt>Data Nascimento: </dt>
                        <dd><?php echo $dados[0]['dNascimento'];?></dd>

                        <dt>Senha: </dt>
                        <dd><a href="#">Alterar</a></dd>

                        <dt>Nome: </dt>
                        <dd><?php echo $dados[0]['nome'];?></dd>

                        <dt>Sobrenome: </dt>
                        <dd><?php echo $dados[0]['sobrenome'];?></dd>


                        <dt>Sexo: </dt>
                        <dd>
                          <?php
                              if($dados[0]['sexo'] == 1){
                                echo "Feminino";
                              } else {
                                  echo "Masculino";
                                }
                          ?>
                        </dd>

                        <dt>Cidade: </dt>
                        <dd><?php echo $dados[0]['cidade'];?></dd>

                        <dt>País: </dt>
                        <dd><?php echo $dados[0]['pais'];?></dd>

                        <dt>Celular: </dt>
                        <dd><?php echo $dados[0]['celular'];?></dd>

                        <dt>Telefone: </dt>
                        <dd><?php echo $dados[0]['telefone'];?></dd>

                        <dt>Facebook: </dt>
                        <dd><?php echo $dados[0]['facebook'];?></dd>

                        </dl>

                    </div>

                  </div>

                </div>

                <div class="footer text-center">
                    <a class="btn-salvar btn btn-default  btn-lg btn-cor-estilo-escuro" href="form-editar-perfil.php">Editar Perfil</a>
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
