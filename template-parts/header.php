<!DOCTYPE html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="canonical" href="https://a-tech2.zekino0613.com" />
	<!-- --公開前はnoindexを無効にする  -->
  <!-- <meta name="robots" content="noindex"> -->
	<!-- 【TOPページのOGP設定】 -->
	<?php if (is_front_page()): ?>
		<title>株式会社ネクストリアルティ｜不動産の可能性を発見し、最適な選択を。</title>
		<meta name="description" content="日本全国のご自宅用不動産の売買コンサルティングを行っている株式会社ネクストリアルティのホームページです。不動産を通じてお客様のより良いライフプランを実現するために、お客様へのヒアリングから販売会社の斡旋、アフターフォローまでお手伝いします。">
		<meta property="og:site_name" content="株式会社ネクストリアルティ">
		<meta property="og:title" content="株式会社ネクストリアルティ｜不動産の可能性を発見し、最適な選択を。">
		<meta property="og:description" content="日本全国のご自宅用不動産の売買コンサルティングを行っている株式会社ネクストリアルティのホームページです。不動産を通じてお客様のより良いライフプランを実現するために、お客様へのヒアリングから販売会社の斡旋、アフターフォローまでお手伝いします。">
		<meta property="og:type" content="website" />
		<meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/assets/images/a-tech3_image/ogp-image.webp">
		<meta property="og:url" content="<?php echo home_url(); ?>">
  <?php endif; ?> 
  <!-- 【その他のページOGP設定】 -->
  <?php
  // archiveページ: NEWSお知らせ
	if  (is_post_type_archive('news')): ?>
    <title>お知らせ｜株式会社ネクストリアルティ</title>
    <meta name="description" content="ネクストリアルティのお知らせ一覧ページ。最新の不動産情報やサービスの更新、イベント情報をお届けします。不動産に関する最新ニュースはこちらをチェックしてください。">
    <meta property="og:site_name" content="株式会社ネクストリアルティ">
    <meta property="og:title" content="お知らせ一覧｜株式会社ネクストリアルティ">
    <meta property="og:description" content="ネクストリアルティのお知らせ一覧ページ。最新の不動産情報やサービスの更新、イベント情報をお届けします。不動産に関する最新ニュースはこちらをチェックしてください。">
    <meta property="og:type" content="website" />
    <meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/assets/images/a-tech3_image/ogp-image.webp">
    <meta property="og:url" content="<?php echo get_post_type_archive_link('news'); ?>">
  <?php endif; ?> 
	<!-- fontawesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

  <!--【フォント】-->
  <!-- "Puritan" -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Puritan:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
	<!-- "Noto Sans JP" -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100..900&display=swap" rel="stylesheet">
  <?php wp_head(); ?>
</head>


<body <?php body_class(); ?>>
<div class="scroll-to-top" id="scrollToTop"><i class="fa-solid fa-chevron-up"></i></div>


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
              <a href="<?php echo get_post_type_archive_link('news'); ?>">
                <div class="header-icon">
                  <img
                    class="header-icon__img"
                    src="<?php echo get_template_directory_uri(); ?>/assets/images/kidsland_image/design-parts/bell-oshirase-icon.webp"
                    loading="lazy"
                    alt="infoアイコン">
                  <p class="header-icon__title">お知らせ</p>
                  <span class="header-icon__english">news</span>
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
                    <a href="<?php echo get_post_type_archive_link('news'); ?>">
                      <div class="header-icon">
                        <img
                          class="header-icon__img"
                          src="<?php echo get_template_directory_uri(); ?>/assets/images/kidsland_image/design-parts/bell-oshirase-icon.webp"
                          loading="lazy"
                          alt="infoアイコン">
                        <p class="header-icon__title">お知らせ</p>
                        <span class="header-icon__english">news</span>
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