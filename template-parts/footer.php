<footer id="footer"> 
  <div class="footer__inner">
		<div class="footer-top">
			<div class="footer-top__content">
				<h3 class="footer-top__content--title">contact us</h3>
				<p class="footer-top__content--text">
					サービスについてのご相談・ご質問など<br>
					お気軽にお問い合わせください。
				</p>
				<div class="footer-top__content--bg"></div>
				
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
		</div>
		
		<div class="footer-bottom-wrapper">
			<div class="footer-bottom">
				<div class="footer-bottom__inner">
					<div class="footer-bottom__inner--flex">
						<a class="footer-logo" href="<?php echo home_url('/'); ?>#">
							<img class="footer-logo__image"
									src="<?php echo get_template_directory_uri(); ?>/assets/images/a-tech3_image/logo2.webp"
									width="78" 
									height="82"
									loading="lazy"
									alt="ヘッダーロゴ">
						</a>			
						
						<nav class="footer-nav">
							<ul>
								<li><a href="<?php echo home_url('/'); ?>#">TOP</a></li>
								<li><a href="<?php echo home_url('/service/'); ?>">当社の特徴</a></li>
								<li><a href="<?php echo home_url('/about/'); ?>">事業概要</a></li>
								<li><a href="<?php echo home_url('/company/'); ?>">会社概要</a></li>
								<li><a href="<?php echo home_url('/column/'); ?>">家を買う理由</a></li>
								<li><a href="<?php echo home_url('/recruitment/'); ?>">採用情報</a></li>
								<li><a href="<?php echo home_url('/privacy/'); ?>">プライバシーポリシー</a></li>
							</ul>
						</nav>
					</div>	
					
					<address class="footer-bottom__address">
						<p class="footer-bottom__address--company">株式会社　ネクストリアルティ</p>
						<p class="footer-bottom__address--detail">〒123-4567</p>
						<p class="footer-bottom__address--detail">東京都八王子市上野町365-9</p>
					</address>
					
				</div>
			</div>	
		</div>
  </div><!-- /.footer__inner -->
	<p class="fooer-end"> &copy;株式会社ネクストリアルティ All rights reserved.</p>
</footer> 


  <?php wp_footer(); ?> 
  </body>   
</html> 
