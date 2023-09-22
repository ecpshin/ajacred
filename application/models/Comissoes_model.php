<?php
defined('BASEPATH') or exit ('No direct script access alloewd!');

class Comissoes_model extends CI_Model
{
    public $dt_digitacao;
    public $dt_liberacao;
    public $nome_cliente;
    public $cpf_cliente;
    public $orgao_cliente;
    public $nr_vendas;
    public $instituição_financeira;
    public $tipo_contrato;
    public $nome_correspondente;
    public $soma_total;
    public $soma_liquido;
    public $percentual_comissao;
    public $base_calculo;
    public $valor_comissao;
    public $status_contrato;
    public $user_nome;
    public $user_login;
    public $user_id;

    public function __construct()
    {
        parent::__construct();
    }
    
    public function getlistcomissoes()
    {
        $this->db->select('nome_cliente, cpf_cliente, nr_vendas, sum(total_contrato) as soma_total, '.
             'sum(liquido_contrato) as soma_liquido, referencia_calculo, tabela_comissao, percentual_comissao, '.
             'valor_comissao, descricao_operacao, nome_financeira, nome_correspondente, user_login'); 
        $this->db->group_by('nome_financeira, descricao_operacao');
        return $this->db->get('view_comissoes')->result();
    }
    
    public function getcomissoesbyid($id){        
        $this->db->select('digitacao, finalizacao, nome_cliente, cpf_cliente, nr_vendas, sum(total_contrato) as soma_total, '.
             'sum(liquido_contrato) as soma_liquido, referencia_calculo, tabela_comissao, percentual_comissao, '.
             'valor_comissao, descricao_operacao, nome_financeira, nome_correspondente, user_login'); 
        $this->db->where('user_id', $id);
        $this->db->group_by('nome_financeira, descricao_operacao');
        return $this->db->get('view_comissoes')->result();
    }
    
    public function getcomissoesbyperiodo($inicio, $id)
    {
        if(is_null($inicio) || is_null($id)){
            return null;   
        }
        $this->db->select('digitacao, finalizacao, nome_cliente, cpf_cliente, nr_vendas, sum(total_contrato) as soma_total, '.
             'sum(liquido_contrato) as soma_liquido, referencia_calculo, tabela_comissao, percentual_comissao, '.
             'valor_comissao, descricao_operacao, nome_financeira, nome_correspondente, user_login'); 
        $this->db->where('digitacao >=', $inicio);
        $this->db->where('user_id', $id);
        $this->db->group_by('nome_financeira, descricao_operacao');
        return $this->db->get('view_comissoes')->result();
    }
}