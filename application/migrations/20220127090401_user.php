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
        $this->migration->dhondb->table = 'user_ci';
        $this->migration->dhondb->ai()->field('id', 'INT');
        $this->migration->dhondb->constraint('255')->unique()->field('email', 'VARCHAR');
        $this->migration->dhondb->constraint('200')->field('fullName', 'VARCHAR');
        $this->migration->dhondb->constraint('32')->field('auth_key', 'VARCHAR');
        $this->migration->dhondb->constraint('255')->field('password_hash', 'VARCHAR');
        $this->migration->dhondb->constraint('255')->default(null)->field('password_reset_token', 'VARCHAR', 'nullable');
        $this->migration->dhondb->constraint('6')->default('10')->field('status', 'smallint');
        $this->migration->dhondb->field('created_at', 'INT');
        $this->migration->dhondb->field('updated_at', 'INT');
        $this->migration->dhondb->constraint('255')->default(null)->field('verification_token', 'VARCHAR', 'nullable');
        $this->migration->dhondb->add_key('id');
        $this->migration->dhondb->create_table();
    }

    public function change()
    {
        $this->migration->dhonmigrate->table = 'user_ci';
        $this->migration->dhonmigrate->constraint('30')->field(['google_id', 'google_id'], 'INT');
        // $this->migration->dhonmigrate->constraint('30')->field('google_id', 'VARCHAR');
        // $this->migration->dhonmigrate->constraint('200')->field('google_name', 'VARCHAR');
        // $this->migration->dhonmigrate->constraint('200')->field('google_picture', 'VARCHAR');
        // $this->migration->dhonmigrate->constraint('20')->field('google_gender', 'VARCHAR');
        // $this->migration->dhonmigrate->constraint('200')->field('google_link', 'VARCHAR');
        // $this->migration->dhonmigrate->add_field();
        $this->migration->dhonmigrate->change_field();
    }
}