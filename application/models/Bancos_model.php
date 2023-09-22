<?php defined('BASEPATH') or exit ('Não é permitido acesso direto ao script!');

/**
 * Description of Bancos_model
 *
 * @author Francisco Shin
 */
class Bancos_model extends CI_Model {
    
    public $id_financeira;
    public $nome_financeira;
    public $tipo_financeira;
    
    public function __construct() {
        parent::__construct();
    }
    
    public function getallfinanceiras(){
        $this->db->order_by('nome_financeira', 'ASC');
        return $this->db->get('tb_financeiras')->result();
    }
    
    public function getfinanceirabyid($id){        
        $this->db->where('id_financeira', $id);
        return $this->db->get('tb_financeiras')->result();
    }
    
    public function insertfinanceira($data){
        return $this->db->insert('tb_financeiras', $data);       
    }
    
    public function updatefinanceira($data, $id)
    {        
        $this->db->where('id_financeira', $id);
        return $this->db->update('tb_financeiras', $data);        
    }
    
    public function deletebank($id)
    {
        $this->db->where('id_fin', $id);
        $this->db->delete('tb_finaceiras');
    }
       
    
}
