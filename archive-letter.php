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
					$letters = get_posts([
							'post_type'      => 'letter',
							'posts_per_page' => -1,
							'orderby'        => 'title',
							'order'          => 'ASC',
					]);

					foreach ($letters as $letter) {
							echo '<option value="' . esc_attr($letter->post_title) . '">' . esc_html($letter->post_title) . '</option>';
					}
					?>
				</select>
				<button type="submit"><i class="fa fa-search search-icon"></i></button>
			</form>


			<?php
			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

			// ✅ GETパラメータ取得
			$selected_prefecture = isset($_GET['prefecture']) ? urldecode(sanitize_text_field($_GET['prefecture'])) : '';
			$selected_nursery = isset($_GET['nursery']) ? urldecode(sanitize_text_field($_GET['nursery'])) : '';
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
			//園検索の制御function内で対応
			
			$letter_query = new WP_Query($args);
			?>
			
			



			<div class="letter-container">
				<div class="letter-list ">
					<?php if (have_posts()) : ?>
					<?php while (have_posts()) : the_post(); ?>
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
							</a>
							<?php endwhile;?>
							<?php else : ?>
								<p>投稿が見つかりませんでした。</p>
						<?php endif; ?>
						
					<?php wp_reset_postdata(); ?>
				</div>						
			</div>				
			
			<div class="pagination">
				<div class="pagination__inner">
					<?php
					echo paginate_links([
							'total'   => $letter_query->max_num_pages,
							'current' => $paged,
							'prev_text' => '<i class="fa-solid fa-chevron-left"></i>',
							'next_text' => '<i class="fa-solid fa-chevron-right"></i>',
							'format'    => '/page/%#%/', // ✅ ページ番号のフォーマット
							'base'      => home_url('/letter/page/%#%/'), // ✅ 固定URLを使う
					]);
					?>
				</div>	
			</div>
		</div>		
								
		<aside class="archive-sidebar fade-in">
      <h3>アーカイブ</h3>
      <ul class="archive-list">
        <?php
        global $wpdb;
        $archives = $wpdb->get_results("
            SELECT DISTINCT YEAR(post_date) as year, MONTH(post_date) as month, COUNT(ID) as post_count
            FROM $wpdb->posts
            WHERE post_type = 'letter' AND post_status = 'publish'
            GROUP BY YEAR(post_date), MONTH(post_date)
            ORDER BY post_date DESC
        ");

        $grouped_archives = [];
        foreach ($archives as $archive) {
            $year  = esc_html($archive->year);
            $month = esc_html($archive->month);
            $count = esc_html($archive->post_count);

            // 年ごとにグループ化
            if (!isset($grouped_archives[$year])) {
                $grouped_archives[$year] = [];
            }
            $grouped_archives[$year][] = [
                'month' => $month,
                'count' => $count
            ];
        }

        // 表示処理
        foreach ($grouped_archives as $year => $months) {
            echo '<li class="archive-year"><p>' . $year . 'ねん</p>';
            echo '<ul class="archive-months">';
            foreach ($months as $data) {
                $month_link = get_month_link($year, $data['month']);
                echo '<li><a href="' . $month_link . '">' . $data['month'] . 'がつ </a></li>';
            }
            echo '</ul>';
            echo '</li>';
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