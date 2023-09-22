<?php
defined('BASEPATH') or exit('Acesso direto ao script não permitido!');
/**
 * Description of Financeiras_model
 *
 * @author Francisco Shin
 */
class Financeiras_model extends CI_Model{
    
    public $id_financeira;
    public $nome_financeira;
    public $tipo_financeira;
    
    public function __construct() {
        parent::__construct();
    }
    
    public function getAllFinanceiras(){
        $this->db->order_by('nome_financeira', 'ASC');
        return $this->db->get('tb_financeiras')->result();
    }
    
    public function getFinanceiraByID($id){
        $this->db->where('id_financeira', $id);
        return $this->db->get('tb_financeiras')->result();
    }
    
    public function insertFinanceira($data){
        return $this->db->insert('tb_financeiras', $data);
    }
    
    public function updateFinanceira($data, $id){
        $this->db->where('id_financeira', $id);
        return $this->db->update('tb_financeiras', $data);
    }
    
    public function deleteFinanceira($id){
        $this->db->where('id_financeira', $id);
        return $this->db->delete('tb_financeiras');
    }
}
