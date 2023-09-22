<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>
                        <?= $subtitulo ?>
                        <span class="small text-muted"><?= $view ?></span>
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
                    <?php if (is_null($cliente) || empty($cliente)) { ?>
                        <div class="alert alert-ajacred">Selecione cliente</div>
                    <?php } else { ?>
                        <div class="card" style="border-left: 10px solid #ff532f">
                            <div class="card-body">
                                <div class="row mb-0">
                                    <div class="col-lg-3 col-md-6">
                                        <label>NOME: </label> <?= $cliente->nome ?>
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        <label>CPF: </label> <?= $cliente->cpf ?>
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        <label>Doc. Identidade: </label> <?= $cliente->rg . ' | ' . formata_data($cliente->rg_exp) ?>
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        <label>Data de Nascimento: </label> <?= formata_data($cliente->nascimento) ?>
                                    </div>
                                </div>
                                <div class="row mb-0">
                                    <div class="col-lg-3 col-md-6">
                                        <label>Naturalidade: </label> <?= $cliente->naturalidade ?>
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        <label>Genitora: </label> <?= $cliente->genitora ?>
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        <label>Genitor: </label> <?= $cliente->genitor ?>
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        <label>Sexo: </label> <?= $cliente->sexo ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-info-circle nav-icon mr-2 text-blue" style="font-size: 20px"></i> <?php echo $page ?></h3>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-ajacred" data-toggle="modal" data-target="#exampleModal">
                                Clique aqui para selecionar cliente
                            </button>
                        </div>
                        <div class="card-body" style="padding: 3px">
                            <div class="row">
                            <?php if (!is_null($contratos)) { ?>                                
                                    <?php foreach ($contratos as $contrato) { ?>                                    
                                        <div class="col-3">
                                        <div class="card">
                                            <h6 class="bg-navy p-2">
                                                <i class="fas fa-file-archive nav-icon"></i> 
                                                <?=$contrato->pid ?>
                                            </h6>
                                            <div class="card-body" style="padding: 3px">
                                                <h6 class="ml-2" style="font-size: 13px; font-weight: 700"><i class="fas fa-user"></i> <?=$contrato->user_login?></h6>
                                                <table class="table table-striped table-sm table-bordered">
                                                    <tr>
                                                        <th>Nº Contrato</th>
                                                        <th>Situação</th>                                                        
                                                    </tr>
                                                    <tr>
                                                        <td><?=$contrato->nrcontrato?></td>
                                                        <td><?=$contrato->descricao_situacao?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Digitado</th>
                                                        <th>Liberado</th>                                                        
                                                    </tr>
                                                    <tr>
                                                        <td><?= formata_data($contrato->digitacao)?></td>
                                                        <td><?=formata_data($contrato->finalizacao)?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Órgão</th>
                                                        <th>Operação</th>
                                                    </tr>
                                                    <tr>
                                                        <td><?=$contrato->nome_orgao?></td>
                                                        <td><?=$contrato->descricao_operacao?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Prazo</th>
                                                        <th>Total</th>
                                                    </tr>
                                                    <tr>
                                                        <td><?=$contrato->prazo?></td>
                                                        <td><?= 'R$ '.formatar_numero($contrato->total)?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Parcela</th>
                                                        <th>Líquido</th>
                                                    </tr>
                                                    <tr>
                                                        <td><?= 'R$ '.formatar_numero($contrato->parcela)?></td>
                                                        <td><?='R$ '.formatar_numero($contrato->liquido)?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Financeira</th>
                                                        <th>Correspondente</th>
                                                    </tr>
                                                    <tr>
                                                        <td><?= $contrato->nome_financeira?></td>
                                                        <td><?=$contrato->nome_correspondente?></td>
                                                    </tr>
                                                </table>                                                
                                            </div>
                                        </div>
                                        </div>
                                    <?php } ?>                                
                            <?php } ?>
                        </div>    
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.Default Box -->
            </div>
        </div>
    </section>
    <!-- /.content -->
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-sm" id="geral">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nome</th>
                                <th>CPF</th>
                            </tr>
                        </thead>
                        <tbody>
<?php foreach ($clientesdb as $value) { ?>
                                <tr>
                                    <td><a href="<?= sha1($value->id_cliente) ?>"><i class="fas fa-user" style="color: #ff532f"></i></a></td>
                                    <td><?= $value->nome ?></td>
                                    <td><?= $value->cpf ?></td>                                                    
                                </tr>
<?php } ?>                            
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.content-wrapper -->
