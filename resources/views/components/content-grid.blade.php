<section class="content-grid py-12 lg:py-32">
  <div class="container">
    <div class="row justify-center">
      <div class="col w-full lg:w-11/12">
        <?php if( !empty(get_sub_field('content_grid_heading'))) : ?>
          <div class="row mb-12">
            <div class="col w-1/2 js-fade">
              <h2 class="hdg-1 text-color-headers">
                <?= get_sub_field('content_grid_heading'); ?>
              </h2>
            </div>
          </div>
        <?php endif; ?>
        <div class="row">
          <?php if(!empty(get_sub_field('content_grid_rows'))) : ?>
            <?php foreach(get_sub_field('content_grid_rows') as $row) : ?>
              <div class="col w-full lg:w-1/2 js-fade">
                <div class="wysiwyg">
                  <?= $row['content_column']; ?>
                </div>
              </div>
            <?php endforeach; ?>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</section>