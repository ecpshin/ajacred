<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-ajacred elevation-4">
    <!-- Brand Logo -->
    <a href="<?= base_url('admin') ?>" class="brand-link">
        <img src="<?php echo base_url('assets/img/logo_ajacred.png') ?>" alt="Ajacred Logo" 
             class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">AJACRED</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?php echo base_url($this->session->userdata('pretorian')->user_img) ?>" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="<?= base_url('profile/' . $this->session->userdata('pretorian')->user_id) ?>" class="d-block">
                    <?= $this->session->userdata('pretorian')->user_nome ?></a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-header mb-2">
                    <i class="fas fa-cogs nav-icon" style="font-size: 18px"></i>
                    <span class="ml-2"style="font-size: 18px">Gerenciamento</span>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Clientes
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('cliente/novo') ?>" class="nav-link">
                                <i class="fas fa-user-plus nav-icon"></i>                                
                                <p>Novo</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('cliente/contrato') ?>" class="nav-link">
                                <i class="fas fa-file-contract nav-icon"></i>
                                <p>Cadastrar Cliente | Contrato</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('cliente/gerenciar/'.sha1(0)) ?>" class="nav-link">
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
                                <p>Pesquisar</p>
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
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-dollar-sign"></i>
                        <p>Comissões
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
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
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>