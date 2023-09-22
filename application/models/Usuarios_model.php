<?php

/**
 * Description of Usuarios_model
 *
 * @author Francisco Shin
 */
class Usuarios_model extends CI_Model{
    
    public $user_id;
    public $user_nome;
    public $user_email;
    public $user_login;
    public $user_senha;
    public $user_img;
    public $user_nivel;
    public $user_regdate;
           
    public function __construct()
    {
        parent::__construct();
    }
    
    public function getallusuarios(){
        $this->db->order_by('user_nome', 'ASC');
        return $this->db->get('tb_usuarios')->result();
    }

    function getUserByID($id){
        $this->db->where('user_id', $id);
        return $this->db->get('tb_usuarios')->result();
    }
    
    public function user_login($param) {
        $this->db->where($param);
        return $this->db->get('tb_usuarios')->result();
    }
    
    public function insertNewUser($data)
    {
        return $this->db->insert('tb_usuarios', $data);
    }
    
    public function recuperaSenha($obj, $id){
        $this->db->where('sha1(user_id)', $id);
        return $this->db->update('tb_usuarios', $obj);
    }

    public function noadmins($id){
        $this->db->where('user_id', $id);
        return $this->db->get('tb_usuarios')->result();
    }
}
