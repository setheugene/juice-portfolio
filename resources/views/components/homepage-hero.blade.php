<section class="homepage-hero pb-10 relative z-20">
  <div class="container lg:pt-20">
    <div class="row">
      <div class="col w-full md:w-1/2 z-10 order-2 lg:order-1">
        <?php if( !empty(get_sub_field('homepage_hero_headings'))) : ?>
          <?php foreach( get_sub_field('homepage_hero_headings') as $heading ) : ?>
          <div class="flex items-center mb-[48px] last:mb-0">
            <?php 
            $icon = $heading['icon_svg_icon'];
            if( !empty( $icon ) ): ?>
                <svg class="icon h-10 w-10 flex-shrink-0 homepage-hero__icons mr-4 icon-<?php echo $icon; ?>"><use xlink:href="#icon-<?php echo $icon; ?>"></use></svg>
            <?php endif; ?>
            <h2 class="headings text-color-headers text-5xl lg:text-8xl flex-shrink">
              <?php echo $heading['heading']; ?>
            </h2>
          </div>
          <?php endforeach; ?>
        <?php endif; ?>
      </div>
      <div class="col w-full md:w-1/2 order-1 lg:order-2 my-20 lg:my-0">
        <div class="square relative">
          <div class="homepage-hero_headshot">
            <img class="" src="<?php echo esc_url(get_sub_field('homepage_hero_headshot')['url']); ?>" alt="<?php echo esc_attr(get_sub_field('homepage_hero_headshot')['alt']); ?>" />
          </div>
          <?php 
          $bottom_link = get_sub_field('homepage_hero_bottom_button');
          if( $bottom_link ): 
              $bottom_link_url = $bottom_link['url'];
              $bottom_link_title = $bottom_link['title'];
              $bottom_link_target = $bottom_link['target'] ? $bottom_link['target'] : '_self';
              ?>
              <a class="magnetic-wrap bottom" href="<?php echo esc_url( $bottom_link_url ); ?>" target="<?php echo esc_attr( $bottom_link_target ); ?>">
                <div class="js-magnetic-area magnetic-size"></div>
                <div class="js-magnetic-content">
                  <div class="round-button down flex flex-col justify-center items-center">
                    <?php echo esc_html( $bottom_link_title ); ?>
                    <svg class="icon icon-arrow h-10 w-10 mt-2"><use xlink:href="#icon-arrow"></use></svg>
                  </div>
                </div>
              </a>
          <?php endif; ?>
          <?php 
          $right_link = get_sub_field('homepage_hero_right_button');
          if( $right_link ): 
              $right_link_url = $right_link['url'];
              $right_link_title = $right_link['title'];
              $right_link_target = $right_link['target'] ? $right_link['target'] : '_self';
              ?>
              <a class="magnetic-wrap right" href="<?php echo esc_url( $right_link_url ); ?>" target="<?php echo esc_attr( $right_link_target ); ?>">
                <div class="js-magnetic-area magnetic-size"></div>
                <div class="js-magnetic-content">
                  <div class="round-button right flex items-center justify-center flex-col">
                    <svg class="icon icon-arrow h-10 w-10 mb-2"><use xlink:href="#icon-arrow"></use></svg>
                    <?php echo esc_html( $right_link_title ); ?>
                  </div>
                </div>
              </a>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
  <div class="homepage-hero_splide mt-[50px] splide" aria-label="homepage hero scrolling marquee">
    <div class="splide__track">
      <div class="splide__list">
        <div class="outline-text splide__slide flex no-wrap">
          <?php echo get_sub_field('homepage_hero_scrolling_text'); ?>
          <div class="dot flex-shrink-0"></div>
        </div>
        <div class="outline-text splide__slide">
          <?php echo get_sub_field('homepage_hero_scrolling_text'); ?>
          <div class="dot flex-shrink-0"></div>
        </div>
        <div class="outline-text splide__slide">
          <?php echo get_sub_field('homepage_hero_scrolling_text'); ?>
          <div class="dot flex-shrink-0"></div>
        </div>
        <div class="outline-text splide__slide">
          <?php echo get_sub_field('homepage_hero_scrolling_text'); ?>
          <div class="dot flex-shrink-0"></div>
        </div>
      </div>
    </div>
  </div>
</section> 
