  <!-- ---footer読み込み ----------------------------------------------->
  <?php
    get_template_part('template-parts/header'); // header.php をインクルード
  ?>
  <!-- ---------------------------------------------------------------------->

<main>
	
<div class="circle-loop">
	<img class="card__image"
						src="<?php echo get_template_directory_uri(); ?>/assets/images/a-tech3_image/text-circle.webp"
						width="205" 
						height="205"
						loading="lazy"
						alt="サークル">
</div>
	<section id="mainvisual">mainvisual</section>
	<section id="property">property</section>
	<section id="service">service</section>
	<section id="about">about</section>
	<section id="recruit">recruit</section>
	<section id="news">news</section>
  <!-- ---footer読み込み ----------------------------------------------->
  <?php
    get_template_part('template-parts/footer'); // footer.php をインクルード
  ?>
  <!-- ---------------------------------------------------------------------->
</main>


</body>
