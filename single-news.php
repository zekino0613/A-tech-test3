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
				<?php get_field('textarea');?>				
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