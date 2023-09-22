defined('BASEPATH') OR exit('Não é permitido acesso direto ao script!');
if(!$this->session->userdata('loggedin') && 
!strcmp($this->session->userdata('pretorian')->user_nivel, 'ROLE_ADMIN'))
{
redirect(base_url('autenticacao'));
}
<div class="row">
    <div class="col">
        <?= validation_errors('<div class="alert alert-warning">', '</div>'); ?>
        <form action="<?= base_url('bancos/salvar') ?>" method="post">
            <div class="form-group">
                <label for="txt-banco">Banco</label>
                <input id="txt-banco" name="txt-banco" type="text" value="" 
                       class="form-control" placeholder="Nome do Banco">
            </div>
            <div class="form-group">
                <label for="txt-tipo">Tipo do Banco</label>
                <select id="txt-tipo" name="txt-tipo" class="custom-select">
                    <option value="BANCO">Selecione...</option>
                    <option value="BANCO">BANCO</option>
                    <option value="COOPERATIVA">COOPERATIVA</option>
                    <option value="FINANCEIRA">FINANCEIRA</option>
                    <option value="SEGURADORA">SEGURADORA</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary" role="button">
                <i class="fas fa-save"></i>
                Cadastrar
            </button>
        </form>
    </div>
</div>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.23/b-1.6.5/b-flash-1.6.5/b-html5-1.6.5/datatables.min.js"></script>

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
                        <li class="breadcrumb-item"><a href="<?= base_url('bancos') ?>"><?= $view ?></a></li>
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
                                    <div class="col-12">
                                        <table data-page-length="5"  class="table table-striped table-bordered table-sm" id="tabela">
                                            <thead>
                                                <tr>
                                                    <th colspan="4" class="text-center text-light bg-pink">Bancos Cadastrados</th>
                                                </tr>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Banco</th>
                                                    <th>Tipo</th>
                                                    <th>&nbsp;</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $id=0; foreach ($tabela as $cliente) { ?>
                                                    <tr>
                                                        <td><?=++$id ?></td>                              
                                                        <td><?=$cliente->nome ?></td>
                                                        <td><?=$cliente->cpf ?></td>
                                                        <td><?=$cliente->rg ?></td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>                                    
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
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