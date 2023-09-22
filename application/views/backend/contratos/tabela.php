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
                    <form action="<?= base_url('contratos/exemploum') ?>" method="post">
                        <div class="col-12">
                            <div class="form-row">
                                <div class="form-group col-3">
                                    <Label>Data inicial</Label>
                                    <input type="date" name="inicio" id="inicio" class="form-control" title="Data inicial">
                                </div>                                
                                <div class="form-group col-3">
                                    <label for="operacao">Operação</label>
                                    <select name="id-operacao" id="operacao" class="form-control" title="Operação">
                                        <option value="1">Selecione a operação</option>
                                        <?php
                                        foreach ($operacoes as $operacao) {
                                            printf("<option value='%d'>%s</option>\n", 
                                                    $operacao->id_operacao, 
                                                    $operacao->descricao);
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group col-3">
                                    <label for="agente">Agente (Usuário)</label>
                                    <select name="agente" id="agente" class="form-control" title="Agente (Usuário)">
                                        <option value="1">Selecione agente</option>
                                        <?php
                                        foreach ($agentes as $user) { ?>
                                            <option value="<?=$user->user_id?>"><?=$user->user_nome?></option>;
                                        <?php } ?>
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
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- Default box -->
                    <?php if(isset($comissoes)){ ?>    
                    <div class="card">
                        <div class="card-header" style="background-color: #ff3333">
                            <h3 class="card-title text-light">
                                <i class="fas fa-landmark nav-icon"></i>
                                <?php echo $page ?>
                            </h3>
                            <a href="<?= base_url('contratos/exemploum') ?>" class="btn btn-default float-right">
                                <i class="far fa-hand-point-right nav-icon"></i>
                                Clique aqui para uma nova pesquisa
                            </a>
                        </div>
                        <div class="card-body" style="padding: 2px">
                            <div class="card-text text-sm">
                                <div class="row">
                                    <div class="col-lg-12">
                                        
                                    <table data-page-length="15" class="table table-striped" id="tabela">
                                        <thead>
                                            <tr>
                                                <th>Cliente</th>
                                                <th>CPF</th>
                                                <th>Nrº Contrato</th>
                                                <th>Financeira</th>
                                                <th>Correspondente</th>
                                                <th>Vendas</th>
                                                <th>Operação</th>
                                                <th>Total</th>
                                                <th>Líquido</th>
                                                <th>B Calc</th>
                                                <th>%</th>
                                                <th>Comissão</th>
                                                <th>Usuário</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $bruto = 0.0;
                                            $liquido = 0.0;
                                            $total_comissao = 0.0;

                                            foreach ($comissoes as $comissao) {
                                                $bruto += $comissao->soma_total;
                                                $liquido += $comissao->soma_liquido;
                                                $total_comissao += $comissao->valor_comissao;
                                                ?>
                                                <tr>
                                                    <td><?= $comissao->nome_cliente ?></td>
                                                    <td><?= $comissao->cpf_cliente ?></td>
                                                    <td><?= $comissao->nrcontrato ?></td>
                                                    <td><?= $comissao->nome_financeira ?></td>
                                                    <td><?= $comissao->nome_correspondente ?></td>
                                                    <td><?= $comissao->nr_vendas ?></td>
                                                    <td><?= $comissao->descricao_operacao ?></td>
                                                    <td>R$ <?= formatar_numero($comissao->soma_total) ?></td>
                                                    <td>R$ <?= formatar_numero($comissao->soma_liquido) ?></td>
                                                    <td><?= $comissao->referencia_calculo ?></td>
                                                    <td><?= $comissao->percentual_comissao ?> %</td>
                                                    <td>R$ <?= formatar_numero($comissao->valor_comissao) ?></td>
                                                    <td><?= $comissao->user_login ?></td>
                                                </tr>
                                            <?php } ?>
                                            <tr>
                                                <td>ZTOTAL</td>
                                                <td>.</td>
                                                <td>.</td>
                                                <td>.</td>
                                                <td>.</td>
                                                <td>.</td>
                                                <td>.</td>
                                                <td style="font-weight: bold">R$ <?= formatar_numero($bruto) ?></td>                                                
                                                <td style="font-weight: bold">R$ <?= formatar_numero($liquido) ?></td>
                                                <td>.</td>
                                                <td>.</td>
                                                <td style="font-weight: bold">R$ <?= formatar_numero($total_comissao) ?></td>
                                                <td></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                        
                                                
                                    </div>
                                </div>
                            </div>
                       </div>
                       <!-- /.card-body -->
                        <div class="card-footer">
                                    <?php echo 'Hoje: ' . date('d/m/Y'); ?>
                        </div>
                        <!-- /.card-footer-->
                    </div>
                    <!-- /.card -->
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->