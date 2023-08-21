<?php
$args = array(
  'post_type'       => 'projects',
  'post_status'     => 'publish',
  'orderby'         => 'menu_order',
  'order'           => 'ASC', 
  'posts_per_page'  => -1,
);
$projects = get_posts($args);
?>
<section class="featured-projects pb-11 relative z-10">
  <div class="container">
    <div class="row items-end pt-11 duration-300 featured-projects_pinned before:duration-300 z-50 relative">
      <div class="col w-full md:w-1/2">
        <?php if( !empty(get_sub_field('featured_projects_heading'))) : ?>
          <h2 class="hdg-hero text-color-accent">
            <?= get_sub_field('featured_projects_heading'); ?>
          </h2>
        <?php endif; ?>
      </div>
      <div class="col w-full md:w-1/2">
        <div class="flex items-center justify-end">
          <?php $categories = get_categories(['taxonomy' => 'projects_category', 'hide_empty' => true]); ?>
          <?php foreach( $categories as $key => $category ) : ?>
            <button class="w-fit mr-10 last:mr-0 magnetic-wrap featured-project_cat-filter-trigger <?= $key === 0 ? 'is-open' : ''; ?>" data-radio-group="project-filter" data-target=".<?= $category->slug; ?>">
              <div class="js-magnetic-area magnetic-size"></div>
              <div class="js-magnetic-content">
                <div class="featured-project_category-pill">
                  <?= $category->name; ?>
                </div>
              </div>
            </button>
          <?php endforeach; ?>
        </div>
      </div>
      <hr class="mt-11 ml-4 mr-2 border-dark col w-full">
    </div>
    
    <?php if( !empty($projects) ) : ?>
      <div class="featured-projects_grid">
        <?php foreach( $projects as $key => $project ) :
          $project_categories = get_the_terms($project->ID, 'projects_category');
          
          $project_classes = '';
          if($project_categories !== false) :
            foreach($project_categories as $project_category) :
              $project_classes .= $project_category->slug . ' ';
            endforeach;
          endif;
        ?>
          <div class="row featured-project_project relative pt-11 <?= $project_classes; ?> <?php echo str_contains($project_classes, $categories[0]->slug) ? 'is-open' : ''; ?>">
            <div class="col left">
              <div class="project-image relative">
                <?= get_the_post_thumbnail($project->ID, 'large'); ?>
              </div>
            </div>
            <div class="col right">
              <?php $project_tags = get_the_tags($project->ID); ?>
              <?php if( !empty( $project_tags ) ) : ?>
                <div class="ml-4 flex items-center mb-8">
                  <?php foreach( $project_tags as $project_tag ) : ?>
                    <div class="text-color-accent uppercase font-bold paragraph-default mr-12 last:mr-0 featured-projects_project-tags">
                      <?= $project_tag->name; ?>
                    </div>
                  <?php endforeach; ?>
                </div>
              <?php endif; ?>
              <div class="ml-4 hdg-1 text-color-headers">
                <?= get_the_title( $project->ID ); ?>
              </div>
              <a href="<?= get_permalink( $project->ID ); ?>" class="absolute inline-block bottom-0 right-0 magnetic-wrap">
                <div class="js-magnetic-area magnetic-size"></div>
                <div class="js-magnetic-content">
                  <div class="featured-project_btn">
                    View Project
                    <div class="icon ml-16 h-8 w-8 overflow-hidden">
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
                  </div>
                </div>
              </a>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>
  </div>
  <div class="feature-projects_gradient-overlay duration-500"></div>
</section>