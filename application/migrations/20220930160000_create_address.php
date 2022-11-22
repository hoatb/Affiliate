<?php

class Migration_create_address extends CI_Migration
{
    const ADDRESS_TABLE_NAME = "address";

    function __construct()
    {
        parent::__construct();

        $this->load->dbforge();
    }

    function up()
    {
        $attributes = ["engine" => "InnoDB", "charset" => "utf8mb4", "collate" => "utf8mb4_bin"];

        $columns = [
            "id" => [
                "type" => "varchar",
                "constraint" => "10",
                "null" => false,
            ],
            "name" => [
                "type" => "varchar",
                "constraint" => "255",
                "null" => false,
                "collate" => "utf8mb4_bin",
            ],
            "level" => [
                "type" => "tinyint",
                "unsigned" => true,
                "null" => false,
            ],
            "prefix" => [
                "type" => "varchar",
                "constraint" => "255",
                "collate" => "utf8mb4_bin",
            ],
            "order" => ["type" => "int", "default" => 0],
            "keySearch" => [
                "type" => "varchar",
                "constraint" => "255",
                "null" => false,
            ],
            "createdAt timestamp default current_timestamp not null",
            "updatedAt timestamp default current_timestamp on update current_timestamp not null",
            "nsleft" => [
                "type" => "int",
                "default" => 1,
                "null" => false,
            ],
            "nsright" => [
                "type" => "int",
                "default" => 2,
                "null" => false,
            ],
            "parentId" => [
                "type" => "varchar",
                "constraint" => "10",
            ],
        ];

        $this->dbforge->add_field($columns);
        $this->dbforge->add_key("id", true); // primary key

        $isTableCreated = $this->dbforge->create_table(Migration_create_address::ADDRESS_TABLE_NAME, true, $attributes);
        if ($isTableCreated) {
            log_message("debug", get_class($this) . " - Creating table " . Migration_create_address::ADDRESS_TABLE_NAME . " OK --------------");
        } else {
            log_message("error", get_class($this) . " - Creating table " . Migration_create_address::ADDRESS_TABLE_NAME . " error --------------");
        }
    }

    function down()
    {
        log_message("debug", get_class($this) . " - Downgrade start --------------");

        if ($this->dbforge->drop_table(Migration_create_address::ADDRESS_TABLE_NAME, true)) {
            log_message("debug", get_class($this) . " - Dropping table " . Migration_create_address::ADDRESS_TABLE_NAME . " OK --------------");
        } else {
            log_message("error", get_class($this) . " - Dropping table " . Migration_create_address::ADDRESS_TABLE_NAME . " error --------------");
        }
    }
}
