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
                        <li class="breadcrumb-item active"><?= $page ?></li>
                    </ol>
                </div>
            </div>
            <div class="row mb-2">
                <div class="container">
                    <form action="<?= base_url('contratos/pesquisar') ?>" method="post">
                        <div class="col-12">
                            <div class="form-row">
                                <div class="form-group col-3">
                                    <Label>Data inicial</Label>
                                    <input type="date" name="inicio" class="form-control" title="Data inicial">
                                </div>
                                <div class="form-group col-3">
                                    <label for="final">Data limite</label>
                                    <input type="date" name="final" id="final" class="form-control" title="Data limite">
                                </div>
                                <div class="form-group col-3">
                                    <label for="agente">Agente (Usuário)</label>
                                    <select name="agente" id="agente" class="form-control" title="Agente (Usuário)">
                                        <option value="">Selecione agente</option>
                                        <?php 
                                        foreach ($agentes as $user) {
                                            printf("<option value='%d'>%s</option>\n", $user->user_id, $user->user_nome);
                                        } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="btn-group">
                                <input type="submit" name="pesquisar" value="Pesquisar" class="btn btn-success mr-2">
                                <input type="reset" name="limpar" value="Cancelar" class="btn btn-danger">
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /.container -->
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- Default box -->
                    <?php if (!is_null($contratosdb)) { ?>
                        <div class="card">
                            <div class="card-header" style="background-color: #ff3333">
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
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <table data-page-length="10" class="table table-bordered table-sm" id="geral">
                                                <thead>
                                                    <tr>
                                                        <th>Contratos</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($contratosdb as $contrato) { ?>
                                                        <tr>
                                                        <td>
                                                            <div class="card border <?= border_status($contrato->descricao_situacao)?>">
                                                                <div class="card-header" style="background: #f6f6f6">
                                                                    <div class="row">
                                                                        <div class="col-lg-6">
                                                                            <h6 class="text-black"><b>NR Controle: </b>
                                                                                <a href="<?=base_url('contratos/editar/'.sha1($contrato->pid))?>" class="card-link"><?= $contrato->nrcontrole ?></a>
                                                                            </h6>                                                                    
                                                                        </div>
                                                                        <div class="col-lg-6">
                                                                            <h6 class="text-black" style="text-align: right"><b>Agente(Usuário):</b> <?= $contrato->user_login ?></h6>                                                                    
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
                                                                            <div class="col-lg-12">
                                                                                <h6><b>Cliente:</b> <?= $contrato->nome_cliente ?></h6>
                                                                            </div>
                                                                        </div>
                                                                        <hr style="margin: 3px 0px">
                                                                        <div class="row">
                                                                            <div class="col-lg-12">
                                                                                <h6><strong>Operação:</strong> <?= $contrato->descricao_operacao ?></h6>                                                                 
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
                                                                        <hr style="margin: 3px 0px">
                                                                        <div class="row">
                                                                            <div class="col-lg-12">
                                                                                <h5 class="<?= status_contrato($contrato->descricao_situacao)?> text-center text-bold">
                                                                                    <i class="fas fa-hand-point-right nav-icon"></i> <?= $contrato->descricao_situacao ?></h5>
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
                    <?php } ?>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->