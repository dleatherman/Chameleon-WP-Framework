<?php
/**
 * The main template file.
 *
 * @package WordPress
 * @subpackage Chameleon
 * @since Chameleon 1.0
 */

get_header(); ?>
<section class="container">
	<div class="row">
		<div class="eightcol">
			<h3>Tag Archives: <?php single_tag_title('', true); ?></h3>
			    
			<?php get_template_part('loop' , 'tag'); ?>
		</div><!--.eightcol-->

<?php get_sidebar(); ?>
<?php get_footer(); ?>