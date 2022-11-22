<div class="clearfix"></div>
<br>
<div class="card">
	<div class="card-header">
		<h4 class="card-title">Orders</h4>
		<div class="row">
			<div class="col-sm-4">
				<div class="form-group">
					<label class="control-label"><?= __('user.status') ?></label>
					<select class="form-control filter_status">
						<option value=""><?= __('user.all'); ?></option>
						<?php foreach ($status as $key => $value) { ?>
							<option value="<?= $key ?>">
								<?php   
									if ($value == 'Received') {
										echo __('user.received');
									}elseif ($value == 'Complete') {
										echo __('user.complete');
									}elseif ($value == 'Total not match') {
										echo __('user.total_not_match');
									}elseif ($value == 'Denied') {
										echo __('user.denied');
									}elseif ($value == 'Expired') {
										echo __('user.expired');
									}elseif ($value == 'Failed') {
										echo __('user.failed');
									}elseif ($value == 'Processed') {
										echo __('user.processed');
									}elseif ($value == 'Refunded') {
										echo __('user.refunded');
									}elseif ($value == 'Reversed') {
										echo __('user.reversed');
									}elseif ($value == 'Voided') {
										echo __('user.voided');
									}elseif ($value == 'Canceled Reversal') {
										echo __('user.cancel_reversal');
									}elseif ($value == 'Waiting For Payment') {
										echo __('user.waiting_for_payment');
									}elseif ($value == 'Pending') {
										echo __('user.pending');
									}else{
										echo $value;
									}
								?>
							</option>
						<?php } ?>
					</select>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="form-group">
					<label class="control-label d-block">&nbsp;</label>
					<button class="btn btn-primary" onclick="getPage(1,this)"><?= __('user.search') ?></button>
				</div>
			</div>
		</div>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table orders-table">
				<thead>
					<tr>
						<th width="80px">#</th>
						<th width="80px"><?= __('user.order_id') ?></th>
						<th><?= __('user.total') ?></th>
						<th><?= __('user.country') ?></th>
						<th><?= __('user.store') ?></th>
						<th><?= __('user.status') ?></th>
						<th><?= __('user.commission') ?></th>
						<th><?= __('user.commission_status') ?></th>
						<th><?= __('user.date') ?></th>
					</tr>
				</thead>
				<tbody></tbody>
			</table>
		</div>
	</div>
	<div class="card-footer text-right" style="display: none;"> <div class="pagination"></div> </div>
</div>

<script type="text/javascript">
	 $(".orders-table").delegate(".toggle-child-tr","click",function(){
        $tr = $(this).parents("tr");
        $ntr = $tr.next("tr.detail-tr");

        if($ntr.css("display") == 'table-row'){
            $ntr.hide();
            $(this).find("i").attr("class","fa fa-plus");
        }else{
            $(this).find("i").attr("class","fa fa-minus");
            $ntr.show();
        }
    })
    
	function getPage(page,t) {
		$this = $(t);
		var data ={
			page:page,
			filter_status:$(".filter_status").val()
		}
		$.ajax({
			url:'<?= base_url("usercontrol/store_orders") ?>/' + page,
			type:'POST',
			dataType:'json',
			data:data,
			beforeSend:function(){$this.btn("loading");},
			complete:function(){$this.btn("reset");},
			success:function(json){
				$(".orders-table tbody").html(json['html']);
				$(".card-footer").hide();
				
				if(json['pagination']){
					$(".card-footer").show();
					$(".card-footer .pagination").html(json['pagination'])
				}
			},
		})
	}

	$(".card-footer .pagination").delegate("a","click", function(e){
		e.preventDefault();
		getPage($(this).attr("data-ci-pagination-page"),$(this));
	})

	getPage(1)
</script>