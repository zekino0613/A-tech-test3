<!-- 新コード -->

<?php
// ---header読み込み ---
get_template_part('template-parts/header'); // header.php をインクルード
?>

<main>
    <!-- title-heading -->
    <?php get_template_part('template-parts/title-heading'); ?>

    <!-- 投稿カード -->
    <div class="introduction-list pink-bk fade-in">
      <?php get_template_part('template-parts/title-icon', null, ['name' => 'archive-introduction']); ?>
			
			<!-- タブリスト -->
			<div class="tab-list">
				<button class="tab-list__item is-btn-active" data-tab="category">園の種類<br>から探す</button>
				<button class="tab-list__item" data-tab="prefecture">都道府県<br>から探す</button>
			</div>
			
			
      <div class="introduction-list__inner">
				<div class="tab-contents-wrap">
					<?php
						$selected_prefecture = isset($_GET['prefecture']) ? sanitize_title($_GET['prefecture']) : '';
						$selected_category   = isset($_GET['category']) ? sanitize_title($_GET['category']) : '';
					?>

					<!-- 園の種類カテゴリー -->
					<div class="tab-contents is-contents-active" id="category-tab">
						<ul>
							<?php
								$category_order = ["許可保育所", "小規模保育所", "小規模保育事業 A型"];
								
								foreach ($category_order as $name) {
									$term = get_term_by('name', $name, 'category');
									if ($term) {
										$is_active = ($selected_category === $term->slug) ? 'is-btn-active' : '';
										echo '<li><a class="category-filter ' . $is_active . '" href="' . esc_url(add_query_arg('category', $term->slug, get_post_type_archive_link('introduction'))) . '">' . esc_html($term->name) . '</a></li>';
									}
								}
							?>
						</ul>
					</div>

					<!-- 都道府県カテゴリー -->
					<div class="tab-contents" id="prefecture-tab" style="display: none;">
						<ul>
							<?php
								$prefecture_terms = get_terms(['taxonomy' => 'prefecture', 'hide_empty' => false, 'parent' => 0]);
								foreach ($prefecture_terms as $term) {
									$slug = sanitize_title($term->slug);
									$is_active = ($selected_prefecture === $slug) ? 'is-btn-active' : '';
									echo '<li><a class="prefecture-filter ' . $is_active . '" href="' . esc_url(add_query_arg('prefecture', $slug, get_post_type_archive_link('introduction'))) . '">' . esc_html($term->name) . '</a></li>';
								}
							?>
						</ul>
					</div>
				</div>
            

				<?php
					$paged = max(1, get_query_var('paged'));
					$selected_prefecture = isset($_GET['prefecture']) ? urldecode(sanitize_text_field($_GET['prefecture'])) : '';
					$selected_category = get_query_var('category');
					// WP_Query の条件
					$args = [
							'post_type'      => 'introduction',
							'posts_per_page' => 9, 
							'orderby'        => 'date',
							'order'          => 'DESC',
							'paged'          => $paged,
					];
					if (!empty($selected_prefecture)) {
						$args['tax_query'][] = [
							'taxonomy' => 'prefecture',
							'field' => 'slug',
							'terms' => $selected_prefecture,
						];
					}
					if (!empty($selected_category)) {
						$args['tax_query'][] = [
							'taxonomy' => 'category',
							'field' => 'slug',
							'terms' => $selected_category,
						];
					}
					
					$introduction_query = new WP_Query($args);
	
					if ($introduction_query->have_posts()) :
						while ($introduction_query->have_posts()) : $introduction_query->the_post();
							$pref = get_the_terms(get_the_ID(), 'prefecture');
							$cat = get_the_terms(get_the_ID(), 'category');
							
							$pref_slug = (!empty($pref) && !is_wp_error($pref)) ? esc_attr($pref[0]->slug) : '';
							$cat_slug = (!empty($cat) && !is_wp_error($cat)) ? esc_attr($cat[0]->slug) : 'default';
							$thumbnail = get_field('thumbnail_image');
							$default_image = get_template_directory_uri() . '/assets/images/kidsland_image/design-parts/no-image.webp';
				?>

				<a href="<?php the_permalink(); ?>" class="introduction-thumbnail fade-in  <?php echo esc_attr($pref_slug . ' ' . $cat_slug); ?>">
					<img class="thumbnail__inner--image" src="<?php echo esc_url($thumbnail ? wp_get_attachment_image_url($thumbnail, 'full') : $default_image); ?>" alt="<?php the_title(); ?>" class="nursery-thumbnail">
					<span class="news-header__flex--category"><?php echo esc_html($cat[0]->name ?? '未分類'); ?></span>
					<p class="nursery-prefecture"><?php echo esc_html($pref[0]->name ?? '都道府県不明'); ?></p>
					<h2 class="nursery-name"><?php the_title(); ?></h2>
				</a>

				<?php endwhile; ?>

			
				<?php
					$base_url = get_post_type_archive_link('introduction');
					$base_url = trailingslashit($base_url); // ← 忘れずに末尾にスラッシュ
					
					if (!empty($selected_prefecture)) {
						$base_url = add_query_arg('prefecture', $selected_prefecture, $base_url);
					}
					if (!empty($selected_category)) {
						$base_url = add_query_arg('category', $selected_category, $base_url);
					}
					
					get_template_part('template-parts/pagination', null, [
						'query'      => $introduction_query,
						'base_url'   => $base_url,
						'post_type'  => 'introduction',
					]);
					
        ?>


				<?php endif; wp_reset_postdata(); ?>
			</div>
    </div>

    <!-- recruitセクション -->
    <?php get_template_part('template-parts/recruit'); ?>
</main>

<!-- ---footer読み込み --->
<?php get_template_part('template-parts/footer'); ?>
