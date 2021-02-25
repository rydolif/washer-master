<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package mad_design
 */

get_header();
?>
    <div id="primary" class="content-area">
		<main id="main" class="site-main">
			<section class="error-404 not-found">
                <div class="page-title-box row">
                    <div class="col-xs-12 col-md-6">
                        <h1 class="page-title"><?php esc_html_e( '404', 'mad_design' ); ?></h1>
                        <span style="color:#fff;"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'mad_design' ); ?></span>
                    </div>
                </div>
			</section><!-- .error-404 -->
		</main><!-- #main -->
	</div><!-- #primary -->
<?php get_footer();
