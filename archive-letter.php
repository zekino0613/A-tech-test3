  <!-- ---header読み込み ----------------------------------------------->
  <?php
    get_template_part('template-parts/header'); // header.php をインクルード
  ?>
  <!-- ---------------------------------------------------------------------->


<section id="archive-letter">


<div class="letter-list">
<?php if (have_posts()) : ?>
  <?php while (have_posts()) : the_post(); ?>
      <?php
      $related_nursery_id = get_field('related_nursery'); // ACFリレーションで関連園を取得
      $nursery_name = $related_nursery_id ? get_the_title($related_nursery_id) : '不明な園';
      $prefecture = get_field('nursery_address', $related_nursery_id);
      ?>
              
        <a href="<?php the_permalink(); ?>" class="letter-card">
          <!-- サムネイル画像 -->
          <?php
            $thumbnail = get_field('article_image');
            if ($thumbnail):
              ?>
            <img class="letter-card__image"src="<?php echo esc_url(wp_get_attachment_image_url($thumbnail, 'full')); ?>" alt="<?php the_title(); ?>">
          <?php endif; ?>
          <div class="letter-card__textarea">
            <!-- 記事タイトル -->
            <h2 class="letter-card__textarea--title"><?php the_title(); ?>からのおたより</h2>
            <!-- サムネイルタイトル -->
            <?php if( get_field('article_title') ): ?>
              <h3 class="letter-card__textarea--letter-title"><?php the_field('article_title'); ?></h3>
            <?php endif; ?>
            <!-- 投稿日時 -->
          </div><!-- / -->   
          
          <time class="letter-card__post-date" datetime="<?php echo get_the_date('Y-m-d'); ?>">
            <?php
            $date = get_the_date('Y年n月j日'); // 例: 2024年4月1日
            $date_hiragana = str_replace(['年', '月', '日'], ['ねん', 'がつ', 'にち'], $date);
            echo esc_html($date_hiragana);
            ?>
          </time>
          <!-- <p>園名: <?php echo esc_html($nursery_name); ?></p>
          <p>都道府県: <?php echo esc_html($prefecture); ?></p>
          <p>投稿日: <?php echo get_the_date(); ?></p> -->
        </a>
        <?php
      endwhile;?>
  

          <!-- ✅ ページネーション -->
    <div class="pagination fade-in">
        <?php echo paginate_links(); ?>
    </div>

      
            
      <?php else : ?>
        <p>投稿が見つかりませんでした。</p>
    <?php endif; ?>
</div>

<?php wp_reset_postdata(); ?>

</section>


</main>





  <!-- ---footer読み込み ----------------------------------------------->
  <?php
     get_template_part('template-parts/footer'); // footer.php をインクルード
  ?>
  <!-- ---------------------------------------------------------------------->
  </body>   