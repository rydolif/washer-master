<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package mad_design
 */

?>
<div class="col-sm-12 <?php if ( is_search() || !is_single()) : ?> col-lg-6 <?php endif; ?>">
    <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="entry-main-content">
            <?php if ( is_search() || !is_single()) : ?>
                <?php if ( has_post_thumbnail() && ! post_password_required() ) : ?>
                    <div class="entry-thumbnail">
                        <?php
                        the_post_thumbnail('tm-blog-posts-list');
                        $postImage = wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()) );
                        ?>
                        <div class="entry-main-header">
                            <?php
                            if ( is_singular() ) :
                                the_title( '<h1 class="entry-title">', '</h1>' );
                            else :
                                the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
                            endif;?>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
            <?php if ( is_search() || !is_single()) : ?>
                <div class="post-content">
                    <?php if ( has_post_thumbnail() && ! post_password_required() ) : ?><?php endif; ?>
                    <div class="post-inner-top">
                        <div class="entry-summary">
                            <div class="excerpt"><?php echo tm_posts_short_description(); ?></div>
                        </div>
                    </div>
                    <?php else: ?>
                    <div class="page-title-box row">
                        <div class="col-xs-12 col-lg-6">
                            <h1 class="page-title"><?php echo get_the_title(); ?></h1>
                            <?php
                            if ( function_exists('yoast_breadcrumb') ) {
                                yoast_breadcrumb('<div id="breadcrumbs">','</div>');
                            }
                            ?>
                        </div>
                    </div>
                    <div class="entry-content-other">
                        <div class="entry-main-header">
                            <?php
                            if( $post->post_title == '' ) :
                                $entry_meta_class = "empty-entry-header";
                            else :
                                $entry_meta_class = "";
                            endif; ?>
                            <div class="entry-header <?php echo esc_attr($entry_meta_class); ?>">
                                <h3 class="entry-title">
                                    <?php the_title(); ?>
                                    <?php tm_sticky_post(); ?>
                                </h3>
                            </div>
                        </div>
                        <div class="row">
                            <div class="entry-content col-sm-12 col-md-8">
                                <?php the_content( wp_kses( __('Continue reading <span class="meta-nav">&rarr;</span>', 'mad_design' ),tm_allowed_html())); ?>
                            </div>
                            <div class="col-sm-12 col-md-4 d-none d-md-block">
                                <?php tm_similar_records(); ?>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>