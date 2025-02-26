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

<?php
$categories = get_terms([
    'taxonomy'   => 'osirase', // 'info' 用のカスタムタクソノミーがあれば変更
    'hide_empty' => false,
]);
?>

<div class="filter-buttons">
    <button data-category="all" class="filter-button active">すべて</button>
    <?php foreach ($categories as $category): ?>
        <button data-category="<?php echo esc_attr($category->slug); ?>" class="filter-button">
            <?php echo esc_html($category->name); ?>
        </button>
    <?php endforeach; ?>
</div>


<?php if (have_posts()) : ?>
  <?php while (have_posts()) : the_post(); ?>
    <a href="<?php the_permalink(); ?>" class="letter-card">

      <!-- おしらせカテゴリーを表示 -->
      <?php
         // おしらせカテゴリーを表示
$categories = get_the_terms(get_the_ID(), 'osirase'); // ✅ 'osirase' のタクソノミーを指定

if (!empty($categories) && !is_wp_error($categories)) {
    echo '<span class="news-header__flex--category">';
    echo esc_html($categories[0]->name); // ✅ 最初のカテゴリーの名前を表示
    echo '</span>';
} else {
    echo '<span class="post-category">未分類</span>';
}

            ?>

      <!-- 投稿日時 -->
      <time class="info__post-date"><?php echo get_the_date('Y. m. d'); ?></time>
      <!-- 記事タイトル -->
      <h1 class="letter-title"><?php the_title(); ?></h1>

      <?php
      // リピートフィールドを取得
      $repeater_data = SCF::get('subheading_content'); // リピートフィールドのグループ名
      if (!empty($repeater_data)) {
        foreach ($repeater_data as $item) {
          // 小見出しと段落内容を取得
          $subheading = isset($item['subheading']) ? esc_html($item['subheading']) : '小見出し未設定';
          $paragraph_content = isset($item['paragraph_content']) ? nl2br(esc_html($item['paragraph_content'])) : '段落内容未設定';

          // 出力
          echo '<div class="news-section ">';
          echo '<p class="news-section__paragraph fade-in">' . $paragraph_content . '</p>';
          echo '</div>';
          }
      } else {
          echo '<p>コンテンツが設定されていません。</p>';
      }
      ?>
    </a>
      <?php
      endwhile;?>
  

          <!-- ✅ ページネーション -->
    <div class="pagination fade-in">
        <?php echo paginate_links(); ?>
    </div>

      
        
  <?php else : ?>
    <p>投稿が見つかりませんでした。</p>
<?php endif; ?>
  
  </main>





  <!-- ---footer読み込み ----------------------------------------------->
  <?php
    get_template_part('template-parts/footer'); // footer.php をインクルード
  ?>
  <!-- ---------------------------------------------------------------------->
  </body>   