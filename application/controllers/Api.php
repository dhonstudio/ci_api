<?php
defined('BASEPATH') OR exit('No direct script access allowed');

date_default_timezone_set('Asia/Jakarta');

class Api extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		require_once __DIR__ . '/../../assets/ci_libraries/DhonJSON.php';
		$this->dhonjson = new DhonJSON;
		$this->dhonjson->auth();
		$this->dhonjson->collect();
	}

	public function delete(int $id)
	{
		require_once __DIR__ . '/../../assets/ci_libraries/DhonJSON.php';
		$this->dhonjson = new DhonJSON;
		$this->dhonjson->auth();
		$this->dhonjson->delete($id);
	}
}