<?php if($this->session->flashdata('payment_gateway')): ?>
	<div class="alert alert-success alert-dismissible fade show" role="alert">
	  <span><?= __('user.deposit_payment_success') ?></span>
	  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	    <span aria-hidden="true">&times;</span>
	  </button>
	</div>
<?php endif; ?>
<link rel="stylesheet" type="text/css" href="<?= base_url('assets/plugins/datatable') ?>/daterangepicker.css?v=<?= av() ?>" />
<div class="row">
	<div class="col-12">
		<div class="table-responsive">
			<div class="card">
				<div class="card-header">
					<form method="GET" onsubmit="return deposit_filter()" id="deposit_filter">
						<input type="hidden" name="get_deposit" value="1">
						<div class="row">
							<div class="col-sm-3">
								<div class="form-group">
									<input autocomplete="off" type="text" name="date" value="<?= isset($_GET['date']) ? $_GET['date'] : '' ?>" class="form-control daterange-picker" placeholder='<?= __('user.filter_by_date') ?>'>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="form-group">
									<button class="btn btn-primary btn-new-filter"><?= __('user.filter') ?></button>
									<button type="button" class="btn btn-primary btn-md ml-3 <?= ($vendorDepositStatus['depositstatus']) ? 'btn-deposit-balence' : 'btn-deposit-module-info' ?>" data-min_depo_amt="<?= $vendorMinDepositAmt['vendor_min_deposit'] ?>" data-deposited_amt="<?= $total_deposited ?>"><i class="fa fa-plus"></i> <?= __('admin.deposit_btn_title') ?></button>
								</div>
							</div>
						</div>
					</form>
					<h6 class="m-0"><?= __('user.deposit_requests_list') ?> <strong class="text-primary pull-right"><?= __('user.total_deposited_amount') ?>: <?php echo c_format($total_deposited); ?> </strong></h6>
				</div>
				<div class="card-body p-0">
					<div class="table-responsive">
						<div class="new-empty text-center d-none">
				    		<img class="img-responsive" src="<?php echo base_url('assets/vertical/assets/images/no-data-2.png'); ?>" style="margin: 49px 0 0 0;">
                            <h3 class="m-b-30 text-center"><?= __('admin.no_deposit_transaction') ?></h3>
				    	</div>
						<table class="table transaction-table table-striped">
							<thead>
								<tr>
									<th width="100px"><?= __('user.id') ?></th>
									<th><?= __('user.vendor') ?></th>
									<th><?= __('user.date') ?></th>
									<th><?= __('user.payment_method') ?></th>
									<th><?= __('user.transactions_ids') ?></th>
									<th><?= __('user.total') ?></th>
									<th><?= __('user.status') ?></th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div id="depositModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title"><?= __('user.deposit_balance') ?></h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
      <div class="modal-body">
        <form id="payment-methods-form" action="<?= base_url('usercontrol/confirm_deposit'); ?>" method="post">
            <div class="form-group payment-amount-box">
                <?php
                $lang = $_SESSION['userCurrency'];
                $defCurrency = $this->db->query("SELECT * FROM currency WHERE code = '{$lang}' ")->row_array();
                if(empty($defCurrency)) {
                $defCurrency = $this->db->query("SELECT * FROM currency WHERE is_default=1")->row_array();
                }
                $defCurrencySymbol = $defCurrency['symbol_left'].$defCurrency['symbol_right'];
                ?>
              <label><?= __('user.enter_amount_to_deposit') ?></label>
              <div class="input-group">
                <span class="input-group-addon py-2 px-4 bg-light" style="font-size: 20px;"><?= $defCurrencySymbol; ?></span>
                <input type="number" class="form-control p-4 deposite_amt" name="amount" step="0.01" placeholder="<?= __('user.enter_amount') ?>" style="font-size: 24px;">
              </div>
            </div>
            <div class="alert-error-message"></div>
            <section id="form-ajax-section"></section>
        </form>
        <div class="payment-module-deposit"></div>
      </div>
    </div>
  </div>
</div>
<script src="<?= base_url('assets/plugins/datatable') ?>/moment.js"></script>
<script type="text/javascript" src="<?= base_url('assets/plugins/datatable') ?>/daterangepicker.min.js"></script>

<script type="text/javascript">
	$(document).on('ready',function() {
		deposit_filter();
		$('.daterange-picker').daterangepicker({
	        opens: 'left',
	        autoUpdateInput: false,
	        ranges: {
	            'Today': [moment(), moment()],
	            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
	            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
	            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
	            'This Month': [moment().startOf('month'), moment().endOf('month')],
	            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
	        },
	        locale: {
	            cancelLabel: '<?= __('user.clear') ?>',
	            format: 'DD-M-YYYY'
	        }
	    });
			
		$('.daterange-picker').on('apply.daterangepicker', function(ev, picker) {
	        $(this).val(picker.startDate.format('DD-M-YYYY') + ' - ' + picker.endDate.format('DD-M-YYYY'));
	    });
	    
	    $('.daterange-picker').on('cancel.daterangepicker', function(ev, picker) {
	        $(this).val('');
	    });
	});

	function deposit_filter() {
		$.ajax({
			type:'POST',
			dataType:'json',
			data:$("#deposit_filter").serialize(),
			beforeSend:function(){
				$('.btn-new-filter').btn("loading");
			},
			complete:function(){
				$('.btn-new-filter').btn("reset");
			},
			success:function(json){
				if(json['html']){
					$(".transaction-table tbody").html(json['html']);
					$(".new-empty").addClass('d-none');
					$(".transaction-table").show();
				} else{
					$(".transaction-table").hide();
					$(".new-empty").removeClass('d-none');
				}
			},
		})

		return false;
	}

	$(document).on('click', '.btn-deposit-balence', function() {
        render_payment_methods();
    });

	function backCheckout() {
        $('#depositModal form input[name="amount"]').attr('readonly', false);
        render_payment_methods();
    }
                        
    function render_payment_methods(){
    	$(".alert-error-message").empty();

    	var min_depo_amt = $(".btn-deposit-balence").data("min_depo_amt");
    	var deposited_amt = $(".btn-deposit-balence").data("deposited_amt");

    	if(deposited_amt < min_depo_amt){
    		var showing_amt = min_depo_amt-deposited_amt;
    		$(".deposite_amt").val(showing_amt);
    	}

        $.get("<?= base_url('usercontrol/get_payment_methods'); ?>", function(response) {
            response = JSON.parse(response);

            if(response.error){
            	Swal.fire({
					html: '<i class="far fa-smile fa-3x"></i><p class="custom-swal-message"><?= __('user.deposit_module_disabled_info') ?></p>',
				});
				return;
            }

            if(!response.payment_gateways_count > 0) {
                $('.payment-amount-box').hide();
                $('#form-ajax-section').html(response.html);
            } else {
                $('#form-ajax-section').html(`<div class="form-group">
                    <label>`+'<?= __('user.select_payment_method') ?>'+`</label>
                    <div id="payment-methods">
                        `+response.html+`
                    </div>
                </div>
                <div class="form-group text-center">
                    <button type="submit" class="btn btn-primary btn-lg">`+'<?= __('user.submit') ?>'+`</button>
                </div>`);
            }
            $('.payment-module-deposit').empty();
            $('#depositModal').modal('show');
        });
    }

    $(document).on('submit', '#depositModal form#payment-methods-form',function(e){
        e.preventDefault();
        let amount = $('#depositModal form input[name="amount"]').val();

        if(amount > 0){
            $('#depositModal form .invalid-amt-error').remove();
            $('#depositModal form input[name="amount"]').attr('readonly', true);
            let form = $('#depositModal form');
            let url = form.attr('action');

            $.ajax({
                type: "POST",
                url: url,
                data: form.serialize(),
                dataType: 'JSON',
                success: function(data){
                	if(data.error){
                		$(".alert-error-message").html('<div class="text-danger">'+ data.error +'</div>');
                		return false;
                	}

                	$(".alert-error-message").empty();
                	$("#depositModal form#payment-methods-form button[type='submit']").attr('disabled',true);

                    if(data.confirm) {
                        $('#form-ajax-section').empty();
                        $('.payment-module-deposit').html(data.confirm);
                    }
                }
            });
        } else {
            $('#depositModal form input[name="amount"]').parent().parent().append('<p class="text-danger invalid-amt-error">'+'<?= __('user.please_enter_valid_amount_to_deposit') ?>'+'</p>')
        }
    });

    $(document).on('click','.btn-deposit-module-info',function(){
        Swal.fire({
			html: '<i class="far fa-smile fa-3x"></i><p class="custom-swal-message"><?= __('user.deposit_module_disabled_info') ?></p>',
		});
    });

</script>