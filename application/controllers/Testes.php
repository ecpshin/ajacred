<?php

class Testes extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
    }
    
    public function index() {
        
    }
    
    public function cadastrar(){
        $cliente = [
            'nome' => $this->input->post('txt-nome'),
            'cpf' => $this->input->post('txt-cpf'),
            'rg '=> $this->input->post('txt-rg'),
            'rg_exp' => $this->input->post('data-exp'),
            'nascimento' => $this->input->post('txt-nasceu'),
            'naturalidade'=> $this->input->post('txt-naturalde'),
            'genitora'=>$this->input->post('txt-mae'),
            'genitor'=>$this->input->post('txt-pai'),
            'sexo' => $this->input->post('txt-genero'),
            'estado_civil ' => $this->input->post('txt-civil')
        ];
        
        $residenciais = [
            'cep' => $this->input->post('txt-cep'),
            'logradouro' => $this->input->post('txt-logradouro'),
            'complemento' => $this->input->post('txt-complemento'),
            'bairro' => $this->input->post('txt-bairro'),
            'municipio' => $this->input->post('txt-cidade'),
            'uf' => $this->input->post('txt-uf'),
            'cliente' => $cliente
        ];
        
        $funcionais=[
            'nrbeneficio' => $this->input->post('txt-matricula'),
            'phone1' => $this->input->post('txt-phone1'),
            'phone2' => $this->input->post('txt-phone2'),
            'phone3' => $this->input->post('txt-phone3'),
            'phone4' => $this->input->post('txt-phone4'),
            'emails' => $this->input->post('txt-email'),
            'emails' => $this->input->post('txt-senha')
        ];
        
        $bancarios=[
            'accbanco' => $this->input->post('txt-banco'), 
            'accagencia' => $this->input->post('txt-agencia'), 
            'accnr' => $this->input->post('txt-nrconta'),
            'acctipo' =>$this->input->post('txt-tipo'), 
            'accoperacao' =>$this->input->post('txt-operacao') 
        ];
        $contrato = [
            'nrcontrole' => $this->input->post('nr-controle'), 
            'nrcontrato' => $this->input->post('nr-contrato'), 
            'digitacao' => $this->input->post('digitado'),
            'finalizacao' => $this->input->post('previsto'),
            'prazo' => $this->input->post('previsto'),
            'total' => $this->input->post('id-operacao'),
            'parcela' => $this->input->post('id-orgao'),
            'liquido' => $this->input->post('txt-nrconta'),
            'referencia' => $this->input->post('previsto'),
            'tabela' =>$this->input->post('tabelac'), 
            'percentual' => $this->input->post('previsto'),
            'comissao' => $this->input->post('previsto'),
            'observacoes' =>$this->input->post('observacoes'),
            'operacao' => $this->input->post('previsto'),
            'financeira' => $this->input->post('previsto'),
            'correspondente' => $this->input->post('previsto'),
            'finalizacao' => $this->input->post('previsto'),
            'finalizacao' => $this->input->post('previsto'),
            'usuario' => $this->input->post('user-id')
        ];
        echo '<pre>';
        print_r($cliente);
        print_r($residenciais);
        print_r($funcionais);
        print_r($bancarios);
        print_r($contrato);
               
    }
    
    
}

