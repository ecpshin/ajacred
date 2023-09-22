<?php
defined('BASEPATH') or exit('Acesso direto ao script não permitido!');
/**
 * Description of Situacoes_model
 *
 * @author Francisco Shin
 */
class Situacoes_model extends CI_Model{
    
    public $id_situacao;
    public $descricao;
    
    public function __construct() {
        parent::__construct();
    }
    
    public function getAllSituacoes() {
        $this->db->order_by('descricao', 'ASC');
        return $this->db->get('tb_situacoes')->result();
    }
    
    public function getSituacaoByID($id) {
        $this->db->where('sha1(id_situacao)', $id);
        return $this->db->get('tb_situacoes')->result();
    }
    
    public function insertSituacao($params) {
        return $this->db->insert('tb_situacoes', $params);
    }
    
    public function updateSituacao($params, $id) {
        $this->db->where('sha1(id_situacao)', $id);
        return $this->db->update('tb_situacoes', $params);
    }
    
    public function deleteSituacao($id) {
        $this->db->where('sha1(id_situacao)', $id);
        return $this->db->delete('tb_situacoes');
    }
    
}
