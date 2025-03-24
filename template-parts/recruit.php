<section id="recruit">
    <div class="recruit__inner">
      <!-- title-icon -->
      <?php
        get_template_part('template-parts/title-icon', null, ['name' => 'recruit']);// title-icon をインクルード
      ?>

      <p class="recruit__inner--text fade-in">
        桜のこもれびキッズランドで<br class="brsp">働いてみませんか？
      </p><!-- / -->

      <div class="recruit__inner--bottom-flex fade-in">
        <a href="<?php echo home_url('/recruit-form/'); ?>" class="btn bottom-recruit fade-in">
          <p class="btn__text ">採用情報</p>
          <i class="fa-solid fa-angle-right"></i>
        </a>
        <a href="<?php echo home_url('/contact-form/'); ?>" class="btn bottom-contact fade-in">
          <p class="btn__text">エントリー</p>
          <i class="fa-solid fa-angle-right"></i>
        </a>
      </div><!-- / -->
    </div><!-- / -->
  </section>
