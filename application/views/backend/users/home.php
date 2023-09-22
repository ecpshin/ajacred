
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
                        <li class="breadcrumb-item"><a href="<?= base_url('admin') ?>"><?= $view ?></a></li>
                        <li class="breadcrumb-item active"><?= $subtitulo ?></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <?php foreach($informacoes as $infos) {?>
                <div class="col-lg-3 col-sm-12">
                    <!-- small card -->
                    <div class="small-box <?= getcolor($infos->id_situacao)?>">
                        <div class="inner">
                            <h3><?=$infos->soma?></h3>

                            <p><?='Contratos '.$infos->descricao?></p>
                        </div>
                        <div class="icon">
                            <i class="<?= loadicon($infos->id_situacao)?>"></i>
                        </div>
                        <a href="<?= base_url('contratos')?>" class="small-box-footer">
                            Mais informações <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                <?php } ?>
            </div>
            <div class="row">
                <div class="col-12">
                    <!-- Default box -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Tela de boas vindas</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                    <i class="fas fa-minus"></i></button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                                    <i class="fas fa-times"></i></button>
                            </div>
                        </div>
                        <div class="card-body">
                            <h4><?= saudacao() ?> Seja bem-vindo(a) <?= $this->session->userdata('pretorian')->user_nome ?></h4>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <h6 class="text-dark">Hoje é <?= dataAtual() ?></h6>
                        </div>
                        <!-- /.card-footer-->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<script>
    $("#cpf").blur(function(){
        
    });
</script>