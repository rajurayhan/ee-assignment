<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends CI_Model { 

    function __construct(){
        parent::__construct();
    }
    
    public function getActiveProducts(){
        $products = $this->db->get_where('products', ['status' => 1]);
        return $products->num_rows();
    }

    public function productWithNoUser(){
        $this->db->select('products.id');
        $this->db->from('products');
        $this->db->join('user_has_product', 'products.id = user_has_product.product_id', 'left'); 
        $this->db->where('products.status', 1);
        $this->db->where('user_has_product.product_id IS NULL');
        $query = $this->db->get();
        return $query->num_rows();
    }
}