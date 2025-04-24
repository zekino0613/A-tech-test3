<!-- パーツ --------------------------------->
<!-- header -->
<?php
    get_template_part('template-parts/header'); // header.php をインクルード
?>
<!-- footer -->
<?php
    get_template_part('template-parts/footer'); // footer.php をインクルード
?>  




<!-- セクション --------------------------------->




<!-- 共通パーツ確認 --------------------------------->

<!-- 【サークルループ】 -->
<div class="circle-loop">
	<img class="card__image"
						src="<?php echo get_template_directory_uri(); ?>/assets/images/a-tech3_image/text-circle.webp"
						width="205" 
						height="205"
						loading="lazy"
						alt="サークル">
</div>


<!--【h3セクションタイトル】 -->
<div class="section-title">
	<h3 class="section-title__eng">service</h3>
	<span class="section-title__ja">サービス内容</span>
</div>

<!--【ボタン】 テンプレートパーツ （slanted-svg-button.php）  -->
<?php
get_template_part('template-parts/slanted-svg-button', null, [
  'label' => 'View more',
	'width' => '400px', // ✅ ここで幅を指定
  'url'   => home_url('/about/')
]);
?>


<!-- 【ボタン】グラデーション -->
<a href="#entry" class="gradient-entry-button">
  エントリーする
</a>



<!-- 【ナンバーリスト】 -->
<ol class="number-list">
  <li class="number-list__item">
		<img class="image"
								src="<?php echo get_template_directory_uri(); ?>/assets/images/a-tech3_image/logo.webp"
								width="140" 
								height="140"
								loading="lazy"
								alt="image">
		<div class="textarea">
			<h4 class="textarea__title">応募</h4>
			<p class="textarea__text">
				こちらまで履歴書と職務経歴書をお送りください。 info@next-realty.com
			</p>
		</div>	
  </li>
</ol>






