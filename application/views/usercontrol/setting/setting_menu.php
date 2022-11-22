<ul class="nav nav-pills nav-stacked setting-nnnav" role="tablist">
	<li class="nav-item">
		<a class="nav-link <?= ($vendorSettingTab == 'mlm_levels') ? ' active show' : '' ?>" href="<?php echo base_url('usercontrol/mlm_levels/');?>">
			<?= __('user.page_title_vendor_mlm_levels') ?></a>
	</li>

	<li class="nav-item">
		<a class="nav-link <?= ($vendorSettingTab == 'mlm_settings') ? ' active show' : '' ?>" href="<?php echo base_url('usercontrol/mlm_settings/');?>">
			<?= __('user.page_title_vendor_mlm_settings') ?></a>
	</li>

	<li class="nav-item">
		<a class="nav-link <?= ($vendorSettingTab == 'wallet_setting') ? ' active show' : '' ?>" href="<?php echo base_url('usercontrol/wallet_setting/');?>">
			<?= __('user.page_title_vendor_wallet_settings') ?></a>
	</li>
</ul>