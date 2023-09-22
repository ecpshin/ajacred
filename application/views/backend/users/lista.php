<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?= $titulo ?></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin') ?>"><?= $page ?></a></li>
                        <li class="breadcrumb-item active">Usuários</li>
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
                    <div class="card-deck">
                        <?php foreach ($lista as $user) { ?>
                            <div class="card card-border mr-2" style="width: 300px">
                                <div class="card-header border-bottom border-danger bg-fuchsia">
                                    <h3 class="m-2" style="font-size: 15px; font-weight: bold; text-align: center">DADOS DO USUÁRIO</h3>                                
                                </div>
                                <img class="card-img-top img-circle mt-3 ml-auto mr-auto" src="<?= base_url($user->user_img) ?>" style="width:90px" alt="Card image cap">
                                <div class="card-body border mt-3">
                                    <p class="card-text"><?php echo '<b>Nome: </b>'.$user->user_nome?></p>
                                    <p class="card-text"><?php echo '<b>E-mail: </b>'.$user->user_email?></p>
                                    <p class="card-text"><?php echo '<b>Login: </b>'.$user->user_login?></p>
                                    <p class="card-text"><?php echo '<b>Senha: </b>'?><a href="<?=base_url('password/forgot/'.sha1($user->user_id))?>" title="Clique aqui trocar senha">Senha criptografada</a></p>
                                    <p class="card-text"><?php echo '<b>Nível de acesso: </b>'; if($user->user_nivel=='ROLE_ADMIN') { echo 'Administrador';}else{ echo 'Usuário';} ?></p>
                                </div>
                                <div class="card-footer">
                                    <p class="card-text"><?='Data de registro: '.formataData($user->user_regdate)?></p>
                                </div>
                            </div>
                        <?php } ?>                    
                    </div>
                </div>
            </div>
        </div>
        <!-- Default box
        <div class="card">
        <div class="card-header">
        <h3 class="card-title">Title</h3>
        <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
        <i class="fas fa-minus"></i></button>
        <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
        <i class="fas fa-times"></i></button>
        </div>
        </div>
        <div class="card-body">
        Start creating your amazing application!
        </div>
        <!-- /.card-body
        <div class="card-footer">
        Footer
        </div>
        <!-- /.card-footer
        </div>
        <!-- /.card 
        </div>
        -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->


