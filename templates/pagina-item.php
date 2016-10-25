<!DOCTYPE html>
<html ng-app="login">

<head>

  <?php require 'header.php'; ?>

    <!-- Custom Theme CSS -->

    <link href="../static/css/index-logado.css" rel="stylesheet">
    <link href="../static/css/pagina-item.css" rel="stylesheet">





</head>

<body>



  <?php require 'top-menu-logado.php'; ?>

    <div class="container-fluid">

      <div class="section text-center section-landing">
        <div class="row">

          <div class="col-md-10 col-md-offset-1">

            <div class="card card-content">

              <h2 class="title titulo-adicionar-item">Meu Item</h2>

              <div class="row">

                <div class="col-md-4 col-md-offset-1">

                  <div class="card card-image imagem-item">

                    <img class="img-rounded" src="../static/img/item1.jpg" alt="" />

                  </div>

                </div>


                <div class="col-md-6 ">

                  <div class="card card-content-item">

                    <h3 class="title titulo-adicionar-item">Notebook</h3>

                    <div class="row">
                      <div class="col-md-4 col-md-offset-1">

                        <dl class="dl-horizontal">
                          <dt>Categoria: </dt>
                          <dd>Eletronico</dd>

                          <dt>Tipo: </dt>
                          <dd>Laptop/Nootebook: </dd>


                          <dt>Cor Predominante: </dt>
                          <dd>Cinza</dd>

                          <dt>Cor Secundaria: </dt>
                          <dd>Preto</dd>

                          <dt>Marca: </dt>
                          <dd>Apple</dd>

                          <dt>Caracteristica Unica: </dt>
                          <dd>Arranhão na tela </dd>

                          <dt>ID Unico: </dt>
                          <dd>Não tem</dd>

                        </dl>

                      </div>

                    </div>

                    <div class="row">

                      <div class="col-md-11">

                        <dl class="dl-horizontal">
                          <dt>Marca: </dt>
                          <dd> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum auctor quam id rutrum aliquam. Sed vitae est erat. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nunc fringilla sed
                            metus mattis lacinia. Vivamus accumsan orci nec pharetra hendrerit. Pellentesque consectetur leo eget magna accumsan, sit amet facilisis diam auctor. Donec aliquet, massa ac pharetra porta, justo dolor commodo ligula, vitae
                            porttitor sapien augue et nulla. Proin quis neque maximus, vehicula justo eget, elementum dolor. Proin vel velit erat. Fusce a arcu pretium, malesuada urna eget, dictum neque. Aliquam tempus nisl vel laoreet tincidunt. Pellentesque
                            at luctus nunc, id iaculis nunc. Nullam vel ultrices tellus. Maecenas faucibus urna lorem. In diam lacus, bibendum in felis eget, suscipit hendrerit est. Pellentesque eu justo id arcu tempor semper non id nulla. Vestibulum
                            ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec egestas magna quis lacus euismod, at porta enim tincidunt. Proin aliquam quam sed pretium cursus. Mauris a arcu dolor. Pellentesque vulputate
                            ex justo, eu fermentum diam mattis nec. Sed nisl sapien, tempus ut euismod sit amet, fermentum quis ipsum. </dd>



                      </div>

                    </div>

                    <div class="row">

                      <div class="col-md-8 col-md-offset-2">

                          <button class="btn-criar-report btn btn-default btn-cor-estilo-escuro" type="button" name="button" >Criar Report de Perdido</button>

                      </div>

                    </div>

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
