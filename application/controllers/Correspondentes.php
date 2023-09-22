<?php 
defined('BASEPATH') or exit('Acesso direto ao script não permitido!');

class Correspondentes extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
        $this->load->helper('funcoes');
        $nivel=$this->session->userdata('pretorian')->user_nivel;
        $logged=$this->session->userdata('loggedin');
        
        if(!userlevel($nivel, $logged)){
           redirect(base_url('autenticacao'));
        }
        $this->sidebar = menu($nivel);
        $this->load->model('correspondentes_model', 'modelcorrespondentes');
    }
    
    public function index(){
        $data['titulo']='AJACRED';
        $data['subtitulo']='Painel de Administração';
        $data['view']='Correspondentes';
        $data['page']='Correspondentes Cadastrados';
        $data['correspondentes']= $this->modelcorrespondentes->getallcorrespondentes();
       
        $this->load->view('backend/templates/html-header', $data);
        $this->load->view('backend/templates/top-navbar');
        $this->load->view($this->sidebar);
        $this->load->view('backend/correspondentes/page-correspondentes');
        $this->load->view('backend/templates/content-footer');
        $this->load->view('backend/templates/html-footer');        
    }
    
    public function novo(){        
        $data['titulo']='AJACRED';
        $data['subtitulo']='Painel de Administração';
        $data['view']='Correspondentes';
        $data['page']='Cadastro';
        $data['correspondentes']= $this->modelcorrespondentes->getallcorrespondentes();
       
        $this->load->view('backend/templates/html-header', $data);
        $this->load->view('backend/templates/top-navbar');
        $this->load->view($this->sidebar);
        $this->load->view('backend/correspondentes/new-correspondente');
        $this->load->view('backend/templates/content-footer');
        $this->load->view('backend/templates/html-footer');
    }

    public function editar($ident){        
        $data['titulo']='AJACRED';
        $data['subtitulo']='Painel de Administração';
        $data['view']='Correspondentes';
        $data['page']='Atualização';
        $data['objs']=$this->modelcorrespondentes->getcorrespondentebyID($ident);
        
        $this->load->view('backend/templates/html-header', $data);
        $this->load->view('backend/templates/top-navbar');
        $this->load->view($this->sidebar);
        $this->load->view('backend/correspondentes/update-correspondente');
        $this->load->view('backend/templates/content-footer');
        $this->load->view('backend/templates/html-footer');
        
    }
    
    public function salvar(){
        
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nome', 'Nome do Correpondente', 'required|is_unique[tb_correspondentes.nome]|min_length[3]');
        $this->form_validation->set_rules('inscricao', 'Inscrição', 'required|is_unique[tb_correspondentes.inscricao]|min_length[3]');
        $this->form_validation->set_rules('email', 'E-mail', 'required|valid_email');
        $this->form_validation->set_rules('phone', 'Contato', 'required');
        
        if($this->form_validation->run()==FALSE){
            $this->editar(sha1($this->input->post('id')));
        } else {
            $obj['nome']=$this->input->post('nome');
            $obj['inscricao']=$this->input->post('inscricao');
            $obj['email']=$this->input->post('email');
            $obj['phone']=$this->input->post('phone');            
            $err = $this->modelcorrespondentes->insertcorrespondente($obj);
            
            if(!is_null($err)){ 
                redirect(base_url('correspondentes'), 'refresh');
            } else {
                $data['type']='Não foi possível realizar o cadastro do correspondente';
            }
        }
    }   
    /* Atualiza dados do Correspondente */
    public function atualizar(){        
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nome', 'Nome do Correpondente', 'required|min_length[3]');
        $this->form_validation->set_rules('inscricao', 'Inscrição', 'required|min_length[11]|max_length[14]');
        $this->form_validation->set_rules('email', 'E-mail', 'required|valid_email');
        $this->form_validation->set_rules('phone', 'Contato', 'required');
        
        if($this->form_validation->run()==FALSE){
            $this->editar(sha1($this->input->post('id'))); 
        } else {
            $obj['nome']=$this->input->post('nome'); 
            $obj['inscricao']=$this->input->post('inscricao');
            $obj['email']=$this->input->post('email');
            $obj['phone']=$this->input->post('phone');
            $id=$this->input->post('id');            
            $err = $this->modelcorrespondentes->updatecorrespondente($obj, sha1($id));            
            
            if(!is_null($err)){
                redirect(base_url('correspondentes'), 'refresh'); 
            } else {
                $data['type']='Não foi possível realizar o cadastro do correspondente';
                $this->load->view('backend/error', $data);
            }
        }
    }
    
}

