<?php

class Migration_User {

    public function __construct()
	{
        $this->migration =& get_instance();
        $this->migration->load->library('dhondb');
    }
    
    public function up()
    {
        $this->migration->dhondb->table = 'user';
        $this->migration->dhondb->ai()->field('id', 'INT');
        $this->migration->dhondb->constraint('255')->unique()->field('username', 'VARCHAR');
        $this->migration->dhondb->constraint('32')->field('auth_key', 'VARCHAR');
        $this->migration->dhondb->constraint('255')->field('password_hash', 'VARCHAR');
        $this->migration->dhondb->constraint('255')->unique()->default(null)->field('password_reset_token', 'VARCHAR', 'nullable');
        $this->migration->dhondb->constraint('255')->unique()->field('email', 'VARCHAR');
        $this->migration->dhondb->constraint('6')->default('10')->field('status', 'smallint');
        $this->migration->dhondb->field('created_at', 'INT');
        $this->migration->dhondb->field('updated_at', 'INT');
        $this->migration->dhondb->constraint('255')->default(null)->field('verification_token', 'VARCHAR', 'nullable');
        $this->migration->dhondb->add_key('id');
        $this->migration->dhondb->create_table();

        $this->migration->dhondb->insert([
            'username' => 'admin',
            'auth_key' => '437l2S7HK3JaJi1KuMzQoPj93uHeyKnB',
            'password_hash' => password_hash('adminadmin', PASSWORD_DEFAULT),
            'email' => 'admin@email.com',
            'status' => '10',
            'created_at' => time(),
            'updated_at' => time(),
            'verification_token' => 'HCx4VGqfc5m0Fv_lNdJG7NDkzKPbBiDM_1643160478',
        ]);
    }
}