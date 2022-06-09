<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_product_model extends CI_Model { 

    function __construct(){
        parent::__construct();
    }
    
    public function getActiveAndVerifiedUsersWithActiveProducts(){
        $this->db->select('users.id');
        $this->db->from('user_has_product');
        $this->db->join('products', 'products.id = user_has_product.product_id');
        $this->db->join('users', 'users.id = user_has_product.user_id');
        $this->db->where('users.status', 1);
        $this->db->where('users.email_verified_at is NOT NULL');
        $this->db->where('products.status', 1);
        $this->db->group_by('users.id');
        $query = $this->db->get();
        return $query->num_rows();
    }
}