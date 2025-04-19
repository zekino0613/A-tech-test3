<?php
if (!isset($args['query']) || !($args['query'] instanceof WP_Query)) return;

$query       = $args['query'];
$current_page = max(1, get_query_var('paged'));
$post_type   = $args['post_type'] ?? '';
$year        = get_query_var('year');
$base_url = get_post_type_archive_link('news');

// 年フィルターがあるときだけ /news/2025/ にする
if ($year) {
  $base_url = home_url("/news/$year/");
}

$pagination_args = [
  'total'     => $query->max_num_pages,
  'current'   => $current_page,
	'base' => trailingslashit($base_url) . '%_%',
	'format' => 'page/%#%/',
  'prev_text' => '<i class="fa-solid fa-chevron-left"></i>',
  'next_text' => '<i class="fa-solid fa-chevron-right"></i>',
  'type'      => 'plain',
  'add_args'  => [], // GET引数がある場合に追加
];

echo '<div class="pagination fade-in"><div class="pagination__inner">';
echo paginate_links($pagination_args) ?: '<span class="page-numbers current">1</span>';
echo '</div></div>';
?>
