@php
  $revealClasses = ['js-reveal-left', 'js-reveal-top', 'js-reveal-bottom'];
  shuffle($revealClasses);
  $revealClassLarge = $revealClasses['0'];
  $revealClassTop = $revealClasses['1'];
  $revealClassBottom = $revealClasses['2'];
@endphp
<section class="alternating-image-set">
  <div class="container">
    <div class="row">
      <div class="col w-full md:w-9/12 order-1 mb-12 md:mb-0 <?php echo get_sub_field('alternating_image_set_layout') === 'large-small' ? 'md:order-1' : 'md:order-2' ?>">
        <div class="relative aspect-horizontal">
          <?php $largeImage = get_sub_field('alternating_image_set_large');
          if( !empty( $largeImage ) ): ?>
            <div class="fit-image">
              <img class="alternating-image-set_large @php echo $revealClassLarge; @endphp" src="<?php echo esc_url($largeImage['url']); ?>" alt="<?php echo esc_attr($largeImage['alt']); ?>" />
            </div>
          <?php endif; ?>
        </div>
      </div>
      <div class="col w-full md:w-3/12 order-2 <?php echo get_sub_field('alternating_image_set_layout') === 'large-small' ? 'md:order-2' : 'md:order-1' ?>">
        <div class="flex flex-col h-full">
          <div class="relative aspect-square mb-12 flex-grow">
            <?php $topImage = get_sub_field('alternating_image_set_top');
            if( !empty( $topImage ) ): ?>
              <div class="fit-image">
                <img class="alternating-image-set_top @php echo $revealClassTop; @endphp" src="<?php echo esc_url($topImage['url']); ?>" alt="<?php echo esc_attr($topImage['alt']); ?>" />
              </div>
            <?php endif; ?>
          </div>
          <div class="relative aspect-square flex-grow">
            <?php $bottomImage = get_sub_field('alternating_image_set_bottom');
            if( !empty( $bottomImage ) ): ?>
              <div class="fit-image">
                <img class="alternating-image-set_bottom @php echo $revealClassBottom; @endphp" src="<?php echo esc_url($bottomImage['url']); ?>" alt="<?php echo esc_attr($bottomImage['alt']); ?>" />
              </div>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>