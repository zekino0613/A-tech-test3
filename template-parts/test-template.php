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

<!--section/ contact -->
<?php
    get_template_part('template-parts/contact'); // recruit をインクルード
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


    <h2 class="section-title">基本理念</h2>
    <h3 class="section-title-sub">（１）個人情報の収集、利用及び提供について</h3>
    <h4>＜スタッフの個人情報＞</h4>
    <ul class="privacy-list">
      <li class="privacy-list__li">お客様に対する育児支援コンサルティング（認可保育所事業、小規模保育所事業、認証保育所事業、自治体保育室事業等）提供のため</li>
    </ul>