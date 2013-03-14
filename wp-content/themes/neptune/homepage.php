<?php
	/**
	 * @package WordPress
	 * @subpackage neptune
	 * Template Name: Home Page
	 */

	get_header();

	// Define plugin's admin variables
	$general_option = get_option('general_option');
	$design_option = get_option('design_option');
	$home_page_option = get_option('home_page_option');
	$portfolio_option = get_option('portfolio_option');
?>
	<div id="nav-border"></div>
	

			<div class="homecontent">				<?php if (have_posts()) :				   while (have_posts()) :					  the_post();					  the_content();				   endwhile;				endif; ?>			</div>
	
<?php get_footer(); ?>