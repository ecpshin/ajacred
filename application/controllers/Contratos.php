<?php defined('BASEPATH') or exit('Acesso negado! Não é permitido acesso direto ao script');

class Contratos extends CI_Controller {

    private $usuarios;
    private $nivel;

    public function __construct() {
        parent::__construct();

        $this->load->helper('funcoes');

        $this->nivel = $this->session->userdata('pretorian')->user_nivel;
        $logged = $this->session->userdata('loggedin');

        if (!userlevel($this->nivel, $logged)) {
            redirect(base_url('autenticacao'));
        }
        $this->sidebar = menu($this->nivel);

        $this->load->model('contratos_model');
        $this->load->model('operacoes_model');
        $this->load->model('orgaos_model');
        $this->load->model('financeiras_model');
        $this->load->model('correspondentes_model');
        $this->load->model('situacoes_model');
        $this->load->model('searches_model');
        $this->load->model('usuarios_model');
        $this->load->model('clientes_model');
        $this->load->model('bancarios_model');
        $this->load->model('enderecos_model');
        $this->load->model('funcionais_model');
        $this->load->model('estadoscivil_model', 'modelestadoscivil');

        if ($this->nivel == 'ROLE_USER') {
            $this->usuarios = $this->usuarios_model->noadmins($this->session->userdata('pretorian')->user_id);
        } else {
            $this->usuarios = $this->usuarios_model->getallusuarios();
        }
    }

    public function index() {
        $data['titulo'] = 'AJACRED';
        $data['subtitulo'] = 'Painel de Administração';
        $data['view'] = 'Contratos';
        $data['page'] = 'Gerenciamento de Contratos';

        if ($this->nivel == 'ROLE_ADMIN') {
            $data['contratos'] = $this->contratos_model->getallcontracts();
        } else {
            $data['contratos'] = $this->contratos_model->getcontractbyuser($this->session->userdata('pretorian')->user_id);
        }

        $this->load->view('backend/templates/html-header', $data);
        $this->load->view('backend/templates/top-navbar');
        $this->load->view($this->sidebar);
        $this->load->view('backend/contratos/lista');
        $this->load->view('backend/templates/content-footer');
        $this->load->view('backend/templates/html-footer');
    }

    public function clientes() {

        $data['titulo'] = 'AJACRED';
        $data['subtitulo'] = 'Painel de Administração';
        $data['view'] = 'Contratos';
        $data['page'] = 'Busca de Cliente';
        $data['clientes'] = $this->clientes_model->getallclientes();
        $this->load->view('backend/templates/html-header', $data);
        $this->load->view('backend/templates/top-navbar');
        $this->load->view($this->sidebar);
        $this->load->view('backend/contratos/clientes');
        $this->load->view('backend/templates/content-footer');
        $this->load->view('backend/templates/html-footer');
    }

    public function filtrar() {
        $data['titulo'] = 'AJACRED';
        $data['subtitulo'] = 'Painel de Administração';
        $data['view'] = 'Contratos';
        $data['page'] = 'Filtrar';

        $this->load->view('backend/templates/html-header', $data);
        $this->load->view('backend/templates/top-navbar');
        $this->load->view($this->sidebar);
        $this->load->view('backend/contratos/filtrar');
        $this->load->view('backend/templates/content-footer');
        $this->load->view('backend/templates/html-footer');
    }

    public function novo() {
        $data['titulo'] = 'AJACRED';
        $data['subtitulo'] = 'Painel de Administração';
        $data['view'] = 'Contratos';
        $data['page'] = 'Novo';
        $data['operacoes'] = $this->getOperacoes();
        $data['financeiras'] = $this->getFinanceiras();
        $data['correspondentes'] = $this->getCorrespondentes();
        $data['situacoes'] = $this->getSituacoes();
        $data['orgaos'] = $this->orgaos_model->getallorgaos();
        $data['clientesdb'] = $this->clientes_model->getminimalinfos();
        $data['usuarios'] = $this->usuarios;

        $this->load->view('backend/templates/html-header', $data);
        $this->load->view('backend/templates/top-navbar');
        $this->load->view($this->sidebar);
        $this->load->view('backend/contratos/novo');
        $this->load->view('backend/templates/content-footer');
        $this->load->view('backend/templates/html-footer');
    }

    public function editar($id) {
        $this->load->helper('conversor');
        if (!isset($id)) {
            $id = sha1(1);
        }

        $data = [
            'titulo' => 'AJACRED',
            'subtitulo' => 'Painel de Administração',
            'view' => 'Contratos',
            'page' => 'Editar',
            'contrato' => $this->getContrato($id),
            'operacoes' => $this->getOperacoes(),
            'orgaos' => $this->orgaos_model->getallorgaos(),
            'financeiras' => $this->getFinanceiras(),
            'correspondentes' => $this->getCorrespondentes(),
            'situacoes' => $this->getSituacoes(),
            'usuarios' => $this->usuarios,
            'nvl' => $this->nivel];

        $this->load->view('backend/templates/html-header', $data);
        $this->load->view('backend/templates/top-navbar');
        $this->load->view($this->sidebar);
        $this->load->view('backend/contratos/editar');
        $this->load->view('backend/templates/content-footer');
        $this->load->view('backend/templates/html-footer');
    }

    public function cadastrar_contrato() {
        /* TODO implementar verificação e cliente existente */
        $this->load->library('form_validation');

        $this->load->helper('conversor');

        $id_orgao = $this->input->post('id-orgao');
        $this->form_validation->set_rules('txt-cpf', 'CPF Cliente', 'required|is_unique[tb_clientes.cpf]');
        if ($this->form_validation->run() == false) {
            $this->formulario();
        } 
        else 
        {
            $cliente = [
                'nome' => $this->input->post('txt-nome'),
                'cpf' => $this->input->post('txt-cpf'),
                'rg ' => $this->input->post('txt-rg'),
                'rg_exp' => $this->input->post('data-exp'),
                'nascimento' => $this->input->post('txt-nasceu'),
                'naturalidade' => $this->input->post('txt-naturalde'),
                'genitora' => $this->input->post('txt-mae'),
                'genitor' => $this->input->post('txt-pai'),
                'sexo' => $this->input->post('txt-genero'),
                'estado_civil ' => $this->input->post('txt-civil')
            ];
            $id_cliente = $this->clientes_model->insert($cliente);

            $residenciais = [
                'cep' => $this->input->post('txt-cep'),
                'logradouro' => $this->input->post('txt-logradouro'),
                'complemento' => $this->input->post('txt-complemento'),
                'bairro' => $this->input->post('txt-bairro'),
                'municipio' => $this->input->post('txt-cidade'),
                'uf' => $this->input->post('txt-uf'),
                'cliente' => $id_cliente
            ];
            $this->enderecos_model->insertdata($residenciais);

            $funcionais = [
                'nrbeneficio' => $this->input->post('txt-matricula'),
                'phone1' => $this->input->post('txt-phone1'),
                'phone2' => $this->input->post('txt-phone2'),
                'phone3' => $this->input->post('txt-phone3'),
                'phone4' => $this->input->post('txt-phone4'),
                'emails' => $this->input->post('txt-email'),
                'emails' => $this->input->post('txt-senha')
            ];
            $id_funcional = $this->funcionais_model->insert($funcionais);

            $bancarios = [
                'accbanco' => $this->input->post('txt-banco'),
                'accagencia' => $this->input->post('txt-agencia'),
                'accnr' => $this->input->post('txt-nrconta'),
                'acctipo' => $this->input->post('txt-tipo'),
                'accoperacao' => $this->input->post('txt-operacao')
            ];
            $id_bancario = $this->bancarios_model->insert($bancarios);

            $contrato = [
                'nrcontrole' => $this->input->post('nr-controle'),
                'nrcontrato' => $this->input->post('nr-contrato'),
                'digitacao' => $this->input->post('digitado'),
                'finalizacao' => $this->input->post('previsto'),
                'prazo' => $this->input->post('prazo'),
                'total' => numberConverter($this->input->post('valor-total')),
                'parcela' => numberConverter($this->input->post('valor-parcela')),
                'liquido' => numberConverter($this->input->post('valor-liquido')),
                'referencia' => $this->input->post('referente'),
                'tabela' => $this->input->post('tabelac'),
                'percentual' => numberConverter($this->input->post('valor-percentual')),
                'comissao' => numberConverter($this->input->post('valor-comissao')),
                'observacoes' => $this->input->post('observacoes'),
                'operacao' => $this->input->post('id-operacao'),
                'financeira' => $this->input->post('id-financeira'),
                'correspondente' => $this->input->post('id-correspondente'),
                'situacao' => $this->input->post('id-situacao'),
                'usuario' => $this->input->post('user-id')
            ];
            $id_contrato = $this->contratos_model->insertContract($contrato);

            $cli_has_bancario = ['clientes_id_cliente' => $id_cliente, 'bancarios_id_bco' => $id_bancario];
            $cli_has_funcional = ['clientes_id_cliente' => $id_cliente, 'funcionais_id_funcional' => $id_funcional];
            $cli_has_orgao = ['cliente_id' => $id_cliente, 'orgao_id' => $id_orgao];
            $contratos_has_orgaos = ['contratos_pid' => $id_contrato, 'orgaos_id_orgao' => $id_orgao];

            $this->model_searches->client_has_bancarios($cli_has_bancario);
            $this->model_searches->client_has_funcionais($cli_has_funcional);
            $this->model_searches->contrato_has_orgao($contratos_has_orgaos);

            if (!$this->orgao_ok($id_cliente)) {
                $this->model_searches->cliente_has_orgao($cli_has_orgao);
            }
            
            redirect(base_url('contratos'));
        }
    }

    public function lancar() {
        $this->load->helper('conversor');

        $contrato = [
            'nrcontrole' => $this->input->post('controle'), 'nrcontrato' => $this->input->post('nrcontrato'),
            'digitacao' => $this->input->post('digitado'), 'finalizacao' => $this->input->post('previsto'),
            'prazo' => $this->input->post('prazo'),
            'total' => numberConverter($this->input->post('valor-total')), 'parcela' => numberConverter($this->input->post('valor-parcela')),
            'liquido' => numberConverter($this->input->post('valor-liquido')), 'referencia' => $this->input->post('referente'),
            'tabela' => $this->input->post('tabelac'), 'percentual' => numberConverter($this->input->post('valor-percentual')),
            'comissao' => numberConverter($this->input->post('valor-comissao')),
            'observacoes' => $this->input->post('observacoes'),
            'operacao' => $this->input->post('id-operacao'),
            'financeira' => $this->input->post('id-financeira'),
            'correspondente' => $this->input->post('id-correspondente'),
            'situacao' => $this->input->post('id-situacao'),
            'usuario' => $this->input->post('user-id')];

        $pid = $this->contratos_model->insertContract($contrato);
        $cliente = $this->input->post('id-cliente');
        $orgao = $this->input->post('id-orgao');

        $aux1 = ['clientes_id_cliente' => $cliente, 'contratos_pid_contrato' => $pid];
        $aux2 = ['contratos_pid' => $pid, 'orgaos_id_orgao' => $orgao];

        $rs0 = $this->searches_model->client_has_contratos($aux1);
        $rs1 = $this->searches_model->contratos_has_orgao($aux2);

        if (!$this->searches_model->orgaoclientok($cliente)) {
            $aux3 = ['cliente_id' => $cliente, 'orgao_id' => $orgao];
            $res2 = $this->searches_model->cliente_has_orgao($aux3);
        }

        if (is_null($rs0) || is_null($rs1 || is_null($res2))) {
            unset($object, $pid, $rs0, $rs1, $aux1, $aux2, $aux3);
            $this->novo();
        } else {
            unset($object, $pid, $rs0, $rs1, $aux1, $aux2, $aux3);
            redirect(base_url('contratos'));
        }
    }

    public function atualizar() {
        $this->load->helper('conversor');
        $idcli = $this->input->post('id-cliente');
        $pid = $this->input->post('pid');

        $contrato = [
            'nrcontrole' => $this->input->post('controle'),
            'nrcontrato' => $this->input->post('nrcontrato'),
            'digitacao' => $this->input->post('digitado'),
            'finalizacao' => $this->input->post('previsto'),
            'prazo' => $this->input->post('prazo'),
            'total' => numberConverter($this->input->post('valor-total')),
            'parcela' => numberConverter($this->input->post('valor-parcela')),
            'liquido' => numberConverter($this->input->post('valor-liquido')),
            'referencia' => $this->input->post('referente'),
            'tabela' => $this->input->post('tabelac'),
            'percentual' => numberConverter($this->input->post('valor-percentual')),
            'comissao' => numberConverter($this->input->post('valor-comissao')),
            'observacoes' => $this->input->post('observacoes'),
            'operacao' => $this->input->post('id-operacao'),
            'financeira' => $this->input->post('id-financeira'),
            'correspondente' => $this->input->post('id-correspondente'),
            'situacao' => $this->input->post('id-situacao'),
            'usuario' => $this->input->post('user-id')];

        $res = $this->contratos_model->updateContract($contrato, $pid);

        if (is_null($res)) {
            $this->editar($pid);
        } else {
            redirect(base_url('contratos'));
        }
    }

    public function pesquisar() {
        $this->load->model('usuarios_model');
        $flag = $this->input->post('pesquisar');

        $data['contratosdb'] = $this->retorna_contratos(
                $this->input->post('inicio'),
                $this->input->post('final'),
                $this->input->post('agente'),
                $flag
        );

        if ($this->nivel == 'ROLE_ADMIN') {
            $data['agentes'] = $this->usuarios_model->getallusuarios();
        } else {
            $data['agentes'] = $this->usuarios_model->getUserByID($this->session->userdata('pretorian')->user_id);
        }

        $data['titulo'] = 'AJACRED';
        $data['subtitulo'] = 'Painel de Administração';
        $data['view'] = 'Contratos';
        $data['page'] = 'Lista de Contratos';
        $data['nvl'] = $this->nivel;

        $this->load->view('backend/templates/html-header', $data);
        $this->load->view('backend/templates/top-navbar');
        $this->load->view($this->sidebar);
        $this->load->view('backend/contratos/pesquisar');
        $this->load->view('backend/templates/content-footer');
        $this->load->view('backend/templates/html-footer');
    }

    public function formulario() {
        $data['titulo'] = 'AJACRED';
        $data['subtitulo'] = 'Painel de Administração';
        $data['view'] = 'Contrato';
        $data['page'] = 'Formulário de Cadastro';
        $data['ecivis'] = $this->modelestadoscivil->getAllEstadoscivil();
        $data['operacoes'] = $this->getOperacoes();
        $data['financeiras'] = $this->getFinanceiras();
        $data['correspondentes'] = $this->getCorrespondentes();
        $data['situacoes'] = $this->getSituacoes();
        $data['orgaos'] = $this->orgaos_model->getallorgaos();
        $data['usuarios'] = $this->usuarios;

        $this->load->view('backend/templates/html-header', $data);
        $this->load->view('backend/templates/top-navbar');
        $this->load->view($this->sidebar);
        $this->load->view('backend/contratos/new');
        $this->load->view('backend/templates/content-footer');
        $this->load->view('backend/templates/html-footer');
    }

    public function exemploum() {
        $this->load->model('usuarios_model');
        $this->load->helper('conversor');
        if ($this->nivel == 'ROLE_ADMIN') {
            $data['agentes'] = $this->usuarios_model->getallusuarios();
        } else {
            $data['agentes'] = $this->usuarios_model->getUserByID($this->session->userdata('pretorian')->user_id);
        }
        $data['titulo'] = 'AJACREDF';
        $data['subtitulo'] = 'Comissões';
        $data['view'] = 'Contratos';
        $data['page'] = 'Gerenciamento de Contratos';
        $data['operacoes']= $this->operacoes_model->getall();
        if ($this->input->post('pesquisar') == 'Pesquisar') {
            $inicio = $this->input->post('inicio');
            $op = $this->input->post('id-operacao');
            $user = $this->input->post('agente');
            $data['comissoes'] = $this->contratos_model->getintervalanduser($inicio, $op, $user);
        } else {
            $data['comissoes'] = null;
        }
        $this->load->view('backend/templates/html-header', $data);
        $this->load->view('backend/templates/top-navbar');
        $this->load->view($this->sidebar);
        $this->load->view('backend/contratos/tabela');
        $this->load->view('backend/templates/content-footer');
        $this->load->view('backend/templates/html-footer');
    }

    public function view($pid) {
        $data['titulo'] = 'AJACRED';
        $data['subtitulo'] = 'Painel de Administração';
        $data['view'] = 'Visualiza Contrato';
        $data['page'] = 'Gerenciamento de Contratos';
        $data['contratodb'] = $this->contratos_model->getcontractbypid($pid);

        $this->load->view('backend/templates/html-header', $data);
        $this->load->view('backend/templates/top-navbar');
        $this->load->view($this->sidebar);
        $this->load->view('backend/contratos/view-contrato');
        $this->load->view('backend/templates/content-footer');
        $this->load->view('backend/templates/html-footer');
    }

    public function delete_contrato($pid)
    {
       $this->searches_model->delete_contrato_cliente($pid);
       $this->searches_model->delete_contrato_orgao($pid);
       $this->contratos_model->deleteContract($pid);
       
       redirect(base_url('constratos'));
    }

    private function retorna_contratos($inicio, $final, $usuario, $teste) {
        if (!is_null($teste)) {
            $rs = $this->contratos_model->getbyintervalanduser($inicio, $final, $usuario);
            return $rs;
        } else {
            return null;
        }
    }

    public function busca() {
        $cpf = $this->input->post('cpf');
        $rs = $this->clientes_model->getidclientbyCpf($cpf);
        echo json_encode($rs);
    }

    private function getContrato($contrato) {
        $rs = $this->contratos_model->getcontractbypid($contrato);
        return $rs[0];
    }

    private function getOperacoes() {
        return $this->operacoes_model->getall();
    }

    private function getSituacoes() {
        
        return $this->situacoes_model->getAllSituacoes();
    }

    private function getCorrespondentes() {
        return $this->correspondentes_model->getallcorrespondentes();
    }

    private function getFinanceiras() {
        return $this->financeiras_model->getAllFinanceiras();
    }

    private function orgao_ok($param) {
        return $this->searches_model->orgaoclientok($param);
    }

}
