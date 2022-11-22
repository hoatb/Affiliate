<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta name="description" content=""/>
	<meta name="author" content=""/>
	
	<?php if(isset($meta_title)){ ?> <meta property="og:title" content="<?php echo $meta_title ?>"/><?php } ?>
	<?php if(isset($meta_description)){ ?> <meta property="og:description" content="<?php echo $meta_description ?>"/><?php } ?>
	<?php if(isset($meta_image)){ ?> <meta property="og:image" content="<?php echo $meta_image ?>"/><?php } ?>
	<?php 
	$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	?>
	<meta property="og:url" content="<?= $actual_link ?>"/>
	<meta name="twitter:card" content="summary_large_image"/>

	<?php if($store_setting['favicon']){ ?>
		<link rel="icon" href="<?= base_url('assets/images/site/'.$store_setting['favicon']) ?>" type="image/*" sizes="16x16">
	<?php } ?>

	<title><?= $store_setting['name'] ?>  <?= isset($meta_title) ? '- ' . $meta_title : '' ?></title>

	<!--  CSS -->
	<link rel="stylesheet" href="<?= base_url('assets/store/default/'); ?>css/bootstrap.min.css" />
	<link rel="stylesheet" href="<?= base_url('assets/store/default/'); ?>fonts/fonts.css" />
	<link rel="stylesheet" href="<?= base_url('assets/store/default/'); ?>fonts/fonts.css" />
	<link rel="stylesheet" href="<?= base_url('assets/store/default/'); ?>css/placeholder-loading.css" />
	<link rel="stylesheet" href="<?= base_url('assets/store/default/'); ?>css/style.css" />

	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

	<script src="<?= base_url('assets/store/default/'); ?>js/jquery-3.5.1.slim.min.js"></script>
	<script src="<?= base_url('assets/store/default/'); ?>js/jquery.min.js"></script>
	<script src="<?= base_url('assets/store/default/'); ?>js/bootstrap.min.js"></script>
	<script src="<?= base_url('assets/plugins/store/') ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

	<script type="text/javascript">
		try {
			<?php 
			if($store_setting['google_analytics'] != ''){
				$ana = preg_replace('/<script>/', '', $store_setting['google_analytics']);
				$ana = preg_replace('/<\/script>/', '', $ana);
				echo $ana;
			} 
			?>
		} catch (error) {
			console.log(error);
		}
	</script>

	<?php 
	$global_script_status = (array)json_decode($SiteSetting['global_script_status'],1);
	if(in_array('store', $global_script_status)){
		echo $SiteSetting['global_script'];
	}
	?>

	<script type="text/javascript">
		(function ($) {
			$.fn.btn = function (action) {
				var self = $(this);
				if (action == 'loading') {
					if ($(self).attr("disabled") == "disabled") {
                      //e.preventDefault();
                  }
                  $(self).attr("disabled", "disabled");
                  $(self).attr('data-btn-text', $(self).html());
                  $(self).html('<i class="fa fa-spinner fa-spin"></i>&nbsp;' + $(self).text());
              }
              if (action == 'reset') {
              	$(self).html($(self).attr('data-btn-text'));
              	$(self).removeAttr("disabled");
              }
          }
      })(jQuery);
      var formDataFilter = function(formData) {
      	if (!(window.FormData && formData instanceof window.FormData)) return formData
      		if (!formData.keys) return formData
      			var newFormData = new window.FormData()
      		Array.from(formData.entries()).forEach(function(entry) {
      			var value = entry[1]
      			if (value instanceof window.File && value.name === '' && value.size === 0) {
      				newFormData.append(entry[0], new window.Blob([]), '')
      			} else {
      				newFormData.append(entry[0], value)
      			}
      		});
      		return newFormData;
      	}
      </script>

      <?php if (is_rtl()) { ?>
      	<!-- place here your RTL css code -->
      <?php } ?>


	  <style>
		.loader {
			border: 5px solid #f3f3f3;
			border-radius: 50%;
			border-top: 5px solid #3498db;
			width: 60px;
			height: 60px;
			z-index: 9999;
			-webkit-animation: spin 2s linear infinite;
			/* Safari */
			animation: spin 2s linear infinite;
			position: fixed;
			top: 50%;
			left: 50%;
			transform: translate(-50%, -50%);
			-webkit-transform: translate(-50%, -50%);
		}
	
		.body-loading {
			/*  position: fixed;
	        top: 0;
	        left: 0;
	        width: 100vw;
	        height: 100vh;
	        overflow: hidden; */
		}
	
		.body-loading::before {
			content: '';
			position: fixed;
			top: 0;
			left: 0;
			width: 100vw;
			height: 100vh;
			z-index: 9999;
			background-color: rgba(255, 255, 255, .8);
		}
	
		@-webkit-keyframes spin {
			0% {
				-webkit-transform: rotate(0deg);
			}
	
			100% {
				-webkit-transform: rotate(360deg);
			}
		}
	
		@keyframes spin {
			0% {
				transform: rotate(0deg);
			}
	
			100% {
				transform: rotate(360deg);
			}
		}
	</style>
	
	<script>
		// loading function
		function showLoading() {
			$('body').append('<div id="loadingAffiliate" class="loader"></div>').addClass('body-loading');
		}

		function hideLoading() {
			setTimeout(() => {
				$('#loadingAffiliate').fadeOut();
			}, 1000);
			setTimeout(() => {
				$('#loadingAffiliate').remove();
				$('body').removeClass('body-loading');
			}, 1200);
		}
	</script>
  </head>
  <body>


  	<section class="thankyou-content">
  		<div class="container">
  			<div class="thankyou-content-wrapper">
  				<img src="<?= base_url('assets/store/default/'); ?>img/thankyoumain.png" class="thankyou-main-img" alt="<?= __('store.thank_you_for_purchasing_an_order') ?>">
  				<h3><?= __('store.order_number') ?> (#<?php echo orderId($order['id']); ?>)</h3>
  				<!-- <h4><?= __('store.thank_you_for_purchasing_an_order') ?></h4> -->
				<h4>Payment processing...</h4>
				<h5><?= $payurl ?></h5>
  			</div>
  		</div>
  	</section>


<section class="profile-page">
<div class="container">
<div class="profile-page-wrapper">
<div class="profile-main w-100">
<h2><?= __('store.product_info') ?></h2>
<div class="my-orders my-order-details">
<div class="cart-wrapper">
	<ul class="cart-header">
		<li><?= __('store.name') ?></li>
		<li><?= __('store.unit_price') ?></li>
		<li><?= __('store.quantity') ?></li>
		<li><?= __('store.discount') ?></li>
		<li><?= __('store.total') ?></li>		  
	</ul>
	<?php foreach ($products as $key => $product) { ?>
		<ul class="cart-items-row">
			<li>
				<span class="my-orders-text img-order-details-img"><img src="<?= (!empty($product['image'])) ? $product['image'] : base_url('assets/store/default/img/1.png'); ?>" alt="<?= __('store.image') ?>">
					<p class="my-0">
						<?php
						$combinationString = "";
						if(isset($product['variation']) && !empty($product['variation'])) {
							$variation = json_decode($product['variation']);
							foreach ($variation as $key => $value) {
								if($key == 'colors') {
									$combinationString .= ($combinationString == "") ? explode("-",$value)[1] : ",".explode("-",$value)[1];
								} else {
									$combinationString .= ($combinationString == "") ? $value : ",".$value;
								}
							}
						}
						?>
						<?= $product['product_name'] ?> <?= ($combinationString != "") ? "(".$combinationString.")" : "" ?>
						<?php if($product['coupon_discount'] > 0){ ?>
							<br><small class="couopn-code-text">
								<?= __('store.code') ?> : <span class="c-name"> <?= $product['coupon_code'] ?></span> <?= __('store.applied') ?>
							</small>
						<?php } ?>
					</p>
					
				</span>
			</li>
			<li><span class="my-orders-text"><?php echo c_format($product['price'] + $product['variation_price']); ?></span>
				<li><span class="my-orders-text"><?php echo $product['quantity']; ?></span>
					<li><span class="my-orders-text">
						<?php $priceDiscount = (float)$product['msrp'] > 0 ? (float)$product['msrp'] - (float)$product['price'] : 0; ?>
						<?php echo c_format((float)$product['coupon_discount'] + (float)$priceDiscount); ?>
					</span>
					<li><span class="my-orders-text"><?php echo c_format($product['total']); ?></span>
					</ul>
				<?php } ?>
				<div class="download">
				<?php if($order['status'] == 1 && ($product['product_type'] == 'downloadable' || $product['product_type'] =='video' || $product['product_type'] =='videolink') && $product['downloadable_files']) { 
						 if ($product['product_type'] =='video' || $product['product_type'] =='videolink') { ?>
			 	<p>
			 		<?= __('store.course_link') ?>:
				 	<a href="<?=base_url('store/vieworderdetails/').$order['id'].'?referance='.$product['product_id'] ?>" title="<?= __('store.start_course') ?>" target="_blank"> <?= __('store.start_course') ?>
				 	</a>
				</p>
				</div>
					<?php  } else {?>
						
				<div class="download">
					<p><?= __('store.files_to_download') ?>:
					<?php foreach ($product['downloadable_files'] as $downloadable_filess) {
						$downloadable_link =  base_url('store/downloadable_file/'. $downloadable_filess['name'] . '/' .$downloadable_filess['mask'].'/'.$product['order_id']);
						$downloadable_link .=empty($is_guest)? '?link='.encryptString($order['user_id']):''; 

					 ?>
						<a href="<?php echo $downloadable_link; ?>" class="btn btn-link btn-sm" target="_blank"><?php echo $downloadable_filess['mask'] ?></a>
					<?php } ?>
				
					</p>
				</div>
					<?php } } ?>
				
				<ul class="cart-footer-row">
					<?php foreach ($totals as $key => $total) { ?>
						<li>
							<span><?= $total['text'] ?></span>		 
							<span><?php echo c_format($total['value']); ?></span>		 
						</li>
					<?php } ?>
				</ul>
			</div>
		</div>
		


		<h2 class="mt-5"><?= __('store.update_order_status') ?></h2>
		<div class="cart-wrapper order-details-bottom-left w-100 mt-4 order-details-last-bottom">
			<ul class="cart-header">
				<li>#</li>
				<li class="cart-item-price"><?= __('store.status') ?></li>
				<li><?= __('store.comment') ?></li>
			</ul>

			<?php if(!$order_history){ ?>
				<ul class="cart-items-row">
					<li><span class="my-orders-text"><?= __('store.no_any_order_status') ?></span> </li>
				</ul>
			<?php } ?>
			<?php foreach ($order_history as $key => $value) { ?>
				<ul class="cart-items-row">
					<li><span class="my-orders-text">#<?= $key ?></span> </li>		
					<li><span class="my-orders-img-check"><?= $status[$value['order_status_id']] ?></span> </li>		
					<li><span class="my-orders-text"><?= $value['comment'] ?></span> </li>			
				</ul>
			<?php } ?>
		</div>
	</div>
</div>
</div>	   
</section>
  				
  				

<div class="footer-bottom">
	<div class="container">
		<div class="footer-row w-100 text-center pb-1">
			<p class="w-100 text-center pb-2"><?= ($store_setting['footer'] != '') ? $store_setting['footer'] : __('store.all_rights_reserved')." ".date('Y')."."?></p>
		</div>
	</div>
</div>

<script>
	var base_url = window.location.origin;
	var uncomplete_id = '<?= $uncompleted_id ?>';
	var orderStatus = '<?= $order['status'] ?>';
	$(".print").on('click',function(){
		window.print();
	});
	function getUrlParameter(name) {
		name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
		var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
		results = regex.exec(location.search);
		return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
	}
	if(getUrlParameter('print')==1)  window.print();

	function retrieve_orders_payment_data() { 
		let url = base_url + '/api/v1/order/payment/' + uncomplete_id;
		var settings = {
			"async": true,
			"crossDomain": true,
			"url": url,
			"method": "GET",
			"headers": {
				"Content-Type": "application/json",
				"cache-control": "no-cache",
			},
			"processData": false,
		}
		showLoading();
		$.ajax(settings).done(function (response) {
			var data = JSON.parse(response);
			console.log(data);
			if (data && data.data && data.data.payUrl) {
				localStorage.removeItem("extraData");
				window.location.href = data.data.payUrl;
				hideLoading();
			} else {
				setTimeout(function () { retrieve_orders_payment_data(); }, 3000);
			}
		});

	}

	$(document).ready(function () {
		// <option value="12">Waiting For Payment</option>
		// <option value="1">Complete</option>
		// <option value="2">Total not match</option>
		// <option value="3">Denied</option>
		// <option value="4">Expired</option>
		// <option value="5">Failed</option>
		// <option value="6">Pending</option>
		// <option value="7">Processed</option>
		// <option value="8">Refunded</option>
		// <option value="9">Reversed</option>
		// <option value="10">Voided</option>
		// <option value="11">Canceled Reversal</option>
		if (orderStatus == 12) // Waiting For Payment
			retrieve_orders_payment_data();
	})
</script>
</body>
</html>