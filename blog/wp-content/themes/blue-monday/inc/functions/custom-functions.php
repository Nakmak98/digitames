<?php 

/**
 * theme custom functions
 *
 * @package blue-monday
 */


/**
 * author excerpt
 */
function blue_monday_author_excerpt() {
  $text_limit = 100; //Words to show in author bio excerpt
  $read_more  = ""; //Read more text
  $end_of_txt = "...";
  $url_of_author  = get_author_posts_url(get_the_author_meta('ID'));
  $short_desc_author = wp_trim_words(strip_tags(
  get_the_author_meta('description')), $text_limit, 
  $end_of_txt);

  return $short_desc_author;
  }

/**
 * return an image inside a post
 */
function blue_monday_catch_that_image() {
  global $post;
  $pattern = '|<img.*?class="([^"]+)".*?/>|';
  $transformed_content = apply_filters('the_content',$post->post_content);
  preg_match($pattern,$transformed_content,$matches);
  if (!empty($matches[1])) {
    $classes = explode(' ',$matches[1]);
    $id = preg_grep('|^wp-image-.*|',$classes);

      $id = str_replace('wp-image-','',$id);
      if (!empty($id)) {
        $id = reset($id);
        $transformed_content = wp_get_attachment_url($id);  
        return $transformed_content;
      }
    
  }
  
}

/**
 * return an image inside a post (thumb)
 */
function blue_monday_catch_that_image_thumb() {
  global $post;
  $pattern = '|<img.*?class="([^"]+)".*?/>|';
  $transformed_content = apply_filters('the_content',$post->post_content);
  preg_match($pattern,$transformed_content,$matches);
  if (!empty($matches[1])) {
    $classes = explode(' ',$matches[1]);
    $id = preg_grep('|^wp-image-.*|',$classes);
    if (!empty($id)) {
      $id = str_replace('wp-image-','',$id);
      if (!empty($id)) {
        $id = reset($id);
        $transformed_content = wp_get_attachment_url($id);  
         return $transformed_content;
      }
    }
  }
 
}

/**
 * return a gallery image inside a post
 */
function blue_monday_catch_gallery_image_full()  { 
    global $post;
    $gallery = get_post_gallery( $post, false );
    if ( !empty($gallery['ids']) ) {
      $ids = explode( ",", $gallery['ids'] );
      $total_images = 0;
      foreach( $ids as $id ) {
        $link = wp_get_attachment_url( $id );
        $total_images++;
        
        if ($total_images == 1) {
          $first_img = $link;
          return $first_img;
        }
      }
    } 
}

/**
 * return a gallery image inside a post (thumb)
 */
function blue_monday_catch_gallery_image_thumb()  { 
    global $post;
    $gallery = get_post_gallery( $post, false );
    if ( !empty($gallery['ids']) ) {
      $ids = explode( ",", $gallery['ids'] );
      $total_images = 0;
      foreach( $ids as $id ) {
        
        $image  = wp_get_attachment_image( $id, 'thumbnail');
        $total_images++;
        
        if ($total_images == 1) {
          $first_img = $image;
          return $first_img;
        }
      }
    } 
}


/**
 * Show pagination
 */
function blue_monday_show_posts_nav() {
  global $wp_query;
  return ($wp_query->max_num_pages > 1);
}


/**
 * reoder comment form fields
 */
function blue_monday_move_comment_field_to_bottom( $fields ) {
  $comment_field = $fields['comment'];
  unset( $fields['comment'] );
  $fields['comment'] = $comment_field;
  return $fields;
}

add_filter( 'comment_form_fields', 'blue_monday_move_comment_field_to_bottom' );

/**
 * wp_nav_menu Fallback
 */
function blue_monday_primary_menu_fallback() {
    ?>

    <ul id="menu-main-menu" class="nav navbar-nav navbar-right">
        <?php
        wp_list_pages(array(
            'depth'        => 1,
            'exclude' => '', //comma seperated IDs of pages you want to exclude
            'title_li' => '', //must override it to empty string so that it does not break our nav
            'sort_column' => 'post_title', //see documentation for other possibilites
            'sort_order' => 'ASC', //ASCending or DESCending
        ));
        ?>
    </ul>

    <?php
}

function blue_monday_new_excerpt_more($more) {
  if ( is_admin() ) {
     return $more;
  }
  global $post;
  return '<a class="moretag" href="'. esc_url( get_permalink($post->ID) ) . '">' . ' ' . __('Read more','blue-monday') . '</a>';
}
add_filter('excerpt_more', 'blue_monday_new_excerpt_more');


/**
 * This file represents an example of the code that themes would use to register
 * the required plugins.
 *
 * It is expected that theme authors would copy and paste this code into their
 * functions.php file, and amend to suit.
 *
 * @see http://tgmpluginactivation.com/configuration/ for detailed documentation.
 *
 * @package    TGM-Plugin-Activation
 * @subpackage Example
 * @version    2.6.1 for parent theme Blue Monday for publication on WordPress.org
 * @author     Thomas Griffin, Gary Jones, Juliette Reinders Folmer
 * @copyright  Copyright (c) 2011, Thomas Griffin
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/TGMPA/TGM-Plugin-Activation
 */

/**
 * Include the TGM_Plugin_Activation class.
 *
 * Depending on your implementation, you may want to change the include call:
 *
 * Parent Theme:
 * require_once get_template_directory() . '/path/to/class-tgm-plugin-activation.php';
 *
 * Child Theme:
 * require_once get_stylesheet_directory() . '/path/to/class-tgm-plugin-activation.php';
 *
 * Plugin:
 * require_once dirname( __FILE__ ) . '/path/to/class-tgm-plugin-activation.php';
 */
require_once get_template_directory() . '/inc/plugin/class-tgm.php';

add_action( 'tgmpa_register', 'blue_monday_register_required_plugins' );

/**
 * Register the required plugins for this theme.
 *
 * In this example, we register five plugins:
 * - one included with the TGMPA library
 * - two from an external source, one from an arbitrary source, one from a GitHub repository
 * - two from the .org repo, where one demonstrates the use of the `is_callable` argument
 *
 * The variables passed to the `tgmpa()` function should be:
 * - an array of plugin arrays;
 * - optionally a configuration array.
 * If you are not changing anything in the configuration array, you can remove the array and remove the
 * variable from the function call: `tgmpa( $plugins );`.
 * In that case, the TGMPA default settings will be used.
 *
 * This function is hooked into `tgmpa_register`, which is fired on the WP `init` action on priority 10.
 */
function blue_monday_register_required_plugins() {
  /*
   * Array of plugin arrays. Required keys are name and slug.
   * If the source is NOT from the .org repo, then source is also required.
   */
  $plugins = array(

        array(
            'name'      => __('Instagram Feed','blue-monday'),
            'slug'      => 'instagram-feed',
            'required'  => false,
        ),

        array(
            'name'      => __('Custom Twitter Feeds','blue-monday'),
            'slug'      => 'custom-twitter-feeds',
            'required'  => false,
        ),

  );

  /*
   * Array of configuration settings. Amend each line as needed.
   *
   * TGMPA will start providing localized text strings soon. If you already have translations of our standard
   * strings available, please help us make TGMPA even better by giving us access to these translations or by
   * sending in a pull-request with .po file(s) with the translations.
   *
   * Only uncomment the strings in the config array if you want to customize the strings.
   */
  $config = array(
    'id'           => 'blue-monday',                 // Unique ID for hashing notices for multiple instances of TGMPA.
    'default_path' => '',                      // Default absolute path to bundled plugins.
    'menu'         => 'tgmpa-install-plugins', // Menu slug.
    'has_notices'  => true,                    // Show admin notices or not.
    'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
    'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
    'is_automatic' => false,                   // Automatically activate plugins after installation or not.
    'message'      => '',                      // Message to output right before the plugins table.

   
  );

  tgmpa( $plugins, $config );
}