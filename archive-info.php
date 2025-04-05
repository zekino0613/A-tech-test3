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

				// デバッグ用（カテゴリーの並びを確認）
				// var_dump($categories);
				?>

				<div class="filter-buttons fade-in">
					<a href="#" class="filter-button active" data-category="all">すべて</a>
						<?php foreach ($categories as $category): ?>
							<a href="#" class="filter-button" data-category="<?php echo esc_attr($category->slug); ?>">
								<?php echo esc_html($category->name); ?>
							</a>
						<?php endforeach; ?>
				</div>


				<div class="info-list">
					<?php if (have_posts()) : ?>
						<?php while (have_posts()) : the_post(); ?>
						<?php
							$categories = get_the_terms(get_the_ID(), 'osirase');
							$category_slug = !empty($categories) && !is_wp_error($categories) ? $categories[0]->slug : "all";

							// ✅ カテゴリー別のアイコン画像・文字色・アイコン背景色を設定
							$category_styles = [
									'osirase' => ['icon' => 'archive-bell-icon.webp', 'color' => '#FFFFFF', 'icon_bg' => '#FFC9DE'],
									'media' => ['icon' => 'archive-TV-icon.webp', 'color' => '#FFFFFF', 'icon_bg' => '#FFC657'],
									'active' => ['icon' => 'archive-comment-icon.webp', 'color' => '#FFFFFF', 'icon_bg' => '#A4C8FF'],
									'default' => ['icon' => 'default-icon.webp', 'color' => '#999999', 'icon_bg' => '#e0e0e0']
							];

							$icon = isset($category_styles[$category_slug]) ? $category_styles[$category_slug]['icon'] : $category_styles['default']['icon'];
							$color = isset($category_styles[$category_slug]) ? $category_styles[$category_slug]['color'] : $category_styles['default']['color'];
							$icon_bg = isset($category_styles[$category_slug]) ? $category_styles[$category_slug]['icon_bg'] : $category_styles['default']['icon_bg'];
						?>

						<a href="<?php the_permalink(); ?>" class="info-card" data-category="<?php echo esc_attr($category_slug); ?>">
							<div class="info-card__inner fade-in">
								<div class="info-card__inner--flex fade-in">
									<div class="category-icon" style="background-color: <?php echo esc_attr($icon_bg); ?>;">
										<div class="category-image fade-in" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/kidsland_image/design-parts/<?php echo esc_attr($icon); ?>');"></div>
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
									<time class="post-date fade-in"><?php echo get_the_date('Y.m.d'); ?></time>
								</div>
								
								<div class="textarea">
									<!-- 投稿日時 -->
									<time class="textarea__post-date fade-in"><?php echo get_the_date('Y.m.d'); ?></time>
									<!-- 記事タイトル -->
									<h1 class="textarea__info-title fade-in"><?php the_title(); ?></h1>
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
													echo '<p class="textarea__paragraph fade-in">' . nl2br($excerpt) . '</p>';
													
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

					<!-- <div class="pagination fade-in">
						<div class="pagination__inner fade-in">
							<?php
							global $wp_query; // ✅ メインクエリを参照

							echo paginate_links([
									'total'   => $wp_query->max_num_pages, // ✅ WP_Query の max_num_pages を正しく参照
									'current' => max(1, get_query_var('paged', 1)), // ✅ 現在のページ番号を取得
									'prev_text' => '<i class="fa-solid fa-chevron-left"></i>',
									'next_text' => '<i class="fa-solid fa-chevron-right"></i>',
									'format'    => 'page/%#%/', // ✅ ページ番号のフォーマット
									'base'      => get_post_type_archive_link('info') . '%_%', // ✅ カスタム投稿タイプのアーカイブURL
							]);
							?>
						</div>  
					</div> -->
					<?php
						global $wp_query;
						get_template_part('template-parts/pagination', null, [
							'query'    => $wp_query,
							'base_url' => get_post_type_archive_link('info'),
						]);
					?>

				</div>	
		</sectin>			

  
  </main>





  <!-- ---footer読み込み ----------------------------------------------->
  <?php
    get_template_part('template-parts/footer'); // footer.php をインクルード
  ?>
  <!-- ---------------------------------------------------------------------->
  </body>   