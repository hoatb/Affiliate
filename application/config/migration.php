<?php defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Reference link: https://www.codeigniter.com/userguide3/libraries/migration.html
 */

/*
|--------------------------------------------------------------------------
| Enable/Disable Migrations
|--------------------------------------------------------------------------
|
| Migrations are disabled by default but should be enabled
| whenever you intend to do a schema migration.
|
*/
$config['migration_enabled'] = true;


/*
|--------------------------------------------------------------------------
| Migrations version
|--------------------------------------------------------------------------
|
| This is used to set migration version that the file system should be on.
| If you run $this->migration->latest() this is the version that schema will
| be upgraded / downgraded to.
|
*/
// $config['migration_version'] = "001";


/*
|--------------------------------------------------------------------------
| Migrations Path
|--------------------------------------------------------------------------
|
| Path to your migrations folder.
| Typically, it will be within your application path.
| Also, writing permission is required within the migrations path.
|
*/
$config['migration_path'] = APPPATH . 'migrations/';


/*
|--------------------------------------------------------------------------
| Migrations Type
|--------------------------------------------------------------------------
| - sequential
| - timestamp
*/
$config['migration_type'] = "timestamp";

/* End of file migration.php */
/* Location: ./application/config/migration.php */