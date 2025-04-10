
<aside class="archive-sidebar fade-in">
  <h3>アーカイブ</h3>
  <ul class="archive-list">
    <?php
    global $wpdb;
    $archives = $wpdb->get_results("
        SELECT DISTINCT YEAR(post_date) as year, MONTH(post_date) as month, COUNT(ID) as post_count
        FROM $wpdb->posts
        WHERE post_type = 'letter' AND post_status = 'publish'
        GROUP BY YEAR(post_date), MONTH(post_date)
        ORDER BY post_date DESC
    ");

    $grouped_archives = [];
    foreach ($archives as $archive) {
      $y = esc_html($archive->year);
      $m = esc_html($archive->month);

      if (!isset($grouped_archives[$y])) {
        $grouped_archives[$y] = [];
      }
      $grouped_archives[$y][] = $m;
    }

    foreach ($grouped_archives as $y => $months) {
      echo '<li class="archive-year"><p>' . $y . 'ねん</p>';
      echo '<ul class="archive-months">';
      foreach ($months as $m) {
        $link = get_month_link($y, $m);
        echo '<li><a href="' . esc_url($link) . '">' . $m . 'がつ </a></li>';
      }
      echo '</ul></li>';
    }
    ?>
  </ul>
</aside>


    </div>
  </div>
<?php wp_reset_postdata(); ?>
