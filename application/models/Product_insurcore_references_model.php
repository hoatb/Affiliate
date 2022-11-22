<?php
class Product_insurcore_references_model extends MY_Model {
    static $table_name = "product_insurcore_references";

    function __construct() {}

    public function getAll($limit = 100, $offset = 0) {
        $result = $this->db->query("select * from " . Product_insurcore_references_model::$table_name . " limit " .$limit . " offset " . $offset)->result();
        return $result;
    }

    public function create($details){
        $this->db->insert(Product_insurcore_references_model::$table_name, $details);
        return $this->db->insert_id();
    }

    public function getByProductId($product_id) {
        $search_id = $product_id ? $product_id : -1;
        $result = $this->db->query("select * from " . Product_insurcore_references_model::$table_name . " where product_id = " . $search_id)->result();
        return $result;
    }

    public function updateRecords($details, $where_data_array) {
        if ($where_data_array){
            foreach ($where_data_array as $key => $data) {
                $this->db->where($key, $data);
            }
        }
        return $this->db->update(Product_insurcore_references_model::$table_name, $details);
    }

    public function deleteRecords($where_data_array) {
        return $this->db->delete(Product_insurcore_references_model::$table_name, $where_data_array);
    }
}
