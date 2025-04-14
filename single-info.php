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

				
		<section id="single-info">
			<div class="info-post">
				<!-- 投稿日時 -->
				<time class="info-post__post-date fade-in"><?php echo get_the_date('Y.m.d'); ?></time>
				<!-- 記事タイトル -->
				<h1 class="info-post__title fade-in"><?php the_title(); ?></h1>

				<!-- サムネイル画像 -->
					<?php
						$thumbnail = get_field('info_image'); // 画像IDを取得
						$default_image = get_template_directory_uri() . '/assets/images/kidsland_image/design-parts/no-image.webp'; // デフォルト画像のパス
					?>
					<img class="info-post__image fade-in" 
							src="<?php echo esc_url($thumbnail ? wp_get_attachment_image_url($thumbnail, 'full') : $default_image); ?>" 
							alt="<?php the_title(); ?>">

				<!-- 小見出しと段落内容 -->
				<div class="text-content fade-in">
					<?php
					// リピートフィールドを取得
					$repeater_data = SCF::get('subheading_content'); // リピートフィールドのグループ名
					if (!empty($repeater_data)) {
							foreach ($repeater_data as $item) {
									// 小見出しと段落内容を取得
									$subheading = isset($item['subheading']) ? esc_html($item['subheading']) : '小見出し未設定';
									$paragraph_content = isset($item['paragraph_content']) ? nl2br(esc_html($item['paragraph_content'])) : '段落内容未設定';
								
									// 段落または小見出しのどちらかが存在する場合のみ出力
									if (!empty($subheading) || !empty($paragraph_content)) {
										echo '<div class="text-content__inner">';

										// 小見出しが空でない場合のみ h2 を出力
										if (!empty($subheading)) {
												echo '<h2 class="text-content__inner--subheading fade-in">' . $subheading . '</h2>';
										}

										// 段落内容が空でない場合のみ p を出力
										if (!empty($paragraph_content)) {
												echo '<p class="news-section__inner--paragraph fade-in">' . $paragraph_content . '</p>';
										}

										echo '</div>';
								}
							
							}
					} else {
							echo '<p>コンテンツが設定されていません。</p>';
					}
					?>
					
					<a href="<?php echo home_url('/info/'); ?>" class="btn fade-in">
						<p class="btn__text">こもれびだより一覧へ</p>
						<i class="fa-solid fa-angle-right"></i>
					</a>
				</div>
			</div>		
		</section>
  </main>
					




  <!-- ---footer読み込み ----------------------------------------------->
  <?php
    get_template_part('template-parts/footer'); // footer.php をインクルード
  ?>
  <!-- ---------------------------------------------------------------------->
  </body>   