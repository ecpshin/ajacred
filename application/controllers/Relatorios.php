<?php
defined('BASEPATH') or exit ('No direct script access allowed');
/**
 * Description of Relatorios
 *
 * @author Francisco Shin
 */
class Relatorios extends CI_Controller {
    
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
        $this->load->model('clientes_model');
        $this->load->model('operacoes_model');
        $this->load->model('financeiras_model');
        $this->load->model('correspondentes_model');
        $this->load->model('situacoes_model');
    }

    public function index() {
        
        $this->load->model('usuarios_model');
        
        $data['titulo'] = 'AJACRED';
        $data['subtitulo'] = 'Painel de Administração';
        $data['view'] = 'Relatórios';
        $data['page'] = 'Gerenciamento de Comissão';
        $data['users']=$this->usuarios_model->getallusuarios();
        $data['contratos'] = null; 
        
        $this->load->view('backend/templates/html-header', $data);
        $this->load->view('backend/templates/top-navbar');
        $this->load->view($this->sidebar);
        $this->load->view('backend/contratos/relatorio-vendas');
        $this->load->view('backend/templates/content-footer');
        $this->load->view('backend/templates/html-footer');
    }
    public function search() {
        
        $this->load->model('usuarios_model');
        
        $flag = $this->input->post('pesquisar');
        $inicio = $this->input->post('inicio');
        $final = $this->input->post('final');
        $id = $this->input->post('id-user');
        
        $data['titulo'] = 'AJACRED';
        $data['subtitulo'] = 'Painel de Administração';
        $data['view'] = 'Relatórios';
        $data['page'] = 'Gerenciamento de Comissão';
        $data['users']=$this->usuarios_model->getallusuarios();
        $data['pesquisar']=$flag;
        
        $data['contratos'] = $this->contratos_model->getbyintervalanduser($inicio, $final, $id); 
 
        $this->load->view('backend/templates/html-header', $data);
        $this->load->view('backend/templates/top-navbar');
        $this->load->view($this->sidebar);
        $this->load->view('backend/contratos/relatorio-vendas');
        $this->load->view('backend/templates/content-footer');
        $this->load->view('backend/templates/html-footer');
 
    }
}
