<section class="masonry-grid">
  <div class="container">
    <?php if(get_sub_field('masonry_grid_images')) : ?>
      <div class="masonry-grid_grid row">
        <?php foreach(get_sub_field('masonry_grid_images') as $key => $image) : ?>
          <?php if( $key === 1 || $key === 2 ) : ?>
            <div class="col w-full md:w-1/2 <?php echo $key === 2 ? 'mt-12 js-reveal-bottom' : 'js-reveal-top'; ?>">
              <div class="relative aspect-short-square fit-image-wrapper">
                <div class="fit-image">
                  <img class="masonry-grid_image" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                </div>
              </div>
            </div>
          <?php else: ?>
            <div class="col w-full md:w-1/2 <?php echo $key === 3 ? '-mt-12 js-reveal-left' : ' js-reveal-right'; ?>">
              <div class="relative aspect-tall-square fit-image-wrapper">
                <div class="fit-image">
                  <img class="masonry-grid_image" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                </div>
              </div>
            </div>
          <?php endif; ?>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>
  </div>
</section>