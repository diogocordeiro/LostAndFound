<!DOCTYPE html>
<html ng-app="login">

<head>

  <?php require 'header.php'; ?>

    <!-- Custom Theme CSS -->

    <link href="../static/css/index-logado.css" rel="stylesheet">
    <link href="../static/css/perfil-usuario.css" rel="stylesheet">

    <link href="../static/css/item-usuario.css" rel="stylesheet">

</head>

<body>

  <?php require 'top-menu-logado.php'; ?>

  <div class="container-fluid">

    <div class="section text-center section-landing">

      <div class="row">
          <!-- coletar informacoes no banco -->
  <?php
    require('../backend/nomesTabelas.php');
    require('../backend/funcoes.php');
    require('../backend/conBd.php');
    require('listaCores.php');
    require('listaCategorias.php');
    require('listaSubcategorias.php');

    if(isset($_GET['id'])){

      //Valida string
      $idItem = validarString($_GET['id']);

      $dados = getData(BaseDados::conBdUser(), $tabItens, "id", $idItem, "s");

      //session_start();

      //Caso o item nao exista no bd
      if (count($dados) == 0) {
        echo "<br/><br/><br/><center><p>Erro: o item não foi encontrado</p><br/><a href='javascript:history.go(-1);'>voltar</a></center>";
        exit;

      //Caso o id da session nao bata com o id do item
      } elseif ($dados[0]['idUsuario'] != $_SESSION['Lost_Found']["id"]) {
          echo "<br/><br/><br/><center><p>Erro: o item não foi encontrado</p><br/><a href='javascript:history.go(-1);'>voltar</a></center>";
          exit;
        }

    //Caso a variavel id nao seja informada
    } else {
        echo "<br/><br/><br/><center><p>Erro: informe o ID do item</p><br/><a href='javascript:history.go(-1);>voltar</a></center>";
        exit;
      }
  ?>
        <div class="col-md-10 col-md-offset-1">

          <div class="card card-content">

            <h2 class="title titulo-adicionar-item"><?php echo $dados[0]['titulo'];?></h2>

            <div class="row">

              <div class="col-md-4 col-md-offset-1">

                <!-- style="width: 250px;height:250px;border-radius:150px;-webkit-border-radius: 150px;-moz-border-radius: 150px" -->

                <img src="../itens/fotos/<?php echo $dados[0]['enderFoto'];?>" class="img-rounded img-responsive img-raised">

              </div>

              <div class="col-md-6 ">

                <div class="card card-content-item">

                  <div class="row">

                    <div class="col-md-4 col-md-offset-1">

                      <dl class="dl-horizontal">

                        <dt>Data: </dt>
                        <dd class="dd-data"><?php echo $dados[0]['dataInsercao'];?></dd>

                        <br><br><br>

                        <dt>Marca: </dt>
                        <dd><?php echo $dados[0]['marca'];?></dd>

                        <br><br><br>

                        <dt>Identificador: </dt>
                        <dd><?php echo $dados[0]['identificador'];?></dd>

                        <br><br><br>

                        <dt>Cor Predominante: </dt>
                        <dd><span style="background-color:#<?php echo $dados[0]['cor1'];?>;color:#000000;padding:6px 8px"><?php echo $arrCores[$dados[0]['cor1']];?></span></dd>

                        <br><br><br>

                        <dt>Cor Secundária: </dt>
                        <dd><span style="background-color:#<?php echo $dados[0]['cor2'];?>;color:#000000;padding:6px 8px"><?php echo $arrCores[$dados[0]['cor2']];?></span></dd>

                        <br><br><br>

                        <dt>Categoria: </dt>
                        <dd><?php echo $arrCategorias[$dados[0]['idCategoria']];?></dd>

                        <br><br><br>

                        <dt>Subcategoria: </dt>
                        <dd><?php echo $arrSubcategorias[$dados[0]['idSubcategoria']];?></dd>

                        <br><br><br>

                        <dt>Caracteristicas: </dt>
                        <dd class="dd-caracteristicas" ><?php echo $dados[0]['caracteristicas'];?></dd>

                        <br><br><br>

                        <dt>Descrição: </dt>

                          <dd class="dd-descricao"><?php echo $dados[0]['descricao'];?></dd>

                        <br><br><br>

                        </dl>

                    </div>

                  </div>

                </div>

                <div class="footer text-center">
                    <a class="btn-salvar btn btn-default  btn-lg btn-cor-estilo-escuro" href="form-editar-item.php?id=<?php echo $dados[0]['id'];?>">Editar Item</a>
                    <a class="btn-salvar btn btn-default  btn-lg btn-cor-estilo-escuro" href="meus-itens.php">Meus Itens</a>
                    <!-- <a class="btn-salvar btn btn-default  btn-lg btn-cor-estilo-escuro" href="#" >Criar Report de Perdido</a> -->
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
