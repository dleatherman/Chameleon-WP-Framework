<?php
/**
 * The loop that displays a page.
 *
 * @package WordPress
 * @subpackage Chameleon
 * @since Chameleon 1.0
 */
?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<?php if ( is_front_page() ) { ?>
						<h3 class="article_title"><?php the_title(); ?></h2>
					<?php } else { ?>
						<h3 class="article_title"><?php the_title(); ?></h3>
					<?php } ?>
					
					<div class="article_content">
						<?php if(has_post_thumbnail()) { ?>
						<aside class="article_featureimg">
							<?php the_post_thumbnail(); ?>
						</aside>
						<?php } ?>
					<?php the_content(); ?>
					
					<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'Chameleon' ), 'after' => '</div>' ) ); ?>
					<?php edit_post_link( __( 'Edit', 'Chameleon' ), '<span class="edit-link">', '</span>' ); ?>
					</div><!-- .entry-content -->
				</article><!-- #post-## -->
				<div class="clear"></div>
<?php endwhile; // end of the loop. ?>