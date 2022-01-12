<?php
/*
*
* NAV-WALKER. REQUIRED FOR BOOTSTRAP MENU FUNCTIONALITY
*
*/
require_once('wp-bootstrap-navwalker.php');
require_once('includes/big_functions.php');
require_once('includes/customizer.php');
require_once('includes/cpt.php');
require_once('includes/eddcpt.php');

function wpb_theme_setup(){
/*
*
* REGISTER MENUS
*
*/
	register_nav_menus(array(
		'primary' => __('Primary Menu', 'kevinurielfonsecav2'),
		'secondary' => __('Secondary Menu', 'kevinurielfonsecav2'),
	));
/*
*
* SLUG
*
*/
function the_slug($echo=true){
	$slug = basename(get_permalink());
	do_action('before_slug', $slug);
	$slug = apply_filters('slug_filter', $slug);
	if( $echo ) echo '-'.$slug;
	do_action('after_slug', $slug);
	return $slug;
}
/*
*
* FILE SUPPORT
*
*/
	add_theme_support('custom-logo');
	add_theme_support( 'infinite-scroll', array(
		'type'		=>	'scroll',
		'container' => 'fetch-more',
		'footer' 	=> 'end-of-page',
	));
	add_theme_support('post-thumbnails');
	add_theme_support( 'html5', array( 'comment-list', 'search-form', 'comment-form', 'gallery', 'caption', ));
}

add_action('after_setup_theme','wpb_theme_setup');

/*
*
* NO FEATURED IMAGE?
*
*/
function no_image(){
    echo '<img src="http://fpae.pt/backup/20181025/wp/wp-content/plugins/post-slider-carousel/images/no-image-available-grid.jpg" class="img-responsive">';
}
/*
*
* BODY CLASSES FOR SIDEBAR POSITION
*
*/
function theme_slug_body_classes( $classes ) {
	// Switch sidebar to left.
	if ( 'left' === get_theme_mod( 'theme_sidebar_position', 'right' ) ) {
		$classes[] = 'left-sidebar';
	}
	return $classes;
}
add_filter( 'body_class', 'theme_slug_body_classes' );
/*
*
* EXCERPT LENGHT
*
*/
function set_excerpt_length(){
	return 45;
	}
add_filter('excerpt_length' , 'set_excerpt_length');
/*
*
* PREVIEW LINK CUSTOM FIELD
*
*/
function preview_link($postID){
	$demo_url = 'preview_url';
	$demostracion_url = get_post_meta($postID, $demo_url, true);
	if($demostracion_url==''){
		delete_post_meta($postID,$demo_url);
		add_post_meta($postID,$demo_url, '#');
		return '#';
	}
	return $demostracion_url;
}
/*
*
* SEARCH FUNCTION. THE SEARCH INPUT WILL ONLY LOOK FOR THE KEYWORK IN THE SPECIFIED POSTS
*
*/
if (!is_admin()) {
    function search_filter($query) {
        if (is_search() && $query->is_main_query() && $query->get( 's' )) {
            $query->set('post_type', array('post', 'books'));
        }
        return $query;
    }
    add_filter('pre_get_posts','search_filter');
}

/*
*
* SEARCH KEYWORD ON TITLE ONLY
*
*/
function search_by_title_only( $search , $wp_query )
{
    global $wpdb;
    if(empty($search)) {
        return $search; // skip processing - no search term in query
    }
    $q = $wp_query->query_vars;
    $n = !empty($q['exact']) ? '' : '%';
    $search =
    $searchand = '';
    foreach ((array)$q['search_terms'] as $term) {
        $term = esc_sql($wpdb->esc_like($term));
        $search .= "{$searchand}($wpdb->posts.post_title LIKE '{$n}{$term}{$n}')";
        $searchand = ' AND ';
    }
    if (!empty($search)) {
        $search = " AND ({$search}) ";
        if (!is_user_logged_in())
            $search .= " AND ($wpdb->posts.post_password = '') ";
    }
    return $search;
}
add_filter('posts_search', 'search_by_title_only', 500, 2);

/*
*
* PUT THE FIRST IMAGE FILE IN THE POST/CPT AS A FEATURED IMAGE
*
*/
function autoset_featured() {
    global $post;
    $already_has_thumb = has_post_thumbnail($post->ID);
        if (!$already_has_thumb)  {
        $attached_image = get_children( "post_parent=$post->ID&post_type=attachment&post_mime_type=image&numberposts=1" );
            if ($attached_image) {
                foreach ($attached_image as $attachment_id => $attachment) {
                    set_post_thumbnail($post->ID, $attachment_id);
                }
            }
        }
    }

    add_action('the_post', 'autoset_featured');
    add_action('save_post', 'autoset_featured');
    add_action('draft_to_publish', 'autoset_featured');
    add_action('new_to_publish', 'autoset_featured');
    add_action('pending_to_publish', 'autoset_featured');
    add_action('future_to_publish', 'autoset_featured');

// Cambiar Orden de Columnas para Posts, Pages and CPTs en admin
add_filter('manage_posts_columns', 'columns_order', 5); // for Posts
add_filter('manage_pages_columns', 'columns_order', 5); // for Pages

function columns_order( $columns ) {
	$columns['img'] = 'Featured Image'; // $colums['img'] = 'Column Title';
	return $columns;
}



// Contenido de columna img para Posts, Pages and CPTs
add_filter('manage_posts_custom_column', 'manage_img_column', 10, 3);
add_filter('manage_pages_custom_column', 'manage_img_column', 10, 3);

function manage_img_column($column_name, $post_id) {
    if( $column_name === 'img' ) {
        echo get_the_post_thumbnail($post_id, 'thumbnail');
        return true;
    }
}

/*
*
* User Inputs
*
*/
$extra_fields =  array(
	array( 'facebook', __( 'Facebook Username', 'rc_cucm' ), true ),
	array( 'twitter', __( 'Twitter Username', 'rc_cucm' ), true ),
);
function kuaf_add_user_contactmethods( $user_contactmethods ) {

	// Get fields
	global $extra_fields;

	// Display each fields
	foreach( $extra_fields as $field ) {
		if ( !isset( $contactmethods[ $field[0] ] ) )
    		$user_contactmethods[ $field[0] ] = $field[1];
	}

    // Returns the contact methods
    return $user_contactmethods;
}
add_filter( 'user_contactmethods', 'kuaf_add_user_contactmethods' );
/*
*
* BOOTSTRAP COMMENTS
*
*/
function bootstrap_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
?>
<?php if ( $comment->comment_approved == '1' ): ?>
	<li class="media">
		<div class="media-left">
			<?php echo get_avatar( $comment, 40); ?>
		</div>
		<div class="media-body">
			<h4 class="media-heading">
				<?php comment_author_link() ?>
			</h4>
			<time>
				<a href="#comment-<?php comment_ID() ?>">
					<?php comment_date() ?> at <?php comment_time() ?>
				</a>
			</time>
			<?php echo comment_author_links(); ?>
			<?php comment_text(); ?>
			<?php
			comment_reply_link(array_merge(
				$args, array(
					'depth' => $depth,
					'max_depth' => $args['max_depth'],
				)
				)
				)
			?>
		</div>
	</li>
<?php else : ?>
    <p class="bg-success">Your comments is waiting for approvation</p>
<?php endif;
}
/*
*
* LINKS FOR COMMENT AUTHOR
*
*/
 function comment_author_links() {
  $comment_ID = get_comment_ID();
  if (current_user_can('edit_post')) {
    echo '<a href="'.admin_url("comment.php?action=cdc&c=$comment_ID").'" style="color: red">Delete</a> ';
    echo '<a href="'.admin_url("comment.php?action=cdc&dt=spam&c=$comment_ID").'" style="color: purple">Spam</a>';
  }
}
/*
*
* REMOVE DEFAULT GALLERY STYLE
*
*/
add_filter( 'use_default_gallery_style', '__return_false' );
/*
*
* HTML SCHEMA
*
*/
function html_schema()
{
    $schema = 'http://schema.org/';

    // Is single post
    if(is_single())
    {
        $type = "Article";
    }
    // Is blog home, archive or category
    else if(is_home()||is_archive()||is_category())
    {
        $type = "Blog";
    }
    // Is static front page
    else if(is_front_page())
    {
        $type = "Website";
    }
    // Is a general page
     else
    {
        $type = 'WebPage';
    }

    echo 'itemscope="itemscope" itemtype="' . $schema . $type . '"';
}

add_filter( 'nav_menu_link_attributes', 'add_attribute', 10, 3 );
function add_attribute( $atts, $item, $args )
{
  $atts['itemprop'] = 'url';
  return $atts;
}

/*
*
* SIDEBAR AND WIDGETS POSITION
*
*/
function wpb_init_widgets($id){
  /*** Main Sidebar ***/
  register_sidebar(array(
    'name'  =>  'Sidebar',
    'id'    =>  'sidebar',
    'before_widget' =>  '<div class="widgets">',
    'after_widget'  =>  '</div>',
    'before_title'  =>  '<h6 class="page-header my-page-header">',
    'after_title'   =>  '</h6>',
  ));
  /*** Footer 1 ***/
  register_sidebar(array(
    'name'  =>  'Footer 1',
    'id'    =>  'footer_area_1',
    'before_widget' =>  '<div class="widgets">',
    'after_widget'  =>  '</div>',
    'before_title'  =>  '<h6 class="page-header">',
    'after_title'   =>  '</h6>',
  ));
  /*** Footer 2 ***/
  register_sidebar(array(
    'name'  =>  'Footer 2',
    'id'    =>  'footer_area_2',
    'before_widget' =>  '<div class="widgets">',
    'after_widget'  =>  '</div>',
    'before_title'  =>  '<h6 class="page-header">',
    'after_title'   =>  '</h6>',
  ));
  /*** Footer 3 ***/
  register_sidebar(array(
    'name'  =>  'Footer 3',
    'id'    =>  'footer_area_3',
    'before_widget' =>  '<div class="widgets">',
    'after_widget'  =>  '</div>',
    'before_title'  =>  '<h6 class="page-header">',
    'after_title'   =>  '</h6>',
  ));
  /*** Footer 4 ***/
  register_sidebar(array(
    'name'  =>  'Footer 4',
    'id'    =>  'footer_area_4',
    'before_widget' =>  '<div class="widgets">',
    'after_widget'  =>  '</div>',
    'before_title'  =>  '<h6 class="page-header">',
    'after_title'   =>  '</h6>',
  ));
  /*** Easy Download Sidebar ***/
  register_sidebar(array(
    'name'  =>  'Easy Download Sidebar',
    'id'    =>  'edd_sidebar',
    'before_widget' =>  '<div class="widgets">',
    'after_widget'  =>  '</div>',
    'before_title'  =>  '<h6>',
    'after_title'   =>  '</h6>',
  ));
  /*** Front-Page ***/
  register_sidebar(array(
    'name'  =>  'Front Page',
    'id'    =>  'front_page',
    'before_widget' =>  '',
    'after_widget'  =>  '',
    'before_title'  =>  '',
    'after_title'   =>  '',
  ));

}

add_action('widgets_init', 'wpb_init_widgets');

/*
*
* REST API
*
*/

// Featured Image
add_action('rest_api_init', 'register_rest_images' );

if(! function_exists('register_rest_images')) {
  function register_rest_images() {
    register_rest_field(array('post'), 'fimg_url',
                        array(
                          'get_callback'    => 'get_rest_featured_image',
                          'update_callback' => null,
                          'schema'          => null,
                        )
                       );
  }
  
  function get_rest_featured_image( $object, $field_name, $request ) {
    if( $object['featured_media'] ){
      $img = wp_get_attachment_image_src( $object['featured_media'], 'app-thumb' );
      return $img[0];
    }
    return false;
  }
}

// Category name
add_action( 'rest_api_init', 'register_rest_category_name'); 

if (! function_exists( 'register_rest_category_name' )) {
  function register_rest_category_name() {
    register_rest_field(array('post'), 'category_name',
                        array(
                          'get_callback'	=> 'get_category_name',
                          'update_callback'	=> null,
                          'schema'			=> null
                        ));

    }
  
    function get_category_name( $object ) {
      $category = get_the_category($object[ 'id' ]);
      return $category[0]->cat_name;
    }
}

// Preview link
add_action( 'rest_api_init', 'add_custom_fields' );

if(! function_exists('register_rest_preview_link')) {
	function register_rest_preview_link() {
		register_rest_field(array('post', 'download'), 'preview_link',
							array(
								'get_callback'    => 'get_preview_link',
								'update_callback' => null,
								'schema'          => null,
							));
	}
	
	function get_preview_link( $object, $field_name, $request ) {
		//your code goes here
		return $customfieldvalue;
	}
}