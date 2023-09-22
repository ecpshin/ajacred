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
                        <div class="card-header">
                            <h3 class="card-title"><i class="fas fa-user nav-icon mr-2"></i> <?php echo $page ?></h3>
                        </div>
                        <div class="card-body" style="padding: 5px">
                            <form action="<?= base_url('clientes/atualizar') ?>" method="post">
                                <div class="accordion" id="accordionExample">
                                    <div class="card" style="margin-bottom: 1px">
                                        <div class="card-header mb-0" id="headingOne">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link text-light" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" 
                                                        aria-controls="collapseOne">
                                                    Dados Pessoais
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                            <div class="card-body" style="padding: 5px">
                                                <div class="form-row">
                                                    <div class="col-lg-8">
                                                        <div class="form-group">
                                                            <label for="txt-nome">Nome completo</label>
                                                            <input type="text" name="txt-nome" id="txt-nome" class="form-control form-control-sm"
                                                                   value="<?= $cliente->nome ?>" required="true" 
                                                                   data-toggle="tooltip" data-placement="top" title="Não utilizar sinais de acentuação: ~^´`">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="form-group">
                                                            <label for="txt-cpf">CPF/MF n°</label>
                                                            <input type="text" name="txt-cpf" id="txt-cpf" class="form-control form-control-sm cpf"
                                                                   value="<?= $cliente->cpf ?>" required="true" placeholder="CPF do Cliente"
                                                                   data-toggle="tooltip" data-placement="top" title="Somente números">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-lg-4 col-sm-12">
                                                        <label for="txt-rg">RG n° | Orgão Exp.</label>
                                                        <input type="text" name="txt-rg" id="txt-rg" class="form-control form-control-sm" 
                                                               value="<?= $cliente->rg ?>"
                                                               data-toggle="tooltip" data-placement="top" title="Exemplo: 1234568 SSP/RN">                                                    
                                                    </div>
                                                    <div class="form-group col-lg-4 col-sm-12">
                                                        <label for="data-exp">Data de Expedição</label>
                                                        <input type="date" id="data-exp" name="data-exp" class="form-control form-control-sm" 
                                                               value="<?= $cliente->rg_exp ?>"
                                                               data-toggle="tooltip" data-placement="top" title="Data de expedição do RG"> 
                                                    </div>
                                                    <div class="form-group col-lg-4 col-sm-12">
                                                        <label for="txt-civil">Estado Civil</label>
                                                        <select id="txt-civil" name="txt-civil" class="form-control form-control-sm"
                                                                data-toggle="tooltip" data-placement="top" title="Estado Civil">
                                                            <option value="<?= $cliente->estado_civil ?>"><?= $cliente->estado_civil . ' (CADASTRADO)' ?></option>    
                                                            <?php foreach ($ecivis as $ecivil) { ?>    
                                                                <option value="<?= set_value('txt-civil', $ecivil->descricao) ?>"><?= $ecivil->descricao ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <!-- /.form-row -->
                                                <div class="form-row">
                                                    <div class="form-group col-lg-4 col-sm-12">
                                                        <label for="txt-nasceu">Data de Nascimento</label>
                                                        <input type="date" id="txt-nasceu" name="txt-nasceu" class="form-control form-control-sm" 
                                                               value="<?= $cliente->nascimento ?>"
                                                               data-toggle="tooltip" data-placement="top" title="Data de nascimento"> 
                                                    </div>
                                                    <div class="form-group col-lg-4 col-sm-12">
                                                        <label for="txt-naturalde">Naturalidade</label>
                                                        <input type="text" id="txt-naturalde" name="txt-naturalde" class="form-control form-control-sm" 
                                                               value="<?= $cliente->naturalidade ?>" 
                                                               data-toggle="tooltip" data-placement="top" title="Naturalidade"> 
                                                    </div>
                                                    <div class="form-group col-lg-4 col-sm-12">
                                                        <label for="txt-genero">Sexo (Gênero)</label>
                                                        <select id="txt-genero" name="txt-genero" class="form-control form-control-sm"
                                                                data-toggle="tooltip" data-placement="top" title="Sexo (Gênero)">
                                                            <option value="<?= $cliente->sexo ?>"><?= $cliente->sexo . ' (CADASTRADO)' ?></option>
                                                            <option value="<?= set_value('txt-genero', 'MASCULINO') ?>">MASCULINO</option>
                                                            <option value="<?= set_value('txt-genero', 'FEMININO') ?>">FEMININO</option>
                                                            <option value="<?= set_value('txt-genero', 'LGBTQI+') ?>">LGBTQI+</option>

                                                        </select>
                                                    </div>
                                                </div>
                                                <!-- /.form-row -->
                                                <div class="form-row">
                                                    <div class="form-group col-lg-6 col-sm-12">
                                                        <label for="txt-mae">Nome da Mãe</label>
                                                        <input type="text" id="txt-mae" name="txt-mae" class="form-control form-control-sm" 
                                                               value="<?= $cliente->genitora ?>"
                                                               data-toggle="tooltip" data-placement="top" title="Nome da mãe">
                                                    </div>
                                                    <div class="form-group col-lg-6 col-sm-12">
                                                        <label for="txt-pai">Nome do Pai</label>
                                                        <input type="text" id="txt-pai" name="txt-pai" class="form-control form-control-sm" 
                                                               value="<?= $cliente->genitor ?>"
                                                               data-toggle="tooltip" data-placement="top" title="Nome do pai">
                                                    </div>
                                                </div>
                                                <!-- /.form-row -->
                                                <div class="form-row">
                                                    <div class="form-group col-lg-2 col-sm-12">
                                                        <label for="txt-cep">CEP</label>
                                                        <input type="text" id="txt-cep" name="txt-cep" class="form-control form-control-sm cep" 
                                                               value="<?= $endereco->cep ?>"
                                                               data-toggle="tooltip" data-placement="top" title="CEP (Só números)">
                                                    </div>
                                                    <div class="form-group col-lg-10 col-sm-12">
                                                        <label for="txt-logradouro">Endereço</label>
                                                        <input type="text" id="txt-logradouro" name="txt-logradouro" class="form-control form-control-sm" 
                                                               value="<?= $endereco->logradouro ?>"
                                                               data-toggle="tooltip" data-placement="top" title="Endereço (rua, av, etc) e número">
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-lg-4 col-sm-12">
                                                        <label for="txt-complemento">Complemento</label>
                                                        <input type="text" id="txt-complemento" name="txt-complemento" class="form-control form-control-sm" 
                                                               value="<?= $endereco->complemento ?>" data-toggle="tooltip" data-placement="top" 
                                                               title="Complemento. Ex.: Andar, apartamento, loja, etc.">
                                                    </div>
                                                    <div class="form-group col-lg-3 col-sm-12">
                                                        <label for="txt-bairro">Bairro</label>
                                                        <input type="text" id="txt-bairro" name="txt-bairro" class="form-control form-control-sm" 
                                                               value="<?= $endereco->bairro ?>" placeholder="Bairro"
                                                               data-toggle="tooltip" data-placement="top" title="Bairro">
                                                    </div>
                                                    <div class="form-group col-lg-4 col-sm-12">
                                                        <label for="txt-cidade">Cidade</label>
                                                        <input type="text" id="txt-cidade" name="txt-cidade" class="form-control form-control-sm" 
                                                               value="<?= $endereco->municipio ?>" placeholder="Cidade"                
                                                               data-toggle="tooltip" data-placement="top" title="Cidade">
                                                    </div>
                                                    <div class="form-group col-lg-1 col-sm-12">
                                                        <label for="txt-uf">UF</label>
                                                        <input type="text" id="txt-uf" name="txt-uf" class="form-control form-control-sm" 
                                                               value="<?= $endereco->uf ?>" placeholder="UF"
                                                               data-toggle="tooltip" data-placement="top" title="UF">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- #collapseOne -->
                                    </div>
                                    <!-- /.cardOne -->
                                    <div class="card" style="margin-bottom: 1px">
                                        <div class="card-header" id="headingTwo">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link text-light collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                    Dados funcionais
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                            <div class="card-body">
                                                <?php if(!is_null($funcionais)) { ?>
                                                <div class="form-row">                                                    
                                                    <div class="form-group col-lg-4">
                                                        <label for="nr-beneficio">Nº Benefício | Matrícula</label>
                                                        <input type="text" id="nr-beneficio" name="nr-beneficio" class="form-control form-control-sm" 
                                                               value="<?= (!is_null($funcionais->nrbeneficio)) ? $funcionais->nrbeneficio : 'Atualize este campo' ?>"
                                                               data-toggle="tooltip" data-placement="top" title="Nº do Benefício, matrícula ou vínculo.">
                                                    </div>
                                                    <div class="form-group col-lg-4">
                                                        <label for="txt-email">E-mail</label>
                                                        <textarea id="txt-email" name="txt-email" class="form-control form-control-sm"
                                                                  data-toggle="tooltip" data-placement="top" title="e-mails"><?= $funcionais->emails ?></textarea>
                                                    </div>
                                                    <div class="form-group col-lg-4">
                                                        <label for="txt-senha">Senha</label>
                                                        <textarea id="txt-senha" name="txt-senha" class="form-control form-control-sm" 
                                                                  data-toggle="tooltip" data-placement="top" title="Senhas de acesso."><?= $funcionais->senhas ?></textarea>
                                                    </div>
                                                </div>                                                    
                                                <div class="form-row">
                                                    <div class="form-group col-md-3">
                                                        <label for="txt-phone1">Telefone (Celular)</label>
                                                        <input type="tel" id="txt-phone1" name="txt-phone1" class="form-control form-control-sm phone" 
                                                               value="<?= $funcionais->phone1 != null ? $funcionais->phone1 : '(00)00000-0000' ?>"
                                                               data-toggle="tooltip" data-placement="top" title="Contato">
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="txt-phone2">Telefone (Celular)</label>
                                                        <input type="tel" id="txt-phone2" name="txt-phone2" class="form-control form-control-sm phone" 
                                                               value="<?= $funcionais->phone2 != null ? $funcionais->phone2 : '(00)00000-0000' ?>"
                                                               data-toggle="tooltip" data-placement="top" title="Contato">
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="txt-phone3">Telefone (Celular)</label>
                                                        <input type="tel" id="txt-phone3" name="txt-phone3" class="form-control form-control-sm phone" 
                                                               value="<?= ($funcionais->phone3 != null) ? $funcionais->phone3 : '(00)00000-0000' ?>"
                                                               data-toggle="tooltip" data-placement="top" title="Contato">
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="txt-phone4">Telefone (Celular)</label>
                                                        <input type="tel" id="txt-phone4" name="txt-phone4" class="form-control form-control-sm phone" 
                                                               value="<?= $funcionais->phone4 != null ? $funcionais->phone4 : '(00)00000-0000' ?>"
                                                               data-toggle="tooltip" data-placement="top" title="Contato">
                                                    </div>
                                                </div>
                                            <input type="hidden" name="func-id"  value="<?= sha1($funcionais->id_funcional) ?>">
                                            <?php } else {
                                                echo '<div class="alert alert-warning">Atualizar órgão do cliente</div>';
                                            }?>
                                            </div>
                                        </div>
                                        <!-- #collapseTwo -->
                                    </div>
                                    <!-- /.cardSecond -->
                                    <div class="card" style="margin-bottom: 1px">
                                        <div class="card-header" id="headingThree">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link text-light collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                    Dados Bancários
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                            <div class="card-body">
                                                <div class="form-row">
                                                    <div class="form-group col-lg-5 col-sm-12">
                                                        <label for="txt-banco">Banco</label>
                                                        <input type="text" id="txt-banco" name="txt-banco" class="form-control form-control-sm" 
                                                               value="<?= (!is_null($bancarios->bank_name) || $bancarios->bank_name!='') ? $bancarios->bank_name : 'ORDEM DE PAGAMENTO'; ?>" autocomplete="on"
                                                               data-toggle="tooltip" data-placement="top" title="Banco">
                                                    </div>
                                                    <div class="form-group col-lg-2 col-sm-12">
                                                        <label for="txt-agencia">Agência</label>
                                                        <input type="text" id="txt-agencia" name="txt-agencia" class="form-control form-control-sm" 
                                                               value="<?= $bancarios->bank_ag ?>"
                                                               data-toggle="tooltip" data-placement="top" title="Agência bancária">
                                                    </div>
                                                    <div class="form-group col-lg-2 col-sm-12">
                                                        <label for="txt-nrconta">Conta n°</label>
                                                        <input type="text" id="txt-nrconta" name="txt-nrconta" class="form-control form-control-sm" 
                                                               value="<?= $bancarios->account_nr ?>" data-toggle="tooltip" data-placement="top" title="Número da conta com dígito.">
                                                    </div>
                                                    <div class="form-group col-lg-2 col-sm-12">
                                                        <label for="txt-tipo">Tipo</label>
                                                        <input type="text" id="txt-tipo" name="txt-tipo" class="form-control form-control-sm" 
                                                               value="<?= $bancarios->account_type ?>"
                                                               data-toggle="tooltip" data-placement="top" title="Tipo da conta">
                                                    </div>
                                                    <div class="form-group col-lg-1 col-sm-12">
                                                        <label for="txt-operacao">Operação</label>
                                                        <input type="text" id="txt-operacao" name="txt-operacao" class="form-control form-control-sm" 
                                                               value="<?= $bancarios->account_op ?>"
                                                               data-toggle="tooltip" data-placement="top" title="Operação. Alguns bancos exigem o tipo de operação">
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.card-body -->
                                        </div>
                                        <!-- #collapseThree -->
                                    </div>
                                    <!-- .cardThree -->
                                </div>
                                <!-- /.accordion -->
                        </div>
                        <input type="hidden" name="client-id" value="<?= sha1($cliente->id_cliente) ?>">                        
                        <input type="hidden" name="bco-id" value="<?= sha1($bancarios->bank_id) ?>">
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button class="btn btn-block btn-primary" type="submit"><i class="fas fa-save"></i> Atualizar</button>
                        </div>

                        </form>    
                        <!-- /end form -->
                    </div>
                    <!-- /.card-principal -->
                </div>
            </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->


