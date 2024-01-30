<div id="back"></div>
<!-- Log on to codeastro.com for more projects! -->
<div class="login-box">

  <div class="login-logo">

    <img class="img-responsive" src="views/img/template/logo-blanco-bloque.png" style="padding: 30px 100px 0 100px">

  </div>

  <div class="login-box-body">

    <p class="login-box-msg">Inicio de Sesión - BILY</p>

    <form method="post">

      <div class="form-group has-feedback">

        <input type="text" class="form-control" placeholder="Usuario" name="loginUser" required>

        <span class="glyphicon glyphicon-user form-control-feedback"></span>

      </div>

      <div class="form-group has-feedback">

        <input type="password" class="form-control" placeholder="Contraseña" name="loginPass" required>

        <span class="glyphicon glyphicon-lock form-control-feedback"></span>

      </div>

      <div class="row">

        <div class="col-xs-5">

          <button type="submit" class="btn btn-success btn-block btn-flat">Iniciar Sesión</button>

        </div>
       
      </div>

      <?php

        $login = new ControllerUsers();
        $login -> ctrUserLogin();

      ?>

    </form>

  </div>

</div>
<!-- Log on to codeastro.com for more projects! -->
