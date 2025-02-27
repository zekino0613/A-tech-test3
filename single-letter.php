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
  
  <div class="container">
    <!-- 記事タイトル -->
    <h1 class="letter-title"><?php the_title(); ?>からのおたより</h1>

    <!-- 投稿日時 -->
    <time class="letter-card__post-date" datetime="<?php echo get_the_date('Y-m-d'); ?>">
      <?php
      $date = get_the_date('Y年n月j日'); // 例: 2024年4月1日
      $date_hiragana = str_replace(['年', '月', '日'], ['ねん', 'がつ', 'にち'], $date);
      echo esc_html($date_hiragana);
      ?>
    </time>

    <!-- サムネイルタイトル -->
    <?php if( get_field('article_title') ): ?>
      <h2 class="letter_title"><?php the_field('article_title'); ?></h2>
    <?php endif; ?>

    <!-- サムネイル画像 -->
    <?php
      $thumbnail = get_field('article_image');
      if ($thumbnail):
      ?>
      <img src="<?php echo esc_url(wp_get_attachment_image_url($thumbnail, 'full')); ?>" alt="<?php the_title(); ?>">
    <?php endif; ?>

    <!-- 小見出しと段落内容 -->
    <div class="news-content">
      <?php
      // リピートフィールドを取得
      $repeater_data = SCF::get('subheading_content'); // リピートフィールドのグループ名
      if (!empty($repeater_data)) {
          foreach ($repeater_data as $item) {
              // 小見出しと段落内容を取得
              $subheading = isset($item['subheading']) ? esc_html($item['subheading']) : '小見出し未設定';
              $paragraph_content = isset($item['paragraph_content']) ? nl2br(esc_html($item['paragraph_content'])) : '段落内容未設定';

              // 出力
              echo '<div class="news-section ">';
              echo '<h2 class="news-section__subheading fade-in">' . $subheading . '</h2>';
              echo '<p class="news-section__paragraph fade-in">' . $paragraph_content . '</p>';
              echo '</div>';
          }
      } else {
          echo '<p>コンテンツが設定されていません。</p>';
      }
      ?>
    </div>




</main>





  <!-- ---footer読み込み ----------------------------------------------->
  <?php
    get_template_part('template-parts/footer'); // footer.php をインクルード
  ?>
  <!-- ---------------------------------------------------------------------->
  </body>   