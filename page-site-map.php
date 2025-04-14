  <!-- ---header読み込み ----------------------------------------------->
  <?php
    get_template_part('template-parts/header'); // header.php をインクルード
  ?>
  <!-- ---------------------------------------------------------------------->
<main>
  

<!-- title-heading -->
<?php
    get_template_part('template-parts/title-heading'); // title-heading をインクルード
?>



<section id="site-map" class="pink-bk">

  <?php
    get_template_part('template-parts/title-icon', null, ['name' => 'site-map']);// title-icon をインクルード
  ?>

  <div class="site-map__inner">
      <nav class="site-map-list fade-in">
        <ul class="site-map-list__ul">
          <!-- 左側のカラム（PC時） -->
          <div class="site-map-list__column">
            <li class="site-map-list__ul--li"><a href="<?php echo home_url('/'); ?>">TOP<i class="fa-solid fa-angle-right"></i></a></li>
            <li class="site-map-list__ul--li"><a href="<?php echo home_url('about'); ?>">わたしたちのこと<i class="fa-solid fa-angle-right"></i></a></li>
            <li class="site-map-list__ul--li"><a href="<?php echo get_post_type_archive_link('introduction'); ?>">各園のご紹介<i class="fa-solid fa-angle-right"></i></a></li>
            <li class="site-map-list__ul--li"><a href="<?php echo get_post_type_archive_link('letter'); ?>">こもれびだより<i class="fa-solid fa-angle-right"></i></a></li>
            <li class="site-map-list__ul--li"><a href="<?php echo get_post_type_archive_link('info'); ?>">お知らせ<i class="fa-solid fa-angle-right"></i></a></li>
          </div>

          <!-- 右側のカラム（PC時） -->
          <div class="site-map-list__column">
            <li class="site-map-list__ul--li"><a href="<?php echo home_url('/recruit-form/'); ?>">採用情報<i class="fa-solid fa-angle-right"></i></a></li>
            <li class="site-map-list__ul--li"><a href="<?php echo home_url('/contact-form/'); ?>">お問い合わせ<i class="fa-solid fa-angle-right"></i></a></li>
            <li class="site-map-list__ul--li"><a href="<?php echo home_url('/site-map/'); ?>">サイトマップ<i class="fa-solid fa-angle-right"></i></a></li>
            <li class="site-map-list__ul--li"><a href="<?php echo home_url('/privacy-policy/'); ?>">プライバシーポリシー<i class="fa-solid fa-angle-right"></i></a></li>
          </div>
        </ul>  
      </nav>
  </div>

</section>







  <!-- ---footer読み込み ----------------------------------------------->
  <?php
    get_template_part('template-parts/footer'); // footer.php をインクルード
  ?>
  <!-- ---------------------------------------------------------------------->
  </body>   