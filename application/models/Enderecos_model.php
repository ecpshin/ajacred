<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Logradouros_model
 *
 * @author Francisco Shin
 */
class Enderecos_model extends CI_Model {
    
    public $logradouro;
    public $complemento;
    public $bairro;
    public $municipio;
    public $uf;
    public $cep;
    public $cliente;
    
    public function __construct()
    {
        parent::__construct();
    }
    
    public function getbyclienteID($id) {
        $this->db->where('sha1(cliente)', $id);
        return $this->db->get('tb_endereco')->result();
    }
    
    public function insertdata($data)
    {
       return $this->db->insert('tb_endereco', $data);
    }
    
    public function update_endereco($obj, $id)
    {
        $this->db->where('sha1(cliente)', $id);
        return $this->db->update('tb_endereco', $obj);
    }
}
