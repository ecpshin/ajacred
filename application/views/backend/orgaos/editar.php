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
                        <li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?= base_url('orgaos') ?>"><?= $view ?></a></li>
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
                            <h3 class="card-title">
                            <i class="fas fa-landmark nav-icon mr-2"></i> 
                            <?php echo $page ?></h3>
                        </div>
                        <div class="card-body">
                            <div class="container">
                                <div class="row">
                                    <div class="col">
                                        <?= validation_errors('<div class="alert alert-warning">', '</div>'); ?>
                                        <form action="<?= base_url('orgaos/atualizar') ?>" method="post">
                                        <?php foreach($orgao as $org) { ?>
                                            <div class="form-group">
                                                <label for="txt-orgao">Órgão</label>
                                                <input id="txt-orgao" name="txt-orgao" type="text" value="<?=$org->nome_orgao?>" 
                                                       class="form-control" placeholder="Nome do órgão">                                                
                                            </div>
                                            <div class="form-group">
                                                <label for="txt-tipo">Tipo do Órgão</label>
                                                <select id="txt-tipo" name="txt-tipo" class="custom-select">
                                                    <option value="---">Selecione...</option>
                                                    <option value="<?=set_value('txt-tipo','EMPRESA PRIVADA')?>">EMPRESA PRIVADA</option>
                                                    <option value="<?=set_value('txt-tipo','FEDERAL')?>">FEDERAL</option>
                                                    <option value="<?=set_value('txt-tipo','FORCAS ARMADAS')?>">FORCAS ARMADAS</option>
                                                    <option value="<?=set_value('txt-tipo','MUNICIPAL')?>">MUNICIPAL</option>
                                                    <option value="<?=set_value('txt-tipo','PREVIDENCIA SOCIAL')?>">PREVIDENCIA SOCIAL</option>
                                                    <option value="<?=set_value('txt-tipo','SIAPE')?>">SIAPE</option>
                                                </select>
                                                <small class="text-muted">Tipo cadastrado: <?=$org->tipo_orgao?></small>
                                            </div>
                                        <?php } ?>
                                            <button type="submit" class="btn btn-success" role="button">
                                                <i class="fas fa-save nav-icon mr-1"></i>
                                                <span>Atualizar</span>
                                            </button>
                                            <button type="reset" class="btn btn-danger" role="button">
                                                <i class="fa fa-refresh" aria-hidden="true"></i>
                                                <span>Cancelar</span>        
                                            </button>
                                            <input type="hidden" name="id-orgao" value="<?=$org->id_orgao?>">
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