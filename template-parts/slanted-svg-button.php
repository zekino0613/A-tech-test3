<?php
// デフォルト値
$label = $args['label'] ?? 'テンプレート'; // テキスト
$url   = $args['url']   ?? '#';             // 遷移先
$width = $args['width'] ?? '400px';         // ✅ 追加：幅指定（px, %, clamp など）
?>

<div class="slanted-svg-button" style="width: <?php echo esc_attr($width); ?>;">
  <a href="<?php echo esc_url($url); ?>">
    <svg viewBox="0 -6 230 60" xmlns="http://www.w3.org/2000/svg" width="100%">
      <!-- 下の影 -->
      <polygon class="button-shadow" points="0,0 185,0 210,50 0,50" />
      <!-- 上の白ボタン -->
      <polygon class="button-shape" points="0,0 185,0 210,50 0,50" transform="translate(6, -6)" />

      <!-- テキスト -->
      <foreignObject x="6" y="-6" width="100%" height="100%">
        <div class="button-text" xmlns="http://www.w3.org/1999/xhtml">
          <?php echo esc_html($label); ?> <span class="arrow">→</span>
        </div>
      </foreignObject>
    </svg>
  </a>
</div>





<!-- 269 65 -->