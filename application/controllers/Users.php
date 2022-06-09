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

        curl_setopt($cURLConnection, CURLOPT_URL, 'http://api.exchangeratesapi.io/v1/latest?access_key=cee212a839adf0ce9f3cafc93f3f8890&base=EUR&symbols=USD,RON');
        curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);

        $exchangeResponse = curl_exec($cURLConnection);
        curl_close($cURLConnection);

        $jsonArrayResponse = json_decode($exchangeResponse);

		// var_dump($jsonArrayResponse->rates);
		// var_dump($jsonArrayResponse);
		// exit;

		// $data['exchange_rate_data'] = [
		// 	'base' 	=> 'EUR', 
		// 	'usd' 	=> $jsonArrayResponse->rates->USD,
		// 	'ron' 	=> $jsonArrayResponse->rates->RON, 
		// ]; 

		$data['exchange_rate_data'] = $jsonArrayResponse->rates; 

        $this->load->view('users/index', $data);
    }
}
