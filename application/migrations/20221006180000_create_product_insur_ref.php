<?php

class Migration_create_product_insur_ref extends CI_Migration
{
    const TABLE_NAME = 'product_insurcore_references';

    function __construct()
    {
        parent::__construct();

        $this->load->dbforge();
    }

    function up()
    {
        $attributes = ['engine' => 'InnoDB', 'charset' => 'utf8mb4', 'collate' => 'utf8mb4_bin'];

        $columns = [
            'id' => [
                'type' => 'int',
                'constraint' => '10',
                'null' => false,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'product_id' => [
                'type' => 'int',
                'constraint' => '11',
                'null' => false,
            ],
            'product_template_code' => [
                'type' => 'varchar',
                'constraint' => '50',
                'null' => false,
            ],
            'sales_product_id' => [
                'type' => 'varchar',
                'constraint' => '255',
                'null' => false,
            ],
            'sales_product_code' => [
                'type' => 'varchar',
                'constraint' => '255',
                'null' => false,
            ],
            'sales_product_name' => [
                'type' => 'text',
                'collate' => 'utf8mb4_bin',
                'null' => false,
            ],
            'policy_template_id' => [
                'type' => 'varchar',
                'constraint' => '255',
                'null' => false,
            ],
            'policy_template_code' => [
                'type' => 'varchar',
                'constraint' => '255',
                'null' => false,
            ],
            'policy_template_name' => [
                'type' => 'text',
                'collate' => 'utf8mb4_bin',
                'null' => false,
            ],
        ];

        $this->dbforge->add_field($columns);
        $this->dbforge->add_key('id', true); // primary key

        $isTableCreated = $this->dbforge->create_table(Migration_create_product_insur_ref::TABLE_NAME, true, $attributes);
        if ($isTableCreated) {
            log_message('debug', get_class($this) . ' - Creating table ' . Migration_create_product_insur_ref::TABLE_NAME . ' OK --------------');
        } else {
            log_message('error', get_class($this) . ' - Creating table ' . Migration_create_product_insur_ref::TABLE_NAME . ' error --------------');
        }
    }

    function down()
    {
        log_message('debug', get_class($this) . ' - Downgrade start --------------');

        if ($this->dbforge->drop_table(Migration_create_product_insur_ref::TABLE_NAME, true)) {
            log_message('debug', get_class($this) . ' - Dropping table ' . Migration_create_product_insur_ref::TABLE_NAME . ' OK --------------');
        } else {
            log_message('error', get_class($this) . ' - Dropping table ' . Migration_create_product_insur_ref::TABLE_NAME . ' error --------------');
        }
    }
}
