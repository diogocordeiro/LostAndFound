<!DOCTYPE html>
<html ng-app="login">

<head>

  <?php require 'header.php'; ?>

    <!-- Custom Theme CSS -->

    <link href="../static/css/index-logado.css" rel="stylesheet">
    <!-- Custom Theme CSS -->
    <link href="../static/css/index.css" rel="stylesheet">


</head>

<body>

  <?php require 'top-menu.php'; ?>


  <div class="wrapper">
    <div class="header header-filter" style="background-image: url('../static/img/bg14.jpg'); background-size: cover; background-position: top center;">

      <div class="container">
        <div class="row">

          <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 ">

            <div class="card card-signup">

              <div class="resultados">

              </div>

              <form class="form" id="register-form">
                <div class="header header-primary text-center">
                  <h4>Alterar Senha</h4>

                </div>
                <p class="text-divider">Digite o email cadastrado</p>
                <div class="content">


                  <div class="input-group">
                    <span class="input-group-addon">
                    <i class="material-icons">email</i>
                  </span>
                    <input type="email" class="form-control input-lg " id="email" name="email" ng-model="email" placeholder="Email..." required />
                  </div>



                    <div id="error">


                    </div>


                </div>
                <div class="footer text-center">

                  <input class="btn btn-lg btn-default btn-estilo" id="btnCadastrarUsuario" type="submit" value="Enviar">



                </div>
              </form>
            </div>
          </div>

        </div>
        <!-- Row -->

      </div>
      <!-- Container -->

    </div>
    <!-- Header Image Background -->

  </div>
  <!-- Wrapper -->


</body>
<?php require 'footer.php'; ?>
</html>
