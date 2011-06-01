<?php
/**
 *
 * @package WordPress
 * @subpackage Chameleon
 * @since Chameleon 1.0
 */
?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

			<article>

				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<h3 class="article_title"><?php the_title(); ?></h3>
					<p id="the_date">Posted on <?php the_date(); ?></p>
					<?php if ( has_post_thumbnail() ) { ?>
						<aside class="page_article_image">
							<?php the_post_thumbnail('medium'); ?>
						</aside>
					<?php } //endif ?>
					
					<div class="article_content">
						<?php the_content(); ?>
						<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'Chameleon' ), 'after' => '</div>' ) ); ?>
					</div><!-- .article_content -->

					<div class="clear"></div>

					<div class="entry-utility">
						<?php edit_post_link( __( 'Edit', 'Chameleon' ), '<span class="edit-link">', '</span>' ); ?>
					</div><!-- .entry-utility -->
				</div><!-- #post-## -->

				<div id="nav-below" class="navigation">
					<div class="nav-previous"><?php previous_post_link( '%link', '<div class="meta-nav">' . _x( '&larr; ', 'Previous post link', 'Chameleon' ) . '%title</div>', TRUE, get_cat_ID() ); ?></div>
					<div class="nav-next"><?php next_post_link( '%link', '<div class="meta-nav">' . _x( '', 'Next post link', 'Chameleon' ) . '%title &rarr;</div>', TRUE, get_cat_ID() ); ?></div>
				</div><!-- #nav-above -->
				<div class="clear"></div>

				<?php comments_template( '', true ); ?>
			</article>

<?php endwhile; // end of the loop. ?>