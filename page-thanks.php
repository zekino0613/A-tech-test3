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


    
  <section id="thanks"> 
		<div class="thanks__inner">
			<div class="section-title">
				<h3 class="section-title__eng">contact</h3>
				<span class="section-title__ja">お問い合わせ</span>		
			</div>
			
				<h4>お問い合わせ<br class="brsp">ありがとうございました。</h4>
				<p>担当者より、追って連絡させていただきます。</p>
			
				<!-- slanted-svg-button.php -->
				<?php
					get_template_part('template-parts/slanted-svg-button', null, [
						'label' => 'TOPページへ戻る',
						'width' => '336px',
						'url'   => home_url('/')
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