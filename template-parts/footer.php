<footer id="footer"> 
  <div class="footer__inner">
		<div class="footer-top">
		<div class="footer-top__content">
			<h3 class="footer-top__content--title">contact us</h3>
			<p class="footer-top__content--text">
				サービスについてのご相談・ご質問など<br>
				お気軽にお問い合わせください。
			</p>
			
			<div class="footer-top__content--flex">
				<div class="footer-button-wrap">
					<div class="footer-button-bg entry-bg"></div>
					<a class="entry footer-button" href="<?php echo home_url('/recruitment/'); ?>">
						<p class="entry__en">entry</p>
						<p class="entry__ja">採用についてはこちらから</p>
						<span class="entry__arrow"></span>
					</a>
				</div>
				<div class="footer-button-wrap">
					<div class="footer-button-bg contact-bg"></div>
					<a class="contact footer-button" href="<?php echo home_url('/contact-form/'); ?>">
						<p class= "contact__en">contact</p>
						<p class= "contact__ja">お問い合わせ</p>
						<span class="contact__arrow"></span>
					</a>
				</div>	
			</div>
			
		</div>
		
		<div class="footer-bottom"></div>
  </div><!-- /.footer__inner -->
	<p>©株式会社ネクストリアルティ All rights reserved.</p>
</footer> 


  <?php wp_footer(); ?> 
  </body>   
</html> 
