<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package mad_design
 */

?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="page-title-box row mb-0">
        <div class="col-xs-12 col-md-6">
            <h1 class="page-title"><?php single_post_title(); ?></h1>
            <?php
            if ( function_exists('yoast_breadcrumb') ) {
                yoast_breadcrumb('<div id="breadcrumbs">','</div>');
            }
            ?>
        </div>
    </div>
    <?php the_content(); ?>
</div><!-- #post-<?php the_ID(); ?> -->
