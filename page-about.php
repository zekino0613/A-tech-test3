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
<section id ="about-body">
	<!-- 背景セクション ------------------------------------------->
	<div class="triangle-contents">
		<div class="triangle-contents__bg-wrap">
		<div class="triangle-contents__bg right1"></div>
		<div class="triangle-contents__bg left1"></div>
		</div>
	</div>
	<!-- 背景セクション ------------------------------------------->


<!-- メインコンテンツ ------------------------------------------>
<div class="main-content">
	<div class="main-content__inner">
		<!-- About -->
		<section id= "page-about">
			<div class="page-about__inner container">
				<div class="section-title">
					<h3 class="section-title__eng">about</h3>
					<span class="section-title__ja">事業概要</span>		
				</div>
				
				<p class="section-text">
					コンサルティング事業からアセットマネジメント事業まで、不動産に関するお悩みから、
					管理まで、トータルサポートできる 事業態勢を整えております。
				</p>
				
				
				<div class="about-list">
					<div class="about-list__content">
						<div class="about-list__content--image">
							<img 
										src="<?php echo get_template_directory_uri(); ?>/assets/images/a-tech3_image/top-about01.webp"
										width="463" 
										height="393"
										loading="lazy"
										alt="不動産コンサルティング事業">
						</div>				
						<div class="about-list__content--textarea">
							<h3 class="title">
								不動産コンサルティング事業
							</h3>
							<p class="text">
								人生で一番お金がかかると言われている不動産を対して，コンサルティングサービスをメインにさせて頂いております。<br>
								当社は経験豊富はスタッフが、まずはお客さまの現在の家族構成や、今後のライフプラン、ご要望等について詳しくヒアリングさせて頂きます。<br>
								<br>
								お客様の事情にあった情報を自社のデータベースや協力会社が持つ物件リストから検索し、ご提供させて頂きます。
							</p>
						</div>
					</div>
					

					<div class="about-list__content reverse">
						<div class="about-list__content--image ">
							<img 
									src="<?php echo get_template_directory_uri(); ?>/assets/images/a-tech3_image/top-about02.webp"
									width="463" 
									height="393"
									loading="lazy"
									alt="アセットマネジメント事業">
						</div>			
						<div class="about-list__content--textarea reverse-padding">
							<h3 class="title">
								アセットマネジメント事業
							</h3>
							<p class="text">
								低金利が長く続き、また金融庁の金融審議会「市場ワーキング・グループ」の報告書にていわゆる「老後2,000万円問題」がリリースされて以来、多くの方が不動産に注目しています。<br>
								我々は、今後競合優位性を持つ不動産とは立地に強みを持つ不動産であると考え、お客様に安心してお取引頂けるよう、情報収集からアフターサービスまで、トータルでサポートさせて頂きます。
							</p>
						</div>
					</div>
				</div>
				
				<!-- slanted-svg-button.php -->
				<?php
					get_template_part('template-parts/slanted-svg-button', null, [
						'label' => 'TOPページへ戻る',
						'width' => '336px',
						'url'   => home_url('/')
					]);
				?>
			</div>
		</section>
		</div>
	</div>
	</section>
</main>
<!-- footer -->
<?php
    get_template_part('template-parts/footer'); // footer.php をインクルード
?> 