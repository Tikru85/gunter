<?php
/**
 * @package WordPress
 * @subpackage neptune
 */

// Define plugin's admin variables
$general_option = get_option('general_option');

get_header();
?>
	<div id="breadcrumb">
		<div class="breadcrumb-item">
			<a href="<?php bloginfo('home'); ?>"><img id="breadcrumb-home" src="<?php echo get_option('siteurl'); ?>/wp-content/themes/<?php echo get_current_theme() ?>/images/breadcrumb_home.png" /></a>
		</div>
		<?php the_breadcrumb(); ?>
	</div>
	
	<div id="content" role="main">
		<div id="page">
			<?php get_sidebar(); ?>
			<div id="narrowcolumn">
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
						<div class="blogtitle"><h1><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1></div>
						<div class="postmetadata">Posted in <span class="highlight"><?php the_category(', ') ?></span> on <?php the_time('F jS, Y') ?> <span class="highlight"><?php comments_popup_link('No Comments', '1 Comment', '% Comments'); ?></span></div>
						<div class="entry">
							<?php the_content(); ?>
						</div> <!-- entry -->
						<div class="postmetadata-container single">
							<div class="postmetadata single">
								<?php wp_link_pages(array('before' => '<span class="highlight">Pages:</span> ', 'after' => '', 'next_or_number' => 'number')); ?>
								<div id="tags"><?php the_tags( '<span class="highlight">Tags:</span> ', ', ', ''); ?></div>
								<div id="categories"><span class="highlight">Categories:</span> <?php the_category(', ') ?></div>
							</div>
						</div> <!-- postmetadata -->
					</div> <!-- post -->
				<?php comments_template(); ?>
				<?php endwhile; else: ?>
					<p>Sorry, no posts matched your criteria.</p>
				<?php endif; ?>

				<div class="Clear"></div>
			</div> <!-- narrowcolumn -->
			<div class="Clear"></div>
		</div> <!-- page -->
	</div> <!-- content -->

<?php get_footer(); ?>
