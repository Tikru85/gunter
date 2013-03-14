<?php
/**
 * @package WordPress
 * @subpackage neptune
 */
?>
	<div id="sidebar" role="complementary">
		<ul>
			<?php 	/* Widgetized sidebar, if you have the plugin installed. */
					if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar() ) : ?>
			

			<?php endif; ?>
		</ul>
	</div>


