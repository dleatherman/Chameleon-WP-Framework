<?php
/**
 * The category template file.
 *
 * @package WordPress
 * @subpackage Chameleon
 * @since Chameleon 1.0
 */

get_header(); ?>
<section class="container">
	<div class="row">
		<div class="eightcol">
		    <h3>Category Archives: <?php single_cat_title('', true); ?></h3>
		    <?php
		        $category_description = category_description();
		        if (!empty($category_description )) {
		            echo $category_description;
		        } ?>
		    
		<?php get_template_part('loop' , 'category'); ?>
		</div><!--.eightcol-->

<?php get_sidebar(); ?>
<?php get_footer(); ?>