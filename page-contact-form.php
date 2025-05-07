<?php
    get_template_part('template-parts/header'); // header.php をインクルード
?>
<main>
<!-- ---other-mainvisual読み込み ----------------------------------------------->
<?php
	get_template_part('template-parts/other-mainvisual'); // other-mainvisual.php をインクルード
?>
<!-- ---------------------------------------------------------------------->

  <section id="contact-form-section">
    <div class="contact-form-section__inner">
			<div class="contact-top">
				<div class="section-title">
					<h3 class="section-title__eng">contact</h3>
					<span class="section-title__ja">お問い合わせ</span>		
				</div>
				
				<p class="contact-top__text">
					当社へのお問い合わせはこちらからお願いします。
				</p>
			</div>
			
      <div class="contact-form-wrapper">
        <?php echo apply_shortcodes('[contact-form-7 id="6e37d1f" title="ご予約・お問い合わせ"]'); ?>
      </div>
    </div><!-- /contact-form-section__inner -->
  </section>
</main>




<!-- ---footer読み込み ----------------------------------------------->
<?php
  get_template_part('template-parts/footer'); // footer.php をインクルード
?>
<!-- ---------------------------------------------------------------------->
</body>     