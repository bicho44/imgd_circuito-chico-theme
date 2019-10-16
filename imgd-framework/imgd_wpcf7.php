<?php

add_filter('wpcf7_ajax_loader', 'my_wpcf7_ajax_loader');

/**
 * Reemplazo el ajak loader del Contact Form 7
 *
 * @via https://stackoverflow.com/questions/41611949/wordpress-change-the-contact-form-7-ajax-loader-gif
 */
function my_wpcf7_ajax_loader()
{
  return get_template_directory() . '/assets/images/spinner-loader.gif';
}
