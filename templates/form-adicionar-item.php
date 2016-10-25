<!DOCTYPE html>
<html ng-app="login">

<head>

  <?php require 'header.php'; ?>

    <!-- Custom Theme CSS -->

    <link href="../static/css/form-adicionar-item.css" rel="stylesheet">

</head>

<body>
  <?php require 'top-menu-logado.php'; ?>


    <div class="wrapper">

      <div class="container-fluid">
        <div class="section text-center section-landing">
          <div class="row">

            <div class="col-md-8 col-md-offset-2">

              <div class="card card-adicionar-item">


                <h2 class="title titulo-adicionar-item">Adicionar Novo Item</h2>

                <h5 class="description descricao-adicionar-item">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum. Praesent mauris.

                  <form class="form">

                    <div class="content">

                      <div class="row">

                        <div class="col-md-8 col-md-offset-2 col-sm-6 col-sm-offset-3 ">

                          <div class="input-group">
                            <span class="input-group-addon">
                            <i class="material-icons">label</i>
                          </span>
                            <input type="text" class="form-control input-lg " placeholder="Nome... Ex: casaco preto" required />
                          </div>

                          <div class="row">

                            <div class="col-md-5">

                              <div class="btn-group posicao-dropdown">
                                <button type="button" class="btn-cor-estilo-escuro btn-sm btn btn-default dropdown-toggle" data-toggle="dropdown">
                                  Categoria <span class="caret"></span>
                                </button>

                                  <ul class="dropdown-menu" role="menu">
                                    <li><a class="item-estilo" href="#">Exemplo</a></li>
                                    <li><a class="item-estilo" href="#">Exemplo</a></li>
                                    <li><a class="item-estilo" href="#">Exemplo</a></li>
                                    <li><a class="item-estilo" href="#">Exemplo</a></li>
                                    <li><a class="item-estilo" href="#">Exemplo</a></li>
                                    <li><a class="item-estilo" href="#">Exemplo</a></li>
                                    <li><a class="item-estilo" href="#">Exemplo</a></li>
                                    <li><a class="item-estilo" href="#">Exemplo</a></li>
                                    <li><a class="item-estilo" href="#">Exemplo</a></li>
                                    <li><a class="item-estilo" href="#">Exemplo</a></li>
                                    <li><a class="item-estilo" href="#">Exemplo</a></li>
                                    <li><a class="item-estilo" href="#">Exemplo</a></li>
                                    <li><a class="item-estilo" href="#">Exemplo</a></li>
                                    <li><a class="item-estilo" href="#">Exemplo</a></li>
                                    <li><a class="item-estilo" href="#">Exemplo</a></li>
                                    <li><a class="item-estilo" href="#">Exemplo</a></li>
                                    <li><a class="item-estilo" href="#">Exemplo</a></li>
                                    <li><a class="item-estilo" href="#">Exemplo</a></li>

                                  </ul>

                                </div>

                            </div>

                          </div>

                          <div class="input-group teste">
                            <span class="input-group-addon">
                            <i class="material-icons">label</i>
                          </span>
                            <input type="text" class="form-control input-lg " placeholder="Nome... Ex: casaco preto" required />
                          </div>

                          <div class="input-group">
                            <span class="input-group-addon">
                            <i class="material-icons">label</i>
                          </span>
                            <input type="text" class="form-control input-lg " placeholder="Nome... Ex: casaco preto" required />
                          </div>

                          <div class="input-group">
                            <span class="input-group-addon">
                            <i class="material-icons">label</i>
                          </span>
                            <input type="text" class="form-control input-lg " placeholder="Nome... Ex: casaco preto" required />
                          </div>

                          <div class="input-group">
                            <span class="input-group-addon">
                            <i class="material-icons">label</i>
                          </span>
                            <input type="text" class="form-control input-lg " placeholder="Nome... Ex: casaco preto" required />
                          </div>

                          <div class="input-group">
                            <span class="input-group-addon">
                            <i class="material-icons">label</i>
                          </span>
                            <input type="text" class="form-control input-lg " placeholder="Nome... Ex: casaco preto" required />
                          </div>

                          <div class="input-group">
                            <span class="input-group-addon">
                            <i class="material-icons">label</i>
                          </span>
                            <input type="text" class="form-control input-lg " placeholder="Nome... Ex: casaco preto" required />
                          </div>

                          <div class="input-group">
                            <span class="input-group-addon">
                            <i class="material-icons">label</i>
                          </span>
                            <input type="text" class="form-control input-lg " placeholder="Nome... Ex: casaco preto" required />
                          </div>


                          <!-- <div class="dropdown">

                            <a href="#" class="btn btn-simple dropdown-toggle" data-toggle="dropdown">Regular
    	                        <b class="caret"></b>
	                          </a>

                            <ul class="dropdown-menu">
		                            <li><a href="#">Action</a></li>
		                            <li><a href="#">Another action</a></li>
		                            <li><a href="#">Something else here</a></li>
		                            <li class="divider"></li>
		                            <li><a href="#">Separated link</a></li>
		                            <li class="divider"></li>
		                            <li><a href="#">One more separated link</a></li>
	                          </ul>

                          </div> -->

                        </div>

                      </div>

                    </div>
                    <div class="footer text-center">

                      <button class="btn btn-default  btn-lg btn-cor-estilo-escuro" type="button">
                          Adicionar
                      </button>



                    </div>


                  </form>


            </div>

          </div>

        </div>
      </div>
    </div>
  </div>


</body>

<?php require 'footer.php'; ?>

</html>
