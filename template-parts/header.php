<!DOCTYPE html>

<head>
  <meta charset="UTF-8">
  <title>桜のこもれびキッズランド｜日本全国の認証・認可保育園</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="桜のこもれびキッズランドは関東、関西など日本全国各地で保育園を運営しています。子供たちが楽しく学び、成長するための保育環境を提供しています。さまざまな情報やイベント情報をお届けします。">
  <link rel="canonical" href="https://a-tech2.zekino0613.com/" />
	<!-- --公開前はnoindexを無効にする  -->
  <!-- <meta name="robots" content="noindex"> -->
  <!-- 【TOPページのOGP設定】 -->
  <meta property="og:site_name" content="桜のこもれびキッズランド｜日本全国の認証・認可保育園">
  <meta property="og:title" content="桜のこもれびキッズランド｜日本全国の認証・認可保育園">
  <meta property="og:description" content="桜のこもれびキッズランドは関東、関西など日本全国各地で保育園を運営しています。子供たちが楽しく学び、成長するための保育環境を提供しています。さまざまな情報やイベント情報をお届けします。">
  <meta property="og:type" content="website" />
  <meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/assets/images/kidsland_image/design-parts/no-image.webp">
  <meta property="og:url" content="https://a-tech2.zekino0613.com/">
  <!-- 【その他のページOGP設定】 -->
  <?php
  // 固定ページ: わたしたちのこと
  if (is_page('about')): ?>
    <title>わたしたちのこと</title>
    <meta name="description" content="桜のこもれびキッズランドは、子供たちの成長を支える保育園です。一瞬一瞬しかない木漏れ日のような子どもたちの魅力を見つけ出し大切に育てます。安心して成長できる環境を提供し、笑顔あふれる毎日をお約束します。私たちの教育方針や取り組みについてご紹介します。">
    <meta property="og:site_name" content="桜のこもれびキッズランド｜日本全国の認証・認可保育園">
    <meta property="og:title" content="わたしたちのこと｜桜のこもれびキッズランド｜日本全国の認証・認可保育園">
    <meta property="og:description" content="桜のこもれびキッズランドは、子供たちの成長を支える保育園です。一瞬一瞬しかない木漏れ日のような子どもたちの魅力を見つけ出し大切に育てます。安心して成長できる環境を提供し、笑顔あふれる毎日をお約束します。私たちの教育方針や取り組みについてご紹介します。">
    <meta property="og:type" content="website" />
    <meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/assets/images/kidsland_image/design-parts/no-image.webp">
    <meta property="og:url" content="<?php echo get_permalink(); ?>">
  <?php
  // archiveページ: 各園のご紹介
  elseif (is_page('introduction')): ?>
    <title>各園のご紹介｜桜のこもれびキッズランド｜日本全国の認証・認可保育園</title>
    <meta name="description" content="全国に店舗を構える女性向け脱毛サロンVALENTINE ROSEのメニュー料金ページです。VIO、脚、顔、背中などの全身の脱毛に対応しており、痛みが少なく短期間で高い脱毛効果を得ることができる脱毛サービスがリーズナブルな価格で提供されています。">
    <meta property="og:site_name" content="桜のこもれびキッズランド｜日本全国の認証・認可保育園">
    <meta property="og:title" content="各園のご紹介｜桜のこもれびキッズランド｜日本全国の認証・認可保育園">
    <meta property="og:description" content="桜のこもれびキッズランドは関東、関西など日本全国各地で保育園を運営しています。各地の桜のこもれびキッズランドの園内の様子や園長からのメッセージ、園の概要についてご紹介します。">
    <meta property="og:type" content="website" />
    <meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/assets/images/kidsland_image/design-parts/no-image.webp">
    <meta property="og:url" content="<?php echo get_post_type_archive_link('introduction'); ?>">
  <?php
  // archiveページ: こもれびだより
  elseif (is_post_type_archive('letter')): ?>
    <title>こもれびだより｜桜のこもれびキッズランド｜日本全国の認証・認可保育園</title>
    <meta name="description" content="VALENTINE ROSEの最新ニュースやお知らせを一覧でご覧いただけます。VALENTINE ROSEの最新情報はこちらをご確認ください。">
    <meta property="og:site_name" content="桜のこもれびキッズランド｜日本全国の認証・認可保育園">
    <meta property="og:title" content="こもれびだより｜桜のこもれびキッズランド｜日本全国の認証・認可保育園">
    <meta property="og:description" content="こもれびだよりでは、日本全国各地に展開する桜のこもれびキッズランド各園の日々の様子やお知らせ、最新情報、イベント情報についてお届けします。">
    <meta property="og:type" content="website" />
    <meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/assets/images/kidsland_image/design-parts/no-image.webp">
    <meta property="og:url" content="<?php echo get_post_type_archive_link('letter'); ?>">
  <?php
  // archiveページ: お知らせ
  elseif (is_post_type_archive('info')): ?>
    <title>お知らせ｜桜のこもれびキッズランド｜日本全国の認証・認可保育園</title>
    <meta name="description" content="VALENTINE ROSEの最新ニュースやお知らせを一覧でご覧いただけます。VALENTINE ROSEの最新情報はこちらをご確認ください。">
    <meta property="og:site_name" content="桜のこもれびキッズランド｜日本全国の認証・認可保育園">
    <meta property="og:title" content="お知らせ｜桜のこもれびキッズランド｜日本全国の認証・認可保育園">
    <meta property="og:description" content="お知らせページでは、日本全国各地の桜のこもれびキッズランドの全体としてのお知らせや、運営団体の活動紹介、メディア情報についてお届けします。">
    <meta property="og:type" content="website" />
    <meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/assets/images/kidsland_image/design-parts/no-image.webp">
    <meta property="og:url" content="<?php echo get_post_type_archive_link('info'); ?>">
  <?php
  // 固定ページ: 採用情報
  elseif (is_page('recruit')): ?>
    <title>採用情報｜桜のこもれびキッズランド｜日本全国の認証・認可保育園</title>
    <meta name="description" content="桜のこもれびキッズランドで働く保育士やスタッフが大切にしていることや募集要項などの採用情報、よくある質問をご紹介します。保育士はもちろん、栄養士、調理師、看護師、事務など様々な形で一緒に働く仲間を募集しています。応募はエントリーフォームから。">
    <meta property="og:site_name" content="桜のこもれびキッズランド｜日本全国の認証・認可保育園">
    <meta property="og:title" content="採用情報｜桜のこもれびキッズランド｜日本全国の認証・認可保育園">
    <meta property="og:description" content="桜のこもれびキッズランドで働く保育士やスタッフが大切にしていることや募集要項などの採用情報、よくある質問をご紹介します。保育士はもちろん、栄養士、調理師、看護師、事務など様々な形で一緒に働く仲間を募集しています。応募はエントリーフォームから。">
    <meta property="og:type" content="website" />
    <meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/assets/images/kidsland_image/design-parts/no-image.webp">
    <meta property="og:url" content="<?php echo get_permalink(); ?>">
  <?php
  // 固定ページ: お問い合わせ
  elseif (is_page('contact-form')): ?>
    <title>お問い合わせ｜桜のこもれびキッズランド｜日本全国の認証・認可保育園</title>
    <meta name="description" content="桜のこもれびキッズランドへのお問い合わせはこちらから。ご入園や見学のご相談、その他ご質問など、お気軽にお問い合わせください。">
    <meta property="og:site_name" content="桜のこもれびキッズランド｜日本全国の認証・認可保育園">
    <meta property="og:title" content="お問い合わせ｜桜のこもれびキッズランド｜日本全国の認証・認可保育園">
    <meta property="og:description" content="桜のこもれびキッズランドへのお問い合わせはこちらから。ご入園や見学のご相談、その他ご質問など、お気軽にお問い合わせください。">
    <meta property="og:type" content="website" />
    <meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/assets/images/kidsland_image/design-parts/no-image.webp">
    <meta property="og:url" content="<?php echo get_permalink(); ?>">
  <?php endif; ?>

  <!--【フォント】-->
  <!-- "Kosugi Maru" -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Kosugi+Maru&display=swap" rel="stylesheet">
  <!-- "Yusei Magic" -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Yusei+Magic&display=swap" rel="stylesheet">
  <!-- "Jost" -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
  <!-- fontawesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

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
        <nav class="h-nav">
          <ul class="h-nav__ul">
            <li class="h-nav__ul--li">
              <div class="line-border"></div>
              <a href="<?php echo home_url('/about/'); ?>">
                <div class="header-icon">
                  <img
                    class="header-icon__img"
                    src="<?php echo get_template_directory_uri(); ?>/assets/images/kidsland_image/design-parts/sakura-icon.webp"
                    loading="lazy"
                    alt="aboutアイコン">
                  <p class="header-icon__title">わたしたちのこと</p>
                  <span class="header-icon__english">about</span>
                </div><!-- /header-iconheader-icon -->
              </a>
            </li>
            <li class="h-nav__ul--li">
              <div class="line-border"></div>
              <a href="<?php echo get_post_type_archive_link('introduction'); ?>">
                <div class="header-icon">
                  <img
                    class="header-icon__img"
                    src="<?php echo get_template_directory_uri(); ?>/assets/images/kidsland_image/design-parts/tree-icon.webp"
                    loading="lazy"
                    alt="introductionアイコン">
                  <p class="header-icon__title">各園のご紹介</p>
                  <span class="header-icon__english">introduction</span>
                </div><!-- /header-iconheader-icon -->
              </a>
            </li>
            <li class="h-nav__ul--li">
              <div class="line-border"></div>
              <a href="<?php echo get_post_type_archive_link('letter'); ?>">
                <div class="header-icon">
                  <img
                    class="header-icon__img"
                    src="<?php echo get_template_directory_uri(); ?>/assets/images/kidsland_image/design-parts/tayori-icon.webp"
                    loading="lazy"
                    alt="letterアイコン">
                  <p class="header-icon__title">こもれびだより</p>
                  <span class="header-icon__english">letter</span>
                </div><!-- /header-iconheader-icon -->
              </a>
            </li>
            <li class="h-nav__ul--logo-li">
              <div class="line-border"></div>
              <a href="<?php echo home_url('/'); ?>#">
                <img
                  class="h-logo-img"
                  src="<?php echo get_template_directory_uri(); ?>/assets/images/kidsland_image/design-parts/sakura-logo.webp"
                  loading="lazy"
                  alt="ヘッダーロゴ">
              </a>
            </li>
            <li class="h-nav__ul--li">
              <div class="line-border"></div>
              <a href="<?php echo get_post_type_archive_link('info'); ?>">
                <div class="header-icon">
                  <img
                    class="header-icon__img"
                    src="<?php echo get_template_directory_uri(); ?>/assets/images/kidsland_image/design-parts/bell-oshirase-icon.webp"
                    loading="lazy"
                    alt="infoアイコン">
                  <p class="header-icon__title">お知らせ</p>
                  <span class="header-icon__english">info</span>
                </div><!-- /header-iconheader-icon -->
              </a>
            </li>
            <li class="h-nav__ul--li">
              <div class="line-border"></div>
              <a href="<?php echo home_url('/recruit-form/'); ?>">
                <div class="header-icon">
                  <img
                    class="header-icon__img"
                    src="<?php echo get_template_directory_uri(); ?>/assets/images/kidsland_image/design-parts/pen-icon.webp"
                    loading="lazy"
                    alt="recruitアイコン">
                  <p class="header-icon__title">採用情報</p>
                  <span class="header-icon__english">recruit</span>
                </div><!-- /header-iconheader-icon -->
              </a>
            </li>
            <li class="h-nav__ul--li">
              <div class="line-border"></div>
              <a href="<?php echo home_url('/contact-form/'); ?>">
                <div class="header-icon">
                  <img
                    class="header-icon__img"
                    src="<?php echo get_template_directory_uri(); ?>/assets/images/kidsland_image/design-parts/letter-icon.webp"
                    loading="lazy"
                    alt="contactアイコン">
                  <p class="header-icon__title">お問い合わせ</p>
                  <span class="header-icon__english">contact</span>
                </div><!-- /header-iconheader-icon -->
              </a>
              <div class="line-border line-border-last"></div> <!-- 追加（右側の点線） -->
            </li>
          </ul>  
        </nav>
      </div> <!--< /.header__inner--pc >  -->

        <div class="header__inner--sp">
          <div class="h-bg">
            <a href="<?php echo home_url('/'); ?>#">
              <img
                class="h-bg__logo"
                src="<?php echo get_template_directory_uri(); ?>/assets/images/kidsland_image/design-parts/sakura-logo.webp"
                loading="lazy"
                alt="ヘッダーロゴ">
            </a>

            <div class="hamburger">
              <div class="hamburger__lines">
              <span class="hamburger__lines--line"></span>
              <span class="hamburger__lines--line"></span>
                <span class="hamburger__lines--line"></span>
              </div>
              <p class="hamburger__menu">menu</p>
              <p class="hamburger__close">closed</p>
            </div>

            <!--  オーバーレイメニュー   -->
            <div id="overlay-menu" class="overlay-menu">
              <nav class="h-nav">
                <ul class="h-nav__ul">
                  <li class="h-nav__ul--li">
                  <a href="<?php echo home_url('/about/'); ?>">
                      <div class="header-icon">
                        <img
                          class="header-icon__img"
                          src="<?php echo get_template_directory_uri(); ?>/assets/images/kidsland_image/design-parts/sakura-icon.webp"
                          loading="lazy"
                          alt="aboutアイコン">
                        <p class="header-icon__title">わたしたちのこと</p>
                        <span class="header-icon__english">about</span>
                      </div><!-- /header-iconheader-icon -->
                    </a>
                  </li>
                  <li class="h-nav__ul--li">
                    <a href="<?php echo get_post_type_archive_link('introduction'); ?>">
                      <div class="header-icon">
                        <img
                          class="header-icon__img"
                          src="<?php echo get_template_directory_uri(); ?>/assets/images/kidsland_image/design-parts/tree-icon.webp"
                          loading="lazy"
                          alt="introductionアイコン">
                        <p class="header-icon__title">各園のご紹介</p>
                        <span class="header-icon__english">introduction</span>
                      </div><!-- /header-iconheader-icon -->
                    </a>
                  </li>
                  <li class="h-nav__ul--li">
                    <a href="<?php echo get_post_type_archive_link('letter'); ?>">
                      <div class="header-icon">
                        <img
                          class="header-icon__img"
                          src="<?php echo get_template_directory_uri(); ?>/assets/images/kidsland_image/design-parts/tayori-icon.webp"
                          loading="lazy"
                          alt="letterアイコン">
                        <p class="header-icon__title">こもれびだより</p>
                        <span class="header-icon__english">letter</span>
                      </div><!-- /header-iconheader-icon -->
                    </a>
                  </li>
                  <li class="h-nav__ul--li">
                    <a href="<?php echo get_post_type_archive_link('info'); ?>">
                      <div class="header-icon">
                        <img
                          class="header-icon__img"
                          src="<?php echo get_template_directory_uri(); ?>/assets/images/kidsland_image/design-parts/bell-oshirase-icon.webp"
                          loading="lazy"
                          alt="infoアイコン">
                        <p class="header-icon__title">お知らせ</p>
                        <span class="header-icon__english">info</span>
                      </div><!-- /header-iconheader-icon -->
                    </a>
                  </li>
                  <li class="h-nav__ul--li">
                    <a href="<?php echo home_url('/recruit-form/'); ?>">
                      <div class="header-icon">
                        <img
                          class="header-icon__img"
                          src="<?php echo get_template_directory_uri(); ?>/assets/images/kidsland_image/design-parts/pen-icon.webp"
                          loading="lazy"
                          alt="recruitアイコン">
                        <p class="header-icon__title">採用情報</p>
                        <span class="header-icon__english">recruit</span>
                      </div><!-- /header-iconheader-icon -->
                    </a>
                  </li>
                  <li class="h-nav__ul--li">
                    <a href="<?php echo home_url('/contact-form/'); ?>">
                      <div class="header-icon">
                        <img
                          class="header-icon__img"
                          src="<?php echo get_template_directory_uri(); ?>/assets/images/kidsland_image/design-parts/letter-icon.webp"
                          loading="lazy"
                          alt="contactアイコン">
                        <p class="header-icon__title">お問い合わせ</p>
                        <span class="header-icon__english">contact</span>
                      </div><!-- /header-iconheader-icon -->
                    </a>
                  </li>
                </ul>  
              </nav>
            </div>

        </div>
      </div>
    </div>
  </header>