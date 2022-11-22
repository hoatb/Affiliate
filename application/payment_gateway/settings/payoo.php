<h2>PayooSetting</h2>
<div class="form-group">
	<label class="control-label"><span data-toggle="tooltip" title="" data-original-title="merchant's Id">Merchant's Id</span></label>
	<input class="form-control" name="store_id" value="<?= $setting_data['store_id'] ?>">
</div>

<!-- <div class="form-group">
	<label class="control-label"><span data-toggle="tooltip" title="" data-original-title="Allow skipping internal page">Order retrieve payment success</span></label><br/>
	<input type="radio" id="is_payment_on_website" name="is_payment_on_website" value="true" <?php // echo $setting_data['is_payment_on_website'] == 'true' ?  "checked" : "" ;  ?>>
	<label for="html">Cho phép</label><br>
	<input type="radio" id="is_payment_on_website" name="is_payment_on_website" value="false" <?php // echo $setting_data['is_payment_on_website']  == 'false' ?  "checked" : "" ;  ?>>
	<label for="css">Không cho phép</label><br>
</div> -->

<div class="form-group">
	<label class="control-label"><span data-toggle="tooltip" title="" data-original-title="Order status that will set for retrieve payment success">Order retrieve payment success</span></label>
	<select name="order_retrieved_success_status_id" class="form-control">
		<?php foreach ($order_status as $order_status_id => $name){ 
				if(isset($setting_data['order_retrieved_success_status_id']))
					$selected = ($order_status_id == $setting_data['order_retrieved_success_status_id']) ? 'selected' : '';
				else 
					$selected = ($order_status_id == 1) ? 'selected' : ''; ?>
				
				<option <?= $selected ?>  value="<?= $order_status_id; ?>"><?= $name ?></option>
		<?php } ?>
	</select>
</div>

<div class="form-group">
	<label class="control-label"><span data-toggle="tooltip" title="" data-original-title="Order status that will set for Successful Payment">Order Success Status</span></label>
	<select name="order_success_status_id" class="form-control">
		<?php foreach ($order_status as $order_status_id => $name){ 
				if(isset($setting_data['order_success_status_id']))
					$selected = ($order_status_id == $setting_data['order_success_status_id']) ? 'selected' : '';
				else 
					$selected = ($order_status_id == 1) ? 'selected' : ''; ?>
				
				<option <?= $selected ?>  value="<?= $order_status_id; ?>"><?= $name ?></option>
		<?php } ?>
	</select>
</div>

<div class="form-group">
	<label class="control-label"><span data-toggle="tooltip" title="" data-original-title="Order status that will set for Failed Payment" aria-describedby="tooltip372536">Order Failed Status</span></label>
	<select name="order_failed_status_id" class="form-control">
		<?php foreach ($order_status as $order_status_id => $name){ 
				if(isset($setting_data['order_failed_status_id']))
					$selected = ($order_status_id == $setting_data['order_failed_status_id']) ? 'selected' : '';
				else 
					$selected = ($order_status_id == 5) ? 'selected' : ''; ?>
				
				<option <?= $selected ?>  value="<?= $order_status_id; ?>"><?= $name ?></option>
		<?php } ?>
	</select>
</div>