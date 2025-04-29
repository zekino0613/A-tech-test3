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
	<section id= "page-company">
		<div class="page-company__inner container">
			<div class="section-title">
				<h3 class="section-title__eng">company</h3>
				<span class="section-title__ja">会社概要</span>		
			</div>
			
			<p class="section-text">
				当社は2010年創業以来、ご自宅や収益物件の売買に関するコンサルティング業務を主に関東地方と中部地方、中国地方にて行っております。 <br>
				<br>
				お客さまのライフプランやご要望をヒアリングさせて頂いた上で、未公開物件情報を中心に情報提供させて頂きます。
			</p>
			
					
			<div class="company-info-warpper">
				<div class="company-info">
					<dl class="company-info__block">
						<dt>商号</dt>
						<div class="dd-content">
							<dd>株式会社ネクストリアルティ</dd>
						</div>	
					</dl>
					
					<dl class="company-info__block">
						<dt>代表者名</dt>
						<div class="dd-content">
							<dd>山田太郎</dd>
						</div>	
					</dl>
					
					<dl class="company-info__block">
						<dt>設立年月</dt>
						<div class="dd-content">
							<dd>2001/7/27</dd>
						</div>	
					</dl>
					
					<dl class="company-info__block">
						<dt>資本金</dt>
						<div class="dd-content">
							<dd>10,000,000円</dd>
						</div>	
					</dl>
					
					<dl class="company-info__block padding1">
						<dt>本社</dt>
						<div class="dd-content">
							<dd><address>123-4567</address></dd>
							<dd><address>東京都八王子市上野町365-9</address></dd>
						</div>	
					</dl>
					
					<dl class="company-info__block">
						<dt>TEL</dt>
						<div class="dd-content">
							<dd><address>01-2345-6789</address></dd>
							<dd>
								<time datetime="10:00">10:00</time> - <time datetime="18:00">18:00</time>
								<span>(火曜，水曜を除く)</span>
							</dd>
						</div>	
					</dl>
					
					<dl class="company-info__block">
						<dt>FAX</dt>
						<div class="dd-content">
							<dd><address>01-2345-6780</address></dd>
						</div>	
					</dl>
					
					<dl class="company-info__block">
						<dt>E-MAIL</dt>
						<div class="dd-content">
							<dd><address>info@next-realty.com</address></dd>
						</div>	
					</dl>
					
					<dl class="company-info__block">
						<dt>営業時間</dt>
						<div class="dd-content">
							<dd><time datetime="10:00">10:00</time> ～ <time datetime="20:00">20:00</time></dd>
						</div>	
					</dl>
					
					<dl class="company-info__block">
						<dt>定休日</dt>
						<div class="dd-content">
							<dd>火曜、水曜</dd>
						</div>	
					</dl>
					
					<dl class="company-info__block">
						<dt>事業内容</dt>
						<div class="dd-content">
							<dd>居住用物件の売買コンサルティング</dd>
							<dd>収益物件（投資用不動産）の売買コンサルティング</dd>
							<dd>不動産物件情報の提携業務</dd>
							<dd>金融商品情報の提携業務</dd>
							<dd>不動産，保険，金融商品の販売会社の選定斡旋</dd>
							<dd>建築物のリフォーム及びリノベーション事業</dd>
							<dd>損害保険の代理業</dd>
						</div>	
					</dl>
					
					<dl class="company-info__block">
						<dt>取引銀行</dt>
						<div class="dd-content">
							<dd>みずほ銀行</dd>
						</div>	
					</dl>
				</div>
			</div>
			
			
		</div>					
	</section>
	
	<section id= "access">
		<div class="access__inner container">
			<div class="section-title">
				<h3 class="section-title__eng">ACCESS</h3>
				<span class="section-title__ja">アクセス</span>		
			</div>
			
			<!-- <div class="company-info-warpper"> -->
				<div class="access-content"> 
					
					<!--
						<div class="access-map">
							<iframe
								src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3242.241203581092!2d139.32707051525876!3d35.65627618019871!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x60191d6c0b6ae9d1%3A0x49a087abbbf56a0f!2z5LiJ6YeO5biC5p2x5Yy66KW_5bSO5biC5LiA5bO2!5e0!3m2!1sja!2sjp!4v1713615140000!5m2!1sja!2sjp"
								width="776"
								height="386" 
								style="border:0;"
								allowfullscreen="" 
								loading="lazy"
								referrerpolicy="no-referrer-when-downgrade">
							</iframe>
						</div>
					-->
						
					<div 
						class="access-map"
						style="background-color: #e0e0e0;"></div>
					
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
				
		</div>
	</section>

  


</main>
<!-- footer -->
<?php
    get_template_part('template-parts/footer'); // footer.php をインクルード
?> 