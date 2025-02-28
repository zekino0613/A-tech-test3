<?php
/**
 * タイトルアイコンコンポーネント
 * 明示的に指定したキー（例: "Recruit"）でデータを取得
 */

// 呼び出し元から渡される `$args` に `name` があるか確認（なければ 'Default' を使う）
$name = $args['name'] ?? 'Default';

// 指定できるタイトルのリスト（ここで全てのデータを一括管理）
$title_data = [
  // 共通sakura-singleのアイコン ------------------------------------------
    'welcome' => [
        'image' => 'assets/images/kidsland_image/design-parts/sakura-single.png',
        'title' => '桜のこもれびキッズランドへ <br>ようこそ',
        'english_title' => 'Welcome'
    ],
    'philosophy' => [
        'image' => 'assets/images/kidsland_image/design-parts/sakura-single.png',
        'title' => 'わたしたちの想い',
        'english_title' => 'philosophy'
    ],
    'motto' => [
        'image' => 'assets/images/kidsland_image/design-parts/sakura-single.png',
        'title' => 'たいせつにしていること',
        'english_title' => 'motto'
    ],
    // ----------------------------------------------------------------
    // /共通treeのアイコン ------------------------------------------
    'introduction' => [
        'image' => 'assets/images/kidsland_image/design-parts/tree-icon.webp',
        'title' => '各園のご紹介',
        'english_title' => 'introduction'
    ],
    'yearly-Program' => [
        'image' => 'assets/images/kidsland_image/design-parts/tree-icon.webp',
        'title' => '年間行事予定',
        'english_title' => 'yearly Program'
    ],
    // ----------------------------------------------------------------
    'recruit' => [
        'image' => 'assets/images/kidsland_image/design-parts/pen-icon.webp',
        'title' => '採用情報',
        'english_title' => 'Recruit'
    ],
    'contact' => [
        'image' => 'assets/images/kidsland_image/design-parts/letter-icon.webp',
        'title' => 'お問い合わせ',
        'english_title' => 'Contact'
    ],
    'inside' => [
        'image' => 'assets/images/kidsland_image/design-parts/camera-icon.webp',
        'title' => '園の様子',
        'english_title' => 'inside'
    ],
    'message' => [
        'image' => 'assets/images/kidsland_image/design-parts/letter-open-icon.webp',
        'title' => '園長からのメッセージ',
        'english_title' => 'message'
    ],
    'about-nursery' => [
        'image' => 'assets/images/kidsland_image/design-parts/bell-icon.webp',
        'title' => '園の概要',
        'english_title' => 'about nursery'
    ],
    'letter' => [
        'image' => 'assets/images/kidsland_image/design-parts/tayori-icon.webp',
        'title' => 'こもれびだより',
        'english_title' => 'letter'
    ],
    'site-map' => [
        'image' => 'assets/images/kidsland_image/design-parts/site-map-icon.webp',
    ],
    // デフォルト（未定義の場合）
    'Default' => [
        'image' => 'assets/images/kidsland_image/design-parts/default-icon.webp',
        'title' => 'ページタイトル',
        'english_title' => 'Title'
    ],
];

// 指定された `$name` に対応するデータを取得（なければ `Default`）
$data = $title_data[$name] ?? $title_data['Default'];
?>

<h3 class="title-icon">
  <div class="title-icon__bg">
    <img class="title-icon__bg--img"
        src="<?php echo esc_url(get_template_directory_uri() . '/' . $data['image']); ?>"
        loading="lazy"
        alt="<?php echo esc_attr($data['title']) . ' アイコン'; ?>">
  </div><!-- /title-icon -->

  <!-- `wp_kses_post()` を使用して `<br>` を適用可能にする -->
  <p class="title-icon__title"><?php echo wp_kses_post($data['title']); ?></p>
  <span class="title-icon__english"><?php echo esc_html($data['english_title']); ?></span>
</h3>
