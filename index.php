<!doctype html>
<html <?php language_attributes(); ?>> 
  <head>
    <?php wp_head(); ?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src='https://cdn.tiny.cloud/1/no-api-key/tinymce/4/tinymce.min.js'></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/swup/2.0.8/swup.min.js" integrity="sha512-zarvzsuTnsmBdyGdtt3MSQYTkEBX9aGrG4P9RjNJXPmmNromygeUkZS4NOM6/Ht0O8cvzU0glG+FKULEMDgqbA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://unpkg.com/@lottiefiles/lottie-player@0.4.0/dist/lottie-player.js"></script>

    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant&family=League+Spartan:wght@400;700&display=swap" rel="stylesheet">
    
  </head>

  <body <?php body_class(); ?>>
    
    <?php wp_body_open(); ?>
    <?php do_action('get_header'); ?>
    <?php include_once( 'resources/images/symbol-defs.svg' ); ?>
    <div id="app">
      <?php echo view(app('sage.view'), app('sage.data'))->render(); ?>
    </div>

    <?php do_action('get_footer'); ?>
    <?php wp_footer(); ?>
  </body>
</html>
