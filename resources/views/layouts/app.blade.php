<a class="sr-only focus:not-sr-only" href="#main">
  {{ __('Skip to content') }}
</a>

@include('sections.header')

  <main id="main" class="main transition-fade">
    {{-- @yield('content') --}}
    @if( have_rows('components') )
      @while( have_rows('components') )
      <?php the_row(); ?>
        @if(get_row_layout() == 'homepage_hero') 
          @include('components.homepage-hero')
        @endif
        @if(get_row_layout() == 'project_hero') 
          @include('components.project-hero')
        @endif
        @if(get_row_layout() == 'overlapping_gallery') 
          @include('components.overlapping-gallery')
        @endif
        @if(get_row_layout() == 'featured_projects') 
          @include('components.featured-projects')
        @endif
        @if(get_row_layout() == 'offset_content_grid') 
          @include('components.offset-content-grid')
        @endif
        @if(get_row_layout() == 'click_to_play') 
          @include('components.click-to-play')
        @endif
        @if(get_row_layout() == 'content_grid') 
          @include('components.content-grid')
        @endif
        @if(get_row_layout() == 'alternating_image_set') 
          @include('components.alternating-image-set')
        @endif
        @if(get_row_layout() == 'masonry_grid') 
          @include('components.masonry-grid')
        @endif
        @if(get_row_layout() == 'left_right') 
          @include('components.left-right')
        @endif
        @if(get_row_layout() == 'about_hero') 
          @include('components.about-hero')
        @endif
        @if(get_row_layout() == 'one_column_banner') 
          @include('components.one-column-banner')
        @endif
        @if(get_row_layout() == 'content_accordion') 
          @include('components.content-accordion')
        @endif
        @if(get_row_layout() == 'appearing_text') 
          @include('components.appearing-text')
        @endif
        @if(get_row_layout() == 'references') 
        @include('components.references')
      @endif
      @endwhile
    @endif
  </main>

@include('sections.footer')
