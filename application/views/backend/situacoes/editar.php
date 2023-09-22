<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>
                        <?= $subtitulo ?>
                        <span class="text-muted"><?= $view ?></span>
                    </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin') ?>"><?= $subtitulo ?></a></li>
                        <li class="breadcrumb-item"><a href="<?= base_url('situacoes') ?>"><?= $view ?></a></li>
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
                            <h3 class="card-title"><i class="fas fa-landmark nav-icon"></i> <?php echo $page ?></h3>
                        </div>
                        <div class="card-body">
                            <div class="container">
                                <div class="row">
                                    <div class="col">
                                        <?= validation_errors('<div class="alert alert-warning">', 
                                                '<a href="'.base_url('situacao/nova').'" class="alert-link">Clique aqui para novo cadastro</a>'
                                                . '</div>'); ?>
                                        <form action="<?= base_url('situacoes/atualizar') ?>" method="post">
                                            <?php foreach($situacoes as $s) { ?>
                                            <div class="form-group">
                                                <label for="txt-descricao">Descrição</label>
                                                <input id="txt-descricao" name="txt-descricao" type="text" value="<?= set_value('txt-descricao', $s->descricao)?>" 
                                                       class="form-control">                                                
                                            </div>
                                            <input type="hidden" name="id-situacao" id="id-situacao" value="<?= set_value('id-situacao', sha1($s->id_situacao))?>">
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
