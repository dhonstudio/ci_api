<?php

class Migration_Kesku {

    public function __construct()
	{
        $this->migration =& get_instance();
        require_once __DIR__ . '/../../assets/ci_libraries/DhonDB.php';
		$this->migration->dhondb = new DhonDB;
    }
    
    public function up()
    {
        $this->migration->dhondb->table = 'kesku_akun';
        $this->migration->dhondb->ai()->field('id_akun', 'INT');
        $this->migration->dhondb->field('id_book', 'INT');
        $this->migration->dhondb->constraint('200')->field('akunName', 'VARCHAR', 'nullable');
        $this->migration->dhondb->constraint('1')->field('akunType', 'INT');
        $this->migration->dhondb->constraint('13,2')->default(0.00)->field('budgeted', 'DECIMAL');
        $this->migration->dhondb->constraint('2')->default(0)->field('periode', 'INT');
        $this->migration->dhondb->default(1)->field('is_active', 'INT');
        $this->migration->dhondb->add_key('id_akun');
        $this->migration->dhondb->create_table();

    }
}