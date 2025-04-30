<!-- header -->
<?php
    get_template_part('template-parts/header'); // header.php をインクルード
?>
<main>
<!-- ---other-mainvisual読み込み ----------------------------------------------->
<?php
	get_template_part('template-parts/other-mainvisual'); // other-mainvisual.php をインクルード
?>
<!-- ---------------------------------------------------------------------->
  <section id="archive-news">
		<div class="archive-news__inner">
			<div class="section-title">
				<h3 class="section-title__eng">news</h3>
				<span class="section-title__ja">お知らせ一覧</span>		
			</div>
			
			<div class="news-content">	
				<div class="news-block">
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

					<div class="news-list">
						<?php if ($news_query->have_posts()) : ?>
							<?php while ($news_query->have_posts()) : $news_query->the_post(); ?>
								<a href="<?php the_permalink(); ?>" class="news-card fade-in">
									<div class="news-card__inner">
										<div class="textarea">
											<?php
											$date = new DateTime(get_the_date('Y-m-d'));
											echo '<time class="textarea__news-date">' . $date->format('Y/m/d D.') . '</time>';
											?>
											<h1 class="textarea__news-title"><?php the_title(); ?></h1>
											<?php
											$content = get_field('textarea');
											$trimmed_content = mb_strimwidth($content, 0, 62, '…', 'UTF-8');
											echo '<p class="textarea__news-paragraph">' . esc_html($trimmed_content) . '</p>';
											?>
											
											<div class="textarea__arrow-content">
												<div class="arrow"></div>
											</div>
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
					
					<!-- slanted-svg-button.php -->
					<?php
						get_template_part('template-parts/slanted-svg-button', null, [
							'label' => 'TOPページへ戻る',
							'width' => '336px',
							'url'   => home_url('/')
						]);
					?>
				</div>
				
				
				<!-- サイドバーアーカイブ -->
				<?php get_template_part('template-parts/years'); ?>
      </div>
		</div>
  </section>
</main>

<?php
get_template_part('template-parts/footer'); // フッター読み込み
?>
</body>
