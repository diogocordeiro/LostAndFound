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
          <form class="navbar-form navbar-right" name="login" method="POST" action="../backend/login.php">
            <div class="form-group">
              <input type="text" id="email" placeholder="Email" name="email" class="form-control email-login">
            </div>
            <div class="form-group">
              <input type="password" id="password" placeholder="Password" name="senha" class="form-control password-login">
            </div>

            <button type="submit" id="login-user" class="btn btn-default btn-cadastrar btn-login">Log in</button>
            <div id="error-container"></div>
            <div id="error-backend"></div>
          </form>

        </div><!--/.navbar-collapse -->
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
        </div><!--/.navbar-collapse --> <!-- FIM LOG IN --> -->
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
