<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="h1">
                        <?= $subtitulo ?>
                        <span class="small text-muted"><?= $view ?></span>
                    </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin') ?>"><?= $subtitulo ?></a></li>
                        <li class="breadcrumb-item"><a href="<?= base_url('contrato/new') ?>"><?= $view ?></a></li>
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
                <div class="col-lg-12">
                    <form action="<?= base_url('contratos/cadastrar_contrato')?>" method="post">
                        <div class="card-deck">
                            <div class="card" style="margin: 0px;">
                                <div class="card-header">
                                    <h6 class="h6-titles">Dados do Cliente</h6>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body" style="padding: 4px">
                                    <div class="card" style="margin: 0px">
                                        <div class="card-header">
                                            <h6 class="h6-titles">Dados Pessoais</h6>
                                        </div>
                                        <div class="card-body" style="padding: 4px 10px">
                                            <div class="form-row">
                                                <div class="col-sm-12 col-lg-12">
                                                    <div class="form-group">
                                                        <label for="txt-nome">Nome</label>
                                                        <input type="text" id="txt-nome" name="txt-nome" value="<?= set_value('txt-nome') ?>" class="form-control form-control-sm" data-toggle="tooltip" data-placement="top" title="Nome do cliente">
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.form-row -->
                                            <div class="form-row">
                                                <div class="col-sm-12 col-lg-6">
                                                    <div class="form-group">
                                                        <label for="txt-cpf">CPF</label>
                                                        <input type="text" id="txt-cpf" name="txt-cpf" value="<?= set_value('txt-cpf') ?>" class="cpf form-control form-control-sm" data-toggle="tooltip" data-placement="top" title="CPF do Cliente">
                                                    </div>
                                                    <!-- /.form-group -->
                                                </div>
                                                <!-- / .col-sm-12 .col-lg-6 -->
                                                <div class="col-sm-12 col-lg-6">
                                                    <div class="form-group">
                                                        <label for="txt-nasceu">Data de Nascimento</label>
                                                        <input type="date" id="txt-nasceu" name="txt-nasceu" class="form-control form-control-sm" value="<?= set_value('txt-nasceu') ?>" data-toggle="tooltip" data-placement="top" title="Data de nascimento">
                                                    </div>
                                                    <!-- /.form-group -->
                                                </div>
                                                <!-- / .col-sm-12 .col-lg-6 -->
                                            </div>
                                            <!-- /.form-row -->
                                            <div class="form-row">
                                                <div class="col-sm-12 col-lg-6">
                                                    <div class="form-group">
                                                        <label for="txt-rg">RG n° | Orgão Exp.</label>
                                                        <input type="text" name="txt-rg" id="txt-rg" class="form-control form-control-sm" value="<?= set_value('txt-rg') ?>" data-toggle="tooltip" data-placement="top" title="Exemplo: 1234568 SSP/RN">
                                                    </div>
                                                    <!-- /.form-group -->
                                                </div>
                                                <!-- / .col-sm-12 .col-lg-6 -->
                                                <div class="col-sm-12 col-lg-6">
                                                    <div class="form-group">
                                                        <label for="data-exp">Data de Expedição</label>
                                                        <input type="date" id="data-exp" name="data-exp" class="form-control form-control-sm" value="<?= set_value('data-exp') ?>" data-toggle="tooltip" data-placement="top" title="Data de expedição do RG">
                                                    </div>
                                                    <!-- /.form-group -->
                                                </div>
                                                <!-- / .col-sm-12 .col-lg-6 -->
                                            </div>
                                            <!-- /.form-row -->
                                            <div class="form-row">
                                                <div class="col-sm-12 col-lg-12">
                                                    <div class="form-group">
                                                        <label for="txt-naturalde">Naturalidade</label>
                                                        <input type="text" id="txt-naturalde" name="txt-naturalde" class="form-control form-control-sm" value="<?= set_value('txt-naturalde') ?>" data-toggle="tooltip" data-placement="top" title="Naturalidade">
                                                    </div>
                                                    <!-- /.form-group -->
                                                </div>
                                                <!-- / .col-sm-12 .col-lg-6 -->
                                            </div>
                                            <!-- /.form-row -->
                                            <div class="form-row">
                                                <div class="col-sm-12 col-lg-6">
                                                    <div class="form-group">
                                                        <label for="txt-civil">Estado Civil</label>
                                                        <select id="txt-civil" name="txt-civil" class="form-control form-control-sm" data-toggle="tooltip" data-placement="top" title="Estado Civil">
                                                            <?php foreach ($ecivis as $ecivil) { ?>
                                                                <option value="<?= set_value('txt-civil', $ecivil->descricao) ?>"><?= $ecivil->descricao ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                    <!-- /.form-group -->
                                                </div>
                                                <!-- / .col-sm-12 .col-lg-6 -->
                                                <div class="col-sm-12 col-lg-6">
                                                    <div class="form-group">
                                                        <label for="txt-genero">Sexo (Gênero)</label>
                                                        <select id="txt-genero" name="txt-genero" class="form-control form-control-sm" data-toggle="tooltip" data-placement="top" title="Sexo (Gênero)">
                                                            <option value="MASCULINO">Selecione...</option>
                                                            <option value="MASCULINO">MASCULINO</option>
                                                            <option value="FEMININO">FEMININO</option>
                                                            <option value="LGBT+">LGBT+</option>
                                                        </select>
                                                    </div>
                                                    <!-- /.form-group -->
                                                </div>
                                                <!-- / .col-sm-12 .col-lg-6 -->
                                            </div>
                                            <!-- /.form-row -->
                                            <div class="form-row">
                                                <div class="col-sm-12 col-lg-12">
                                                    <div class="form-group">
                                                        <label for="txt-mae">Nome da Mãe</label>
                                                        <input type="text" id="txt-mae" name="txt-mae" class="form-control form-control-sm" value="<?= set_value('txt-mae', 'NOME da MÃE') ?>" data-toggle="tooltip" data-placement="top" title="Nome da mãe">
                                                    </div>
                                                </div>
                                                <!-- / .col-sm-12 .col-lg-12 -->
                                            </div>
                                            <!-- /.form-row -->
                                            <div class="form-row">
                                                <div class="col-sm-12 col-lg-12">
                                                    <div class="form-group">
                                                        <label for="txt-pai">Nome do Pai</label>
                                                        <input type="text" id="txt-pai" name="txt-pai" class="form-control form-control-sm" value="<?= set_value('txt-pai', 'NOME DO PAI') ?>" data-toggle="tooltip" data-placement="top" title="Nome do pai">
                                                    </div>
                                                </div>
                                                <!-- / .col-sm-12 .col-lg-12 -->
                                            </div>
                                            <!-- /.form-row -->
                                        </div>
                                    </div>
                                    
                                    <div class="card" style="margin: 0px">
                                        <div class="card-header">
                                            <h6 class="h6-titles">Dados Residenciais</h6>
                                        </div>                                     
                                        <div class="card-body" style="padding: 4px 10px">
                                            <div class="form-row">
                                                <div class="col-sm-12 col-lg-6">
                                                    <div class="form-group">
                                                        <label for="txt-cep">CEP</label>
                                                        <input type="text" id="txt-cep" name="txt-cep" class="form-control form-control-sm cep" value="<?= set_value('txt-cep') ?>" data-toggle="tooltip" data-placement="top" title="CEP (Só números)">
                                                    </div>
                                                </div>
                                                <!-- / .col-sm-12 .col-lg-6 -->
                                            </div>
                                            <!-- /.form-row -->
                                            <div class="form-row">
                                                <div class="col-sm-12 col-lg-12">
                                                    <div class="form-group">
                                                        <label for="txt-logradouro">Endereço</label>
                                                        <input type="text" id="txt-logradouro" name="txt-logradouro" class="form-control form-control-sm" value="<?= set_value('txt-logradouro') ?>" data-toggle="tooltip" data-placement="top" title="Endereço (rua, av, etc) e número">
                                                    </div>
                                                </div>
                                                <!-- / .col-sm-12 .col-lg-12 -->
                                            </div>
                                            <!-- /.form-row -->
                                            <div class="form-row">
                                                <div class="col-sm-12 col-lg-12">
                                                    <div class="form-group">
                                                        <label for="txt-complemento">Complemento</label>
                                                        <input type="text" id="txt-complemento" name="txt-complemento" class="form-control form-control-sm" value="<?= set_value('txt-complemento') ?>" data-toggle="tooltip" data-placement="top" title="Complemento. Ex.: Andar, apartamento, loja, etc.">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-sm-12 col-lg-12">
                                                    <div class="form-group">
                                                        <label for="txt-bairro">Bairro</label>
                                                        <input type="text" id="txt-bairro" name="txt-bairro" class="form-control form-control-sm" value="<?= set_value('txt-bairro') ?>" placeholder="Bairro" data-toggle="tooltip" data-placement="top" title="Bairro">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="txt-cidade">Cidade</label>
                                                        <input type="text" id="txt-cidade" name="txt-cidade" class="form-control form-control-sm" value="<?= set_value('txt-cidade') ?>" placeholder="Cidade" data-toggle="tooltip" data-placement="top" title="Cidade">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-sm-12 col-lg-3">
                                                    <div class="form-group">
                                                        <label for="txt-uf">UF</label>
                                                        <input type="text" id="txt-uf" name="txt-uf" class="form-control form-control-sm" value="<?= set_value('txt-uf') ?>" placeholder="UF" data-toggle="tooltip" data-placement="top" title="UF">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- / .card-body -->
                            </div>
                            <!-- end .card -->    
                            <div class="card" style="margin: 2px;">
                                <div class="card-header">
                                    <h5 class="h6-titles">Dados Funcionais e Bancários</h5>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body" style="padding: 2px">
                                    <div class="card" style="margin: 2px;">
                                        <div class="card-header">
                                            <h6 class="h6-titles">Dados Funcionais</h6>
                                        </div>
                                        <div class="card-body" style="padding: 5px 10px">
                                            <div class="form-row">
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label for="txt-matricula">Benefício | Matrícula</label>
                                                        <input id="txt-matricula" name="txt-matricula" class="form-control form-control-sm" value="<?= set_value('txt-matricula', NULL) ?>" data-toggle="tooltip" data-placement="top" title="Benefício e/ou matrícula">
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.form-row -->
                                            <div class="form-row">
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label for="txt-email">E-mail</label>
                                                        <textarea id="txt-email" name="txt-email" class="form-control form-control-sm" data-toggle="tooltip" data-placement="top" title="e-mails"><?= set_value('txt-email', 'NÃO POSSUI E-MAIL') ?></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.form-row -->
                                            <div class="form-row">
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label for="txt-senha">Senha</label>
                                                        <textarea id="txt-senha" name="txt-senha" class="form-control form-control-sm" data-toggle="tooltip" data-placement="top" title="Senhas de acesso."><?= set_value('txt-senha', 'NÃO POSSUI SENHAS') ?></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.form-row -->
                                            <div class="form-row">
                                                <div class="col-sm-12 col-lg-6">
                                                    <div class="form-group">
                                                        <label for="txt-phone1">Telefone (Celular)</label>
                                                        <input type="tel" id="txt-phone1" name="txt-phone1" class="form-control form-control-sm phone" value="<?= set_value('txt-phone1', '(00)00000-0000') ?>" data-toggle="tooltip" data-placement="top" title="Contato">
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-lg-6">
                                                    <div class="form-group">
                                                        <label for="txt-phone2">Telefone (Celular)</label>
                                                        <input type="tel" id="txt-phone2" name="txt-phone2" class="form-control form-control-sm phone" value="<?= set_value('txt-phone2', '(00)00000-0000') ?>" data-toggle="tooltip" data-placement="top" title="Contato">
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.form-row -->
                                            <div class="form-row">
                                                <div class="col-sm-12 col-lg-6">
                                                    <div class="form-group">
                                                        <label for="txt-phone3">Telefone (Celular)</label>
                                                        <input type="tel" id="txt-phone3" name="txt-phone3" class="form-control form-control-sm phone" value="<?= set_value('txt-phone3', '(00)00000-0000') ?>" data-toggle="tooltip" data-placement="top" title="Contato">
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-lg-6">
                                                    <div class="form-group">
                                                        <label for="txt-phone4">Telefone (Celular)</label>
                                                        <input type="tel" id="txt-phone4" name="txt-phone4" class="form-control form-control-sm phone" value="<?= set_value('txt-phone4', '(00)00000-0000') ?>" data-toggle="tooltip" data-placement="top" title="Contato">
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.form-row -->
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header">
                                            <h6 class="card-title">
                                                Dados Bancários
                                            </h6>
                                        </div>
                                        <div class="card-body">
                                            <!-- Dados Bancários -->
                                            <div class="form-row">
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label for="txt-banco">Banco</label>
                                                        <input type="text" id="txt-banco" name="txt-banco" class="form-control form-control-sm" value="<?= set_value('txt-banco') ?>" autocomplete="on" data-toggle="tooltip" data-placement="top" title="Banco">
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.form-row -->
                                            <div class="form-row">
                                                <div class="col-sm-12 col-lg-5">
                                                    <div class="form-group">
                                                        <label for="txt-agencia">Agência</label>
                                                        <input type="text" id="txt-agencia" name="txt-agencia" class="form-control form-control-sm" value="<?= set_value('txt-agencia', '000000-00') ?>" data-toggle="tooltip" data-placement="top" title="Agência bancária">
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-lg-7">
                                                    <div class="form-group">
                                                        <label for="txt-nrconta">Conta n°</label>
                                                        <input type="text" id="txt-nrconta" name="txt-nrconta" class="form-control form-control-sm" value="<?= set_value('txt-nrconta') ?>" data-toggle="tooltip" data-placement="top" title="Número da conta com dígito.">
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.form-row -->
                                            <div class="form-row">
                                                <div class="col-sm-12 col-lg-7">
                                                    <div class="form-group">
                                                        <label for="txt-tipo">Tipo</label>
                                                        <input type="text" id="txt-tipo" name="txt-tipo" class="form-control form-control-sm" value="<?= set_value('txt-tipo', 'CONTA CORRENTE') ?>" data-toggle="tooltip" data-placement="top" title="Tipo da conta">
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-lg-5">
                                                    <div class="form-group">
                                                        <label for="txt-operacao">Operação</label>
                                                        <input type="text" id="txt-operacao" name="txt-operacao" class="form-control form-control-sm" value="<?= set_value('txt-operacao', '001') ?>" data-toggle="tooltip" data-placement="top" title="Operação. Alguns bancos exigem o tipo de operação">
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.form-row -->
                                        </div>
                                        <!-- / .card-body -->
                                    </div>
                                    <!-- / .card Dados Bancários-->
                                </div>
                            </div>
                            <!-- end .card -->
                            <div class="card">
                                <div class="card-header">
                                    <h6 class="card-title">Contrato</h6>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <div class="form-row">
                                        <div class="col-sm-12 col-lg-12">
                                            <div class="form-group">
                                                <label for="controle">Usuário</label>
                                                <select name="user-id" class="form-control form-control-sm">
                                                    <option value="<?= set_value('user-id', 1) ?>">elenaldo (Padrão)</option>
                                                    <?php
                                                    foreach ($usuarios as $usuario) {
                                                        if ($usuario->user_id != 1) {
                                                            ?>
                                                            <option value="<?= $usuario->user_id ?>"><?= $usuario->user_login ?></option>
                                                        <?php } ?>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.form-row -->
                                    <div class="form-row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="nr-controle">NR Controle</label>
                                                <input type="text" name="nr-controle" id="nr-controle" class="form-control form-control-sm" 
                                                       value="<?= set_value('nr-controle', 'AJC' . date('Ymd') . mt_rand(0, 99999) . '-' . $this->session->userdata('pretorian')->user_id) ?>" data-toggle="tooltip" data-placement="top" title="NR Controle" readonly>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="nr-contrato">NR Contrato</label>
                                                <input type="text" name="nr-contrato" id="nr-contrato" class="form-control form-control-sm" 
                                                       value="<?= set_value('nr-contrato', '0000000000') ?>" required="true" placeholder="NR Contrato" data-toggle="tooltip" data-placement="top" title="NR Contrato">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.form-row -->
                                    <div class="form-row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="digitado">Data de Digitação</label>
                                                <input type="date" name="digitado" id="digitado" class="form-control form-control-sm" 
                                                       value="<?= set_value('digitado') ?>" data-toggle="tooltip" data-placement="top" title="Data da digitação">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="previsto">Data de Previsão</label>
                                                <input type="date" name="previsto" id="previsto" class="form-control form-control-sm" 
                                                       value="<?= set_value('previsto') ?>" data-toggle="tooltip" data-placement="top" title="Previsão de pagamento">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.form-row -->
                                    <div class="form-row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="id-operacao">Operação (Tipo de Contrato)</label>
                                                <select name="id-operacao" id="id-operacao" class="form-control form-control-sm">
                                                    <option value="<?= set_value('id-operacao', 1) ?>">Selecione Operação</option>
                                                    <?php foreach ($operacoes as $op) { ?>
                                                        <option value="<?= set_value('id-operacao', $op->id_operacao) ?>"><?= $op->descricao ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.form-row -->
                                    <div class="form-row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="id-orgao">Órgão</label>
                                                <select name="id-orgao" id="id-orgao" class="form-control form-control-sm">
                                                    <option value="<?= set_value('id-orgao', 1) ?>">Selecione Órgão</option>
                                                    <?php foreach ($orgaos as $orgao) { ?>
                                                        <option value="<?= set_value('id-orgao', $orgao->id_orgao) ?>">
                                                            <?= $orgao->nome_orgao . ' (' . $orgao->tipo_orgao . ')' ?>
                                                        </option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.form-row -->
                                    <div class="form-row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="id-financeira">Banco (Financeira)</label>
                                                <select name="id-financeira" id="id-financeira" class="form-control form-control-sm">
                                                    <option value="<?= set_value('id-financeira') ?>">Selecione Financeira</option>
                                                    <?php foreach ($financeiras as $fin) { ?>
                                                        <option value="<?= set_value('id-financeira', $fin->id_financeira) ?>">
                                                            <?= $fin->nome_financeira ?>
                                                        </option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.form-row -->
                                    <div class="form-row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="id-correspondente">Correspondente (Parceiro)</label>
                                                <select name="id-correspondente" id="id-correspondente" class="form-control form-control-sm">
                                                    <option value="<?= set_value('id-correspondente', 1) ?>">Selecione Correspondente</option>
                                                    <?php foreach ($correspondentes as $correspondente) { ?>
                                                        <option value="<?= set_value('id-correspondente', $correspondente->id) ?>"><?php echo $correspondente->nome; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.form-row -->
                                    <div class="form-row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="prazo">Prazo</label>
                                                <input type="number" name="prazo" id="prazo" class="form-control form-control-sm" min="1" value="<?= set_value('prazo', 1) ?>" step="1" data-toggle="tooltip" data-placement="top" title="Prazo do Contrato">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="valor-total">Valor Bruto</label>
                                                <input type="text" name="valor-total" id="valor-total" class="form-control form-control-sm valores" value="<?= set_value('valor-total', 0.0) ?>" placeholder="0,00">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.form-row -->
                                    <div class="form-row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="parcela">Valor da Parcela</label>
                                                <input type="text" id="valor-parcela" name="valor-parcela" 
                                                       class="form-control form-control-sm valores" 
                                                       value="<?= set_value('valor-parcela', 0.0) ?>" placeholder="0,00">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="valor-liquido">Valor Líquido</label>
                                                <input type="text" id="valor-liquido" name="valor-liquido"                                                       
                                                       class="form-control form-control-sm valores" 
                                                       value="<?= set_value('valor-liquido', 0.0) ?>" placeholder="0,00">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.form-row -->
                                    <div class="form-row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="id-situacao">Situação</label>
                                                <select name="id-situacao" id="id-situacao" class="form-control form-control-sm">
                                                    <option value="<?= set_value('id-situacao', 'EM ANALISE') ?>">Situação do contrato</option>
                                                    <?php foreach ($situacoes as $st) { ?>
                                                        <option value="<?= set_value('id-situacao', $st->id_situacao) ?>"><?= $st->descricao ?></option>';
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="referente">Referência de Cálculo</label>
                                                <select id="referente" name="referente" class="form-control form-control-sm" data-toggle="tooltip" data-placement="top" title="Referência de Cálculo">
                                                    <option value="LIQUIDO">Selecione...</option>
                                                    <option value="LIQUIDO">Líquido</option>
                                                    <option value="TOTAL">Total</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.form-row -->
                                    <div class="form-row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="tabelac">Tabela</label>
                                                <input type="text" name="tabelac" id="tabelac" class="form-control form-control-sm" value="<?= set_value('tabelac', 'NORMAL') ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <?php if ($this->session->userdata('pretorian')->user_nivel == 'ROLE_ADMIN') { ?>
                                        <div class="form-row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="valor-percentual">Percentual(%)</label>
                                                    <input type="text" id="valor-percentual" name="valor-percentual" 
                                                           class="form-control form-control-sm valor" value="<?= set_value('percentual', 0.0) ?>" placeholder="0.00" onblur="aosair()">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="valor-comissao">Valor Comissão</label>
                                                    <input type="text" id="valor-comissao" name="valor-comissao" 
                                                           class="form-control form-control-sm valores" 
                                                           data-affixes-stay="true" data-prefix="R$ " data-thousands="." data-decimal="," value="<?= set_value('comissao', 0.0) ?>" placeholder="0.00">
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                    <div class="form-row">
                                        <div class="col-lg-12">
                                            <label for="observacoes">Observações</label>
                                            <textarea class="form-control form-control-sm" rows="3" name="observacoes" id="observacoes"><?php echo set_value('observacoes', 'Observações'); ?></textarea>
                                            <span>Campo reservado para observações</span>
                                        </div>
                                    </div><!-- end /.form-row -->
                                </div>
                                <!-- / .card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-success">
                                        <i class="far fa-save"></i>
                                        Salvar Dados
                                    </button>
                                    <button type="reset" class="btn btn-danger">
                                        <i class="far fa-times-circle"></i>
                                        Cancelar
                                    </button>
                                </div><!-- comment -->
                            </div>
                            <!-- end .card -->
                    </form>
                    <!-- end / form -->
                </div>
               <!-- end /.card-deck -->
            </div>
        </div>
        <!-- /.row -->
</div>
<!-- / .container-fluid -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->