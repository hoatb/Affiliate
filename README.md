# Affiliate Application

## System Requirements
```
├── Linux Basic Shared Hosting
├── Domain Support HTTPS
├── IP Api Enable
├── Curl Enable
├── zip Extension Enable
├── allow_url_fopen
├── upload_max_filesize: 128MB
├── post_max_size: 128MB
├── MySQL 5.6 + / [MariaDB 10.2 +]
├── PHP version 7.2+ (max: 7.4)
```

## Before running
* Read **README.md** in [application\migrations\README.md](application\migrations\README.md) to run migration.
* Configure application environment

    # .htaccess
    SetEnv CI_ENV {development/testing/production}

## Change folder permission to Read/Write
    application/logs
    application/cache 
    application/session