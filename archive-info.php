  <!-- ---footer読み込み ----------------------------------------------->
  <?php
    get_template_part('template-parts/header'); // header.php をインクルード
  ?>
  <!-- ---------------------------------------------------------------------->
  <main>
    <!-- title-heading -->
    <?php
        get_template_part('template-parts/title-heading'); // title-heading をインクルード
    ?>


    <section id="archive-info">
      <div class="archive-info__inner">
				<?php
				$paged = max(1, get_query_var('paged')); // ← 修正
				$paged = get_query_var('paged') ? get_query_var('paged') : (isset($_GET['paged']) ? (int) $_GET['paged'] : 1);
				$filter_category_slug = get_query_var('osirase');				
				$args = [
					'post_type' => 'info',
					'posts_per_page' => 10,
					'paged' => $paged,
				];
				if ($filter_category_slug && term_exists($filter_category_slug, 'osirase')) {
					$args['tax_query'] = [
						[
							'taxonomy' => 'osirase',
							'field'    => 'slug',
							'terms'    => $filter_category_slug,
						]
					];
				}

				// カテゴリーを取得
				$categories = get_terms([
						'taxonomy'   => 'osirase', // 'info' 用のカスタムタクソノミーがあれば変更
						'hide_empty' => false,
				]);
				
				// ✅ カスタム並び順を指定（この順番通りに表示）
				$custom_order = [
						'osirase'  => 1,
						'active' => 2,
						'media' => 3,
				];

				// 並び替え（存在しないカテゴリーは自動的に後ろへ）
				usort($categories, function($a, $b) use ($custom_order) {
					$pos_a = $custom_order[$a->slug] ?? 999;
						$pos_b = $custom_order[$b->slug] ?? 999;
						return $pos_a <=> $pos_b; // ✅ PHP 7+ の比較演算子で確実にソート
					});
					
					$query = new WP_Query($args);
				?>
				
				<div class="filter-buttons fade-in">
					<a href="<?php echo esc_url(get_post_type_archive_link('info')); ?>"
						class="filter-button<?php echo empty($filter_category_slug) ? ' active' : ''; ?>">すべて</a>

					<?php foreach ($categories as $category): ?>
						<a href="<?php echo esc_url(add_query_arg('osirase', $category->slug, get_post_type_archive_link('info'))); ?>"
							class="filter-button<?php echo ($filter_category_slug === $category->slug) ? ' active' : ''; ?>">
							<?php echo esc_html($category->name); ?>
						</a>
					<?php endforeach; ?>
				</div>



				<div class="info-list">
					<?php if ($query->have_posts()) : ?>
						<?php while ($query->have_posts()) : $query->the_post(); ?>	
						<?php
							$categories = get_the_terms(get_the_ID(), 'osirase');
							$post_category_slug = !empty($categories) && !is_wp_error($categories) ? $categories[0]->slug : "all";

							// ✅ カテゴリー別のアイコン画像・文字色・アイコン背景色を設定
							$category_styles = [
									'osirase' => ['icon' => 'archive-bell-icon.webp', 'color' => '#FFFFFF', 'icon_bg' => '#FFC9DE'],
									'media' => ['icon' => 'archive-TV-icon.webp', 'color' => '#FFFFFF', 'icon_bg' => '#FFC657'],
									'active' => ['icon' => 'archive-comment-icon.webp', 'color' => '#FFFFFF', 'icon_bg' => '#A4C8FF'],
									'default' => ['icon' => 'default-icon.webp', 'color' => '#999999', 'icon_bg' => '#e0e0e0']
							];

							$icon = isset($category_styles[$post_category_slug]) ? $category_styles[$post_category_slug]['icon'] : $category_styles['default']['icon'];
							$color = isset($category_styles[$post_category_slug]) ? $category_styles[$post_category_slug]['color'] : $category_styles['default']['color'];
							$icon_bg = isset($category_styles[$post_category_slug]) ? $category_styles[$post_category_slug]['icon_bg'] : $category_styles['default']['icon_bg'];
						?>

						<a href="<?php the_permalink(); ?>" class="info-card fade-in" data-category="<?php echo esc_attr($post_category_slug); ?>">
							<div class="info-card__inner">
								<div class="info-card__inner--flex">
									<div class="category-icon" style="background-color: <?php echo esc_attr($icon_bg); ?>;">
										<div class="category-image" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/kidsland_image/design-parts/<?php echo esc_attr($icon); ?>');"></div>
										<?php
											if (!empty($categories) && !is_wp_error($categories)) {
												echo '<p class="category" style="color: ' . esc_attr($color) . ';">';
												echo esc_html($categories[0]->name);
												echo '</p>';
											} else {
													echo '<span class="category">未分類</span>';
											}
										?>
									</div><!-- / -->
									<!-- 投稿日時 -->
									<time class="post-date"><?php echo get_the_date('Y.m.d'); ?></time>
								</div>
								
								<div class="textarea">
									<!-- 投稿日時 -->
									<time class="textarea__post-date"><?php echo get_the_date('Y.m.d'); ?></time>
									<!-- 記事タイトル -->
									<h1 class="textarea__info-title"><?php the_title(); ?></h1>
									<?php
										// リピートフィールドを取得
										$repeater_data = SCF::get('subheading_content'); // リピートフィールドのグループ名
											if (!empty($repeater_data)) {
											$first = true; // 最初の段落判定用
											foreach ($repeater_data as $item) {
												if ($first) {
													// 最初の1行目だけを40文字に制限して表示
													$paragraph_content = isset($item['paragraph_content']) ? esc_html($item['paragraph_content']) : '段落内容未設定';
													$excerpt = mb_substr($paragraph_content, 0, 40, 'UTF-8'). '...'; // ✅ 最初の40文字のみ出力
													// 出力
													echo '<p class="textarea__paragraph">' . nl2br($excerpt) . '</p>';
													
													// 1回表示したらループを抜ける（2行目以降は出力しない）
													break;
												}
											}
										} else {
												echo '<p>コンテンツが設定されていません。</p>';
										}
									?>
								</div><!-- / -->
							</div><!-- / -->	
						</a>
						<?php endwhile;?>
						
					<?php else : ?>
					<p>投稿が見つかりませんでした。</p>
					<?php endif; ?>
					<?php wp_reset_postdata(); ?>

					<!-- //ページネーション呼び出し（カテゴリ付き） -->
					<?php
						$base_url = get_post_type_archive_link('info'); // まずベースを取得（例: /info/）
						// $base_url = add_query_arg('osirase', $filter_category_slug, get_post_type_archive_link('info'));
						$base_url = trailingslashit($base_url); // ← ここも忘れずに
						// 不要なクエリ（paged や category）がURLに含まれていたら削除
						$base_url = remove_query_arg(['paged', 'category'], $base_url);
						
						// フィルタリングが有効なら、osirase を追加
						if (!empty($filter_category_slug)) {
							$base_url = add_query_arg('osirase', $filter_category_slug, $base_url);
						}
						
						get_template_part('template-parts/pagination', null, [
							'query'    => $query,
							'base_url' => $base_url,
							'post_type'  => 'info', // ←追加！
						]);
					?>


				</div>	
		</section>			

  
  </main>





  <!-- ---footer読み込み ----------------------------------------------->
  <?php
    get_template_part('template-parts/footer'); // footer.php をインクルード
  ?>
  <!-- ---------------------------------------------------------------------->
  </body>   