<?php

class Migration_Api {

    public function __construct(string $database)
	{
        $this->migration =& get_instance();
        
        $this->database = $database;
        $this->dev      = false;
        require_once __DIR__ . '/../../assets/ci_libraries/DhonMigrate.php';
		$this->migration->dhonmigrate = new DhonMigrate($this->database);
    }
    
    public function up()
    {
        $this->migration->dhonmigrate->table = 'api_users';
        $this->migration->dhonmigrate->ai()->field('id_user', 'INT');
        $this->migration->dhonmigrate->constraint('100')->unique()->field('username', 'VARCHAR');
        $this->migration->dhonmigrate->constraint('200')->field('password', 'VARCHAR');
        $this->migration->dhonmigrate->field('stamp', 'INT');
        $this->migration->dhonmigrate->add_key('id_user');
        $this->migration->dhonmigrate->create_table();

        $this->migration->dhonmigrate->insert(['username' => 'admin', 'password' => password_hash('admin', PASSWORD_DEFAULT)]);
        
        if ($this->dev == false) $this->_dev();
    }

    private function _dev()
    {
        $this->migration->dhonmigrate = new DhonMigrate($this->database.'_dev');
        $this->dev = true;
        $this->up();
    }

    public function change()
    {
    }

    public function drop()
    {
    }
}