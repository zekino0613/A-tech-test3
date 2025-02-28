<!-- パーツ --------------------------------->
<!-- header -->
<?php
    get_template_part('template-parts/header'); // header.php をインクルード
?>
<!-- footer -->
<?php
    get_template_part('template-parts/footer'); // footer.php をインクルード
?>  

<!-- title-heading -->
<?php
    get_template_part('template-parts/title-heading'); // title-heading をインクルード
?>

<!-- title-icon -->
<?php
  get_template_part('template-parts/title-icon', null, ['name' => 'recruit']);// title-icon をインクルード
?>


<!-- セクション --------------------------------->
<!--section/ recruit -->
<?php
    get_template_part('template-parts/recruit'); // recruit をインクルード
?>





<!-- 共通パーツ確認 --------------------------------->
<!-- .btn  -->
<a href="<?php echo home_url('/contact-form/'); ?>" class="btn">
  <p class="btn__text">エントリー</p>
  <i class="fa-solid fa-angle-right"></i>
</a>


<!-- .btn-pattern2  -->
<a href="<?php echo home_url('/'); ?>" class="btn-pattern2">
      <p class="btn-pattern2__text">TOPにもどる</p>
      <i class="fa-solid fa-angle-right"></i>
    </a>