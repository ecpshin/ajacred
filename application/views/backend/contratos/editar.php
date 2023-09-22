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
                        <span class="text-muted"><?= $page ?></span>
                    </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin') ?>"><?= $subtitulo ?></a></li>
                        <li class="breadcrumb-item"><a href="<?= base_url('contratos') ?>"><?= $view ?></a></li>
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
                            <h3 class="card-title"><i class="fas fa-landmark nav-icon"></i> <?php echo $view . '  | <span class="text-muted">' . $page . '</span>' ?></h3>
                        </div>
                        <div class="card-body">
                            <?php
                            echo validation_errors('<div class="alert alert-warning">',
                                    '<a href="' . base_url('contratos/novo')
                                    . '" class="alert-link">Clique aqui para retornar</a>'
                                    . '</div>')
                            ?>

                            <form action="<?= base_url('contratos/atualizar') ?>" method="post">
                                <div class="container">
                                    <div class="card mb-2"  style="border: 1px solid #ff00cc">
                                        <div class="card-body">
                                            <div class="container">
                                                <div class="form-row">
                                                    <div class="col-lg-2">
                                                        <div class="form-group">
                                                            <label for="controle">Usuário</label>
                                                            <select name="user-id" class="form-control form-control-sm" data-toggle="tooltip" data-placement="top" title="Selecione usuário">
                                                                <option value="<?=set_value('user-id', $contrato->usuario)?>">
                                                                    <?=$contrato->user_login?>
                                                                </option>
                                                                <?php foreach ($usuarios as $usuario) { ?>
                                                                    <option value="<?= set_value('user-id', $usuario->user_id) ?>"><?= $usuario->user_login ?></option>;
                                                                <?php } ?>   
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="col-lg-3">                                                       
                                                        <div class="form-group">
                                                            <label for="controle">NR Controle</label>
                                                            <input type="text" name="controle" id="controle" class="form-control form-control-sm" 
                                                                   value="<?= $contrato->nrcontrole ?>" placeceholder="ID do Cliente"
                                                                   data-toggle="tooltip" data-placement="top" title="Somente números" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <div class="form-group">
                                                            <label for="nrcontrato">NR Contrato</label>
                                                            <input type="text" name="nrcontrato" id="nrcontrato" class="form-control form-control-sm" 
                                                                   value="<?= $contrato->nrcontrato ?>" placeceholder="ID do Cliente"
                                                                   data-toggle="tooltip" data-placement="top" title="NR Contrato">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <div class="form-group">
                                                            <label for="digitado">Data de Digitação</label>
                                                            <input type="date" name="digitado" id="digitado" class="form-control form-control-sm" 
                                                                   value="<?= $contrato->digitacao ?>" required="true" 
                                                                   data-toggle="tooltip" data-placement="top" title="Data da digitação">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <div class="form-group">
                                                            <label for="previsto">Data de Previsão</label>
                                                            <input type="date" name="previsto" id="previsto" class="form-control form-control-sm" 
                                                                   value="<?= $contrato->finalizacao ?>"
                                                                   data-toggle="tooltip" data-placement="top" title="Previsão de pagamento">
                                                        </div>
                                                    </div>    
                                                </div>
                                                <div class="form-row">
                                                    <div class="col-lg-1">
                                                        <div class="form-group">
                                                            <label for="id-cliente">ID Cliente</label>
                                                            <input type="id-cliente" name="id-cliente" id="id-cliente" class="form-control form-control-sm" 
                                                                   value="<?= $contrato->id_cliente ?>" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-11">
                                                        <div class="form-group">
                                                            <label for="cliente">Cliente</label>
                                                            <input type="cliente" name="cliente" id="cliente" class="form-control form-control-sm" 
                                                                   value="<?= $contrato->nome_cliente ?>" readonly>
                                                                   
                                                        </div>
                                                    </div>                                                    
                                                </div>
                                                <div class="form-row">
                                                <div class="form-group col-lg-3 col-sm-12">
                                                        <label for="id-operacao">Operação (Tipo de Contrato)</label>
                                                        <select name="id-operacao" id="id-operacao" class="form-control form-control-sm">
                                                            <option value="<?= set_value('id-operacao', $contrato->operacao_id) ?>"><?=$contrato->descricao_operacao.' (Cadastrada)'?></option>
                                                            <?php foreach ($operacoes as $op) { ?>
                                                                <option value="<?= set_value('id-operacao', $op->id_operacao) ?>"><?= $op->descricao ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-lg-3 col-sm-12">
                                                        <label for="id-orgao">Órgão</label>
                                                        <select name="id-orgao" id="id-orgao" class="form-control form-control-sm">
                                                            <option value="<?= set_value('id-orgao', $contrato->orgao_id) ?>">
                                                                    <?=$contrato->nome_orgao.' (Cadastrado)'?>
                                                            </option>
                                                            <?php foreach ($orgaos as $orgao) { ?>
                                                                <option value="<?= set_value('id-orgao', $orgao->id_orgao) ?>"><?= $orgao->nome_orgao.' ('.$orgao->tipo_orgao.')' ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-lg-3 col-sm-12">
                                                        <label for="id-financeira">Banco (Financeira)</label>
                                                        <select name="id-financeira" id="id-financeira" class="form-control form-control-sm">
                                                            <option value="<?= set_value('id-financeira', $contrato->financeira_id) ?>">
                                                                    <?=$contrato->nome_financeira.' (Cadastrada)'?>
                                                            </option>
                                                            <?php foreach ($financeiras as $fin) { ?>
                                                                <option value="<?= set_value('id-financeira', $fin->id_financeira) ?>"><?= $fin->nome_financeira ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-lg-3 col-sm-12">
                                                        <label for="id-correspondente">Correspondente (Parceiro)</label>
                                                        <select name="id-correspondente" id="id-correspondente" class="form-control form-control-sm">
                                                            <option value="<?= set_value('id-correspondente', $contrato->correspondente_id) ?>">
                                                                <?=$contrato->nome_correspondente.' (Cadastrado)'?>
                                                            </option>
                                                            <?php foreach ($correspondentes as $correspondente) { ?>
                                                                <option value="<?= set_value('id-correspondente', $correspondente->id) ?>"><?php echo $correspondente->nome; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-lg-3 col-sm-12">
                                                        <label for="prazo">Prazo</label>
                                                        <input type="number" name="prazo" id="prazo" class="form-control form-control-sm" min="1" 
                                                               value="<?= $contrato->prazo ?>" step="1" data-toggle="tooltip" 
                                                               data-placement="top" title="Prazo do Contrato">
                                                    </div>
                                                    <div class="form-group col-lg-3 col-sm-12">
                                                        <label for="valor-total">Valor Bruto</label>
                                                        <input type="text" name="valor-total" id="valor-total" class="form-control form-control-sm valores"
                                                               value="<?= set_value('valor-total', formatar_numero($contrato->total)) ?>" placeholder="R$ 0,00">                                                    
                                                    </div>
                                                    <div class="form-group col-lg-3 col-sm-12">
                                                        <label for="valor-parcela">Valor da Parcela</label>
                                                        <input type="text" id="valor-parcela" name="valor-parcela" class="form-control form-control-sm valores"
                                                               value="<?= set_value('valor-parcela', formatar_numero($contrato->parcela)) ?>" placeholder="R$ 0,00"> 
                                                    </div>
                                                    <div class="form-group col-lg-3 col-sm-12">
                                                        <label for="valor-liquido">Valor Líquido</label>
                                                        <input type="text" id="valor-liquido"  name="valor-liquido" class="form-control form-control-sm valores" 
                                                               value="<?= set_value('valor-liquido', formatar_numero($contrato->liquido)) ?>" placeholder="R$ 0,00"> 
                                                    </div>
                                                </div><!-- end /.form-row -->
                                            </div><!-- end /.container -->                                            
                                        </div><!-- end /.card-body -->
                                    </div><!-- end /.card mb-2 -->
                                    <div class="card mb-2" style="border: 1px solid #ff00cc">
                                        <div class="card-body">
                                            <div class="container">
                                                <div class="form-row">
                                                    <div class="form-group col col-sm-12">
                                                        <label for="id-situacao">Situação</label>
                                                        <select name="id-situacao" id="id-situacao" class="form-control form-control-sm">
                                                            <option value="<?= $contrato->sistuacao_id ?>"><?= $contrato->descricao_situacao . ' (Cadastrada)' ?></option>                                                            
                                                            <?php foreach ($situacoes as $st) { ?>
                                                                <option value="<?= $st->id_situacao ?>"><?= $st->descricao ?></option>';
                                                            <?php } ?>                                                            
                                                        </select>                                                            
                                                    </div>                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card mb-2" style="border: 1px solid #ff00cc">
                                        <div class="card-body">
                                            <div class="container">
                                                <div class="form-row">
                                                    <div class="form-group col-lg-3 col-sm-12">
                                                        <label for="referente">Referência de Cálculo</label>
                                                        <select id="referente" name="referente" class="form-control form-control-sm" data-toggle="tooltip" data-placement="top" 
                                                                title="Referência de Cálculo">
                                                            <option value="<?= $contrato->referencia ?>"><?= $contrato->referencia . ' (Cadastrada)' ?></option>
                                                            <option value="LIQUIDO">Líquido</option>
                                                            <option value="TOTAL">Total</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-lg-3 col-sm-12">
                                                        <label for="tabelac">Tabela</label>
                                                        <input type="text" name="tabelac" id="tabelac" class="form-control form-control-sm" 
                                                               value="<?= $contrato->tabela ?>">                                                                                                                        
                                                    </div>
                                                    <?php if ($nvl == 'ROLE_ADMIN') { ?>
                                                        <div class="form-group col-lg-3 col-sm-12">
                                                            <label for="valor-percentual">Percentual(%)</label>
                                                            <input type="text" id="valor-percentual" name="valor-percentual" class="form-control form-control-sm valor" 
                                                                value="<?= set_value('valor-percentual', formatar_numero($contrato->percentual)) ?>" placeholder="0.0" onblur="aosair()"
                                                                style="text-align:right"> 
                                                        </div>
                                                        <div class="form-group col-lg-3 col-sm-12">
                                                            <label for="valor-comissao">Valor Comissão</label>
                                                            <input type="text" id="valor-comissao" name="valor-comissao" class="form-control form-control-sm valores" 
                                                                value=" <?= set_value('valor-comissao', formatar_numero($contrato->comissao)) ?>" placeholder="0.0"> 
                                                        </div>
                                                    <?php } ?>
                                                </div><!-- end /.form-row -->
                                            </div><!-- end /.container -->                                            
                                        </div><!-- end /.card-body -->
                                    </div><!-- end /.card mb-2 -->
                                    <div class="card mb-2" style="border: 1px solid #ff00cc">
                                        <div class="card-body">
                                            <div class="container">
                                                <div class="form-row">
                                                    <label for="observacoes">Observações</label>
                                                    <textarea class="form-control form-control-sm" rows="5" 
                                                              name="observacoes" id="observacoes"><?= $contrato->observacoes ?></textarea>
                                                    <span>Campo reservado para observacoes</span>
                                                </div><!-- end /.form-row -->
                                            </div><!-- end /.container -->                                            
                                        </div><!-- end /.card-body -->
                                    </div><!-- end /.card mb-2 -->
                                </div>
                                <!-- /div.container.card-body -->
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
                        <input type="hidden" name="pid" id="pid" value="<?= sha1($contrato->pid) ?>">                          
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
