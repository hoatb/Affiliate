<!-- Banner  -->
<section class="hero-banner">
     <div class="container">
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner text-center text-white">
            <?php
            $homepage_slider = json_decode($store_setting['homepage_slider']);
            echo 'a' . sizeof($homepage_slider);
            $showNav = false;
            for ($i=0; $i < sizeof($homepage_slider); $i++) { 
                $homepage_slider_available = true;
                $showNav = sizeof($homepage_slider) > 1 ?  1 :  0;
            ?>
                <div class="carousel-item <?= ($i==0) ? 'active' : ''; ?>">
                     <div class="img-banner">
                            <img src="<?= (!empty($homepage_slider[$i]->slider_background_image)) ? base_url('assets/images/site/'. $homepage_slider[$i]->slider_background_image) : base_url('assets/store/default/img/banner.png') ?>" alt="">
                        </div>
                </div>
            <?php	
            }

            // dummy homepage slide if not available
            if(!isset($homepage_slider_available)) {
                ?>
                <div class="carousel-item active">
                    <div class="img-banner">
                        <img src="<?= base_url('assets/store/default/img/banner.png') ?>" alt="">
                    </div>

                </div>
                <?php
            }

            ?>
            </div>
            <?php if($showNav) { ?>
                <a class="carousel-control-prev bg-main2" href="#carouselExampleControls" role="button" data-slide="prev">
                    <img alt="<?= __('store.image') ?>" src="<?= base_url('assets/store/default/'); ?>img/slider-arrow.png" />
                </a>
                <a class="carousel-control-next bg-main2" href="#carouselExampleControls" role="button" data-slide="next">
                    <img alt="<?= __('store.image') ?>" src="<?= base_url('assets/store/default/'); ?>img/slider-arrow.png" />
                </a>
            <?php } ?>
        </div>
     </div>
 </section>

 <section class="section-categories">
     <div class="container">
         <h2 class="h2 mb-3">Sản phẩm cung cấp</h2>
 		<div class="categories-insurance-list-template">
 			<?php include 'categories-insurance-list-template.php';  ?>
		</div>
         
     </div>
 </section>

 <section class="section-products mb-3">
     <div class="container">
         <div class="card">
             <div class="card-body">
                 <h2 class="h2 mb-3">Bảo hiểm PTI</h2>
                 <div class="bg-linear-gradient">
                     <div class="row">
                         <div class="col-lg-3 product-infomation">
                             <div class="pic icon-product">
                                 <img src="<?= base_url('/assets/store/default/img/') ?>icons/icon-suckhoe.png" alt="">
                             </div>
                             <div>
                                <h4 class="h4">Bảo hiểm PTI</h4>
                                <div class="text">
                                    Bảo hiểm PTI cùng bạn san sẻ nỗi lo tài chính.
                                </div>
                             </div>
                         </div>
                         <div class="col-lg-9">
                             <div class="product-insurance-list-template">
                                 <?php include 'product-insurance-list-template.php';  ?>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </section>



 <script type="text/javascript">
$(document).on('click', '.blog-more', function() {
    var el = $(".blog-para"),
        curHeight = el.height(),
        autoHeight = el.css('height', 'auto').height();
    el.height(curHeight).animate({
        height: autoHeight
    }, 500);
    $(this).after('<a href="javascript:void(0);" class="blog-less">' + '<?= __('store.hide') ?>' +
        ' <br/> <i class="fas fa-angle-up"></i></a>');
    $(this).remove();
});

$(document).on('click', '.blog-less', function() {
    var el = $(".blog-para");
    el.animate({
        height: '50px'
    }, 500);
    $(this).after('<a href="javascript:void(0);" class="blog-more">' + '<?= __('store.show_more') ?>' +
        ' <br/> <i class="fas fa-angle-down"></i></a>');
    $(this).remove();
});

$(document).ready(function() {
    load_Product($('#searchProduct').val());

    $('#searchProduct').keyup(function(e) {
        e.preventDefault();
        var search = $(this).val();
        load_Product(search);
    });
});


$(document).on('click', '.see-more', function() {
    load_Product(null, {
        next_page: $(this).data('next_page'),
        request_page_section: $(this).data('request_page_section')
    });
});

function load_Product(search, postData = {}) {
    var data = postData;
    data.search = search;
    data.request_page = 'home';
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
            console.log('product-insurance-list-template');
            console.log(res);
            if (res.trendings) {
                if (postData.next_page && postData.next_page > 1) {
                    $('.product-insurance-list-template').append(Mustache.render($('#product-list-template')
                        .html(), res.trendings));

                } else {

                    $('.product-insurance-list-template').html(Mustache.render($('#product-list-template')
                        .html(), res.trendings));
                }
                $('.see-more-trendings').data('next_page', res.trendings.next_page);
                if (res.trendings.is_last_page) {
                    $('.see-more-trendings').hide();
                }
            }

            // if(res.new) {
            // 	if(postData.next_page && postData.next_page > 1) {
            // 		$('.product-list-trending').append(Mustache.render($('#product-list-template').html(), res.new));
            // 	} else {
            // 		$('.product-list-new').html(Mustache.render($('#product-list-template').html(), res.new));
            // 	}
            // 	$('.see-more-new').data('next_page', res.new.next_page);
            // 	if(res.new.is_last_page) {
            // 		$('.see-more-new').hide();
            // 	}
            // }

            // if(res.category.new && res.category.new.length) {
            // 	$('.home-new-products .category-listing').html(res.category.new);
            // }

            // if(res.category.all && res.category.all.length) {
            // 	$(".demo-cat-badge").hide();
            // }
        }
    });
}
 </script>
