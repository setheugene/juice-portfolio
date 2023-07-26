<section class="project-hero pt-16 pb-24">
  <div class="container relative">
    <div class="row items-end mb-4">
      <div class="col w-full lg:w-10/12">
        <h1 class="outline-text">
          <?= get_sub_field('project_hero_title') ?? ''; ?>
        </h1>
      </div>
      <div class="col w-full lg:w-2/12">
        <div class="flex justify-end items-center mb-8">
          <div class="scroll_icon-wrapper">
            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32">
              <title>down-arrow</title>
              <path fill="none" stroke-linejoin="miter" stroke-linecap="butt" stroke-miterlimit="4" stroke-width="1.6" stroke="#000" d="M25.334 21.333c-0.989 0-2.466 0.977-3.708 1.966-1.598 1.273-2.995 2.792-4.061 4.535-0.798 1.305-1.565 2.891-1.565 4.165M16 32c0-1.274-0.767-2.86-1.565-4.165-1.066-1.743-2.463-3.263-4.061-4.535-1.241-0.989-2.719-1.966-3.707-1.966M16 32v-32"></path>
            </svg>
          </div>
          <div class="text-brand-dark">
            Scroll Down
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container project-hero_image-container">
    <div class="row justify-center">
      <div class="col w-full relative">
        <div class="js-reveal-right project-hero_image-wrapper">
          <?php echo get_the_post_thumbnail($post, 'full'); ?>
        </div>
      </div>
    </div>
  </div>
</section>