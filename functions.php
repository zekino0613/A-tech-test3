<?php

function theme_enqueue_assets(){
// ファイル管理
// -------------------------------------------------------------------------------------
  // jQueryを読み込む
  wp_enqueue_script('jquery');

  // slickのスタイルシートを読み込む
  wp_enqueue_style(
    'slick-css', // ハンドル名
    get_stylesheet_directory_uri() . '/assets/css/slick/slick.css', // slick.cssのパス
    array(), // 依存関係なし
    '1.8.0' // バージョン
  );
  
  // slickのJavaScriptファイルを読み込む
  wp_enqueue_script(
    'slick-js', // ハンドル名
    get_stylesheet_directory_uri() . '/assets/js/slick.js', // slick.min.jsのパス
    array('jquery'), // jQueryに依存
    '1.8.0', // バージョン
    true // フッターで読み込む
  );
  
  wp_enqueue_style(
    'slick-theme-css', // ハンドル名
    get_stylesheet_directory_uri() . '/assets/css/slick/slick-theme.css', // slick-theme.cssのパス
    array('slick-css'), // slick.cssに依存
    '1.8.0' // バージョン
  );


   // common.jsを読み込む (Slick.jsに依存)
  wp_enqueue_script(
    'common-js', // ハンドル名
    get_stylesheet_directory_uri() . '/assets/js/common.js', // common.jsのパス
    array('slick-js'), // slickに依存
    filemtime(get_template_directory() . '/assets/js/common.js'), // ✅ キャッシュ無効化
    '1.0.0', // バージョン
    true // フッターで読み込む
  );



  // リセットCSSを読み込む
  wp_enqueue_style(
    'destyle',
    get_template_directory_uri() . '/assets/css/destyle.min.css'
  );
   // メインのスタイルシートを読み込む（キャッシュ回避のため `filemtime()` を使用）
    wp_enqueue_style(
    'style',
    get_template_directory_uri() . '/assets/css/style.css',
    array('destyle'),
    filemtime(get_template_directory() . '/assets/css/style.css') // ✅ キャッシュを無効化
  );
}
add_action('wp_enqueue_scripts', 'theme_enqueue_assets');

// 【head,メタ情報、OGP設定】
// -------------------------------------------------------------------------------------
// Yoastのタイトルが反映
add_theme_support( 'title-tag' );
//Yoastの head 出力を削除するコード(TOP,archive一覧ページ)
function disable_all_yoast_head_output_on_manual_meta_pages() {
  if (
    is_front_page() ||
    is_post_type_archive('introduction') ||
    is_post_type_archive('letter') ||
    is_post_type_archive('info')
  ) {
    // Yoast SEO の head 出力を確実に無効化
    remove_all_actions('wpseo_head');
  }
}
add_action('template_redirect', 'disable_all_yoast_head_output_on_manual_meta_pages');



// カスタム投稿管理
// -------------------------------------------------------------------------------------

// <お知らせ>
// カスタム投稿タイプ info を登録
  function create_info_post_type() {
    register_post_type( 'info',
      array(
        'labels' => array(
          'name' => __('info'),  // 管理画面のメニューなどで表示される投稿タイプの名前（複数形）
          'singular_name' => __('info')  // 管理画面で表示される投稿タイプの名前（単数形）
        ),
        'public' => true, // 投稿タイプを公開するかどうか。trueにすると、管理画面に表示され、公開されます
        'has_archive' => true, // 投稿タイプにアーカイブページを持たせるかどうか。trueにすると、アーカイブページが生成されます
        'show_in_rest' => true,
        'rewrite' => array('slug' => 'info'), // 投稿タイプのURLスラッグを指定します。例: yoursite.com/news/
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'comments'), // この投稿タイプがサポートする機能を指定します
        'taxonomies'  => array('category'),  // カテゴリを有効にする
      )
    );
  }
  add_action('init', 'create_info_post_type');


  // <各園のご紹介>
  // カスタム投稿タイプ introduction を登録 
  function create_introduction_post_type() {
    register_post_type( 'introduction',
      array(
        'labels' => array(
          'name' => __('introduction'),
          'singular_name' => __('introduction')
        ),
        'public' => true,
        'has_archive' => true,
        'show_in_rest' => true,
        'rewrite' => array('slug' => 'introduction'),
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'comments'),
        'taxonomies' => array('category'), // カテゴリーを有効化
      )
    );
  }
  add_action('init', 'create_introduction_post_type');


  // <こもれびだより>
  // カスタム投稿タイプ letter を登録 
  function create_letter_post_type() {
    register_post_type( 'letter',
      array(
        'labels' => array(
          'name' => __('letter'),
          'singular_name' => __('letter')
        ),
        'public' => true,
        'has_archive' => true,
        'show_in_rest' => true,
        'rewrite' => array('slug' => 'letter'),
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'comments'),
        'taxonomies' => array('category'), // カテゴリーを有効化
      )
    );
  }
  add_action('init', 'create_letter_post_type');




  // 【パンくずリスト】プラグイン名：yoast SEO  ----------------------------------

  // パンくずリストの区切り記号が「>」
  add_filter('wpseo_breadcrumb_separator', function () {
    return '  <i class="fa-solid fa-angle-right"></i>'; // 区切り記号を「>」に変更
});

// パンくずリスト カタカナ表記
add_filter('wpseo_breadcrumb_single_link', 'custom_breadcrumb_labels', 10, 2);
function custom_breadcrumb_labels($link_output, $link) {
    // ページタイトルをカタカナに置き換える
    if (strpos($link_output, 'Home') !== false) {
        $link_output = str_replace('Home', 'TOP', $link_output);
    }
    if (strpos($link_output, 'introduction') !== false) {
      $link_output = str_replace('introduction', '各園のご紹介', $link_output);
    }
    if (strpos($link_output, 'letter') !== false) {
      $link_output = str_replace('letter', 'こもれびだより', $link_output);
    }
		if (strpos($link_output, 'info') !== false) {
      $link_output = str_replace('info', 'お知らせ', $link_output);
    }
    if (strpos($link_output, 'reserve') !== false) {
      $link_output = str_replace('reserve', 'ご予約・お問い合わせ', $link_output);
    }
    if (strpos($link_output, '404') !== false) {
      $link_output = str_replace('404', '404', $link_output);
    }
    return $link_output;
}

// single-letterのパンくずリスト
function custom_yoast_breadcrumb_for_letter($links) {
	if (is_singular('letter')) { // single-letter ページの時のみ変更
			$post_id = get_the_ID();
			$custom_title = get_the_title($post_id); // 投稿のメインタイトル
			$custom_field_title = get_field('article_title', $post_id); // ACFのカスタムフィールド（記事タイトル）

			if ($custom_field_title) {
					// 最後のパンくずのタイトルを「一番上のタイトル + 記事タイトル」に変更
					$last_index = count($links) - 1;
					$links[$last_index]['text'] = esc_html($custom_title . 'からのおたより'.'『' . $custom_field_title.'』' );
			}
	}
	return $links;
}
add_filter('wpseo_breadcrumb_links', 'custom_yoast_breadcrumb_for_letter');


// 404ページの際のパンくずリスト
add_filter( 'wpseo_breadcrumb_links', function( $links ) {
  if ( is_404() ) {
      return array(
          array(
              'text' => 'TOP',
              'url'  => home_url(),
          ),
          array(
              'text' => '404',
              'url'  => '',
          )
      );
  }
  return $links;
});




// archive＜一覧ページ＞
// -------------------------------------------------------------------------------------
  // <各園のご紹介>
  // カスタム投稿タイプ introduction 
  // 住所から都道府県を取得する関数
  function get_prefecture_from_address($address) {
      $prefectures = [
          "北海道", "青森県", "岩手県", "宮城県", "秋田県", "山形県", "福島県",
          "茨城県", "栃木県", "群馬県", "埼玉県", "千葉県", "東京都", "神奈川県",
          "新潟県", "富山県", "石川県", "福井県", "山梨県", "長野県", "岐阜県",
          "静岡県", "愛知県", "三重県", "滋賀県", "京都府", "大阪府", "兵庫県",
          "奈良県", "和歌山県", "鳥取県", "島根県", "岡山県", "広島県", "山口県",
          "徳島県", "香川県", "愛媛県", "高知県", "福岡県", "佐賀県", "長崎県",
          "熊本県", "大分県", "宮崎県", "鹿児島県", "沖縄県"
      ];
  
      foreach ($prefectures as $prefecture) {
          if (strpos($address, $prefecture) !== false) {
              return $prefecture;
          }
      }
      return "不明"; // デフォルト値
  }
  
  // 都道府県一覧を取得（重複削除）
  function get_unique_prefectures() {
      $args = [
          'post_type'      => 'introduction', // 投稿タイプ
          'posts_per_page' => -1, // すべての投稿を取得
      ];
      $query = new WP_Query($args);
  
      $prefectures = [];
      if ($query->have_posts()) {
          while ($query->have_posts()) {
              $query->the_post();
              $address = get_field('nursery_address'); // 住所取得
              if ($address) {
                  // 住所から都道府県を取得
                  $prefecture = get_prefecture_from_address($address);
                  if ($prefecture !== "不明") {
                      $prefectures[] = $prefecture;
                  }
              }
          }
          wp_reset_postdata();
      }
  
      // 重複削除＆ソート
      $unique_prefectures = array_unique($prefectures);
      sort($unique_prefectures);
  
      return $unique_prefectures;
  }
  
  function register_custom_taxonomies() {
    // 園の種類カテゴリー（既存の category タクソノミーを使用）
    register_taxonomy(
        'category',  // 既存のカテゴリー
        'introduction', 
        array(
            'label'             => '園の種類カテゴリー',
            'rewrite'           => array('slug' => 'category'),
            'hierarchical'      => true, // 親子関係を持たせる
            'show_admin_column' => true,
            'show_ui'           => true,
        )
    );

    // 都道府県カテゴリー（新規作成）
    register_taxonomy(
      'prefecture',
      'introduction', // カスタム投稿タイプ
      array(
          'label' => '都道府県',
          'rewrite' => array('slug' => 'prefecture'), // スラッグを指定
          'hierarchical' => true,
          'public' => true,
          'show_ui' => true,
      )
  );


   // お知らせカテゴリー（新規作成）
   register_taxonomy(
    'osirase',
    'info', // カスタム投稿タイプ
    array(
        'label' => 'お知らせ',
        'rewrite' => array('slug' => 'osirase'), // スラッグを指定
        'hierarchical' => true,
        'public' => true,
        'show_ui' => true,
    )
);
}
add_action('init', 'register_custom_taxonomies',0);






//ページネーション
// archive-info
// archive-info のクエリを変更
function modify_info_archive_query($query) {
	if ($query->is_main_query() && !is_admin() && is_post_type_archive('info')) {
			$query->set('posts_per_page', 10); // ✅ 1ページあたりの投稿数を指定
			$query->set('orderby', 'date');
			$query->set('order', 'DESC');
			$query->set('paged', max(1, get_query_var('paged', 1))); // ✅ ページ番号を取得
	}
}
add_action('pre_get_posts', 'modify_info_archive_query');


//ページネーション
// archive-introduction   archive-letter
function modify_archive_queries($query) {
    if (is_admin() || !$query->is_main_query()) {
        return;
    }

  //   if (is_post_type_archive('introduction')) {
  //     $query->set('posts_per_page', 6); // ✅ 表示件数を指定
  //     $query->set('paged', get_query_var('paged') ? get_query_var('paged') : 1); // ✅ ページネーション対応
  // }
    if (is_post_type_archive('letter')) {
        $query->set('posts_per_page', 9);
    }
}
add_action('pre_get_posts', 'modify_archive_queries');

// post_type=introduction というカスタム投稿タイプで、
// URLが https://example.com/introduction/page/2/ のようになったときに
// 正しく2ページ目以降を表示させるためのリライトルールと変数登録をしています。
function add_custom_query_vars($vars) {
  $vars[] = 'paged';
  return $vars;
}
add_filter('query_vars', 'add_custom_query_vars');


function custom_post_type_rewrite_fix() {
  add_rewrite_rule('introduction/page/([0-9]+)/?$', 'index.php?post_type=introduction&paged=$matches[1]', 'top');
}
add_action('init', 'custom_post_type_rewrite_fix');





// archive-letter
// single-introduction の住所から都道府県を取得
function get_prefecture_by_nursery_name($nursery_name) {
  if (empty($nursery_name)) return '';

  // `single-introduction` で `the_title()` と一致する投稿を取得
  $args = [
      'post_type'      => 'introduction',
      'posts_per_page' => 1,
      'title'          => $nursery_name,
  ];

  $query = new WP_Query($args);

  if ($query->have_posts()) {
      $query->the_post();
      $address = get_field('nursery_address'); // `nursery_address` から住所取得
      wp_reset_postdata();

      if ($address) {
          return get_prefecture_from_address($address); // 住所から都道府県を取得
      }
  }

  return ''; // 一致する投稿がない場合  
}

// archive-letter
// introduction  「都道府県」カテゴリーが自動で設定
add_action('save_post', 'debug_prefecture_assignment', 10, 3);

function debug_prefecture_assignment($post_id, $post, $update) {
    if (get_post_type($post_id) !== 'introduction') return;

    $address = get_field('nursery_address', $post_id);
    if (!$address) {
        error_log("デバッグ: nursery_address が取得できません");
        return;
    }

    $prefecture = get_prefecture_from_address($address);
    if (!$prefecture || $prefecture === "不明") {
        error_log("デバッグ: 住所から都道府県が取得できません");
        return;
    }

    $term = get_term_by('name', $prefecture, 'prefecture');

    if (!$term) {
        $term = wp_insert_term($prefecture, 'prefecture');
        if (is_wp_error($term)) {
            error_log("デバッグ: wp_insert_term() でエラー発生 - " . $term->get_error_message());
            return;
        }
        $term_id = $term['term_id'];
    } else {
        $term_id = $term->term_id;
    }

    $result = wp_set_post_terms($post_id, [$term_id], 'prefecture', false);
    if (is_wp_error($result)) {
        error_log("デバッグ: wp_set_post_terms() でエラー発生 - " . $result->get_error_message());
    } else {
        error_log("デバッグ: 都道府県「{$prefecture}」を適用しました");
    }
}



// archive-letter
// single-introduction のタイトルを比較し、
// 一致する single-introduction の住所から都道府県を取得し、
// letter の投稿に 都道府県カテゴリーを自動で設定
function set_letter_prefecture_category($post_id) {
  if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
  if (get_post_type($post_id) !== 'letter') return;

  $letter_title = get_the_title($post_id);
  if (!$letter_title) return;

  // `single-introduction` の園名 (`the_title()`) と一致するものを取得
  $matching_nursery = get_posts([
      'post_type'      => 'introduction',
      'title'          => $letter_title, // `letter` のタイトルと一致するもの
      'posts_per_page' => 1
  ]);

  if (!empty($matching_nursery)) {
      $nursery_post = $matching_nursery[0]; // 最初の一致した投稿
      $address = get_field('nursery_address', $nursery_post->ID);
      $prefecture = get_prefecture_from_address($address);
      
      if ($prefecture) {
          $term = get_term_by('name', $prefecture, 'prefecture');
          if (!$term) {
              $term = wp_insert_term($prefecture, 'prefecture');
              if (is_wp_error($term)) return;
              $term_id = $term['term_id'];
          } else {
              $term_id = $term->term_id;
          }
          wp_set_post_terms($post_id, [$term_id], 'prefecture', false);
      }
  }
}
add_action('save_post', 'set_letter_prefecture_category');


// archive-letter
// 園検索のフィルタリング機能
function filter_by_nursery_title($where, $query) {
	global $wpdb;

	if (is_admin() || !$query->is_main_query()) {
			return $where;
	}

	if (!empty($_GET['nursery'])) {
			$nursery = esc_sql($_GET['nursery']);
			$where .= " AND {$wpdb->posts}.post_title LIKE '%{$nursery}%'";
	}

	return $where;
}
add_filter('posts_where', 'filter_by_nursery_title', 10, 2);





// archive-letter サイドバーのアーカイブ
function filter_archive_by_date($query) {
  if (!is_admin() && $query->is_main_query() && is_date()) {
      $query->set('post_type', 'letter'); // `single-letter` の投稿タイプに限定
  }
}
add_action('pre_get_posts', 'filter_archive_by_date');



// archive-introduction
// 都道府県を関東圏優先でソートする関数
function sort_prefectures_by_region($prefecture_terms) {
  // 地理順に並べるための手動指定リスト
  $custom_order = [
		  '北海道', '青森県', '岩手県', '宮城県', '秋田県', '山形県', '福島県', // 東北
		  '東京都', '神奈川県', '千葉県', '埼玉県', '茨城県', '栃木県', '群馬県', // 関東（最優先）
      '新潟県', '富山県', '石川県', '福井県', '山梨県', '長野県', // 甲信越・北陸
      '岐阜県', '静岡県', '愛知県', '三重県', // 東海
      '滋賀県', '京都府', '大阪府', '兵庫県', '奈良県', '和歌山県', // 近畿
      '鳥取県', '島根県', '岡山県', '広島県', '山口県', // 中国
      '徳島県', '香川県', '愛媛県', '高知県', // 四国
      '福岡県', '佐賀県', '長崎県', '熊本県', '大分県', '宮崎県', '鹿児島県', // 九州
      '沖縄県' // 沖縄
  ];

  // 都道府県をカスタム順序に従って並び替え
  usort($prefecture_terms, function($a, $b) use ($custom_order) {
      $indexA = array_search($a->name, $custom_order);
      $indexB = array_search($b->name, $custom_order);

      // 都道府県がリストにない場合、最後に配置
      if ($indexA === false) $indexA = count($custom_order);
      if ($indexB === false) $indexB = count($custom_order);

      return $indexA - $indexB;
  });

  return $prefecture_terms;
}


// sectionこもれびだより
// 二か所でそれぞれ違うCSSを当てる
function enqueue_custom_styles() {
  // single-introduction.php 用の CSS
  if (is_singular('introduction')) {
    wp_enqueue_style('single-introduction-style', get_template_directory_uri() . '/css/single-introduction.css');
  }

  // front-page.php 用の CSS
  if (is_front_page()) {
    wp_enqueue_style('front-page-style', get_template_directory_uri() . '/css/front-page.css');
  }
}
add_action('wp_enqueue_scripts', 'enqueue_custom_styles');



// 【ContactForm7】--------------------------------------

//CF7 に自動で追加される <p> タグを削除
add_filter('wpcf7_autop_or_not', '__return_false');

// reCAPTCHA v3 のスコアしきい値を緩める（0.3に設定）
// add_filter('wpcf7_recaptcha_threshold', function () {
//   return 0.3;
// });


// 共通フィルター（フォームIDで分岐）
add_filter('wpcf7_validate', 'custom_wpcf7_validation', 11, 2);
function custom_wpcf7_validation($result, $tags) {
    $form = WPCF7_ContactForm::get_current();
    $form_id = $form->id();

    if ($form_id == 132) {
        return validate_recruit_form($result, $tags); // 採用フォーム
    }

    if ($form_id == 16) {
        return validate_contact_form($result, $tags); // お問い合わせフォーム
    }

    return $result;
}




// 採用フォーム用バリデーション
function validate_recruit_form($result, $tags) {
    foreach ($tags as $tag) {
        $name = $tag['name'];
        $post = isset($_POST[$name]) ? trim($_POST[$name]) : '';

        $required = [
            'your-name' => 'お名前',
            'your-furigana' => 'ふりがな',
            'your-birthdate' => '生年月日',
            'postal-code' => '郵便番号',
            'prefecture' => '都道府県',
            'city' => '市区町村',
            'address' => '番地・建物名',
            'phone-number' => '電話番号',
            'email' => 'メールアドレス',
            'work-area' => '希望就業エリア',
        ];

        if (array_key_exists($name, $required) && empty($post)) {
            $result->invalidate($name, "{$required[$name]}は必須です。");
        }

        if ($name === 'your-furigana' && !empty($post) && !preg_match('/^[ぁ-んー\s]+$/u', $post)) {
            $result->invalidate($name, 'ふりがなは全角ひらがなで入力してください。');
        }
				
				  // ✅ 電話番号：半角数字のみ（ハイフンなし）10～11桁
					if ($name === 'phone-number' && !empty($post) && !preg_match('/^0\d{9,10}$/', $post)) {
            $result->invalidate($name, '電話番号はハイフンなしの半角数字で入力してください（例：09012345678）。');
        }

        // ✅ メールアドレス形式チェック
        if ($name === 'email' && !empty($post) && !filter_var($post, FILTER_VALIDATE_EMAIL)) {
            $result->invalidate($name, 'メールアドレスの形式が正しくありません。');
        }
				
				
    }
	
    return $result;
}

// お問い合わせフォーム用バリデーション
function validate_contact_form($result, $tags) {
    foreach ($tags as $tag) {
        $name = $tag['name'];
        $post = isset($_POST[$name]) ? trim($_POST[$name]) : '';
				
        $required = [
					'your-name' => 'お名前',
					'email' => 'メールアドレス',
					'hoikuen-name' => 'お問い合わせの保育園',
					'inquiry-details' => 'お問い合わせ内容',
        ];

        if (array_key_exists($name, $required) && empty($post)) {
            $result->invalidate($name, "{$required[$name]}は必須です。");
        }

       // ✅ メールアドレス形式チェック
				if ($name === 'email' && !empty($post) && !filter_var($post, FILTER_VALIDATE_EMAIL)) {
				$result->invalidate($name, 'メールアドレスの形式が正しくありません。');
		}
    }
    return $result;
}



