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
	<section id ="column-body">
		<!-- 背景セクション ------------------------------------------->
		<div class="triangle-contents">
			<div class="triangle-contents__bg-wrap">
				<div class="triangle-contents__bg left1"></div>
				<div class="triangle-contents__bg right1"></div>
				<div class="triangle-contents__bg left2"></div>
				<div class="triangle-contents__bg right2"></div>
			</div>
		</div>

		<!-- 背景セクション ------------------------------------------->

		
		
		<!-- メインコンテンツ ----------------------------------------	-->
		<div class="main-content">
			<div class="main-content__inner">
				<!-- Column -->
				<section id= "page-column">
					<div class="page-column__inner container">
						<div class="section-title">
							<h3 class="section-title__eng">column</h3>
							<span class="section-title__ja">家を買う理由</span>		
						</div>
						
						<div class="colmun-bg">
							<h3 class="colmun-bg__text">
								『賃貸』か『購入』か。
							</h3>
						</div>
						
						<p class="column-text">
							誰しも一度は悩んだことがあるのではないでしょうか？<br> 
							賃貸にも購入にも一長一短がありますが、それらをふまえて私たちはあえて購入をおすすめしています。<br>
							こちらでは私たちが購入をお勧めする理由についてご説明します。
						</p>
						
						
						<div class="colmun-content">
							<p class="colmun-content__title">
								持ち家を購入する理由
							</p>
							<!-- 【ナンバーリスト】 -->
							<ol class="number-list">
								<li class="number-list__item">
									<div class="number-list__item--image">
										<img 
												src="<?php echo get_template_directory_uri(); ?>/assets/images/a-tech3_image/column01.webp"
												width="463" 
												height="393"
												loading="lazy"
												alt="column-image1">
									</div>			
									<div class="number-list__item--textarea">
										<h4 class="textarea-title">老後の心配がなくなる</h4>
										<p class="textarea-text">
											「一生賃貸で良い」と考える理由の1つに、「身軽だから」ということがあるかと思います。<br>
											今後収入が仮に減ったとしても、収入にあう家賃の部屋に引越しすればよいという考え方です。<br>
											<br>
											若いうちは賃貸物件の契約は容易ですが、高齢になると賃貸借契約の締結に難色を示すオーナーも多いです。<br>
											高齢者（特に単身者）が、自宅で亡くなった場合、その部屋はいわゆる「事故物件」となり、入居者の募集が困難になり賃料を安くして募集する必要があるためです。<br>
											<br>
											ご自身が購入した自宅であれば、当然そのような心配はなくなり、老後を安心して過ごすことができます。
										</p>
									</div>	
								</li>
								<li class="number-list__item reverse">
									<div class="number-list__item--image">
										<img 
												src="<?php echo get_template_directory_uri(); ?>/assets/images/a-tech3_image/column02.webp"
												width="463" 
												height="393"
												loading="lazy"
												alt="column-image2">
									</div>			
									<div class="number-list__item--textarea">
										<h4 class="textarea-title">住宅費が同じで広い部屋に住める</h4>
										<p class="textarea-text">
											現在賃貸物件にお住まいの方は、月々の賃料はおいくらお支払いでしょうか？<br>
											その賃料を月々住宅ローンの返済にした場合、どれくらいの広さの家へ住むことができるかご存知でしょうか？<br>
											<br>
											地域差もありますが、仮に月々6~7万円くらいの賃貸物件（2LDK、60平米くらい）にお住まいの場合、
											住宅ローンの支払いが6~7万円になる物件を購入すると4LDKで100平米くらいの戸建てになります。
										</p>
									</div>	
								</li>
								<li class="number-list__item">
									<div class="number-list__item--image">
										<img 
												src="<?php echo get_template_directory_uri(); ?>/assets/images/a-tech3_image/column03.webp"
												width="463" 
												height="393"
												loading="lazy"
												alt="column-image3">
									</div>			
									<div class="number-list__item--textarea">
										<h4 class="textarea-title">ご主人に万が一があっても安心</h4>
										<p class="textarea-text">
											住宅ローンを組むと、ローン残高を保険で賄う「団体信用生命保険」へ加入するので、
											ご主人に万が一のことがあっても、住宅ローンの残債はなくなります。
										</p>
									</div>	
								</li>
								<li class="number-list__item reverse list-item4">
									<div class="number-list__item--image">
										<img 
												src="<?php echo get_template_directory_uri(); ?>/assets/images/a-tech3_image/column04.webp"
												width="463" 
												height="393"
												loading="lazy"
												alt="column-image4">
									</div>			
									<div class="number-list__item--textarea">
										<h4 class="textarea-title">住宅ローンの金利が低い</h4>
										<p class="textarea-text item4">
											現在（2021年10月現在）の住宅ローン金利は、変動金利が約0.4%〜、固定金利が約1%〜と、史上最低水準となっています。<br>
											物件によっては、毎月の家賃の支払いと住宅ローンの返済額が変わらず、将来的には資産になる持ち家の方が得だと考える方も多いようです。 <br>
											<br>
											持ち家の場合は固定資産税や、マンションの場合は、管理費、修繕積立金を支払わなければならないですが、
											それらを踏まえても家賃の支払いと変わらない額の返済額で持ち家が持てる経済情勢となっています。
										</p>
									</div>	
								</li>
								<li class="number-list__item">
									<div class="number-list__item--image">
										<img 
												src="<?php echo get_template_directory_uri(); ?>/assets/images/a-tech3_image/column05.webp"
												width="463" 
												height="393"
												loading="lazy"
												alt="column-image5">
									</div>			
									<div class="number-list__item--textarea">
										<h4 class="textarea-title">住宅ローン控除がある</h4>
										<p class="textarea-text item5">
											住宅ローンを組むと10年間で最大400万円の料金が還付されますが、支払った賃料は当然戻ってきません。<br>
											※床面積や年収上限などの条件があります。
										</p>
									</div>	
								</li>
							</ol>
							
								<!-- slanted-svg-button.php -->
								<?php
									get_template_part('template-parts/slanted-svg-button', null, [
										'label' => 'TOPページへ戻る',
										'width' => '336px',
										'url'   => home_url('/')
									]);
								?>
						</div><!-- / -->		
					</div>
				</section>
				
				
			</div>
		</div>	
	</section>
</main>



</main>
<!-- footer -->
<?php
    get_template_part('template-parts/footer'); // footer.php をインクルード
?> 