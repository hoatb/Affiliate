<link rel="stylesheet" type="text/css" href="<?= base_url('assets/store/default/slick/') ?>slick.css" />
<link rel="stylesheet" type="text/css" href="<?= base_url('assets/store/default/slick/') ?>slick-theme.css" />
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css?v=<?= av() ?>">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="<?= base_url('assets/store/default/js/jquery.maskMoney.min.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/plugins/toastr/toastr.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/store/default/slick/') ?>slick.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>
<script src="<?= base_url('assets/store/default/') ?>js/insurplatform.js"></script>

<?php 
$product_featured_image = ($product['product_featured_image'] != '') ? base_url('assets/images/product/upload/thumb/'. $product['product_featured_image']) : base_url('assets/store/default/img/pr-img.png') ; 
$product_banner_image = ($product['product_banner'] != '') ? base_url('assets/images/product/upload/thumb/'. $product['product_banner']) : base_url('assets/store/default/img/pr-img.png') ; 
$allimages = $this->Product_model->getAllImages($product['product_id']);
$allvideo = $this->Product_model->getAllVideos($product['product_id']);
?>

<!-- Affiliate Module Insur -->
<section class="hero-banner pb-0">
    <div class="container">
        <div class="img-banner border-none">
            <img src="<?= $product_banner_image ?>" alt="">
        </div>
    </div>
</section>

<section class="section-insurance-package">
    <div class="container">

        <div class="card mb-3">

            <?php include 'include/feature_product.php';  ?>
    
            <!-- $product_insurcore_references -->
            <div class="card-body" id="mainProductInsurance">
                <div class="badge badge-primary mb-1">
                    <?php 
                    $product_template_code = $product_insurcore_references->product_template_code;
                    if($categories){ 
                      foreach ($categories as $key => $value) {
                          $categotyAvailble = true;
                          echo "<a style='color:#ffffff;font-size: 12px' id='product-category' data-template_code='".$product_template_code."' data-product_id='".$product['product_id']."' data-category_id='".$value['id']."' href='javascript: void(0)'><span style='border-color:#fff;'>". $value['name'] ."</span></a>";
                      }
                    }

                    if(!isset($categotyAvailble)) {
                      echo __('store.not_available');
                    }
                    ?>  
                </div>
                <h2 class="h2 mb-2" id="data-product-insur" data-baseurl="<?= base_url() ?>" data-template_code="<?= $product_template_code; ?>"><?=  $product['product_name'] ?></h2>
                <div class="breacrumb breacrumb-insurance">
                    <div class="inner-pages-breadcrumb">
                        <p>Bảo hiểm PTI / <span class="step-name">Lựa chọn sản phẩm bảo hiểm</span></p></p>
                    </div>
                </div>
                <div class="group-variation-insurplatform d-none" ></div>

                <form action="" class="form-group-insurplatform" style="display: none">
                    
                    <input type="text" class="f_package-main" placeholder="Package Main">
                    <input type="text" class="f_package-sub" placeholder="Package Sub">
                    <div class="form-configs-secret-data"></div>
                    <div class="form-configs-data"></div>
                </form>
                
                <form id="signupForm" action="" >
                <div class="row" >
                    <div class="col-12 col-lg-7">
                        <div class="insurplatform-step insurplatform-step-charged <?= 'configs-'.$product_insurcore_references->product_template_code?>">

                            <!-- Step 1 -->
                            <div class="insurance-product insurance-step insurance-step-1 show" data-step="1">

                                <?php if($product_insurcore_references->product_template_code == 'insur_motobike') { ?>
                                    <h4 class="h4">Chọn quyền lợi bảo hiểm</h4>

                                    <div class="group-package-main"></div>
                                    <hr>
                                    <div class="group-package-sub"></div>

                                    <div id="form-group-configs" >

                                    </div>

                                    <div class="row">
                                        <div class="col-6 col-md-4">
                                            <div class="group-radio">
                                                <label class="label-group-radio">Thời hạn <span class="red">*</span></label>
                                                <div class="form-control-period active">
                                                    <span class="label-period">1 Năm</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                                <?php if($product_insurcore_references->product_template_code == 'insur_physical_damage') { ?>
                                    <h4 class="h4">Chọn quyền lợi bảo hiểm</h4>

                                    <div class="group-package-main"></div>
                                    <hr>
                                    <div class="group-package-sub"></div>

                                    <div id="form-group-configs">

                                    </div>

                                    <div class="row">
                                        <div class="col-6 col-md-4">
                                            <div class="group-radio">
                                                <label class="label-group-radio">Thời hạn <span class="red">*</span></label>
                                                <div class="form-control-period active">
                                                    <span class="label-period">1 Năm</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>

                                <?php if($product_insurcore_references->product_template_code == 'insur_car') { ?>
                                    <h4 class="h4">Chọn quyền lợi bảo hiểm</h4>

                                    <div class="group-package-main"></div>
                                    <hr>
                                    <div class="group-package-sub"></div>
                                    
                                    <div class="group-package-sub-people"></div>

                                    <div id="form-group-configs">

                                    </div>

                                    <div class="row">
                                        <div class="col-6 col-md-4">
                                            <div class="group-radio">
                                                <label class="label-group-radio">Thời hạn <span class="red">*</span></label>
                                                <div class="form-control-period active">
                                                    <span class="label-period">1 Năm</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <style>
                                        .configs-insur_car .group-atc_TotalInsuranceAmount{
                                            display: none;
                                        }
                                    </style>
                                <?php } ?>
                                    
                                <?php if($product_insurcore_references->product_template_code == 'insur_health') { ?>
                                    <h3 class="h4">Lọc theo mục tiêu của bạn:  <span id="yourAge"></span></h3>
                                    <div class="row">
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <label for="">Ngày sinh <span class="red">*</span></label>
                                                <div class="form-control-date">
                                                    <input type="text" class="form-control datesinglepickerage" id="I_DateOfBirth" name="I_DateOfBirth" value="">
                                                    <span class="biicon bi bi-calendar3"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-10">
                                            <div class="group-package-main"></div>
                                            <div class="group-package-sub"></div>
                                        </div>
                                    </div>
                        


                                    <div class="row">
                                        <div class="col-6 col-md-4">
                                            <div class="group-radio">
                                                <label class="label-group-radio">Thời hạn:<span class="red">*</span></label>
                                                <div class="form-control-period active">
                                                    <span class="label-period">1 Năm</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>

                                
                            </div>

                            <!-- ./step 1 -->


                            <!-- step 2 -->
                            <div class="insurance-information insurance-step insurance-step-2" data-step="2">

                                
                                <div class="group-insurance-period-information">
                                    <div class="title-group">
                                        <h3>Ngày bảo hiểm</h3>
                                    </div>
                                    <p class="text">
                                        Hợp đồng bảo hiểm có thời hạn 1 năm kể từ ngày bắt đầu
                                    </p>
                                    <div class="row">
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <label for="">Ngày hiệu lực <span class="red">*</span></label>
                                                <div class="form-control-date">
                                                    <input type="text" class="form-control datesinglepicker"
                                                        id="I_PolicyEffectiveDate" name="I_PolicyEffectiveDate"
                                                        value="">
                                                    <span class="biicon bi bi-calendar3"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <label for="">Ngày hết hạn <span class="red">*</span></label>
                                                <div class="form-control-date">
                                                    <input type="text" disabled class="form-control datesinglepicker"
                                                        id="I_PolicyExpireDate" name="I_PolicyExpireDate" value="">
                                                    <span class="biicon bi bi-calendar3"></span>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <style>
                                .form-group-PolicyEffectiveDate,
                                .form-group-PolicyExpireDate {
                                    display: none;
                                }
                                </style>

                                <div id="form-group-information"></div>
                                <button type="button" class="back-to-step" data-step="1"><i class="bi bi-chevron-double-left"></i> Quay lại</button>  
                            </div>
                            <!-- ./step 2 -->
                        </div>
                    </div>

                    <div class="col-12 col-lg-5">
                        <div class="insurance-product-info">
                            <h3 class="h4 mb-3">Tổng hợp quyền lợi từ gói bảo hiểm đã chọn</h3>
                            <div class="list-feature">
                                <div class="feature">
                                    <div class="label"><span class="biicon bi bi-x-diamond-fill"></span>Thời hạn</div>
                                    <div class="value">1 Năm</div>
                                </div>

                                <div class="attribute-configs">
                                    
                                </div>
                            </div>

                            <div class="list-packages">
                                <div class="package package-title">
                                    <div class="label">QUYỀN LỢI CƠ BẢN</div>
                                    <div class="value">SỐ TIỀN BẢO HIỂM TỐI ĐA ĐẾN</div>
                                </div>
                                <div class="list-main-package">
                                    
                                </div>
                                
                                <div class="box-list-sub-page" style="display: none">
                                    <div class="package package-title">
                                        <div class="label">QUYỀN LỢI MỞ RỘNG (TUỲ CHỌN THÊM)</div>
                                        <div class="value"></div>
                                    </div>
                                    <div class="list-sub-page" >
                                    
                                    </div>
                                </div>
                                <div class="box-list-sub-for-person" style="display: none">
                            
                                </div>
                                
                            </div>

                            <div class="fee-total">
                                <strong>Phí cần đóng</strong>
                                <span id="FeeNumber" class="fee">0 <u>đ</u></span>
                            </div>
                            <div class="group-button show" data-step="1">
                                <button class="btn btn-info btn-calculator" type="button" id="calculatorFee">Tính
                                    phí</button>
                                <button class="btn btn-primary btn-choose-insur disabled" type="button" disabled>Chọn
                                    mua</button>

                                
                            </div>
                            <div class="group-button" data-step="2">
                                <button id="checkValid" class="btn btn-primary w-100 btn-review" type="button">Tiếp tục</button>
                            </div>
                            <div class="group-button" data-step="3">
                                <div class="variations-pricing-row">
                                    <div class="d-none">
                                        <?= (!empty($product['product_msrp'])) ? '<div class="regular-price" data-price="'.$product['product_msrp'].'">'.c_format($product['product_msrp']).'</div>' : '' ?>
                                        <div class="sale-price d-none" data-price="<?= $product['product_price']; ?>">
                                            <?= (!empty($product['product_price'])) ? c_format($product['product_price']) : '' ?>
                                        </div>
                                        <div class="quantity-area d-none" id="field1" style="">
                                            <button type="button" id="sub" class="sub"
                                                <?=($product['product_type']=='video' || $product['product_type']=='videolink') ?'disabled':'';?>><i
                                                    class="fa fa-minus"></i></button>
                                            <input id="product-quantity" type="text" id="1" min="1" name="quantity"
                                                value="1"
                                                <?=($product['product_type']=='video' || $product['product_type']=='videolink') ?'disabled':'';?>>
                                            <button type="button" id="add" class="add"
                                                <?=($product['product_type']=='video' || $product['product_type']=='videolink') ?'disabled':'';?>><i
                                                    class="fa fa-plus"></i></button>
                                        </div>
                                        <?php if ($order_id && ($product['product_type']=='video' || $product['product_type']=='videolink')): ?>
                                        <?php $urls = base_url('store/vieworderdetails/'.$order_id."?referance=".$product['product_id']); ?>
                                        <button class="btn primary btn-cart-detail bg-main2 "
                                            onclick="location.href ='<?=$urls?>'"><?= __('store.start_course') ?></button>
                                        <?php else: ?>
                                    </div>
                                    <div class="apply-coupon d-none">
                                        <input class="coupon-code" type="text" name="coupon"
                                            placeholder="<?= __('store.enter_coupon_code') ?>">
                                        <button class="btn btn-apply-coupon bg-main text-white btn-apply-coupon"
                                            title="<?= __('store.apply_coupon_code') ?>"><?= __('store.apply') ?></button>
                                        <img alt="<?= __('store.image') ?>"
                                            src="<?= base_url('assets/store/default/'); ?>img/coupen.png"
                                            class="couponicon">
                                    </div>
                                    <div class="coupon-msg mt-1"></div>
                                    <button data-product_id="<?= $product['product_id'] ?>"
                                        data-product_name="<?= (!empty($product['product_name'])) ? $product['product_name'] : 'Sản phẩm Bảo hiểm' ?>"
                                        class="btn btn-cart-detail bg-main2 btn-cart"><?php echo __('store.payment') ?></button>
                                    <?php endif ?>
                                    
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </form>


            </div>
        </div>

    </div>
</section>

<?php //include 'include/customer_reviewer.php';  ?>

<?php include 'include/motorcycle/group-package-main.php';  ?>
<?php include 'include/motorcycle/group-package-main-view.php';  ?>
<?php include 'include/motorcycle/group-package-sub.php';  ?>
<?php include 'include/motorcycle/group-package-sub-view.php';  ?>

<?php include 'include/insur_health/group-package-main.php';  ?>
<?php include 'include/insur_health/group-package-sub.php';  ?>
<?php include 'include/insur_health/group-package-main-view.php';  ?>
<?php include 'include/insur_health/group-package-sub-view.php';  ?>

<?php include 'include/insur_car/group-package-main.php';  ?>
<?php include 'include/insur_car/group-package-sub.php';  ?>
<?php include 'include/insur_car/group-package-sub-people.php';  ?>
<?php include 'include/insur_car/package-insur-car-sub-view.php';  ?>
<?php include 'include/insur_car/group-package-sub-people-view.php';  ?>

<?php include 'include/insur_physical_damage/group-package-main.php';  ?>
<?php include 'include/insur_physical_damage/group-package-main-view.php';  ?>


<?php include 'include/insur_variation.php';  ?>

<?php 
    include 'include/form_configs/title.php';  
    include 'include/form_configs/title-copy-insurance.php';  
    include 'include/form_configs/select.php';  
    include 'include/form_configs/radio.php';  
    include 'include/form_configs/checkbox.php';  
    include 'include/form_configs/text.php';  
    include 'include/form_configs/textarea.php';  
    include 'include/form_configs/datetime.php';  
    include 'include/form_configs/date.php';  
    include 'include/form_configs/file.php';  
    include 'include/form_configs/multipleselect.php';  
    include 'include/form_configs/address.php';  
    include 'include/form_configs/form.php';  
    include 'include/form_configs/form-serect.php';  
?>

<?php include 'product-insurance-list-template.php';  ?>




<!-- Affiliate Module Insur -->





<section class="single-product d-none">
    <div class="container">
        <div class="breacrumb">
            <div class="inner-pages-breadcrumb">
                <p><a href="<?= $home_link ?>"><?= __('store.home') ?></a> / <a
                        href="<?= $base_url ?>category"><?= __('store.categories') ?></a> / <?php if($categories){ 
          foreach ($categories as $key => $value) {
            $categotyAvailble = true;
              echo "<a href='". base_url('store/category/'. $value['slug']) ."'>".$value['name']."</a> /";
            }
          } ?> <?= (!empty($product['product_name'])) ? $product['product_name'] : "Lorem Ipsum"; ?></p>
            </div>
        </div>

        <div style="clear:both;"></div>

        <div class="single-product-row">
            <div class="produc-gallery">
                <div id="productSlider" class="carousel slide" data-ride="carousel" data-interval="false">
                    <div class="carousel-indicators">
                        <div class="prev-btn">
                            <i class="fa fa-angle-up"></i>
                        </div>
                        <div class="next-btn">
                            <i class="fa fa-angle-down"></i>
                        </div>
                        <div class="slider">
                            <div data-target="#productSlider" data-slide-to="0" class="active">
                                <img src="<?= $product_featured_image; ?>" class=""
                                    alt="<?= __('store.featured_image') ?>"
                                    onerror="this.src='<?= base_url('assets/store/default/img/no-image.png')?>';">
                            </div>
                            <?php 
                                $i = 1;
                                foreach($allimages as $images) { 
                                $img = (!empty($images['product_media_upload_path'])) ? base_url('assets/images/product/upload/thumb/'.$images['product_media_upload_path']) : base_url('assets/store/default/img/pr-img.png');
                                ?>
                                                <div data-target="#productSlider" data-slide-to="<?= $i ?>">
                                                    <img src="<?=  $img; ?>" class="" alt="<?= __('store.product_image') ?> <?= $i ?>"
                                                        onerror="this.src='<?= base_url('assets/store/default/img/no-image.png')?>';">
                                                </div>
                                                <?php 
                                $i++;
                                } 
                                ?>
                            <?php foreach($allvideo as $videos) { 
                                    $img = (!empty($videos['product_media_upload_video_image'])) ? base_url('assets/images/product/upload/thumb/' .$videos['product_media_upload_video_image']) : base_url('assets/store/default/img/pr-img.png');
                                    ?>
                                                <div data-target="#productSlider" data-slide-to="<?= $i ?>">
                                                    <img src="<?=  $img; ?>" class="" alt="<?= __('store.product_video_image') ?> <?= $i ?>"
                                                        onerror="this.src='<?= base_url('assets/store/default/img/no-image.png')?>';">
                                                </div>
                                                <?php 
                                $i++;
                                } 
                                ?>
                        </div>
                    </div>

                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="<?= $product_featured_image; ?>" class="d-block w-100"
                                alt="<?= __('store.featured_image') ?>"
                                onerror="this.src='<?= base_url('assets/store/default/img/no-image.png')?>';">
                        </div>
                        <?php 
            $i = 1;
            foreach($allimages as $images) { 
            $img = (!empty($images['product_media_upload_path'])) ? base_url('assets/images/product/upload/thumb/'.$images['product_media_upload_path']) : base_url('assets/store/default/img/pr-img.png');
            ?>
                        <div class="carousel-item">
                            <img src="<?=  $img; ?>" class="d-block w-100"
                                alt="<?= __('store.product_image') ?> <?= $i ?>"
                                onerror="this.src='<?= base_url('assets/store/default/img/no-image.png')?>';">
                        </div>
                        <?php 
            $i++;
            } 
            ?>
                        <?php foreach($allvideo as $videos) { 
                $img = (!empty($videos['product_media_upload_video_image'])) ? base_url('assets/images/product/upload/thumb/' .$videos['product_media_upload_video_image']) : base_url('assets/store/default/img/pr-img.png');
                $youtube = $videos['product_media_upload_path'];
                ?>
                        <div data-src="<?php echo $youtube; ?>" data-poster="" class="carousel-item">
                            <?php 
                  if (strpos($youtube,'embed') !== false) {
                      ?>
                            <iframe width="100%" height="530" src="<?=$youtube ?>" frameborder="0"
                                allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen></iframe>
                            <?php
                  } else {

                      if(strpos(strtolower($youtube),'youtube') !== false){
                          $id = explode("v=",$youtube);
                          ?>
                            <iframe width="100%" height="530" src="https://www.youtube.com/embed/<?=$id[1] ?>"
                                frameborder="0"
                                allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen></iframe>
                            <?php
                      } else if(strpos(strtolower($youtube),'youtu') !== false) {
                          $id = explode("/",$youtube);
                          ?>
                            <iframe width="100%" height="530" src="https://www.youtube.com/embed/<?=$id[3] ?>"
                                frameborder="0"
                                allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen></iframe>
                            <?php
                      }

                      ?>
                            <?php
                  }
                  ?>
                        </div>
                        <?php 
            $i++;
            } 
            ?>

                        <a class="carousel-control-prev" href="#productSlider" role="button" data-slide="prev">
                            <img alt="<?= __('store.image') ?>"
                                src="<?= base_url('assets/store/default/'); ?>img/arpr.png">
                        </a>
                        <a class="carousel-control-next" href="#productSlider" role="button" data-slide="next">
                            <img alt="<?= __('store.image') ?>"
                                src="<?= base_url('assets/store/default/'); ?>img/arpr.png">
                        </a>
                    </div>
                </div>
            </div>

            <div class="product-content-detail">
                <div class="pr-title">
                    <h1><?= (!empty($product['product_name'])) ? $product['product_name'] : "What is Lorem Ipsum?"; ?>
                    </h1>
                    <div class="compair-icons">
                        <!-- w-listed -->
                        <span id="btn-add-to-wishlist" class="<?= $is_wishlisted_class ?>"><i class="fa fa-heart"
                                aria-hidden="true"></i></span>
                        <?php $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>
                        <span data-social-share data-share-url="<?= $actual_link;?>"><img alt="<?= __('store.image') ?>"
                                src="<?= base_url('assets/store/default/'); ?>img/refresh.png"></span>
                    </div>
                </div>
                <div class="review-row">
                    <?php
          $ratingAvg = 0;
          $totalRating = 0;
          $numberOfRatings = 0;
          if(!empty($ratings)) { 
            foreach($ratings as $rating) { 
              $totalRating += (int)$rating['rating_number'];
              $numberOfRatings++;
            }
          }
          
          if($totalRating > 0 && $numberOfRatings > 0) {
            $ratingAvg = number_format(($totalRating / $numberOfRatings), 0);
          }
         ?>

                    <span class="">
                        <?php
        for ($i=0; $i < $ratingAvg; $i++) { 
        ?>
                        <img alt="<?= __('store.image') ?>" src="<?= base_url('assets/store/default/'); ?>img/st.png">
                        <?php
        }
        while($ratingAvg < 5) {
        ?>
                        <img alt="<?= __('store.image') ?>" src="<?= base_url('assets/store/default/'); ?>img/st1.png">
                        <?php        
        $ratingAvg++;            
        }
        ?>
                    </span>
                    <span class="spacer">|</span>
                    <span><?= $numberOfRatings ?> <?= __('store.customer_reviews') ?></span>
                    <span class="spacer">|</span>
                    <span class="sku"><?= __('store.sku') ?> :
                        <?= (!empty($product['product_sku'])) ? $product['product_sku'] : "ED1420";?></span>
                    <span class="spacer">|</span>
                    <span><?= __('store.promoted_by') ?> :
                        <?php if(!empty($user['store_slug']) && !empty($user['username'])) { ?>
                        <a href="<?= base_url('store/'.$user['store_slug']); ?>"><?= $user['username']; ?></a>
                        <?php } else { ?>
                        <?= (!empty($user['username'])) ? $user['username'] : __('store.admin');?>
                        <?php } ?>
                    </span>
                    <span class="spacer">|</span>
                    <span><?= __('store.category') ?> : <?php 
          if($categories){ 
          foreach ($categories as $key => $value) {
              $categotyAvailble = true;
              echo "<a id='product-category' data-product_id='".$product['product_id']."' data-category_id='".$value['id']."' href='". base_url('store/category/'. $value['slug']) ."'><span style='border-color:#fff;'>". $value['name'] ."</span></a>";
          }
          }

          if(!isset($categotyAvailble)) {
            echo __('store.not_available');
          }
          ?>
                </div></span>

                <p class="product-text">
                    <?= !(empty($product['product_short_description'])) ? $product['product_short_description'] : __('store.product_short_description_if_not_exist');?>
                </p>

                <?php
        $variations = [];
        if(isset($product['product_variations']) && !empty($product['product_variations'])) {
          $variations = json_decode($product['product_variations']);
        }
        ?>

                <?php
          foreach ($variations as $key => $value) {
            ?>
                <div class="variation-row my-1 <?= ($key != "colors") ? "ft-variation-row" : "ft-color-row"; ?>">
                    <span class="varition-title"><?= ucwords(strtolower($key))?></span>
                    <div class="variations color ml-2">
                        <?php
                            for ($i=0; $i < sizeOf($value); $i++) { 
                                $this_price = isset($value[$i]->price) ? $value[$i]->price : 0;
                                if($key == "colors") {
                            ?>
                            <span data-variation-type="<?= $key; ?>" data-variation-price="<?= $this_price; ?>"
                                data-variation-code="<?= $value[$i]->code; ?>"
                                data-variation-name="<?= $value[$i]->name; ?>" class=""
                                style="color:<?= $value[$i]->code;?>; <?= ($value[$i]->code == '#FFFFFF') ? "color:#000;" : "";?>"><i
                                    style="background:<?= $value[$i]->code;?>;"></i> <?= $value[$i]->name;?></span>
                            <?php
                            } else {
                            $this_name = isset($value[$i]->name) ? $value[$i]->name : $value[$i];
                        ?>
                                <span data-variation-type="<?= $key; ?>" data-variation-price="<?= $this_price; ?>"
                                    data-variation-option="<?= $this_name; ?>" class="" style="border-color:#fff;">
                                    <?= $this_name ?></span>
                                <?php
                            }
                        }
                        ?>
                    </div>
                </div>
                <?php
          }

        ?>

                <div class="variation-row mt-1">

                </div>
            </div>

        </div>


    </div>
</section>

<section class="product-description-reviews d-none">
    <div class="container">
        <div class="description-reviews-tabs">
            <a href="javascript:void(0);" class="active dbtn"><?= __('store.description') ?></a>
            <a href="javascript:void(0);" class="rbtn"><?= __('store.reviews') ?></a>
        </div>

        <div class="discription-reviews-content">
            <div class="description-content">
                <?= (!empty($product['product_description'])) ? html_entity_decode($product['product_description']) : '<h3 class="text-left text-center text-muted p-4 no-review">'.__('store.product_description_not_available').'</h3>'; ?>
            </div>
        </div>

        <div class="product-reviews-all" style="display:none;">
            <?php if(!empty($ratings)) { ?>
            <?php foreach($ratings as $rating) { ?>
            <div class="reviews-box">
                <div class="reviews-img-wrap">
                    <?php if(!empty($rating['avatar'])) { ?>
                    <img src="<?php echo base_url(); ?>assets/images/users/<?php echo $rating['avatar'];?>"
                        onerror="this.src='<?=base_url('assets/store/default/').'img/avatar-default.png'?>';" />
                    <?php } else { ?>
                    <img src="<?= base_url('assets/store/default/'); ?>img/avatar-default.png" alt="<?= __('store.user') ?>" />
                    <?php } ?>
                </div>

                <div class="rview-content-text">
                    <div class="reviews-top-row">
                        <h3><?= $rating['firstname']." ".$rating['lastname'];?></h3>
                        <div class="reviews-star">
                            <?php
                  $rating_count = (int)$rating['rating_number'];
                  for ($i=0; $i < $rating_count; $i++) { 
                  ?>
                            <img alt="<?= __('store.image') ?>"
                                src="<?= base_url('assets/store/default/'); ?>img/st.png">
                            <?php
                  }
                  while($rating_count < 5) {
                  ?>
                            <img alt="<?= __('store.image') ?>"
                                src="<?= base_url('assets/store/default/'); ?>img/st1.png">
                            <?php        
                  $rating_count++;            
                  }
                  ?>
                        </div>
                        <span><?= (!empty($rating['rating_created'])) ? $rating['rating_created'] : "10.11.2020"; ?></span>
                    </div>

                    <p><?= (!empty($rating['rating_comments'])) ? $rating['rating_comments'] : "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.";?>
                    </p>
                </div>
            </div>
            <?php } ?>
            <?php } else { ?>
            <h3 class="text-left text-center text-muted p-4 no-review">
                <?= __('store.there_are_no_reviews_for_this_product') ?></h3>
            <?php } ?>

            <?php if($allowReview){ ?>
            <hr>
            <div class="">
                <div class="clearfix"></div>
                <h2 class="write-review"><?= __('store.write_a_review') ?></h2><br>
                <div id="createRatting" class="create_Rating">
                    <input name="user_id" id="user_id" type="hidden"
                        value="<?php echo !empty($session) ? $session['id'] : '';?>" />
                    <input name="product_id" value="<?php echo $product['product_id'];?>" id="product_id"
                        type="hidden" />
                    <div class="form-group">
                        <label class="control-label"><?= __('store.your_review') ?></label>
                        <textarea name="comment" id="comment" placeholder="<?= __('store.enter_your_review') ?>"
                            cols="80" class="form-control"></textarea>
                        <div class="help-block"><span class="text-danger"><?= __('store.note') ?></span>
                            <?= __('store.html_is_not_translated') ?></div>
                    </div>
                    <div class="form-group">
                        <label class="control-label"><?= __('store.email') ?></label>
                        <input name="email" id="post_email" placeholder="<?= __('store.enter_your_email') ?>"
                            type="text" value="" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label class="control-label"><?= __('store.rating') ?></label>
                        <div class="clearfix"></div>
                        <div class="give-rating"></div>
                        <input name="rating" value="0" id="rating_star" type="hidden" />
                    </div>
                    <button class="btn btn-success" name="submit" id="submit" onclick="processRating()">
                        <?= __('store.leave_a_review') ?> </button>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</section>

<section class="related-products d-none">
    <div class="container">
        <div class="home-trend-top pt-0">
            <h2 class="section-title">
                <img alt="<?= __('store.image') ?>" src="<?= base_url('assets/store/default/'); ?>img/package-b.png">
                <?= __('store.similar_products') ?>
            </h2>
        </div>

        <div class="product-row d-flex flex-wrap product-list-related">

        </div>
        <a href="javascript:void(0);" class="see-more see-more-related" data-next_page="1">
            <img alt="<?= __('store.image') ?>" src="<?= base_url('assets/store/default/'); ?>img/loading.png" />
            <?= __('store.show_more') ?>
        </a>
    </div>
</section>
<textarea id="dataCartItems" style="display: none" rows="4" cols="50"><?php echo json_encode($cart_items);?></textarea>


<?= $social_share_modal; ?>

<?php include 'product-list-template.php';  ?>

<script type="text/javascript">
$(document).ready(function() {

    load_Product(null, {
        product_id: $('#product-category').data('product_id'),
        category_id: $('#product-category').data('category_id')
    });

    $(document).on('click', '#btn-add-to-wishlist', function() {
        <?php if($login_usr == false) { ?>
        window.location.replace('<?= base_url('store/login');?>');
        <?php } else { ?>

        let status = $(this).hasClass('w-listed');
        $(this).toggleClass('w-listed');
        $.ajax({
            url: '<?= base_url('Store/toggle_wishlist') ?>',
            type: 'POST',
            dataType: 'json',
            data: {
                product_id: <?= $product['product_id'] ?>
            },
            success: function(json) {
                // do nothing
            },
        });
        <?php } ?>
    });

    // slick carousel
    $('.slider').slick({
        infinite: true,
        speed: 300,
        slidesToShow: 5,
        slidesToScroll: 1,
        arrows: true,
        vertical: true,
        verticalSwiping: true,
        prevArrow: $('.prev-btn'),
        nextArrow: $('.next-btn')
    });

    $(".description-reviews-tabs a").click(function() {
        $(".description-reviews-tabs a").removeClass('active');
        $(this).addClass('active');
    });

    $(".checkout-payments-wrapper a").click(function() {
        $(".checkout-payments-wrapper a").removeClass('active');
        $(this).addClass('active');
    });

    $(".description-reviews-tabs a.rbtn").click(function() {
        $(".discription-reviews-content").hide();
        $(".product-reviews-all").show();
    });

    $(".description-reviews-tabs a.dbtn").click(function() {
        $(".discription-reviews-content").show();
        $(".product-reviews-all").hide();
    });

    if ($('.give-rating').length) {
        $('.give-rating').starRating({
            initialRating: 0,
            starSize: 20,
            readOnly: false,
            disableAfterRate: false,
            callback: function(currentRating, $el) {
                $("#rating_star").val(currentRating);
            }
        });
    }

    $(document).on('click', '.see-more', function() {
        load_Product(null, {
            next_page: $(this).data('next_page'),
            product_id: $('#product-category').data('product_id'),
            category_id: $('#product-category').data('category_id')
        });
    });

    $(document).on('click', ".btn-apply-coupon", function() {
        let coupon_code = $(".apply-coupon .coupon-code").val();
        let product_id = '<?= $product['product_id'] ?>';
        if (coupon_code != "" && coupon_code != null) {
            $this = $(this);
            $.ajax({
                url: '<?= $add_coupon_url ?>',
                type: 'POST',
                dataType: 'json',
                data: {
                    product_id: product_id,
                    coupon_code: coupon_code,
                },
                beforeSend: function() {
                    $this.btn("loading");
                },
                complete: function() {
                    $this.btn("reset");
                },
                success: function(json) {
                    $(".coupon-msg").html('');

                    if (json['success']) {
                        $(".coupon-msg").html(
                            "<div class='alert alert-success' style='border-radius:20px;'>" +
                            json['success'] + "</div>");
                    }
                    if (json['error']) {
                        $(".coupon-msg").html(
                            "<div class='alert alert-danger' style='border-radius:20px;'>" +
                            json['error'] + "</div>");
                    }
                },
            });
        }
    });

    $(document).on('click', '.variations-pricing-row .add', function() {
        if ($(this).prev().val() < 350) {
            $(this).prev().val(+$(this).prev().val() + 1);
        }
    });

    $(document).on('click', '.variations-pricing-row .sub', function() {
        if ($(this).next().val() > 1) {
            if ($(this).next().val() > 1) $(this).next().val(+$(this).next().val() - 1);
        }
    });
});


function processRating() {
    if ($('#name').length > 0) {
        var name = $('#name').val();
    } else {
        var name = '';
    }
    var email = $('#post_email').val();
    var rating_star = $('#rating_star').val();
    var product_id = $('#product_id').val();
    var user_id = $('#user_id').val();
    var comment = $('#comment').val();
    if (comment != '' && rating_star != 0) {
        $("#submit").prop("disabled", true);
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url();?>product/rating',
            data: 'product_id=' + product_id + '&user_id=' + user_id + '&comment=' + comment + '&name=' + name +
                '&email=' + email + '&number=' + rating_star,
            success: function(data) {
                window.location.reload();
                $("#submit").prop("disabled", false);
            }
        });
    } else {
        alert('<?= __('store.please_write_some_comment') ?>');
    }
}

function load_Product(search, postData = {}) {
    var data = postData;
    data.search = search;
    data.request_page = 'product-details';
    var ajaxReq = 'ToCancelPrevReq';
    var ajaxReq = $.ajax({
        url: "<?= base_url() ?>" + 'Store/load_Product',
        type: 'POST',
        dataType: 'JSON',
        data: data,
        beforeSend: function() {
            if (ajaxReq != 'ToCancelPrevReq' && ajaxReq.readyState < 4) {
                ajaxReq.abort();
            }
            $('.btn-search').addClass('btn-loading');
        },
        complete: function() {
            $('.btn-search').removeClass('btn-loading');
        },
        success: function(res) {
            if (res.related) {
                if (postData.next_page && postData.next_page > 1) {
                    $('.product-list-related').append(Mustache.render($('#product-list-template').html(),
                        res.related));
                } else {
                    $('.product-list-related').html(Mustache.render($('#product-list-template').html(), res
                        .related));
                }
                $('.see-more-related').data('next_page', res.related.next_page);
                if (res.related.is_last_page) {
                    $('.see-more-related').hide();
                }
            }
        }
    });
}

var x, i, j, l, ll, selElmnt, a, b, c;
/*look for any elements with the class "custom-select":*/
x = document.getElementsByClassName("custom-select");
l = x.length;
for (i = 0; i < l; i++) {
    selElmnt = x[i].getElementsByTagName("select")[0];
    ll = selElmnt.length;
    /*for each element, create a new DIV that will act as the selected item:*/
    a = document.createElement("DIV");
    a.setAttribute("class", "select-selected");
    a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
    x[i].appendChild(a);
    /*for each element, create a new DIV that will contain the option list:*/
    b = document.createElement("DIV");
    b.setAttribute("class", "select-items select-hide");
    for (j = 1; j < ll; j++) {
        /*for each option in the original select element,
        create a new DIV that will act as an option item:*/
        c = document.createElement("DIV");
        c.innerHTML = selElmnt.options[j].innerHTML;
        c.addEventListener("click", function(e) {
            /*when an item is clicked, update the original select box,
            and the selected item:*/
            var y, i, k, s, h, sl, yl;
            s = this.parentNode.parentNode.getElementsByTagName("select")[0];
            sl = s.length;
            h = this.parentNode.previousSibling;
            for (i = 0; i < sl; i++) {
                if (s.options[i].innerHTML == this.innerHTML) {
                    s.selectedIndex = i;
                    h.innerHTML = this.innerHTML;
                    y = this.parentNode.getElementsByClassName("same-as-selected");
                    yl = y.length;
                    for (k = 0; k < yl; k++) {
                        y[k].removeAttribute("class");
                    }
                    this.setAttribute("class", "same-as-selected");
                    break;
                }
            }
            h.click();
        });
        b.appendChild(c);
    }
    x[i].appendChild(b);
    a.addEventListener("click", function(e) {
        /*when the select box is clicked, close any other select boxes,
        and open/close the current select box:*/
        e.stopPropagation();
        closeAllSelect(this);
        this.nextSibling.classList.toggle("select-hide");
        this.classList.toggle("select-arrow-active");
    });
}

function closeAllSelect(elmnt) {
    var x, y, i, xl, yl, arrNo = [];
    x = document.getElementsByClassName("select-items");
    y = document.getElementsByClassName("select-selected");
    xl = x.length;
    yl = y.length;
    for (i = 0; i < yl; i++) {
        if (elmnt == y[i]) {
            arrNo.push(i)
        } else {
            y[i].classList.remove("select-arrow-active");
        }
    }
    for (i = 0; i < xl; i++) {
        if (arrNo.indexOf(i)) {
            x[i].classList.add("select-hide");
        }
    }
}

document.addEventListener("click", closeAllSelect);


$(document).on('click', '.variations span', function() {
    $(this).parent().find('.active').removeClass('active');
    $(this).addClass('active');
    $('.btn-cart').removeAttr('data-original-title');
    hideTooltip();
    display_price_changes();
});

function display_price_changes() {
    let variationSelectedPrice = 0;
    if ($('.variation-row .variations').length != 0) {
        $('.variation-row .variations').each(function() {
            let type = $(this).find('span:first-child').data('variation-type');
            let optionSpan = $(this).find('.active');
            variationSelectedPrice += optionSpan.length ? parseFloat(optionSpan.data('variation-price')) : 0;
        });
    }

    let currencyRatio = '<?= str_replace(',','',c_format(1,false)); ?>';
    let product_regular_price = (variationSelectedPrice + $('.regular-price').data('price')) * currencyRatio;
    let product_sale_price = (variationSelectedPrice + $('.sale-price').data('price')) * currencyRatio;
    let currency = $('a[data-currency-symbol]').data('currency-symbol');

    product_regular_price = new Intl.NumberFormat().format(product_regular_price);
    product_sale_price = new Intl.NumberFormat().format(product_sale_price);

    $('.sale-price').text(currency + product_sale_price + '.00');
    $('.regular-price').text(currency + product_regular_price + '.00');
}
</script>
