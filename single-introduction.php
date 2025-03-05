<!-- ---footer読み込み ----------------------------------------------->
  <?php
    get_template_part('template-parts/header'); // header.php をインクルード
  ?>
  <!-- ---------------------------------------------------------------------->
  <main>
    <!-- title-heading -->
    <?php
        get_template_part('template-parts/title-heading'); // title-heading をインクルード
    ?>


    <?php while ( have_posts() ) : the_post(); ?>    
    <section id="single-nursery">
      <div class="single-nursery__inner">
        <!-- サムネイル-->
        <div class="thumbnail">
          <div class="thumbnail__inner">
            <!-- サムネイル画像 -->
            <?php
              $thumbnail = get_field('thumbnail_image'); // 画像IDを取得
              $default_image = get_template_directory_uri() . '/assets/images/kidsland_image/design-parts/no-image.webp'; // デフォルト画像のパス
            ?>
            <img class="thumbnail__inner--image" 
                src="<?php echo esc_url($thumbnail ? wp_get_attachment_image_url($thumbnail, 'full') : $default_image); ?>" 
                alt="<?php the_title(); ?>" 
                class="nursery-thumbnail">

            <!-- サムネイルタイトル -->
            <?php if( get_field('thumbnail_title') ): ?>
              <h2 class="thumbnail__inner--title"><?php the_field('thumbnail_title'); ?></h2>
            <?php endif; ?>
            <!-- サムネイル説明 -->
            <!-- <?php //カスタムフィールド入力欄で改行
              $nursery_message = get_field('thumbnail_textarea');
              if ($nursery_message) {
                  echo '<p class="thumbnail__inner--textarea">' . nl2br(wp_kses_post($nursery_message)) . '</p>';
              }
            ?> -->
            <?php 
              // カスタムフィールド入力欄のテキスト取得
              $nursery_message = get_field('thumbnail_textarea');

              if ($nursery_message) {
                  echo '<p class="thumbnail__inner--textarea">';
                  
                  if (wp_is_mobile()) {
                      // SPでは改行を `<br>` に変換
                      echo nl2br(wp_kses_post($nursery_message));
                  } else {
                      // PCでは改行をスペースに変換
                      echo str_replace(["\r\n", "\r", "\n"], ' ', wp_kses_post($nursery_message));
                  }
                  
                  echo '</p>';
              }
              ?>
          </div><!-- / -->  
        </div><!-- / -->  


        <!-- スライダー -->
        <div class="inside pink-bk">
          <!-- title-icon -->
          <?php
          get_template_part('template-parts/title-icon', null, ['name' => 'inside']);// title-icon をインクルード
          ?>

          <?php
            // SCFの繰り返しフィールド（画像ID）を取得
            $images = SCF::get('sliders'); // 繰り返しフィールドのグループ名

            if (!empty($images)) : ?>
            <div class="slider">
              <?php foreach ($images as $image) : ?>
                <div class="slider-item">
                  <?php
                  // 画像IDを取得
                  $image_id = $image['slider']; // サブフィールド 'slider' の画像ID

                  // 画像を出力（'large'サイズで表示）
                  echo wp_get_attachment_image($image_id, 'large');
                  ?>
                </div>
              <?php endforeach; ?>
            </div>
          <?php endif; ?>
        </div><!-- / -->
        

        <!-- 園長からのメッセージ -->
        <div class="message">
          <!-- title-icon -->
          <?php
            get_template_part('template-parts/title-icon', null, ['name' => 'message']);// title-icon をインクルード
          ?>

          <div class="message__flex">
            <!-- 園長からのメッセージ画像 -->
            <?php
              $message_image = get_field('message_image');
              if ($message_image): ?>
                <img class="message__flex--image" src="<?php echo esc_url(wp_get_attachment_image_url($message_image, 'full')); ?>" alt="園長からのメッセージ" class="nursery-message-image">
            <?php endif; ?>
            <!-- 園長からのメッセージ内容 -->
            <!-- <?php if( get_field('message_area') ): ?>
              <p class="message__flex--textarea"><?php the_field('message_area'); ?></p>
            <?php endif; ?> -->
            <?php //カスタムフィールド入力欄で改行
              $nursery_message = get_field('message_area');
              if ($nursery_message) {
                  echo '<p class="message__flex--textarea">' . nl2br(wp_kses_post($nursery_message)) . '</p>';
              }
            ?>
          </div><!-- / -->  
        </div><!-- / -->

      <!-- 園の概要 -->
      <div class="about-nursery">
        <div class="about-nursery__inner">
          <!-- title-icon -->
          <?php
            get_template_part('template-parts/title-icon', null, ['name' => 'about-nursery']);// title-icon をインクルード
          ?>

          <div class="nursery-info">
            <!-- 所在地 -->
            <div class="info-box">
                <strong>所在地</strong>
                <address class="info-box__text"><?php the_field('nursery_address'); ?></address>
            </div>

            <!-- TEL / FAX -->
            <div class="info-box">
                <strong>TEL / FAX</strong>
                <address class="info-box__text tel-sp"><?php the_field('nursery_tel_fax'); ?></address>
            </div>

            <!-- 対象 -->
            <div class="info-box">
                <strong>対象</strong>
                <p class="info-box__text target-sp"><?php the_field('nursery_target'); ?></p>
            </div>

            <!-- 入園日 -->
            <div class="info-box">
                <strong>入園日</strong>
                <?php //カスタムフィールド入力欄で改行
                  $nursery_admission = get_field('nursery_admission');
                  if ($nursery_admission) {
                      echo '<p class="info-box__textarea">' . nl2br(wp_kses_post($nursery_admission)) . '</p>';
                  }
                ?>
            </div>

            <!-- 開園日（チェックボックスで〇/ー表示） -->
            <?php
              $weekdays = array(
                  'mon' => '月',
                  'tue' => '火',
                  'wed' => '水',
                  'thu' => '木',
                  'fri' => '金',
                  'sat' => '土',
                  'sun' => '日'
              );
              $selected_days = get_field('nursery_open_days');
              $open_days = array_fill_keys(array_keys($weekdays), 'ー');
              if ($selected_days) {
                foreach ($selected_days as $day) {
                  if (isset($open_days[$day])) {
                      $open_days[$day] = '〇';
                  }
                }
              }
            ?>

            <div class="info-box">
              <!-- 開園日 -->
              <strong>開園日</strong>
              <div class="info-box__flex">
                <table>
                  <tr>
                    <?php foreach ($weekdays as $key => $label): ?>
                      <th><?php echo esc_html($label); ?></th>
                    <?php endforeach; ?>
                  </tr>
                  <tr>
                    <?php foreach ($weekdays as $key => $label): ?>
                      <td><?php echo esc_html($open_days[$key]); ?></td>
                    <?php endforeach; ?>
                  </tr>
                </table>
                <p class="info-box__flex--text">
                  月曜日～土曜日〔日曜日、祝日・休日、年末年始（12/29～1/3）はお休み〕
                </p>
              </div><!-- / -->  
            </div>

            <!-- 保育時間 -->
            <div class="info-box">
              <strong>保育時間</strong>
              <div class="nursery-hours">
                <p class="nursery-hours__text">保育標準時間認定の方</p>
                <table class="table t1">
                  <tr>
                    <th>保育標準時間</th>
                    <td><?php the_field('standard_hours'); ?></td>
                  </tr>
                  <tr>
                    <th>延長保育</th>
                    <td><?php the_field('standard_extension'); ?></td>
                  </tr>
                </table>
                <p class="nursery-hours__text">保育短時間認定の方</p>
                <table>
                  <tr>
                    <th>保育標準時間</th>
                    <td><?php the_field('short_hours'); ?></td>
                  </tr>
                  <tr>
                    <th class="extension-th">延長保育</th>
                    <td>
                      <?php  //カスタムフィールド<br>に対して改行する
                      $short_extension = get_field('short_extension'); // ACFのカスタムフィールドを取得
                      if ($short_extension) {
                          $lines = explode('<br>', $short_extension); // <br> で分割
                          foreach ($lines as $line) {
                              echo '<p>' . esc_html(trim($line)) . '</p>'; // 各行を<p>タグで囲む
                          }
                      }
                      ?>
                    </td>
                  </tr>
                </table>
              </div><!-- / -->  
            </div>

            <!-- 定員 -->
            <?php
              $capacities = SCF::get('capacity'); // SCFの繰り返しフィールド「定員」を取得
              $total_capacity = 0; // 合計人数の初期値

              if (!empty($capacities)) :
            ?>
            <div class="info-box">
              <strong>定員</strong>

              <div class="capacity">
    <table>
        <tr>
            <th class="total-capacity th">定員</th>
            <th>1歳児</th>
            <th>2歳児</th>
            <th>3歳児</th>
            <th>4歳児</th>
            <th>5歳児</th>
        </tr>
        <?php 
        $total_capacity = 0; // 合計値を初期化
        foreach ($capacities as $capacity) : 
            $age_counts = [
                $capacity['nursery_capacity_1'],
                $capacity['nursery_capacity_2'],
                $capacity['nursery_capacity_3'],
                $capacity['nursery_capacity_4'],
                $capacity['nursery_capacity_5']
            ];
            $row_total = array_sum($age_counts); // 各行の合計
            $total_capacity += $row_total; // 全体の合計を累積
        ?>
        <tr>
            <td class="total-capacity td"><?php echo esc_html($row_total); ?>名</td>
            <td><?php echo esc_html($capacity['nursery_capacity_1']); ?>名</td>
            <td><?php echo esc_html($capacity['nursery_capacity_2']); ?>名</td>
            <td><?php echo esc_html($capacity['nursery_capacity_3']); ?>名</td>
            <td><?php echo esc_html($capacity['nursery_capacity_4']); ?>名</td>
            <td><?php echo esc_html($capacity['nursery_capacity_5']); ?>名</td>
        </tr>
        <?php endforeach; ?>
    </table>
    <p class="capacity__text">※定員は、開園初年度から数年をかけて102名の定員に変更していきます。</p>
</div><!-- / -->

            </div>
            <?php endif; ?>

            <!-- 職員 -->
            <?php
              $staffs = SCF::get('staff'); // SCFの繰り返しフィールド「職員」を取得
              $total_staff = 0; // 合計人数の初期値
              if (!empty($staffs)) :
            ?>
            <div class="info-box">
              <strong>職員</strong>

              <div class="staff">
                <table>
                  <tr>
                    <th class="total-staff th">定員</th>
                    <th>園長</th>
                    <th>保育士</th>
                    <th>調理師</th>
                    <th>看護師</th>
                    <th>事務員</th>
                  </tr>
                  <?php foreach ($staffs as $staff) : ?>
                    <?php
                      $staff_counts = [
                        $staff['staff_director1'],
                        $staff['staff_manager'],
                        $staff['staff_caretaker'],
                        $staff['staff_nurse'],
                        $staff['staff_nutritionist']
                      ];
                      $row_total = array_sum($staff_counts); // 行ごとの合計
                      $total_staff += $row_total; // 全体の合計を計算
                    ?>
                    <tr>
                      <td class="total-staff td"><?php echo esc_html($row_total); ?>名以上</td>
                      <td><?php echo esc_html($staff['staff_director1']); ?>名</td>
                      <td><?php echo esc_html($staff['staff_manager']); ?>名</td>
                      <td><?php echo esc_html($staff['staff_caretaker']); ?>名</td>
                      <td><?php echo esc_html($staff['staff_nurse']); ?>名</td>
                      <td><?php echo esc_html($staff['staff_nutritionist']); ?>名</td>
                    </tr>
                  <?php endforeach; ?>
                </table>
                <p class="staff__text">※嘱託医  １名</p>
                <p class="staff__text">※保育士は認可保育所の基準に準じます。</p>
                <p class="staff__text">※保育児童数・年齢に応じたシフトにより、職員を増減します。</p>
              </div><!-- /.staff -->  
            </div>
            <?php endif; ?>
          </div>
        </div>  
      </div>
    <?php endwhile; ?>
    </div>
  </section>

  <!-- こおもれびだより -->
  <section id="letter" class="pink-bk">
    <!-- title-icon -->  
    <?php
      get_template_part('template-parts/title-icon', null, ['name' => 'letter']);// title-icon をインクルード
    ?>

    <?php
      $args = [
          'post_type'      => 'letter', // 投稿タイプが 'letter'
          'posts_per_page' => 3,
      ];

      // WP_Query 実行
      $query = new WP_Query($args);
    ?>

    <div class="letter-list">
      <?php if ($query->have_posts()) : ?>
        <?php while ($query->have_posts()) : $query->the_post(); ?>
          <?php
          $related_nursery_id = get_field('related_nursery'); // ACFリレーションで関連園を取得
          $nursery_name = $related_nursery_id ? get_the_title($related_nursery_id) : '不明な園';
          $prefecture = get_field('nursery_address', $related_nursery_id);
          ?>
                  
            <a href="<?php the_permalink(); ?>" class="letter-card">
              <!-- サムネイル画像 -->
              <?php
                $thumbnail = get_field('letter_image');
                if ($thumbnail):
                  ?>
                <img class="letter-card__image"src="<?php echo esc_url(wp_get_attachment_image_url($thumbnail, 'full')); ?>" alt="<?php the_title(); ?>">
              <?php endif; ?>
              <div class="letter-card__textarea">
                <!-- 記事タイトル -->
                <h2 class="letter-card__textarea--title"><?php the_title(); ?>からのおたより</h2>
                <!-- サムネイルタイトル -->
                <?php if( get_field('letter_title') ): ?>
                  <h3 class="letter-card__textarea--letter-title"><?php the_field('letter_title'); ?></h3>
                <?php endif; ?>
                <!-- 投稿日時 -->
              </div><!-- / -->   
              
              <time class="letter-card__post-date" datetime="<?php echo get_the_date('Y-m-d'); ?>">
                <?php
                $date = get_the_date('Y年n月j日'); // 例: 2024年4月1日
                $date_hiragana = str_replace(['年', '月', '日'], ['ねん', 'がつ', 'にち'], $date);
                echo esc_html($date_hiragana);
                ?>
              </time>
            </a>
            <?php endwhile; ?>
        <?php else : ?>
            <p>該当する記事はありません。</p>
        <?php endif; ?>
    </div>

    <a href="<?php echo get_post_type_archive_link('letter'); ?>" class="btn intro-btn fe">
      <p class="btn__text">もっと見る</p>
      <i class="fa-solid fa-angle-right"></i>
    </a>

    <?php wp_reset_postdata(); ?>
  </section>


    <!--section/ contact -->
    <?php
        get_template_part('template-parts/contact'); // recruit をインクルード
    ?>



  </main>


  <!-- ---footer読み込み ----------------------------------------------->
  <?php
    get_template_part('template-parts/footer'); // footer.php をインクルード
  ?>
  <!-- ---------------------------------------------------------------------->
  </body>   