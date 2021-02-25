<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package mad_design
 */

if ( ! is_active_sidebar( 'footer-sidebar-right' ) ) {
	return;
}
?>

<div class="col-sm-12 col-md-4">
	<?php dynamic_sidebar( 'footer-sidebar-right' ); ?>
</div><!-- #secondary -->
