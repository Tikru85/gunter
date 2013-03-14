<?php
/**
 * @package WordPress
 * @subpackage neptune
 */

get_header(); 
?>

	<div id="breadcrumb">
		<div class="breadcrumb-item">
			<a href="<?php bloginfo('home'); ?>"><img id="breadcrumb-home" src="<?php echo get_option('siteurl'); ?>/wp-content/themes/<?php echo get_current_theme() ?>/images/breadcrumb_home.png" /></a>
		</div>
		<?php the_breadcrumb(); ?>
	</div>
	
	
	<div id="page-header-container">
		<div id="page-header">
			<div class="PageTitle"><h1><?php the_title(); ?></h1></div>
			<?php $subtitle = get_post_meta($post->ID, 'subtitle', true); if ($subtitle) { ?>
				<div class="SubTitle">
					<h2><?php echo $subtitle; ?></h2>
				</div>
			<?php } ?>
		</div>
	</div>

	<div id="content">
		<div id="page">
			<?php get_sidebar(); ?>
			<div id="narrowcolumn">
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<div class="post" id="post-<?php the_ID(); ?>">
						<div class="entry">
						<?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>
						<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
						</div> <!-- entry -->
					</div> <!-- post -->
				<?php endwhile; endif; ?>
				<br />
				<?php comments_template(); ?>
			<div class="Clear"></div>
			</div> <!-- narrowcolumn -->
			<div class="Clear"></div>
		</div> <!-- page-with-column -->
	</div> <!-- content -->


<?php get_footer(); ?>
