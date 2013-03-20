<?php
/*
 * @package WordPress
 * @subpackage neptune
 * Template Name: Interior Page
 */
?>
<?php wp_enqueue_script('jquery'); ?>
<?php wp_enqueue_script('tinycarousel', get_template_directory_uri() . '/js/jquery.tinycarousel.min.js', array('jquery')); ?>
<?php get_header(); ?>
<div id="content" role="main">
	<div class="interior-page">
		<div id="slideshow-main-image">
			<img src="<?php bloginfo('template_url') ?>/images/Interior-slides/slide-1.jpg"/>
		</div>
		<div class="interior-info">
			<h3>DESCRIPTION</h3>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed enim orci, molestie eget purus. </p>
			<h3>DESIGNER</h3>
			<p>SubZero</p>
			<h3>PRODUCTS</h3>
			<p>Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae.</p>
		</div>
		<div class="clear"></div>
		<div id="slideshow-thumbnail" class="slider" style="margin-left: 40px;">
			<div class="viewport">
				<ul class="overview">
					<li><img src="<?php bloginfo('template_url') ?>/images/Interior-slides/slide-1.jpg"/></li>
					<li><img src="<?php bloginfo('template_url') ?>/images/Interior-slides/slide-2.jpg" /></li>
					<li><img src="<?php bloginfo('template_url') ?>/images/Interior-slides/slide-3.jpg" /></li>
					<li><img src="<?php bloginfo('template_url') ?>/images/Interior-slides/slide-4.jpg" /></li>
					<li><img src="<?php bloginfo('template_url') ?>/images/Interior-slides/slide-5.jpg" /></li>
								<li><img src="<?php bloginfo('template_url') ?>/images/Interior-slides/slide-1.jpg"/></li>
					<li><img src="<?php bloginfo('template_url') ?>/images/Interior-slides/slide-2.jpg" /></li>
					<li><img src="<?php bloginfo('template_url') ?>/images/Interior-slides/slide-3.jpg" /></li>
					<li><img src="<?php bloginfo('template_url') ?>/images/Interior-slides/slide-4.jpg" /></li>
					<li><img src="<?php bloginfo('template_url') ?>/images/Interior-slides/slide-5.jpg" /></li>
				</ul>
			</div>
		</div>

	<div id="static-thumbnail" class="slider">
		<div class="viewport">
			<ul class="overview">
				<li><img src="<?php bloginfo('template_url') ?>/images/Interior-slides/slide-1.jpg"/></li>
				<li><img src="<?php bloginfo('template_url') ?>/images/Interior-slides/slide-2.jpg" /></li>
				<li><img src="<?php bloginfo('template_url') ?>/images/Interior-slides/slide-3.jpg" /></li>
				<li><img src="<?php bloginfo('template_url') ?>/images/Interior-slides/slide-4.jpg" /></li>
			</ul>
		</div>
	</div>
		<div class="clear"></div>
	</div>
	<script>
		jQuery(document).ready(function($) {
			$('.slider').each(function() {
				$(this).tinycarousel({interval:true});
			});
			$('#slideshow-thumbnail li').click(function() {console.debug('clicked');
				$('#slideshow-main-image img').attr('src', $(this).find('img').attr('src'));
			});
		});
	</script>
</div> <!-- content -->
<?php get_footer(); ?>