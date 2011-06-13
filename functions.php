<?php
/*
 * @package WordPress
 * @subpackage Chameleon
 * @since Chameleon 1.0
 */

add_action( 'after_setup_theme', 'Chameleon_theme_setup' );
function Chameleon_theme_setup() {

	// This theme uses post thumbnails
	add_theme_support( 'post-thumbnails' );

	// Use Google CDN jquery latest minified
	function my_init_method() {
	    wp_deregister_script( 'jquery' );
	    wp_register_script( 'jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js');
	}    
 
	add_action('init', 'my_init_method');
	
	// Add Custom Nav Menus
	add_theme_support( 'menus' );
	
	// Add Primary Navigation
	register_nav_menus( array(
		'primary' => __( 'Primary Navigation', 'Chameleon' ),
	) );
	
	function Chameleon_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
	}
	add_filter( 'wp_page_menu_args', 'Chameleon_page_menu_args' );
	
	function Chameleon_widgets_init() {
	register_sidebar(array(
		 'name' => 'sidebar_top',
		 'id' => 'sidebar_top',
		 'before_widget' => '<div id="%1$s" class="widget">',
		 'after_widget' => '</div>',
		 'before_title' => '<h3>',
		 'after_title' => '</h3>',
		 ));
	register_sidebar(array(
		 'name' => 'sidebar_btm',
		 'id' => 'sidebar_btm',
		 'before_widget' => '<div id="%1$s" class="widget">',
		 'after_widget' => '</div>',
		 'before_title' => '<h3>',
		 'after_title' => '</h3>',
		 ));
	register_sidebar(array(
		 'name' => 'footer1',
		 'id' => 'footer1',
		 'before_widget' => '<div id="%1$s" class="ftr-widget">',
		 'after_widget' => '</div>',
		 'before_title' => '<h3>',
		 'after_title' => '</h3>',
		 ));
	register_sidebar(array(
		 'name' => 'footer2',
		 'id' => 'footer2',
		 'before_widget' => '<div id="%1$s" class="ftr-widget">',
		 'after_widget' => '</div>',
		 'before_title' => '<h3>',
		 'after_title' => '</h3>',
		 ));
	register_sidebar(array(
		 'name' => 'footer3',
		 'id' => 'footer3',
		 'before_widget' => '<div id="%1$s" class="ftr-widget">',
		 'after_widget' => '</div>',
		 'before_title' => '<h3>',
		 'after_title' => '</h3>',
		 ));
	register_sidebar(array(
		 'name' => 'footer4',
		 'id' => 'footer4',
		 'before_widget' => '<div id="%1$s" class="ftr-widget">',
		 'after_widget' => '</div>',
		 'before_title' => '<h3>',
		 'after_title' => '</h3>',
		 ));
	}
	/** Register sidebars by running Chameleon_widgets_init() on the widgets_init hook. */
	add_action( 'widgets_init', 'Chameleon_widgets_init' );
	
	/**
	 * Sets the post excerpt length to 50 characters.
	 *
	 * @since Chameleon 1.0
	 * @return int
	 */
	function Chameleon_excerpt_length( $length ) {
		return 50;
	}
	add_filter( 'excerpt_length', 'Chameleon_excerpt_length' );
	
	/**
	 * Returns a "Continue Reading" link for excerpts
	 *
	 * @since Chameleon 1.0
	 * @return string "Continue Reading" link
	 */
	function Chameleon_continue_reading_link() {
		return '<a href="'. get_permalink() . '">' . __( '<strong>Read more <span class="meta-nav">&raquo;</span></strong>', 'Chameleon' ) . '</a>';
	}
	
	/**
	 * Replaces "[...]" (appended to automatically generated excerpts) with an ellipsis and Chameleon_continue_reading_link().
	 *
	 * @since Chameleon 1.0
	 * @return string An ellipsis
	 */
	function Chameleon_auto_excerpt_more( $more ) {
		return ' &hellip;' . Chameleon_continue_reading_link();
	}
	add_filter( 'excerpt_more', 'Chameleon_auto_excerpt_more' );

	/**
	 * Adds a pretty "Read more" link to custom post excerpts.
	 *
	 * @since Chameleon 1.0
	 * @return string Excerpt with a pretty "Read more" link
	 */
	function Chameleon_custom_excerpt_more( $output ) {
		if ( has_excerpt() && ! is_attachment() ) {
			$output .= Chameleon_continue_reading_link();
		}
		return $output;
	}
	add_filter( 'get_the_excerpt', 'Chameleon_custom_excerpt_more' );
	
if ( ! function_exists( 'Chameleon_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * @since Chameleon 1.0
 */
function Chameleon_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case '' :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<div id="comment-<?php comment_ID(); ?>">
		<div class="comment-author vcard">
			<?php echo get_avatar( $comment, 40 ); ?>
			<?php printf( __( '%s <span class="says">says:</span>', 'Chameleon' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?>
		</div><!-- .comment-author .vcard -->
		<?php if ( $comment->comment_approved == '0' ) : ?>
			<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'Chameleon' ); ?></em>
			<br />
		<?php endif; ?>

		<div class="comment-meta commentmetadata"><a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
			<?php
				/* translators: 1: date, 2: time */
				printf( __( '%1$s at %2$s', 'Chameleon' ), get_comment_date(),  get_comment_time() ); ?></a><?php edit_comment_link( __( '(Edit)', 'Chameleon' ), ' ' );
			?>
		</div><!-- .comment-meta .commentmetadata -->

		<div class="comment-body"><?php comment_text(); ?></div>

		<div class="reply">
			<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
		</div><!-- .reply -->
	</div><!-- #comment-##  -->

	<?php
			break;
		case 'pingback'  :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p><?php _e( 'Pingback:', 'Chameleon' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( '(Edit)', 'Chameleon' ), ' ' ); ?></p>
	<?php
			break;
	endswitch;
}
endif;

	
}
?>