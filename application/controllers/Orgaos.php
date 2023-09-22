<?php defined('BASEPATH') or exit('');

class Orgaos extends CI_Controller
{
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
        $this->load->model('orgaos_model', 'modelorgaos');
    }

    public function index()
    {
        $data['titulo']='AJACRED';
        $data['subtitulo']='Painel de Administração';
        $data['view']='Orgãos';
        $data['page']='Orgãos Cadastrados';        
        $data['orgaos'] = $this->modelorgaos->getallorgaos();
        
        $this->load->view('backend/templates/html-header', $data);
        $this->load->view('backend/templates/top-navbar');
        $this->load->view($this->sidebar);        
        $this->load->view('backend/orgaos/lista');
        $this->load->view('backend/templates/content-footer');
        $this->load->view('backend/templates/html-footer');
    }

    public function novo(){
        
        $data['titulo']='AJACRED';
        $data['subtitulo']='Painel de Administração';
        $data['view']='Orgãos';
        $data['page']='Cadastrar Orgão';        
        $data['orgaos'] = $this->modelorgaos->getallorgaos();
        
        $this->load->view('backend/templates/html-header', $data);
        $this->load->view('backend/templates/top-navbar');
        $this->load->view($this->sidebar);        
        $this->load->view('backend/orgaos/cadastro');
        $this->load->view('backend/templates/content-footer');
        $this->load->view('backend/templates/html-footer');
    }

    public function editar($id){
        
        $data['titulo']='AJACRED';
        $data['subtitulo']='Painel de Administração';
        $data['view']='Orgãos';
        $data['page']='Editar Órgão';        
        $data['orgao'] = $this->modelorgaos->getorgaobyid($id);
        
        $this->load->view('backend/templates/html-header', $data);
        $this->load->view('backend/templates/top-navbar');
        $this->load->view($this->sidebar);        
        $this->load->view('backend/orgaos/editar');
        $this->load->view('backend/templates/content-footer');
        $this->load->view('backend/templates/html-footer');
    }

    public function salvar()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('txt-orgao', 'Órgão', 'required|is_unique[tb_orgaos.nome_orgao]|min_length[3]');
        $this->form_validation->set_rules('txt-tipo', 'Tipo do órgão', 'required');
        
        if ($this->form_validation->run() == FALSE) {
            $this->novo();
        } else {
            $orgao['nome_orgao'] = $this->input->post('txt-orgao');
            $orgao['tipo_orgao'] = $this->input->post('txt-tipo');
            
            $res = $this->modelorgaos->insertorgao($orgao);
            
            if(is_null($res))
            {
                $data['type']='Não foi possísel cadastrar órgão.';
                $this->load->view('backend/error', $data);
            } else {
                redirect(base_url('orgaos'));
            }
        }
        
    }   

    public function atualizar()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('txt-orgao', 'Órgão', 'required|min_length[3]');
        $this->form_validation->set_rules('txt-tipo', 'Tipo do órgão', 'required');
        
        if ($this->form_validation->run() == FALSE) {
            $this->novo();
        } else {
            $orgao['nome_orgao'] = $this->input->post('txt-orgao');
            $orgao['tipo_orgao'] = $this->input->post('txt-tipo');
            $id = $this->input->post('id-orgao');
            
            $res = $this->modelorgaos->updateorgao($orgao, $id);
            
            if(is_null($res))
            {
                $data['type']='Não foi possísel cadastrar órgão.';
                $this->load->view('backend/error', $data);
            }
            redirect(base_url('orgaos'));
        }
        
    }

}