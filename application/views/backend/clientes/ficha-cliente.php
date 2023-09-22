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
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"><i class="fas fa-user nav-icon mr-2"></i> <?php echo $page ?></h3>
                        </div>
                        <div class="card-body">
                            <div class="container">
                                <div class="card mb-2"  style="border: 1px solid #ff00cc">
                                    <div class="card-header" style="background-color: #ffcccc">
                                        <h6 style="margin: 0px; padding: 0px; font-weight: 700">Dados Pessoais</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="container">
                                            <div class="form-row">
                                                <div class="col-lg-8">
                                                    <?php foreach ($cliente as $value) { ?>
                                                        <div class="form-group">
                                                            <label>Nome completo</label>
                                                            <span class="form-control"><?= $value->nome ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="form-group">
                                                            <label>CPF/MF n°</label>
                                                            <span class="form-control"><?= $value->cpf ?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-lg-4 col-sm-12">
                                                        <label>RG n° | Orgão Exp.</label>
                                                        <span class="form-control"><?= $value->rg ?></span>                                             
                                                    </div>
                                                    <div class="form-group col-lg-4 col-sm-12">
                                                        <label>Data de Expedição</label>
                                                        <span class="form-control"><?= $value->rg_exp ?></span> 
                                                    </div>
                                                    <div class="form-group col-lg-4 col-sm-12">
                                                        <label>Estado Civil</label>
                                                        <span class="form-control"><?= $value->estado_civil ?></span>
                                                    </div>
                                                </div>
                                                <!-- /.form-row -->
                                                <div class="form-row">
                                                    <div class="form-group col-lg-4 col-sm-12">
                                                        <label>Data de Nascimento</label>
                                                        <span class="form-control"><?= $value->nascimento ?></span> 
                                                    </div>
                                                    <div class="form-group col-lg-4 col-sm-12">
                                                        <label>Naturalidade</label>
                                                        <span class="form-control"><?= $value->naturalidade ?></span> 
                                                    </div>
                                                    <div class="form-group col-lg-4 col-sm-12">
                                                        <label>Sexo (Gênero)</label>
                                                        <span class="form-control"><?= $value->sexo ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.card-body internal -->
                                    </div>
                                    <!-- /.card -->
                                    <div class="card mb-2"  style="border: 1px solid #ff00cc">
                                        <div class="card-header" style="background-color: #ffcccc">
                                            <h6 style="margin: 0px; padding: 0px; font-weight: 700">Filiação</h6></div>
                                        <div class="card-body">
                                            <div class="container">
                                                <div class="form-row">
                                                    <div class="form-group col-lg-6 col-sm-12">
                                                        <label>Nome da Mãe</label>
                                                        <span class="form-control"><?= $value->genitora ?></span>
                                                    </div>
                                                    <div class="form-group col-lg-6 col-sm-12">
                                                        <label>Nome do Pai</label>
                                                        <span class="form-control"><?= $value->genitor ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.card-body internal -->
                                    </div>
                                    <!-- /.card -->
                                    <div class="card mb-2"  style="border: 1px solid #ff00cc">
                                        <div class="card-header" style="background-color: #ffcccc">
                                            <h6 style="font-weight: 700">Informações</h6>
                                        </div>
                                        <div class="card-body">
                                            <div class="container">
                                                <div class="form-row">
                                                    <div class="form-group col-lg-3 col-sm-12">
                                                        <label>Telefone (Celular)</label>
                                                        <span class="form-control"><?= $value->phone ?></span>
                                                    </div>
                                                    <div class="form-group col-lg-4 col-sm-12">
                                                        <label>E-mail</label>
                                                        <span class="form-control"><?= $value->email ?></span>
                                                    </div>
                                                    <div class="form-group col-lg-2 col-sm-12">
                                                        <label>Senha</label>
                                                        <span class="form-control"><?= $value->senha ?></span>
                                                    </div>
                                                    <div class="form-group col-lg-3 col-sm-12">
                                                        <label>Órgão</label>
                                                        <span class="form-control"><?= $value->orgao.'-'.$value->nome_orgao ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.card-body internal -->
                                    </div>
                                    <div class="card mb-2"  style="border: 1px solid #ff00cc">
                                        <div class="card-header" style="background-color: #ffcccc">
                                            <h6 style="font-weight: 700">DADOS BANCÁRIOS</h6>
                                        </div>
                                        <div class="card-body">
                                            <div class="container">
                                                <div class="form-row">
                                                    <div class="form-group col-lg-6 col-sm-12">
                                                        <label>Banco</label>
                                                        <span class="form-control"><?= $value->accbanco ?></span>
                                                    </div>
                                                    <div class="form-group col-lg-3 col-sm-12">
                                                        <label>Agência</label>
                                                        <span class="form-control"><?= $value->accagencia ?></span>
                                                    </div>
                                                    <div class="form-group col-lg-3 col-sm-12">
                                                        <label>Conta n°</label>
                                                        <span class="form-control"><?= $value->accnr ?></span>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-lg-6 col-sm-12">
                                                        <label>Tipo</label>
                                                        <span class="form-control"><?= $value->acctipo ?></span>
                                                    </div>
                                                    <div class="form-group col-lg-6 col-sm-12">
                                                        <label>Operação</label>
                                                        <span class="form-control"><?= $value->accoperacao ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.card-body internal -->
                                    </div>
                                    <!-- /.card -->
                                    <div class="card mb-2"  style="border: 1px solid #ff00cc">
                                        <div class="card-header" style="background-color: #ffcccc">
                                            <h6 style="font-weight: 700">Endereço Residencial</h6>
                                        </div>
                                        <div class="card-body">
                                            <div class="container">
                                                <div class="form-row">
                                                    <div class="form-group col-lg-2 col-sm-12">
                                                        <label for="cep">CEP</label>
                                                        <span class="form-control"><?= $value->cep ?></span>
                                                    </div>
                                                    <div class="form-group col-lg-10 col-sm-12">
                                                        <label>Endereço</label>
                                                        <span class="form-control"><?= $value->logradouro ?></span>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-lg-4 col-sm-12">
                                                        <label>Complemento</label>
                                                        <span class="form-control"><?= $value->complemento ?></span>
                                                    </div>
                                                    <div class="form-group col-lg-3 col-sm-12">
                                                        <label>Bairro</label>
                                                        <span class="form-control"><?= $value->bairro ?></span>
                                                    </div>
                                                    <div class="form-group col-lg-4 col-sm-12">
                                                        <label>Cidade</label>
                                                        <span class="form-control"><?= $value->municipio ?></span>
                                                    </div>
                                                    <div class="form-group col-lg-1 col-sm-12">
                                                        <label>UF</label>
                                                        <span class="form-control"><?= $value->uf ?></span>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <!-- /.card-body internal -->
                                </div>
                                <!-- /.card -->
                            </div>
                            <!-- /div.container.card-body -->
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

