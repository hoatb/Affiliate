
<section class="profile-page">
	<div class="container">
		<div class="profile-page-wrapper">
			<div class="profile-sidebar">
                <div class="d-inline-block mb-3">
                    <?php 
						$avatar = ($client['avatar'] != '') ? base_url('assets/images/users/'.$client['avatar']) : base_url('assets/store/default/img/avatar-default.png') ; 
					?>
                    <img id="img-sub" src="<?= $avatar ?>" alt="<?= __('store.profile') ?>" class="img-profile-sub">
                    <div class="d-inline-block pl-2" style="vertical-align: middle;">
                        <p class="text-left mb-0"><?= __('store.profile') ?></p>
                        <strong class="text-left"><?php echo $userDetails['firstname']?> <?php echo $userDetails['lastname']?></strong>
                    </div>
                </div>
                <ul class="list-unstyled">
                    <li><a href="<?= $base_url ?>profile"><i class="bi bi-person-fill"></i> <?= __('store.profile') ?></a></li>
                    <li><a class="active" href="<?= $base_url ?>order"><i class="bi bi-gift-fill"></i> <?= __('store.order') ?></a></li>
                    <li><a href="<?= $base_url ?>logout"><i class="bi bi-box-arrow-left"></i> <?= __('store.logout') ?></a></li>
                </ul>
            </div>
			
			<div class="profile-main my-order-main">
				<h2><?= __('store.order_details') ?> (#<?php echo orderId($order['id']); ?>)</h2>
				<div class="row">
					<?php if($this->session->flashdata('success')){?>
						<div class="alert alert-success alert-dismissable my_alert_css">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<?php echo $this->session->flashdata('success'); ?> </div>
					<?php } ?>
					<?php if($this->session->flashdata('error')){?>
						<div class="alert alert-danger alert-dismissable my_alert_css">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<?php echo $this->session->flashdata('error'); ?> </div>
					<?php } ?>
				</div>

				<div class="my-orders ">
					<div class="my-orders">
						<?php foreach ($products as $key => $product) { ?>

							
						<div class="order" data-product="<?php echo $product['id'];?>">
							<div class="order-header">
								<span>
									<?= __('store.order_status') ?>:
									<span class="order-status <?php echo $class_class[$order['status']]?>">
										<i class="<?php echo $class_icon[$order['status']] ?>"></i> <?php echo $status[$order['status']]; ?>
									</span>
								</span>
								<span class="date-create">Ngày mua:  <?= date_format(date_create($order['created_at']),"d/m/Y");  ?></span>
							</div>
							<div class="order-body">
								<div class="product">
									<div class="detail">
										<div class="product-img">
											<img src="<?= (!empty($product['image'])) ? $product['image'] : base_url('assets/store/default/img/1.png'); ?>" alt="<?= __('store.image') ?>">
										</div>
										<div class="product-info">
											<p class="product-name">
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
											</p>
											<!-- <div><span class="badge badge-primary"> </span></div> -->
											<?php if($product['coupon_discount'] > 0){ ?>
												<br><small class="couopn-code-text">
													Code : <span class="c-name"> <?= $product['coupon_code'] ?></span> <?= __('store.applied') ?>
											</small>
											<?php } ?>
										</div>
									</div>
									<div class="price"><span><?php echo c_format($product['total'])?> ₫</span></div>
								</div>
							</div>
							<div class="order-footer">
								<div class="total-money">
									<div class="title">Tổng tiền:&nbsp;&nbsp;</div>
									<div class="total"><?php echo c_format($product['total']); ?> ₫</div>
								</div>
							</div>
						</div>

						<?php } ?>
					</div>

				
				<div class="my-order-details-bottom d-none">
					<div class="cart-wrapper order-details-bottom-left my-orders">
						<h2><?= __('store.order_payment_info') ?></h2>
						<ul class="cart-header">
							<li><?= __('store.mode') ?></li>
							<li class="cart-item-price"><?= __('store.transaction_id') ?></li>
							<li><?= __('store.payment_status') ?></li>
						</ul>

						<?php if($order['status'] == 0){ ?>
							<ul class="cart-items-row">
							<li><span class="my-orders-text"> <?= __('store.waiting_for_payment_status') ?></span></li>
							</ul>
						<?php } ?>
						<?php foreach ($payment_history as $key => $value) { ?>
						<ul>
							<li><span class="my-orders-text"><?php echo str_replace("_", " ", $value['payment_mode']) ?></span></li>
							<li><span class="my-orders-text"><?php echo $order['txn_id'];?></span></li>
							<li><span class="my-orders-text"><?php echo $value['paypal_status'] ?></span></li>
						</ul>
						<?php } ?>

						<?php if($order['payment_method'] == 'bank_transfer'){ ?>
							<div class="form-group">
								<label class="control-label"><b><?= __('store.bank_transfer_instruction') ?></b></label>
								<pre class="well"><?php echo $paymentsetting['bank_transfer_instruction'] ?></pre>
							</div>
						<?php } ?>

						<?php if($order['comment']){ ?>
							<div class="cart-wrapper order-details-bottom-left w-100 mt-4 my-orders">
								<h2><?= __('store.order_view_comment') ?></h2>
								<ul class="cart-header">
									<li><?= __('store.title') ?></li>
									<li><?= __('store.comment') ?></li>
								</ul>
								<?php foreach ($order['comment'] as $key => $value) { ?>
									<ul class="cart-items-row">
										<li><span class="my-orders-text"><?= $value['title'] ?></span> </li>		
										<li><span class="my-orders-text"><?= $value['comment'] ?></span> </li>		
									</ul>
								<?php } ?>
							</div>
						<?php } ?>

						<?php if($order['files']){ ?>
							<div class="card mt-2 no-border">
								<div class="card-body">
								<label class="control-label"><b><?= __('store.order_attechments_download') ?></b></label>
								<div><?php echo $order['files'] ?></div>
							</div>
							</div>
						<?php } ?>
						<?php if($order['order_country']){ ?>
							<div class="card mt-2 no-border">
								<div class="card-body">
								<label class="control-label"><b><?= __('store.order_done_from') ?></b></label>
								<div>
									<?php echo $order['order_country'];?><?php echo $order['order_country_flag'];?>
								</div>
							</div>
							</div>
						<?php  } ?>
						
						<?php if($orderProof){ ?>
							<div class="card mt-2 no-border">
								<div class="card-body">
								<label class="control-label"><b><?= __('store.payment_proof') ?></b>
									<a href="<?= $orderProof->downloadLink ?>" target='_blank'>: <?= __('store.download') ?></a>
								</label>
							</div>
							</div>
						<?php } ?>
					</div>


					<?php if($order['allow_shipping']){ ?>
						<div class="cart-wrapper order-details-bottom-right my-orders">
							<h2><?= __('store.shipping_details') ?></h2>
							<ul class="cart-header">
								<li>&nbsp;</li>
								<li class="cart-item-price">&nbsp;</li>
							</ul>
							<ul class="cart-items-row">
								<li><span class="my-orders-text"><?= __('store.address') ?></span></li>
								<li><span class="my-orders-text"><?php echo $order['address'] ?></span></li>
							</ul>
							<ul class="cart-items-row">
								<li><span class="my-orders-text"><?= __('store.country') ?></span></li>
								<li><span class="my-orders-text"><?php echo $order['country_name'] ?></span></li>
							</ul>
							<ul class="cart-items-row">
								<li><span class="my-orders-text"><?= __('store.state') ?></span></li>
								<li><span class="my-orders-text"><?php echo $order['state_name'] ?></span></li>
							</ul>
							<ul class="cart-items-row">
								<li><span class="my-orders-text"><?= __('store.city') ?></span></li>
								<li><span class="my-orders-text"><?php echo $order['city'] ?></span></li>
							</ul>
							<ul class="cart-items-row">
								<li><span class="my-orders-text"><?= __('store.postal_code') ?></span></li>
								<li><span class="my-orders-text"><?php echo $order['zip_code'] ?></span></li>
							</ul>
						</div>
					<?php } ?>  
				</div>

				<div class="cart-wrapper order-details-bottom-left w-100 mt-2 order-details-last-bottom">
					<h2><?= __('store.update_order_status') ?></h2>
					<ul class="cart-header">
						<li>#</li>
						<li class="cart-item-price"><?= __('store.status') ?></li>
						<li>Ngày tạo</li>
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
							<li><span class="my-orders-img-check">
								<span class="order-status <?php echo $class_class[$value['order_status_id']]?>">
									<i class="<?php echo $class_icon[$value['order_status_id']] ?>"></i> <?php echo $status[$value['order_status_id']]; ?>
								</span>
							</li>		
							<li>
								<?= date_format(date_create($value['created_at']),"d/m/Y H:i:s");  ?>
							</li>
							<li><span class="my-orders-text"><?= $value['comment'] ?></span> </li>			
							
						</ul>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>	   
</section>