<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {
    public function _construct(){
        parent::_construct(); 
        $this->load->model('User_model');
        $this->load->model('User_product_model');
        $this->load->model('Product_model');        
    }

    public function index(){ 
        $data = [];

        // Active Users 
        $activeUsers = $this->User_model->getActiveAndVerifiedUsers();
        $data['active_users'] = $activeUsers;       
        
        // Active Users With Active Products
        $activeUsersWithProducts = $this->User_product_model->getActiveAndVerifiedUsersWithActiveProducts();
        $data['active_users_with_active_products'] = $activeUsersWithProducts;

        // Active Products
        $activeProducts = $this->Product_model->getActiveProducts();
        $data['active_products'] = $activeProducts; 

        // Active Products With No User
        $activeProductsWithNoUser = $this->Product_model->productWithNoUser();
        $data['active_products_with_no_user'] = $activeProductsWithNoUser;  

        // Count Active Products Selected 
        $selectedActiveProductsQuantity = $this->User_product_model->countSelectedActiveProducts(); 
        $data['selected_active_products_count'] = $selectedActiveProductsQuantity; 

        // Sumerized Data 
        $summerizedQuantityAndPriceValue = $this->User_product_model->getSummerizedQuantityAndPriceValue();
        $data['summerized_total_price'] = $summerizedQuantityAndPriceValue; 

        // Userwise total

        $userWiseTotalPrice = $this->User_product_model->userWiseTotalPrice();
        
        $data['user_wise_total'] = $userWiseTotalPrice; 

        // Exchange Rate

        $cURLConnection = curl_init();

        curl_setopt($cURLConnection, CURLOPT_URL, 'https://api.exchangeratesapi.io/v1/latest?access_key=11JNTCL8K5lmCc4rgAJhRnNFW0P0hR0Q&base=EUR&symbols=USD,RON');
        curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);

        $phoneList = curl_exec($cURLConnection);
        curl_close($cURLConnection);

        $jsonArrayResponse = json_decode($phoneList);

        // var_dump($jsonArrayResponse);
        // exit();

        $this->load->view('users/index', $data);
    }
}