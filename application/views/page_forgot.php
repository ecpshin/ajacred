  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Esqueceu a sua senha? Aqui você pode criar uma nova senha</p>

      <form action="recover-password.html" method="post">
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Requesitar nova senha</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <p class="mt-3 mb-1">
          <a href="<?php echo base_url('login') ?>">Acessar sistema</a>
      </p>
      <p class="mb-0">
          <a href="<?php echo base_url('register') ?>" class="text-center">Registrar-se</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->