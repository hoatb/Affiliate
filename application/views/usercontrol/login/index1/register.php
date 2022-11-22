<!doctype html>
<html lang="en">
<head>
    <?php

    if($SiteSetting['google_analytics']){ echo $SiteSetting['google_analytics']; }
    if($SiteSetting['faceboook_pixel']){ echo $SiteSetting['faceboook_pixel']; }
    $logo = ($SiteSetting['front-side-themes-logo'] ? 'assets/images/site/'.$SiteSetting['front-side-themes-logo'] : 'assets/vertical/assets/images/users/avatar-1.jpg');
    if($SiteSetting['favicon']){
        echo '<link rel="icon" href="'. base_url('assets/images/site/'.$SiteSetting['favicon']) .'" type="image/*" sizes="16x16">';
    }
    $global_script_status = (array)json_decode($SiteSetting['global_script_status'],1);
    if(in_array('front', $global_script_status)){ echo $SiteSetting['global_script']; }
    $db =& get_instance();
    $products = $db->Product_model;
    $googlerecaptcha =$db->Product_model->getSettings('googlerecaptcha');
    $tnc =$db->Product_model->getSettings('tnc');
    $front_side_font =$db->Product_model->getSettings('site','front_side_font');
    ?>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?= $title ?></title>
    <meta name="author" content="<?= $meta_author ?>">
    <meta name="keywords" content="<?= $meta_keywords ?>">
    <meta name="description" content="<?= $meta_description ?>">
    <link href="<?= base_url('assets/login/index1') ?>/css/bootstrap.min.css?v=<?= av() ?>" rel="stylesheet">
    <link href="<?= base_url('assets/login/index1') ?>/css/common.css?v=<?= av() ?>" rel="stylesheet">
    <link href="<?= base_url('assets/login/index1') ?>/css/theme-01.css?v=<?= av() ?>" rel="stylesheet">
    <script src="<?= base_url('assets/login/index1') ?>/js/jquery.min.js"></script>
    <script src="<?= base_url('assets/login/index1') ?>/js/popper.min.js"></script>
    <script src="<?= base_url('assets/login/index1') ?>/js/bootstrap.min.js"></script>
    <?php if($SiteSetting['front_custom_logo_size']): ?>
        <style type="text/css">
            .customLogoClass{
                width: <?= (int) $SiteSetting['front_log_custom_width'] ?>px !important;
                height: <?= (int) $SiteSetting['front_log_custom_height'] ?>px !important;
            }
        </style>
    <?php endif ?>
    
    <?php if (is_rtl()) { ?>
      <!-- place here your RTL css code -->
      <!-- <link href="<?= base_url('assets/login/index1') ?>/css/rtl.css?v=<?= av() ?>" rel="stylesheet"> -->
    <?php } ?>

    <style type="text/css">
        .forny-container {
            font-family: <?= $front_side_font['front_side_font'] ?> !important;
        }
    </style>
</head>
<body style="font-family: <?= $front_side_font['front_side_font'] ?> !important;">
    <div class="forny-container">
        <div class="forny-inner">
            <div class="alert alert-danger d-none alert-form-error">
                <?= __('front.correct_invalid_value') ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="<?= __('front.close') ?>">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="forny-form">
                <?php if($store['language_status']){ ?>
                    <div class="language-changer"> <?= $LanguageHtml ?></div>
                <?php } ?>
                <div class="forny-logo">
                    <a href="<?= base_url() ?>">
                        <img src="<?= base_url($logo) ?>" <?= ($SiteSetting['front_custom_logo_size']) ? 'class="customLogoClass"' : '' ?> alt="<?= __('front.logo') ?>">
                    </a>
                </div>
                <div class="login-reg-form">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link bg-transparent" href="<?= base_url() ?>">
                                <span><?= __('front.login') ?></span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active bg-transparent" href="<?= base_url('register') ?>">
                                <span><?= __('front.register') ?></span>
                            </a>
                        </li>
                    </ul>
                    <?= $register_fomm ?>
                </div>
            </div>
        </div>
    </div>
    
    <script src="<?= base_url('assets/login/index1') ?>/js/main.js"></script>
</body>
</html>
