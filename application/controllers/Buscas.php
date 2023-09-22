<?php defined('BASEPATH') or exit('No direct script access allowed!');

class Buscas extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('clientes_model');
        $this->load->model('searches_model');
    }

    public function searching_bank(){
                
        $code = $this->input->post('codigo');
        $res = $this->searches_model->getbankbycode($code);
        echo json_encode($res);
        
    }

    public function searching_client()
    {
        $cpf = $this->input->post('cpf');
        $rs = $this->clientes_model->getidclientbyCpf($cpf);
        echo json_encode($rs);
    }
}

 