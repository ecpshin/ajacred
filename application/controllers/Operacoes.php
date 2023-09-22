<?php defined('BASEPATH') or exit();

class Operacoes extends CI_Controller{

    public function __construct(){
        
        parent::__construct();
        
        $nivel=$this->session->userdata('pretorian')->user_nivel;
        $logged = $this->session->userdata('loggedin');
        
        $this->load->helper('funcoes');
        
        if(!userlevel($nivel, $logged))
        {
            redirect(base_url('autenticacao'));
        }        
        
        $this->sidebar = menu($nivel);
        $this->load->model('operacoes_model', 'modeloperacoes');
    }

    public function index()
    {
        $data['titulo']='AJACRED';
        $data['subtitulo']='Painel de Administração';
        $data['view']='Operações';
        $data['page']='Operações Cadastrados';        
        $data['operacoes'] = $this->modeloperacoes->getall();
        
        $this->load->view('backend/templates/html-header', $data);
        $this->load->view('backend/templates/top-navbar');
        $this->load->view($this->sidebar);        
        $this->load->view('backend/operacoes/lista');
        $this->load->view('backend/templates/content-footer');
        $this->load->view('backend/templates/html-footer');
    }

    public function nova(){
        
        $data['titulo']='AJACRED';
        $data['subtitulo']='Painel de Administração';
        $data['view']='Operações';
        $data['page']='Cadastrar Operação';        
                
        $this->load->view('backend/templates/html-header', $data);
        $this->load->view('backend/templates/top-navbar');
        $this->load->view($this->sidebar);        
        $this->load->view('backend/operacoes/cadastro');
        $this->load->view('backend/templates/content-footer');
        $this->load->view('backend/templates/html-footer');
    }

    public function editar($id){
        
        $data['titulo']='AJACRED';
        $data['subtitulo']='Painel de Administração';
        $data['view']='Operações';
        $data['page']='Editar Operação';        
        $data['operacoes'] = $this->modeloperacoes->getbyid($id);
        
        $this->load->view('backend/templates/html-header', $data);
        $this->load->view('backend/templates/top-navbar');
        $this->load->view($this->sidebar);        
        $this->load->view('backend/operacoes/editar');
        $this->load->view('backend/templates/content-footer');
        $this->load->view('backend/templates/html-footer');
    }

    public function salvar(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('txt-descricao', 'Descrição da Operação', 'required|is_unique[tb_operacoes.descricao]|min_length[3]');

        if($this->form_validation->run()==FALSE){
            $this->nova();
        }else {
            $data['descricao']=$this->input->post('txt-descricao');
            $this->modeloperacoes->insert($data);
            redirect(base_url('operacoes'));
        }
    }

    public function atualizar(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('txt-descricao', 'Descrição da Operação', 'required|min_length[3]');

        if($this->form_validation->run()==FALSE){
            $this->atualizar();
        }else {
            $data['descricao']=$this->input->post('txt-descricao');
            $id = $this->input->post('id-operacao');
            $this->modeloperacoes->update($data, $id);
            redirect(base_url('operacoes'));
        }
    }
}