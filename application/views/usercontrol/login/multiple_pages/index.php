<!doctype html>

<html lang="en">

  <head>
  <?php
  if($site_setting['google_analytics']){ echo $site_setting['google_analytics']; }

  if($site_setting['faceboook_pixel']){ echo $site_setting['faceboook_pixel']; }

  $logo = ($theme_settings[0]->logo) ? base_url('assets/images/theme_images/'.$theme_settings[0]->logo) : base_url('assets/login/multiple_pages/img/logo.png');

  if($site_setting['favicon']){

    echo '<link rel="icon" href="'. base_url('assets/images/site/'.$site_setting['favicon']) .'" type="image/*" sizes="16x16">';

  }

  $global_script_status = (array)json_decode($site_setting['global_script_status'],1);

  if(in_array('front', $global_script_status)){ echo $site_setting['global_script']; }

  $db =& get_instance();

  $products = $db->Product_model;

  $googlerecaptcha =$db->Product_model->getSettings('googlerecaptcha');

  $tnc =$db->Product_model->getSettings('tnc');

  $front_side_font =$products->getSettings('site','front_side_font');

  $front_header_color_before_scroll =$products->getFrontThemeSettings('theme','front_header_color_before_scroll');

  $front_header_color_after_scroll =$products->getFrontThemeSettings('theme','front_header_color_after_scroll');
  
  $front_footer_color =$products->getFrontThemeSettings('theme','front_footer_color');

  $front_button_color =$products->getFrontThemeSettings('theme','front_button_color');

  $front_button_hover_color =$products->getFrontThemeSettings('theme','front_button_hover_color');

  $front_button_text_color =$products->getFrontThemeSettings('theme','front_button_text_color');

  $front_header_button_color_before_scroll =$products->getFrontThemeSettings('theme','front_header_button_color_before_scroll');

  $front_header_button_color_after_scroll =$products->getFrontThemeSettings('theme','front_header_button_color_after_scroll');

  $front_header_button_text_color_before_scroll =$products->getFrontThemeSettings('theme','front_header_button_text_color_before_scroll');

  $front_header_button_text_color_after_scroll =$products->getFrontThemeSettings('theme','front_header_button_text_color_after_scroll');

  $front_header_button_hover_color_before_scroll =$products->getFrontThemeSettings('theme','front_header_button_hover_color_before_scroll');

  $front_header_button_hover_color_after_scroll =$products->getFrontThemeSettings('theme','front_header_button_hover_color_after_scroll');

  $front_runner_bar_color =$products->getFrontThemeSettings('theme','front_runner_bar_color');

  $front_runner_bar_text_color =$products->getFrontThemeSettings('theme','front_runner_bar_text_color');

  $front_theme_text_color =$products->getFrontThemeSettings('theme','front_theme_text_color');

  $front_faq_before_hover_color =$products->getFrontThemeSettings('theme','front_faq_before_hover_color');

  $front_faq_after_hover_color =$products->getFrontThemeSettings('theme','front_faq_after_hover_color');

  $bottom_banner_before_footer = $products->getFrontThemeSettings('theme','bottom_banner_before_footer');
  
  ?>

    <meta charset="utf-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <title><?= $site_setting['name'] ?></title>
    
    <meta name="author" content="<?= $meta_author ?>">
    
    <meta name="keywords" content="<?= $meta_keywords ?>">
    
    <meta name="description" content="<?= $meta_description ?>">
    
    <title><?= $setting['heading'] ?></title>
    
    <link rel="preconnect" href="https://fonts.gstatic.com">
    
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
    
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="<?= base_url('assets/login/multiple_pages') ?>/css/font-awesome.min.css?v=<?= av() ?>">
    
    <link rel="stylesheet" href="<?= base_url('assets/login/multiple_pages') ?>/css/bootstrap.min.css?v=<?= av() ?>">
    
    <link rel="stylesheet" href="<?= base_url('assets/login/multiple_pages') ?>/css/owl.carousel.min.css?v=<?= av() ?>">
    
    <?php if( current_url() != site_url('/login') && current_url() != site_url('/register') && current_url() != site_url('/register/vendor') && current_url() != site_url('/forget-password') && current_url() != site_url('/terms-of-use')){ ?>

    <link rel="stylesheet" href="<?= base_url('assets/login/multiple_pages') ?>/css/style.css?v=<?= av() ?>">

    <?php } else { ?>

    <link rel="stylesheet" href="<?= base_url('assets/login/multiple_pages') ?>/css/login-style.css?v=<?= av() ?>">

    <?php } ?>

    <script src="<?= base_url('assets/login/multiple_pages') ?>/js/jquery-2.2.4.min.js"></script>
    
    <script src="<?= base_url('assets/login/multiple_pages') ?>/js/popper.min.js"></script>
    
    <script src="<?= base_url('assets/login/multiple_pages') ?>/js/bootstrap.min.js"></script>

    <?php if($theme_settings[0]->custom_logo_size): ?>
        <style type="text/css">
            .customLogoClass{
                width: <?= (int) $theme_settings[0]->log_custom_height ?>px !important;
                height: <?= (int) $theme_settings[0]->log_custom_width ?>px !important;
            }
        </style>
    <?php endif ?>

    <style type="text/css">
        h1, h3, h4, button, input, optgroup, select, textarea {
            font-family: <?= $front_side_font['front_side_font'] ?> !important;
        }
        .header-navbar {
            background:  <?= $front_header_color_before_scroll['front_header_color_before_scroll'] ?>;
        }
        .header-navbar.stick {
            background:  <?= $front_header_color_after_scroll['front_header_color_after_scroll'] ?>;
        }
        .footer-area {
            background: <?= $front_footer_color['front_footer_color'] ?>;
        }
        .front_button_color {
            background: <?= $front_button_color['front_button_color'] ?> !important;
        }
        .front_button_hover_color:hover {
            background: <?= $front_button_hover_color['front_button_hover_color'] ?> !important;
        }
        .front_button_text_color {
            color: <?= $front_button_text_color['front_button_text_color'] ?> !important;
        }
        .header-navbar .btn-login {
            background: <?= $front_header_button_color_before_scroll['front_header_button_color_before_scroll'] ?> !important;
            color: <?= $front_header_button_text_color_before_scroll['front_header_button_text_color_before_scroll'] ?> !important;
        }
        .header-navbar.stick .btn-login {
            background: <?= $front_header_button_color_after_scroll['front_header_button_color_after_scroll'] ?> !important;
            color: <?= $front_header_button_text_color_after_scroll['front_header_button_text_color_after_scroll'] ?> !important;
        }
        .header-navbar .btn-login:hover{
            background: <?= $front_header_button_hover_color_before_scroll['front_header_button_hover_color_before_scroll'] ?> !important;
        }
        .header-navbar.stick .btn-login:hover{
            background: <?= $front_header_button_hover_color_after_scroll['front_header_button_hover_color_after_scroll'] ?> !important;
        }
        .news-ticker-area {
            background: <?= $front_runner_bar_color['front_runner_bar_color'] ?> !important;
            border-bottom: 10px solid <?= $front_runner_bar_color['front_runner_bar_color'] ?> !important;
        }
        .news-ticker-inner p {
            color: <?= $front_runner_bar_text_color['front_runner_bar_text_color'] ?> !important;
        }
        .front_theme_text_color {
            color: <?= $front_theme_text_color['front_theme_text_color'] ?> !important;
        }
        .featured-slider .owl-dots button.owl-dot.active {
            background: <?= $front_theme_text_color['front_theme_text_color'] ?> !important;
        }
        .single-testimonial {
            border-top: 6px solid <?= $front_theme_text_color['front_theme_text_color'] ?> !important;
        }
        .accordion.faq-accodion .card .card-header h2 button {
            background: <?= $front_faq_before_hover_color['front_faq_before_hover_color'] ?> !important;
        }
        .accordion.faq-accodion .card .card-header h2 button:hover {
            background: <?= $front_faq_after_hover_color['front_faq_after_hover_color'] ?> !important;
        }
        .login-form.register-form .checkbox input[type="checkbox"]:checked + .box:after {
            background-color: <?= $front_button_color['front_button_color'] ?> !important;
            border-color: <?= $front_button_color['front_button_color'] ?> !important;
        }
    </style>



    <style type="text/css">
        .home-top-slider {
            position: relative;
            margin-top: 200px;
        }

        .home-top-slider .owl-nav {
            position: absolute;
            top: 0px;
            height: 100%;
            width: 100%;
            z-index: -1;
        }

        .home-top-slider .owl-nav .owl-prev{
            position: absolute;
            left: -75px;
            top: 50%;
            font-weight: bolder;
            color: white;
        }

        .home-top-slider .owl-nav .owl-next{
            position: absolute;
            right: -75px;
            top: 50%;
            font-weight: bolder;
            color: white;
        }

        .home-top-slider .owl-nav button span {
            color: white;
            font-size: 50px;
            font-weight: bolder;
        }

    </style>
  </head>

  <body style="font-family: <?= $front_side_font['front_side_font'] ?> !important;">

<?php 

$fbmessager_status = (array)json_decode($site_setting['fbmessager_status'],1);

if(in_array('front', $fbmessager_status)){

  echo $site_setting['fbmessager_script'];

  $LanguageHtml = $products->getLanguageHtml('usercontrol');

}

?>

    <?php
    if(!empty($theme_sliders)):
    for ($i=0; $i < sizeof($theme_sliders); $i++) { 
        if($theme_sliders[$i]->status == 1){
            $heroData = $theme_sliders[$i];
            break;
        }
    }
    endif;

    $heroImage = (isset($heroData) && !empty($heroData->image)) ? base_url('assets/images/theme_images/'.$heroData->image) : base_url('assets/login/multiple_pages/img/hero-bg.jpg');
    
        
    ?>
    <!--Hero-->
    <div class="wlc-hero-area" style="background: url(<?= $heroImage ?>) no-repeat scroll center center / cover;">


      <?php if( current_url() != site_url('/login') && current_url() != site_url('/register') && current_url() != site_url('/register/vendor') && current_url() != site_url('/forget-password') && current_url() != site_url('/terms-of-use')){ ?>

        <!--Top Navbar-->

        <header class="header-navbar">

            <div class="container">

                <nav class="navbar navbar-expand-lg navbar-light">

                  <a class="navbar-brand" href="<?= base_url('/') ?>">
                    <img src="<?= $logo ?>" <?= ($theme_settings[0]->custom_logo_size) ? 'class="customLogoClass"' : '' ?> alt="<?= $setting['heading'] ?>">
                  </a>

                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">

                    <span class="navbar-toggler-icon"></span>

                  </button>

                    




                  <div class="collapse navbar-collapse" id="navbarTogglerDemo02">

                    <ul class="navbar-nav ml-auto">

                      <?php 
                        if (isset($header_menus) && !empty($header_menus)) {
                          foreach ($header_menus as $key => $menu) { 
                      ?>



                      
                      <?php if (empty($menu['parent_id'])==true && $menu['is_header_dropdown']==1) { ?>
                        <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle" href="#" id="dropdown-menu-<?= $menu['page_id'] ?>" role="button" data-toggle="dropdown" aria-expanded="false">
                            <?= $menu['page_name'] ?>
                          </a>

                          <?php 
                            $parentSlug = $menu['page_id']; // or Finance etc.

                            $dropdowns = array_filter($header_menus, function ($menu) use ($parentSlug) {
                                return ($menu['parent_id'] == $parentSlug);
                            });

                            if (isset($dropdowns) && !empty($dropdowns)) {
                          ?>


                          <ul class="dropdown-menu" aria-labelledby="dropdown-menu-<?= $menu['page_id'] ?>">
                            <?php foreach ($dropdowns as $key => $dropdown) {  ?>
                            <li><a class="dropdown-item" href="<?= site_url($dropdown['page_type']=='editable' ? 'p/'.$dropdown['slug'] : $dropdown['slug']) ?>"><?= $dropdown['page_name'] ?></a></li>
                            <!-- <li><hr class="dropdown-divider"></li> -->
                            <?php } ?>
                          </ul>

                        <?php } ?>

                        </li>
                      <?php }else if (empty($menu['parent_id'])==true){ ?>
                        <li class="nav-item <?php if(site_url(uri_string()) == site_url($menu['slug'])){ echo 'active'; } ?>">

                          <a class="nav-link" href="<?= site_url($menu['page_type']=='editable' ? 'p/'.$menu['slug'] : $menu['slug']) ?>"><?= $menu['page_name'] ?></a>

                        </li>
                      <?php }}} ?>

                      <?php 

                      $store_setting = $this->Product_model->getSettings('store');

                      if($store_setting['menu_on_front']){ 

                      ?>

                        <li class="nav-item <?php if(base_url(uri_string()) == base_url('/store')){ echo 'active'; } ?>">

                          <a class="nav-link" href="<?= base_url('/store') ?>" <?= ($store_setting['menu_on_front_blank']) ? 'target="_blank"' : ''; ?>><?= __('front.my_store') ?></a>

                        </li>

                      <?php } ?>

                      <?php if($store['language_status']){ ?>
                        <li class="nav-item dropdown">
                          <?= $LanguageHtml ?>
                        </li>  
                      <?php } ?>


                    </ul>

                    <a href="<?= base_url('/login') ?>" class="btn-login my-2 my-lg-0"><?= __('front.log_in') ?></a>

                  </div>

                </nav>

            </div>
                          

        </header>

      <?php } ?>

        <div class="container home-top-slider owl-carousel" style="margin-top: 150px;">
            <?php
            for ($i=0; $i < sizeof($theme_sliders); $i++) { 
                if($theme_sliders[$i]->status == 1){

                    $slideHeroImage = (isset($theme_sliders[$i]) && !empty($theme_sliders[$i]->image)) ? base_url('assets/images/theme_images/'.$theme_sliders[$i]->image) : base_url('assets/login/multiple_pages/img/hero-bg.jpg');
            ?>
            <div class="row">
                <div class="col-lg-8">
                    <div class="wlc-hero-content" data-background="<?= $slideHeroImage; ?>">
                        <h1 class="display-3"><?= (isset($theme_sliders[$i]) && !empty($theme_sliders[$i]->title)) ? $theme_sliders[$i]->title : "Lorem Ipsum <br>is Simply Dummy" ?></h1>
                        <p><?= (isset($theme_sliders[$i]) && !empty($theme_sliders[$i]->description)) ? $theme_sliders[$i]->description : "Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book."; ?></p>
                        <a href="<?= (isset($theme_sliders[$i]) && !empty($theme_sliders[$i]->link)) ? $theme_sliders[$i]->link : base_url('register'); ?>" target="_blank" class="btn-orage front_button_color front_button_hover_color front_button_text_color"><?= (isset($theme_sliders[$i]) && !empty($theme_sliders[$i]->button_text)) ? $theme_sliders[$i]->button_text : __('front.join_as_affiliate'); ?></a>
                    </div>
                </div>
            </div>
            <?php

                    }
                }


                if(! isset($heroData)) {
                    ?>
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="wlc-hero-content">
                                <h1 class="display-3">Lorem Ipsum <br>is Simply Dummy</h1>
                                <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                                <a href="<?= base_url('register') ?>" target="_blank" class="btn-orage front_button_color front_button_hover_color front_button_text_color"><?= __('front.join_as_affiliate'); ?></a>
                            </div>
                        </div>
                    </div>

                    <?php
                }
            ?>
        </div>
    </div>
    <!--Hero-->
                
    <?php 
        foreach ($theme_settings as $settings) { 
            $top_banner_slider = json_decode($settings->top_banner_slider);
        } 
    ?>
    <!--News Ticker-->
    <div class="news-ticker-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="news-ticker-slider owl-carousel">
                    <?php
                    $noRunners = true;
                    foreach($top_banner_slider as $runner){
                        if(!empty($runner)) {
                            $noRunners = false;
                        ?>
                        <!--Single News Ticker-->
                        <div class="single-news-ticker">
                            <div class="news-ticker-inner text-center">
                                <p><?= $runner; ?></p>
                            </div>
                        </div>
                        <!--Single News Ticker-->
                        <?php
                        }
                    }
                    if ($noRunners == true){
                    ?>
                    <!--Single News Ticker-->
                    <div class="single-news-ticker">
                        <div class="news-ticker-inner text-center">
                            <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled</p>
                        </div>
                    </div>
                    <!--Single News Ticker-->
                    <?php
                    }
                    ?>
                   </div>
                </div>
            </div>
        </div>
    </div>
    <!--News Ticker-->

    
    <?php
        foreach($home_sections_settings as $hsSetting) {
            if($hsSetting->sec_is_enable){
                switch ($hsSetting->sec_title) {
                    case 'Membership Section':
                        ?>
                            <?php
                                $db =& get_instance();
                                $membership = $db->Product_model->getSettings('membership');
                                if($membership['status']) { 
                                ?>
                                <!-- Affiliate Plan-->
                                <div class="affiliate-plan-area">
                                    <?php if($this->session->flashdata('error')){?>
                                    <div class="col-sm-12 m-t-10 text-center">
                                        <div class="alert alert-warning"> <?php echo $this->session->flashdata('error'); ?> </div>
                                    </div>
                                    <?php } ?>
                                    <div class="container">
                                        <div class="row justify-content-center">
                                            <div class="col-lg-6">
                                                <div class="section-title text-center">
                                                    <i class="fa fa-snowflake-o fa-lg front_theme_text_color" aria-hidden="true"></i>
                                                    <?php foreach($theme_settings as $settings) { $membershipTitles = $settings; } ?>
                                                    <h2 class="front_theme_text_color"><?= (isset($membershipTitles) && !empty($membershipTitles->membership_top_title)) ? $membershipTitles->membership_top_title : __('front.best_affiliate_plan'); ?></h2>
                                                    <p><?= (isset($membershipTitles) && !empty($membershipTitles->membership_sub_title)) ? $membershipTitles->membership_sub_title : "Lorem Ipsum is simply dummy text of the printing and typesetting industry."; ?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-5">
                                        <?php 
                                        $plans = App\MembershipPlan::select('membership_plans.*','award_level.sale_comission_rate')->join('award_level','award_level.id','=','membership_plans.level_id','left')->where('status',1)->get()->toArray();
                                        foreach ($plans as $plan) { 
                                            $plansAvailable = true;
                                        ?>
                                            <div class="col-lg-4">
                                                <div class="single-price-table basic-saturn">
                                                    <?php 
                                                    if($plan['special']) {
                                                        $percentage = round((($plan['price'] - $plan['special']) * 100) / $plan['price']);
                                                        ?><div class="price-discount" style="background: <?= $plan['label_background'] ?>;color: <?= $plan['label_color'] ?>;"><?= __('front.save') ?> <?= $percentage ?>%</div><?php
                                                    } 
                                                    ?>
                                                    <div class="header-plan text-center">
                                                        <h4 style="color: <?= $plan['label_background'] ?>;"><?= $plan['name'] ?></h4>
                                                        <img width="160px" src="<?= base_url('assets/login/multiple_pages') ?>/img/<?= $plan['plan_icon'] ? $plan['plan_icon'] : 'saturn.png' ?>" alt="saturn">
                                                    </div>
                                                    <div class="price text-center" style="border: none;">
                                                    <h2 style="color: <?= $plan['label_background'] ?>;">
                                                    <?php  if($plan['price'] == 0){ ?> FREE <?php } else { ?>
                                                    <?php if($plan['special']) { ?> <?= c_format($plan['special'],true,0) ?> <?php }else{ ?>
                                                    <?= c_format($plan['price'],true,0) ?> <?php } ?> <?php } ?>
                                                    </h2>
                                                        <span><?php if($plan['special']){ ?> <del><?= c_format($plan['price'],true,0) ?></del> <?php }?> <span>
                                                            <?php
                                                            if($plan['billing_period'] == "lifetime_free") {
                                                                echo __('front.lifetime');
                                                            } else if($plan['billing_period'] == "custom") {
                                                                echo $plan['custom_period']." ".__('front.days');
                                                            } else {
                                                                echo ucwords(strtolower($plan['billing_period']));
                                                            }
                                                            ?>
                                                        </span></span>
                                                    </div>

                                                    <?php if($plan['bonus']) { ?>
                                                        <h5 class="text-center" style="color: <?= $plan['label_background'] ?>;border-bottom: 1px solid #F1F1F1;"><?= __('front.bonus_rate')." ".c_format($plan['bonus'],true,0) ?></h5>
                                                    <?php } ?>

                                                    <div class="price-content text-center">
                                                        <?php if($plan['user_type'] == 2): ?>
                                                            <h5 class="text-center" style="color: <?= $plan['label_background'] ?>; border-bottom: 1px solid #F1F1F1;">
                                                                <?php echo __('user.campaign').' : ';
                                                                echo isset($plan['campaign']) ? $plan['campaign'] : __('user.unlimited') ?>
                                                            </h5>
                                                            <h5 class="text-center" style="color: <?= $plan['label_background'] ?>; border-bottom: 1px solid #F1F1F1;">
                                                                <?php echo __('user.product').' : ';
                                                                echo isset($plan['product']) ? $plan['product'] : __('user.unlimited') ?>
                                                            </h5>
                                                        <?php endif ?>

                                                        <?php if($plan['commission_sale_status']): ?>
                                                            <?php $sale_comission_rate = ($plan['sale_comission_rate']) ? $plan['sale_comission_rate'].'%' : __('front.default') ?>
                                                            <p class="affiliate-comission" style="color: <?= $plan['label_background'] ?>;"><?= __('front.affiliate_commission').' '.$sale_comission_rate ?></p>
                                                        <?php endif ?>

                                                        <?php
                                                            if(!empty($plan['description'])) {
                                                                echo $plan['description'];
                                                            } else {
                                                                echo '<ul>
                                                                        <li>Lorem Ipsum is simply dummy text</li>
                                                                        <li>Lorem Ipsum is simply dummy text</li>
                                                                        <li>Lorem Ipsum is simply dummy text</li>
                                                                        <li>Lorem Ipsum is simply dummy text</li>
                                                                        <li>Lorem Ipsum is simply dummy text</li>
                                                                    </ul>';
                                                            }
                                                        ?>
                                                    </div>
                                                    <div class="price-footer text-center">
                                                        <a href="<?= base_url('/register') ?>" style="background: <?= $plan['label_background'] ?>;color: <?= $plan['label_color'] ?>;"><?= $plan['label_text']?></a>
                                                    </div>
                                                </div>
                                            </div>   
                                        <?php
                                        }

                                        if(!isset($plansAvailable)) {
                                        ?>

                                            <div class="col-lg-4">
                                                <div class="single-price-table basic-saturn">
                                                    <div class="price-discount"> <?= __('front.save') ?> 90%</div>
                                                    <div class="header-plan text-center">
                                                        <h4>30 <?= __('front.days') ?></h4>
                                                        <img src="<?= base_url('assets/login/multiple_pages') ?>/img/saturn.png" alt="saturn">
                                                    </div>
                                                    <div class="price text-center">
                                                        <h2>$1</h2>
                                                        <span><del>$10</del> <span>/<?= __('front.per_monthly') ?></span></span>
                                                    </div>
                                                    <div class="price-content">
                                                        <ul>
                                                            <li>Lorem Ipsum is simply dummy text</li>
                                                            <li>Lorem Ipsum is simply dummy text</li>
                                                            <li>Lorem Ipsum is simply dummy text</li>
                                                            <li>Lorem Ipsum is simply dummy text</li>
                                                            <li>Lorem Ipsum is simply dummy text</li>
                                                        </ul>
                                                    </div>
                                                    <div class="price-footer text-center">
                                                        <a href="">Lorem Ipsum</a>
                                                    </div>
                                                </div>
                                            </div>                
                                            
                                            <div class="col-lg-4">
                                                <div class="single-price-table popular-uranus">
                                                    <div class="price-discount"><i class="fa fa-star"></i> <span><?= __('front.save') ?> 90%</span></div>
                                                    <div class="header-plan text-center">
                                                        <h4>30 <?= __('front.days') ?></h4>
                                                        <img src="<?= base_url('assets/login/multiple_pages') ?>/img/uranus.png" alt="uranus">
                                                    </div>
                                                    <div class="price text-center">
                                                        <h2>$1</h2>
                                                        <span><del>$10</del> <span>/<?= __('front.per_monthly') ?></span></span>
                                                    </div>
                                                    <div class="price-content">
                                                        <ul>
                                                            <li>Lorem Ipsum is simply dummy text</li>
                                                            <li>Lorem Ipsum is simply dummy text</li>
                                                            <li>Lorem Ipsum is simply dummy text</li>
                                                            <li>Lorem Ipsum is simply dummy text</li>
                                                            <li>Lorem Ipsum is simply dummy text</li>
                                                        </ul>
                                                    </div>
                                                    <div class="price-footer text-center">
                                                        <a href="">Lorem Ipsum</a>
                                                    </div>
                                                </div>
                                            </div>                
                                            
                                            <div class="col-lg-4">
                                                <div class="single-price-table business-asteroid">
                                                    <div class="price-discount"><?= __('front.save') ?> 90%</div>
                                                    <div class="header-plan text-center">
                                                        <h4>30 <?= __('front.days') ?></h4>
                                                        <img src="<?= base_url('assets/login/multiple_pages') ?>/img/asteroid.png" alt="asteroid">
                                                    </div>
                                                    <div class="price text-center">
                                                        <h2>$1</h2>
                                                        <span><del>$10</del> <span>/<?= __('front.per_monthly') ?></span></span>
                                                    </div>
                                                    <div class="price-content">
                                                        <ul>
                                                            <li>Lorem Ipsum is simply dummy text</li>
                                                            <li>Lorem Ipsum is simply dummy text</li>
                                                            <li>Lorem Ipsum is simply dummy text</li>
                                                            <li>Lorem Ipsum is simply dummy text</li>
                                                            <li>Lorem Ipsum is simply dummy text</li>
                                                        </ul>
                                                    </div>
                                                    <div class="price-footer text-center">
                                                        <a href="">Lorem Ipsum</a>
                                                    </div>
                                                </div>
                                            </div>

                                        <?php
                                        }
                                        ?>             

                                        </div>
                                    </div>
                                </div><!-- Affiliate Plan-->
                                <?php
                                }
                            ?>
                        <?php
                        break;
                    case 'Home Content':
                        ?>
                            <!--Featured Area-->
                            <div class="featured-area gray-bg" >
                                <div class="container">
                                    <div class="row">
                                        <div class="col">
                                            <div class="featured-slider owl-carousel" style="z-index: 0 !important;">
                                            <?php
                                            foreach($theme_homecontent as $homecontent){
                                            if ($homecontent->status == 1) {
                                                $homeContentAvailable = true;
                                            ?>

                                            <!--single slider item-->
                                                <div class="single-featured">
                                                    <div class="row align-items-center">
                                                        <div class="col-lg-6">
                                                            <div class="featured-content">
                                                                <h2 class="front_theme_text_color"><?= $homecontent->title; ?></h2>
                                                                <p><?= $homecontent->description ?></p>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-5 offset-lg-1">
                                                            <div class="featured-image">
                                                                <?php
                                                                $image_url = (!empty($homecontent->image)) ? base_url('assets/images/theme_images/'.$homecontent->image) : base_url('assets/login/multiple_pages/img/featured-img.png');
                                                                ?>
                                                                <img src="<?= $image_url; ?>" alt="<?= __('front.login_image') ?>" class="img-fluid">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div><!--single slider item-->
                                                <?php 
                                                }
                                            }

                                                if(!isset($homeContentAvailable)) {
                                                ?>
                                                
                                                <!--single slider item-->
                                                <div class="single-featured">
                                                    <div class="row align-items-center">
                                                        <div class="col-lg-6">
                                                            <div class="featured-content">
                                                                <h2 class="front_theme_text_color">What is Lorem Ipsum?</h2>
                                                                <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.</p>

                                                                <p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-5 offset-lg-1">
                                                            <div class="featured-image">
                                                                <img src="<?= base_url('assets/login/multiple_pages') ?>/img/featured-img.png" alt="<?= __('front.featured_image') ?>" class="img-fluid">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div><!--single slider item-->
                                                
                                                <!--single slider item-->
                                                <div class="single-featured">
                                                    <div class="row align-items-center">
                                                        <div class="col-lg-6">
                                                            <div class="featured-content">
                                                                <h2 class="front_theme_text_color">What is Lorem Ipsum?</h2>
                                                                <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.</p>

                                                                <p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-5 offset-lg-1">
                                                            <div class="featured-image">
                                                                <img src="<?= base_url('assets/login/multiple_pages') ?>/img/featured-img.png" alt="<?= __('front.featured_image') ?>" class="img-fluid">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div><!--single slider item-->
                                                
                                                <!--single slider item-->
                                                <div class="single-featured">
                                                    <div class="row align-items-center">
                                                        <div class="col-lg-6">
                                                            <div class="featured-content">
                                                                <h2 class="front_theme_text_color">What is Lorem Ipsum?</h2>
                                                                <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.</p>

                                                                <p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-5 offset-lg-1">
                                                            <div class="featured-image">
                                                                <img src="<?= base_url('assets/login/multiple_pages') ?>/img/featured-img.png" alt="<?= __('front.featured_image') ?>" class="img-fluid">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div><!--single slider item-->

                                                <?php
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                            <!--Featured Area-->
                        <?php
                    break;
                    case 'Home Section':
                        ?>
                            <!--Our Blog Area-->
                            <div class="our-blog-area">
                                <div class="container">
                                    <div class="row justify-content-center">
                                        <div class="col-lg-6">
                                            <div class="section-title text-center">
                                                <i class="fa fa-snowflake-o fa-lg front_theme_text_color" aria-hidden="true"></i>
                                                <?php foreach($theme_settings as $settings) { $homeSecTitles = $settings; } ?>
                                                <h2 class="front_theme_text_color"><?= (isset($homeSecTitles) && !empty($homeSecTitles->home_section_title)) ? $homeSecTitles->home_section_title : "<h2 class='front_theme_text_color'>What is Lorem IpsumS?</h2>"; ?></h2>
                                                <p><?= (isset($homeSecTitles) && !empty($homeSecTitles->home_section_subtitle)) ? $homeSecTitles->home_section_subtitle : "<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>"; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row justify-content-md-center">
                                    <?php
                                    $i=0;
                                    foreach($theme_sections as $section) {
                                        if ($section->status == 1) {
                                        $isSectionsAvailanle = true;
                                        $image_url = (!empty($section->image)) ? base_url('assets/images/theme_images/'.$section->image) : base_url('assets/login/multiple_pages/img/blog-image'.($i+1).'.jpg');
                                        echo '<div class="col-lg-4 mt-5">
                                            <div class="single-blog">
                                                <img src="'.$image_url .'" alt="'.$section->title .'" class="img-fluid">
                                                <h3 class="front_button_color front_button_text_color">'.$section->title .'</h3>
                                                <p>'.$section->description .'</p>
                                                <a class="front_button_color front_button_hover_color front_button_text_color" href="'.$section->link .'" target="_blank" >'.$section->button_text .'</a>
                                            </div>
                                        </div>';
                                        $i++;
                                        }
                                    }
                                    ?>
                                    <?php
                                    if(!isset($isSectionsAvailanle)) {
                                    ?>
                        
                                        <div class="col-lg-4">
                                            <div class="single-blog">
                                                <img src="<?= base_url('assets/login/multiple_pages') ?>/img/blog-image.jpg" alt="<?= __('front.blog') ?>" class="img-fluid">
                                                <h3 class="front_button_color front_button_text_color">Section 1</h3>
                                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                                                <a class="front_button_color front_button_hover_color front_button_text_color" href="">Lorem Ipsum</a>
                                            </div>
                                        </div>                
                                        
                                        <div class="col-lg-4">
                                            <div class="single-blog">
                                                <img src="<?= base_url('assets/login/multiple_pages') ?>/img/blog-image-2.jpg" alt="<?= __('front.blog') ?>" class="img-fluid">
                                                <h3 class="front_button_color front_button_text_color">Section 2</h3>
                                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                                                <a class="front_button_color front_button_hover_color front_button_text_color" href="">Lorem Ipsum</a>
                                            </div>
                                        </div>                
                                        
                                        <div class="col-lg-4">
                                            <div class="single-blog">
                                                <img src="<?= base_url('assets/login/multiple_pages') ?>/img/blog-image-3.jpg" alt="<?= __('front.blog') ?>" class="img-fluid">
                                                <h3 class="front_button_color front_button_text_color">Section 3</h3>
                                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                                                <a class="front_button_color front_button_hover_color front_button_text_color" href="">Lorem Ipsum</a>
                                            </div>
                                        </div>
                                    
                                    <?php
                                    }
                                    ?>
                                    </div>
                                </div>
                            </div>
                            <!--Our Blog Area-->
                        <?php
                    break;
                    case 'Video Section':
                        ?>

                        <?php
                        
                        foreach($theme_settings as $settings) { $video_section = $settings; }
                        $video_bg = (isset($video_section) && !empty($video_section->homepage_video_section_bg)) ? base_url('assets/images/theme_images/'.$video_section->homepage_video_section_bg) : base_url('assets/login/multiple_pages/img/video-section-bg.png');

                        ?>
                            <!--Video Area-->
                            <div class="our-video-area d-flex align-items-center" style="background: url(<?= $video_bg; ?>) no-repeat scroll center center / cover;">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-6 offset-lg-6">
                                            <div class="our-video-wrapper">
                                                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                                    <div class="carousel-inner">
                                                        <?php 
                                                        $i = 0;
                                                        foreach ($theme_videos as $video) {
                                                            if($video->status == 1){
                                                        ?>
                                                        <div class="carousel-item <?= ($i==0)?"active":""; ?>">
                                                            <div class="our-video-header text-center">
                                                                <h2><?php echo ($video->video_title != "") ? $video->video_title : __('front.watch_our_videos'); ?></h2>
                                                                <?php echo ($video->video_sub_title != "") ? "<p>".$video->video_sub_title."</p>" : ""; ?>
                                                            </div>
                                                            <div class="our-video-slider">
                                                                <div class="single-video-slider">
                                                                    <div class="video-inner">

                                                                        <?php 
                                                                        if (strpos($video->video_link,'embed') !== false) {
                                                                            ?>
                                                                                <iframe width="100%" height="100%" src="<?=$video->video_link ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                                                            <?php
                                                                        } else {

                                                                            if(strpos(strtolower($video->video_link),'youtube') !== false){
                                                                                $id = explode("v=",$video->video_link);
                                                                                ?>
                                                                                    <iframe width="100%" height="100%" src="https://www.youtube.com/embed/<?=$id[1] ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                                                                <?php
                                                                            } else if(strpos(strtolower($video->video_link),'youtu') !== false) {
                                                                                $id = explode("/",$video->video_link);
                                                                                ?>
                                                                                    <iframe width="100%" height="100%" src="https://www.youtube.com/embed/<?=$id[3] ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                                                                <?php
                                                                            }

                                                                            ?>
                                                                            <?php
                                                                        }
                                                                        ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <?php
                                                            $i++;
                                                            } 
                                                        } 
                                                        if($i == 0){
                                                        ?>
                                                        <div class="carousel-item active">
                                                            <div class="our-video-slider">
                                                                <div class="our-video-header text-center">
                                                                    <h2><?= __('front.watch_our_videos') ?></h2>
                                                                    <p>Subtitle goes here</p>
                                                                </div>
                                                                <div class="single-video-slider">
                                                                    <div class="video-inner">
                                                                        <img class="img-fluid video-thumb" src="<?= base_url('assets/login/multiple_pages') ?>/img/video-bg.jpg" alt="<?= __('front.video') ?>">
                                                                        <a href="#"><?= __('front.play') ?></a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <?php
                                                        }
                                                        ?>
                                                    </div>
                                                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                                        <i class="fa fa-angle-left"></i>
                                                    </a>
                                                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                                    <i class="fa fa-angle-right"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--Video Area-->
                        <?php
                    break;
                    case 'Recommendation Section':
                        ?>
                            <!--Client Testimonial Area-->
                            <div class="testimonial-area">
                                <div class="container mb-5">
                                    <div class="row justify-content-center">
                                        <div class="col-lg-6">
                                            <div class="section-title text-center">
                                                <i class="fa fa-snowflake-o fa-lg front_theme_text_color" aria-hidden="true"></i>
                                                <?php foreach($theme_settings as $settings) { $recommendation_section = $settings; } ?>
                                                <h2 class="front_theme_text_color"><?= (isset($recommendation_section) && !empty($recommendation_section->recommendation_section_title)) ? $recommendation_section->recommendation_section_title : "What is Lorem IpsumS?" ?></h2>
                                                <p><?= (isset($recommendation_section) && !empty($recommendation_section->recommendation_section_subtitle)) ? $recommendation_section->recommendation_section_subtitle : "Lorem Ipsum is simply dummy text of the printing and typesetting industry." ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="testimonial-slider owl-carousel" style="z-index: 0 !important;">
                                <?php 
                                foreach($theme_recommendation as $recommendation):
                                if ($recommendation->status==1) { 
                                $isRecommendationAvailable = true;
                                $image_url = (!empty($recommendation->image)) ? base_url('assets/images/theme_images/'.$recommendation->image) : base_url('assets/login/multiple_pages/img/client-1.png');
                                ?>
                                <!--single testimonial item-->
                                    <div class="single-testimonial">
                                        <div class="testimonial-inner">
                                            <div class="testmonial-header text-center">
                                                <div class="author-image">
                                                    <img class="profile" class="profile" src="<?= $image_url ?>" alt="<?= $recommendation->title ?>" height="200    ">
                                                </div>
                                                <h3 class="front_theme_text_color"><?= $recommendation->title ?></h3>
                                                <span class="designation"><?= $recommendation->occupation ?></span>
                                            </div>
                                            <div class="testmonial-content text-center">
                                                <p><?= $recommendation->description ?></p>
                                            </div>
                                        </div>
                                    </div><!--single testimonial item--> 
                                <?php } ?>          
                                <?php endforeach; ?>

                                <?php
                                    if(!isset($isRecommendationAvailable)) {
                                    ?>
                        
                                        <!--single testimonial item-->
                                        <div class="single-testimonial">
                                            <div class="testimonial-inner">
                                                <div class="testmonial-header text-center">
                                                    <div class="author-image">
                                                        <img class="profile" src="<?= base_url('assets/login/multiple_pages') ?>/img/client-1.png" alt="<?= __('front.client') ?>">
                                                    </div>
                                                    <h3 class="front_theme_text_color">Metehan</h3>
                                                    <span class="designation">Designer</span>
                                                </div>
                                                <div class="testmonial-content text-center">
                                                    <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                                                </div>
                                            </div>
                                        </div><!--single testimonial item-->           
                                        
                                        <!--single testimonial item-->
                                        <div class="single-testimonial">
                                            <div class="testimonial-inner">
                                                <div class="testmonial-header text-center">
                                                    <div class="author-image">
                                                        <img class="profile" src="<?= base_url('assets/login/multiple_pages') ?>/img/client-2.png" alt="<?= __('front.client') ?>">
                                                    </div>
                                                    <h3 class="front_theme_text_color">Metehan</h3>
                                                    <span class="designation">Designer</span>
                                                </div>
                                                <div class="testmonial-content text-center">
                                                    <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                                                </div>
                                            </div>
                                        </div><!--single testimonial item-->            
                                        
                                        <!--single testimonial item-->
                                        <div class="single-testimonial">
                                            <div class="testimonial-inner">
                                                <div class="testmonial-header text-center">
                                                    <div class="author-image">
                                                        <img class="profile" src="<?= base_url('assets/login/multiple_pages') ?>/img/client-2.png" alt="<?= __('front.client') ?>">
                                                    </div>
                                                    <h3 class="front_theme_text_color">Metehan</h3>
                                                    <span class="designation">Designer</span>
                                                </div>
                                                <div class="testmonial-content text-center">
                                                    <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                                                </div>
                                            </div>
                                        </div><!--single testimonial item-->            
                                        
                                        <!--single testimonial item-->
                                        <div class="single-testimonial">
                                            <div class="testimonial-inner">
                                                <div class="testmonial-header text-center">
                                                    <div class="author-image">
                                                        <img class="profile" src="<?= base_url('assets/login/multiple_pages') ?>/img/client-3.png" alt="<?= __('front.client') ?>">
                                                    </div>
                                                    <h3 class="front_theme_text_color">Metehan</h3>
                                                    <span class="designation">Designer</span>
                                                </div>
                                                <div class="testmonial-content text-center">
                                                    <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                                                </div>
                                            </div>
                                        </div><!--single testimonial item-->           
                                        
                                        <!--single testimonial item-->
                                        <div class="single-testimonial">
                                            <div class="testimonial-inner">
                                                <div class="testmonial-header text-center">
                                                    <div class="author-image">
                                                        <img class="profile" src="<?= base_url('assets/login/multiple_pages') ?>/img/client-3.png" alt="<?= __('front.client') ?>">
                                                    </div>
                                                    <h3 class="front_theme_text_color">Metehan</h3>
                                                    <span class="designation">Designer</span>
                                                </div>
                                                <div class="testmonial-content text-center">
                                                    <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                                                </div>
                                            </div>
                                        </div><!--single testimonial item-->
                                        
                                        <!--single testimonial item-->
                                        <div class="single-testimonial">
                                            <div class="testimonial-inner">
                                                <div class="testmonial-header text-center">
                                                    <div class="author-image">
                                                        <img class="profile" src="<?= base_url('assets/login/multiple_pages') ?>/img/client-3.png" alt="<?= __('front.client') ?>">
                                                    </div>
                                                    <h3 class="front_theme_text_color">Metehan</h3>
                                                    <span class="designation">Designer</span>
                                                </div>
                                                <div class="testmonial-content text-center">
                                                    <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                                                </div>
                                            </div>
                                        </div><!--single testimonial item-->
                                        
                                        <?php
                                        }
                                        ?>

                                    </div>
                                </div><!--Client Testimonial Area-->
                        <?php
                    break;
                }
            }
        }          
    ?>


<?php include(APPPATH.'/views/usercontrol/login/multiple_pages/footer.php'); ?>
