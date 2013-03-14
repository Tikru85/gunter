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
		<?php $breadcrumbArrow =  "<img class='breadcrumb-arrow' src='" . get_option('siteurl') . "/wp-content/themes/" . get_current_theme() . "/images/breadcrumb_arrow.png' />";
		echo $breadcrumbArrow; ?>
		<div class="breadcrumb-item">
			Search
		</div>
	</div>
	
	
	<div id="page-header-container">
		<div id="page-header">
			<div class="PageTitle">
				<h1>
					<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
					<?php /* If this is a category archive */ if (is_category()) { ?>
					&#8216;<?php single_cat_title(); ?>&#8217; Category
					<?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
					Posts Tagged &#8216;<?php single_tag_title(); ?>&#8217;
					<?php /* If this is a daily archive */ } elseif (is_day()) { ?>
					<?php the_time('F jS, Y'); ?>
					<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
					<?php the_time('F, Y'); ?>
					<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
					<?php the_time('Y'); ?>
					<?php /* If this is an author archive */ } elseif (is_author()) { ?>
					Author Archive
					<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
					Blog Archives
					<?php } ?>
				</h1>
			</div>
		</div>
	</div>

	<div id="content" role="main">
		<div id="page">
			<?php get_sidebar(); ?>
			<div id="narrowcolumn">
			<?php if (have_posts()) : ?>
				<?php while (have_posts()) : the_post(); ?>
					<div class="post" id="post-<?php the_ID(); ?>">
						<div class="blogtitle"><h1><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1></div>
						<div class="postmetadata">Posted in <span class="highlight"><?php the_category(', ') ?></span> on <?php the_time('F jS, Y') ?> <span class="highlight"><?php comments_popup_link('No Comments', '1 Comment', '% Comments'); ?></span></div>
						<div class="excerpt-pic">
							<?php the_post_thumbnail(); ?>
							<?php $postimageurl = get_post_meta($post->ID, 'post-img', true); if ($postimageurl) { ?>
								<a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><img src="<?php echo $postimageurl; ?>" alt="Post Pic" /></a>
							<?php } ?>
						</div>
						<div class="entry">
							<?php the_excerpt(); ?>
						</div> <!-- entry -->
						<div class="readmore">
							<a href="<?php the_permalink(); ?>">More</a>
							<div class="Clear"></div>
						</div>
						<div class="separator-container">
							<div class="separator">
							</div>
						</div>
					</div> <!-- post -->
				<?php endwhile; ?>

				<?php if(function_exists('wp_pagenavi')) {
						wp_pagenavi();
					} else{?>
						<div class="entry-navigation">
							<div class="Left"><?php next_posts_link('&laquo; Older Entries') ?></div>
							<div class="Right"><?php previous_posts_link('Newer Entries &raquo;') ?></div>
							<div class="Clear"></div>
						</div>
				<?php } ?>

				<?php else :

				if ( is_category() ) { // If this is a category archive
					printf("<h2 class='center'>Sorry, but there aren't any posts in the %s category yet.</h2>", single_cat_title('',false));
				} else if ( is_date() ) { // If this is a date archive
					echo("<h2>Sorry, but there aren't any posts with this date.</h2>");
				} else if ( is_author() ) { // If this is a category archive
					$userdata = get_userdatabylogin(get_query_var('author_name'));
					printf("<h2 class='center'>Sorry, but there aren't any posts by %s yet.</h2>", $userdata->display_name);
				} else {
					echo("<h2 class='center'>No posts found.</h2>");
				}
				get_search_form();
			endif;
			?>

			<div class="Clear"></div>
			</div> <!-- narrowcolumn -->
			<div class="Clear"></div>
		</div> <!-- page -->
	</div> <!-- content -->

<?php get_footer(); ?>
