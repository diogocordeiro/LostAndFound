<!DOCTYPE html>
<html ng-app="login">

<head>

  <?php require 'header.php'; ?>

    <!-- Custom Theme CSS -->

    <link href="../static/css/index-logado.css" rel="stylesheet">
    <link href="../static/css/index.css" rel="stylesheet">

</head>

<body>

  <?php require 'top-menu-en-us.php'; ?>

  <div class="wrapper">
            <?php
              require('../backend/nomesTabelas.php');
              require('../backend/funcoes.php');
              require('../backend/conBd.php');
              require('../backend/default_timezone.php');

              if(isset($_GET['id'])){

                //Valida string
                $idLink = validarString($_GET['id']);

                $dados = getData(BaseDados::conBdUser(), $tabSenhas, "link", $idLink, "s");

                //Para calcular se o link expirou ou nao
                $dataHoje = date('Y-m-d h:i:s');
                $datetime1 = new DateTime($dados[0]['dataSolicitacao']);
                $datetime2 = new DateTime(date('Y-m-d h:i:s'));
                $intervalo = $datetime1->diff($datetime2);
                $diasPassados = $intervalo->format('%a');
                $horasPassadas = $intervalo->format('%h');

                //Caso o link nao exista no bd
                if (count($dados) == 0) {
                  echo "<br/><br/><br/><br/><br/><br/><br/><br/><br/><center>Erro: Link not found<br/><a href='javascript:history.go(-1);'>voltar</a></center>";
                  exit;

                //Caso o link tenha sido solicitado ha mais de um dia
                } elseif ($diasPassados > 1 && $horasPassadas > 24) {
                    echo "<br/><br/><br/><br/><br/><br/><br/><br/><br/><center>Erro: Link expired<br/><a href='javascript:history.go(-1);'>voltar</a></center>";
                    exit;

                  //Caso o link tenha ja' tenha sido utilizado
                  } elseif ($dados[0]['situacao'] != 1) {
                    echo "<br/><br/><br/><br/><br/><br/><br/><br/><br/><center>Erro: Password already changed.<br/><a href='javascript:history.go(-1);'>voltar</a></center>";
                    exit;
                  }

              //Caso a variavel id nao seja informada
              } else {
                  echo "<br/><br/><br/><br/><br/><br/><br/><br/><br/><center>Erro: Enter link ID!<br/><a href='javascript:history.go(-1);>voltar</a></center></body></html>";
                  exit;
                }
            ?>
    <div class="header header-filter" style="background-image: url('../static/img/bg14.jpg'); background-size: cover; background-position: top center;">

      <div class="container">
        <div class="row">

          <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 ">

            <div class="card card-signup">

              <div class="resultados">

              </div>

              <form class="form" id="register-form" method="POST" action="../backend/Senha.php?tipo=altera">

                <input name="email" type="hidden" value="<?php echo $dados[0]['email'];?>"/>
                <input name="id" type="hidden" value="<?php echo $idLink;?>"/>

                <div class="header header-primary text-center">
                  <h4>Change Password</h4>

                </div>
                <p class="text-divider">New Password</p>
                <div class="content">


                  <div class="input-group">
                    <span class="input-group-addon">
                    <i class="material-icons">lock_outline</i>
                  </span>

                    <input type="password" class="form-control input-lg" id="senha" name="senha" ng-model="senha" placeholder="Password..." required>
                  </div>

                  <div class="input-group">
                    <span class="input-group-addon">
                    <i class="material-icons">lock_outline</i>
                  </span>

                    <input type="password" class="form-control input-lg" id="confirmaSenha" name="confirmaSenha" ng-model="confirmar_senha" placeholder="Confirm Password..." required>
                  </div>



                    <div id="error">


                    </div>


                </div>
                <div class="footer text-center">

                  <input class="btn btn-lg btn-default btn-estilo" id="btnCadastrarUsuario" type="submit" value="Confirm">



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
<?php require 'footer-en-us.php'; ?>
</html>
