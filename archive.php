<?php
/**
 * The archive template file.
 *
 * @package WordPress
 * @subpackage Chameleon
 * @since Chameleon 1.0
 */

get_header(); ?>
<section class="container">
	<div class="row">
		<div class="eightcol">
			<h3 class="page-title">
				<?php if ( is_day() ) : ?>
								<?php printf( __( 'Daily Archives: <span>%s</span>', 'Chameleon' ), get_the_date() ); ?>
				<?php elseif ( is_month() ) : ?>
								<?php printf( __( 'Monthly Archives: <span>%s</span>', 'Chameleon' ), get_the_date( 'F Y' ) ); ?>
				<?php elseif ( is_year() ) : ?>
								<?php printf( __( 'Yearly Archives: <span>%s</span>', 'Chameleon' ), get_the_date( 'Y' ) ); ?>
				<?php else : ?>
								<?php _e( 'Post Archives', 'Chameleon' ); ?>
				<?php endif; ?>
			</h3>
			<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
			
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<h3 class="article_title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
					<?php if ( has_post_thumbnail() ) { ?>
						<aside class="page_article_image">
							<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="thumbnail"><?php the_post_thumbnail('medium'); ?></a>
						</aside>
					<?php } //endif ?>
					<p><?php the_excerpt(); ?></p>
					<p class="clear"><h6><em>Posted on: <?php the_date(); ?></em></h6></p>
				</article>
				<div class="clear"></div>
				
			<?php endwhile; ?>
		</div><!--.eightcol-->

<?php get_sidebar(); ?>
<?php get_footer(); ?>