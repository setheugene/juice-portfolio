@php
  $revealOne = '';
  $revealOne = ['js-reveal-left', 'js-reveal-top', 'js-reveal-bottom'];
  $selectedRevealOne = array_rand($revealOne, 1);
  $revealOne = $revealOne[$selectedRevealOne];
  $revealTwo = '';
  $revealTwo = ['js-reveal-left', 'js-reveal-top', 'js-reveal-bottom'];
  $selectedRevealTwo = array_rand($revealTwo, 1);
  $revealTwo = $revealTwo[$selectedRevealTwo];
@endphp
<section class="about-hero pt-12 lg:pt-20 pb-24 lg:pb-32">
  <div class="container">
    <div class="row">
      <div class="col w-full lg:w-1/2">
        <div class="row">
          <div class="col w-2/3">
            <?php if(get_sub_field('about_hero_list_items') != '') :?>
              <div class="flex items-center mb-8">
                <?php foreach( get_sub_field('about_hero_list_items') as $list_item ) : ?>
                  <div class="text-color-accent uppercase font-bold paragraph-default mr-12 last:mr-0 featured-projects_project-tags">
                    <?= $list_item['list_item']; ?>
                  </div>
                <?php endforeach; ?>
              </div>
            <?php endif; ?>
            <p class="text-color-dark paragraph-small mb-12">
              <?= get_sub_field('about_hero_description') ?? ''; ?>
            </p>
          </div>
        </div>
        <?php $leftImage = get_sub_field('about_hero_left_image');
        if( !empty( $leftImage ) ) : ?>
          <div class="<?php echo $revealOne; ?> relative about-hero_left-image hidden lg:block">
            <div class="fit-image">
              <img class="" src="<?php echo esc_url($leftImage['url']); ?>" alt="<?php echo esc_attr($leftImage['alt']); ?>" />
            </div>
          </div>
        <?php endif; ?>
      </div>
      <div class="col w-full lg:w-1/2">
        <div class="flex items-center justify-between mb-12">
          <?php if( get_sub_field('about_hero_icons') != ''): ?>
            <?php foreach(get_sub_field('about_hero_icons') as $icon) : ?>
              <div class="about-hero_icon-wrapper">
                <svg class="icon about-hero_icon text-color-accent icon-<?php echo $icon['svg_icon'] ?>"><use xlink:href="#icon-<?php echo $icon['svg_icon'] ?>"></use></svg>
              </div>
            <?php endforeach; ?>
          <?php endif; ?>
        </div>
        <?php $rightImage = get_sub_field('about_hero_right_image');
        if( !empty( $rightImage ) ) : ?>
          <div class="relative about-hero_right-image mb-12 <?php echo $revealTwo; ?>">
            <div class="fit-image">
              <img class="overlapping-gallery_right-image" src="<?php echo esc_url($rightImage['url']); ?>" alt="<?php echo esc_attr($rightImage['alt']); ?>" />
            </div>
          </div>
        <?php endif; ?>
        <?php if(get_sub_field('about_hero_heading_list') != '') : ?>
          <?php foreach(get_sub_field('about_hero_heading_list') as $heading) : ?>
            <div class="hdg-hero text-color-dark mb-2 last:mb-0">
              <?php echo $heading['heading']; ?>
            </div>
          <?php endforeach; ?>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>