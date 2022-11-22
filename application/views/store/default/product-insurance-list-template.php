<script id="product-list-template" type="text/html">
	<div class="row">
	{{#products}}
	<div class="col-lg-6">
		<div class="product">
			<div class="product-body">
				<div class="insur-content">
					<!-- <h3 class="category">BẢO HIỂM SỨC KHỎE</h3> -->
					<h3 class="name"><a href="{{product_details_href}}">{{product_name}}</a></h3>
					<div class="description">
						{{product_short_description}}
					</div>
				</div>
				<div class="insur-images">
					<img alt="<?= __('store.image') ?>" src="{{product_image_src}}" class="img-fluid primg" onerror="this.src='<?= base_url('assets/store/default/img/no-image.png')?>';"/>
				</div>
			</div>
			<div class="product-footer">
				<div class="price">
					<span>Từ</span>
					<span class="number">{{product_suggested_price}} <u>đ</u>/năm</span>
				</div>
				<a href="{{product_details_href}}" class="btn btn-primary btn-buynow"><i
						class="fa fa-cart-plus" aria-hidden="true"></i> Mua ngay</a>
			</div>
		</div>
	</div>
	{{/products}}
	</div>
</script>