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
				
				<h2><?= __('store.orders') ?></h2>
				<div class="my-orders">
					<?php if($buyproductlist) {
					
						$subtotal = 0;
					
						foreach($buyproductlist as $product){ 

							$subtotal = $subtotal + (float)$product['total_sum'];
							
						?>
						<div class="order" data-product="<?php echo $product['id'];?>">
							<div class="order-header">
								<span>
									<?= __('store.order_status') ?>:
									<span class="order-status <?php echo $class_class[$product['status']]?>">
										<i class="<?php echo $class_icon[$product['status']] ?>"></i> <?php echo $status[$product['status']]; ?>
									</span>
								</span>
								<span class="date-create">Ngày mua:  <?= date_format(date_create($product['created_at']),"d/m/Y");  ?></span>
							</div>
							<div class="order-body">
								<div class="product">
									<div class="detail">
										<div class="product-img">
											<img src="<?= (!empty($product['product_featured_image'])) ? $product['product_featured_image'] : base_url('assets/store/default/img/1.png'); ?>" alt="<?= __('store.image') ?>">
											
										</div>
										<div class="product-info">
											<p class="product-name"><?php echo $product['product_name']; ?></p>
											<div><span class="badge badge-primary"><?php echo $product['category_name']; ?></span></div>
										</div>
									</div>
									<div class="price"><span><?php echo c_format($product['total_sum']); ?> ₫</span></div>
								</div>
							</div>
							<div class="order-footer">
								<div class="total-money">
									<div class="title">Tổng tiền:&nbsp;&nbsp;</div>
									<div class="total"><?php echo c_format($product['total_sum']); ?> ₫</div>
								</div>
								<div class="button-group">
									<a class="btn btn-sm btn-primary" href="<?= $product['product_slug'] ?>">Mua lại</a>
									<a class="btn btn-sm btn-view-detail" href="<?= base_url('store/vieworder/'. $product['id']) ?>"><?= __('store.details') ?></a>
								</div>
							</div>
						</div>
						<?php } ?>
						
						<?php } else { ?>
						<ul class="cart-items-row">
							<li class="w-100"><span class="my-orders-text">
									<?= __('store.no_order_found') ?>
								</span></li>
						</ul>
					<?php } ?>
				</div>


			</div>
		</div>
	</div>
</section>
