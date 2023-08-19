<section class="click-to-play relative">
  <?php $image = get_sub_field('click_to_play_image');
  if( !empty( $image ) ): ?>
    <a href="https://www.youtube.com/watch?v=m8P2O2kHdSM" class="click-to-play_clickable-area video-popup-trigger">
      <div class="fit-image">
        <img class="overlapping-gallery_left-image" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
      </div>
    </a>
  <?php endif; ?>
</section>
