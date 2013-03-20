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
	<?php $images = get_images_ids(true); ?>
	<?php if(is_array($images) && !empty($images)) : ?>
		<div class="interior-page">
			<div id="slideshow-main-image">
				<img src="<?php echo wp_get_attachment_url($images[0]); ?>"/>
			</div>
			<div class="interior-info">
				<?php the_content(); ?>
			</div>
			<div class="clear"></div>
			<div id="slideshow-thumbnail" class="slider" style="margin-left: 40px;">
				<div class="viewport">
					<ul class="overview">
						<?php foreach($images as $image) : ?>
							<li><img src="<?php echo wp_get_attachment_url($image); ?>"/></li>
						<?php endforeach; ?>
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
	<?php endif; ?>
</div> <!-- content -->
<?php get_footer(); ?>