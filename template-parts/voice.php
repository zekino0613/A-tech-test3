<section id="voice">
  <div class="voice__inner container">
		<!--【h3セクションタイトル】 -->
		<div class="section-title">
			<h3 class="section-title__eng">voice</h3>
			<span class="section-title__ja">お客様の声</span>		
		</div>
		
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
					<div class="voice-item__image">
						<img
								src="<?php echo esc_url($image_url); ?>"
								width="140"
								height="140"
								loading="lazy"
								alt="<?php echo esc_attr($age . $gender); ?>">
					</div>			
					<?php endif; ?>
				
          <div class="voice-item__content">
            <h3 class="voice-item__content--gender">
							<?php echo esc_html($age . $gender); ?>
						</h3>
            <p class="voice-item__content--comment">
							<?php echo nl2br(esc_html($comment)); ?>
						</p>
          </div>
        </div>
      <?php endwhile; wp_reset_postdata(); endif; ?>
    </div>
		<!-- slanted-svg-button.php -->
		<?php
					get_template_part('template-parts/slanted-svg-button', null, [
						'label' => 'TOPページへ戻る',
						'width' => '336px',
						'url'   => home_url('/')
					]);
				?>
  </div>
</section>
