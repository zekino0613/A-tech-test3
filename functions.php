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

  // パンくずリストの区切り記号が「|」
  add_filter('wpseo_breadcrumb_separator', function () {
    return ' | '; // 区切り記号を「|」に変更
});

// パンくずリスト カタカナ表記
add_filter('wpseo_breadcrumb_single_link', 'custom_breadcrumb_labels', 10, 2);
function custom_breadcrumb_labels($link_output, $link) {
    // ページタイトルをカタカナに置き換える
    if (strpos($link_output, 'Home') !== false) {
        $link_output = str_replace('Home', 'ホーム', $link_output);
    }
    if (strpos($link_output, 'concept') !== false) {
      $link_output = str_replace('concept', 'コンセプト', $link_output);
    }
    if (strpos($link_output, 'News') !== false) {
      $link_output = str_replace('News', 'ニュース一覧', $link_output);
    }
    if (strpos($link_output, 'reserve') !== false) {
      $link_output = str_replace('reserve', 'ご予約・お問い合わせ', $link_output);
    }
    return $link_output;
}


// 下層ページ【page-price-menu】の各セクションへのページジャンプ  ----------------------
// function enqueue_custom_scroll_script() {
//   wp_enqueue_script('custom-scroll', get_template_directory_uri() . '/assets/js/custom-scroll.js', array('jquery'), null, true);
// }
// add_action('wp_enqueue_scripts', 'enqueue_custom_scroll_script');



// 下層ページ【page-concept】インスタグラム埋め込み際の＜iframeタグ生成の削除＞  ----------------------
add_filter('wp_kses_allowed_html', function ($tags) {
  $tags['iframe'] = [
      'src' => true,
      'width' => true,
      'height' => true,
      'frameborder' => true,
      'allow' => true,
      'allowfullscreen' => true,
      'loading' => true,
  ];
  return $tags;
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





// ページネーション管理
function modify_custom_post_type_queries($query) {
  if (is_admin() || !$query->is_main_query()) {
      return;
  }

  if (is_post_type_archive('info')) {
      $query->set('posts_per_page', 4);
  }

  if (is_post_type_archive('introduction')) {
      $query->set('posts_per_page', 3);
  }

  if (is_post_type_archive('letter')) {
      $query->set('posts_per_page', 4);
  }

  $query->set('orderby', 'date');
  $query->set('order', 'DESC');
  $query->set('paged', get_query_var('paged') ? get_query_var('paged') : 1);
}
add_action('pre_get_posts', 'modify_custom_post_type_queries');







function set_prefecture_taxonomy_on_save($post_id) {
  if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;

  if (get_post_type($post_id) !== 'introduction') return;

  $address = get_field('nursery_address', $post_id);
  if (!$address) return;

  $prefecture = get_prefecture_from_address($address);
  if ($prefecture === "不明") return;

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
add_action('save_post', 'set_prefecture_taxonomy_on_save');


// 都道府県を地理順にソートする関数
function sort_prefectures_by_region($prefecture_terms) {
  // 地理順に並べるための手動指定リスト
  $custom_order = [
      '北海道', '青森県', '岩手県', '宮城県', '秋田県', '山形県', '福島県', // 東北
      '東京都', '神奈川県', '千葉県', '埼玉県', '茨城県', '栃木県', '群馬県', // 関東
      '新潟県', '富山県', '石川県', '福井県', '山梨県', '長野県', // 甲信越・北陸
      '岐阜県', '静岡県', '愛知県', '三重県', // 東海
      '滋賀県', '京都府', '大阪府', '兵庫県', '奈良県', '和歌山県', // 近畿
      '鳥取県', '島根県', '岡山県', '広島県', '山口県', // 中国
      '徳島県', '香川県', '愛媛県', '高知県', // 四国
      '福岡県', '佐賀県', '長崎県', '熊本県', '大分県', '宮崎県', '鹿児島県', // 九州
      '沖縄県' // 沖縄
  ];

  // 取得した都道府県リストを並び替え
  usort($prefecture_terms, function($a, $b) use ($custom_order) {
      $indexA = array_search($a->name, $custom_order);
      $indexB = array_search($b->name, $custom_order);
      return $indexA - $indexB;
  });

  return $prefecture_terms;
}

// 【archive-salons】--------------------------------

// // 都道府県のローマ字変換マッピング
// if (!function_exists('prefecture_to_romaji')) {
//   function prefecture_to_romaji($prefecture) {
//       $mapping = [
//           '北海道' => 'Hokkaido',
//           '青森県' => 'Aomori',
//           '岩手県' => 'Iwate',
//           '宮城県' => 'Miyagi',
//           '秋田県' => 'Akita',
//           '山形県' => 'Yamagata',
//           '福島県' => 'Fukushima',
//           '茨城県' => 'Ibaraki',
//           '栃木県' => 'Tochigi',
//           '群馬県' => 'Gunma',
//           '埼玉県' => 'Saitama',
//           '千葉県' => 'Chiba',
//           '東京都' => 'Tokyo',
//           '神奈川県' => 'Kanagawa',
//           '新潟県' => 'Niigata',
//           '富山県' => 'Toyama',
//           '石川県' => 'Ishikawa',
//           '福井県' => 'Fukui',
//           '山梨県' => 'Yamanashi',
//           '長野県' => 'Nagano',
//           '岐阜県' => 'Gifu',
//           '静岡県' => 'Shizuoka',
//           '愛知県' => 'Aichi',
//           '三重県' => 'Mie',
//           '滋賀県' => 'Shiga',
//           '京都府' => 'Kyoto',
//           '大阪府' => 'Osaka',
//           '兵庫県' => 'Hyogo',
//           '奈良県' => 'Nara',
//           '和歌山県' => 'Wakayama',
//           '鳥取県' => 'Tottori',
//           '島根県' => 'Shimane',
//           '岡山県' => 'Okayama',
//           '広島県' => 'Hiroshima',
//           '山口県' => 'Yamaguchi',
//           '徳島県' => 'Tokushima',
//           '香川県' => 'Kagawa',
//           '愛媛県' => 'Ehime',
//           '高知県' => 'Kochi',
//           '福岡県' => 'Fukuoka',
//           '佐賀県' => 'Saga',
//           '長崎県' => 'Nagasaki',
//           '熊本県' => 'Kumamoto',
//           '大分県' => 'Oita',
//           '宮崎県' => 'Miyazaki',
//           '鹿児島県' => 'Kagoshima',
//           '沖縄県' => 'Okinawa',
//       ];

//       return $mapping[$prefecture] ?? $prefecture;
//   }
// }

// // 都道府県の一覧を取得（メニューやフィルターに使用）
// // archive-salonsカスタムフィールド住所から情報取得しカテゴライズ項目の出力（重複削除）
// if (!function_exists('get_unique_prefectures')) {
//   function get_unique_prefectures() {
//       $args = [
//           'post_type' => 'salons',
//           'posts_per_page' => -1,
//       ];
//       $query = new WP_Query($args);

//       $prefectures = [];
//       if ($query->have_posts()) {
//           while ($query->have_posts()) {
//               $query->the_post();
//               $address = get_field('address');
//               if ($address) {
//                   // 住所から都道府県を取得
//                   preg_match('/(東京都|北海道|(?:京都|大阪)府|.{2,3}県)/u', $address, $matches);
//                   if (!empty($matches[0])) {
//                       $prefectures[] = $matches[0];
//                   }
//               }
//           }
//           wp_reset_postdata();
//       }

//       // 重複を排除してソート
//       $unique_prefectures = array_unique($prefectures);
//       sort($unique_prefectures);

//       return $unique_prefectures;
//   }
// }

// // 都道府県ごとの店舗リストを取得（リスト表示）
// // archive-salonsカスタムフィールド情報取得
// if (!function_exists('get_stores_by_prefecture')) {
//   function get_stores_by_prefecture() {
//       $args = [
//           'post_type' => 'salons',
//           'posts_per_page' => -1,
//       ];
//       $query = new WP_Query($args);

//       $stores_by_prefecture = [];
//       if ($query->have_posts()) {
//           while ($query->have_posts()) {
//               $query->the_post();

//               // 店舗情報を取得
//               $store_id = get_the_ID();
//               $store_title = get_the_title();
//               $address = get_field('address'); // カスタムフィールド 'address' を取得

//               if ($address) {
//                   // 住所から都道府県を取得
//                   preg_match('/(東京都|北海道|(?:京都|大阪)府|.{2,3}県)/u', $address, $matches);
//                   if (!empty($matches[0])) {
//                       $prefecture = $matches[0];
//                       $stores_by_prefecture[$prefecture][] = [
//                           'id' => $store_id, // 投稿IDを追加
//                           'title' => $store_title,
//                           'address' => $address,
//                       ];
//                   }
//               }
//           }
//           wp_reset_postdata();
//       }
//       return $stores_by_prefecture;
//   }
// }



// //明視的に漢字をアルファベットに変換
// function convert_to_romaji($text) {
//   if (empty($text)) {
//       return '';
//   }

//   // 不要な文字を削除（例: 「店」など）
//   $text = trim(str_replace('店', '', $text));

//   // 漢字変換用マッピング
//   $map = [
//       '新宿' => 'Shinjuku',
//       '渋谷' => 'Shibuya',
//       '平塚' => 'Hiratsuka',
//       '横浜' => 'Yokohama',
//       'さいたま' => 'Saitama',
//       '春日部' => 'Kasukabe',
//       '堺' => 'Sakai',
//       '梅田' => 'Umeda',
//       '五条' => 'Gojo',
//       '久留米' => 'Kurume',
//       '那覇' => 'Naha',
//   ];

//   // マッピングが存在する場合はローマ字を返し、存在しない場合は元の文字列を返す
//   if (isset($map[$text])) {
//     return strtoupper($map[$text]); // 大文字変換
// }

// // マッピングにない場合、元の文字列をそのまま返す
// return strtoupper($text); // 元の文字列も大文字に変換
// }


// 【ContactForm7】--------------------------------------

//CF7 に自動で追加される <p> タグを削除
add_filter('wpcf7_autop_or_not', '__return_false');


/* ContactForm7 のカスタムバリデーション */
add_filter('wpcf7_validate', 'custom_wpcf7_validation', 11, 2);

function custom_wpcf7_validation($result, $tags) {
    foreach ($tags as $tag) {
        $type = $tag['type'];
        $name = $tag['name'];
        $post = isset($_POST[$name]) ? trim(strtr((string) $_POST[$name], "\n", "")) : '';

        // ✅ 必須項目チェック（対象フィールドのみ）
        $required_fields = [
            'your-name' => 'お名前',
            'your-kana' => 'ふりがな',
            // 'your-phone' => '電話番号',
            'your-email' => 'メールアドレス',
            'your-contact-method' => 'ご希望の連絡方法',
            'checkbox-475' => 'お問い合わせ項目',
            'your-store' => '希望店舗'
        ];

        if (array_key_exists($name, $required_fields) && empty($post)) {
            $result->invalidate($name, "{$required_fields[$name]}は必須です。");
        }

        switch ($name) {
            case 'your-name':
                // ✅ お名前：特別なバリデーションなし（必須のみ）
                break;

            case 'your-kana':
                // ✅ ふりがな（ひらがな＋スペースのみ許可）
                if (!empty($post) && !preg_match("/^[ぁ-んー\s]+$/u", $post)) {
                    $result->invalidate($name, "ふりがなは全角ひらがなで入力してください（スペース可）。");
                }
                break;

            case 'your-phone':
                // ✅ 電話番号（半角数字、ハイフンなし、10〜11桁のみ許可）
                if (!empty($post) && !preg_match('/^0\d{9,10}$/', $post)) {
                    $result->invalidate($name, "電話番号はハイフンなしの半角数字で入力してください（例：09012345678）。");
                }
                break;

            case 'your-email':
                // ✅ メールアドレスの形式チェック
                if (!empty($post) && !filter_var($post, FILTER_VALIDATE_EMAIL)) {
                    $result->invalidate($name, "メールアドレスの形式が正しくありません。");
                }
                break;

            case 'your-contact-method':
                // ✅ ご希望の連絡方法（必須）
                if (empty($post)) {
                    $result->invalidate($name, "ご希望の連絡方法は必須です。");
                }
                break;

            case 'checkbox-475':
                // ✅ お問い合わせ項目（最低1つ選択必須）
                if (empty($_POST[$name])) {
                    $result->invalidate($name, "お問い合わせ項目は必須です。");
                }
                break;

            case 'your-store':
                // ✅ 希望店舗（必須）
                if (empty($post)) {
                    $result->invalidate($name, "希望店舗は必須です。");
                }
                break;
        }
    }
    return $result;
}



function add_custom_query_vars($vars) {
  $vars[] = 'paged';
  return $vars;
}
add_filter('query_vars', 'add_custom_query_vars');


function custom_post_type_rewrite_fix() {
  add_rewrite_rule('introduction/page/([0-9]+)/?$', 'index.php?post_type=introduction&paged=$matches[1]', 'top');
}
add_action('init', 'custom_post_type_rewrite_fix');



