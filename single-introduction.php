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


    <div class="nursery-overview">
    <div class="container">



        <?php while ( have_posts() ) : the_post(); ?>    

        <!-- 園の種類カテゴリーを表示 -->
          <?php
            $categories = get_the_category(); // 投稿に関連付けられた全てのカテゴリーを取得
            if (!empty($categories)) {
                echo '<span class="news-header__flex--category">';
                echo esc_html($categories[0]->name); // 最初のカテゴリーのスラッグを表示
                echo '</span>';
            } else {
                // カテゴリーがない場合
                echo '<span class="post-category">未分類</span>';
            }
            ?>

          <?php
          $address = get_field('nursery_address');
          $detected_prefecture = get_prefecture_from_address($address);

          if ($detected_prefecture) {
              $prefecture_term = get_term_by('name', $detected_prefecture, 'prefecture_category');

              if ($prefecture_term) {
                  wp_set_post_terms(get_the_ID(), [$prefecture_term->term_id], 'prefecture_category', true);
              }
          }
          ?>

          

          <!-- サムネイル画像 -->
          <?php
            $thumbnail = get_field('thumbnail_image'); // 画像IDを取得
            if ($thumbnail): ?>
              <img src="<?php echo esc_url(wp_get_attachment_image_url($thumbnail, 'full')); ?>" alt="<?php the_title(); ?>" class="nursery-thumbnail">
          <?php endif; ?>
          <!-- サムネイルタイトル -->
          <?php if( get_field('thumbnail_title') ): ?>
            <h2 class="nursery-subtitle"><?php the_field('thumbnail_title'); ?></h2>
          <?php endif; ?>
          <!-- サムネイル説明 -->
          <?php if( get_field('thumbnail_textarea') ): ?>
            <p class="nursery-description"><?php the_field('thumbnail_textarea'); ?></p>
          <?php endif; ?>
          <!-- 園長からのメッセージ -->
            <!-- 園長からのメッセージ画像 -->
            <?php
              $message_image = get_field('message_image');
              if ($message_image): ?>
                <img src="<?php echo esc_url(wp_get_attachment_image_url($message_image, 'full')); ?>" alt="園長からのメッセージ" class="nursery-message-image">
            <?php endif; ?>
            <!-- 園長からのメッセージ内容 -->
            <?php if( get_field('message_area') ): ?>
              <p class="nursery-message"><?php the_field('message_area'); ?></p>
            <?php endif; ?>


      <article class="nursery-content">
        <section class="nursery-info">
          <h2 class="section-title">園の概要</h2>

                <!-- 所在地 -->
                <div class="info-box">
                    <strong>所在地</strong>
                    <p><?php the_field('nursery_address'); ?></p>
                </div>

                <!-- TEL / FAX -->
                <div class="info-box">
                    <strong>TEL / FAX</strong>
                    <p><?php the_field('nursery_tel_fax'); ?></p>
                </div>

                <!-- 対象 -->
                <div class="info-box">
                    <strong>対象</strong>
                    <p><?php the_field('nursery_target'); ?></p>
                </div>

                <!-- 入園日 -->
                <div class="info-box">
                    <strong>入園日</strong>
                    <p><?php the_field('nursery_admission'); ?></p>
                </div>

                <!-- 開園日（チェックボックスで〇/ー表示） -->
                <?php
                $weekdays = array(
                    'mon' => '月曜日',
                    'tue' => '火曜日',
                    'wed' => '水曜日',
                    'thu' => '木曜日',
                    'fri' => '金曜日',
                    'sat' => '土曜日',
                    'sun' => '日曜日'
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
                    <strong>開園日</strong>
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
                </div>

                <!-- 保育時間 -->
                <div class="info-box">
                    <strong>保育時間</strong>
                    <table>
                        <tr>
                            <th>標準時間保育</th>
                            <td><?php the_field('standard_hours'); ?></td>
                        </tr>
                        <tr>
                            <th>延長保育</th>
                            <td><?php the_field('standard_extension'); ?></td>
                        </tr>
                        <tr>
                            <th>短時間保育</th>
                            <td><?php the_field('short_hours'); ?></td>
                        </tr>
                        <tr>
                            <th>延長保育</th>
                            <td><?php the_field('short_extension'); ?></td>
                        </tr>
                    </table>
                </div>

                                <?php
                $capacities = SCF::get('capacity'); // SCFの繰り返しフィールド「定員」を取得
                $total_capacity = 0; // 合計人数の初期値

                if (!empty($capacities)) :
                ?>
                <div class="info-box">
                <strong>定員</strong>
                <table>
                    <tr>
                        <th>定員</th>
                        <th>1歳児</th>
                        <th>2歳児</th>
                        <th>3歳児</th>
                        <th>4歳児</th>
                        <th>5歳児</th>
                    </tr>
                    <?php foreach ($capacities as $capacity) : ?>
                        <?php
                        $age_counts = [
                            $capacity['nursery_capacity_1'],
                            $capacity['nursery_capacity_2'],
                            $capacity['nursery_capacity_3'],
                            $capacity['nursery_capacity_4'],
                            $capacity['nursery_capacity_5']
                        ];
                        $row_total = array_sum($age_counts); // 行ごとの合計
                        $total_capacity += $row_total; // 全体の合計を計算
                        ?>
                        <tr>
                            <td><?php echo esc_html($row_total); ?> 名</td>
                            <td><?php echo esc_html($capacity['nursery_capacity_1']); ?></td>
                            <td><?php echo esc_html($capacity['nursery_capacity_2']); ?></td>
                            <td><?php echo esc_html($capacity['nursery_capacity_3']); ?></td>
                            <td><?php echo esc_html($capacity['nursery_capacity_4']); ?></td>
                            <td><?php echo esc_html($capacity['nursery_capacity_5']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
                <p>※ 定員は、開園初年度から数年をかけて <?php echo esc_html($total_capacity); ?> 名の定員に変更していきます。</p>
                </div>
                <?php endif; ?>


                <?php
                $staffs = SCF::get('staff'); // SCFの繰り返しフィールド「職員」を取得
                $total_staff = 0; // 合計人数の初期値

                if (!empty($staffs)) :
                ?>
                <div class="info-box">
                <strong>職員</strong>
                <table>
                    <tr>
                        <th>定員</th>
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
                            <td><?php echo esc_html($row_total); ?> 名</td>
                            <td><?php echo esc_html($staff['staff_director1']); ?></td>
                            <td><?php echo esc_html($staff['staff_manager']); ?></td>
                            <td><?php echo esc_html($staff['staff_caretaker']); ?></td>
                            <td><?php echo esc_html($staff['staff_nurse']); ?></td>
                            <td><?php echo esc_html($staff['staff_nutritionist']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
                <p>※嘱託医  １名</p>
                <p>※ 保育士は認可保育所の基準に準じます。</p>
                <p>※ 保育児童数・年齢に応じたシフトにより、職員を増減します。</p>
                </div>
                <?php endif; ?>

      

              </section>
      </article>

                  

    <?php endwhile; ?>
    </div>
  </div>





  </main>


  <!-- ---footer読み込み ----------------------------------------------->
  <?php
    get_template_part('template-parts/footer'); // footer.php をインクルード
  ?>
  <!-- ---------------------------------------------------------------------->
  </body>   