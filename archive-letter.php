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



<section id="archive-letter">

<form method="get" action="<?php echo esc_url(home_url('/letter/')); ?>" class="search-form">
    <label for="search-nursery">園から探す</label>
    <select name="s" id="search-nursery">
        <option value="">選択してください</option>
        <?php
        $letters = get_posts([
            'post_type'      => 'introduction',
            'posts_per_page' => -1,
            'orderby'        => 'title',
            'order'          => 'ASC',
        ]);

        foreach ($letters as $letter) {
            echo '<option value="' . esc_attr($letter->post_title) . '">' . esc_html($letter->post_title) . '</option>';
        }
        ?>
    </select>

    <label for="search-prefecture">都道府県から探す</label>
    <select name="prefecture" id="search-prefecture">
        <option value="">都道府県から探す</option>
        <?php
        $prefecture_terms = get_terms([
            'taxonomy'   => 'prefecture',
            'hide_empty' => true,
        ]);

        foreach ($prefecture_terms as $term) {
            echo '<option value="' . esc_attr($term->name) . '">' . esc_html($term->name) . '</option>';
        }
        ?>
    </select>

    <button type="submit">検索</button>
</form>


<?php
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

// ✅ GETパラメータ取得
$selected_prefecture = isset($_GET['prefecture']) ? urldecode(sanitize_text_field($_GET['prefecture'])) : '';
$args = [
    'post_type'      => 'letter',
    'posts_per_page' => 9,
    'paged'          => $paged,
];

// ✅ `prefecture` でフィルタリング
if (!empty($selected_prefecture)) {
  $args['tax_query'] = [
    [
        'taxonomy' => 'prefecture',
        'field'    => 'slug',
        'terms'    => sanitize_title($selected_prefecture),
    ]
  ];
}

$letter_query = new WP_Query($args);
?>



<div class="letter-container">
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
            <h2 class="letter-card__textarea--title"><?php the_title(); ?>園からのおたより</h2>
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
   
      </div>
    </div>

          <!-- ✅ ページネーション -->
    <div class="pagination fade-in">
        <?php echo paginate_links(); ?>
    </div>

      
            
        <?php else : ?>
          <p>投稿が見つかりませんでした。</p>
      <?php endif; ?>

<?php wp_reset_postdata(); ?>



<aside class="archive-sidebar">
    <h3>アーカイブ</h3>
    <ul>
        <?php
        global $wpdb;
        $archives = $wpdb->get_results("
            SELECT DISTINCT YEAR(post_date) as year, MONTH(post_date) as month, COUNT(ID) as post_count
            FROM $wpdb->posts
            WHERE post_type = 'letter' AND post_status = 'publish'
            GROUP BY YEAR(post_date), MONTH(post_date)
            ORDER BY post_date DESC
        ");

        foreach ($archives as $archive) {
            $year  = esc_html($archive->year);
            $month = esc_html($archive->month);
            $count = esc_html($archive->post_count);
            echo '<li><a href="' . get_month_link($year, $month) . '">' . $year . '年' . $month . '月 (' . $count . ')</a></li>';
        }
        ?>
    </ul>
</aside>

</section>


</main>





  <!-- ---footer読み込み ----------------------------------------------->
  <?php
     get_template_part('template-parts/footer'); // footer.php をインクルード
  ?>
  <!-- ---------------------------------------------------------------------->
  </body>   