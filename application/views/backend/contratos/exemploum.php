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
                        <li class="breadcrumb-item"><a href="<?= base_url('contratos') ?>"><?= $view ?></a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?= $page ?></li>
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
                        <div class="card-header" style="background-color: #ff3333">
                            <h3 class="card-title text-light">
                                <i class="fas fa-landmark nav-icon"></i> 
                                <?php echo $page ?>
                            </h3>
                            <a href="contratos/novo" class="btn btn-default float-right">
                                <i class="far fa-hand-point-right nav-icon"></i>
                                Clique aqui para um novo contrato
                            </a>
                        </div>
                        <div class="card-body">
                            <table data-page-length="10"  class="table table-striped table-bordered table-sm" id="tabela">
                                <thead>
                                    <tr>
                                        <th>PID</th>
                                        <th>Digitado</th>
                                        <th>Liberado</th>
                                        <th>Cliente</th>
                                        <th>CPF</th>
                                        <th>Operação</th>                                        
                                        <th>Instituição Financeira</th>                                        
                                        <th>Total</th>
                                        <th>Parcela</th>
                                        <th>Líquido</th>
                                        <th>Agente</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($contratos as $contrato) { ?>
                                        <tr>
                                            <td>
                                                <a href="<?= base_url('contrato/visualizar/'.sha1($contrato->pid))?>">
                                                    <i class="fas fa-info-circle nav-icon"></i>
                                                </a>                                                
                                            </td>
                                            <td><?= formata_data($contrato->digitacao)?></td>
                                            <td><?= formata_data($contrato->finalizacao)?></td>
                                            <td><?=$contrato->nome_cliente?></td>
                                            <td><?=$contrato->cpf_cliente?></td>
                                            <td><?=$contrato->id_operacao.'-'.$contrato->descricao_operacao?></td>
                                            <td><?=$contrato->nome_financeira?></td>
                                            <td style="text-align: right"><?= formatar_numero($contrato->total)?></td>
                                            <td style="text-align: right"><?= formatar_numero($contrato->parcela)?></td>
                                            <td style="text-align: right"><?= formatar_numero($contrato->liquido)?></td>
                                            <td><?=$contrato->id_user.'-'.$contrato->user_login?></td>                                            
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

