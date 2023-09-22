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
                            <h3 class="card-title">
                                <i class="fas fa-info-circle nav-icon mr-2 text-blue" style="font-size: 20px"></i> <?php echo $page ?></h3>
                        </div>
                        <div class="card-body">
                            <div class="container">
                                <table class="table table-condensed" id="geral">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nome</th>
                                            <th>CPF</th>
                                            <th>Contato</th>
                                            <th>e-mail</th>
                                            <th>Senha</th>
                                            <th>Órgão</th>
                                            <th>Tipo</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($infosdb as $info) { ?>
                                        <tr style="font-size: 10px">
                                            <td><?=$info->id_cliente?></td>
                                            <td><?=$info->nome?></td>
                                            <td><?=$info->cpf?></td>
                                            <td><?=$info->phone?></td>
                                            <td><?=$info->email?></td>
                                            <td><?=$info->senha?></td>
                                            <td><?=$info->orgao?></td>
                                            <td><?=$info->tipo_orgao?></td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>                                                
                                </table>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card-principal -->
                </div>
            </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->


