<?php defined('BASEPATH') or exit('No direct script access allowed!');
/**
 * Description of Bancarios_model
 *
 * @author Francisco Shin
 */

class Bancarios_model extends CI_Model {
    
    public $accbanco;
    public $accagencia;
    public $accnr;
    public $acctipo;
    public $accoperacao;

    public function __construct() {
        parent::__construct();
    }

    public function insert($obj) {
        $this->db->insert('tb_bancarios', $obj);
        return $this->db->insert_id();
    }

    public function update_bancario($obj, $id) {
        $this->db->where('sha1(id_bco)', $id);
        return $this->db->update('tb_bancarios', $obj);
    }
    
    public function delete($id) {
        $this->db->where('id_bco', $id);                
        return $this->db->delete('tb_bancarios');        
    }

    public function getalldata() {
        $this->db->order_by('accbanco', 'ASC');
        return $this->db->get('tb_bancarios')->result();        
    }

    public function getobjbyid($id) {
        $this->db->where('id_bco', $id);
        return $this->db->get('tb_bancarios')->result();        
    }
    
    public function bancariosbyid($id) {
        $this->db->where('sha1(cliente_id)', $id);
        $rs = $this->db->get('view_dados_bancarios')->result();
        return $rs[0];     
    }
}
