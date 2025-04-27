<!-- ---header読み込み ----------------------------------------------->
<?php
    get_template_part('template-parts/header'); // header.php をインクルード
?>
<!-- ---------------------------------------------------------------------->

<main>
<!-- ---other-mainvisual読み込み ----------------------------------------------->
<?php
	get_template_part('template-parts/other-mainvisual'); // other-mainvisual.php をインクルード
?>
<!-- ---------------------------------------------------------------------->

<!-- Service -->
<section id="page-service">
	<div class="page-service__inner">
		<div class="title-content">
		<div class="title-content__inner container">
				<!--【h3セクションタイトル】 -->
				<div class="section-title">
					<h3 class="section-title__eng">service</h3>
					<span class="section-title__ja">サービス内容</span>		
				</div>
				
				<p class="title-content__inner--contenttext">
				不動産を通じてお客様のより良いライフプランを実現するために、
				お客様へのヒアリングから販売会社の斡旋、アフターフォロ ーまでお手伝いします。
				</p>
			</div>
		</div>
		
		<div class="tab-content">
			<div class="tab-content__inner container">
				<!-- タブアイコン -->
				<div class="service-list-wrap">
					<div class="service-list">
						<div class="service-list__tab is-active" data-tab="tab1">
							<img class="service-list__tab--image1"
										src="<?php echo get_template_directory_uri(); ?>/assets/images/a-tech3_image/top-service01.webp"
										width="150.5" 
										height="106"
										loading="lazy"
										alt="ライフプランニング">
							<p class="service-list__tab--text">ライフプランニング</p>
							<span class="arrow"></span>
						</div>
						<div class="service-list__tab" data-tab="tab2">
							<img class="service-list__tab--image2"
										src="<?php echo get_template_directory_uri(); ?>/assets/images/a-tech3_image/top-service02.webp"
										width="116" 
										height="108"
										loading="lazy"
										alt="販売会社の選定">
							<p class="service-list__tab--text">販売会社の選定</p>
							<span class="arrow"></span>
						</div>
						<div class="service-list__tab" data-tab="tab3">
							<img class="service-list__tab--image3"
										src="<?php echo get_template_directory_uri(); ?>/assets/images/a-tech3_image/top-service03.webp"
											width="136" 
											height="110"
										loading="lazy"
										alt="斡旋">
							<p class="service-list__tab--text">斡旋</p>
							<span class="arrow"></span>
						</div>
						<div class="service-list__tab" data-tab="tab4">
							<img class="service-list__tab--image4"
										src="<?php echo get_template_directory_uri(); ?>/assets/images/a-tech3_image/top-service04.webp"
											width="98" 
											height="103"
										loading="lazy"
										alt="アフターフォロー">
							<p class="service-list__tab--text">アフターフォロー</p>
							<span class="arrow"></span>
						</div>
					</div>
				</div>
					
				<!-- テキストエリア -->
				<div class="service-textarea">
					<div class="service-textarea__desc is-show" id="tab1">
						<p>お客様のご年齢、ご年収、ご家族構成や理想の生活などをヒアリングし、ライフプランニングをさせていただきます。理想の将来から逆算し、最適な資産運用のご提案をさせていただきます。</p>
					</div>
					<div class="service-textarea__desc" id="tab2">
						<p>ヒアリングの内容を基に、お客様に最適な販売会社の選定を行います。沢山の選択肢から最適なご提案をさせていただきます。</p>
					</div>
					<div class="service-textarea__desc" id="tab3">
						<p>弊社より、斡旋させていただきます。進める中でわからないことはもちろん、ご不安に思うことなどがあればこちらからフォローさせていただきます。</p>
					</div>
					<div class="service-textarea__desc" id="tab4">
						<p>購入後・売却後も何かお困りごとがあればお気軽にご相談くださいませ。アフターフォローもしっかりと行い、お客様の理想の未来の実現をサポートさせていただきます。</p>
					</div>
				</div>
			</div>	
		</div>	
	</div>	
</section>

<!-- voice.php -->
<?php get_template_part('template-parts/voice'); ?>



</main>
<!-- footer -->
<?php
    get_template_part('template-parts/footer'); // footer.php をインクルード
?> 