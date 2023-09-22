<?php
defined('BASEPATH') or exit('No script direct access allowed!');
/**
 * Description of Home
 *
 * @author Francisco Shin
 */
class Home extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
    }
    
    public function index(){
    
        $this->load->view('templates/html-header');
        $this->load->view('home');
        $this->load->view('templates/html-footer');
    }   
    
}
