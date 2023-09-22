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
                        <li class="breadcrumb-item"><a href="<?= base_url('clientes') ?>"><?= $view ?></a></li>
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
                            <h3 class="card-title"><i class="fas fa-users nav-icon"></i> <?php echo $page ?></h3>
                            <a href="<?=base_url('cliente/novo')?>" class="btn btn-default float-right" target="_blank">
                                <i class="far fa-hand-point-right nav-icon"></i>
                                Clique aqui para um novo cliente
                            </a>
                        </div>
                        <div class="card-body">
                            <div class="container">
                                <div class="row">
                                    <div class="col-12">
                                        <table class="table table-striped table-bordered table-sm table-responsive-lg" id="tabela">
                                            <thead>
                                                <tr>
                                                    <th colspan="5" class="text-center text-light bg-pink">Bancos Cadastrados</th>
                                                </tr>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Nome</th>
                                                    <th>CPF</th>
                                                    <th>Orgão</th>
                                                    <th>Opções</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $id=1; foreach ($clientes as $cliente) { ?>
                                                <tr>
                                                    <td style="vertical-align: middle; font-weight: bold">#<?=$id++?></td>
                                                    <td style="vertical-align: middle"><?=$cliente->nome ?></td>
                                                    <td style="vertical-align: middle"><?=$cliente->cpf?></td>
                                                    <td style="vertical-align: middle"><?=$cliente->orgao.'-'.$cliente->nome_orgao?></td>
                                                    <td style="text-align: right; width: 150px; vertical-align: middle">
                                                        <a href="<?=base_url('contratos/novo')?>" role="button" class="btn btn-primary" title="Ficha">
                                                            <i class="far fa-file-alt"></i>                                                            
                                                        </a>
                                                    </td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
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


