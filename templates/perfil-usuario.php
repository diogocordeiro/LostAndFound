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


  <div class="container-fluid">

    <div class="section text-center section-landing">

      <div class="row">

        <div class="col-md-10 col-md-offset-1">

          <div class="card card-content">

            <h2 class="title titulo-adicionar-item">Perfil</h2>

            <div class="row">

              <div class="col-md-4 col-md-offset-1">

                <img value="<? echo $dados[0]['imagemPerfil']?> " src="../static/img/camera.jpg" class="img-rounded img-responsive img-raised">

              </div>

              <div class="col-md-6 ">

                <div class="card card-content-item">

                  <div class="row">

                    <div class="col-md-4 col-md-offset-1">

                      <dl class="dl-horizontal">
                        <dt>E-mail: </dt>
                        <dd name="email" value="<? echo $dados[0]['email']?>"></dd>

                        <dt>Data Nascimento: </dt>
                        <dd name="dataNascimento" value="<? echo $dados[0]['dNascimento']?> "></dd>

                        <dt>Senha: </dt>
                        <dd><a href="#">Alterar</a></dd>

                        <dt>Nome: </dt>
                        <dd name="nome" value="<? echo $dados[0]['nome']?> "></dd>

                        <dt>Sobrenome: </dt>
                        <dd name="sobrenome" value="<? echo $dados[0]['sobrenome']?> "></dd>


                        <dt>Sexo: </dt>
                        <dd name="sexo" value="<? echo $dados[0]['sexo']?> "></dd>

                        <dt>País: </dt>
                        <dd name="pais" value="<? echo $dados[0]['pais']?> "></dd>

                        <dt>Celular: </dt>
                        <dd name="celular" value="<? echo $dados[0]['celular']?> "></dd>

                        <dt>Telefone: </dt>
                        <dd name="telefone" value="<? echo $dados[0]['telefone']?> "></dd>

                        <dt>Facebook: </dt>
                        <dd name="facebook" value="<? echo $dados[0]['facebook']?> "></dd>

                        </dl>

                    </div>

                  </div>

                </div>

                <div class="footer text-center">

                  <button id="btnEditar" name="btnEditar" class="btn-salvar btn btn-default  btn-lg btn-cor-estilo-escuro" type="button">
                    Editar Perfil
                  </button>

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
