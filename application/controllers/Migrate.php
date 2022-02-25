<?php

class Migrate extends CI_Controller
{
    public function __construct()
	{
		parent::__construct();

        require_once __DIR__ . '/../../assets/ci_libraries/DhonAuth.php';
        require_once __DIR__ . '/../../assets/ci_libraries/DhonJSON.php';
		$this->dhonauth     = new DhonAuth;
		$this->dhonjson     = new DhonJSON;

        $this->dhonauth->auth('project');
    }

    public function index()
    {
        require_once __DIR__ . '/../../assets/ci_libraries/DhonMigrate.php';
        $this->dhonmigrate = new DhonMigrate('project');

        $this->dhonmigrate->version = 20220127090401;
        $this->dhonmigrate->migrate('api', 'change');
        $response   = 'Migration success';
        $status     = '200';
        $this->dhonjson->send($response, $status);
    }
}