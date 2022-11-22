<?php

class Migration_create_product_template extends CI_Migration
{
    const TABLE_NAME = 'product_templates';

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
            'product_template_code varchar(50) not null unique',
            'product_template_name' => [
                'type' => 'varchar',
                'constraint' => '255',
                'null' => false,
                'collate' => 'utf8mb4_bin',
            ],
        ];

        $this->dbforge->add_field($columns);
        $this->dbforge->add_key('id', true); // primary key

        $isTableCreated = $this->dbforge->create_table(Migration_create_product_template::TABLE_NAME, true, $attributes);
        if ($isTableCreated) {
            log_message('debug', get_class($this) . ' - Creating table ' . Migration_create_product_template::TABLE_NAME . ' OK --------------');

            // Insert initial data
            $data = [
                ['product_template_code' => 'default', 'product_template_name' => 'Default product'],
                ['product_template_code' => 'insur_motobike', 'product_template_name' => 'Motobike Insurance'],
                ['product_template_code' => 'insur_car', 'product_template_name' => 'Car Insurance'],
                ['product_template_code' => 'insur_health', 'product_template_name' => 'Health Insurance'],
            ];

            if (!$this->db->insert_batch(Migration_create_product_template::TABLE_NAME, $data)) {
                log_message('error', get_class($this) . ' - Inserting data ' . Migration_create_product_template::TABLE_NAME . ' error --------------');
            } else {
                log_message('debug', get_class($this) . ' - Inserting data ' . Migration_create_product_template::TABLE_NAME . ' OK --------------');
            }
        } else {
            log_message('error', get_class($this) . ' - Creating table ' . Migration_create_product_template::TABLE_NAME . ' error --------------');
        }
    }

    function down()
    {
        log_message('debug', get_class($this) . ' - Downgrade start --------------');

        if ($this->dbforge->drop_table(Migration_create_product_template::TABLE_NAME, true)) {
            log_message('debug', get_class($this) . ' - Dropping table ' . Migration_create_product_template::TABLE_NAME . ' OK --------------');
        } else {
            log_message('error', get_class($this) . ' - Dropping table ' . Migration_create_product_template::TABLE_NAME . ' error --------------');
        }
    }
}
