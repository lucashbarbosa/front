
<div id="login-page">
    <div class="container">
      
      <form class="form-login" method = "post" action="/users/login">
        <h2 class="form-login-heading">Entrar</h2>
        <div class = "error-pattern">
            <p class = "login-errors"></p>
        </div>
        <div class="login-wrap">
          <input type="text" name = "user" class="form-control" placeholder="Email" autofocus>
          <br>
          <input type="password" name = "password" class="form-control" placeholder="Senha">
          <label class="checkbox">
            <a data-toggle="modal" href="login.html#myModal"> Esqueceu sua senha?</a>
            </span>
            </label>
          <button class="btn btn-theme btn-block" href="index.html" type="submit"><i class="fa fa-lock"></i> Entrar</button>
          <hr>

          <div class="registration">
            Ainda não possui uma conta?<br/>
            <a class="" href="/logon">
              Criar Conta
              </a>
          </div>
        </div>
        <!-- Modal -->
        <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Forgot Password ?</h4>
              </div>
              <div class="modal-body">
                <p>Enter your e-mail address below to reset your password.</p>
                <input type="email" name="email" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix">
              </div>
              <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                <button class="btn btn-theme" type="button">Submit</button>
              </div>
            </div>
          </div>
        </div>
        <!-- modal -->
      </form>
    </div>
  </div>