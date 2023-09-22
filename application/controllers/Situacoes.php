<?php
defined('BASEPATH') or exit('Acesso direto ao script não permitido!');

/**
 * Description of Situacoes
 *
 * @author Francisco Shin
 */
class Situacoes extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->helper('funcoes');
        $nivel=$this->session->userdata('pretorian')->user_nivel;
        $logged=$this->session->userdata('loggedin');
        
        if(!userlevel($nivel, $logged)){
           redirect(base_url('autenticacao'));
        }
        $this->sidebar = menu($nivel);
        $this->load->model('situacoes_model', 'modelsituacoes');
    }
    
    public function index(){
        $data['titulo']='AJACRED';
        $data['subtitulo']='Painel de Administração';
        $data['view']='Situações';
        $data['page']='Situações Cadastradas';
        $data['situacoes']= $this->modelsituacoes->getAllSituacoes();
       
        $this->load->view('backend/templates/html-header', $data);
        $this->load->view('backend/templates/top-navbar');
        $this->load->view($this->sidebar);
        $this->load->view('backend/situacoes/lista');
        $this->load->view('backend/templates/content-footer');
        $this->load->view('backend/templates/html-footer');
    }
    
    public function nova(){
        $data['titulo']='AJACRED';
        $data['subtitulo']='Painel de Administração';
        $data['view']='Situações';
        $data['page']='Cadastrar';
        $data['situacoes']= $this->modelsituacoes->getAllSituacoes();
       
        $this->load->view('backend/templates/html-header', $data);
        $this->load->view('backend/templates/top-navbar');
        $this->load->view($this->sidebar);
        $this->load->view('backend/situacoes/cadastro');
        $this->load->view('backend/templates/content-footer');
        $this->load->view('backend/templates/html-footer');
    }

    public function editar($id){
        $data['titulo']='AJACRED';
        $data['subtitulo']='Painel de Administração';
        $data['view']='Situações';
        $data['page']='Atualizar Situação';
        $data['situacoes']= $this->modelsituacoes->getSituacaoByID($id);
       
        $this->load->view('backend/templates/html-header', $data);
        $this->load->view('backend/templates/top-navbar');
        $this->load->view($this->sidebar);
        $this->load->view('backend/situacoes/editar');
        $this->load->view('backend/templates/content-footer');
        $this->load->view('backend/templates/html-footer');
    }
    
    public function salvar(){        
        $this->load->library('form_validation');
        $this->form_validation->set_rules('txt-descricao', 'Descrição', 'required|min_length[3]|is_unique[tb_situacoes.descricao]');
        if($this->form_validation->run()==FALSE){
            $this->nova();            
        } 
        else {
            $dados['descricao'] = $this->input->post('txt-descricao');
            $res=$this->modelsituacoes->insertSituacao($dados);
            
            if(is_null($res)){
                $data['type']='Não foi possível cadastrar Situação.';
                $this->load->view('error', $data);
            }
            redirect(base_url('situacoes'));
        }
    }

    public function atualizar(){        
        $this->load->library('form_validation');
        $this->form_validation->set_rules('txt-descricao', 'Descrição', 'required|min_length[3]');
        
        if($this->form_validation->run()==FALSE){
            $this->nova();            
        } 
        else
        {
            $id = $this->input->post('id-situacao');
            $dados['descricao'] = $this->input->post('txt-descricao');
            $res=$this->modelsituacoes->updateSituacao($dados, $id);
            
            if(is_null($res)){
                $data['type']='Não foi possível cadastrar Situação.';
                $this->load->view('error', $data);
            }
            redirect(base_url('situacoes'));
        }
    }

    public function excluir($id){
        $this->modelsituacoes->deleteSituacao($id);
        redirect(base_url('situacoes'));
    }
}
