<?php
    $db =& get_instance();
    $userdetails=$db->Product_model->userdetails('user',1);
    $store_setting =$db->Product_model->getSettings('store');
    $SiteSetting =$db->Product_model->getSettings('site');
    $refer_status =$db->Product_model->my_refer_status($userdetails['id']);
    $db->Product_model->ping($userdetails['id']);
    $vendor_setting = $db->Product_model->getSettings('vendor');
    $market_vendor = $db->Product_model->getSettings('market_vendor');
    $membership = $db->Product_model->getSettings('membership');
    $user_side_bar_color = $db->Product_model->getSettings('theme','user_side_bar_color');
    $user_side_bar_text_color = $db->Product_model->getSettings('theme','user_side_bar_text_color');
    $marketvendorpanelmode = $market_vendor['marketvendorpanelmode'] ?? 0;
    $userdashboard_settings = getUserDashboardSettings();
?>
<div class="left-menu user-left-menu" style="background-color: <?= $user_side_bar_color['user_side_bar_color'] ?>;">
    <div class="collapse d-block">
      	<ul class="navbar-nav scroll-wrap">

      		<li class="nav-item dropdown l-m-i-1">
        		<a class="nav-link d-flex" href="<?= base_url('usercontrol/dashboard'); ?>" style="color: <?= $user_side_bar_text_color['user_side_bar_text_color'] ?>;">
          			<div><?= __('user.page_title_dashboard') ?></div>
          		</a>
          	</li>

          	<!-------Admin Marketplace Links Conditions------->
          		<?php if(allowMarketVendorPanelSections($marketvendorpanelmode['marketvendorpanelmode'], $userdetails['is_vendor'])) { ?>
          	 	<li class="nav-item dropdown l-m-i-6">
		         <a class="nav-link d-flex" href="<?= base_url('usercontrol/store_markettools'); ?>" style="color: <?= $user_side_bar_text_color['user_side_bar_text_color'] ?>;">
		         	<?= __('user.page_title_my_links') ?>
		         </a>
		        </li>
		    	<?php } ?>
		    <!-------Admin Marketplace Links Conditions------->


            <!-------User Activity links------->
            <li class="nav-item dropdown l-m-i-6">
		        		<a class="nav-link dropdown-toggle" href="javascript:void(0)" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: <?= $user_side_bar_text_color['user_side_bar_text_color'] ?>;">
		          			<div><?= __('user.page_title_my_activity') ?></div>
		          			<div><i class="lni lni-chevron-right"></i></div>
		          		</a>
	          		<div class="dropdown-menu">
	          			<a class="dropdown-item theme-color" href="<?= base_url('usercontrol/store_orders');?>"><?= __('user.page_title_my_orders') ?></a>
	          			<a class="dropdown-item theme-color" href="<?= base_url('ReportController/user_reports');?>"><?= __('user.page_title_user_reports') ?></a>
	          			<a class="dropdown-item theme-color" href="<?= base_url('usercontrol/store_logs');?>"><?= __('user.page_title_my_logs') ?></a>
	          		</div>
	        </li>
	        <!-------User Activity links------->


	        <!-------User Wallet------->
			<!-- Hide wallet feature -->
            <!-- <li class="nav-item dropdown l-m-i-6">
		        		<a class="nav-link dropdown-toggle" href="javascript:void(0)" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: <?= $user_side_bar_text_color['user_side_bar_text_color'] ?>;">
		          			<div><?= __('user.page_title_wallet') ?></div>
		          			<div><i class="lni lni-chevron-right"></i></div>
		          		</a>
	          		<div class="dropdown-menu">
				        <a class="dropdown-item theme-color" href="<?= base_url('usercontrol/mywallet'); ?>" style="color: <?= $user_side_bar_text_color['user_side_bar_text_color'] ?>;">
				         	<?= __('user.page_title_my_wallet') ?>
				        </a>
	          		    <a class="dropdown-item theme-color" href="<?= base_url('usercontrol/wallet_requests_list'); ?>"><?= __('user.usercontrol_wallet_requests_list') ?>
	          			</a>
	        </li> -->
	        <!-------User Wallet------->


	         <!-------User Payments------->
			 <!-- Hide Payments feature -->
            <!-- <li class="nav-item dropdown l-m-i-6">
		        		<a class="nav-link dropdown-toggle" href="javascript:void(0)" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: <?= $user_side_bar_text_color['user_side_bar_text_color'] ?>;">
		          			<div><?= __('user.page_title_payments') ?></div>
		          			<div><i class="lni lni-chevron-right"></i></div>
		          		</a>
	          		<div class="dropdown-menu">
				        <a class="dropdown-item theme-color" href="<?= base_url('usercontrol/all_transaction'); ?>" style="color: <?= $user_side_bar_text_color['user_side_bar_text_color'] ?>;">
				         	<?= __('user.page_title_all_trans_user') ?>
				         </a>
	          			<a class="dropdown-item theme-color" href="<?= base_url('usercontrol/uncompleted_payments');?>"><?= __('user.menu_uncompleted_payments') ?></a>
	          		</div>
	        </li> -->
	        <!-------User Payments------->



            <!-------vendor marketing menu------->
                <?php if((isset($userdetails['is_vendor']) && $userdetails['is_vendor']) && ((int)$market_vendor['marketvendorstatus'] == 1 )) { ?>
		        <li class="nav-item dropdown l-m-i-6">
	        		<a class="nav-link dropdown-toggle" href="javascript:void(0)" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: <?= $user_side_bar_text_color['user_side_bar_text_color'] ?>;">
	          			<div><?= __('user.page_title_marketing') ?></div>
	          			<div><i class="lni lni-chevron-right"></i></div>
	          		</a>

		            <div class="dropdown-menu">
			            <a class="dropdown-item" href="<?php echo base_url('usercontrol/programs/');?>">
	          				<?= __('user.ven_programs') ?>
	          			</a>
						<a class="dropdown-item" href="<?php echo base_url('usercontrol/integration_tools/');?>">
						    <?= __('user.page_title_campaigns') ?>
						</a>
						<a class="dropdown-item" href="<?php echo base_url('usercontrol/integration/');?>">
					        <?= __('user.page_title_plugins') ?>
					    </a>
					    <a class="dropdown-item" href="<?php echo base_url('usercontrol/mlm_levels/');?>">
		        		    <?= __('user.page_title_vendor_setting') ?>
			            </a>
				    </div>
				</li>
		            <?php } ?>
		        <!-------vendor marketing menu------->



                    <!-------vendor store menu------->
        	        <?php if((isset($userdetails['is_vendor']) && $userdetails['is_vendor']) && (int)$vendor_setting['storestatus'] == 1 && (int)$store_setting['status'] == 1){ ?>
    		        <li class="nav-item dropdown l-m-i-6">
		        		<a class="nav-link dropdown-toggle" href="javascript:void(0)" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: <?= $user_side_bar_text_color['user_side_bar_text_color'] ?>;">
		          			<div><?= __('user.page_title_vendor_store') ?></div>
		          			<div><i class="lni lni-chevron-right"></i></div>
		          		</a>

			          		<div class="dropdown-menu">
			          			<a class="dropdown-item" href="<?php echo base_url('usercontrol/store_dashboard/');?>">
		    		        	    <?= __('user.page_title_store_dashboard') ?>
		    		        	</a>
		    		        	<a class="dropdown-item" href="<?php echo base_url('usercontrol/store_products/');?>">
		    		        	    <?= __('user.page_title_store_products') ?>
		    		        	</a>
		    		        	<!-- <a class="dropdown-item" href="<?php echo base_url('usercontrol/sales_products/');?>">
		    		        	    <?= __('user.page_title_store_sales_products') ?>
		    		        	</a> -->
		    		        	<!-- <a class="dropdown-item" href="<?php echo base_url('usercontrol/store_coupon/');?>">
		    		        	    <?= __('user.page_title_store_coupons') ?>
		    		        	</a> -->
		    		        	<a class="dropdown-item" href="<?php echo base_url('usercontrol/store_setting/');?>">
		    		        	    <?= __('user.page_title_store_setting') ?>
		    		        	</a>
			          		</div>
	        			</li>
        	        <?php } ?>
           <!-------vendor store menu------->



		    <!-------Vendor deposits------->
                <?php if((isset($userdetails['is_vendor']) && $userdetails['is_vendor']) == 1){ ?>
	          	  <!-- <li class="nav-item dropdown l-m-i-6">
	                    <a class="dropdown-item" href="<?php echo base_url('usercontrol/my_deposits/');?>">
		        		    <?= __('user.page_title_my_deposits') ?>
			            </a>
			      </li> -->
                <?php } ?>
            <!-------Vendor deposits------->



             <!-------User Network------->
             <?php if($refer_status) { ?>
			<li class="nav-item dropdown l-m-i-6">
				<a class="dropdown-item theme-color" href="<?= base_url('usercontrol/my_network'); ?>"><?= __('user.page_title_my_network') ?>
				</a>
          	</li>
          	<?php } ?>
          	<!-------User Network------->




            <!-------User tickets------->
            <?php if(isShowUserControlParts($userdashboard_settings['tickets_page'])){ ?>
			<li class="nav-item dropdown l-m-i-6">
        		<a class="nav-link d-flex" href="<?= base_url('usercontrol/tickets'); ?>" style="color: <?= $user_side_bar_text_color['user_side_bar_text_color'] ?>;">
        			<?= __('user.page_title_tickets') ?>
          		</a>
          	</li>
          	<?php } ?>
          	<!-------User tickets------->

	        <?php if(($membership['status'] == 1) || (($membership['status'] == 2) && ($userdetails['is_vendor'] == 1)) || (($membership['status'] == 3) && ($userdetails['is_vendor'] == 0))){ ?>
		        	<li class="nav-item dropdown l-m-i-6">
		        		<a class="nav-link dropdown-toggle" href="javascript:void(0)" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: <?= $user_side_bar_text_color['user_side_bar_text_color'] ?>;">
		          			<div><?= __('user.page_title_membership') ?></div>
		          			<div><i class="lni lni-chevron-right"></i></div>
		          		</a>
		          		<div class="dropdown-menu">
		          			<a class="dropdown-item theme-color" href="<?= base_url('usercontrol/purchase_plan');?>">
		          				<?= __('user.page_title_buy_membership') ?>
		          				</a>
		          			<a class="dropdown-item theme-color" href="<?= base_url('usercontrol/purchase_history');?>">
		          				<?= __('user.page_title_purchase_history') ?>
		          			</a>
		          		</div>
        			</li>
		    <?php } ?>

	        <!--User contact us page-->
	        <?php if(isShowUserControlParts($userdashboard_settings['contact_us_page'])){ ?>
	        <li class="nav-item dropdown l-m-i-6">
        		<a class="nav-link d-flex" href="<?= base_url('usercontrol/contact-us'); ?>" style="color: <?= $user_side_bar_text_color['user_side_bar_text_color'] ?>;">
        			<?= __('user.page_title_contact_admin') ?>
          		</a>
          	</li>
          	<?php } ?>
          	<!--User contact us page-->
      	</ul>
    </div>
</div>