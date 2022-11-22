<div class="card">
	<div class="card-header">
		<?php include 'setting_menu.php'; ?>
	</div>
	<div class="card-body">
		<form class="form-horizontal" method="post" action="" enctype="multipart/form-data" id="setting-form">
			<div class="row">
				<div class="col-sm-12 alerts-box">
					<?php if($this->session->flashdata('success')){?>
						<div class="alert alert-success alert-dismissable"> <?php echo $this->session->flashdata('success'); ?> </div>
					<?php } ?>
				</div>
				<div class="col-sm-12">
					<div class="form-group">
						<label class="control-label"><?= __('user.default_action_status') ?></label>
						<select class="form-control" name="referlevel[default_action_status]">
							<option value="0" <?= (int)$referlevel['default_action_status'] == 0 ? 'selected' : '' ?>><?= __('user.on_hold') ?></option>
							<option value="1" <?= (int)$referlevel['default_action_status'] == 1 ? 'selected' : '' ?>><?= __('user.in_wallet') ?></option>
						</select>
					</div>
					<div class="form-group">
						<label class="control-label"><?= __('user.default_external_order_status') ?></label>
						<select class="form-control" name="referlevel[default_external_order_status]">
							<option value="0" <?= (int)$referlevel['default_external_order_status'] == 0 ? 'selected' : '' ?>><?= __('user.on_hold') ?></option>
							<option value="1" <?= (int)$referlevel['default_external_order_status'] == 1 ? 'selected' : '' ?>><?= __('user.in_wallet') ?></option>
						</select>
					</div>
				</div>
				<div class="col-sm-12 text-right">
					<button type="submit" class="btn btn-sm btn-primary btn-submit"><?= __('user.save_settings') ?></button>
				</div>
			</div>
		</form>
	</div>
</div>
<script type="text/javascript">
	$(".btn-submit").on('click',function(evt){
	    evt.preventDefault();
	    var formData = new FormData($("#setting-form")[0]);

	    $(".btn-submit").btn("loading");
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
	            $this.find("span.text-danger").remove();
	            
	            if(result['location']){
	                window.location = result['location'];
	            }

	            if(result['success']){
	                $(".alerts-box").prepend('<div class="alert mt-4 alert-info alert-dismissable">'+ result['success'] +'</div>');
	                var body = $("html, body");
					body.stop().animate({scrollTop:0}, 500, 'swing', function() { });
	            }

	            if(result['errors']){
	                $.each(result['errors'], function(i,j){
	                    $ele = $this.find('[name="'+ i +'"]');
	                    if($ele){
	                        $ele.parents(".form-group").addClass("has-error");
	                        $ele.after("<span class='d-block text-danger'>"+ j +"</span>");
	                    }
	                });
	            }
	        },
	    })
	    return false;
	});

</script>
