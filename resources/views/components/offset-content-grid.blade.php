<section class="offset-content-grid mb-32">
  <div class="container">
    <div class="row justify-end">
      <div class="col w-11/12 mb-4">
        <h2 class="text-color-accent hdg-4">
          <?= get_sub_field('offset_content_grid_heading') ?? ''; ?>
        </h2>
      </div>
      <div class="col w-11/12 mb-4">
        <div class="row">
          <div class="w-1/3 col js-fade">
            <div class="wysiwyg">
              <?php echo get_sub_field('offset_content_grid_left_column_content'); ?>
            </div>
          </div>
          <div class="w-1/3 col js-fade">
            <div class="wysiwyg">
              <?php echo get_sub_field('offset_content_grid_center_column_content'); ?>
            </div>
          </div>
          <div class="w-1/3 col js-fade">
            <div class="wysiwyg">
              <?php echo get_sub_field('offset_content_grid_right_column_content'); ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>