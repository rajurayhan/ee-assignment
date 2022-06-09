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

    public function countSelectedActiveProducts(){
        $this->db->select_sum('user_has_product.quantity','quantity');
        $this->db->from('user_has_product');
        $this->db->join('products', 'products.id = user_has_product.product_id');
        $this->db->where('products.status', 1); 
        $query = $this->db->get();
        return $query->row()->quantity;
    }

    public function getSummerizedQuantityAndPriceValue(){ 
        $this->db->select('SUM(user_has_product.quantity * user_has_product.price) as summerized_total');
        $this->db->from('user_has_product');
		$this->db->join('products', 'products.id = user_has_product.product_id');
		$this->db->where('products.status', 1); 
        $query = $this->db->get();
        return $query->row()->summerized_total;
    }

    public function userWiseTotalPrice(){
        $this->db->select('users.name as name, SUM(price*quantity) as total_price');
        $this->db->from('user_has_product'); 
        $this->db->join('users', 'users.id = user_has_product.user_id');
        $this->db->where('users.status', 1);
        $this->db->where('users.email_verified_at is NOT NULL');
        $this->db->group_by('users.id');
        $query = $this->db->get()->result_array();

        return $query;
    }
}
