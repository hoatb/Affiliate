#  Migration guideline

## Config
* Open file: **application/config/migration.php**
* Ensure these variables are assigned:

```
$config['migration_enabled'] = true;
$config['migration_path'] = APPPATH . 'migrations/';
$config['migration_type'] = "timestamp";
```

##  Usage
**1. Start affiliate application**

**2. Run migration**

* Migrate to the latest version:
	* Open browser at **[domain]/migration/migrate/latest**.
	* Eg: https://affiliate.local/migration/migrate/latest
* Migrate to specific version:
	* Version format: **YYYYMMDDHHIISS**, read more ## [Migration file names](https://www.codeigniter.com/userguide3/libraries/migration.html#toc-entry-1)
	* Open browser at **[domain]/migration/migrate/{{version}}**.
	* Eg: https://affiliate.netlocal.com/migration/migrate/20220930160000
