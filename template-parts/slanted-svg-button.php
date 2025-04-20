<?php
/**
 * 斜めSVGボタンテンプレート
 * 使用例: get_template_part('template-parts/button/slanted-svg-button', null, [
 *   'label' => 'View more',
 *   'url' => '#'
 * ]);
 */

// デフォルト値
$label = $args['label'] ?? 'テンプレート';;//テキスト
$url   = $args['url'] ?? '#'; //遷移先
?>

<div class="slanted-svg-button">
  <a href="<?php echo esc_url($url); ?>">
    <svg viewBox="0 -6 269 65" xmlns="http://www.w3.org/2000/svg">
      <!-- 下の影 -->
      <polygon class="button-shadow" points="0,0 185,0 210,50 0,50" />
      <!-- 上の白ボタン -->
      <polygon class="button-shape" points="0,0 185,0 210,50 0,50" transform="translate(6, -6)" />

      <!-- テキスト -->
      <foreignObject x="6" y="-6" width="220" height="55">
        <div class="button-text" xmlns="http://www.w3.org/1999/xhtml">
          <?php echo esc_html($label); ?> <span class="arrow">→</span>
        </div>
      </foreignObject>
    </svg>
  </a>
</div>
