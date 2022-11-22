##  Migration address data
**1. Run structure migration**
* Open browser at **[domain]/migration/migrate/20220930160000**.
* Eg: https://affiliate.local/migration/migrate/20220930160000

**2. Import data**

**2.1. phpMyAdmin**
* Import file: address.csv

**2.2. Mysql Command Line Client**

* Unzip **initial-db/address.zip**
	* You will receive address.csv file.

* Open **Mysql Command Line Client**

* Check safe data import folder:
	* Run command: `SHOW VARIABLES LIKE "secure_file_priv";`
	* Example result:
```
+------------------+------------------------------------------------+
| Variable_name    | Value                                          |
+------------------+------------------------------------------------+
| secure_file_priv | C:\ProgramData\MySQL\MySQL Server 8.0\Uploads\ |
+------------------+------------------------------------------------+
```

* Move **address.csv** to secure folder, eg: move to `C:\ProgramData\MySQL\MySQL Server 8.0\Uploads\`
* Open Mysql Command Line Client
* Ensure affiliatedb is created:
```
SHOW DATABASES; // view all existed databases
```

```
USE affiliatedb; // choose affiliatedb
```

* Import data:
    * Template command:
```
LOAD DATA INFILE '{{path_to_your_secure_folder}}/address.csv'
INTO TABLE address
FIELDS TERMINATED BY ','
ENCLOSED BY '"'
LINES TERMINATED BY '\n'
IGNORE 1 LINES
(id, name, level, prefix,`order`, keySearch, createdAt, updatedAt, nsleft, nsright, parentId);
```
