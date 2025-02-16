<?php
if (empty($address)) {
    echo '<p>住所が設定されていません。</p>';
    return;
}

// Google Maps Static API URLを生成
$map_url = 'https://maps.googleapis.com/maps/api/staticmap?center=' 
    . urlencode($address) 
    . '&zoom=16&size=570x360&maptype=roadmap'
    . '&markers=color:red%7C' . urlencode($address)
    . '&key=AIzaSyDlqCpEilBj9IwP6UyUJO8TSTq9oylmlCE';

echo '<div id="map-container">';
echo '<img src="' . esc_url($map_url) . '" alt="Map of ' . esc_html($address) . '" style="width: 100%; height: 360px;">';
echo '</div>';
?>
