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
		
		<!-- property -->
		<section id="property">
			<div class="property__triangle-blue"></div>
			
			<div class="property__content">
				<div class="property__content--textarea">
					<h2 class="property-title-main">
						strategiess <span class="batu"></span><span>property</span>
					</h2>
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
		
		<!-- service -->
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
				
				<?php
					get_template_part('template-parts/slanted-svg-button', null, [
						'label' => 'View more',
						'width' => '336px',
						'url'   => home_url('/servise/')
					]);
				?>
				
				
				
			</div>
		</section>
		
		<section id="about">about</section>
		<section id="recruit">recruit</section>
		<section id="news">news</section>
  <!-- ---footer読み込み ----------------------------------------------->
  <?php
    get_template_part('template-parts/footer'); // footer.php をインクルード
  ?>
  <!-- ---------------------------------------------------------------------->
	</main>


</body>
