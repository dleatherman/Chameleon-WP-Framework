<?php
/**
 * The 404 file.
 *
 * @package WordPress
 * @subpackage Chameleon
 * @since Chameleon 1.0
 */

get_header(); ?>
<section class="container">
	<div class="row">
		<div class="eightcol">
		    <h3>404 Not Found</h3>
		    <p>The item you were looking for was not found. Try using the search form below.</p>
		    <p><?php get_search_form(); ?></p>
		</div><!--.eightcol-->

<?php get_sidebar(); ?>
<?php get_footer(); ?>