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
                        <li class="breadcrumb-item"><a href="<?= base_url('comissoes') ?>"><?= $view ?></a></li>
                        <li class="breadcrumb-item active"><?= $page ?></li>
                    </ol>
                </div>
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
                    <div class="card">
                        <div class="card-header" style="background-color: #ff3333">
                            <h3 class="card-title text-light">
                                <i class="fas fa-landmark nav-icon"></i>
                                <?php echo $page ?>
                            </h3>
                            <a href="<?= base_url('comissoes/vendas') ?>" class="btn btn-default float-right">
                                <i class="far fa-hand-point-right nav-icon"></i>
                                Clique aqui para um novo contrato
                            </a>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-1g-12">
                                    <table class="table table-striped w-100" id="tabela">
                                        <thead>
                                            <tr>
                                                <th>Cliente</th>
                                                <th>CPF</th>
                                                <th>Financeira</th>
                                                <th>Correspondente</th>
                                                <th>Vendas</th>
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

                                            foreach ($comissoes as $comissao) {
                                                $bruto += $comissao->soma_total;
                                                $liquido += $comissao->soma_liquido;
                                                $total_comissao += $comissao->valor_comissao;
                                                ?>
                                                <tr>
                                                    <td><?= $comissao->nome_cliente ?></td>
                                                    <td><?= $comissao->cpf_cliente ?></td>
                                                    <td><?= $comissao->nome_financeira ?></td>
                                                    <td><?= $comissao->nome_correspondente ?></td>
                                                    <td><?= $comissao->nr_vendas ?></td>
                                                    <td><?= $comissao->descricao_operacao ?></td>
                                                    <td><?= formatar_numero($comissao->soma_total) ?></td>
                                                    <td><?= formatar_numero($comissao->soma_liquido) ?></td>
                                                    <td><?= $comissao->referencia_calculo ?></td>
                                                    <td><?= $comissao->percentual_comissao ?>%</td>
                                                    <td><?= formatar_numero($comissao->valor_comissao) ?></td>
                                                </tr>
                                            <?php } ?>
                                            <tr>
                                                <td>ZTOTAL</td>
                                                <td>.</td>
                                                <td>.</td>
                                                <td>.</td>
                                                <td>.</td>
                                                <td>.</td>
                                                <td style="font-weight: bold"><?= formatar_numero($bruto) ?></th>
                                                <td style="font-weight: bold"><?= formatar_numero($liquido) ?></th>
                                                <td>.</td>
                                                <td>.</td>
                                                <td style="font-weight: bold"><?= formatar_numero($total_comissao) ?></th>
                                            </tr>
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