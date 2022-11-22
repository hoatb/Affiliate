<?php
class Product_templates_model extends MY_Model {
    static $table_name = "product_templates";

    function __construct() {}

    public function getAllProductTemplates($limit = 100, $offset = 0) {
        $result = $this->db->query("select * from " . Product_templates_model::$table_name . " limit " .$limit . " offset " . $offset)->result();
        return $result;
    }

    public function create($details){
        $this->db->insert(Product_templates_model::$table_name, $details);
        return $this->db->insert_id();
    }
}
