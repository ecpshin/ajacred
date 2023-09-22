<?php
defined('BASEPATH') or exit('No direct script access allowed!');
/**
 * Description of Correspondentes_model
 *
 * @author Francisco Shin
 */
define('TABLE', 'tb_correspondentes');

class Correspondentes_model extends CI_Model{
    
    public $id;
    public $nome;
    
    public function getallcorrespondentes(){
        $this->db->order_by('nome', 'ASC');
        return $this->db->get(TABLE)->result();
    }
    
    public function getCorrespondentebyID($id){
        $this->db->where('sha1(id)', $id);
        return $this->db->get(TABLE)->result();
    }
    
    public function insertcorrespondente($obj){
        return $this->db->insert(TABLE, $obj);
    }
    
    public function updatecorrespondente($obj, $id){
        $this->db->where('sha1(id)', $id);
        return $this->db->update(TABLE, $obj);
    }
    
    public function deleteCorrespondente($id){
        $this->db->where('id', $id);
        return $this->db->delete(TABLE);
    }
}
