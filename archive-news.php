<?php
get_template_part('template-parts/header'); // ヘッダー読み込み
?>

<main>
  <?php get_template_part('template-parts/title-heading'); // タイトル見出し ?>

  <section id="archive-info">
    <div class="archive-info__inner">

      <?php
				$paged = max(1, get_query_var('paged'));
				$year  = get_query_var('year');
				$archive_year = get_query_var('year');
      $args = [
        'post_type'      => 'news',
        'posts_per_page' => 5,
        'paged'          => $paged,
        'orderby'        => 'date',
        'order'          => 'DESC',
      ];

			if ($year) {
        $args['year'] = (int)$year;
      }

      $news_query = new WP_Query($args);
      ?>

      <div class="info-list">
        <?php if ($news_query->have_posts()) : ?>
          <?php while ($news_query->have_posts()) : $news_query->the_post(); ?>
            <a href="<?php the_permalink(); ?>" class="info-card fade-in">
              <div class="info-card__inner">
                <div class="info-card__inner--flex">
                  <!-- ここにサムネなど必要があれば追加 -->
                </div>
                <div class="textarea">
                  <?php
                  $date = new DateTime(get_the_date('Y-m-d'));
                  echo '<time class="news-date">' . $date->format('Y/m/d D.') . '</time>';
                  ?>
                  <h1 class="textarea__info-title"><?php the_title(); ?></h1>
                  <?php
                  $content = get_field('textarea');
                  $trimmed_content = mb_strimwidth($content, 0, 50, '…', 'UTF-8');
                  echo '<p>' . esc_html($trimmed_content) . '</p>';
                  ?>
                </div>
              </div>
            </a>
          <?php endwhile; ?>
        <?php else : ?>
          <p>投稿が見つかりませんでした。</p>
        <?php endif; ?>
        <?php wp_reset_postdata(); ?>
      </div>

      <?php
      $base_url = get_post_type_archive_link('news');
      $base_url = trailingslashit($base_url);

      if ($year) {
        $base_url = home_url("/news/$year/");
      }

      echo '<div class="pagination-area">';
      get_template_part('template-parts/pagination', null, [
        'query'     => $news_query,
        'base_url'  => $base_url,
        'post_type' => 'news',
      ]);
      echo '</div>'; 
      ?>

    </div>

    <?php get_template_part('template-parts/monthly'); ?>
  </section>
</main>

<?php
get_template_part('template-parts/footer'); // フッター読み込み
?>
</body>
