
<aside class="archive-sidebar fade-in">
  <h3>Year</h3>
  <ul class="archive-list">
    <li><a href="<?php echo esc_url(get_post_type_archive_link('news')); ?>">すべて</a></li>
    <?php
    global $wpdb;
    $years = $wpdb->get_col("
      SELECT DISTINCT YEAR(ADDDATE(post_date, INTERVAL -3 MONTH)) AS fiscal_year
      FROM $wpdb->posts
      WHERE post_type = 'news' AND post_status = 'publish'
      ORDER BY fiscal_year DESC
    ");
    foreach ($years as $year) :
      $url = home_url("/news/{$year}/");
    ?>
      <li><a href="<?php echo esc_url($url); ?>"><?php echo esc_html($year); ?></a></li>
    <?php endforeach; ?>
  </ul>
</aside>



    </div>
  </div>
<?php wp_reset_postdata(); ?>
