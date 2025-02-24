  <!-- ---footer読み込み ----------------------------------------------->
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
    <?php
    
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

    $introduction_query = new WP_Query([
        'post_type'      => 'introduction',
        'posts_per_page' => 9,
        'orderby'        => 'date',
        'category_name' => $category_name, // URLパラメーターから取得したカテゴリー
        'order'          => 'DESC',
        'paged'          => $paged,              // ページネーション対応
    ]);

    if ($introduction_query->have_posts()) :
        while ($introduction_query->have_posts()) : $introduction_query->the_post();
            $address = get_field('nursery_address');
            $prefecture = get_prefecture_from_address($address);
            $categories = get_the_category();
            $category_slug = !empty($categories) ? esc_attr($categories[0]->slug) : '';
    ?>
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
      endwhile;
  
       // ページネーション 
        echo '<div class="pagination fade-in">';
        echo paginate_links([
           'total'   => $introduction_query->max_num_pages, // 修正
            'current' => $paged,
            'prev_text' => '<i class="fa-solid fa-chevron-left"></i>',
            'next_text' => '<i class="fa-solid fa-chevron-right"></i>',
            'format'    => 'page/%#%/', // ✅ ページ番号のフォーマットを指定
            'base'      => get_post_type_archive_link('introduction') . '%_%', // ✅ ベースURLを設定
        ]);
        echo '</div>';
      
        
    endif;
    wp_reset_postdata();
    ?>

</div>


  
</main>





  <!-- ---footer読み込み ----------------------------------------------->
  <?php
    get_template_part('template-parts/footer'); // footer.php をインクルード
  ?>
  <!-- ---------------------------------------------------------------------->
  </body>   