<?php defined('BASEPATH') or exit('No Script direct access allowed!');
/**
 * Description of Clientes_model
 *
 * @author Francisco Shin
 */
class Clientes_model extends CI_Model {
    
    public $id_cliente;
    public $nome;
    public $cpf;
    public $rg;
    public $rg_exp;
    public $nascimento;
    public $naturalidade;
    public $genitora;
    public $genitor;
    public $sexo;
    public $estado_civil;
    

    public function __construct()
    {
        parent::__construct();
    }

    public function insert($obj) {
        $this->db->insert('tb_clientes', $obj);
        return $this->db->insert_id();
    }

    public function atualiza_cliente($obj, $id) {
        $this->db->where('sha1(id_cliente)', $id);        
        return $this->db->update('tb_clientes', $obj);        
    }
    
    public function delete($id) {
        $this->db->where('sha1(id_cliente)', $id);
        return $this->db->delete('tb_clientes');
    }

    public function getallclients() {
        $this->db->order_by('nome', 'ASC');
        return $this->db->get('tb_clientes')->result();
    }
    public function getminimalinfos() {
        $this->db->select('nome, cpf');
        $this->db->order_by('nome', 'ASC');
        return $this->db->get('tb_clientes')->result();
    }

    public function getclientbyid($id) {
        $this->db->where('sha1(id_cliente)', $id);
        return $this->db->get('tb_clientes')->result();        
    }
    
    
    public function getdadosbancariosbyID($id){
        $this->db->where('sha1(cliente_id)', $id);
        return $this->db->get('view_dados_bancarios')->result();
    }

    public function getdadosfuncionaisbyID($clienteid) {
        $this->db->where('sha1(id_cliente)', $clienteid);
        $rs = $this->db->from('view_dados_funcionais')->get()->result();
        return (count($rs)>0) ? $rs : null;
    }
    
    public function getidclientbyCpf($cpf)
    {
        $this->db->select('id_cliente, nome');
        $this->db->from('tb_clientes');
        $this->db->where('cpf', $cpf);
        $res = $this->db->get()->result();
        return $res[0];
    }
    
    public function getclientbyCpf($cpf)
    {
        $this->db->select('id_cliente, nome');
        $this->db->where('cpf', $cpf);
        $res = $this->db->get('tb_clientes')->result();
        return $res[0];
    }   
}
