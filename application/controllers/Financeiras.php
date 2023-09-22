<?php defined('BASEPATH') or exit ('Não é permitido acesso ao script!');
/**
 * Description of Bancos
 *
 * @author Francisco Shin
 */
class Financeiras extends CI_Controller
{
    
    public function __construct(){

        parent::__construct();
        
        $this->load->helper('funcoes');
        $nivel=$this->session->userdata('pretorian')->user_nivel;
        $logged=$this->session->userdata('loggedin');
        
        if(!userlevel($nivel, $logged)){
           redirect(base_url('autenticacao'));
        }
        $this->sidebar = menu($nivel);
        $this->load->model('financeiras_model', 'modelfinanceiras');
    }
        
    public function index(){
        
        $data['titulo']='AJACRED';
        $data['subtitulo']='Painel de Administração';
        $data['home']='Home';
        $data['view']='Insituições Financeiras';
        $data['page']='Intituições Financeiras Cadastradas';
        $data['financeiras']= $this->modelfinanceiras->getAllFinanceiras();
       
        $this->load->view('backend/templates/html-header', $data);
        $this->load->view('backend/templates/top-navbar');
        $this->load->view($this->sidebar);
        $this->load->view('backend/financeiras/lista');
        $this->load->view('backend/templates/content-footer');
        $this->load->view('backend/templates/html-footer');
    }
    
    public function nova(){        
        
        $data['titulo']='AJACRED';
        $data['home']='Home';
        $data['subtitulo']='Painel de Administração';
        $data['view']='Instituições Financeiras';
        $data['page']='Cadastrar Instituição Financeira';
        
        $this->load->view('backend/templates/html-header', $data);
        $this->load->view('backend/templates/top-navbar');
        $this->load->view($this->sidebar);
        $this->load->view('backend/financeiras/cadastro');
        $this->load->view('backend/templates/content-footer');
        $this->load->view('backend/templates/html-footer');
    }
    
    public function editar($id){        
        
        $data['titulo']='AJACRED';
        $data['home']='Home';
        $data['subtitulo']='Painel de Administração';
        $data['view']='Intituições Financeiras';
        $data['page']='Editar Instituição Financeira';
        $data['financeira']= $this->modelfinanceiras->getFinanceiraByID($id);
        
        $this->load->view('backend/templates/html-header', $data);
        $this->load->view('backend/templates/top-navbar');
        $this->load->view($this->sidebar);
        $this->load->view('backend/financeiras/editar');
        $this->load->view('backend/templates/content-footer');
        $this->load->view('backend/templates/html-footer');
    }
    
    public function salvar(){
        
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('nome-financeira', 'Nome da Instituição Financeira', 'required|is_unique[tb_financeiras.nome_financeira]');
        $this->form_validation->set_rules('tipo-financeira', 'Tipo', 'required');
        
        if($this->form_validation->run()==FALSE){
            $this->nova();
        } else {            
            $data['nome_financeira'] = $this->input->post('nome-financeira');
            $data['tipo_financeira'] = $this->input->post('tipo-financeira');
            
            $rows=$this->modelfinanceiras->insertFinanceira($data);
            
            if($rows > 0){
                redirect(base_url('financeiras'),'refresh');
            }
        }
    }
    
    public function atualizar(){
        
        $idfin = $this->input->post('id-financeira');
        $data['nome_financeira'] = $this->input->post('nome-financeira');
        $data['tipo_financeira'] = $this->input->post('tipo-financeira');
        
        $this->modelfinanceiras->updatefinanceira($data, $idfin);
        
        redirect(base_url('financeiras'), 'refresh');
    }   
    
}
