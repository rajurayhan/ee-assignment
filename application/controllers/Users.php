<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {
    public function _construct(){
        parent::_construct();
        // $this->load->model('user_model');
        $this->load->model('User_model');
    }

    public function index(){ 
        $data = [];
        $activeUsers = $this->User_model->getActiveAndVerifiedUsers();
        $data['active_users'] = $activeUsers;
        $this->load->view('users/index', $data);
        // echo '<pre>';
        // print_r($activeUsers);
        // exit();
    }
}