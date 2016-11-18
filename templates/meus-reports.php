<!DOCTYPE html>
<html ng-app="login">

<head>

  <?php require 'header.php'; ?>
    <script type="text/javascript" language="javascript" src="../backend/js/cadastroUsuario.js"></script>

    <!-- Custom Theme CSS -->

    <link href="../static/css/meus-reports.css" rel="stylesheet">

    <script type="text/javascript">
      function Nova() {
        location.href = "index.php"
      }
    </script>

    <script type="text/javascript">

    <!-- Javascript -->
$('[data-toggle="tooltip"]').tooltip();

    </script>

</head>

<body>

  <?php require 'top-menu-logado.php'; ?>

  <div class="container-fluid">
    <div class="section text-center section-landing">
      <div class="row">

        <h2 class="title titulo-busca">Meus Reports</h2>

        <div class="col-md-8 col-md-offset-2">

        <!-- caso haja itens -->


        <table class="table tabela-itens table-striped table-hover">
          <thead>
              <tr>
                  <th class="text-center">#</th>
                  <th class="text-center">Data Criação</th>
                  <th class="text-center">Nome</th>
                  <th class="text-center">Marca</th>
                  <th class="text-center">Cor Pedrominante</th>
                  <th class="text-right">Ações</th>
              </tr>
          </thead>
        <tbody>


              <table class="table tabela-itens table-striped table-hover">
                <thead>
                  <tr class="text-center"><th>Sem Reports</th></tr>
                </thead>

      

        </table>

        </div>
      </div>
    </div>
  </div>





    </body>
      <?php require 'footer.php'; ?>
  </html>
