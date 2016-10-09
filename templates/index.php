<!DOCTYPE html>
<html ng-app="login">
  <head>

    <?php require 'header.php'; ?>

    <!-- Custom Theme CSS -->
    <link href="../static/css/index.css" rel="stylesheet">



  </head>
  <body ng-controller="CadastroController">

    <?php require 'top-menu.php'; ?>


    <div class="container">
      <div class="row">

        <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 ">
						<div class="card card-signup">
							<form class="form" method="" action="">
								<div class="header header-primary text-center">
									<h4>Cadastro</h4>

								</div>
								<p class="text-divider">É de graça</p>
								<div class="content">


									<div class="input-group">
										<span class="input-group-addon">
											<i class="material-icons">email</i>
										</span>
										<input type="email" class="form-control input-lg " name="formCadastro[email]" ng-model="email" placeholder="Email..." required />
									</div>

									<div class="input-group">
										<span class="input-group-addon">
											<i class="material-icons">lock_outline</i>
										</span>

										<input type="password" class="form-control input-lg" name="formCadastro[senha]" ng-model="senha"  placeholder="Senha..." required>
									</div>

                  <div class="input-group">
										<span class="input-group-addon">
											<i class="material-icons">lock_outline</i>
										</span>

										<input type="password" class="form-control input-lg" name="formCadastro[confirmaSenha]" ng-model="confirmar_senha" placeholder="Confirmar Senha..." required>
									</div>

                  <div class="input-group">
										<span class="input-group-addon">
											<i class="material-icons">today</i>
										</span>

										<input type="date" class="form-control input-lg" name="formCadastro[dNascimento]" ng-model="data_nascimento" placeholder="Data Nascimento..." required>
									</div>



								</div>
								<div class="footer text-center">



                    <input class=" btn-block btn btn-lg btn-primary btn-cadastrar" type="submit" ng-click="cadastrarUsuario()"
                             value="Cadastrar">

                  

								</div>
							</form>
						</div>
					</div>

      </div>

    </div>


    <?php require 'footer.php'; ?>
  </body>
</html>
