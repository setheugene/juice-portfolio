@php
  $revealClass = '';
  $revealClasses = ['js-reveal-left', 'js-reveal-top', 'js-reveal-bottom'];
  $selectedReveal = array_rand($revealClasses, 1);
  $revealClass = $revealClasses[$selectedReveal];
@endphp
<section class="left-right <?= get_sub_field('left_right_vertical_spacing_options') ?? ''; ?>">
  <div class="container">
    <div class="row items-center">
      <div class="col w-full md:w-1/2 order-1 mb-12 md:mb-0 <?= get_sub_field('left_right_layout') === 'image-content' ? 'md:order-1' : 'md:order-2'; ?>">
        <?php if( !empty(get_sub_field('left_right_image'))) : ?>
        <?php $image = get_sub_field('left_right_image'); ?>
          <div class="relative aspect-square @php echo $revealClass; @endphp">
            <div class="fit-image">
              <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
            </div>
          </div>
        <?php endif; ?>
      </div>
      <div class="col w-full js-fade md:w-1/2 order-2 <?= get_sub_field('left_right_layout') === 'image-content' ? 'md:order-1' : 'md:order-2'; ?>">
        <div class="wysiwyg">
          <?= get_sub_field('left_right_content') ?? ''; ?>
        </div>
      </div>
    </div>
  </div>
</section>