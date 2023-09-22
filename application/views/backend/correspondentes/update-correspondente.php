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
                        <li class="breadcrumb-item"><a href="<?= base_url('correspondentes') ?>"><?= $view ?></a></li>
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
                            <div class="container">
                                <div class="row">
                                    <div class="col">
                                        <?= validation_errors('<div class="alert alert-warning">', '</div>'); ?>
                                        <form action="<?= base_url('correspondentes/atualizar') ?>" method="post">
                                            <?php foreach ($objs as $obj) {?>
                                            <div class="form-group">
                                                <label for="nome">Nome do Correspondente</label>
                                                <input type="text" name="nome" id="nome" value="<?=set_value('nome', $obj->nome) ?>" 
                                                       class="form-control" placeholder="Nome do Correspondente">
                                                <span class="text-muted">Nome da empresa ou pessoal</span>       
                                            </div>
                                            <div class="form-group">
                                                <label for="incricao">Inscrição nº</label>
                                                <input type="text" name="inscricao" id="inscricao" class="form-control" 
                                                       value="<?= set_value('inscricao', $obj->inscricao) ?>" placeholder="CPF|CNPJ" title="Somente números">
                                                <span class="text-muted">Utilizar CPF se Pessoa Física|CNPJ se Empresa</span>
                                            </div>
                                            <div class="form-group">
                                                <label for="email">E-mail</label>
                                                <input type="email" name="email" id="email" class="form-control" 
                                                       value="<?= set_value('email', $obj->email) ?>" placeholder="E-mail" />
                                                <span class="text-muted">Utilizar CPF se Pessoa Física|CNPJ se Empresa</span>
                                            </div>
                                            <div class="form-group">
                                                <label for="phone">Contato</label>
                                                <input type="tel" name="phone" id="phone" class="form-control" 
                                                       value="<?= set_value('phone', $obj->phone) ?>" placeholder="Celular" />
                                                <span class="text-muted"><i class="fab fa-whatsapp"></i> Telefone para contato</span>
                                            </div>
                                            <input type="hidden" name="id" id="id" value="<?= set_value('id', $obj->id)?>">
                                            <?php } ?>
                                            <button type="submit" class="btn btn-success" role="button">
                                                <i class="fas fa-save nav-icon mr-1"></i>
                                                <span>Atualizar</span>
                                            </button>
                                        </form>
                                        <!-- end form -->
                                    </div>
                                </div>
                                <!-- end .row -->                                
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
