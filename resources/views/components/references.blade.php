<section class="references mb-32">
  <div class="container">
    <div class="row justify-center">
      <div class="col w-full">
        <div class="row">
          <div class="col w-full lg:w-1/2 js-fade">
            <div class="wysiwyg">
              <?php if(!empty(get_sub_field('references_content'))) : ?>
                <?= get_sub_field('references_content') ?>
              <?php endif; ?>
            </div>
          </div>
          <div class="col w-full lg:w-1/2">
            <div class="icon-wrapper bg-accent">
              <svg class="icon icon-terminal text-color-white"><use xlink:href="#icon-terminal"></use></svg>
            </div>
            {{-- <lottie-player src="<?php //echo get_template_directory_uri(); ?>/resources/lottie/Page_Transition.json" background="transparent"  speed="1"  style="width: 300px; height: 300px;" loop autoplay></lottie-player> --}}
          </div>
        </div>
      </div>
    </div>
  </div>
</section>