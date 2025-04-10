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
  
	<section id="letter-container">
		<div class="letter">
			<div class="letter__title-date fade-in">
				<!-- 記事タイトル -->
				<h1 class="letter__title-date--letter-title"><i class="fas fa-pencil"></i><?php the_title(); ?>からのおたより</h1>

				<!-- 投稿日時 -->
				<time class="letter__title-date--post-date" datetime="<?php echo get_the_date('Y-m-d'); ?>">
					<?php
					$date = get_the_date('Y年n月j日'); // 例: 2024年4月1日
					$date_hiragana = str_replace(['年', '月', '日'], ['ねん', 'がつ', 'にち'], $date);
					echo esc_html($date_hiragana);
					?>
				</time>
			</div><!-- / -->
			
			<!-- サムネイルタイトル -->
			<?php if( get_field('article_title') ): ?>
				<h2 class="letter__title fade-in"><?php the_field('article_title'); ?></h2>
			<?php endif; ?>

			<!-- サムネイル画像 -->
			<?php
				$thumbnail = get_field('article_image'); // 画像IDを取得
				$default_image = get_template_directory_uri() . '/assets/images/kidsland_image/design-parts/no-image.webp'; // デフォルト画像のパス
			?>
			<img class="letter__image fade-in" 
					src="<?php echo esc_url($thumbnail ? wp_get_attachment_image_url($thumbnail, 'full') : $default_image); ?>" 
					alt="<?php the_title(); ?>">

			<!-- 小見出しと段落内容 -->
			<div class="text-content">
			<?php
				// リピートフィールドを取得
				$repeater_data = SCF::get('subheading_content'); // リピートフィールドのグループ名

				if (!empty($repeater_data)) {
						foreach ($repeater_data as $item) {
								// 小見出しと段落を取得
								$subheading = isset($item['subheading']) ? esc_html($item['subheading']) : '';
								$paragraph_content = isset($item['paragraph_content']) ? esc_html($item['paragraph_content']) : '';

								// **改行ごとに `<p>` タグで分割**
								$paragraphs = explode("\n", trim($paragraph_content));

								echo '<div class="text-content__inner">';
								if ($subheading) {
										echo '<h3 class="text-content__inner--subheading fade-in">' . $subheading . '</h3>';
								}

								foreach ($paragraphs as $para) {
										if (!empty(trim($para))) { // 空行をスキップ
												echo '<p class="text-content__inner--paragraph fade-in">' . esc_html($para) . '</p>';
										}
								}
								echo '</div>';
						}
				} else {
						echo '<p>コンテンツが設定されていません。</p>';
				}
				?>

				
				<a href="<?php echo home_url('/letter/'); ?>" class="btn fade-in">
					<p class="btn__text fade-in">こもれびだより一覧へ</p>
					<i class="fa-solid fa-angle-right"></i>
				</a>
			</div>
		</div>
		
		<?php get_template_part('template-parts/monthly');?>


	</div>




</main>





  <!-- ---footer読み込み ----------------------------------------------->
  <?php
    get_template_part('template-parts/footer'); // footer.php をインクルード
  ?>
  <!-- ---------------------------------------------------------------------->
  </body>   