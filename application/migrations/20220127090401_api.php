<?php

class Migration_Api {

    public function __construct(string $database)
	{
        $this->migration =& get_instance();
        
        require_once __DIR__ . '/../../assets/ci_libraries/DhonMigrate.php';
		$this->migration->dhonmigrate = new DhonMigrate($database);
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
    }

    public function change()
    {
        $this->migration->dhonmigrate->table = 'api_users';
        $this->migration->dhonmigrate->constraint('10')->field(['usernamed', 'usernamp'], 'VARCHAR');
        // $this->migration->dhonmigrate->constraint('100')->field('usernames', 'VARCHAR');
        // $this->migration->dhonmigrate->add_field();
        $this->migration->dhonmigrate->change_field();
    }

    public function drop()
    {
        $this->migration->dhonmigrate->table = 'api_users';
        $this->migration->dhonmigrate->drop_field('usernamed');
        $this->migration->dhonmigrate->drop_field('usernames');
    }
}