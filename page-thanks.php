<!-- ---header読み込み ----------------------------------------------->
<?php
    get_template_part('template-parts/header'); // header.php をインクルード
  ?>
  <!-- ---------------------------------------------------------------------->
  <main>
  <!-- title-heading -->
  <?php
      get_template_part('template-parts/title-heading'); // title-heading をインクルード
  ?>


    
  <section id="thanks">
    <p class="p1">数日以内に担当の者からご入力いただいた<br class="brsp">メールアドレスに返信いたします。</p>
    
    <a href="<?php echo home_url('/'); ?>" class="btn-pattern2">
      <p class="btn-pattern2__text">TOPにもどる</p>
      <i class="fa-solid fa-angle-right"></i>
    </a>
  </section>








  </main>





<!-- ---footer読み込み ----------------------------------------------->
<?php
  get_template_part('template-parts/footer'); // footer.php をインクルード
?>
<!-- ---------------------------------------------------------------------->
</body>     