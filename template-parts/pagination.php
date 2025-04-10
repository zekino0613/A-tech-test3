<?php
if (!isset($args['query']) || !($args['query'] instanceof WP_Query)) return;

$query = $args['query'];
$base_url = $args['base_url'] ?? get_pagenum_link(1);
$post_type = $args['post_type'] ?? ''; // ← 追加！

$current_page = max(1, get_query_var('paged'));

$pagination_args = [
  'total'     => $query->max_num_pages,
  'current'   => $current_page,
  'prev_text' => '<i class="fa-solid fa-chevron-left"></i>',
  'next_text' => '<i class="fa-solid fa-chevron-right"></i>',
  'type'      => 'plain',
];

// info はパーマリンク形式（/letter/page/2/）
if ($post_type === 'info') {
  $pagination_args['format'] = 'page/%#%/';
  $pagination_args['base'] = trailingslashit($base_url) . '%_%';
  $pagination_args['add_args'] = [];
}
// letter はパーマリンク形式（/letter/page/2/）
elseif ($post_type === 'letter') {
  $pagination_args['format'] = 'page/%#%/';
  $pagination_args['base'] = trailingslashit($base_url) . '%_%';
  $pagination_args['add_args'] = [];
}
// introduction はパーマリンク形式（/introduction/page/2/）
elseif ($post_type === 'introduction') {
  $pagination_args['format'] = 'page/%#%/';
  $pagination_args['base'] = trailingslashit($base_url) . '%_%';
  $pagination_args['add_args'] = [];
}

echo '<div class="pagination fade-in"><div class="pagination__inner">';
echo paginate_links($pagination_args);
echo '</div></div>';
?>
