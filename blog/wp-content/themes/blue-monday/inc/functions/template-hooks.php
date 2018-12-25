<?php 

/**
 * theme template hooks
 *
 * @package blue-monday
 */

/**
 * site header
 */
add_action( 'blue_monday_header', 'blue_monday_template_header' );
function blue_monday_template_header(){ ?>
    <header id="site-header">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <nav class="navbar navbar-default" role="navigation">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">

                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#main-navigation">
                            <span class="sr-only"><?php _e( 'Toggle navigation','blue-monday' ); ?></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            </button>

                            <?php if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ): 
                            $blue_monday_custom_logo_id = get_theme_mod( 'custom_logo' );
                            $image = wp_get_attachment_image_src( $blue_monday_custom_logo_id,'full');
                            ?>
                            <h1 id="logo"><a href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'><img src="<?php echo esc_url( $image[0] ); ?>"></a></h1>
                            <?php else : ?>
                            <h1 id="logo"><a href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'><?php echo esc_html( bloginfo('name') ); ?></a></h1>
                            <?php endif; ?>

                        </div>

                        <div class="collapse navbar-collapse" id="main-navigation">
                            <?php 
                            if ( has_nav_menu( 'main-nav' ) ) {
                            wp_nav_menu( array(
                            'theme_location'    => 'main-nav',
                            'depth'             => 5,
                            'container'         => 'false',
                            'container_class'   => 'collapse navbar-collapse',
                            'container_id'      => 'bs-navbar-collapse-1',
                            'menu_class'        => 'nav navbar-nav navbar-left',
                            'fallback_cb'       => 'blue_monday_primary_menu_fallback',
                            'walker'            => new wp_bootstrap_navwalker())
                            );
                            }
                            ?>
                        </div><!-- /.navbar-collapse -->
                    </nav>
                </div>
                <div class="col-md-3">
                    <?php if ( has_nav_menu( 'social-nav' ) ) : ?>
                        <nav class="social-navigation" role="navigation" aria-label="<?php _e( 'Social Links Menu', 'blue-monday' ); ?>">
                            <?php
                            wp_nav_menu( array(
                            'theme_location' => 'social-nav',
                            'menu_class'     => 'social-links-menu',
                            'depth'          => 1,
                            'link_before'    => '<span class="screen-reader-text">',
                            'link_after'     => '</span>' . blue_monday_get_svg( array( 'icon' => 'chain' ) ),
                            ) );
                            ?>
                        </nav><!-- .social-navigation -->
                    <?php endif; ?>
                </div>
        </div>
    </header>
<?php
}

/**
 * Homepage Sections
 */
add_action( 'blue_monday_home_banner', 'blue_monday_template_banner', 10 );

function blue_monday_template_banner(){ ?>
    <?php 
        $get_banner_id = get_theme_mod( 'blue_monday_banner' );
        $post = get_post( $get_banner_id );
        $thumb_url = wp_get_attachment_url( get_post_thumbnail_id($get_banner_id) );
        $content = apply_filters('the_content', $post->post_content);

        if( $get_banner_id ) :
    ?>
    <section id="banner" style="<?php if( $thumb_url ) { ?> background-image: url( <?php echo esc_url( $thumb_url ); ?> ); <?php } ?>">
        <div class="container">
            <div class="col-md-12 section-content">
                <?php echo wp_kses_post( $content ); ?>
            </div>
        </div>
    </section>
    <?php endif; ?>
<?php
}

add_action( 'blue_monday_home_blog', 'blue_monday_template_blog', 15 );

function blue_monday_template_blog(){ ?>
    <?php 
        $get_blog_id = get_theme_mod( 'blue_monday_blog' );
        $post1 = get_post( $get_blog_id );
        $content1 = apply_filters('the_content', $post1->post_content);

        if( $get_blog_id ) :
    ?>
    <div id="home-blog" class="container">
        <?php echo wp_kses_post( $content1 ); ?>
    </div>
    <?php endif; ?>
<?php
}

/**
 * related posts
 */

function blue_monday_template_related_posts(){ 
	global $post;
	$related = get_posts( array( 'category__in' => wp_get_post_categories($post->ID), 'numberposts' => 3, 'post__not_in' => array($post->ID) ) );
	if ( get_theme_mod('blue_monday_related_posts') ):
	$related_class = 'related-hide';
	else :
	$related_class = '';
	endif;
	if (!empty($related)): ?>

		<div class="related-posts<?php echo " " . esc_attr( $related_class ); ?>">
			<div class="row">
			<?php if( $related ): foreach( $related as $post ) { ?>
			<?php setup_postdata($post); ?>
			
				<div class="col-md-4 related-item">
					<div class="related-image">
						<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>">
							<?php $image_thumb = blue_monday_catch_that_image_thumb(); $gallery_thumb = blue_monday_catch_gallery_image_thumb(); 
							if ( has_post_thumbnail()):
							the_post_thumbnail('600x600');  
							elseif(has_post_format('gallery') && !empty($gallery_thumb)): 
							echo $gallery_thumb; 
							elseif(has_post_format('image') && !empty($image_thumb)): 
							echo '<img src="'. esc_url($image_thumb) . '">'; 
							else: ?>
							<?php $blank = get_template_directory_uri() . '/assets/images/blank.jpg'; ?>
							<img src="<?php echo esc_url($blank); ?>">
							<?php endif; ?>
						</a>
					</div>

					<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

				</div>
			

			<?php } endif; wp_reset_postdata(); ?>

			</div>

		</div>
	<?php endif; 
}

/**
 * Footer Hooks
 */
add_action( 'blue_monday_footer', 'blue_monday_template_footer_widgets', 10 );
add_action( 'blue_monday_footer', 'blue_monday_template_copyright', 15 );

function blue_monday_template_footer_widgets(){ 
    if ( is_active_sidebar( 'footer-1' ) || is_active_sidebar( 'footer-2' ) || is_active_sidebar( 'footer-3' ) || is_active_sidebar( 'footer-4' ) ) : ?>
    <div class="footer-area">
        <div class="container">
            <div class="row">
                <div class="footer-widgets wrap">
                        <div class="col-sm-4 footer-item"><?php dynamic_sidebar( 'footer-1' ); ?></div>
                        <div class="col-sm-4 footer-item"><?php dynamic_sidebar( 'footer-2' ); ?></div>
                        <div class="col-sm-4 footer-item"><?php dynamic_sidebar( 'footer-3' ); ?></div>
                    
                    <span class="clearfix"></span>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>
<?php
}

function blue_monday_template_copyright(){ ?>
    <div class="footer-copyright">
        <div class="container">
            &#169; <?php echo date_i18n('Y') . ' '; bloginfo( 'name' ); ?>
            <span><?php if(is_home() || is_front_page()): ?>
                - <?php echo __('Built with','blue-monday'); ?> <a href="<?php echo esc_url( __( 'https://wordpress.org/', 'blue-monday' ) ); ?>" target="_blank"><?php printf( esc_html( '%s', 'blue-monday' ), 'WordPress' ); ?></a> <span><?php _e('and','blue-monday'); ?></span> <a href="<?php echo esc_url( __( 'http://deucethemes.com/themes/blue-monday/', 'blue-monday' ) ); ?>" target="_blank"><?php printf( esc_html( '%s', 'blue-monday' ), 'Blue Monday' ); ?></a>   
            <?php endif; ?>
            </span>
        </div>
    </div>
<?php
}


/**
 * Meta Tags
 */
function blue_monday_entry_meta(){

    $byline = sprintf(

        esc_html( '%s', 'blue-monday' ),
        '<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . get_the_author() . '</a></span>'
    );

    $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
    if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
        $time_string = '<time class="updated" datetime="%3$s">%4$s</time>';
    }

    $time_string = sprintf( $time_string,
        get_the_date( DATE_W3C ),
        get_the_date(),
        get_the_modified_date( DATE_W3C ),
        get_the_modified_date()
    );

    $get_category_list = get_the_category_list( __( ', ', 'blue-monday' ) );
    $cat_list = sprintf( esc_html('%s', 'blue-monday'),
    $get_category_list
    );

    echo '<span class="posted-on"><i class="fa fa-calendar" aria-hidden="true"></i>' . $time_string . '</span><span class="byline"><i class="fa fa-user" aria-hidden="true"></i>' . $byline . '</span><span class="cat-list"><i class="fa fa-folder-open" aria-hidden="true"></i>'. $cat_list .'</span>';
}


add_action( 'blue_monday_entry_footer', 'blue_monday_post_tag', 10 );
add_action( 'blue_monday_entry_footer', 'blue_monday_next_prev_post', 15 );
add_action( 'blue_monday_entry_footer', 'blue_monday_author_bio', 20 );

function blue_monday_post_tag(){ 

    $get_category_list = get_the_category_list( __( ', ', 'blue-monday' ) );
    $cat_list = sprintf( esc_html('%s', 'blue-monday'),
    $get_category_list
    );

    ?>
    <div class="cat-tag-links">
        <?php if(has_tag()): ?>
        <p><i class="fa fa-tag" aria-hidden="true"></i><?php echo ' ' . get_the_tag_list('','',''); ?></p>
        <?php endif; ?>
        <?php if(has_category()): ?>
        <p><i class="fa fa-folder-open" aria-hidden="true"></i><?php echo ' ' . $get_category_list; ?></p>
        <?php endif; ?>
    </div>
    <?php
}

function blue_monday_author_bio(){ ?>
    <div class="author-info">
      <div class="avatar">
        <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php echo get_avatar( get_the_author_meta( 'ID' ) , 100 ); ?></a>
      </div>
      <div class="info">
          <p class="author-name"><span><?php _e('Posted By ','blue-monday'); ?></span><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php the_author(); ?></a></p>
          <?php echo get_the_author_meta('description'); ?>
      </div>
      <span class="clearfix"></span>
    </div> 
    <?php
}

function blue_monday_next_prev_post(){
    ?>
        <div class="next-prev-post">
            <div class="prev col-xs-6">
                <?php previous_post_link('&larr; %link'); ?>
            </div>
            <div class="next col-xs-6">
                <?php next_post_link('%link &rarr;'); ?>
            </div>
            <span class="clearfix"></span>
        </div>
    <?php
}