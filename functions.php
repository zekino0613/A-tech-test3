<?php
//管理バー非表示
add_filter('show_admin_bar', '__return_false');


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
// カスタム投稿タイプ news を登録
  function create_news_post_type() {
    register_post_type( 'news',
      array(
				'label' => 'お知らせ',
        'public' => true, // 投稿タイプを公開するかどうか。trueにすると、管理画面に表示され、公開されます
        'has_archive' => true, // 投稿タイプにアーカイブページを持たせるかどうか。trueにすると、アーカイブページが生成されます
        'show_in_rest' => true,
				'rewrite' => [
						'slug' => 'news',
						'with_front' => false,
						],

        // 'rewrite' => array('slug' => 'news'), // 投稿タイプのURLスラッグを指定します。例: yoursite.com/news/
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'comments'), // この投稿タイプがサポートする機能を指定します
        'taxonomies'  => array('category'),  // カテゴリを有効にする
      )
    );
  }
  add_action('init', 'create_news_post_type');

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
	
	




//   // 【パンくずリスト】プラグイン名：yoast SEO  ----------------------------------

//   // パンくずリストの区切り記号が「>」
//   add_filter('wpseo_breadcrumb_separator', function () {
//     return '  <i class="fa-solid fa-angle-right"></i>'; // 区切り記号を「>」に変更
// });

// // パンくずリスト カタカナ表記
// add_filter('wpseo_breadcrumb_single_link', 'custom_breadcrumb_labels', 10, 2);
// function custom_breadcrumb_labels($link_output, $link) {
//     // ページタイトルをカタカナに置き換える
//     if (strpos($link_output, 'Home') !== false) {
//         $link_output = str_replace('Home', 'TOP', $link_output);
//     }
//     if (strpos($link_output, 'introduction') !== false) {
//       $link_output = str_replace('introduction', '各園のご紹介', $link_output);
//     }
//     if (strpos($link_output, 'letter') !== false) {
//       $link_output = str_replace('letter', 'こもれびだより', $link_output);
//     }
// 		if (strpos($link_output, 'info') !== false) {
//       $link_output = str_replace('info', 'お知らせ', $link_output);
//     }
//     if (strpos($link_output, 'reserve') !== false) {
//       $link_output = str_replace('reserve', 'ご予約・お問い合わせ', $link_output);
//     }
//     if (strpos($link_output, '404') !== false) {
//       $link_output = str_replace('404', '404', $link_output);
//     }
//     return $link_output;
// }

//   //archive-introduction	
// 	add_filter('wpseo_breadcrumb_links', function($links) {
// 		// 「各園のご紹介」が CPT のアーカイブページならこちらで分岐
// 		if (is_post_type_archive('introduction') && (isset($_GET['category']) || isset($_GET['prefecture']))) {
// 			$category_slug = isset($_GET['category']) ? sanitize_text_field($_GET['category']) : '';
// 			$prefecture = isset($_GET['prefecture']) ? sanitize_text_field($_GET['prefecture']) : '';
	
// 			// TOPだけ残してリセット
// 			$links = array_slice($links, 0, 1);
	
// 			// 各園のご紹介（このページ自身）
// 			$links[] = [
// 				'url' => get_post_type_archive_link('introduction'),
// 				'text' => '各園のご紹介',
// 			];
	
// 			// 都道府県
// 			if ($prefecture) {
// 				$links[] = [
// 					'url' => '',
// 					'text' => esc_html($prefecture),
// 				];
// 			}
	
// 			// カテゴリ（投稿カテゴリー）
// 			if ($category_slug) {
// 				$term = get_term_by('slug', $category_slug, 'category');
// 				if ($term) {
// 					$links[] = [
// 						'url' => '',
// 						'text' => esc_html($term->name),
// 					];
// 				}
// 			}
// 		}
	
// 		return $links;
// 	});
	
// 	// archive-letter.php 固定パンくず用
// 	add_filter('wpseo_breadcrumb_links', function($links) {
// 		// 「こもれびだより（letter）」のアーカイブページでパンくずを固定する
// 		if (is_post_type_archive('letter')) {
// 			// TOP だけ残す
// 			$links = array_slice($links, 0, 1);
	
// 			// 「こもれびだより」を追加
// 			$links[] = [
// 				'url'  => '',
// 				'text' => 'こもれびだより',
// 			];
// 		}
	
// 		return $links;
// 	});
	
	

// // single-letterのパンくずリスト
// function custom_yoast_breadcrumb_for_letter($links) {
// 	if (is_singular('letter')) { // single-letter ページの時のみ変更
// 			$post_id = get_the_ID();
// 			$custom_title = get_the_title($post_id); // 投稿のメインタイトル
// 			$custom_field_title = get_field('article_title', $post_id); // ACFのカスタムフィールド（記事タイトル）

// 			if ($custom_field_title) {
// 					// 最後のパンくずのタイトルを「一番上のタイトル + 記事タイトル」に変更
// 					$last_index = count($links) - 1;
// 					$links[$last_index]['text'] = esc_html($custom_title . 'からのおたより'.'『' . $custom_field_title.'』' );
// 			}
// 	}
// 	return $links;
// }
// add_filter('wpseo_breadcrumb_links', 'custom_yoast_breadcrumb_for_letter');

// // 月別アーカイブページのパンくずリストをカスタマイズ
// add_filter('wpseo_breadcrumb_links', function($links) {
//   if (is_date() && !is_singular()) {
//     // 年月を取得
//     $year = get_query_var('year');
//     $month = get_query_var('monthnum');

//     // TOP（最初のリンク）だけ残す
//     $links = array_slice($links, 0, 1);

//     // 「こもれびだより」のアーカイブページリンクを追加
//     $links[] = [
//       'url'  => get_post_type_archive_link('letter'),
//       'text' => 'こもれびだより',
//     ];

//     // 年月を1つのテキストとして追加
//     $links[] = [
//       'url'  => '',
//       'text' => "{$year}ねん{$month}がつ",
//     ];
//   }

//   return $links;
// }, 10, 1);



// // 404ページの際のパンくずリスト
// add_filter( 'wpseo_breadcrumb_links', function( $links ) {
//   if ( is_404() ) {
//       return array(
//           array(
//               'text' => 'TOP',
//               'url'  => home_url(),
//           ),
//           array(
//               'text' => '404',
//               'url'  => '',
//           )
//       );
//   }
//   return $links;
// });




// archive＜一覧ページ＞
// -------------------------------------------------------------------------------------
// ===============================
// 年別アーカイブ（/news/2024/）に対応させるコード
// ===============================





function modify_archive_queries($query) {
	if (is_admin() || !$query->is_main_query()) return;

	// archive-introduction
	if (is_post_type_archive('introduction')) {
			$query->set('posts_per_page', 9);
			$query->set('paged', get_query_var('paged') ? get_query_var('paged') : 1);
	}

	// archive-letter
	if (is_post_type_archive('letter')) {
			$query->set('posts_per_page', 9);
			$query->set('paged', get_query_var('paged') ? get_query_var('paged') : 1);
	}

	// archive-info（必要であれば有効化）
	if (is_post_type_archive('news')) {
			$query->set('posts_per_page', 5);
			$query->set('orderby', 'date');
			$query->set('order', 'DESC');
			$query->set('paged', get_query_var('paged') ? get_query_var('paged') : 1);
	}
}
add_action('pre_get_posts', 'modify_archive_queries');

// 年度アーカイブ用のリライトルール追加（/news/2024/, /news/2024/page/2/）
add_action('init', function () {
  add_rewrite_rule(
    '^news/([0-9]{4})/page/([0-9]+)/?$',
    'index.php?post_type=news&year=$matches[1]&paged=$matches[2]',
    'top'
  );
  add_rewrite_rule(
    '^news/([0-9]{4})/?$',
    'index.php?post_type=news&year=$matches[1]',
    'top'
  );
});

// クエリ変数 year を許可
add_filter('query_vars', function ($vars) {
  $vars[] = 'year';
  return $vars;
});

// メインクエリで年度フィルター適用（news用）
add_action('pre_get_posts', function ($query) {
  if (!is_admin() && $query->is_main_query() && is_post_type_archive('news')) {
    $year = get_query_var('year');
    if ($year) {
      $query->set('year', (int)$year);
    }
  }
});

// 年度（4月〜翌年3月）ごとの投稿抽出
add_filter('posts_where', function($where, $query) {
  global $wpdb;

  if (!is_admin() && $query->is_main_query() && is_post_type_archive('news')) {
    $year = get_query_var('year');
    if ($year) {
      $next_year = $year + 1;
      $where .= $wpdb->prepare(
        " AND (
            (YEAR($wpdb->posts.post_date) = %d AND MONTH($wpdb->posts.post_date) BETWEEN 4 AND 12)
            OR
            (YEAR($wpdb->posts.post_date) = %d AND MONTH($wpdb->posts.post_date) BETWEEN 1 AND 3)
          )",
        $year, $next_year
      );
    }
  }
  return $where;
}, 10, 2);



// 【functions.php】

// function custom_news_rewrite_rules() {
//   // 年をクエリとして追加
//   add_rewrite_tag('%year%', '([0-9]{4})');

//   // ページネーション付き
//   add_rewrite_rule('news/([0-9]{4})/page/([0-9]+)/?$', 'index.php?post_type=news&year=$1&paged=$2', 'top');
//   // 年だけ
//   add_rewrite_rule('news/([0-9]{4})/?$', 'index.php?post_type=news&year=$1', 'top');
// }
// add_action('init', 'custom_news_rewrite_rules');

// // ③ query_var に year を追加（明示的に）
// function allow_year_query_var($vars) {
//   $vars[] = 'year';
//   return $vars;
// }
// add_filter('query_vars', 'allow_year_query_var');

// // ④ pre_get_postsで年フィルタ適用（このままでOK）
// add_action('pre_get_posts', function($query) {
//   if (!is_admin() && $query->is_main_query() && is_post_type_archive('news')) {
//     $year = get_query_var('year');
//     if ($year) {
//       $query->set('year', (int)$year);
//     }
//   }
// });




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



