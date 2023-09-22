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
                        <li class="breadcrumb-item"><a href="<?= base_url('admin') ?>"><?= $home ?></a></li>
                        <li class="breadcrumb-item"><a href="<?= base_url('financeiras') ?>"><?= $view ?></a></li>
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
                            <h3 class="card-title"><i class="fas fa-landmark nav-icon mr-2"></i> <?php echo $page ?></h3>
                        </div>
                        <div class="card-body">
                            <div class="container">
                                <div class="row">
                                    <div class="col">
                                        <?= validation_errors('<div class="alert alert-warning">', '</div>'); ?>
                                        <form action="<?= base_url('financeiras/atualizar') ?>" method="post">
                                            <?php foreach($financeira as $finance){ ?>
                                            <div class="form-group">
                                                <label for="nome-financeira">Nome da Instituição Financeira</label>
                                                <input id="txt-financeira" name="nome-financeira" type="text" value="<?=$finance->nome_financeira?>" 
                                                       class="form-control">

                                            </div>
                                            <div class="form-group">
                                                <label for="tipo-financeira">Tipo do Banco</label>
                                                <select id="tipo-financeira" name="tipo-financeira" class="custom-select">
                                                    <option value="---">Selecione...</option>
                                                    <option value="BANCO">BANCO</option>
                                                    <option value="COOPERATIVA">COOPERATIVA</option>
                                                    <option value="FINANCEIRA">FINANCEIRA</option>
                                                    <option value="SEGURADORA">SEGURADORA</option>
                                                </select>
                                                <small class="text-muted">Tipo cadastrado: <?php echo $finance->tipo_financeira; ?></small>
                                                    
                                            </div>
                                            <?php } ?>
                                            <input type="hidden" value="<?php echo $finance->id_financeira?>" name="id-financeira">
                                            <button type="submit" class="btn btn-primary">
                                                <i class="fas fa-save"></i>
                                                Atualizar
                                            </button>
                                            
                                        </form>
                                    </div>
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


