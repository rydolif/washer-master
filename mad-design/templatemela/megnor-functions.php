<?php
/**
 * Created by PhpStorm.
 * User: yunis91
 * Date: 31.05.2018
 * Time: 13:06
 */

/**
 * Sets the post excerpt length to 40 characters.
 * To override this length in a child theme, remove the filter and add your own
 * function tied to the excerpt_length filter hook.
 * @return int
 */
function tm_excerpt_length( $length ) {
    return 7;
}
remove_filter( 'excerpt_length', 'tm_excerpt_length' );
add_filter( 'excerpt_length', 'tm_excerpt_length' );
function tm_string_limit_words($string, $word_limit)
{
    $words = explode(' ', $string, ($word_limit + 1));
    if(count($words) > $word_limit)
        array_pop($words);
    return implode(' ', $words);
}
/**
 * Returns a "Continue Reading" link for excerpts
 * @return string "Continue Reading" link
 */
function tm_continue_reading_link() {
    return ' <a class="read-more-link" href="'.esc_url(get_permalink()) . '"><i class="far fa-long-arrow-right"></i></a>';
}
add_filter( 'excerpt_length', 'tm_excerpt_length' );
/**
 * Replaces "[...]" (appended to automatically generated excerpts) with an ellipsis and tm_continue_reading_link().
 * To override this in a child theme, remove the filter and add your own
 * function tied to the excerpt_more filter hook.
 * @return string An ellipsis
 */
function tm_auto_excerpt_more( $more ) {
    return  '&hellip;' .tm_continue_reading_link();
}
add_filter( 'excerpt_more', 'tm_auto_excerpt_more' );
/**
 * Adds a pretty "Continue Reading" link to custom post excerpts.
 * To override this link in a child theme, remove the filter and add your own
 * function tied to the get_the_excerpt filter hook.
 * @return string Excerpt with a pretty "Continue Reading" link
 */
function tm_custom_excerpt_more( $output ) {
    if ( has_excerpt() && ! is_attachment() ) {
        $output = '&hellip;'. tm_continue_reading_link();
    }
    return $output;
}

function tm_excerpt($limit)
{
    $excerpt = explode(' ', tm_strip_images(strip_tags(get_the_excerpt())), $limit);
    if (count($excerpt)>=$limit) {
        array_pop($excerpt);
        $excerpt = implode(" ",$excerpt).'...&nbsp;<div class="read-more"><a class="read-more-link" href="'.esc_url(get_permalink()).'"><i class="far fa-long-arrow-right"></i></a></div>';
    } else {
        $excerpt = implode(" ",$excerpt);
    }
    $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
    return $excerpt;
}

if ( ! function_exists( 'tm_sticky_post' ) ) :
    function tm_sticky_post() {
        if ( is_sticky() && is_home() && ! is_paged() )
            echo '<div class="meta-inner"><span class="sticky-post">' . esc_html__( 'Sticky', 'mad_design' ) . '</span></div>';
    }
endif;

function tm_allowed_html() {
    $tm_allowed_html = array(
        'span' => array(
            'class' => array(),
            'style' => array(),
        ),
        'div' => array(
            'class' => array(),
            'style' => array(),
        ),
        'a' => array(
            'href' => array(),
        ),
        'i' => array(
            'class' => array(),
        ),
    );
    return  $tm_allowed_html;
}

if ( ! function_exists( 'tm_posts_short_description' ) ) :
    function tm_posts_short_description() {
        $tm_posts_short_description = get_post_meta(get_the_ID(), 'tm_posts_short_description', true);
        if(empty($tm_posts_short_description))
            $tm_posts_short_description = tm_excerpt(6);
        return $tm_posts_short_description;
    }
endif;

if ( ! function_exists( 'tm_strip_images' ) ) :
    function tm_strip_images($content){
        $content = preg_replace('/<img[^>]+./','',$content);
        return preg_replace('/<\/?a[^>]*>/','',$content);
    }
endif;

if ( ! function_exists( 'tm_shortcode_paging_nav' ) ) :
    function tm_shortcode_paging_nav() {
        $output ='';
        if ( $GLOBALS['wp_query']->max_num_pages > 1 ) {
            $paged        = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
            $pagenum_link = html_entity_decode( get_pagenum_link() );
            $query_args   = array();
            $url_parts    = explode( '?', $pagenum_link );
            if ( isset( $url_parts[1] ) ) {
                wp_parse_str( $url_parts[1], $query_args );
            }
            $pagenum_link = remove_query_arg( array_keys( $query_args ), $pagenum_link );
            $pagenum_link = trailingslashit( $pagenum_link ) . '%_%';
            $format  = $GLOBALS['wp_rewrite']->using_index_permalinks() && ! strpos( $pagenum_link, 'index.php' ) ? 'index.php/' : '';
            $format .= $GLOBALS['wp_rewrite']->using_permalinks() ? user_trailingslashit( 'page/%#%', 'paged' ) : '?paged=%#%';
            // Set up paginated links.
            $links = paginate_links( array(
                'base'     => $pagenum_link,
                'format'   => $format,
                'total'    => $GLOBALS['wp_query']->max_num_pages,
                'current'  => $paged,
                'mid_size' => 1,
                'add_args' => array_map( 'urlencode', $query_args ),
                'prev_text' =>  wp_kses( __( '<i class="far fa-angle-left"></i>', 'mad_design' ),tm_allowed_html()),
                'next_text' =>  wp_kses( __( '<i class="far fa-angle-right"></i>', 'mad_design' ),tm_allowed_html()),
            ) );
            if ( $links ) :
                $output .= '<nav class="navigation paging-navigation" role="navigation">';
                $output .= '<div class="pagination loop-pagination">';
                $output .= $links;
                $output .= '</div>';
                $output .= '</nav>';
            endif;
        }
        return $output;
    }
endif;

?>