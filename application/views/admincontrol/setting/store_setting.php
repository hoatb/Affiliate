<style>
	.jscolor-picker-wrap{
		z-index:999999 !important;
	}

	#theme_section .table > tbody > tr > td, #theme_section .table > tfoot > tr > td, #theme_section .table > thead > tr > td,
	#menu_items_list.table > tbody > tr > td, #menu_items_list.table > tfoot > tr > td, #menu_items_list.table > thead > tr > td {
		padding: 5px 12px;
		vertical-align: middle !important;
	}

	.table td, .table th {
		vertical-align: middle !important;
	}

	.swal2-container {
		z-index:999999!important;
	}
</style>

<div class="row">
	<div class="col-lg-12 col-md-12">
		<?php if($this->session->flashdata('success')){?>
			<div class="alert alert-success">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<?php echo $this->session->flashdata('success'); ?> </div>
			<?php } ?>
			<?php if($this->session->flashdata('error')){?>
				<div class="alert alert-danger">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<?php echo $this->session->flashdata('error'); ?> </div>
				<?php } ?>
			</div>
		</div>

		<form class="form-horizontal" method="post" action=""  enctype="multipart/form-data" id="setting-form">
			<div class="row">
				<div class="col-sm-12">
					<div class="card">
						<div class="card-header">
							<h4 class="card-title"><?= __('admin.page_title_store_setting') ?></h4>
						</div>
						<div class="card-body p-0">
							<div class="tab-pane p-3" id="store-setting" role="tabpanel">
								<div role="tabpanel">

									<ul class="nav nav-pills setting-nnnav payment-link" role="tablist">
										<li role="presentation" class="active nav-item">
											<a class="nav-link active orange-bg-store show" href="#store_main" aria-controls="store_main" role="tab" data-toggle="tab"><?= __('admin.store_setting') ?></a>
										</li>
										<li role="presentation" class="nav-item">
											<a class="nav-link orange-bg-store" href="#product_setting" aria-controls="product_setting" role="tab" data-toggle="tab"><?= __('admin.store_commission') ?></a>
										</li>
										<li role="presentation" class="nav-item">
											<a class="nav-link orange-bg-store" href="#shipping_setting" aria-controls="shipping_setting" role="tab" data-toggle="tab"><?= __('admin.shipping_setting') ?></a>
										</li>
										<li role="presentation" class="nav-item">
											<a class="nav-link orange-bg-store" href="#tax_setting" aria-controls="tax_setting" role="tab" data-toggle="tab"><?= __('admin.tax_setting') ?></a>
										</li>
										<li role="presentation" class="nav-item">
											<a class="nav-link orange-bg-store" href="#order_comment" aria-controls="order_comment" role="tab" data-toggle="tab"><?= __('admin.order_comment') ?></a>
										</li>
										<?php  
											if ((! isset($store['store_mode'])) || $store['store_mode'] == 'cart') {
												$cart_theme_settings_display = '';
												$sales_theme_settings_display = 'd-none';
											} else {
												$cart_theme_settings_display = 'd-none';
												$sales_theme_settings_display = '';
											}
										?>
										<li role="presentation" class="nav-item cart_theme_settings <?= $cart_theme_settings_display ?>">
											<a class="nav-link orange-bg-store" href="#theme_section" aria-controls="theme_section" role="tab" data-toggle="tab"><?= __('admin.theme_section') ?></a>
										</li>
										<li role="presentation" class="nav-item cart_theme_settings <?= $cart_theme_settings_display ?>">
											<a class="nav-link orange-bg-store" href="#pages_menu_section" aria-controls="pages_menu_section" role="tab" data-toggle="tab"><?= __('admin.pages_and_menu') ?></a>
										</li>
										<li role="presentation" class="nav-item sales_theme_settings <?= $sales_theme_settings_display ?>">
											<a class="nav-link orange-bg-store" href="#pages_menu_section" aria-controls="pages_menu_section" role="tab" data-toggle="tab"><?= __('admin.theme_section') ?></a>
										</li>
									</ul>
									<hr>

									<div class="tab-content">
										<div role="tabpanel" class="tab-pane" id="shipping_setting">
											<div class="card">
												<div class="card-header"><h6 class="m-0"><?= __('admin.shipping_charge') ?></h6></div>
												<div class="card-body">
													<div class="form-group">
														<label class="control-label"><?= __('admin.allow_shipping_in_all_country') ?></label>
														<div>
															<label class="radio-inline"><input type="radio" <?= (int)$shipping_setting['shipping_in_limited'] == 0 ? 'checked' : '' ?> class="shipping_in_limited" name="shipping_setting[shipping_in_limited]" value="0"> 
																<?= __('admin.yes_all_country') ?>
															</label>
															<label class="radio-inline"><input type="radio" <?= (int)$shipping_setting['shipping_in_limited'] == 1 ? 'checked' : '' ?> class="shipping_in_limited" name="shipping_setting[shipping_in_limited]" value="1"> 
																<?= __('admin.no_custom_country') ?>
															</label>
														</div>
													</div>
													<div class="form-group">
														<label class="control-label"><?= __('admin.shipping_error_message') ?></label>
														<input type="text" value="<?= $shipping_setting['shipping_error_message'] ?>" name="shipping_setting[shipping_error_message]" class="form-control">
													</div>
													<table class="table table-striped shipping-table">
														<thead>
															<tr>
																<th><?= __('admin.country') ?></th>
																<th width="180px"><?= __('admin.shipping_cost') ?></th>
																<th width="50px"></th>
															</tr>
														</thead>
														<tbody>

														</tbody>
														<tfoot>
															<tr>
																<td colspan="3" class="text-right">
																	<button class="btn btn-primary byn-sm btn-shipping-rule" type="button" ><?= __('admin.add_new_rule') ?></button>
																</td>
															</tr>
														</tfoot>
													</table>
												</div>
											</div>

											<script type="text/javascript">
												var shipping_index = 0;
												<?php 
												$country_options = '';
												foreach ($country as $key => $value) { 
													$country_options .= '<option value="'. $value->id .'">'. str_replace("'", '', $value->name) .'</option>';
												} 
												?>
												$(".shipping_in_limited").on("change",function(){
													var val = $(this).val();
													$(".shipping-country-table").hide();
													if(val == 1){
														$(".shipping-country-table").show();
													}
												})
												$(".shipping_in_limited:checked").trigger("change");
												function addShippingCountry(country) {
													var shipping_html = '';
													shipping_html += '<tr>';
													shipping_html += '	<td>';
													shipping_html += '		<select name="shipping_setting[allow_country][]" class="form-control">';
													shipping_html += '			<option value=""><?= __('admin.choose_country') ?></option>';
													shipping_html += '			<?= $country_options ?>';
													shipping_html += '		</select>';
													shipping_html += '	</td>';
													shipping_html += '	<td>';
													shipping_html += '		<button class="btn btn-danger remove-tr" type="button"><i class="fa fa-trash"></i></button>';
													shipping_html += '	</td>';
													shipping_html += '</tr>';
													$ship = $(shipping_html);
													$ship.find("select").val(country);
													$ship.appendTo(".shipping-country-table tbody");
													shipping_index++;
												}
												$(".btn-shipping-country").click(function(){
													addShippingCountry('');
												})
												$(".shipping-country-table, .shipping-table").delegate(".remove-tr","click", function(){
													$(this).parents("tr").remove();
												})
												$(".btn-shipping-rule").click(function(){
													addShippingRule('',0);
												})
												function addShippingRule(country,cost) {
													var shipping_html = '';
													shipping_html += '<tr>';
													shipping_html += '	<td>';
													shipping_html += '		<select name="shipping_setting[cost]['+ shipping_index +'][country]" class="form-control taxc-'+ shipping_index +'">';
													shipping_html += '			<option value=""><?= __('admin.choose_country') ?></option>';
													shipping_html += '			<?= $country_options ?>';
													shipping_html += '		</select>';
													shipping_html += '	</td>';
													shipping_html += '	<td><input type="" name="shipping_setting[cost]['+ shipping_index +'][cost]" onkeydown="if(event.key===\'.\'){event.preventDefault();}"  oninput="event.target.value = event.target.value.replace(/[^0-9]*/g,\'\');" class="form-control ssv-'+ shipping_index +'"></td>';
													shipping_html += '	<td>';
													shipping_html += '		<button class="btn btn-danger  remove-tr" type="button"><i class="fa fa-trash"></i></button>';
													shipping_html += '	</td>';
													shipping_html += '</tr>';
													$ship = $(shipping_html);
													$ship.find("select").val(country);
													$ship.find("input").val(cost);
													$ship.appendTo(".shipping-table tbody");
													shipping_index++;
												}
												<?php 
												$allow_country = (array)(isset($shipping_setting['allow_country']) ? json_decode($shipping_setting['allow_country'],1) : []);
												foreach (array_unique($allow_country) as $key => $value) {
													echo "addShippingCountry('". (int)$value ."');";
												}
												$cost = (array)(isset($shipping_setting['cost']) ? json_decode($shipping_setting['cost'],1) : []);
												foreach ($cost as $key => $value) {
													echo "addShippingRule('". (int)$value['country'] ."','". (float)$value['cost'] ."');";
												}
												?>
											</script>
										</div>
										<div role="tabpanel" class="tab-pane" id="tax_setting">
											<div class="card">
												<div class="card-header"><h6 class="m-0"><?= __('admin.tax_charge') ?></h6></div>
												<div class="card-body">
													<div class="form-group">
														<label class="control-label"><?= __('admin.allow_tax_in_all_country') ?></label>
														<div>
															<label class="radio-inline"><input type="radio" <?= (int)$tax_setting['tax_status'] == 0 ? 'checked' : '' ?> class="tax_status" name="tax_setting[tax_status]" value="0"> 
																<?= __('admin.tax_disable') ?>
															</label>
															<label class="radio-inline"><input type="radio" <?= (int)$tax_setting['tax_status'] == 1 ? 'checked' : '' ?> class="tax_status" name="tax_setting[tax_status]" value="1"> 
																<?= __('admin.yes_all_country') ?>
															</label>
															<label class="radio-inline"><input type="radio" <?= (int)$tax_setting['tax_status'] == 2 ? 'checked' : '' ?> class="tax_status" name="tax_setting[tax_status]" value="2"> 
																<?= __('admin.no_custom_country') ?>
															</label>
														</div>
													</div>
													<div class="form-group common_tax_percentage_inp">
														<label class="control-label"><?= __('admin.tax_cost') ?></label>
														<input type="text" name="tax_setting[common_tax_percentage]" onkeydown="if(event.key==='.'){event.preventDefault();}" oninput="event.target.value = event.target.value.replace(/[^0-9]*/g,'');" class="form-control common_tax_percentage" value="<?= $tax_setting['common_tax_percentage']; ?>"/>
													</div>
													<table class="table table-striped tax-table">
														<thead>
															<tr>
																<th><?= __('admin.country') ?></th>
																<th width="180px"><?= __('admin.tax_cost') ?></th>
																<th width="50px"></th>
															</tr>
														</thead>
														<tbody>

														</tbody>
														<tfoot>
															<tr>
																<td colspan="3" class="text-right">
																	<button class="btn btn-tax-rule btn-sm" type="button" ><?= __('admin.add_new_rule') ?></button>
																</td>
															</tr>
														</tfoot>
													</table>
												</div>
											</div>

											<script type="text/javascript">
												var tax_index = 0;
												<?php 
												$country_options = '';
												foreach ($country as $key => $value) { 
													$country_options .= '<option value="'. $value->id .'">'. str_replace("'", '', $value->name) .'</option>';
												} 
												?>

												$(".tax_status").on("change",function(){
													var val = $(this).val();
													$(".common_tax_percentage_inp").hide();
													$(".tax-table").hide();
													if(val == 1){
														$(".common_tax_percentage_inp").show();
													}
													if(val == 2){
														$(".tax-table").show();
													}
												})

												$(".tax_status:checked").trigger("change");

												$(".tax-table").delegate(".remove-tr","click", function(){
													$(this).parents("tr").remove();
												})
												$(".btn-tax-rule").click(function(){
													addtaxRule('',0);
												})
												function addtaxRule(country,cost) {
													var tax_html = '';
													tax_html += '<tr>';
													tax_html += '	<td>';
													tax_html += '		<select name="tax_setting[cost]['+ tax_index +'][country]" class="form-control taxc-'+ tax_index +'">';
													tax_html += '			<option value=""><?= __('admin.choose_country') ?></option>';
													tax_html += '			<?= $country_options ?>';
													tax_html += '		</select>';
													tax_html += '	</td>';
													tax_html += '	<td><input type="" name="tax_setting[cost]['+ tax_index +'][cost]" onkeydown="if(event.key===\'.\'){event.preventDefault();}"  oninput="event.target.value = event.target.value.replace(/[^0-9]*/g,\'\');" class="form-control taxv-'+ tax_index +'"></td>';
													tax_html += '	<td>';
													tax_html += '		<button class="btn btn-danger  remove-tr" type="button"><i class="fa fa-trash"></i></button>';
													tax_html += '	</td>';
													tax_html += '</tr>';
													$ship = $(tax_html);
													$ship.find("select").val(country);
													$ship.find("input").val(cost);
													$ship.appendTo(".tax-table tbody");
													tax_index++;
												}
												<?php 
												$allow_country = (array)(isset($tax_setting['allow_country']) ? json_decode($tax_setting['allow_country'],1) : []);

												$cost = (array)(isset($tax_setting['cost']) ? json_decode($tax_setting['cost'],1) : []);
												foreach ($cost as $key => $value) {
													echo "addtaxRule('". (int)$value['country'] ."','". (float)$value['cost'] ."');";
												}
												?>
											</script>
										</div>

										<div role="tabpanel" class="tab-pane active" id="store_main">
											<div class="form-group">
												<label  class="control-label"><?= __('admin.store_name') ?></label>
												<input  name="store[name]" value="<?php echo $store['name']; ?>" class="form-control"  type="text">
											</div>

											<div class="row">
												<div class="col-4">
													<div class="form-group">
														<label class="control-label"><?= __('admin.status') ?></label>
														<div>
															<input class="btn-switch store_status" type="checkbox" <?= $store['status']==1 ? 'checked' : '' ?> data-toggle="toggle" data-size="normal" data-on="ON" data-off="OFF">
														</div>
													</div>
												</div>
												<div class="col-4">
													<div class="form-group">
														<label class="control-label"><?= __('admin.display_store_menu_on_front_side') ?></label>
														<div>
															<input class="btn-switch menu_on_front" type="checkbox" <?= $store['menu_on_front']==1 ? 'checked' : '' ?> data-toggle="toggle" data-size="normal" data-on="ON" data-off="OFF">
														</div>
													</div>
												</div>

												<div class="col-4">
													<div class="form-group">
														<label class="control-label"><?= __('admin.open_in_new_tab') ?></label>
														<div>
															<input class="btn-switch menu_on_front_blank" type="checkbox" <?= $store['menu_on_front_blank']==1 ? 'checked' : '' ?> data-toggle="toggle" data-size="normal" data-on="ON" data-off="OFF">
														</div>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-4">
													<div class="form-group">
														<label class="control-label"><?= __('admin.store_mode') ?></label>
														<div>
															<input class="btn-switch store_mode" type="checkbox" 
															<?= ((! isset($store['store_mode'])) || $store['store_mode']=='cart') ? 'checked' : ''; ?> data-toggle="toggle" data-size="normal" data-on="Cart" data-off="Sales">
														</div>
													</div>
													
												</div>
												<div class="col-md-4" id="sel_store_theme">
													<div class="form-group">
														<label class="control-label"><?= __('admin.store_theme') ?></label>
														<?php   
														$theme1 = "<option value='0'>".__('admin.theme_1')."</option>";
														$classified = "<option value='classified'>".__('admin.classified')."</option>";
														?>
														<select class="form-control" name="store[theme]" id="theme_name">
															<?php   
																if((! isset($store['store_mode'])) || $store['store_mode']=='cart'){
																	echo $theme1;
																}else{
																	echo $classified;
																}
															?>
														</select>
													</div>
												</div>
											</div>
											<div class="form-group">
												<label  class="control-label"><?= __('admin.google_analytics_for_store_page') ?></label>
												<textarea name="store[google_analytics]" class="form-control"><?php echo $store['google_analytics']; ?></textarea>
											</div>



											<div class="per-task-parent">
												<?php
												$per_tasks = isset($store['per_task']) && !empty($store['per_task']) ? json_decode($store['per_task'],true) : [];
												$tcount = 1;
												if(!empty($per_tasks)) {

													foreach($per_tasks as $per_task){

														?>
														<div class="form-group row task-item">
															<div class="col-md-11">
																<label  class="control-label"><?= __('admin.script') ?> <?=$tcount?></label>
																<textarea name="store[per_task][]" class="form-control" ><?= $per_task?></textarea>
															</div>												
															<div class="col-md-1">
																<button type="button" class="btn btn-danger btn-md remove-per-task-btn" style="position: absolute; top: 30px; right: 11px;"><i class="fa fa-trash"></i></button>
															</div>
														</div>
														<?php 
														$tcount++;
													}
												}
												?>

											</div>
											<div class="col-md-12">

												<button id="add-more-per-task-btn" type="button" class="btn btn-default btn-md"><i class="fa fa-plus"></i> <?= __('admin.add_script') ?></button>
												<span class="script-count" data-value="<?=$tcount?>"></span>
											</div>
											<script type="text/javascript">
												$(document).on('click', '#add-more-per-task-btn', function(){

													let countt = parseInt($('.script-count').attr('data-value'));
													$('.per-task-parent').append(`
														<div class="form-group row task-item">
														<div class="col-md-11">
														<label  class="control-label">Script `+(countt)+`</label>
														<textarea name="store[per_task][]" class="form-control"></textarea>														
														</div>

														<div class="col-md-1">
														<button type="button" class="btn btn-danger btn-md remove-per-task-btn" style="position: absolute; top: 30px; right: 11px;"><i class="fa fa-trash"></i></button>
														</div>
														</div>`);
													$('.script-count').attr('data-value',(countt+1))
												});
												$(document).on('click', '.remove-per-task-btn', function(){
													$(this).parents('.task-item').remove();
												});
											</script>
											<fieldset>
												<legend><?= __('admin.store_logo') ?></legend>
												<div class="row">
													<div class="col-sm-6 p-4">
														<?php $img = $store['logo'] ? base_url('assets/images/site/'. $store['logo']) : base_url('assets/images/no_image_available.png'); ?>
														<img style="width: 150px;" src="<?= $img ?>" class='img-responsive'>
													</div>
													<div class="col-sm-6">
														<input type="file" name="store_logo">
													</div>
												</div>

												<div class="row">
				                                    <div class="col-sm-4">
				                                        <div class="form-group">
				                                            <label  class="control-label"><?= __('admin.site_setting_logo_custom_size')?>

				                                            ( <?= __('admin.recommended_size_is')
				                                        ?>  100x 36 [px] )	 
				                                            </label>
				                                            <select name="store[store_custom_logo_size]" class="form-control">
				                                                <option value="0"><?= __('admin.disable') ?></option>
				                                                <option <?php echo ($store['store_custom_logo_size'] == 1) ? "selected" :""; ?> value="1"><?= __('admin.store_logo_custom_size') ?></option>
				                                            </select>
				                                        </div>
				                                    </div>
				                                    <div class="col-sm-4 front_logo_cust_size_inp" <?php echo ($store['store_custom_logo_size'] != 1) ? 'style="display:none;"' :""; ?>>
				                                        <div class="form-group">
				                                            <label  class="control-label"><?= __('admin.site_setting_logo_width') ?></label>
				                                            <input name="store[store_logo_custom_width]" value="<?php echo $store['store_logo_custom_width']; ?>" class="form-control" type="number">
				                                        </div>
				                                    </div>
				                                    <div class="col-sm-4 front_logo_cust_size_inp" <?php echo ($store['store_custom_logo_size'] != 1) ? 'style="display:none;"':""; ?>>
				                                        <div class="form-group">
				                                            <label  class="control-label"><?= __('admin.site_setting_logo_height') ?></label>
				                                            <input name="store[store_logo_custom_height]" value="<?php echo $store['store_logo_custom_height']; ?>" class="form-control" type="number">
				                                        </div>
				                                    </div>
				                                    <script type="text/javascript">
				                                        $(document).on('change', 'select[name="store[store_custom_logo_size]"]', function() {
				                                            if($(this).val() == 1) {
				                                                $('.front_logo_cust_size_inp').show();
				                                            } else {
				                                                $('.front_logo_cust_size_inp').hide();
				                                            }
				                                        });
				                                    </script>
				                                </div>
											</fieldset>
											<fieldset>
												<legend><?= __('admin.store_favicon_icon') ?></legend>
												<div class="row">
													<div class="col-sm-6 p-4">
														<?php $img = $store['favicon'] ? base_url('assets/images/site/'. $store['favicon']) : base_url('assets/images/no_image_available.png'); ?>
														<img style="width: 150px;" src="<?= $img ?>" class='img-responsive'>
													</div>
													<div class="col-sm-6">
														<input type="file" name="store_favicon">
													</div>
												</div>
											</fieldset>

											<div class="form-group">
												<label  class="control-label"><?= __('admin.footer_text') ?></label>
												<input name="store[footer]" value="<?php echo $store['footer']; ?>" class="form-control"  type="text">
											</div>

											<!-- <div class="form-group">
												<label class="control-label"><?= __('admin.recaptcha') ?></label>
												<input name="formsetting[recaptcha]" value="<?php echo $formsetting['recaptcha']; ?>" class="form-control"  type="text">
											</div>
											<a class="orange-color" href="https://www.google.com/recaptcha/admin#list" target="_blank"><?= __('admin.google_captcha') ?></a> -->

											<div class="form-group">
												<label  class="control-label"><?= __('admin.contact_us_map') ?></label>
												<textarea name="store[contact_us_map]" class="form-control"><?php echo $store['contact_us_map']; ?></textarea> 
											</div>


											<div class="form-group">
												<label  class="control-label"><?= __('admin.store_address') ?></label>
												<textarea name="store[address]" class="form-control"><?php echo $store['address']; ?></textarea> 
											</div>

											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<label  class="control-label"><?= __('admin.store_email') ?></label>
														<input  name="store[email]" value="<?php echo $store['email']; ?>" class="form-control"  type="email"> 
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label  class="control-label"><?= __('admin.store_mobile_phone_number') ?></label>
														<input  name="store[contact_number]" value="<?php echo $store['contact_number']; ?>" class="form-control"  type="text"> 
													</div>
												</div>
											</div>
										</div>
										<div role="tabpanel" class="tab-pane" id="product_setting">
											<div class="col-12 commission_settings">
												<div class="col-md-5 commission_product_settings">
													<fieldset>
														<legend class="product_commission_title">
															<?= __('admin.store_p_commission') ?>
														</legend>
														<div class="form-group">
															<label class="control-label"><?= __('admin.click_allow') ?></label>
															<select name="productsetting[click_allow]" class="form-control">
																<option <?php if($productsetting['click_allow'] == 'single') { ?> selected <?php } ?> value="single"><?= __('admin.allow_single_click') ?></option>
																<option <?php if($productsetting['click_allow'] == 'multiple') { ?> selected <?php } ?>  value="multiple"><?= __('admin.allow_multi_click') ?></option>
															</select>
														</div>
														<div class="form-group">
															<label class="control-label"><?= __('admin.commission_type') ?></label>
															<select name="productsetting[product_commission_type]" class="form-control">
																<option value=""><?= __('admin.select_product_commission_type') ?></option>
																<option <?php if($productsetting['product_commission_type'] == 'percentage') { ?> selected <?php } ?> value="percentage"><?= __('admin.percentage%') ?></option>
																<option <?php if($productsetting['product_commission_type'] == 'Fixed') { ?> selected <?php } ?>  value="<?= __('admin.fixed') ?>"><?= __('admin.fixed') ?></option>
															</select>
														</div>
														<div class="form-group">
															<label class="control-label"><?= __('admin.commission_for_sale') ?>
															</label>
															<div class="input-group">
																<div class="input-group-prepend">
																	<span class="input-group-text currency-symbol">
																		<?= ($productsetting['product_commission_type'] == 'percentage') ? '%'  : $CurrencySymbol ?>
																	</span>
																</div>
																<input name="productsetting[product_commission]" value="<?php echo $productsetting['product_commission']; ?>" class="form-control"  type="number">
															</div>
														</div>
														<div class="form-group">
															<label class="control-label"><?= __('admin.commission_for_ppc_visits_view') ?> (<?= $CurrencySymbol ?>)</label>
															<input  name="productsetting[product_ppc]" value="<?php echo $productsetting['product_ppc']; ?>" class="form-control"  type="number">
														</div>
														<div class="form-group">
															<label class="control-label"><?= __('admin.number_of_clicks_per_commission') ?></label>
															<input  name="productsetting[product_noofpercommission]" value="<?php echo $productsetting['product_noofpercommission']; ?>" class="form-control"  type="number">
														</div>
														<div class="form-group">
															<label class="control-label"><?= __('admin.recurring_cycle_setting') ?></label>							
															<select name="productsetting[product_recursion]" class="form-control form-group" id="recursion_type">
																<option value=""><?= __('admin.select_recursion') ?></option>
																<option <?php if($productsetting['product_recursion'] == 'every_day') { ?> selected <?php } ?> value="every_day"><?=  __('admin.every_day') ?></option>
																<option <?php if($productsetting['product_recursion'] == 'every_week') { ?> selected <?php } ?>  value="every_week"><?=  __('admin.every_week') ?></option>
																<option <?php if($productsetting['product_recursion'] == 'every_month') { ?> selected <?php } ?>  value="every_month"><?=  __('admin.every_month') ?></option>
																<option <?php if($productsetting['product_recursion'] == 'every_year') { ?> selected <?php } ?>  value="every_year"><?=  __('admin.every_year') ?></option>
																<option <?php if($productsetting['product_recursion'] == 'custom_time') { ?> selected <?php } ?>  value="custom_time"><?=  __('admin.custom_time') ?></option>
															</select>
															<div class="custom_time <?php echo ($productsetting['product_recursion'] != 'custom_time') ? 'hide' : '';  ?>">

																<?php
																$minutes = $productsetting['recursion_custom_time'];
																$day = floor ($minutes / 1440);
																$hour = floor (($minutes - $day * 1440) / 60);
																$minute = $minutes - ($day * 1440) - ($hour * 60);
																?>
																<input type="hidden" name="productsetting[recursion_custom_time]" value="<?php echo $minutes; ?>" class="recursion_custom_time">
																<div class="row">
																	<div class="col-sm-4">
																		<label class="control-label"><?= __('admin.days') ?> : </label>
																		<input placeholder="Days" type="number" class="form-control recur_day" value="<?= $day ? $day : '' ?>" onkeydown="if(event.key==='.'){event.preventDefault();}"  oninput="event.target.value = event.target.value.replace(/[^0-9]*/g,'');">

																	</div>					
																	<div class="col-sm-4">
																		<label class="control-label"><?= __('admin.hours') ?> : </label>
																		<select class="form-control recur_hour">
																			<?php 
																			for ($x = 0; $x <= 23; $x++) {
																				$selected = ($x == $hour ) ? 'selected="selected"' : '';
																				echo '<option value="'.$x.'" '.$selected.'>'.$x.'</option>';
																			}
																			?>
																		</select>
																	</div>					
																	<div class="col-sm-4">
																		<label class="control-label"><?= __('admin.minutes') ?> : </label>
																		<select class="form-control recur_minute">
																			<?php 
																			for ($x = 0; $x <= 59; $x++) {
																				$selected = ($x == $minute ) ? 'selected="selected"' : '';
																				echo '<option value="'.$x.'" '.$selected.'>'.$x.'</option>';
																			}
																			?>
																		</select>
																	</div>					
																</div>
																<small class="error productsetting_error"></small>
															</div>
															<br>
															<div class="endtime-chooser row">
																<div class="col-sm-12">
																	<div class="form-group">
																		<label class="control-label d-block"><?= __('admin.choose_custom_endtime') ?> <input <?= $productsetting['recursion_endtime'] ? 'checked' : '' ?>  class='setCustomTime' name='recursion_endtime_status' type="checkbox"> </label>
																		<div style="<?= !$productsetting['recursion_endtime'] ? 'display:none' : '' ?>" class='custom_time_container'>
																			<input type="text" class="form-control" value="<?= $productsetting['recursion_endtime'] ? date("d-m-Y H:i",strtotime($productsetting['recursion_endtime'])) : '' ?>" name="productsetting[recursion_endtime]" id="endtime" placeholder="<?= __('admin.choose_endtime') ?>" >
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</fieldset>
												</div>
												<div class="col-md-5 commission_form_settings">
													<fieldset>
														<legend class="form_commission_title">
															<?= __('admin.store_f_commission') ?>
														</legend>
														<div class="form-group">
															<label class="control-label"><?= __('admin.commission_type') ?></label>
															<select name="formsetting[product_commission_type]" class="form-control">
																<option value=""><?= __('admin.select_product_commission_type') ?></option>
																<option <?php if($formsetting['product_commission_type'] == 'percentage') { ?> selected <?php } ?> value="percentage"><?= __('admin.percentage%') ?></option>
																<option <?php if($formsetting['product_commission_type'] == 'Fixed') { ?> selected <?php } ?>  value="Fixed"><?= __('admin.fixed') ?></option>
															</select>
														</div>
														<div class="form-group">
															<label class="control-label"><?= __('admin.commission_for_sale') ?>
															</label>
															<div class="input-group">
																<div class="input-group-prepend">
																	<span class="input-group-text currency-symbol">
																		<?= ($formsetting['product_commission_type'] == 'percentage') ? '%'  : $CurrencySymbol ?>
																	</span>
																</div>
																<input name="formsetting[product_commission]" value="<?php echo $formsetting['product_commission']; ?>" class="form-control"  type="number">
															</div>
														</div>
														<div class="form-group">
															<label class="control-label"><?= __('admin.commission_for_ppc_visits_view') ?> (<?= $CurrencySymbol ?>)</label>
															<input  name="formsetting[product_ppc]" value="<?php echo $formsetting['product_ppc']; ?>" class="form-control"  type="number">
														</div>
														<div class="form-group">
															<label class="control-label"><?= __('admin.number_of_clicks_per_commission') ?></label>
															<input  name="formsetting[product_noofpercommission]" value="<?php echo $formsetting['product_noofpercommission']; ?>" class="form-control"  type="number">
														</div>
														<div class="form-group">
															<label class="control-label"><?= __('admin.form_recursion') ?></label>							
															<select name="formsetting[form_recursion]" class="form-control form-group" id="form_recursion_type">
																<option value=""><?= __('admin.select_recursion') ?></option>
																<option <?php if($formsetting['form_recursion'] == 'every_day') { ?> selected <?php } ?> value="every_day"><?=  __('admin.every_day') ?></option>
																<option <?php if($formsetting['form_recursion'] == 'every_week') { ?> selected <?php } ?>  value="every_week"><?=  __('admin.every_week') ?></option>
																<option <?php if($formsetting['form_recursion'] == 'every_month') { ?> selected <?php } ?>  value="every_month"><?=  __('admin.every_month') ?></option>
																<option <?php if($formsetting['form_recursion'] == 'every_year') { ?> selected <?php } ?>  value="every_year"><?=  __('admin.every_year') ?></option>
																<option <?php if($formsetting['form_recursion'] == 'custom_time') { ?> selected <?php } ?>  value="custom_time"><?=  __('admin.custom_time') ?></option>
															</select>
															<div class="custom_time <?php echo ($formsetting['form_recursion'] != 'custom_time') ? 'hide' : '';  ?>">

																<?php
																$form_minutes = $formsetting['recursion_custom_time'];
																$f_day = floor ($form_minutes / 1440);
																$f_hour = floor (($form_minutes - $f_day * 1440) / 60);
																$f_minute = $form_minutes - ($f_day * 1440) - ($f_hour * 60);
																?>
																<input type="hidden" name="formsetting[recursion_custom_time]" value="<?php echo $form_minutes; ?>" class="recursion_custom_time">
																<div class="row">
																	<div class="col-sm-4">
																		<label class="control-label"><?=  __('admin.days') ?> : </label>
																		<input placeholder="<?=  __('admin.days') ?>" type="number" class="form-control recur_day" value="<?= $f_day ? $f_day : '' ?>" onkeydown="if(event.key==='.'){event.preventDefault();}"  oninput="event.target.value = event.target.value.replace(/[^0-9]*/g,'');">
																	</div>					
																	<div class="col-sm-4">
																		<label class="control-label"><?=  __('admin.hours') ?> : </label>
																		<select class="form-control recur_hour">
																			<?php 
																			for ($x = 0; $x <= 23; $x++) {
																				$selected = ($x == $f_hour ) ? 'selected="selected"' : '';
																				echo '<option value="'.$x.'" '.$selected.'>'.$x.'</option>';
																			}
																			?>
																		</select>
																	</div>					
																	<div class="col-sm-4">
																		<label class="control-label"><?=  __('admin.minutes') ?> : </label>
																		<select class="form-control recur_minute">
																			<?php 
																			for ($x = 0; $x <= 59; $x++) {
																				$selected = ($x == $f_minute ) ? 'selected="selected"' : '';
																				echo '<option value="'.$x.'" '.$selected.'>'.$x.'</option>';
																			}
																			?>
																		</select>
																	</div>					
																</div>
																<small class="error formsetting_error"></small>
															</div>
															<br>
															<div class="endtime-chooser row">
																<div class="col-sm-12">
																	<div class="form-group">
																		<label class="control-label d-block"><?= __('admin.choose_custom_endtime') ?> <input <?= $formsetting['recursion_endtime'] ? 'checked' : '' ?>  class='setCustomTime' name='recursion_endtime_form_status' type="checkbox"> </label>
																		<div style="<?= !$formsetting['recursion_endtime'] ? 'display:none' : '' ?>" class='custom_time_container'>
																			<input type="text" class="form-control datetime-picker" value="<?= $formsetting['recursion_endtime'] ? date("d-m-Y H:i",strtotime($formsetting['recursion_endtime'])) : '' ?>" name="formsetting[recursion_endtime]" id="endtime" placeholder="<?= __('admin.choose_endtime') ?>" >
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</fieldset>
												</div>
											</div>
										</div>
										<div role="tabpanel" class="tab-pane" id="order_comment">
											<div class="form-group">
												<label class="control-label"><?= __('admin.enable_comment') ?></label>
												<select class="form-control" name="order_comment[status]">
													<option value="0"><?= __('admin.disable') ?></option>
													<option value="1" <?= $order_comment['status'] ? 'selected' : '' ?>><?= __('admin.enable') ?></option>
												</select>
											</div>
											<div class="comment-titles">
												<table class="table table-borderd">
													<thead>
														<th><?= __('admin.title') ?></th>
														<th class="text-right"><?= __('admin.action') ?></th>
													</thead>
													<tbody>
														<?php foreach ($order_comment['title'] as $key => $value) { ?>
															<tr>
																<td>
																	<input type="text" name="order_comment[title][<?= $key ?>]" value="<?= $value ?>" class="form-control" placeholder="<?= __('admin.comment_title') ?>" aria-describedby="title-<?= $key ?>" />
																</td>
																<td class="text-right">
																	<button type="button" class="btn btn-danger" onclick="$(this).closest('tr').remove()"><i class="fa fa-trash"></i></button>
																</td>
															</tr>
														<?php } ?>
													</tbody>
													<tfoot>
														<tr>
															<td colspan="2" class="text-right">
																<button type="button" class="btn btn-primary btn-add-comment"><i class="fa fa-plus"></i></button>
															</td>
														</tr>
													</tfoot>	
												</table>
											</div>
										</div>
										<div role="tabpanel" class="tab-pane" id="theme_section">
											<div class="form-group">
												<label class="control-label"><?= __('admin.categories_color_box_filter') ?></label>
												<select class="form-control" name="store[is_variation_filter]">
													<option value="0"><?= __('admin.disable') ?></option>
													<option value="1" <?= $store_setting['is_variation_filter'] ? 'selected' : '' ?>><?= __('admin.enable') ?></option>
												</select>
											</div>
											<div class="form-group">
												<label class="control-label"><?= __('admin.top_tags_limit') ?></label>
												<input type="number" name="store[top_tags_limit]" class="form-control"value="<?= $store_setting['top_tags_limit'] ? $store_setting['top_tags_limit'] : 10 ?>">
											</div>
											<fieldset class="mb-3">
												<legend class="bg-light px-2"><?= __('admin.store_notifications') ?></legend>
												<div id="notifications-list" class="row">
													<?php
													$notis = json_decode($store_setting['notification']);
													for ($i=0; $i < sizeOf($notis); $i++) { 
														?>
														<div class="col-md-12">
															<div class="form-group">
																<label class="control-label"><?= __('admin.notification') ?> <?= ($i+1) ?></label>
																<input name="store[notification][]" class="form-control" type="text" value="<?= $notis[$i] ?>">
															</div>
															<button type="button" class="btn btn-danger btn-md remove-notification-btn" style="position: absolute; top: 30px; right: 11px;"><i class="fa fa-trash"></i></button>
														</div>
														<?php	
													}
													?>										
												</div>
												<button type="button" class="btn btn-md btn-primary btn-add-more"><?= __('admin.add_more') ?></button>
											</fieldset>
											<fieldset class="mb-3">
												<legend class="bg-light px-2"><?= __('admin.homepage_slider') ?></legend>
												<div class="row">
													<div class="col-12">
														<table class="table">
															<tbody id="homepage_sliders_list">
																<?php
																$homepage_slider = json_decode($store_setting['homepage_slider']);

																if(!sizeof($homepage_slider) > 0) {
																	echo "<tr class='empty'><td colspan='1oo%'><h6 class='text-center text-muted'>".__('admin.sliders_not_available')."</h6></td></tr>";
																}

																foreach($homepage_slider as $hs){
																	?>
																	<tr>
																		<td scope="row"><?= $hs->index; ?></td>
																		<td scope="row"><?= $hs->title; ?></td>
																		<td scope="row"><?= $hs->sub_title; ?></td>
																		<?php $img = (!empty($hs->slider_background_image)) ? base_url('assets/images/site/'. $hs->slider_background_image) : base_url('assets/store/default/img/banner.png'); ?>
																		<td style="width: 200px;"><img style="width: 100px; height: 50px;" src="<?= $img; ?>" class='img-responsive'></td>
																		<td style="width: 87px; padding: 5px 0px !important;">
																			<input type="hidden" name="store[homepage_slider][edited][]" value="0">
																			<input type="hidden" name="store[homepage_slider][index][]" value="<?= $hs->index; ?>">
																			<input type="hidden" name="store[homepage_slider][title][]" value="<?= $hs->title; ?>">
																			<input type="hidden" name="store[homepage_slider][sub_title][]" value="<?= $hs->sub_title; ?>">
																			<textarea name="store[homepage_slider][content][]" style="display:none;"><?= $hs->content; ?></textarea>
																			<input type="hidden" name="store[homepage_slider][slider_background_image][]" value="<?= $hs->slider_background_image; ?>">
																			<input type="hidden" name="store[homepage_slider][button_text][]" value="<?= $hs->button_text; ?>">
																			<input type="hidden" name="store[homepage_slider][button_link][]" value="<?= $hs->button_link; ?>">
																			<input type="hidden" name="store[homepage_slider][slider_text_color][]" value="<?= $hs->slider_text_color; ?>">
																			<input type="hidden" name="store[homepage_slider][button_text_color][]" value="<?= $hs->button_text_color; ?>">
																			<input type="hidden" name="store[homepage_slider][button_bg_color][]" value="<?= $hs->button_bg_color; ?>">
																			<button type="button" class="btn btn-primary btn-slider-form-modal-edit"><i class="fa fa-pencil"></i></button>
																			<button type="button" class="btn btn-danger remove-slider-btn"><i class="fa fa-trash"></i></button>
																		</td>
																	</tr>
																	<?php	
																}
																?>
															</tbody>
														</table>
													</div>
												</div>
												<button type="button" class="btn btn-md btn-primary btn-slider-form-modal"><?= __('admin.add_more') ?></button>
											</fieldset>
											<fieldset class="mb-3">
												<legend class="bg-light px-2"><?= __('admin.homepage_features') ?></legend>
												<div class="row">
													<div class="col-12">
														<table class="table">
															<tbody id="homepage_features_list">
																<?php
																$homepage_features = json_decode($store_setting['homepage_features']);

																if(!sizeof($homepage_features) > 0) {
																	echo "<tr class='empty'><td colspan='1oo%'><h6 class='text-center text-muted'>".__('admin.features_not_available')."</h6></td></tr>";
																}

																foreach($homepage_features as $hf){
																	?>
																	<tr>
																		<td scope="row"><?= $hf->index; ?></td>
																		<td scope="row"><?= $hf->title; ?></td>
																		<td scope="row"><?= $hf->sub_title; ?></td>
																		<?php $img = (!empty($hf->feature_image)) ? base_url('assets/images/site/'. $hf->feature_image) : base_url('assets/store/default/img/banner.png'); ?>
																		<td style="width: 200px;"><img style="width: 100px; height: 50px;" src="<?= $img; ?>" class='img-responsive'></td>
																		<td style="width: 87px; padding: 5px 0px !important;">
																			<input type="hidden" name="store[homepage_features][edited][]" value="0">
																			<input type="hidden" name="store[homepage_features][index][]" value="<?= $hf->index; ?>">
																			<input type="hidden" name="store[homepage_features][title][]" value="<?= $hf->title; ?>">
																			<input type="hidden" name="store[homepage_features][sub_title][]" value="<?= $hf->sub_title; ?>">
																			<input type="hidden" name="store[homepage_features][feature_image][]" value="<?= $hf->feature_image; ?>">
																			<button type="button" class="btn btn-primary btn-features-form-modal-edit"><i class="fa fa-pencil"></i></button>
																			<button type="button" class="btn btn-danger remove-features-btn"><i class="fa fa-trash"></i></button>
																		</td>
																	</tr>
																	<?php	
																}
																?>
															</tbody>
														</table>
													</div>
												</div>
												<button type="button" class="btn btn-md btn-primary btn-features-form-modal"><?= __('admin.add_more') ?></button>
											</fieldset>
											<fieldset class="mb-3">
												<legend class="bg-light px-2"><?= __('admin.homepage_bottom_banner') ?></legend>
												<div class="row">
													<?php $homepage_banner = json_decode($store_setting['homepage_banner']); ?>
													<div class="col-12">
														<div class="form-group">
															<label  class="control-label"><?= __('admin.banner_title') ?></label>
															<input  name="store[homepage_banner][title]" value="<?= $homepage_banner->title; ?>" class="form-control"  type="text">
														</div>
													</div>
													<div class="col-12">
														<div class="form-group">
															<label  class="control-label"><?= __('admin.banner_content') ?></label>
															<textarea name="store[homepage_banner][content]" class="form-control"><?= $homepage_banner->content; ?></textarea>
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">
															<label  class="control-label"><?= __('admin.banner_bottom_text') ?></label>
															<input  name="store[homepage_banner][button_text]" value="<?= $homepage_banner->button_text; ?>" class="form-control"  type="text">
														</div>
													</div>
													<div class="col-md-8">
														<div class="form-group">
															<label  class="control-label"><?= __('admin.banner_bottom_link') ?></label>
															<input  name="store[homepage_banner][button_link]" value="<?= $homepage_banner->button_link; ?>" class="form-control"  type="text">
														</div>
													</div>
												</div>
											</fieldset>
											<fieldset class="mb-3">
												<legend class="bg-light px-2"><?= __('admin.homepage_bottom_section') ?></legend>
												<div class="row">
													<div class="col-12 mb-4">
														<label  class="control-label"><?= __('admin.section_cards') ?></label>
														<table class="table">
															<tbody id="bs_cards_list">
																<?php
																$bs_cards = json_decode($store_setting['bs_cards']);

																if(!sizeof($bs_cards) > 0) {
																	echo "<tr class='empty'><td colspan='1oo%'><h6 class='text-center text-muted'>".__('admin.cards_not_available')."</h6></td></tr>";
																}

																foreach($bs_cards as $bsc){
																	?>
																	<tr>
																		<td scope="row"><?= $bsc->index; ?></td>
																		<td scope="row"><?= $bsc->title; ?></td>
																		<td scope="row"><?= $bsc->sub_title; ?></td>
																		<?php $img = (!empty($bsc->feature_image)) ? base_url('assets/images/site/'. $bsc->feature_image) : base_url('assets/store/default/img/banner.png'); ?>
																		<td style="width: 200px;"><img style="width: 100px; height: 50px;" src="<?= $img; ?>" class='img-responsive'></td>
																		<td style="width: 87px; padding: 5px 0px !important;">
																			<input type="hidden" name="store[bs_cards][edited][]" value="0">
																			<input type="hidden" name="store[bs_cards][index][]" value="<?= $bsc->index; ?>">
																			<input type="hidden" name="store[bs_cards][title][]" value="<?= $bsc->title; ?>">
																			<input type="hidden" name="store[bs_cards][sub_title][]" value="<?= $bsc->sub_title; ?>">
																			<input type="hidden" name="store[bs_cards][feature_image][]" value="<?= $bsc->feature_image; ?>">
																			<input type="hidden" name="store[bs_cards][bg_color][]" value="<?= $bsc->bg_color; ?>">
																			<input type="hidden" name="store[bs_cards][button_link][]" value="<?= $bsc->button_link; ?>">
																			<input type="hidden" name="store[bs_cards][link_target][]" value="<?= $bsc->link_target; ?>">
																			<button type="button" class="btn btn-primary btn-bs-cards-form-modal-edit"><i class="fa fa-pencil"></i></button>
																			<button type="button" class="btn btn-danger remove-bs-cards-btn"><i class="fa fa-trash"></i></button>
																		</td>
																	</tr>
																	<?php	
																}
																?>
															</tbody>
														</table>
														<button type="button" class="btn btn-md btn-primary btn-bs-cards-form-modal"><?= __('admin.add_more') ?></button>
													</div>
													<div class="col-12">
														<div class="form-group">
															<label  class="control-label"><?= __('admin.section_content') ?></label>
															<textarea name="store[homepage_bottom_section][content]" class="form-control summernote"><?= json_decode($store_setting['homepage_bottom_section'])->content; ?></textarea>
														</div>
													</div>
												</div>
											</fieldset>
										</div>
										<div role="tabpanel" class="tab-pane" id="pages_menu_section">
											<fieldset class="mb-3 cart_theme_settings <?= $cart_theme_settings_display ?>">
												<legend class="bg-light px-2"><?= __('admin.footer_menu_sections') ?></legend>
												<div class="row">
													<div class="col-12">
														<table class="table">
															<tbody id="footer_menu_list">
																<?php
																$footer_menu = json_decode($store_setting['footer_menu']);
																if(!sizeof($footer_menu) > 0) {
																	echo "<tr class='empty'><td colspan='1oo%'><h6 class='text-center text-muted'>".__('admin.menu_not_available')."</h6></td></tr>";
																}
																foreach($footer_menu as $fm){
																	$letpreIndex = $fm->index - 1;
																	?>
																	<tr>
																		<td scope="row"><?= $fm->index; ?></td>
																		<td scope="row"><?= $fm->title; ?></td>
																		<td scope="row">
																			<?php
																			if(!sizeof($fm->links) > 0) {
																				$text = "<i class='muted'>".__('admin.not_available')."</i>";
																			} else {
																				$text = "";
																			}
																			for ($i=0; $i < sizeOf($fm->links); $i++) { 
																				$text .= ($i == 0) ? $fm->links[$i]->title : ", ".$fm->links[$i]->title;
																			}
																			echo $text;
																			?>
																		</td>
																		<td style="width: 87px; padding: 5px 0px !important;">
																			<input type="hidden" name="store[footer_menu][index][<?= $letpreIndex ?>]" value="<?= $fm->index; ?>">
																			<input type="hidden" name="store[footer_menu][title][<?= $letpreIndex ?>]" value="<?= $fm->title; ?>">
																			<?php
																			for ($i=0; $i < sizeOf($fm->links); $i++) { 
																				$text .= ($i == 0) ? $fm->links[$i]->title : ", ".$fm->links[$i]->title;
																				?>
																				<input type="hidden" name="store[footer_menu][links][<?= $letpreIndex ?>][title][]" value="<?= $fm->links[$i]->title; ?>">
																				<input type="hidden" name="store[footer_menu][links][<?= $letpreIndex ?>][url][]" value="<?= $fm->links[$i]->url; ?>">
																				<input type="hidden" name="store[footer_menu][links][<?= $letpreIndex ?>][type][]" value="<?= $fm->links[$i]->type; ?>">
																				<?php
																			}
																			?>
																			<button data-letpreindex="<?= $letpreIndex ?>" type="button" class="btn btn-primary btn-footer-menu-form-modal-edit"><i class="fa fa-pencil"></i></button>
																			<button type="button" class="btn btn-danger remove-footer-menu"><i class="fa fa-trash"></i></button>
																		</td>
																	</tr>
																	<?php	
																}
																?>
															</tbody>
														</table>
													</div>
												</div>
												<button type="button" class="btn btn-md btn-primary btn-footer-menu-form-modal"><?= __('admin.add_more') ?></button>
											</fieldset>

											<fieldset class="mb-3 cart_theme_settings <?= $cart_theme_settings_display ?>">
												<legend class="bg-light px-2"><?= __('admin.manage_custom_pages') ?></legend>
												<div class="row">
													<div class="col-12">
														<table class="table">
															<tbody id="custom_page_list">
																<?php
																$custom_page = json_decode($store_setting['custom_page']);
																if(!sizeof($custom_page) > 0) {
																	echo "<tr class='empty'><td colspan='1oo%'><h6 class='text-center text-muted'>".__('admin.pages_not_available')."</h6></td></tr>";
																}
																foreach($custom_page as $page){
																	?>
																	<tr>
																		<td scope="row"><?= $page->title; ?></td>
																		<td scope="row"><?= $page->slug; ?></td>
																		<?php $img = (!empty($page->image)) ? base_url('assets/images/site/'. $page->image) : base_url('assets/store/default/img/banner.png'); ?>
																		<td style="width: 200px;"><img style="width: 100px; height: 50px;" src="<?= $img; ?>" class='img-responsive'></td>
																		<td style="width: 87px; padding: 5px 0px !important;">
																			<input type="hidden" name="store[custom_page][index][]" value="<?= $page->index; ?>">
																			<input type="hidden" name="store[custom_page][edited][]" value="0">
																			<input type="hidden" name="store[custom_page][title][]" value="<?= $page->title; ?>">
																			<input type="hidden" name="store[custom_page][slug][]" value="<?= $page->slug; ?>">
																			<input type="hidden" name="store[custom_page][image][]" value="<?= $page->image; ?>">
																			<input type="hidden" name="store[custom_page][meta_id][]" value="<?= $page->meta_id; ?>">
																			<textarea name="store[custom_page][content][]" style="display:none"><?= $page->content; ?></textarea>
																			<button type="button" class="btn btn-primary btn-custom-page-modal-form-edit"><i class="fa fa-pencil"></i></button>
																			<button type="button" class="btn btn-danger remove-custom-page"><i class="fa fa-trash"></i></button>
																		</td>
																	</tr>
																	<?php	
																}
																?>
															</tbody>
														</table>
													</div>
												</div>
												<button type="button" class="btn btn-md btn-primary btn-custom-page-modal-form"><?= __('admin.add_more') ?></button>
											</fieldset>

											<fieldset class="mb-3 cart_theme_settings <?= $cart_theme_settings_display ?>">
												<legend class="bg-light px-2"><?= __('admin.manage_social_links') ?></legend>
												<div class="row">
													<div class="col-12">
														<table class="table">
															<tbody id="social_links_list">
																<?php
																$social_links = json_decode($store_setting['social_links']);
																if(!sizeof($social_links) > 0) {
																	echo "<tr class='empty'><td colspan='1oo%'><h6 class='text-center text-muted'>".__('admin.links_not_available')."</h6></td></tr>";
																}
																foreach($social_links as $link){
																	?>
																	<tr>
																		<td scope="row"><?= $link->title; ?></td>
																		<td scope="row"><?= $link->url; ?></td>
																		<?php $img = (!empty($link->image)) ? base_url('assets/images/site/'. $link->image) : base_url('assets/store/default/img/banner.png'); ?>
																		<td style="width: 200px; text-align:right;">
																			<img style="width: 50px; height: 50px; background-color:grey;" src="<?= $img; ?>" class='img-responsive'>
																		</td>
																		<td style="width: 87px; padding: 5px 0px !important;">
																			<input type="hidden" name="store[social_links][index][]" value="<?= $link->index; ?>">
																			<input type="hidden" name="store[social_links][edited][]" value="0">
																			<input type="hidden" name="store[social_links][title][]" value="<?= $link->title; ?>">
																			<input type="hidden" name="store[social_links][url][]" value="<?= $link->url; ?>">
																			<input type="hidden" name="store[social_links][image][]" value="<?= $link->image; ?>">
																			<button type="button" class="btn btn-primary btn-social-links-form-edit"><i class="fa fa-pencil"></i></button>
																			<button type="button" class="btn btn-danger remove-social-links"><i class="fa fa-trash"></i></button>
																		</td>
																	</tr>
																	<?php	
																}
																?>
															</tbody>
														</table>
													</div>
												</div>
												<button type="button" class="btn btn-md btn-primary btn-social-links-form"><?= __('admin.add_more') ?></button>
											</fieldset>

											<fieldset class="mb-3 sales_theme_settings <?= $sales_theme_settings_display ?>">
												<legend class="bg-light px-2"><?= __('admin.homepage_banner') ?></legend>
												<div class="row">

													<div class="col-12">
														<div class="form-group">
															<label  class="control-label"><?= __('admin.banner_title') ?></label>
															<input  name="store[classified_banner_title]" value="<?php echo $store['classified_banner_title']; ?>" class="form-control"  type="text">
														</div>
													</div>

													<div class="col-12">
														<div class="form-group">
															<label  class="control-label"><?= __('admin.banner_subtitle') ?></label>
															<input  name="store[classified_banner_subtitle]" value="<?php echo $store['classified_banner_subtitle']; ?>" class="form-control"  type="text">
														</div>
													</div>
													
													<div class="col-md-12">
														<div class="form-group">
															<label  class="control-label"><?= __('admin.banner_image') ?></label>
															<br/>
															<input type="file" name="store_classifiedbannerimg">
														</div>
														<?php
														if(isset($store['classifiedbannerimg']) && !empty($store['classifiedbannerimg']))
														{
															?>
															<img id="store_classifiedbannerimg_container"  style="width: 150px;" src="<?= base_url('assets/images/site/'.$store['classifiedbannerimg'].''); ?>" class='img-responsive'>
															<?php	
														}
														else
														{
															?>
															<img id="store_classifiedbannerimg_container"  style="width: 150px;" src="<?= base_url('assets/images/no_image_available.png'); ?>" class='img-responsive'>
															<?php
														}
														?>
													</div>
												</div>
											</fieldset>

											<div class="form-group">
												<label  class="control-label"><?= __('admin.about_page_content') ?></label>
												<textarea name="store[about_content]" class="form-control summernote"><?php echo $store['about_content']; ?></textarea>
											</div>


											<div class="col-md-7">
												<div class="form-group">
													<label  class="control-label"><?= __('admin.about_page_image') ?></label>
													<br/>
													<input type="file" name="store_aboutimage">
												</div>
											</div>
											<div class="col-md-4">
												<?php
												if(!empty($store['aboutimage']))
												{
													?>
													<img id="store_aboutimage_container"  style="width: 150px;" src="<?= base_url('assets/images/site/'.$store['aboutimage'].''); ?>" class='img-responsive'>
													<?php	
												}
												else
												{
													?>
													<img id="store_aboutimage_container"  style="width: 150px;" src="<?= base_url('assets/images/no_image_available.png'); ?>" class='img-responsive'>
													<?php
												}
												?>
											</div>

											<div class="form-group">
												<label  class="control-label"><?= __('admin.contact_page_content') ?></label>
												<textarea name="store[contact_content]" class="form-control summernote"><?php echo $store['contact_content']; ?></textarea>
											</div>
											<div class="col-md-7">
												<div class="form-group">
													<label  class="control-label"><?= __('admin.contact_page_image') ?></label>
													<br/>
													<input type="file" name="store_contactimage">
												</div>
											</div>
											<div class="col-md-4">
												<?php
												if(!empty($store['contactimage']))
												{
													?>
													<img id="store_contactimage_container"  style="width: 150px;" src="<?= base_url('assets/images/site/'.$store['contactimage'].''); ?>" class='img-responsive'>
													<?php	
												}
												else
												{
													?>
													<img id="store_contactimage_container"  style="width: 150px;" src="<?= base_url('assets/images/no_image_available.png'); ?>" class='img-responsive'>
													<?php
												}
												?>

											</div>
											<div class="form-group">
												<label  class="control-label"><?= __('admin.policy_page_content') ?></label>
												<textarea name="store[policy_content]" class="form-control summernote"><?php echo $store['policy_content']; ?></textarea>
											</div>
											<div class="col-md-7">
												<div class="form-group">
													<label  class="control-label"><?= __('admin.policy_page_image') ?></label>
													<br/>
													<input type="file" name="store_policyimage">
												</div>
											</div>
											<div class="col-md-4">
												<?php
												if(!empty($store['policyimage']))
												{
													?>
													<img id="store_policyimage_container"  style="width: 150px;" src="<?= base_url('assets/images/site/'.$store['policyimage'].''); ?>" class='img-responsive'>
													<?php	
												}
												else
												{
													?>
													<img id="store_policyimage_container"  style="width: 150px;" src="<?= base_url('assets/images/no_image_available.png'); ?>" class='img-responsive'>
													<?php
												}
												?>

											</div>
										</div>
									</div>
								</div>	
							</div>
						</div>
						<div class="card-footer text-right">
							<button type="submit" class="btn btn-sm btn-primary btn-submit"><?= __('admin.save_settings') ?></button>
						</div>
					</div>
				</div>
			</div>

			<!-- modal -->
			<div class="modal fade slider-form-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title"><?= __('admin.manage_homepage_slide') ?></h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body" style="max-height:70vh; overflow-y:auto;">
							<input  id="hs_index" value="" class="form-control"  type="hidden">
							<input type="hidden" id="hs_slider_background_image" value="">
							<div class="form-group">
								<label  class="control-label"><?= __('admin.slider_title') ?></label>
								<input  id="hs_title" value="" class="form-control"  type="text">
							</div>
							<div class="form-group">
								<label  class="control-label"><?= __('admin.slider_sub_title') ?></label>
								<input  id="hs_sub_title" value="" class="form-control"  type="text">
							</div>
							<div class="form-group">
								<label  class="control-label"><?= __('admin.slider_content') ?></label>
								<textarea id="hs_content" class="form-control"></textarea>
							</div>
							<div class="row border p-2 m-1">
								<div class="col-md-7">
									<div class="form-group">
										<label  class="control-label"><?= __('admin.slider_background_image') ?></label>
										<br/>
										<input type="file" name="store_hsbackgroundimage">
									</div>
								</div>
								<div class="col-md-4">
									<img id="store_hsbackgroundimage_container" style="width: 100%; height:100px;" src="<?= base_url('assets/store/default/img/banner.png'); ?>" class='img-responsive'>
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label  class="control-label"><?= __('admin.slider_button_text') ?></label>
										<input  id="hs_button_text" value="" class="form-control"  type="text">
									</div>
								</div>
								<div class="col-md-8">
									<div class="form-group">
										<label  class="control-label"><?= __('admin.slider_button_link') ?></label>
										<input  id="hs_button_link" value="" class="form-control"  type="text">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label  class="control-label"><?= __('admin.slider_text_color') ?></label>
										<input id="hs_text_color" value="#FFFFFF" class="form-control jscolor" data-jscolor type="text">
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label  class="control-label"><?= __('admin.slider_button_text_color') ?></label>
										<input id="hs_button_text_color" value="#000000" class="form-control jscolor" data-jscolor type="text">
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label  class="control-label"><?= __('admin.slider_button_background_color') ?></label>
										<input id="hs_button_bg_color" value="#FFFFFF" class="form-control jscolor" data-jscolor type="text">
									</div>
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<span id="slider-form-submit" class="btn btn-md btn-primary"><?= __('admin.save_settings') ?></span>
						</div>
					</div>
				</div>
			</div>

			<!-- modal -->
			<div class="modal fade features-form-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title"><?= __('admin.manage_homepage_features') ?></h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body" style="max-height:70vh; overflow-y:auto;">
							<input type="hidden" id="hf_index" value="">
							<input type="hidden" id="hf_feature_image" value="">
							<div class="form-group">
								<label  class="control-label"><?= __('admin.feature_title') ?></label>
								<input  id="hf_title" value="" class="form-control"  type="text">
							</div>
							<div class="form-group">
								<label  class="control-label"><?= __('admin.feature_subtitle') ?></label>
								<input  id="hf_sub_title" value="" class="form-control"  type="text">
							</div>
							<div class="row border p-2 m-1">
								<div class="col-md-7">
									<div class="form-group">
										<label  class="control-label"><?= __('admin.feature_image') ?></label>
										<br/>
										<input type="file" name="store_hfimage">
									</div>
								</div>
								<div class="col-md-4">
									<img id="store_hfimage_container" src="" style="width: 100%; height:100px;" class='img-responsive'>
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<span id="features-form-submit" class="btn btn-md btn-primary"><?= __('admin.save_settings') ?></span>
						</div>
					</div>
				</div>
			</div>

			<!-- modal -->
			<div class="modal fade bs-cards-form-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title"><?= __('admin.manage_bottom_sections_cards') ?></h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body" style="max-height:70vh; overflow-y:auto;">
							<input type="hidden" id="bsc_index" value="">
							<input type="hidden" id="bsc_feature_image" value="">
							<div class="form-group">
								<label  class="control-label"><?= __('admin.feature_title') ?></label>
								<input  id="bsc_title" value="" class="form-control"  type="text">
							</div>
							<div class="form-group">
								<label  class="control-label"><?= __('admin.feature_subtitle') ?></label>
								<input  id="bsc_sub_title" value="" class="form-control"  type="text">
							</div>
							<div class="row border p-2 m-1">
								<div class="col-md-7">
									<div class="form-group">
										<label  class="control-label"><?= __('admin.feature_image') ?></label>
										<br/>
										<input type="file" name="store_bscimage">
									</div>
								</div>
								<div class="col-md-4">
									<img id="store_bscimage_container" src="" style="width: 100%; height:100px;" class='img-responsive'>
								</div>
							</div>

							<div class="form-group">
								<label  class="control-label"><?= __('admin.slider_button_background_color') ?></label>
								<input id="bsc_bg_color" value="#FFFFFF" class="form-control jscolor" data-jscolor type="text">
							</div>

							<div class="form-group">
								<label  class="control-label"><?= __('admin.banner_bottom_link') ?></label>
								<input  id="bsc_button_link" value="" class="form-control"  type="text">
							</div>
							<div class="col-4">
								<div class="form-group">
									<label class="control-label"><?= __('admin.open-link-in-new-window') ?></label>
									<div>
										<input id="bsc_link_target" class="btn-switch" type="checkbox"  data-toggle="toggle" data-size="normal" data-on="ON" data-off="OFF">
									</div>
								</div>
							</div>
							 
						</div>
						<div class="modal-footer">
							<span id="bs-cards-form-submit" class="btn btn-md btn-primary"><?= __('admin.save_settings') ?></span>
						</div>
					</div>
				</div>
			</div>

			<!-- modal custom page -->
			<div class="modal fade custom-page-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title"><?= __('admin.manage_custom_pages') ?></h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body" style="max-height:70vh; overflow-y:auto;">
							<input type="hidden" id="cp_index" value="">
							<input type="hidden" id="cp_image" value="">
							<input type="hidden" id="cp_meta_id" value="">
							<div class="form-group">
								<label  class="control-label"><?= __('admin.page_title') ?></label>
								<input  id="cp_title" value="" class="form-control"  type="text">
							</div>
							<div class="form-group">
								<label  class="control-label"><?= __('admin.page_content') ?></label>
								<textarea id="cp_content" class="form-control summernote"></textarea>
							</div>
							<div class="row border p-2 m-1">
								<div class="col-md-7">
									<div class="form-group">
										<label  class="control-label"><?= __('admin.page_image') ?></label>
										<br/>
										<input type="file" name="store_cpimage">
									</div>
								</div>
								<div class="col-md-4">
									<img id="store_cpimage_container" src="" style="width: 100%; height:100px;" class='img-responsive'>
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<span id="custom-page-submit" class="btn btn-md btn-primary"><?= __('admin.save_settings') ?></span>
						</div>
					</div>
				</div>
			</div>

			<!-- modal social links -->
			<div class="modal fade social-links-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title"><?= __('admin.manage_social_links') ?></h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body" style="max-height:70vh; overflow-y:auto;">
							<input type="hidden" id="sl_index" value="">
							<input type="hidden" id="sl_image" value="">
							<div class="form-group">
								<label  class="control-label"><?= __('admin.link_title') ?></label>
								<input  id="sl_title" value="" class="form-control"  type="text">
							</div>
							<div class="form-group">
								<label  class="control-label"><?= __('admin.link_url') ?></label>
								<input  id="sl_url" value="" class="form-control"  type="text">
							</div>

							<div class="row border p-2 m-1">
								<div class="col-md-7">
									<div class="form-group">
										<label  class="control-label"><?= __('admin.link_icon') ?></label>
										<br/>
										<input type="file" name="store_slicon">
									</div>
								</div>
								<div class="col-md-4">
									<img id="store_slicon_container" src="" style="width: 100%; height:100px;" class='img-responsive'>
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<span id="social-links-submit" class="btn btn-md btn-primary"><?= __('admin.save_settings') ?></span>
						</div>
					</div>
				</div>
			</div>
		</form>


		<!-- modal footer menu section -->
		<div class="modal fade footer-menu-form-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title"><?= __('admin.manage_footer_menu') ?></h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body" style="max-height:70vh; overflow-y:auto;">
						<form class="form-horizontal" method="post" action="" id="footer-menu-form">
							<input type="hidden" name="fm_index" value="">
							<div class="form-group">
								<label  class="control-label"><?= __('admin.menu_title') ?></label>
								<input  name="fm_title" value="" class="form-control"  type="text">
							</div>
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label  class="control-label"><?= __('admin.menu_type') ?></label>
										<select class="form-control" name="fm_type">
											<option value="custom"><?= __('admin.custom_menu') ?></option>
											<option value="page"><?= __('admin.pages') ?></option>
											<option value="category"><?= __('admin.categories') ?></option>
										</select>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label  class="control-label"><?= __('admin.available_links') ?></label>
										<select class="form-control" name="fml_type" disabled>
											<option value="" disabled><?= __('admin.select_link') ?></option>
											<?php 
											echo '<option value="'.base_url('store/category/').'" data-fm_type="category" style="dispaly:none">All Categories</option>';
											foreach($categories as $cat) {
												echo '<option value="'.base_url('store/category/').$cat['slug'].'" data-fm_type="category" style="dispaly:none">'.$cat['name'].'</option>';
											}
											?>
											<?php 
											foreach($pages as $page) {
												echo '<option value="'.base_url('store/').$page['slug'].'" data-fm_type="page" style="dispaly:none">'.$page['name'].'</option>';
											}
											?>
										</select>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label  class="control-label"><?= __('admin.link_title') ?></label>
										<input  name="fml_title" value="" class="form-control"  type="text">
									</div>
								</div>
								<div class="col-md-10">
									<div class="form-group">
										<label  class="control-label"><?= __('admin.link_url') ?></label>
										<input disabled name="fml_url" value="" class="form-control"  type="text">
									</div>
								</div>
								<div class="col-md-1 pt-4">
									<span class="btn btn-primary btn-add-link" style="margin-top:6px;">+ <?= __('admin.add') ?></span>
								</div>
							</div>
							<table id="menu_items_list" class="table w-100">
								<thead>
									<tr>
										<th><?= __('admin.title') ?></th>
										<th><?= __('admin.url') ?></th>
										<th></th>
									</tr>
								</thead>
								<tbody>
								</tbody>
							</table>
						</form>
					</div>
					<div class="modal-footer">
						<span id="footer-menu-form-submit" class="btn btn-md btn-primary"><?= __('admin.save_settings') ?></span>
					</div>
				</div>
			</div>
		</div>
		
		<script type="text/javascript">
			$('.store_status').on('change', function(){
				var checked = $(this).prop('checked');
				var menu_on_front = $('.menu_on_front').closest('.toggle');
				var menu_on_front_blank = $('.menu_on_front_blank').closest('.toggle');

				if (checked == true) {
					var status = 1;
					menu_on_front.css('pointer-events', '');
					menu_on_front_blank.css('pointer-events', '');
				}else{
					var status = 0;
        			menu_on_front.addClass('off');
        			menu_on_front.removeClass('btn-primary');
        			menu_on_front.addClass('btn-default');
        			menu_on_front.css('pointer-events', 'none');
        			menu_on_front_blank.addClass('off');
        			menu_on_front_blank.removeClass('btn-primary');
        			menu_on_front_blank.addClass('btn-default');
        			menu_on_front_blank.css('pointer-events', 'none');
				}

				$.ajax({
					url:'<?= base_url("admincontrol/update_store_status") ?>',
					type:'POST',
					dataType:'json',
					data:{'action':'update_store_status', status:status},
					success:function(json){
					},
				})
			});

			$('.menu_on_front').on('change', function(){
				var checked = $(this).prop('checked');

				if (checked == true) {
					var status = 1;
				}else{
					var status = 0;
				}

				$.ajax({
					url:'<?= base_url("admincontrol/update_store_menu_on_front") ?>',
					type:'POST',
					dataType:'json',
					data:{'action':'update_store_menu_on_front', status:status},
					success:function(json){
					},
				})
			});

			$('.menu_on_front_blank').on('change', function(){
				var checked = $(this).prop('checked');

				if (checked == true) {
					var status = 1;
				}else{
					var status = 0;
				}

				$.ajax({
					url:'<?= base_url("admincontrol/update_store_menu_on_front_blank") ?>',
					type:'POST',
					dataType:'json',
					data:{'action':'update_store_menu_on_front_blank', status:status},
					success:function(json){
					},
				})
			});

			$('.store_mode').on('change', function(){
				var checked = $(this).prop('checked');
				var theme1 = `<option value="0"><?= __('admin.theme_1') ?></option>`;
				var classified = `<option value="classified"><?= __('admin.classified') ?></option>`;

				if (checked == true) {
					var mode = 'cart';
					var theme = 0;
					$(".store_mode_info").hide();
					$('#theme_name').html('').html(theme1)
					$(".cart_theme_settings").removeClass('d-none');
					$(".sales_theme_settings").addClass('d-none');
				}else{
					var mode = 'sales';
					var theme = 'classified';
					$(".cart_theme_settings").addClass('d-none');
					$(".sales_theme_settings").removeClass('d-none');
					$(".store_mode_info").show();
					$('#theme_name').html('').html(classified)
				}

				$.ajax({
					url:'<?= base_url("admincontrol/update_store_mode") ?>',
					type:'POST',
					dataType:'json',
					data:{'action':'update_store_mode', mode:mode, theme:theme},
					success:function(json){
					},
				})
			});

			$('.setting-nnnav li a').on('shown.bs.tab', function(event){
				var x = $(event.target).attr('href');
				$(".btn-submit").hide();

				if(x != '#site-fronttemplate'){
					$(".btn-submit").show();
				}
				localStorage.setItem("last_pill", x);
			});

			$(document).on('ready',function() {
				var last_pill = localStorage.getItem("last_pill");
				if(last_pill){ $('[href="'+ last_pill +'"]').click() }
			});

			$('#endtime,.datetime-picker').datetimepicker({
				format:'d-m-Y H:i',
				inline:true,
			});
			$('.setCustomTime').on('change', function(){
				$parents = $(this).parents(".form-group");
				$parents.find(".custom_time_container").hide();
				if($(this).prop("checked")){
					$parents.find(".custom_time_container").show();
				}
			});
			$(document).on('ready',function() {
				$('.summernote').summernote({
					tabsize: 2,
					height: 400
				});
			});
			$(".btn-submit").on('click',function(evt){
				evt.preventDefault();	
				submit_store_setting();    

			});

			function submit_store_setting(data=false){
				let do_not_submit = false;

				let ps_product_commission_type = $('select[name="productsetting[product_commission_type]"]').val();
				let ps_product_commission = $('input[name="productsetting[product_commission]"]').val();
				let ps_product_ppc = $('input[name="productsetting[product_ppc]"]').val();
				let ps_product_noofpercommission = $('input[name="productsetting[product_noofpercommission]"]').val();

				if(ps_product_commission != "" && ps_product_ppc != "" && ps_product_noofpercommission != "") {
					if(ps_product_commission_type == "") {
						do_not_submit = true;
						Swal.fire({
							icon: 'warning',
							title: 'Warning',
							text: '<?= __('admin.product_comission_type_should_not_be_empty') ?>'
						});
					}
				}

				let fs_product_commission_type = $('select[name="formsetting[product_commission_type]"]').val();
				let fs_product_commission = $('input[name="formsetting[product_commission]"]').val();
				let fs_product_ppc = $('input[name="formsetting[product_ppc]"]').val();
				let fs_product_noofpercommission = $('input[name="formsetting[product_noofpercommission]"]').val();


				if(fs_product_commission != "" && fs_product_ppc != "" && fs_product_noofpercommission != "") {
					if(fs_product_commission_type == "") {
						do_not_submit = true;
						Swal.fire({
							icon: 'warning',
							title: 'Warning',
							text: '<?= __('admin.form_comission_type_shoul_not_be_empty') ?>'
						});
					}
				}

				if(!do_not_submit) {
					var formData = new FormData($("#setting-form")[0]);  
					$(".btn-submit").btn("loading");

					if(data != null) {
						formData.append(data.name, data.value);
					}

					formData = formDataFilter(formData);

					$this = $("#setting-form");
					$.ajax({
						type:'POST',
						dataType:'json',
						cache:false,
						contentType: false,
						processData: false,
						data:formData,
						success:function(result){
							$(".btn-submit").btn("reset");
							$(".alert-dismissable").remove();
							$this.find(".has-error").removeClass("has-error");
							$this.find(".is-invalid").removeClass("is-invalid");
							$this.find("span.text-danger").remove();


							if(result['success']){
								re_render_listings(result);
								Swal.fire({
									icon: 'success',
									title: '<?= __('admin.success') ?>',
									text: result['success']
								});

								$('.formsetting_error').text("");
								$('.productsetting_error').text("");
							}
							if(result['errors']){
								$.each(result['errors'], function(i,j){
									$ele = $this.find('[name="'+ i +'"]');
									if(!$ele.length){ 
										$ele = $this.find('.'+ i);
									}
									if($ele){
										$ele.addClass("is-invalid");
										$ele.parents(".form-group").addClass("has-error");
										$ele.after("<span class='d-block text-danger'>"+ j +"</span>");
									}
								});

								errors = result['errors'];
								$('.formsetting_error').text(errors['formsetting_recursion_custom_time']);
								$('.productsetting_error').text(errors['productsetting_recursion_custom_time']);
							}
						},
					});
				}
			}

			function re_render_listings(result) {
				if(result['homepage_slider']) {
					$('#homepage_sliders_list').empty();
					if(result['homepage_slider'].length > 0) {
						for (let index = 0; index < result['homepage_slider'].length; index++) {
							let element = result['homepage_slider'][index];
							let image_src = (element.slider_background_image != null && element.slider_background_image != "") ? '<?= base_url('assets/images/site/') ?>'+element.slider_background_image : '<?= base_url('assets/store/default/img/banner.png'); ?>';
							let new_row = `<tr>
							<td scope="row">`+element.index+`</td>
							<td scope="row">`+element.title+`</td>
							<td scope="row">`+element.sub_title+`</td>
							<td style="width: 200px;"><img style="width: 100px; height: 50px;" src="`+image_src+`" class='img-responsive'></td>
							<td style="width: 87px; padding: 5px 0px !important;">
							<input type="hidden" name="store[homepage_slider][edited][]" value="0">
							<input type="hidden" name="store[homepage_slider][index][]" value="`+element.index+`">
							<input type="hidden" name="store[homepage_slider][title][]" value="`+element.title+`">
							<input type="hidden" name="store[homepage_slider][sub_title][]" value="`+element.sub_title+`">
							<textarea name="store[homepage_slider][content][]" style="display:none;">`+element.content+`</textarea>
							<input type="hidden" name="store[homepage_slider][slider_background_image][]" value="`+element.slider_background_image+`">
							<input type="hidden" name="store[homepage_slider][button_text][]" value="`+element.button_text+`">
							<input type="hidden" name="store[homepage_slider][button_link][]" value="`+element.button_link+`">
							<input type="hidden" name="store[homepage_slider][slider_text_color][]" value="`+element.slider_text_color+`">
							<input type="hidden" name="store[homepage_slider][button_text_color][]" value="`+element.button_text_color+`">
							<input type="hidden" name="store[homepage_slider][button_bg_color][]" value="`+element.button_bg_color+`">
							<button type="button" class="btn btn-primary btn-slider-form-modal-edit"><i class="fa fa-pencil"></i></button>
							<button type="button" class="btn btn-danger remove-slider-btn"><i class="fa fa-trash"></i></button>
							</td>
							</tr>`;
							$('#homepage_sliders_list').append(new_row);
						}
					} else {
						$('#homepage_sliders_list').append(`<h6 class='text-center text-muted'>`+'<?= __('admin.sliders_not_available') ?>'+`</h6>`);
					}
					$('.slider-form-modal').modal('hide');
					$("#slider-form-submit").btn("reset");
				}

				if(result['homepage_features']) {
					$('#homepage_features_list').empty();
					if(result['homepage_features'].length > 0) {
						for (let index = 0; index < result['homepage_features'].length; index++) {
							let element = result['homepage_features'][index];
							let image_src = (element.feature_image != null && element.feature_image != "") ? '<?= base_url('assets/images/site/') ?>'+element.feature_image : '<?= base_url('assets/store/default/img/banner.png'); ?>';
							let new_row = `<tr>
							<td scope="row">`+element.index+`</td>
							<td scope="row">`+element.title+`</td>
							<td scope="row">`+element.sub_title+`</td>
							<td style="width: 200px;"><img style="width: 100px; height: 50px;" src="`+image_src+`" class='img-responsive'></td>
							<td style="width: 87px; padding: 5px 0px !important;">
							<input type="hidden" name="store[homepage_features][edited][]" value="0">
							<input type="hidden" name="store[homepage_features][index][]" value="`+element.index+`">
							<input type="hidden" name="store[homepage_features][title][]" value="`+element.title+`">
							<input type="hidden" name="store[homepage_features][sub_title][]" value="`+element.sub_title+`">
							<input type="hidden" name="store[homepage_features][feature_image][]" value="`+element.feature_image+`">
							<button type="button" class="btn btn-primary btn-features-form-modal-edit"><i class="fa fa-pencil"></i></button>
							<button type="button" class="btn btn-danger remove-features-btn"><i class="fa fa-trash"></i></button>
							</td>
							</tr>`;
							$('#homepage_features_list').append(new_row);
						}
					} else {
						$('#homepage_features_list').append(`<h6 class='text-center text-muted'>`+'<?= __('admin.features_not_available') ?>'+`</h6>`);
					}
					$('.features-form-modal').modal('hide');
					$("#features-form-submit").btn("reset");
				}

				if(result['bs_cards']) {
					$('#bs_cards_list').empty();
					if(result['bs_cards'].length > 0) {
						for (let index = 0; index < result['bs_cards'].length; index++) {
							let element = result['bs_cards'][index];
							let image_src = (element.feature_image != null && element.feature_image != "") ? '<?= base_url('assets/images/site/') ?>'+element.feature_image : '<?= base_url('assets/store/default/img/banner.png'); ?>';
							let new_row = `<tr>
							<td scope="row">`+element.index+`</td>
							<td scope="row">`+element.title+`</td>
							<td scope="row">`+element.sub_title+`</td>
							<td style="width: 200px;"><img style="width: 100px; height: 50px;" src="`+image_src+`" class='img-responsive'></td>
							<td style="width: 87px; padding: 5px 0px !important;">
							<input type="hidden" name="store[bs_cards][edited][]" value="0">
							<input type="hidden" name="store[bs_cards][index][]" value="`+element.index+`">
							<input type="hidden" name="store[bs_cards][title][]" value="`+element.title+`">
							<input type="hidden" name="store[bs_cards][sub_title][]" value="`+element.sub_title+`">
							<input type="hidden" name="store[bs_cards][feature_image][]" value="`+element.feature_image+`">
							<input type="hidden" name="store[bs_cards][bg_color][]" value="`+element.bg_color+`">
							<input type="hidden" name="store[bs_cards][button_link][]" value="`+element.button_link+`">
							<input type="hidden" name="store[bs_cards][link_target][]" value="`+element.link_target+`">
							<button type="button" class="btn btn-primary btn-bs-cards-form-modal-edit"><i class="fa fa-pencil"></i></button>
							<button type="button" class="btn btn-danger remove-bs-cards-btn"><i class="fa fa-trash"></i></button>
							</td>
							</tr>`;
							$('#bs_cards_list').append(new_row);
						}
					} else {
						$('#bs_cards_list').append(`<h6 class='text-center text-muted'>`+'<?= __('admin.cards_not_available') ?>'+`</h6>`);
					}
					$('.bs-cards-form-modal').modal('hide');
					$("#bs-cards-form-submit").btn("reset");
				}

				if(result['footer_menu']) {
					$('#footer_menu_list').empty();
					if(result['footer_menu'].length > 0) {
						for (let index = 0; index < result['footer_menu'].length; index++) {
							let element = result['footer_menu'][index];

							let linksInputs = "";
							let linksTitle = "";

							let letpreIndex = element.index - 1;

							element.links.forEach(link => {
								linksTitle += (linksInputs == "") ? link.title : ", "+link.title;
								linksInputs += `<input type="hidden" name="store[footer_menu][links][`+letpreIndex+`][title][]" value="`+link.title+`"><input type="hidden" name="store[footer_menu][links][`+letpreIndex+`][url][]" value="`+link.url+`"><input type="hidden" name="store[footer_menu][links][`+letpreIndex+`][type][]" value="`+link.type+`">`;
							});

							let new_row = `<tr><td scope="row">`+element.index+`</td><td scope="row">`+element.title+`</td><td scope="row">`+linksTitle+`</td><td style="width: 87px; padding: 5px 0px !important;"><input type="hidden" name="store[footer_menu][index][`+letpreIndex+`]" value="`+element.index+`"><input type="hidden" name="store[footer_menu][title][`+letpreIndex+`]" value="`+element.title+`">`;
							new_row += linksInputs;
							new_row += `<button data-letpreindex="`+letpreIndex+`" type="button" class="btn btn-primary btn-footer-menu-form-modal-edit"><i class="fa fa-pencil"></i></button>
							<button type="button" class="btn btn-danger remove-footer-menu"><i class="fa fa-trash"></i></button>
							</td>
							</tr>`;

							$('#footer_menu_list').append(new_row);
						}
					} else {
						$('#footer_menu_list').append(`<h6 class='text-center text-muted'>`+'<?= __('admin.menu_not_available') ?>'+`</h6>`);
					}
					$('.footer-menu-form-modal').modal('hide');
					$("#footer-menu-form-submit").btn("reset");
				}

				if(result['custom_page']) {
					$('#custom_page_list').empty();
					if(result['custom_page'].length > 0) {
						for (let index = 0; index < result['custom_page'].length; index++) {
							let element = result['custom_page'][index];
							let image_src = (element.image != null && element.image != "") ? '<?= base_url('assets/images/site/') ?>'+element.image : '<?= base_url('assets/store/default/img/banner.png'); ?>';

							let new_row = `<tr>
							<td scope="row">`+element.title+`</td>
							<td scope="row">`+element.slug+`</td>
							<td style="width: 200px;"><img style="width: 100px; height: 50px;" src="`+image_src+`" class='img-responsive'></td>
							<td style="width: 87px; padding: 5px 0px !important;">
							<input type="hidden" name="store[custom_page][edited][]" value="0">
							<input type="hidden" name="store[custom_page][index][]" value="`+element.index+`">
							<input type="hidden" name="store[custom_page][title][]" value="`+element.title+`">
							<input type="hidden" name="store[custom_page][slug][]" value="`+element.slug+`">
							<input type="hidden" name="store[custom_page][image][]" value="`+element.image+`">
							<input type="hidden" name="store[custom_page][meta_id][]" value="`+element.meta_id+`">
							<textarea name="store[custom_page][content][]" style="display:none">`+element.content+`</textarea>
							<button type="button" class="btn btn-primary btn-custom-page-modal-form-edit"><i class="fa fa-pencil"></i></button>
							<button type="button" class="btn btn-danger remove-custom-page"><i class="fa fa-trash"></i></button>
							</td>
							</tr>`;

							$('#custom_page_list').append(new_row);
						}
					} else {
						$('#custom_page_list').append(`<h6 class='text-center text-muted'>`+'<?= __('admin.pages_not_available') ?>'+`</h6>`);
					}
					$('.custom-page-modal').modal('hide');
					$("#custom-page-submit").btn("reset");
				}

				if(result['social_links']) {
					$('#social_links_list').empty();
					if(result['social_links'].length > 0) {
						for (let index = 0; index < result['social_links'].length; index++) {
							let element = result['social_links'][index];
							let image_src = (element.image != null && element.image != "") ? '<?= base_url('assets/images/site/') ?>'+element.image : '<?= base_url('assets/store/default/img/banner.png'); ?>';

							let new_row = `<tr>
							<td scope="row">`+element.title+`</td>
							<td scope="row">`+element.url+`</td>
							<td style="width: 200px; text-align:right;">
							<img style="width: 50px; height: 50px; background-color:grey;" src="`+image_src+`" class='img-responsive'>
							</td>
							<td style="width: 87px; padding: 5px 0px !important;">
							<input type="hidden" name="store[social_links][index][]" value="`+element.index+`">
							<input type="hidden" name="store[social_links][edited][]" value="0">
							<input type="hidden" name="store[social_links][title][]" value="`+element.title+`">
							<input type="hidden" name="store[social_links][url][]" value="`+element.url+`">
							<input type="hidden" name="store[social_links][image][]" value="`+element.image+`">
							<button type="button" class="btn btn-primary btn-social-links-form-edit"><i class="fa fa-pencil"></i></button>
							<button type="button" class="btn btn-danger remove-social-links"><i class="fa fa-trash"></i></button>
							</td>
							</tr>
							`;

							$('#social_links_list').append(new_row);
						}
					} else {
						$('#social_links_list').append(`<h6 class='text-center text-muted'>`+'<?= __('admin.pages_not_available') ?>'+`</h6>`);
					}
					$('.social-links-modal').modal('hide');
					$("#social-links-submit").btn("reset");
				}

				if(result['custom_page_for_menu']) {
					$('select[name="fml_type"] option[data-fm_type="page"]').remove();
					for (let index = 0; index < result['custom_page_for_menu'].length; index++) {
						const element = result['custom_page_for_menu'][index];
						$('select[name="fml_type"]').append(`<option value="<?= base_url('store/') ?>`+result['custom_page_for_menu'][index]['slug']+`" data-fm_type="page" style="dispaly:none">`+result['custom_page_for_menu'][index]['name']+`</option>`);
					}
				}
			}

			$(document).on('change', '#recursion_type, #form_recursion_type', function(){
				var recursion_type = $(this).val();
				if( recursion_type == 'custom_time' ){
					$(this).parent().find('.custom_time').show();
				}else{
					$(this).parent().find('.custom_time').hide();
				}
			});
			$(document).on('change', '.recur_day, .recur_hour, .recur_minute', function(){
				var days = $(this).parents('.custom_time').find('.recur_day').val();
				var hours = $(this).parents('.custom_time').find('.recur_hour').val();
				var minutes = $(this).parents('.custom_time').find('.recur_minute').val();
				var total_minutes;	

				total_hours = parseInt(days*24) + parseInt(hours);
				total_minutes = parseInt(total_hours*60) + parseInt(minutes);
				$(this).parents('.custom_time').find('.recursion_custom_time').val(total_minutes);
			});
			$(document).on('click', '.btn-add-comment', function(){
				var comment_row_count = $(".comment-titles table tbody tr").length;

				var html ='';
				html += '<tr>';
				html += '<td>';
				html += '<input type="text" name="order_comment[title]['+(comment_row_count + 1)+']" class="form-control" placeholder="<?= __('admin.comment_title') ?>" />';
				html += '</td>';
				html += '<td class="text-right">';
				html += '<button type="button" class="btn btn-danger" onclick="$(this).closest(\'tr\').remove()"><i class="fa fa-trash"></i></button>';
				html += '</td>';
				html += '</tr>';

				$('.comment-titles table tbody').append(html);
			});
		</script>

		<script>
			$(document).on('click', '.btn-add-more', function(){
				let count = $('#notifications-list .col-md-12').length;
				$('#notifications-list').append(`
					<div class="col-md-12">
					<div class="form-group">
					<label class="control-label">Notification `+(count+1)+`</label>
					<input name="store[notification][]" class="form-control" type="text" value="">
					</div>
					<button type="button" class="btn btn-danger btn-md remove-notification-btn" style="position: absolute; top: 30px; right: 11px;"><i class="fa fa-trash"></i></button>
					</div>
					`);
			});

			$(document).on('click', '.remove-notification-btn', function(){
				$(this).parent().remove();

				$('#notifications-list .col-md-12').each(function( index ) {
					$(this).find('.control-label').text('Notification '+(index+1));
				});

				let count = $('#notifications-list .col-md-12').length;

				if (count == 0) {
					$('#notifications-list').append(`
						<div class="col-md-12">
						<div class="form-group">
						<label class="control-label">Notification `+(count+1)+`</label>
						<input name="store[notification][]" class="form-control" type="text" value="">
						</div>
						<button type="button" class="btn btn-danger btn-md remove-notification-btn" style="position: absolute; top: 30px; right: 11px;"><i class="fa fa-trash"></i></button>
						</div>
						`);
				}
			});

			$(document).on('click', '.remove-slider-btn', function(){
				$(this).parent().parent().remove();
				$('#homepage_sliders_list tr').each(function( index ) {
					$(this).find('td:first-child').text((index+1));
					$(this).find('input[name="store[homepage_slider][index][]"]').val((index+1));
				});
			});

			$(document).on('click', '.remove-features-btn', function(){
				$(this).parent().parent().remove();
				$('#homepage_features_list tr').each(function( index ) {
					$(this).find('td:first-child').text((index+1));
					$(this).find('input[name="store[homepage_features][index][]"]').val((index+1));
				});
			});

			$(document).on('click', '.remove-bs-cards-btn', function(){
				$(this).parent().parent().remove();
				$('#bs_cards_list tr').each(function( index ) {
					$(this).find('td:first-child').text((index+1));
					$(this).find('input[name="store[bs_cards][index][]"]').val((index+1));
				});
			});

			$(document).on('click', '.btn-slider-form-modal', function(){
				let index = $('#homepage_sliders_list tr:not(.empty)').length + 1;
				let modal = $('.slider-form-modal');
				modal.find('#hs_index').val(index);
				modal.find('#hs_title').val('');
				modal.find('#hs_sub_title').val('');
				modal.find('#hs_content').val('');
				modal.find('#hs_button_text').val('');
				modal.find('#hs_button_link').val('');
				modal.find('#hs_text_color').val('#FFFFFF');
				modal.find('#hs_button_text_color').val('#000000');
				modal.find('#hs_button_bg_color').val('#FFFFFF');
				document.querySelector('#hs_text_color').jscolor.fromString('#FFFFFF');
				document.querySelector('#hs_button_text_color').jscolor.fromString('#000000');
				document.querySelector('#hs_button_bg_color').jscolor.fromString('#FFFFFF');
				modal.find('#hs_slider_background_image').val('');
				modal.find('input[name="store_hsbackgroundimage"]').val('');
				modal.find('#store_hsbackgroundimage_container').attr('src', '<?= base_url('assets/store/default/img/banner.png'); ?>');
				modal.modal('show');
				modal.modal('show');
			});

			$(document).on('click', '.btn-slider-form-modal-edit', function(){
				let data = $(this).parent();
				let modal = $('.slider-form-modal');
				modal.find('#hs_index').val(data.find('input[name="store[homepage_slider][index][]"]').val());
				modal.find('#hs_title').val(data.find('input[name="store[homepage_slider][title][]"]').val());
				modal.find('#hs_sub_title').val(data.find('input[name="store[homepage_slider][sub_title][]"]').val());
				modal.find('#hs_content').val(data.find('textarea[name="store[homepage_slider][content][]"]').val());
				modal.find('#hs_button_text').val(data.find('input[name="store[homepage_slider][button_text][]"]').val());
				modal.find('#hs_button_link').val(data.find('input[name="store[homepage_slider][button_link][]"]').val());
				modal.find('#hs_text_color').val(data.find('input[name="store[homepage_slider][slider_text_color][]"]').val());
				modal.find('#hs_button_text_color').val(data.find('input[name="store[homepage_slider][button_text_color][]"]').val());
				modal.find('#hs_button_bg_color').val(data.find('input[name="store[homepage_slider][button_bg_color][]"]').val());
				document.querySelector('#hs_text_color').jscolor.fromString(data.find('input[name="store[homepage_slider][slider_text_color][]"]').val());
				document.querySelector('#hs_button_text_color').jscolor.fromString(data.find('input[name="store[homepage_slider][button_text_color][]"]').val());
				document.querySelector('#hs_button_bg_color').jscolor.fromString(data.find('input[name="store[homepage_slider][button_bg_color][]"]').val());
				modal.find('input[name="store_hsbackgroundimage"]').val('');
				modal.find('#hs_slider_background_image').val(data.find('input[name="store[homepage_slider][slider_background_image][]"]').val());
				modal.find('#store_hsbackgroundimage_container').attr('src', $(this).parent().parent().find('img').attr('src'));
				modal.modal('show');
			});

			$(document).on('click', '#slider-form-submit', function(){
				let modal = $('.slider-form-modal');
				let image_src = $('#store_hsbackgroundimage_container').attr('src');

				if(modal.find('#hs_title').val() == null || modal.find('#hs_title').val() == "") {
					alert('<?= __('admin.title_should_not_be_empty') ?>');
				} else {

					$("input[name='store[homepage_slider][edited][]']").each(function( index ) {
						$(this).val(0);
					});


					let new_row = `<tr>
					<td scope="row">`+modal.find('#hs_index').val()+`</td>
					<td scope="row">`+modal.find('#hs_title').val()+`</td>
					<td scope="row">`+modal.find('#hs_sub_title').val()+`</td>
					<td style="width: 200px;"><img style="width: 100px; height: 50px;" src="`+image_src+`" class='img-responsive'></td>
					<td style="width: 87px; padding: 5px 0px !important;">
					<input type="hidden" name="store[homepage_slider][edited][]" value="1">
					<input type="hidden" name="store[homepage_slider][index][]" value="`+modal.find('#hs_index').val()+`">
					<input type="hidden" name="store[homepage_slider][title][]" value="`+modal.find('#hs_title').val()+`">
					<input type="hidden" name="store[homepage_slider][sub_title][]" value="`+modal.find('#hs_sub_title').val()+`">
					<textarea name="store[homepage_slider][content][]" style="display:none;">`+modal.find('#hs_content').val()+`</textarea>
					<input type="hidden" name="store[homepage_slider][slider_background_image][]" value="`+modal.find('#hs_slider_background_image').val()+`">
					<input type="hidden" name="store[homepage_slider][button_text][]" value="`+modal.find('#hs_button_text').val()+`">
					<input type="hidden" name="store[homepage_slider][button_link][]" value="`+modal.find('#hs_button_link').val()+`">
					<input type="hidden" name="store[homepage_slider][slider_text_color][]" value="`+modal.find('#hs_text_color').val()+`">
					<input type="hidden" name="store[homepage_slider][button_text_color][]" value="`+modal.find('#hs_button_text_color').val()+`">
					<input type="hidden" name="store[homepage_slider][button_bg_color][]" value="`+modal.find('#hs_button_bg_color').val()+`">
					<button type="button" class="btn btn-primary btn-slider-form-modal-edit"><i class="fa fa-pencil"></i></button>
					<button type="button" class="btn btn-danger remove-slider-btn"><i class="fa fa-trash"></i></button>
					</td>
					</tr>`;

					$('#homepage_sliders_list tr:nth-child('+(modal.find('#hs_index').val())+')').remove();

					if(modal.find('#hs_index').val() > $('#homepage_sliders_list tr:not(.empty)').length) {
						$('#homepage_sliders_list').append(new_row);
					} else {
						$('#homepage_sliders_list tr:nth-child('+(modal.find('#hs_index').val())+')').before(new_row);
					}
					submit_store_setting({name:'return', value:'slider'});
					$("#slider-form-submit").btn("loading");
				}
			});

			$(document).on('click', '.btn-features-form-modal', function(){
				let index = $('#homepage_features_list tr:not(.empty)').length + 1;
				let modal = $('.features-form-modal');
				modal.find('#hf_index').val(index);
				modal.find('#hf_title').val('');
				modal.find('#hf_sub_title').val('');
				modal.find('#hf_feature_image').val('');
				modal.find('input[name="store_hfimage"]').val('');
				modal.find('#store_hfimage_container').attr('src', '<?= base_url('assets/store/default/img/banner.png'); ?>');
				modal.modal('show');
			});

			$(document).on('click', '.btn-features-form-modal-edit', function(){
				let data = $(this).parent();
				let modal = $('.features-form-modal');
				modal.find('#hf_index').val(data.find('input[name="store[homepage_features][index][]"]').val());
				modal.find('#hf_title').val(data.find('input[name="store[homepage_features][title][]"]').val());
				modal.find('#hf_sub_title').val(data.find('input[name="store[homepage_features][sub_title][]"]').val());
				modal.find('#hf_feature_image').val(data.find('input[name="store[homepage_features][feature_image][]"]').val());
				modal.find('input[name="store_hfimage"]').val('');
				modal.find('#store_hfimage_container').attr('src', $(this).parent().parent().find('img').attr('src'));
				modal.modal('show');
			});

			$(document).on('click', '#features-form-submit', function(){
				let modal = $('.features-form-modal');
				let image_src = $('#store_hfimage_container').attr('src');

				if(modal.find('#hf_title').val() == null || modal.find('#hs_title').val() == "") {
					alert('title should not be empty');
				} else {

					$("input[name='store[homepage_features][edited][]']").each(function( index ) {
						$(this).val(0);
					});

					let new_row = `
					<tr>
					<td scope="row">`+modal.find('#hf_index').val()+`</td>
					<td scope="row">`+modal.find('#hf_title').val()+`</td>
					<td scope="row">`+modal.find('#hf_sub_title').val()+`</td>
					<td style="width: 200px;"><img style="width: 100px; height: 50px;" src="`+image_src+`" class='img-responsive'></td>
					<td style="width: 87px; padding: 5px 0px !important;">
					<input type="hidden" name="store[homepage_features][edited][]" value="1">
					<input type="hidden" name="store[homepage_features][index][]" value="`+modal.find('#hf_index').val()+`">
					<input type="hidden" name="store[homepage_features][title][]" value="`+modal.find('#hf_title').val()+`">
					<input type="hidden" name="store[homepage_features][sub_title][]" value="`+modal.find('#hf_sub_title').val()+`">
					<input type="hidden" name="store[homepage_features][feature_image][]" value="`+modal.find('#hf_feature_image').val()+`">
					<button type="button" class="btn btn-primary btn-features-form-modal-edit"><i class="fa fa-pencil"></i></button>
					<button type="button" class="btn btn-danger remove-features-btn"><i class="fa fa-trash"></i></button>
					</td>
					</tr>
					`;

					$('#homepage_features_list tr:nth-child('+(modal.find('#hf_index').val())+')').remove();

					if(modal.find('#hf_index').val() > $('#homepage_features_list tr:not(.empty)').length) {
						$('#homepage_features_list').append(new_row);
					} else {
						$('#homepage_features_list tr:nth-child('+(modal.find('#hf_index').val())+')').before(new_row);
					}

					submit_store_setting({name:'return', value:'features'});
					$("#features-form-submit").btn("loading");
				}
			});

			$(document).on('click', '.btn-bs-cards-form-modal', function(){
				let index = $('#bs_cards_list tr:not(.empty)').length + 1;
				let modal = $('.bs-cards-form-modal');
				modal.find('#bsc_index').val(index);
				modal.find('#bsc_title').val('');
				modal.find('#bsc_sub_title').val('');
				modal.find('#bsc_feature_image').val('');
				modal.find('#bsc_bg_color').val('#FFFFFF');
				modal.find('#bsc_button_link').val('');
				modal.find('#bsc_link_target').bootstrapToggle('off'); 
				document.querySelector('#bsc_bg_color').jscolor.fromString('#FFFFFF');
				modal.find('#store_bscimage').val('');
				modal.find('#store_bscimage_container').attr('src', '<?= base_url('assets/store/default/img/banner.png'); ?>');
				modal.modal('show');
				$('.bs-cards-form-modal').modal('show');
			});

			$(document).on('click', '.btn-bs-cards-form-modal-edit', function(){
				let data = $(this).parent();
				let modal = $('.bs-cards-form-modal');
				modal.find('#bsc_index').val(data.find('input[name="store[bs_cards][index][]"]').val());
				modal.find('#bsc_title').val(data.find('input[name="store[bs_cards][title][]"]').val());
				modal.find('#bsc_sub_title').val(data.find('input[name="store[bs_cards][sub_title][]"]').val());
				modal.find('#bsc_button_link').val(data.find('input[name="store[bs_cards][button_link][]"]').val());
  
				if(data.find('input[name="store[bs_cards][link_target][]"]').val()=='true') 
				{
					 
					$('#bsc_link_target').bootstrapToggle('on');
				}
			 	else
					$('#bsc_link_target').bootstrapToggle('off');
 
				
				modal.find('#bsc_feature_image').val(data.find('input[name="store[bs_cards][feature_image][]"]').val());
				modal.find('#bsc_bg_color').val(data.find('input[name="store[bs_cards][bg_color][]"]').val());
				document.querySelector('#bsc_bg_color').jscolor.fromString(data.find('input[name="store[bs_cards][bg_color][]"]').val());
				modal.find('#store_bscimage').val('');
				modal.find('#store_bscimage_container').attr('src', $(this).parent().parent().find('img').attr('src'));
				modal.modal('show');
			});

			$(document).on('click', '#bs-cards-form-submit', function(){
				let modal = $('.bs-cards-form-modal');
				let image_src = $('#store_bscimage_container').attr('src');

				if(modal.find('#bsc_title').val() == null || modal.find('#hs_title').val() == "") {
					alert('title should not be empty');
				} else {

					$("input[name='store[bs_cards][edited][]']").each(function( index ) {
						$(this).val(0);
					});

					let new_row = `
					<tr>
					<td scope="row">`+modal.find('#bsc_index').val()+`</td>
					<td scope="row">`+modal.find('#bsc_title').val()+`</td>
					<td scope="row">`+modal.find('#bsc_sub_title').val()+`</td> 
					<td style="width: 200px;"><img style="width: 100px; height: 50px;" src="`+image_src+`" class='img-responsive'></td>
					<td style="width: 87px; padding: 5px 0px !important;">
					<input type="hidden" name="store[bs_cards][edited][]" value="1">
					<input type="hidden" name="store[bs_cards][index][]" value="`+modal.find('#bsc_index').val()+`">
					<input type="hidden" name="store[bs_cards][title][]" value="`+modal.find('#bsc_title').val()+`">
					<input type="hidden" name="store[bs_cards][sub_title][]" value="`+modal.find('#bsc_sub_title').val()+`">
					<input type="hidden" name="store[bs_cards][feature_image][]" value="`+modal.find('#bsc_feature_image').val()+`">
					<input type="hidden" name="store[bs_cards][bg_color][]" value="`+modal.find('#bsc_bg_color').val()+`">
					<input type="hidden" name="store[bs_cards][button_link][]" value="`+modal.find('#bsc_button_link').val()+`">

					<input type="hidden" name="store[bs_cards][link_target][]" value="`+modal.find('#bsc_link_target').prop('checked')+`">
					<button type="button" class="btn btn-primary btn-bs-cards-form-modal-edit"><i class="fa fa-pencil"></i></button>
					<button type="button" class="btn btn-danger remove-bs-cards-btn"><i class="fa fa-trash"></i></button>
					</td>
					</tr>
					`;
					 
					 
					$('#bs_cards_list tr:nth-child('+(modal.find('#bsc_index').val())+')').remove();

					if(modal.find('#bsc_index').val() > $('#bs_cards_list tr:not(.empty)').length) {
						$('#bs_cards_list').append(new_row);
					} else {
						$('#bs_cards_list tr:nth-child('+(modal.find('#bsc_index').val())+')').before(new_row);
					}

					submit_store_setting({name:'return', value:'bs_cards'});
					$("#bs-cards-form-submit").btn("loading");
					
				}
			});


			$(document).on('change', '.slider-form-modal input[name="store_hsbackgroundimage"]', function() {
				read_url(this,'store_hsbackgroundimage_container');
			});

			$(document).on('change', '.features-form-modal input[name="store_hfimage"]', function() {
				read_url(this,'store_hfimage_container');
			});

			$(document).on('change', '.bs-cards-form-modal input[name="store_bscimage"]', function() {
				read_url(this,'store_bscimage_container');
			});

			$(document).on('change', '#pages_menu_section input[name="store_aboutimage"]', function() {
				read_url(this,'store_aboutimage_container');
			});

			$(document).on('change', '#pages_menu_section input[name="store_classifiedbannerimg"]', function() {
				read_url(this,'store_classifiedbannerimg_container');
			});

			$(document).on('change', '#pages_menu_section input[name="store_contactimage"]', function() {
				read_url(this,'store_contactimage_container');
			});

			$(document).on('change', '#pages_menu_section input[name="store_policyimage"]', function() {
				read_url(this,'store_policyimage_container');
			});

			$(document).on('change', 'select[name="fm_type"]', function(){
				let selectBox = $(this);
				if(selectBox.val() == 'custom') {
					$('select[name="fml_type"] option[data-fm_type="category"]').hide();
					$('select[name="fml_type"] option[data-fm_type="page"]').hide();
					$('select[name="fml_type"]').val('');
					$('select[name="fml_type"]').attr('disabled', true);
				} else if(selectBox.val() == 'category') {
					$('select[name="fml_type"] option[data-fm_type="category"]').show();
					$('select[name="fml_type"] option[data-fm_type="page"]').hide();
					$('select[name="fml_type"]').val('');
					$('select[name="fml_type"]').attr('disabled', false);
				} else {
					$('select[name="fml_type"] option[data-fm_type="category"]').hide();
					$('select[name="fml_type"] option[data-fm_type="page"]').show();
					$('select[name="fml_type"]').val('');
					$('select[name="fml_type"]').attr('disabled', false);
				}

				$('.footer-menu-form-modal input[name="fml_title"]').val('');
				$('.footer-menu-form-modal input[name="fml_url"]').val('');
			});

			$(document).on('change', 'select[name="fml_type"]', function(){
				let selectBox = $(this);
				if(selectBox.val() != "") {
					$('.footer-menu-form-modal input[name="fml_title"]').val(selectBox.find('option:selected').text());
					$('.footer-menu-form-modal input[name="fml_url"]').val(selectBox.find('option:selected').val());
				}
			});

			$(document).on('click', '.btn-add-link', function(){
				let link_type = $('.footer-menu-form-modal select[name="fm_type"]').val();
				let link_title = $('.footer-menu-form-modal input[name="fml_title"]').val();
				let link_url = $('.footer-menu-form-modal input[name="fml_url"]').val();
				if(link_title != "" && link_title != null && link_url != null && link_url != null) {
					$('#menu_items_list tbody').append(`<tr>
						<td scope="row">`+link_title+`</td>
						<td scope="row">`+link_url+`</td>
						<td style="width: 50px;">
						<input type="hidden" name="fm_link[title][]" value="`+link_title+`">
						<input type="hidden" name="fm_link[url][]" value="`+link_url+`">
						<input type="hidden" name="fm_link[type][]" value="`+link_type+`">
						<button type="button" class="btn btn-sm btn-danger remove-menu-item"><i class="fa fa-trash"></i></button>
						</td>
						</tr>
						`);
				} else {
					Swal.fire({
						icon: 'warning',
						text: '<?= __('admin.link_title_and_url_are_mandatory') ?>'
					});
				}
			});

			$(document).on('click', '.remove-menu-item', function(){
				$(this).parent().parent().remove();
			});

			$(document).on('click', '.remove-footer-menu', function(){
				$(this).parent().parent().remove();
			});

			$(document).on('click', '.remove-custom-page', function(){
				$(this).parent().parent().remove();
				$("#setting-form").append('<input type="hidden" name="return" value="footer_menu"/>');
			});

			$(document).on('click', '.btn-custom-page-modal-form', function(){
				let modal = $('.custom-page-modal');
				modal.find('#cp_index').val(($('#custom_page_list tr:not(.empty)').length+1));
				modal.find('#cp_title').val('');
				modal.find('#cp_image').val('');
				modal.find('#cp_meta_id').val('');
				modal.find('input[name="store_cpimage"]').val('');
				modal.find('#store_cpimage_container').attr('src', '<?= base_url('assets/store/default/img/banner.png'); ?>');
				modal.find('#cp_content').val('');
				modal.find('.summernote').summernote('code', '');
				modal.modal('show');
			});

			$(document).on('click', '.btn-custom-page-modal-form-edit', function(){
				let data = $(this).parent();
				let modal = $('.custom-page-modal');
				modal.find('#cp_index').val(data.find('input[name="store[custom_page][index][]"]').val());
				modal.find('#cp_title').val(data.find('input[name="store[custom_page][title][]"]').val());
				modal.find('#cp_image').val(data.find('input[name="store[custom_page][image][]"]').val());
				modal.find('#cp_meta_id').val(data.find('input[name="store[custom_page][meta_id][]"]').val());
				modal.find('input[name="store_cpimage"]').val('');
				modal.find('#store_cpimage_container').attr('src', $(this).parent().parent().find('img').attr('src'));
				modal.find('#cp_content').val(data.find('input[name="store[custom_page][content][]"]').val());
				modal.find('.summernote').summernote('code', data.find('textarea[name="store[custom_page][content][]"]').val());
				modal.modal('show');
			});

			$(document).on('change', '.custom-page-modal input[name="store_cpimage"]', function() {
				read_url(this,'store_cpimage_container');
			});

			$(document).on('click', '#custom-page-submit', function(){
				let modal = $('.custom-page-modal');
				let image_src = $('#store_cpimage_container').attr('src');

				if(modal.find('#cp_title').val() == null || modal.find('#cp_title').val() == "") {
					Swal.fire({
						icon: 'warning',
						text: '<?= __('admin.page_title_should_not_be_empty') ?>'
					});
				} else {
					let page_slug = convertToSlug(modal.find('#cp_title').val());
					let pagelist = $('#custom_page_list');
					let duplicateSlug = false;

					pagelist.find('tr').each(function(index){
						$(this).find("input[name='store[custom_page][edited][]']").val(0);

						if($(this).find("input[name='store[custom_page][slug][]']").val() == page_slug && $(this).find("input[name='store[custom_page][index][]']").val() != modal.find('#cp_index').val()) {
							Swal.fire({
								icon: 'warning',
								text: '<?= __('admin.duplicate_title_name_available_please_change_it') ?>'
							});
							duplicateSlug = true;
						};
					});

					if(duplicateSlug == false) {
						let new_row = `<tr>
						<td scope="row">`+modal.find('#cp_title').val()+`</td>
						<td scope="row">`+page_slug+`</td>
						<td style="width: 200px;"><img style="width: 100px; height: 50px;" src="`+image_src+`" class='img-responsive'></td>
						<td style="width: 87px; padding: 5px 0px !important;">
						<input type="hidden" name="store[custom_page][edited][]" value="1">
						<input type="hidden" name="store[custom_page][index][]" value="`+modal.find('#cp_index').val()+`">
						<input type="hidden" name="store[custom_page][title][]" value="`+modal.find('#cp_title').val()+`">
						<input type="hidden" name="store[custom_page][slug][]" value="`+page_slug+`">
						<input type="hidden" name="store[custom_page][image][]" value="`+modal.find('#cp_image').val()+`">
						<input type="hidden" name="store[custom_page][meta_id][]" value="`+modal.find('#cp_meta_id').val()+`">
						<textarea name="store[custom_page][content][]" style="display:none">`+modal.find('.summernote').summernote('code')+`</textarea>
						<button type="button" class="btn btn-primary btn-custom-page-modal-form-edit"><i class="fa fa-pencil"></i></button>
						<button type="button" class="btn btn-danger remove-custom-page"><i class="fa fa-trash"></i></button>
						</td>
						</tr>`;

						$('#custom_page_list tr:nth-child('+(modal.find('#cp_index').val())+')').remove();

						if(modal.find('#cp_index').val() > $('#custom_page_list tr:not(.empty)').length) {
							$('#custom_page_list').append(new_row);
						} else {
							$('#custom_page_list tr:nth-child('+(modal.find('#cp_index').val())+')').before(new_row);
						}
						submit_store_setting({name:'return', value:'custom_page'});
						$("#custom-page-submit").btn("loading");
					}
				}
			});

			$(document).on('click', '.btn-footer-menu-form-modal', function(){
				let modal = $('.footer-menu-form-modal');
				modal.find('input[name="fm_index"]').val(($('#footer_menu_list tr:not(.empty)').length+1));
				modal.find('input[name="fm_title"]').val('');
				modal.find('input[name="fm_type"]').val('').trigger('change');
				$('#menu_items_list tbody').empty();
				modal.modal('show');
			});

			$(document).on('click', '.btn-footer-menu-form-modal-edit', function(){
				let data = $(this).parent();
				let letpreIndex = $(this).data('letpreindex');

				let modal = $('.footer-menu-form-modal');
				modal.find('input[name="fm_index"]').val(data.find('input[name="store[footer_menu][index]['+letpreIndex+']"]').val());
				modal.find('input[name="fm_title"]').val(data.find('input[name="store[footer_menu][title]['+letpreIndex+']"]').val());

				titles = [];
				data.find('input[name="store[footer_menu][links]['+letpreIndex+'][title][]"]').each(function(index) {
					titles.push($(this).val());
				});

				urls = [];
				data.find('input[name="store[footer_menu][links]['+letpreIndex+'][url][]"]').each(function(index) {
					urls.push($(this).val());
				});

				types = [];
				data.find('input[name="store[footer_menu][links]['+letpreIndex+'][type][]"]').each(function(index) {
					types.push($(this).val());
				});

				$('#menu_items_list tbody').empty();

				for (let index = 0; index < titles.length; index++) {
					$('#menu_items_list tbody').append(`<tr>
						<td scope="row">`+titles[index]+`</td>
						<td scope="row">`+urls[index]+`</td>
						<td style="width: 50px;">
						<input type="hidden" name="fm_link[title][]" value="`+titles[index]+`">
						<input type="hidden" name="fm_link[url][]" value="`+urls[index]+`">
						<input type="hidden" name="fm_link[type][]" value="`+types[index]+`">
						<button type="button" class="btn btn-sm btn-danger remove-menu-item"><i class="fa fa-trash"></i></button>
						</td>
						</tr>
						`);
				}
				modal.modal('show');
			});

			$(document).on('click', '#footer-menu-form-submit', function(){
				let modal = $('.footer-menu-form-modal');
				let menu_title = modal.find('input[name="fm_title"]').val();
				if(menu_title != "" && menu_title != null) {
					let titles = [];
					modal.find('input[name="fm_link[title][]"]').each(function(index) {
						titles.push($(this).val());
					});

					letpreIndex = modal.find('input[name="fm_index"]').val() - 1;

					let new_row = `<tr><td scope="row">`+modal.find('input[name="fm_index"]').val()+`</td><td scope="row">`+modal.find('input[name="fm_title"]').val()+`</td><td scope="row">`+titles.join()+`</td><td style="width: 87px; padding: 5px 0px !important;"><input type="hidden" name="store[footer_menu][index][`+letpreIndex+`]" value="`+modal.find('input[name="fm_index"]').val()+`"><input type="hidden" name="store[footer_menu][title][`+letpreIndex+`]" value="`+modal.find('input[name="fm_title"]').val()+`">`;

					modal.find('input[name="fm_link[title][]"]').each(function( index ) {
						new_row += `<input type="hidden" name="store[footer_menu][links][`+letpreIndex+`][title][]" value="`+$(this).val()+`">`;
					});

					modal.find('input[name="fm_link[url][]"]').each(function( index ) {
						new_row += `<input type="hidden" name="store[footer_menu][links][`+letpreIndex+`][url][]" value="`+$(this).val()+`">`;
					});

					modal.find('input[name="fm_link[type][]"]').each(function( index ) {
						new_row += `<input type="hidden" name="store[footer_menu][links][`+letpreIndex+`][type][]" value="`+$(this).val()+`">`;
					});

					new_row += `<button data-letpreindex="`+letpreIndex+`" type="button" class="btn btn-primary btn-footer-menu-form-modal-edit"><i class="fa fa-pencil"></i></button>
					<button type="button" class="btn btn-danger remove-footer-menu"><i class="fa fa-trash"></i></button>
					</td>
					</tr>`;

					$('#footer_menu_list tr:nth-child('+(modal.find('input[name="fm_index"]').val())+')').remove();

					if(modal.find('input[name="fm_index"]').val() > $('#footer_menu_list tr:not(.empty)').length) {
						$('#footer_menu_list').append(new_row);
					} else {
						$('#footer_menu_list tr:nth-child('+(modal.find('input[name="fm_index"]').val())+')').before(new_row);
					}

					submit_store_setting({name:'return', value:'footer_menu'});
					$("#footer-menu-form-submit").btn("loading");
				} else {
					Swal.fire({
						icon: 'warning',
						text: '<?= __('admin.menu_title_should_not_be_empty') ?>'
					});
				}
			});

			$(document).on('click', '.btn-social-links-form', function(){
				let modal = $('.social-links-modal');
				modal.find('#sl_index').val(($('#social_links_list tr:not(.empty)').length+1));
				modal.find('#sl_title').val('');
				modal.find('#sl_url').val('');
				modal.find('#sl_image').val('');
				modal.find('input[name="store_slicon"]').val('');
				modal.find('#store_slicon_container').attr('src', '<?= base_url('assets/store/default/img/banner.png'); ?>');
				modal.modal('show');
			});

			$(document).on('click', '.btn-social-links-form-edit', function(){
				let data = $(this).parent();
				let modal = $('.social-links-modal');
				modal.find('#sl_index').val(data.find('input[name="store[social_links][index][]"]').val());
				modal.find('#sl_title').val(data.find('input[name="store[social_links][title][]"]').val());
				modal.find('#sl_url').val(data.find('input[name="store[social_links][url][]"]').val());
				modal.find('#sl_image').val(data.find('input[name="store[social_links][image][]"]').val());
				modal.find('input[name="store_slicon"]').val('');
				modal.find('#store_slicon_container').attr('src', $(this).parent().parent().find('img').attr('src'));
				modal.modal('show');
			});

			$(document).on('click', '#social-links-submit', function(){
				let modal = $('.social-links-modal');
				let image_src = $('#store_slicon_container').attr('src');

				if(modal.find('#sl_title').val() == null || modal.find('#sl_title').val() == "") {
					Swal.fire({
						icon: 'warning',
						text: '<?= __('admin.link_title_should_not_be_empty') ?>'
					});
				} else {
					let list = $('#social_links_list');

					list.find('tr').each(function(index){
						$(this).find("input[name='store[social_links][edited][]']").val(0);
					});

					let new_row = `<tr>
					<td scope="row">`+modal.find('#sl_title').val()+`</td>
					<td scope="row">`+modal.find('#sl_url').val()+`</td>
					<td style="width: 200px; text-align:right;">
					<img style="width: 50px; height: 50px; background-color:grey;" src="`+image_src+`" class='img-responsive'>
					</td>
					<td style="width: 87px; padding: 5px 0px !important;">
					<input type="hidden" name="store[social_links][index][]" value="`+modal.find('#sl_index').val()+`">
					<input type="hidden" name="store[social_links][edited][]" value="1">
					<input type="hidden" name="store[social_links][title][]" value="`+modal.find('#sl_title').val()+`">
					<input type="hidden" name="store[social_links][url][]" value="`+modal.find('#sl_url').val()+`">
					<input type="hidden" name="store[social_links][image][]" value="`+modal.find('#sl_image').val()+`">
					<button type="button" class="btn btn-primary btn-social-links-form-edit"><i class="fa fa-pencil"></i></button>
					<button type="button" class="btn btn-danger remove-social-links"><i class="fa fa-trash"></i></button>
					</td>
					</tr>
					`;

					$('#social_links_list tr:nth-child('+(modal.find('#sl_index').val())+')').remove();

					if(modal.find('#sl_index').val() > $('#social_links_list tr:not(.empty)').length) {
						$('#social_links_list').append(new_row);
					} else {
						$('#social_links_list tr:nth-child('+(modal.find('#sl_index').val())+')').before(new_row);
					}
					submit_store_setting({name:'return', value:'social_links'});
					$("#social-links-submit").btn("loading");
				}
			});

			$(document).on('change', '.social-links-modal input[name="store_slicon"]', function() {
				read_url(this,'store_slicon_container');
			});

			$(document).on('click', '.remove-social-links', function(){
				$(this).parent().parent().remove();
				$("#setting-form").append('<input type="hidden" name="return" value="footer_menu"/>');
			});

			function read_url(input,display_id) {
				if (input.files && input.files[0]) {
					var reader = new FileReader();
					reader.onload = function(e) {
						$('#'+display_id).attr('src', e.target.result);
					}

					reader.readAsDataURL(input.files[0]);
				}
			}

			function convertToSlug(Text) {
				return Text.toLowerCase().replace(/ /g,'-').replace(/[^\w-]+/g,'');
			}
			setTimeout(function(){
				$("#store_mode").trigger('change');
			},500);

			$(document).on('change', 'select[name="productsetting[product_commission_type]"]', function() {
				if($(this).val() == 'percentage')
					$("input[name='productsetting[product_commission]']").siblings('.input-group-prepend').find('.input-group-text').text('%');
				else
					$("input[name='productsetting[product_commission]']").siblings('.input-group-prepend').find('.input-group-text').text('<?= $CurrencySymbol ?>');
			});

			$(document).on('change', 'select[name="formsetting[product_commission_type]"]', function() {
				if($(this).val() == 'percentage')
					$("input[name='formsetting[product_commission]']").siblings('.input-group-prepend').find('.input-group-text').text('%');
				else
					$("input[name='formsetting[product_commission]']").siblings('.input-group-prepend').find('.input-group-text').text('<?= $CurrencySymbol ?>');
			});
		</script>