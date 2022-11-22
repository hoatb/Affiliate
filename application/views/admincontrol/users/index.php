<style type="text/css">
	.user-table .accordian-body .row div {
		white-space: normal !important;
	}
</style>

<div class="modal fade" id="importUsersModel" role="dialog">

	<div class="modal-dialog modal-sm">

		<div class="modal-content">

			<div class="modal-header">

				<h4 class="modal-title"><?= __('admin.import_users') ?></h4>

				<button type="button" class="close btn-close" data-dismiss="modal">&times;</button>

				<a href="" class="close hidden-close d-none">&times;</a>

			</div>

			<div class="modal-body">

				<form id="import_form">

					<label class="file">

						<input name="import_control" type="file" id="import_control" aria-label="File browser example">

						<span class="file-custom"></span>

					</label>

				</form>



				<div id="import-status"></div>

				<div id="import-log"></div>

			</div>

			<div class="modal-footer">

				<button type="button" class="btn btn-default btn-close" data-dismiss="modal"><?= __('admin.close') ?></button>

				<a href="" class="btn btn-default hidden-close d-none"><?= __('admin.close') ?></a>

				<button type="button" class="btn btn-default btn_import_data" data-dismiss="modal"><?= __('admin.upload') ?></button>

			</div>

		</div>

	</div>

</div>



<div class="row">

	<div class="col-12">

		<div class="card">

			<div class="card m-b-30">

				<div class="card-body">

					<?php print_message($this); ?>

					<div class="approvals-status-alert alert <?= ($approvals_status['status']) ? "alert-success" : "alert-danger" ;?>" role="alert" style="display: none;"></div>

					<form id="search-form">
						<div class="row">
							<div class="col-sm-3">
								<div class="form-group">
									<label class="control-label"><?= __('admin.name') ?></label>
									<input type="search" name="name" class="form-control">
								</div>
							</div>

							<div class="col-sm-3">
								<div class="form-group">
									<label class="control-label"><?= __('admin.email') ?></label>
									<input type="search" name="email" class="form-control">
								</div>
							</div>
							<div class="col-sm-3">
								<div class="form-group">
									<label class="control-label"><?= __('admin.groups') ?></label>
									<select class="form-control select2" name="groups[]" multiple="multiple">
										<?php foreach ($user_groups as $key => $group) { ?>
											<option value="<?= $group->id ?>">
												<?= $group->group_name ?>
											</option>
										<?php } ?>
									</select>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="form-group">
									<label class="control-label d-block">&nbsp;</label>
									<div>
										<div class="btn-group mb-1 d-inline-block btn-group-md" role="group" aria-label="Export/Import Users">
											<a class="btn btn-primary" href="<?php echo base_url("admincontrol/addusers") ?>"><?= __('admin.add_affiliate') ?></a>
											<button type="button" class="btn btn-dark export-excel" > <i class="fa fa-file-excel-o"></i> <?= __('admin.export') ?></button>
											<button type="button" class="btn btn-info import-excel" data-toggle="modal" data-target="#importUsersModel"> <i class="fa fa-file-excel-o"></i> <?= __('admin.import') ?></button>
										</div>
										<div class="btn-group mb-1 d-inline-block btn-group-md delete-multiple-container">
											<button class="btn btn-danger delete-multiple" type="button"><?= __('admin.delete_selected') ?><span class="selected-count"></span></button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</form>



					<div class="selection-message">
						<?= __('admin.all') ?> <span class="selected-count"></span> <?= __('admin.users_on_this_page_are_selected') ?> <a href="javascript:void(0)" class="select-all-users"><?= __('admin.select_all') ?> <span class="total-user"></span> <?= __('admin.users') ?> </a> <a href="javascript:void(0)" class="clear-selection"><?= __('admin.clear_selection') ?></a>
					</div>

					<div class="dimmer">

						<div class="loader"></div>

						<div class="dimmer-content">

							<div class="table-rep-plugin user-block-right">

								<div class="table-responsive b-0" data-pattern="priority-columns">
									<div class="table-header-menus">
										<p class="p-2 mb-0 lead user-approvals-filer">
											<?php if($approvals_count['total'] > 0) { ?>
												<a class="badge <?= (!isset($_GET['apr']) || $_GET['apr'] == 'all') ? 'badge-primary' : 'badge-default' ?>" data-apr="all" href="javascript:void(0);">show all users (<?= $approvals_count['total']; ?>)</a>
											<?php } ?>
											<?php if($approvals_count['pending'] > 0 || $approvals_count['declined'] > 0) { ?>
												<?php if($approvals_count['approved'] > 0) { ?>
													<a class="badge <?= (isset($_GET['apr']) && $_GET['apr'] == 'approved') ? 'badge-primary' : 'badge-default' ?>" data-apr="approved" href="javascript:void(0);">show approved users (<?= $approvals_count['approved']; ?>)</a>
												<?php } ?>
												<?php if($approvals_count['pending'] > 0) { ?>
													<a class="badge <?= (isset($_GET['apr']) && $_GET['apr'] == 'pending') ? 'badge-primary' : 'badge-default' ?>" data-apr="pending" href="javascript:void(0);">show pending approvals (<?= $approvals_count['pending'] ?>)</a>
												<?php } ?>
												<?php if($approvals_count['declined'] > 0) { ?>
													<a class="badge <?= (isset($_GET['apr']) && $_GET['apr'] == 'declined') ? 'badge-primary' : 'badge-default' ?>" data-apr="declined" href="javascript:void(0);"> show declined approvals (<?= $approvals_count['declined'] ?>)</a>
												<?php } ?>
											<?php } ?>	
											<div class="multi-approve-decline">
												<a href="javascript:void(0)" class="text-success approved-decline-action" data-action-value="1">Approved</a> / <a href="javascript:void(0)" class="text-danger approved-decline-action" data-action-value="2">Decline</a>
											</div>
										</p>
									</div>

									<table id="tech-companies-1" class="table table-hover user-table">
										<thead class="thead-light">
											<tr>
												<th><input type="checkbox" class="selectall-wallet-checkbox"></th>
												<th><?= __('admin.user_details') ?></th>
												<th><?= __('admin.user_level') ?></th>
												<th><?= __('admin.membership_details') ?></th>
												<th><?= __('admin.plan_status') ?></th>
												<th><?= __('admin.country')?></th>
												<th><?= __('admin.groups') ?></th>
											    <th><?= __('admin.vendor')?></th>
												<th><?= __('admin.reffered_by') ?></th> 
											    <th><?= __('admin.action')?></th>
										  	</tr>
										</thead> 

										<tbody></tbody>

										<tfoot>
											<tr>
												<td colspan="100%" class="text-right">
													<div class="pagination"></div>
												</td>
											</tr>
										</tfoot>

									</table>

								</div>

							</div>

					</div>

				</div>



			</div>

		</div>

	</div>

</div>

</div>

<div class="modal fade" id="modal-delete">

	<div class="modal-dialog">

		<div class="modal-content">

			<div class="modal-body">

				<div id="message"></div>

				<hr>

				<div>

					<div class="checkbox">

						<label>

							<input type="checkbox" value="delete_transaction" id="delete_transaction">

							<?= __('admin.delete_all_transaction_or_commission') ?>	

						</label>

					</div>

				</div>

			</div>

			<div class="modal-footer">

				<button type="button" class="btn btn-default" data-dismiss="modal"><?= __('admin.cancel') ?></button>

				<button type="button" class="btn btn-primary confirm-delete" data-id="0"><?= __('admin.delete') ?></button>

			</div>

		</div>

	</div>

</div>



<div class="modal fade" id="modal-tree">

	<div class="modal-dialog modal-lg">

		<div class="modal-content">

			<div class="modal-body"></div>

			<div class="modal-footer">

				<button type="button" class="btn btn-default" data-dismiss="modal"><?= __('admin.close') ?></button>

			</div>

		</div>

	</div>

</div>



<script src="<?= base_url('assets/plugins/tree') ?>/jquery-ui-1.10.4.custom.min.js"></script>

<script src="<?= base_url('assets/plugins/tree') ?>/jquery.tabelizer.js"></script>

<link href="<?= base_url('assets/plugins/tree') ?>/tabelizer.min.css?v=<?= av() ?>" media="all" rel="stylesheet" type="text/css" />



<script type="text/javascript" async="">


	$(document).on('click', '.btn-login-aff', function(){
		$.post('<?= base_url('admincontrol/doLoginAff') ?>', {id:$(this).data('id')}, function(result) {
			if(result == 'success') {
				window.open('<?= base_url('usercontrol/dashboard') ?>', '_blank');
			}
		})
	})


	$(document).on('click', '.user-approvals-filer a', function(){
		$('.user-approvals-filer a.badge-primary').addClass('badge-default').removeClass('badge-primary');
		$(this).removeClass('badge-default').addClass('badge-primary');
		getPage(1);
	});

	$(document).on('click', 'a[data-approval-change]', function(){
		if(xhr && xhr.readyState != 4) xhr.abort();
		data = {};
		let status = ($(this).data('approval-change') == 1) ? 'approve_users' : 'decline_users'
		data['action'] = "process_approval";
		data[status] = [$(this).data('user-id')];
		xhr = $.ajax({
			type:'POST',
			dataType:'json',
			data: data,
			beforeSend:function(){
				$(".dimmer").addClass("active");
			},
			complete:function(){
				$(".dimmer").removeClass("active");
			},
			success:function(response){
				if(response.approvals_status.status) {
					$('.approvals-status-alert').removeClass('alert-danger');
					$('.approvals-status-alert').addClass('alert-success');
					$('.approvals-status-alert').text(response.approvals_status.message);
				} else {
					$('.approvals-status-alert').addClass('alert-danger');
					$('.approvals-status-alert').removeClass('alert-success');
					$('.approvals-status-alert').text(response.approvals_status.message);
				}
				$('.approvals-status-alert').show();
				setTimeout(function(){ $('.approvals-status-alert').hide(); }, 3000);
				reloadApprovalFilter(response.approvals_count)
				getPage(1, response.approvals_count);
			}
		});
	});

	var selected = {};

	var all_ids = [];

	$('.clear-selection').on('click',function(){

		selected = {};

		$(".selection-message").addClass('d-none');

		$('.selectall-wallet-checkbox').prop("checked",0);

		changeViews();

	});



	function changeViews() {

		$(".wallet-checkbox").prop("checked",  false);



		if(Object.keys(selected).length == 0){

			$(".selection-message").addClass('d-none');

		} else {

			$(".selection-message").removeClass('d-none');

			$(".selected-count").text(Object.keys(selected).length);

		}



		$(".select-all-users").show();

		if(Object.keys(selected).length == all_ids.length){

			$(".select-all-users").hide();

		}



		$.each(selected, function(i,j){

			$('.wallet-checkbox[value="'+ j +'"]').prop("checked",true);

		})



		if(Object.keys(selected).length == 0){

			$(".delete-multiple").hide();
			$(".multi-approve-decline").hide();

		} else {

			$(".delete-multiple").show();
			$(".multi-approve-decline").show();

		}

	}



	$('.selectall-wallet-checkbox').on('change',function(){

		$(".wallet-checkbox").prop("checked",  $(this).prop("checked"));



		$('.wallet-checkbox').each(function(){

			var val = $(this).val();

			if($(this).prop("checked")){ selected[val]=val; } 

			else { delete selected[val]; }



		})

		changeViews();

	})

	jQuery('.select2').select2({
		placeholder : "<?= __('admin.filter_by_groups') ?>"
	});

	$(".user-table").delegate(".wallet-checkbox","change",function(){

		var status = $(this).prop("checked");



		if(!status) delete selected[$(this).val()]

			else selected[$(this).val()] = $(this).val();



		changeViews();

	})



	$(".select-all-users").on('click',function(){

		$this = $(this);

		$.ajax({
			type:'POST',
			dataType:'json',
			data:{action:'get_all_ids'},
			beforeSend:function(){ $this.btn("loading");},
			complete:function(){ $this.btn("reset"); },
			success:function(json){
				$.each(json['ids'],function(i,id){
					selected[id]= id;
				})
				$(".selected-count").text(Object.keys(selected).length);
				all_ids = json['ids'];
				changeViews();
			},
		});

	})



	$(".user-table").delegate(".checkbox-label","click",function(e){

		e.stopPropagation();

	});



	$(document).delegate("[edit-plan-user]","click",function(e){

		e.stopPropagation();

		var user_id = $(this).attr('edit-plan-user');
		
		var is_vendor = $(this).attr('edit-plan-user-type');

		$("#membershipuser-image").remove();



		$this = $(this);

		$.ajax({

			url:'<?= base_url("membership/user_plan_modal") ?>',

			dataType:'html',

			data:{user_id:user_id, is_vendor:is_vendor},

			beforeSend:function(){$this.btn("loading");},

			complete:function(){$this.btn("reset");},

			success:function(html){

				$('body').append('<div id="membershipuser-image" class="modal">' + html + '</div>');

				$('#membershipuser-image').modal('show');

			},

		})


	});



	$(".delete-multiple").on('click',function(e){

		$this = $(this);



		var ids = Object.keys(selected).join(",");

		e.preventDefault();

		e.stopPropagation();



		if(!confirm('<?= __('admin.are_you_sure') ?>')) return false;

		$.ajax({

			url: '<?php echo base_url("admincontrol/deleteAllusersMultiple") ?>',

			type:'POST',

			dataType:'json',

			data:{ids:ids},

			beforeSend:function(){ $this.btn("loading"); },

			complete:function(){ $this.btn("reset"); },

			success:function(json){

				$("#modal-delete #message").html(json['message']);

				$("#modal-delete .confirm-delete").attr("data-id",ids);

				$("#modal-delete").modal("show");

			},

		})

	})



	var xhr;

	function getPage(page, existingCounts = null) {

		$this = $(this);

		if(xhr && xhr.readyState != 4) xhr.abort();

		let reg_approval_filter = $('.user-approvals-filer a.badge-primary').data('apr');

		if((reg_approval_filter == 'pending' || reg_approval_filter == 'approved' || reg_approval_filter == 'declined') && existingCounts != null && existingCounts[reg_approval_filter] == 0) {
			reg_approval_filter = 'all';
		}

 
		let data = $("#search-form").serialize();

		xhr = $.ajax({

			type:'POST',

			dataType:'json',

			data: data + "&apr="+reg_approval_filter+"&page="+page,

			beforeSend:function(){

				$(".dimmer").addClass("active");

			},

			complete:function(){

				$(".dimmer").removeClass("active");

			},

			success:function(json){

				if(json['table']){

					$('.selectall-wallet-checkbox').prop("checked",false)

					$(".user-table tbody").html(json['table']);

					reloadApprovalFilter(json['approvals_count']);
					changeViews();

				}

				if(json['pagination']){

					$(".user-table tfoot .pagination").html(json['pagination']);

				}

			},

		})

	}


	function reloadApprovalFilter(data) {
		if($('.user-approvals-filer').length == 0) {
			$('.dimmer .table-responsive').append('<p class="p-2 mb-0 lead user-approvals-filer"><p>')
		}
		
		if(data['total'] > 0) {
			if($('.user-approvals-filer a[data-apr="all"]').length <= 0) {
				$('.user-approvals-filer').append('<a class="badge badge-default" data-apr="all" href="javascript:void(0);">'+'<?= __('admin.show_all_users') ?>'+' ('+data['total']+')</a>');
			} else {
				$('.user-approvals-filer a[data-apr="all"]').text('<?= __('admin.show_all_users') ?>'+' ('+data['total']+')')
			}
		} else {
			$('.user-approvals-filer a[data-apr="all"]').remove();
		}
		if(data['approved'] > 0) { 
			if($('.user-approvals-filer a[data-apr="approved"]').length <= 0) {
				$('.user-approvals-filer').append('<a class="badge badge-default" data-apr="approved" href="javascript:void(0);">'+'<?= __('admin.show_approved_users') ?>'+' ('+data['total']+')</a>');
			} else {
				$('.user-approvals-filer a[data-apr="approved"]').text('<?= __('admin.show_approved_users') ?>'+' ('+data['approved']+')')
			}
		} else {
			$('.user-approvals-filer a[data-apr="approved"]').remove();
		}
		if(data['pending'] > 0) {
			if($('.user-approvals-filer a[data-apr="pending"]').length <= 0) {
				$('.user-approvals-filer').append('<a class="badge badge-default" data-apr="pending" href="javascript:void(0);">'+'<?= __('admin.show_pending_users') ?>'+' ('+data['total']+')</a>');
			} else {
				$('.user-approvals-filer a[data-apr="pending"]').text('<?= __('admin.show_pending_users') ?>'+' ('+data['pending']+')')
			} 
		} else {
			$('.user-approvals-filer a[data-apr="pending"]').remove();
		}
		if(data['declined'] > 0) {
			if($('.user-approvals-filer a[data-apr="declined"]').length <= 0) {
				$('.user-approvals-filer').append('<a class="badge badge-default" data-apr="declined" href="javascript:void(0);">'+'<?= __('admin.show_declined_users') ?>'+' ('+data['total']+')</a>');
			} else {
				$('.user-approvals-filer a[data-apr="declined"]').text('<?= __('admin.show_declined_users') ?>'+' ('+data['declined']+')')
			}
		} else {
			$('.user-approvals-filer a[data-apr="declined"]').remove();
		}

		if(data['pending'] == 0 && data['declined'] == 0) { 
			$('.user-approvals-filer a[data-apr="approved"]').remove();
			$('.user-approvals-filer a[data-apr="pending"]').remove();
			$('.user-approvals-filer a[data-apr="declined"]').remove();
		} 

		if($('.user-approvals-filer a.badge-primary').length == 0) {
			$('.user-approvals-filer a[data-apr="all"]').addClass('badge-primary').removeClass('badge-default');
		}
	}

	$("#search-form input").on('keyup',function(){
		getPage(1);
	});

	$("#search-form select").on('change',function(){
		getPage(1);
	})

	$(".user-table tfoot .pagination").delegate("a","click", function(e){
		e.preventDefault();
		getPage($(this).attr("data-ci-pagination-page"));
	})

	getPage(1);

	$(".user-table").delegate(".btn-remove",'click',function(e){
		if(!confirm('<?= __('admin.are_you_sure') ?>')) e.preventDefault();
		return true;
	});

	$(".user-table").delegate(".show-tree",'click',function(e){
		e.preventDefault();
		e.stopPropagation();

		$this = $(this);
		$.ajax({
			url: '<?php echo base_url("admincontrol/showTree") ?>',
			type:'POST',
			dataType:'json',
			data:{id:$this.attr("data-id")},
			beforeSend:function(){ $this.btn("loading"); },
			complete:function(){ $this.btn("reset"); },
			success:function(json){
				$("#modal-tree .modal-body").html(json['html']);
				$("#modal-tree").modal("show");
			},
		});
	});

	$(".user-table").delegate(".btn-delete2",'click',function(e){
		e.preventDefault();
		e.stopPropagation();
		$this = $(this);
		if(!confirm('<?= __('admin.are_you_sure') ?>')) return false;
		$.ajax({
			url: '<?php echo base_url("admincontrol/deleteAllusers") ?>',
			type:'POST',
			dataType:'json',
			data:{id:$this.attr("data-id")},
			beforeSend:function(){ $this.btn("loading"); },
			complete:function(){ $this.btn("reset"); },
			success:function(json){
				$("#modal-delete #message").html(json['message']);
				$("#modal-delete .confirm-delete").attr("data-id",$this.attr("data-id"));
				$("#modal-delete").modal("show");
			},
		});
	});


	$(document).delegate(".confirm-delete",'click',function(e){

		e.preventDefault();

		e.stopPropagation();



		$this = $(this);

		$.ajax({

			url: '<?php echo base_url("admincontrol/deleteUsersConfirm") ?>',

			type:'POST',

			dataType:'json',

			data:{

				id:$this.attr("data-id"),

				delete_transaction:$("#delete_transaction").prop("checked")

			},

			beforeSend:function(){ $this.btn("loading"); },

			complete:function(){ $this.btn("reset"); },

			success:function(json){

				window.location.reload();

			},

		})

	})



	$(".export-excel").on('click',function(){

		$this = $(this);

		$.ajax({

			url:'<?= base_url('admincontrol/get_user_data') ?>',

			type:'POST',

			dataType:'json',

			data: {

				action:'export',

			},

			beforeSend:function(){

				$this.btn("loading");

			},

			complete:function(){

				$this.btn("reset");

			},

			success:function(json){

				if (json['download']) {

					window.location.href = json['download'];

				}

			},

		})

	})



	$(".btn_import_data").on('click',function(){

		$this = $("#import_form");

		var formData = new FormData($this[0]);

		formData.append("action",'import');



		formData = formDataFilter(formData);

		$(".btn_import_data").prop("disabled",true);



		$.ajax({

			url:'<?= base_url('admincontrol/get_user_data') ?>',

			type:'POST',

			dataType:'json',

			cache:false,

			contentType: false,

			processData: false,

			data:formData,

			xhr: function (){

				var jqXHR = null;



				if ( window.ActiveXObject ){

					jqXHR = new window.ActiveXObject( "Microsoft.XMLHTTP" );

				}else {

					jqXHR = new window.XMLHttpRequest();

				}



				jqXHR.upload.addEventListener( "progress", function ( evt ){

					if ( evt.lengthComputable ){

						var percentComplete = Math.round( (evt.loaded * 100) / evt.total );

						$('#import-status').text('<?= __('admin.uploading') ?>'+" - " + percentComplete + "%").show();

					}

				}, false );



				jqXHR.addEventListener( "progress", function ( evt ){

					if ( evt.lengthComputable ){

						var percentComplete = Math.round( (evt.loaded * 100) / evt.total );

						$('#import-status').html('<?= __('admin.import_users') ?>'+'...');

					}

				}, false );

				return jqXHR;

			},

			error:function(){

				$(".btn_import_data").prop("disabled",false);

			},

			success:function(result){

				$(".btn_import_data").prop("disabled",false);



				if(result['location']){ window.location = result['location']; }



				$(".hidden-close").removeClass("d-none");

				$(".btn-close").remove();



				$("#import-log").html('');

				$("#import-status").html('');

				if(result['errors']){

					$("#import-log").html(result['errors']);

				}

			},

		})

	});

	

	$('.accordian-body').on('show.bs.collapse', function () {

		$(this).closest("table")

		.find(".collapse.in")

		.not(this)

		.collapse('toggle')

	})

	$(".approved-decline-action").on('click',function(e){
		var ids = Object.keys(selected).join(",");
		var data = {};
		let status = ($(this).data('action-value') == 1) ? 'approve_users' : 'decline_users'

		data['ids'] = ids;
		data[status] = ids;

		$.ajax({
			url: '<?php echo base_url("admincontrol/multiApproveDecline") ?>',
			type:'POST',
			dataType:'json',
			data:data,
			beforeSend:function(){
				$(".dimmer").addClass("active");
			},
			complete:function(){
				$(".dimmer").removeClass("active");
			},
			success:function(response){
				if (response.approvals_status.status != 'NULL') {
					if(response.approvals_status.status) {
						$('.approvals-status-alert').removeClass('alert-danger');
						$('.approvals-status-alert').addClass('alert-success');
						$('.approvals-status-alert').text(response.approvals_status.message);
					} else {
						$('.approvals-status-alert').addClass('alert-danger');
						$('.approvals-status-alert').removeClass('alert-success');
						$('.approvals-status-alert').text(response.approvals_status.message);
					}

					$('.approvals-status-alert').show();
					setTimeout(function(){ $('.approvals-status-alert').hide(); }, 3000);
				}
				
				reloadApprovalFilter(response.approvals_count)
				getPage(1, response.approvals_count);
				location.reload();
			}
		})
	});
</script>

