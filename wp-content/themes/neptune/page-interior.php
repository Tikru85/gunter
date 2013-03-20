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
	<div id="slideshow-main-image">
		<img src="http://placehold.it/900x500" width="900" height="500" />
	</div>
	<div id="slideshow-thumbnail" class="slider">
		<a class="buttons prev" href="#">left</a>
		<div class="viewport">
			<ul class="overview">
				<li><img src="http://placehold.it/200x200" width="200" height="200" /></li>
				<li><img src="http://placehold.it/200x201" width="200" height="200" /></li>
				<li><img src="http://placehold.it/200x202" width="200" height="200" /></li>
				<li><img src="http://placehold.it/200x203" width="200" height="200" /></li>
				<li><img src="http://placehold.it/200x204" width="200" height="200" /></li>
				<li><img src="http://placehold.it/200x205" width="200" height="200" /></li>
			</ul>
		</div>
		<a class="buttons next" href="#">right</a>
	</div>
	<div id="static-thumbnail" class="slider">
		<a class="buttons prev" href="#">left</a>
		<div class="viewport">
			<ul class="overview">
				<li><img src="http://placehold.it/200x200" width="200" height="200" /></li>
				<li><img src="http://placehold.it/200x201" width="200" height="200" /></li>
				<li><img src="http://placehold.it/200x202" width="200" height="200" /></li>
				<li><img src="http://placehold.it/200x203" width="200" height="200" /></li>
				<li><img src="http://placehold.it/200x204" width="200" height="200" /></li>
				<li><img src="http://placehold.it/200x205" width="200" height="200" /></li>
			</ul>
		</div>
		<a class="buttons next" href="#">right</a>
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
	<style>
		.slider { height: 205px; overflow:hidden; }
		.slider .viewport { float: left; width: 600px; height: 205px; overflow: hidden; position: relative; }
		.slider .buttons { display: block; margin: 30px 10px 0 0; float: left; }
		.slider .next { margin: 30px 0 0 10px;  }
		.slider .disable { visibility: hidden; }
		.slider .overview { list-style: none; position: absolute; padding: 0; margin: 0; left: 0; top: 0; }
		.slider .overview li{ float: left; margin: 0 20px 0 0; padding: 1px; height: 121px; border: 1px solid #dcdcdc; width: 200px;}
	</style>
</div> <!-- content -->
<?php get_footer(); ?>