<?php
get_template_part('template-parts/header'); // header.php をインクルード
?>

<main>
<!-- title-heading -->
<?php
    get_template_part('template-parts/title-heading'); // title-heading をインクルード
?>

  <section id="error-404">
    <p class="p1">申し訳ございません。<br>
      お探しのページは見つかりませんでした。<br>
      以下の可能性がございます。<br>
    </p>
    <br>
    <p class="p2">
      ・URLが変更された<br>
      ・ページが存在しない
    </p>
    <br>
    <p class="p3">恐れ入りますが、以下のリンクからお探しのページにお入りください。</p> 
  </section><!-- /error-404 -->



<!-- page-site-map -->
  <section id="site-map" class="pink-bk">
    <?php
      get_template_part('template-parts/title-icon', null, ['name' => 'site-map']);// title-icon をインクルード
    ?>

    <div class="site-map__inner">
      <nav class="site-map-list">
        <ul class="site-map-list__ul">
          <!-- 左側のカラム（PC時） -->
          <div class="site-map-list__column">
            <li class="site-map-list__ul--li"><a href="<?php echo home_url('/'); ?>">TOP<i class="fa-solid fa-angle-right"></i></a></li>
            <li class="site-map-list__ul--li"><a href="<?php echo get_post_type_archive_link('about'); ?>">わたしたちのこと<i class="fa-solid fa-angle-right"></i></a></li>
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
</main>



<?php
get_template_part('template-parts/footer'); // footer.php をインクルード
?>
</body>