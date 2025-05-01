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

	<section class="contact-form-confirm"> 
		<div class="contact-form-section-confirm__inner">
			<div class="contact-top">
				<div class="section-title">
					<h3 class="section-title__eng">news</h3>
					<span class="section-title__ja">お知らせ一覧</span>		
				</div>
		
				<div class="contact-form-wrapper">
					<?php echo apply_shortcodes('[contact-form-7 id="cef9339" title="ご予約・お問い合わせ_確認画面"]'); ?> 
				</div>
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