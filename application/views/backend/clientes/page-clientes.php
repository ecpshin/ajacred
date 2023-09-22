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
                        <div class="card-header" style="padding: 4px;">
                            <h3 class="card-title" style="margin: 7px 5px"><i class="fas fa-users nav-icon"></i> <?php echo $page ?></h3>
                            <a href="cliente/novo" class="btn btn-default float-right">
                                <i class="far fa-hand-point-right nav-icon"></i>
                                Clique aqui para um novo cliente
                            </a>
                        </div>
                        <div class="card-body" style="padding: 5px">
                            <table class="table table-striped table-sm" id="geral" style="margin: 2px;">
                                <thead>
                                    <tr>
                                        <th colspan="4" class="text-center text-light" style="background-color: #ff3333">Clientes Cadastrados</th>
                                    </tr>
                                    <tr>
                                        <th>#</th>
                                        <th>Nome</th>
                                        <th>CPF</th>
                                        <th>Opções</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $id = 1;
                                    foreach ($clientes as $cliente) {
                                        ?>
                                        <tr>
                                            <td style="vertical-align: middle; font-weight: bold">#<?= $id++ ?></td>
                                            <td style="vertical-align: middle"><?= $cliente->nome ?></td>
                                            <td style="vertical-align: middle"><?= $cliente->cpf ?></td>
                                            <td style="text-align: right; width: 150px; vertical-align: middle">
                                                <a href="<?= base_url('clientes/editar/' . sha1($cliente->id_cliente)) ?>" role="button" class="btn btn-warning" title="Editar">
                                                    <i class="fas fa-user-edit"></i>                                                            
                                                </a>
                                                <a href="<?= base_url('clientes/infos/' . sha1($cliente->id_cliente) . '/informacoes-do-cliente') ?>" role="button" class="btn btn-primary" title="Ficha">
                                                    <i class="fas fa-info-circle"></i>                                                            
                                                </a>                                                        
                                            </td>
                                        </tr>
                                <?php } ?>
                                </tbody>
                            </table>
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

<!--
    <a href="<?php //base_url('clientes/delete/'.sha1($cliente->id_cliente))   ?>" role="button" class="btn btn-danger">
        <i class="fas fa-user-slash nav-icon"></i>
    </a>
-->
