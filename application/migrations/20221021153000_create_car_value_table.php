<?php

class Migration_create_car_value_table extends CI_Migration
{
    const TABLE_NAME = 'car_value_table';

    function __construct()
    {
        parent::__construct();
    }

    function up()
    {
        $attributes = ['engine' => 'InnoDB', 'charset' => 'utf8mb4', 'collate' => 'utf8mb4_bin'];

        $columns = [
            'id' => [
                'type' => 'int',
                'unsigned' => true,
                'auto_increment' => true,
                'null' => false,
            ],
            'maker' => [
                'type' => 'varchar',
                'constraint' => '100',
                'null' => false,
                'collate' => 'utf8mb4_bin',
            ],
            'maker_key' => [
                'type' => 'varchar',
                'constraint' => '100',
                'null' => false,
                'collate' => 'utf8mb4_bin',
            ],
            'model' => [
                'type' => 'varchar',
                'constraint' => '255',
                'null' => false,
                'collate' => 'utf8mb4_bin',
            ],
            'num_of_seat' => ['type' => 'tinyint', 'unsigned' => true, 'null' => false],
            'year_of_production' => ['type' => 'year', 'null' => false],
            'cost' => ['type' => 'bigint', 'unsigned' => true, 'null' => false],
            "created_at timestamp default current_timestamp not null",
        ];

        $this->dbforge->add_field($columns);
        $this->dbforge->add_key('id', true); // primary key

        $isTableCreated = $this->dbforge->create_table(Migration_create_car_value_table::TABLE_NAME, true, $attributes);
        if ($isTableCreated) {
            log_message('debug', get_class($this) . ' - Creating table ' . Migration_create_car_value_table::TABLE_NAME . ' OK --------------');

            // create index on maker column
            $maker_index_name = 'idx_car_maker';
            $query = 'create index ' . $maker_index_name . ' on ' . Migration_create_car_value_table::TABLE_NAME . '(`maker`);';
            $this->db->query($query);
        } else {
            log_message('error', get_class($this) . ' - Creating table ' . Migration_create_car_value_table::TABLE_NAME . ' error --------------');
        }
    }

    function down()
    {
        log_message('debug', get_class($this) . ' - Downgrade start --------------');
        if ($this->dbforge->drop_table(Migration_create_car_value_table::TABLE_NAME, true)) {
            log_message('debug', get_class($this) . ' - Dropping table ' . Migration_create_car_value_table::TABLE_NAME . ' OK --------------');
        } else {
            log_message('error', get_class($this) . ' - Dropping table ' . Migration_create_car_value_table::TABLE_NAME . ' error --------------');
        }
    }
}
