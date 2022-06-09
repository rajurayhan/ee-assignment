<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {
    public function _construct(){
        parent::_construct(); 
        $this->load->model('User_model');
        $this->load->model('User_product_model');
    }

    public function index(){ 
        $data = [];

        // Active Users 
        $activeUsers = $this->User_model->getActiveAndVerifiedUsers();
        $data['active_users'] = $activeUsers;       
        
        // Active Users With Active Products
        $activeUsersWithProducts = $this->User_product_model->getActiveAndVerifiedUsersWithActiveProducts();
        $data['active_users_with_active_products'] = $activeUsersWithProducts;
        $this->load->view('users/index', $data);
    }
}