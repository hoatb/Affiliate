<?php
	class payoo {
		public $title = 'Payoo Payment Gateway';
		public $icon = 'assets/payment_gateway/payoo.png';
		public $website = '';
		
		function __construct($api){ $this->api = $api; }
		
		public function getPaymentGatewayView($settingData,$gatewayData){
			$view = APPPATH."payment_gateway/views/payoo.php";
		
			require $view;
		}
		
		public function setPaymentGatewayRequest($settingData,$gatewayData){
			// $this->api->confirmPaymentGateway($gatewayData['id'],$gatewayData['status'],'');
			$this->api->confirmPaymentGateway($gatewayData['id'], $settingData['order_retrieved_success_status_id'],'');

			$result['success'] = true;
			$result['redirect'] = $gatewayData['redirect'];//TODO: clone thankyou page
			
			return $result;
		}
		
		public function ipn($settingData, $gatewayData){
			// $post = $this->api->input->post();

			// if($post['reference'])
			// 	$this->api->confirmPaymentGateway($gatewayData['id'],$settingData['order_success_status_id'],$post['reference'],'Succeeded');
			// else 
			// 	$this->api->confirmPaymentGateway($gatewayData['id'],$settingData['order_failed_status_id'],'','Failed');
			
			// $json['redirect'] = $gatewayData['redirect'];
			
			// echo json_encode($json);
			// die;
			// TODO: Order/ipn_post
		}
	}