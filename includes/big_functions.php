<?php
/*
*
* NUMERIC PAGINATION
*
*/
function numeric_pagination() {

	if( !is_home() && !is_search() && !is_archive() || !have_posts() )
	/* If the pages are not index, search and archive and/or none of them have post, display nothing */
		return;
	/* Otherwise, initialize pagination */
    global $wp_query;
    /* Stop the code if there is only a single page page */
    if( $wp_query->max_num_pages <= 1 )
        return;
    $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
    $max   = intval( $wp_query->max_num_pages );
    /*Add current page into the array */
    if ( $paged >= 1 )
        $links[] = $paged;
    /*Add the pages around the current page to the array */
    if ( $paged >= 3 ) {
        $links[] = $paged - 1;
        $links[] = $paged - 2;
    }
    if ( ( $paged + 2 ) <= $max ) {
        $links[] = $paged + 2;
        $links[] = $paged + 1;
    }

    echo '<nav aria-label="pagination"><ul class="pagination">' . "\n";
    /*Display Previous Post Link */
    if ( get_previous_posts_link() )
        printf( '<li>%s</li>' . "\n", get_previous_posts_link() );
    /*Display Link to first page*/
    if ( ! in_array( 1, $links ) ) {
        $class = 1 == $paged ? ' class="active"' : '';
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );
        if ( ! in_array( 2, $links ) )
        echo '<li></li>';
    }
    /* Link to current page */
    sort( $links );
    foreach ( (array) $links as $link ) {
        $class = $paged == $link ? ' class="active"' : '';
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
    }
    /* Link to last page, plus ellipses if necessary */
    if ( ! in_array( $max, $links ) ) {
        if ( ! in_array( $max - 1, $links ) )
		echo '<li></li>' . "\n";
        $class = $paged == $max ? ' class="active"' : '';
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
    }
    /** Next Post Link */
    if ( get_next_posts_link() )
        printf( '<li>%s</li>' . "\n", get_next_posts_link() );
    echo '</ul></nav>' . "\n";
}
/*
*
* BREADCRUMBS
*
*/
function get_breadcrumb() {

if ( is_front_page() ) {
            return;
        }
        if ( get_theme_mod( 'ct_ignite_show_breadcrumbs_setting' ) == 'no' ) {
            return;
        }
        global $post;
        $defaults  = array(
            'separator_icon'      => '/',
            'breadcrumbs_id'      => 'breadcrumbs',
            'breadcrumbs_classes' => 'breadcrumb',
            'home_title'          => esc_html__( 'Home', 'ignite' )
        );
        $args      = apply_filters( 'ct_ignite_breadcrumbs_args', wp_parse_args( $args, $defaults ) );
        $separator = '<span class="separator"> ' . esc_html( $args['separator_icon'] ) . ' </span>';
        /***** Begin Markup *****/
        // Open the breadcrumbs
        $html = '<ol id="'. esc_attr( $args['breadcrumbs_id'] ) . '" class="' . esc_attr( $args['breadcrumbs_classes'] ) . '">';
        // Add Homepage link & separator (always present)
        $html .= '<span class="item-home"><a class="bread-link bread-home" href="' . get_home_url() . '" title="' . esc_attr( $args['home_title'] ) . '">' . esc_html( $args['home_title'] ) . '</a></span>';
        $html .= $separator;
        // Post
        if ( is_singular( 'post' ) ) {

            $category = get_the_category( $post->ID );
            $category_values = array_values( $category );
            $last_category = end( $category_values );
            $cat_parents = rtrim( get_category_parents( $last_category->term_id, true, ',' ), ',' );
            $cat_parents = explode( ',', $cat_parents );
            foreach ( $cat_parents as $parent ) {
                $html .= '<span class="item-cat">' . wp_kses( $parent, wp_kses_allowed_html( 'a' ) ) . '</span>';
                $html .= $separator;
            }
            $html .= '<span class="item-current item-' . $post->ID . '"><span class="bread-current bread-' . $post->ID . '" title="' . esc_attr( get_the_title() ) . '">' . wp_strip_all_tags( get_the_title() ) . '</span></span>';
        } elseif ( is_singular( 'page' ) ) {
            if ( $post->post_parent ) {
                $parents = get_post_ancestors( $post->ID );
                $parents = array_reverse( $parents );
                foreach ( $parents as $parent ) {
                    $html .= '<span class="item-parent item-parent-' . esc_attr( $parent ) . '"><a class="bread-parent bread-parent-' . esc_attr( $parent ) . '" href="' . esc_url( get_permalink( $parent ) ) . '" title="' . esc_attr( get_the_title( $parent ) ) . '">' . wp_strip_all_tags( get_the_title( $parent ) ) . '</a></span>';
                    $html .= $separator;
                }
            }
            $html .= '<span class="item-current item-' . $post->ID . '"><span title="' . esc_attr( get_the_title() ) . '"> ' . wp_strip_all_tags( get_the_title() ) . '</span></span>';
        } elseif ( is_singular( 'attachment' ) ) {
            $parent_id        = $post->post_parent;
            $parent_title     = get_the_title( $parent_id );
            $parent_permalink = esc_url( get_permalink( $parent_id ) );
            $html .= '<span class="item-parent"><a class="bread-parent" href="' . esc_url( $parent_permalink ) . '" title="' . esc_attr( $parent_title ) . '">' . wp_strip_all_tags( $parent_title ) . '</a></span>';
            $html .= $separator;
            $html .= '<span class="item-current item-' . $post->ID . '"><span title="' . esc_attr( get_the_title() ) . '"> ' . wp_strip_all_tags( get_the_title() ) . '</span></span>';
        } elseif ( is_singular() ) {
            $post_type         = get_post_type( $post->ID );
            $post_type_object  = get_post_type_object( $post_type );
            $post_type_archive = get_post_type_archive_link( $post_type );
            $html .= '<span class="item-cat item-custom-post-type-' . esc_attr( $post_type ) . '"><a class="bread-cat bread-custom-post-type-' . esc_attr( $post_type ) . '" href="' . esc_url( $post_type_archive ) . '" title="' . esc_attr( $post_type_object->labels->name ) . '">' . wp_strip_all_tags( $post_type_object->labels->name ) . '</a></span>';
            $html .= $separator;
            $html .= '<span class="item-current item-' . $post->ID . '"><span class="bread-current bread-' . $post->ID . '" title="' . $post->post_title . '">' . wp_strip_all_tags( $post->post_title ) . '</span></span>';
        } elseif ( is_category() ) {
            $parent = get_queried_object()->category_parent;
            if ( $parent !== 0 ) {
                $parent_category = get_category( $parent );
                $category_link   = get_category_link( $parent );
                $html .= '<span class="item-parent item-parent-' . esc_attr( $parent_category->slug ) . '"><a class="bread-parent bread-parent-' . esc_attr( $parent_category->slug ) . '" href="' . esc_url( $category_link ) . '" title="' . esc_attr( $parent_category->name ) . '">' . esc_html( $parent_category->name ) . '</a></span>';
                $html .= $separator;
            }
            $html .= '<span class="item-current item-cat"><span class="bread-current bread-cat" title="' . $post->ID . '">' . single_cat_title( '', false ) . '</span></span>';
        } elseif ( is_tag() ) {
            $html .= '<span class="item-current item-tag"><span class="bread-current bread-tag">' . single_tag_title( '', false ) . '</span></span>';
        } elseif ( is_author() ) {
            $html .= '<span class="item-current item-author"><span class="bread-current bread-author">' . get_queried_object()->display_name . '</span></span>';
        } elseif ( is_day() ) {
            $html .= '<span class="item-current item-day"><span class="bread-current bread-day">' . get_the_date() . '</span></span>';
        } elseif ( is_month() ) {
            $html .= '<span class="item-current item-month"><span class="bread-current bread-month">' . get_the_date( 'F Y' ) . '</span></span>';
        } elseif ( is_year() ) {
            $html .= '<span class="item-current item-year"><span class="bread-current bread-year">' . get_the_date( 'Y' ) . '</span></span>';
        } elseif ( is_archive() ) {
            $custom_tax_name = get_queried_object()->name;
            $html .= '<span class="item-current item-archive"><span class="bread-current bread-archive">' . esc_html( $custom_tax_name ) . '</span></span>';
        } elseif ( is_search() ) {
            $html .= '<span class="item-current item-search"><span class="bread-current bread-search">'. esc_html( __("Search results for:", "ignite") ) . ' ' . get_search_query() . '</span></span>';
        } elseif ( is_404() ) {
            $html .= '<span>' . __( 'Error 404', 'ignite' ) . '</span>';
        } elseif ( is_home() ) {
            $html .= '<span>' . esc_html( get_the_title( get_option( 'page_for_posts' ) ) ) . '</span>';
        }
        $html .= '</ol>';
        $html = apply_filters( 'ct_ignite_breadcrumbs_filter', $html );
        echo wp_kses_post( $html );

}
