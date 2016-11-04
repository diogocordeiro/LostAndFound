<!DOCTYPE html>
<html ng-app="login">

<head>

  <?php require 'header.php'; ?>
    <script type="text/javascript" language="javascript" src="../backend/js/cadastroUsuario.js"></script>

    <!-- Custom Theme CSS -->
    <link href="../static/css/index.css" rel="stylesheet">

    <script type="text/javascript">
      function Nova() {
        location.href = " index.php"
      }

      $('.mensagem-alerta:empty').hide();

    </script>

</head>

<body ng-controller="CadastroController">



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
                    <h4>Cadastro</h4>

                  </div>
                  <p class="text-divider">É de graça</p>
                  <div class="content">


                    <div class="input-group">
                      <span class="input-group-addon">
											<i class="material-icons">email</i>
										</span>
                      <input type="email" class="form-control input-lg " id="email" name="email" ng-model="email" placeholder="Email..." required />
                    </div>

                    <div class="input-group">
                      <span class="input-group-addon">
											<i class="material-icons">lock_outline</i>
										</span>

                      <input type="password" class="form-control input-lg" id="senha" name="senha" ng-model="senha" placeholder="Senha..." required>
                    </div>

                    <div class="input-group">
                      <span class="input-group-addon">
											<i class="material-icons">lock_outline</i>
										</span>

                      <input type="password" class="form-control input-lg" id="confirmaSenha" name="confirmaSenha" ng-model="confirmar_senha" placeholder="Confirmar Senha..." required>
                    </div>



                    <div class="input-group">
                      <span class="input-group-addon">
											<i class="material-icons">today</i>
										</span>

                      <p class="data-nascimento-label">Data Nascimento</p>
                      <input type="date" place class="form-control input-lg" id="dNascimento" name="dNascimento" ng-model="data_nascimento" placeholder="Data Nascimento..." required>
                      <p class="informacao-data-nascimento">
                        *Maiores de 18 anos.
                      </p>
                    </div>


                    <div class="mensagem-alerta">

                      <div class="alert alert-warning">
                        <div class="container-fluid">
                          <div class="alert-icon">
                            <i class="material-icons">info_outline</i>
                          </div>
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true"><i class="material-icons">clear</i></span>
                          </button>

                          <div id="error">


                          </div>

                        </div>

                      </div>

                    </div>







                  </div>
                  <div class="footer text-center">

                    <input class="btn btn-lg btn-default btn-estilo" id="btnCadastrarUsuario" type="submit" value="Cadastrar">



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


    <div class="container-fluid">
      <div class="section text-center section-landing">
        <div class="row">
          <div class="col-md-8 col-md-offset-2">
            <h2 class="title">Lost & Found</h2>
            <h5 class="description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum. Praesent mauris. Fusce nec tellus sed augue semper porta. Mauris massa. Vestibulum lacinia arcu eget nulla. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Curabitur sodales ligula in libero. Sed dignissim lacinia nunc. Curabitur tortor.
                 </div>
             </div>

     <div class="features">
       <div class="row">
                   <div class="col-md-4">

           <div class="info">
             <div class="icon icon-primary">
               <i class="material-icons usuario-icon">person</i>
             </div>
             <h4 class="info-title">Usuários</h4>
             <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum. Praesent mauris. Fusce nec tellus sed augue semper porta. Mauris massa. Vestibulum lacinia arcu eget nulla. Class aptent taciti sociosq.</p>
           </div>
                   </div>
                   <div class="col-md-4">
           <div class="info">
             <div class="icon icon-success">
               <i class="material-icons">map</i>
             </div>
             <h4 class="info-title">Localização</h4>
             <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam ex quam, mattis ac nisl sed, commodo dapibus quam. In fermentum auctor lacus, id imperdiet magna pellentesque egestas. Cras at arcu nec lectus rutrum tempor. Vivamus semper dolor eros, non imperdiet nulla vulputate id. Duis sit amet nisi sapien. Proin vitae dolor nec leo sagittis mollis. Vestibulum in tempor lectus. Fusce ut justo placerat, aliquet tortor sed, suscipit sem. Sed aliquam scelerisque m...(line truncated)...

               </p>
           </div>
                   </div>
                   <div class="col-md-4">
           <div class="info">
             <div class="icon icon-danger">
               <i class="material-icons">view_agenda</i>
             </div>
             <h4 class="info-title">Itens</h4>
             <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum.</p>
           </div>
                   </div>
               </div>
     </div>

     </div>
</div>



  </body>


  <?php require 'footer.php'; ?>




</html>
