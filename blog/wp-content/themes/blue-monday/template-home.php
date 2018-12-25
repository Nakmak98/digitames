<?php
/**
 * Template Name: Home
 *
 *
 * @package blue-monday
 */
get_header(); ?>

<?php 
     /**
     * Functions hooked in to blue_monday_home_banner action.
     *
     * @hooked blue_monday_template_banner 
     */
    do_action('blue_monday_home_banner'); ?>

<div id="masonry">
    <?php 
     /**
     * Functions hooked in to blue_monday_home_banner action.
     *
     * @hooked blue_monday_template_blog
     */
    do_action('blue_monday_home_blog'); ?>
    <div class="container">
        <div class="row">
                <?php
                $query = new WP_Query( array( 'post_type'=>'post','paged' => $paged) ); 
                if ( $query-> have_posts() ) : ?>
                    <div class="blog-masonry">
                        <div class="grid-sizer col-xs-12 col-sm-6 col-md-4"></div>
                        <?php 

                        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                        
                        while ( $query->have_posts() ) : $query->the_post(); ?>
                            
                            <div class="col-xs-12 col-sm-6 col-md-4 blog-item">
                                <?php get_template_part( 'contents/content', 'masonry' ); ?>
                            </div>

                        <?php 

                        endwhile;
                        
                        wp_reset_postdata();

                        ?>

                    </div>
                    <div class="pagination">
                        <?php echo get_next_posts_link( __('Older Entries','blue-monday'), $query->max_num_pages ); ?>
                    </div>
                    <?php
                endif; ?>
    
        </div>
    </div>
</div>
<?php if ( shortcode_exists( 'custom-twitter-feeds' ) ||  shortcode_exists( 'instagram-feed' ) ) { ?>
<div id="insta_twitt">
    <div class="container">
        <div class="row">
            <?php if ( shortcode_exists( 'custom-twitter-feeds' ) ) { ?>
            <div class="col-md-6 twitter-feed-area">
                <p class="insta-twitt-title"><?php echo __('Twitter Feed','blue-monday'); ?></p>
                <div class="row">
                    <?php echo do_shortcode('[custom-twitter-feeds masonry="true" num=6 include="author,date,text" creditctf=false showbutton=false showheader=false]'); ?>
                </div>
            </div>
            <?php } if ( shortcode_exists( 'instagram-feed' ) ) { ?>
            <div class="col-md-6 instagram-feed-area">
                <p class="insta-twitt-title"><?php echo __('Instagram','blue-monday'); ?></p>
                <div>
                    <?php echo do_shortcode('[instagram-feed num=9 cols=3 showheader=false  showfollow=false showbutton=false]'); ?>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</div>
<?php } ?>
<?php get_footer(); ?>