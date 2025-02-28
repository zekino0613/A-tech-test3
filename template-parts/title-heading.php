<?php
// スラッグを取得する関数
function get_current_slug() {
    global $post;

    if (is_page()) {
        // **固定ページのスラッグを取得**
        return get_post_field('post_name', get_queried_object_id());

    } elseif (is_post_type_archive()) {
        return get_query_var('post_type'); // カスタム投稿タイプのアーカイブページ → `投稿タイプ名`

    } elseif (is_singular()) {
        if (!empty($post->post_type) && !empty($post->post_name)) {
            return $post->post_type; // シングルページも `投稿タイプ名` のみを使用
        } else {
            return 'single-default'; // デフォルトのシングルページ用スラッグ
        }
    } elseif (is_category() || is_tag() || is_tax()) {
        $term = get_queried_object();
        return isset($term->slug) ? $term->slug : '';
    } elseif (is_404()) {
        return '404';
    }
    return ''; // どれにも該当しない場合
}

// 現在のスラッグを取得
$slug = get_current_slug();

// タイトルリスト（スラッグごとに設定）
$title_list = [
    // **固定ページ**
    'about'          => ['title' => 'わたしたちのこと', 'subtitle' => 'About'],
    'site-map'       => ['title' => 'サイトマップ', 'subtitle' => 'Sitemap'],
    'privacy-policy' => ['title' => 'プライバシーポリシー', 'subtitle' => 'Privacy Policy'],
    '404'            => ['title' => 'お探しのページが<br class="brsp">見あたりません。', 'subtitle' => 'Page Not Found'],

    // **カスタム投稿タイプ（`archive.php` & `single.php` 共通）**
    'introduction'   => ['title' => '各園のご紹介', 'subtitle' => 'Introduction'],
    'letter'         => ['title' => 'こもれびだより', 'subtitle' => 'Letter'],
    'info'           => ['title' => 'お知らせ', 'subtitle' => 'Info'],
    'news'           => ['title' => 'ニュース一覧', 'subtitle' => 'News Archive'],
    'event'          => ['title' => 'イベント情報', 'subtitle' => 'Event Archive'],

    // **フォーム関連**
    'recruit-form'         => ['title' => '採用情報', 'subtitle' => 'Recruit'],
    'recruit-form-confirm' => ['title' => '採用情報', 'subtitle' => 'Recruit'],
    'contact-form'         => ['title' => 'お問い合わせ', 'subtitle' => 'Contact'],
    'contact-form-confirm' => ['title' => 'お問い合わせ', 'subtitle' => 'Contact'],
    'thanks'               => ['title' => 'お問い合わせ<br class="brsp">ありがとうございます。', 'subtitle' => 'Thank You for Contacting Us'],
];
// **パンくずリストを非表示にするページ**
$hide_breadcrumbs = [
  'contact-form-confirm',
  'recruit-form-confirm',
  'thanks',
];

// デフォルトタイトル（未定義スラッグ用）
$default_title = ['title' => 'ページタイトル', 'subtitle' => 'Title'];

// `$slug` に一致するタイトルがあるかチェック
$section_title = isset($title_list[$slug]) ? $title_list[$slug] : $default_title;
?>





<section id="sub-mainvisual">
  <div class="sub-mainvisual__inner">
    <div class="sub-mainvisual__inner--page-title">
      <div class="title-wrapper">
        <!-- HTML タグをエスケープ ↓  -->
        <h1><?php echo wp_kses_post($section_title['title']); ?></h1>
        <p><?php echo esc_html($section_title['subtitle']); ?></p>
      </div>
      <!-- パンくずリスト -->
    </div>

    <?php
      // **特定のページではパンくずリストを非表示にする**
      if (!in_array($slug, $hide_breadcrumbs, true)) {
        if (function_exists('yoast_breadcrumb')) {
          yoast_breadcrumb('<nav class="sub-mainvisual__inner--breadcrumbs">', '</nav>');
        }
      }
    ?>
  </div><!-- / -->  
</section>