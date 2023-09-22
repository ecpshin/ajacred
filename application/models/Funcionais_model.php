<?php defined('BASEPATH') or exit('Acesso direto ao scritp não permitido!');

class Funcionais_model extends CI_Model{
    
    public $id;
    public $phone1;
    public $phone2;
    public $phone3;
    public $phone4;
    public $emails;
    public $senhas;
    
    public function __construct() {
        parent::__construct();
    }
        
    public function insert($data)
    {
        $this->db->insert('tb_funcionais', $data);
        return $this->db->insert_id();
    }    
    
    public function update_funcional($data, $id)
    {
        $this->db->where('sha1(id_funcional)', $id);
        return $this->db->update('tb_funcionais', $data);
    }
    
    public function getbyclienteid($idcliente)
    {
        $this->db->where($idcliente);
        return $this->db->get('tb_funcionais')->result();
    }
    
    public function getinformacoes()
    {
        $this->db->order_by('nome', 'ASC');
        return $this->db->get('vw_infos')->result();
    }
    
    public function funcionaisbyid($id) {
        
        $this->db->where('sha1(id_cliente)', $id);
        $rs=$this->db->get('view_dados_funcionais')->result();
        return (count($rs)>0) ? $rs[0] : null;
    }
    
    public function infofuncionais() {
        return $this->db->get('view_dados_funcionais')->result();
    }
}
