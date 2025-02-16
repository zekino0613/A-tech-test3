
<?php
get_template_part('template-parts/header'); // header.php をインクルード
?>

<main>
  <?php 
  get_template_part('template-parts/para-mainvisual'); // header.php をインクルード
  ?> 


  <!-- 都道府県カテゴリー -->
  <section id="section-contects" class="archive-salons">
    <!-- パンくずリスト -->
    <?php
      if (function_exists('yoast_breadcrumb')) {
        yoast_breadcrumb('<nav id="breadcrumbs">', '</nav>');
      }
    ?>
  </section>

  <section id="prefecture-category">
    <div class="section-title fade-in">
      <span class="section-title__shadow">Prefectures</span>
      <h2 class="section-title__main">Prefectures</h2>
      <span class="section-title__small">都道府県</span>
    </div>

    <ul class="category-list">
      <?php
      // 都道府県の並び順を指定
      $prefecture_order = [
          'Tokyo',
          'Kanagawa',
          'Saitama',
          'Osaka',
          'Kyoto',
          'Fukuoka',
          'Okinawa',
      ];

      // 一意な都道府県を取得
      $unique_prefectures = get_unique_prefectures();

      if (!empty($unique_prefectures)) {
          // 都道府県を並び替え
          usort($unique_prefectures, function ($a, $b) use ($prefecture_order) {
              $indexA = array_search(prefecture_to_romaji($a), $prefecture_order);
              $indexB = array_search(prefecture_to_romaji($b), $prefecture_order);

              // 並び順が見つからない場合は末尾に配置
              $indexA = $indexA === false ? PHP_INT_MAX : $indexA;
              $indexB = $indexB === false ? PHP_INT_MAX : $indexB;

              return $indexA - $indexB;
          });

          // 並び替えた都道府県をリストとして出力
          foreach ($unique_prefectures as $prefecture) {
              $romaji = prefecture_to_romaji($prefecture); // ローマ字変換関数を使用
              echo '<li class= "fade-in"><a href="#' . sanitize_title($romaji) . '">' . esc_html($romaji) . ' <span>' . esc_html($prefecture) . '</span></a></li>';
          }
      } else {
          echo '<li>登録された都道府県がありません。</li>';
      }
      ?>
    </ul>
  </section>




<section id="prefecture-stores">
    <?php
    // 都道府県の並び順を指定
    $prefecture_order = [
        'Tokyo',
        'Kanagawa',
        'Saitama',
        'Osaka',
        'Kyoto',
        'Fukuoka',
        'Okinawa',
    ];

    // 都道府県ごとに店舗を取得
    $stores_by_prefecture = get_stores_by_prefecture();

    // 都道府県順に並び替え
    uksort($stores_by_prefecture, function($a, $b) use ($prefecture_order) {
        $indexA = array_search(prefecture_to_romaji($a), $prefecture_order);
        $indexB = array_search(prefecture_to_romaji($b), $prefecture_order);

        // 並び順が見つからない場合は末尾に配置
        $indexA = $indexA === false ? PHP_INT_MAX : $indexA;
        $indexB = $indexB === false ? PHP_INT_MAX : $indexB;

        return $indexA - $indexB;
    });

    foreach ($stores_by_prefecture as $prefecture => $stores) {
        $romaji = prefecture_to_romaji($prefecture); // 都道府県名をローマ字に変換
        echo '<div id="' . sanitize_title($romaji) . '" class="prefecture-section">';
        echo '<h2 class="prefecture-title fade-in">' . esc_html($romaji) . '</h2>';

        usort($stores, function ($a, $b) {
          // 店舗名の降順でソート
          return strcmp($b['title'], $a['title']);
        });
      

        // // サイト出力は下------------------------------------------------------------
        echo '<div class="store-cards">';
        foreach ($stores as $store) {
             //カスタムフィールド店舗名を取得
            $store_name = get_post_meta($store['id'], 'store_name', true);
             // カスタムフィールド住所を取得
            $address = isset($store['address']) ? $store['address'] : '住所が設定されていません。';
             //店舗名ローマ字表記定義
            $store_name_romaji = convert_to_romaji($store_name);



            echo '<a href="' . esc_url(get_permalink($store['id'])) . '" class="store-card">';
            // 住所から静止地図の生成
            echo '<div class="map-container fade-in">';
                include locate_template('template-parts/google-map.php');
            echo '</div>'; // .map-container

            echo '<div class="store-card__content">';
            echo '<h3 class="city-romaji fade-in">' . esc_html($store_name_romaji) . '</h3>';
            echo '<h4 class="store_name fade-in">' . esc_html($store_name) . '店</h4>';
            // 住所を出力
            echo '<p class="store_address fade-in">' . esc_html($address) . '</p>';
            echo '</div>';
            echo '</a>';
        }
        echo '</div>'; // .store-cards
        echo '</div>'; // .prefecture-section
    }
    ?>
</section>











    </section>
  </main>
  <?php
    get_template_part('template-parts/footer'); // footer.php をインクルード
  ?>  
</body>       