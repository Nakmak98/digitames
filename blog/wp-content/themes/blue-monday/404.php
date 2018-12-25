<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package blue-monday
 */

get_header(); 


?>

<div class="page-title-area">
    <div class="container">
        <h1 class="page-title"><?php _e('404','blue-monday'); ?></h1>
    </div>
    <span class="page-title-overlay"></span>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="page-title"><?php esc_html_e( 'Not Found', 'blue-monday' ); ?></h1>
            <p>
            <?php _e( 'The article you were looking for was not found. You may want to check your link or perhaps that page does not exist anymore. Maybe try a search?', 'blue-monday' ); ?>
            </p>
            <?php get_search_form(); ?>
        </div>

    </div>
</div>

<?php get_footer(); ?>