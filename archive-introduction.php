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

	
    <!-- 投稿カード -->
    <div class="introduction-list pink-bk">
			<?php
				get_template_part('template-parts/title-icon', null, ['name' => 'archive-introduction']);// title-icon をインクルード
			?>

			<div class="introduction-list__inner">
				<!-- title-icon -->
	
				<div class="tab">
					<!-- タブを構成するブロック -->
					<div class="tab-list">
						<button class="tab-list__item is-btn-active" data-tab="category">園の種類<br>から探す</button>
						<button class="tab-list__item" data-tab="prefecture">都道府県<br>から探す</button>
					</div>

					<div class="tab-contents-wrap">
						<!-- 園の種類カテゴリー -->
						<div class="tab-contents is-contents-active" id="category-tab">
							<ul>
								<?php
									$category_order = [
										"許可保育所", 
										"小規模保育所",
										"小規模保育事業 A型" 
									];
									
									$category_terms = get_terms([
										'taxonomy'   => 'category',
										'hide_empty' => true,
										'parent'     => 0,
										'orderby'    => 'include',
										'include'    => implode(',', array_map(fn($name) => get_term_by('name', $name, 'category')->term_id, $category_order))
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
				
				<?php 
  $categories = get_the_terms(get_the_ID(), 'category');
  $category_slug = !empty($categories) ? sanitize_title($categories[0]->slug) : 'default';

  // デバッグ用: 実際にどのクラスが出力されているか
  error_log(print_r($category_slug, true));
?>

<a href="<?php the_permalink(); ?>" 
   class="introduction-thumbnail <?php echo esc_attr($category_slug); ?>">
   <?php 
      $thumbnail = get_field('thumbnail_image'); 
      $default_image = get_template_directory_uri() . '/assets/images/kidsland_image/design-parts/no-image.webp';
   ?>
   <img class="thumbnail__inner--image" 
        src="<?php echo esc_url($thumbnail ? wp_get_attachment_image_url($thumbnail, 'full') : $default_image); ?>" 
        alt="<?php the_title(); ?>" class="nursery-thumbnail"> 
   <span class="news-header__flex--category"><?php echo esc_html($categories[0]->name ?? '未分類'); ?></span> 
   <p class="nursery-prefecture"><?php echo esc_html($prefecture); ?></p> 
   <h2 class="nursery-name"><?php the_title(); ?>園</h2> 
</a>


				<?php endwhile;?>
				<div class="pagination">
					<div class="pagination__inner">
						<?php
						echo paginate_links([
								'total'   => $introduction_query->max_num_pages,
								'current' => $paged,
								'prev_text' => '<i class="fa-solid fa-chevron-left"></i>',
								'next_text' => '<i class="fa-solid fa-chevron-right"></i>',
								'format'    => '/page/%#%/', // ✅ ページ番号のフォーマット
								'base'      => home_url('/introduction/page/%#%/'), // ✅ 固定URLを使う
						]);
						?>
					</div>
				</div>			
			</div>		
		</div>
		<?php
		endif;
		wp_reset_postdata();
		?>
		
		<!--section/ recruit -->
		<?php
				get_template_part('template-parts/recruit'); // recruit をインクルード
		?>

		
  </main>





  <!-- ---footer読み込み ----------------------------------------------->
  <?php
    get_template_part('template-parts/footer'); // footer.php をインクルード
  ?>
  <!-- ---------------------------------------------------------------------->
  </body>