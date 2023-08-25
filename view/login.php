<?php
    session_start();
    include_once 'headerLogin.php';
    include_once '/xampp/htdocs/PF_20200446/controllers/UserController.php';
    $controller = new UserController();
    $controller->login();
    
?>
    <title>Outdoors Angola | Início de sessão</title>
  <div class="services_section">
    <div class="container">
      <h1 class="services_text">SERVIÇOS</h1>
    </div>
  </div>
  <div class="login_section">
     <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center">Log In</h5>
            <form class="form-signin" method="post">
              <div class="form-label-group">
                <input type="email" name=email id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
                <label for="inputEmail">Endereço de email</label>
              </div>

              <div class="form-label-group">
                <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
                <label for="inputPassword">Senha</label>
              </div>

              <div class="custom-control custom-checkbox mb-3">
                <input type="checkbox" class="custom-control-input" id="customCheck1">
                <label class="custom-control-label" for="customCheck1">lembrar palavra-passe</label>
              </div>
              <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Entrar</button>
              <hr class="my-4">
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
    </div>
  </div>
  <!-- login section end-->

<?php
    include_once'footer.php';
?>