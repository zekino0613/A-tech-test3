  <!-- ---header読み込み ----------------------------------------------->
  <?php
    get_template_part('template-parts/header'); // header.php をインクルード
  ?>
  <!-- ---------------------------------------------------------------------->
<main>
  
  <div class="tab">
    <!-- タブを構成するブロック -->
    <div class="tab-list">
      <button class="tab-list__item is-btn-active" data-tab="category">園の種類 から探す</button>
      <button class="tab-list__item" data-tab="prefecture">都道府県 から探す</button>
    </div>

    <div class="tab-contents-wrap">    
      <!-- 園の種類カテゴリー -->
      <div class="tab-contents is-contents-active" id="category-tab">
        <ul>
          <?php
          $category_terms = get_terms([
              'taxonomy'   => 'category',
              'hide_empty' => true,
              'parent'     => 0,
          ]);

          foreach ($category_terms as $term) {
            echo '<li><a href="#" class="category-filter" data-filter="' . esc_attr($term->slug) . '">' . esc_html($term->name) . '</a></li>';  
          }
          ?>
        </ul>  
      </div>


      <!-- 都道府県カテゴリー -->
      <div class="tab-contents" id="prefecture-tab" style="display: none;">
        <ul>
          <?php
            $prefecture_terms = get_terms([
                'taxonomy'   => 'prefecture', // カスタムタクソノミー
                'hide_empty' => true,
                'parent'     => 0, 
            ]);

            // 都道府県を地理順にソートする関数
            $sorted_prefectures = sort_prefectures_by_region($prefecture_terms);

            foreach ($sorted_prefectures as $term) {
              $slug = sanitize_title($term->name); // 都道府県名をスラッグに変換
              echo '<li><a href="#" class="prefecture-filter" data-filter="' . esc_attr($slug) . '">' . esc_html($term->name) . '</a></li>';
            }
          ?>
        </ul>
      </div>
    </div>    
  </div>



  <!-- 投稿カード -->
<div class="introduction-list">
<?php if (have_posts()) : ?>
  <?php while (have_posts()) : the_post(); ?>
        <a href="<?php the_permalink(); ?>" 
          class="introduction-thumbnail <?php echo esc_attr(sanitize_title($prefecture)); ?> <?php echo $category_slug; ?>">
          <?php
            $thumbnail = get_field('thumbnail_image');
            if ($thumbnail):
            ?>
            <img src="<?php echo esc_url(wp_get_attachment_image_url($thumbnail, 'full')); ?>" alt="<?php the_title(); ?>">
          <?php endif; ?>
            <p class="nursery-prefecture"><?php echo esc_html($prefecture); ?></p>
            <span class="news-header__flex--category"><?php echo esc_html($categories[0]->name ?? '未分類'); ?></span>
            <h2 class="nursery-name"><?php the_title(); ?></h2>
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


  
</main>





  <!-- ---footer読み込み ----------------------------------------------->
  <?php
    get_template_part('template-parts/footer'); // footer.php をインクルード
  ?>
  <!-- ---------------------------------------------------------------------->
  </body>   