<?php

/**
 * This is a base API response that is based on API standard.
 * To create your custom response, please extends this class.
 */

abstract class Base_Response {
    protected $_code;
    protected $_message;
    protected $_data;
    protected $_metadata;

    function __construct($code, $message = null, $data = null, $meta = null) {
        $this->_code = array_key_exists($code, COMMON_HTTP_MESSAGES) ? $code : 200;
        $this->_message = $message ? $message : COMMON_HTTP_MESSAGES[$this->_code];
        $this->_data = $data;

        $this->_metadata = [
            "createdDate" => date(DATE_ISO8601),
        ];

        if (!$meta && is_array($meta)) {
            array_merge($this->_metadata, $meta);
        }
    }

    abstract function toJSON();
}
