<!DOCTYPE html>
<html>
  <head>

    <?php require 'header.php'; ?>

    <!-- Custom Theme CSS -->
    <link href="../static/css/index.css" rel="stylesheet">



  </head>
  <body>

    <?php require 'top-menu.php'; ?>



    <div class="container-fluid container-form">

      <div class="col-md-6 texto-informativo">

        <h1>TESTE</h1>

        <p>
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec egestas purus eget urna aliquam cursus. Integer elementum lectus erat, nec ornare mauris suscipit at. Donec cursus interdum molestie. Etiam faucibus finibus lectus, et facilisis felis vulputate id. Nullam quis ligula pulvinar leo lobortis ornare. Cras et metus ultrices, ultricies sapien sed, vestibulum mauris. Curabitur in tempor turpis, non fringilla dui. Donec elementum enim tellus. Nunc vel ligula eu enim luctus rhoncus. Quisque congue vehicula ullamcorper. Sed gravida nibh id mauris ullamcorper, et semper mi sollicitudin.

Aliquam tincidunt tincidunt nunc. Sed placerat, eros nec semper tincidunt, nulla neque mollis lacus, eget accumsan leo augue in elit. Integer egestas faucibus neque, viverra viverra tortor egestas et. Etiam laoreet ut sem in fringilla. Aliquam suscipit mattis fringilla. Nullam sit amet enim egestas, congue ipsum vitae, faucibus massa. Proin eu nisl mi. Nunc tincidunt ornare leo. Vivamus semper vulputate volutpat. Vivamus risus nisl, mollis id lacinia sit amet, aliquam vitae nulla. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras consectetur maximus nulla in dictum. Mauris ut ultricies risus, et porta orci. In et urna vitae sem ultrices maximus nec at nunc. Donec hendrerit lacus non lacus iaculis pulvinar.
        </p>



      </div>





      <div class="container center-block container-panel">
  		<div class="row">




  			<div class="col-md-6 col-md-push-2 col-sm-12 panel panel-default">

  				<h1 class="margin-base-vertical texto-panel">Não possui conta ainda?</h1>

          <h3 class="margin-base-vertical texto-panel">Criei agora mesmo é gratuito!</h3>


  				<form class="margin-base-vertical">
  					<p class="input-group">
              <div class="center-block input-group col-md-6 col-sm-12 col-xs-12">



                  <label>E-mail</label>



                  <input type="email" class="form-control input-lg " ng-model="email" required />
              </div>


              <div class="center-block input-group col-md-6 col-sm-12 col-xs-12">

                  <label>Senha</label>
                  <input type="password" class="form-control input-lg" ng-model="senha" required>

              </div>

              <div class="center-block input-group col-md-6 col-sm-12 col-xs-12">

                  <label>Confirmar Senha</label>
                  <input type="password" class="form-control input-lg" ng-model="senha" required>

              </div>

              <div class="center-block input-group col-md-6 col-sm-12 col-xs-12">

                  <label>Data Nascimento</label>
                  <input type="date" class="form-control input-lg" ng-model="dataNascimento" required>

              </div>

  					</p>


              <div class="center-block input-group col-md-6 col-sm-12 col-xs-12">

                  <input class="btn-block btn btn-lg btn-primary btn-cadastrar" type="submit" value="Cadastrar">

              </div>



  				</form>


  			</div><!-- //main content -->
  		</div><!-- //row -->
  	</div> <!-- //container -->


    </div>


    <?php require 'footer.php'; ?>
  </body>
</html>
