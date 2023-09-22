<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>
                        <?= $subtitulo ?>
                        <span class="samll text-muted"><?= $view ?></span>
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
                            <h3 class="card-title"><i class="fas fa-user nav-icon mr-2"></i> <?php echo $page ?></h3>
                        </div>
                        <div class="card-body">
                            <div class="container">
                                <div class="container">
                                    <table class="table" id="geral">
                                        <thead>
                                            <tr>
                                                <th>Nome</th>
                                                <th>CPF</th>
                                                <th>Nº Benefício</th>
                                                <th>Contato</th>
                                                <th>E-mail</th>
                                                <th>Senha</th>
                                                <th>Órgão</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($clientes as $cliente) { ?> 
                                                <tr>
                                                    <td><?= strtoupper($cliente->nome_cliente)?></td>
                                                    <td><?=$cliente->cpf?></td>
                                                    <td><?=(is_null($cliente->nrbeneficio) || empty($cliente->nrbeneficio)) ? 'ATUALIZAR DADOS' : $cliente->nrbeneficio?></td>
                                                    <td class="text-wrap"><?=$cliente->phone1?></td>
                                                    <td class="text-wrap"><?=(is_null($cliente->emails) || empty($cliente->emails)) ? '-' : strtolower($cliente->emails)?></td>
                                                    <td class="text-wrap"><?=(is_null($cliente->senhas) || empty($cliente->senhas)) ? '-' : $cliente->senhas ?></td>
                                                    <td class="text-wrap"><?=$cliente->nome_orgao.'['.$cliente->tipo_orgao.']'?></td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /div.container -->
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

