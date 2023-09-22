<div class="container-login">
  <div class="panel-left"></div>
  <div class="panel-right">
    <?=validation_errors('<span class="alert alert-warning small">', '</span>') ?>
    <form action="<?= base_url('autenticacao/autenticar_usuario') ?>" method="post" class="form_login">
      <h2 class="form_title">LOGIN</h2>
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text"><i class="fas fa-user"></i></span>
        </div>
        <input type="text" name="userlogin" class="form-control">
      </div>
      <div class="input-group display--column">
        <div class="input-group-prepend">
          <span class="input-group-text"><i class="fas fa-key"></i></span>
        </div>
        <input type="password" name="userpassword" maxlength="8" class="form-control">
      </div>
      <button type="submit" class="botao botao-access">ACESSAR</button>
    </form>
  </div>
</div>

