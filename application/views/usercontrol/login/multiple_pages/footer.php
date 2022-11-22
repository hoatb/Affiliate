<style type="text/css">
  .cta-area::before {
    background: <?= $bottom_banner_before_footer['bottom_banner_before_footer']; ?> !important;
  }
</style>

<?php 

  if(is_array($theme_settings) && isset($theme_settings[0])) { 

    $footer = $theme_settings[0];

  }

  ?>

    <?php if( current_url() != site_url('/login') && current_url() != site_url('/register') && current_url() != site_url('/register/vendor') && current_url() != site_url('/forget-password') && current_url() != site_url('/terms-of-use')){ ?>

    <!--Cta Area-->

    <div class="cta-area d-flex align-items-center" style="z-index: 0 !important;">

        <div class="container">

            <div class="row justify-content-center">

                <div class="col-lg-6">

                    <div class="section-title text-center">
                        <img src="<?= base_url('assets/login/multiple_pages') ?>/img/icon.png" alt="<?= __('front.client') ?>">
                        <h2><?= (isset($footer->banner_bottom_title) && !empty($footer->banner_bottom_title)) ? $footer->banner_bottom_title : "What is Lorem IpsumS?" ?></h2>
                        <p><?= (isset($footer->banner_bottom_slug) && !empty($footer->banner_bottom_slug)) ? $footer->banner_bottom_slug : "Lorem Ipsum is simply dummy text of the printing and typesetting industry." ?></p>
                        <a class="front_button_color front_button_hover_color front_button_text_color" href="<?= $footer->banner_button_link ?>"><?= (isset($footer->banner_button_text) && !empty($footer->banner_button_text)) ? $footer->banner_button_text : "Lorem Ipsum" ?></a>
                    </div>

                </div>

            </div>

        </div>

    </div><!--Cta Area-->



    <!--Footer Area-->

    <footer class="footer-area">

        <div class="container">

            <div class="row align-items-center">

                <div class="col-lg-3">

                    <div class="footer-widget">

                        <a href="#"><img src="<?= $logo ?>" alt="logo" <?= ($site_setting['custom_logo_size'] == 1) ? "style='height:".$site_setting['log_custom_height']."px;max-height:".$site_setting['log_custom_height']."px;min-height:".$site_setting['log_custom_height']."px;width:".$site_setting['log_custom_width']."px;max-width:".$site_setting['log_custom_width']."px;min-width:".$site_setting['log_custom_width']."px;'" : 'style="max-width: 228px !important; max-height: 100px !important;"' ?> alt="<?= __('front.logo') ?>"></a>

                        <p> <?= (isset($footer->copyright) && !empty($footer->copyright)) ? $footer->copyright : __('front.copyright_all_rights_reserved')." ".date('Y'); ?></p>

                    </div>

                </div>

                <div class="col-lg-9">

                    <div class="row">

                      <?php if(isset($footer_menu['menu_1']) && !empty($footer_menu['menu_1'])): ?>

                      <div class="col-lg-3">

                        <div class="footer-widget">

                          <h4><?= (isset($footer->footer_menu_title_a) && !empty($footer->footer_menu_title_a)) ? $footer->footer_menu_title_a : "Menu A Link"; ?></h4>

                          <ul>
                            <?php 
                            foreach($footer_menu['menu_1'] as $menu):
                            ?>
                            <li><a href="<?= $menu['url'] ?>" <?= ($menu['target_blank'] == 1) ? 'target="_blank"' : '';?>><?= $menu['title'];?></a></li>
                            <?php 
                            endforeach;
                          ?>

                          </ul>

                        </div>

                      </div>

                      <?php endif; ?> 

                      <?php if(isset($footer_menu['menu_2']) && !empty($footer_menu['menu_2'])): ?>

                      <div class="col-lg-3">

                        <div class="footer-widget">

                          <h4><?= (isset($footer->footer_menu_title_b) && !empty($footer->footer_menu_title_b)) ? $footer->footer_menu_title_b : "Menu B Link"; ?></h4>

                          <ul>
                            <?php 
                            foreach($footer_menu['menu_2'] as $menu):
                            ?>
                            <li><a href="<?= $menu['url'] ?>" <?= ($menu['target_blank'] == 1) ? 'target="_blank"' : '';?>><?= $menu['title'];?></a></li>
                            <?php 
                            endforeach;
                          ?>

                          </ul>

                        </div>

                      </div>

                      <?php endif; ?> 

                      <?php if(isset($footer_menu['menu_3']) && !empty($footer_menu['menu_3'])): ?>

                      <div class="col-lg-3">

                          <div class="footer-widget">

                          <h4><?= (isset($footer->footer_menu_title_c) && !empty($footer->footer_menu_title_c)) ? $footer->footer_menu_title_c : "Menu C Link"; ?></h4>

                          <ul>
                            <?php 
                            foreach($footer_menu['menu_3'] as $menu):
                            ?>
                            <li><a href="<?= $menu['url'] ?>" <?= ($menu['target_blank'] == 1) ? 'target="_blank"' : '';?>><?= $menu['title'];?></a></li>
                            <?php 
                            endforeach;
                          ?>

                          </ul>

                          </div>

                      </div>

                      <?php endif; ?> 

                      <?php if(isset($footer_menu['menu_4']) && !empty($footer_menu['menu_4'])): ?>

                      <div class="col-lg-3">

                        <div class="footer-widget">

                          <h4><?= (isset($footer->footer_menu_title_d) && !empty($footer->footer_menu_title_d)) ? $footer->footer_menu_title_d : "Menu D Link"; ?></h4>

                          <ul>
                            <?php 
                            foreach($footer_menu['menu_4'] as $menu):
                            ?>
                            <li><a href="<?= $menu['url'] ?>" <?= ($menu['target_blank'] == 1) ? 'target="_blank"' : '';?>><?= $menu['title'];?></a></li>
                            <?php 
                            endforeach;
                          ?>

                          </ul>

                        </div>

                      </div>

                      <?php endif; ?> 

                      



                      <?php if((!isset($footer_menu['menu_1']) || empty($footer_menu['menu_1'])) && (!isset($footer_menu['menu_2']) || empty($footer_menu['menu_2'])) && (!isset($footer_menu['menu_3']) || empty($footer_menu['menu_3'])) && (!isset($footer_menu['menu_4']) || empty($footer_menu['menu_4']))): ?>

                      <div class="col-lg-3">

                          <div class="footer-widget">

                              <h4>LOREM IPSUM TEXT</h4>

                              <ul>

                                  <li><a href="">Lorem Ipsum</a></li>

                                  <li><a href="">Lorem Ipsum</a></li>

                                  <li><a href="">Lorem Ipsum</a></li>

                                  <li><a href="">Lorem Ipsum</a></li>

                                  <li><a href="">Lorem Ipsum</a></li>

                              </ul>

                          </div>

                      </div>                        

                      

                      <div class="col-lg-3">

                          <div class="footer-widget">

                              <h4>LOREM IPSUM TEXT</h4>

                              <ul>

                                  <li><a href="">Lorem Ipsum</a></li>

                                  <li><a href="">Lorem Ipsum</a></li>

                                  <li><a href="">Lorem Ipsum</a></li>

                                  <li><a href="">Lorem Ipsum</a></li>

                                  <li><a href="">Lorem Ipsum</a></li>

                              </ul>

                          </div>

                      </div>                        

                          

                      <div class="col-lg-3">

                          <div class="footer-widget">

                              <h4>LOREM IPSUM TEXT</h4>

                              <ul>

                                  <li><a href="">Lorem Ipsum</a></li>

                                  <li><a href="">Lorem Ipsum</a></li>

                                  <li><a href="">Lorem Ipsum</a></li>

                                  <li><a href="">Lorem Ipsum</a></li>

                                  <li><a href="">Lorem Ipsum</a></li>

                              </ul>

                          </div>

                      </div>                        

                      

                      <div class="col-lg-3">

                          <div class="footer-widget">

                              <h4>LOREM IPSUM TEXT</h4>

                              <ul>

                                  <li><a href="">Lorem Ipsum</a></li>

                                  <li><a href="">Lorem Ipsum</a></li>

                                  <li><a href="">Lorem Ipsum</a></li>

                                  <li><a href="">Lorem Ipsum</a></li>

                                  <li><a href="">Lorem Ipsum</a></li>

                              </ul>

                          </div>

                      </div>

                      <?php endif; ?>

                    </div>

                </div>

            </div>

        </div>

    </footer><!--Footer Area-->

    

    <?php } ?>

    <!-- Owl Carousel Js-->

    <script src="<?= base_url('assets/login/multiple_pages') ?>/js/owl.carousel.min.js"></script>

    <script src="<?= base_url('assets/login/multiple_pages') ?>/js/jquery.mousewheel.min.js"></script>

    <!--Active Js-->

    <script src="<?= base_url('assets/login/multiple_pages') ?>/js/active.js"></script>

    

<!--       <script type="text/javascript">
      var userLang = navigator.language || navigator.userLanguage; 
      alert ("The language is: " + userLang);
      </script> -->



      <script type="text/javascript">

        $(function() {


          let topSliderAutoplay     = <?= (isset($theme_multiple_page_settings['top_slider_auto_play']) && $theme_multiple_page_settings['top_slider_auto_play'] == 1) ? "true" : "false" ?>;
          let topSliderAutoplayTime = <?= $theme_multiple_page_settings['top_slider_auto_timing'] ?? 10 ?>;
          let runnerAutoplay        = <?= (isset($theme_multiple_page_settings['home_runner_auto_play']) && $theme_multiple_page_settings['home_runner_auto_play'] == 1) ? "true" : "false" ?>;
          let runnerAutoplayTime    = <?= $theme_multiple_page_settings['home_runner_auto_timing'] ?? 10 ?>;
          let contentAutoplay       = <?= (isset($theme_multiple_page_settings['home_content_auto_play']) && $theme_multiple_page_settings['home_content_auto_play'] == 1) ? "true" : "false" ?>;
          let contentAutoplayTime   = <?= $theme_multiple_page_settings['home_content_auto_timing'] ?? 10 ?>;

          let homeSliderOwl = $(".home-top-slider").owlCarousel({
            items : 1,
            loop : true,
            nav : true,
            dots : false,
            autoplay : topSliderAutoplay,
            autoplayTimeout : (topSliderAutoplayTime*1000)
          });

          homeSliderOwl.on('changed.owl.carousel',function(property){
            var current = property.item.index;
            var src = $(property.target).find(".wlc-hero-content").eq(current);
            $('.wlc-hero-area').css('background-image','url('+src.data('background')+')');
          });


          $(".news-ticker-slider").owlCarousel({
            items : 1,
            loop : true,
            nav : true,
            dots : false,
            navText:["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
            autoplay : runnerAutoplay,
            autoplayTimeout : (runnerAutoplayTime*1000)
          });


          var featured_owl =  $(".featured-slider")
          featured_owl.owlCarousel({
              items : 1,
              loop : true,
              autoHeight: true,
              autoplay : contentAutoplay,
              autoplayTimeout : (contentAutoplayTime*1000)
          });

          // featured_owl.on('mousewheel', '.owl-stage', function (e) {
          //     if (e.deltaY>0) {
          //         if(!$('.featured-slider .owl-dots .owl-dot:first').hasClass('active')) {
          //             featured_owl.trigger('prev.owl');
          //             e.preventDefault();
          //         }
          //     } else {
          //         if(!$('.featured-slider .owl-dots .owl-dot:last').hasClass('active')) {
          //             featured_owl.trigger('next.owl');
          //             e.preventDefault();
          //         }
          //     }
          // });
          
        });





      </script>
  </body>

</html>