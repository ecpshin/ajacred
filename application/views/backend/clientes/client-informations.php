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
                        <div class="card-header-ajacred">
                            <h3 class="card-title">
                                <i class="fas fa-info-circle nav-icon mr-2 text-blue" style="font-size: 20px"></i> <?php echo $page ?></h3>
                        </div>
                        <div class="card-body" style="padding: 5px 0px">
                            <div class="container-fluid">
                                <div id="accordion">
                                    <div class="card" style="margin-bottom: 1px">
                                        <div class="card-header-ajacred" id="headingOne" style="border-radius: 8px; padding: 5px;">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link text-light text-bold" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                    Dados Pessoais
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                                            <div class="card-body">
                                                <table class="table table-borderless table-striped table-sm">
                                                    <tr style="font-size: 10px">                                                                
                                                        <th>Nome</th>
                                                        <td><?= $pessoal->nome ?></td>
                                                        <th>Data de nascimento</th>
                                                        <td class="dados"><?= formata_data($pessoal->nascimento) ?>  <i class="fas fa-calendar-day text-fuchsia"></i></td>
                                                    </tr>
                                                    <tr>
                                                        <th>CPF</th>
                                                        <td style="font-size: 16px"><?= $pessoal->cpf ?> <i class="fas fa-id-card-clip"></i></td>
                                                        <th>Naturalidade</th>
                                                        <td><?= $pessoal->naturalidade ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Doc. Identidade nº/Orgão Exp.</th>
                                                        <td class="dados"><?= $pessoal->rg ?></td>
                                                        <th>Data de Expedição:</th>
                                                        <td class="Dados"><?= formata_data($pessoal->rg_exp) ?> <i class="fas fa-calendar-day text-fuchsia"></i></td>
                                                    </tr>
                                                    <tr class="form-group">
                                                        <th>Nome da mãe</th>
                                                        <td><?= $pessoal->genitora ?></td>
                                                        <th>Nome do Pai</h6>
                                                        <td><?= $pessoal->genitor ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Sexo</th>
                                                        <td><?= $pessoal->sexo ?></td>
                                                        <th>Estado Civil</th>
                                                        <td><?= $pessoal->estado_civil ?></td>
                                                    </tr>       
                                                    <tr>
                                                        <th>CEP</th>
                                                        <td><?= $endereco->cep ?></td>
                                                        <th>Endereço | Nº</th>
                                                        <td><?= $endereco->logradouro ?></td>
                                                    </tr>       
                                                </table>                    
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end .card -->
                                    <div class="card" style="margin-bottom: 1px">
                                        <div class="card-header" id="headingTwo" style="border-radius: 8px; padding: 5px">
                                            <h6 class="h6-titles">
                                                <button class="btn btn-link text-light text-bold collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                    Dados Funcionais
                                                </button>
                                            </h6>
                                        </div>
                                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                                            <div class="card-body">
                                                <?php
                                                if (empty($funcionais) || count($funcionais) <= 0) {
                                                    echo '<div class="alert alert-info">Não háiste informações funcionais para este cliente!</div>';
                                                } else {
                                                    ?>
                                                    <table class="table table-borderless table-striped table-sm">
                                                        <?php foreach ($funcionais as $funcional) { ?>
                                                        <thead class="text-light" style="background: #ff6633">
                                                                <tr>
                                                                    <th colspan="4">Vínculos: <span><?= $funcional->nome_orgao ?></span></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>                                                        
                                                                <tr>
                                                                    <th>Contato 1</th>
                                                                    <td><?= (!is_null($funcional->phone1)) ? $funcional->phone1 : '(84)0000-0000' ?></td>
                                                                    <th>Contato 3</th>
                                                                    <td><span><?= (!is_null($funcional->phone3)) ? $funcional->phone3 : '(84)0000-0000' ?></span></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Contato 2</th>
                                                                    <td><?= (!is_null($funcional->phone2)) ? $funcional->phone2 : '(84)0000-0000' ?></td>
                                                                    <th>Contato 4</th>
                                                                    <td><span><?= (!is_null($funcional->phone4)) ? $funcional->phone4 : '(84)0000-0000' ?></span></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>e-mails</th>
                                                                    <td><textarea class="form-control" readonly><?= (!is_null($funcional->emails)) ? $funcional->emails : 'Não tem email' ?></textarea></td>
                                                                    <th>Senhas</th>
                                                                    <td><textarea class="form-control" readonly><?= (!is_null($funcional->senhas)) ? $funcional->senhas : '(84)0000-0000' ?></textarea></td>
                                                                </tr>
                                                            <?php }
                                                        }
                                                        ?>
                                                    </tbody>
                                                </table>                                                
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end .card -->
                                    <div class="card" style="margin-bottom: 1px">
                                        <div class="card-header" id="headingThree" style="border-radius: 8px; padding: 5px">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link text-bold text-light collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                    Dados Bancários
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                                            <div class="card-body">
                                                <?php
                                                if (empty($bancarios) || is_null($bancarios)) {
                                                    echo '<div class="alert alert-info">Não há dados bancários para este cliente.</div>';
                                                } else {
                                                    foreach ($bancarios as $bancario) {
                                                        ?>
                                                        <table class="table table-borderless table-striped table-sm">
                                                            <thead>
                                                                <tr>
                                                                    <th colspan="4">Dados bancários</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <th>Banco</th>
                                                                    <td><?= $bancario->bank_name ?></td>
                                                                    <th>Agência</th>
                                                                    <td><?= $bancario->bank_ag ?></td>
                                                                    <th>Conta nrº</th>
                                                                    <td><?= $bancario->account_nr ?></td>
                                                                    <th>Tipo da Conta</th>
                                                                    <td><?= $bancario->account_type ?></td>
                                                                    <th>Operação</th>
                                                                    <td><?= $bancario->account_op ?></td>
                                                                </tr>
                                                        <?php }
                                                    }
                                                    ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end .card -->
                                    <div class="card" style="margin-bottom: 1px;">
                                        <div class="card-header" id="headingFour" style="border-radius: 8px; padding: 5px">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link text-bold text-light collapsed" data-toggle="collapse" 
                                                        data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                                    Dados Residenciais
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
                                            <div class="card-body">
                                                <?php
                                                if (empty($endereco) || is_null($endereco)) {
                                                    echo '<div class="alert alert-info">Não há dados residenciais para este cliente.</div>';
                                                } else { ?>
                                                        <table class="table table-borderless table-striped table-sm">
                                                            <tbody>
                                                                <tr>
                                                                    <th>CEP</th>
                                                                    <td><?= $endereco->cep ?></td>
                                                                    <th>Endereço e nº</th>
                                                                    <td><?= $endereco->logradouro?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Complemento</th>
                                                                    <td><?= $endereco->complemento ?></td>
                                                                    <th>Bairro</th>
                                                                    <td><?= $endereco->bairro ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Cidade</th>
                                                                    <td><?= $endereco->municipio ?></td>
                                                                    <th>UF</th>
                                                                    <td><?= $endereco->uf ?></td>
                                                                </tr>
                                                        <?php }  ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end .card -->
                                </div>
                            </div>
                            <!-- /.cconteiner -->
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.Default Box -->
                </div>
            </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->


