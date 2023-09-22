<?php defined('BASEPATH') or exit('Acesso direto ao script não permitido!');
/**
 * Description of EstadosCivil
 *
 * @author Francisco Shin
 */
class Estadoscivil extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
        $this->load->helper('funcoes');
        
        $nivel=$this->session->userdata('pretorian')->user_nivel;
        $logged=$this->session->userdata('loggedin');
        
        if(!userlevel($nivel, $logged))
        {
           redirect(base_url('autenticacao'));
        }

        $this->sidebar = menu($nivel);
        $this->load->model('estadoscivil_model', 'modelestadoscivil');
    }
    
    public function index()
    {
        $data['titulo']='AJACRED';
        $data['subtitulo']='Painel de Administração';
        $data['view']='Estado Civil';
        $data['page']='Estados Civil';        
        $data['ecivis'] = $this->modelestadoscivil->getAllEstadoscivil();
        
        $this->load->view('backend/templates/html-header', $data);
        $this->load->view('backend/templates/top-navbar');
        $this->load->view($this->sidebar);        
        $this->load->view('backend/ecivil/lista');
        $this->load->view('backend/templates/content-footer');
        $this->load->view('backend/templates/html-footer');
    }
    
    public function novo()
    {
        $data['titulo']='AJACRED';
        $data['subtitulo']='Painel de Administração';
        $data['view']='Estado Civil';
        $data['page']='Cadastrar Estado Civil';        
                
        $this->load->view('backend/templates/html-header', $data);
        $this->load->view('backend/templates/top-navbar');
        $this->load->view($this->sidebar);        
        $this->load->view('backend/ecivil/cadastro');
        $this->load->view('backend/templates/content-footer');
        $this->load->view('backend/templates/html-footer');
    }
    
    public function editar($id)
    {
        $data['titulo']='AJACRED';
        $data['subtitulo']='Painel de Administração';
        $data['view']='Estado Civil';
        $data['page']='Editar Estado Civil';        
        $data['obj']=$this->modelestadoscivil->getEstadoscivilByID(array('id'=>$id));
        
        $this->load->view('backend/templates/html-header', $data);
        $this->load->view('backend/templates/top-navbar');
        $this->load->view($this->sidebar);        
        $this->load->view('backend/ecivil/editar');
        $this->load->view('backend/templates/content-footer');
        $this->load->view('backend/templates/html-footer');
    }
        
    public function salvar()
    {
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('txt-descricao', 'Descrição', 'required|min_length[3]|is_unique[tb_estadoscivil.descricao]');
        
        if($this->form_validation->run()==FALSE){
            $this->novo();
        } 
        else {
            $obj['descricao'] = $this->input->post('txt-descricao');
            
            $res = $this->modelestadoscivil->insertEstadocivil($obj);
            
            if(is_null($res)){
                $vars['type']='Não foi possível atualizar a Descrição do Estado Civil';
                $this->load->view('error', $vars);
            }
            
            redirect(base_url('estadoscivil'));
        }
    }
    public function atualizar()
    {
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('txt-descricao', 'Descrição', 'required|min_length[3]');
        $id = $this->input->post('id-ecivil');
        
        if($this->form_validation->run()==FALSE){
            $this->editar($id);
        } 
        else {
            $obj['descricao'] = $this->input->post('txt-descricao');
            
            $res = $this->modelestadoscivil->updateEstadocivil($obj, array('id'=>$id));
            
            if(is_null($res)){
                $vars['type']='Não foi possível atualizar a Descrição do Estado Civil';
                $this->load->view('error', $vars);
            }
            
            redirect(base_url('estadoscivil'));
        }
    }
}
