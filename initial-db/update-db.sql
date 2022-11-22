-- drop table if exists affiliatedb.`product_insurcore_references`;
create table if not exists affiliatedb.`product_insurcore_references` (
	`id` int unsigned not null auto_increment primary key,
    `product_id` int(11) not null,
    `product_template_code` varchar(50) not null,
    `sales_product_id` varchar(255) not null,
    `sales_product_code` varchar(255) not null,
    `sales_product_name` text collate utf8mb4_bin not null,
    `policy_template_id` varchar(255) not null,
    `policy_template_code` varchar(255) not null,
    `policy_template_name` text collate utf8mb4_bin not null
)
engine = InnoDB default charset = utf8mb4 collate = utf8mb4_bin;

-- drop table if exists affiliatedb.`product_templates`;
create table if not exists affiliatedb.`product_templates` (
	`id` int unsigned not null auto_increment primary key,
    `product_template_code` varchar(50) not null unique,
    `product_template_name` varchar(255) collate utf8mb4_bin not null
)
engine = InnoDB default charset = utf8mb4 collate = utf8mb4_bin;


-- Insert data into product_templates
set SQL_SAFE_UPDATES = 0;
delete from affiliatedb.`product_templates`;
set SQL_SAFE_UPDATES = 1;
insert into affiliatedb.`product_templates` (`product_template_code`, `product_template_name`)
values
('default', 'Default'),
('insur_motobike', 'Motobike Insurance'),
('insur_car', 'Car Insurance'),
('insur_health', 'Health Insurance');
