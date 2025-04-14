<?php
if (!isset($args['query']) || !($args['query'] instanceof WP_Query)) return;

$query = $args['query'];
$base_url = $args['base_url'] ?? get_pagenum_link(1);
$post_type = $args['post_type'] ?? '';

$current_page = max(1, get_query_var('paged'));

$pagination_args = [
  'total'     => $query->max_num_pages,
  'current'   => $current_page,
  'prev_text' => '<i class="fa-solid fa-chevron-left"></i>',
  'next_text' => '<i class="fa-solid fa-chevron-right"></i>',
  'type'      => 'plain',
];

// 各 post_type ごとのパーマリンク形式を適用
$pagination_args['format'] = 'page/%#%/';
$pagination_args['base'] = trailingslashit($base_url) . '%_%';
$pagination_args['add_args'] = [];

// ページネーション出力
$pagination_links = paginate_links($pagination_args);

echo '<div class="pagination fade-in"><div class="pagination__inner">';

// 1ページ分しかない場合も「1」だけは出力
if ($pagination_links) {
  echo $pagination_links;
} else {
  echo '<span class="page-numbers current">1</span>';
}

echo '</div></div>';
?>
