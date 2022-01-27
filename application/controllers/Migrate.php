<?php

class Migrate extends CI_Controller
{
    public function __construct()
	{
		parent::__construct();
        // if (!isset($_SERVER['PHP_AUTH_USER'])) {
        //     $this->unauthorized();
        // } else {
        //     $db_api   = $this->load->database('api', TRUE);
        //     $user     = $db_api->get_where('api_users', ['username' => $_SERVER['PHP_AUTH_USER']])->row_array();
            
        //     if ($user['username'] == 'admin_sei') {
        //         if (password_verify($_SERVER['PHP_AUTH_PW'], $user['password'])) {
        //             $this->response         = 'success';
        //             $this->json_response 	= ['response' => $this->response, 'status' => '200'];
        //             $this->send();
        //         } else {
        //             $this->unauthorized();
        //         }
        //     } else {
        //         $this->unauthorized();
        //     }
        // }
    }
    
    private function unauthorized()
    {
        header('WWW-Authenticate: Basic realm="My Realm"');
        header('HTTP/1.0 401 Unauthorized');
        $this->response         = 'unauthorized';
        $this->json_response 	= ['response' => $this->response, 'status' => '401'];
        $this->send();
        exit;
    }

    private function send()
    {
        header('Content-Type: application/json');
		header('Access-Control-Allow-Origin: *');

        echo json_encode($this->json_response, JSON_NUMERIC_CHECK);
    }

    public function index()
    {
        $this->load->library('dhonDB');
        
        $this->dhondb->version = 20220127090401;
        $this->dhondb->migrate('api');
    }
}