<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- ICONE NA ABA -->
    <link rel="sortcut icon" href="views/dist/img/Apex.ico" type="image/x-icon"/>
    <!-- TITULO DA ABA -->
    <title>ApexTech</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="views/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="views/dist/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="views/plugins/iCheck/square/blue.css">

  </head>
  <body class="hold-transition login-page" 
        style="
        background-image: url('views/dist/img/background4.jpg'); 
        background-repeat: no-repeat;
        background-position: center;
        background-size: cover;
        overflow: auto;
  ">
    
  <div class="login-box" 
        style="background: #fff; 
        border-radius: 20px; 
        padding: 10px;
">

    <div class="login-logo">
      <img src="views/dist/img/logo.png" alt="some text" width=300 height=90>
      <!-- <a href="../../index2.html"><b>Apex</b>Tech</a> -->
    </div>
    <div class="login-box-body" style="background: #fff; border-radius: 20px;">
      <p class="login-box-msg">Faça seu login para iniciar a sessão</p>

      <form action="App/session.php" method="post">
        <div class="form-group has-feedback">
          <input type="text" name="username" class="form-control" placeholder="User">
          <span class="glyphicon glyphicon-user form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="password" name="password" class="form-control" placeholder="Password">
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="row">
          <div class="col-xs-8">
            <div class="checkbox icheck">
              <label>
                <input type="checkbox"> Lembrar senha
              </label>
            </div>
          </div>
          <div class="col-xs-4">
            <button type="submit" class="btn btn-dark btn-block btn-flat">Login</button>
          </div>
        </div>
      </form>

      <div class="social-auth-links text-center">
        <p>- OU -</p>
        <a href="#" class="btn btn-block btn-social btn-github btn-flat"><i class="fa fa-github"></i> Sign in using
          GitHub</a>
        <a href="#" class="btn btn-block btn-social btn-linkedin btn-flat"><i class="fa fa-linkedin"></i> Sign in using
          Linkedln</a>
      </div>

      <a href="#">Esqueceu sua senha?</a><br>
      <a href="register.html" class="text-center">Registre-se no ApexTech</a>
    </div>
  </div>

  <!-- jQuery 2.2.3 -->
  <script src="views/plugins/jQuery/jquery-2.2.3.min.js"></script>
  <!-- Bootstrap 3.3.6 -->
  <script src="views/bootstrap/js/bootstrap.min.js"></script>
  <!-- iCheck -->
  <script src="views/plugins/iCheck/icheck.min.js"></script>

  <!--FUNÇÃO DO CHECKBOX LEMBRAR SENHA -->
  <script>
    $(function () {
      $('input').iCheck({
        checkboxClass: 'icheckbox_square-blue',
        radioClass: 'iradio_square-blue',
        increaseArea: '20%' // optional
      });
    });
  </script>
  </body>
</html>
