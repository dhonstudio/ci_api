<?php

class Migrate extends CI_Controller
{
    public function __construct()
	{
		parent::__construct();

        /*
        | -------------------------------------------------------------------
        | Please disable this section until end of section if you are not yet have api_users table in u493229753_project db
        | -------------------------------------------------------------------
        */
        if (!isset($_SERVER['PHP_AUTH_USER'])) {
            $this->unauthorized();
        } else {
            $db_api   = $this->load->database('project', TRUE);
            $user     = $db_api->get_where('api_users', ['username' => $_SERVER['PHP_AUTH_USER']])->row_array();
            
            if (!password_verify($_SERVER['PHP_AUTH_PW'], $user['password'])) {
                $this->unauthorized();
            }
        }
        /*
        | -------------------------------------------------------------------
        | End of disable section
        | -------------------------------------------------------------------
        */
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
        require_once __DIR__ . '/../../assets/ci_libraries/DhonDB.php';
		$this->dhondb = new DhonDB;
        
        $this->dhondb->version = 20220127090401;
        $this->dhondb->migrate('user');
        $this->response         = 'Migration success';
        $this->json_response 	= ['response' => $this->response, 'status' => '200'];
        $this->send();
    }
}