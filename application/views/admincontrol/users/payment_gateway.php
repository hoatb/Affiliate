<div class="row">
	<div class="col-lg-12 col-md-12">
		<?php if($this->session->flashdata('success')){?>
			<div  class="alert alert-success alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<?php echo $this->session->flashdata('success'); ?> </div>
		<?php } ?>
		<?php if($this->session->flashdata('error')){?>
			<div class="alert alert-danger alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<?php echo $this->session->flashdata('error'); ?> </div>
		<?php } ?>
	</div>
</div>

<div class="row">
	<div class="col-12">
		<div class="payment-gateway-uploader">
			<p class="text-center text-help"><?= __('admin.payment_gateway_install_desc') ?> 
				<a href="<?= base_url('admincontrol/payment_gateway_documentation') ?>" target="_blank">
					<?= __('admin.documentation') ?>
				</a>
			</p>
			<div class="contain">
				<div class="div-input">
					<input id="payment-gateway-zip" type="file" name="install">
					<div class="bg-danger px-2 py-1 mb-2 text-left text-light warning d-none"></div>
				</div>
				<div class="div-button">
					<button id="payment-gateway-button" class="btn btn-primary btn-sm" disabled=""><?= __('admin.install_now') ?></button>
				</div>
			</div>
		</div>

		<div class="card payment-gateway">
	    	<div class="card-header">
	    		<h4 class="card-title m-0 pull-left"><?= __('admin.payment_gateways') ?></h4>
	    		<div class="pull-right">
					<button id="toggle-uploader" class="btn btn-outline-primary orange-color btn-sm"><?= __('admin.install_payment_gateway') ?></button>
				</div>
	    	</div>
	    	<div class="card-body p-0 button-change-style">
	    		<div class="mydiv">
	    		<div class="table-responsive btn-part">
		    		<table class="table table-hover table-white-space-normal">
		    			<thead>
		    				<tr>
		    					<th></th>
		    					<th><?= __('admin.title') ?></th>
		    					<th><?= __('admin.method_website') ?></th>
		    					<th><?= __('admin.store') ?></th>
		    					<th><?= __('admin.deposit') ?></th>
		    					<th><?= __('admin.membership') ?></th>
		    					<th class="text-center">#</th>
		    				</tr>
		    			</thead>
		    			<tbody>
			    			<?php foreach($payment_gateways as $key => $payment_gateway){ ?>
				    			<tr <?= ($payment_gateway['name'] == 'opay' || $payment_gateway['name'] == 'paytm') ? 'class="disabled-payment-gateway"' : ''?>>
				    				<td><?= ($payment_gateway['icon']) ? '<img class="w-xs" src="'.base_url($payment_gateway['icon']).'">' : '' ?></td>	
				    				<td><?= $payment_gateway['title'] ?></td>	
				    				<td><?= ($payment_gateway['website']) ? "<a target='_blank' href='".$payment_gateway['website']."'>".$payment_gateway['title'].'</a>' : '' ?>
				    				</td>
				    				<td>
				    					<div class="wallet-status-switch">
											<div class="radio radio-inline">
												<label>
													<input type="radio" class="status-change-rdo" 
														name="status_store_<?= $payment_gateway['name'] ?>" 
														data-config="store" 
														data-method="<?= $payment_gateway['name'] ?>" 
														<?= $payment_gateway['store']['status'] ? '' : 'checked' ?>
														value="0">
													<span><?= __('admin.off_payment') ?></span>
												</label>
											</div>
											<div class="radio radio-inline loading">
											    <img src="<?= base_url('assets/images/switch-loading.svg') ?>">
											</div>
											<div class="radio radio-inline">
												<label>
													<input type="radio" class="status-change-rdo" 
														name="status_store_<?= $payment_gateway['name'] ?>" 
														data-config="store" 
														data-method="<?= $payment_gateway['name'] ?>" 
														<?= $payment_gateway['store']['status'] ? 'checked' : '' ?>
														value="1">
													<span><?= __('admin.on') ?></span>
												</label>
											</div>
											<div class="radio radio-inline">
												<?php $class = ($payment_gateway['store']['setting_is_default']) ? 'active' : '' ?>
												<a href="javascript:void(0);" class="default-button <?= $class ?>" 
													data-name="default_store_<?= $payment_gateway['name'] ?>"
													data-config="store"
													data-method="<?= $payment_gateway['name'] ?>"><i class="fa fa-check-square-o"></i>
												</a>
											</div>
										</div>
			    					</td>
			    					<td>
				    					<div class="wallet-status-switch">
											<div class="radio radio-inline">
												<label>
													<input type="radio" class="status-change-rdo" 
														name="status_deposit_<?= $payment_gateway['name'] ?>"
														data-config="deposit"
														data-method="<?= $payment_gateway['name'] ?>" 
														<?= $payment_gateway['deposit']['status'] ? '' : 'checked' ?> 
														value="0">
													<span><?= __('admin.off_payment') ?></span>
												</label>
											</div>
											<div class="radio radio-inline loading">
											    <img src="<?= base_url('assets/images/switch-loading.svg') ?>">
											</div>
											<div class="radio radio-inline">
												<label>
													<input type="radio" class="status-change-rdo" 
														name="status_deposit_<?= $payment_gateway['name'] ?>"
														data-config="deposit"
														data-method="<?= $payment_gateway['name'] ?>" 
														<?= $payment_gateway['deposit']['status'] ? 'checked' : '' ?> 
														value="1">
													<span><?= __('admin.on') ?></span>
												</label>
											</div>
											<div class="radio radio-inline">
												<?php $class = ($payment_gateway['deposit']['setting_is_default']) ? 'active' : '' ?>
												<a href="javascript:void(0);" class="default-button <?= $class ?>" 
													data-name="default_deposit_<?= $payment_gateway['name'] ?>"
													data-config="deposit"
													data-method="<?= $payment_gateway['name'] ?>"><i class="fa fa-check-square-o"></i>
												</a>
											</div>
										</div>
			    					</td>
			    					<td>
				    					<div class="wallet-status-switch">
											<div class="radio radio-inline">
												<label>
													<input type="radio" class="status-change-rdo" 
														name="status_membership_<?= $payment_gateway['name'] ?>" 
														data-config="membership"
														data-method="<?= $payment_gateway['name'] ?>" 
														<?= $payment_gateway['membership']['status'] ? '' : 'checked' ?> 
														value="0">
													<span><?= __('admin.off_payment') ?></span>
												</label>
											</div>
											<div class="radio radio-inline loading">
											    <img src="<?= base_url('assets/images/switch-loading.svg') ?>">
											</div>
											<div class="radio radio-inline">
												<label>
													<input type="radio" class="status-change-rdo" 
														name="status_membership_<?= $payment_gateway['name'] ?>" 
														data-config="membership"
														data-method="<?= $payment_gateway['name'] ?>" 
														<?= $payment_gateway['membership']['status'] ? 'checked' : '' ?> 
														value="1">
													<span><?= __('admin.on') ?></span>
												</label>
											</div>
											<div class="radio radio-inline">
												<?php $class = ($payment_gateway['membership']['setting_is_default']) ? 'active' : '' ?>
												<a href="javascript:void(0);" class="default-button <?= $class ?>" 
													data-name="default_membership_<?= $payment_gateway['name'] ?>"
													data-config="membership"
													data-method="<?= $payment_gateway['name'] ?>"><i class="fa fa-check-square-o"></i>
												</a>
											</div>
										</div>
			    					</td>
				    				<td class="w-lg text-center">
				    					<a class="btn btn-primary btn-sm btn-edit-payment-gateway" href="<?= base_url('admincontrol/payment_gateway_edit/'.$payment_gateway['name']) ?>" data-method="<?= $payment_gateway['name'] ?>">
				    						<?= __('admin.edit') ?>
				    					</a>

				    					<a class="btn btn-sm btn-<?= ($payment_gateway['is_install'] == 1) ? 'danger' : 'success' ?> btn-install-payment-gateway"
				    						href="<?= base_url('admincontrol/payment_gateway_status_change/'. $payment_gateway['name']) ?>" data-method="<?= $payment_gateway['name'] ?>"
				    						onclick="return confirm('<?= __('admin.are_you_sure') ?>')"  >
				    						<?= ($payment_gateway['is_install'] == 1) ? __('admin.uninstall') : __('admin.install') ?>
				    					</a>

				    					<?php if(!in_array($payment_gateway['name'],$payment_method)){ ?>
				    						<a class="btn btn-sm btn-danger" 
												href="<?= base_url('admincontrol/delete_payment_gateway/'.$payment_gateway['name']) ?>"
												onclick="return confirm('<?= __('admin.are_you_sure') ?>')">
												<?= __('admin.delete') ?>
											</a>
				    					<?php } ?>
				    				</td>	
				    			</tr>
			    			<?php } ?>
		    			</tbody>
		    		</table>
	    		</div>
	    		</div>
	    	</div>
		</div>    
	</div>
</div>

<script src="<?= base_url('assets/plugins/datatable') ?>/moment.js"></script>
<script type="text/javascript">
	$(document).on('ready',function() {
		let last_pill = localStorage.getItem("last_pill");
		if(last_pill){ $('[href="'+ last_pill +'"]').click() }
	});

	$("#toggle-uploader").on("click",function(){
		$(".payment-gateway-uploader").slideToggle();
	})

	$("#payment-gateway-zip").on("change",function(){
		if($(this).val() == ''){
			$("#payment-gateway-button").prop("disabled",1)
		} else{
			$("#payment-gateway-button").prop("disabled",0)
		}
	})

	$("#payment-gateway-button").on("click", function(evt){
		evt.preventDefault();
        $btn = $(this);

        $(".payment-gateway-uploader .warning").addClass('d-none');

        var formData = new FormData();
        formData.append("install", $("#payment-gateway-zip")[0].files[0]);
       	$btn.btn("loading");
        
        $.ajax({
            url:'<?= base_url('admincontrol/payment_gateway_install') ?>',
            type:'POST',
            dataType:'json',
            cache:false,
            contentType: false,
            processData: false,
            data:formData,
            error:function(){ $btn.btn("reset"); },
            success:function(result){            	
            	$btn.btn("reset");
                if(result['location']){
                    window.location.reload();
                }
                if(result['warning']){
                    $(".payment-gateway-uploader .warning").html(result['warning']);
                    $(".payment-gateway-uploader .warning").removeClass('d-none');
                }
            },
        });
	})

	$(document).delegate(".btn-deletes",'click',function(){
		$this = $(this);

		Swal.fire({
			title: '<?= __('admin.are_you_sure') ?>',
			text: '<?= __('admin.comission_will_revert_back_to_user_wallet') ?>',
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: '<?= __('admin.yes_revert') ?>'
		}).then((result) => {
			if (result.value) {
				var ids = $(".wallet-checkbox:checked").map(function(){ return $(this).val() }).toArray();

				$this = $(this);
				$.ajax({
					type:'POST',
					dataType:'json',
					data:{delete_request: true,id:$this.data("id")},
					beforeSend:function(){ $this.btn("loading"); },
					complete:function(){ $this.btn("reset"); },
					success:function(json){
						if (json['error']) {
							Swal.fire("Error", json['error'], "error");
						}
						if (json['success']) {
							$this.parents("tr").remove();
							Swal.fire({
								title: '<?= __('admin.success') ?>',
								text: '<?= __('admin.comission_is_reverted_back_to_user_wallet') ?>',
								icon: 'success',
							}).then((result) => {
							})
						}
					},
				})
			}
		})
	});

	$(".status-change-rdo").on('change',function(){
		$this = $(this);
		$loading = $this.parents(".wallet-status-switch").find(".loading");
		
		if($this.data('method') != 'opay' && $this.data('method') != 'paytm'){
			$.ajax({
				type:'POST',
				dataType:'json',
				data:{
						action : 'status',
						config : $this.data('config'),
						method : $this.data('method'),
						value : $this.val()
					},
				beforeSend:function(){$loading.show();},
				complete:function(){$loading.hide();},
				success:function(json){
				},
			})
		} else {
			let name = $(this).attr('name');
			$('input[name="' + name + '"][value="1"]').prop('checked',false);
			$('input[name="' + name + '"][value="0"]').prop('checked',true);

			Swal.fire({
				text: '<?= __('admin.payment_method_not_available') ?>',
				icon: 'warning',
				confirmButtonColor: '#3085d6',
				confirmButtonText: '<?= __('admin.ok') ?>'
			})
		}
	});

	$(".default-button").on('click',function(){
		$this = $(this);

		if($this.data('method') != 'opay' && $this.data('method') != 'paytm'){
			let activeGateway = $this.parents('.wallet-status-switch').find('input:checked').val();
			if(activeGateway == 1 && !$this.hasClass('active')){
				$.ajax({
					type:'POST',
					dataType:'json',
					data:{
							action : 'default',
							config : $this.data('config'),
							method : $this.data('method'),
							value : 1
						},
					success:function(json){
						if(json.result){
							$(".wallet-status-switch .default-button[data-config='"+$this.data('config')+"']").removeClass('active');
							$this.addClass('active');
						}
					},
				})
			}
		} else {
			$(this).removeClass('active');

			Swal.fire({
				text: '<?= __('admin.payment_method_not_available') ?>',
				icon: 'warning',
				confirmButtonColor: '#3085d6',
				confirmButtonText: '<?= __('admin.ok') ?>'
			})
		}
	});

	$('.btn-edit-payment-gateway').on('click',function(e){
		e.preventDefault();

		if($(this).data('method') != 'opay' && $(this).data('method') != 'paytm'){
			window.location.href = $(this).attr('href');
		} else {
			Swal.fire({
				text: '<?= __('admin.payment_method_not_available') ?>',
				icon: 'warning',
				confirmButtonColor: '#3085d6',
				confirmButtonText: '<?= __('admin.ok') ?>'
			})
		}
	})

	$('.btn-install-payment-gateway').on('click',function(e){
		e.preventDefault();

		if($(this).data('method') != 'opay' && $(this).data('method') != 'paytm'){
			window.location.href = $(this).attr('href');
		} else {
			Swal.fire({
				text: '<?= __('admin.payment_method_not_available') ?>',
				icon: 'warning',
				confirmButtonColor: '#3085d6',
				confirmButtonText: '<?= __('admin.ok') ?>'
			})
		}
	})

</script>