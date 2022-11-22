<?php
class Car_value_table_model extends MY_Model
{
    static $table_name = "car_value_table";

    function __construct()
    {
    }

    public function insertRecords($dataArray)
    {
        $result = $this->db->insert_batch(Car_value_table_model::$table_name, $dataArray);
        return $result;
    }

    public function deleteRecordsBy($where)
    {
        $this->db->where($where);
        $result = $this->db->delete(Car_value_table_model::$table_name);
        return $result;
    }

    public function getAllGroupByColumns($getColumns, $groupByColumns, $where = "")
    {
        $this->db->select($getColumns);
        if (!empty($where)) {
            $this->db->where($where);
        }
        $this->db->group_by($groupByColumns);
        $result = $this->db->get(Car_value_table_model::$table_name)->result_array();
        return $result;
    }

    public function getAllCarValueBy($where_data_array, $paging)
    {
        if ($where_data_array) {
            foreach ($where_data_array as $key => $data) {
                $this->db->where($key, $data);
            }
        }
        $this->db->limit($paging["limit"], $paging["offset"]);
        $result = $this->db->get(Car_value_table_model::$table_name)->result();
        return $result;
    }

    public function countAllCarValueBy($where_data_array)
    {
        if ($where_data_array) {
            foreach ($where_data_array as $key => $data) {
                $this->db->where($key, $data);
            }
        }
        $result = $this->db->count_all_results(Car_value_table_model::$table_name);
        return $result;
    }
}
