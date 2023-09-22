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
                        <div class="card-header">
                            <h3 class="card-title"><i class="fas fa-landmark nav-icon"></i> <?php echo $view . '  | <span class="text-muted">' . $page . '</span>' ?></h3>
                        </div>
                        <div class="card-body">
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm-12 col-lg-4">
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
                                                <input id="user-senha" name="user-senha" type="password" value="<?= set_value('user-senha') ?>" 
                                                       class="form-control" placeholder="Senha">
                                            </div>
                                            <div class="form-group">
                                                <label for="confirme-senha">Confirma Senha</label>
                                                <input id="confirme-senha" name="confirme-senha" type="password" value="<?= set_value('confirme-senha') ?>" 
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
                                    
                                    <div class="col-lg-8 col-sm-12">
                                        <table class="table table-responsive table-striped" id="tabela">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Nome</th>
                                                    <th>E-mail</th>
                                                    <th>Login</th>
                                                    <th style="width: 100px">...</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i=0; 
                                                foreach ($lista as $user) {  $i++;  ?>
                                                <tr>
                                                    <td>#<?=$i ?></td>
                                                    <td><?php echo $user->user_nome ?></td>
                                                    <td><?php echo $user->user_email ?></td>
                                                    <td><?php echo $user->user_login ?></td>
                                                    <td>
                                                        <a href="<?= base_url('usuarios/editar/'.$user->user_id) ?>" class="btn btn-link"><i class="far fa-edit" style="color: #ff9900"></i></a>
                                                        <a href="#" class="btn btn-link"><i class="fas fa-trash-alt" style="color: red"></i></a>
                                                    </td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- end .row form -->
                                                                    
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                        </div>
                        <!-- /.card-footer-->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

