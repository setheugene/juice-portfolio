<?php

/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides a convenient, automatically generated class loader for
| our theme. We will simply require it into the script here so that we
| don't have to worry about manually loading any of our classes later on.
|
*/

if (! file_exists($composer = __DIR__.'/vendor/autoload.php')) {
    wp_die(__('Error locating autoloader. Please run <code>composer install</code>.', 'sage'));
}

require $composer;

/*
|--------------------------------------------------------------------------
| Register The Bootloader
|--------------------------------------------------------------------------
|
| The first thing we will do is schedule a new Acorn application container
| to boot when WordPress is finished loading the theme. The application
| serves as the "glue" for all the components of Laravel and is
| the IoC container for the system binding all of the various parts.
|
*/

try {
    \Roots\bootloader();
} catch (Throwable $e) {
    wp_die(
        __('You need to install Acorn to use this theme.', 'sage'),
        '',
        [
            'link_url' => 'https://docs.roots.io/acorn/2.x/installation/',
            'link_text' => __('Acorn Docs: Installation', 'sage'),
        ]
    );
}

/*
|--------------------------------------------------------------------------
| Register Sage Theme Files
|--------------------------------------------------------------------------
|
| Out of the box, Sage ships with categorically named theme files
| containing common functionality and setup to be bootstrapped with your
| theme. Simply add (or remove) files from the array below to change what
| is registered alongside Sage.
|
*/

collect(['setup', 'filters'])
    ->each(function ($file) {
        if (! locate_template($file = "app/{$file}.php", true, true)) {
            wp_die(
                /* translators: %s is replaced with the relative file path */
                sprintf(__('Error locating <code>%s</code> for inclusion.', 'sage'), $file)
            );
        }
    });

/*
|--------------------------------------------------------------------------
| Enable Sage Theme Support
|--------------------------------------------------------------------------
|
| Once our theme files are registered and available for use, we are almost
| ready to boot our application. But first, we need to signal to Acorn
| that we will need to initialize the necessary service providers built in
| for Sage when booting.
|
*/

add_theme_support('sage');


function add_file_types_to_uploads($file_types){
  $new_filetypes = array();
  $new_filetypes['svg'] = 'image/svg+xml';
  $file_types = array_merge($file_types, $new_filetypes );
  return $file_types;
  }
add_filter('upload_mimes', 'add_file_types_to_uploads');


/**
 * Register the custom post type
 */
if ( ! function_exists('register_project_custom_post_type') ) {

  // Register Custom Post Type
  function register_project_custom_post_type() {

    $labels = array(
      'name'                => 'Projects',
      'singular_name'       => 'Project',
      'menu_name'           => 'Projects',
      'parent_item_colon'   => 'Parent Project',
      'all_items'           => 'All Projects',
      'view_item'           => 'View Project',
      'add_new_item'        => 'Add New Project',
      'add_new'             => 'New Project',
      'edit_item'           => 'Edit Project',
      'update_item'         => 'Update Project',
      'search_items'        => 'Search Project',
      'not_found'           => 'No Projects found',
      'not_found_in_trash'  => 'No Projects found in Trash',
    );
    $args = array(
      'label'               => 'Project',
      'description'         => 'Project description',
      'labels'              => $labels,
      'supports'            => array( 'title', 'page-attributes', 'thumbnail' ),
      'taxonomies'          => array( 'category', 'post_tag' ),
      'hierarchical'        => true,
      'public'              => true,
      'show_ui'             => true,
      'show_in_menu'        => true,
      'show_in_nav_menus'   => true,
      'show_in_admin_bar'   => true,
      'menu_position'       => 20,
      'menu_icon'           => 'dashicons-admin-appearance',
      'can_export'          => true,
      'has_archive'         => false,
      'exclude_from_search' => true,
      'publicly_queryable'  => true,
      'capability_type'     => 'post',
    );
    register_post_type( 'projects', $args );

  }

  // Hook into the 'init' action
  add_action( 'init', 'register_project_custom_post_type', 0 );

}

/**
 * Custom taxonomies
 */
if ( ! function_exists('register_project_taxonomies') ) {

  function register_project_taxonomies() {

    // Add new taxonomy, make it hierarchical (like categories)
    $labels = array(
      'name'                => _x( 'Project Category', 'taxonomy general name' ),
      'singular_name'       => _x( 'Project Category', 'taxonomy singular name' ),
      'search_items'        => __( 'Search Project Categories' ),
      'all_items'           => __( 'All Project Categories' ),
      'parent_item'         => __( 'Parent Project Category' ),
      'parent_item_colon'   => __( 'Parent Project Category:' ),
      'edit_item'           => __( 'Edit Project Category' ),
      'update_item'         => __( 'Update Project Category' ),
      'add_new_item'        => __( 'Add New Project Category' ),
      'new_item_name'       => __( 'New Project Category Name' ),
      'menu_name'           => __( 'Project Categories' )
    );

    $args = array(
      'hierarchical'        => true,
      'labels'              => $labels,
      'show_ui'             => true,
      'show_admin_column'   => true,
      'query_var'           => true,
      'rewrite'             => array( 'slug' => get_field( 'project_category_slug', 'option' ) ?:  'project-category' )
    );

    register_taxonomy( 'projects_category', array( 'projects' ), $args ); 

  }

  add_action( 'init', 'register_project_taxonomies', 0 );

}

wp_enqueue_script( 'easy-toggle', get_theme_file_uri( '/resources/scripts/easy-toggle.js' ), array('jquery'), null, true );

wp_enqueue_script( 'magnific-popup', get_theme_file_uri( '/resources/scripts/magnific-popup.js' ), array('jquery'), null, true );


if( function_exists('acf_add_options_page') ) {
  acf_add_options_page(); 
}


// // Callback function to insert 'styleselect' into the $buttons array
//  function my_mce_buttons_2( $buttons ) {
//  	array_unshift( $buttons, 'styleselect' );
//  	return $buttons;
//  }
// // // // Register our callback to the appropriate filter
//  add_filter( 'mce_buttons_2', 'my_mce_buttons_2' );


// // // Callback function to filter the MCE settings
//  function my_mce_before_init_insert_formats( $init_array ) {  
// // 	// Define the style_formats array
//  	$style_formats = array(  
//       array(  
//       'title' => 'H1',  
//       'selector' => 'p, a, span, li, h1, h2, h3, h4, h5, h6',
//       'classes' => 'hdg-1',
//       'wrapper' => true,
//   ),  
//          array(  
//              'title' => 'H2',  
//              'selector' => 'p, a, span, li, h1, h2, h3, h4, h5, h6',
//              'classes' => 'hdg-2',
//              'wrapper' => true,
//          ),
//          array(  
//              'title' => 'H3',  
//              'selector' => 'p, a, span, li, h1, h2, h3, h4, h5, h6', 
//              'classes' => 'hdg-3',
//              'wrapper' => true,
//          ),
//                  array(  
//              'title' => 'H4',  
//              'selector' => 'p, a, span, li, h1, h2, h3, h4, h5, h6',
//              'classes' => 'hdg-4',
//              'wrapper' => true,
             
//          ),  
//          array(  
//              'title' => 'H5',  
//              'selector' => 'p, a, span, li, h1, h2, h3, h4, h5, h6',
//              'classes' => 'hdg-5',
//              'wrapper' => true,
//          ),
//          array(  
//              'title' => 'H6',  
//              'selector' => 'p, a, span, li, h1, h2, h3, h4, h5, h6',
//              'classes' => 'hdg-6',
//              'wrapper' => true,
//          ),
//          array(  
//            'title'    => 'Large Paragraph Text : 18px',
//            'classes'  => 'paragraph-large',
//            'selector' => 'p, a, span, li, h1, h2, h3, h4, h5, h6',
//            'wrapper'  => false
           
//        ),  
//        array(  
//          'title'    => 'Regular Paragraph : 16px',
//          'classes'  => 'paragraph-default',
//          'selector' => 'p, a, span, li, h1, h2, h3, h4, h5, h6',
//          'wrapper'  => false
//        ),
//        array(  
//          'title'    => 'Small Paragraph Text : 14px',
//          'classes'  => 'paragraph-small',
//          'selector' => 'p, a, span, li, h1, h2, h3, h4, h5, h6',
//          'wrapper'  => false
//        ),
//        array(
//          'title'    => 'Primary Button',
//          'classes'  => 'primary-btn',
//          'selector' => 'a',
//          'wrapper'  => false
//        ),
//        array(
//          'title'    => 'Orange Text',
//          'classes'  => 'text-color-accent',
//          'selector' => 'a',
//          'wrapper'  => false
//        ),
//  	);  

//  $init_array['style_formats'] = wp_json_encode( $style_formats );  

	
//  	return $init_array;  
  
//  } 

//  add_filter( 'tiny_mce_before_init', 'my_mce_before_init_insert_formats' );  

/**
 * Action that fires immediately before the submit button element is displayed.
 * 
 * @link  https://wpforms.com/developers/wpforms_display_submit_before/
 * 
 * @param array  $form_data Form data and settings
 */
 
//  function wpf_dev_display_submit_before( $form_data ) {
  
//   if ( absint( $form_data[ 'id' ] ) !== 45 ) {
//         return;
//     } 
       
//   _e( '<div class="magnetic-wrap"><div class="js-magnetic-area magnetic-size"></div><div class="js-magnetic-content">', 'plugin-domain' );

// }
// add_action( 'wpforms_display_submit_before', 'wpf_dev_display_submit_before', 10, 1 );

// /**
//  * Action that fires just after the submit button element is displayed.
//  * 
//  * @link  https://wpforms.com/developers/wpforms_display_submit_after/
//  * 
//  * @param array  $form_data Form data and settings
//  */
 
//  function wpf_dev_display_submit_after( $form_data ) {
  
//   if ( absint( $form_data[ 'id' ] ) !== 45 ) {
//           return;
//       } 
       
//   _e( '</div></div>', 'plugin-domain' );

// }
// add_action( 'wpforms_display_submit_after', 'wpf_dev_display_submit_after', 10, 1 );

 
/////////////////////////////////////////////////////////////////////////
add_filter( 'mce_buttons', function( $buttons ) {
	array_push( $buttons, 'styleselect' );
	return $buttons;
} );

add_filter( 'tiny_mce_before_init', function( $settings ) {
	$new_styles = [
    [
			'title'	=> __( 'Fonts', 'text_domain' ),
			'items'	=> [
        [ 'title' => 'League Spartan', 'wrapper'  => false, 'inline'   => 'span', 'selector' => 'p, a, span, li, h1, h2, h3, h4, h5, h6', 'classes' => 'font-league-spartan', 'exact' => '1' ],
        [ 'title' => 'Comorant', 'wrapper'  => false, 'inline'   => 'span', 'selector' => 'p, a, span, li, h1, h2, h3, h4, h5, h6', 'classes' => 'font-comorant', 'exact' => '1' ],
			],
		],
    [
			'title'	=> __( 'Heading Styles', 'text_domain' ),
			'items'	=> [
        [ 'title' => 'Heading Hero - 80px', 'wrapper'  => false, 'inline'   => 'span', 'selector' => 'p, a, span, li, h1, h2, h3, h4, h5, h6', 'classes' => 'hdg-hero', 'exact' => '1' ],
        [ 'title' => 'Heading One - 64px', 'wrapper'  => false, 'inline'   => 'span', 'selector' => 'p, a, span, li, h1, h2, h3, h4, h5, h6', 'classes' => 'hdg-1', 'exact' => '1' ],
        [ 'title' => 'Heading Two - 48px', 'wrapper'  => false, 'inline'   => 'span', 'selector' => 'p, a, span, li, h1, h2, h3, h4, h5, h6', 'classes' => 'hdg-2', 'exact' => '1' ],
        [ 'title' => 'Heading Three - 40px', 'wrapper'  => false, 'inline'   => 'span', 'selector' => 'p, a, span, li, h1, h2, h3, h4, h5, h6', 'classes' => 'hdg-3', 'exact' => '1' ],
        [ 'title' => 'Heading Four - 32px', 'wrapper'  => false, 'inline'   => 'span', 'selector' => 'p, a, span, li, h1, h2, h3, h4, h5, h6', 'classes' => 'hdg-4', 'exact' => '1' ],
        [ 'title' => 'Heading Five - 24px', 'wrapper'  => false, 'inline'   => 'span', 'selector' => 'p, a, span, li, h1, h2, h3, h4, h5, h6', 'classes' => 'hdg-5', 'exact' => '1' ],
        [ 'title' => 'Heading Six - 16px', 'wrapper'  => false, 'inline'   => 'span', 'selector' => 'p, a, span, li, h1, h2, h3, h4, h5, h6', 'classes' => 'hdg-6', 'exact' => '1' ],
			],
		],
    [
			'title'	=> __( 'Body Text Styles', 'text_domain' ),
			'items'	=> [
        [ 'title' => 'Large Body - 18px', 'wrapper'  => false, 'inline'   => 'span', 'selector' => 'p, a, span, li, h1, h2, h3, h4, h5, h6', 'classes' => 'paragraph-large', 'exact' => '1' ],
        [ 'title' => 'Regular Body - 16px', 'wrapper'  => false, 'inline'   => 'span', 'selector' => 'p, a, span, li, h1, h2, h3, h4, h5, h6', 'classes' => 'paragraph-default', 'exact' => '1' ],
        [ 'title' => 'Small Body - 14px', 'wrapper'  => false, 'inline'   => 'span', 'selector' => 'p, a, span, li, h1, h2, h3, h4, h5, h6', 'classes' => 'paragraph-small', 'exact' => '1' ],
        [ 'title' => 'Extra Small Body - 12px', 'wrapper'  => false, 'inline'   => 'span', 'selector' => 'p, a, span, li, h1, h2, h3, h4, h5, h6', 'classes' => 'paragraph-extra-small', 'exact' => '1' ],
			],
		],
    [
			'title'	=> __( 'Colors', 'text_domain' ),
			'items'	=> [
        [ 'title' => 'Headers', 'wrapper'  => false, 'inline'   => 'span', 'selector' => 'p, a, span, li, h1, h2, h3, h4, h5, h6', 'classes' => 'text-color-headers', 'exact' => '1' ],
        [ 'title' => 'Dark', 'wrapper'  => false, 'inline'   => 'span', 'selector' => 'p, a, span, li, h1, h2, h3, h4, h5, h6', 'classes' => 'text-color-dark', 'exact' => '1' ],
        [ 'title' => 'Light', 'wrapper'  => false, 'inline'   => 'span', 'selector' => 'p, a, span, li, h1, h2, h3, h4, h5, h6', 'classes' => 'text-color-light', 'exact' => '1' ],
        [ 'title' => 'White', 'wrapper'  => false, 'inline'   => 'span', 'selector' => 'p, a, span, li, h1, h2, h3, h4, h5, h6', 'classes' => 'text-color-white', 'exact' => '1' ],
        [ 'title' => 'Accent', 'wrapper'  => false, 'inline'   => 'span', 'selector' => 'p, a, span, li, h1, h2, h3, h4, h5, h6', 'classes' => 'text-color-accent', 'exact' => '1' ],
			],
		],
    [
			'title'	=> __( 'Buttons', 'text_domain' ),
			'items'	=> [
        [ 'title' => 'Dark Button', 'wrapper'  => false, 'inline'   => 'span', 'selector' => 'p, a, span, li, h1, h2, h3, h4, h5, h6', 'classes' => 'bnt-dark', 'exact' => '1' ],
        [ 'title' => 'Light Button', 'wrapper'  => false, 'inline'   => 'span', 'selector' => 'p, a, span, li, h1, h2, h3, h4, h5, h6', 'classes' => 'btn-light', 'exact' => '1' ],
        [ 'title' => 'Arrow Button', 'wrapper'  => false, 'inline'   => 'span', 'selector' => 'p, a, span, li, h1, h2, h3, h4, h5, h6', 'classes' => 'btn-arrow', 'exact' => '1' ],
			],
		],
	];
	$settings['style_formats_merge'] = true;
	$settings['style_formats'] = json_encode( $new_styles );
	return $settings;
} );




////////////////////////////////////////////////////////////////
// function my_wpeditor_buttons( $buttons, $editor_id ) {
//   if ( 'content' != $editor_id ) {
//     return $buttons;
//   }

//   array_unshift( $buttons, 'styleselect' );
//   return $buttons;
// }
// add_filter( 'mce_buttons_2', 'my_wpeditor_buttons', 10, 2 );

// function my_wpeditor_formats_options( $settings ) {

//     $custom_styles_formats = [
//         [ 'title' => 'Heading Styles', 'type' => 'group',
//             'items' => [
                // [ 'title' => 'Heading One', 'selector' => 'p, a, span, li, h1, h2, h3, h4, h5, h6', 'classes' => 'hdg-1', 'exact' => '1' ],
                // [ 'title' => 'Heading Two', 'selector' => 'p, a, span, li, h1, h2, h3, h4, h5, h6', 'classes' => 'hdg-2', 'exact' => '1' ],
                // [ 'title' => 'Heading Three', 'selector' => 'p, a, span, li, h1, h2, h3, h4, h5, h6', 'classes' => 'hdg-3', 'exact' => '1' ],
                // [ 'title' => 'Heading Four', 'selector' => 'p, a, span, li, h1, h2, h3, h4, h5, h6', 'classes' => 'hdg-4', 'exact' => '1' ],
                // [ 'title' => 'Heading Five', 'selector' => 'p, a, span, li, h1, h2, h3, h4, h5, h6', 'classes' => 'hdg-5', 'exact' => '1' ],
                // [ 'title' => 'Heading Six', 'selector' => 'p, a, span, li, h1, h2, h3, h4, h5, h6', 'classes' => 'hdg-6', 'exact' => '1' ],
//             ]
//         ], 

//         [ 'title' => 'Buttons', 'type' => 'group',
//             'items' => [
//                 [ 'title' => 'Light Button', 'selector' => 'a, button', 'classes' => 'btn-light', 'exact' => '1' ],
//                 [ 'title' => 'Dark Button', 'selector' => 'a, button', 'classes' => 'btn-dark', 'exact' => '1' ],
//             ]
//         ], 

//         [ 'title' => 'Color', 'type' => 'group',
//             'items' => [
//                 [ 'title' => 'Headers', 'selector' => 'p, a, span, li, h1, h2, h3, h4, h5, h6', 'classes' => 'text-color-headers', 'exact' => '1' ],
//                 [ 'title' => 'Dark', 'selector' => 'p, a, span, li, h1, h2, h3, h4, h5, h6', 'classes' => 'text-color-dark', 'exact' => '1' ],
//                 [ 'title' => 'Light', 'selector' => 'p, a, span, li, h1, h2, h3, h4, h5, h6', 'classes' => 'text-color-light', 'exact' => '1' ],
//                 [ 'title' => 'White', 'selector' => 'p, a, span, li, h1, h2, h3, h4, h5, h6', 'classes' => 'text-color-white', 'exact' => '1' ],
//                 [ 'title' => 'Accent', 'selector' => 'p, a, span, li, h1, h2, h3, h4, h5, h6', 'classes' => 'text-color-accent', 'exact' => '1' ],
//             ]
//         ], 
//     ];

//   $settings['style_formats'] = json_encode( $custom_styles_formats );
//   return $settings;

// }
// add_filter( 'tiny_mce_before_init', 'my_wpeditor_formats_options' );

// add_filter( 'tiny_mce_before_init', function( $settings ){

// 	$settings['block_formats'] = 'Paragraph=p;Heading=h2;Subheading=h3';

// 	return $settings;

// } );

function ll_acf_admin_footer() {
  ?>
  <script>
    ( function( $) {
      acf.add_filter( 'wysiwyg_tinymce_settings', function( mceInit, id, $field ) {
        mceInit.body_class += ' ' + $field[0].classList;
        return mceInit;
      });
    })( jQuery );
  </script>
<?php
}
add_action('acf/input/admin_footer', 'll_acf_admin_footer');

function add_editor_styles() {
  add_editor_style( 'resources/styles/editor.css' );
}
add_action( 'init', 'add_editor_styles' );


add_action('admin_head', 'my_custom_fonts');
function my_custom_fonts() {
  echo '<style>
  .acf-icon-grid .acf-button-group {
    display: grid;
    grid-template-columns: repeat(4, minmax(0, 54px));
  }
  
  .acf-icon-grid .acf-button-group label {
    border-radius: 0 !important;
  }
  
  .acf-icon-grid .acf-button-group label svg {
    width: 32px;
    height: 32px;
    max-width: 100%;
  }
  </style>';
}


add_action( 'in_admin_header','ll_in_admin_header' );
function ll_in_admin_header() {
  include_once( get_stylesheet_directory() . '/resources/images/symbol-defs.svg' );
}

/*
 * Generates an array of sanitized ids from the definitions in symbol-defs.svg.
 * @params $file defaults to symbol-defs.svg, can be changed for functional use in other situtations
 */
function get_icon_list( $file='symbol-defs.svg' ) {
  $file_path = get_template_directory_uri() . '/resources/images/'.$file;
  $icon_data = simplexml_load_string( file_get_contents( $file_path,false, stream_context_create( array("ssl"=>array("verify_peer"=>false,"verify_peer_name"=>false))) ) );

  if ( $icon_data ) {
    $icon_list = $icon_data->defs;
    if ( $icon_list ) {
      $icon_list = (array) $icon_list;
      if ( is_object( $icon_list['symbol'] ) ) {
        $icon_list['symbol'] = [$icon_list['symbol']];
      }
    }
  }

  $icons = array();
  if ( $icon_list ) {
    foreach( $icon_list['symbol'] as $icon_key => $icon ) {
      if ( isset( $icon['id'] ) ) {
        $icons[] = (string) substr($icon['id'], 5);
      }
    }
  }
  sort($icons);
  return $icons;
}

// Output visual icon selector
// Usage: Field Name: my_component_name, Field Type: clone, Prefix Field Names: yes
// Call my_component_name_svg_icon
/*
 * Populate ACF Button Group field with symbol-defs.svg
 */
add_filter('acf/load_field/type=button_group', 'll_icon_picker', 99);
function ll_icon_picker($field) {
  global $post;
  if ( !is_admin() || !function_exists('get_icon_list') ) {
    return $field;
  }

  if ( strpos( $field['name'], 'svg_icon' ) !== false ) {

    //empty out choices just in case
    $field['choices'] = array();

    $icons = get_icon_list();

    if ( $icons ) {
      foreach ($icons as $key => $icon) {
        $field['choices'][$icon] = '<svg class="icon icon-'.$icon.'" aria-hidden="true"><use xlink:href="#icon-'.$icon.'"></use></svg>';
      };
    }
  }
  return $field;
}

/* Allow svg and other associated tags and attributes
 * so our svg icon selector displays properly
*/
add_filter( 'wp_kses_allowed_html', 'acf_add_allowed_svg_tag', 10, 2 );
function acf_add_allowed_svg_tag( $tags, $context ) {
    if ( $context === 'acf' ) {
        $tags['svg']  = array(
            'xmlns'       => true,
            'fill'        => true,
            'viewbox'     => true,
            'role'        => true,
            'aria-hidden' => true,
            'focusable'   => true,
            'class' => true,
        );
        $tags['path'] = array(
            'd'    => true,
            'fill' => true,
        );
        $tags['use'] = array(
          'xlink:href' => true,
        );
    }

    return $tags;
}