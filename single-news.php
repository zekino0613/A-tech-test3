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
				<h1 class="textarea__info-title"><?php the_title(); ?></h1>
				<?php
					$date = new DateTime(get_the_date('Y-m-d'));
					echo '<time class="news-date">' . $date->format('Y/m/d D.') . '</time>';
				?>
				<p class="textarea"><?php the_field('textarea'); ?></p>
				
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