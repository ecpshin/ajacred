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
                            <h3 class="card-title"><i class="fas fa-landmark nav-icon"></i> <?php echo $page ?></h3>
                            <a href="orgao/novo" class="btn btn-default float-right">
                                <i class="far fa-hand-point-right nav-icon"></i>
                                Clique aqui para um novo órgão
                            </a>
                        </div>
                        <div class="card-body">
                            <div class="container">
                                <div class="row">
                                    <div class="col-12">
                                        <table data-page-length="5"  class="table table-striped table-bordered table-sm" id="tabela">
                                            <thead>
                                                <tr>
                                                    <th colspan="4" class="text-center text-light bg-pink">Bancos Cadastrados</th>
                                                </tr>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Órgão</th>
                                                    <th>Tipo</th>
                                                    <th>&nbsp;</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $id=0; foreach ($orgaos as $orgao) { ?>
                                                    <tr>
                                                        <td><?=++$id ?></td>                              
                                                        <td><?=$orgao->nome_orgao ?></td>                              
                                                        <td><?=$orgao->tipo_orgao ?></td>
                                                        <td style="text-align: right; width: 80px">
                                                            <a href="<?=base_url('orgao/editar/'.$orgao->id_orgao)?>"
                                                               class="btn btn-warning" role="button" title="Atualizar">
                                                                <i class="fas fa-edit nav-icon"></i>
                                                            </a>
                                                            <a href="<?=base_url('excluir/orgao/'.$orgao->id_orgao)?>"
                                                               class="btn btn-danger" role="button" title="Excluir">
                                                                <i class="far fa-trash-alt nav-icon"></i>
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


