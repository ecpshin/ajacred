<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Página de Erro</title>

  <link rel="stylesheet" href="<?= base_url('assets/bootstrap/css/bootstrap.min.css')?>"><
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?= base_url('assets/fontawesome-free/css/all.css')?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('assets/css/adminlte.min.css')?>">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="alert alert-warning" role="alert">
                    <h1 class="text-center">Atenção! Aconteceu um erro no sistema.</h1>
                    <hr>
                    <p class="text-center" style="font-size: 30px"><?=$type?>, decorrente por uma ação ilegal ou
                        um erro inesperado.</p>
                    <p class="text-center" style="font-size: 30px">Caso o erro persista entre em contato com o administrador do sistema</p>
                    <hr>
                    <a href="<?= base_url('pages')?>" class="btn btn-primary btn-block" role="button" style="font-size: 20px; text-decoration: none">
                        <i class="mr-3 fas fa-home" style="font-size: 30px"></i>
                        Clique aqui para retornar a página principal
                    </a>
                </div>
            </div>            
        </div>
    </div>
</div>
</body>
</html>
  