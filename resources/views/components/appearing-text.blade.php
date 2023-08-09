<section class="appearing-text py-12 lg:py-16">
  <div class="container">
    <div class="row">
      <div class="col w-full lg:w-1/2">
        <div class="appearing-text_title text-accent mb-6 border-b w-full border-black">
          <?= get_sub_field('appearing_text_title'); ?>
        </div>
      </div>
      <div class="col w-full lg:w-1/2 appearing-text_column">
        <?php if(!empty(get_sub_field('appearing_text_items'))) : ?>
          <?php foreach(get_sub_field('appearing_text_items') as $item) : ?>
            <div class="hdg-hero mb-6 appearing-text__item">
              <?php echo $item['item'] ?? ''; ?>
            </div>
          <?php endforeach; ?>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>