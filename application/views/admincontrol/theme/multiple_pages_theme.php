<style>

	#tab_settings table.table > tbody > tr > td, #tab_settings table.table > tfoot > tr > td, #tab_settings table.table > thead > tr > td {

		padding: 5px 12px !important;

		vertical-align: middle !important;

	}



	#tab_settings .home_sections_positions_loading,
	#tab_settings .homepages_top_menu_positions_loading {

		margin:0px !important;

		padding:0px !important;

	}

	.homepage_top_menu_pages .homepages_top_menu_positions_loading{
		position: absolute;
	    top: 50%;
	    left: 50%;
	    transform: translate(-50%, -50%);
	}


	.thead-tr-loader {

		display: block;

		position: relative;

		height: 0.5rem;

		width: 1.5rem;

		color: #467fcf;

		top: 15px;

	}



	.thead-tr-loader:before {

		border-radius: 50%;

		border: 3px solid currentColor;

		opacity: .15;

	}



	.thead-tr-loader:before, .thead-tr-loader:after {

		width: 1.5rem;

		height: 1.5rem;

		margin: -1.25rem 0 0 -1.25rem;

		position: absolute;

		content: '';

		top: 50%;

		left: 50%;

	}



	.thead-tr-loader:after {

		-webkit-animation: loader .6s linear;

		animation: loader .6s linear;

		-webkit-animation-iteration-count: infinite;

		animation-iteration-count: infinite;

		border-radius: 50%;

		border: 3px solid;

		border-color: transparent;

		border-top-color: currentColor;

		box-shadow: 0 0 0 1px transparent;

	}
</style>

<?php if($this->session->flashdata('success')){?>

<div class="alert alert-success alert-dismissable">

	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

<?php echo $this->session->flashdata('success'); ?> </div>

<?php } ?>

<?php if($this->session->flashdata('error')){?>

<div class="alert alert-danger alert-dismissable">

	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

<?php echo $this->session->flashdata('error'); ?> </div>

<?php } ?>

<style>

legend {

background-color: gray;

color: white;

padding: 5px 10px;

}

</style>

<span id="alertdiv_2">

	

</span>

<div class="card">

	<div class="card-body">

		<form class="form-horizontal" autocomplete="off" method="post" enctype="multipart/form-data" action="" id="admin-form">

			<div class="row">

				<div class="col-sm-12">

					<ul class="nav nav-pills nav-stacked setting-nnnav" role="tablist">

					    

					    <li class="nav-item">

							<a class="nav-link active show" href="#tab_home" data-toggle="tab" role="tab">

							<?= __('admin.theme_home') ?></a>

						</li>

						<li class="nav-item">

							<a class="nav-link" href="#tab_sliders" data-toggle="tab" role="tab">

							<?= __('admin.theme_sliders') ?></a>

						</li>

						<li class="nav-item">

							<a class="nav-link"  href="#tab_home_content" data-toggle="tab" role="tab">

							<?= __('admin.theme_home_content') ?></a>

						</li>

						<li class="nav-item">

							<a class="nav-link" href="#tab_sections" data-toggle="tab" role="tab">

							<?= __('admin.theme_sections') ?></a>

						</li>

							<li class="nav-item">

							<a class="nav-link"  href="#tab_home_videos" data-toggle="tab" role="tab">

							<?= __('admin.theme_home_videos') ?></a>

						</li>

						<li class="nav-item">

							<a class="nav-link"  href="#tab_recommendation" data-toggle="tab" role="tab">

							<?= __('admin.theme_recommendation') ?></a>

						</li>

						<li class="nav-item">

							<a class="nav-link"  href="#tab_faq" data-toggle="tab" role="tab">

							<?= __('admin.theme_faq') ?></a>

						</li>

						<li class="nav-item">

							<a class="nav-link"  href="#tab_page_pages" data-toggle="tab" role="tab">Pages & Links</a>

						</li>

						<li class="nav-item">

							<a class="nav-link" href="#tab_settings" data-toggle="tab" role="tab"  >

							<?= __('admin.theme_settings') ?></a>

						</li>

						<li class="nav-item">

							<a class="nav-link" href="#theme_settings" data-toggle="tab" role="tab"  >

							<?= __('admin.theme') ?></a>

						</li>

						<li class="nav-item">

							<a class="nav-link" href="<?php echo base_url(); ?>"target=_blank>

							<?= __('admin.view_site') ?></a>

						</li>

					</ul>

				</div>

							</div>

<div class="col-sm-12">

<div class="tab-content">
<div role="tabpanel" class="tab-pane p-3" id="theme_settings">

	<div class="row">

		<div class="col-12">

			<div class="card m-b-30">
				<div class="card-header">

					<h4 class="card-title pull-left"><?= __('admin.multiple_pages_theme_setting') ?></h4>

				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-sm-6 multiple-pages-theme">
                            <fieldset>
                                <legend><?= __('admin.theme_setting') ?></legend>
                                <div class="row d-flex theme-setting-row">
                                    <div class="col-sm-6">
                                        <label class="control-label"><?= __('admin.header_color_before_scroll') ?></label>
                                    </div>
                                    <div class="col-sm-4">
                                        <input class="form-control color-picker front_header_color_before_scroll" type="color" name="theme[front_header_color_before_scroll]" value="<?= $theme['front_header_color_before_scroll'] != '' ? $theme['front_header_color_before_scroll'] : 'transparent' ?>">
                                    </div>
                                    <div class="col-sm-2">
                                        <button type="button" class="btn btn-primary default-front-theme-setting" value="front_header_color_before_scroll"><?= __('admin.default') ?></button>
                                    </div>
                                </div>
                                <div class="row d-flex theme-setting-row">
                                    <div class="col-sm-6">
                                        <label class="control-label"><?= __('admin.header_button_color_before_scroll') ?></label>
                                    </div>
                                    <div class="col-sm-4">
                                        <input class="form-control color-picker front_header_button_color_before_scroll" type="color" name="theme[front_header_button_color_before_scroll]" value="<?= $theme['front_header_button_color_before_scroll'] != '' ? $theme['front_header_button_color_before_scroll'] : '#E98024' ?>">
                                    </div>
                                    <div class="col-sm-2">
                                        <button type="button" class="btn btn-primary default-front-theme-setting" value="front_header_button_color_before_scroll"><?= __('admin.default') ?></button>
                                    </div>
                                </div>
                                <div class="row d-flex theme-setting-row">
                                    <div class="col-sm-6">
                                        <label class="control-label"><?= __('admin.header_button_text_color_before_scroll') ?></label>
                                    </div>
                                    <div class="col-sm-4">
                                        <input class="form-control color-picker front_header_button_text_color_before_scroll" type="color" name="theme[front_header_button_text_color_before_scroll]" value="<?= $theme['front_header_button_text_color_before_scroll'] != '' ? $theme['front_header_button_text_color_before_scroll'] : '#ffffff' ?>">
                                    </div>
                                    <div class="col-sm-2">
                                        <button type="button" class="btn btn-primary default-front-theme-setting" value="front_header_button_text_color_before_scroll"><?= __('admin.default') ?></button>
                                    </div>
                                </div>
                                <div class="row d-flex theme-setting-row">
                                    <div class="col-sm-6">
                                        <label class="control-label"><?= __('admin.header_button_hover_color_before_scroll') ?></label>
                                    </div>
                                    <div class="col-sm-4">
                                        <input class="form-control color-picker front_header_button_hover_color_before_scroll" type="color" name="theme[front_header_button_hover_color_before_scroll]" value="<?= $theme['front_header_button_hover_color_before_scroll'] != '' ? $theme['front_header_button_hover_color_before_scroll'] : '#F66B14' ?>">
                                    </div>
                                    <div class="col-sm-2">
                                        <button type="button" class="btn btn-primary default-front-theme-setting" value="front_header_button_hover_color_before_scroll"><?= __('admin.default') ?></button>
                                    </div>
                                </div>
                                <div class="row d-flex theme-setting-row">
                                    <div class="col-sm-6">
                                        <label class="control-label"><?= __('admin.header_color_after_scroll') ?></label>
                                    </div>
                                    <div class="col-sm-4">
                                        <input class="form-control color-picker front_header_color_after_scroll" type="color" name="theme[front_header_color_after_scroll]" value="<?= $theme['front_header_color_after_scroll'] != '' ? $theme['front_header_color_after_scroll'] : '#E98024' ?>">
                                    </div>
                                    <div class="col-sm-2">
                                        <button type="button" class="btn btn-primary default-front-theme-setting" value="front_header_color_after_scroll"><?= __('admin.default') ?></button>
                                    </div>
                                </div>
                                <div class="row d-flex theme-setting-row">
                                    <div class="col-sm-6">
                                        <label class="control-label"><?= __('admin.header_button_color_after_scroll') ?></label>
                                    </div>
                                    <div class="col-sm-4">
                                        <input class="form-control color-picker front_header_button_color_after_scroll" type="color" name="theme[front_header_button_color_after_scroll]" value="<?= $theme['front_header_button_color_after_scroll'] != '' ? $theme['front_header_button_color_after_scroll'] : '#ffffff' ?>">
                                    </div>
                                    <div class="col-sm-2">
                                        <button type="button" class="btn btn-primary default-front-theme-setting" value="front_header_button_color_after_scroll"><?= __('admin.default') ?></button>
                                    </div>
                                </div>
                                <div class="row d-flex theme-setting-row">
                                    <div class="col-sm-6">
                                        <label class="control-label"><?= __('admin.header_button_text_color_after_scroll') ?></label>
                                    </div>
                                    <div class="col-sm-4">
                                        <input class="form-control color-picker front_header_button_text_color_after_scroll" type="color" name="theme[front_header_button_text_color_after_scroll]" value="<?= $theme['front_header_button_text_color_after_scroll'] != '' ? $theme['front_header_button_text_color_after_scroll'] : '#E98024' ?>">
                                    </div>
                                    <div class="col-sm-2">
                                        <button type="button" class="btn btn-primary default-front-theme-setting" value="front_header_button_text_color_after_scroll"><?= __('admin.default') ?></button>
                                    </div>
                                </div>
                                <div class="row d-flex theme-setting-row">
                                    <div class="col-sm-6">
                                        <label class="control-label"><?= __('admin.header_button_hover_color_after_scroll') ?></label>
                                    </div>
                                    <div class="col-sm-4">
                                        <input class="form-control color-picker front_header_button_hover_color_after_scroll" type="color" name="theme[front_header_button_hover_color_after_scroll]" value="<?= $theme['front_header_button_hover_color_after_scroll'] != '' ? $theme['front_header_button_hover_color_after_scroll'] : '#FC535E' ?>">
                                    </div>
                                    <div class="col-sm-2">
                                        <button type="button" class="btn btn-primary default-front-theme-setting" value="front_header_button_hover_color_after_scroll"><?= __('admin.default') ?></button>
                                    </div>
                                </div>
                                <div class="row d-flex theme-setting-row">
                                    <div class="col-sm-6">
                                        <label class="control-label"><?= __('admin.button_color') ?></label>
                                    </div>
                                    <div class="col-sm-4">
                                        <input class="form-control color-picker front_button_color" type="color" name="theme[front_button_color]" value="<?= $theme['front_button_color'] != '' ? $theme['front_button_color'] : '#f1a05a' ?>">
                                    </div>
                                    <div class="col-sm-2">
                                        <button type="button" class="btn btn-primary default-front-theme-setting" value="front_button_color"><?= __('admin.default') ?></button>
                                    </div>
                                </div>
                                <div class="row d-flex theme-setting-row">
                                    <div class="col-sm-6">
                                        <label class="control-label"><?= __('admin.button_hover_color') ?></label>
                                    </div>
                                    <div class="col-sm-4">
                                        <input class="form-control color-picker front_button_hover_color" type="color" name="theme[front_button_hover_color]" value="<?= $theme['front_button_hover_color'] != '' ? $theme['front_button_hover_color'] : '#F66B14' ?>">
                                    </div>
                                    <div class="col-sm-2">
                                        <button type="button" class="btn btn-primary default-front-theme-setting" value="front_button_hover_color"><?= __('admin.default') ?></button>
                                    </div>
                                </div>
                                <div class="row d-flex theme-setting-row">
                                    <div class="col-sm-6">
                                        <label class="control-label"><?= __('admin.button_text_color') ?></label>
                                    </div>
                                    <div class="col-sm-4">
                                        <input class="form-control color-picker front_button_text_color" type="color" name="theme[front_button_text_color]" value="<?= $theme['front_button_text_color'] != '' ? $theme['front_button_text_color'] : '#ffffff' ?>">
                                    </div>
                                    <div class="col-sm-2">
                                        <button type="button" class="btn btn-primary default-front-theme-setting" value="front_button_text_color"><?= __('admin.default') ?></button>
                                    </div>
                                </div>
                                <div class="row d-flex theme-setting-row">
                                    <div class="col-sm-6">
                                        <label class="control-label"><?= __('admin.runner_bar_color') ?></label>
                                    </div>
                                    <div class="col-sm-4">
                                        <input class="form-control color-picker front_runner_bar_color" type="color" name="theme[front_runner_bar_color]" value="<?= $theme['front_runner_bar_color'] != '' ? $theme['front_runner_bar_color'] : '#E98024' ?>">
                                    </div>
                                    <div class="col-sm-2">
                                        <button type="button" class="btn btn-primary default-front-theme-setting" value="front_runner_bar_color"><?= __('admin.default') ?></button>
                                    </div>
                                </div>
                                <div class="row d-flex theme-setting-row">
                                    <div class="col-sm-6">
                                        <label class="control-label"><?= __('admin.runner_bar_text_color') ?></label>
                                    </div>
                                    <div class="col-sm-4">
                                        <input class="form-control color-picker front_runner_bar_text_color" type="color" name="theme[front_runner_bar_text_color]" value="<?= $theme['front_runner_bar_text_color'] != '' ? $theme['front_runner_bar_text_color'] : '#ffffff' ?>">
                                    </div>
                                    <div class="col-sm-2">
                                        <button type="button" class="btn btn-primary default-front-theme-setting" value="front_runner_bar_text_color"><?= __('admin.default') ?></button>
                                    </div>
                                </div>
                                <div class="row d-flex theme-setting-row">
                                    <div class="col-sm-6">
                                        <label class="control-label"><?= __('admin.theme_titles_color') ?></label>
                                    </div>
                                    <div class="col-sm-4">
                                        <input class="form-control color-picker front_theme_text_color" type="color" name="theme[front_theme_text_color]" value="<?= $theme['front_theme_text_color'] != '' ? $theme['front_theme_text_color'] : '#E98024' ?>">
                                    </div>
                                    <div class="col-sm-2">
                                        <button type="button" class="btn btn-primary default-front-theme-setting" value="front_theme_text_color"><?= __('admin.default') ?></button>
                                    </div>
                                </div>
                                <div class="row d-flex theme-setting-row">
                                    <div class="col-sm-6">
                                        <label class="control-label"><?= __('admin.faq_before_hover_color') ?></label>
                                    </div>
                                    <div class="col-sm-4">
                                        <input class="form-control color-picker front_faq_before_hover_color" type="color" name="theme[front_faq_before_hover_color]" value="<?= $theme['front_faq_before_hover_color'] != '' ? $theme['front_faq_before_hover_color'] : '#6A6A6A' ?>">
                                    </div>
                                    <div class="col-sm-2">
                                        <button type="button" class="btn btn-primary default-front-theme-setting" value="front_faq_before_hover_color"><?= __('admin.default') ?></button>
                                    </div>
                                </div>
                                <div class="row d-flex theme-setting-row">
                                    <div class="col-sm-6">
                                        <label class="control-label"><?= __('admin.faq_after_hover_color') ?></label>
                                    </div>
                                    <div class="col-sm-4">
                                        <input class="form-control color-picker front_faq_after_hover_color" type="color" name="theme[front_faq_after_hover_color]" value="<?= $theme['front_faq_after_hover_color'] != '' ? $theme['front_faq_after_hover_color'] : '#E98024' ?>">
                                    </div>
                                    <div class="col-sm-2">
                                        <button type="button" class="btn btn-primary default-front-theme-setting" value="front_faq_after_hover_color"><?= __('admin.default') ?></button>
                                    </div>
                                </div>
                                <div class="row d-flex theme-setting-row">
                                    <div class="col-sm-6">
                                        <label class="control-label"><?= __('admin.bottom_banner_before_footer') ?></label>
                                    </div>
                                    <div class="col-sm-4">
                                        <input class="form-control color-picker bottom_banner_before_footer" type="color" name="theme[bottom_banner_before_footer]" value="<?= $theme['bottom_banner_before_footer'] != '' ? $theme['bottom_banner_before_footer'] : '#D4731E' ?>">
                                    </div>
                                    <div class="col-sm-2">
                                        <button type="button" class="btn btn-primary default-front-theme-setting" value="bottom_banner_before_footer"><?= __('admin.default') ?></button>
                                    </div>
                                </div>
                                <div class="row d-flex theme-setting-row">
                                    <div class="col-sm-6">
                                        <label class="control-label"><?= __('admin.footer_color') ?></label>
                                    </div>
                                    <div class="col-sm-4">
                                        <input class="form-control color-picker front_footer_color" type="color" name="theme[front_footer_color]" value="<?= $theme['front_footer_color'] != '' ? $theme['front_footer_color'] : '#363839' ?>">
                                    </div>
                                    <div class="col-sm-2">
                                        <button type="button" class="btn btn-primary default-front-theme-setting" value="front_footer_color"><?= __('admin.default') ?></button>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                    <div class="row">
                    	<div class="col-sm-12 text-right">
		                    <button type="submit" id="securitform" class="btn btn-sm btn-primary save-theme-settings"><?= __('admin.save_settings') ?></button>
		                </div>
                    </div>
				</div>
			</div>

		</div>

	</div>

</div>

<div role="tabpanel" class="tab-pane p-3 active show" id="tab_home">

	<div class="row">

		<div class="col-12">

			<div class="card m-b-30">

				<div class="card-header">

					<h4 class="card-title pull-left"><?= __('admin.theme_home') ?></h4>

				</div>

				<div class="card-body">

				    <div class="row">

                        <div class="col-xl-9">

                            <img class="img-thumbnail" src="<?php echo base_url("assets/images/themes/multiple_pages.png") ?>" height="550" width="1000" >

                        </div>

                        <div class="col-xl-3">

                            <div class="mini-stat clearfix bg-white">

                            <ul>

                                <h5 class="counter mt-0 text-primary"><?php echo __( 'admin.theme_support_features') ?></h5>

                                <li><h6 class="counter mt-0 text-primary"><?php echo __( 'admin.support_dynamic_slider') ?></h6></li>

                                <li><h6 class="counter mt-0 text-primary"><?php echo __( 'admin.support_dynamic_sections') ?></h6></li>

                                <li><h6 class="counter mt-0 text-primary"><?php echo __( 'admin.support_dynamic_recommendation') ?></h6></li>

                                <li><h6 class="counter mt-0 text-primary"><?php echo __( 'admin.support_dynamic_content') ?></h6></li>

                                <li><h6 class="counter mt-0 text-primary"><?php echo __( 'admin.support_dynamic_videos') ?></h6></li>

                                <li><h6 class="counter mt-0 text-primary"><?php echo __( 'admin.support_dynamic_pages') ?></h6></li>

                                <li><h6 class="counter mt-0 text-primary"><?php echo __( 'admin.support_drag_and_drop') ?></h6></li>

                                <li><h6 class="counter mt-0 text-primary"><?php echo __( 'admin.support_terms_page') ?></h6></li>

                                <li><h6 class="counter mt-0 text-primary"><?php echo __( 'admin.support_contact_us_page') ?></h6></li>

                                <li><h6 class="counter mt-0 text-primary"><?php echo __( 'admin.support_faq_dynamic_page') ?></h6></li>

                                <li><h6 class="counter mt-0 text-primary"><?php echo __( 'admin.support_dynamic_bottom_menus') ?></h6></li>

                            </ul>

                            </div>

                        </div>

                    </div>

				</div>

			</div> 

		</div> 

	</div>

</div>

										

<div role="tabpanel" class="tab-pane p-3" id="tab_sliders">

<div class="col-12">

	<div class="card m-b-30">

		<div class="card-header">

			<h4 class="card-title pull-left"><?= __('admin.top_slider_settings') ?></h4>

			

		</div>

		<div class="card-body">

			<table class="table">

				<tbody >

					<tr>
						<td width="200"><?= __('admin.auto_play_slider') ?></td>

						<td>

							<?php if(isset($theme_multiple_page_settings['top_slider_auto_play']) && $theme_multiple_page_settings['top_slider_auto_play'] == 1) { ?>
								<i class="fa fa-toggle-on" style="cursor: pointer;color: green;font-size: 35px;width:50px" onclick="change_theme_multiple_page(this, 'top_slider_auto_play');" id="top_slider_auto_play-1"></i>
							<?php } else { ?>
								<i class="fa fa-toggle-off" style="cursor: pointer;color: red;font-size: 35px;width:50px" onclick="change_theme_multiple_page(this, 'top_slider_auto_play');" id="top_slider_auto_play-0"></i>
							<?php } ?>

							<input class="theme_multiple_page_settings" type="hidden" name="theme_multiple_page[top_slider_auto_play]" value="<?= $theme_multiple_page_settings['top_slider_auto_play'] ?? 0 ?>">

						</td>
					</tr>

					<tr class="top_slider_auto_play_timing" <?= (isset($theme_multiple_page_settings['top_slider_auto_play']) && $theme_multiple_page_settings['top_slider_auto_play'] == 1) ? "" : 'style="display:none;"' ?> >
						<td><?= __('admin.auto_play_slider_timing') ?></td>

						<td>

							<input type="number" class="form-control theme_multiple_page_settings" name="theme_multiple_page[top_slider_auto_timing]" value="<?= $theme_multiple_page_settings['top_slider_auto_timing'] ?? 10 ?>">
							<small><?= __('admin.the_default_timing_10_sec');?></small>
						</td>
					</tr>

				</tbody>

			</table>

			<div class="row">

				<button type="button" class="btn btn-primary btn-submit-theme"> <?= __('admin.submit') ?> </button>

				<span class="loading-submit"></span>

			</div>

		</div>
		<div class="card-header">

			<h4 class="card-title pull-left"><?= __('admin.top_sliders_listing') ?></h4>

			<div class="pull-right">

				<a class="btn btn-primary" href="<?= base_url('themes/add_new_slider/')  ?>"><?= __('admin.add_slider') ?></a>

			</div>

		</div>
		<div class="card-body">
			<div class="table-responsive">

				<!-- <small class="text-muted"><?= __('admin.change_position_by_simply_drag_drop_rows') ?></small> -->

				<table class="table-hover table-striped table">

					<thead>

						<tr>

							<th><?= __('admin.title') ?></th>

							<th width="450"><?= __('admin.description') ?></th>

							<th><?= __('admin.image') ?></th>

							<th><?= __('admin.link') ?></th>

							<th><?= __('admin.button_text') ?></th>

							<th><?= __('admin.status') ?></th>

							<th><?= __('admin.action')?></th>

						</tr>

					</thead>

					<tbody data-whe_column="section_id" data-pos_column="position" data-table="theme_sections" class="sortable">

						<?php if(empty($theme_sliders)){ ?>

						<tr style="background-color:#FFF!important;">

							<td colspan="100%" class="text-center"><?= __('admin.no_sections_available') ?></td>

						</tr>

						<?php } ?>

						<?php foreach ($theme_sliders as $key => $slider) { ?>

						<tr data-id="<?= $section->section_id ?>" style="background-color:#FFF!important; cursor: move;">

							<td><?= $slider->title ?></td>

							<td width="450"><?= substr($slider->description, 0, 100); ?><?= (strlen($slider->description) > 100) ? "..." : "";?></td>

							<td><img src="<?php echo base_url("assets/images/theme_images/".$slider->image) ?>" height="50" width="auto"></td>

							<td><?= $slider->link ?></td>

							<td><?= $slider->button_text ?></td>

							<td><?= ($slider->status == 1) ?

								'<lable class="badge badge-success">'.__('admin.active').'</lable>' :

								'<lable class="badge badge-blue-grey">'.__('admin.inactive').'</lable>' ?>

							</td>

							<td>

								<a class="btn btn-primary btn-sm" href="<?= base_url('themes/edit_slider/'. $slider->slider_id) ?>"><i class="fa fa-edit"></i></a>

								<a class="btn confirm btn-danger btn-sm" href="<?= base_url('themes/theme_delete/'. $slider->slider_id) ?>"><i class="fa fa-trash"></i></a>

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

<div role="tabpanel" class="tab-pane p-1" id="tab_sections">

	<div class="col-12">

		<div class="card m-b-30">

			<div class="card-header">

				<h4 class="card-title pull-left"><?= __('admin.section') ?></h4>

				<div class="pull-right">

					<a class="btn btn-primary" href="<?= base_url('themes/add_new_section/')  ?>"><?= __('admin.add_page_section') ?></a>

				</div>

			</div>

			<div class="card-body">

				<div class="table-responsive">

					<small class="text-muted"><?= __('admin.change_position_by_simply_drag_drop_rows') ?></small>

					<table class="table-hover table-striped table">

						<thead>

							<tr>

								<th><?= __('admin.title') ?></th>

								<th width="450"><?= __('admin.description') ?></th>

								<th><?= __('admin.image') ?></th>

								<th><?= __('admin.link') ?></th>

								<th><?= __('admin.button_text') ?></th>

								<th><?= __('admin.status') ?></th>

								<th><?= __('admin.action')?></th>

							</tr>

						</thead>

						<tbody data-whe_column="section_id" data-pos_column="position" data-table="theme_sections" class="sortable">

							<?php if(empty($theme_sections)){ ?>

							<tr style="background-color:#FFF!important;">

								<td colspan="100%" class="text-center"><?= __('admin.no_sections_available') ?></td>

							</tr>

							<?php } ?>

							<?php foreach ($theme_sections as $key => $section) { ?>

							<tr data-id="<?= $section->section_id ?>" style="background-color:#FFF!important; cursor: move;">

								<td><?= $section->title ?></td>

								<td width="450"><?= substr($section->description, 0, 100); ?><?= (strlen($section->description) > 100) ? "..." : "";?></td>

								<td><img src="<?php echo base_url("assets/images/theme_images/".$section->image) ?>" height="50" width="auto"></td>

								<td><?= $section->link ?></td>

								<td><?= $section->button_text ?></td>

								<td><?= ($section->status == 1) ?

									'<lable class="badge badge-success">'.__('admin.active').'</lable>' :

									'<lable class="badge badge-blue-grey">'.__('admin.inactive').'</lable>' ?>

								</td>

								<td>

									<a class="btn btn-primary btn-sm" href="<?= base_url('themes/edit_section/'. $section->section_id) ?>"><i class="fa fa-edit"></i></a>

									<a class="btn confirm btn-danger btn-sm" href="<?= base_url('themes/delete_section/'. $section->section_id) ?>"><i class="fa fa-trash"></i></a>

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

<div role="tabpanel" class="tab-pane p-3" id="tab_recommendation">

	<div class="col-12">

		<div class="card m-b-30">

			<div class="card-header">

				<h4 class="card-title pull-left"><?= __('admin.recommendations') ?></h4>

				

				<div class="pull-right">

					<a class="btn btn-primary" href="<?= base_url('themes/add_new_recommendation/')  ?>"><?= __('admin.add_new_recommendation') ?></a>

				</div>

			</div>

			<div class="card-body">

				<div class="table-responsive">

					<small class="text-muted"><?= __('admin.change_position_by_simply_drag_drop_rows') ?></small>

					<table class="table-hover table-striped table">

						<thead>

							<tr>

								<th><?= __('admin.title')?></th>

								<th><?= __('admin.occupation')?></th>

								<th><?= __('admin.description')?></th>

								<th><?= __('admin.image')?></th>

								<th><?= __('admin.status')?></th>

								<th><?= __('admin.action')?></th>

							</tr>

						</thead>

						<tbody class="sortable" data-whe_column="recommendation_id" data-pos_column="position" data-table="theme_recommendation">

							<?php if(empty($theme_recommendation)){ ?>

							<tr>

								<td colspan="100%" class="text-center"><?= __('admin.no_recommendation_available') ?></td>

							</tr>

							<?php } ?>

							<?php foreach ($theme_recommendation as $key => $recommendation) { ?>

							<tr data-id="<?= $recommendation->recommendation_id ?>" style="background-color:#FFF!important; cursor: move;">

								<td><?= $recommendation->title ?></td>

								<td><?= $recommendation->occupation ?></td>

								<td width="450"><?= substr($recommendation->description, 0, 100); ?><?= (strlen($recommendation->description) > 100) ? "..." : "";?></td>

								<td><img src="<?php echo base_url("assets/images/theme_images/".$recommendation->image) ?>" height="50" width="auto"></td>

								<td><?= ($recommendation->status == 1) ?

									'<lable class="badge badge-success">'.__('admin.active').'</lable>' :

									'<lable class="badge badge-blue-grey">'.__('admin.inactive').'</lable>' ?>

								</td>

								<td>

									<a class="btn btn-primary btn-sm" href="<?= base_url('themes/edit_recommendation/'. $recommendation->recommendation_id ) ?>"><i class="fa fa-edit"></i></a>

									<a class="btn confirm btn-danger btn-sm" href="<?= base_url('themes/delete_recommendation/'. $recommendation->recommendation_id ) ?>"><i class="fa fa-trash"></i></a>

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



<div role="tabpanel" class="tab-pane p-3" id="tab_faq">

	<div class="col-12">

		<div class="card m-b-30">

			<div class="card-header">

				<h4 class="card-title pull-left"><?= __('admin.faq') ?></h4>

				

				<div class="pull-right">

					<a class="btn btn-primary" href="<?= base_url('themes/add_new_faq/')  ?>"><?= __('admin.add_new_faq') ?></a>

				</div>

			</div>

			<div class="card-body">

				<div class="table-responsive">

					<small class="text-muted"><?= __('admin.change_position_by_simply_drag_drop_rows') ?></small>

					<table class="table-hover table-striped table">

						<thead>

							<tr>

								<th><?= __('admin.question') ?></th>

								<th><?= __('admin.answer') ?></th>

								<th><?= __('admin.status') ?></th>

								<th><?= __('admin.action') ?></th>

							</tr>

						</thead>

						<tbody class="sortable" data-whe_column="faq_id" data-pos_column="position" data-table="theme_faq">

							<?php if(empty($theme_faqs)){ ?>

							<tr>

								<td colspan="100%" class="text-center"><?= __('admin.no_faq_available') ?></td>

							</tr>

							<?php } ?>

							<?php foreach ($theme_faqs as $key => $faq) { ?>

							<tr data-pos="<?= $faq->position ?>" data-id="<?= $faq->faq_id ?>" style="background-color:#FFF!important; cursor: move;">

								<td><?= $faq->faq_question ?></td>

								<td width="450"><?= substr($faq->faq_answer, 0, 100); ?><?= (strlen($faq->faq_answer) > 100) ? "..." : "";?></td>

								<td><?= ($faq->status == 1) ?

									'<lable class="badge badge-success">'.__('admin.active').'</lable>' :

									'<lable class="badge badge-blue-grey">'.__('admin.inactive').'</lable>' ?>

								</td>

								<td>

									<a class="btn btn-primary btn-sm" href="<?= base_url('themes/edit_faq/'. $faq->faq_id ) ?>"><i class="fa fa-edit"></i></a>

									<a class="btn confirm btn-danger btn-sm" href="<?= base_url('themes/delete_faq/'. $faq->faq_id ) ?>"><i class="fa fa-trash"></i></a>

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



<div role="tabpanel" class="tab-pane p-3" id="tab_home_content">

	<div class="col-12">

		<div class="card m-b-30">

			<div class="card-header">

				<h4 class="card-title pull-left"><?= __('admin.home_content_settings') ?></h4>

			</div>

			<div class="card-body">

				<table class="table">

					<tbody >

						<tr>
							<td width="200"><?= __('admin.auto_play_slider') ?></td>

							<td>

								<?php if(isset($theme_multiple_page_settings['home_content_auto_play']) && $theme_multiple_page_settings['home_content_auto_play'] == 1) { ?>
									<i class="fa fa-toggle-on" style="cursor: pointer;color: green;font-size: 35px;width:50px" onclick="change_theme_multiple_page(this, 'home_content_auto_play');" id="home_content_auto_play-1"></i>
								<?php } else { ?>
									<i class="fa fa-toggle-off" style="cursor: pointer;color: red;font-size: 35px;width:50px" onclick="change_theme_multiple_page(this, 'home_content_auto_play');" id="home_content_auto_play-0"></i>
								<?php } ?>

								<input class="theme_multiple_page_settings" type="hidden" name="theme_multiple_page[home_content_auto_play]" value="<?= $theme_multiple_page_settings['home_content_auto_play'] ?? 0 ?>">

							</td>
						</tr>

						<tr class="home_content_auto_play_timing" <?= (isset($theme_multiple_page_settings['home_content_auto_play']) && $theme_multiple_page_settings['home_content_auto_play'] == 1) ? "" : 'style="display:none;"' ?> >
							<td><?= __('admin.auto_play_slider_timing') ?></td>

							<td>

								<input type="number" class="form-control theme_multiple_page_settings" name="theme_multiple_page[home_content_auto_timing]" value="<?= $theme_multiple_page_settings['home_content_auto_timing'] ?? 10 ?>">
								<small><?= __('admin.the_default_timing_10_sec');?></small>
							</td>
						</tr>

					</tbody>

				</table>

				<div class="row">

					<button type="button" class="btn btn-primary btn-submit-theme"> <?= __('admin.submit') ?> </button>

					<span class="loading-submit"></span>

				</div>

			</div>
			<div class="card-header">

				<h4 class="card-title pull-left"><?= __('admin.home_content') ?></h4>

				

				<div class="pull-right">

					<a class="btn btn-primary" href="<?= base_url('themes/add_new_homecontent/')  ?>"><?= __('admin.add_home_content') ?></a>

				</div>

			</div>
			<div class="card-body">

				<div class="table-responsive">

					<small class="text-muted"><?= __('admin.change_position_by_simply_drag_drop_rows') ?></small>

					<table class="table-hover table-striped table">

						<thead>

							<tr>

								<th><?= __('admin.title') ?></th>

								<th><?= __('admin.description') ?></th>

								<th><?= __('admin.image') ?></th>

								<th><?= __('admin.status') ?></th>

								<th><?= __('admin.action')?></th>

							</tr>

						</thead>

						<tbody class="sortable" data-whe_column="homecontent_id" data-pos_column="position" data-table="theme_homecontent">

							<?php if(empty($theme_homecontent)){ ?>

							<tr>

								<td colspan="100%" class="text-center"><?= __('admin.no_content_available') ?></td>

							</tr>

							<?php } ?>

							<?php foreach ($theme_homecontent as $key => $homecontent) { ?>

							<tr data-id="<?= $homecontent->homecontent_id ?>" style="background-color:#FFF!important; cursor: move;">

								<td width="150"><?= $homecontent->title ?></td>

								<td width="450">
									<?= substr(strip_tags($homecontent->description), 0, 100); ?>
									<?= (strlen(strip_tags($homecontent->description))> 100) ? '...' : '';?></td>

								<td><img src="<?php echo base_url("assets/images/theme_images/".$homecontent->image) ?>" height="50" width="100"></td>

								<td><?= ($homecontent->status == 1) ?

									'<lable class="badge badge-success">'.__('admin.active').'</lable>' :

									'<lable class="badge badge-blue-grey">'.__('admin.inactive').'</lable>' ?>

								</td>

								<td>

									<a class="btn btn-primary btn-sm" href="<?= base_url('themes/edit_homecontent/'. $homecontent->homecontent_id) ?>"><i class="fa fa-edit"></i></a>

									<a class="btn confirm btn-danger btn-sm" href="<?= base_url('themes/delete_homecontent/'. $homecontent->homecontent_id) ?>"><i class="fa fa-trash"></i></a>

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

<div role="tabpanel" class="tab-pane p-3" id="tab_home_videos">

	<div class="col-12">

		<div class="card m-b-30">

			<div class="card-header">

				<h4 class="card-title pull-left"><?= __('admin.home_video') ?></h4>

				

				<div class="pull-right">

					<a class="btn btn-primary" href="<?= base_url('themes/add_new_video/')  ?>"><?= __('admin.add_new_video') ?></a>

				</div>

			</div>

			<div class="card-body">

				<div class="table-responsive">

					<small class="text-muted"><?= __('admin.change_position_by_simply_drag_drop_rows') ?></small>

					<table class="table-hover table-striped table">

						<thead>

							<tr>

								<th><?= __('admin.video_title') ?></th>

								<th><?= __('admin.video_sub_title') ?></th>

								<th><?= __('admin.video_link') ?></th>

								<th><?= __('admin.watch_video') ?></th>

								<th><?= __('admin.status') ?></th>

								<th><?= __('admin.action')?></th>

							</tr>

						</thead>

						<tbody class="sortable" data-whe_column="video_id" data-pos_column="position" data-table="theme_videos">

							<?php if(empty($theme_videos)){ ?>

							<tr>

								<td colspan="100%" class="text-center"><?= __('admin.no_data_available')?></td>

							</tr>

							<?php } ?>

							<?php foreach ($theme_videos as $key => $video) { ?>

							<tr data-id="<?= $video->video_id ?>" style="background-color:#FFF!important; cursor: move;">

								<td><?= $video->video_title ?></td>

								<td><?= $video->video_sub_title ?></td>

								<td><?= $video->video_link ?>

								</td>

								<td>

									<a class="btn btn-info btn-sm" href="<?= $video->video_link ?>" target="_blank" role="button"><?= __('admin.watch_video') ?></a>

								</td>

								<td>

									<?= ($video->status == 1) ?

									'<lable class="badge badge-success">'.__('admin.active').'</lable>' :

									'<lable class="badge badge-blue-grey">'.__('admin.inactive').'</lable>' ?>

								</td>

								<td>

									<a class="btn btn-primary btn-sm" href="<?= base_url('themes/edit_video/'. $video->video_id) ?>"><i class="fa fa-edit"></i></a>

									<a class="btn confirm btn-danger btn-sm" href="<?= base_url('themes/delete_video/'. $video->video_id) ?>"><i class="fa fa-trash"></i></a>

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

<div role="tabpanel" class="tab-pane p-3" id="tab_page_pages">

	<div class="col-12">

		<div class="card m-b-30">

			<div class="card-header">

				<h4 class="card-title pull-left"><?= __('admin.theme_pages') ?></h4>

				<div class="pull-right">

					<a class="btn btn-primary" href="<?= base_url('themes/add_new_page/')  ?>"><?= __('admin.add_new_page') ?></a>

				</div>

				<div class="pull-right mr-2 ml-2">
					<select class="form-control" name="search_theme_pages" id="search_theme_pages">
						<option value=""><?= __('admin.select') ?>..</option>

						<option value="header" <?php echo ($this->input->get('menu_pages') == 'header') ? 'selected' : '' ?>><?= __('admin.header_menu_pages') ?></option>

						<option value="header_dropdown" <?php echo ($this->input->get('menu_pages') == 'header_dropdown') ? 'selected' : '' ?>><?= __('admn.header_dropdown_pages') ?></option>

						<option value="footer" <?php echo ($this->input->get('menu_pages') == 'footer') ? 'selected' : '' ?>><?= __('admin.footer_menu_pages') ?></option>

						<option value="both" <?php echo ($this->input->get('menu_pages') == 'both') ? 'selected' : '' ?>><?= __('admin.header_footer_both') ?></option>
					</select>
				</div>

			</div>

			<div class="card-body">
				<div class="table-responsive homepage_top_menu_pages">

					<small class="text-muted"><?= __('admin.change_position_by_simply_drag_drop_rows') ?></small>

					<table class="table-hover table-striped table">

						<thead>

							<tr>

								<th><?= __('admin.id') ?></th>

								<th><?= __('admin.page_name') ?></th>

								<th><?= __('admin.slug_others') ?></th>

								<th><?= __('admin.top_banner_title') ?></th>

								<th><?= __('admin.top_banner_sub_title') ?></th>

								<th><?= __('admin.page_content_title') ?></th>

								<th><?= __('admin.status') ?></th>

								<th><?= __('admin.action')?></th>

							</tr>

						</thead>

						<tbody class="sortable_pages_for_top_menus">

							<?php if(empty($theme_pages)){ ?>

							<tr>

								<td colspan="100%" class="text-center"><?= __('admin.no_page_available') ?></td>

							</tr>

							<?php } ?>

							<?php foreach ($theme_pages as $key => $page) { ?>

							<tr class="deleterow-<?php echo $page->page_id ?>">

								<td>
									<?= $page->page_id ?>

									<input type="hidden" name="page_id[]" value="<?= $page->page_id ?>"/>
								</td>

								<td><?= $page->page_name ?></td>

								<td>
									<div>Slug:: <span class="badge badge-light"><?= $page->slug ?></span></div>
									<div>isHeaderMenu:: <span class="badge badge-light"><?php echo $page->is_header_menu==1 ? 'True' : 'False' ?></span></div>
									<div>isDropdown:: <span class="badge badge-light"><?php echo $page->is_header_dropdown==1 ? 'True' : 'False' ?></span></div>
									<div>isFooterMenu:: <span class="badge badge-light"><?php echo $page->link_footer_section != '' ? 'True' : 'False' ?></span></div>
								</td>

								<td><?= $page->top_banner_title ?></td>

								<td><?= $page->top_banner_sub_title ?></td>

								<td><?= $page->page_content_title ?></td>

								<td>

									<?php if ($page->status ==1) { ?>

									<i class="fa fa-toggle-on" style="cursor: pointer;color: green;font-size: 35px;width:50px" onclick="change_page_status('<?= $page->page_id ?>');" id="page_status_active_<?= $page->page_id ?>"> 

									<?php } else{ ?>

									<i class="fa fa-toggle-off" style="cursor: pointer;color: red;font-size: 35px;width:50px" onclick="change_page_status('<?= $page->page_id ?>');" id="page_status_active_<?= $page->page_id ?>"> 

									<?php } ?>	

									<input type="hidden" name="page_status" id="page_status_<?= $page->page_id ?>" value="<?php echo $page->status;?>">

									</i>
								</td>

								<td>
									<?php if($page->page_type=='editable'){ ?>

									<a class="btn btn-primary btn-sm" href="<?= base_url('themes/edit_page/'. $page->page_id) ?>"><i class="fa fa-edit"></i></a>

									<a class="btn btn-danger btn-sm delete_page" data-id="<?= $page->page_id; ?>" data-href="<?= base_url('themes/delete_page/'. $page->page_id) ?>"><i class="fa fa-trash"></i></a>

									<?php } else { ?>
									<a class="btn btn-primary btn-sm" href="<?= base_url('themes/edit_page/'. $page->page_id) ?>"><i class="fa fa-edit"></i></a>

									<?php } ?>

								</td>

							</tr>

							<?php } ?>

						</tbody>

					</table>

					<span class="homepages_top_menu_positions_loading" style="display:none;">

						<div class="thead-tr-loader"></div>

					</span>

				</div>

			</div>

		</div>

	</div>

	<div class="col-12">
		<div class="card m-b-30">
			<div class="card-header">
				<h4 class="card-title pull-left"><?= __('admin.theme_links') ?></h4>
				<div class="pull-right">
					<span id="add_new_link" class="btn btn-primary text-white"><?= __('admin.add_new_link') ?></span>
				</div>
			</div>

			<div class="card-body">
				<div class="table-responsive">
					<table class="table-hover table-striped table">
						<thead>
							<tr>
								<th><?= __('admin.link_title') ?></th>
								<th><?= __('admin.link_url') ?></th>
								<th class="text-center"><?= __('admin.link_position') ?></th>
								<th><?= __('admin.status') ?></th>
								<th><?= __('admin.action')?></th>
							</tr>
						</thead>

						<tbody id="links-tbody">

							<?php if(empty($theme_links)){ ?>
								<tr>
									<td colspan="100%" class="text-center"><?= __('admin.no_links_available') ?></td>
								</tr>
							<?php } ?>

							<?php foreach ($theme_links as $link) { ?>
							<tr data-tlink_id="<?= $link->tlink_id ?>" data-tlink_title="<?= $link->tlink_title ?>" data-tlink_url="<?= $link->tlink_url ?>" data-tlink_position="<?= $link->tlink_position ?>" data-tlink_status="<?= $link->tlink_status ?>" data-tlink_target_blank="<?= $link->tlink_target_blank ?>">
								<td><?= $link->tlink_title ?></td>
								<td><?= $link->tlink_url ?></td>
								<td class="text-center"><?php 

									switch ($link->tlink_position) {
										case 1:
											echo __('admin.menu_a');
											break;
										case 2:
											echo __('admin.menu_b');
											break;
										case 3:
											echo __('admin.menu_c');
											break;
										case 4:
											echo __('admin.menu_d');
											break;
										default:
											echo __('admin.none');
											break;
									}
									 
								?></td>
								<td>
									<i class="btn_tlink_status_toggle fa <?= ($link->tlink_status == 1) ? 'fa-toggle-on' : 'fa-toggle-off' ?>" style="cursor: pointer; color: <?= ($link->tlink_status == 1) ? 'green' : 'red' ?>; font-size: 35px; width:50px"></i>
								</td>
								<td>
									<a class="btn btn-primary text-white btn-sm btn_edit_tlink"><i class="fa fa-edit"></i></a>
									<a class="btn btn-danger text-white btn-sm btn_delete_tlink"><i class="fa fa-trash"></i></a>
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
								
<div role="tabpanel" class="tab-pane p-3" id="tab_settings">

	<div class="col-md-12">

		<div class="card m-b-30">

			<div class="card-header">

				<h4 class="card-title pull-left"><?= __('admin.theme_settings') ?></h4>

			</div>

			<div class="card-body">

				

				<fieldset class="mt-1">

					<legend><?= __('admin.homepage_section_management') ?></legend>

					<div class="row">

						<div class="col-md-12">

							<small class="text-muted">&nbsp;<?= __('admin.change_position_by_simply_drag_drop_rows') ?></small>

								<table class="table-hover table">

								<thead>

									<tr>

									<th style="verticle-align:middle;"><?= __('admin.enable').'/'.__('admin.disable') ?></th>

									<th style="verticle-align:middle;"><?= __('admin.section_name') ?>
										<span class="home_sections_positions_loading float-right" style="display:none;">
											<div class="thead-tr-loader"></div>
										</span>
									</th>

									</tr>

								</thead>

								<tbody class="sortable2">

									<?php foreach($home_sections_settings as $hs_setting) { ?>

									<tr style="background-color:#FFF!important; cursor: move;">

										<td style="width:100px; text-align:center;">

										<?php if ($hs_setting->sec_is_enable == 1) { ?>

											<i class="fa fa-toggle-on" style="cursor: pointer;color: green;font-size: 35px;width:50px" onclick="change_section_status(<?= $hs_setting->sec_id ?>);" id="section_status_active_<?= $hs_setting->sec_id ?>"></i> 

										<?php } else{ ?>

											<i class="fa fa-toggle-off" style="cursor: pointer;color: red;font-size: 35px;width:50px" onclick="change_section_status(<?= $hs_setting->sec_id ?>);" id="section_status_active_<?= $hs_setting->sec_id ?>"></i>

										<?php } ?>	

										<input type="hidden" name="sec_status[]" id="section_status_<?= $hs_setting->sec_id ?>" value="<?= $hs_setting->sec_is_enable ?>"/>

										<input type="hidden" name="sec_id[]" value="<?= $hs_setting->sec_id ?>"/>

										</td>

										<td><?= $hs_setting->sec_title ?></td>

									</tr>

									<?php } ?>

								</tbody>

							</table>

						</div>

					</div>

				</fieldset>

				

				<fieldset class="mt-3">

					<legend><?= __('admin.top_banner_runner') ?></legend>

					<div id="runners-section" class="row">
						<?php 

						foreach ($theme_settings as $settings) { 

							$setting_id = $settings->settings_id;

							$top_banner_slider = json_decode($settings->top_banner_slider);
						} 

						?>

						<input type ="hidden" name="settings_id" value ="<?php echo @$setting_id;?>">

						<?php

						if(sizeof($top_banner_slider) > 0) {

							foreach($top_banner_slider as $runner){

						?>

						<div class="col-md-12">

							<div class="form-group">

								<label class="control-label"><?= __('admin.runner') ?> 1</label>

								<input name="top_banner_slider[]" class="form-control" type="text" value="<?= $runner; ?>">

							</div>

							<button type="button" class="btn btn-danger btn-md remove-runner-btn" style="position: absolute; top: 30px; right: 11px;"><i class="fa fa-trash"></i></button>

						</div>

						<?php

							}

						} else {

						?>

						<div class="col-md-12">

							<div class="form-group">

								<label class="control-label"><?= __('admin.runner') ?> 1</label>

								<input name="top_banner_slider[]" class="form-control" type="text">

							</div>

							<button type="button" class="btn btn-danger btn-md remove-runner-btn" style="position: absolute; top: 30px; right: 11px;"><i class="fa fa-trash"></i></button>

						</div>

						<?php

						}

						?>

						<div class="col-md-12">

							<button id="add-more-runner-btn" type="button" class="btn btn-primary btn-md"><i class="fa fa-plus"></i> <?= __('admin.add_more_runners') ?></button>

						</div>

					</div>

					<hr/>
					<h5 class="mt-4">
						<?= __('admin.top_banner_runner_settings') ?>
					</h5>
					<hr class="m-0" />
					<table class="table table-borderless">

					<tbody >

						<tr>
							<td width="250"><?= __('admin.auto_play_runner') ?></td>

							<td>

								<?php if(isset($theme_multiple_page_settings['home_runner_auto_play']) && $theme_multiple_page_settings['home_runner_auto_play'] == 1) { ?>
									<i class="fa fa-toggle-on" style="cursor: pointer;color: green;font-size: 35px;width:50px" onclick="change_theme_multiple_page(this, 'home_runner_auto_play');" id="home_runner_auto_play-1"></i>
								<?php } else { ?>
									<i class="fa fa-toggle-off" style="cursor: pointer;color: red;font-size: 35px;width:50px" onclick="change_theme_multiple_page(this, 'home_runner_auto_play');" id="home_runner_auto_play-0"></i>
								<?php } ?>

								<input class="theme_multiple_page_settings" type="hidden" name="theme_multiple_page[home_runner_auto_play]" value="<?= $theme_multiple_page_settings['home_runner_auto_play'] ?? 0 ?>">

							</td>
						</tr>

						<tr class="home_runner_auto_play_timing" <?= (isset($theme_multiple_page_settings['home_runner_auto_play']) && $theme_multiple_page_settings['home_runner_auto_play'] == 1) ? "" : 'style="display:none;"' ?> >
							<td><?= __('admin.auto_play_runner_timing') ?></td>

							<td>

								<input type="number" class="form-control theme_multiple_page_settings" name="theme_multiple_page[home_runner_auto_timing]" value="<?= $theme_multiple_page_settings['home_runner_auto_timing'] ?? 10 ?>">
								<small><?= __('admin.the_default_timing_10_sec');?></small>
							</td>
						</tr>

					</tbody>

				</table>

				</fieldset>

				<fieldset class="mt-3">

					<legend><?= __('admin.logo') ?></legend>

					<div class="row">
						<div class="col-md-3">
							<label class="control-label"><?= __('admin.logo') ?>:</label>
							<div class="form-group">
								<div class="fileUpload btn btn-sm btn-primary m-0">

									<span><?= __('admin.choose_file') ?></span>

									<input id="logo" name="logo" class="upload" type="file" >

								</div>
								<p class="logo-info-text m-0"><?= __('admin.multiple_pages_theme_logo_recommended_size') ?></p>
							</div>
						</div>
						<div class="col-md-9">
							<div class="form-group mt-4">
								<input type="hidden" name="hidden_logo" value="<?= $settings->logo ?>" />

								<?php
									$logo = false;
									$avatar= 'assets/vertical/assets/images/no_image_yet.png';
									if($settings->logo !=''){
										$logo = true;
										$avatar= '/assets/images/theme_images/'.$settings->logo;
									}
								?>

								<img id="output_logo"  src="<?= base_url($avatar); ?>" class="thumbnail" border="0" width="220px" />

								<?php if($logo) { ?>
								<span class="btn btn-sm btn-danger btn-delete-image" data-img_input="hidden_logo" data-img_ele="output_logo" data-img_placeholder="<?= base_url('assets/vertical/assets/images/no_image_yet.png');?>"><i class="fa fa-trash"></i></span>
								<?php } ?>	

							</div>
						</div>

						<div class="col-sm-4">
							<div class="form-group">
								<label  class="control-label"><?= __('admin.site_setting_logo_custom_size') ?></label>
								<select name="custom_logo_size" class="form-control">
									<option value="0"><?= __('admin.disable') ?></option>
									<option <?= ($settings->custom_logo_size == 1) ? "selected" :""; ?> value="1"><?= __('admin.multiple_pages_theme') ?></option>
								</select>
							</div>
						</div>

						<div class="col-sm-4 logo_cust_size_inp" <?= ($settings->custom_logo_size != 1) ? 'style="display:none;"':""; ?>>
							<div class="form-group">
							<label  class="control-label"><?= __('admin.site_setting_logo_height') ?></label>
							<input name="log_custom_height" value="<?= $settings->log_custom_height; ?>" class="form-control" type="number">
							</div>
						</div>

						<div class="col-sm-4 logo_cust_size_inp" <?= ($settings->custom_logo_size != 1) ? 'style="display:none;"' :""; ?>>
							<div class="form-group">
							<label  class="control-label"><?= __('admin.site_setting_logo_width') ?></label>
							<input name="log_custom_width" value="<?= $settings->log_custom_width; ?>" class="form-control" type="number">
							</div>
						</div>

						<script type="text/javascript">
							$(document).on('change', 'select[name="custom_logo_size"]', function() {
									if($(this).val() == 1) {
										$('.logo_cust_size_inp').show();
									} else {
										$('.logo_cust_size_inp').hide();
									}
							});
						</script>
					</div>
				</fieldset>

				<fieldset class="mt-3">

					<legend><?= __('admin.home_section_title_sub_title') ?></legend>

					<div class="row">

						<?php foreach ($theme_settings as $settings) { $setting_id = $settings->settings_id; } ?>

						<div class="col-md-6">

							<div class="form-group">

								<label class="control-label"><?= __('admin.top_title') ?></label>

								<input type ="hidden" name= "settings_id" value ="<?php echo @$setting_id;?>" >

								<input name="home_section_title" value="<?php echo $settings->home_section_title; ?>" class="form-control" type="text">

							</div>

						</div>

						

						<div class="col-md-6">

							<div class="form-group">

								<label class="control-label"><?= __('admin.sub_title') ?></label>

								<input name="home_section_subtitle" class="form-control" value="<?php echo $settings->home_section_subtitle; ?>" type="text">

							</div>

						</div>

					</div>

				</fieldset>

				<fieldset class="mt-3">

					<legend><?= __('admin.recommendation_section_title_sub_title') ?></legend>

					<div class="row">

						<?php foreach ($theme_settings as $settings) { $setting_id = $settings->settings_id; } ?>

						<div class="col-md-6">

							<div class="form-group">

								<label class="control-label"><?= __('admin.top_title') ?></label>

								<input type ="hidden" name= "settings_id" value ="<?php echo @$setting_id;?>" >

								<input name="recommendation_section_title" value="<?php echo $settings->recommendation_section_title; ?>" class="form-control" type="text">

							</div>

						</div>

						

						<div class="col-md-6">

							<div class="form-group">

								<label class="control-label"><?= __('admin.sub_title') ?></label>

								<input name="recommendation_section_subtitle" class="form-control" value="<?php echo $settings->recommendation_section_subtitle; ?>" type="text">

							</div>

						</div>

					</div>

				</fieldset>		

				<fieldset class="mt-3">

					<legend><?= __('admin.membership_section_title_sub_title') ?></legend>

					<div class="row">

						<?php foreach ($theme_settings as $settings) { $setting_id = $settings->settings_id; } ?>

						<div class="col-md-6">

							<div class="form-group">

								<label class="control-label"><?= __('admin.top_title') ?></label>

								<input type ="hidden" name= "settings_id" value ="<?php echo @$setting_id;?>" >

								<input name="membership_top_title" value="<?php echo $settings->membership_top_title; ?>" class="form-control" type="text">

							</div>

						</div>

						

						<div class="col-md-6">

							<div class="form-group">

								<label class="control-label"><?= __('admin.sub_title') ?></label>

								<input name="membership_sub_title" class="form-control" value="<?php echo $settings->membership_sub_title; ?>" type="text">

							</div>

						</div>

					</div>

				</fieldset>

				<fieldset class="mt-3">

					<legend><?= __('admin.videos_section_background') ?></legend>

					<div class="row">

						<?php foreach ($theme_settings as $settings) { $setting_id = $settings->settings_id; } ?>

						<div class="col-md-12">

							<div class="form-group">

								<label class="control-label"><?= __('admin.background_image') ?></label>

								<div>

									<div class="fileUpload btn btn-sm btn-primary">

										<span><?= __('admin.choose_file') ?></span>

										<input id="homepage_video_section_bg" name="homepage_video_section_bg" class="upload" type="file" >

									</div>

									<input type="hidden" name="hidden_homepage_video_section_bg" value="<?= $settings->homepage_video_section_bg ?>" />

									<?php
									$homepage_video_section_bg_dlt = false;
									$avatar= 'assets/login/multiple_pages/img/video-section-bg.png';
									if($settings->homepage_video_section_bg !=''){
										$homepage_video_section_bg_dlt = true;
										$avatar= '/assets/images/theme_images/'.$settings->homepage_video_section_bg;
									}
									?>

									<img id="output_homepage_video_section_bg"  src="<?php echo base_url().$avatar;?>" class="thumbnail" border="0" width="220px" />

									<?php if($homepage_video_section_bg_dlt) { ?>
									<span class="btn btn-sm btn-danger btn-delete-image" data-img_input="hidden_homepage_video_section_bg" data-img_ele="output_homepage_video_section_bg" data-img_placeholder="<?php echo base_url();?>assets/login/multiple_pages/img/video-section-bg.png"><i class="fa fa-trash"></i></span>
									<?php } ?>																			

								</div>

							</div>

						</div>

					</div>

					<!-- <div class="row">

					<div class="col-sm-6">

							<div class="form-group">

								<label class="control-label"><?= __('admin.video_title') ?></label>

								<input name="video_title" class="form-control" value="<?php echo $settings->video_title; ?>" type="text">

							</div>

						</div>

					<div class="col-sm-6">

							<div class="form-group">

								<label class="control-label"><?= __('admin.video_sub_title') ?></label>

								<input name="video_sub_title" class="form-control" value="<?php echo $settings->video_sub_title; ?>" type="text">

							</div>

						</div>

					</div> -->

				</fieldset>

				<fieldset class="mt-3">

					<legend><?= __('admin.faq_page') ?></legend>

					<div class="row">

						<?php foreach ($theme_settings as $settings) { $setting_id = $settings->settings_id; } ?>

						<div class="col-md-6">

							<div class="form-group">

								<label class="control-label"><?= __('admin.banner_title') ?></label>

								<input type ="hidden" name= "settings_id" value ="<?php echo @$setting_id;?>" >

								<input name="faq_banner_title" value="<?php echo $settings->faq_banner_title; ?>" class="form-control" type="text">

							</div>

						</div>

						

						<div class="col-md-6">

							<div class="form-group">

								<label class="control-label"><?= __('admin.section_title') ?></label>

								<input name="faq_section_title" class="form-control" value="<?php echo $settings->faq_section_title; ?>" type="text">

							</div>

						</div>



						<div class="col-md-12">

							<div class="form-group">

								<label class="control-label"><?= __('admin.section_sub_title') ?></label>

								<input name="faq_section_subtitle" class="form-control" value="<?php echo $settings->faq_section_subtitle; ?>" type="text">

							</div>

						</div>



						<div class="col-md-12">

							<div class="form-group">

								<label class="control-label"><?= __('admin.banner_image') ?></label>

								<div>

									<div class="fileUpload btn btn-sm btn-primary">

										<span><?= __('admin.choose_file') ?></span>

										<input id="faq_banner_image" name="faq_banner_image" class="upload" type="file" >

									</div>

									<input type="hidden" name="hidden_faq_banner_image" value="<?= $settings->faq_banner_image ?>" />

									<?php
										$faq_banner_image = false;
										$avatar= 'assets/login/multiple_pages/img/bg-photo.jpg';
										if($settings->faq_banner_image !=''){
											$faq_banner_image = true;
											$avatar= '/assets/images/theme_images/'.$settings->faq_banner_image;
										}
									?>

									<img id="output_faq_banner_image"  src="<?php echo base_url().$avatar;?>" class="thumbnail" border="0" width="220px" />

									<?php if($faq_banner_image) { ?>
									<span class="btn btn-sm btn-danger btn-delete-image" data-img_input="hidden_faq_banner_image" data-img_ele="output_faq_banner_image" data-img_placeholder="<?php echo base_url();?>assets/login/multiple_pages/img/bg-photo.jpg"><i class="fa fa-trash"></i></span>
									<?php } ?>	
								</div>

							</div>

						</div>

					</div>

				</fieldset>

				<fieldset class="mt-5">

					<legend><?= __('admin.contact_us_page') ?></legend>

					<div class="row">

						<div class="col-md-6">

							<div class="form-group">

								<label class="control-label"><?= __('admin.banner_title') ?></label>

								<input name="contact_us_t_title" value="<?php echo $settings->contact_us_t_title; ?>" class="form-control" type="text">

							</div>

						</div>

						

						<div class="col-md-6">

							<div class="form-group">

								<label class="control-label"><?= __('admin.banner_sub_title') ?></label>

								<input name="contact_us_slug_title" class="form-control" value="<?php echo $settings->contact_us_slug_title; ?>" type="text">

							</div>

						</div>

						<div class="col-md-6">

							<div class="form-group">

								<label class="control-label"><?= __('admin.section_title') ?></label>

								<input name="contact_sec_title" value="<?php echo $settings->contact_sec_title; ?>" class="form-control" type="text">

							</div>

						</div>

						

						<div class="col-md-6">

							<div class="form-group">

								<label class="control-label"><?= __('admin.section_sub_title') ?></label>

								<input name="contact_sec_subtitle" class="form-control" value="<?php echo $settings->contact_sec_subtitle; ?>" type="text">

							</div>

						</div>

						<div class="col-md-6">

							<div class="form-group">

								<label class="control-label"><?= __('admin.full_address') ?></label>

								<input name="contact_us_full_address" class="form-control" value="<?php echo $settings->contact_us_full_address; ?>" type="text">

							</div>

						</div>

						<div class="col-md-6">

							<div class="form-group">

								<label class="control-label"><?= __('admin.phone_number') ?></label>

								<input name="contact_us_phone" class="form-control" value="<?php echo $settings->contact_us_phone; ?>" type="text" maxlength="20">

								<small><?= __('admin.type_the_symbol_before_the_number') ?></small>

								<span class="text-danger" id="contact_us_phone_error"></span>

							</div>

						</div>

						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label"><?= __('admin.email_address') ?></label>
								<input name="contact_us_email" class="form-control" value="<?php echo $settings->contact_us_email; ?>" type="email" />
								<span class="text-danger" id="contact_us_email_error"></span>
							</div>
						</div>

						<div class="col-md-12">

							<div class="form-group">

								<label class="control-label"><?= __('admin.google_map_iframe') ?></label>

								<textarea name="contact_us_iframe" class="form-control" type="text" rows=4><?php echo $settings->contact_us_iframe; ?></textarea>

							</div>

						</div>

						<div class="col-sm-3">

							<div class="form-group">

								<label class="control-label"><?= __('admin.youtube_link') ?></label>

								<input placeholder="<?= __('admin.youtube_link') ?>" name="youtube_link" id="youtube_link" class="form-control" value="<?php echo $settings->youtube_link; ?>" type="text">

								<span class="text-danger" id="youtube_link_error"></span>

							</div>

						</div>

						<div class="col-sm-3">

							<div class="form-group">

								<label class="control-label"><?= __('admin.facebook_link') ?></label>

								<input placeholder="<?= __('admin.facebook_link') ?>" name="facebook_link" id="facebook_link" class="form-control" value="<?php echo $settings->facebook_link; ?>" type="text">

								<span class="text-danger" id="facebook_link_error"></span>

							</div>

						</div>

						<div class="col-sm-3">

							<div class="form-group">

								<label class="control-label"><?= __('admin.twitter_link') ?></label>

								<input placeholder="<?= __('admin.twitter_link') ?>" name="twitter_link" id="twitter_link" class="form-control" value="<?php echo $settings->twitter_link; ?>" type="text">

								<span class="text-danger" id="twitter_link_error"></span>

							</div>

						</div>

						<div class="col-sm-3">

							<div class="form-group">

								<label class="control-label"><?= __('admin.instagram_link') ?></label>

								<input placeholder="<?= __('admin.instagram_link') ?>" name="instegram_link" id="instegram_link" class="form-control" value="<?php echo $settings->instegram_link; ?>" type="text">

								<span class="text-danger" id="instegram_link_error"></span>

							</div>

						</div>

						<div class="col-sm-4">

							<div class="form-group">

								<label class="control-label"><?= __('admin.whatsapp_number') ?></label>

								<input placeholder="<?= __('admin.whatsapp_number') ?>" name="whatsapp_number" id="whatsapp_number" class="form-control" value="<?php echo $settings->whatsapp_number; ?>" type="text">

								<span class="text-danger" id="whatsapp_number_error"></span>

							</div>

						</div>

						<div class="col-sm-8">

							<div class="form-group">

								<label class="control-label"><?= __('admin.default_message') ?></label>

								<input placeholder="<?= __('admin.default_message') ?>" name="whatsapp_default_msg" id="whatsapp_default_msg" class="form-control" value="<?php echo $settings->whatsapp_default_msg; ?>" type="text">

								<span class="text-danger" id="whatsapp_default_msg_error"></span>

							</div>

						</div>
						

						<div class="col-md-12">

							<div class="form-group">

								<label class="control-label"><?= __('admin.banner_image') ?></label>

								<div>

									<div class="fileUpload btn btn-sm btn-primary">

										<span><?= __('admin.choose_file') ?></span>

										<input id="contact_banner_image" name="contact_banner_image" class="upload" type="file" >

									</div>

									<input type="hidden" name="hidden_contact_banner_image" value="<?= $settings->contact_banner_image ?>" />

									<?php
										$contact_banner_image = false;
										$avatar= 'assets/login/multiple_pages/img/bg-photo.jpg';
										if($settings->contact_banner_image !=''){
											$contact_banner_image = true;
											$avatar= '/assets/images/theme_images/'.$settings->contact_banner_image;
										}
									?>

									<img id="output_contact_banner_image"  src="<?php echo base_url().$avatar;?>" class="thumbnail" border="0" width="220px" />

									<?php if($contact_banner_image) { ?>
									<span class="btn btn-sm btn-danger btn-delete-image" data-img_input="hidden_contact_banner_image" data-img_ele="output_contact_banner_image" data-img_placeholder="<?php echo base_url();?>assets/login/multiple_pages/img/bg-photo.jpg"><i class="fa fa-trash"></i></span>
									<?php } ?>	
								</div>

							</div>

						</div>

					</div>

				</fieldset>

				

				<fieldset class="mt-5">

					<legend><?= __('admin.footer_edit_section') ?></legend>

					<div class="row">

						<!-- <div class="col-sm-6">

							<div class="form-group">

								<label class="control-label"><?= __('admin.footer_about_title') ?></label>

								<input name="footer_about_title" class="form-control" value="<?php echo $settings->footer_about_title; ?>" type="text">

							</div>

						</div>

						<div class="col-sm-6">

							<div class="form-group">

								<label class="control-label"><?= __('admin.footer_about_text') ?></label>

								

								<textarea name="footer_about_text" class="form-control" type="text"><?php echo $settings->footer_about_text; ?></textarea>

							</div>

						</div>
-->
						<div class="col-sm-6">

							<div class="form-group">

								<label class="control-label"><?= __('admin.menu_a_title') ?></label>

								<input name="footer_menu_title_a" class="form-control" value="<?php echo $settings->footer_menu_title_a; ?>" type="text">

							</div>

						</div>

						<div class="col-sm-6">

							<div class="form-group">

								<label class="control-label"><?= __('admin.menu_b_title') ?></label>

								<input name="footer_menu_title_b" class="form-control" value="<?php echo $settings->footer_menu_title_b; ?>" type="text">

							</div>

						</div>

						<div class="col-sm-6">

							<div class="form-group">

								<label class="control-label"><?= __('admin.menu_c_title') ?></label>

								<input name="footer_menu_title_c" class="form-control" value="<?php echo $settings->footer_menu_title_c; ?>" type="text">

							</div>

						</div>

						<div class="col-sm-6">

							<div class="form-group">

								<label class="control-label"><?= __('admin.menu_d_title') ?></label>

								<input name="footer_menu_title_d" class="form-control" value="<?php echo $settings->footer_menu_title_d; ?>" type="text">

							</div>

						</div>

						<div class="col-sm-12">

							<div class="form-group">

								<label class="control-label"><?= __('admin.copyright') ?></label>

								<input placeholder="<?= __('admin.insert_your_copyright') ?>" name="copyright" class="form-control" value="<?php echo $settings->copyright; ?>" type="text">

							</div>

						</div>

					</div>

				</fieldset>

				<fieldset class="mt-5">

					<legend><?= __('admin.bottom_banner_settings') ?></legend>

					<div class="row">

						<div class="col-sm-6">

							<div class="form-group">

								<label class="control-label"><?= __('admin.banner_bottom_title') ?></label>

								<input placeholder="<?= __('admin.banner_bottom_title') ?>" name="banner_bottom_title" class="form-control" value="<?php echo $settings->banner_bottom_title; ?>" type="text">

							</div>

						</div>

						<div class="col-sm-6">

							<div class="form-group">

								<label class="control-label"><?= __('admin.banner_bottom_slug') ?></label>

								<input placeholder="<?= __('admin.banner_bottom_slug') ?>" name="banner_bottom_slug" class="form-control" value="<?php echo $settings->banner_bottom_slug; ?>" type="text">

							</div>

						</div>

						<div class="col-sm-6">

							<div class="form-group">

								<label class="control-label"><?= __('admin.button_text') ?></label>

								<input placeholder="<?= __('admin.button_text') ?>" name="banner_button_text" class="form-control" value="<?php echo $settings->banner_button_text; ?>" type="text">

							</div>

						</div>

						<div class="col-sm-6">

							<div class="form-group">

								<label class="control-label"><?= __('admin.link') ?></label>

								<input placeholder="<?= __('admin.link') ?>" name="banner_button_link" id="banner_button_link" class="form-control" value="<?php echo $settings->banner_button_link; ?>" type="text">

								<span class="text-danger" id="banner_button_link_error"></span>

							</div>

						</div>

					</div>

				</fieldset>



				<fieldset class="mt-5">

					<legend><?= __('admin.login_registration_terms') ?></legend>

					<div class="row">

						<div class="col-md-6">

							<div class="form-group">

								<label class="control-label"><?= __('admin.login_page_text_area') ?></label>

								<textarea name="login_content" rows="10" class="form-control" type="text"><?php echo $settings->login_content; ?></textarea>

								<small><?= __('admin.recommend_max_100_characters') ?></small>

							</div>

						</div>

						

						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label"><?= __('admin.login_page_background_image') ?></label>
								<div>
									<div class="fileUpload btn btn-sm btn-primary">
										<span><?= __('admin.choose_file') ?></span>
										<input id="avatar_login" name="avatar_login" class="upload" type="file" >
									</div>

									<?php
										$is_login_img = false;
										$avatar= 'assets/login/multiple_pages/img/bg-photo.jpg';
										if($settings->login_img !=''){
											$is_login_img = true;
											$avatar= '/assets/images/theme_images/'.$settings->login_img;
										}
									?>
									<input type="hidden" name="hidden_login_img" value="<?= $settings->login_img ?>" />

									<img id="output_login"  src="<?php echo base_url().$avatar;?>" class="thumbnail" border="0" width="220px" />

									<?php if($is_login_img) { ?>
									<span class="btn btn-sm btn-danger btn-delete-image" data-img_input="hidden_login_img" data-img_ele="output_login" data-img_placeholder="<?php echo base_url();?>assets/login/multiple_pages/img/bg-photo.jpg"><i class="fa fa-trash"></i></span>
									<?php } ?>
								</div>
							</div>
						</div>



						<div class="col-md-6">

							<div class="form-group">

								<label class="control-label"><?= __('admin.registration_page_text_area') ?></label>

								<textarea name="reg_content" rows="10" value="" class="form-control" type="text"><?php echo $settings->reg_content; ?></textarea>

								<small><?= __('admin.recommend_max_100_characters') ?></small>

							</div>

						</div>

						

						<div class="col-md-6">

							<div class="form-group">

								<label class="control-label"><?= __('admin.registration_page_background_image') ?></label>

								<div>
									<div class="fileUpload btn btn-sm btn-primary">
										<span><?= __('admin.choose_file') ?></span>
										<input id="avatar_registration" name="avatar_registration" class="upload" type="file" >
									</div>

									<?php
									$is_reg_img = false;
									$avatar= 'assets/login/multiple_pages/img/bg-photo.jpg';
									if($settings->reg_img !=''){
										$is_reg_img = true;
										$avatar= '/assets/images/theme_images/'.$settings->reg_img;
									}
									?>

									<input type="hidden" name="hidden_reg_img" value="<?= $settings->reg_img ?>" />

									<img id="output_registration"  src="<?php echo base_url().$avatar;?>" class="thumbnail" border="0" width="220px" />

									<?php if($is_reg_img) { ?>
									<span class="btn btn-sm btn-danger btn-delete-image" data-img_input="hidden_reg_img" data-img_ele="output_registration" data-img_placeholder="<?php echo base_url();?>assets/login/multiple_pages/img/bg-photo.jpg"><i class="fa fa-trash"></i></span>
									<?php } ?>																		
								</div>
							</div>
						</div>



						<div class="col-md-6">

							<div class="form-group">

								<label class="control-label"><?= __('admin.terms_page_text_area') ?></label>

								<textarea name="terms_content" rows="10" value="" class="form-control" type="text"><?php echo $settings->terms_content; ?></textarea>

							</div>

						</div>

						

						<div class="col-md-6">

							<div class="form-group">

								<label class="control-label"><?= __('admin.terms_page_background_image') ?></label>

								

								<div>
									<div class="fileUpload btn btn-sm btn-primary">
										<span><?= __('admin.choose_file') ?></span>
										<input id="avatar_terms" name="avatar_terms" class="upload" type="file" >
									</div>

									<?php
									$is_terms_img = false;
									$avatar= 'assets/login/multiple_pages/img/bg-photo.jpg';
									if($settings->terms_img !=''){
										$is_terms_img = true;
										$avatar= '/assets/images/theme_images/'.$settings->terms_img;
									}
									?>

									<input type="hidden" name="hidden_terms_img" value="<?= $settings->terms_img ?>" />

									<img id="output_terms"  src="<?php echo base_url().$avatar;?>" class="thumbnail" border="0" width="220px" />

									<?php if($is_terms_img) { ?>
									<span class="btn btn-sm btn-danger btn-delete-image" data-img_input="hidden_terms_img" data-img_ele="output_terms" data-img_placeholder="<?php echo base_url();?>assets/login/multiple_pages/img/bg-photo.jpg"><i class="fa fa-trash"></i></span>
									<?php } ?>																		

								</div>

							</div>

						</div>





					</div>

				</fieldset>

				<br>



				<br>

				<div class="row">

					<button type="button" class="btn btn-primary btn-submit-theme"> <?= __('admin.submit') ?> </button>

					<span class="loading-submit"></span>

				</div>
				<div class="invalid-form-error" style="color: red;display: none;"><?= __('admin.invalid_form_details_please_check_and_validate') ?></div>

			</div>

		</div>

	</div>

</div>

</div>

</div>

</div>

</form>

</div>

</div>

				<div id="link_form_modal" class="modal" tabindex="-1" role="dialog">
					<div class="modal-dialog modal-lg" role="document">
						<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title"><?= __('admin.add_new_link') ?></h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form id="link_form">
								<input name="tlink_id" type="hidden" value="0"/>
								<div class="row">
									<div class="col-12">
										<div class="form-group">
											<label><?= __('admin.link_title') ?></label>
											<input name="tlink_title" type="text" class="form-control" placeholder="<?= __('admin.link_title_to_display') ?>">
										</div>
									</div>
									<div class="col-12">
										<div class="form-group">
											<label><?= __('admin.link_url') ?></label>
											<input name="tlink_url" type="text" class="form-control" placeholder="<?= __('admin.link_url_to_open') ?>">
											<span class="text-danger tlink_url_error"></span>
										</div>
									</div>
									<div class="col-4">
										<div class="form-group">
											<label><?= __('admin.link_position') ?></label>
											<select name="tlink_position" class="form-control">
												<option value="0"><?= __('admin.none') ?></option>
												<option value="1"><?= __('admin.footer_menu_a') ?></option>
												<option value="2"><?= __('admin.footer_menu_b') ?></option>
												<option value="3"><?= __('admin.footer_menu_c') ?></option>
												<option value="4"><?= __('admin.footer_menu_d') ?></option>
											</select>
										</div>
									</div>
									<div class="col-4">
										<div class="form-group">
											<label><?= __('admin.link_status') ?></label>
											<select name="tlink_status" class="form-control">
												<option value="1"><?= __('admin.enable') ?></option>
												<option value="0"><?= __('admin.disabled') ?></option>
											</select>
										</div>
									</div>
									<div class="col-4">
										<div class="form-group">
											<label><?= __('admin.is_open_in_new_tab') ?></label>
											<select name="tlink_target_blank" class="form-control">
												<option value="1"><?= __('admin.yes') ?></option>
												<option value="0"><?= __('admin.no') ?></option>
											</select>
										</div>
									</div>
								</div>
								
								
							</form>
						</div>
							<div class="modal-footer">
								<button id="link_form_submit" type="button" class="btn btn-primary"><?= __('admin.save_changes') ?></button>
								<button type="button" class="btn btn-secondary" data-dismiss="modal"><?= __('admin.close') ?></button>
							</div>
						</div>

					<script type="text/javascript">

						$("#link_form_submit").on('click',function(evt){

							$(".tlink_url_error").empty();

							$("#link_form_submit").btn("loading");

							var res = $('input[name="tlink_url"]').val();
							if(res != "") {
								var result = res.match(/(http(s)?:\/\/.)?(www\.)?[-a-zA-Z0-9@:%._\+~#=]{2,256}\.[a-z]{2,6}\b([-a-zA-Z0-9@:%_\+.~#?&//=]*)/g);
								if(result == null && !res.includes("http://localhost") && !res.includes("https://localhost")) {
									$(".tlink_url_error").text('<?= __('admin.please_enter_valid_link') ?>');
									$("#link_form_submit").btn("reset");
									return false;
								}
							}
							
							evt.preventDefault();

							$.ajax({
								url:'<?= base_url('themes/store_link') ?>',
								type:'POST',
								dataType:'json',
								data:$("#link_form").serializeArray(),
								complete:function(result){
									$("#link_form_submit").btn("reset");
									$('#link_form_modal').modal('hide');
								},
								success:function(response){
									let swalIcon = response.status ? 'success' : 'error';
									if(response.status) {
										let linksBody = "";

										if(response.data.length == 0) {
											linksBody = `<tr><td colspan="100%" class="text-center">`+'<?= __('admin.no_links_available') ?>'+`</td></tr>`;
										}

										for (let index = 0; index < response.data.length; index++) {
											const element = response.data[index];

											let link_pos = '<?= __('admin.none') ?>';
											switch (element['tlink_position']) {
												case "1":
													link_pos = '<?= __('admin.menu_a') ?>';
													break;
												case "2":
													link_pos = '<?= __('admin.menu_b') ?>';
													break;
												case "3":
													link_pos = '<?= __('admin.menu_c') ?>';
													break;
												case "4":
													link_pos = '<?= __('admin.menu_d') ?>';
													break;
												default:
													link_pos = '<?= __('admin.none') ?>';
													break;
											}

											console.log(link_pos, element['tlink_position'])

											let link_class = (element['tlink_status'] == 1) ? 'fa-toggle-on' : 'fa-toggle-off';
											let link_color = (element['tlink_status'] == 1) ? 'green' : 'red';

											linksBody += `<tr data-tlink_id="`+ element['tlink_id'] +`" data-tlink_title="`+ element['tlink_title'] +`" data-tlink_url="`+ element['tlink_url'] +`" data-tlink_position="`+ element['tlink_position'] +`" data-tlink_status="`+ element['tlink_status'] +`" data-tlink_target_blank="`+ element['tlink_target_blank'] +`">
												<td>`+ element['tlink_title'] +`</td>
												<td>`+ element['tlink_url'] +`</td>
												<td class="text-center">`+link_pos+`</td>
												<td><i class="btn_tlink_status_toggle fa `+ link_class +`" style="cursor: pointer; color: `+ link_color +`; font-size: 35px; width:50px"></i></td>
												<td>
													<a class="btn btn-primary text-white btn-sm btn_edit_tlink"><i class="fa fa-edit"></i></a>
													<a class="btn btn-danger text-white btn-sm btn_delete_tlink"><i class="fa fa-trash"></i></a>
												</td>
											</tr>`
										}
										$("#links-tbody").html(linksBody);
									}
									Swal.fire({
										icon: swalIcon,
										text: response.message,
									});
								}
							});
							return false;
						});

						$(document).on('click', '.btn_delete_tlink', function(){
							Swal.fire({
								title: '<?= __('admin.are_you_sure') ?>',
								text: '<?= __('admin.you_not_be_able_to_revert_this') ?>',
								icon: 'warning',
								showCancelButton: true,
								confirmButtonColor: '#3085d6',
								cancelButtonColor: '#d33',
								confirmButtonText: '<?= __('admin.yes_delete_it') ?>'
							}).then((result) => {
								if (result.value) {
									let thatBtn = $(this);
									thatBtn.btn("loading");
									$.ajax({
										url:'<?= base_url('themes/delete_link') ?>',
										type:'POST',
										dataType:'json',
										data:{tlink_id:$(this).closest('tr').data('tlink_id')},
										complete:function(res){
											thatBtn.closest("tr").remove();
											Swal.fire('Deleted!', '<?= __('admin.your_link_has_been_deleted') ?>', 'success');
										}
									});
								}
							});
						});

						$(document).on('click', '.btn_edit_tlink', function(){
							let dataRow = $(this).closest('tr');
							$('#link_form_modal input[name="tlink_id"]').val(dataRow.data('tlink_id'));
							$('#link_form_modal input[name="tlink_title"]').val(dataRow.data('tlink_title'));
							$('#link_form_modal input[name="tlink_url"]').val(dataRow.data('tlink_url'));
							$('#link_form_modal select[name="tlink_position"]').val(dataRow.data('tlink_position'));
							$('#link_form_modal select[name="tlink_status"]').val(dataRow.data('tlink_status'));
							$('#link_form_modal select[name="tlink_target_blank"]').val(dataRow.data('tlink_target_blank'));
							$('#link_form_modal').modal('show');
						});

						$(document).on('click', '#add_new_link', function(){
							$('#link_form_modal').modal('show');
						});

						$(document).on('change', '#slider_link_type', function(){

							$('#slider-link').val($(this).val());

						});

						$(document).on('click', ".btn_tlink_status_toggle", function(){
							let tlink_id = $(this).closest('tr').data('tlink_id');
							let tlink_status = $(this).hasClass('fa-toggle-off') ? 1 : 0;
							if(tlink_status) {
								$(this).addClass('fa-toggle-on').removeClass('fa-toggle-off');
								$(this).css("color", "green");
							} else {
								$(this).addClass('fa-toggle-off').removeClass('fa-toggle-on');
								$(this).css("color", "red");
							}

							$.ajax({
								url: "<?= base_url('themes/tlink_status_toggle') ?>",
								type: "POST",
								dataType: "json",
								data: {
									tlink_id:tlink_id,
									tlink_status:tlink_status,
								},
								success: function (response) {	
								}
							});
						});	

						$(function() {

							$( ".sortable2" ).sortable({

								update: function( event, ui ) {

									update_homepage_sections_table();

								}

							});

							$( ".sortable2" ).disableSelection();

						});

						$(function() {

							$( ".sortable_pages_for_top_menus" ).sortable({

								update: function( event, ui ) {

									update_homepage_top_menu_position();

								}

							});

							$( ".sortable_pages_for_top_menus" ).disableSelection();

						});

						$(function() {

							$( ".sortable" ).sortable({

								update: function( event, ui ) {

									let positions = [];

									$(this).children('tr').each(function () {

										if($(this).data('id') != null) {

											positions.push($(this).data('id'));

										}

									});

									$.ajax({

										url: "<?= base_url('themes/change_positions')  ?>",

										type: "POST",

										dataType: "json",

										data: {table:$(this).data('table'), whe_column:$(this).data('whe_column'), pos_column:$(this).data('pos_column'),positions:JSON.stringify(positions)},

										success: function (response) {	
										}

									});

								}

							});

							$( ".sortable" ).disableSelection();

						});

					</script>



					<script type="text/javascript">

						

						var loadFile = function(event) {

							var image = document.getElementById('output');

							image.src = URL.createObjectURL(event.target.files[0]);

						};



						$(document).on('click', '.remove-runner-btn', function(){

							$(this).parent().remove();

							$('#runners-section .col-md-12').each(function( index ) {

								$(this).find('.control-label').text('<?= __('admin.runner') ?>'+(index+1));

							});

							let count = $('#runners-section .col-md-12').length;

							if (count == 1) {

								$('#runners-section').prepend(`

								<div class="col-md-12">

									<div class="form-group">

										<label class="control-label">`+'<?= __('admin.runner') ?>'+` `+count+`</label>

										<input name="top_banner_slider[]" class="form-control" type="text">

									</div>

									<button type="button" class="btn btn-danger btn-md remove-runner-btn" style="position: absolute; top: 30px; right: 11px;"><i class="fa fa-trash"></i></button>

								</div>`);

							}

						});





						$(document).on('click', '#add-more-runner-btn', function(){

							let count = $('#runners-section .col-md-12').length;

							$(this).parent().before(`

							<div class="col-md-12">

								<div class="form-group">

									<label class="control-label">`+'<?= __('admin.runner') ?>'+` `+count+`</label>

									<input name="top_banner_slider[]" class="form-control" type="text">

								</div>

								<button type="button" class="btn btn-danger btn-md remove-runner-btn" style="position: absolute; top: 30px; right: 11px;"><i class="fa fa-trash"></i></button>

							</div>`);

						});



						// $(".btn-slider-submit").on('click',function(evt){

						// 	$("#linkError").empty();

						// 	$this = $("#admin-form");

						// 	$(".btn-submit").btn("loading");

						// 	$('.loading-submit').show();

						// 	var res = $('#slider-link').val();

						// 	if(res != "") {

						// 		var result = res.match(/(http(s)?:\/\/.)?(www\.)?[-a-zA-Z0-9@:%._\+~#=]{2,256}\.[a-z]{2,6}\b([-a-zA-Z0-9@:%_\+.~#?&//=]*)/g);

						// 		if(result == null && !res.includes("http://localhost") && !res.includes("https://localhost"))

						// 		{

						// 			$("#linkError").append('<?= __('admin.please_enter_valid_link') ?>');

						// 			$(".btn-submit").btn("reset");

						// 			return false;

						// 		}
						// 	}

							

						// 	evt.preventDefault();

						// 	var formData = new FormData($("#admin-form")[0]);



						// 	formData = formDataFilter(formData);

							

						// 	$.ajax({

						// 		url:'<?= base_url('themes/update_slider') ?>',

						// 		type:'POST',

						// 		dataType:'json',

						// 		cache:false,

						// 		contentType: false,

						// 		processData: false,

						// 		data:formData,

						// 		xhr: function (){

						// 			var jqXHR = null;



						// 			if ( window.ActiveXObject ){

						// 				jqXHR = new window.ActiveXObject( "Microsoft.XMLHTTP" );

						// 			}else {

						// 				jqXHR = new window.XMLHttpRequest();

						// 			}

									

						// 			jqXHR.upload.addEventListener( "progress", function ( evt ){

						// 				if ( evt.lengthComputable ){

						// 					var percentComplete = Math.round( (evt.loaded * 100) / evt.total );

						// 					$('.loading-submit').text(percentComplete + "% "+'<?= __('admin.loading') ?>');

						// 				}

						// 			}, false );



						// 			jqXHR.addEventListener( "progress", function ( evt ){

						// 				if ( evt.lengthComputable ){

						// 					var percentComplete = Math.round( (evt.loaded * 100) / evt.total );

						// 					$('.loading-submit').text('<?= __('admin.save') ?>');

						// 				}

						// 			}, false );

						// 			return jqXHR;

						// 		},

						// 		complete:function(result){

						// 			$(".btn-submit").btn("reset");

						// 		},

						// 		success:function(result){

						// 			$('.loading-submit').hide();

						// 			$this.find(".has-error").removeClass("has-error");

						// 			$this.find("span.text-danger").remove();

						// 			if(result['location'])
						// 				window.location = result['location'];

						// 			if(result['errors']){
						// 				$.each(result['errors'], function(i,j){
						// 					$ele = $this.find('[name="'+ i +'"]');
						// 					$ele.parents(".form-group").addClass("has-error");
						// 					if(i == 'avatar')
						// 						$ele.parent().parent().append("<span class='text-danger'>"+ j +"</span>");
						// 					else
						// 						$ele.after("<span class='text-danger'>"+ j +"</span>");
						// 				});
						// 			}

						// 		},

						// 	})

						// 	return false;

						// });

					</script>



<script>

$(document).ready(function() {

function read_url(input,name,display_id) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function(e) {
    	$("input[name='"+name+"']").val('image.jpg');
      	$('#'+display_id).attr('src', e.target.result);
    }
    reader.readAsDataURL(input.files[0]);
  }
}

$("#logo").change(function() {
  read_url(this,'hidden_logo','output_logo');
});

$("#faq_banner_image").change(function() {
  read_url(this,'hidden_faq_banner_image','output_faq_banner_image');
});

$("#contact_banner_image").change(function() {
  read_url(this,'hidden_contact_banner_image','output_contact_banner_image');
});

$("#homepage_video_section_bg").change(function() {
  read_url(this,'hidden_homepage_video_section_bg','output_homepage_video_section_bg');
});

$("#avatar_login").change(function() {
  read_url(this,'hidden_login_img','output_login');
});

$("#avatar_registration").change(function() {
  read_url(this,'hidden_reg_img','output_registration');
});

$("#avatar_terms").change(function() {
  read_url(this,'hidden_terms_img','output_terms');
});

$(".delete_page").click(function(e){
	if(!confirm("Are your sure ?")) return false;
	var href = $(this).attr("data-href");
	var id = $(this).attr("data-id");
	$.ajax({
		url: href,
		type: "GET",
		success: function (data) {
			$(".deleterow-" + id).remove();
			var alert_div = '<div class="alert alert-success alert-dismissable" ><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'+
				'<span id="alert_msg_2">'+'<?= __('admin.item_has_been_successfully_deleted') ?>'+'</span></div>';
			$("#alertdiv_2").append(alert_div);
			$("#alertdiv_2").show();
			setTimeout( function(){
			$("#alertdiv_2").fadeOut();
			}  , 2000 );
		}
	});
});

	$('#summernote').summernote({
	    minHeight: 300,
		toolbar: [
			['style', ['bold', 'italic', 'underline', 'clear']],
			['font', ['strikethrough', 'superscript', 'subscript']],
			['fontsize', ['fontsize']],
			['color', ['color']],
			['para', ['ul', 'ol', 'paragraph']],
			['height', ['height']]
		]
	});
});

</script>

<script type="text/javascript">

$(".confirm").on('click',function(){

if(!confirm('<?= __('admin.are_you_sure') ?>')) return false;

		return 1;

	})

</script>

<script type="text/javascript">

$('.setting-nnnav li a').on('shown.bs.tab', function(event){

var x = $(event.target).attr('href');

	$(".btn-submit").hide();

if(x != '#tab_sliders'){

	$(".btn-submit").show();

}

localStorage.setItem("last_pill", x);

});

$(document).on('ready',function() {

	var last_pill = localStorage.getItem("last_pill");

	if(last_pill){ $('[href="'+ last_pill +'"]').click() }

});
function validURL(str) {
	let pattern = new RegExp('^(https?:\\/\\/)?'+ // protocol
		'((([a-z\\d]([a-z\\d-]*[a-z\\d])*)\\.)+[a-z]{2,}|'+ // domain name
		'((\\d{1,3}\\.){3}\\d{1,3}))'+ // OR ip (v4) address
		'(\\:\\d+)?(\\/[-a-z\\d%_.~+]*)*'+ // port and path
		'(\\?[;&a-z\\d%_.~+=-]*)?'+ // query string
		'(\\#[-a-z\\d_]*)?$','i'); // fragment locator

	return !!pattern.test(str) || str.match(/^https?:\/\/\w+(\.\w+)*(:[0-9]+)?(\/.*)?$/g) !== null;
}

var imageArrays = [
					'homepage_video_section_bg',
					'logo',
					'faq_banner_image',
					'contact_banner_image',
					'avatar_login',
					'avatar_registration',
					'avatar_terms'
				];
 
$(".btn-submit-theme").on('click',function(evt){

	evt.preventDefault();

	$this = $("#admin-form");

	$(".btn-submit").btn("loading");

	$('.loading-submit').show();

	

	let is_invalid_form = false;

	let links_array = ["youtube_link", "facebook_link", "twitter_link", "instegram_link", "banner_button_link"]

	$.each(links_array, function( index, value ) {
		$("#"+value+"_error").empty();
		let link = $('#'+value).val();
		if(link != "") {
			if(!validURL(link)) {
				is_invalid_form = true;
				$("#"+value+"_error").append('<?= __('admin.please_enter_valid_link') ?>');
			}
		}
	});

	

	$("#whatsapp_number_error").empty();

	let whatsapp_number = $("input[name='whatsapp_number']").val();	

	if(whatsapp_number != "") {
		let whatsapp_number_is_valid = whatsapp_number.match(/^\+[1-9]{1}[0-9]{3,14}$/g);

		if(whatsapp_number_is_valid == null) {

			is_invalid_form = true;

			$("#whatsapp_number_error").append('<?= __('admin.please_enter_valid_mobile_number') ?>');

		}
	
	}


	$("#contact_us_phone_error").empty();

	let contact_us_phone_number = $("input[name='contact_us_phone']").val();	

	if(contact_us_phone_number != "") {
		let contact_us_phone_is_valid = contact_us_phone_number.match(/^\+[1-9]{1}[0-9]{3,14}$/g);

		if(contact_us_phone_is_valid == null) {

			is_invalid_form = true;

			$("#contact_us_phone_error").append('<?= __('admin.please_enter_valid_mobile_number') ?>');

		}
	}

	let contact_us_email = $("input[name='contact_us_email']").val();
	if(contact_us_email != "") {	
		if (!/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/.test($("input[name='contact_us_email']").val())) {
			is_invalid_form = true;
			$("#contact_us_email_error").append('<?= __('admin.please_enter_valid_email_address') ?>');
		}
	}


	if(is_invalid_form) {

		$(".btn-submit").btn("reset");

		$(".invalid-form-error").show();

		return false;

	}else{
		$(".invalid-form-error").hide();
	}



var formData = new FormData($("#admin-form")[0]);

formData = formDataFilter(formData);


$.ajax({

url:'<?= base_url('themes/update_settings') ?>',

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

$('.loading-submit').text(percentComplete + "% "+'<?= __('admin.laoding') ?>');

}

}, false );

jqXHR.addEventListener( "progress", function ( evt ){

if ( evt.lengthComputable ){

var percentComplete = Math.round( (evt.loaded * 100) / evt.total );

$('.loading-submit').text('<?= __('admin.save') ?>');

}

}, false );

return jqXHR;

},

complete:function(result){

$(".btn-submit-theme").btn("reset");

},

success:function(result){

$('.loading-submit').hide();

$this.find(".has-error").removeClass("has-error");

$this.find("span.text-danger").remove();

if(result['location']){

	window.location = result['location'];

}

if(result['errors']){

$.each(result['errors'], function(i,j){

	$ele = $this.find('[name="'+ i +'"]');
	$ele.parents(".form-group").addClass("has-error");
	if(imageArrays.includes(i))
		$ele.parent().parent().append("<span class='text-danger'>"+ j +"</span>");
	else
		$ele.after("<span class='text-danger'>"+ j +"</span>");

});

}

},

})

return false;

});

$(".alert").fadeTo(2000, 500).slideUp(500, function(){

$(".alert").alert('close');

});

function update_homepage_top_menu_position() {
	$('.homepages_top_menu_positions_loading').show();

	let page_id = $('input[name="page_id[]"]').map(function(){ 

		return this.value; 

	}).get();

	$.ajax({

		url: "<?= base_url('themes/change_homepage_top_menu_positions')  ?>",

		type: "POST",

		data: { 'page_id[]': page_id},

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

				}

			}, false );

			jqXHR.addEventListener( "progress", function ( evt ){

				if ( evt.lengthComputable ){

					var percentComplete = Math.round( (evt.loaded * 100) / evt.total );

				}

			}, false );

			return jqXHR;

		},

		complete: function(){

			setTimeout(function(){ $('.homepages_top_menu_positions_loading').hide(); }, 500);

		}

	});
}


function update_homepage_sections_table(){

	$('.home_sections_positions_loading').show();



	let sec_id = $('input[name="sec_id[]"]').map(function(){ 

		return this.value; 

	}).get();



	let sec_status = $('input[name="sec_status[]"]').map(function(){ 

		return this.value; 

	}).get();



	$.ajax({

		url: "<?= base_url('themes/change_home_sections_positions')  ?>",

		type: "POST",

		data: { 'sec_id[]': sec_id, 'sec_status[]': sec_status},

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
					// $('.home_sections_positions_loading').text(percentComplete + "% "+'<?= __('admin.completed') ?>');

				}

			}, false );

			jqXHR.addEventListener( "progress", function ( evt ){

				if ( evt.lengthComputable ){

					var percentComplete = Math.round( (evt.loaded * 100) / evt.total );
					// $('.home_sections_positions_loading').text(percentComplete + "%"+'<?= __('admin.completed') ?>');

				}

			}, false );

			return jqXHR;

		},

		complete: function(){

			// $('.home_sections_positions_loading').text('<?= __('admin.records_updated_successfully') ?>');

			setTimeout(function(){ $('.home_sections_positions_loading').hide(); }, 500);

		}

	});

}


$(document).on('click', '.theme_multiple_page_settings_save', function(){
	let postData = {};

	$('.theme_multiple_page_settings').each(function( index ) {
	  postData[$(this).attr('name')] = $(this).val();
	});

	$.ajax({

		url: "<?= base_url('themes/store_theme_multiple_page_settings')  ?>",

		type: "POST",

		data: postData,

		success: function (response) {	

			console.log(response);	

		}
	});
});


function change_theme_multiple_page(that, type){

	let value = $(that).hasClass('fa-toggle-off') ? 1 : 0;

	$('input[name="theme_multiple_page['+type+']"]').val(value);

	if ( value == 0 ) {

		$(that).addClass('fa-toggle-off');

		$(that).removeClass('fa-toggle-on');

		$(that).css("color", "red");

		$('.'+type+'_timing').css('display', 'none');

	} else {

		$(that).addClass('fa-toggle-on');

		$(that).removeClass('fa-toggle-off');

		$(that).css("color", "green");

		$('.'+type+'_timing').css('display', '');
	}
}

function change_section_status(id){

	let status = $('#section_status_'+id).val();

	if ( status == 1 ) {

		$('#section_status_'+id).val(0);

		$('#section_status_active_'+id).addClass('fa-toggle-off');

		$('#section_status_active_'+id).removeClass('fa-toggle-on');

		$('#section_status_active_'+id).css("color", "red");

	} else {

		$('#section_status_'+id).val(1);

		$('#section_status_active_'+id).addClass('fa-toggle-on');

		$('#section_status_active_'+id).removeClass('fa-toggle-off');

		$('#section_status_active_'+id).css("color", "green");

	}

	update_homepage_sections_table();

}

function change_page_status(id){

	var page_status = $('#page_status_'+id).val();

	if (page_status== 1) {

		var status = 0;

		var msg = '<?= __('admin.page_inactive_successfully') ?>';

	}else{

		var status = 1;

		var msg = '<?= __('admin.page_active_successfully') ?>';

	}

	$.ajax({

	url: "<?= base_url('themes/update_page_status/')  ?>",

	type: "POST",

	dataType: "json",

	data: {id:id,status:status},

	success: function (data)

	{	

		if (page_status == 1) {

			$('#page_status_active_'+id).addClass('fa-toggle-off');

			$('#page_status_active_'+id).removeClass('fa-toggle-on');

			$('#page_status_active_'+id).css("color", "red");

			$('#page_status_'+id).val(0);

		}

		if (page_status == 0) {

			$('#page_status_active_'+id).addClass('fa-toggle-on');

			$('#page_status_active_'+id).removeClass('fa-toggle-off');

			$('#page_status_active_'+id).css("color", "green");

			$('#page_status_'+id).val(1);

		}

	}
	});
}


$(document).on('click', '.btn-delete-image', function(){
	let input_name = $(this).data('img_input');
	let image_ele_id = $(this).data('img_ele');
	let placeholder_image = $(this).data('img_placeholder');
	$('input[name="'+input_name+'"]').val('');
	$('#'+image_ele_id).attr('src', placeholder_image);
	$(this).remove()
});

$(document).on('change', '#search_theme_pages', function(){
	let menu_name 				= $(this).val();
	let current_url 			= $(location).attr('href');
	
	var url = new URL(current_url);
	url.searchParams.set("menu_pages", menu_name);

	window.location.href = url.href; 
});

$(".save-theme-settings").on('click',function(evt){
    evt.preventDefault();

    var front_header_color_before_scroll = $('.front_header_color_before_scroll').val();
    if (front_header_color_before_scroll == '#000000') {
    	front_header_color_before_scroll = 'transparent';
    }
    var front_header_button_color_before_scroll = $('.front_header_button_color_before_scroll').val();
    var front_header_button_text_color_before_scroll = $('.front_header_button_text_color_before_scroll').val();
    var front_header_button_hover_color_before_scroll = $('.front_header_button_hover_color_before_scroll').val();
    var front_header_color_after_scroll = $('.front_header_color_after_scroll').val();
    var front_header_button_color_after_scroll = $('.front_header_button_color_after_scroll').val();
    var front_header_button_text_color_after_scroll = $('.front_header_button_text_color_after_scroll').val();
    var front_header_button_hover_color_after_scroll = $('.front_header_button_hover_color_after_scroll').val();
    var front_button_color = $('.front_button_color').val();
    var front_button_hover_color = $('.front_button_hover_color').val();
    var front_button_text_color = $('.front_button_text_color').val();
    var front_runner_bar_color = $('.front_runner_bar_color').val();
    var front_runner_bar_text_color = $('.front_runner_bar_text_color').val();
    var front_theme_text_color = $('.front_theme_text_color').val();
    var front_faq_before_hover_color = $('.front_faq_before_hover_color').val();
    var front_faq_after_hover_color = $('.front_faq_after_hover_color').val();
    var bottom_banner_before_footer = $('.bottom_banner_before_footer').val();
    var front_footer_color = $('.front_footer_color').val();

    var data = {
    	'theme[front_header_color_before_scroll]':front_header_color_before_scroll,
    	'theme[front_header_button_color_before_scroll]':front_header_button_color_before_scroll,
    	'theme[front_header_button_text_color_before_scroll]':front_header_button_text_color_before_scroll,
    	'theme[front_header_button_hover_color_before_scroll]':front_header_button_hover_color_before_scroll,
    	'theme[front_header_color_after_scroll]':front_header_color_after_scroll,
    	'theme[front_header_button_color_after_scroll]':front_header_button_color_after_scroll,
    	'theme[front_header_button_text_color_after_scroll]':front_header_button_text_color_after_scroll,
    	'theme[front_header_button_hover_color_after_scroll]':front_header_button_hover_color_after_scroll,
    	'theme[front_button_color]':front_button_color,
    	'theme[front_button_hover_color]':front_button_hover_color,
    	'theme[front_button_text_color]':front_button_text_color,
    	'theme[front_runner_bar_color]':front_runner_bar_color,
    	'theme[front_runner_bar_text_color]':front_runner_bar_text_color,
    	'theme[front_theme_text_color]':front_theme_text_color,
    	'theme[front_faq_before_hover_color]':front_faq_before_hover_color,
    	'theme[front_faq_after_hover_color]':front_faq_after_hover_color,
    	'theme[bottom_banner_before_footer]':bottom_banner_before_footer,
    	'theme[front_footer_color]':front_footer_color
    }

    $.ajax({
    	url:'<?= base_url('themes/themesetting/')  ?>',
        type:'POST',
        dataType:'json',
        cache:false,
        data:data,
        success:function(result){
            $(".save-theme-settings").btn("reset");
            $(".alert-dismissable").remove();

            if(result['location']){
                //window.location = result['location'];
            }

            if(result['success']){
                $(".tab-content").prepend('<div class="alert mt-4 alert-info alert-dismissable">'+ result['success'] +'</div>');
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

$(".default-front-theme-setting").on("click", function(){
    var setting = $(this).val();
    var color = '';

    if (setting == "front_header_color_before_scroll") {
        color = "transparent";
        $("input[name='theme[front_header_color_before_scroll]']").val(color);
    }else if (setting == 'front_header_button_color_before_scroll') {
        color = "#E98024";
        $("input[name='theme[front_header_button_color_before_scroll]']").val(color);
    }else if (setting == 'front_header_button_text_color_before_scroll') {
        color = "#ffffff";
        $("input[name='theme[front_header_button_text_color_before_scroll]']").val(color);
    }else if (setting == 'front_header_button_hover_color_before_scroll') {
        color = "#F66B14";
        $("input[name='theme[front_header_button_hover_color_before_scroll]']").val(color);
    }else if (setting == 'front_header_color_after_scroll') {
        color = "#E98024";
        $("input[name='theme[front_header_color_after_scroll]']").val(color);
    }else if (setting == 'front_header_button_color_after_scroll') {
        color = "#ffffff";
        $("input[name='theme[front_header_button_color_after_scroll]']").val(color);
    }else if (setting == 'front_header_button_text_color_after_scroll') {
        color = "#E98024";
        $("input[name='theme[front_header_button_text_color_after_scroll]']").val(color);
    }else if (setting == 'front_header_button_hover_color_after_scroll') {
        color = "#FC535E";
        $("input[name='theme[front_header_button_hover_color_after_scroll]']").val(color);
    }else if (setting == 'front_button_color') {
        color = "#f1a05a";
        $("input[name='theme[front_button_color]']").val(color);
    }else if (setting == 'front_button_hover_color') {
        color = "#F66B14";
        $("input[name='theme[front_button_hover_color]']").val(color);
    }else if (setting == 'front_button_text_color') {
        color = "#ffffff";
        $("input[name='theme[front_button_text_color]']").val(color);
    }else if (setting == 'front_runner_bar_color') {
        color = "#E98024";
        $("input[name='theme[front_runner_bar_color]']").val(color);
    }else if (setting == 'front_runner_bar_text_color') {
        color = "#ffffff";
        $("input[name='theme[front_runner_bar_text_color]']").val(color);
    }else if (setting == 'front_theme_text_color') {
        color = "#E98024";
        $("input[name='theme[front_theme_text_color]']").val(color);
    }else if (setting == 'front_faq_before_hover_color') {
        color = "#6A6A6A";
        $("input[name='theme[front_faq_before_hover_color]']").val(color);
    }else if (setting == 'front_faq_after_hover_color') {
        color = "#E98024";
        $("input[name='theme[front_faq_after_hover_color]']").val(color);
    }else if (setting == 'front_footer_color') {
        color = "#363839";
        $("input[name='theme[front_footer_color]']").val(color);
    }else if (setting == 'bottom_banner_before_footer') {
        color = "#D4731E";
        $("input[name='theme[bottom_banner_before_footer]']").val(color);
    }

    if(color != '') {
        $.ajax({
            url:base_url+'themes/default_front_theme_settings',
            type:'POST',
            dataType:'json',
            data:{'action':'default_front_theme_settings', setting:setting, color:color},
            success:function(json){
            },
        });
    }
});

$(document).ready(function(){
    $.ajax({
        url:'<?= base_url("themes/set_default_front_theme_settings") ?>',
        type:'POST',
        dataType:'json',
        data:{'action':'set_default_front_theme_settings', 'setting_type':'theme'},
        success:function(json){

        },
    });
});

</script>