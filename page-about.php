<!-- header -->
<?php
    get_template_part('template-parts/header'); // header.php をインクルード
?>
<main>
  <!-- title-heading -->
  <?php
    get_template_part('template-parts/title-heading'); // title-heading をインクルード
  ?>

  <section id="philosophy">
    <div class="philosophy__inner">      
      <!-- title-icon -->
      <?php
        get_template_part('template-parts/title-icon', null, ['name' => 'philosophy']);// title-icon をインクルード
      ?>

      <p class="philosophy__inner--text">
        桜のこもれびキッズランドは<br>
        子どもたち一人ひとりが独自の輝きを<br class="brsp">放つように、大切な個性を<br class="brsp">伸ばす場所です。<br> 
        風に揺れる木々の葉が織りなす光と影の美しい揺らめきのように、<br>
        子どもたちのそれぞれの魅力を見つけ出し、大切に育てます。<br>
        自然とのふれあいを通じて、<br>
        子どもたちの好奇心や想像力を育み、<br>
        明るく豊かな未来への一歩を<br class="brsp">共に歩んでいきます。<br>
        温かく包み込むような雰囲気の中で、<br> 
        安心して成長できる環境を提供し、<br>
        笑顔あふれる毎日をお約束します。
      </p>
    </div><!-- /.philosophy__inner -->   
  </section>

  <section id="yearly-program">
    <div class="yearly-program__inner">      
      <!-- title-icon -->
      <?php
        get_template_part('template-parts/title-icon', null, ['name' => 'yearly-program']);// title-icon をインクルード
      ?>

      <div class="yearly-list">
        <div class="card">
          <img class="card__image"
            src="<?php echo get_template_directory_uri(); ?>/assets/images/kidsland_image/yearly-program/yearly-program-4.webp"
            loading="lazy"
            alt="yearly-program1">
          <div class="card__textarea">
            <p class="card__textarea--month">4がつ</p>
            <p class="card__textarea--event">進級・入園おめでとうの会</p>
          </div><!-- / -->
        </div><!-- / -->

        <div class="card">
          <img class="card__image"
            src="<?php echo get_template_directory_uri(); ?>/assets/images/kidsland_image/yearly-program/yearly-program-5.webp"
            loading="lazy"
            alt="yearly-program5">
          <div class="card__textarea">
            <p class="card__textarea--month">5がつ</p>
            <p class="card__textarea--event">親子遠足</p>
          </div><!-- / -->
        </div><!-- / -->

        <div class="card">
          <img class="card__image"
            src="<?php echo get_template_directory_uri(); ?>/assets/images/kidsland_image/yearly-program/yearly-program-6.webp"
            loading="lazy"
            alt="yearly-program6">
          <div class="card__textarea">
            <p class="card__textarea--month">6がつ</p>
            <p class="card__textarea--event">運動会</p>
          </div><!-- / -->
        </div><!-- / -->

        <div class="card">
          <img class="card__image"
            src="<?php echo get_template_directory_uri(); ?>/assets/images/kidsland_image/yearly-program/yearly-program-7.webp"
            loading="lazy"
            alt="yearly-program7">
          <div class="card__textarea">
            <p class="card__textarea--month">7がつ</p>
            <p class="card__textarea--event">たなばた会</p>
          </div><!-- / -->
        </div><!-- / -->

        <div class="card">
          <img class="card__image"
            src="<?php echo get_template_directory_uri(); ?>/assets/images/kidsland_image/yearly-program/yearly-program-8.webp"
            loading="lazy"
            alt="yearly-program8">
          <div class="card__textarea">
            <p class="card__textarea--month">8がつ</p>
            <p class="card__textarea--event">夏のお楽しみ会</p>
          </div><!-- / -->
        </div><!-- / -->

        <div class="card">
          <img class="card__image"
            src="<?php echo get_template_directory_uri(); ?>/assets/images/kidsland_image/yearly-program/yearly-program-9.webp"
            loading="lazy"
            alt="yearly-program9">
          <div class="card__textarea">
            <p class="card__textarea--month">9がつ</p>
            <p class="card__textarea--event">親子レクリエーション</p>
          </div><!-- / -->
        </div><!-- / -->

        <div class="card">
          <img class="card__image"
            src="<?php echo get_template_directory_uri(); ?>/assets/images/kidsland_image/yearly-program/yearly-program-10.webp"
            loading="lazy"
            alt="yearly-program10">
          <div class="card__textarea">
            <p class="card__textarea--month">10がつ</p>
            <p class="card__textarea--event">ハロウィン</p>
          </div><!-- / -->
        </div><!-- / -->

        <div class="card">
          <img class="card__image"
            src="<?php echo get_template_directory_uri(); ?>/assets/images/kidsland_image/yearly-program/yearly-program-11.webp"
            loading="lazy"
            alt="yearly-program11">
          <div class="card__textarea">
            <p class="card__textarea--month">11がつ</p>
            <p class="card__textarea--event">秋の収穫体験遠足</p>
          </div><!-- / -->
        </div><!-- / -->

        <div class="card">
          <img class="card__image"
            src="<?php echo get_template_directory_uri(); ?>/assets/images/kidsland_image/yearly-program/yearly-program-12.webp"
            loading="lazy"
            alt="yearly-program12">
          <div class="card__textarea">
            <p class="card__textarea--month">12がつ</p>
            <p class="card__textarea--event">クリスマス会</p>
          </div><!-- / -->
        </div><!-- / -->

        <div class="card">
          <img class="card__image"
            src="<?php echo get_template_directory_uri(); ?>/assets/images/kidsland_image/yearly-program/yearly-program-1.webp"
            loading="lazy"
            alt="yearly-program1">
          <div class="card__textarea">
            <p class="card__textarea--month">1がつ</p>
            <p class="card__textarea--event">新年お楽しみ会</p>
          </div><!-- / -->
        </div><!-- / -->

        <div class="card">
          <img class="card__image"
            src="<?php echo get_template_directory_uri(); ?>/assets/images/kidsland_image/yearly-program/yearly-program-2.webp"
            loading="lazy"
            alt="yearly-program2">
          <div class="card__textarea">
            <p class="card__textarea--month">2がつ</p>
            <p class="card__textarea--event">おゆうぎ会</p>
          </div><!-- / -->
        </div><!-- / -->

        <div class="card">
          <img class="card__image"
            src="<?php echo get_template_directory_uri(); ?>/assets/images/kidsland_image/yearly-program/yearly-program-3.webp"
            loading="lazy"
            alt="yearly-program3">
          <div class="card__textarea">
            <p class="card__textarea--month">3がつ</p>
            <p class="card__textarea--event">ひな祭り会・巣立ちの会 </p>
          </div><!-- / -->
        </div><!-- / -->

        <p class="yearly-list__text">
          ※上記予定は一例です。園や状況により内容は異なりますので、詳しくは園にお問い合わせください。
        </p>
      </div><!-- / -->
    </div>  
  </section>

  <!--section/ contact -->
  <?php
    get_template_part('template-parts/contact'); // recruit をインクルード
  ?>



</main>
<!-- footer -->
<?php
    get_template_part('template-parts/footer'); // footer.php をインクルード
?> 