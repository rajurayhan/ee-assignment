<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends CI_Model { 

    function __construct(){
        parent::__construct();
    }
    
    public function getActiveProducts(){
        $users = $this->db->get_where('products', ['status' => 1]);
        return $users->num_rows();
    }
}