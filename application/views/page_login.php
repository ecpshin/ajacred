<div class="card">
    <div class="card-body login-card-body">
        <p class="login-box-msg">Acesso ao Sistema</p>
        <?php echo validation_errors('<span class="alert alert-warning small">', '</span>') ?>
        <form action="<?php echo base_url('autenticacao/autenticar_usuario') ?>" method="post">
            <div class="form-group">
                <label for="userlogin">Login</label>
                <div class="input-group mb-3">
                    <input type="text" id="userlogin" name="userlogin" value="" class="form-control" required placeholder="Usuário">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="userpassword">Senha</label>
                <div class="input-group mb-3">
                    <input type="password" id="userpassword" name="userpassword" value="" class="form-control" required placeholder="Senha">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-8">
                    
                </div>
                <!-- /.col -->
                <div class="col-4">
                    <button type="submit" class="btn btn-primary btn-block">Acessar</button>
                </div>
                <!-- /.col -->
            </div>
        </form>
        <p class="mb-1">
            <a href="<?= base_url('forget') ?>">Esqueci minha senha</a>
        </p>
        <p class="mb-0">
            <a href="<?= base_url('register') ?>" class="text-center">Registrar-se</a>
        </p>
    </div>
    <!-- /.login-card-body -->
</div>
</div>
<!-- /.login-box -->