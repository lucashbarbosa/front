


<div id="login-page">
    <div class="container">
      <form class="form-login" method = "post" action="/users/logon">
        <h2 class="form-login-heading">Criar sua conta</h2>
        <div class = "error-pattern">
            <p class = "logon-errors"></p>
        </div>
        
        <div class="login-wrap">
          <input type="text" required name = "name" value = "<?= isset($logonInfo['name']) ? $logonInfo['name'] : ""?>" class="form-control" placeholder="Digite seu nome" autofocus>
          <br>
          <input type="email" required name = "email" value = "<?= isset($logonInfo['email']) ? $logonInfo['email'] : ""?>" class="form-control" placeholder="Digite seu email" ><br>
          <input type="password" required name = "password" class="form-control" placeholder="Senha"><br>
          <input type="password" required name = "confirm-password" class="form-control" placeholder="Repita a senha"><br>
          <button type= "submit" class="btn btn-theme btn-block" href="index.html" type="submit"><i class="fa fa-lock"></i> Criar Conta</button>
          <hr>


       
      </form>
    </div>
  </div>