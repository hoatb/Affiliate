<?php

const PROVINCE_LEVEL = 1;
const DISTRICT_LEVEL = 2;
const WARD_LEVEL = 3;

class Address_model extends MY_Model {
    static $table_name = "address";

    function __construct() {}

    /**
     *
     * @param array $filter
     *  Available filter condition, includes:
     *  - level: int
     *  - parentId: string
     *
     * @param array $paging
     *  Pagination condition, includes:
     *  - limit: number
     *  - offset: number
     */
    function getAllAddress($filter, $paging) {
        $where = "level = " . $filter["level"] . " and parentId = " . "'" . $filter["parentId"] . "'";
        $query = "select * from " . Address_model::$table_name . " where " . $where . " limit " . $paging["limit"] . " offset " . $paging["offset"];

        $result = $this->db->query($query)->result();
        return $result;
    }
}
