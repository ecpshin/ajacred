<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>
                        <?= $subtitulo ?>
                        <span class="small text-muted"><?= $page ?></span>
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
                    <div class="row">
                            <?=validation_errors('<div class="col-12">'
                                        . '<div class="alert alert-warning">',
                                        '<a href="' . base_url('cliente/novo')
                                        . '" class="alert-link">Clique aqui para retornar</a>'
                                        . '</div>'
                                        . '</div>'); ?>
                    </div>
                    <!-- Default box -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-landmark nav-icon"></i> 
                                <?php echo $view . '  | <span class="text-muted-black">' . $page . '</span>' ?>
                            </h3>
                        </div>
                        <div class="card-body" style="padding: 3px">
                            <form action="<?= base_url('clientes/salvar_cliente') ?>" method="post">
                                <div class="accordion" id="accordionExample">
                                    <div class="card" style="margin-bottom: 1px">
                                        <div class="card-header" id="headingOne" style="padding: 0">
                                            <h5 class="h6-titles">
                                                <button class="btn btn-link text-light" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" 
                                                        aria-controls="collapseOne">
                                                    Dados Pessoais
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                            <div class="card-body">
                                                <div class="form-row">
                                                    <div class="col-lg-8">
                                                        <div class="form-group">
                                                            <label for="txt-nome">Nome completo</label>
                                                            <input type="text" name="txt-nome" id="txt-nome" class="form-control" value="<?= set_value('txt-nome') ?>" required="true" 
                                                                   data-toggle="tooltip" data-placement="top" title="Não utilizar sinais de acentuação: ~^´`">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="form-group">
                                                            <label for="txt-cpf">CPF/MF n°</label>
                                                            <input type="text" name="txt-cpf" id="txt-cpf" class="form-control cpf" value="<?= set_value('txt-cpf') ?>" required="true" placeholder="CPF do Cliente"
                                                                   data-toggle="tooltip" data-placement="top" title="Somente números">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-lg-4 col-sm-12">
                                                        <label for="txt-rg">RG n° | Orgão Exp.</label>
                                                        <input type="text" name="txt-rg" id="txt-rg" class="form-control" value="<?= set_value('txt-rg') ?>"
                                                               data-toggle="tooltip" data-placement="top" title="Exemplo: 1234568 SSP/RN">                                                    
                                                    </div>
                                                    <div class="form-group col-lg-4 col-sm-12">
                                                        <label for="data-exp">Data de Expedição</label>
                                                        <input type="date" id="data-exp" name="data-exp" class="form-control" value="<?= set_value('data-exp') ?>"
                                                               data-toggle="tooltip" data-placement="top" title="Data de expedição do RG"> 
                                                    </div>
                                                    <div class="form-group col-lg-4 col-sm-12">
                                                        <label for="txt-civil">Estado Civil</label>
                                                        <select id="txt-civil" name="txt-civil" class="form-control"
                                                                data-toggle="tooltip" data-placement="top" title="Estado Civil">
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
                                                        <input type="date" id="txt-nasceu" name="txt-nasceu" class="form-control" value="<?= set_value('txt-nasceu') ?>"
                                                               data-toggle="tooltip" data-placement="top" title="Data de nascimento"> 
                                                    </div>
                                                    <div class="form-group col-lg-4 col-sm-12">
                                                        <label for="txt-naturalde">Naturalidade</label>
                                                        <input type="text" id="txt-naturalde" name="txt-naturalde" class="form-control" 
                                                               value="<?= set_value('txt-naturalde') ?>" data-toggle="tooltip" data-placement="top" title="Naturalidade"> 
                                                    </div>
                                                    <div class="form-group col-lg-4 col-sm-12">
                                                        <label for="txt-genero">Sexo (Gênero)</label>
                                                        <select id="txt-genero" name="txt-genero" class="form-control"
                                                                data-toggle="tooltip" data-placement="top" title="Sexo (Gênero)">
                                                            <option value="MASCULINO">Selecione...</option>
                                                            <option value="MASCULINO">MASCULINO</option>
                                                            <option value="FEMININO">FEMININO</option>
                                                            <option value="LGBT+">LGBT+</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <!-- /.form-row -->
                                                <div class="form-row">
                                                    <div class="form-group col-lg-6 col-sm-12">
                                                        <label for="txt-mae">Nome da Mãe</label>
                                                        <input type="text" id="txt-mae" name="txt-mae" class="form-control" 
                                                               value="<?= set_value('txt-mae', 'NOME da MÃE') ?>"
                                                               data-toggle="tooltip" data-placement="top" title="Nome da mãe">
                                                    </div>
                                                    <div class="form-group col-lg-6 col-sm-12">
                                                        <label for="txt-pai">Nome do Pai</label>
                                                        <input type="text" id="txt-pai" name="txt-pai" class="form-control" 
                                                               value="<?= set_value('txt-pai', 'NOME DO PAI') ?>"
                                                               data-toggle="tooltip" data-placement="top" title="Nome do pai">
                                                    </div>
                                                </div>
                                                <!-- /.form-row -->
                                                <div class="form-row">
                                                    <div class="form-group col-lg-2 col-sm-12">
                                                        <label for="txt-cep">CEP</label>
                                                        <input type="text" id="txt-cep" name="txt-cep" class="form-control cep" 
                                                               value="<?= set_value('txt-cep') ?>"
                                                               data-toggle="tooltip" data-placement="top" title="CEP (Só números)">
                                                    </div>
                                                    <div class="form-group col-lg-10 col-sm-12">
                                                        <label for="txt-logradouro">Endereço</label>
                                                        <input type="text" id="txt-logradouro" name="txt-logradouro" class="form-control" 
                                                               value="<?= set_value('txt-logradouro') ?>"
                                                               data-toggle="tooltip" data-placement="top" title="Endereço (rua, av, etc) e número">
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-lg-4 col-sm-12">
                                                        <label for="txt-complemento">Complemento</label>
                                                        <input type="text" id="txt-complemento" name="txt-complemento" class="form-control" 
                                                               value="<?= set_value('txt-complemento') ?>" data-toggle="tooltip" data-placement="top" 
                                                               title="Complemento. Ex.: Andar, apartamento, loja, etc.">
                                                    </div>
                                                    <div class="form-group col-lg-3 col-sm-12">
                                                        <label for="txt-bairro">Bairro</label>
                                                        <input type="text" id="txt-bairro" name="txt-bairro" class="form-control" 
                                                               value="<?= set_value('txt-bairro') ?>" placeholder="Bairro"
                                                               data-toggle="tooltip" data-placement="top" title="Bairro">
                                                    </div>
                                                    <div class="form-group col-lg-4 col-sm-12">
                                                        <label for="txt-cidade">Cidade</label>
                                                        <input type="text" id="txt-cidade" name="txt-cidade" class="form-control" 
                                                               value="<?= set_value('txt-cidade') ?>" placeholder="Cidade"                
                                                               data-toggle="tooltip" data-placement="top" title="Cidade">
                                                    </div>
                                                    <div class="form-group col-lg-1 col-sm-12">
                                                        <label for="txt-uf">UF</label>
                                                        <input type="text" id="txt-uf" name="txt-uf" class="form-control" 
                                                               value="<?= set_value('txt-uf') ?>" placeholder="UF"
                                                               data-toggle="tooltip" data-placement="top" title="UF">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- #collapseOne -->
                                    </div>
                                    <!-- /.cardOne -->
                                    <div class="card" style="margin-bottom: 1px">
                                        <div class="card-header" id="headingTwo" style="padding: 0">
                                            <h5 class="h6-titles">
                                                <button class="btn btn-link text-light collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                    Dados funcionais
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                            <div class="card-body">
                                                <div class="form-row">
                                                    <div class="col-4">
                                                        <div class="form-group">
                                                            <label for="txt-beneficio">Número do Benefício | Inscrição</label>
                                                            <input type="text" id="txt-beneficio" name="txt-beneficio" value="<?=set_value('txt-beneficio', '-')?>" class="form-control"
                                                                   data-toggle="tooltip" data-placement="top" title="Número Benefício">
                                                        </div>
                                                    </div>
                                                    <div class="col-4">
                                                        <div class="form-group">
                                                            <label for="txt-email">E-mail</label>
                                                            <textarea id="txt-email" name="txt-email" class="form-control"
                                                                      data-toggle="tooltip" data-placement="top" title="e-mails"><?= set_value('txt-email', 'NÃO POSSUI E-MAIL') ?></textarea>
                                                        </div>                                                        
                                                    </div>
                                                    <div class="col-4">
                                                        <div class="form-group">
                                                            <label for="txt-senha">Senha</label>
                                                            <textarea id="txt-senha" name="txt-senha" class="form-control" 
                                                                  data-toggle="tooltip" data-placement="top" title="Senhas de acesso."><?= set_value('txt-senha', 'NÃO POSSUI SENHAS') ?></textarea>
                                                        </div>
                                                    </div>
                                                </div>                                                    
                                                <div class="form-row">
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label for="txt-phone1">Telefone (Celular)</label>
                                                            <input type="tel" id="txt-phone1" name="txt-phone1" class="form-control phone" 
                                                                   value="<?= set_value('txt-phone1', '(00)00000-0000') ?>"
                                                                   data-toggle="tooltip" data-placement="top" title="Contato">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="txt-phone2">Telefone (Celular)</label>
                                                            <input type="tel" id="txt-phone2" name="txt-phone2" class="form-control phone" 
                                                                   value="<?= set_value('txt-phone2', '(00)00000-0000') ?>"
                                                                   data-toggle="tooltip" data-placement="top" title="Contato">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label for="txt-phone3">Telefone (Celular)</label>
                                                            <input type="tel" id="txt-phone3" name="txt-phone3" class="form-control phone" 
                                                                   value="<?= set_value('txt-phone3', '(00)00000-0000') ?>"
                                                                   data-toggle="tooltip" data-placement="top" title="Contato">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="txt-phone4">Telefone (Celular)</label>
                                                            <input type="tel" id="txt-phone4" name="txt-phone4" class="form-control phone" 
                                                                   value="<?= set_value('txt-phone4', '(00)00000-0000') ?>"
                                                                   data-toggle="tooltip" data-placement="top" title="Contato">
                                                        </div>                                                       
                                                    </div><!-- /.col-lg-6 -->


                                                </div>
                                            </div>
                                        </div>
                                        <!-- #collapseTwo -->
                                    </div>
                                    <!-- /.cardSecond -->
                                    <div class="card" style="margin-bottom: 1px">
                                        <div class="card-header" id="headingThree" style="padding: 0">
                                            <h5 class="h6-titles">
                                                <button class="btn btn-link text-light collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                    Dados Bancários
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                            <div class="card-body" style="margin-bottom: 2px">
                                                <div class="form-row">
                                                    <div class="form-group col-lg-5 col-sm-12">
                                                        <label for="txt-banco">Banco</label>
                                                        <input type="text" id="txt-banco" name="txt-banco" class="form-control" 
                                                               value="<?= set_value('txt-banco') ?>" autocomplete="on"
                                                               data-toggle="tooltip" data-placement="top" title="Banco">
                                                    </div>
                                                    <div class="form-group col-lg-2 col-sm-12">
                                                        <label for="txt-agencia">Agência</label>
                                                        <input type="text" id="txt-agencia" name="txt-agencia" class="form-control" 
                                                               value="<?= set_value('txt-agencia', '000000-00') ?>"
                                                               data-toggle="tooltip" data-placement="top" title="Agência bancária">
                                                    </div>
                                                    <div class="form-group col-lg-2 col-sm-12">
                                                        <label for="txt-nrconta">Conta n°</label>
                                                        <input type="text" id="txt-nrconta" name="txt-nrconta" class="form-control" value="<?= set_value('txt-nrconta') ?>" data-toggle="tooltip" data-placement="top" title="Número da conta com dígito.">
                                                    </div>
                                                    <div class="form-group col-lg-2 col-sm-12">
                                                        <label for="txt-tipo">Tipo</label>
                                                        <input type="text" id="txt-tipo" name="txt-tipo" class="form-control" 
                                                               value="<?= set_value('txt-tipo', 'CONTA CORRENTE') ?>"
                                                               data-toggle="tooltip" data-placement="top" title="Tipo da conta">
                                                    </div>
                                                    <div class="form-group col-lg-1 col-sm-12">
                                                        <label for="txt-operacao">Operação</label>
                                                        <input type="text" id="txt-operacao" name="txt-operacao" class="form-control" 
                                                               value="<?= set_value('txt-operacao', '001') ?>"
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
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <div style="text-align: right">
                                <button type="submit" class="btn btn-success">
                                    <i class="fas fa-save nav-icon"></i>
                                    Salvar
                                </button>
                                <input type="reset" class="btn btn-danger">
                            </div>
                        </div>
                        </form>
                        <!-- /end form -->
                    </div>
                    <!-- /Default box -->
                </div>
            </div>
        </div> 
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->