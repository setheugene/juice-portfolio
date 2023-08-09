<section class="content-accordion">
  <div class="container">
    <div class="row">
      <div class="col w-full lg:w-1/3 mb-8 lg:mb-0">
        <h2 class="hdg-2 text-accent">
          <?php echo get_sub_field('content_accordion_heading') ?? ''; ?>
        </h2>
      </div>
    </div>
    <div class="row justify-end">
      <div class="col w-full lg:w-2/3">
       <?php if (!empty( get_sub_field('content_accordion_panels') )) : ?>
        <?php foreach( get_sub_field('content_accordion_panels') as $panel ) : ?>
          <button class="content-accordion_button flex items-center text-accent py-6 w-full flex-wrap">
            <div class="w-full lg:w-1/4">
              <div class="text-dark font-bold text-left mb-3 lg:mb-0">
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
          <div class="content-accordion_content border-b border-headers flex flex-wrap">
            <div class="w-full lg:w-1/4">

            </div>
            <div class="w-full lg:w-3/4">
              <div class="wysiwyg pb-6 lg:w-10/12">
                <?php echo $panel['content'] ?? ''; ?>
              </div>
            </div>

          </div>
        <?php endforeach; ?>
       <?php endif; ?>
      </div>
    </div>
  </div>
</section>