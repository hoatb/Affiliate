<?php

class Migration_update_product_column extends CI_Migration
{
    const TABLE_NAME = 'product';

    function __construct()
    {
        parent::__construct();

        $this->load->dbforge();
    }

    function up()
    {
        $columns = [
            'product_suggested_price' => [
                'type' => 'double',
                'null' => false,
                'unsigned' => true,
                'after' => 'product_price',
            ],
        ];

        $isTableUpdated = $this->dbforge->add_column(Migration_update_product_column::TABLE_NAME, $columns);
        if ($isTableUpdated) {
            log_message('debug', get_class($this) . ' - Adding new column into table ' . Migration_update_product_column::TABLE_NAME . ' OK --------------');
        } else {
            log_message('error', get_class($this) . ' - Adding new column into table ' . Migration_update_product_column::TABLE_NAME . ' error --------------');
        }
    }

    function down()
    {
        log_message('debug', get_class($this) . ' - Downgrade start --------------');

        if ($this->dbforge->drop_column(Migration_update_product_column::TABLE_NAME, 'product_suggested_price')) {
            log_message('debug', get_class($this) . ' - Removing column from table ' . Migration_update_product_column::TABLE_NAME . ' OK --------------');
        } else {
            log_message('error', get_class($this) . ' - Removing column from table ' . Migration_update_product_column::TABLE_NAME . ' error --------------');
        }
    }
}
