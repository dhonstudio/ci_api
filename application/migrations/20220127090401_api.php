<?php

class Migration_Api {

    public function __construct()
	{
        $this->migration =& get_instance();
        $this->migration->load->library('dhondb');
    }
    
    public function up()
    {
        $this->migration->dhondb->table = 'api_users';
        $this->migration->dhondb->ai()->field('id_user', 'INT');
        $this->migration->dhondb->constraint('100')->unique()->field('username', 'VARCHAR');
        $this->migration->dhondb->constraint('200')->field('password', 'VARCHAR');
        $this->migration->dhondb->field('stamp', 'INT');
        $this->migration->dhondb->add_key('id_user');
        $this->migration->dhondb->create_table();

        $this->migration->dhondb->insert(['username' => 'admin', 'password' => password_hash('admin', PASSWORD_DEFAULT)]);
    }
}