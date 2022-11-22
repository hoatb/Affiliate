<link rel="stylesheet" type="text/css" href="<?= base_url('assets/store/default/slick/') ?>slick.css" />
<link rel="stylesheet" type="text/css" href="<?= base_url('assets/store/default/slick/') ?>slick-theme.css" />
<script type="text/javascript" src="<?= base_url('assets/store/default/slick/') ?>slick.js"></script>

<?php 
$product_featured_image = ($product['product_featured_image'] != '') ? base_url('assets/images/product/upload/thumb/'. $product['product_featured_image']) : base_url('assets/store/default/img/pr-img.png') ; 
$allimages = $this->Product_model->getAllImages($product['product_id']);
$allvideo = $this->Product_model->getAllVideos($product['product_id']);
?>

<section class="hero-banner pb-0">
    <div class="container">
        <div class="img-banner border-none">
            <img src="<?= base_url('assets/images/banner-tnds-xemay.png') ?>" alt="">
        </div>
    </div>
</section>

<section class="section-insurance-package">
    <div class="container">

        <div class="card mb-3">

            <?php include 'include/feature_product.php';  ?>

            <div class="card-body">

                <div class="badge badge-primary mb-1">
                    <?php 
                    if($categories){ 
                      foreach ($categories as $key => $value) {
                          $categotyAvailble = true;
                          echo "<a style='color:#ffffff;font-size: 12px' id='product-category' data-product_id='".$product['product_id']."' data-category_id='".$value['id']."' href='". base_url('store/category/'. $value['slug']) ."'><span style='border-color:#fff;'>". $value['name'] ."</span></a>";
                      }
                    }

                    if(!isset($categotyAvailble)) {
                      echo __('store.not_available');
                    }
                    ?>
                </div>
                <h2 class="h2 mb-3"><?=  $product['product_name'] ?></h2>
                <form action=""  class="form-group-insurplatform" style="display: block">
                    <input type="text" class="f_package-sub" placeholder="Package Sub">
                    <div class="form-configs-data"></div>
                </form>

                <div class="row">
                    <div class="col-12 col-md-7">
                        <div class="insurplatform-step insurplatform-step-charged">

                            <div class="insurance-product">
                                <h4 class="h4">Chọn quyền lợi bảo hiểm</h4>

                                <div class="group-package-main"></div>
                                <hr>
                                <div class="group-package-sub"></div>
                                
                                <div id="form-group-configs">

                                </div>
                               
                                <div class="row">
                                        <div class="col-6">
                                            <div class="group-radio">            
                                            <label class="label-group-radio">Thời hạn <span class="red">*</span></label>
                                            <div class="item-radio">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" class="custom-control-input" id="insurancePeriodInformation1" name="insurancePeriodInformation" value="0" selected>
                                                    <label class="custom-control-label" for="insurancePeriodInformation1">1 năm</label>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-12 col-md-5">
                        <div class="insurance-product-info">
                            <h3 class="h4 mb-3">Tổng hợp quyền lợi từ gói bảo hiểm đã chọn</h3>
                            <div class="list-feature">
                                <div class="feature">
                                    <div class="label"><span class="biicon bi bi-calendar3"></span> Thời hạn</div>
                                    <div class="value">1 Năm</div>
                                </div>
                             
                            </div>

                            <div class="list-packages">
                                <div class="package package-title">
                                    <div class="label">QUYỀN LỢI CƠ BẢN</div>
                                    <div class="value">SỐ TIỀN BẢO HIỂM (STBH)</div>
                                </div>
                                <div class="package">
                                    <div class="label">
                                        Bồi thường chi phí y tế, tử vong cho nạn nhân
                                    </div>
                                    <div class="value">150,000,000 <u>đ</u>/người/vụ</div>
                                </div>
                                <div class="package">
                                    <div class="label">
                                        Bồi thường cho tài sản của nạn nhân
                                    </div>
                                    <div class="value">100,000,000 <u>đ</u>/vụ</div>
                                </div>
                                <div class="package package-title">
                                    <div class="label">QUYỀN LỢI MỞ RỘNG (TUỲ CHỌN THÊM)</div>
                                    <div class="value"></div>
                                </div>
                                <div class="package">
                                    <div class="label">
                                        Bồi thường chi phí y tế, tử vong cho người ngồi trên xe
                                    </div>
                                    <div class="value">100,000,000 <u>đ</u>/vụ</div>
                                </div>
                            </div>

                            <div class="fee-total">
                                <strong>Phí cần đóng</strong>
                                <span id="FeeNumber" class="fee">0 <u>đ</u></span>
                            </div>
                            <div class="group-button">
                                <button class="btn btn-info btn-calculator" type="button" id="calculatorFee">Tính  phí</button>
                                <button class="btn btn-primary btn-choose-insur disabled" type="button" disabled>Chọn mua</button>
                            </div>
                        </div>
                    </div>
                </div>
                

            </div>
        </div>

    </div>
</section>

<?php include 'include/customer_reviewer.php';  ?>

<?php include 'include/motorcycle/group-package-main.php';  ?>  
<?php include 'include/motorcycle/group-package-sub.php';  ?>  

<?php 
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
?>  

<?php include 'product-insurance-list-template.php';  ?>






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