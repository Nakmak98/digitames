<?php 

/**
 * Customizer Display
 *
 * @package blue-monday
 */

  function blue_monday_apply_color() {

    if( get_theme_mod('blue_monday_color_settings') ){
      $primary  =   esc_html( get_theme_mod('blue_monday_color_settings') );
    }else{
      $primary  =  '#9dca3b';
    }

    $custom_css = "
      a,
      a:hover,
      #main-navigation ul.navbar-nav > li.active > a,
      footer.footer .widget .widgettitle,
      #masonry .blog-item .entry-content .moretag, .ias-trigger a,
      #masonry .blog-item .entry-content .moretag, .ias-trigger a{
        color: {$primary};
      }
      .pagination .current,
      input[type='submit'], button[type='submit'], .btn, .comment .comment-reply-link,
      .entry-footer .cat-tag-links a:hover, .cat-tag-links a:hover{
        background-color: {$primary};
      }
      blockquote {
        border-left: 5px solid {$primary};
      }
      input[type='submit'], button[type='submit'], .btn, .comment .comment-reply-link{
        border: 1px solid {$primary};
      }
      #masonry .blog-item .entry-content .moretag, .ias-trigger a,
      footer.footer{
        border-color: {$primary};
      }
    ";

    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), '', 'all' );
    wp_enqueue_style( 'blue-monday-main-stylesheet', get_template_directory_uri() . '/assets/css/style.css', array(), '', 'all' );
    wp_add_inline_style( 'blue-monday-main-stylesheet', $custom_css );
}

add_action( 'wp_enqueue_scripts', 'blue_monday_apply_color', 999 );