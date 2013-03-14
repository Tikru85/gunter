<?php
/**
 * @package WordPress
 * @subpackage neptune
 */
/*
Template Name: Archives
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

	<div id="content" role="main">
		<div id="page">
			<div id="widecolumn">
				<h2 class="archives-title">Archives by Month:</h2>
				<ul><?php wp_get_archives('type=monthly'); ?></ul>
				<br /><br />
				<h2 class="archives-title">Archives by Subject:</h2>
				<ul><?php wp_list_categories(); ?></ul>
				<div class="Clear"></div>
			</div> <!-- widecolumn -->
		</div> <!-- page -->
	</div> <!-- content -->


<?php get_footer(); ?>
