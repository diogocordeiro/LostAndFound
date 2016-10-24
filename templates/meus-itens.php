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


  <div class="container-fluid">
    <div class="section text-center section-landing">
      <div class="row">

        <h2 class="title titulo-busca">Meus Itens</h2>

        <div class="col-md-8 col-md-offset-2">

        <table class="table tabela-itens table-striped table-hover">
    <thead>
        <tr>
            <th class="text-center">#</th>
            <th class="text-center">Nome</th>
            <th class="text-center">Tipo</th>
            <th class="text-center">Marca</th>
            <th class="text-center">Cor Predominante</th>
            <th class="text-right">Ações</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="text-center">1</td>
            <td>Teste</td>
            <td>Teste</td>
            <td>Teste</td>
            <td>Teste</td>
            <td class="td-actions text-right">

              <button type="button"  class="btn btn-info btn-simple btn-xs">
                  <i class="material-icons">visibility</i>
              </button>

                <button type="button"  class="btn btn-success btn-simple btn-xs">
                    <i class="material-icons">mode_edit</i>
                </button>

                <button type="button"  class="btn btn-danger btn-simple btn-xs">
                    <i class="material-icons">remove_circle_outline</i>
                </button>
            </td>
        </tr>

        <tr>
            <td class="text-center">1</td>
            <td>Teste</td>
            <td>Teste</td>
            <td>Teste</td>
            <td>Teste</td>
            <td class="td-actions text-right">

              <button type="button"  class="btn btn-info btn-simple btn-xs">
                  <i class="material-icons">visibility</i>
              </button>

                <button type="button"  class="btn btn-success btn-simple btn-xs">
                    <i class="material-icons">mode_edit</i>
                </button>

                <button type="button"  class="btn btn-danger btn-simple btn-xs">
                    <i class="material-icons">remove_circle_outline</i>
                </button>
            </td>
        </tr>

        <tr>
            <td class="text-center">1</td>
            <td>Teste</td>
            <td>Teste</td>
            <td>Teste</td>
            <td>Teste</td>
            <td class="td-actions text-right">

              <button type="button"  class="btn btn-info btn-simple btn-xs">
                  <i class="material-icons">visibility</i>
              </button>

                <button type="button"  class="btn btn-success btn-simple btn-xs">
                    <i class="material-icons">mode_edit</i>
                </button>

                <button type="button"  class="btn btn-danger btn-simple btn-xs">
                    <i class="material-icons">remove_circle_outline</i>
                </button>
            </td>
        </tr>

        <tr>
            <td class="text-center">1</td>
            <td>Teste</td>
            <td>Teste</td>
            <td>Teste</td>
            <td>Teste</td>
            <td class="td-actions text-right">

              <button type="button"  class="btn btn-info btn-simple btn-xs">
                  <i class="material-icons">visibility</i>
              </button>

                <button type="button"  class="btn btn-success btn-simple btn-xs">
                    <i class="material-icons">mode_edit</i>
                </button>

                <button type="button"  class="btn btn-danger btn-simple btn-xs">
                    <i class="material-icons">remove_circle_outline</i>
                </button>
            </td>
        </tr>

        <tr>
            <td class="text-center">1</td>
            <td>Teste</td>
            <td>Teste</td>
            <td>Teste</td>
            <td>Teste</td>
            <td class="td-actions text-right">

              <button type="button"  class="btn btn-info btn-simple btn-xs">
                  <i class="material-icons">visibility</i>
              </button>

                <button type="button"  class="btn btn-success btn-simple btn-xs">
                    <i class="material-icons">mode_edit</i>
                </button>

                <button type="button"  class="btn btn-danger btn-simple btn-xs">
                    <i class="material-icons">remove_circle_outline</i>
                </button>
            </td>
        </tr>

        <tr>
            <td class="text-center">1</td>
            <td>Teste</td>
            <td>Teste</td>
            <td>Teste</td>
            <td>Teste</td>
            <td class="td-actions text-right">

              <button type="button"  class="btn btn-info btn-simple btn-xs">
                  <i class="material-icons">visibility</i>
              </button>

                <button type="button"  class="btn btn-success btn-simple btn-xs">
                    <i class="material-icons">mode_edit</i>
                </button>

                <button type="button"  class="btn btn-danger btn-simple btn-xs">
                    <i class="material-icons">remove_circle_outline</i>
                </button>
            </td>
        </tr>

        <tr>
            <td class="text-center">1</td>
            <td>Teste</td>
            <td>Teste</td>
            <td>Teste</td>
            <td>Teste</td>
            <td class="td-actions text-right">

              <button type="button"  class="btn btn-info btn-simple btn-xs">
                  <i class="material-icons">visibility</i>
              </button>

                <button type="button"  class="btn btn-success btn-simple btn-xs">
                    <i class="material-icons">mode_edit</i>
                </button>

                <button type="button"  class="btn btn-danger btn-simple btn-xs">
                    <i class="material-icons">remove_circle_outline</i>
                </button>
            </td>
        </tr>

    </tbody>
</table>

        </div>
      </div>
    </div>
  </div>



    <div class="container-fluid">
      <div class="section text-center section-landing">

      <div class="row">

        <div class="col-md-8 col-md-offset-2">

          <button class="btn  btn-default btn-cor-estilo-escuro teste">Adicionar Item

          </button>

        </div>


      </div>

      </div>
    </div>





    </body>
      <?php require 'footer.php'; ?>
  </html>
