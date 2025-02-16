<footer id="footer"> 
  <div class="footer-contents"> 
      <div class="footer-contents__flex fade-in">
        <a href="<?php echo get_post_type_archive_link('salons'); ?>#salons" class="footer-contents__flex--salons fade-in">
          <div class="select-btn">
            <p class="select-btn__main">SALONS</p>
            <span class="select-btn__sub">店舗一覧</span>
          </div>  
        </a><!-- /footer__grid--salons -->

        <a href="https://www.instagram.com/valentine_____rose/" class="footer-contents__flex--sns fade-in" target="_blank" rel="noopener noreferrer">
          <div class="select-btn">
            <p class="select-btn__main">SNS</p>
            <span class="select-btn__sub">インスタグラム</span>
          </div>  
        </a><!-- /footer__grid--sns -->
      </div><!-- /.footer-contents -->

    <div class="footer-contents__end fade-in">
      <a class="a-logo" href="<?php echo home_url('/'); ?>#">
        <div class="h-logo fade-in">
          <img loading="lazy" class="h-logo__img" src="<?php echo get_template_directory_uri(); ?>/assets/images/A-TECH-TEST-image/test-image/img/logo.webp" alt="フッターロゴ">
          <h1 class="h-logo__text">VALENTINE <br>ROSE</h1>
        </div>
      </a>
      <!-- nav PC用 -->
      <ul class="f-nav-pc fade-in">
        <li><a href="#">TOP</a></li>
        <li><a href="<?php echo home_url('/concept/'); ?>#concept">Concept</a></li>
        <li><a href="<?php echo home_url('/price-menu/'); ?>#price-menu">Price</a></li>
        <li><a href="<?php echo get_post_type_archive_link('news'); ?>">News</a></li>
        <li><a href="<?php echo home_url('/reserve/'); ?>#Reserve">Reserve</a></li>
      </ul>
      <ul class="f-nav-pc fade-in">
        <li><a href="<?php echo home_url('/reserve/'); ?>#reserve">Privacy Policy</a></li>
        <li><a href="<?php echo get_post_type_archive_link('salons'); ?>">Site Map</a></li>
      </ul>

      <!-- nav SP用 -->
      <ul class="f-nav-sp first ">
        <li><a href="#">TOP</a></li>
        <li><a href="<?php echo home_url('/concept/'); ?>#concept">Concept</a></li>
        <li><a href="<?php echo home_url('/price-menu/'); ?>#prise-menu">Price</a></li>
      </ul>

      <ul class="f-nav-sp second ">
        <li><a href="<?php echo get_post_type_archive_link('news'); ?>">News</a></li>
        <li><a href="<?php echo home_url('/reserve/'); ?>#Reserve">Reserve</a></li>
      </ul>

      <ul class="f-nav-sp third ">
        <li><a href="<?php echo home_url('/reserve/'); ?>#Privacy-Policy">Privacy Policy</a></li>
        <li><a href="<?php echo get_post_type_archive_link('salons'); ?>#Site-Map">Site Map</a></li>
      </ul>
    </div><!-- /.footer-contents__end -->


  </div><!-- /.footer-contents -->  

  <p class="last-text">
    &copy; 2024 Valentine Rose., Ltd. All rights Reserved.
  </p> 

</footer> 


  <?php wp_footer(); ?> 
  </body>   
</html> 
