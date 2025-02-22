  <!-- ---footer読み込み ----------------------------------------------->
  <?php
    get_template_part('template-parts/header'); // header.php をインクルード
  ?>
  <!-- ---------------------------------------------------------------------->

<main>
  <section id="mainvisual">
    <div class="mainvisual__image">
      <div class="mainvisual__image--item">
        <h2 class="mainvisual-text fadein fadein-bottom">一人ひとりの輝きが、 <br class="brsp">未来を彩る</h2>
      </div>



      <?php
        // WP_Query を使ってカスタム投稿タイプ 'info' の最新1件の投稿を取得
        $info_query = new WP_Query(array(
            'post_type'      => 'info', // 取得する投稿タイプを 'info' に指定
            'posts_per_page' => 1,      // 取得する投稿の数を 1 に指定
            'orderby'        => 'date', // 日付順に並べる
            'order'          => 'DESC'  // 降順で並び替え
        ));

        // 投稿が存在するか確認
        if ($info_query->have_posts()) :
            while ($info_query->have_posts()) : $info_query->the_post();
      ?>
        
        <a href="<?php echo esc_url( rawurldecode(get_permalink()) ); ?>" class="info-post">
          <h2 class="info-post__title">お知らせ</h2>
          <h3 class="info-post__single-title">
              <?php echo esc_html(get_the_title()); ?> <!-- ✅ 投稿のタイトル -->
          </h3>
          <time class="info-post__single-date" datetime="<?php echo get_the_date('Y-m-d'); ?>">
              <?php
              $date = get_the_date('Y年n月j日'); // 例: 2024年4月1日
              $date_hiragana = str_replace(['年', '月', '日'], ['ねん', 'がつ', 'にち'], $date);
              echo esc_html($date_hiragana);
              ?>
          </time>
        </a>          
      <?php
          endwhile;
          wp_reset_postdata();
      else :
          echo '<p>No info found.</p>';
      endif;
      ?>
  </section>

  <section id="welcome">
    <div class="welcome__inner">      
      <!-- title-icon -->
      <?php
        get_template_part('template-parts/title-icon', null, ['name' => 'welcome']);// title-icon をインクルード
      ?>

      <p class="welcome__inner--text t-top">
      「こもれび」とは <br>風に揺れる木の葉によって生み出される<br class="brsp">光と影の揺らめきを表すことばです。<br>
        それはその瞬間に一度だけ存在します。
      </p>
      
      <p class="welcome__inner--text t-bottom">
        桜のこもれびキッズランドは、<br> 子どもたち一人ひとりが<br class="brsp">独自の輝きを放つように、<br>
        大切な個性を伸ばす場所です。<br>
        温かく包み込むような雰囲気の中で、<br class="brsp">安心して成長できる環境を提供し、<br>
        笑顔あふれる毎日をお約束します。
      </p>
    </div><!-- /.welcome__inner -->
  </section>

  <!--section/ recruit -->
  <?php
      get_template_part('template-parts/recruit'); // recruit をインクルード
  ?>


  <!-- ---footer読み込み ----------------------------------------------->
  <?php
    get_template_part('template-parts/footer'); // footer.php をインクルード
  ?>
  <!-- ---------------------------------------------------------------------->
</main>


</body>
