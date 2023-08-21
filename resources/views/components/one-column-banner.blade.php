<section class="one-column-banner">
  <div class="container">
    <div class="row justify-center">
      <div class="col w-full lg:w-10/12">
        <div class="one-column-banner_content-wrapper relative">
          <div class="row justify-center">
            <div class="col w-4/5 js-fade">
              <h3 class="text-color-dark text-center hdg-3 mb-6">
                <?php echo get_sub_field('one_column_banner_heading') ?? ''; ?>
              </h3>
              <div class="wysiwyg text-color-dark">
                <?php echo get_sub_field('one_column_banner_content') ?? ''; ?>
              </div>
            </div>
          </div>
          <?php $topAsset = get_sub_field('one_column_banner_top_asset');
          if( !empty( $topAsset ) ) : ?>
            <div class="one-column-banner_top-asset">
              <img class="" src="<?php echo esc_url($topAsset['url']); ?>" alt="<?php echo esc_attr($topAsset['alt']); ?>" />
            </div>
          <?php endif; ?>
          <?php $bottomAsset = get_sub_field('one_column_banner_bottom_asset');
          if( !empty( $bottomAsset ) ) : ?>
            <div class="one-column-banner_bottom-asset">
              <img class="" src="<?php echo esc_url($bottomAsset['url']); ?>" alt="<?php echo esc_attr($bottomAsset['alt']); ?>" />
            </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</section>