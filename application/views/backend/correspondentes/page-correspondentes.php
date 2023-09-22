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
                        <li class="breadcrumb-item"><a href="<?= base_url('correspondentes') ?>"><?= $view ?></a></li>
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
                            <a href="correspondente/novo" class="btn btn-default float-right">Clique aqui para um novo correspodente</a>
                        </div>
                        <div class="card-body">
                            <div class="container">
                                <div class="row">
                                    <div class="col-12">
                                        <table class="table table-striped table-bordered table-sm table-responsive-lg" id="tabela">
                                            <thead>
                                                <tr>
                                                    <th colspan="6" class="text-center text-light bg-pink">Correspondentes Cadastrados</th>
                                                </tr>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Nome do Correspondente</th>
                                                    <th>Inscrição</th>
                                                    <th>E-mail</th>
                                                    <th>Contato</th>
                                                    <th>Funções</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $id=1; foreach ($correspondentes as $correspondente) { ?>
                                                <tr>
                                                    <td style="vertical-align: middle; font-weight: bold">#<?=$id++?></td>
                                                    <td style="vertical-align: middle"><?=$correspondente->nome?></td>
                                                    <td style="vertical-align: middle"><?=$correspondente->inscricao ?></td>
                                                    <td style="vertical-align: middle"><?=$correspondente->email?></td>
                                                    <td style="vertical-align: middle"><?=$correspondente->phone?></td>
                                                    <td style="text-align: right; width: 150px; vertical-align: middle">
                                                        <a href="<?=base_url('correspondente/editar/'.sha1($correspondente->id))?>" role="button" class="btn btn-warning" title="Editar">
                                                            <i class="fas fa-user-edit"></i>                                                            
                                                        </a>
                                                        <a href="<?=base_url('correspondente/delete/'.sha1($correspondente->id))?>" role="button" class="btn btn-danger">
                                                            <i class="fas fa-user-slash nav-icon"></i>
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
