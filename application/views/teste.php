<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?= base_url('assets/bootstrap/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/dataTables/Buttons-1.6.5/css/buttons.bootstrap4.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/dataTables/css/dataTables.jqueryui.min.css') ?>">
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="form-inline">
                    <div class="form-group">
                        <label for="userid">Agente</label>
                        <select name="userid" id="userid" class="form-control" aria-describedby="helpId">
                            <option value="1">Selecione</option>
                            <option value="1">Elenaldo</option>
                            <option value="3">Jussara</option>
                        </select>
                        <small id="helpId" class="text-muted">Selecione agente</small>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <table id="vendas" class="table table-striped table-bordered" style="width: 100%">
                    <thead>
                        <tr>
                            <th>Digitação</th>
                            <th>Liberação</th>
                            <th>Cliente</th>
                            <th>CPF</th>
                            <th>Órgão</th>
                            <th>Financeira</th>
                            <th>Operação</th>
                            <th>Correspondente</th>
                            <th>Valor Total</th>
                            <th>Valor Líquido</th>
                            <th>Percentual</th>
                            <th>Base Cálculo</th>
                            <th>Valor comissão</th>
                            <th>Situação</th>
                            <th>Agente</th>
                            <th>Usuário</th>
                            <th>#</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>

    <script src="<?= base_url('assets/jquery/jquery-3.4.1.min.js') ?>"></script>
    <script src="<?= base_url('assets/dataTables/dataTables-1.10.23/js/jquery.dataTables.min.js') ?>"></script>
    <script>
        $(document).ready(function() {
            
            $('#userid').change(function() {

                var userid = $("#userid").val();

                $.post('<?= base_url('comissoes/search') ?>', {userid: userid}, function(userid) {

                    $('#vendas').dataTable({
                        "language": {
                            url: 'https://cdn.datatables.net/plug-ins/1.10.25/i18n/Portuguese-Brasil.json'
                        },
                        "data": userid,
                        "columns": [{
                                "data": "dt_digitacao"
                            },
                            {
                                "data": "dt_liberacao"
                            },
                            {
                                "data": "nome_cliente"
                            },
                            {
                                "data": "cpf_cliente"
                            },
                            {
                                "data": "orgao_cliente"
                            },
                            {
                                "data": "instituicao_financeira"
                            },
                            {
                                "data": "tipo_contrato"
                            },
                            {
                                "data": "nome_correspondente"
                            },
                            {
                                "data": "soma_total"
                            },
                            {
                                "data": "soma_liquido"
                            },
                            {
                                "data": "percentual_comissao"
                            },
                            {
                                "data": "base_calculo"
                            },
                            {
                                "data": "valor_comissao"
                            },
                            {
                                "data": "status_contrato"
                            },
                            {
                                "data": "user_nome"
                            },
                            {
                                "data": "user_login"
                            },
                            {
                                "data": "user_id"
                            },
                        ]
                    });
                    
                }, 'json');
                userid = 0;
            });
        });
    </script>
</body>

</html>