<?php

class Migration_User {

    public function __construct(string $database)
	{
        $this->migration =& get_instance();
        
        require_once __DIR__ . '/../../assets/ci_libraries/DhonMigrate.php';
		$this->migration->dhonmigrate = new DhonMigrate($database);
    }
    
    public function up()
    {
        // $this->migration->dhonmigrate->table = 'user_ci';
        // $this->migration->dhonmigrate->ai()->field('id', 'INT');
        // $this->migration->dhonmigrate->constraint('255')->unique()->field('email', 'VARCHAR');
        // $this->migration->dhonmigrate->constraint('200')->field('fullName', 'VARCHAR');
        // $this->migration->dhonmigrate->constraint('32')->field('auth_key', 'VARCHAR');
        // $this->migration->dhonmigrate->constraint('255')->field('password_hash', 'VARCHAR');
        // $this->migration->dhonmigrate->constraint('255')->default(null)->field('password_reset_token', 'VARCHAR', 'nullable');
        // $this->migration->dhonmigrate->constraint('6')->default('10')->field('status', 'smallint');
        // $this->migration->dhonmigrate->field('created_at', 'INT');
        // $this->migration->dhonmigrate->field('updated_at', 'INT');
        // $this->migration->dhonmigrate->constraint('255')->default(null)->field('verification_token', 'VARCHAR', 'nullable');
        // $this->migration->dhonmigrate->add_key('id');
        // $this->migration->dhonmigrate->create_table();

        $this->migration->dhonmigrate->table = 'user_device';
        $this->migration->dhonmigrate->ai()->field('id', 'INT');
        $this->migration->dhonmigrate->default('0')->field('id_user', 'INT');
        $this->migration->dhonmigrate->default('0')->field('id_device', 'INT');
        $this->migration->dhonmigrate->default('0')->field('id_address', 'INT');
        $this->migration->dhonmigrate->field('stamp', 'INT');
        $this->migration->dhonmigrate->field('last_login', 'INT');
        $this->migration->dhonmigrate->add_key('id');
        $this->migration->dhonmigrate->create_table();

        $this->migration->dhonmigrate->table = 'devices';
        $this->migration->dhonmigrate->ai()->field('id_device', 'INT');
        $this->migration->dhonmigrate->constraint('1000')->unique()->field('htmlentities', 'VARCHAR', 'nullable');
        $this->migration->dhonmigrate->constraint('100')->field('device_name', 'VARCHAR', 'nullable');
        $this->migration->dhonmigrate->add_key('id_device');
        $this->migration->dhonmigrate->create_table();

        $this->migration->dhonmigrate->table = 'addresses';
        $this->migration->dhonmigrate->ai()->field('id_address', 'INT');
        $this->migration->dhonmigrate->constraint('50')->unique()->field('ip_address', 'VARCHAR', 'nullable');
        $this->migration->dhonmigrate->constraint('1500')->field('ip_info', 'VARCHAR', 'nullable');
        $this->migration->dhonmigrate->add_key('id_address');
        $this->migration->dhonmigrate->create_table();
    }

    public function change()
    {
        $this->migration->dhonmigrate->table = 'user_ci';
        // $this->migration->dhonmigrate->constraint('30')->field('google_id', 'VARCHAR');
        // $this->migration->dhonmigrate->constraint('200')->field('google_name', 'VARCHAR');
        // $this->migration->dhonmigrate->constraint('200')->field('google_picture', 'VARCHAR');
        // $this->migration->dhonmigrate->constraint('20')->field('google_gender', 'VARCHAR');
        // $this->migration->dhonmigrate->constraint('200')->field('google_link', 'VARCHAR');
        // $this->migration->dhonmigrate->add_field();

        $this->migration->dhonmigrate->constraint('30')->field('fb_id', 'VARCHAR');
        $this->migration->dhonmigrate->constraint('200')->field('fb_name', 'VARCHAR');
        $this->migration->dhonmigrate->constraint('200')->field('fb_picture', 'VARCHAR');
        $this->migration->dhonmigrate->add_field();
    }
}