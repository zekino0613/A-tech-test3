<!-- header -->
<?php
    get_template_part('template-parts/header'); // header.php をインクルード
?>
<main>
<!-- ---other-mainvisual読み込み ----------------------------------------------->
<?php
	get_template_part('template-parts/other-mainvisual'); // other-mainvisual.php をインクルード
?>
	<!------------------------------------------------------------------------>
	<section id ="recruitment-body">
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
				<!-- Recruitment -->
				<section id= "page-recruitment">
					<div class="page-recruitment__inner container">
						<div class="section-title">
							<h3 class="section-title__eng">recruitment</h3>
							<span class="section-title__ja">採用情報</span>		
						</div>
						
						<p class="section-text">
							株式会社ウィズでは、<br class= "brnot">
							コンサルティング営業職・投資用不動産営業職を募集しています。<br>
							お客様の老後の問題、住宅に対して解決案を提案していく営業活動です。
						</p>
						
						
						<div class="work">
							<div class="work-detail">
								<div class="work-detail__textarea">
									<h4 class="work-detail__textarea--label">
										求める人物像
									</h4>
									<ul class="work-detail__textarea--list">
										<li>お客様の幸せを考えられる方</li>
										<li>不動産が好きな方</li>
										<li>接客が好きな方</li>
									</ul>
								</div>
								
								<div class="work-detail__textarea">
									<h4 class="work-detail__textarea--label">
										仕事内容
									</h4>
									<p class="work-detail__textarea--text">
										住宅営業コンサルティングをメインとして行なっております。<br> 
										お客様の不動産に対しての問題点、課題に対して解決案をしていく営業活動です。
									</p>
								</div>
							</div>
							
							<div class="work-image">
								<img 
									src="<?php echo get_template_directory_uri(); ?>/assets/images/a-tech3_image/recruitment01.webp"
									width="463" 
									height="393"
									loading="lazy"
									alt="募集要項画像">
							</div>
						</div>

						<div class="recruitment-list">
							<h4 class="recruitment-list__title">募集要項</h4>
							
							<div class="recruit-info-warpper">
								<div class="recruit-info">
									<dl class="recruit-info__block">
										<dt>勤務地</dt>
										<div class="dd-content">
											<dd>当社本社（港南1丁目9-36 アレア品川ビル13 階）</dd>
											<dd>【交通手段】</dd>
											<dd>JR山手線「品川」駅徒歩3分</dd>
											<dd>※転勤無し</dd>
										</div>	
									</dl>

									<dl class="recruit-info__block">
										<dt>勤務時間</dt>
										<div class="dd-content">
											<dd>10:00～20:00</dd>
										</div>	
									</dl>

									<dl class="recruit-info__block">
										<dt>事業内容</dt>
										<div class="dd-content">
											<dd>月給25万円以上</dd>
											<dd>経験・スキルを考慮し優遇</dd>
											<br>
											<dd>【年収例】</dd>
											<dd>400万円／月給30万円＋賞与＋インセンティブ（入社5年目）</dd>
										</div>
									</dl>
									
									<dl class="recruit-info__block">
										<dt>待遇・福利厚生</dt>
										<div class="dd-content">
											<dd>昇給（年1回）</dd>
											<dd>賞与（年2回）</dd>
											<dd>インセンティブ制度</dd>
											<dd>交通費全額支給</dd>
											<dd>社会保険完備</dd>
											<dd>退職金制度</dd>
											<dd>住宅手当</dd>
											<dd>短時間勤務制度</dd>
											<dd>試用期間3ヶ月（待遇変動なし）</dd>
										</div>	
									</dl>

									<dl class="recruit-info__block">
										<dt>休日・休暇</dt>
										<div class="dd-content">
											<dd>週休2日制（火・水曜）</dd>
											<dd>夏季休暇</dd>
											<dd>年末年始休暇</dd>
											<dd>有給（半日取得も可能）</dd>
											<dd>産前産後休暇</dd>
											<dd>育児休暇</dd>
										</div>	
									</dl>
								</div>
							</div>			
						</div>
						
						
						<!-- 【ナンバーリスト】 -->
						<ol class="number-list">
							<h4 class="number-list__title">応募の流れ</h4>
							<li class="number-list__item">
								<div class="number-list__item--image">
									<img class="img1"
											src="<?php echo get_template_directory_uri(); ?>/assets/images/a-tech3_image/recruitment-flow01.webp"
											width="50" 
											height="119"
											loading="lazy"
											alt="面接画像">
								</div>			
								<div class="textarea">
									<h4 class="textarea__title">応募</h4>
									<p class="textarea__text">
										こちらまで履歴書と職務経歴書をお送りください。<br>
										info@next-realty.com
									</p>
								</div>	
							</li>
							
							<li class="number-list__item">
								<div class="number-list__item--image">
									<img class="img2"
											src="<?php echo get_template_directory_uri(); ?>/assets/images/a-tech3_image/recruitment-flow02.webp"
											width="103" 
											height="59"
											loading="lazy"
											alt="面接画像">
								</div>		
								<div class="textarea">
									<h4 class="textarea__title">面接</h4>
									<p class="textarea__text">
										当社代表と採用担当者との面接です。<br>
										当日は簡単な筆記テストも実施しますので、筆記具をご用意ください。
									</p>
								</div>	
							</li>
							
							<li class="number-list__item">
								<div class="number-list__item--image">
									<img class="img3"
											src="<?php echo get_template_directory_uri(); ?>/assets/images/a-tech3_image/recruitment-flow03.webp"
											width="101" 
											height="82"
											loading="lazy"
											alt="結果通知画像">
								</div>	
								<div class="textarea">
									<h4 class="textarea__title">結果通知</h4>
									<p class="textarea__text">
										メールにて結果を通知します。 <br>
										出社日や雇用条件を調整します。
									</p>
								</div>	
							</li>
						</ol>
						
						<!--【ボタン】グラデーション -->
						<div class="gradient-entry-button-wrapper">
							<a href="#entry" class="gradient-entry-button">
								エントリーする
							</a>
						</div>
						
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