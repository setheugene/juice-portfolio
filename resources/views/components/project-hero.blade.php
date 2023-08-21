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
            <svg width="33" height="32" viewBox="0 0 33 32" fill="none" xmlns="http://www.w3.org/2000/svg">
              <g clip-path="url(#clip0_95_335)">
              <path d="M21.8033 6.66681C21.8033 7.6555 22.7808 9.13294 23.7694 10.3743C25.0421 11.9725 26.5618 13.3692 28.3049 14.4351C29.6101 15.2332 31.1958 16.0001 32.47 16.0001M32.47 16.0001C31.1958 16.0001 29.6101 16.7671 28.3049 17.5652C26.5618 18.6311 25.0421 20.0277 23.7694 21.626C22.7808 22.8673 21.8033 24.3448 21.8033 25.3335M32.47 16.0001H0.469971"/>
              </g>
              <defs>
              <clipPath id="clip0_95_335">
              <rect width="32" height="32" fill="white" transform="translate(0.469971 0.000106812)"/>
              </clipPath>
              </defs>
            </svg>
          </div>
          <div class="text-color-dark">
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