<?php 
defined('BASEPATH') or exit('Acesso direto ao scritp não permitido!');
/**
 * Description of Operacoes_model
 *
 * @author Francisco Shin
 */
class Operacoes_model extends CI_Model
{
    public $operacao_id;
    public $descricao;
    
    public function __construct() {
        parent::__construct();
    }
    
    public function delete($id) {
        $this->db->where($id);
        return $this->db->delete('tb_operacoes');
    }

    public function getall() {
        $this->db->order_by('descricao', 'ASC');
        return $this->db->get('tb_operacoes')->result();
    }

    public function getbyid($id) {
        $this->db->where('sha1(id_operacao)', $id);
        return $this->db->get('tb_operacoes')->result();
    }

    public function insert($obj) {
        return $this->db->insert('tb_operacoes', $obj);
    }

    public function update($obj, $id) {
        $this->db->where('sha1(id_operacao)', $id);
        return $this->db->update('tb_operacoes', $obj);
    }

}
