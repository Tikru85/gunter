<?php

####################################
//  SIDEBAR
####################################
if ( function_exists('register_sidebar') )
    register_sidebar();
####################################
//  SIDEBAR END
####################################



####################################
//  JAVASCRIPT FILES
####################################
if ( !is_admin() ) {  // instruction to only load if it is not the admin area

	function init_js_files() {
	    wp_deregister_script( 'jquery' );
	    wp_register_script( 'jquery', get_bloginfo('template_directory') . '/js/jquery-1.4.2.min.js');
	}    
	 
	add_action('init', 'init_js_files');
	
	// register your script location, dependencies and version
	wp_register_script('jquery', get_bloginfo('template_directory') . '/js/jquery-1.4.2.min.js');
	wp_register_script('jquery-coda-slider', get_bloginfo('template_directory') . '/js/jquery.coda-slider-2.0.js');
	wp_register_script('jquery-easing', get_bloginfo('template_directory') . '/js/jquery.easing.1.3.js');
	wp_register_script('jquery-qs', get_bloginfo('template_directory') . '/js/jquery.qs.min.js');
	wp_register_script('jquery-tools', get_bloginfo('template_directory') . '/js/jquery.tools.min.js');
	wp_register_script('jquery-accordion', get_bloginfo('template_directory') . '/js/jquery-ui-1.8.6.accordion.min.js'); // for accordion
	wp_register_script('jquery-nivo-slider', get_bloginfo('template_directory') . '/js/jquery.nivo.slider.pack.js');
	wp_register_script('menu', get_bloginfo('template_directory') . '/js/menu.js');
	wp_register_script('cufon', get_bloginfo('template_directory') . '/js/cufon.js');
	wp_register_script('font-bebas', get_bloginfo('template_directory') . '/fonts/Bebas_400.font.js');
	wp_register_script('font-cicle-semi', get_bloginfo('template_directory') . '/fonts/Cicle_Semi_400.font.js');
	wp_register_script('font-cicle', get_bloginfo('template_directory') . '/fonts/Cicle_300.font.js');
	wp_register_script('top-up', get_bloginfo('template_directory') . '/topup/javascripts/top_up.js');

	// enqueue the script
	wp_enqueue_script('jquery');
	wp_enqueue_script('jquery-coda-slider');
	wp_enqueue_script('jquery-easing');
	wp_enqueue_script('jquery-qs');
	wp_enqueue_script('jquery-tools');
	wp_enqueue_script('jquery-accordion');
	wp_enqueue_script('jquery-nivo-slider');
	wp_enqueue_script('menu');
	wp_enqueue_script('cufon');
	wp_enqueue_script('font-bebas');
	wp_enqueue_script('font-cicle-semi');
	wp_enqueue_script('font-cicle');
	wp_enqueue_script('top-up');
}

####################################
//  JAVASCRIPT FILES END
####################################



####################################
//  THUMBNAILS
####################################
// If we want to ensure that we only call this function if
// the user is working with WP 2.9 or higher,
// let's instead make sure that the function exists first

if ( function_exists('add_theme_support') ) {
	add_theme_support( 'post-thumbnails' );
}
####################################
//  THUMBNAILS END
####################################



####################################
//  MENU
####################################
if ( function_exists('add_theme_support') ) {
	function register_my_menus() {
		register_nav_menus(
			array(
				'header-menu' => __( 'Header Menu' )
			)
		);
	}
	add_action( 'init', 'register_my_menus' );
}
####################################
//  MENU END
####################################



####################################
//  SHORTCODES
####################################
// red
function sc_red($atts, $content = null) {
	return '<div class="red">'.$content.'</div>';
}
add_shortcode("red", "sc_red");

// green
function sc_green($atts, $content = null) {
	return '<div class="green">'.$content.'</div>';
}
add_shortcode("green", "sc_green");

// yellow
function sc_yellow($atts, $content = null) {
	return '<div class="yellow">'.$content.'</div>';
}
add_shortcode("yellow", "sc_yellow");

// blue
function sc_blue($atts, $content = null) {
	return '<div class="blue">'.$content.'</div>';
}
add_shortcode("blue", "sc_blue");

// code
function sc_code($atts, $content = null) {
	return '<pre><xmp class="xmpCustom">'.$content.'</xmp></pre>';
}
add_shortcode("code", "sc_code");

// quote
function sc_quote($atts, $content = null) {
	return '<blockquote><p>'.$content.'</p></blockquote>';
}
add_shortcode("quote", "sc_quote");

// quote left
function sc_quote_left($atts, $content = null) {
	return '<blockquote class="blockquoteLeft"><p>'.$content.'</p></blockquote>';
}
add_shortcode("quoteLeft", "sc_quote_left");

// quote right
function sc_quote_right($atts, $content = null) {
	return '<blockquote class="blockquoteRight"><p>'.$content.'</p></blockquote>';
}
add_shortcode("quoteRight", "sc_quote_right");

// accordion
function sc_accordion($atts, $content = null) {
	return '<div class="accordion">'.$content.'</div>';
}
add_shortcode("accordion", "sc_accordion");

	//accordion header
	function sc_accordionHeader($atts, $content = null) {
		return '<div class="AccordionHeader"><a href="#">'.$content.'</a></div>';
	}
	add_shortcode("accordionHeader", "sc_accordionHeader");
	
// tabs
function sc_tabs($atts, $content = null) {
	return '<div class="tabs">'.$content.'</div>';
}
add_shortcode("tabs", "sc_tabs");
####################################
//  SHORTCODES END
####################################




####################################
//  BREADCRUMB
####################################
function the_breadcrumb() {
	if (!is_home()) {
		$breadcrumbArrow =  "<img class='breadcrumb-arrow' src='" . get_option('siteurl') . "/wp-content/themes/" . get_current_theme() . "/images/breadcrumb_arrow.png' />";
		echo $breadcrumbArrow;
		if (is_category() || is_single()) {
			echo "<div class='breadcrumb-item'>";
			the_category("</div>" . $breadcrumbArrow . "<div class='breadcrumb-item'>");
			echo "</div>";
			if (is_single()) {
				echo $breadcrumbArrow;
				echo "<div class='breadcrumb-item'>";
				the_title();
				echo "</div>";
			}
		} elseif (is_page()) {
			echo "<div class='breadcrumb-item'>";
			echo the_title();
			echo "</div>";
		} elseif( is_tag() ) {
			echo "<div class='breadcrumb-item'>";
			single_tag_title();
			echo "</div>";
		} elseif (is_day()) {
			echo "<div class='breadcrumb-item'>";
			the_time('F jS, Y');
			echo "</div>";
		} elseif (is_month()) {
			echo "<div class='breadcrumb-item'>";
			the_time('F, Y');
			echo "</div>";
		} elseif (is_year()) {
			echo "<div class='breadcrumb-item'>";
			the_time('Y');
			echo "</div>";
		}
	}
}
####################################
//  BREADCRUMB END
####################################




####################################
//  COMMENTS
####################################
function mytheme_comment($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
   <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
     <div id="comment-<?php comment_ID(); ?>" class="comment-body">
	<div class="comment-header">
		<div class="comment-avatar">
			<?php echo get_avatar($comment,$size='30',$default='<path_to_url>' ); ?>
		</div>
		<div class="comment-block-right">
			<div class="comment-author">
				<?php printf(__('<cite class="fn">%s</cite> <span class="says">says:</span>'), get_comment_author_link()) ?>
			</div>
			<div class="comment-meta">
				<a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php printf(__('%1$s at %2$s'), get_comment_date(),  get_comment_time()) ?></a><?php edit_comment_link(__('(Edit)'),'  ','') ?>
			</div>
		</div>
	</div>
	<div class="comment-pending">
		<?php if ($comment->comment_approved == '0') : ?>
			<em><?php _e('Your comment is awaiting moderation.') ?></em>
			<br />
		<?php endif; ?>
	</div>
	<div class="comment-text">
		<?php comment_text() ?>
	</div>
	<div class="comment-reply">
		<?php comment_reply_link(array_merge( $args, array('reply_text' => '<span class="highlight">Reply</span>', 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
	</div>

     </div>
<?php
        }
####################################
//  COMMENTS END
####################################

?>