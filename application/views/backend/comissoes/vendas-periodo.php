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
                        <li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?= base_url('comissoes/vendas_periodo') ?>"><?= $view ?></a></li>
                        <li class="breadcrumb-item active"><?= $page ?></li>
                    </ol>
                </div>
            </div>
            <?php if (is_null($comissoes)) { ?>
                <div class="row mb-2">
                    <div class="container">
                        <form action="<?= base_url('comissoes/vendas_periodo') ?>" method="post">
                            <div class="col-12">
                                <div class="form-row">
                                    <div class="form-group col-3">
                                        <Label>Data de Início</Label>
                                        <input type="date" name="inicio" id="inicio" class="form-control form-control-sm" title="Data inicial">
                                    </div>                                    
                                    <div class="form-group col-3">
                                        <label for="agente">Agente (Usuário)</label>
                                        <select name="agente" id="agente" class="form-control form-control-sm" title="Agente (Usuário)">
                                            <option value="1">Selecione agente</option>
                                            <?php
                                            foreach ($agentes as $user) { ?>
                                                <option value="<?=$user->user_id?>"><?=$user->user_nome?></option>;
                                            <?php }  ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="btn-group disabled">
                                    <input type="submit" name="pesquisar" value="Pesquisar" class="btn btn-success mr-2">
                                    <input type="reset" name="limpar" value="Cancelar" class="btn btn-danger">
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /.container -->
                </div>
            <?php } ?>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- Main content -->
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
                            <a href="<?= base_url('comissoes/vendas_periodo') ?>" class="btn btn-default float-right">
                                <i class="far fa-hand-point-right nav-icon"></i>
                                Clique aqui para uma nova pesquisa
                            </a>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <table data-page-length="10" class="table table-striped" id="tabela" style="width: 100%">
                                        <thead>
                                            <tr>
                                                <th>Digitado</th>
                                                <th>Liberado</th>
                                                <th>Cliente</th>
                                                <th>CPF</th>
                                                <th>Vendas</th>
                                                <th>Financeira</th>
                                                <th>Operação</th>
                                                <th>Total(R$)</th>
                                                <th>Líquido</th>
                                                <th>B Calc</th>
                                                <th>%</th>
                                                <th>Comissão</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $bruto = 0.0;
                                            $liquido = 0.0;
                                            $total_comissao = 0.0;
                                            if (isset($comissoes)) {
                                                foreach ($comissoes as $comissao) {
                                                    $bruto += $comissao->soma_total;
                                                    $liquido += $comissao->soma_liquido;
                                                    $total_comissao += $comissao->valor_comissao;
                                            ?>
                                            <tr style="font-size: 12px">
                                                        <td><?= formata_data($comissao->digitacao) ?></td>
                                                        <td><?= formata_data($comissao->finalizacao) ?></td>
                                                        <td><?= $comissao->nome_cliente ?></td>
                                                        <td><?= $comissao->cpf_cliente ?></td>
                                                        <td><?= $comissao->nr_vendas ?></td>
                                                        <td><?= $comissao->nome_financeira ?></td>
                                                        <td><?= $comissao->descricao_operacao ?></td>
                                                        <td>R$ <?= formatar_numero($comissao->soma_total) ?></td>
                                                        <td>R$ <?= formatar_numero($comissao->soma_liquido) ?></td>
                                                        <td><?= $comissao->referencia_calculo ?></td>
                                                        <td><?= $comissao->percentual_comissao ?>%</td>
                                                        <td>R$ <?= formatar_numero($comissao->valor_comissao) ?></td>
                                                    </tr>
                                            <?php } ?>
                                                    <tr>
                                                        <td>ZTOTAL</td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td><?= formatar_numero($bruto) ?></td>
                                                        <td><?= formatar_numero($liquido) ?></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td><?= formatar_numero($total_comissao) ?></td>
                                                    </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            
                        </div>
                        <!-- /.card-body -->

                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->