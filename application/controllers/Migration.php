<?php

class Migration extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function migrateToVersion($version = null)
    {
        $this->load->library("migration");

        $migrations = $this->migration->find_migrations();

        if (!$version || !array_key_exists($version, $migrations)) {
            show_error("Invalid migration version: " . $version);
            return;
        }

        log_message("debug", "Migrate database to version: " . $version . " - Start.");
        if ($this->migration->version($version) === false) {
            show_error($this->migration->error_string());

            log_message("error", "Migrate database to version: " . $version . " failed.");
            log_message("error", $this->migration->error_string());
        } else {
            echo "The migration has concluded successfully to version: " . $version;
            log_message("debug", "Migrate database to version: " . $version . " - End.");
        }
    }

    /**
     * @description: Migrate to the latest version, whatever the version is set in config file
     */
    function latest()
    {
        $this->load->library("migration");

        log_message("debug", "Migrate database to the latest version - Start.");

        if ($this->migration->latest() === false) {
            show_error($this->migration->error_string());

            log_message("error", "Migrate database to the latest version failed.");
            log_message("error", $this->migration->error_string());
        } else {
            echo "The migration has concluded successfully";
            log_message("debug", "Migrate database to the latest version - End.");
        }
    }
}
