<?php
  $db =& get_instance();
  $products = $db->Product_model;
  $cart_store_side_font = $products->getSettings('site','cart_store_side_font');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <meta name="author" content="" />

    <meta property='og:url' content='<?= $_SERVER['REQUEST_URI']; ?>' />
    <?php if(isset($meta_title)){ ?>
    <meta property="og:title" content="<?php echo $meta_title ?>" /><?php } ?>
    <?php if(isset($meta_description)){ ?>
    <meta name="description" content="<?php echo $meta_description ?>" />
    <meta property="og:description" content="<?php echo $meta_description ?>" />
    <?php } ?>
    <?php if(isset($meta_image)){ ?>
    <meta property="og:image" content="<?php echo $meta_image ?>" /><?php } ?>
    <?php 
        $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    ?>
    <meta property="og:url" content="<?= $actual_link ?>" />
    <meta name="twitter:card" content="summary_large_image" />

    <?php if($store_setting['favicon']){ ?>
    <link rel="icon" href="<?= base_url('assets/images/site/'.$store_setting['favicon']) ?>" type="image/*"
        sizes="16x16">
    <?php } ?>

    <title><?= $store_setting['name'] ?> <?= isset($meta_title) ? '- ' . $meta_title : '' ?></title>


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@700&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    <!--  CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/store/default/'); ?>css/bootstrap.min.css?v=<?= av() ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/store/default/'); ?>css/placeholder-loading.css?v=<?= av() ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/store/default/'); ?>css/sweetalert2.min.css?v=<?= av() ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/store/default/'); ?>css/nouislider.css?v=<?= av() ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/store/default/'); ?>css/bootstrap-icons.css?v=<?= av() ?>" />
     <link rel="stylesheet" href="<?= base_url('assets/store/default/'); ?>css/style.css?v=<?= av() ?>" />
        <link rel="stylesheet" href="<?= base_url('assets/store/default/'); ?>css/responsive.css?v=<?= av() ?>" />  
    <link rel="stylesheet" href="<?= base_url('assets/store/default/'); ?>css/main.css?v=<?= av() ?>">
    <link rel="stylesheet" href="<?= base_url('assets/store/default/fontawesome/'); ?>css/all.min.css?v=<?= av() ?>" />
    <script src="<?= base_url('assets/store/default/'); ?>js/jquery-3.5.1.slim.min.js"></script>
    

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <script src="<?= base_url('assets/store/default/'); ?>js/jquery.min.js"></script>
    <script src="<?= base_url('assets/store/default/'); ?>js/bootstrap.min.js"></script>
    <script src="<?= base_url('assets/plugins/store/') ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('assets/plugins/store/') ?>jquery.star-rating-svg.js"></script>
    <script src="<?= base_url('assets/store/default/') ?>js/nouislider.min.js"></script>
    <script src="<?= base_url('assets/store/default/') ?>js/sweetalert2.all.min.js"></script>
    <script src="<?= base_url('assets/plugins/') ?>mustache.js"></script>
    

    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

    <script type="text/javascript">
    try {
        <?php 
          if($store_setting['google_analytics'] != ''){
            $ana = preg_replace('/<script>/', '', $store_setting['google_analytics']);
            $ana = preg_replace('/<\/script>/', '', $ana);
            echo $ana;
          } 
          ?>
    } catch (error) {
        console.log(error);
    }
    </script>


    <?php 
    
    if(isset($store_setting['per_task']) && !empty($store_setting['per_task'])){
      $per_tasks = json_decode($store_setting['per_task'], true);
      if(!empty($per_tasks)){
        ?><script type="text/javascript">
    <?php
        foreach ($per_tasks as $per_task){
          $per_task_new = preg_replace('/<script>/', '', $per_task);
          $per_task_new = preg_replace('/<\/script>/', '', $per_task_new);
          ?>
    try {
        <?php  echo $per_task_new; ?>
    } catch (error) {
        console.log(error);
    }
    <?php }
      ?>
    </script><?php
      }
    } 
    ?>


    <?php 
    $global_script_status = (array)json_decode($SiteSetting['global_script_status'],1);
    if(in_array('store', $global_script_status)){
        echo $SiteSetting['global_script'];
    }
    ?>

    <script type="text/javascript">
    (function($) {
        $.fn.btn = function(action) {
            var self = $(this);
            if (action == 'loading') {
                if ($(self).attr("disabled") == "disabled") {
                    //e.preventDefault();
                }
                $(self).attr("disabled", "disabled");
                $(self).attr('data-btn-text', $(self).html());
                $(self).html('<i class="fa fa-spinner fa-spin"></i>&nbsp;' + $(self).text());
            }
            if (action == 'reset') {
                $(self).html($(self).attr('data-btn-text'));
                $(self).removeAttr("disabled");
            }
        }
    })(jQuery);
    var formDataFilter = function(formData) {
        if (!(window.FormData && formData instanceof window.FormData)) return formData
        if (!formData.keys) return formData
        var newFormData = new window.FormData()
        Array.from(formData.entries()).forEach(function(entry) {
            var value = entry[1]
            if (value instanceof window.File && value.name === '' && value.size === 0) {
                newFormData.append(entry[0], new window.Blob([]), '')
            } else {
                newFormData.append(entry[0], value)
            }
        });
        return newFormData;
    }
    </script>

    <style>
    .loader {
        border: 5px solid #f3f3f3;
        border-radius: 50%;
        border-top: 5px solid #3498db;
        width: 60px;
        height: 60px;
        z-index: 9999;
        -webkit-animation: spin 2s linear infinite;
        /* Safari */
        animation: spin 2s linear infinite;
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        -webkit-transform: translate(-50%, -50%);
    }

    .body-loading {
       /*  position: fixed;
        top: 0;
        left: 0;
        width: 100vw;
        height: 100vh;
        overflow: hidden; */
    }

    .body-loading::before {
        content: '';
        position: fixed;
        top: 0;
        left: 0;
        width: 100vw;
        height: 100vh;
        z-index: 9999;
        background-color: rgba(255, 255, 255, .8);
    }

    @-webkit-keyframes spin {
        0% {
            -webkit-transform: rotate(0deg);
        }

        100% {
            -webkit-transform: rotate(360deg);
        }
    }

    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }
    </style>

    <script>
    // loading function
    function showLoading() {
        $('body').append('<div id="loadingAffiliate" class="loader"></div>').addClass('body-loading');
    }

    function hideLoading() {
        setTimeout(() => {
            $('#loadingAffiliate').fadeOut();
        }, 1000);
        setTimeout(() => {
            $('#loadingAffiliate').remove();
            $('body').removeClass('body-loading');    
        }, 1200);
    }
    </script>
</head>

<body style="font-family: <?= $cart_store_side_font['cart_store_side_font'] ?> !important;">

    <?php 
        $fbmessager_status = (array)json_decode($SiteSetting['fbmessager_status'],1);
        if(in_array('store', $fbmessager_status)){
            echo $SiteSetting['fbmessager_script'];
        }
    ?>

    <header id="myHeader">
        <div class="container">
            <nav class="navbar navbar-expand-lg">
                <?php  $logo = ($store_setting['logo']) ? base_url('assets/images/site/'.$store_setting['logo']) : base_url('assets/store/default/').'img/logo.png'; ?>
                <a class="navbar-brand" href="<?= $home_link ?>"><img alt="<?= __('store.image') ?>" src="<?= $logo ?>" height="36" onerror="this.src='<?=base_url('assets/store/default/').'img/logo.png'?>';"/></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><img src="<?= base_url('assets/store/default/'); ?>img/menu.png" class="img-toggler" alt="<?= __('store.menu') ?>"></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ">
                        <li class="nav-item <?= ($page == 'home') ? 'active' : ''; ?>">
                            <a href="<?= $home_link ?>" class="nav-link">Sản phẩm</a>
                        </li>
                        <li class="nav-item <?= ($page == 'about') ? 'active' : ''; ?>">
                            <a href="<?= $base_url ?>about" class="nav-link">Giới thiệu</a>
                        </li>
                        <li class="nav-item <?= ($page == 'lookup_policy') ? 'active' : ''; ?>">
                            <a href="<?= base_url() ?>l" class="nav-link">Tra cứu hợp đồng</a>
                        </li>
                       <!--  <li class="nav-item">
                            <a class="nav-link" href="./ho-tro.html">Hỗ trợ</a>
                        </li> -->
                    </ul>

                    <div class="header-right-listing">
                        <ul class="d-flex">
                            <?php if($is_logged){ ?>
                              <div class="dropdown dropdown-menu-right">
                                <?php 
                                $avatar = $client['avatar'] != '' ? base_url('assets/images/users/'. $client['avatar']) : base_url('assets/store/default/img/avatar-default.png');
                                ?>
                                <a href="javascript::void(0)" class="js-link2">
                                  <img alt="<?= __('store.image') ?>" src="<?= $avatar; ?>" class="mr-1" width="24" height="24"/>
                                  <div class="info-user">
                                      <span class="name"><?= $client['firstname'] . ' ' . $client['lastname']?></span>
                                  </div>
                                </a>
                                <ul class="js-dropdown-list2">
                                  <li class="d-flex"><a class="text-dark" href="<?php echo $base_url ?>profile"><i class="bi bi-person-fill"></i> &nbsp;&nbsp;<?= __('store.profile') ?></a></li>
                                  <li class="d-flex"><a class="text-dark" href="<?php echo $base_url ?>order"><i class="bi bi-gift-fill"></i> &nbsp;&nbsp;<?= __('store.order') ?></a></li>
                                  <li class="d-flex"><a class="text-dark" href="<?php echo $base_url ?>logout"><i class="bi bi-box-arrow-left"></i> &nbsp;&nbsp;<?= __('store.logout') ?></a></li>
                                </ul>
                              </div>
                            </li>
                            <?php } else { ?>
                              <li><a href="<?php echo $base_url ?>login" class="top-login-btn btn bg-main2 text-white d-flex align-items-center"><img alt="<?= __('store.image') ?>" src="<?= base_url('assets/store/default/'); ?>img/signin.png" class="mr-2" /><?= __('store.login') ?></a></li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>

    <div class="page-wrapper main">
        <?php echo $content ?>
    </div>
    <footer>
        <div class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-6 col-md-3">
                        <div class="widget widget-link">
                            <h5>TRUY CẬP NHANH</h5>
                            <ul class="list-links text-small">
                                <li class="<?= ($page == 'home') ? 'active' : ''; ?>">
                                    <a href="<?= $home_link ?>">Trang chủ</a>
                                </li>
                                <li class="<?= ($page == 'about') ? 'active' : ''; ?>">
                                    <a href="<?= $base_url ?>about">Giới thiệu</a>
                                </li>
                                <li class="<?= ($page == 'lookup_policy') ? 'active' : ''; ?>">
                                    <a href="<?= base_url() ?>l">Tra cứu hợp đồng</a>
                                </li>
                          <!--       <li><a href="#">Trang chủ</a></li>
                                <li><a href="#">Sản phẩm</a></li>
                                <li><a href="#">Hợp đồng</a></li>
                                <li><a href="#">Liên hệ</a></li> -->
                            </ul>
                        </div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="widget widget-link">
                            <h5>&nbsp;</h5>
                            <ul class="list-links text-small">
                                <li><a href="#">Điều khoản</a></li>
                                <li><a href="#">Chính sách</a></li>
                                <li><a href="#">Quy định</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="widget widget-contact">
                            <h5>LIÊN HỆ</h5>
                            <div class="contact">
                                <div class="info">
                                    <span class="iconmoon bi bi-telephone"></span> <a class="text"
                                        href="tel:19006727">1900 6727</a>
                                </div>
                                <div class="info">
                                    <span class="iconmoon bi bi-envelope"></span> <a class="text"
                                        href="mailto:contact@etpasaigon.vn">contact@etpasaigon.vn</a>
                                </div>
                                <div class="info">
                                    <span class="iconmoon bi bi-geo-alt"></span>
                                    <p class="text">24C Phan Đăng Lưu, P6, Quận Bình Thạnh, TP.HCM</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright">
            <?= ($settings['footer'] != '') ? $settings['footer'] : __('store.all_rights_reserved')." ".date('Y')."."?>
        </div>
    </footer>
    <div class="modal fade modal-authen-affiliate" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <?php 
					$db =& get_instance(); 
					$products = $db->Product_model; 
					$googlerecaptcha =$db->Product_model->getSettings('googlerecaptcha');
				?>
                <div class="modal-body pd-0">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i
                            class="bi bi-x-lg"></i></button>
                    <div class="row">
                        <div class="col-md-7">
                            <div class="col-form">
                                <form method="POST" action="<?= $base_url.'ajax_login'; ?>" id="login-form">
                                <!-- <form method="POST" accept-charset="UTF-8"  autocomplete="off" v-ajax @ id="supplierForm"  @reset="true"> -->
                                    <div class="form-header">
                                        <h5 class="sub-title">Xin chào,</h5>
                                        <p class="text">Đăng nhập hoặc <a data-toggle="modal" href="#registerModal">Tạo
                                                tài khoản</a></p>
                                    </div>
                                    <div class="form-body">
                                        <div class="form-group">
                                            <label class="control-label">Tên đăng nhập:</label>
                                            <input class="form-control" type="text" name="username">
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Mật khẩu</label>
                                            <input class="form-control" type="password" name="password">
                                        </div>
                                        <?php if (isset($googlerecaptcha['client_login']) && $googlerecaptcha['client_login']) { ?>
											<div class="form-group">
												<div class="captch mb-3">
													<div class="g-recaptcha" id='client_login'></div>
												</div>
												<input type="hidden" name="captch_response">
											</div>
										<?php } ?>
                                        <div class="forgot mb-3 text-right">
                                            <a data-toggle="modal" href="#forgot-password-model" class="text-muted">Quên
                                                mật khẩu?</a>
                                        </div>
                                    </div>
                                    <div class="form-footer">
                                        <div class="form-group">
                                            <button type="button" id="btnLogin" class="btn btn-primary btn-submit w-100">Đăng nhập</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-5 col-banner">
                            <div class="pic">
                                <img src="<?= base_url('/assets/store/default/img/') ?>img-register.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade modal-authen-affiliate" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-body pd-0">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i
                            class="bi bi-x-lg"></i></button>
                    <div class="row">
                        <div class="col-md-7">
                            <div class="col-form">
                                <form method="POST" action="<?= $base_url.'ajax_register'; ?>" id="register-form">
                                    <div class="form-header">
                                        <h5 class="sub-title">Tạo tài khoản</h5>
                                        <p class="text">Vui lòng điền đầy đủ các thông tin</p>
                                    </div>
                                    <div class="form-body">
                                        
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label">Tên đăng nhập<span class="red">*</span></label>
                                                    <input class="form-control" name="username" type="text">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Họ<span class="red">*</span></label>
                                                    <input class="form-control" name="f_name" type="text">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Tên<span class="red">*</span></label>
                                                    <input class="form-control" name="l_name" type="text">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="phoneergister">Số điện thoại<span class="red">*</span></label>
                                                    <input onkeypress="return isNumberKey(event);" class="form-control" id="phoneergister" type="text" name="phone" value="">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Email<span class="red">*</span></label>
                                                    <input class="form-control" name="email" type="email">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Mật khẩu<span class="red">*</span></label>
                                                    <input class="form-control" name="password" type="password">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Nhập lại mật khẩu<span class="red">*</span></label>
                                                    <input class="form-control" name="c_password" type="password">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-footer">
                                        <div class="form-group mt-4">
                                            <button type="button" id="btnRegister" class="btn btn-primary btn-submit w-100">Đăng ký</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-5 col-banner">
                            <div class="pic">
                                <img src="<?= base_url('/assets/store/default/img/') ?>img-register.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="cart-confirm" tabindex="-1" aria-labelledby="cart-confirm" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="popup-content">
                    <img src="<?= base_url('assets/store/default/'); ?>img/shopping-cart.png" class="pop-cart-img"
                        alt="<?= __('store.icon') ?>">
                    <h2 id="product-name-prev"></h2>
                    <p><?= __('store.has_beent_added_to_your_cart') ?></p>
                    <img src="<?= base_url('assets/store/default/'); ?>img/popline.png" class="img-fluid img-popline"
                        alt="<?= __('store.icon') ?>">
                    <div class="pop-btn-row">
                        <a href="<?= $base_url ?>checkout"
                            class="btn btn-poup bg-main2"><?= __('store.procceed_to_checkout') ?></a>
                        <a href="javascript:void(0);" type="button" class="btn btn-poup bg-main" data-dismiss="modal">
                            <?= __('store.continue_shopping') ?>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php if($this->session->flashdata('success') && !is_array($this->session->flashdata('success'))){ ?>
    <script>
    Swal.fire({
        icon: 'success',
        html: '<?= $this->session->flashdata('success') ?>'
    });
    </script>
    <?php } ?>
    <?php if($this->session->flashdata('error') && !is_array($this->session->flashdata('error'))){ ?>
    <script>
    Swal.fire({
        icon: 'warning',
        html: '<?= $this->session->flashdata('error') ?>'
    });
    </script>
    <?php } ?>
    <script type="text/javascript">
    function isNumberKey(evt)
	{
	  var charCode = (evt.which) ? evt.which : event.keyCode;
	    if (charCode != 46 && charCode != 45 && charCode > 31
	    && (charCode < 48 || charCode > 57))
	     return false;

	  return true;
	}
    // Login and Register
    $(function() {
        $(document).on('click', "#btnLogin", function(e) {
            var $this = $('#login-form');
            let data = {
                username:  $("#login-form input[name='username']").val(),
                password: $("#login-form input[name='password']").val(),
            };
            

            $.ajax({
                url: $("#login-form").attr('action'),
                type: 'POST',
                dataType: 'json',
                data: data,
                beforeSend: function() {
                     showLoading();
                },
                complete: function() {
                      setTimeout(() => {
                         hideLoading();
                      }, 1000);
                },
                success: function(result) {
                    $this.find(".has-error").removeClass("has-error");
					$this.find("span.text-danger").remove();
					
					if(result['success']){
						$(".auth-step").remove();
						location.reload();
					}
					if(result['errors']){
					
					    $.each(result['errors'], function(i,j){
					        $ele = $this.find('[name="'+ i +'"]');
					        if($ele){
					            $ele.parents(".form-group").addClass("has-error");
					            $ele.after("<span class='text-danger'>"+ j +"</span>");
					        }
					    })
					}
                },
            })
            return false; 
        });
        $(document).on('click', "#btnRegister", function(e) {
            e.preventDefault();
            
            var $this = $('#register-form');
            
            let data = {
                f_name:  $("#register-form input[name='f_name']").val(),
                l_name: $("#register-form input[name='l_name']").val(),
                username: $("#register-form input[name='username']").val(),
                phone: $("#register-form input[name='phone']").val(),
                email: $("#register-form input[name='email']").val(),
                password: $("#register-form input[name='password']").val(),
                c_password: $("#register-form input[name='c_password']").val(),
            };



           $.ajax({
                url: $("#register-form").attr('action'),
                type: 'POST',
                dataType: 'json',
                data: $this.serialize(),
                beforeSend: function() {
                     showLoading();
                },
                complete: function() {
                     hideLoading();
                },
                success: function(result) {
                    hideLoading();
                    $this.find(".has-error").removeClass("has-error");
					$this.find("span.text-danger").remove();
					if(result['success']){
						location.reload();
					}
					
					if(result['errors']){
					    $.each(result['errors'], function(i,j){
					        $ele = $this.find('[name="'+ i +'"]');
					        if($ele){
					            $ele.parents(".form-group").addClass("has-error");
					            $ele.after("<span class='text-danger'>"+ j +"</span>");
					        }
					    })
					}
                },
            })
            return false; 
        });
        
    });

    // Tooltip
    $('.btn-cart').tooltip({
        trigger: 'click',
        placement: 'top'
    });

    function setTooltip(message) {
        $('.btn-cart').tooltip('hide').attr('data-original-title', message).tooltip('show');
    }

    function hideTooltip() {
        $('.btn-cart').tooltip('hide');
    }


    $(function() {
        $(document).on('click', ".btn-cart", function() {
            let quantity = ($('input#product-quantity').length) ? $('input#product-quantity').val() : 1;
            let product_name = $(this).data('product_name');
            let product_id = $(this).data('product_id');
            $this = $(this);

            let variationNotSelected = [];
            let variationSelected = {'price': 0};

            if ($('.variation-row .variations').length != 0) {
                $('.variation-row .variations').each(function() {
                    let type = $(this).find('span:first-child').data('variation-type');
                    let optionSpan = $(this).find('.active');
                    if (optionSpan.length) {
                        let totalPrice = parseInt(variationSelected['price']);
                        totalPrice += parseInt(optionSpan.data('variation-price'));
                        variationSelected['price'] = totalPrice;
                        // variationSelected['price'] = optionSpan.data('variation-price');
                        if (type == 'colors') {
                            variationSelected[type] = optionSpan.data('variation-code') + "-" +
                                optionSpan.data('variation-name');
                        } else {
                            variationSelected[type] = optionSpan.data('variation-option');
                        }
                    } else {
                        variationNotSelected.push(type);
                    }
                });
            }

            if (variationNotSelected.length) {
                let warningMessage = '<?= __('store.please_select') ?>' + ' ';
                for (let index = 0; index < variationNotSelected.length; index++) {
                    const element = variationNotSelected[index];
                    warningMessage += (index == 0) ? element : ", " + element
                }
                setTooltip(warningMessage + ' ' + '<?= __('store.before_add_to_cart') ?>');
            } else {
                console.log('variationSelected');
                console.log(variationSelected);
                $.ajax({
                    url: '<?= $add_tocart_url ?>',
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        quantity: quantity,
                        product_id: product_id,
                        variation: variationSelected,
                    },
                    beforeSend: function() {
                        $this.btn("loading");
                    },
                    complete: function() {
                        $this.btn("reset");
                    },
                    success: function(json) {
                        console.log(json['location']);

                        if (json['location']) {
                            updateCart();
                            window.location = '<?= $base_url ?>'+'checkout';
                            // $('#cart-confirm #product-name-prev').text(product_name)
                            // $("#cart-confirm").modal("show");
                        }
                    }
                });
            }
        });

        $(document).on("click", ".cart-dropdown .btn-remove-cart", function() {
            $this = $(this);
            $.ajax({
                url: $this.attr("data-href"),
                type: 'POST',
                dataType: 'json',
                beforeSend: function() {},
                complete: function() {},
                success: function(json) {
                    updateCart();
                },
            })
            return false;
        });

        $(document).on('click', ".cart-top", function() {
            $(".js-dropdown-list").hide();
            $(".js-dropdown-list1").hide();
            $(".js-dropdown-list2").hide();
            $(".cart-dropdown").slideToggle();
        });

        updateCart();
    });

    $(function() {
        $("#login-form input, #register-form input").focus(function() {
            if ($(document).width() <= 408) {
                $(".navbar-expand-lg,footer").hide();
            }
        });

        $("#login-form input, #register-form input").blur(function() {
            $(".navbar-expand-lg,footer").show();
        });
    });

    $(function() {
        function updateSymbol(e) {
            var selected = $(".currency-selector option:selected");
            $(".currency-symbol").text(selected.data("symbol"));
            $(".currency-amount").prop("placeholder", selected.data("placeholder"));
            $(".currency-addon-fixed").text(selected.text());
        }

        $(".currency-selector").on("change", updateSymbol);

        updateSymbol();
    });

    $(function() {
        var list = $(".js-dropdown-list");
        var link = $(".js-link");
        link.click(function(e) {
            e.preventDefault();
            $(".js-dropdown-list1").hide();
            $(".js-dropdown-list2").hide();
            $(".cart-dropdown").hide();
            list.slideToggle(200);
        });
        list.find("li").click(function() {
            var text = $(this).html();
            link.html(text);
            list.slideToggle(200);
            if (text === "* Reset") {
                link.html('<?= __('store.select_one_option') ?>' + icon);
            }
        });
    });

    $(function() {
        var list = $('.js-dropdown-list1');
        var link = $('.js-link1');
        link.click(function(e) {
            e.preventDefault();
            $(".js-dropdown-list").hide();
            $(".js-dropdown-list2").hide();
            $(".cart-dropdown").hide();
            list.slideToggle(200);
        });
        list.find('li').click(function() {
            var text = $(this).html();
            link.html(text);
            list.slideToggle(200);
            if (text === '* Reset') {
                link.html('<?= __('store.select_one_option') ?>' + icon);
            }
        });
    });

    $(function() {
        var list = $(".js-dropdown-list2");
        var link = $(".js-link2");
        link.click(function(e) {
            e.preventDefault();
            $(".js-dropdown-list1").hide();
            $(".js-dropdown-list").hide();
            $(".cart-dropdown").hide();
            list.slideToggle(200);
        });
        // list.find("li").click(function () {
        //   list.slideToggle(200);
        // });
    });

   /*  window.onscroll = function() {
        let header = document.getElementById("myHeader");
        let sticky = header.offsetTop;
        if (window.pageYOffset > sticky) {
            header.classList.add("sticky");
        } else {
            header.classList.remove("sticky");
        }
    } */
    </script>

    <script type="text/javascript">
    <?php 
if(isset($store_setting['notification']) && sizeOf(json_decode($store_setting['notification']) > 0)) { 
?>
    $(document).ready(function() {
        var items = <?= $store_setting['notification']; ?>,
            $text = $('.top-bar .container'),
            delay = 2;

        var filtered = items.filter(function(el) {
            return (el != null && el != "");
        });

        if (filtered.length > 0) {
            filtered.push(filtered.shift());

            function loop(delay) {
                $.each(filtered, function(i, elm) {
                    $text.delay(delay * 1E3).fadeOut();
                    $text.queue(function() {
                        $text.html('<img alt="' + '<?= __('store.image') ?>' +
                            '" src="<?= base_url('assets/store/default/'); ?>img/top-icon.png" /> ' +
                            filtered[i]);
                        $text.dequeue();
                    });
                    $text.fadeIn();
                    $text.queue(function() {
                        if (i == filtered.length - 1) {
                            loop(delay);
                        }
                        $text.dequeue();
                    });
                });
            }
            loop(delay);
        }
    });
    <?php } ?>

    function updateCart() {
        $.ajax({
            url: '<?= $base_url ?>/mini_cart',
            type: 'POST',
            dataType: 'json',
            beforeSend: function() {},
            complete: function() {},
            success: function(json) {
                $(".cart-top .cart-dropdown").html(json['cart']);
                $(".cart-top .cart-count").html(json['total']);
                $('#cart-sub-total').text(json['sub_total']);
            },
        });
    }
    </script>


    <script>
    <?php
        if(isset($_SESSION['setLocalStorageAffiliateAjax'])) {
            $setLocalStorageAffiliateAjax = json_decode($_SESSION['setLocalStorageAffiliateAjax']);
            $_SESSION['localStorageAffiliate'] = (int) $setLocalStorageAffiliateAjax[0];
            ?>
    var setLocalStorageAffiliateAjax = <?= $_SESSION['setLocalStorageAffiliateAjax'] ?>;
    setWithExpiry("affiliate_id", setLocalStorageAffiliateAjax[0], setLocalStorageAffiliateAjax[1]);
    <?php
            
            unset($_SESSION['setLocalStorageAffiliateAjax']);
        }
    ?>

    function setWithExpiry(key, value, ttl) {
        const now = new Date()
        const item = {
            value: value,
            expiry: now.getTime() + ttl,
        }
        localStorage.setItem(key, JSON.stringify(item))
    }

    function getWithExpiry(key) {
        const itemStr = localStorage.getItem(key)

        if (!itemStr) {
            return 1
        }

        const item = JSON.parse(itemStr)
        const now = new Date()

        if (now.getTime() > item.expiry) {
            localStorage.removeItem(key)
            return 1
        }
        return item.value
    }
    </script>
    
    <?= $page_custom_script; ?>
    
</body>

</html>