<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-ajacred elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo base_url('admin') ?>" class="brand-link">
        <img src="<?php echo base_url('assets/img/logo_app.png') ?>"
             alt="AJACRED Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">Ajacred Consignado</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?php echo base_url($this->session->userdata('pretorian')->user_img) ?>" 
                     class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="<?= base_url('profile/' . $this->session->userdata('pretorian')->user_id); ?>" 
                   class="d-block"><?php echo $this->session->userdata('pretorian')->user_nome ?></a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-header mb-2">
                    <i class="fas fa-cogs nav-icon" style="font-size: 18px"></i>
                    <span class="ml-2"style="font-size: 14px">Gerenciamento</span>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link active">
                        <i class="fas fa-users-cog nav-icon"></i>
                        <p>Clientes
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('cliente/novo') ?>" class="nav-link" 
                               data-toggle="tooltip" data-placement="top" title="Sem formulário para contrato">
                                <i class="fas fa-user-plus nav-icon"></i>
                                <p>Cadastrar Cliente</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('cliente/gerenciar/'. sha1(0)) ?>" class="nav-link">
                                <i class="fas fa-file-invoice-dollar nav-icon"></i>
                                <p>Contratos de Cliente</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('clientes/info-basic') ?>" class="nav-link">
                                <i class="fas fa-info-circle nav-icon"></i>
                                <p>Informações Básicas</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('clientes') ?>" class="nav-link">
                                <i class="fas fa-search nav-icon"></i>
                                <p>Clientes Cadastrados</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link active">
                        <i class="fas fa-file-invoice-dollar nav-icon"></i>
                        <p>
                            Contratos
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('contratos/novo') ?>" class="nav-link">
                                <i class="fas fa-hand-holding-usd nav-icon"></i>
                                <p>Formulário Simples</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('contratos/pesquisar') ?>" class="nav-link">
                                <i class="fas fa-search-dollar nav-icon"></i>
                                <p>Pesquisar</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('contratos') ?>" class="nav-link">
                                <i class="fas fa-clipboard-list nav-icon"></i>
                                <p>Todos</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('contratos/exemploum') ?>" class="nav-link">
                                <i class="fas fa-filter nav-icon"></i>
                                <p>Lista</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link active"><i class="fas fa-dollar-sign nav-icon"></i>
                        <p>Comissões <i class="fas fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('relatorio') ?>" class="nav-link">
                                <i class="fas fa-hand-holding-usd nav-icon"></i>
                                <p>Ajustar Comissões</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('comissoes/pesquisar') ?>" class="nav-link">
                                <i class="fas fa-search-dollar nav-icon"></i>
                                <p>Pesquisar</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('comissoes') ?>" class="nav-link">
                                <i class="far fa-file-alt nav-icon"></i>
                                <p>Relatório</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-random"></i>
                        <p>Dependências <i class="fas fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link active">
                                <i class="fas fa-landmark nav-icon"></i>
                                <p>Instituição Financeira <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?php echo base_url('financeira/nova') ?>" class="nav-link">
                                        <i class="fas fa-file-alt nav-icon"></i>
                                        <p>Novo</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo base_url('financeiras') ?>" class="nav-link">
                                        <i class="fas fa-search nav-icon"></i>
                                        <p>Pesquisar</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link active">
                                <i class="fas fa-archway nav-icon"></i>
                                <p>Órgãos <i class="fas fa-angle-left right"></i></p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a class="nav-link" href="<?= base_url('orgaos/novo') ?>">
                                        <i class="fa fa-file nav-icon"></i>
                                        <p>Novo</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?= base_url('orgaos') ?>">
                                        <i class="fas fa-search nav-icon"></i>
                                        <p>Pesquisar</p></a>
                                </li>
                            </ul>
                        </li>                        
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link active">
                            <i class="fas fa-chart-line nav-icon mr-2"></i>
                                <p>Operações <i class="fas fa-angle-left right"></i></p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a class="nav-link" href="<?= base_url('operacoes/nova') ?>">
                                    <i class="fa fa-file nav-icon mr-2"></i>
                                        <p>Nova</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?= base_url('operacoes') ?>">
                                        <i class="fas fa-search nav-icon"></i>
                                        <p>Pesquisar</p></a>
                                </li>
                            </ul>
                        </li>                        
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link active">
                                <i class="fas fa-ring nav-icon"></i>
                                <p>Estado Civil <i class="fas fa-angle-left right"></i></p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?= base_url('estadoscivil/novo') ?>" class="nav-link">
                                        <i class="fas fa-file-alt nav-icon"></i>
                                        <p>Novo</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('estadoscivil') ?>" class="nav-link">
                                        <i class="fas fa-search nav-icon"></i>
                                        <p>Pesquisar</p>
                                    </a>
                                </li>
                            </ul>  
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link active">
                                <i class="fas fa-folder-open nav-icon"></i>
                                <p>Status (Situação) <i class="fas fa-angle-left right"></i></p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?= base_url('situacao/nova') ?>" class="nav-link">
                                        <i class="fas fa-file-alt nav-icon"></i>
                                        <p>Novo</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('situacoes') ?>" class="nav-link">
                                        <i class="fas fa-search nav-icon"></i>
                                        <p>Pesquisar</p>
                                    </a>
                                </li>
                            </ul>  
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link active">
                                <i class="far fa-handshake nav-icon"></i>
                                <p>Correspondente <i class="fas fa-angle-left right"></i></p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?= base_url('correspondente/novo') ?>" class="nav-link">
                                        <i class="fas fa-file-alt nav-icon"></i>
                                        <p>Novo</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('correspondentes') ?>" class="nav-link">
                                        <i class="fas fa-search nav-icon"></i>
                                        <p>Pesquisar</p>
                                    </a>
                                </li>
                            </ul>  
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link active">
                                <i class="fas fa-chalkboard-teacher nav-icon"></i>
                                <p>Usuários <i class="fas fa-angle-left right"></i></p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?= base_url('usuario/novo') ?>" class="nav-link">
                                        <i class="fas fa-user-lock nav-icon"></i>
                                        <p>Novo</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('usuarios') ?>" class="nav-link">
                                        <i class="fas fa-search nav-icon"></i>
                                        <p>Pesquisar</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>                          
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>