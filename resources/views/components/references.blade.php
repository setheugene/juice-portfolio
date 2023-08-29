<section class="references mb-32">
  <div class="container relative z-10">
    <div class="row justify-center">
      <div class="col w-full">
        <div class="row">
          <div class="col w-full lg:w-1/2 js-fade">
            <div class="wysiwyg">
              <?php if(!empty(get_sub_field('references_content'))) : ?>
                <?= get_sub_field('references_content') ?>
              <?php endif; ?>
            </div>

            <?php 
            $circle_link = get_sub_field('resources_left_column_link');
            if( $circle_link ): 
                $circle_link_url = $circle_link['url'];
                $circle_link_title = $circle_link['title'];
                $circle_link_target = $circle_link['target'] ? $circle_link['target'] : '_self';
                ?>
                <a class="magnetic-wrap circle" href="<?php echo esc_url( $circle_link_url ); ?>" target="<?php echo esc_attr( $circle_link_target ); ?>">
                  <div class="js-magnetic-area magnetic-size"></div>
                  <div class="js-magnetic-content">
                    <div class="round-button right"><?php echo esc_html( $circle_link_title ); ?></div>
                  </div>
                </a>
            <?php endif; ?>

          </div>
          <div class="col w-full lg:w-1/2">

            <div class="circle-container relative duration-300">
              
              <?php $floatingAssetLarge = get_sub_field('references_large_floating_asset');
              if( !empty( $floatingAssetLarge ) ) : ?>
                <div class="references_large-floating-asset">
                  <img src="<?php echo esc_url($floatingAssetLarge['url']); ?>" alt="<?php echo esc_attr($floatingAssetLarge['alt']); ?>" />
                </div>
              <?php endif; ?>
  
              <?php $floatingAssetSmall = get_sub_field('references_small_floating_asset');
              if( !empty( $floatingAssetSmall ) ) : ?>
                <div class="references_small-floating-asset">
                  <img src="<?php echo esc_url($floatingAssetSmall['url']); ?>" alt="<?php echo esc_attr($floatingAssetSmall['alt']); ?>" />
                </div>
              <?php endif; ?>

              <?php if( !empty(get_sub_field( 'resources_top_right_link' ))) : ?>
                <a href="<?php echo get_sub_field('resources_top_right_link');  ?>" class="magnetic-wrap relative references_top-right-float" <?php echo get_sub_field('resources_bottom_right_icon_blank') ? 'target="_blank"' : ''; ?>>
                  <div class="js-magnetic-area magnetic-size"></div>
                  <div class="js-magnetic-content">
                    <div class="icon-wrapper floating-button relative z-20 h-24 w-24 rounded-full flex items-center justify-center">
                      <svg class="icon h-[43px] w-[43px] text-white icon-<?php echo get_sub_field('resources_top_right_icon_svg_icon'); ?>"><use xlink:href="#icon-<?php echo get_sub_field('resources_top_right_icon_svg_icon'); ?>"></use></svg>
                    </div>
                  </div>
                </a>
              <?php endif; ?>

              <?php if( !empty(get_sub_field( 'resources_bottom_right_link' ))) : ?>
                <a href="<?php echo get_sub_field('resources_bottom_right_link');  ?>" class="magnetic-wrap relative references_bottom-right-float" <?php echo get_sub_field('resources_bottom_right_icon_blank') ? 'target="_blank"' : ''; ?>>
                  <div class="js-magnetic-area magnetic-size"></div>
                  <div class="js-magnetic-content">
                    <div class="icon-wrapper floating-button relative z-20 h-16 w-16 rounded-full flex items-center justify-center">
                      <svg class="icon h-[25px] w-[25px] text-white icon-<?php echo get_sub_field('resources_bottom_right_icon_svg_icon'); ?>"><use xlink:href="#icon-<?php echo get_sub_field('resources_bottom_right_icon_svg_icon'); ?>"></use></svg>
                    </div>
                  </div>
                </a>
              <?php endif; ?>

              <?php if( !empty(get_sub_field( 'resources_spotify_embed' ))) : ?>
                <button class="magnetic-wrap relative references_bottom-left-float" data-toggle-target="#spotify-popup" data-toggle-class="is-open">
                  <div class="js-magnetic-area magnetic-size" data-toggle-trigger-off="#spotify-popup"></div>
                  <div class="js-magnetic-content">
                    <div class="icon-wrapper floating-button relative z-20 h-20 w-20 rounded-full flex items-center justify-center">
                      <svg class="icon icon-<?php echo get_sub_field('resources_spotify_icon_svg_icon'); ?> h-8 w-8"><use xlink:href="#icon-<?php echo get_sub_field('resources_spotify_icon_svg_icon'); ?>"></use></svg>
                    </div>
                    <div id="spotify-popup" class="z-10" >
                      <div class="spotify-close" >
                        <svg class="icon icon-exit"><use xlink:href="#icon-exit"></use></svg>
                      </div>
                      <?php echo get_sub_field('resources_spotify_embed');  ?>
                      
                    </div>
                  </div>
                </button>
              <?php endif; ?>

            </div>

           {{-- <lottie-player src="<?php //echo get_template_directory_uri(); ?>/resources/lottie/Page_Transition.json" background="transparent"  speed="1"  style="width: 300px; height: 300px;" loop autoplay></lottie-player> --}}
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="references_splide mt-[50px] splide" aria-label="references page scrolling marquee">
    <div class="splide__track">
      <div class="splide__list">
        <div class="outline-text splide__slide flex no-wrap">
          <?php echo get_sub_field('referenes_scrolling_text'); ?>
          <div class="dot flex-shrink-0"></div>
        </div>
        <div class="outline-text splide__slide">
          <?php echo get_sub_field('referenes_scrolling_text'); ?>
          <div class="dot flex-shrink-0"></div>
        </div>
        <div class="outline-text splide__slide">
          <?php echo get_sub_field('referenes_scrolling_text'); ?>
          <div class="dot flex-shrink-0"></div>
        </div>
        <div class="outline-text splide__slide">
          <?php echo get_sub_field('referenes_scrolling_text'); ?>
          <div class="dot flex-shrink-0"></div>
        </div>
      </div>
    </div>
  </div>
</section>