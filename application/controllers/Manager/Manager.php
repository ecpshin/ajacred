<?php
defined('BASEPATH') or exit('No Direct script access allowed!');

/**
 * Description of Manager - Controlador das funções de usuários sem permissões 
 * adminstrativas
 *
 * @author Francisco Shin
 */
class Manager extends CI_Controller {

    public function __construct() {

        parent::__construct();

        if (!$this->session->userdata('loggedin') &&
                !strcmp($this->session->userdata('pretorian')->user_nivel, 'ROLE_USER')) {
            redirect(base_url('login'));
        }
    }

    public function index() {
        
        $this->load->helper('funcoes');

        $data['titulo'] = 'AJACRED';
        $data['subtitulo'] = 'Painel de Administração';
        $data['view'] = 'Home';
        $data['page'] = 'Ferramentas';

        $this->load->view('backend/templates/html-header', $data);
        $this->load->view('backend/templates/top-navbar');
        $this->load->view('backend/templates/user/sidebar-menu');
        //$this->load->view('backend/templates/content-header');
        $this->load->view('backend/home-user');
        $this->load->view('backend/templates/content-footer');
        $this->load->view('backend/templates/html-footer');
    }

    public function profile($user){
        $data['user_id']=$user;
        print_r($data);
    }

}
