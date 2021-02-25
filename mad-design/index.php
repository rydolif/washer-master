<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package mad_design
 */

get_header(); ?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main">
		<?php
        if ( have_posts() ) :
			if ( is_home() && ! is_front_page() ) :
				?>
				<div class="page-title-box row">
                    <div class="col-xs-12 col-md-6">
                        <h1 class="page-title"><?php single_post_title(); ?></h1>
                        <?php
                        if ( function_exists('yoast_breadcrumb') ) {
                            yoast_breadcrumb('<div id="breadcrumbs">','</div>');
                        }
                        ?>
                    </div>
				</div>
				<?php endif; ?>
                <div class="row pl4">
                    <div class="col-xs-12 col-sm-8">
                        <div class="row">
                            <?php
                            while ( have_posts() ) :
                                the_post();

                                get_template_part( 'template-parts/content', get_post_type() );

                            endwhile;

                            else :

                                get_template_part( 'template-parts/content', 'none' );

                            endif;
                            ?>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-4">
                        <span class="d-none d-md-block">
                            <?php get_sidebar(); ?>
                        </span>
                        <div class="pagination-box">
                            <?php
                            tm_paging_nav();
                            wp_reset_postdata();
                            ?>
                            <div class="posts-page-nav">
                                <?php
                                if(!get_previous_posts_link()) {
                                    echo '<div class="prev-posts-page"><i class="far fa-long-arrow-left"></i></div>' ;
                                } else {
                                    previous_posts_link('<div class="prev-posts-page"><i class="far fa-long-arrow-left"></i></div>');
                                }

                                if(!get_next_posts_link()) {
                                    echo '<div class="next-posts-page"><i class="far fa-long-arrow-right"></i></div>' ;
                                } else {
                                    next_posts_link('<div class="next-posts-page"><i class="far fa-long-arrow-right"></i></div>');
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="page-bottom-red-box row"></div>
		</main><!-- #main -->
	</div><!-- #primary -->
<?php get_footer(); ?>
