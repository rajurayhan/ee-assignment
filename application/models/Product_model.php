<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends CI_Model { 

    function __construct(){
        parent::__construct();
    }
    
    public function getActiveAndVerifiedUsers(){
        $users = $this->db->where('email_verified_at is NOT NULL')->get_where('users', ['status' => 1]);
        return $users->num_rows();
    }
}