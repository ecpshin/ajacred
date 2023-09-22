<?php $ml = $this->session->userdata('pretorian')->user_nivel; ?>
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
                        <div class="card-header" style="background-color: #ff532f">
                            <h3 class="card-title" style="float: left; margin: 8px;">
                                <i class="fas fa-landmark nav-icon"></i> 
                                    <?php echo $page ?>
                            </h3>
                            <a href="<?=base_url('contratos/novo')?>" class="btn btn-default float-right">
                                <i class="far fa-hand-point-right nav-icon"></i>
                                Clique aqui para um novo contrato
                            </a>
                        </div>
                        <div class="card-body">
                            <div class="container">
                                <div class="row">
                                    <div class="col-12">
                                        <table data-page-length="10"  class="table table-striped table-bordered table-responsive-lg" id="tabela">
                                            <thead>
                                                <tr>
                                                    <th><h6>Contratos</h6></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($contratos as $contrato) { ?>
                                                    <tr>
                                                        <td>
                                                            <div class="card border <?= border_status($contrato->descricao_situacao)?>">
                                                                <div class="card-header" style="background: rgba(249, 144, 74, .2)">
                                                                    <div class="row">
                                                                        <div class="col-lg-6">
                                                                            <h6 style="color: #ff532f; margin: 10px; font-weight: 500"><b>NR Controle: </b><?=$contrato->nrcontrole?>
                                                                                <a href="<?=base_url('contratos/editar/'.sha1($contrato->pid))?>" class="card-link" 
                                                                                    title="Editar contrato" style="margin-left: 5px;"><i class="far fa-edit nav-icon"></i></a>
                                                                                <?php if($ml == 'ROLE_ADMIN') { ?>
                                                                                <a href="<?=base_url('contrato/excluir/'.sha1($contrato->pid))?>" class="card-link"
                                                                                	title="Excluir contrato" style="text-align: left; margin-left: 5px; color: red" 
                                                                                	onclick="return confirm('Tem certeza que quer excluir este contrato?');">
                                                                                    <i class="fas fa-times-circle nav-icon"></i></a>
                                                                                <?php } ?>    
                                                                            </h6>                                                                    
                                                                        </div>
                                                                        <div class="col-lg-6">
                                                                            <h6 style="color: #ff532f;text-align: right; margin: 10px; font-weight: 500">
                                                                            <i class="fas fa-user nav-icon"></i>  <?= $contrato->user_login ?></h6>                                                                    
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="card-body">
                                                                    <div class="container m-0">
                                                                        <div class="row">
                                                                            <div class="col-lg-6 col-sm-12">
                                                                                <h6><b>Data da Digitação: </b> <?= date('d/m/Y', strtotime($contrato->digitacao)) ?></h6>
                                                                            </div>
                                                                            <div class="col-lg-6 col-sm-12">
                                                                                <h6><b>Previsão da Liberação:</b> <?= date('d/m/Y', strtotime($contrato->finalizacao)) ?></h6>                                                                                
                                                                            </div>
                                                                        </div>
                                                                        <hr style="margin: 3px 0px">
                                                                        <div class="row">
                                                                            <div class="col-lg-6">
                                                                                <h6><b>Cliente:</b> <?= $contrato->nome_cliente ?></h6>
                                                                            </div>
                                                                            <div class="col-lg-6">
                                                                                <h6><b>CPF/MF nº:</b> <?= $contrato->cpf ?></h6>
                                                                            </div>
                                                                        </div>
                                                                        <hr style="margin: 3px 0px">
                                                                        <div class="row">
                                                                            <div class="col-lg-6">
                                                                                <h6><strong>Operação:</strong> <?= $contrato->descricao_operacao ?></h6>                                                                 
                                                                            </div>
                                                                             <div class="col-lg-6">
                                                                                <h6><b>Órgão:</b> <?= $contrato->nome_orgao.' [ '.$contrato->tipo_orgao.' ]' ?></h6>
                                                                            </div>
                                                                        </div>
                                                                        <hr style="margin: 3px 0px">
                                                                        <div class="row">
                                                                            <div class="col-lg-6">
                                                                                <h6><strong>Financeira:</strong> <?= $contrato->nome_financeira ?></h6>                                                                           
                                                                            </div>                                                                    
                                                                            <div class="col-lg-6">
                                                                                <h6><strong>Correspondente:</strong> <?= $contrato->nome_correspondente ?></h6>                                                                 
                                                                            </div>                                                                    
                                                                        </div>
                                                                        <hr style="margin: 3px 0px">
                                                                        <div class="row">
                                                                            <div class="col-lg-3">
                                                                                <h6><b>Prazo:</b> <?= $contrato->prazo.'x' ?></h6>
                                                                            </div>
                                                                            <div class="col-lg-3">
                                                                                <h6><b>Total:</b> R$ <?= number_format($contrato->total, 2, ",", ".") ?></h6>
                                                                            </div>                                                              
                                                                            <div class="col-lg-3">
                                                                                <h6><b>Parcela:</b> R$ <?= number_format($contrato->parcela, 2, ",", ".") ?></h6>
                                                                            </div>                                                              
                                                                            <div class="col-lg-3">
                                                                                <h6><b>Líquido:</b> R$ <?= number_format($contrato->liquido, 2, ",", ".") ?></h6>
                                                                            </div>                                                              
                                                                        </div>                                                       
                                                                        <hr style="margin: 3px 0px">
                                                                        <div class="row">
                                                                            <div class="col-lg-12">
                                                                                <h6 class="<?= status_contrato($contrato->descricao_situacao)?> text-center text-bold">
                                                                                    <i class="fas fa-hand-point-right nav-icon"></i> <?= $contrato->descricao_situacao ?>
                                                                                </h6>
                                                                            </div>                                                              
                                                                        </div>                                                       
                                                                    </div>
                                                                </div><!-- end /.card-body -->
                                                                <div class="card-footer">
                                                                    <div class="row">
                                                                            <div class="col-lg-12">
                                                                                <h6><b>Última atualização:</b> <?= date('d/m/Y H:i:s', strtotime($contrato->ultima_edicao)) ?></h6>
                                                                            </div>                                                              
                                                                        </div>
                                                                </div><!-- end /.card-footer -->
                                                            </div>
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

