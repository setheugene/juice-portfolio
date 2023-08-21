<section class="content-accordion py-12 lg:py-20">
  <div class="container">
    <div class="row">
      <div class="col w-full lg:w-1/3 mb-8 lg:mb-0">
        <h2 class="hdg-2 text-color-accent">
          <?php echo get_sub_field('content_accordion_heading') ?? ''; ?>
        </h2>
      </div>
    </div>
    <div class="row justify-end content-accordion_wrapper">
      <div class="col w-full lg:w-2/3">
       <?php if (!empty( get_sub_field('content_accordion_panels') )) : ?>
        <?php foreach( get_sub_field('content_accordion_panels') as $key => $panel ) : ?>
          <button class="content-accordion_button flex items-center text-color-accent py-6 w-full flex-wrap js-fade" data-target="#content-accordion-<?php echo $key; ?>">
            <div class="w-full lg:w-1/4">
              <div class="text-color-dark font-bold text-left mb-3 lg:mb-0">
                <?php echo $panel['pre-title'] ?? ''; ?>
              </div>
            </div>
            <div class="w-full lg:w-3/4 flex items-center justify-between">
              <div class="wysiwyg">
                <?php echo $panel['title'] ?? ''; ?>
              </div>
              <div class="expand">
                <span class="vertical"></span>
                <span class="horizontal"></span>
              </div>
            </div>
          </button>
          <div id="content-accordion-<?php echo $key; ?>" class="content-accordion_content flex flex-wrap">
            <div class="content-accordion_content-inner">
              <div class="w-full lg:ml-auto lg:w-3/4">
                <div class="wysiwyg pb-6 lg:w-10/12">
                  <?php echo $panel['content'] ?? ''; ?>
                </div>
              </div>
            </div>

          </div>
        <?php endforeach; ?>
       <?php endif; ?>
      </div>
    </div>
  </div>
</section>