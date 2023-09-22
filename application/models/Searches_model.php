<?php defined('BASEPATH') or exit ('Não é permitido acesso direto ao script!');

/**
 * Description of Bancos_model
 *
 * @author Francisco Shin
 */
class Searches_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getclientebycpf($cpf){
        $this->db->select('id_cliente, nome');
        $this->db->where('cpf', $cpf);
        $res = $this->db->get('tb_clientes')->result();
        return $res[0];
    }

    public function getbankbycode($code){
        $this->db->select('codigo, banco');
        $this->db->where('codigo', $code);
        $r = $this->db->get('tb_bancos')->result();
        return $r[0];
    }
    
    public function getbancariosid($cliente) {
        $this->db->select('bancarios_id_bancario AS id');
        $rs=$this->db->get('clientes_has_bancarios')->result();
        return $rs[0];
    }
    public function getfuncionaisid($cliente) {
        $this->db->select('funcionais_id_funcional AS id');
        $rs=$this->db->get('clientes_has_funcionais')->result();
        return $rs[0];
    }
    
    public function client_has_contratos($data){
        return $this->db->insert('clientes_has_contratos', $data);
    }
    
    public function delete_contrato_cliente($id){
        $this->db->where('sha1(contratos_pid_contrato)', $id);
        return $this->db->delete('clientes_has_contratos');        
    }

    public function client_has_contract_update($data, $id){
        $this->db->where('contratos_pid_contrato', $id);
        return $this->db->update('clientes_has_contratos', $data);
    }
    
    public function client_has_bancarios($data){
        return $this->db->insert('clientes_has_bancarios', $data);
    }
    
    public function client_has_funcionais($data){
        return $this->db->insert('clientes_has_funcionais', $data);
    }
    
    public function contratos_has_orgao($data){
        return $this->db->insert('contratos_has_orgaos', $data);
    }

    public function delete_contrato_orgao($pid){
        $this->db->where('sha1(contratos_pid)', $pid);
        return $this->db->delete('contratos_has_orgaos');
    }
    
    public function cliente_has_orgao($data){
        return $this->db->insert('cliente_has_orgao', $data);
    }
    
    public function cliente_has_orgao_update($data, $id){
        $this->db->where('cliente_id', $id);
        return $this->db->update('cliente_has_orgao', $data);
    }

    public function orgaoclientok($valor){
        $param = ['cliente_id'=>$valor];
        $this->db->where($param);
        $rs = $this->db->get('cliente_has_orgao')->result();
        
        if(count($rs)>0){
           return true; 
        } else {
           return false; 
        }
    }
}