<?php
/**
 * Template part for displaying single content in single.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package blue-monday
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="entry-content">
            <?php
                the_content();

            ?>

            <span class="clearfix"></span>

            <?php

                wp_link_pages( array(
                    'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'blue-monday' ),
                    'after'  => '</div>',
                ) );
            ?>
            <span class="clearfix"></span>
        </div><!-- .entry-content -->

    
    <footer class="entry-footer">
        <?php do_action('blue_monday_entry_footer'); ?>
        <?php blue_monday_template_related_posts(); ?>
        <?php

        // If comments are open or we have at least one comment, load up the comment template.
        if ( comments_open() || get_comments_number() ) :
            comments_template();
        endif; ?>
    </footer><!-- .entry-footer -->
    
</article><!-- #post-## -->