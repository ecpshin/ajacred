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
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-warning float-right" data-toggle="modal" data-target="#exampleModal">
                                Consultar Cliente
                            </button>
                        </div>
                        <div class="card-body" style="padding: 5px 2px">
                            <?php echo validation_errors(
                                '<div class="alert alert-warning">',
                                '<a href="' . base_url('contratos/novo')
                                    . '" class="alert-link">Clique aqui para retornar</a>'
                                    . '</div>'
                            ) ?>

                            <form action="<?= base_url('contratos/lancar') ?>" method="post">
                                <div class="container">
                                    <div class="card mb-2" style="border: 1px solid #ff00cc">
                                        <div class="card-body">
                                            <div class="container">
                                                <div class="form-row">
                                                    <div class="col-lg-2">
                                                        <div class="form-group">
                                                            <label for="controle">Usuário</label>
                                                            <select name="user-id" class="form-control form-control-sm">
                                                                <?php $logado = $this->session->userdata('pretorian')->user_id; 
                                                                    foreach ($usuarios as $usuario) { ?>
                                                                   <option value="<?= $usuario->user_id ?>" <?= ($logado==$usuario->user_id) ? 'selected' : '' ?> >
                                                                       <?= ($logado==$usuario->user_id) ? $usuario->user_login.'(Padrão)' : $usuario->user_login ?>
                                                                   </option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <div class="form-group">
                                                            <label for="controle">NR Controle</label>
                                                            <input type="text" name="controle" id="controle" class="form-control form-control-sm" value="<?= set_value('controle', 'AJC' . date('Ymd') . mt_rand(0, 99999) . '-' . $this->session->userdata('pretorian')->user_id) ?>" data-toggle="tooltip" data-placement="top" title="NR Controle" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <div class="form-group">
                                                            <label for="nrcontrato">NR Contrato</label>
                                                            <input type="text" name="nrcontrato" id="nrcontrato" class="form-control form-control-sm" value="<?= set_value('nrcontrato', '0000000000') ?>" required="true" placeholder="NR Contrato" data-toggle="tooltip" data-placement="top" title="NR Contrato">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <div class="form-group">
                                                            <label for="digitado">Data de Digitação</label>
                                                            <input type="date" name="digitado" id="digitado" class="form-control form-control-sm" value="<?= set_value('digitado') ?>" data-toggle="tooltip" data-placement="top" title="Data da digitação">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <div class="form-group">
                                                            <label for="previsto">Data de Previsão</label>
                                                            <input type="date" name="previsto" id="previsto" class="form-control form-control-sm" value="<?= set_value('previsto') ?>" data-toggle="tooltip" data-placement="top" title="Previsão de pagamento">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="col-lg-2">
                                                        <div class="form-group">
                                                            <label for="search">CPF</label>
                                                            <input id="search" type="text" name="search" class="form-control form-control-sm cpf" value="">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-1">
                                                        <div class="form-group">
                                                            <label for="id-cliente">ID Cliente</label>
                                                            <input type="text" name="id-cliente" id="id-cliente" readonly class="form-control form-control-sm" value="" placeholder="ID">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-9">
                                                        <div class="form-group">
                                                            <label for="cliente">Cliente</label>
                                                            <input type="text" name="cliente" id="cliente" readonly class="form-control form-control-sm" value="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-lg-3 col-sm-12">
                                                        <label for="id-operacao">Operação (Tipo de Contrato)</label>
                                                        <select name="id-operacao" id="id-operacao" class="form-control form-control-sm">
                                                            <option value="<?= set_value('id-operacao', 'NOVO') ?>">Selecione Operação</option>
                                                            <?php foreach ($operacoes as $op) { ?>
                                                                <option value="<?= set_value('id-operacao', $op->id_operacao) ?>"><?= $op->descricao ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-lg-3 col-sm-12">
                                                        <label for="id-orgao">Órgão</label>
                                                        <select name="id-orgao" id="id-orgao" class="form-control form-control-sm">
                                                            <option value="<?= set_value('id-orgao', 1) ?>">Selecione Órgão</option>
                                                            <?php foreach ($orgaos as $orgao) { ?>
                                                                <option value="<?= set_value('id-orgao', $orgao->id_orgao) ?>"><?= $orgao->nome_orgao.' ('.$orgao->tipo_orgao.')' ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-lg-3 col-sm-12">
                                                        <label for="id-financeira">Banco (Financeira)</label>
                                                        <select name="id-financeira" id="id-financeira" class="form-control form-control-sm">
                                                            <option value="<?= set_value('id-financeira') ?>">Selecione Financeira</option>
                                                            <?php foreach ($financeiras as $fin) { ?>
                                                                <option value="<?= set_value('id-financeira', $fin->id_financeira) ?>"><?= $fin->nome_financeira ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-lg-3 col-sm-12">
                                                        <label for="id-correspondente">Correspondente (Parceiro)</label>
                                                        <select name="id-correspondente" id="id-correspondente" class="form-control form-control-sm">
                                                            <option value="<?= set_value('id-correspondente', 1) ?>">Selecione Correspondente</option>
                                                            <?php foreach ($correspondentes as $correspondente) { ?>
                                                                <option value="<?= set_value('id-correspondente', $correspondente->id) ?>"><?php echo $correspondente->nome; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-lg-3 col-sm-12">
                                                        <label for="prazo">Prazo</label>
                                                        <input type="number" name="prazo" id="prazo" class="form-control form-control-sm" min="1" value="<?= set_value('prazo', 1) ?>" step="1" data-toggle="tooltip" data-placement="top" title="Prazo do Contrato">
                                                    </div>
                                                    <div class="form-group col-lg-3 col-sm-12">
                                                        <label for="valor-total">Valor Bruto</label>
                                                        <input type="text" name="valor-total" id="valor-total" data-allow-zeros="true" 
                                                               data-prefix="R$ " data-affixes-stay="true" data-thousands="." data-decimal="," 
                                                               class="form-control form-control-sm valor" value="<?= set_value('valor-total', 0.0) ?>" placeholder="0,00">
                                                    </div>
                                                    <div class="form-group col-lg-3 col-sm-12">
                                                        <label for="parcela">Valor da Parcela</label>
                                                        <input type="text" id="valor-parcela" name="valor-parcela" data-allow-zeros="true" 
                                                               data-affixes-stay="true" data-prefix="R$ " data-thousands="." data-decimal="," 
                                                               class="form-control form-control-sm valor" value="<?= set_value('valor-parcela', 0.0) ?>" placeholder="0,00">
                                                    </div>
                                                    <div class="form-group col-lg-3 col-sm-12">
                                                        <label for="valor-liquido">Valor Líquido</label>
                                                        <input type="text" id="valor-liquido" name="valor-liquido" data-allow-zeros="true" 
                                                               data-affixes-stay="true" data-prefix="R$ " data-thousands="." data-decimal=","
                                                               class="form-control form-control-sm valor" value="<?= set_value('valor-liquido', 0.0) ?>" placeholder="0,00">
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
                                                            <option value="<?= set_value('id-situacao', 'EM ANALISE') ?>">Situação do contrato</option>
                                                            <?php foreach ($situacoes as $st) { ?>
                                                                <option value="<?= set_value('id-situacao', $st->id_situacao) ?>"><?= $st->descricao ?></option>';
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
                                                        <select id="referente" name="referente" class="form-control form-control-sm" 
                                                                data-toggle="tooltip" data-placement="top" title="Referência de Cálculo">
                                                            <option value="LIQUIDO">Selecione...</option>
                                                            <option value="LIQUIDO">Líquido</option>
                                                            <option value="TOTAL">Total</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-lg-3 col-sm-12">
                                                        <label for="tabelac">Tabela</label>
                                                        <input type="text" name="tabelac" id="tabelac" class="form-control form-control-sm" value="<?= set_value('tabelac', 'NORMAL') ?>">
                                                    </div>
                                                    <?php if ($this->session->userdata('pretorian')->user_nivel == 'ROLE_ADMIN') { ?>
                                                        <div class="form-group col-lg-3 col-sm-12">
                                                            <label for="valor-percentual">Percentual(%)</label>
                                                            <input type="text" id="valor-percentual" name="valor-percentual" 
                                                                   class="form-control form-control-sm valor" value="<?= set_value('percentual', 0.0) ?>" 
                                                                   placeholder="0,00" onblur="aosair()">
                                                        </div>
                                                        <div class="form-group col-lg-3 col-sm-12">
                                                            <label for="valor-comissao">Valor Comissão</label>
                                                            <input type="text" id="valor-comissao" name="valor-comissao" data-allow-zeros="true" 
                                                               data-affixes-stay="true" data-prefix="R$ " data-thousands="." data-decimal=","
                                                                   class="form-control form-control-sm valor" value="<?= set_value('comissao', 0.0) ?>" placeholder="R$ 0,00">
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
                                                    <textarea class="form-control form-control-sm" rows="5" name="observacoes" id="observacoes"><?php echo set_value('observacoes', null); ?></textarea>
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
                        <!--
                            <input type="hidden" class="form-control form-control-sm" name="user-id" id="user-id" value="$this->session->userdata('pretorian')->user_id"> 
                        -->

                        </form>
                        <!-- /end form -->
                    </div>
                    <!-- /.card-principal -->
                </div>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Lista de Clientes Cadastrados</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <table data-page-length="5" id="geral" class="table nowrap table-striped">
                                <thead>
                                    <tr>
                                        <th>Nome</th>
                                        <th>CPF</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($clientesdb as $c) { ?>
                                        <tr>
                                            <td><?= $c->nome ?></td>
                                            <td><?= $c->cpf ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->