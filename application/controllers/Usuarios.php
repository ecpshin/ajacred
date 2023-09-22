<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Description of Usuarios
 *
 * @author Francisco Shin
 */
class Usuarios extends CI_Controller
{
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
        $data['titulo']='AJACRED';
        $data['subtitulo']='Painel de Administração';
        $data['view']='Usuários';
        $data['page']='Central de Usuários';
        $data['lista']= $this->modelusuarios->getallusuarios();
                
        $this->load->view('backend/templates/html-header', $data);
        $this->load->view('backend/templates/top-navbar');
        $this->load->view($this->sidebar);        
        $this->load->view('backend/users/lista');
        $this->load->view('backend/templates/content-footer');
        $this->load->view('backend/templates/html-footer');
     }
     
     /*Registrar no membro*/
     public function register()
     {        
        $data['titulo']='AJACRED';
        $data['subtitulo']='Painel de Administração';
        $data['view']='Usuários';
        $data['page']='Cadastro de Usuário';
        $data['lista']= $this->modelusuarios->getallusuarios();
                
        $this->load->view('backend/templates/html-header', $data);
        $this->load->view('backend/templates/top-navbar');
        $this->load->view($this->sidebar);        
        $this->load->view('backend/users/registro');
        $this->load->view('backend/templates/content-footer');
        $this->load->view('backend/templates/html-footer');
     }
     
     /* Atualiza dados do usuário*/
     public function update_user($id)
     {        
        if(!isset($id))
        {
             $id=1;
        }
        
        $data['titulo']='AJACRED';
        $data['subtitulo']='Painel de Administração';
        $data['view']='Usuários';
        $data['page']='Atualizar Usuário';
        
        $this->load->view('backend/templates/html-header', $data);
        $this->load->view('backend/templates/top-navbar');
        $this->load->view($this->sidebar);        
        $this->load->view('backend/users/editar');
        $this->load->view('backend/templates/content-footer');
        $this->load->view('backend/templates/html-footer');
     }

    public function profile($id)
    {
        if(!isset($id))
        {
             $id=1;
        }
        
        $data['titulo']='AJACRED';
        $data['subtitulo']='Painel de Administração';
        $data['view']='Perfil de Usuário';
        $data['page']='Perfil';
        $data['user']=$this->modelusuarios->getUserByID($id);
        
        $this->load->view('backend/templates/html-header', $data);
        $this->load->view('backend/templates/top-navbar');
        $this->load->view($this->sidebar);        
        $this->load->view('backend/users/profile');
        $this->load->view('backend/templates/content-footer');
        $this->load->view('backend/templates/html-footer');
    }
    
    public function forgot($id) {
               
        $data['titulo']='AJACRED';
        $data['subtitulo']='Painel de Administração';
        $data['view']='Usuários';
        $data['page']='Recupera Senha';
        $data['user_id']=$id;
        
        $this->load->view('backend/templates/html-header', $data);
        $this->load->view('backend/templates/top-navbar');
        $this->load->view($this->sidebar);        
        $this->load->view('backend/users/forgot');
        $this->load->view('backend/templates/content-footer');
        $this->load->view('backend/templates/html-footer');
    }
    
    public function recuperar_senha() {
        $id = $this->input->post('id-user');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('user-senha', 'Senha', 'required|min_length[3]');
        $this->form_validation->set_rules('confirme-senha', 'Confirme a Senha', 'required|matches[user-senha]');
        
        if($this->form_validation->run()==FALSE){
            $this->forgot($id);
        } else {
            $data['user_senha']=sha1($this->input->post('user-senha'));
            $this->modelusuarios->recuperaSenha($data, $id);
            
            redirect(base_url('usuarios'), 'refresh');
        }
    }
    
    public function salvar()
    {
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('user-nome', 'Nome Completo', 'required');
        $this->form_validation->set_rules('user-email', 'E-mail', 'required|valid_email|is_unique[tb_usuarios.user_email]');
        $this->form_validation->set_rules('user-login', 'Login', 'required|is_unique[tb_usuarios.user_login]');
        $this->form_validation->set_rules('user-senha', 'Senha', 'required');
        $this->form_validation->set_rules('confirme-senha', 'Confirme a Senha', 'required|matches[user-senha]');
        
        if($this->form_validation->run()==FALSE){ 
            $this->register();
        } else {
            $senha = sha1($this->input->post('user-senha'));
            
            $user['user_nome']= $this->input->post('user-nome');
            $user['user_email']= $this->input->post('user-email');
            $user['user_login']= $this->input->post('user-login');
            $user['user_senha']= $senha;
            $user['user_img']= 'assets/img/user2.jpg';
            $user['user_nivel']= $this->input->post('user-nivel');
            
            $res = $this->modelusuarios->insertNewUser($user);
            
            if($res>0){
                redirect(base_url('admin'));
            } else {
                echo 'Erro ao inserir dados do usuário';
            }            
        }
        
    }
     
     
}
