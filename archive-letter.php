<?php get_template_part('template-parts/header'); ?>

<main>
  <?php get_template_part('template-parts/title-heading'); ?>

  <section id="archive-letter">
    <div class="archive-letter__inner">

      <?php
      $paged = max(1, get_query_var('paged'));
      $selected_prefecture = isset($_GET['prefecture']) ? urldecode(sanitize_text_field($_GET['prefecture'])) : '';
      $selected_nursery    = isset($_GET['nursery']) ? urldecode(sanitize_text_field($_GET['nursery'])) : '';
      $selected_month      = isset($_GET['m']) ? sanitize_text_field($_GET['m']) : '';
      $year                = isset($_GET['year']) ? (int)$_GET['year'] : 0; // ← 年の取得

      $args = [
        'post_type'      => 'letter',
        'posts_per_page' => 5,
        'paged' => get_query_var('paged') ?: 1,
      ];

      if (!empty($selected_prefecture)) {
        $args['tax_query'][] = [
          'taxonomy' => 'prefecture',
          'field'    => 'slug',
          'terms'    => sanitize_title($selected_prefecture),
        ];
      }

      if (!empty($selected_nursery)) {
        $args['s'] = $selected_nursery;
      }

      if ($year) {
        $args['year'] = $year;
      }

      $letter_query = new WP_Query($args);
      ?>

      <div class="letter-container">
        <div class="letter-list">
          <?php if ($letter_query->have_posts()) : ?>
            <?php while ($letter_query->have_posts()) : $letter_query->the_post(); ?>
              <a href="<?php the_permalink(); ?>" class="letter-card fade-in">
                <?php
                $thumbnail = get_field('article_image');
                if ($thumbnail):
                ?>
                  <img class="letter-card__image" src="<?php echo esc_url(wp_get_attachment_image_url($thumbnail, 'full')); ?>" alt="<?php the_title(); ?>">
                <?php endif; ?>
                <div class="letter-card__textarea">
                  <h2 class="letter-card__textarea--title"><?php the_title(); ?>からのおたより</h2>
                  <?php if(get_field('article_title')): ?>
                    <h3 class="letter-card__textarea--letter-title"><?php the_field('article_title'); ?></h3>
                  <?php endif; ?>
                </div>
                <time class="letter-card__post-date" datetime="<?php echo get_the_date('Y-m-d'); ?>">
                  <?php
                  $date = get_the_date('Y年n月j日');
                  $date_hiragana = str_replace(['年', '月', '日'], ['ねん', 'がつ', 'にち'], $date);
                  echo esc_html($date_hiragana);
                  ?>
                </time>
              </a>
            <?php endwhile; ?>
          <?php else : ?>
            <p>投稿が見つかりませんでした。</p>
          <?php endif; ?>
          <?php wp_reset_postdata(); ?>
        </div>
      </div>

      <?php
      $base_url = get_post_type_archive_link('letter');
      $base_url = trailingslashit($base_url);

      $params = [];
      if (!empty($selected_prefecture)) $params['prefecture'] = $selected_prefecture;
      if (!empty($selected_nursery)) $params['nursery'] = $selected_nursery;
      if (!empty($year)) $params['year'] = $year;
      if (!empty($params)) $base_url = add_query_arg($params, $base_url);

      echo '<div class="pagination-area">';
      get_template_part('template-parts/pagination', null, [
        'query'    => $letter_query,
        'base_url' => $base_url,
        'post_type'  => 'letter',
      ]);
      echo '</div>';
      ?>

      <!-- ✅ 年フィルター サイドバー -->
			<aside class="archive-sidebar fade-in">
				<h3>アーカイブ</h3>
				<ul class="archive-list">
				<li><a href="<?php echo esc_url(get_post_type_archive_link('letter')); ?>">すべて</a></li>
				<?php
				global $wpdb;
				$years = $wpdb->get_col("
					SELECT DISTINCT YEAR(ADDDATE(post_date, INTERVAL -3 MONTH)) AS fiscal_year
					FROM $wpdb->posts
					WHERE post_type = 'letter' AND post_status = 'publish'
					ORDER BY fiscal_year DESC
				");
				foreach ($years as $year) :
					$url = home_url("/letter/{$year}/");
				?>
					<li><a href="<?php echo esc_url($url); ?>"><?php echo esc_html($year); ?>年度</a></li>
				<?php endforeach; ?>
			</ul>
		</aside>




    </div>
  </section>
</main>

<?php get_template_part('template-parts/footer'); ?>
