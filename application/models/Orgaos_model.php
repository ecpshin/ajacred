<?php 
defined('BASEPATH') or exit('Acesso direto ao scritp não permitido!');
/**
 * Description of Orgaos_model
 *
 * @author Francisco Shin
 */
class Orgaos_model extends CI_Model
{
    public $id_orgao;
    public $nome_orgao;
    public $tipo_orgao;
    
    public function __construct() {
        parent::__construct();
    }
    
    public function getallorgaos()
    {
        $this->db->order_by('nome_orgao', 'ASC');
        return $this->db->get('tb_orgaos')->result();
    }
    
    public function getorgaobyid($id)
    {
        $this->db->where('id_orgao', $id);
        return $this->db->get('tb_orgaos')->result();
    }   
    
    public function insertorgao($orgao) {
        return $this->db->insert('tb_orgaos', $orgao);
    }
    
    public function updateorgao($orgao, $id)
    {
        $this->db->where('id_orgao', $id);
        return $this->db->update('tb_orgaos', $orgao);
    }
    
    public function delete($id)
    {
        $this->db->where('id_orgao', $id);
        return $this->db->delete('tb_orgaos');
    }
}
