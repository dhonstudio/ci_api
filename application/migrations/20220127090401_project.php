<?php

class Migration_Project {

    public function __construct()
	{
        $this->migration =& get_instance();
        require_once __DIR__ . '/../../assets/ci_libraries/DhonDB.php';
		$this->migration->dhondb = new DhonDB;
    }
    
    public function up()
    {
        $this->migration->dhondb->table = 'tbl_alumni';
        $this->migration->dhondb->ai()->field('id_alumni', 'INT');
        $this->migration->dhondb->constraint('200')->field('fullName', 'VARCHAR');
        $this->migration->dhondb->constraint('100')->field('email', 'VARCHAR');
        $this->migration->dhondb->constraint('50')->field('phone', 'VARCHAR');
        $this->migration->dhondb->field('stamp', 'INT');
        $this->migration->dhondb->add_key('id_alumni');
        $this->migration->dhondb->create_table();

        $this->migration->dhondb->insert(['fullName' => 'Muhammad Ramadhon', 'email' => 'muhammad_r@email.com', 'phone' => '62812345678']);
        $this->migration->dhondb->insert(['fullName' => 'Muhammad Ibrahim', 'email' => 'm_ibrahim@email.com', 'phone' => '628156789012']);
        $this->migration->dhondb->insert(['fullName' => 'Shireen Haura', 'email' => 'shireen_h@email.com', 'phone' => '628116789022']);
        $this->migration->dhondb->insert(['fullName' => 'Intan Yanti', 'email' => 'intan_y@email.com', 'phone' => '628218901233']);
        $this->migration->dhondb->insert(['fullName' => 'Rikpan Maulana', 'email' => 'rmaulana@email.com', 'phone' => '628111223456']);
    }
}