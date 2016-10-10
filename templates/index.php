<!DOCTYPE html>
<html ng-app="login">
  <head>

    <?php require 'header.php'; ?>

    <!-- Custom Theme CSS -->
    <link href="../static/css/index.css" rel="stylesheet">



  </head>
  <body ng-controller="CadastroController">

    <?php require 'top-menu.php'; ?>

    <div class="wrapper">
  <div class="header header-filter" style="background-image: url('../static/img/bg14.jpg'); background-size: cover; background-position: top center;">





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

      </div><!-- Row -->

    </div><!-- Container -->

    </div><!-- Header Image Background -->

  </div><!-- Wrapper -->


  <div class="container-fluid">
     <div class="section text-center section-landing">
             <div class="row">
                 <div class="col-md-8 col-md-offset-2">
                     <h2 class="title">Lost & Found</h2>
                     <h5 class="description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam ex quam, mattis ac nisl sed, commodo dapibus quam. In fermentum auctor lacus, id imperdiet magna pellentesque egestas. Cras at arcu nec lectus rutrum tempor. Vivamus semper dolor eros, non imperdiet nulla vulputate id. Duis sit amet nisi sapien. Proin vitae dolor nec leo sagittis mollis. Vestibulum in tempor lectus. Fusce ut justo placerat, aliquet tortor sed, suscipit sem. Sed aliquam scelerisque m...(line truncated)...
                 </div>
             </div>

     <div class="features">
       <div class="row">
                   <div class="col-md-4">
           <div class="info">
             <div class="icon icon-primary">
               <i class="material-icons">person</i>
             </div>
             <h4 class="info-title">First Feature</h4>
             <p>Divide details about your product or agency work into parts. Write a few lines about each one. A paragraph describing a feature will be enough.</p>
           </div>
                   </div>
                   <div class="col-md-4">
           <div class="info">
             <div class="icon icon-success">
               <i class="material-icons">map</i>
             </div>
             <h4 class="info-title">Second Feature</h4>
             <p>Divide details about your product or agency work into parts. Write a few lines about each one. A paragraph describing a feature will be enough.</p>
           </div>
                   </div>
                   <div class="col-md-4">
           <div class="info">
             <div class="icon icon-danger">
               <i class="material-icons">view_agenda</i>
             </div>
             <h4 class="info-title">Third Feature</h4>
             <p>Divide details about your product or agency work into parts. Write a few lines about each one. A paragraph describing a feature will be enough.</p>
           </div>
                   </div>
               </div>
     </div>

     </div>
</div>




    <?php require 'footer.php'; ?>
  </body>
</html>
