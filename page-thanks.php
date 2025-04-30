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
				<h3 class="section-title__eng">news</h3>
				<span class="section-title__ja">お知らせ一覧</span>		
			</div>
			
			<a href="<?php echo home_url('/'); ?>" class="btn-pattern2 fade-in">
				<p class="btn-pattern2__text">TOPにもどる</p>
				<i class="fa-solid fa-angle-right"></i>
			</a>
		</div>
  </section>








  </main>





<!-- ---footer読み込み ----------------------------------------------->
<?php
  get_template_part('template-parts/footer'); // footer.php をインクルード
?>
<!-- ---------------------------------------------------------------------->
</body>     