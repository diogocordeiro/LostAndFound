<!DOCTYPE html>
<html ng-app="login">

<head>

  <?php require 'header.php'; ?>
    <script type="text/javascript" language="javascript" src="../backend/js/cadastroUsuario.js"></script>

    <!-- Custom Theme CSS -->

    <link href="../static/css/meus-itens.css" rel="stylesheet">

    <script type="text/javascript">
      function Nova() {
        location.href = "index.php"
      }
    </script>

</head>

<body>

  <?php require 'top-menu-logado.php'; ?>
 
  <!-- coletar informacoes no banco -->
  <?php
    require('../backend/funcoes.php');
    require('../backend/conBd.php');

    $dados = getItensUsuario(BaseDados::conBdUser(), $_SESSION['Lost_Found']["id"]);
  ?>

  <div class="container-fluid">
    <div class="section text-center section-landing">
      <div class="row">

        <h2 class="title titulo-busca">Meus Itens</h2>

        <div class="col-md-8 col-md-offset-2">

        <!-- caso haja itens -->
        <?php if (count($dados) > 0){ ?>

        <table class="table tabela-itens table-striped table-hover">
          <thead>
              <tr>
                  <th class="text-center">#</th>
                  <th class="text-center">Data Cadastro</th>
                  <th class="text-center">Nome</th>
                  <th class="text-center">Marca</th>
                  <th class="text-center">Cor Predominante</th>
                  <th class="text-right">Ações</th>
              </tr>
          </thead>
        <tbody>

        <?php for ($i=0; $i<count($dados); $i++) { ?>

          <tr>
              <td class="text-center"><a title="<?php echo $dados[$i]['id'];?>"><?php echo ($i+1);?></a></td>
              <td><?php echo $dados[$i]['dataInsercao'];?></td>
              <td><?php echo $dados[$i]['titulo'];?></td>
              <td><?php echo $dados[$i]['marca'];?></td>
              <td>#<?php echo $dados[$i]['cor1'];?></td>
              <td class="td-actions text-right">     
                <button type="button"  class="btn btn-info btn-simple btn-xs">
                  <a href="item-usuario.php?id=<?php echo $dados[$i]['id'];?>"><i class="material-icons">visibility</i></a>
                </button>

                <button type="button"  class="btn btn-success btn-simple btn-xs">
                  <a href="form-editar-item.php?id=<?php echo $dados[$i]['id'];?>"><i class="material-icons">mode_edit</i></a>
                </button>

                <button type="button"  class="btn btn-danger btn-simple btn-xs">
                  <a href="#"><i class="material-icons">remove_circle_outline</i></a>
                </button>
              </td>
          </tr>

        <?php } echo "</tbody>"; ?>

        <!-- caso nao haja itens -->
        <?php } else { ?>

              <table class="table tabela-itens table-striped table-hover">
                <thead>
                  <tr class="text-center"><th>Sem itens</th></tr>
                </thead>
        
        <?php } ?>

        </table>

        </div>
      </div>
    </div>
  </div>

    <div class="container-fluid">
      <div class="section text-center section-landing">

      <div class="row">

        <div class="col-md-8 col-md-offset-2">

          <a href="form-adicionar-item.php" class="btn  btn-default btn-cor-estilo-escuro teste">Adicionar Item</a>

        </div>


      </div>

      </div>
    </div>





    </body>
      <?php require 'footer.php'; ?>
  </html>
