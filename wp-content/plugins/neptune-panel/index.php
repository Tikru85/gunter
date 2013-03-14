<?php

/*
Plugin Name: neptune Admin Panel
Description: a place to set up your theme
Author: Brad Hassett
Author URI: http://www.seoscholar.com/wordpress/neptune
Version: 1.0
*/

add_action('admin_init', 'general_option_init' );
add_action('admin_init', 'design_option_init' );
add_action('admin_init', 'home_page_option_init' );
add_action('admin_init', 'portfolio_option_init' );
add_action('admin_init', 'contact_option_init' );
add_action('admin_menu', 'my_plugin_menu');

// Init plugin options
function general_option_init(){
	register_setting( 'my_plugin_menu_options_general', 'general_option' );
}
function design_option_init(){
	register_setting( 'my_plugin_menu_options_design', 'design_option' );
}
function home_page_option_init(){
	register_setting( 'my_plugin_menu_options_home_page', 'home_page_option' );
}
function portfolio_option_init(){
	register_setting( 'my_plugin_menu_options_portfolio', 'portfolio_option' );
}
function contact_option_init(){
	register_setting( 'my_plugin_menu_options_contact', 'contact_option' );
}

// Add menu pages
function my_plugin_menu() {
  add_menu_page('neptune', 'neptune', 'administrator', 'neptune-admin', 'my_plugin_options_general');
  add_submenu_page('neptune-admin', 'General Options', 'General Options', 'administrator', 'neptune-admin', 'my_plugin_options_general');
  add_submenu_page('neptune-admin', 'Design Options', 'Design Options', 'administrator', 'design', 'my_plugin_options_design');
  add_submenu_page('neptune-admin', 'Home Page Options', 'Home Page Options', 'administrator', 'home-page', 'my_plugin_options_home_page');
  add_submenu_page('neptune-admin', 'Portfolio Options', 'Portfolio Options', 'administrator', 'portfolio-page', 'my_plugin_options_portfolio');
  add_submenu_page('neptune-admin', 'Contact Options', 'Contact Options', 'administrator', 'contact-page', 'my_plugin_options_contact');
}



// Draw the menu page itself
/* ------------------------------------------------------------------ GENERAL OPTIONS ------------------------------------------------------------------*/
function my_plugin_options_general() {
?>

<style>
h1, h2, h3, h4, h5, h6{
margin:0;
padding:0;
text-transform:uppercase;
}
h3{
font-weight:bold;
text-transform:uppercase;
padding-top:30px;
}
p{
padding:0;
margin:0;
color:#0F677F;
}
.odd{
margin: 20px 0 0 0;
background:#f1f1f1;
padding:15px;
border:1px solid #CFCFCF;
}
.even{
margin: 20px 0 0 0;
background:none;
padding:15px;
border:1px solid #CFCFCF;
}
</style>
	<div class="wrap">
		<form method="post" action="options.php">
			<?php	function is_odd($num) {if ($num % 2 == 0) {return false;} else {return true;}} ?>
			<?php settings_fields('my_plugin_menu_options_general'); ?>
			<?php $general_option = get_option('general_option'); ?>
			<h1>Theme Admin Panel</h1>
			--------------------------------------------------------------------------------------------------------<br />
			<h2>General Options</h2>

		<?php $ppp++;  if(is_odd($ppp)) {echo "<div class='odd'>";} else{echo "<div class='even'>";} ?>
			<h4>Logo Image Path</h4>
			<p>(example: http://www.example.com/wp-content/uploads/2010/01/logo.png)</p>
			<input type="text" name="general_option[logo_path]" value="<?php echo $general_option['logo_path']; ?>" />
		</div>
		
		<?php $ppp++;  if(is_odd($ppp)) {echo "<div class='odd'>";} else{echo "<div class='even'>";} ?>
			<h4>Use Phone Number?</h4>
			<select name="general_option[use_phone]">
				<option value="yes" <?php if ($general_option['use_phone'] == "yes"){echo "SELECTED";} ?>>Yes</option>
				<option value="no" <?php if ($general_option['use_phone'] == "no"){echo "SELECTED";} ?>>No</option>
			</select>
		</div>
		
		<?php $ppp++;  if(is_odd($ppp)) {echo "<div class='odd'>";} else{echo "<div class='even'>";} ?>
			<h4>Phone Number</h4>
			<input type="text" name="general_option[phone_number]" value="<?php echo $general_option['phone_number']; ?>" />
		</div>
		
		<?php $ppp++;  if(is_odd($ppp)) {echo "<div class='odd'>";} else{echo "<div class='even'>";} ?>
			<h4>Blog Title</h4>
			<input type="text" name="general_option[blog_title]" value="<?php echo $general_option['blog_title']; ?>" />
		</div>
		
		<?php $ppp++;  if(is_odd($ppp)) {echo "<div class='odd'>";} else{echo "<div class='even'>";} ?>
			<h4>Blog SubTitle</h4>
			<input type="text" name="general_option[blog_subtitle]" value="<?php echo $general_option['blog_subtitle']; ?>" />
		</div>
		
		<?php $ppp++;  if(is_odd($ppp)) {echo "<div class='odd'>";} else{echo "<div class='even'>";} ?>
			<h4>Intro Box One - Type</h4>
			<p>You MUST save immediately after changing this option!!!</p>
			<select name="general_option[footer_one_intro_box_type]">
				<option value=" " <?php if ($general_option['footer_one_intro_box_type'] == " "){echo "SELECTED";} ?>> </option>
				<option value="text-box" <?php if ($general_option['footer_one_intro_box_type'] == "text-box"){echo "SELECTED";} ?>>Text Box</option>
				<option value="categories" <?php if ($general_option['footer_one_intro_box_type'] == "categories"){echo "SELECTED";} ?>>Categories</option>
				<option value="recent-posts" <?php if ($general_option['footer_one_intro_box_type'] == "recent-posts"){echo "SELECTED";} ?>>Recent Posts</option>
				<option value="blogroll" <?php if ($general_option['footer_one_intro_box_type'] == "blogroll"){echo "SELECTED";} ?>>Blogroll</option>
				<option value="archives" <?php if ($general_option['footer_one_intro_box_type'] == "archives"){echo "SELECTED";} ?>>Archives</option>
				<option value="meta" <?php if ($general_option['footer_one_intro_box_type'] == "meta"){echo "SELECTED";} ?>>Meta</option>
			</select>

				<?php if ($general_option['footer_one_intro_box_type'] == "text-box") { ?>
					<h4>one Intro Box - Title</h4>
					<input type="text" name="general_option[footer_one_intro_box_title]" style="width:400px" value="<?php echo $general_option['footer_one_intro_box_title']; ?>" />
					<h4>one Intro Box - Text</h4>
					<textarea type="text" cols="50" rows="5" name="general_option[footer_one_intro_box_text]"><?php echo $general_option['footer_one_intro_box_text']; ?></textarea>
				<?php } ?>
		</div>

		<?php $ppp++;  if(is_odd($ppp)) {echo "<div class='odd'>";} else{echo "<div class='even'>";} ?>
			<h4>Intro Box Two - Type</h4>
			<p>You MUST save immediately after changing this option!!!</p>
			<select name="general_option[footer_two_intro_box_type]">
				<option value=" " <?php if ($general_option['footer_two_intro_box_type'] == " "){echo "SELECTED";} ?>> </option>
				<option value="text-box" <?php if ($general_option['footer_two_intro_box_type'] == "text-box"){echo "SELECTED";} ?>>Text Box</option>
				<option value="categories" <?php if ($general_option['footer_two_intro_box_type'] == "categories"){echo "SELECTED";} ?>>Categories</option>
				<option value="recent-posts" <?php if ($general_option['footer_two_intro_box_type'] == "recent-posts"){echo "SELECTED";} ?>>Recent Posts</option>
				<option value="blogroll" <?php if ($general_option['footer_two_intro_box_type'] == "blogroll"){echo "SELECTED";} ?>>Blogroll</option>
				<option value="archives" <?php if ($general_option['footer_two_intro_box_type'] == "archives"){echo "SELECTED";} ?>>Archives</option>
				<option value="meta" <?php if ($general_option['footer_two_intro_box_type'] == "meta"){echo "SELECTED";} ?>>Meta</option>
			</select>

				<?php if ($general_option['footer_two_intro_box_type'] == "text-box") { ?>
					<h4>two Intro Box - Title</h4>
					<input type="text" name="general_option[footer_two_intro_box_title]" style="width:400px" value="<?php echo $general_option['footer_two_intro_box_title']; ?>" />
					<h4>two Intro Box - Text</h4>
					<textarea type="text" cols="50" rows="5" name="general_option[footer_two_intro_box_text]"><?php echo $general_option['footer_two_intro_box_text']; ?></textarea>
				<?php } ?>
		</div>

		<?php $ppp++;  if(is_odd($ppp)) {echo "<div class='odd'>";} else{echo "<div class='even'>";} ?>
			<h4>Intro Box Three - Type</h4>
			<p>You MUST save immediately after changing this option!!!</p>
			<select name="general_option[footer_three_intro_box_type]">
				<option value=" " <?php if ($general_option['footer_three_intro_box_type'] == " "){echo "SELECTED";} ?>> </option>
				<option value="text-box" <?php if ($general_option['footer_three_intro_box_type'] == "text-box"){echo "SELECTED";} ?>>Text Box</option>
				<option value="categories" <?php if ($general_option['footer_three_intro_box_type'] == "categories"){echo "SELECTED";} ?>>Categories</option>
				<option value="recent-posts" <?php if ($general_option['footer_three_intro_box_type'] == "recent-posts"){echo "SELECTED";} ?>>Recent Posts</option>
				<option value="blogroll" <?php if ($general_option['footer_three_intro_box_type'] == "blogroll"){echo "SELECTED";} ?>>Blogroll</option>
				<option value="archives" <?php if ($general_option['footer_three_intro_box_type'] == "archives"){echo "SELECTED";} ?>>Archives</option>
				<option value="meta" <?php if ($general_option['footer_three_intro_box_type'] == "meta"){echo "SELECTED";} ?>>Meta</option>
			</select>

				<?php if ($general_option['footer_three_intro_box_type'] == "text-box") { ?>
					<h4>three Intro Box - Title</h4>
					<input type="text" name="general_option[footer_three_intro_box_title]" style="width:400px" value="<?php echo $general_option['footer_three_intro_box_title']; ?>" />
					<h4>three Intro Box - Text</h4>
					<textarea type="text" cols="50" rows="5" name="general_option[footer_three_intro_box_text]"><?php echo $general_option['footer_three_intro_box_text']; ?></textarea>
				<?php } ?>
		</div>

		<?php $ppp++;  if(is_odd($ppp)) {echo "<div class='odd'>";} else{echo "<div class='even'>";} ?>
			<h4>Intro Box Four - Type</h4>
			<p>You MUST save immediately after changing this option!!!</p>
			<select name="general_option[footer_four_intro_box_type]">
				<option value=" " <?php if ($general_option['footer_four_intro_box_type'] == " "){echo "SELECTED";} ?>> </option>
				<option value="text-box" <?php if ($general_option['footer_four_intro_box_type'] == "text-box"){echo "SELECTED";} ?>>Text Box</option>
				<option value="categories" <?php if ($general_option['footer_four_intro_box_type'] == "categories"){echo "SELECTED";} ?>>Categories</option>
				<option value="recent-posts" <?php if ($general_option['footer_four_intro_box_type'] == "recent-posts"){echo "SELECTED";} ?>>Recent Posts</option>
				<option value="blogroll" <?php if ($general_option['footer_four_intro_box_type'] == "blogroll"){echo "SELECTED";} ?>>Blogroll</option>
				<option value="archives" <?php if ($general_option['footer_four_intro_box_type'] == "archives"){echo "SELECTED";} ?>>Archives</option>
				<option value="meta" <?php if ($general_option['footer_four_intro_box_type'] == "meta"){echo "SELECTED";} ?>>Meta</option>
			</select>

				<?php if ($general_option['footer_four_intro_box_type'] == "text-box") { ?>
					<h4>four Intro Box - Title</h4>
					<input type="text" name="general_option[footer_four_intro_box_title]" style="width:400px" value="<?php echo $general_option['footer_four_intro_box_title']; ?>" />
					<h4>four Intro Box - Text</h4>
					<textarea type="text" cols="50" rows="5" name="general_option[footer_four_intro_box_text]"><?php echo $general_option['footer_four_intro_box_text']; ?></textarea>
				<?php } ?>
		</div>

		<?php $ppp++;  if(is_odd($ppp)) {echo "<div class='odd'>";} else{echo "<div class='even'>";} ?>
			<h4>Google Analytics Tracking Code (Optional)</h4>
			<textarea type="text" cols="50" rows="5" name="general_option[google_analytics]"><?php echo $general_option['google_analytics']; ?></textarea>
		</div>
		
		<?php $ppp++;  if(is_odd($ppp)) {echo "<div class='odd'>";} else{echo "<div class='even'>";} ?>
			<h4>Footer Copyright Text</h4>
			<textarea type="text" cols="50" rows="5" name="general_option[copyright_text]"><?php echo $general_option['copyright_text']; ?></textarea>
		</div>

			<p class="submit">
			<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
			</p>
		</form>
	</div>
<?php
}
/* ------------------------------------------------------------------ DESIGN OPTIONS ------------------------------------------------------------------*/
function my_plugin_options_design() {
?>

<style>
h1, h2, h3, h4, h5, h6{
margin:0;
padding:0;
text-transform:uppercase;
}
h3{
font-weight:bold;
text-transform:uppercase;
padding-top:30px;
}
p{
padding:0;
margin:0;
color:#0F677F;
}
.odd{
margin: 20px 0 0 0;
background:#f1f1f1;
padding:15px;
border:1px solid #CFCFCF;
}
.even{
margin: 20px 0 0 0;
background:none;
padding:15px;
border:1px solid #CFCFCF;
}
</style>
	<div class="wrap">
		<form method="post" action="options.php">
			<?php function is_odd($num) {if ($num % 2 == 0) {return false;} else {return true;}} ?>
			<?php settings_fields('my_plugin_menu_options_design'); ?>
			<?php $design_option = get_option('design_option'); ?>
			<h1>Theme Admin Panel</h1>
			--------------------------------------------------------------------------------------------------------<br />
			<h2>Design Options</h2>

		<?php $ppp++;  if(is_odd($ppp)) {echo "<div class='odd'>";} else{echo "<div class='even'>";} ?>
			<h4>Theme Color</h4>
			<select name="design_option[theme_color]">
				<option value="black" <?php if ($design_option['theme_color'] == "black"){echo "SELECTED";} ?>>black</option>
				<option value="brown" <?php if ($design_option['theme_color'] == "brown"){echo "SELECTED";} ?>>brown</option>
				<option value="tan" <?php if ($design_option['theme_color'] == "tan"){echo "SELECTED";} ?>>tan</option>
				<option value="blue" <?php if ($design_option['theme_color'] == "blue"){echo "SELECTED";} ?>>blue</option>
				<option value="bluegreen" <?php if ($design_option['theme_color'] == "bluegreen"){echo "SELECTED";} ?>>blue green</option>
				<option value="green" <?php if ($design_option['theme_color'] == "green"){echo "SELECTED";} ?>>green</option>
				<option value="purple" <?php if ($design_option['theme_color'] == "purple"){echo "SELECTED";} ?>>purple</option>
				<option value="pink" <?php if ($design_option['theme_color'] == "pink"){echo "SELECTED";} ?>>pink</option>
				<option value="red" <?php if ($design_option['theme_color'] == "red"){echo "SELECTED";} ?>>red</option>
				<option value="orange" <?php if ($design_option['theme_color'] == "orange"){echo "SELECTED";} ?>>orange</option>
			</select>
		</div>

		<?php $ppp++;  if(is_odd($ppp)) {echo "<div class='odd'>";} else{echo "<div class='even'>";} ?>
			<h4>Banner Style</h4>
			<select name="design_option[banner]">
				<option value="1" <?php if ($design_option['banner'] == "1"){echo "SELECTED";} ?>>Banner 1</option>
				<option value="2" <?php if ($design_option['banner'] == "2"){echo "SELECTED";} ?>>Banner 2</option>
				<option value="3" <?php if ($design_option['banner'] == "3"){echo "SELECTED";} ?>>Banner 3</option>
			</select>
		</div>
			
		<?php $ppp++;  if(is_odd($ppp)) {echo "<div class='odd'>";} else{echo "<div class='even'>";} ?>
			<h4>Pick Any Solid Background Color (optional)</h4>
			<p>use the six letters in the hex code - this will override the pattern background associated with each theme</p>
			<input type="text" name="design_option[background_color]" value="<?php echo $design_option['background_color']; ?>" />
		</div>			
			

			<p class="submit">
			<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
			</p>
		</form>
	</div>
<?php
}
/* ------------------------------------------------------------------ HOME PAGE OPTIONS ------------------------------------------------------------------*/
function my_plugin_options_home_page() {
?>

<style>
h1, h2, h3, h4, h5, h6{
margin:0;
padding:0;
text-transform:uppercase;
}
h3{
font-weight:bold;
text-transform:uppercase;
padding-top:30px;
}
p{
padding:0;
margin:0;
color:#0F677F;
}
.odd{
margin: 20px 0 0 0;
background:#f1f1f1;
padding:15px;
border:1px solid #CFCFCF;
}
.even{
margin: 20px 0 0 0;
background:none;
padding:15px;
border:1px solid #CFCFCF;
}
</style>
	<div class="wrap">
		<form method="post" action="options.php">
			<?php	function is_odd($num) {if ($num % 2 == 0) {return false;} else {return true;}} ?>
			<?php settings_fields('my_plugin_menu_options_home_page'); ?>
			<?php $home_page_option = get_option('home_page_option'); ?>
			<h1>Theme Admin Panel</h1>
			--------------------------------------------------------------------------------------------------------<br />
			<h2>Home Page Options</h2>

		<?php $ppp++;  if(is_odd($ppp)) {echo "<div class='odd'>";} else{echo "<div class='even'>";} ?>
			<h4>Header Rotating Images (if this is off it will just show the first image below)</h4>
			<select name="home_page_option[header_on_off]">
				<option value="on" <?php if ($home_page_option['header_on_off'] == "on"){echo "SELECTED";} ?>>On</option>
				<option value="off" <?php if ($home_page_option['header_on_off'] == "off"){echo "SELECTED";} ?>>Off</option>
			</select>
		</div>

		<?php $ppp++;  if(is_odd($ppp)) {echo "<div class='odd'>";} else{echo "<div class='even'>";} ?>
			<h4>Number of Header Images</h4>
			<p>You MUST save immediately after changing this option!!!</p>
			<input type="text" name="home_page_option[number_of_header_images]" value="<?php echo $home_page_option['number_of_header_images']; ?>" />
		</div>

			<?php
			$number_of_header_images = $home_page_option['number_of_header_images'];
			if ($number_of_header_images == "") {$number_of_header_images = 3;}
			else {$number_of_header_images = $home_page_option['number_of_header_images'];}
			$y = 1;
			while ($y <= $number_of_header_images){
			?>
				<?php $ppp++;  if(is_odd($ppp)) {echo "<div class='odd'>";} else{echo "<div class='even'>";} ?>
					<h4>Header Image <?php echo $y; ?> (919px by 292px)</h4>
					<input type="text" style="width:400px" name="home_page_option[header_image<?php echo $y; ?>]" value="<?php echo $home_page_option['header_image' . $y]; ?>" />

					<h4>Header Image <?php echo $y; ?> Link</h4>
					<p>you must include http://</p>
					<input type="text" style="width:400px" name="home_page_option[header_image<?php echo $y; ?>_link]" value="<?php echo $home_page_option['header_image' . $y . '_link']; ?>" />
					
					<h4>Header Image <?php echo $y; ?> Caption</h4>
					<input type="text" style="width:400px" name="home_page_option[header_image<?php echo $y; ?>_caption]" value="<?php echo $home_page_option['header_image' . $y . '_caption']; ?>" />
				</div>
			<?php
			$y=$y+1;
			}
			?>

		<?php $ppp++;  if(is_odd($ppp)) {echo "<div class='odd'>";} else{echo "<div class='even'>";} ?>
			<h4>Header Rotatation Speed</h4>
			<select name="home_page_option[header_speed_option]">
				<option value="1000" <?php if ($home_page_option['header_speed_option'] == "1000"){echo "SELECTED";} ?>>1 second</option>
				<option value="2000" <?php if ($home_page_option['header_speed_option'] == "2000"){echo "SELECTED";} ?>>2 seconds</option>
				<option value="3000" <?php if ($home_page_option['header_speed_option'] == "3000"){echo "SELECTED";} ?>>3 seconds</option>
				<option value="4000" <?php if ($home_page_option['header_speed_option'] == "4000"){echo "SELECTED";} ?>>4 seconds</option>
				<option value="5000" <?php if ($home_page_option['header_speed_option'] == "5000"){echo "SELECTED";} ?>>5 seconds</option>
				<option value="6000" <?php if ($home_page_option['header_speed_option'] == "6000"){echo "SELECTED";} ?>>6 seconds</option>
				<option value="7000" <?php if ($home_page_option['header_speed_option'] == "7000"){echo "SELECTED";} ?>>7 seconds</option>
				<option value="8000" <?php if ($home_page_option['header_speed_option'] == "8000"){echo "SELECTED";} ?>>8 seconds</option>
				<option value="9000" <?php if ($home_page_option['header_speed_option'] == "9000"){echo "SELECTED";} ?>>9 seconds</option>
			</select>
		</div>
		
		<?php $ppp++;  if(is_odd($ppp)) {echo "<div class='odd'>";} else{echo "<div class='even'>";} ?>
			<h4>Header Effect</h4>
			<select name="home_page_option[header_effect]">
				<option value="random" <?php if ($home_page_option['header_effect'] == "random"){echo "SELECTED";} ?>>random</option>
				<option value="sliceDown" <?php if ($home_page_option['header_effect'] == "sliceDown"){echo "SELECTED";} ?>>sliceDown</option>
				<option value="sliceDownLeft" <?php if ($home_page_option['header_effect'] == "sliceDownLeft"){echo "SELECTED";} ?>>sliceDownLeft</option>
				<option value="sliceUp" <?php if ($home_page_option['header_effect'] == "sliceUp"){echo "SELECTED";} ?>>sliceUp</option>
				<option value="sliceUpLeft" <?php if ($home_page_option['header_effect'] == "sliceUpLeft"){echo "SELECTED";} ?>>sliceUpLeft</option>
				<option value="sliceUpDown" <?php if ($home_page_option['header_effect'] == "sliceUpDown"){echo "SELECTED";} ?>>sliceUpDown</option>
				<option value="sliceUpDownLeft" <?php if ($home_page_option['header_effect'] == "sliceUpDownLeft"){echo "SELECTED";} ?>>sliceUpDownLeft</option>
				<option value="fold" <?php if ($home_page_option['header_effect'] == "fold"){echo "SELECTED";} ?>>fold</option>
				<option value="fade" <?php if ($home_page_option['header_effect'] == "fade"){echo "SELECTED";} ?>>fade</option>
			</select>
		</div>
		
		<?php $ppp++;  if(is_odd($ppp)) {echo "<div class='odd'>";} else{echo "<div class='even'>";} ?>
			<h4>Welcome Message</h4>
			<textarea type="text" cols="50" rows="5" name="home_page_option[welcome_message]"><?php echo htmlspecialchars($home_page_option['welcome_message']); ?></textarea>
		</div>
		
		<?php $ppp++;  if(is_odd($ppp)) {echo "<div class='odd'>";} else{echo "<div class='even'>";} ?>
			<h4>Welcome Button Link Text</h4>
			<input type="text" name="home_page_option[welcome_button_link_text]" value="<?php echo $home_page_option['welcome_button_link_text']; ?>" />
		</div>
		
		<?php $ppp++;  if(is_odd($ppp)) {echo "<div class='odd'>";} else{echo "<div class='even'>";} ?>
			<h4>Welcome Button Link</h4>
			<input type="text" name="home_page_option[welcome_button_link]" value="<?php echo $home_page_option['welcome_button_link']; ?>" />
		</div>

		<?php $i=1; while($i<=3) { ?>
			<?php $ppp++;  if(is_odd($ppp)) {echo "<div class='odd'>";} else{echo "<div class='even'>";} ?>

				<h4>Intro Box <?php echo $i; ?> - Title</h4>
				<input type="text" name="home_page_option[<?php echo $i; ?>_intro_box_title]" style="width:400px" value="<?php echo $home_page_option[$i . '_intro_box_title']; ?>" />
				
				<h4>Intro Box <?php echo $i; ?> - Title Link Path</h4>
				<p>include http://</p>
				<input type="text" name="home_page_option[<?php echo $i; ?>_intro_box_link]" style="width:400px" value="<?php echo $home_page_option[$i . '_intro_box_link']; ?>" />
				
				<h4>Intro Box <?php echo $i; ?> - Icon Path</h4>
				<p>this is the url path to the image</p>
				<input type="text" name="home_page_option[<?php echo $i; ?>_intro_box_icon]" style="width:400px" value="<?php echo $home_page_option[$i . '_intro_box_icon']; ?>" />
				
				<h4>Intro Box <?php echo $i; ?> - Text</h4>
				<textarea type="text" cols="50" rows="5" name="home_page_option[<?php echo $i; ?>_intro_box_text]"><?php echo htmlspecialchars($home_page_option[$i . '_intro_box_text']); ?></textarea>
			
			</div>
		<?php $i++; } ?>

			<p class="submit">
			<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
			</p>
		</form>
	</div>
<?php
}
/* ------------------------------------------------------------------ PORTFOLIO OPTIONS ------------------------------------------------------------------*/
function my_plugin_options_portfolio() {
?>

<style>
h1, h2, h3, h4, h5, h6{
margin:0;
padding:0;
text-transform:uppercase;
}
h3{
font-weight:bold;
text-transform:uppercase;
padding-top:30px;
}
p{
padding:0;
margin:0;
color:#0F677F;
}
.odd{
margin: 20px 0 0 0;
background:#f1f1f1;
padding:15px;
border:1px solid #CFCFCF;
}
.even{
margin: 20px 0 0 0;
background:none;
padding:15px;
border:1px solid #CFCFCF;
}
</style>
	<div class="wrap">
		<form method="post" action="options.php">
			<?php function is_odd($num) {if ($num % 2 == 0) {return false;} else {return true;}} ?>
			<?php settings_fields('my_plugin_menu_options_portfolio'); ?>
			<?php $portfolio_option = get_option('portfolio_option'); ?>
			<h1>Theme Admin Panel</h1>
			--------------------------------------------------------------------------------------------------------<br />
			<h2>Portfolio Page Options</h2>

		<?php $ppp++;  if(is_odd($ppp)) {echo "<div class='odd'>";} else{echo "<div class='even'>";} ?>
			<h4>Number of Porfolio Categories</h4>
			<p>You MUST save immediately after changing this option!!!</p>
			<input type="text" name="portfolio_option[portfolio_categories]" value="<?php echo $portfolio_option['portfolio_categories']; ?>" />
		</div>

			<?php
			$portfolioCategories = $portfolio_option['portfolio_categories'];
			if ($portfolioCategories == "") {
				$portfolioCategories = 0;
			} else {
				$portfolioCategories = $portfolio_option['portfolio_categories'];
			}
			$x = 1;
			while ($x <= $portfolioCategories){
			?>
				<?php $ppp++;  if(is_odd($ppp)) {echo "<div class='odd'>";} else{echo "<div class='even'>";} ?>
				<h4>Porfolio Category <?php echo $x; ?></h4>
				<input type="text" style="width:400px" name="portfolio_option[portfolio_category<?php echo $x; ?>]" value="<?php echo $portfolio_option['portfolio_category' . $x]; ?>" />
				</div>
			<?php
			$x=$x+1;
			}
			?>

		<?php $ppp++;  if(is_odd($ppp)) {echo "<div class='odd'>";} else{echo "<div class='even'>";} ?>
			<h4>Number of Porfolio Items</h4>
			<p>You MUST save immediately after changing this option!!!</p>
			<input type="text" name="portfolio_option[portfolio_items]" value="<?php echo $portfolio_option['portfolio_items']; ?>" />
		</div>

			<?php
			$portfolioItems = $portfolio_option['portfolio_items'];
			if ($portfolioItems == "") {
				$portfolioItems = 0;
			} else {
				$portfolioItems = $portfolio_option['portfolio_items'];
			}
			$x = 1;
			while ($x <= $portfolioItems){
			?>
				<?php $ppp++;  if(is_odd($ppp)) {echo "<div class='odd'>";} else{echo "<div class='even'>";} ?>
				<h4>Porfolio Item <?php echo $x; ?></h4>
				<p>Title</p>
				<input type="text" style="width:400px" name="portfolio_option[portfolio_item<?php echo $x; ?>_title]" value="<?php echo $portfolio_option['portfolio_item' . $x .'_title']; ?>" />
				<p>Preview Image Path (must be 299px wide)</p>
				<input type="text" style="width:400px" name="portfolio_option[portfolio_item<?php echo $x; ?>_preview_image]" value="<?php echo $portfolio_option['portfolio_item' . $x .'_preview_image']; ?>" />
				<p>Large Image Path</p>
				<input type="text" style="width:400px" name="portfolio_option[portfolio_item<?php echo $x; ?>_large_image]" value="<?php echo $portfolio_option['portfolio_item' . $x .'_large_image']; ?>" />
				<p>Youtube Video URL -- (optional)</p>
				<input type="text" style="width:400px" name="portfolio_option[portfolio_item<?php echo $x; ?>_video]" value="<?php echo htmlspecialchars($portfolio_option['portfolio_item' . $x .'_video']); ?>" />
				<p>Link</p>
				<input type="text" style="width:400px" name="portfolio_option[portfolio_item<?php echo $x; ?>_link]" value="<?php echo $portfolio_option['portfolio_item' . $x .'_link']; ?>" />
				<p>Description</p>
				<textarea type="text" cols="50" rows="5" name="portfolio_option[portfolio_item<?php echo $x; ?>_description]"><?php echo htmlspecialchars($portfolio_option['portfolio_item' . $x .'_description']); ?></textarea>
				<p>Portfolio Category (optional) -- You can sort by category on the portfolio page</p>
				<select name="portfolio_option[portfolio_item<?php echo $x; ?>_category]">
					<option value="" <?php if ($portfolio_option['portfolio_item' . $x .'_category'] == ""){echo "SELECTED";} ?>> </option>
					<?php
					$portfolioCategories = $portfolio_option['portfolio_categories'];
					if ($portfolioCategories == "") {$portfolioCategories = 0;}
					else {$portfolioCategories = $portfolio_option['portfolio_categories'];}
					$e = 1;
					while ($e <= $portfolioCategories){
					?>
						<option value="<?php echo $portfolio_option['portfolio_category' . $e]; ?>" <?php if ($portfolio_option['portfolio_item' . $x .'_category'] == $portfolio_option['portfolio_category' . $e]){echo "SELECTED";} ?>><?php echo $portfolio_option['portfolio_category' . $e]; ?></option>
					<?php
					$e=$e+1;
					}
					?>
				</select>
				</div>
			<?php
			$x=$x+1;
			}
			?>


			<p class="submit">
			<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
			</p>
		</form>
	</div>
<?php
}
/* ------------------------------------------------------------------ CONTACT OPTIONS ------------------------------------------------------------------*/
function my_plugin_options_contact() {
?>

<style>
h1, h2, h3, h4, h5, h6{
margin:0;
padding:0;
text-transform:uppercase;
}
h3{
font-weight:bold;
text-transform:uppercase;
padding-top:30px;
}
p{
padding:0;
margin:0;
color:#0F677F;
}
.odd{
margin: 20px 0 0 0;
background:#f1f1f1;
padding:15px;
border:1px solid #CFCFCF;
}
.even{
margin: 20px 0 0 0;
background:none;
padding:15px;
border:1px solid #CFCFCF;
}
</style>
	<div class="wrap">
		<form method="post" action="options.php">
			<?php function is_odd($num) {if ($num % 2 == 0) {return false;} else {return true;}} ?>
			<?php settings_fields('my_plugin_menu_options_contact'); ?>
			<?php $contact_option = get_option('contact_option'); ?>
			<h1>Theme Admin Panel</h1>
			--------------------------------------------------------------------------------------------------------<br />
			<h2>Contact Page Options</h2>

		<?php $ppp++;  if(is_odd($ppp)) {echo "<div class='odd'>";} else{echo "<div class='even'>";} ?>
			<h4>Google Maps Code (Optional - 300px by 300px)</h4>
			<textarea type="text" cols="50" rows="5" name="contact_option[google_maps]"><?php echo $contact_option['google_maps']; ?></textarea>
		</div>

		<?php $ppp++;  if(is_odd($ppp)) {echo "<div class='odd'>";} else{echo "<div class='even'>";} ?>
			<h4>Address (Optional)</h4>
			<input type="text" name="contact_option[contact_address]" value="<?php echo $contact_option['contact_address']; ?>" />
		</div>

		<?php $ppp++;  if(is_odd($ppp)) {echo "<div class='odd'>";} else{echo "<div class='even'>";} ?>
			<h4>Phone (Optional)</h4>
			<input type="text" name="contact_option[contact_phone]" value="<?php echo $contact_option['contact_phone']; ?>" />
		</div>

		<?php $ppp++;  if(is_odd($ppp)) {echo "<div class='odd'>";} else{echo "<div class='even'>";} ?>
			<h4>Fax (Optional)</h4>
			<input type="text" name="contact_option[contact_fax]" value="<?php echo $contact_option['contact_fax']; ?>" />
		</div>

		<?php $ppp++;  if(is_odd($ppp)) {echo "<div class='odd'>";} else{echo "<div class='even'>";} ?>
			<h4>Email (Optional)</h4>
			<input type="text" name="contact_option[contact_email]" value="<?php echo $contact_option['contact_email']; ?>" />
		</div>

			<p class="submit">
			<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
			</p>
		</form>
	</div>
<?php
}
?>