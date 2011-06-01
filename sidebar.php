<?php
/**
 * The Sidebar containing the primary and secondary widget areas.
 *
 * @package WordPress
 * @subpackage Chameleon
 * @since Chameleon 1.0
 */
?>
		<div class="fourcol last">
			
			<?php
			// Main sidebar widget top
			if ( ! dynamic_sidebar( 'sidebar_top' ) ) : ?>
				<?php get_search_form(); ?>
			<?php endif; ?>
			<?php
			// Main sidebar widget bottom
			if ( ! dynamic_sidebar( 'sidebar_btm' ) ) : ?>
				
			<?php endif; ?>
		</div><!--.fourcol-->
	</div><!--.row-->