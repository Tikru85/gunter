<div class="FooterColumn" id="footer-column1">
	<?php if ($general_option['footer_one_intro_box_type'] == "text-box") { ?>
			<div class="border"><h2><?php echo $general_option['footer_one_intro_box_title']; ?></h2></div>
			<div class="FooterColumnText">
				<?php echo $general_option['footer_one_intro_box_text']; ?>
			</div>
	<?php } else if ($general_option['footer_one_intro_box_type'] == "categories") { ?>
			<ul>
			<?php wp_list_categories('show_count=0&title_li=<div class="border"><h2>Categories</h2></div>&limit=9'); ?>
			</ul>
	<?php } else if ($general_option['footer_one_intro_box_type'] == "recent-posts") { ?>
			<div class="border"><h2>Recent Posts</h2></div>
			<ul>
			<?php wp_get_archives('type=postbypost&limit=6'); ?>
			</ul>
	<?php } else if ($general_option['footer_one_intro_box_type'] == "blogroll") { ?>
			<div class="border"><h2>Links</h2></div>
			<ul>
			<?php wp_list_bookmarks('categorize=0&title_li=&limit=9'); ?>
			</ul>
	<?php } else if ($general_option['footer_one_intro_box_type'] == "archives") { ?>
			<div class="border"><h2>Archives</h2></div>
			<ul>
			<?php wp_get_archives('type=monthly&limit=9'); ?>
			</ul>
	<?php } else if ($general_option['footer_one_intro_box_type'] == "meta") { ?>
			<div class="border"><h2>Meta</h2></div>
			<ul>
			<?php wp_register(); ?>
			<li><?php wp_loginout(); ?></li>
			<?php wp_meta(); ?>
			</ul>
	<?php } ?>
</div>

<div class="FooterColumn" id="footer-column2">
	<?php if ($general_option['footer_two_intro_box_type'] == "text-box") { ?>
			<div class="border"><h2><?php echo $general_option['footer_two_intro_box_title']; ?></h2></div>
			<div class="FooterColumnText">
				<?php echo $general_option['footer_two_intro_box_text']; ?>
			</div>
	<?php } else if ($general_option['footer_two_intro_box_type'] == "categories") { ?>
			<?php wp_list_categories('show_count=0&title_li=<div class="border"><h2>Categories</h2></div>'); ?>
	<?php } else if ($general_option['footer_two_intro_box_type'] == "recent-posts") { ?>
			<div class="border"><h2>Recent Posts</h2></div>
			<ul>
			<?php wp_get_archives('type=postbypost&limit=6'); ?>
			</ul>
	<?php } else if ($general_option['footer_two_intro_box_type'] == "blogroll") { ?>
			<div class="border"><h2>Links</h2></div>
			<ul>
			<?php wp_list_bookmarks('categorize=0&title_li='); ?>
			</ul>
	<?php } else if ($general_option['footer_two_intro_box_type'] == "archives") { ?>
			<div class="border"><h2>Archives</h2></div>
			<ul>
			<?php wp_get_archives('type=monthly'); ?>
			</ul>
	<?php } else if ($general_option['footer_two_intro_box_type'] == "meta") { ?>
			<div class="border"><h2>Meta</h2></div>
			<ul>
			<?php wp_register(); ?>
			<li><?php wp_loginout(); ?></li>
			<?php wp_meta(); ?>
			</ul>
	<?php } ?>
</div>

<div class="FooterColumn" id="footer-column3">
	<?php if ($general_option['footer_three_intro_box_type'] == "text-box") { ?>
			<div class="border"><h2><?php echo $general_option['footer_three_intro_box_title']; ?></h2></div>
			<div class="FooterColumnText">
				<?php echo $general_option['footer_three_intro_box_text']; ?>
			</div>
	<?php } else if ($general_option['footer_three_intro_box_type'] == "categories") { ?>
			<?php wp_list_categories('show_count=0&title_li=<div class="border"><h2>Categories</h2></div>'); ?>
	<?php } else if ($general_option['footer_three_intro_box_type'] == "recent-posts") { ?>
			<div class="border"><h2>Recent Posts</h2></div>
			<ul>
			<?php wp_get_archives('type=postbypost&limit=6'); ?>
			</ul>
	<?php } else if ($general_option['footer_three_intro_box_type'] == "blogroll") { ?>
			<div class="border"><h2>Links</h2></div>
			<ul>
			<?php wp_list_bookmarks('categorize=0&title_li='); ?>
			</ul>
	<?php } else if ($general_option['footer_three_intro_box_type'] == "archives") { ?>
			<div class="border"><h2>Archives</h2></div>
			<ul>
			<?php wp_get_archives('type=monthly'); ?>
			</ul>
	<?php } else if ($general_option['footer_three_intro_box_type'] == "meta") { ?>
			<div class="border"><h2>Meta</h2></div>
			<ul>
			<?php wp_register(); ?>
			<li><?php wp_loginout(); ?></li>
			<?php wp_meta(); ?>
			</ul>
	<?php } ?>
</div>

<div class="FooterColumn" id="footer-column4">
	<?php if ($general_option['footer_four_intro_box_type'] == "text-box") { ?>
			<div class="border"><h2><?php echo $general_option['footer_four_intro_box_title']; ?></h2></div>
			<div class="FooterColumnText">
				<?php echo $general_option['footer_four_intro_box_text']; ?>
			</div>
	<?php } else if ($general_option['footer_four_intro_box_type'] == "categories") { ?>
			<?php wp_list_categories('show_count=0&title_li=<h2>Categories</h2></div>'); ?>
	<?php } else if ($general_option['footer_four_intro_box_type'] == "recent-posts") { ?>
			<div class="border"><h2>Recent Posts</h2></div>
			<ul>
			<?php wp_get_archives('type=postbypost&limit=6'); ?>
			</ul>
	<?php } else if ($general_option['footer_four_intro_box_type'] == "blogroll") { ?>
			<div class="border"><h2>Links</h2></div>
			<ul>
			<?php wp_list_bookmarks('categorize=0&title_li='); ?>
			</ul>
	<?php } else if ($general_option['footer_four_intro_box_type'] == "archives") { ?>
			<div class="border"><h2>Archives</h2></div>
			<ul>
			<?php wp_get_archives('type=monthly'); ?>
			</ul>
	<?php } else if ($general_option['footer_four_intro_box_type'] == "meta") { ?>
			<div class="border"><h2>Meta</h2></div>
			<ul>
			<?php wp_register(); ?>
			<li><?php wp_loginout(); ?></li>
			<?php wp_meta(); ?>
			</ul>
	<?php } ?>
</div>
