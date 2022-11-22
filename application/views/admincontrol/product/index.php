<?php
   $db =& get_instance();
   $userdetails=$db->userdetails();
   $store_setting =$db->Product_model->getSettings('store');
   $Product_model =$db->Product_model;
   ?>
<div id="overlay"></div>
<div class="popupbox" style="display: none;">
   <div class="backdrop box">
      <div class="modalpopup" style="display:block;">
         <a href="javascript:void(0)" class="close js-menu-close" onclick="closePopup();"><i class="fa fa-times"></i></a>
         <div class="modalpopup-dialog">
            <div class="modalpopup-content">
               <div class="modalpopup-body">
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<div class="row">
   <div class="col-lg-12">
      <?php if ($currentTheme=="sales" || $StoreStatus=="0"){ ?>
      <div class="alert alert-danger"><?= __('admin.cart_product_notice')?></div>
      <?php } ?>
      <?php if($this->session->flashdata('success')){?>
      <div class="alert alert-success alert-dismissable">
         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
         <?php echo $this->session->flashdata('success'); ?>
      </div>
      <?php } ?>
      <?php if($this->session->flashdata('error')){?>
      <div class="alert alert-danger alert-dismissable">
         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
         <?php echo $this->session->flashdata('error'); ?>
      </div>
      <?php } ?>
   </div>
</div>
<div class="row product-page">
   <div class="col-12">
      <div class="card">
         <div class="card-header bg-blue-payment">
                  <div class="card-title-white pull-left m-0"><?= __('admin.cart_mode_products') ?></div>
                  <div class="pull-right">
                     <a id="toggle-uploader" class="btn btn-primary" href="<?php echo base_url("admincontrol/addproduct") ?>"><?= __('admin.add_product') ?>
                     </a>

                     <a
                        id="toggle-uploader"
                        class="btn btn-primary"
                        href="<?php echo base_url("admincontrol/manage_car_value") ?>"><?= __('admin.manage_car_value') ?>
                     </a>

                     <a id="toggle-uploader" class="btn btn-primary" href="javascript:void(0)" data-toggle="modal" data-target="#manageBulkProducts"><?= __('admin.manage_bulk_products') ?>
                     </a>

                    <a style="display:none;" class="btn btn-danger" name="deletebutton" id="deletebutton" value="<?= __('admin.save_exit') ?>" onclick="deleteuserlistfunc('deleteAllproducts');"><?= __('admin.delete_products') ?>
                     </a>
                  </div>
         </div>
         <div class="card-body">
            <div class="tab-pane p-3" id="store-setting orange-store-form" role="tabpanel">
               <div role="tabpanel">
                  <ul class="nav nav-pills forms-nnnav orange-color-bg" role="tablist">
                     <li role="presentation" class="active nav-item">
                        <a class="nav-link active show product_tab_option" href="#product_tab" aria-controls="product_tab" role="tab" data-toggle="tab"><?= __('admin.products') ?></a>
                     </li>
                     <li role="presentation" class="nav-item">
                        <a class="nav-link product-part product_coupons_tab_option" href="#product_coupons_tab" aria-controls="product_coupons_tab" role="tab" data-toggle="tab"><?= __('admin.coupon') ?></a>
                     </li>
                     <li role="presentation" class="nav-item">
                        <a class="nav-link" href="#form_tab" aria-controls="form_tab" role="tab" data-toggle="tab"><?= __('admin.forms') ?></a>
                     </li>
                     <li role="presentation" class="nav-item">
                        <a class="nav-link" href="#form_coupons_tab" aria-controls="form_coupons_tab" role="tab" data-toggle="tab"><?= __('admin.forms_coupon') ?></a>
                     </li>
                  </ul>
               </div>
            </div>

            <div class="tab-content">
               <div role="tabpanel" class="tab-pane active" id="product_tab">
                  <div class="filter">
                     <form id="filter-form">
                        <div class="row mt-5">
                           <div class="form-group col-4">
                              <select name="category_id" class="form-control select-category">
                                 <?php $selected = isset($_GET['category_id']) ? $_GET['category_id'] : ''; ?>
                                 <option value=""><?= __('admin.all_category') ?></option>
                                 <?php foreach ($categories as $key => $value) { ?>
                                 <option <?= $selected == $value['id'] ? 'selected' : '' ?> value="<?= $value['id'] ?>"><?= $value['name'] ?></option>
                                 <?php } ?>
                              </select>
                           </div>
                           <div class="form-group col-4">
                              <select name="seller_id" class="form-control select-vendor">
                                 <?php $selected = isset($_GET['seller_id']) ? $_GET['seller_id'] : ''; ?>
                                 <option value=""><?= __('admin.all_vendor') ?></option>
                                 <?php foreach ($vendors as $key => $value) { ?>
                                 <option <?= $selected == $value['id'] ? 'selected' : '' ?> value="<?= $value['id'] ?>"><?= $value['name'] ?></option>
                                 <?php } ?>
                              </select>
                           </div>
                        </div>
                     </form>
                  </div>
                  <div class="table-rep-plugin">
                     <div class="row">
                        <div id="manageBulkProducts" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
                           <div class="modal-dialog modal-lg">
                              <div class="modal-content">
                                 <div class="modal-header">
                                    <h5 class="modal-title"><?= __('admin.manage_bulk_products') ?></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                 </div>
                                 <div class="modal-body">
                                    <div class="row">
                                       <div class="col-6 text-center">
                                          <button class="btn btn-lg btn-default btn-success text-center export-products-btn"><?= __('admin.export_products') ?></button>
                                       </div>
                                       <div class="col-6 text-center">
                                          <button class="btn btn-lg btn-default btn-success text-center export-structure-btn"><?= __('admin.export_structure_only') ?></button>
                                       </div>
                                    </div>
                                    <hr/>
                                    <div class="row">
                                       <div class="col">
                                          <form id="bulk_products_form" class="text-center">
                                             <div class="custom-file my-3">
                                                <input type="file" class="custom-file-input" name="file">
                                                <label class="custom-file-label" for="customFile"><?= __('admin.upload_excel_file_for_bulk_product_manage') ?></label>
                                             </div>
                                             <button id="bulk_products_form_btn" type="submit" class="btn btn-lg btn-default btn-success text-center"><?= __('admin.import_products') ?></button><br/><br/>
                                             <a class="mb-4" href="javascript:void(0)" data-toggle="collapse" data-target="#collapseInstructions" aria-expanded="false" aria-controls="collapseInstructions"><?= __('admin.click_here_for_excel_file_upload') ?></a>
                                             <div class="collapse" id="collapseInstructions">
                                                <div class="card card-body text-left" style="max-height: 300px; overflow-y: scroll">
                                                   <table class="table table-stripped">
                                                      <thead>
                                                         <tr>
                                                            <td><?= __('admin.column') ?></td>
                                                            <td><?= __('admin.description') ?></td>
                                                         </tr>
                                                      </thead>
                                                      <tbody>
                                                         <tr>
                                                            <td><?= __('admin.product_id') ?></td>
                                                            <td>
                                                               <ul>
                                                               <li><?= __('admin.optional') ?></li>
                                                               <li><?= __('admin.ip_product_id_desc_1') ?></li>
                                                               <li><?= __('admin.ip_product_id_desc_2') ?></li>
                                                               <li><?= __('admin.ip_product_id_desc_3') ?></li>
                                                               <ul>
                                                            </td>
                                                         </tr>
                                                         <tr>
                                                            <td><?= __('admin.product_name') ?></td>
                                                            <td>
                                                               <ul>
                                                               <li><?= __('admin.required') ?></li>
                                                               <li><?= __('admin.ip_product_name_desc_1') ?></li>
                                                               <ul>
                                                            </td>
                                                         </tr>
                                                         <tr>
                                                            <td><?= __('admin.product_sku') ?></td>
                                                            <td>
                                                               <ul>
                                                               <li><?= __('admin.required') ?></li>
                                                               <li><?= __('admin.ip_product_sku_desc_1') ?></li>
                                                               <li><?= __('admin.ip_product_sku_desc_2') ?></li>
                                                               <ul>
                                                            </td>
                                                         </tr>
                                                         <tr>
                                                            <td><?= __('admin.product_msrp') ?></td>
                                                            <td>
                                                               <ul>
                                                               <li><?= __('admin.optional') ?></li>
                                                               <li><?= __('admin.ip_product_msrp_desc_1') ?></li>
                                                               <li><?= __('admin.ip_product_msrp_desc_2') ?></li>
                                                               <ul>
                                                            </td>
                                                         </tr>
                                                         <tr>
                                                            <td><?= __('admin.product_price') ?></td>
                                                            <td>
                                                               <ul>
                                                               <li><?= __('admin.required') ?></li>
                                                               <li><?= __('admin.ip_product_price_desc_1') ?></li>
                                                               <li><?= __('admin.ip_product_price_desc_2') ?></li>
                                                               <ul>
                                                            </td>
                                                         </tr>
                                                         <tr>
                                                            <td><?= __('admin.product_short_desc') ?></td>
                                                            <td>
                                                               <ul>
                                                               <li><?= __('admin.required') ?></li>
                                                               <li><?= __('admin.ip_product_short_desc_desc_1') ?></li>
                                                               <li><?= __('admin.ip_product_short_desc_desc_2') ?></li>
                                                               <ul>
                                                            </td>
                                                         </tr>
                                                         <tr>
                                                            <td><?= __('admin.product_desc') ?></td>
                                                            <td>
                                                               <ul>
                                                               <li><?= __('admin.required') ?></li>
                                                               <li><?= __('admin.ip_product_desc_desc_1') ?></li>
                                                               <li><?= __('admin.ip_product_desc_desc_2') ?></li>
                                                               <ul>
                                                            </td>
                                                         </tr>
                                                         <tr>
                                                            <td><?= __('admin.product_tag') ?></td>
                                                            <td>
                                                               <ul>
                                                               <li><?= __('admin.optional') ?></li>
                                                               <li><?= __('admin.ip_product_tag_desc_1') ?></li>
                                                               <li><?= __('admin.ip_product_tag_desc_2') ?></li>
                                                               <ul>
                                                            </td>
                                                         </tr>
                                                         <tr>
                                                            <td><?= __('admin.product_type') ?></td>
                                                            <td>
                                                               <ul>
                                                               <li><?= __('admin.required') ?></li>
                                                               <li><?= __('admin.ip_product_type_disc_1') ?> "virtual", "downloadable"</li>
                                                               <li><?= __('admin.ip_product_type_disc_2') ?>/</li>
                                                               <ul>
                                                            </td>
                                                         </tr>
                                                         <tr>
                                                            <td><?= __('admin.product_variations') ?></td>
                                                            <td>
                                                               <ul>
                                                               <li><?= __('admin.optional') ?></li>
                                                               <li><?= __('admin.ip_product_variations_desc_1') ?></li>
                                                               <ul>
                                                               <pre style="overflow: visible;">
                                                               {
                                                               "colors":[
                                                               {"code":"#FF0000","name":"Red","price":"10"},
                                                               {"code":"#3014FF","name":"Blue","price":"15"}
                                                               ],
                                                               "size":[
                                                               {"name":"Horizontal 56","price":"10"},
                                                               {"name":"Horizontal 112","price":"15"}
                                                               ]
                                                               }
                                                               <pre>
                                                               <ul>
                                                                  <li><?= __('admin.ip_product_variations_desc_2') ?></li>
                                                               </ul>
                                                            </td>
                                                         </tr>
                                                         <tr>
                                                            <td><?= __('admin.allow_comment') ?></td>
                                                            <td>
                                                               <ul>
                                                               <li><?= __('admin.required') ?></li>
                                                               <li><?= __('admin.ip_allow_comment_desc_1') ?></li>
                                                               <li><?= __('admin.ip_allow_comment_desc_2') ?></li>
                                                               <ul>
                                                            </td>
                                                         </tr>
                                                         <tr>
                                                            <td><?= __('admin.allow_shipping') ?></td>
                                                            <td>
                                                               <ul>
                                                               <li><?= __('admin.required') ?></li>
                                                               <li><?= __('admin.ip_allow_shipping_desc_1') ?></li>
                                                               <li><?= __('admin.ip_allow_shipping_desc_2') ?>t</li>
                                                               <ul>
                                                            </td>
                                                         </tr>
                                                         <tr>
                                                            <td><?= __('admin.allow_file_uplolad') ?></td>
                                                            <td>
                                                               <ul>
                                                               <li><?= __('admin.required') ?></li>
                                                               <li><?= __('admin.ip_allow_file_uplolad_desc_1') ?></li>
                                                               <li><?= __('admin.ip_allow_file_uplolad_desc_2') ?></li>
                                                               <ul>
                                                            </td>
                                                         </tr>
                                                         <tr>
                                                            <td><?= __('admin.product_status') ?></td>
                                                            <td>
                                                               <ul>
                                                               <li><?= __('admin.required') ?></li>
                                                               <li><?= __('admin.ip_product_status_desc_1') ?></li>
                                                               <li><?= __('admin.ip_product_status_desc_2') ?></li>
                                                               <ul>
                                                            </td>
                                                         </tr>
                                                         <tr>
                                                            <td><?= __('admin.allow_on_store') ?></td>
                                                            <td>
                                                               <ul>
                                                               <li><?= __('admin.required') ?></li>
                                                               <li><?= __('admin.ip_allow_on_store_desc_1') ?>)</li>
                                                               <li><?= __('admin.ip_allow_on_store_desc_2') ?></li>
                                                               <ul>
                                                            </td>
                                                         </tr>
                                                         <tr>
                                                            <td><?= __('admin.state_id') ?></td>
                                                            <td>
                                                               <ul>
                                                               <li><?= __('admin.optional') ?></li>
                                                               <li><?= __('admin.ip_state_id_desc_1') ?></li>
                                                               <li><?= __('admin.ip_state_id_desc_2') ?></li>
                                                               <ul>
                                                            </td>
                                                         </tr>
                                                         <tr>
                                                            <td><?= __('admin.product_created_by') ?></td>
                                                            <td>
                                                               <ul>
                                                               <li><?= __('admin.optional') ?></li>
                                                               <li><?= __('admin.ip_product_created_by_desc_1') ?></li>
                                                               <li><?= __('admin.ip_product_created_by_desc_2') ?></li>
                                                               <ul>
                                                            </td>
                                                         </tr>
                                                      </tbody>
                                                   </table>
                                                </div>
                                             </div>
                                          </form>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div id="manageBulkProductsConfirmation" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
                           <div class="modal-dialog modal-lg">
                              <div class="modal-content">
                                 <div class="modal-header">
                                    <h5 class="modal-title"><?= __('admin.manage_bulk_product_confirmation') ?></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                 </div>
                                 <div class="modal-body" style="max-height:350px; overflow-y:scroll;">
                                 </div>
                                 <div class="modal-footer">
                                    <button class="btn btn-lg btn-default btn-success text-center import-products-confirm"><?= __('admin.confirm_product_import') ?></button>
                                    <button class="btn btn-lg btn-default btn-success text-center" data-dismiss="modal"><?= __('admin.cancel') ?></button>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div id="manageBulkProductsResult" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
                           <div class="modal-dialog modal-lg">
                              <div class="modal-content">
                                 <div class="modal-header">
                                    <h5 class="modal-title"><?= __('admin.manage_bulk_product_result') ?></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                 </div>
                                 <div class="modal-body" style="max-height:350px; overflow-y:scroll;">
                                 </div>
                                 <div class="modal-footer">
                                    <button class="btn btn-lg btn-default btn-success text-center" onclick="window.location.reload()"><?= __('admin.ok') ?></button>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <br>
                     <?php if ($productlist == null) {?>
                     <div class="text-center">
                        <img class="img-responsive" src="<?php echo base_url(); ?>assets/vertical/assets/images/no-data-2.png" style="margin-top:100px;">
                        <h3 class="m-t-40 text-center text-muted"><?= __('admin.no_products') ?></h3>
                     </div>
                     <?php } else { ?>

                        <form method="post" name="deleteAllproducts" id="deleteAllproducts" action="<?php echo base_url('admincontrol/deleteAllproducts'); ?>">
                           <div class="table-responsive">
                           <table id="tech-companies-1" class="table table-striped btn-part">
                              <thead>
                                 <tr>
                                    <th><input name="product[]" type="checkbox" value="" onclick="checkAll(this)"></th>
                                    <th><?= __('admin.image') ?></th>
                                    <th><?= __('admin.product_name') ?></th>
                                    <th><?= __('admin.user') ?></th>
                                    <th><?= __('admin.price') ?></th>
                                    <th><?= __('admin.sku') ?></th>
                                    <th><?= __('admin.commission') ?></th>
                                    <th><?= __('admin.sales_/_commission') ?></th>
                                    <th><?= __('admin.clicks_/_commission') ?></th>
                                    <th><?= __('admin.total') ?></th>
                                    <th><?= __('admin.status') ?></th>
                                    <th><?= __('admin.action') ?></th>
                                 </tr>
                              </thead>
                              <tbody></tbody>
                              <tfoot>
                                 <tr>
                                    <td colspan="12" class="text-right">
                                       <ul class="pagination pagination-td"></ul>
                                    </td>
                                 </tr>
                              </tfoot>
                           </table>
                     </div>
                        </form>
                     <?php } ?>
                  </div>
               </div>
               <div role="tabpanel" class="tab-pane" id="product_coupons_tab">
                  <div class="table-rep-plugin">
                     <div class="pull-right mb-2">
                        <a class="btn btn-primary" href="<?= base_url('admincontrol/coupon_manage/')  ?>"><?= __('admin.add_new'); ?></a>
                     </div>
                     <?php if ($coupons == null) {?>
                     <div class="text-center">
                        <img class="img-responsive" src="<?php echo base_url(); ?>assets/vertical/assets/images/no-data-2.png" style="margin-top:100px; width: 100px; height: 100px;">
                        <h3 class="m-t-40 text-center text-muted"><?= __('admin.no_coupons') ?></h3>
                     </div>
                     <?php }else {?>
                     <?php if($this->session->flashdata('success')){?>
                     <div class="alert alert-success alert-dismissable"> <?php echo $this->session->flashdata('success'); ?> </div>
                     <?php } ?>
                     <div class="table-responsive b-0" data-pattern="priority-columns">
                           <div class="col-12">
                              <table id="table-coupons" class="table table-striped">
                                 <thead>
                                    <tr>
                                       <th><?= __('admin.coupon_name'); ?></th>
                                       <th><?= __('admin.count_product_use'); ?></th>
                                       <th><?= __('admin.uses_total'); ?></th>
                                       <th><?= __('admin.code'); ?></th>
                                       <th><?= __('admin.discount'); ?></th>
                                       <th><?= __('admin.date_start'); ?></th>
                                       <th><?= __('admin.date_end'); ?></th>
                                       <th><?= __("admin.status") ?></th>
                                       <th><?= __("admin.actions") ?></th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <?php foreach($coupons as $coupon){ ?>
                                    <tr>
                                       <td><?= $coupon['name'] ?></td>
                                       <td><?= (int)$coupon['product_count'] .' / '. (int)$coupon['count_coupon'] ?></td>
                                       <td><?= $coupon['uses_total'] ?></td>
                                       <td><?= $coupon['code'] ?></td>
                                       <td><?= $coupon['type']=="P" ? getDecimalNumberFormat($coupon['discount'],$_SESSION['userDecimalPlace']).' %' : c_format($coupon['discount']) ?></td>
                                       <td><?= dateGlobalFormat($coupon['date_start']) ?></td>
                                       <td><?= dateGlobalFormat($coupon['date_end']) ?></td>
                                       <td><?= $coupon['status'] == '1' ? __("admin.enabled") : __("admin.disabled") ?></td>
                                       <td>
                                          <a href="<?= base_url('admincontrol/coupon_manage/'.$coupon['coupon_id'])  ?>" class="btn btn-primary edit-button" id="<?= $coupon['id'] ?>"><?= __("admin.edit") ?></a>
                                          <a href="<?= base_url('admincontrol/coupon_delete/'.$coupon['coupon_id'])  ?>" class="btn btn-danger delete-button" id="<?= $coupon['id'] ?>"><?= __("admin.delete") ?></a>
                                       </td>
                                    </tr>
                                    <?php } ?>
                                 </tbody>
                              </table>
                           </div>
                     </div>
                     <?php } ?>
                  </div>
               </div>
               <div role="tabpanel" class="tab-pane" id="form_tab">
                  <div class="table-rep-plugin">
                     <div class="pull-right mb-2 form-tab-main">
                        <button style="display:none;" type="button" class="btn btn-info" name="deletebuttonform" id="deletebuttonform" value="<?= __('admin.save_exit') ?>" onclick="deleteformfunc('deleteAllforms');"><?= __('admin.delete_products') ?></button>
                        <a class="btn btn-primary" href="<?= base_url('admincontrol/form_manage/')  ?>"><?= __('admin.add_new'); ?></a>
                     </div>


                      <?php if ($forms == null) {?>
                                <div class="text-center">
                                <img class="img-responsive" src="<?php echo base_url(); ?>assets/vertical/assets/images/no-data-2.png" style="margin-top:100px;margin-left: 100px;">
                                 <h3 class="m-t-40 text-center text-muted"><?= __('admin.no_forms') ?></h3></div>
                           <?php } else { ?>
                        <div class="table-responsive b-0" data-pattern="priority-columns">
                           <form method="post" name="deleteAllforms" id="deleteAllforms" action="<?php echo base_url();?>admincontrol/deleteAllforms">
                              <table class="table  table-striped">
                                 <thead class="blue-bg-form">
                                    <tr>
                                       <th><input name="checkbox[]" type="checkbox" value="" onclick="checkAllForm(this)"></th>
                                       <th ><?= __('admin.form_title'); ?></th>

                                       <th><?= __('admin.vendor'); ?></th>
                                       <th><?= __('admin.coupon_code'); ?></th>
                                       <th><?= __('admin.coupon_use'); ?></th>
                                       <th><?= __('admin.sales_commission'); ?></th>
                                       <th><?= __('admin.clicks_commission'); ?>n</th>
                                       <th><?= __('admin.total_commission'); ?></th>
                                       <th><?= __('admin.status'); ?></th>
                                       <th><?= __('admin.action'); ?></th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <?php
                                       $form_setting = $this->Product_model->getSettings('formsetting');
                                    ?>
                                    <?php foreach($forms as $form){ ?>
                                       <tr>
                                          <td ><input name="checkbox[]" type="checkbox" id="check<?php echo $form['form_id'];?>" value="<?php echo $form['form_id'];?>" onclick="checkonly(this,'check<?php echo $form['form_id'];?>')"></td>
                                          <td>
                                             <?= $form['title'] ?>
                                             <div><small>
                                                <a href="<?= $form['public_page'] ?>" target='_black'><?= __('admin.public_page'); ?></a>
                                                </small>
                                             </div>
                                             <?php
                                                if($form['form_recursion_type']){
                                                      if($form['form_recursion_type'] == 'custom'){
                                                         if($form['form_recursion'] != 'custom_time'){
                                                            echo '<b>'. __("admin.recurring") .'</b> : ' . $form['form_recursion'];
                                                         } else {
                                                            echo '<b>'. __("admin.recurring") .'</b> : '. timetosting($form['recursion_custom_time']);
                                                         }
                                                      } else{
                                                      if($form_setting['form_recursion'] == 'custom_time' ){
                                                            echo '<b>'. __("admin.recurring") .'</b> : '. timetosting($form_setting['recursion_custom_time']);
                                                      } else {
                                                         echo '<b>'. __("admin.recurring") .'</b> : '. $form_setting['form_recursion'];
                                                      }
                                                      }
                                                   }
                                             ?>
                                          </td>
                                          <td><?= $form['firstname'] ? $form['firstname'] ." ". $form['lastname'] : __("admin.admin") ?></td>
                                          <td><?= $form['coupon_code'] ? $form['coupon_code'] : 'N/A' ?></td>
                                          <td><?= ($form['coupon_name'] ? $form['coupon_name'] : 'N/A').' / '.$form['count_coupon'] ?></td>
                                          <td><?= (int)$form['count_commission'].' / '.c_format($form['total_commission']) ?></td>
                                          <td><?= (int)$form['commition_click_count'].' / '.c_format($form['commition_click']); ?></td>
                                          <td><?= c_format($form['total_commission']+$form['commition_click']); ?></td>
                                          <td><?= form_status($form['status']); ?></td>
                                          <td>
                                             <a href="<?= base_url('admincontrol/form_manage/'.$form['form_id'])  ?>" class="btn ml-0 btn-primary btn-sm edit-button" id="<?= $lang['id'] ?>"><?= __("admin.edit") ?></a>
                                             <button data-href="<?= base_url('admincontrol/form_delete/'.$form['form_id'])  ?>" class="btn ml-0 btn-danger btn-sm delete-form-button" id="<?= $lang['id'] ?>"><?= __("admin.delete") ?></button>
                                          </td>
                                       </tr>
                                    <?php } ?>
                                 </tbody>
                              </table>
                           </form>
                        </div>
                     <?php } ?>
                  </div>
               </div>
               <div role="tabpanel" class="tab-pane" id="form_coupons_tab">
                  <div class="table-rep-plugin">
                     <div class="pull-right mb-2">
                        <a class="btn btn-primary" href="<?= base_url('admincontrol/form_coupon_manage/')  ?>"><?= __('admin.add_new'); ?></a>
                     </div>
                     <?php if ($form_coupons == null) {?>
                                <div class="text-center">
                                 <img class="img-responsive" src="<?php echo base_url(); ?>assets/vertical/assets/images/no-data-2.png" style="margin-top:100px;">
                                 <h3 class="m-t-40 text-center text-muted"><?= __('admin.no_form_coupons') ?></h3>
                                </div>
                             <?php }else {?>
                                <div class="table-responsive b-0" data-pattern="priority-columns">
                           <table class="table  table-striped">
                              <thead class="blue-bg-store-page">
                                 <tr>
                                    <th ><?= __('admin.form_coupon_name'); ?></th>
                                    <th width="100px"><?= __('admin.code'); ?></th>
                                    <th width="100px"><?= __('admin.discount'); ?></th>
                                    <th width="50px"><?= __('admin.date_start'); ?></th>
                                    <th width="50px"><?= __('admin.date_end'); ?></th>
                                    <th width="50px"><?= __("admin.status") ?></th>
                                    <th width="180px"></th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <?php foreach($form_coupons as $form_coupon){ ?>
                                    <tr>
                                       <td><?= $form_coupon['name'] ?></td>
                                       <td><?= $form_coupon['code'] ?></td>
                                       <td><?= $form_coupon['type']=="P" ? getDecimalNumberFormat($form_coupon['discount'],$_SESSION['userDecimalPlace']).' %' : c_format($form_coupon['discount']) ?></td>
                                       <td><?= $form_coupon['date_start'] ?></td>
                                       <td><?= $form_coupon['date_end'] ?></td>
                                       <td><?= $lang['status'] == '0' ? __("admin.enabled") : __("admin.disabled") ?></td>
                                       <td>
                                          <a href="<?= base_url('admincontrol/form_coupon_manage/'.$form_coupon['form_coupon_id'])  ?>" class="btn btn-primary edit-button" id="<?= $lang['id'] ?>"><?= __("admin.edit") ?></a>
                                          <button data-href="<?= base_url('admincontrol/form_coupon_delete/'.$form_coupon['form_coupon_id'])  ?>" class="btn btn-danger btn-sm delete-form-button" id="<?= $lang['id'] ?>"><?= __("admin.delete") ?></button>
                                       </td>
                                    </tr>
                                 <?php } ?>
                              </tbody>
                           </table>
                        </div>
                     <?php } ?>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<?= $social_share_modal ?>
<script type="text/javascript" async="">
    $('.forms-nnnav li a').on('shown.bs.tab', function(event){
        var x = $(event.target).attr('href');
        $(".btn-submit").hide();

        if(x != '#site-fronttemplate'){
            $(".btn-submit").show();
        }
        localStorage.setItem("last_pill", x);
    });

    $('.product_tab_option').on('click', function(){
        $(".product-options").show();
    });

    $('.product_coupons_tab_option').on('click', function(){
        $(".product-options").hide();
    });

    $(document).on('ready',function() {
        var last_pill = localStorage.getItem("last_pill");
        if (last_pill == "#product_coupons_tab") {
            $(".product-options").hide();
        }else{
            $(".product-options").show();
        }
        if(last_pill){ $('[href="'+ last_pill +'"]').click() }
    });

    $temp_import_product_data = null;

    $('#bulk_products_form_btn').on('click', function(e){
        e.preventDefault();
        $("#bulk_products_form .alert-danger").remove();
        if($('#bulk_products_form input[name="file"]').val()) {
            $this = $(this);
            var fd = new FormData(document.getElementById("bulk_products_form"));

            $.ajax({
                url: '<?= base_url('admincontrol/bulkProductImport'); ?>',
                type: 'POST',
                data: fd,
                dataType: 'html',
                beforeSend:function(){$this.btn("loading");},
                complete:function(){
                    $this.btn("reset");
                    $('#manageBulkProducts').modal('hide');
                },
                success:function(response){
                    $('#manageBulkProductsConfirmation .modal-body').html(response);
                    $('#manageBulkProductsConfirmation').modal('show');

                    if(! $('#manageBulkProductsConfirmation textarea[name="product_for_import"]').length > 0) {
                        $('#manageBulkProductsConfirmation .import-products-confirm').hide();
                    } else {
                        $('#manageBulkProductsConfirmation .import-products-confirm').show();
                    }
                },
                cache: false,
                contentType: false,
                processData: false
            });
        } else {
           $("#bulk_products_form .custom-file").after('<div class="alert alert-danger"><?= __('admin.please_select_excel_file') ?></div>');
        }
    });

    $('#manageBulkProductsConfirmation .import-products-confirm').on('click', function(e){
        e.preventDefault();
        if($('#manageBulkProductsConfirmation textarea[name="product_for_import"]').val()) {
            $this = $(this);
            var data = new FormData();
            data.append( 'products', $('#manageBulkProductsConfirmation textarea[name="product_for_import"]').val());
            $.ajax({
                url: '<?= base_url('admincontrol/bulkProductImportConfirm'); ?>',
                type: 'POST',
                data: data,
                beforeSend:function(){$this.btn("loading");},
                complete:function(){
                    $this.btn("reset");
                    $('#manageBulkProductsConfirmation').modal('hide');
                },
                success:function(response){
                    $('#manageBulkProductsResult .modal-body').html(response);
                    $('#manageBulkProductsResult').modal('show');
                },
                cache: false,
                contentType: false,
                processData: false
            });
        } else {
            $("#bulk_products_form .custom-file").after('<div class="alert alert-danger"><?= __('admin.please_select_excel_file') ?></div>');
        }
    });

    $(".show-more").on('click',function(){
        $(this).parents("tfoot").remove();
        $("#product-list tr.d-none").hide().removeClass('d-none').fadeIn();
    });

    $(".delete-button").on('click',function(){
        if(!confirm("<?= __('admin.are_you_sure') ?>")) return false;
    });

    $(document).on('ready',function(){
      $('.delete-form-button').on('click',function(){
         var r = confirm("<?= __("admin.delete_form_confirmation") ?>");
         if (r == true) {
            location = $(this).data("href");
         }
         return false;
      })
    })

    $(".toggle-child-tr").on('click',function(){
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

    function checkAll(bx) {
        var cbs = document.getElementsByTagName('input');
            if(bx.checked)
        {
            document.getElementById('deletebutton').style.display = 'block';
        } else {
            document.getElementById('deletebutton').style.display = 'none';
        }
        for(var i=0; i < cbs.length; i++) {
            if(cbs[i].type == 'checkbox') {
                cbs[i].checked = bx.checked;
            }
        }
    }

    function checkAllForm(bx) {
      var cbs = document.getElementsByTagName('input');
      if(bx.checked)
      {
         document.getElementById('deletebuttonform').style.display = 'block';
         } else {
         document.getElementById('deletebuttonform').style.display = 'none';
      }
      for(var i=0; i < cbs.length; i++) {
         if(cbs[i].type == 'checkbox') {
            cbs[i].checked = bx.checked;
         }
      }
    }

    function checkonly(bx,checkid) {
        if($(".list-checkbox:checked").length){
            $('#deletebutton').show();
        } else {
            $('#deletebutton').hide();
        }
    }

    function deleteuserlistfunc(formId){
        if(! confirm("<?= __('admin.are_you_sure') ?>")) return false;

        $('#'+formId).submit();
    }

    function deleteformfunc(formId){
      if(! confirm("<?= __('admin.are_you_sure') ?>")) return false;

      $('#'+formId).submit();
    }

    $("#filter-form").on("submit",function(){
        getPage('<?= base_url("admincontrol/listproduct_ajax/") ?>/1');
        return false;
    })

    $(".select-category, .select-vendor").on("change",function(){
        $("#filter-form").submit();
    })

    function getPage(url){
       var category_id = $('.select-category').find(":selected").val();
       var seller_id = $('.select-vendor').find(":selected").val();
       $this = $(this);
       $.ajax({
            url:url,
            type:'POST',
            dataType:'json',
            data:$("#filter-form").serialize(),
            beforeSend:function(){$this.btn("loading");},
            complete:function(){$this.btn("reset");},
            success:function(json){
               if(json['view']){
                  $("#tech-companies-1 tbody").html(json['view']);
                  $("#tech-companies-1").show();
               } else {
                  $(".empty-div").removeClass("d-none");
                  $("#tech-companies-1").hide();
               }

               $("#tech-companies-1 .pagination-td").html(json['pagination']);
            },
       });
    }

    $(document).on('click', '.export-products-btn', function() {
        exportProducts($(this), 0);
    });

    $(document).on('click', '.export-structure-btn', function() {
        exportProducts($(this), 1);
    });

    function exportProducts(thatBtn, structure_only  = 0) {
        $.ajax({
            url:'<?= base_url("admincontrol/exportproduct/") ?>',
            type:'POST',
            dataType:'json',
            data:{structure_only:structure_only},
                beforeSend:function(){thatBtn.btn("loading");},
                complete:function(){thatBtn.btn("reset");},
                success:function(json){
            if(json['download']){
                window.location.href = json['download'];
            }
        },
        });
    }


    getPage('<?= base_url("admincontrol/listproduct_ajax/") ?>/1');
        $("#tech-companies-1 .pagination-td").delegate("a","click",function(){
        getPage($(this).attr("href"));
        return false;
    })

    function closePopup(){
       $('.popupbox').hide();
       $('#overlay').hide();
    }
   function generateCode(affiliate_id){
        $('.popupbox').show();
        $('#overlay').show();
        $('.modalpopup-body').load('<?php echo base_url();?>admincontrol/generateproductcode/'+affiliate_id);
        $('.popupbox').ready(function () {
            $('.backdrop, .box').animate({
            'opacity': '.50'
            }, 300, 'linear');
            $('.box').animate({
                'opacity': '1.00'
            }, 300, 'linear');
            $('.backdrop, .box').css('display', 'block');
        });
   }

   $(document).delegate(".delete-product",'click',function(){
       if(! confirm("<?= __('admin.are_you_sure') ?>")) return false;
       window.location = $("#deleteAllproducts").attr("action") + "?delete_id=" + $(this).attr("data-id");
   })
</script>