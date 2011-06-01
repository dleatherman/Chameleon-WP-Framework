<?php
/**
 * The author template file.
 *
 * @package WordPress
 * @subpackage Chameleon
 * @since Chameleon 1.0
 */

get_header(); ?>
<section class="container">
	<div class="row">
		<div class="eightcol">
			<?php
			/** query the first post to display the author's name and meta
			 * then rewind the loop
			 **/
			if (have_posts()) : the_post();
			?>
			    <div class="author-info clearfix">
			        <h3>Author Archives: <?php the_author(); ?></h3>
			        <div class="author-avatar">
			            <?php echo get_avatar(get_the_author_meta( 'user_email' )); ?>
			        </div><!--avatar-->
			        
			        <div class="author-description">
			            <?php the_author_meta('description'); ?>
			        </div>
			    </div>
			
			<?php
			    endif;
			    rewind_posts();
			?>
			    
			<?php get_template_part('loop' , 'author'); ?>

		</div><!--.eightcol-->

<?php get_sidebar(); ?>
<?php get_footer(); ?>