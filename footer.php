</section><!--.container-->
<footer>
	<section class="container">
		<div class="row">
			<section class="threecol">
				<?php
				// Main footer widget bottom
				if ( ! dynamic_sidebar( 'footer1' ) ) : ?>
				
				<?php endif; ?>
			</section>
			<section class="threecol">
				<?php
				// 2nd footer widget bottom
				if ( ! dynamic_sidebar( 'footer2' ) ) : ?>
					
				<?php endif; ?>
			</section>
			<section class="threecol">
				<?php
				// Main footer widget bottom
				if ( ! dynamic_sidebar( 'footer3' ) ) : ?>
					
				<?php endif; ?>
			</section>
			<section class="threecol last">
				<?php
				// Main footer widget bottom
				if ( ! dynamic_sidebar( 'footer4' ) ) : ?>
					
				<?php endif; ?>
			</section>
		</div>
	</section><!--.container-->
	<section class="container">
		<div class="row">
			<div class="twelvecol last">
				
			</div><!--#copyright-->
		</div>
	</section><!--.container-->
</footer>
<?php wp_print_scripts('jquery'); ?>
<script src="<?php bloginfo('template_url'); ?>/js/js.js"></script>
<?php wp_footer(); ?>
</body>

</html>