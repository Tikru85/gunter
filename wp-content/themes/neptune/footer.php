<?php
	/**
	* @package WordPress
	* @subpackage neptune
	*/

	// Define plugin's admin variables
	$general_option = get_option('general_option');
	$design_option = get_option('design_option');
	$home_page_option = get_option('home_page_option');
	$portfolio_option = get_option('portfolio_option');
?>
			<!--<img id="content-bottom" src="<?php //echo get_option('siteurl'); ?>/wp-content/themes/<?php //echo get_current_theme() ?>/images/content_bottom.png" /> -->
			
		</div> <!-- wrapper -->
		
		<div id="footer-overlay">
			<div id="footer-container2">
			<div id="footer-container">
				<div id="footer" class="Indent">
					<?php include (TEMPLATEPATH . '/homepage-introboxes.php'); ?>
<!-- contact form start -->					<a href="#" class="footbuttons"><img src="./wp-content/uploads/2013/01/Bheritage.jpg"></a>
					<a href="#" class="footbuttons"><img src="./wp-content/uploads/2013/01/Binstallation.jpg"></a>					<a href="#" class="footbuttons"><img src="./wp-content/uploads/2013/01/Bevents.jpg"></a>					<a href="#" class="footbuttons"><img src="./wp-content/uploads/2013/01/Bshowroom.jpg"></a>					<a href="#" class="footbuttons"><img src="./wp-content/uploads/2013/01/Bprojects.jpg"></a>					<a href="#" class="footbuttons"><img src="./wp-content/uploads/2013/01/Bcontact.jpg"></a>					
<!-- contact form end -->
					<div class="Clear"></div>
				</div>
			</div>
			</div>
			<div id="wrapper-bottom"></div>
		</div>
		
	</div><!-- wrapper-container -->
	<div id="copyright">
		<?php echo $general_option['copyright_text']; ?>
		<a id="top-link" href="#top">Top</a>
	</div>		<div id="quotebutton">		<a href="#" ><img src="./wp-content/uploads/2013/01/Brequestquote.png"></a>	</div>	
</div><!-- container -->

<?php wp_footer(); ?>

<?php echo $general_option['google_analytics']; ?>
</body>
</html>
