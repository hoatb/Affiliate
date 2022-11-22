<?php

require APPPATH . "models/response/Base_Response.php";

class API_Response extends Base_Response {
    function __construct($code, $message = null, $data = null) {
        parent::__construct($code, $message, $data);
    }

    function toJSON() {
        return json_encode([
            "code" => $this->_code,
            "message" => $this->_message,
            "data" => $this->_data,
            "metadata" => $this->_metadata,
        ]);
    }
}