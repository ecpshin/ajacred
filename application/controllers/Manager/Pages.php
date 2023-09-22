<?php defined('BASEPATH') or exit('No Script direct access allowed!');
/**
 * Description of Pages
 *
 * @author Francisco Shin
 */
class Pages extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function index()
    {
       $level = $this->session->userdata('pretorian')->user_nivel;
       
       switch ($level)
       {
           case 'ROLE_ADMIN': 
               $this->page_admin();
               break;
           case 'ROLE_USER': 
               $this->page_user();
               break;
           default:
               redirect(base_url('login'));
               break;
       }
    }

    public function error($tipo)
    {
        $data['tipo'] = $tipo;
        $data['mensagem'] = 'Aconteceu um erro no servidor!';
        
        $this->load->view('backend/error', $data);
    }
    
    public function page_admin()
    {
        redirect(base_url('admin'));
    }
    
    public function page_user()
    {
        redirect(base_url('admin'));
    }

    public function page_error($error=NULL)
    {
        $data['type']=$error.'Cadastro';
        $data['mensagem']='';
        $this->load->view('backend/error', $data);
    }
}
