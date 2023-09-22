
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>
                        <?= $subtitulo ?>
                        <span class="text-muted"><?= $page ?></span>
                    </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin') ?>"><?= $subtitulo ?></a></li>
                        <li class="breadcrumb-item"><a href="<?= base_url('usuarios') ?>"><?= $view ?></a></li>
                        <li class="breadcrumb-item active"><?= $page ?></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- Default box -->
                    <div class="card">
                        <div class="card-header bg-fuchsia">
                            <h3 class="card-title"><i class="fas fa-user nav-icon"></i> <?php echo $view . '  | <span>' . $page . '</span>' ?></h3>
                        </div>
                        <div class="card-body">
                            <div class="container">
                                <div class="row">
                                    <div class="col-12">
                                        <?= validation_errors('<div class="alert alert-warning">', '</div>'); ?>
                                        <form action="<?= base_url('usuarios/salvar') ?>" method="post">
                                            <div class="form-group">
                                                <label for="user-nome">Nome</label>
                                                <input id="user-nome" name="user-nome" type="text" value="<?= set_value('user-nome', NULL) ?>" 
                                                       class="form-control" placeholder="Nome Completo">
                                            </div>
                                            <div class="form-group">
                                                <label for="user-email">E-mail</label>
                                                <input id="user-email" name="user-email" type="text" value="<?= set_value('user-email', NULL) ?>" 
                                                       class="form-control" placeholder="E-mail">
                                            </div>
                                            <div class="form-group">
                                                <label for="user-login">Login</label>
                                                <input id="user-login" name="user-login" type="text" value="<?= set_value('user-login') ?>" 
                                                       class="form-control" placeholder="Login">
                                            </div>
                                            <div class="form-group">
                                                <label for="user-senha">Senha</label>
                                                <input id="user-senha" name="user-senha" type="password" maxlength="8" value="<?= set_value('user-senha') ?>" 
                                                       class="form-control" placeholder="Senha">
                                            </div>
                                            <div class="form-group">
                                                <label for="confirme-senha">Confirma Senha</label>
                                                <input id="confirme-senha" name="confirme-senha" type="password" maxlength="8" value="<?= set_value('confirme-senha') ?>" 
                                                       class="form-control" placeholder="Confirme a senha">
                                            </div>
                                            <div class="form-group">
                                                <label for="user-nivel">Nível de Acesso</label>
                                                <select id="user-nivel" name="user-nivel" class="custom-select">
                                                    <option value="<?= set_value('user-nivel', 'ROLE_NONE') ?>">Selecione...</option>
                                                    <option value="<?= set_value('user-nivel', 'ROLE_ADMIN') ?>">Administrador</option>
                                                    <option value="<?= set_value('user-nivel', 'ROLE_USER') ?>">Usuário</option>
                                                </select>
                                            </div>
                                            <button type="submit" class="btn btn-success" role="button">
                                                <i class="fas fa-save nav-icon mr-1"></i>
                                                <span>Salvar</span>
                                            </button>
                                        </form>
                                    </div>                                    
                                </div>
                                <!-- end .row form -->
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <div class="card-footer">
                        </div>
                        <!-- /.card-footer-->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- end .col-12 -->
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->





