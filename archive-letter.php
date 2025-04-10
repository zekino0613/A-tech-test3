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
		<div class="archive-letter__inner">
			<form method="get" action="<?php echo esc_url(home_url('/letter/')); ?>" class="search-form fade-in">
				<h2><i class="fa fa-search search-icon"></i>園をさがす</h2>
				<label for="search-prefecture"></label>
				<select name="prefecture" id="search-prefecture">
					<option value="">都道府県をえらぶ</option>
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
				
				<label for="search-nursery"></label>
					<select name="nursery" id="search-nursery">
						<option value="">園をえらぶ</option>
						<?php
						// letter 投稿のタイトル一覧を取得
						$all_letters = get_posts([
							'post_type'      => 'letter',
							'posts_per_page' => -1,
							'orderby'        => 'title',
							'order'          => 'ASC',
							'post_status'    => 'publish',
						]);

						$used_titles = [];

						foreach ($all_letters as $letter) {
							$title = get_the_title($letter->ID);
							// 同じタイトルがあれば除外（重複防止）
							if (in_array($title, $used_titles, true)) {
								continue;
							}
							$selected = ($selected_nursery === $title) ? 'selected' : '';
							echo '<option value="' . esc_attr($title) . '" ' . $selected . '>' . esc_html($title) . '</option>';
							$used_titles[] = $title;
						}
						?>
					</select>
				<button type="submit"><i class="fa fa-search search-icon"></i></button>
			</form>


			<?php
				// $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
				$paged = max(1, get_query_var('paged'));
				$selected_prefecture = isset($_GET['prefecture']) ? urldecode(sanitize_text_field($_GET['prefecture'])) : '';
				$selected_nursery    = isset($_GET['nursery']) ? urldecode(sanitize_text_field($_GET['nursery'])) : '';
				$selected_month      = isset($_GET['m']) ? sanitize_text_field($_GET['m']) : '';
				
				// 月別アーカイブURL (例: /2024/02/) に対応
				$archive_year = get_query_var('year');
				$archive_month = get_query_var('monthnum');
				$is_monthly_archive = !empty($archive_year) && !empty($archive_month);
				
				
				
				$args = [
					'post_type'      => 'letter',
					'posts_per_page' => 9,
					'paged'          => $paged,
				];
				
				// ▼都道府県絞り込み
				if (!empty($selected_prefecture)) {
					$args['tax_query'][] = [
						'taxonomy' => 'prefecture',
						'field'    => 'slug',
						'terms'    => sanitize_title($selected_prefecture),
					];
				}
				// ▼月（m=202404）を date_query に変換
				if (!empty($selected_month) && preg_match('/^\d{6}$/', $selected_month)) {
					$year  = (int) substr($selected_month, 0, 4);
					$month = (int) substr($selected_month, 4, 2);
				
					$args['date_query'][] = [
						'year'  => $year,
						'month' => $month,
					];
				}
				
				if ($is_monthly_archive) {
					$args['date_query'][] = [
						'year'  => (int) $archive_year,
						'month' => (int) $archive_month,
					];
				}
				
				// ▼園をえらぶ（タイトル検索）
				if (!empty($selected_nursery)) {
					$args['s'] = $selected_nursery;
				}
				$letter_query = new WP_Query($args);
				
			?>
			
			


			<div class="letter-container">
        <div class="letter-list ">
				
					<?php if ($letter_query->have_posts()) : ?>
          <?php while ($letter_query->have_posts()) : $letter_query->the_post(); ?>
						<?php
						$related_nursery_id = get_field('related_nursery'); // ACFリレーションで関連園を取得
						$nursery_name = $related_nursery_id ? get_the_title($related_nursery_id) : '不明な園';
						$prefecture = get_field('nursery_address', $related_nursery_id);
						?>	
          <a href="<?php the_permalink(); ?>" class="letter-card fade-in">
						<!-- サムネイル画像 -->
						<?php
							$thumbnail = get_field('article_image');
							if ($thumbnail):
						?>
							<img class="letter-card__image" src="<?php echo esc_url(wp_get_attachment_image_url($thumbnail, 'full')); ?>" alt="<?php the_title(); ?>">
						<?php endif; ?>
						<div class="letter-card__textarea">
							<!-- 記事タイトル -->
							<h2 class="letter-card__textarea--title"><?php the_title(); ?>からのおたより</h2>
							<!-- サムネイルタイトル -->
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
		  $base_url = trailingslashit($base_url); // ← 忘れずに末尾スラッシュ追加
      $params = [];
      if (!empty($selected_prefecture)) $params['prefecture'] = $selected_prefecture;
      if (!empty($selected_nursery)) $params['nursery'] = $selected_nursery;
      if (!empty($selected_month)) $params['m'] = $selected_month;
      if (!empty($params)) $base_url = add_query_arg($params, $base_url);

      echo '<div class="pagination-area">';
      get_template_part('template-parts/pagination', null, [
        'query'    => $letter_query,
        'base_url' => $base_url,
				'post_type'  => 'letter', // ←追加！
      ]);
      echo '</div>';
      ?>
		</div>		
		
		<?php get_template_part('template-parts/monthly');?>


  </section>
</main>





  <!-- ---footer読み込み ----------------------------------------------->
  <?php
     get_template_part('template-parts/footer'); // footer.php をインクルード
  ?>
  <!-- ---------------------------------------------------------------------->
  </body>   