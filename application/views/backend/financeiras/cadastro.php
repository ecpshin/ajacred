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
                            <h3 class="card-title"><i class="fas fa-landmark nav-icon mr-2"></i> 
                            <?php echo $page ?></h3>
                        </div>
                        <div class="card-body">
                            <div class="container">
                                <div class="row">
                                    <div class="col">
                                        <?= validation_errors('<div class="alert alert-warning">', '</div>'); ?>
                                        <form action="<?= base_url('financeiras/salvar') ?>" method="post">
                                            <div class="form-group">
                                                <label for="nome-financeira">Nome da Instituição Financeira</label>
                                                <input type="text" name="nome-financeira" id="nome-financeira" value="<?= set_value('nome-financeira') ?>" 
                                                       class="form-control" placeholder="Nome da intituição financeira">
                                                <small>Exemplo: 999 - BANCO DO COMERCIO</small>       
                                            </div>
                                            <div class="form-group">
                                                <label for="tipo-financeira">Tipo</label>
                                                <select id="tipo-financeira" name="tipo-financeira" class="custom-select">
                                                    <?php foreach($tipos as $tipo) { ?>
                                                    <option value="<?=set_value('tipo-financeira', $tipo)?>"><?=$tipo ?></option>
                                                    <?php } ?>
                                                    <option value="<?=set_value('tipo-financeira', 'BANCO')?>">Selecione...</option>
                                                    <option value="<?=set_value('tipo-financeira','BANCO')?>">BANCO</option>
                                                    <option value="<?=set_value('tipo-financeira','COOPERATIVA')?>">COOPERATIVA</option>
                                                    <option value="<?=set_value('tipo-financeira','FINANCEIRA')?>">FINANCEIRA</option>
                                                    <option value="<?=set_value('tipo-financeira','SEGURADORA')?>">SEGURADORA</option>
                                                </select>
                                            </div>
                                            <button type="submit" class="btn btn-success" role="button">
                                                <i class="fas fa-save nav-icon mr-1"></i>
                                                <span>Salvar</span>
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
