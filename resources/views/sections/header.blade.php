<header class="py-5">
  <div class="container">
    <div class="row justify-between items-center">
      <div class="col w-1/4">
        <a class="text-color-accent hdg-4" href="{{ home_url('/') }}">
          Joshua Judin
        </a>
      </div>  
      <div class="col w-3/4">
        @if (has_nav_menu('primary_navigation'))
          <nav class="nav-primary" aria-label="{{ wp_get_nav_menu_name('primary_navigation') }}">
            {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav', 'echo' => false]) !!}
          </nav>
        @endif
      </div>
    </div>
  </div>
</header>
