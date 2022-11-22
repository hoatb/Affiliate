<?php

require APPPATH . "models/response/API_Response.php";

class AddressController extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model("Address_model");
    }

    function getAllProvinces() {
        try {
            log_message("debug", get_class($this) . ": Getting province list");

            $provinceList = $this->Address_model->getAllAddress(["level" => PROVINCE_LEVEL, "parentId" => ""], ["limit" => 100, "offset" => 0]);

            log_message("debug", get_class($this) . ": Getting province list - Result obtained");

            $result = new API_Response(200, "OK", $provinceList);

            header("Content-Type: application/json; chartset=utf-8");
            echo $result->toJSON();
        } catch (Throwable $th) {
            log_message("error", $th->getMessage());
            log_message("error", $th->getTraceAsString());

            $result = new API_Response(500);
            header("Content-Type: application/json; chartset=utf-8");
            echo $result->toJSON();
        }
    }

    function getAllDistrictsByProvinceId() {
        $parentId = $this->input->get("parent", TRUE);

        try {
            log_message("debug", get_class($this) . ": Getting district list - parentId = " . $parentId);

            $districtList = $this->Address_model->getAllAddress(["level" => DISTRICT_LEVEL, "parentId" => $parentId], ["limit" => 100, "offset" => 0]);

            log_message("debug", get_class($this) . ": Getting district list - Result obtained");

            $result = new API_Response(200, "OK", $districtList);

            header("Content-Type: application/json; chartset=utf-8");
            echo $result->toJSON();
        } catch (Throwable $th) {
            log_message("error", $th->getMessage());
            log_message("error", $th->getTraceAsString());

            $result = new API_Response(500);
            header("Content-Type: application/json; chartset=utf-8");
            echo $result->toJSON();
        }
    }

    function getAllWardsByDistrictId() {
        $parentId = $this->input->get("parent", TRUE);

        try {
            log_message("debug", get_class($this) . ": Getting ward list - parentId = " . $parentId);

            $wardList = $this->Address_model->getAllAddress(["level" => WARD_LEVEL, "parentId" => $parentId], ["limit" => 100, "offset" => 0]);

            log_message("debug", get_class($this) . ": Getting ward list - Result obtained");

            $result = new API_Response(200, "OK", $wardList);

            header("Content-Type: application/json; chartset=utf-8");
            echo $result->toJSON();
        } catch (Throwable $th) {
            log_message("error", $th->getMessage());
            log_message("error", $th->getTraceAsString());

            $result = new API_Response(500);
            header("Content-Type: application/json; chartset=utf-8");
            echo $result->toJSON();
        }
    }
}