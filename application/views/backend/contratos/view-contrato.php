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
                        <li class="breadcrumb-item"><a href="<?= base_url('contratos') ?>"><?= $page ?></a></li>
                        <li class="breadcrumb-item active"><?= $view ?></li>
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
                        <div class="card-header" style="background-color: #E83E8C">
                            <h3 class="card-title text-light">
                                <i class="fas fa-landmark nav-icon"></i> 
                                <?php echo $page ?>
                            </h3>
                            <a href="<?= base_url('contratos/novo') ?>" class="btn btn-default float-right">
                                <i class="far fa-hand-point-right nav-icon"></i>
                                Clique aqui para um novo contrato
                            </a>
                        </div>
                        <div class="card-body">                            
                            <?php foreach ($contratodb as $contrato) { ?>
                                <div class="row mb-3" style="border-bottom: 1px solid #E83E8C">
                                    <div class="col-lg-4">
                                        <h6 class="text-black"><b>NR Controle: </b>
                                            <a href="<?= base_url('contratos/editar/' . sha1($contrato->pid)) ?>" class="card-link"><?= $contrato->nrcontrole ?></a>
                                        </h6>                                                                    
                                    </div>
                                    <div class="col-lg-4">
                                    </div>
                                    <div class="col-lg-4">
                                        <h6 class="text-black" style="text-align: right"><b>Agente(Usuário):</b> <?= $contrato->user_login ?></h6>                                                                    
                                    </div>
                                </div>
                                <div class="row mb-3" style="border-bottom: 1px solid #E83E8C">
                                    <div class="col-lg-6 col-sm-12">
                                        <h6><b>Data da Digitação: </b> <?= date('d/m/Y', strtotime($contrato->digitacao)) ?></h6>
                                    </div>
                                    <div class="col-lg-6 col-sm-12">
                                        <h6><b>Previsão da Liberação:</b> <?= date('d/m/Y', strtotime($contrato->finalizacao)) ?></h6>                                                                                
                                    </div>
                                </div>
                                <div class="row mb-3" style="border-bottom: 1px solid #E83E8C">
                                    <div class="col-4">
                                        <h6><b>Cliente:</b> <?= $contrato->nome_cliente ?></h6>
                                    </div>
                                    <div class="col-4">
                                        <h6><b>CPF: </b> <?= $contrato->cpf_cliente ?></h6>
                                    </div>
                                </div>
                                <div class="row mb-3" style="border-bottom: 1px solid #E83E8C">
                                    <div class="col-12" >
                                        <h6><strong>Operação:</strong> <?= $contrato->descricao_operacao ?></h6>                                                                 
                                    </div>                                                                    
                                </div>
                                <div class="row mb-3" style="border-bottom: 1px solid #E83E8C">
                                    <div class="col-lg-6">
                                        <h6><strong>Financeira:</strong> <?= $contrato->nome_financeira ?></h6>                                                                           
                                    </div>                                                                    
                                    <div class="col-lg-6">
                                        <h6><strong>Correspondente:</strong> <?= $contrato->nome_correspondente ?></h6>                                                                 
                                    </div>                                                                    
                                </div>
                                <div class="row mb-3" style="border-bottom: 1px solid #E83E8C">
                                    <div class="col-lg-4">
                                        <h6><b>Total:</b> R$ <?= number_format($contrato->total, 2, ",", ".") ?></h6>
                                    </div>                                                              
                                    <div class="col-lg-4">
                                        <h6><b>Parcela:</b> R$ <?= number_format($contrato->parcela, 2, ",", ".") ?></h6>
                                    </div>                                                              
                                    <div class="col-lg-4">
                                        <h6><b>Líquido:</b> R$ <?= number_format($contrato->liquido, 2, ",", ".") ?></h6>
                                    </div>                                                              
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="<?= status_contrato($contrato->descricao_situacao)?> text-center">
                                            <h6 class="text-bold"><?=$contrato->descricao_situacao?></h6>
                                        </div>
                                    </div>                                                              
                                </div>                                                       
                            </div>
                            <!-- end /.card-footer -->
                            <div class="card-footer">
                                <h6 class="float-right"><b>Última atualização:</b> <?= date('d/m/Y H:i:s', strtotime($contrato->ultima_edicao)) ?></h6>
                            </div>
                        </div>
                        <!-- end /.card-body -->
                    </div>
                <?php } ?>                
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

