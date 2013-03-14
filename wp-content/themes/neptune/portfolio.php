<?php
	/*
	* @package WordPress
	* @subpackage neptune
	* Template Name: Portfolio
	*/

	// Define plugin's admin variables
	$general_option = get_option('general_option');
	$design_option = get_option('design_option');
	$home_page_option = get_option('home_page_option');
	$portfolio_option = get_option('portfolio_option');

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
	
<div id="content-portfolio-border"></div>
<div id="content-portfolio">
	<div id="page">
		<div id="widecolumn">
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<div class="post" id="post-<?php the_ID(); ?>">
							

					<!-- this isn’t part of the plugin, just a control for demo -->
					<div class="splitter">
						<ul>
							<div id="sort-by">Sort By:</div>
							<li class="segment-1 selected-1">
								<a href="#" data-value="all">Everything</a>
							</li>
							<?php
							$portfolioCategories = $portfolio_option['portfolio_categories'];
							if ($portfolioCategories == "") {$portfolioCategories = 0;} 
							else {$portfolioCategories = $portfolio_option['portfolio_categories'];}
							$e = 1;
							while ($e <= ($portfolioCategories)){
							$cat = $portfolio_option['portfolio_category' . $e];
							$cat = str_replace( ' ', '', $cat );
							?>
								<li class="segment-<?php if ($e==1){echo 0;}else{echo $e;} ?>">
									<a href="#" data-value="<?php echo $cat ?>"><?php echo $portfolio_option['portfolio_category' . $e]; ?></a>
								</li>
							<?php
							$e=$e+1;
							}
							?>
							<div class="Clear"></div>
						</ul>
						<div class="Clear"></div>
					</div>


					<div class="demo">
						<!-- read the documentation to understand what’s going on here -->
						<ul style="height: 591px;" id="list" class="image-grid">
						<?php
						$portfolioItems = $portfolio_option['portfolio_items'];
						if ($portfolioItems == "") {$portfolioItems = 0;} 
						else {$portfolioItems = $portfolio_option['portfolio_items'];}
						$x = 1;
						while ($x <= $portfolioItems){
						$cat = $portfolio_option['portfolio_item' . $x . '_category'];
						$cat = str_replace( ' ', '', $cat );
						?>
							<li data-id="id-<?php echo $x; ?>" class="<?php echo $cat; ?>">
								<div class="box">
									<div class="boximage">
										<?php if ($portfolio_option['portfolio_item' . $x .'_video'] != "") { ?>
										<a href="<?php echo htmlentities($portfolio_option['portfolio_item' . $x .'_video']); ?>" class="top_up" toptions="width = 853, height = 505, type = flashvideo">
										<?php } else {?>
										<a href="<?php echo $portfolio_option['portfolio_item' . $x .'_large_image']; ?>" class="top_up">
										<?php } ?>
										<img src="<?php echo $portfolio_option['portfolio_item' . $x .'_preview_image']; ?>"  />
										</a>
									</div>
									
									<?php if ($portfolio_option['portfolio_item' . $x .'_title'] != "") { ?>
									<div class="boxtitle">
										<?php echo $portfolio_option['portfolio_item' . $x .'_title']; ?>
									</div>
									<?php } ?>
									
									<?php if ($portfolio_option['portfolio_item' . $x .'_description'] != "") { ?>
									<div class="boxdescription">
										<?php echo $portfolio_option['portfolio_item' . $x .'_description']; ?>
									</div>
									<?php } ?>
									
									<?php if ($portfolio_option['portfolio_item' . $x .'_link'] != "") { ?>	
									<div class="boxlink">
										<a href="<?php echo $portfolio_option['portfolio_item' . $x .'_link']; ?>">
											More
										</a> 
									</div>
									<?php } ?>
	
									<div class="Clear"></div>
								</div>
							</li>
						<?php
						$x=$x+1;
						}
						?>
					</div>

					
					<div class="Clear"></div>
			</div>
			<?php endwhile; endif; ?>
			<?php comments_template(); ?>

			<div class="Clear"></div>
		</div> <!-- widecolumn -->
	</div> <!-- page -->
</div> <!-- content-portfolio -->

<?php get_footer(); ?>