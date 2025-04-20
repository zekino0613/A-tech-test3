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
        <div class="logo">
					<a href="<?php echo home_url('/'); ?>#">
						<img class="card__image"
								src="<?php echo get_template_directory_uri(); ?>/assets/images/a-tech3_image/logo.webp"
								width="124" 
								height="62"
								loading="lazy"
								alt="ヘッダーロゴ">
					</a>			
        </div>
				<nav class="main-nav">
					<ul>
						<li><a href="<?php echo home_url('/'); ?>#">TOP</a></li>
						<li><a href="<?php echo home_url('/service/'); ?>">サービス内容</a></li>
						<li><a href="<?php echo home_url('/about/'); ?>">事業概要</a></li>
						<li><a href="<?php echo home_url('/company/'); ?>">会社概要</a></li>
						<li><a href="<?php echo home_url('/column/'); ?>">家を買う理由</a></li>
						<li><a href="<?php echo home_url('/recruitment/'); ?>">採用情報</a></li>
						<li><a href="<?php echo get_post_type_archive_link('news'); ?>">お知らせ</a></li>
						<li class="contact"><a href="<?php echo home_url('/contact-form/'); ?>">お問い合わせ</a></li>
					</ul>
				</nav>
				
			</div>


        

        <div class="header__inner--sp">
					<div class="logo">
						<a href="<?php echo home_url('/'); ?>#">
							<img class="card__image"
									src="<?php echo get_template_directory_uri(); ?>/assets/images/a-tech3_image/logo.webp"
									width="124" 
									height="62"
									loading="lazy"
									alt="ヘッダーロゴ">
						</a>			
					</div>

            <div class="hamburger">
              <div class="hamburger__lines">
								<span class="hamburger__lines--line"></span>
								<span class="hamburger__lines--line"></span>
                <span class="hamburger__lines--line"></span>
              </div>
            </div>

            <!--  オーバーレイメニュー   -->
            <div id="overlay-menu" class="overlay-menu">
							<nav class="main-nav">
								<ul>
									<li><a href="<?php echo home_url('/'); ?>#">TOP</a></li>
									<li><a href="<?php echo home_url('/service/'); ?>">サービス内容</a></li>
									<li><a href="<?php echo home_url('/about/'); ?>">事業概要</a></li>
									<li><a href="<?php echo home_url('/company/'); ?>">会社概要</a></li>
									<li><a href="<?php echo home_url('/column/'); ?>">家を買う理由</a></li>
									<li><a href="<?php echo home_url('/recruitment/'); ?>">採用情報</a></li>
									<li><a href="<?php echo get_post_type_archive_link('news'); ?>">お知らせ</a></li>
									<li><a href="<?php echo home_url('/privacy/'); ?>">プライバシーポリシー</a></li>
									<li class="contact"><a href="<?php echo home_url('/contact-form/'); ?>">お問い合わせ</a></li>
								</ul>
							</nav>
            </div>

        </div>
      </div>
    </div>
  </header>