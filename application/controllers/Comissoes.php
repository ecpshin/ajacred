<?php
defined('BASEPATH') or exit('No direct script access allowed!');
/**
 * Description of Comissoes
 *
 * @author Francisco Shin
 */
class Comissoes extends CI_Controller {    
    
    public function __construct() {
        parent::__construct();
        
        $this->load->helper(['funcoes', 'conversor']);
        

        $this->nivel = $this->session->userdata('pretorian')->user_nivel;
        $logged = $this->session->userdata('loggedin');

        if (!userlevel($this->nivel, $logged)) {
            redirect(base_url('autenticacao'));
        }
        
        $this->sidebar = menu($this->nivel);

        $this->load->model('comissoes_model');
        $this->load->model('clientes_model');
        $this->load->model('operacoes_model');
        $this->load->model('financeiras_model');
        $this->load->model('correspondentes_model');
        $this->load->model('situacoes_model');
        $this->load->model('usuarios_model');
    }
    
    public function index()
    {   
        $data['titulo'] = 'AJACRED';
        $data['subtitulo'] = 'Painel de Administração';
        $data['view'] = 'Vendas';
        $data['page'] = 'Gerenciamento de Comissões';
        
        if($this->nivel == 'ROLE_ADMIN'){
            $data['comissoes'] = $this->comissoes_model->getlistcomissoes(); 
        } else {
            $data['comissoes'] = $this->comissoes_model->getcomissoesbyid($this->session->userdata('pretorian')->user_id);
        }

        $this->load->view('backend/templates/html-header', $data);
        $this->load->view('backend/templates/top-navbar');
        $this->load->view($this->sidebar);
        $this->load->view('backend/comissoes/vendas');
        $this->load->view('backend/templates/content-footer');
        $this->load->view('backend/templates/html-footer');
    }
    
    public function vendas_periodo()
    {   
        $data['titulo'] = 'AJACRED';
        $data['subtitulo'] = 'Painel de Administração';
        $data['view'] = 'Vendas período';
        $data['page'] = 'Gerenciamento de Comissões';
               
        if($this->nivel == 'ROLE_ADMIN'){
            $data['agentes'] = $this->usuarios_model->getallusuarios(); 
        }
        else {
            $data['agentes'] = $this->usuarios_model->getUserByID($this->session->userdata('pretorian')->user_id);
        }
        
        if(strcmp('Pesquisar', $this->input->post('pesquisar')==0)){
             $data_inicio = $this->input->post('inicio');
             $user_id = $this->input->post('agente');
             $data['comissoes'] = $this->comissoes_model->getcomissoesbyperiodo($data_inicio, $user_id);
        } else {
            $data['comissoes'] = null;
        }        
        
        $this->load->view('backend/templates/html-header', $data);
        $this->load->view('backend/templates/top-navbar');
        $this->load->view($this->sidebar);
        $this->load->view('/backend/comissoes/vendas-periodo');
        $this->load->view('backend/templates/content-footer');
        $this->load->view('backend/templates/html-footer');
    }

    public function search() {
        $this->load->model('comissoes_model');
        $id = $this->input->post('userid');
        $rs = $this->comissoes_model->getcomissoesbyid($id);
        echo json_encode($rs);
    }
}
