<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package Create
 */

/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 *
 * @param array $args Configuration arguments.
 * @return array
 */
function create_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'create_page_menu_args' );

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function create_body_classes( $classes ) {
	// #1 Adds a class of group-blog to blogs with more than 1 published author.
	// #2 Adds a class of masonry home.php only.
    // #3 Adds a class of content-area-full when widget is not in use.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}
	
    if ( is_home () ) {
        $classes[] = 'create-masonry';
    }
	
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	    $classes[] = 'no-sidebar-full-width';
	}

	return $classes;
}
add_filter( 'body_class', 'create_body_classes' );

/**
 * Sets the authordata global when viewing an author archive.
 *
 * This provides backwards compatibility with
 * http://core.trac.wordpress.org/changeset/25574
 *
 * It removes the need to call the_post() and rewind_posts() in an author
 * template to print information about the author.
 *
 * @global WP_Query $wp_query WordPress Query object.
 * @return void
 */
function create_setup_author() {
	global $wp_query;

	if ( $wp_query->is_author() && isset( $wp_query->post ) ) {
		$GLOBALS['authordata'] = get_userdata( $wp_query->post->post_author );
	}
}
add_action( 'wp', 'create_setup_author' );

/**
 * Create excerpt length is set to 30 words.
 */
function create_excerpt_length( $length ) {
	return 30;
}
add_filter( 'excerpt_length', 'create_excerpt_length', 999 );

/**
 * Create is using [...] string in the excerpt.
 */
function create_excerpt_more( $more ) {
	return '<span class="more-dots"><a href="'. get_permalink( get_the_ID() ) . '">[ . . . ]</span>' . '</a>';
}
add_filter( 'excerpt_more', 'create_excerpt_more' );

if ( ! function_exists( 'create_content_end' ) ) :
/**
 * End Content wrap
 *
 * @since Create 0.2
 */
function create_content_end() { ?>
	</div><!-- #content -->
<?php
}
endif; //create_content_end
add_action( 'create_before_footer', 'create_content_end', 10 );

if ( ! function_exists( 'create_footer_start' ) ) :
/**
 * Start Footer wrap
 *
 * @since Create 0.2
 */
function create_footer_start() { ?>
	<footer id="colophon" class="site-footer" role="contentinfo">
<?php
}
endif; //create_footer_start
add_action( 'create_footer', 'create_footer_start', 10 );

if ( ! function_exists( 'create_footer_end' ) ) :
/**
 * End Footer wrap
 *
 * @since Create 0.2
 */
function create_footer_end() { ?>
	</footer><!-- #colophon -->
<?php
}
endif; //create_footer_end
add_action( 'create_footer', 'create_footer_end', 50 );

if ( ! function_exists( 'create_page_end' ) ) :
/**
 * End Page wrap
 *
 * @since Create 0.2
 */
function create_page_end() { ?>
	</div><!-- #page -->
<?php
}
endif; //create_page_end
add_action( 'create_footer', 'create_page_end', 100 );

if ( ! function_exists( 'create_copyright' ) ) :
/**
* Powered by Text
*
* @since Create 0.2
*/
function create_copyright() { ?>
	<span class="site-copyright">
		<?php 
		printf( _x( '&copy; %1$s %2$s' , '1: Year, 2: Site Title with home URL', 'create' ), date( 'Y' ), '<a href="' . esc_url( home_url( '/' ) ) . '"> ' . esc_attr( get_bloginfo( 'name', 'display' ) ) . '</a>' );
		?>
	</span>
<?php
}
endif; //create_copyright


if ( ! function_exists( 'create_seperator' ) ) :
/**
 * Seperator
 *
 * @since Create 0.2
 */
function create_seperator() { ?>
	<span class="sep"><?php echo esc_attr( '&nbsp;&bull;&nbsp;' ); ?></span>
<?php
}
endif; //create_seperator

/**
 * Profile
 *
 * @since Create 0.2
 */
function create_profile() { ?>
	<span class="theme-name">
		<?php echo esc_attr( 'Create' ); ?>
	</span>
	<span class="theme-by">
		<?php _ex( 'by', 'attribution', 'create' ); ?>
	</span>
	<span class="theme-author">
		<a href="<?php echo esc_url( 'http://catchthemes.com/' ); ?>" target="_blank">
			<?php echo esc_attr( 'Catch Themes' ); ?>
		</a>
	</span>
<?php	
}

/**
 * Footer Information
 *
 * @since Create 0.2
 */
function create_footer_info() { ?>
	<div class="site-info">
		<?php create_copyright(); ?>
		<?php create_seperator(); ?>
		<?php create_profile(); ?>
	</div><!-- .site-info -->
	
<?php 
}
// Load footer content in  create_footer hook 
add_action( 'create_footer', 'create_footer_info', 20 );

if ( ! function_exists( 'create_page_post_meta' ) ) :
	/**
	 * Post/Page Meta for Google Structure Data
	 */
	function create_page_post_meta() {
		$create_author_url = esc_url( get_author_posts_url( get_the_author_meta( "ID" ) ) );
		
		$create_page_post_meta = '<span class="post-time">' . __( 'Posted on', 'create' ) . ' <time class="entry-date updated" datetime="' . esc_attr( get_the_date( 'c' ) ) . '" pubdate>' . esc_html( get_the_date() ) . '</time></span>';
	    $create_page_post_meta .= '<span class="post-author">' . __( 'By', 'create' ) . ' <span class="author vcard"><a class="url fn n" href="' . $create_author_url . '" title="View all posts by ' . get_the_author() . '" rel="author">' .get_the_author() . '</a></span>';

		return $create_page_post_meta;
	} 
endif; //create_page_post_meta

/**
 * Return the first image in a post. Works inside a loop.
 * @param [integer] $post_id [Post or page id]
 * @param [string/array] $size Image size. Either a string keyword (thumbnail, medium, large or full) or a 2-item array representing width and height in pixels, e.g. array(32,32).
 * @param [string/array] $attr Query string or array of attributes.
 * @return [string] image html
 *
 * @since Create 1.2
 */

function create_get_first_image( $postID, $size, $attr ) {
	ob_start();

	ob_end_clean();

	$image 	= '';

	$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', get_post_field('post_content', $postID ) , $matches);

	if( isset( $matches [1] [0] ) ) {
		//Get first image
		$first_img = $matches [1] [0];
		
		return '<img class="pngfix wp-post-image" src="'. $first_img .'">';
	}
	
	return false;
}