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
                        <li class="breadcrumb-item"><a href="<?= base_url('bancos') ?>"><?= $view ?></a></li>
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
                                    <div class="col">
                                        <?= validation_errors('<div class="alert alert-warning">', '</div>'); ?>
                                        <form action="<?= base_url('estadoscivil/atualizar') ?>" method="post">
                                        <?php foreach($obj as $ecivil) { ?>
                                            <div class="form-group">
                                                <label for="txt-descricao">Descrição</label>
                                                <input id="txt-descricao" name="txt-descricao" type="text" value="<?= set_value('txt-descricao', $ecivil->descricao)?>" 
                                                       class="form-control">                                                
                                            </div>
                                            <input type="hidden" name="id-ecivil" value="<?=$ecivil->id?>">
                                        <?php } ?>
                                            <button type="submit" class="btn btn-success" role="button">
                                                <i class="fas fa-save nav-icon mr-1"></i>
                                                <span>Atualizar</span>
                                            </button>
                                        </form>
                                        <!-- end form -->
                                    </div>
                                </div>
                                <!-- end .row -->                                
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->