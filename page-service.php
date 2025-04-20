<!-- header -->
<?php
    get_template_part('template-parts/header'); // header.php をインクルード
?>
<main>
  

<div class="service">
service
</div><!-- / -->

<section class="service-section">
	<div class="service-tab-list">
    <div class="service-tab is-active" data-tab="tab1">
      <img class="card__image"
						src="<?php echo get_template_directory_uri(); ?>/assets/images/a-tech3_image/top-service01.webp"
						width="220" 
						height="230"
						loading="lazy"
						alt="ライフプランニング">
      <p>ライフプランニング</p>
      <span class="arrow"></span>
    </div>
    <div class="service-tab" data-tab="tab2">
      <img class="card__image"
						src="<?php echo get_template_directory_uri(); ?>/assets/images/a-tech3_image/top-service02.webp"
						width="220" 
						height="230"
						loading="lazy"
						alt="販売会社の選定">
      <p>販売会社の選定</p>
      <span class="arrow"></span>
    </div>
    <div class="service-tab" data-tab="tab3">
      <img class="card__image"
						src="<?php echo get_template_directory_uri(); ?>/assets/images/a-tech3_image/top-service03.webp"
						width="220" 
						height="230"
						loading="lazy"
						alt="斡旋">
      <p>斡旋</p>
      <span class="arrow"></span>
    </div>
    <div class="service-tab" data-tab="tab4">
      <img class="card__image"
						src="<?php echo get_template_directory_uri(); ?>/assets/images/a-tech3_image/top-service04.webp"
						width="220" 
						height="230"
						loading="lazy"
						alt="アフターフォロー">
      <p>アフターフォロー</p>
      <span class="arrow"></span>
    </div>
  </div>

	<div class="service-contents">
    <div class="service-desc is-show" id="tab1">
      <p>お客様のご年齢、ご年収、ご家族構成や理想の生活などをヒアリングし、ライフプランニングをさせていただきます。理想の将来から逆算し、最適な資産運用のご提案をさせていただきます。</p>
    </div>
    <div class="service-desc" id="tab2">
      <p>ヒアリングの内容を基に、お客様に最適な販売会社の選定を行います。沢山の選択肢から最適なご提案をさせていただきます。</p>
    </div>
    <div class="service-desc" id="tab3">
      <p>弊社より、斡旋させていただきます。進める中でわからないことはもちろん、ご不安に思うことなどがあればこちらからフォローさせていただきます。</p>
    </div>
    <div class="service-desc" id="tab4">
      <p>購入後・売却後も何かお困りごとがあればお気軽にご相談くださいませ。アフターフォローもしっかりと行い、お客様の理想の未来の実現をサポートさせていただきます。</p>
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