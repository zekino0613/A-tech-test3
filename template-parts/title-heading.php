<?php
// 現在のページスラッグを取得
$slug = get_post_field('post_name');

// タイトルリスト（スラッグごとに設定）
$title_list = [
    'about'        => ['title' => 'わたしたちのこと', 'subtitle' => 'About'],
    'introduction' => ['title' => '各園のご紹介', 'subtitle' => 'Introduction'],
    'letter'       => ['title' => 'こもれびだより', 'subtitle' => 'Letter'],
    'info'         => ['title' => 'お知らせ', 'subtitle' => 'Info'],
    'recruit-form'      => ['title' => '採用情報', 'subtitle' => 'Recruit'],
    'contact-form'      => ['title' => 'お問い合わせ', 'subtitle' => 'Contact'],
];

// デフォルトタイトル（未定義スラッグ用）
$default_title = ['title' => 'ページタイトル', 'subtitle' => 'Title'];

// 該当スラッグがあれば取得、なければデフォルト
$section_title = isset($title_list[$slug]) ? $title_list[$slug] : $default_title;


?>

<section class="page-title">
    <div class="title-wrapper">
        <h1><?php echo esc_html($section_title['title']); ?></h1>
        <p><?php echo esc_html($section_title['subtitle']); ?></p>
    </div>
</section>
