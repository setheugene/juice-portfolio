<footer class="border-y border-brand-dark bg-light">
  <div id="contact-trigger-wrapper" class="flex z-50 items-center justify-around py-[28px]">
    <button id="color-toggle" class="magnetic-wrap" data-toggle-class="dark-mode" data-toggle-target="body">
      <div class="js-magnetic-area magnetic-size"></div>
      <div class="js-magnetic-content">
        <div class="btn-ghost">
          Toggle Colors
        </div>
      </div>
    </button>
    <button id="form-trigger" class="magnetic-wrap" data-toggle-class="is-open" data-toggle-target="#contact-form, footer">
      <div class="js-magnetic-area magnetic-size"></div>
      <div class="js-magnetic-content">
        <div class="btn-ghost">
          <?= !empty(get_field('footer_contact_button_text', 'option')) ? get_field('footer_contact_button_text', 'option') : 'Hit Me Up'; ?>
        </div>
      </div>
    </button>
  </div>
  <div id="contact-form" class="border-t border-brand-dark w-full">
    <div class="container">
      <div class="row">
        <div class="col w-full">
          <div class="contact-form_wrapper pt-16 mb-20">
            <div class="row justify-center">
              <div class="col w-full lg:w-10/12">
                <div class="row">
                  <div class="col w-full md:w-[70%]">
                    <div class="wysiwyg">
                      <?= the_field('footer_content','option') ?? ''; ?>
                    </div>
                  </div>
                  <div class="col w-full md:w-[30%]">
                    <?php
                      $file = get_field('resume', 'option');
                      if( $file ): ?>
                        <a class="text-center w-full block magnetic-wrap" download href="<?php echo $file['url']; ?>">
                          <div class="js-magnetic-area magnetic-size"></div>
                          <div class="js-magnetic-content">
                            <div class="btn-ghost">
                              Download Resume
                            </div>
                          </div>
                        </a>
                      <?php endif; ?>
                  </div>
                </div>
                <?= !empty(get_field('footer_form_shortcode', 'option')) ? do_shortcode(get_field('footer_form_shortcode', 'option')) : ''; ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>
