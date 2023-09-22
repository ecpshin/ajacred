<?php 
defined('BASEPATH') or exit('No direct script access allowed!');

/**
 * Description of Contratos_model
 *
 * @author Francisco Shin
 */
class Contratos_model extends CI_Model{
    
    public $pid;
    public $nrcontrole;
    public $date_digitacao;
    public $date_finally;
    public $prazo;
    public $total;
    public $parcela;
    public $liquido;
    public $referencia;
    public $tabela;
    public $percentual;
    public $comissao;        
    public $cliente;
    public $financeira;
    public $correspondente;
    public $situacao;
    public $usuario;
    public $last_update;
    
    public function __construct() {
        parent::__construct();
    }
    
    public function getallcontracts(){
        $this->db->order_by('digitacao', 'DESC');
        return $this->db->get('view_contratos')->result();
    }
    
    public function getcontractbypid($pid){
        $this->db->where('sha1(pid)', $pid);
        return $this->db->get('view_contratos')->result();
    }
    
    public function getcontractbyclient($pid){
        $this->db->where('cliente', $pid);
        return $this->db->get('tb_contratos')->result();
    }
    
    public function getconstractbycorrespondente($pid){
        $this->db->where('correspondente', $pid);
        return $this->db->get('tb_contratos')->result();
    }
    
    public function getcontractbystatus($pid){
        $this->db->where('situacao', $pid);
        return $this->db->get('tb_contratos')->result();
    }
    
    public function getcontractbyuser($user){
        $this->db->where('sha1(usuario)', sha1($user));
        return $this->db->get('view_contratos')->result();
    }
    
    public function getcontractbyInterval($initial, $final){
        $this->db->where('digitacao', $initial);
        $this->db->where('digitacao', $final);
        return $this->db->get('tb_contratos')->result();
    }
    
    public function getbyintervalanduser($inicial, $user)
    {
        $d1 = date('Y-m-d', strtotime($inicial));
        $this->db->where('digitacao >=', $d1);
        $this->db->where('usuario', $user);        
        return $this->db->get('view_contratos')->result();
    }

    public function getintervalanduser($inicial, $op, $user)
    {
        $this->db->select('nome_cliente, cpf_cliente, nr_contract as nrcontrato, nr_vendas, sum(total_contrato) as soma_total, '.
             'sum(liquido_contrato) as soma_liquido, referencia_calculo, tabela_comissao, percentual_comissao, '.
             'valor_comissao, descricao_operacao, nome_financeira, nome_correspondente, user_login'); 
        $this->db->where('digitacao >=', $inicial);
        $this->db->where('operacao_id', $op);
        $this->db->where('sha1(user_id)', sha1($user));
        return $this->db->get('view_comissoes')->result();
    }    
    
    public function insertContract($obj){
        $this->db->insert('tb_contratos', $obj);
        return $this->db->insert_id();
    }
    
    public function updateContract($obj, $pid){
        $this->db->where('sha1(pid)', $pid);
        return $this->db->update('tb_contratos', $obj);
    }
    
    public function deleteContract($pid){
        $this->db->where('sha1(pid)', $pid);
        return $this->db->delete('tb_contratos');
    }
    
    public function getsituacoes($user){
        $this->db->select('count(tc.situacao) AS soma, tc.situacao as id_situacao, ts.descricao as descricao');
        $this->db->from('tb_contratos tc');
        $this->db->join('tb_situacoes ts', 'tc.situacao = ts.id_situacao');
        $this->db->where('usuario', $user);
        $this->db->group_by('situacao');
        $situacoes = $this->db->get();
        return $situacoes->result();
    }
    
    public function getextratosimplificado($id)
    {
        $this->db->where('sha1(id_cliente)', $id);
        $records = $this->db->get('view_extrato_simplificado')->result();
        return (count($records)>0) ? $records : null;
    }
}
