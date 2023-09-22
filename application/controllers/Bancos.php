<?php defined('BASEPATH') or exit ('Não é permitido acesso ao script!');
/**
 * Description of Bancos
 *
 * @author Francisco Shin
 */
class Bancos extends CI_Controller
{
    
    public function __construct(){

        parent::__construct();

        $this->load->helper('funcoes');
        
        $nivel=$this->session->userdata('pretorian')->user_nivel;
        $logged=$this->session->userdata('loggedin');
        
        if(!userlevel($nivel, $logged))
        {
           redirect(base_url('autenticacao'));
        }

        $this->sidebar = menu($nivel);
        $this->load->model('bancos_model', 'modelbancos');
    }
        
    public function index(){
        
        $data['titulo']='AJACRED';
        $data['subtitulo']='Painel de Administração';
        $data['view']='Bancos';
        $data['page']='Lista de Banco';
        $data['tabela']= $this->modelbancos->getallbanks();
       
        $this->load->view('backend/templates/html-header', $data);
        $this->load->view('backend/templates/top-navbar');
        $this->load->view($this->sidebar);
        $this->load->view('backend/page-bancos');
        $this->load->view('backend/templates/content-footer');
        $this->load->view('backend/templates/html-footer');
    }
    
    public function atualizacao($id, $slug=null){        
        
        $data['titulo']='AJACRED';
        $data['subtitulo']='Painel de Administração';
        $data['view']='Bancos';
        $data['page']='Atualizar Banco';
        $data['banco']= $this->modelbancos->getbankbyid($id);
        
        $this->load->view('backend/templates/html-header', $data);
        $this->load->view('backend/templates/top-navbar');
        $this->load->view($this->sidebar);
        $this->load->view('backend/update-banco');
        $this->load->view('backend/templates/content-footer');
        $this->load->view('backend/templates/html-footer');
    }
    
    public function cadastro(){        
        
        $data['titulo']='AJACRED';
        $data['subtitulo']='Painel de Administração';
        $data['view']='Bancos';
        $data['page']='Cadastrar Banco';
        $data['tabela']= $this->modelbancos->getallbanks();
        
        $this->load->view('backend/templates/html-header', $data);
        $this->load->view('backend/templates/top-navbar');
        $this->load->view($this->sidebar);
        $this->load->view('backend/new-banco');
        $this->load->view('backend/templates/content-footer');
        $this->load->view('backend/templates/html-footer');
    }
    
    public function salvar(){
        
        $this->load->library('form_validation');
        $this->form_validation->set_rules('txt-banco', 'Banco', 'required|is_unique[tb_financeiras.nome_fin]');
        
        if($this->form_validation->run()==FALSE){
            $this->cadastro();
        } else {            
            $data['nome_financeira'] = $this->input->post('txt-banco');
            $data['tipo_financeira'] = $this->input->post('txt-tipo');
            
            $rows=$this->modelbancos->insertbank($data);
            
            if($rows > 0){
                redirect(base_url('bancos'),'refresh');
            }
        }
    }
    
    public function atualizar_banco(){
        
        $idfin = $this->input->post('id-banco');
        $data['nome_fin'] = $this->input->post('nome-banco');
        $data['tipo_fin'] = $this->input->post('tipo-banco');
        
        $this->modelbancos->updatebank($data, $idfin);
        
        redirect(base_url('bancos'));
    }

    public function tipos()
    {
        $tipos = array('BANCO', 'COOPERATIVAO','FINANCEIRA','SEGURADORA');
        echo '<pre>';
        print_r($tipos);
    }
    
    
}
