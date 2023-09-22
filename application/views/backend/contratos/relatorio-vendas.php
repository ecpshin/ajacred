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
                    <div class="card">
                        <div class="card-header">
                            <h1 class="card-title">Pesquisar</h1>
                        </div>
                        <div class="card-body">

                            <form action="<?= base_url('relatorios/search') ?>" method="post">
                                <div class="form-row">
                                    <div class="col-lg-2 col-sm-12">
                                        <div class="form-group">
                                            <label>Data Inicial</label>
                                            <input type="date" id="inicio" name="inicio" class="form-control"> 
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-sm-12">
                                        <div class="form-group">
                                            <label>Data Limite</label>
                                            <input type="date" id="final" name="final" class="form-control"> 
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-lg-2 col-sm-12">
                                        <div class="form-group">
                                            <label>Agente</label>
                                            <select id="id-user" name="id-user" class="form-control">
                                                <?php foreach ($users as $agente) { 
                                                   echo '<option value="'.$agente->user_id.'">'.$agente->user_nome.'</option>';
                                                   echo "\n"; 
                                                }
                                                ?>
                                            </select> 
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <div class="card-footer">
                            <input type="submit" class="btn btn-warning" id="pesquisar" name="pesquisar" value="Pesquisar">
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <?php if (isset($pesquisar) && !is_null($contratos)) { ?>
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
                                <a href="<?=base_url('contratos/novo')?>" class="btn btn-default float-right">
                                    <i class="far fa-hand-point-right nav-icon"></i>
                                    Clique aqui para um novo contrato
                                </a>
                            </div>
                            <div class="card-body">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <?php if (count($contratos) != 0) { ?>
                                                <table data-page-length="5"  class="table table-striped table-bordered table-sm" id="tabela">
                                                    <thead>
                                                        <tr>
                                                            <th><h6>Contratos</h6></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php foreach ($contratos as $contrato) { ?>
                                                            <tr>
                                                                <td>
                                                                    <div class="card bg-default">
                                                                        <div class="card-header" style="background: #f6f6f6">
                                                                            <div class="row">
                                                                                <div class="col-lg-6">
                                                                                    <h6 class="text-muted-black"><b>NR Controle: </b>
                                                                                        <a href="<?= base_url('contratos/editar/' . sha1($contrato->pid)) ?>" class="card-link"><?= $contrato->nrcontrole ?></a>
                                                                                    </h6>                                                                    
                                                                                </div>
                                                                                <div class="col-lg-6">
                                                                                    <h6 class="text-muted-black" style="text-align: right"><b>Agente(Usuário):</b> <?= $contrato->user_login ?></h6>                                                                    
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
                                                                                        <h6><b>Situação:</b> <?= $contrato->descricao_situacao ?></h6>
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
                                                        <?php
                                                        }
                                                    }
                                                    ?>
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

<?php } ?>
