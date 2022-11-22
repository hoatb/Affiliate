<?php

require APPPATH . "models/response/API_Response.php";

class Insur_Cart {
    protected $ci;
    protected $app_config;
    protected $curl_client;

    function __construct() {
        $this->ci =& get_instance();
        $this->app_config = $this->ci->config->item("app_config");

        $this->curl_client = $this->ci->curl_client;
    }

    function addParentItem($userId, $data) {
        $uri = $this->app_config["internal-services"]["orderservice"]["domain"] . "/api/cart-items";

        log_message("debug", get_class($this) . ": Connecting to " . $uri);
        $headers = array(
            "x-tpa-identity-uuid: " . $userId
        );
        $result = $this->curl_client->post($uri, $data, null, $headers);
        return $result;
    }

    function addDeliverableItems($cartId, $userId, $data) {
        $uri = $this->app_config["internal-services"]["orderservice"]["domain"] . "/api/cart-items/many";
        $headers = array(
            "x-cart-id-uuid: " . $cartId,
            "x-tpa-identity-uuid: " . $userId
        );
        log_message("debug", get_class($this) . ": Connecting to " . $uri);
        $result = $this->curl_client->post($uri, $data, null, $headers);
        return $result;
    }

    function getPolicyByLookupCode($lookupcode) {
        $uri = $this->app_config["internal-services"]["policyservice"]["domain"] . "/v1/policies/" . $lookupcode;
        log_message("debug", get_class($this) . ": Connecting to " . $uri);
        $result = $this->curl_client->get($uri);
        return $result;
    }

    /**
     * Send PreCheckout command to Order Management service. This action will update general data for order: promition, shiping....
     */
    function preCheckout($cartId, $userId, $data) {
        $uri = $this->app_config["internal-services"]["orderservice"]["domain"] . "/api/carts/mine/pre_checkout";

        log_message("debug", get_class($this) . ": Connecting to " . $uri);
        $headers = array(
            "x-cart-id-uuid: " . $cartId,
            "x-tpa-identity-uuid: " . $userId
        );
        $result = $this->curl_client->post($uri, $data, null, $headers);
        return $result;
    }

    /**
     * Sending Place Order command to Order Management service. This action will rise order fulfillment workflow.
     * @return data model with order id from Order Management service
     */
    function placeOrder($cartId, $refId, $userId, $shopBackUrl, $policyTemplateCode) {
        $uri = $this->app_config["internal-services"]["orderservice"]["domain"] . "/api/carts/".$cartId."/order";
        $data = array();
        $data['cartId'] = $cartId;
        $data['refId'] = strval($refId);
        $data['shopBackUrl'] = $shopBackUrl;
        $data['policyTemplateCode'] = $policyTemplateCode;
        log_message("debug", get_class($this) . ": Connecting to " . $uri);
        $headers = array(
            "x-cart-id-uuid: " . $cartId,
            "x-tpa-identity-uuid: " . $userId
        );
        $result = $this->curl_client->post($uri, json_encode($data), null, $headers);
        return $result;
    }

    /**
     * Retrieve order's payment data from Order Management Service.
     * Note: payUrl will contains payment url that is used to redirect customer to payment gateway.
     * Note: payUrl can be null (order Service, Payment serrvie: systems not process completed yet)
     * @return data model contains payment data
     */
    function retrieveOrdersPaymentData($orderId) {
        $uri = $this->app_config["internal-services"]["orderservice"]["domain"] . "/api/orders/".$orderId."/payment";
        // $data = array();
        // $data['cartId'] = $cartId;
        log_message("debug", get_class($this) . ": retrieveOrdersPaymentData Connecting to " . $uri);
        // $headers = array(
        //     "x-cart-id-uuid: " . $cartId,
        //     "x-tpa-identity-uuid: " . $userId
        // );
        $result = $this->curl_client->get($uri);
        return $result;
    }
}
