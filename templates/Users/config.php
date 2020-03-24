<h1> Preferências de usuário </h1>
<div class = "error-pattern">
            <p class = "config-errors"></p>
        </div>
<form method = "post" action="/users/edit/<?= $user['id'] ?>" >
    <div class="form-group col-md-4" >
        <label>Nome</label>
        <input type="name" name = "name" required value="<?= $userInfo['name'] ? $userInfo['name'] : "" ?>" class="form-control" placeholder="Digite Seu Nome">
    </div>
    <div class="form-group col-md-4">
        <label>Username</label>
        <input type="text" name = "username" required value="<?= $userInfo['username'] ? $userInfo['username'] : "" ?>" class="form-control" placeholder="Digite Seu Usuário">
    </div>
    <div class="form-group col-md-4">
        <label>Email</label>
        <input type="text" name = "email" required value="<?= $userInfo['email'] ? $userInfo['email'] : "" ?>" class="form-control" placeholder="Digite Seu Email">
    </div>

    <button type="submit" class="btn btn-primary">Salvar</button>
</form>



<h1> Alterar a senha </h1>
<form method = "post" action="/users/change-password" >
    <div class="form-group col-md-4 ">
        <label>Senha</label>
        <input type="Password" name = "password" required value="" class="form-control" placeholder="Digite Sua Senha">
    </div>
    <div class="form-group col-md-4">
        <label>Nova senha</label>
        <input type="Password" name = "new-password" required value="" class="form-control" placeholder="Digite Sua Senha">
    </div>
    <div class="form-group col-md-4">
        <label>Confirme a Nova senha</label>
        <input type="Password"  name = "confirm-new-password" required value="" class="form-control" placeholder="Digite Sua Senha">
    </div>
    <button type="submit" class="btn btn-primary">Salvar</button>
</form>