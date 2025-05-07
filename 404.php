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

  <section id="error-404">
    <p class="p1">申し訳ございません。<br>
      お探しのページは見つかりませんでした。<br>
      以下の可能性がございます。<br>
    </p>
    <br>
    <p class="p2">
      ・URLが変更された<br>
      ・ページが存在しない
    </p>
    <br>
    <p class="p3">恐れ入りますが、以下のリンクからお探しのページにお入りください。</p> 
  </section><!-- /error-404 -->

	
			<!-- slanted-svg-button.php -->
			<?php
			get_template_part('template-parts/slanted-svg-button', null, [
				'label' => 'TOPページへ戻る',
				'width' => '336px',
				'url'   => home_url('/')
			]);
			?>




<?php
get_template_part('template-parts/footer'); // footer.php をインクルード
?>
</body>