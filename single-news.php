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
	<section id="single-news">
		<div class="single-news__inner">
			<div class="section-title">
				<h3 class="section-title__eng">news</h3>
				<span class="section-title__ja">お知らせ</span>		
			</div>
				
			<div class="news-post">
				<h1 class="news-post__news-title"><?php the_title(); ?></h1>
				<?php
					$date = new DateTime(get_the_date('Y-m-d'));
					echo '<time class="news-post__news-date">' . $date->format('Y/m/d D.') . '</time>';
				?>
				<p class="news-post__news-textarea"><?php the_field('textarea'); ?></p>
				
				<div class="sns-share-buttons">
					<!-- Xでシェア -->
					<a href="https://twitter.com/share?url=<?php echo urlencode(get_permalink()); ?>&text=<?php echo urlencode(get_the_title()); ?>" target="_blank" rel="noopener noreferrer">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/images/a-tech3_image/Xrogo.webp" alt="Xでシェア">
					</a>

					<!-- Facebookでシェア -->
					<a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_permalink()); ?>" target="_blank" rel="noopener noreferrer">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/images/a-tech3_image/icon-facebook.webp" alt="Facebookでシェア">
					</a>

					<!-- LINEでシェア -->
					<a href="https://social-plugins.line.me/lineit/share?url=<?php echo urlencode(get_permalink()); ?>" target="_blank" rel="noopener noreferrer">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/images/a-tech3_image/icon-line.webp" alt="LINEでシェア">
					</a>
				</div>



					<!-- slanted-svg-button.php -->
					<?php
						get_template_part('template-parts/slanted-svg-button', null, [
							'label' => '一覧へ戻る',
							'width' => '336px',
							'url'   => get_post_type_archive_link('news')
						]);
					?>
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