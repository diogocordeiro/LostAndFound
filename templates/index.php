<!DOCTYPE html>
<html ng-app="login">

<head>

  <?php require 'header.php'; ?>
    <script type="text/javascript" language="javascript" src="../backend/js/cadastroUsuario.js"></script>
    <script type="text/javascript" language="javascript" src="../backend/js/logarUsuario.js"></script>


    <!-- Custom Theme CSS -->
    <link href="../static/css/index.css" rel="stylesheet">

    <script type="text/javascript">
      function Nova() {
        location.href = " index.php"
      }
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

                    <div id="error">


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
            <h5 class="description">O Lost And Found Project é uma plataforma web onde é possível conectar pessoas que perderam algum item com usuários que encontraram o objeto, e vise-versa. Esta interação de mão dupla entre as pessoas é o principal objetivo desta ferramenta. Um usuário que faz a busca por itens perdidos pode visualizar um item individualmente e postar um comentário na página deste item o  comentário servirá para que ambos o usuário que possivelmente perdeu algo, com o usuário que achou o item possam comunicar-se.
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
             <p>O contato com outras pessoas que compartilham o mesmo que você é uma parte fundamental da interação humana, pensando nisso o nosso sistema possui uma base de usuarios, com interesses em comum. Se voê perdeu algum item e acredita que alguém pode achar e devolver para você ou se achou algo e quer devolver para o dono, este é o local.</p>
           </div>
                   </div>
                   <div class="col-md-4">
           <div class="info">
             <div class="icon icon-success">
               <i class="material-icons">map</i>
             </div>
             <h4 class="info-title">Localização</h4>
             <p>De maneira fácil e intuitiva os usuarios podem informar a localização onde o item foi perdido ou achado. Durante a busca é possivel filtrar pelo local desejado. A informação visual de um mapa pode ser de grande ajuda nessas horas, por isso nosso sistema possui integração com o Google Maps.

               </p>
           </div>
                   </div>
                   <div class="col-md-4">
           <div class="info">
             <div class="icon icon-danger">
               <i class="material-icons">view_agenda</i>
             </div>
             <h4 class="info-title">Itens</h4>
             <p>Os usuários poderão cadastrar seus itens previamente no sistema, com esse cadastro será mais fácil para o usuário reportar sua perda tendo em vista que os dados dos itens já constam no sistema. Outro diferencial de cadastrar previamente os itens é que se um report de perda é criado a partir de um item que já estava cadastrado previamente no sistema a página deste report vai ter um selo especial identificando isso.</p>
           </div>
                   </div>
               </div>
     </div>

     </div>
</div>



  </body>


  <?php require 'footer.php'; ?>




</html>
