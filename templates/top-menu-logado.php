<!-- Barra de navegação fixa, no topo do site e responsiva -->
<!-- <nav class="navbar navbar-default navbar-fixed-top meu-menu">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">
            <img width="100px" alt="Brand" src="../static/img/Logo2.png">
          </a>
        </div> -->

<!-- area restrita -->
<?php require '../backend/aRestrita.php'; ?>

<nav class="navbar navbar-default navbar-fixed-top meu-menu">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">
        <img width="100px" alt="Brand" src="../static/img/Logo2.png">
      </a>


    </div>
    <div id="navbar" class="navbar-collapse collapse">

      <ul class="nav navbar-nav">
        <li><a href="index-logado.php">Home</a></li>
        <li><a href="perfil-usuario.php">Perfil</a></li>

        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Reports <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li class="divider"></li>
            <li><a href="meus-reports.php">Meus Reports</a></li>
            <li class="divider"></li>
            <li><a href="form-report-achado.php">Criar Report Achado</a></li>
            <li><a href="form-report-perdido.php">Criar Report Perdido</a></li>

          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Itens <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li class="divider"></li>
            <li><a href="meus-itens.php">Meus Itens</a></li>
            <li class="divider"></li>
            <li><a href="form-adicionar-item.php">Adicionar Item</a></li>
          </ul>
        </li>
      </ul>

      <form class="navbar-form navbar-right">
        <a href="../backend/logout.php" class="btn btn-sm btn-default btn-cor-estilo-escuro btn-round">Log out</a>
      </form>


      <p class="logado-como-texto navbar-text navbar-right">Logado como <strong><?php echo $_SESSION['Lost_Found']["email"]?></strong></p>


    </div>
    <!--/.navbar-collapse -->
  </div>
</nav>

<!-- LOG IN AREA -->
<!-- <div class="navbar-collapse collapse">
          <form class="navbar-form navbar-right">
            <div class="form-group">
              <input type="text" placeholder="Email" class="form-control">
            </div>
            <div class="form-group">
              <input type="password" placeholder="Password" class="form-control">
            </div>
            <button type="submit" class="btn btn-default btn-cadastrar btn-login">Log in</button>
          </form>
        </div><!--/.navbar-collapse -->
<!-- FIM LOG IN -->-->
</div>
</nav>

<!-- <nav class="navbar navbar-default navbar-fixed-top meu-menu">

  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed nav-custom" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">
        <img width="100px" alt="Brand" src="../static/img/Logo2.png">
      </a>



      <div class="navbar-collapse collapse">
         <form class="navbar-form navbar-right" role="form">
           <div class="form-group">
             <input type="text" placeholder="Email" class="form-control">
           </div>
           <div class="form-group">
             <input type="password" placeholder="Password" class="form-control">
           </div>
           <button type="submit" class="btn btn-success">Sign in</button>
         </form>
       </div><!--/.navbar-collapse -->






</div>
</div>
</nav> -->
