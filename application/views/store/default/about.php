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
                        <img src="<?= (!empty($homepage_slider[$i]->slider_background_image)) ? base_url('assets/images/site/'. $homepage_slider[$i]->slider_background_image) : base_url('assets/store/default/img/banner.png') ?>"
                            alt="">
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
                <img alt="<?= __('store.image') ?>"
                    src="<?= base_url('assets/store/default/'); ?>img/slider-arrow.png" />
            </a>
            <a class="carousel-control-next bg-main2" href="#carouselExampleControls" role="button" data-slide="next">
                <img alt="<?= __('store.image') ?>"
                    src="<?= base_url('assets/store/default/'); ?>img/slider-arrow.png" />
            </a>
            <?php } ?>
        </div>
    </div>
</section>

<section class="section-about-us d-none">
    <div class="container">
        <div class="row">
            <div class="col-md-6 order-md-2">
                <div class="pic">
                    <img src="./images/why_us.png" alt="">
                </div>
            </div>
            <div class="col-md-6 order-md-1">
                <h2 class="h2 mt-5 mb-3">
                    GIỚI THIỆU CHUNG
                </h2>
                <div class="text">
                    Tổng Công ty Cổ phần Bảo hiểm Bưu điện (PTI) tiền thân là Công ty Cổ phần Bảo hiểm Bưu điện được
                    được Bộ Tài chính cấp Giấy chứng nhận đủ tiêu chuẩn và điều kiện hoạt động kinh doanh bảo hiểm số
                    10/TC/GCN ngày 18/06/1998, được Uỷ ban Nhân dân thành phố Hà Nội thành lập theo Giấy phép số
                    3633/GP-UB ngày 01/8/1998 và Sở Kế hoạch và Đầu tư Thành phố Hà Nội cấp Giấy chứng nhận đăng ký kinh
                    doanh số 055051 ngày 12/8/1998. PTI có 7 cổ đông sáng lập: Tập đoàn Bưu chính Viễn thông Việt Nam
                    (VNPT), Tổng công ty Cổ phần Tái bảo hiểm Quốc gia Việt Nam (VINARE), Tổng công ty Cổ phần Bảo Minh,
                    Tổng công ty Xây dựng Hà Nội (HACC), Tổng công ty xuất nhập khẩu xây dựng Việt Nam (VINACONEX), Công
                    ty Cổ phần Thương mại Bưu chính Viễn thông (COKYVINA) và Ngân hàng thương mại cổ phần Quốc tế Việt
                    Nam ( VIB), trong đó, Tập đoàn VNPT vừa là cổ đông, vừa là khách hàng lớn nhất của PTI.
                </div>
                <h2 class="h2 mt-5 mb-3">
                    THÔNG TIN
                </h2>
                <div class="text">

                    <div class="product_details_description">
                        <ul style="font-size: 16px">
                            <li>Tên đầy đủ và chính thức: Tổng công ty Cổ phần Bảo hiểm Bưu điện
                            </li>
                            <li>Tên giao dịch bằng tiếng Việt: Bảo hiểm Bưu điện</li>
                            <li>Tên tiếng Anh: Post and Telecommunication Joint Stock Insurance
                                Corporation</li>
                            <li>Tên viết tắt: PTI</li>
                            <li>Vốn điều lệ: 503.957.090.000 VNĐ</li>
                            <li>Trụ sở chính: Tầng 8, Số 4A Láng Hạ, Quận Ba Đình, Thành phố Hà Nội
                            </li>
                            <li>Điện thoại: (84-4) 37724466/(84-4) 37724466 - Fax (84-4)
                                37724460/37724461</li>
                            <li>Website: www.pti.com.vn </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section-features bg-white">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="feature">
                    <div class="icon">
                        <img src="<?= base_url('assets/store/default/img/icons/live-online.png') ?>" alt="">
                    </div>
                    <h4 class="h4">100% Trực tuyến</h4>
                    <div class="text">
                        Một chạm để được bảo hiểm, một phút để hoàn tất yêu cầu bồi thường, 1 phút hoàn tất bồi
                        thường
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="feature feature-left">
                    <div class="icon">
                        <img src="<?= base_url('assets/store/default/img/icons/procedure-basic.png') ?>" alt="">
                    </div>
                    <h4 class="h4">Quy trình đơn giản</h4>
                    <div class="text">
                        Không cần khai báo tình trạng bệnh lý để tham gia bảo hiểm.
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="feature">
                    <div class="icon">
                        <img src="<?= base_url('assets/store/default/img/icons/medicine.png') ?>" alt="">
                    </div>
                    <h4 class="h4">Tham gia độc lập</h4>
                    <div class="text">
                        Trẻ em từ 30 ngày tuổi được tham gia độc lập mà không cần bố mẹ tham gia cùng
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="feature feature-left">
                    <div class="icon">
                        <img src="<?= base_url('assets/store/default/img/icons/procedure-basic.png') ?>" alt="">
                    </div>
                    <h4 class="h4">Cam kết đồng hành</h4>
                    <div class="text">
                        Luôn bên cạnh bạn và cam kết tái tục bảo hiểm trong những năm tiếp theo
                    </div>
                </div>
            </div>
        </div>

        <div class="group-button">
            <a href="<?php echo base_url() ?>" class="btn btn-primary btn-rounded pl-5 pr-5">Mua ngay</a>
        </div>
    </div>
</section>