<?php
/**
 * The template for displaying archive pages.
 *
 * @package blue-monday
 */

get_header(); ?>

    <div class="page-title-area">
        <div class="container">
            <h1 class="page-title"><?php the_archive_title(); ?></h1>
        </div>
        <span class="page-title-overlay"></span>
    </div>

    <div class="container">
        <div class="row">
            <?php
            if ( have_posts() ) :
                $clear = 0;
                while ( have_posts() ) : the_post(); ?>
                <div class="col-md-4 blog-item">
                    <?php get_template_part( 'contents/content', get_post_format() ); ?>
                </div>
                <?php 
                if($clear++ == 2){
                    echo '<span class="clearfix"></span>';
                    $clear = 0;
                }

                endwhile;
                echo '<span class="clearfix"></span>';
                the_posts_pagination();

            else : ?>
                <div class="col-md-12">
                    <?php get_template_part( 'contents/content', 'none' ); ?>
                </div>
            <?php endif; ?>

        </div>
    </div>

<?php get_footer(); ?>