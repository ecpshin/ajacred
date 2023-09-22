<?php defined('BASEPATH') or exit ('No Direct script access allowed!');
/**
 * Description of Autenticacao
 * 
 * Este Controller é responsável somente pela autenticação
 * e logout de usuário do sistema
 *
 * @author Francisco Shin
 */
class Autenticacao extends CI_Controller
{
    
    public function __construct() {
        
        parent::__construct();
    }
    
    public function index()
    {
        $dados['titulo']='AJACRED';
        $dados['subtitulo']='Página de Login';
        $this->load->view('templates/login-html-header', $dados);
        $this->load->view('login');
        $this->load->view('templates/login-html-footer');
    }
    
    public function autenticar_usuario(){
        
        $this->load->helper('funcoes');
        $this->load->library('form_validation');        
        $this->load->model('usuarios_model', 'modelusuarios');
        
        $this->form_validation->set_rules('userlogin', 'Login', 'required|min_length[5]');
        $this->form_validation->set_rules('userpassword', 'Senha', 'required|min_length[3]');
        
        if($this->form_validation->run()==false){
            $this->index();
        } else {
           
           $data_login['user_login'] = $this->input->post('userlogin');
           $data_login['user_senha'] = $this->encrytp_senha($this->input->post('userpassword'));
                      
           $user_logado = $this->modelusuarios->user_login($data_login);
                          
           if(count($user_logado)!=0)
           {
               $pretorian['pretorian']=$user_logado[0];               
               $pretorian['loggedin']= true;               
               $this->session->set_userdata($pretorian);               
               redirect(base_url('admin'));
           } else {
               redirect(base_url('autenticacao'), 'refresh');
           }
        }        
    }
    
    public function encrytp_senha($cripto) 
    {   
        return sha1($cripto);
    }
    
    public function logout() {
        
        if($this->session->get_userdata('loggedin')){
            
            $pretorian['pretorian']=NULL;
            $pretorian['loggedin']=FALSE;
            
            $this->session->set_userdata($pretorian);
            
            redirect(base_url('login'), 'refresh');
        }
    }
        
}
