<section id="contact">
    <div class="contact__inner">
      <!-- title-icon -->
      <?php
        get_template_part('template-parts/title-icon', null, ['name' => 'contact']);// title-icon をインクルード
      ?>

      <p class="contact__inner--text">
        入園のお申込み、<br class="brsp">見学のご相談はこちらから！      
      </p>

      <a href="<?php echo home_url('/contact-form/'); ?>" class="btn">
        <p class="btn__text">お問い合わせ</p>
        <i class="fa-solid fa-angle-right"></i>
      </a>
    </div><!-- / -->
  </section>
