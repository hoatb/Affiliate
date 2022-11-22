<?php

class Curl_Client {
    // Codeigniter instance
    protected $ci;

    // Custom config
    protected $app_config;

    function __construct() {
        $this->ci =& get_instance();
        $this->app_config = $this->ci->config->item("app_config");
    }

    function get($uri, $config = null) {
        $curl = curl_init($uri);

        // Set default option for http request
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            "Content-Type: " . $this->app_config["content-type"],
            "User-Agent: " . $this->app_config["user-agent"],
        ));

        // Concat and replace option
        if ($config && is_array($config)) {
            foreach ($config as $key => $value) {
                curl_setopt($curl, $key, $value);
            }
        }

        // Binding all neccessary information after calling a http request
        $result["data"] = curl_exec($curl);
        $result["info"] = curl_getinfo($curl);
        $result["error"] = curl_error($curl);

        curl_close($curl);
        return $result;
    }

    function post($uri, $data, $config = null, $customHeaders = null) {
        $curl = curl_init($uri);

        $headers = $this->generateHeaders(strlen($data), $customHeaders);

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

        // Concat and replace option
        if ($config && is_array($config)) {
            foreach ($config as $key => $value) {
                curl_setopt($curl, $key, $value);
            }
        }

        // Binding all neccessary information after calling a http request
        $result["data"] = curl_exec($curl);
        $result["info"] = curl_getinfo($curl);
        $result["error"] = curl_error($curl);

        curl_close($curl);
        return $result;
    }

    function generateHeaders($dataLength, $customHeaders = null) {
        $headers = array(
            "Content-Type: " . $this->app_config["content-type"],
            "Content-Length: " . $dataLength,
            "User-Agent: " . $this->app_config["user-agent"],
        );
        if ($customHeaders != null) {
            $result = array_merge($headers, $customHeaders);
            return $result;
        }
        return $headers;
    }
}