</div>

<footer class="footer style-1  bg222 " aff-section="classified_footer"></footer>


<script aff-template="classified_footer" type="text/html">

	<div class="container padding-top-60 pt-5">
		<div class="footer-main padding-bottom-10">
			<div class="row">
				<div class="col-md-4 col-sm-4 col-xs-12 margin-bottom-30">

					<div class="footer-logo">
						<a class="temp-logo" href="{{home_page_url}}">
							<img src="{{logo}}" height="36" onerror="this.src='<?=base_url('assets/store/default/').'img/logo.png'?>';" alt="<?= __('store.image') ?>" class="img-fluid">
						</a>
				</div>

				<div class="footer-intro">
					<p>{{about_content}}</p>
					<a href="{{aboutus_page_url}}"><?= __('store.read_more')?></a>
				</div>
			</div>
			{{#recent_products_available}}
			<div class="col-md-4 col-sm-4 col-xs-12 margin-bottom-30">
				<div class="footer-widget-title">
					<h5><?= __('store.recent_ads')?></h5>
				</div>

				<div class="footer-recent-post-widget">
					{{#recent_products}}
					<div class="footer-recent-post clearfix">
						<a href="{{product_details_url}}">

						<div class="footer-recent-post-figure me-2"><img alt="recent post" src="{{product_featured_image}}" /></div>

						<div class="footer-recent-post-content">
							<div class="footer-recent-post-title text-light">{{product_name}}</div>

							<div class="footer-recent-post-disc">
								<p>{{product_created_date}}</p>
							</div>

							<div class="footer-recent-post-caption">
								<p class="date">{{product_price}}</p>
							</div>
						</div>
						</a>
					</div>
					{{/recent_products}}
				</div>
			</div>
			{{/recent_products_available}}

			<div class="col-md-4 col-sm-4 col-xs-12 margin-bottom-30">
				<div class="footer-widget-title">
					<h5><?= __('store.promotions')?></h5>
				</div>

				<div class="footer-flikr-widget">
					<ul class="flikr-list clearfix">
						<li><a href="#"><img alt="flikr photo" src="<?= base_url('assets/store/classified/'); ?>media/listing/j3.jpg" /></a></li>
						<li><a href="#"><img alt="flikr photo" src="<?= base_url('assets/store/classified/'); ?>media/listing/j4.jpg" /></a></li>
						<li><a href="#"><img alt="flikr photo" src="<?= base_url('assets/store/classified/'); ?>media/listing/j5.jpg" /></a></li>
						<li><a href="#"><img alt="flikr photo" src="<?= base_url('assets/store/classified/'); ?>media/listing/j6.jpg" /></a></li>
						<li><a href="#"><img alt="flikr photo" src="<?= base_url('assets/store/classified/'); ?>media/listing/j7.jpg" /></a></li>
						<li><a href="#"><img alt="flikr photo" src="<?= base_url('assets/store/classified/'); ?>media/listing/j8.jpg" /></a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	</div>

	<div class="footer-bottom">
		<div class="container">
			<div class="row clearfix align-items-center">
				<div class="col-md-4 col-sm-12 col-xs-12 margin-bottom-20">
					<div class="footer-copyright">
						{{{privacy_and_copyrights}}}
					</div>
				</div>

				<div class="col-md-8 ms-auto col-sm-12 col-xs-12 margin-bottom-20">
					<nav class="footer-menu wsmenu clearfix">

						<ul class="wsmenu-list float-end text-end">
							{{#payment_gateways}}
							<li><a href="javaScript:void(0);"><img alt="{{title}}" src="{{icon}}" width="68" height="32"/></a></li>
							{{/payment_gateways}}
						</ul>
					</nav>
				</div>
			</div>
		</div>
	</div>

</script>

<script src="<?= base_url('assets/store/classified/'); ?>assets/js/app.js"></script>

<?php if(isset($aff_item_id)) { ?>
	<input type="hidden" name="aff_item_id" value="<?php echo $aff_item_id; ?>">
<?php } ?>

<?php if(isset($aff_query)){ ?>
	<textarea name="aff_query_payload" style="display:none"><?php echo json_encode($aff_query); ?></textarea>
<?php } ?>

<script> 
	const BASE_URL = "<?= base_url(); ?>";
	const mobile_number_errors = ['<?= __('store.invalid_number') ?>','<?= __('store.invalid_country_code') ?>','<?= __('store.too_short') ?>','<?= __('store.too_long') ?>','<?= __('store.invalid_number') ?>', '<?= __('store.mobile_number_is_required') ?>'];
</script>

<script src="<?= base_url('assets/plugins/') ?>mustache.js"></script>
<script src="<?= base_url('assets/store/') ?>affclassifiedstore.js"></script>


</body>

</html>