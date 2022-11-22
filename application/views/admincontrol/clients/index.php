<div class="row">
    <div class="col-lg-12 col-md-12">
        <?php if($this->session->flashdata('success')){?>
            <div class="alert alert-success alert-dismissable my_alert_css">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <?php echo $this->session->flashdata('success'); ?>
            </div>
        <?php } ?>
        <?php if($this->session->flashdata('error')){?>
            <div class="alert alert-danger alert-dismissable my_alert_css">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <?php echo $this->session->flashdata('error'); ?>
            </div>
        <?php } ?>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-blue-payment">
                <div class="card-title-white pull-left m-0"><?= __('admin.store_clients') ?></div>
                <div class="pull-right">
                    <a id="toggle-uploader" class="btn btn-primary" href="<?php echo base_url("admincontrol/addclients") ?>">
                        <?= __('admin.add_client') ?></a>
                </div>
            </div>
            <div class="card-body">
              <div class="row top-panel"> <span class="col-sm--2">
                 <div class="share-store-list">
                    
                </div>
            </span> 
        </div>
    </br>

    <div class="table-rep-plugin">

            <section class="empty-div d-none">
                <div class="text-center">
                <img class="img-responsive" src="<?php echo base_url(); ?>assets/vertical/assets/images/no-data-2.png" style="margin-top:100px;">
                 <h3 class="m-t-40 text-center text-muted"><?= __('admin.no_clients') ?></h3></div>
            </section>


            <div class="table-responsive b-0" data-pattern="priority-columns">
                <table id="clients-table" class="table  table-striped">
                    <thead>
                        <tr>
                            <th data-priority="1"><?= __('admin.id') ?></th>
                            <th data-priority="1"><?= __('admin.name') ?></th>
                            <th data-priority="3"><?= __('admin.refer_user') ?> </th>
                            <th data-priority="1"><?= __('admin.email') ?></th>
                            <th data-priority="1"><?= __('admin.phone') ?></th>
                            <th data-priority="3"><?= __('admin.username') ?></th>
                            <th data-priority="1"><?= __('admin.sales') ?></th>
                            <th data-priority="3"><?= __('admin.type') ?></th>
                            <th data-priority="3"><?= __('admin.action') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="100%" class="text-center">
                                <h3 class="text-muted py-4"><?= __("admin.loading_clients_data_text") ?> </h3>
                                <h5 class="text-muted py-4"><?= __("admin.not_taking_longer") ?> </h5>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- end col -->
</div>
<!-- end row -->

<div class="modal fade" id="ShipingDetailsModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><?= __('admin.shipping_details') ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>
  </div>
  <div class="modal-body">
     <form id="frm_shipping_address" >
      <div class="row">
         <div class="col-md-6">
            <div class="mb-3">
               <label for="address" class="form-label"><?= __('admin.address') ?></label>
               <input type="text" class="form-control" name="address" id="address" placeholder="<?= __('admin.address') ?>" readonly="">

           </div>
       </div>
       <div class="col-md-6">
        <div class="mb-3">
          <label for="country_id" class="form-label"><?= __('admin.country') ?></label>
          <input type="text" class="form-control" name="country_id" id="country_id" placeholder="<?= __('admin.country') ?>" readonly="">
      </div>
  </div>
</div>
<div class="row">

  <div class="col-md-6">
     <div class="mb-3">
       <label for="state_id" class="form-label"><?= __('store.state') ?></label>
       <input type="text" class="form-control" name="state_id" id="state_id" placeholder="<?= __('admin.state') ?>" readonly="">
   </div>
</div>
<div class="col-md-6">
  <div class="mb-3">
     <label for="city" class="form-label"><?= __('store.city') ?></label>
     <input class="form-control" name="city" type="text" id="city" readonly="" >
 </div>
</div>
</div>
<div class="row">

   <div class="col-md-6">
      <div class="mb-3">
         <label for="zip_code" class="form-label"><?= __('store.postal_code') ?></label>
         <input class="form-control" name="zip_code" type="text" id="zip_code" readonly="">

     </div>
 </div>
 <div class="col-md-6">
  <div class="mb-3">
     <label for="sphone" class="form-label"><?= __('store.phone') ?></label>
     <link rel="stylesheet" href="<?= base_url('assets/plugins/tel/css/intlTelInput.css') ?>?v=<?= av() ?>">
     <script src="<?= base_url('assets/plugins/tel/js/intlTelInput.js') ?>"></script>
     <div>
         <input id="phone" class="form-control" type="text" name="phone" readonly="">
     </div>
     <script type="text/javascript">
        var tel_input = intlTelInput(document.querySelector("#phone"), {
         initialCountry: "auto",
         utilsScript: "<?= base_url('/assets/plugins/tel/js/utils.js?1562189064761') ?>",
         separateDialCode:true,
         geoIpLookup: function(success, failure) {
          $.get("https://ipinfo.io", function() {}, "jsonp").always(function(resp) {
           var countryCode = (resp && resp.country) ? resp.country : "";
           success(countryCode);
       });
      },
  });
</script>

</div>

</div>
</div>

</form>
</div>

</div>
</div>
</div>
<script type="text/javascript" async="">
    function shareinsocialmedia(url) {
        window.open(url, 'sharein', 'toolbar=0,status=0,width=648,height=395');
        return true;
    }
    $(document).on('click','.deleteuser',function(e){
        var deleteaction = $(this).data('url');
        var message = '<?= __('admin.lost_all_data_are_you_sure_delete') ?>';
        Swal.fire({
            icon: 'warning',
            html:message,
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: '<?= __('admin.yes') ?>',
            cancelButtonText: '<?= __('admin.no') ?>'

        }).then((result)=>{
           if(result.value) window.location.href = deleteaction;  
       });
    });
    $(document).on('click','.viewShipping',function(e){
      $this = $(this);
      var id = $(this).data('id');
      $.ajax({
         url:'<?= base_url('admincontrol/getShippingDetails') ?>',
         type:'POST',
         dataType:'json',
         data:{id},
         beforeSend:function(){$this.prop("disabled",true);},
         complete:function(){$this.prop("disabled",false);},
         success:function(data){
            if(data.status) {
                $("#frm_shipping_address").trigger('reset');
                $("#address").val(data.data.address);
                $("#country_id").val(data.data.country_name);
                $("#state_id").val(data.data.state_name);
                $("#city").val(data.data.city);
                $("#zip_code").val(data.data.zip_code);
                tel_input.setNumber(data.data.phone);
                $("#ShipingDetailsModal").modal('show');
            } else {
               Swal.fire({
                icon: 'info',
                text:'<?= __('admin.no_shipping_details_found') ?>',
            })
           }

       },
   });
  });
    

    function getclientsRows(){
        $this = $(this);

        $.ajax({
            url:"<?= base_url('admincontrol/listclients'); ?>",
            type:'POST',
            dataType:'html',
            data:{listclients:1},
            beforeSend:function(){$this.btn("loading");},
            complete:function(){$this.btn("reset");},
            success:function(html){
                if(html){
                    $("#clients-table tbody").html(html);
                    $("#clients-table").show();
                } else {
                    $(".empty-div").removeClass("d-none");
                    $("#clients-table").hide();
                }

            },
        })
    }

    $(function() {
        getclientsRows();
    });
</script>