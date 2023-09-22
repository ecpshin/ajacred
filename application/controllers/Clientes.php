<?php 
defined('BASEPATH') or exit('No Script direct access allowed!');

/**
 * Description of Clientes
 *
 * @author Francisco Shin
 */
class Clientes extends CI_Controller {

    public function __construct() {

        parent::__construct();

        $this->load->helper('funcoes');
        $this->load->helper('conversor');
        $this->nivel = $this->session->userdata('pretorian')->user_nivel;
        $logged = $this->session->userdata('loggedin');

        if (!userlevel($this->nivel, $logged)) {
            redirect(base_url('autenticacao'));
        }

        $this->load->model('clientes_model', 'modelclientes');
        $this->load->model('contratos_model', 'modelcontratos');
        $this->load->model('estadoscivil_model', 'modelestadoscivil');
        $this->load->model('orgaos_model', 'modelorgaos');
        $this->load->model('searches_model', 'modelsearches');
        $this->load->model('bancarios_model', 'modelbancarios');
        $this->load->model('funcionais_model', 'modelfuncionais');
        $this->load->model('enderecos_model', 'modelenderecos');
        $this->load->model('usuarios_model');

        $this->sidebar = menu($this->nivel);
        
        if ($this->nivel == 'ROLE_USER') {
            $this->usuarios = $this->usuarios_model->noadmins($this->session->userdata('pretorian')->user_id);
        } else {
            $this->usuarios = $this->usuarios_model->getallusuarios();
        }
    }

    public function index() {
        $data['titulo'] = 'AJACRED';
        $data['subtitulo'] = 'Painel de Administração';
        $data['view'] = 'Clientes';
        $data['page'] = 'Lista de Clientes';
        $data['clientes'] = $this->modelclientes->getallclients();
        $this->load->view('backend/templates/html-header', $data);
        $this->load->view('backend/templates/top-navbar');
        $this->load->view($this->sidebar);
        $this->load->view('backend/clientes/page-clientes');
        $this->load->view('backend/templates/content-footer');
        $this->load->view('backend/templates/html-footer');
    }

    public function cadastro() {
        $data['titulo'] = 'AJACRED';
        $data['subtitulo'] = 'Painel de Administração';
        $data['view'] = 'Clientes';
        $data['page'] = 'Cadastro de Clientes';
        $data['orgaos'] = $this->modelorgaos->getallorgaos();
        $data['ecivis'] = $this->modelestadoscivil->getAllEstadoscivil();
        $this->load->view('backend/templates/html-header', $data);
        $this->load->view('backend/templates/top-navbar');
        $this->load->view($this->sidebar);
        $this->load->view('backend/clientes/new-cliente');
        $this->load->view('backend/templates/content-footer');
        $this->load->view('backend/templates/html-footer');
    }

    public function editar($id) {

        $data = [
            'titulo' => 'AJACRED', 'subtitulo' => 'Painel de Administração', 'view' => 'Clientes',
            'page' => 'Atualização de Cliente',
            'ecivis' => $this->modelestadoscivil->getAllEstadoscivil(),
            'orgaos' => $this->modelorgaos->getallorgaos(),
            'cliente' => $this->modelclientes->getclientbyid($id)[0],
            'bancarios' => $this->modelbancarios->bancariosbyid($id),
            'funcionais' => $this->modelfuncionais->funcionaisbyid($id),
            'endereco' => $this->modelenderecos->getbyclienteID($id)[0]];
        $this->load->view('backend/templates/html-header', $data);
        $this->load->view('backend/templates/top-navbar');
        $this->load->view($this->sidebar);
        $this->load->view('backend/clientes/update-cliente');
        $this->load->view('backend/templates/content-footer');
        $this->load->view('backend/templates/html-footer');
    }

    public function info_basic() {
        $this->load->helper('conversor');
        $data = [
            'titulo' => 'AJACRED', 'subtitulo' => 'Painel de Administração', 'view' => 'Clientes',
            'page' => 'Informações Básicas',
            'clientes' => $this->modelfuncionais->infofuncionais()];
        $this->load->view('backend/templates/html-header', $data);
        $this->load->view('backend/templates/top-navbar');
        $this->load->view($this->sidebar);
        $this->load->view('backend/clientes/info-page');
        $this->load->view('backend/templates/content-footer');
        $this->load->view('backend/templates/html-footer');
    }
    
    public function cliente_contrato() {
        $data['titulo'] = 'AJACRED';
        $data['subtitulo'] = 'Painel de Administração';
        $data['view'] = 'Contrato';
        $data['page'] = 'Formulário de Cadastro';
        $data['ecivis'] = $this->modelestadoscivil->getAllEstadoscivil();
        $data['operacoes'] = $this->getOperacoes();
        $data['financeiras'] = $this->getFinanceiras();
        $data['correspondentes'] = $this->getCorrespondentes();
        $data['situacoes'] = $this->getSituacoes();
        $data['orgaos'] = $this->getOrgaos();
        $data['usuarios'] = $this->usuarios;

        $this->load->view('backend/templates/html-header', $data);
        $this->load->view('backend/templates/top-navbar');
        $this->load->view($this->sidebar);
        $this->load->view('backend/clientes/novo-e-contrato');
        $this->load->view('backend/templates/content-footer');
        $this->load->view('backend/templates/html-footer');
    }

    public function client_infos($id, $slug) {
        $this->load->helper('conversor');
        $data = ['titulo' => 'AJACRED',
            'subtitulo' => 'Painel de Administração',
            'view' => 'Clientes',
            'page' => 'Informações de Clientes',
            'pessoal' => $this->getPessoais($id),
            'funcionais' => (!is_null($this->getFuncionais($id)) || !empty($this->getFuncionais($id))) ? $this->getFuncionais($id) : null,
            'bancarios' => $this->getBancarios($id),
            'endereco' => $this->modelenderecos->getbyclienteID($id)[0]];
        $this->load->view('backend/templates/html-header', $data);
        $this->load->view('backend/templates/top-navbar');
        $this->load->view($this->sidebar);
        $this->load->view('backend/clientes/client-informations');
        $this->load->view('backend/templates/content-footer');
        $this->load->view('backend/templates/html-footer');
    }

    public function salvar() {

        $this->load->library('form_validation');
        $this->form_validation->set_rules('txt-cpf', 'CPF Cliente', 'required|is_unique[tb_clientes.cpf]');
        $idbancario = null;
        $idcliente = null;
        $idfuncional = null;
        $idorgao = null;

        if ($this->form_validation->run() == false) {
            $this->cadastro();
        } else {   
            //Dados pessoais
            //id do órgão
            $idorgao = $this->input->post('id-orgao');
            
            $cliente = [
                'nome' => $this->input->post('txt-nome'),
                'cpf' => $this->input->post('txt-cpf'),
                'rg' => $this->input->post('txt-rg'),
                'rg_exp' => $this->input->post('data-exp'),
                'nascimento' => $this->input->post('txt-nasceu'),
                'naturalidade' => $this->input->post('txt-naturalde'),
                'genitora' => $this->input->post('txt-mae'),
                'genitor' => $this->input->post('txt-pai'),
                'sexo' => $this->input->post('txt-genero'),
                'estado_civil' => $this->input->post('txt-civil')];
            $idcliente = $this->modelclientes->insert($cliente);

            //Dados funcionais
            $funcional = [
                'nrbeneficio' => $this->input->post('txt-matricula'),
                'phone1' => $this->input->post('txt-phone1'),
                'phone2' => $this->input->post('txt-phone2'),
                'phone3' => $this->input->post('txt-phone3'),
                'phone4' => $this->input->post('txt-phone4'),
                'emails' => $this->input->post('txt-email'),
                'senhas' => $this->input->post('txt-senha')];
            $idfuncional = $this->modelfuncionais->insert($funcional);

            //Dados Bancários
            $bancarios = ['accbanco' => $this->input->post('txt-banco'),
                'accagencia' => $this->input->post('txt-agencia'),
                'accnr' => $this->input->post('txt-nrconta'),
                'acctipo' => $this->input->post('txt-tipo'),
                'accoperacao' => $this->input->post('txt-operacao')];
            $idbancario = $this->modelbancarios->insert($bancarios);

            //Dados residenciais
            $residencial = ['cep' => $this->input->post('txt-cep'),
                'logradouro' => $this->input->post('txt-logradouro'),
                'complemento' => $this->input->post('txt-complemento'),
                'bairro' => $this->input->post('txt-bairro'),
                'municipio' => $this->input->post('txt-cidade'),
                'uf' => $this->input->post('txt-uf'),
                'cliente' => $idcliente];

            $residencial = $this->modelenderecos->insertdata($residencial);
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
            
            //id contrato
            $id_contrato = $this->modelcontratos->insertContract($contrato);
            
            //contrato_has_orgao
            $this->modelsearches->contratos_has_orgao([
                'contratos_pid'=>$id_contrato,
                'orgaos_id_orgao'=>$idorgao
            ]);   
            //cliente_has_bancario
            $this->modelsearches->client_has_bancarios([
                'clientes_id_cliente' => $idcliente,
                'bancarios_id_bco' => $idbancario]);
            //cliente_has_funcionais
            $this->modelsearches->client_has_funcionais([
                'clientes_id_cliente' => $idcliente,
                'funcionais_id_funcional' => $idfuncional]);
            //cliente_has_orgao
            if(!$this->modelsearches->orgaoclientok($idcliente)){
                $this->modelsearches->cliente_has_orgao([
                    'cliente_id' => $idcliente,
                    'orgao_id' => $idorgao]);
            }
            //cliente_has_contratos
            $this->modelsearches->client_has_contratos([
                'clientes_id_cliente' => $idcliente, 
                'contratos_pid_contrato' => $id_contrato]);
            
            redirect(base_url('clientes'));
        }
    }

    public function salvar_cliente() {

        $this->load->library('form_validation');
        $this->form_validation->set_rules('txt-cpf', 'CPF Cliente', 'required|is_unique[tb_clientes.cpf]');
        $idbancario = null;
        $idcliente = null;
        $idfuncional = null;
        
        if ($this->form_validation->run() == false) {
            $this->cadastro();
        } else {   
            //Dados pessoais            
            $cliente = [
                'nome' => $this->input->post('txt-nome'),
                'cpf' => $this->input->post('txt-cpf'),
                'rg' => $this->input->post('txt-rg'),
                'rg_exp' => $this->input->post('data-exp'),
                'nascimento' => $this->input->post('txt-nasceu'),
                'naturalidade' => $this->input->post('txt-naturalde'),
                'genitora' => $this->input->post('txt-mae'),
                'genitor' => $this->input->post('txt-pai'),
                'sexo' => $this->input->post('txt-genero'),
                'estado_civil' => $this->input->post('txt-civil')];
            $idcliente = $this->modelclientes->insert($cliente);
                        
            //Dados funcionais
            $funcional = [
                'nrbeneficio' => $this->input->post('txt-beneficio'),
                'phone1' => $this->input->post('txt-phone1'),
                'phone2' => $this->input->post('txt-phone2'),
                'phone3' => $this->input->post('txt-phone3'),
                'phone4' => $this->input->post('txt-phone4'),
                'emails' => $this->input->post('txt-email'),
                'senhas' => $this->input->post('txt-senha')];
            $idfuncional = $this->modelfuncionais->insert($funcional);

            //Dados Bancários
            $bancarios = ['accbanco' => $this->input->post('txt-banco'),
                'accagencia' => $this->input->post('txt-agencia'),
                'accnr' => $this->input->post('txt-nrconta'),
                'acctipo' => $this->input->post('txt-tipo'),
                'accoperacao' => $this->input->post('txt-operacao')];
            $idbancario = $this->modelbancarios->insert($bancarios);

            //Dados residenciais
            $residencial = ['cep' => $this->input->post('txt-cep'),
                'logradouro' => $this->input->post('txt-logradouro'),
                'complemento' => $this->input->post('txt-complemento'),
                'bairro' => $this->input->post('txt-bairro'),
                'municipio' => $this->input->post('txt-cidade'),
                'uf' => $this->input->post('txt-uf'),
                'cliente' => $idcliente];

            $residencial = $this->modelenderecos->insertdata($residencial);
                           
            //cliente_has_bancario
            $this->modelsearches->client_has_bancarios([
                'clientes_id_cliente' => $idcliente,
                'bancarios_id_bco' => $idbancario]);
            
            //cliente_has_funcionais
            $this->modelsearches->client_has_funcionais([
                'clientes_id_cliente' => $idcliente,
                'funcionais_id_funcional' => $idfuncional]);
            
            redirect(base_url('clientes'));
        }
    }
    
    public function atualizar() {

        $idcli = $this->input->post('client-id');
        $idfunc = $this->input->post('func-id');
        $idbanc = $this->input->post('bco-id');

        $pessoais = ['nome' => $this->input->post('txt-nome'), 'cpf' => $this->input->post('txt-cpf'),
            'rg' => $this->input->post('txt-rg'), 'rg_exp' => $this->input->post('data-exp'), 'nascimento' => $this->input->post('txt-nasceu'),
            'naturalidade' => $this->input->post('txt-naturalde'), 'genitora' => $this->input->post('txt-mae'),
            'genitor' => $this->input->post('txt-pai'), 'sexo' => $this->input->post('txt-genero'), 'estado_civil' => $this->input->post('txt-civil')];

        $this->modelclientes->atualiza_cliente($pessoais, $idcli);

        $funcional = [ 'nrbeneficio' => $this->input->post('nr-beneficio'),
            'phone1' => $this->input->post('txt-phone1'), 'phone2' => $this->input->post('txt-phone2'),
            'phone3' => $this->input->post('txt-phone3'), 'phone4' => $this->input->post('txt-phone4'), 'emails' => $this->input->post('txt-email'),
            'senhas' => $this->input->post('txt-senha')];

        //Atualiza dados funcionais
        $this->modelfuncionais->update_funcional($funcional, $idfunc);

        //recupera dados bancários do cliente
        $bancarios = ['accbanco' => $this->input->post('txt-banco'),
            'accagencia' => $this->input->post('txt-agencia'),
            'accnr' => $this->input->post('txt-nrconta'),
            'acctipo' => $this->input->post('txt-tipo'),
            'accoperacao' => $this->input->post('txt-operacao')];

        //Atualiza dados bancários
        $this->modelbancarios->update_bancario($bancarios, $idbanc);

        //Recupera dados residenciais
        //Dados residenciais
        $residencial = ['cep' => $this->input->post('txt-cep'), 'logradouro' => $this->input->post('txt-logradouro'),
            'complemento' => $this->input->post('txt-complemento'), 'bairro' => $this->input->post('txt-bairro'),
            'municipio' => $this->input->post('txt-cidade'), 'uf' => $this->input->post('txt-uf')];

        //atualiza dados residenciais
        $this->modelenderecos->update_endereco($residencial, $idcli);
       
        redirect(base_url('clientes'));
    }

    public function page_erro($erro = NULL) {
        $data['type'] = $erro;
        $this->load->view('backend/error', $data);
    }
    
    public function contratos_cliente($id) {
        
        $data['titulo'] = 'AJACRED';
        $data['subtitulo'] = 'Gerenciamento';
        $data['view'] = 'Cliente';
        $data['page'] = 'Contratos';
        $data['clientesdb'] = $this->getclients();
        $data['cliente']=(!is_null($id) && strcmp($id, 'b6589fc6ab0dc82cf12099d1c2d40ab994e8410c')!=0) ? $this->getclientebyid($id) : null;
        $data['contratos'] = (true) ? $this->modelcontratos->getextratosimplificado($id) : null;
        $this->load->view('backend/templates/html-header', $data);
        $this->load->view('backend/templates/top-navbar');
        $this->load->view($this->sidebar);
        $this->load->view('backend/clientes/contratos-cliente');
        $this->load->view('backend/templates/content-footer');
        $this->load->view('backend/templates/html-footer');
    }

    private function getPessoais($clientid) {
        $rs = $this->modelclientes->getClientByID($clientid);
        return $rs[0];
    }

    private function getBancarios($clientid) {
        return $this->modelclientes->getdadosbancariosbyID($clientid);
    }

    private function getclients() {
        return $this->modelclientes->getallclients();
    }
    
    private function getclientebyid($id) {
        $rs = $this->modelclientes->getclientbyid($id);
        return $rs[0];
    }

    private function getFuncionais($cliente) {
        return $this->modelclientes->getdadosfuncionaisbyID($cliente);
    }
    
    private function getFinanceiras() {
        $this->load->model('financeiras_model');
        return $this->financeiras_model->getAllFinanceiras();
    }
    
    private function getOperacoes() {
         $this->load->model('operacoes_model');
        return $this->operacoes_model->getall();
    }
    
    private function getOrgaos() {
        $this->load->model('orgaos_model');
        return $this->orgaos_model->getallorgaos();
    }

    private function getSituacoes() {
        $this->load->model('situacoes_model');
        return $this->situacoes_model->getAllSituacoes();
    }

    private function getCorrespondentes() {
        $this->load->model('correspondentes_model');
        return $this->correspondentes_model->getallcorrespondentes();
    }

}
