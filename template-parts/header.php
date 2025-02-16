<!DOCTYPE html>

<head>
  <meta charset="UTF-8">
  <title>VALENTINE ROSE | 女性専用の全国チェーン脱毛サロン</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="全国に店舗を構える女性向け脱毛サロン VALENTINVE ROSEは、VIO、脚、腕、背中などの全身の脱毛に対応しています。 痛みが少なく短期間で高い脱毛効果を得ることができ ある脱毛サービスをリーズナブルな価格で提供しています。">
  <link rel="canonical" href="【正規化するURL】" />
  <!-- <meta name="robots" content="noindex">公開前はnoindexを無効にする -->
  <!-- 【TOPページのOGP設定】 -->
  <meta property="og:site_name" content="VALENTINE ROSE">
  <meta property="og:title" content="VALENTINE ROSE | 女性専用の全国チェーン脱毛サロン">
  <meta property="og:description" content="全国に店舗を構える女性向け脱毛サロンVALENTINVE ROSEは、VIO、脚、腕、背中などの全身の脱毛に対応しています。痛みが少なく短期間で高い脱毛効果を得ることができる脱毛サービスをリーズナブルな価格で提供しています。">
  <meta property="og:type" content="website" />
  <meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/assets/images/A-TECH-TEST-image/test-image/img/ogp-image.webp">
  <meta property="og:url" content="https://zekino0613.com">
  <!-- 【その他のページOGP設定】 -->
    <?php
      // 固定ページ: サロンコンセプト
      if (is_page('concept')): ?>
          <title>サロンコンセプト | VALENTINE ROSE</title>
          <meta name="description" content="全国に店舗を構える女性向け脱毛サロンVALENTINE ROSEは、「洗練されたワンランク上の女性を目指すために」というモットーで、お客様一人ひとりに合わせたオーダーメイドのプランを提供し、お客様の女性磨きを全力でサポートいたします。">
          <meta property="og:site_name" content="VALENTINE ROSE">
          <meta property="og:title" content="サロンコンセプト | VALENTINE ROSE">
          <meta property="og:description" content="全国に店舗を構える女性向け脱毛サロンVALENTINE ROSEは、「洗練されたワンランク上の女性を目指すために」というモットーで、お客様一人ひとりに合わせたオーダーメイドのプランを提供し、お客様の女性磨きを全力でサポートいたします。">
          <meta property="og:type" content="website" />
          <meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/assets/images/ogp/ogp-image.webp">
          <meta property="og:url" content="<?php echo get_permalink(); ?>">
      <?php
      // 固定ページ: メニュー料金
      elseif (is_page('price-menu')): ?>
          <title>メニュー料金 | VALENTINE ROSE</title>
          <meta name="description" content="全国に店舗を構える女性向け脱毛サロンVALENTINE ROSEのメニュー料金ページです。VIO、脚、顔、背中などの全身の脱毛に対応しており、痛みが少なく短期間で高い脱毛効果を得ることができる脱毛サービスがリーズナブルな価格で提供されています。">
          <meta property="og:site_name" content="VALENTINE ROSE">
          <meta property="og:title" content="メニュー料金 | VALENTINE ROSE">
          <meta property="og:description" content="全国に店舗を構える女性向け脱毛サロンVALENTINE ROSEのメニュー料金ページです。VIO、脚、顔、背中などの全身の脱毛に対応しており、痛みが少なく短期間で高い脱毛効果を得ることができる脱毛サービスがリーズナブルな価格で提供されています。">
          <meta property="og:type" content="website" />
          <meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/assets/images/ogp/ogp-image.webp">
          <meta property="og:url" content="<?php echo get_permalink(); ?>">
      <?php
      // ニュースアーカイブページ
      elseif (is_post_type_archive('news')): ?>
          <title>ニュース一覧 | VALENTINE ROSE</title>
          <meta name="description" content="VALENTINE ROSEの最新ニュースやお知らせを一覧でご覧いただけます。VALENTINE ROSEの最新情報はこちらをご確認ください。">
          <meta property="og:site_name" content="VALENTINE ROSE">
          <meta property="og:title" content="ニュース一覧 | VALENTINE ROSE">
          <meta property="og:description" content="VALENTINE ROSEの最新ニュースやお知らせを一覧でご覧いただけます。VALENTINE ROSEの最新情報はこちらをご確認ください。">
          <meta property="og:type" content="website" />
          <meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/assets/images/ogp/ogp-image.webp">
          <meta property="og:url" content="<?php echo get_post_type_archive_link('news'); ?>">
      <?php
      // 固定ページ: 予約・お問い合わせ
      elseif (is_page('reserve')): ?>
          <title>予約・お問い合わせ | VALENTINE ROSE</title>
          <meta name="description" content="全国に店舗を構える女性向け脱毛サロンVALENTINE ROSEの予約・お問い合わせページです。VIO、脚、顔、背中などの全身の脱毛に対応しており、痛みが少なく短期間で高い脱毛効果を得ることができる脱毛サービスがリーズナブルな価格で提供されています。ご予約はこちらからどうぞ。">
          <meta property="og:site_name" content="VALENTINE ROSE">
          <meta property="og:title" content="予約・お問い合わせ | VALENTINE ROSE">
          <meta property="og:description" content="全国に店舗を構える女性向け脱毛サロンVALENTINE ROSEの予約・お問い合わせページです。VIO、脚、顔、背中などの全身の脱毛に対応しており、痛みが少なく短期間で高い脱毛効果を得ることができる脱毛サービスがリーズナブルな価格で提供されています。ご予約はこちらからどうぞ。">
          <meta property="og:type" content="website" />
          <meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/assets/images/ogp/ogp-image.webp">
          <meta property="og:url" content="<?php echo get_permalink(); ?>">
    <?php endif; ?>

  <!--【フォント】-->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Parisienne&display=swap" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Marcellus&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://kit.fontawesome.com/d4a0aa4940.css" crossorigin="anonymous">
    <!-- レイアウトシフト/フォントのプリロード -->
    <link rel="preload" href="path/to/font.woff2" as="font" type="font/woff2" crossorigin="anonymous">
  <!-- <link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css"> -->
  <!-- 【function.php管理】 -->
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/reset.css">
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/style.css">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div class="scroll-to-top" id="scrollToTop"><i class="fa-solid fa-chevron-up"></i></div>
  
  <?php
    // ページ判定
    $header_class = 'subpage-header'; // デフォルト

    if (is_front_page()) {
        $header_class = 'home-header'; // トップページ
    }
  ?>

  <header id="header" class="<?php echo esc_attr($header_class); ?>">
    <div class="header__inner">
      <div class="header__inner--pc">
        <a class="a-logo" href="<?php echo home_url('/'); ?>#">
          <div class="h-logo">
            <img loading="lazy" class="h-logo__img" src="<?php echo get_template_directory_uri(); ?>/assets/images/A-TECH-TEST-image/test-image/img/logo.webp" alt="ヘッダーロゴ">
            <h1 class="h-logo__text">VALENTINE <br>ROSE</h1>
          </div>
        </a>

        <ul class="h-nav">
          <li class="h-nav__li"><a href="<?php echo home_url('/concept/'); ?>#concept">Concept</a></li>
          <li class="h-nav__li"><a href="<?php echo home_url('/price-menu/'); ?>#price-menu">Price</a></li>
          <li class="h-nav__li"><a href="<?php echo get_post_type_archive_link('news'); ?>">News</a></li>
          <li><a class="btn" href="<?php echo home_url('/reserve/'); ?>"><i class="fa-solid fa-calendar-days"></i>ご予約</a></li>
        </ul>
      </div><!--< /.header__inner--pc >  -->

      <div class="header__inner--sp">
        <div class="h-list">
          <a class="h-list__img" href="<?php echo home_url('/'); ?>#">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/A-TECH-TEST-image/test-image/img/logo.webp" 
                loading="lazy" 
                alt="ヘッダーSPロゴ">
          </a>
          
          <div class="hamburger btn">
            <p class="hamburger__text">メニュー</p>
            <div class="hamburger__lines">
              <span class="hamburger__lines--line"></span>
              <span class="hamburger__lines--line"></span>
              <span class="hamburger__lines--line"></span>
            </div>   
          </div> 

          <!--  オーバーレイメニュー   -->
          <div id="overlay-menu" class="overlay-menu">
            <nav>
              <ul>
                <li><a href="<?php echo home_url('/'); ?>">HOME</a></li>
                <li><a href="<?php echo home_url('/concept/'); ?> ">SALON CONCEPT</a></li>
                <li><a href="<?php echo home_url('/price-menu/'); ?>#price-menu">PRICE MENU</a></li>
                <li><a href="<?php echo get_post_type_archive_link('salons'); ?>">SALONS</a></li>
                <li><a href="<?php echo get_post_type_archive_link('news'); ?>">NEWS</a></li>
                <li><a href="<?php echo home_url('/reserve/'); ?>">RESERVE</a></li>
              </ul>
            </nav>
          </div>
        </div>   
      </div>  
    </div>  
  </header> 