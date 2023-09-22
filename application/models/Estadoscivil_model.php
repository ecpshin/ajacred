<?php defined('BASEPATH') or exit('Acesso direto ao script não permitido!');
/**
 * Description of Estadoscivil_model
 *
 * @author Francisco Shin
 */
class Estadoscivil_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function getAllEstadoscivil(){
        $this->db->order_by('descricao', 'ASC');
        return $this->db->get('tb_estadoscivil')->result();
    }
    
    public function getEstadoscivilByID($id){
        $this->db->where($id);
        return $this->db->get('tb_estadoscivil')->result();
    }
    
    public function insertEstadocivil($obj) {
        return $this->db->insert('tb_estadoscivil', $obj);
    }
    
    public function updateEstadocivil($obj, $id) {
        $this->db->where($id);
        return $this->db->update('tb_estadoscivil', $obj);
    }
    
}
