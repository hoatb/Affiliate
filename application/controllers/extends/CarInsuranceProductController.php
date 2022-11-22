<?php

require APPPATH . "models/response/API_Response.php";

class CarInsuranceProductController extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model("Car_value_table_model");
    }

    function getAllMakers()
    {
        try {
            log_message("debug", get_class($this) . ": Getting car's maker list");

            $makerList = $this->Car_value_table_model->getAllGroupByColumns("maker, maker_key", "maker, maker_key");

            log_message("debug", get_class($this) . ": Getting car's maker list - Result obtained");

            $result = new API_Response(200, "OK", $makerList);

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

    function getAllModelsByMaker()
    {
        try {
            $maker_key = $this->input->get("makerKey", true);

            log_message("debug", get_class($this) . ": Getting car's model list by " . $maker_key);

            $modelList = $this->Car_value_table_model->getAllGroupByColumns("maker, model", "maker, model", "maker_key = '" . $maker_key . "'");

            log_message("debug", get_class($this) . ": Getting car's maker model - Result obtained");

            $result = new API_Response(200, "OK", $modelList);

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

    function getCarValueByFilter()
    {
        try {
            $maker = $this->input->get("maker", true);
            $maker_key = $this->input->get("makerKey", true);
            $model = $this->input->get("model", true);
            $num_of_seat = $this->input->get("numOfSeat", true);
            $year_of_production = $this->input->get("yearOfProduction", true);
            $limit = $this->input->get("limit", true);
            $page = $this->input->get("page", true);

            if (!is_numeric($limit)) {
                $limit = 100;
            }
            $limit = is_numeric($limit) ? intval($limit) : 100;

            if (!is_numeric($page)) {
                $page = 1;
            }
            $page = is_numeric($page) ? intval($page) : 100;

            $offset = $limit * ($page - 1);

            $num_of_seat = is_numeric($num_of_seat) ? intval($num_of_seat) : null;
            $year_of_production = is_numeric($year_of_production) ? intval($year_of_production) : null;

            $filter = [
                "maker" => $maker,
                "maker_key" => $maker_key,
                "model" => $model,
                "num_of_seat" => $num_of_seat,
                "year_of_production" => $year_of_production,
            ];

            $where = array_filter($filter, function ($value) {
                return $value != null;
            });

            log_message("debug", get_class($this) . ": Getting car value list");

            $modelList = $this->Car_value_table_model->getAllCarValueBy($where, ["limit" => $limit, "offset" => $offset]);
            $total = $this->Car_value_table_model->countAllCarValueBy($where);

            log_message("debug", get_class($this) . ": Getting car value list - Result obtained");

            $dataResponse = [
                "pagination" => [
                    "page" => $page,
                    "limit" => $limit,
                    "total" => $total
                ],
                "items" => $modelList,
            ];
            $result = new API_Response(200, "OK", $dataResponse);

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
