<footer id="footer"> 
  <div class="footer__inner fade-in">
    <a class="f-logo-img" href="<?php echo home_url('/'); ?>#">
      <img 
        src="<?php echo get_template_directory_uri(); ?>/assets/images/kidsland_image/design-parts/sakura-logo.webp"
        loading="lazy"
        alt="フッダーロゴ">
    </a>

    <nav class="f-nav">
      <ul class= "f-nav__ul">
        <li class="f-nav__ul--li">
        <a href="<?php echo home_url('/about/'); ?>">
            私たちのこと
          </a>
        </li>
        <li class="f-nav__ul--li">
          <a href="<?php echo get_post_type_archive_link('introduction'); ?>">
            各園のご紹介
          </a>
        </li>
        <li class="f-nav__ul--li">
          <a href="<?php echo get_post_type_archive_link('letter'); ?>">
            こもれびだより
          </a>
        </li>
        <li class="f-nav__ul--li">
          <a href="<?php echo home_url('/recruit-form/'); ?>">
            採用情報
          </a>
        </li>
        <li class="f-nav__ul--li">
          <a href="<?php echo get_post_type_archive_link('info'); ?>">
            お知らせ
          </a>
        </li>
        <li class="f-nav__ul--li">
          <a href="<?php echo home_url('/contact-form/'); ?>">
          お問い合わせ
        </a>
        </li>
        <li class="f-nav__ul--li">
          <a href="<?php echo home_url('/site-map/'); ?>">
            サイトマップ
          </a>
        </li>
        <li class="f-nav__ul--li">
          <a href="<?php echo home_url('/privacy-policy/'); ?>">
            プライバシーポリシー
          </a>
        </li>
      </ul>  
    </nav>

    <p class="f-text">
      &copy;桜のこもれびキッズランド All Rights Reserved.
    </p>
  </div><!-- /.footer__inner -->
</footer> 


  <?php wp_footer(); ?> 
  </body>   
</html> 
