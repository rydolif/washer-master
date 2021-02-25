<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package mad_design
 */

?>
	</div><!-- #content -->
    <footer class="footer" id="footer">
        <div class="navbar navbar-expand-md">
            <div class="container">
<!--                 <a class="navbar-brand d-flex align-items-center" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                    <span class="col logo pl-0"><?php bloginfo( 'name' ); ?></span>
                    <?php
                    $mad_design_description = get_bloginfo( 'description', 'display' );
                    if ( $mad_design_description || is_customize_preview() ) :
                        ?>
                        <span class="col slogan"><?php echo $mad_design_description; /* WPCS: xss ok. */ ?></span>
                    <?php endif; ?> 
                </a> -->
                <span class="col logo pl-0"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php the_custom_logo(); ?></a></span>
                <?php get_sidebar('footer-left'); ?>
                <?php get_sidebar('footer-right'); ?>
            </div>
        </div>
    </footer>
</div><!-- #page -->
<?php wp_footer(); ?>
<script>
    jQuery(window).on('load', function () {
        jQuery('.preloader .pulse').fadeOut();
        jQuery('.preloader').delay(350).fadeOut('slow');
    });
</script>
</body>
</html>
