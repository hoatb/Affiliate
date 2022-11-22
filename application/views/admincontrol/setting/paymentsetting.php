<style>
    .swal2-container {
    z-index: 9999999999 !important;
    }
</style>
<div class="card">
    <div class="card-body orange-color-bg">
        <form class="form-horizontal" autocomplete="off" method="post" action=""  enctype="multipart/form-data" id="setting-form">
            <div class="row">
                <div class="col-sm-12">
                    <ul class="nav nav-pills nav-stacked setting-nnnav payment-link" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active show" data-toggle="tab" href="#site-setting" role="tab">
                            <?= __('admin.site_setting') ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#email-setting" role="tab">
                            <?= __('admin.email_setting') ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tnc-page" role="tab">
                            <?= __('admin.terms_and_condition') ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tracking" role="tab">
                            <?= __('admin.tracking') ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#googlerecaptcha-setting" role="tab">
                            <?= __('admin.googlerecaptcha') ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#cron_jobs-setting" role="tab">
                            <?= __('admin.cron_jobs') ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#user-dashboard-setting" role="tab">
                            <?= __('admin.user_dashboard') ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#security" role="tab"><?= __('admin.security') ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#theme" role="tab"><?= __('admin.theme_design') ?></a>
                        </li>
                    </ul>
                </div>
                <div class="col-sm-12">
                    <div class="tab-content">
                        <?php if($this->session->flashdata('success')){?>
                        <div class="alert alert-success alert-dismissable"> <?php echo $this->session->flashdata('success'); ?> </div>
                        <?php } ?>
                        <div class="tab-pane p-3" id="theme" role="tabpanel">
                            <div class="row">
                                <div class="col-sm-6">
                                    <fieldset>
                                        <legend><?= __('admin.colors') ?></legend>
                                        <div class="row">
                                            <h5 class="ml-3"><?= __('admin.admin_side') ?></h5>
                                        </div>
                                        <div class="row d-flex theme-setting-row">
                                            <div class="col-sm-6">
                                                <label  class="control-label"><?= __('admin.side_bar_color') ?></label>
                                            </div>
                                            <div class="col-sm-4">
                                                <input class="form-control color-picker" type="color" name="theme[admin_side_bar_color]" value="<?= $theme['admin_side_bar_color'] != '' ? $theme['admin_side_bar_color'] : '#ffffff' ?>">
                                            </div>
                                            <div class="col-sm-2">
                                                <button class="btn btn-primary default-theme-setting" value="admin_side_bar_color"><?= __('admin.default') ?></button>
                                            </div>
                                        </div>
                                        <div class="row d-flex theme-setting-row">
                                            <div class="col-sm-6">
                                                <label  class="control-label"><?= __('admin.side_bar_scroll_color') ?></label>
                                            </div>
                                            <div class="col-sm-4">
                                                <input class="form-control color-picker" type="color" name="theme[admin_side_bar_scroll_color]" value="<?= $theme['admin_side_bar_scroll_color'] != '' ? $theme['admin_side_bar_scroll_color'] : '#ff846e' ?>">
                                            </div>
                                            <div class="col-sm-2">
                                                <button class="btn btn-primary default-theme-setting" value="admin_side_bar_scroll_color"><?= __('admin.default') ?></button>
                                            </div>
                                        </div>
                                        <div class="row d-flex theme-setting-row">
                                            <div class="col-sm-6">
                                                <label  class="control-label"><?= __('admin.side_bar_text_color') ?></label>
                                            </div>
                                            <div class="col-sm-4">
                                                <input class="form-control color-picker" type="color" name="theme[admin_side_bar_text_color]" value="<?= $theme['admin_side_bar_text_color'] != '' ? $theme['admin_side_bar_text_color'] : '#686868' ?>">
                                            </div>
                                            <div class="col-sm-2">
                                                <button class="btn btn-primary default-theme-setting" value="admin_side_bar_text_color"><?= __('admin.default') ?></button>
                                            </div>
                                        </div>
                                        <div class="row d-flex theme-setting-row">
                                            <div class="col-sm-6">
                                                <label  class="control-label"><?= __('admin.side_bar_text_hover_color') ?></label>
                                            </div>
                                            <div class="col-sm-4">
                                                <input class="form-control color-picker" type="color" name="theme[admin_side_bar_text_hover_color]" value="<?= $theme['admin_side_bar_text_hover_color'] != '' ? $theme['admin_side_bar_text_hover_color'] : '#ff846e' ?>">
                                            </div>
                                            <div class="col-sm-2">
                                                <button class="btn btn-primary default-theme-setting" value="admin_side_bar_text_hover_color"><?= __('admin.default') ?></button>
                                            </div>
                                        </div>
                                        <div class="row d-flex theme-setting-row">
                                            <div class="col-sm-6">
                                                <label  class="control-label"><?= __('admin.top_bar_color') ?></label>
                                            </div>
                                            <div class="col-sm-4">
                                                <input class="form-control color-picker" type="color" name="theme[admin_top_bar_color]" value="<?= $theme['admin_top_bar_color'] != '' ? $theme['admin_top_bar_color'] : '#ffffff' ?>">
                                            </div>
                                            <div class="col-sm-2">
                                                <button class="btn btn-primary default-theme-setting" value="admin_top_bar_color"><?= __('admin.default') ?></button>
                                            </div>
                                        </div>
                                        <div class="row d-flex theme-setting-row">
                                            <div class="col-sm-6">
                                                <label  class="control-label"><?= __('admin.footer_color') ?></label>
                                            </div>
                                            <div class="col-sm-4">
                                                <input class="form-control color-picker" type="color" name="theme[admin_footer_color]" value="<?= $theme['admin_footer_color'] != '' ? $theme['admin_footer_color'] : '#f2f3f5' ?>">
                                            </div>
                                            <div class="col-sm-2">
                                                <button class="btn btn-primary default-theme-setting" value="admin_footer_color"><?= __('admin.default') ?></button>
                                            </div>
                                        </div>
                                        <div class="row d-flex theme-setting-row">
                                            <div class="col-sm-6">
                                                <label  class="control-label"><?= __('admin.logo_color') ?></label>
                                            </div>
                                            <div class="col-sm-4">
                                                <input class="form-control color-picker" type="color" name="theme[admin_logo_color]" value="<?= $theme['admin_logo_color'] != '' ? $theme['admin_logo_color'] : '#ff846e' ?>">
                                            </div>
                                            <div class="col-sm-2">
                                                <button class="btn btn-primary default-theme-setting" value="admin_logo_color"><?= __('admin.default') ?></button>
                                            </div>
                                        </div>
                                        <div class="row d-flex theme-setting-row">
                                            <div class="col-sm-6">
                                                <label  class="control-label"><?= __('admin.button_color') ?></label>
                                            </div>
                                            <div class="col-sm-4">
                                                <input class="form-control color-picker" type="color" name="theme[admin_button_color]" value="<?= $theme['admin_button_color'] != '' ? $theme['admin_button_color'] : '#3d5674' ?>">
                                            </div>
                                            <div class="col-sm-2">
                                                <button class="btn btn-primary default-theme-setting" value="admin_button_color"><?= __('admin.default') ?></button>
                                            </div>
                                        </div>
                                        <div class="row d-flex theme-setting-row">
                                            <div class="col-sm-6">
                                                <label  class="control-label"><?= __('admin.button_hover_color') ?></label>
                                            </div>
                                            <div class="col-sm-4">
                                                <input class="form-control color-picker" type="color" name="theme[admin_button_hover_color]" value="<?= $theme['admin_button_hover_color'] != '' ? $theme['admin_button_hover_color'] : '#ff846e' ?>">
                                            </div>
                                            <div class="col-sm-2">
                                                <button class="btn btn-primary default-theme-setting" value="admin_button_hover_color"><?= __('admin.default') ?></button>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <h5 class="ml-3 mt-3"><?= __('admin.user_side') ?></h5>
                                        </div>
                                        <div class="row d-flex theme-setting-row">
                                            <div class="col-sm-6">
                                                <label  class="control-label"><?= __('admin.side_bar_color') ?></label>
                                            </div>
                                            <div class="col-sm-4">
                                                <input class="form-control color-picker" type="color" name="theme[user_side_bar_color]" value="<?= $theme['user_side_bar_color'] != '' ? $theme['user_side_bar_color'] : '#ffffff' ?>">
                                            </div>
                                            <div class="col-sm-2">
                                                <button class="btn btn-primary default-theme-setting" value="user_side_bar_color"><?= __('admin.default') ?></button>
                                            </div>
                                        </div>
                                        <div class="row d-flex theme-setting-row">
                                            <div class="col-sm-6">
                                                <label  class="control-label"><?= __('admin.side_bar_heading_and_menu_text_color') ?></label>
                                            </div>
                                            <div class="col-sm-4">
                                                <input class="form-control color-picker" type="color" name="theme[user_side_bar_text_color]" value="<?= $theme['user_side_bar_text_color'] != '' ? $theme['user_side_bar_text_color'] : '#3f567a' ?>">
                                            </div>
                                            <div class="col-sm-2">
                                                <button class="btn btn-primary default-theme-setting" value="user_side_bar_text_color"><?= __('admin.default') ?></button>
                                            </div>
                                        </div>
                                        <div class="row d-flex theme-setting-row">
                                            <div class="col-sm-6">
                                                <label  class="control-label"><?= __('admin.side_bar_clock_text_color') ?></label>
                                            </div>
                                            <div class="col-sm-4">
                                                <input class="form-control color-picker" type="color" name="theme[user_side_bar_clock_text_color]" value="<?= $theme['user_side_bar_clock_text_color'] != '' ? $theme['user_side_bar_clock_text_color'] : '#5ec394' ?>">
                                            </div>
                                            <div class="col-sm-2">
                                                <button class="btn btn-primary default-theme-setting" value="user_side_bar_clock_text_color"><?= __('admin.default') ?></button>
                                            </div>
                                        </div>
                                        <div class="row d-flex theme-setting-row">
                                            <div class="col-sm-6">
                                                <label  class="control-label"><?= __('admin.side_bar_text_hover_color') ?></label>
                                            </div>
                                            <div class="col-sm-4">
                                                <input class="form-control color-picker" type="color" name="theme[user_side_bar_text_hover_color]" value="<?= $theme['user_side_bar_text_hover_color'] != '' ? $theme['user_side_bar_text_hover_color'] : '#5ec394' ?>">
                                            </div>
                                            <div class="col-sm-2">
                                                <button class="btn btn-primary default-theme-setting" value="user_side_bar_text_hover_color"><?= __('admin.default') ?></button>
                                            </div>
                                        </div>
                                        <div class="row d-flex theme-setting-row">
                                            <div class="col-sm-6">
                                                <label  class="control-label"><?= __('admin.top_bar_color') ?></label>
                                            </div>
                                            <div class="col-sm-4">
                                                <input class="form-control color-picker" type="color" name="theme[user_top_bar_color]" value="<?= $theme['user_top_bar_color'] != '' ? $theme['user_top_bar_color'] : '#ffffff' ?>">
                                            </div>
                                            <div class="col-sm-2">
                                                <button class="btn btn-primary default-theme-setting" value="user_top_bar_color"><?= __('admin.default') ?></button>
                                            </div>
                                        </div>
                                        <div class="row d-flex theme-setting-row">
                                            <div class="col-sm-6">
                                                <label  class="control-label"><?= __('admin.footer_color') ?></label>
                                            </div>
                                            <div class="col-sm-4">
                                                <input class="form-control color-picker" type="color" name="theme[user_footer_color]" value="<?= $theme['user_footer_color'] != '' ? $theme['user_footer_color'] : '#5ec394' ?>">
                                            </div>
                                            <div class="col-sm-2">
                                                <button class="btn btn-primary default-theme-setting" value="user_footer_color"><?= __('admin.default') ?></button>
                                            </div>
                                        </div>
                                        <div class="row d-flex theme-setting-row">
                                            <div class="col-sm-6">
                                                <label  class="control-label"><?= __('admin.button_color') ?></label>
                                            </div>
                                            <div class="col-sm-4">
                                                <input class="form-control color-picker" type="color" name="theme[user_button_color]" value="<?= $theme['user_button_color'] != '' ? $theme['user_button_color'] : '#3d5674' ?>">
                                            </div>
                                            <div class="col-sm-2">
                                                <button class="btn btn-primary default-theme-setting" value="user_button_color"><?= __('admin.default') ?></button>
                                            </div>
                                        </div>
                                        <div class="row d-flex theme-setting-row">
                                            <div class="col-sm-6">
                                                <label  class="control-label"><?= __('admin.button_hover_color') ?></label>
                                            </div>
                                            <div class="col-sm-4">
                                                <input class="form-control color-picker" type="color" name="theme[user_button_hover_color]" value="<?= $theme['user_button_hover_color'] != '' ? $theme['user_button_hover_color'] : '#5ec394' ?>">
                                            </div>
                                            <div class="col-sm-2">
                                                <button class="btn btn-primary default-theme-setting" value="user_button_hover_color"><?= __('admin.default') ?></button>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                                <div class="col-sm-6">
                                    <fieldset>
                                        <legend><?= __('admin.fonts') ?></legend>
                                        <div class="form-group">
                                            <label  class="control-label"><?= __('admin.font_family') ?></label>
                                            <div class="row font-style-main">
                                                <div class="col-sm-4"><?= __('admin.admin_side') ?></div>
                                                <div class="col-sm-6">
                                                    <select class="form-control select2-input class_admin_side_font" name="site[admin_side_font]">
                                                        <?php foreach ($font_families as $key => $value) { 
                                                            if ($site['admin_side_font'] != '') {
                                                            ?>
                                                                <option value="<?= $value ?>" <?= $site['admin_side_font'] == $value ? 'selected' : '' ?> > <?= $key ?></option>
                                                            <?php
                                                            }else{
                                                            ?>
                                                                <option value="<?= $value ?>" <?= $value == 'PT Sans' ? 'selected' : '' ?> > <?= $key ?></option>
                                                            <?php
                                                            }
                                                        } ?>
                                                    </select>
                                                </div>
                                                <div class="col-sm-2">
                                                    <button class="btn btn-primary default-font-setting" value="admin_side_font"><?= __('admin.default') ?></button>
                                                </div>
                                            </div>
                                            <div class="row font-style-main">
                                                <div class="col-sm-4"><?= __('admin.user_side') ?></div>
                                                <div class="col-sm-6">
                                                    <select class="form-control select2-input class_user_side_font" name="site[user_side_font]">
                                                        <option value="Poppins" <?= $site['user_side_font'] == 'Poppins' ? 'selected' : '' ?>>Poppins</option>
                                                        <?php foreach ($font_families as $key => $value) { 
                                                            if ($site['user_side_font'] != '') {
                                                            ?>
                                                                <option value="<?= $value ?>" <?= $site['user_side_font'] == $value ? 'selected' : '' ?> > <?= $key ?></option>
                                                            <?php
                                                            }else{
                                                            ?>
                                                                <option value="<?= $value ?>" <?= $value == 'Poppins' ? 'selected' : '' ?> > <?= $key ?></option>
                                                            <?php
                                                            }
                                                        } ?>
                                                    </select>
                                                </div>
                                                <div class="col-sm-2">
                                                    <button class="btn btn-primary default-font-setting" value="user_side_font"><?= __('admin.default') ?></button>
                                                </div>
                                            </div>
                                            <div class="row font-style-main">
                                                <div class="col-sm-4"><?= __('admin.front_side') ?></div>
                                                <div class="col-sm-6">
                                                    <select class="form-control select2-input class_front_side_font" name="site[front_side_font]">
                                                        <?php foreach ($font_families as $key => $value) { 
                                                            if ($site['front_side_font'] != '') {
                                                            ?>
                                                                <option value="<?= $value ?>" <?= $site['front_side_font'] == $value ? 'selected' : '' ?> > <?= $key ?></option>
                                                            <?php
                                                            }else{
                                                            ?>
                                                                <option value="<?= $value ?>" <?= $value == 'sans-serif' ? 'selected' : '' ?> > <?= $key ?></option>
                                                            <?php
                                                            }
                                                        } ?>
                                                    </select>
                                                </div>
                                                <div class="col-sm-2">
                                                    <button class="btn btn-primary default-font-setting" value="front_side_font"><?= __('admin.default') ?></button>
                                                </div>
                                            </div>
                                            <div class="row font-style-main">
                                                <div class="col-sm-4"><?= __('admin.cart_store_side') ?></div>
                                                <div class="col-sm-6">
                                                    <select class="form-control select2-input class_cart_store_side_font" name="site[cart_store_side_font]">
                                                        <option value="Jost" <?= $site['cart_store_side_font'] == 'Jost' ? 'selected' : '' ?>>Jost</option>
                                                        <?php foreach ($font_families as $key => $value) { 
                                                            if ($site['cart_store_side_font'] != '') {
                                                            ?>
                                                                <option value="<?= $value ?>" <?= $site['cart_store_side_font'] == $value ? 'selected' : '' ?> > <?= $key ?></option>
                                                            <?php
                                                            }else{
                                                            ?>
                                                                <option value="<?= $value ?>" <?= $value == 'Jost' ? 'selected' : '' ?> > <?= $key ?></option>
                                                            <?php
                                                            }
                                                        } ?>
                                                    </select>
                                                </div>
                                                <div class="col-sm-2">
                                                    <button class="btn btn-primary default-font-setting" value="cart_store_side_font"><?= __('admin.default') ?></button>
                                                </div>
                                            </div>
                                            <div class="row font-style-main">
                                                <div class="col-sm-4"><?= __('admin.sales_store_side') ?></div>
                                                <div class="col-sm-6">
                                                    <select class="form-control select2-input class_sales_store_side_font" name="site[sales_store_side_font]">
                                                        <?php foreach ($font_families as $key => $value) { 
                                                            if ($site['sales_store_side_font'] != '') {
                                                            ?>
                                                                <option value="<?= $value ?>" <?= $site['sales_store_side_font'] == $value ? 'selected' : '' ?> > <?= $key ?></option>
                                                            <?php
                                                            }else{
                                                            ?>
                                                                <option value="<?= $value ?>" <?= $value == 'Roboto' ? 'selected' : '' ?> > <?= $key ?></option>
                                                            <?php
                                                            }
                                                        } ?>
                                                    </select>
                                                </div>
                                                <div class="col-sm-2">
                                                    <button class="btn btn-primary default-font-setting" value="sales_store_side_font"><?= __('admin.default') ?></button>
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane p-3" id="cron_jobs-setting" role="tabpanel">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h5><?= __('admin.what_is_cron_job') ?></h5>
                                    <p><?= __('admin.what_is_cron_job_answer') ?></p>
                                    <h6><?= __('admin.to_add_cron_job_steps') ?>:</h6>
                                    <ol>
                                        <li><?= __('admin.to_add_cron_job_step1') ?></li>
                                        <li><?= __('admin.to_add_cron_job_step2') ?></li>
                                        <li><?= __('admin.to_add_cron_job_step3') ?></li>
                                        <li><?= __('admin.to_add_cron_job_step4') ?>  <b><?= __('admin.once_per_minute') ?>(* * * * *)</b>.</li>
                                        <li>
                                            <?= __('admin.to_add_cron_job_step5') ?> 
                                            <div> <code>curl <?= base_url('/cronJob/transaction') ?></code></div>
                                        </li>
                                        <li><?= __('admin.to_add_cron_job_step6') ?></li>
                                    </ol>
                                </div>
                                <div class="col-sm-6">
                                    <img src="<?= base_url('assets/images/cronjob.png') ?>" class='img-responsive'>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane p-3" id="user-dashboard-setting" role="tabpanel">
                            <div class="alert alert-info mt-4" style="max-width: 50%;">
                                <?= __('admin.user_dashboard_notice')?></div>
                            <div class="form-group">
                                <label  class="control-label"><?= __('admin.top_affiliate') ?></label>
                                <div>
                                    <input class="btn-switch update_all_settings" type="checkbox" <?= $userdashboard['top_affiliate']==1 ? 'checked' : '' ?> data-toggle="toggle" data-size="normal" data-on="<?= __('admin.status_on') ?>" data-off="<?= __('admin.status_off') ?>" data-setting_key="top_affiliate" data-setting_type="userdashboard">
                                </div>
                            </div>

                             <div class="form-group">
                                <label  class="control-label"><?= __('admin.contact_us_page') ?></label>
                                <div>
                                    <input class="btn-switch update_all_settings" type="checkbox" <?= $userdashboard['contact_us_page']==1 ? 'checked' : '' ?> data-toggle="toggle" data-size="normal" data-on="<?= __('admin.status_on') ?>" data-off="<?= __('admin.status_off') ?>" data-setting_key="contact_us_page" data-setting_type="userdashboard">
                                </div>
                            </div>

                            <div class="form-group">
                                <label  class="control-label"><?= __('admin.tickets_page') ?></label>
                                <div>
                                    <input class="btn-switch update_all_settings" type="checkbox" <?= $userdashboard['tickets_page']==1 ? 'checked' : '' ?> data-toggle="toggle" data-size="normal" data-on="<?= __('admin.status_on') ?>" data-off="<?= __('admin.status_off') ?>" data-setting_key="tickets_page" data-setting_type="userdashboard">
                                </div>
                            </div>
                        </div>

                        <?php   
                            $site_url = $_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST'].''.$_SERVER['REDIRECT_URL'];
                            $root = rtrim($site_url, 'admincontrol/paymentsetting/');
                            ?>
                        <div class="tab-pane p-3" id="security" role="tabpanel">
                            <div class="form-group">
                                <label  class="control-label"><?= __('admin.change_admin_url') ?><span class="set-default"><a href="javascript:void(0)" class="set-default-admin-url"><?= __('admin.set_default') ?></a></span></label>
                                <div class="admin-login-path">
                                    <div class="root-path"><?php echo $root.'/' ?></div>
                                    <input name="security[admin_url]" value="<?php echo $security['admin_url']; ?>" class="form-control login-slug" type="text">
                                </div>
                            </div>
                            <div class="form-group">
                                <label  class="control-label"><?= __('admin.change_front_url') ?><span class="set-default"><a href="javascript:void(0)" class="set-default-front-url"><?= __('admin.set_default') ?></a></span></label>
                                <div class="admin-login-path">
                                    <div class="root-path"><?php echo $root.'/' ?></div>
                                    <input name="security[front_url]" value="<?php echo $security['front_url']; ?>" class="form-control front_url login-slug" type="text">
                                </div>
                            </div>
                            <div class="form-group">
                                <label  class="control-label"><?= __('admin.force_ssl') ?></label>
                                <div>
                                    <input class="btn-switch update_all_settings" type="checkbox" <?= $security['force_ssl']==1 ? 'checked' : '' ?> data-toggle="toggle" data-size="normal" data-on="<?= __('admin.status_on') ?>" data-off="<?= __('admin.status_off') ?>" data-setting_key="force_ssl" data-setting_type="security">
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane p-3 active show" id="site-setting" role="tabpanel">
                            <div class="form-group">
                                <label  class="control-label"><?= __('admin.website_name') ?></label>
                                <input name="site[name]" value="<?php echo $site['name']; ?>" class="form-control" type="text">
                            </div>
                            <div class="form-group">
                                <label  class="control-label"><?= __('admin.front_site_maintainance_mode') ?></label>
                                <div>
                                    <input class="btn-switch update_all_settings" type="checkbox" <?= $site['maintenance_mode']==1 ? 'checked' : '' ?> data-toggle="toggle" data-size="normal" data-on="<?= __('admin.status_on') ?>" data-off="<?= __('admin.status_off') ?>" data-setting_key="maintenance_mode" data-setting_type="site">
                                </div>
                            </div>
                            <div class="form-group">
                                <label  class="control-label"><?= __('admin.store_maintenance_mode') ?></label>
                                <div>
                                    <input class="btn-switch update_all_settings" type="checkbox" <?= $site['store_maintenance_mode']==1 ? 'checked' : '' ?> data-toggle="toggle" data-size="normal" data-on="<?= __('admin.status_on') ?>" data-off="<?= __('admin.status_off') ?>" data-setting_key="store_maintenance_mode" data-setting_type="site">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label"><?= __('admin.registration_form') ?></label>
                                <select class="form-control" name="store[registration_status]">
                                    <option value="1" <?= ($store['registration_status'] == 1) ? 'selected' : '' ?>>
                                        <?= __('admin.enable_affiliate_vendor_registration') ?>
                                    </option>
                                    <option value="0" <?= ($store['registration_status'] == 0) ? 'selected' : '' ?>>
                                        <?= __('admin.disable_affiliate_vendor_registration') ?>
                                    </option>
                                    <option value="2" <?= ($store['registration_status'] == 2) ? 'selected' : '' ?>>
                                        <?= __('admin.disable_affiliate_registration') ?>
                                    </option>
                                    <option value="3" <?= ($store['registration_status'] == 3) ? 'selected' : '' ?>>
                                        <?= __('admin.disable_vendor_registration') ?>
                                    </option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="control-label"><?= __('admin.user_account_mail_verification') ?></label>
                                <div>
                                    <input class="btn-switch update_all_settings" type="checkbox" <?= $store['mail_verifiy']==1 ? 'checked' : '' ?> data-toggle="toggle" data-size="normal" data-on="<?= __('admin.status_on') ?>" data-off="<?= __('admin.status_off') ?>" data-setting_key="mail_verifiy" data-setting_type="store" id="mail_verifiy" >
                                </div>
                            </div>

                            <div class="form-group" id="registration_approval_group" >
                                <label class="control-label"><?= __('admin.approval_for_registration') ?></label>
                                <div>
                                    <input class="btn-switch update_all_settings regisapproval" type="checkbox" <?= $store['registration_approval']==1 ? 'checked' : '' ?> data-toggle="toggle" data-size="normal" data-on="<?= __('admin.status_on') ?>" data-off="<?= __('admin.status_off') ?>" data-setting_key="registration_approval" data-setting_type="store" id="registration_approval">
                                </div>
                            </div>

                            

                            <div class="form-group">
                                <label  class="control-label"><?= __('admin.notification_email') ?></label>
                                <input name="site[notify_email]" value="<?php echo $site['notify_email']; ?>" class="form-control" type="email">
                            </div>
                            <div class="form-group">
                                <label  class="control-label"><?= __('admin.session_timeout_timing_in_seconds') ?></label>
                                <input  name="site[session_timeout]" value="<?php echo $site['session_timeout']; ?>" class="form-control" placeholder="<?= __('admin.default_timeout_is_1800_seconds') ?>" onkeypress="return isNumeric(event)" oninput="maxLengthCheck(this)" type="number" maxlength="6" min = "1" max = "999999">
                            </div>
                            <div class="form-group">
                                <label  class="control-label"><?= __('admin.user_session_timeout_timing_in_seconds') ?></label>
                                <input  name="site[user_session_timeout]" value="<?php echo $site['user_session_timeout']; ?>" class="form-control" placeholder="<?= __('admin.default_timeout_is_1800_seconds') ?>" onkeypress="return isNumeric(event)" oninput="maxLengthCheck(this)" type="number" maxlength="6" min = "1" max = "999999">
                            </div>
                            <div class="form-group">
                                <label  class="control-label"><?= __('admin.footer_text') ?></label>
                                <input name="site[footer]" value="<?php echo $site['footer']; ?>" class="form-control" type="text">
                            </div>
                            <?php
                                $zones_array = array();
                                $timestamp = time();
                                foreach(timezone_identifiers_list() as $key => $zone) {
                                    date_default_timezone_set($zone);
                                    $zones_array[$zone] = date('P', $timestamp) . " {$zone} ";
                                }
                                ?>
                            <div class="form-group">
                                <label  class="control-label"><?= __('admin.time_zone') ?></label>
                                <select class="form-control select2-input" name="site[time_zone]">
                                    <?php foreach ($zones_array as $key => $value) { ?>
                                    <option value="<?= $key ?>" <?= $site['time_zone'] == $key ? 'selected' : '' ?> > <?= $value ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label"><?= __('admin.show_language_dropdown') ?></label>
                                        <div>
                                            <input class="btn-switch update_all_settings" type="checkbox" <?= $store['language_status']==1 ? 'checked' : '' ?> data-toggle="toggle" data-size="normal" data-on="<?= __('admin.status_on') ?>" data-off="<?= __('admin.status_off') ?>" data-setting_key="language_status" data-setting_type="store">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label"><?= __('admin.hide_currency_from') ?></label>
                                        <br/>
                                        <?php
                                            $hcf = [];
                                            
                                            if(isset($site['hide_currency_from']) && !empty($site['hide_currency_from'])) {
                                                $hcf = explode(',', $site['hide_currency_from']);
                                            }
                                            
                                            ?>
                                        <label class="checkbox-inline"><input type="checkbox" name="site[hide_currency_from][]" value="admin" <?= (in_array('admin', $hcf)) ? "checked" : ""; ?>>&nbsp;&nbsp;<?= __('admin.admin_dashboard') ?></label>
                                        &nbsp;&nbsp;&nbsp;
                                        <label class="checkbox-inline"><input type="checkbox" name="site[hide_currency_from][]" value="user" <?= (in_array('user', $hcf)) ? "checked" : ""; ?>>&nbsp;&nbsp;<?= __('admin.user_dashboard') ?></label>
                                    </div>
                                </div>
                            </div>
                            <fieldset>
                                <legend><?= __('admin.admin_side_logo') ?></legend>
                                <div class="row">
                                    <div class="col-sm-2">
                                        <div class="fileUpload btn btn-sm btn-primary">
                                            <span><?= __('admin.choose_file') ?></span>
                                            <input name="site_admin-side-logo" class="upload" type="file" onchange="readURLAndSetValue(this,'site[admin-side-logo]','#admin-side-logo')">
                                        </div>
                                        <p class="logo-info-text"><?= __('admin.admin_side_logo_recommended_size') ?></p>
                                    </div>
                                    <div class="col-sm-10">
                                        <input type="hidden" name="site[admin-side-logo]" value="<?= $site['admin-side-logo'] ?>">
                                        <?php $admin_side_logo = $site['admin-side-logo'] ? base_url('assets/images/site/'. $site['admin-side-logo']) : base_url('assets/vertical/assets/images/no_image_yet.png'); ?>
                                        <img id="admin-side-logo" class='img-responsive_setting' src="<?= $admin_side_logo ?>" style="width: 150px;">
                                        <?php if($site['admin-side-logo']) { ?>
                                        <span class="btn btn-sm btn-danger btn-delete-image" data-img_input="site[admin-side-logo]" data-img_ele="admin-side-logo" data-img_placeholder="<?= base_url('assets/vertical/assets/images/no_image_yet.png');?>"><i class="fa fa-trash"></i></span>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label  class="control-label"><?= __('admin.site_setting_logo_custom_size') ?></label>
                                            <select name="site[custom_logo_size]" class="form-control">
                                                <option value="0"><?= __('admin.disable') ?></option>
                                                <option <?php echo ($site['custom_logo_size'] == 1) ? "selected" :""; ?> value="1"><?= __('admin.user_dashboard') ?></option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4 logo_cust_size_inp" <?php echo ($site['custom_logo_size'] != 1) ? 'style="display:none;"' :""; ?>>
                                        <div class="form-group">
                                            <label  class="control-label"><?= __('admin.site_setting_logo_width') ?></label>
                                            <input name="site[log_custom_width]" value="<?php echo $site['log_custom_width']; ?>" class="form-control" type="number">
                                        </div>
                                    </div>
                                    <div class="col-sm-4 logo_cust_size_inp" <?php echo ($site['custom_logo_size'] != 1) ? 'style="display:none;"':""; ?>>
                                        <div class="form-group">
                                            <label  class="control-label"><?= __('admin.site_setting_logo_height') ?></label>
                                            <input name="site[log_custom_height]" value="<?php echo $site['log_custom_height']; ?>" class="form-control" type="number">
                                        </div>
                                    </div>
                                    <script type="text/javascript">
                                        $(document).on('change', 'select[name="site[custom_logo_size]"]', function() {
                                            if($(this).val() == 1) {
                                                $('.logo_cust_size_inp').show();
                                            } else {
                                                $('.logo_cust_size_inp').hide();
                                            }
                                        });
                                    </script>
                                </div>
                            </fieldset>
                            <br>
                            <fieldset>
                                <legend><?= __('admin.front_side_themes_logo') ?></legend>
                                <div class="row">
                                    <div class="col-sm-2">
                                        <div class="fileUpload btn btn-sm btn-primary">
                                            <span><?= __('admin.choose_file') ?></span>
                                            <input name="site_front-side-themes-logo" class="upload" type="file" onchange="readURLAndSetValue(this,'site[front-side-themes-logo]','#front-side-themes-logo')">
                                        </div>
                                        <p class="logo-info-text"><?= __('admin.front_side_themes_logo_recommended_size') ?></p>
                                    </div>
                                    <div class="col-sm-10">
                                        <input type="hidden" name="site[front-side-themes-logo]" value="<?= $site['front-side-themes-logo'] ?>">
                                        <?php $front_side_themes_logo = $site['front-side-themes-logo'] ? base_url('assets/images/site/'. $site['front-side-themes-logo']) : base_url('assets/vertical/assets/images/no_image_yet.png'); ?>
                                        <img id="front-side-themes-logo" class='img-responsive_setting' src="<?= $front_side_themes_logo ?>" style="width: 150px;">
                                        <?php if($site['front-side-themes-logo']) { ?>
                                        <span class="btn btn-sm btn-danger btn-delete-image" data-img_input="site[front-side-themes-logo]" data-img_ele="front-side-themes-logo" data-img_placeholder="<?= base_url('assets/vertical/assets/images/no_image_yet.png');?>"><i class="fa fa-trash"></i></span>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label  class="control-label"><?= __('admin.site_setting_logo_custom_size') ?></label>
                                            <select name="site[front_custom_logo_size]" class="form-control">
                                                <option value="0"><?= __('admin.disable') ?></option>
                                                <option <?php echo ($site['front_custom_logo_size'] == 1) ? "selected" :""; ?> value="1"><?= __('admin.front_side_themes') ?></option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4 front_logo_cust_size_inp" <?php echo ($site['front_custom_logo_size'] != 1) ? 'style="display:none;"' :""; ?>>
                                        <div class="form-group">
                                            <label  class="control-label"><?= __('admin.site_setting_logo_width') ?></label>
                                            <input name="site[front_log_custom_width]" value="<?php echo $site['front_log_custom_width']; ?>" class="form-control" type="number">
                                        </div>
                                    </div>
                                    <div class="col-sm-4 front_logo_cust_size_inp" <?php echo ($site['front_custom_logo_size'] != 1) ? 'style="display:none;"':""; ?>>
                                        <div class="form-group">
                                            <label  class="control-label"><?= __('admin.site_setting_logo_height') ?></label>
                                            <input name="site[front_log_custom_height]" value="<?php echo $site['front_log_custom_height']; ?>" class="form-control" type="number">
                                        </div>
                                    </div>
                                    <script type="text/javascript">
                                        $(document).on('change', 'select[name="site[front_custom_logo_size]"]', function() {
                                            if($(this).val() == 1) {
                                                $('.front_logo_cust_size_inp').show();
                                            } else {
                                                $('.front_logo_cust_size_inp').hide();
                                            }
                                        });
                                    </script>
                                </div>
                            </fieldset>
                            <br>
                            <fieldset>
                                <legend><?= __('admin.website_favicon') ?></legend>
                                <div class="row">
                                    <div class="col-sm-2">
                                        <div class="fileUpload btn btn-sm btn-primary">
                                            <span><?= __('admin.choose_file') ?></span>
                                            <input name="site_favicon" class="upload" type="file" onchange="readURLAndSetValue(this,'site[favicon]','#site-favicon')">
                                        </div>
                                    </div>
                                    <div class="col-sm-10">
                                        <input type="hidden" name="site[favicon]" value="<?= $site['favicon'] ?>">
                                        <?php $img = $site['favicon'] ? base_url('assets/images/site/'. $site['favicon']) : base_url('assets/vertical/assets/images/no_image_yet.png'); ?>
                                        <img id='site-favicon' class='img-responsive_setting' src="<?= $img ?>" style="width: 150px;">
                                        <?php if($site['favicon']) { ?>
                                        <span class="btn btn-sm btn-danger btn-delete-image" data-img_input="site[favicon]" data-img_ele="site-favicon" data-img_placeholder="<?= base_url('assets/vertical/assets/images/no_image_yet.png');?>"><i class="fa fa-trash"></i></span>
                                        <?php } ?>
                                    </div>
                                </div>
                            </fieldset>
                            <br>    
                            <fieldset>
                                <legend><?= __('admin.meta_tag') ?></legend>
                                <div class="form-group">
                                    <label  class="control-label"><?= __('admin.description') ?></label>
                                    <input name="site[meta_description]" value="<?php echo $site['meta_description']; ?>" class="form-control" type="text">
                                </div>
                                <div class="form-group">
                                    <label  class="control-label"><?= __('admin.keywords') ?></label>
                                    <input name="site[meta_keywords]" value="<?php echo $site['meta_keywords']; ?>" class="form-control" type="text">
                                </div>
                                <div class="form-group">
                                    <label  class="control-label"><?= __('admin.author') ?></label>
                                    <input name="site[meta_author]" value="<?php echo $site['meta_author']; ?>" class="form-control" type="text">
                                </div>
                            </fieldset>
                            <br>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="control-label"><?= __('admin.google_analytics_for_site_page') ?></label>
                                        <textarea rows="8" name="site[google_analytics]" class="form-control site-google_analytics"><?php echo $site['google_analytics']; ?></textarea>
                                        <a href="https://support.google.com/analytics/answer/1008080?hl=en" target="_blank"><?= __('admin.get_analytics_code') ?></a>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="control-label"><?= __('admin.example') ?></label>
                                        <img class="img-responsive_setting w-100" src="<?= base_url('assets/images/google_analytics.png') ?>">
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="control-label"><?= __('admin.faceboook_pixel_for_site_page') ?></label>
                                        <textarea rows="8" name="site[faceboook_pixel]" class="form-control site-faceboook_pixel"><?php echo $site['faceboook_pixel']; ?></textarea>
                                        <a href="https://developers.facebook.com/docs/facebook-pixel/implementation" target="_blank"><?= __('admin.get_facebook_pixel_code') ?></a>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="control-label"><?= __('admin.example') ?></label>
                                        <img class="img-responsive_setting w-100" src="<?= base_url('assets/images/faceboook_pixel.png') ?>">
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="control-label"><?= __('admin.facebook_chat_plugin_script') ?></label>
                                        <textarea rows="8" name="site[fbmessager_script]" class="form-control site-fbmessager_script"><?php echo $site['fbmessager_script']; ?></textarea>
                                    </div>
                                    <?php  $fbmessager_status = (array)json_decode($site['fbmessager_status'],1); ?>
                                    <div class="form-group">
                                        <label class="control-label"><?= __('admin.show_facebook_chat_code') ?> :</label>
                                        <div>
                                            <div style="display:inline-block;">
                                                <label>
                                                <input type="checkbox" <?= in_array('admin', $fbmessager_status) ? 'checked' : '' ?> name="site[fbmessager_status][]" value="admin"> <?= __('admin.option_admin_side') ?>
                                                </label>
                                            </div>
                                            &nbsp;&nbsp;
                                            <div style="display:inline-block;">
                                                <label>
                                                <input type="checkbox" <?= in_array('affiliate', $fbmessager_status) ? 'checked' : '' ?> name="site[fbmessager_status][]" value="affiliate"> <?= __('admin.option_affiliate_side') ?>
                                                </label>
                                            </div>
                                            &nbsp;&nbsp;
                                            <div style="display:inline-block;">
                                                <label>
                                                <input type="checkbox" <?= in_array('front', $fbmessager_status) ? 'checked' : '' ?> name="site[fbmessager_status][]" value="front"> <?= __('admin.option_front_side') ?>
                                                </label>
                                            </div>
                                            &nbsp;&nbsp;
                                            <div style="display:inline-block;">
                                                <label>
                                                <input type="checkbox" <?= in_array('store', $fbmessager_status) ? 'checked' : '' ?> name="site[fbmessager_status][]" value="store"> <?= __('admin.option_store_side') ?>
                                                </label>
                                            </div>
                                            &nbsp;&nbsp;
                                        </div>
                                    </div>
                                    <a class="mt-2" href="https://developers.facebook.com/docs/messenger-platform/discovery/facebook-chat-plugin/#setup_tool" target="_blank"><?= __('admin.get_facebook_chat_code') ?></a>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="control-label"><?= __('admin.example') ?></label>
                                        <img class="img-responsive_setting w-100" src="<?= base_url('assets/images/fb_chat_script.png') ?>">
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="control-label"><?= __('admin.global_script') ?></label>
                                        <textarea rows="8" name="site[global_script]" class="form-control site-global_script"><?php echo $site['global_script']; ?></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <?php  $global_script_status = (array)json_decode($site['global_script_status'],1); ?>
                                    <div class="form-group">
                                        <label class="control-label"><?= __('admin.show_global_script') ?></label>
                                        <div>
                                            <div>
                                                <label>
                                                <input type="checkbox" <?= in_array('admin', $global_script_status) ? 'checked' : '' ?> name="site[global_script_status][]" value="admin"> <?= __('admin.option_admin_side') ?>
                                                </label>
                                            </div>
                                            <div>
                                                <label>
                                                <input type="checkbox" <?= in_array('affiliate', $global_script_status) ? 'checked' : '' ?> name="site[global_script_status][]" value="affiliate"> <?= __('admin.option_affiliate_side') ?>
                                                </label>
                                            </div>
                                            <div>
                                                <label>
                                                <input type="checkbox" <?= in_array('front', $global_script_status) ? 'checked' : '' ?> name="site[global_script_status][]" value="front"> <?= __('admin.option_front_side') ?>
                                                </label>
                                            </div>
                                            <div>
                                                <label>
                                                <input type="checkbox" <?= in_array('store', $global_script_status) ? 'checked' : '' ?> name="site[global_script_status][]" value="store"> <?= __('admin.option_store_side') ?>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div>
                                        <label class="control-label"><?= __('admin.notification_sound') ?></label>
                                    </div>
                                    <div>
                                        <?php 
                                            $arrFiles = array();
                                            $handle = opendir('assets/notify');
                                            if ($handle) {
                                                while (($entry = readdir($handle)) !== FALSE) {
                                                    $arrFiles[] = $entry;
                                                }
                                            }
                                            
                                            foreach ($arrFiles as $file) {
                                                $allowed = array('mp3', 'mp4');
                                                $filename = $file;
                                                $ext = pathinfo($filename, PATHINFO_EXTENSION);
                                                $checked = '';
                                            
                                                if ($audio_sound != '') {
                                                    if ($filename == $audio_sound) {
                                                        $checked = 'checked';
                                                    }
                                                }
                                            
                                                if (in_array($ext, $allowed)) {
                                                    ?>
                                        <div class="sound-main">
                                            <input type="radio" name="site[notification_sound]" value="<?= $file ?>" <?= $checked ?>>
                                            <div class="audio-file">
                                                <?php  echo $file; ?>
                                            </div>
                                            <audio class="audio-control" controls>
                                                <source src="<?= base_url('/assets/notify/'.$file) ?>" type="audio/mpeg">
                                            </audio>
                                        </div>
                                        <?php   
                                            }
                                            }
                                            ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane p-3" id="login-2" role="tabpanel"> 
                        </div>
                        <div class="tab-pane p-3" id="email-setting" role="tabpanel">
                            <div class="form-group">
                                <label class="control-label"><?= __('admin.mail_type') ?></label>
                                <select class="form-control" name="email[mail_type]">
                                    <option value="smtp" <?= $email['mail_type'] == 'smtp' ? 'selected' : '' ?>><?= __('admin.smtp') ?></option>
                                    <option value="php_mailer" <?= $email['mail_type'] == 'php_mailer' ? 'selected' : '' ?>><?= __('admin.php_mailer') ?></option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label  class="control-label"><?= __('admin.from_email') ?></label>
                                <input name="email[from_email]" value="<?php echo $email['from_email']; ?>" class="form-control" type="text">
                            </div>
                            <div class="form-group">
                                <label  class="control-label"><?= __('admin.from_name') ?></label>
                                <input name="email[from_name]" value="<?php echo $email['from_name']; ?>" class="form-control" type="text">
                            </div>
                            <div class="form-group for-smtp-mail">
                                <label  class="control-label"><?= __('admin.smtp_hostname') ?></label>
                                <input name="email[smtp_hostname]" value="<?php echo $email['smtp_hostname']; ?>" class="form-control" type="text">
                            </div>
                            <div class="form-group for-smtp-mail">
                                <label  class="control-label"><?= __('admin.smtp_username') ?></label>
                                <input name="email[smtp_username]" value="<?php echo $email['smtp_username']; ?>" class="form-control" type="text">
                            </div>
                            <div class="form-group for-smtp-mail">
                                <label  class="control-label"><?= __('admin.smtp_password') ?></label>
                                <div class="input-group password-group">
                                    <input readonly="" onfocus="this.removeAttribute('readonly');" onblur="this.setAttribute('readonly','readonly');" autocomplete="off" type="password" class="form-control" name="email[smtp_password]" value="<?php echo $email['smtp_password']; ?>">
                                    <div class="input-group-prepend">
                                        <button class="btn btn-outline-secondary" type="button"><i class="fa fa-eye"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group for-smtp-mail">
                                <label  class="control-label"><?= __('admin.smtp_port') ?></label>
                                <input name="email[smtp_port]" value="<?php echo $email['smtp_port']; ?>" class="form-control" type="text">
                            </div>
                            <div class="form-group for-smtp-mail">
                                <label class="control-label"><?= __('admin.smtp_crypto') ?></label>
                                <select class="form-control" name="email[smtp_crypto]">
                                    <option value=""><?= __('admin.none') ?></option>
                                    <option value="tls" <?= $email['smtp_crypto'] == 'tls' ? 'selected' : '' ?>><?= __('admin.tls') ?></option>
                                    <option value="ssl" <?= $email['smtp_crypto'] == 'ssl' ? 'selected' : '' ?>><?= __('admin.ssl') ?></option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label  class="control-label"><?= __('admin.unsubscribed_page_title') ?></label>
                                <input name="email[unsubscribed_page_title]" value="<?php echo $email['unsubscribed_page_title']; ?>" class="form-control" type="text">
                            </div>
                            <div class="form-group">
                                <label  class="control-label"><?= __('admin.unsubscribed_page_message') ?></label>
                                <textarea name="email[unsubscribed_page_message]" class="form-control"><?php echo $email['unsubscribed_page_message']; ?></textarea>
                            </div>
                            <fieldset>
                                <legend><?= __('admin.testing') ?></legend>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control testingemail" placeholder="<?= __('admin.test_email_send_on') ?>" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                    <div class="input-group-append cp">
                                        <span class="btn btn-primary input-group-text send-test-mail" id="basic-addon2"><?= __('admin.send_test_mail') ?></span>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                        <div class="tab-pane p-3" id="tnc-page" role="tabpanel">
                            <div class="form-group">
                                <label  class="control-label"><?= __('admin.page_title') ?></label>
                                <input placeholder="<?= __('admin.enter_page_title') ?>" name="tnc[heading]" value="<?php echo $tnc['heading']; ?>" class="form-control"  type="text">
                            </div>
                            <div class="form-group">
                                <label  class="control-label"><?= __('admin.page_content') ?></label>
                                <textarea name="tnc[content]" class="form-control summernote"><?php echo $tnc['content']; ?></textarea>
                            </div>
                        </div>
                        <div class="tab-pane p-3" id="tracking" role="tabpanel">
                            <div class="form-group">
                                <label class="control-label"><?= __('admin.affiliate_tracking') ?></label>
                                <select class="form-control" name="site[affiliate_tracking_place]">
                                    <option value="0" selected><?= __('admin.use_cookies') ?></option>
                                    <option <?= $site['affiliate_tracking_place'] == 1 ? 'selected' : ''; ?> value="1"><?= __('admin.use_local_storage') ?></option>
                                    <option <?= $site['affiliate_tracking_place'] == 2 ? 'selected' : ''; ?> value="2"><?= __('admin.use_cookies_and_local_storage_both') ?></option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label  class="control-label"><?= __('admin.affiliate_cookie') ?></label>
                                <input class="form-control input-affiliate_cookie" type="number" value="<?= $store['affiliate_cookie'] ?>" name="store[affiliate_cookie]">
                            </div>
                            <div class="form-group">
                                <label class="control-label"><?= __('admin.block_click_across_browser') ?></label>
                                <div>
                                    <input class="btn-switch update_all_settings" type="checkbox" <?= $site['block_click_across_browser']==1 ? 'checked' : '' ?> data-toggle="toggle" data-size="normal" data-on="<?= __('admin.status_on') ?>" data-off="<?= __('admin.status_off') ?>" data-setting_key="block_click_across_browser" data-setting_type="site">
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane p-3" id="googlerecaptcha-setting" role="tabpanel">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label  class="control-label"><?= __('admin.text_site_key') ?></label>
                                        <input class="form-control" type="text" value="<?= $googlerecaptcha['sitekey'] ?>" name="googlerecaptcha[sitekey]">
                                    </div>
                                    <div class="form-group">
                                        <label  class="control-label"><?= __('admin.text_secret_key') ?></label>
                                        <input class="form-control" type="text" value="<?= $googlerecaptcha['secretkey'] ?>" name="googlerecaptcha[secretkey]">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label"><?= __('admin.admin_login') ?></label>
                                        <div>
                                            <input class="btn-switch update_all_settings" type="checkbox" <?= $googlerecaptcha['admin_login']==1 ? 'checked' : '' ?> data-toggle="toggle" data-size="normal" data-on="<?= __('admin.status_on') ?>" data-off="<?= __('admin.status_off') ?>" data-setting_key="admin_login" data-setting_type="googlerecaptcha">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="control-label"><?= __('admin.affiliate_login') ?></label>
                                                <div>
                                                    <input class="btn-switch update_all_settings" type="checkbox" <?= $googlerecaptcha['affiliate_login']==1 ? 'checked' : '' ?> data-toggle="toggle" data-size="normal" data-on="<?= __('admin.status_on') ?>" data-off="<?= __('admin.status_off') ?>" data-setting_key="affiliate_login" data-setting_type="googlerecaptcha">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="control-label"><?= __('admin.affiliate_register') ?></label>
                                                <div>
                                                    <input class="btn-switch update_all_settings" type="checkbox" <?= $googlerecaptcha['affiliate_register']==1 ? 'checked' : '' ?> data-toggle="toggle" data-size="normal" data-on="<?= __('admin.status_on') ?>" data-off="<?= __('admin.status_off') ?>" data-setting_key="affiliate_register" data-setting_type="googlerecaptcha">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="control-label"><?= __('admin.client_login') ?></label>
                                                <div>
                                                    <input class="btn-switch update_all_settings" type="checkbox" <?= $googlerecaptcha['client_login']==1 ? 'checked' : '' ?> data-toggle="toggle" data-size="normal" data-on="<?= __('admin.status_on') ?>" data-off="<?= __('admin.status_off') ?>" data-setting_key="client_login" data-setting_type="googlerecaptcha">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="control-label"><?= __('admin.client_register') ?></label>
                                                <div>
                                                    <input class="btn-switch update_all_settings" type="checkbox" <?= $googlerecaptcha['client_register']==1 ? 'checked' : '' ?> data-toggle="toggle" data-size="normal" data-on="<?= __('admin.status_on') ?>" data-off="<?= __('admin.status_off') ?>" data-setting_key="client_register" data-setting_type="googlerecaptcha">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="control-label"><?= __('admin.store_contact') ?></label>
                                                <div>
                                                    <input class="btn-switch update_all_settings" type="checkbox" <?= $googlerecaptcha['store_contact']==1 ? 'checked' : '' ?> data-toggle="toggle" data-size="normal" data-on="<?= __('admin.status_on') ?>" data-off="<?= __('admin.status_off') ?>" data-setting_key="store_contact" data-setting_type="googlerecaptcha">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <h4 class="mb-3 mt-3"><?= __('admin.how_to_get_site_key_secret_key') ?></h4>
                                    <p><?= __('admin.how_to_get_site_key_secret_key_s1') ?> <a href="https://accounts.google.com" class="link" target="_blank"><?= __('admin.how_to_get_site_key_secret_key_s2') ?></a>. <?= __('admin.how_to_get_site_key_secret_key_s3') ?> <a href="https://www.google.com/recaptcha/" class="link" target="_blank"><?= __('admin.how_to_get_site_key_secret_key_s4') ?></a>, <?= __('admin.how_to_get_site_key_secret_key_s5') ?> <strong><?= __('admin.how_to_get_site_key_secret_key_s6') ?></strong> <?= __('admin.how_to_get_site_key_secret_key_s7') ?></p>
                                    <p><?= __('admin.how_to_get_site_key_secret_key_s8') ?> <strong><?= __('admin.how_to_get_site_key_secret_key_s9') ?></strong> <?= __('admin.how_to_get_site_key_secret_key_s10') ?></p>
                                    <img src="<?= base_url("assets/images/grecaptcha/grecaptcha-2.png") ?>" class='img-thumbnail'>
                                    <p><?= __('admin.how_to_get_site_key_secret_key_s11') ?></p>
                                    <img src="<?= base_url("assets/images/grecaptcha/grecaptcha-3.png") ?>" class='img-thumbnail'>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 text-right">
                    <button type="submit" id="securitform" class="btn btn-sm btn-primary btn-submit"><?= __('admin.save_settings') ?></button>
                </div>
            </div>
        </form>
    </div>
</div>
<link href="<?php echo base_url(); ?>assets/js/summernote-0.8.12-dist/summernote-bs4.css" rel="stylesheet">
<script src="<?php echo base_url(); ?>assets/js/summernote-0.8.12-dist/summernote-bs4.js"></script>
<script>
    function change_force_ssl() {
        var security_force_ssl = $("#security_force_ssl").val();
        if(security_force_ssl == 0) {
            $("#toggle_change_force_ssl").removeClass('fa-toggle-off')
            $("#toggle_change_force_ssl").addClass('fa-toggle-on')
            $("#security_force_ssl").val(1)
        } else {
            $("#toggle_change_force_ssl").removeClass('fa-toggle-on')
            $("#toggle_change_force_ssl").addClass('fa-toggle-off')
            $("#security_force_ssl").val(0)
        }
        $("#securitform").trigger('click');
    }
    function maxLengthCheck(object) {
        if (object.value.length > object.maxLength)
            object.value = object.value.slice(0, object.maxLength)
    }
    
    function isNumeric (evt) {
        var theEvent = evt || window.event;
        var key = theEvent.keyCode || theEvent.which;
        key = String.fromCharCode (key);
        var regex = /[0-9]|\./;
        if ( !regex.test(key) ) {
            theEvent.returnValue = false;
            if(theEvent.preventDefault) theEvent.preventDefault();
        }
    }
</script>
<script type="text/javascript">
    $('select[name="email[mail_type]"]').on('change', function(){
        if($(this).val() == 'smtp') {
            $('.for-smtp-mail').show();
        } else {
            $('.for-smtp-mail').hide();
        }
    });
    
    $('select[name="email[mail_type]"]').trigger('change');
    
    $('.setting-nnnav li a').on('shown.bs.tab', function(event){
        var x = $(event.target).attr('href');
        $(".btn-submit").hide();
    
        if(x != '#site-fronttemplate'){
            $(".btn-submit").show();
        }
        localStorage.setItem("last_pill", x);
    });
    
    
    $("#setting-form").on('submit',function(e){
        e.preventDefault();
        $("#setting-form .alert-error").remove();
        var affiliate_cookie = parseInt($(".input-affiliate_cookie").val());
        if(affiliate_cookie <= 0 || affiliate_cookie > 365){
            $(".input-affiliate_cookie").after("<div class='alert alert-danger alert-error'><?= __('admin.days_between_1_and_365') ?></div>");
        }
        if($("#setting-form .alert-error").length == 0) return true;
        return false;
    })
    $(".items-holder").delegate(".remove-items",'click',function(){
        $(this).parent(".input-group").remove();
    })
    $(".add-items").on('click',function(){
        $(".items-holder").append('\
            <div class="input-group mb-3">\
            <input type="text" name="login[text_list][]" class="form-control" placeholder="<?= __('admin.list_items') ?>" >\
            <div class="input-group-append remove-items">\
            <span class="input-group-text"><i class="fa fa-trash"></i></span>\
            </div>\
            </div>\
            ');
    })
    $(document).on('ready',function() 
    {
        if($("#mail_verifiy").parent().hasClass('off'))
        {
            $("#registration_approval_group").show();
        } 
        else
             $("#registration_approval_group").hide(); 


        $('.summernote').summernote({
            tabsize: 2,
            height: 400
        });
        var last_pill = localStorage.getItem("last_pill");
        if(last_pill){ $('[href="'+ last_pill +'"]').click() }
    });
    $('.send-test-mail').on('click',function(){
        $this = $(this);
        $.ajax({
            type:'POST',
            dataType:'json',
            data:{send_test_mail:$(".testingemail").val()},
            beforeSend:function(){ $this.btn("loading"); },
            complete:function(){$this.btn("reset"); },
            success:function(json){ },
        });
    })
    
    $(".btn-submit").on('click',function(evt){
        evt.preventDefault();
    
        $(".site-global_script").val( window.btoa(unescape(encodeURIComponent($(".site-global_script").val() ))) );
        $(".site-fbmessager_script").val( window.btoa(unescape(encodeURIComponent($(".site-fbmessager_script").val() ))) );
        $(".site-faceboook_pixel").val( window.btoa(unescape(encodeURIComponent($(".site-faceboook_pixel").val() ))) );
        $(".site-google_analytics").val( window.btoa(unescape(encodeURIComponent($(".site-google_analytics").val() ))) );
    
        var formData = new FormData($("#setting-form")[0]);
    
        $(".site-global_script").val( decodeURIComponent(escape(window.atob( $(".site-global_script").val() ))) );
        $(".site-fbmessager_script").val( decodeURIComponent(escape(window.atob( $(".site-fbmessager_script").val() ))) );
        $(".site-faceboook_pixel").val( decodeURIComponent(escape(window.atob( $(".site-faceboook_pixel").val() ))) );
        $(".site-google_analytics").val( decodeURIComponent(escape(window.atob( $(".site-google_analytics").val() ))) );
    
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
    var levels = {};
    
    <?php 
        for ($i=1; $i <= 10; $i++) { 
            $v = 'referlevel_'.$i;
            if (isset($$v)) { ?>
            levels['<?= $i ?>'] = <?= json_encode($$v) ?>;
        <?php }
        }
        ?>
    $('#referlevel_select').on('change',function(){
        var level =  $(this).val();
    
        var html = '';
        for(var i = 1; i <= level; i++){
            html += '<tr>';
            html += '<td>'+i+'</td>';
            html += '<td><input type="number" step="any" name="referlevel_'+i+'[commition]" value="'+(levels[i] ? levels[i]['commition'] : '' )+'" class="form-control" /></td>';
            html += '<td><div class="input-group"><input type="number" step="any" name="referlevel_'+i+'[sale_commition]" value="'+(levels[i] ? levels[i]['sale_commition'] : '' )+'" class="form-control" /><div class="input-group-append"><span class="input-group-text refer-symball"></span></div>                                                         </div></td>';
            html += '<td><div class="input-group"><input type="number" step="any" name="referlevel_'+i+'[ex_commition]" value="'+(levels[i] ? levels[i]['ex_commition'] : '' )+'" class="form-control" /><div class="input-group-append"><span class="input-group-text"><?= $CurrencySymbol ?></span></div></div></td>';
            html += '<td><div class="input-group"><input type="number" step="any" name="referlevel_'+i+'[ex_action_commition]" value="'+(levels[i] ? levels[i]['ex_action_commition'] : '' )+'" class="form-control" /><div class="input-group-append"><span class="input-group-text"><?= $CurrencySymbol ?></span></div></div></td>';
            html += '</tr>';
        }
        $('#tbl_refer_level tbody').html(html);
    
        chnage_teigger();
    });
    
    $(document).on('click','.btn-delete-image', function(){
        let input_name = $(this).data('img_input');
        $('input[name="'+input_name+'"]').val('');
    
        let image_ele_id = $(this).data('img_ele');
        let placeholder_image = $(this).data('img_placeholder');
        $('#'+image_ele_id).attr('src', placeholder_image);
    
        $(this).remove()
    });
    
    $(document).on('click','.set-default-admin-url', function(){
        $.ajax({
            url:'<?= base_url("admincontrol/set_default_admin_url") ?>',
            type:'POST',
            dataType:'json',
            data:{'action':'set_default_admin_url'},
            success:function(json){
                window.location.reload();
            },
        })
    });
    
    $(document).on('click','.set-default-front-url', function(){
        $.ajax({
            url:'<?= base_url("admincontrol/set_default_front_url") ?>',
            type:'POST',
            dataType:'json',
            data:{'action':'set_default_front_url'},
            success:function(json){
                window.location.reload();
            },
        })
    });
    
    $('.update_all_settings').on('change', function()
    {
        
        var checked = $(this).prop('checked');
        var setting_key = $(this).data('setting_key');
        var setting_type = $(this).data('setting_type');

        var controle_id=$(this).attr('id');
    
        if (checked == true) {
            var status = 1;

            if(controle_id=="mail_verifiy")
                {
                    if($("#registration_approval").parent().hasClass('off'))
                    {
                        $("#registration_approval_group").hide(); 
                    }
                    else
                    {
                         
                        $(".update_all_settings.regisapproval").bootstrapToggle('off'); 
                        $("#registration_approval_group").hide(); 
                        updateRegistrationAproval(); 
                    } 
                }

        }
        else
        {
            var status = 0;
            if(controle_id=="mail_verifiy")
            {
                $("#registration_approval_group").show(); 
            }
            
        }
 
    
        $.ajax({
            url:'<?= base_url("admincontrol/update_all_settings") ?>',
            type:'POST',
            dataType:'json',
            data:{'action':'update_all_settings', status:status, setting_key:setting_key, setting_type:setting_type},
            success:function(json)
            {

                
            },
        });
    });

     function updateRegistrationAproval()
    {
        var status = 0; 
        var setting_key = "registration_approval";
        var setting_type = "store";

        $.ajax({
            url:'<?= base_url("admincontrol/update_all_settings") ?>',
            type:'POST',
            dataType:'json',
            data:{'action':'update_all_settings', status:status, setting_key:setting_key, setting_type:setting_type},
            success:function(json)
            {
                 
 
            },
        });

    }


    $(window).bind('scroll', function() {
        var bottom_gap = ($(window).scrollTop() + $(window).height()) - $(document).height();

        if ($(window).scrollTop() > 200 && bottom_gap < -50) {
            $('#securitform').hide();
            $('#securitform').addClass('save_setting_btn_fixed');
            $('#securitform').fadeIn(300);
        }else {
            $('#securitform').removeClass('save_setting_btn_fixed');
            $('#securitform').css('display', 'unset');
        }
    });

    $(document).ready(function(){
        $.ajax({
            url:'<?= base_url("admincontrol/set_default_theme_color_settings") ?>',
            type:'POST',
            dataType:'json',
            data:{'action':'set_default_theme_color_settings', 'setting_type':'theme'},
            success:function(json){

            },
        });

        $.ajax({
            url:'<?= base_url("admincontrol/set_default_theme_font_settings") ?>',
            type:'POST',
            dataType:'json',
            data:{'action':'set_default_theme_font_settings', 'setting_type':'site'},
            success:function(json){

            },
        });
    });
</script>