<?php

class Migration_Kesku {

    public function __construct(string $database)
	{
        $this->migration =& get_instance();
        
        require_once __DIR__ . '/../../assets/ci_libraries/DhonMigrate.php';
		$this->migration->dhonmigrate = new DhonMigrate($database);
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
        $this->migration->dhondb->default(0)->field('position', 'INT');
        $this->migration->dhondb->default(1)->field('is_active', 'INT');
        $this->migration->dhondb->field('stamp', 'INT');
        $this->migration->dhondb->add_key('id_akun');
        $this->migration->dhondb->create_table();

        $this->migration->dhondb->table = 'kesku_trx';
        $this->migration->dhondb->ai()->field('id_trx', 'INT');
        $this->migration->dhondb->field('id_book', 'INT');
        $this->migration->dhondb->default(0)->field('id_akun', 'INT');
        $this->migration->dhondb->default(0)->field('to_akun', 'INT');
        $this->migration->dhondb->constraint('500')->field('note', 'VARCHAR', 'nullable');
        $this->migration->dhondb->constraint('13,2')->default(0.00)->field('debit', 'DECIMAL');
        $this->migration->dhondb->constraint('13,2')->default(0.00)->field('kredit', 'DECIMAL');
        $this->migration->dhondb->field('stamp', 'INT');
        $this->migration->dhondb->add_key('id_trx');
        $this->migration->dhondb->create_table();
    }
}