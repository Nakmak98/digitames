<?php 

/**
 * theme main functions
 *
 * @package blue-monday
 */

/**
 * load template hooks
 */
require get_template_directory() . '/inc/functions/template-hooks.php';

/**
 * load social icons
 */
require get_template_directory() . '/inc/functions/social-nav.php';

/**
 * load bootstrap navwalker
 */
if ( ! class_exists( 'wp_bootstrap_navwalker' )) {
  require get_template_directory() . '/assets/wp_bootstrap_navwalker.php'; /* Theme wp_bootstrap_navwalker display */
}
/**
 * customizer
 */
require get_template_directory() . '/inc/customizer/controls.php';
require get_template_directory() . '/inc/customizer/display.php';

/**
 * Theme setup
 */
add_action( 'after_setup_theme', 'blue_monday_theme_setup' );
function blue_monday_theme_setup() {

    load_theme_textdomain( 'blue-monday', get_template_directory() . '/library/translation' );

    add_action( 'wp_enqueue_scripts', 'blue_monday_scripts_and_styles', 999 );

    add_action( 'widgets_init', 'blue_monday_register_sidebars' );

    blue_monday_theme_support();

    global $content_width;
    if ( ! isset( $content_width ) ) {
    $content_width = 640;
    }

    // Thumbnail sizes
    add_image_size( 'blue-monday-thumb-600', 600, 600, true );
    add_image_size( 'blue-monday-thumb-300', 300, 300, true );

} 

/**
 * register sidebar
 */
function blue_monday_register_sidebars() {

  register_sidebar(array(
    'id' => 'sidebar1',
    'name' => __( 'Posts Widget Area', 'blue-monday' ),
    'description' => __( 'The Posts Widget Area.', 'blue-monday' ),
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget' => '</aside>',
    'before_title' => '<h3 class="widgettitle">',
    'after_title' => '</h3>',
  ));

  register_sidebar(array(
    'id' => 'twitterfeed',
    'name' => __( 'Twitter Feed', 'blue-monday' ),
    'description' => __( 'The Twitter Feed.', 'blue-monday' ),
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget' => '</aside>',
    'before_title' => '<h3 class="widgettitle">',
    'after_title' => '</h3>',
  ));

  register_sidebar(array(
    'id' => 'instagramfeed',
    'name' => __( 'Instagram Feed', 'blue-monday' ),
    'description' => __( 'The Instagram Feed.', 'blue-monday' ),
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget' => '</aside>',
    'before_title' => '<h3 class="widgettitle">',
    'after_title' => '</h3>',
  ));

  register_sidebar(array(
    'id' => 'footer-1',
    'name' => __( 'Footer Widget Area 1', 'blue-monday' ),
    'description' => __( 'The Footer Widget Area.', 'blue-monday' ),
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h4 class="widgettitle">',
    'after_title' => '</h4>',
  ));

  register_sidebar(array(
    'id' => 'footer-2',
    'name' => __( 'Footer Widget Area 2', 'blue-monday' ),
    'description' => __( 'The Footer Widget Area.', 'blue-monday' ),
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h4 class="widgettitle">',
    'after_title' => '</h4>',
  ));

  register_sidebar(array(
    'id' => 'footer-3',
    'name' => __( 'Footer Widget Area 3', 'blue-monday' ),
    'description' => __( 'The Footer Widget Area.', 'blue-monday' ),
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h4 class="widgettitle">',
    'after_title' => '</h4>',
  ));

}

/**
 * enqueue scripts and styles
 */
function blue_monday_scripts_and_styles() {

    global $wp_styles; 

    wp_enqueue_script( 'blue-monday-jquery-modernizr', get_template_directory_uri() . '/assets/js/modernizr.custom.min.js', array('jquery'), '2.5.3', false );
    wp_enqueue_script( 'jquery-bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'), '', true );

    wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/fonts/font-awesome.min.css', array(), '', 'all' );

    wp_enqueue_style('blue-monday-google-fonts-Montserrat', '//fonts.googleapis.com/css?family=Montserrat:300,400,400i,700');
    wp_enqueue_style('blue-monday-google-fonts-Source', '//fonts.googleapis.com/css?family=Source+Sans+Pro:400,400i,700');

    if (is_page_template('template-home.php')):
      wp_enqueue_script( 'blue-monday-jquery-infinite-scroll', get_template_directory_uri() . '/assets/js/jquery.ias.min.js', array('jquery'), '', true );
      wp_enqueue_script( 'jquery-masonry' );
      wp_enqueue_script( 'imagesloaded' );

      // Register the script
      wp_register_script( 'blue-monday-jquery-main', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), '', true );

      // Localize the script with new data
      $translation_array = array(
        'more_text' => __( 'Load more posts', 'blue-monday' ),
        'nomore_text' => __( 'There are no more posts.', 'blue-monday' ),
      );
      wp_localize_script( 'blue-monday-jquery-main', 'more_posts', $translation_array );
      wp_enqueue_script( 'blue-monday-jquery-main' );

    endif;

    wp_enqueue_script( 'blue-monday-jquery-menu', get_template_directory_uri() . '/assets/js/menu.js', array('jquery'), '', true );

    if ( is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {
      wp_enqueue_script( 'comment-reply' );
    }

}

/**
 * theme support
 */
function blue_monday_theme_support() {

    add_theme_support( 'post-thumbnails' );

    set_post_thumbnail_size( 600, 600 );

    add_theme_support( 'custom-background',
    array(
    'default-image' => '',    // background image default
    'default-color' => 'ffffff',    // background color default (dont add the #)
    'wp-head-callback' => '_custom_background_cb',
    'admin-head-callback' => '',
    'admin-preview-callback' => ''
    )
    );

    add_theme_support('automatic-feed-links');

    add_theme_support( 'title-tag' );

    add_theme_support( 'custom-logo' );

    register_nav_menus(
    array(
    'main-nav' => __( 'Main Nav', 'blue-monday' ),
    'footer-nav' => __( 'Footer Nav', 'blue-monday' ),
    'social-nav' => __( 'Social Media Links', 'blue-monday' ),
    )
    );
  
}

/**
 * post nav
 */
function blue_monday_paging_nav() {
  global $wp_query;

  // Don't print empty markup if there's only one page.
  if ( $wp_query->max_num_pages < 2 )
    return;
  ?>
  <div class="next-post-pagination" role="navigation">

      <?php if ( get_previous_posts_link() ) : ?>
      <?php previous_posts_link( __( 'Newer Posts <span class="fa fa-chevron-right"></span>', 'blue-monday' ) ); ?>
      <?php endif; ?>
      
      <?php if ( get_next_posts_link() ) : ?>
      <?php next_posts_link( __( '<span class="fa fa-chevron-left"></span> Older Posts', 'blue-monday' ) ); ?>
      <?php endif; ?>

      <span class="clearfix"></span>
    </div>
  <?php
}

/**
 * Comment layout
 */
function blue_monday_comments( $comment, $args, $depth ) { ?>
  <div id="comment-<?php comment_ID(); ?>" <?php comment_class('comments'); ?>>

      <header class="comment-author vcard">
        <?php echo get_avatar( $comment,60 ); ?>
      </header>
      <?php if ($comment->comment_approved == '0') : ?>
        <div class="alert alert-info">
          <p><?php esc_html_e( 'Your comment is awaiting moderation.', 'blue-monday' ) ?></p>
        </div>
      <?php endif; ?>
      <section class="comment_content cf">
        <?php printf(__( '<cite class="fn">%1$s</cite> %2$s', 'blue-monday' ), get_comment_author_link(), edit_comment_link(__( '(Edit)', 'blue-monday' ),'  ','') ) ?>
        <a href="<?php comment_link(); ?>"><time datetime="<?php echo comment_time('Y-m-j'); ?>"><?php comment_date(); ?></time></a>
        <?php comment_text() ?>
        <p class="reply-link"><?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?></p>
      </section>
<?php
} // don't remove this bracket!

/**
 * load custom functions
 */
require get_template_directory() . '/inc/functions/custom-functions.php';