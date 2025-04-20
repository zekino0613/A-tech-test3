<section class="voice-section">
  <div class="container">
    <h2 class="section-title">Voice <span>お客様の声</span></h2>
    <div class="voice-list">
      <?php
      $args = array(
				'post_type'      => 'voice',
				'posts_per_page' => 3,
				'orderby'        => 'rand'
      );
      $voices = new WP_Query($args);

      if ($voices->have_posts()) :
        while ($voices->have_posts()) : $voices->the_post();
          $age = get_field('voice_age');
          $gender = get_field('voice_gender');
          $comment = get_field('voice_comment');
          $icon = get_field('voice_icon');
      ?>
        <div class="voice-item">
					<?php if ($icon): 
						$image_url = wp_get_attachment_image_url($icon, 'full');
					?>
						<img class="card__image"
								src="<?php echo esc_url($image_url); ?>"
								width="140"
								height="140"
								loading="lazy"
								alt="<?php echo esc_attr($age . $gender); ?>">
					<?php endif; ?>
				
          <div class="voice-content">
            <h3><?php echo esc_html($age . $gender); ?></h3>
            <p><?php echo nl2br(esc_html($comment)); ?></p>
          </div>
        </div>
      <?php endwhile; wp_reset_postdata(); endif; ?>
    </div>
  </div>
</section>
