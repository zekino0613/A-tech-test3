  <!-- ---footer読み込み ----------------------------------------------->
  <?php
    get_template_part('template-parts/header'); // header.php をインクルード
  ?>
  <!-- ---------------------------------------------------------------------->

	<main>
		<!-- mainvisual -->
		<section id="mainvisual">
			<!-- メインビジュアル画像 -->
			<div class="mainvisual__fv"></div>
			
			<div class="mainvisual__triangle-white"></div>
			
			<!-- スクロールしたらフェードアウトアイコン -->
			<div class="scroll-indicator">
				<p>Scroll</p>
				<div class="scroll-arrow"></div>
			</div>>
			
			
			<!-- SPコンテンツ -->
			<div class="mainvisual__sp-bg"></div>
			<div class="h1-content-sp">
				<h1 class="h1-content-sp__title">
					Think About <br>
					the Future
				</h1>
				<p class="h1-content-sp__text">
					不動産の可能性を発見し、最適な選択を。
				</p>
			</div>
			
			<!-- サークルループSP -->
			<div class="circle-loop-sp"></div>			
		</section>
	
		<!-- サークルループPC -->	
		<div class="circle-loop-pc"></div>
		<!-- PCコンテンツ -->
		<div class="fv-triangle-bg">
			<div class="h1-content-pc">
				<h1 class="h1-content-pc__title">
					Think About <br>
					the Future
				</h1>
				<p class="h1-content-pc__text">
					不動産の可能性を発見し、最適な選択を。
				</p>
			</div>
		</div>
		
		<!-- Property -->
		<section id="property">
			<div class="property__triangle-blue"></div>
			
			<div class="property__content">
				<div class="property-title-main">
					<h2 class="property-title-main__left">Strategies</h2>
					<span class="batu"></span>
					<h2 class="property-title-main__right">Property</h2>
				</div>
				
				<div class="property__content--textarea">
					<h3 class="property-title-sub">
						『不動産』にも『戦略』を。
					</h3>
					<p class="property-title-text">
						これからの時代は不動産についても戦略的に考える必要があります。<br>
						先の見えない時代だからこそ、形のある不動産を自分自身の資産に。<br>
						資産になりうる不動産について、経験豊富なプロがコンサルティングをいたします。
					</p>
				</div>
			</div>	
		</section>
		
		<!-- Service -->
		<section id="service">
			<div class="service-bg-pc"></div>
			<div class="service-bg-sp"></div>
			<div class="service__inner">
				<!--【h3セクションタイトル】 -->
				<div class="section-title">
					<h3 class="section-title__eng">service</h3>
					<span class="section-title__ja">サービス内容</span>
				</div>
				
				
				
				<div class="service-textarea">
					<h4 class="service-textarea__subtitle">
						未来を共に考え、実現する。
					</h4>
					<p class="service-textarea__text">
						不動産のお悩みなら、なんでもお聞かせください。<br>
						ライフプランニングから、アフターフォローまでトータルサポートいたします。<br>
						不動産の『最適』を考え、実現することが私たちのサービスです。
					</p>
				</div>
				
				<ul class="service-list">
					<li>
						<img class= "service-list__1"  
							src="<?php echo get_template_directory_uri(); ?>/assets/images/a-tech3_image/top-service01.webp"
							width="150.5" 
							height="106"
							loading="lazy"
							alt="ライフプランニング画像">
							<p class="service-text">
								ライフプランニング
							</p>
					</li>
					<li>
						<img class= "service-list__2"
							src="<?php echo get_template_directory_uri(); ?>/assets/images/a-tech3_image/top-service02.webp"
							width="116" 
							height="108"
							loading="lazy"
							alt="販売会社の選定画像">
							<p class="service-text">
								販売会社の選定
							</p>
					</li>
					<li>
						<img class= "service-list__3" 
							src="<?php echo get_template_directory_uri(); ?>/assets/images/a-tech3_image/top-service03.webp"
							width="136" 
							height="110"
							loading="lazy"
							alt="斡旋画像">
							<p class="service-text">
								斡旋
							</p>
					</li>
					<li>
						<img class= "service-list__4" 
							src="<?php echo get_template_directory_uri(); ?>/assets/images/a-tech3_image/top-service04.webp"
							width="98" 
							height="103"
							loading="lazy"
							alt="アフターフォロー画像">
							<p class="service-text">
								アフターフォロー
							</p>
					</li>
				</ul>
				
				<!-- slanted-svg-button.php -->
				<?php
					get_template_part('template-parts/slanted-svg-button', null, [
						'label' => 'View more',
						'width' => '336px',
						'url'   => home_url('/servise/')
					]);
				?>
			</div>
		</section>
		
		<!-- About -->
		<section id="about">
			
			<div class="about-bg-pc"></div>
			<div class="about-bg-sp"></div>
			
			<div class="about__inner">
				<!--【h3セクションタイトル】 -->
				<div class="section-title">
					<h3 class="section-title__eng">about</h3>
					<span class="section-title__ja">事業紹介</span>
				</div>

				<!-- サークルループPC -->	
				<div class="circle-loop-pc"></div>
				
				<div class="about-content">
					<div class="about-content__management">
						<p class="about-content__management--text">
							アセットマネジメント事業
						</p>
					</div>
					
					<div class="about-content__consulting">
						<p class="about-content__consulting--text">
							不動産コンサルティング事業
						</p>
					</div>	
				</div>
				
				<!-- slanted-svg-button.php -->
				<?php
					get_template_part('template-parts/slanted-svg-button', null, [
						'label' => 'View more',
						'width' => '336px',
						'url'   => home_url('/about/')
					]);
				?>
			</div>	
		</section>
		
		<!-- Recruit -->
		<section id="recruit">
			<div class="recruit-bg"></div>
			<div class="recruit__inner-pc">
				<div class="recruit-textcontent">
					<!--【h3セクションタイトル】 -->
					<div class="section-title">
						<h3 class="section-title__eng">recruit</h3>
						<span class="section-title__ja">採用情報</span>
					</div>
					
					<h4 class="recruit-textcontent__subtitle">
						お客様の幸せな未来を<br> 
						共に考える。
					</h4>
					
					<p class="recruit-textcontent__text">
						株式会社ネクストリアルティでは、<br>
						コンサルティング営業職・投資用不動産営業職を募集しています。<br>
						お客様の老後の問題、住宅に対して解決案を提案していく営業活動です。
					</p>
					
					<!-- slanted-svg-button.php -->
					<?php
						get_template_part('template-parts/slanted-svg-button', null, [
							'label' => '募集要項を見る',
							'width' => '336px',
							'url'   => home_url('/recruit/')
						]);
					?>
				</div>
				
				<div class="recruit-imagecontent">
					<img class= "recruit-imagecontent__image" 
					src="<?php echo get_template_directory_uri(); ?>/assets/images/a-tech3_image/top-recruit-pc.webp	"
					width="480" 
					height="406"
					loading="lazy"
					alt="採用情報画像">		
					
					<div class="recruit-imagecontent__bg"></div> 
				
				</div>
			</div>	
			
			<div class="recruit__inner-sp">
				<div class="recruit-textcontent">
					<!--【h3セクションタイトル】 -->
					<div class="section-title">
						<h3 class="section-title__eng">recruit</h3>
						<span class="section-title__ja">採用情報</span>
					</div>
					
					<h4 class="recruit-textcontent__subtitle">
						お客様の幸せな未来を<br> 
						共に考える。
					</h4>
					
					<p class="recruit-textcontent__text">
						株式会社ネクストリアルティでは、
						コンサルティング営業職・投資用不動産営業職を募集しています。<br>
						お客様の老後の問題、住宅に対して解決案を提案していく営業活動です。
					</p>
				</div>
				
				
				<div class="recruit-imagecontent">
					<div class="recruit-imagecontent__bg"></div> 
				</div>
				
				<!-- slanted-svg-button.php -->
				<?php
					get_template_part('template-parts/slanted-svg-button', null, [
						'label' => 'Entry（エントリー）',
						'width' => '336px',
						'url'   => home_url('/recruit/')
					]);
				?>
				
			</div>		
		</section>
		
		<section id="news">
			<div class="news__inner">
				<!--【h3セクションタイトル】 -->
				<div class="section-title">
					<h3 class="section-title__eng">news</h3>
					<span class="section-title__ja">お知らせ</span>
				</div>
					
				<?php
				$paged = max(1, get_query_var('paged'));
				$year  = get_query_var('year');
				$archive_year = get_query_var('year');
				$args = [
					'post_type'      => 'news',
					'posts_per_page' => 3,
					'paged'          => $paged,
					'orderby'        => 'date',
					'order'          => 'DESC',
				];
				$news_query = new WP_Query($args);
        ?>

				<div class="news-list">
					<?php if ($news_query->have_posts()) : ?>
						<?php while ($news_query->have_posts()) : $news_query->the_post(); ?>
							<a href="<?php the_permalink(); ?>" class="news-card">
								<div class="news-card__inner">
									<div class="textarea">
										<?php
										$date = new DateTime(get_the_date('Y-m-d'));
										echo '<time class="textarea__news-date">' . $date->format('Y/m/d D.') . '</time>';
										?>
										<h1 class="textarea__news-title"><?php the_title(); ?></h1>
										
									</div>
								</div>
							</a>
						<?php endwhile; ?>
					<?php else : ?>
						<p>投稿が見つかりませんでした。</p>
					<?php endif; ?>
					<?php wp_reset_postdata(); ?>
        </div>
				
				<!-- slanted-svg-button.php -->
				<?php
					get_template_part('template-parts/slanted-svg-button', null, [
						'label' => 'View more',
						'width' => '336px',
						'url'   => get_post_type_archive_link('news')
					]);
				?>
			</div>
		</section>
  <!-- ---footer読み込み ----------------------------------------------->
  <?php
    get_template_part('template-parts/footer'); // footer.php をインクルード
  ?>
  <!-- ---------------------------------------------------------------------->
	</main>


</body>
