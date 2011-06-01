<?php
/**
 * The main search file
 *
 * @package WordPress
 * @subpackage Chameleon
 * @since Chameleon 1.0
 */

get_header(); ?>
<section class="container">
	<div class="row">
		<div class="eightcol">
<?php if ( have_posts() ) : ?>
				<h3 class="page-title"><?php printf( __( 'Search Results for: %s', 'Chameleon' ), '<span>' . get_search_query() . '</span>' ); ?></h3>
				<?php get_template_part( 'loop', 'search' ); ?>
<?php else : ?>
				<article id="post-0" class="post no-results not-found">
					<h2 class="entry-title"><?php _e( 'Nothing Found', 'Chameleon' ); ?></h2>
					<div class="entry-content">
						<p><?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'Chameleon' ); ?></p>
						<?php get_search_form(); ?>
					</div><!-- .entry-content -->
				</article><!-- #post-0 -->
<?php endif; ?>
		</div><!--.eightcol-->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
