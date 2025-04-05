<?php
/**
 * 共通ページネーションテンプレート
 * 使用方法: get_template_part('template-parts/pagination', null, ['query' => $wp_query, 'base_url' => home_url('/example/')]);
 */
if (!isset($args['query']) || !($args['query'] instanceof WP_Query)) return;

$query = $args['query'];
$total_pages = $query->max_num_pages;
$current_page = max(1, get_query_var('paged', 1));
$base_url = $args['base_url'] ?? get_pagenum_link(1);

if ($total_pages <= 1) return;

?>

<div class="pagination fade-in">
  <div class="pagination__inner">
    <?php
    echo paginate_links([
      'total'     => $total_pages,
      'current'   => $current_page,
      'prev_text' => '<i class="fa-solid fa-chevron-left"></i>',
      'next_text' => '<i class="fa-solid fa-chevron-right"></i>',
      'format'    => 'page/%#%/',
      'base'      => trailingslashit($base_url) . '%_%',
      'type'      => 'plain',
    ]);
    ?>
  </div>
</div>
