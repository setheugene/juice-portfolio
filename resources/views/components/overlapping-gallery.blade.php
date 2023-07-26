<section class="overlapping-gallery py-24 activate">
  <div class="container">
    <div class="row">
      <div class="col w-full md:w-1/2">
        <div class="tags">
          <?php $project_tags = get_the_tags(); ?>
          <?php if( !empty( $project_tags ) ) : ?>
            <div class="lg:ml-4 flex items-center mb-8">
              <?php foreach( $project_tags as $project_tag ) : ?>
                <div class="text-color-accent uppercase font-bold paragraph-default mr-12 last:mr-0 featured-projects_project-tags">
                  <?= $project_tag->name; ?>
                </div>
              <?php endforeach; ?>
            </div>
          <?php endif; ?>
          <div class="lg:ml-4 hdg-1 text-color-headers">
            <?= get_the_title( ) ?? ''; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container -mt-14 pb-12 hidden lg:block">
    <div class="row justify-end">
      <div class="col w-full lg:w-11/12">
        <div class="row justify-between relative">
          <div class="left-image w-[45%] col">
            <?php $leftImage = get_sub_field('overlapping_gallery_left_image');
            if( !empty( $leftImage ) ): ?>
              <div class="aspect-square relative js-reveal-left js-parallax-reverse">
                <div class="fit-image">
                  <img class="overlapping-gallery_left-image" src="<?php echo esc_url($leftImage['url']); ?>" alt="<?php echo esc_attr($leftImage['alt']); ?>" />
                </div>
              </div>
            <?php endif; ?>
          </div>
          <div class="right-image w-[54%] col">
            <?php $rightImage = get_sub_field('overlapping_gallery_right_image');
            if( !empty( $rightImage ) ): ?>
              <div class="aspect-horizontal relative js-reveal-top js-parallax-reverse">
                <div class="fit-image">
                  <img class="overlapping-gallery_right-image" src="<?php echo esc_url($rightImage['url']); ?>" alt="<?php echo esc_attr($rightImage['alt']); ?>" />
                </div>
              </div>
            <?php endif; ?>
          </div>
          <div class="center-image w-[30%] col pl-8">
            <?php $centerImage = get_sub_field('overlapping_gallery_center_image');
            if( !empty( $centerImage ) ): ?>
              <div class="aspect-vertical relative js-reveal-bottom js-parallax">
                <div class="fit-image">
                  <img class="overlapping-gallery_center-image" src="<?php echo esc_url($centerImage['url']); ?>" alt="<?php echo esc_attr($centerImage['alt']); ?>" />
                </div>
              </div>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container lg:-mt-14 mt-10">
    <div class="row justify-end">
      <div class="w-full col lg:w-5/12">
        <div class="wysiwyg">
          <?= get_sub_field('overlapping_gallery_content') ?? ''; ?>
        </div>
      </div>
    </div>
  </div>
</section>