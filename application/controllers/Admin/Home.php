<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Description of Home
 *
 * @author Francisco Shin
 */
class Home extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        
        $this->load->helper('funcoes');
        $nivel=$this->session->userdata('pretorian')->user_nivel;
        $logged=$this->session->userdata('loggedin');
        
        if(!userlevel($nivel, $logged))
        {
            redirect(base_url('autenticacao'));
        }
        
        $this->load->model('usuarios_model', 'modelusuarios');
        $this->sidebar = menu($nivel);
    }
    
    public function index()
    {
        $this->load->model('contratos_model');
        $this->load->helper('funcoes');
        $data['titulo']='AJACRED';
        $data['subtitulo']='Painel de Administração';
        $data['view']='Home';
        $data['page']='Ferramentas';
        $data['informacoes'] = $this->contratos_model->getsituacoes($this->session->userdata('pretorian')->user_id);
                
        $this->load->view('backend/templates/html-header', $data);
        $this->load->view('backend/templates/top-navbar');
        $this->load->view($this->sidebar);
        $this->load->view('backend/users/home');        
        $this->load->view('backend/templates/content-footer');
        $this->load->view('backend/templates/html-footer');
    }
    
    public function usuarios_registrados(){
        
        $data['listausers'] = $this->modelusuarios->getallusuarios();        
        $data['titulo']='AJACRED';
        $data['subtitulo']='Painel de Administração';
        $data['view']='Home';
        $data['page']='Ferramentas';
                
        $this->load->view('backend/templates/html-header', $data);
        $this->load->view('backend/templates/top-navbar');
        $this->load->view($this->sidebar);
        $this->load->view('backend/users/page_users');        
        $this->load->view('backend/templates/content-footer');
        $this->load->view('backend/templates/html-footer');
    }
    
}
