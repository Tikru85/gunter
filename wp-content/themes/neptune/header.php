<?php
	/**
	* @package Wordpress
	* @subpackage neptune
	*/

	// Define plugin's admin variables
	$general_option = get_option('general_option');
	$design_option = get_option('design_option');
	$home_page_option = get_option('home_page_option');
	$portfolio_option = get_option('portfolio_option');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<!-- Meta -->
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>



<!-- Change Theme -->
<?php
$theme = $_GET['theme']; // this is for the demo.  if there is a variable in the url it changes themes
if ($theme != "") {$theme = "?theme=" . $theme;}
?>


<!-- Change Banner -->
<?php
$banner = $_GET['banner']; // this is for the demo.  if there is a variable in the url it changes themes
if ($banner != "") {$banner = "?banner=" . $banner;}
?>

<!-- CSS -->
<link rel="stylesheet" href="<?php echo get_option('siteurl'); ?>/wp-content/themes/<?php echo get_current_theme() ?>/style-jquery-ui-1.8.6.custom.css" type="text/css" />
<link rel="stylesheet" href="<?php echo get_option('siteurl'); ?>/wp-content/themes/<?php echo get_current_theme() ?>/style-prettyPhotoCSS.php" type="text/css" />
<link rel="stylesheet" href="<?php echo get_option('siteurl'); ?>/wp-content/themes/<?php echo get_current_theme() ?>/css/rddm-desktop.css" type="text/css" />
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="all" />
<link rel="stylesheet" href="<?php echo get_option('siteurl'); ?>/wp-content/themes/<?php echo get_current_theme() ?>/style-options.php<?php echo $theme; echo $banner; ?>" type="text/css" media="all" />
<!--[if IE]>
<link rel="stylesheet" href="<?php echo get_option('siteurl'); ?>/wp-content/themes/<?php echo get_current_theme() ?>/style-ie.css" type="text/css" media="all" />
<![endif]-->
<!--[if IE 7]>
<link rel="stylesheet" href="<?php echo get_option('siteurl'); ?>/wp-content/themes/<?php echo get_current_theme() ?>/style-ie7.css" type="text/css" media="all" />
<![endif]-->
 <!--[if (lt IE 8)]>
            <link rel="stylesheet" href="<?php echo get_option('siteurl'); ?>/wp-content/themes/<?php echo get_current_theme() ?>/css/rddm-ie7.css" type="text/css" />
        <![endif]-->
        <!--[if (IE 8)]>
            <link rel="stylesheet" href="<?php echo get_option('siteurl'); ?>/wp-content/themes/<?php echo get_current_theme() ?>/css/rddm-ie8.css" type="text/css" />
        <![endif]-->


        <!-- Scripts -->
        <!--[if lt IE 9]>
        <script type="text/javascript" src="<?php echo get_option('siteurl'); ?>/wp-content/themes/<?php echo get_current_theme() ?>/js/respond.min.js"></script>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <!--[if IE 7]>
        <script type="text/javascript" src="<?php echo get_option('siteurl'); ?>/wp-content/themes/<?php echo get_current_theme() ?>/js/jquery-1.7.2.min.js"></script>
        <script type="text/javascript" src="<?php echo get_option('siteurl'); ?>/wp-content/themes/<?php echo get_current_theme() ?>/js/rddm-ie7.js"></script>
        <![endif]-->


<!-- Javascript Files & Wordpress Stuff -->
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
<?php wp_head(); ?>


<!-- Top Up -->
<script type="text/javascript">
	TopUp.host = "<?php echo get_bloginfo('template_directory'); ?>";
	TopUp.images_path = "/topup/images/top_up/";
	TopUp.players_path = "/topup/players/";
</script>


<!-- Accordion -->
<script type="text/javascript">
	$(function(){
		// Accordion
		$(".accordion").accordion({
			header: ".AccordionHeader",
			autoHeight: false
		});
	});
</script>

<!-- Tabs -->
<script>
	$(function() {
		$( ".tabs" ).tabs();
	});
</script>

<!-- Dialog Box -->
<script>
	$(function() {
		$( ".dialog" ).dialog();
	});
</script>




<!-- QS Javascript -->
<script type="text/javascript">
(function($) {
	$.fn.sorted = function(customOptions) {
		var options = {
			reversed: false,
			by: function(a) {
				return a.text();
			}
		};
		$.extend(options, customOptions);

		$data = $(this);
		arr = $data.get();
		arr.sort(function(a, b) {

			var valA = options.by($(a));
			var valB = options.by($(b));
			if (options.reversed) {
				return (valA < valB) ? 1 : (valA > valB) ? -1 : 0;
			} else {
				return (valA < valB) ? -1 : (valA > valB) ? 1 : 0;
			}
		});
		return $(arr);
	};

})(jQuery);

$(function() {

  var read_button = function(class_names) {
    var r = {
      selected: false,
      type: 0
    };
    for (var i=0; i < class_names.length; i++) {
      if (class_names[i].indexOf('selected-') == 0) {
	r.selected = true;
      }
      if (class_names[i].indexOf('segment-') == 0) {
	r.segment = class_names[i].split('-')[1];
      }
    };
    return r;
  };

  var determine_sort = function($buttons) {
    var $selected = $buttons.parent().filter('[class*="selected-"]');
    return $selected.find('a').attr('data-value');
  };

  var determine_kind = function($buttons) {
    var $selected = $buttons.parent().filter('[class*="selected-"]');
    return $selected.find('a').attr('data-value');
  };

  var $preferences = {
    duration: 800,
    easing: 'easeInOutQuad',
    adjustHeight: false
  };

  var $list = $('#list');
  var $data = $list.clone();

  var $controls = $('.splitter ul');

  $controls.each(function(i) {

    var $control = $(this);
    var $buttons = $control.find('a');

    $buttons.bind('click', function(e) {

      var $button = $(this);
      var $button_container = $button.parent();
      var button_properties = read_button($button_container.attr('class').split(' '));
      var selected = button_properties.selected;
      var button_segment = button_properties.segment;

      if (!selected) {
	$buttons.parent().removeClass('selected-0')<?php $portfolioCategories = $portfolio_option['portfolio_categories']; if ($portfolioCategories == "") {$portfolioCategories = 0;} else {$portfolioCategories = $portfolio_option['portfolio_categories'];} $d = 1; while ($d <= $portfolioCategories){?>.removeClass('selected-<?php echo $d; ?>')<?php $d++; }?>;
	$button_container.addClass('selected-' + button_segment);

	var sorting_type = determine_sort($controls.eq(1).find('a'));
	var sorting_kind = determine_kind($controls.eq(0).find('a'));

	if (sorting_kind == 'all') {
	  var $filtered_data = $data.find('li');
	} else {
	  var $filtered_data = $data.find('li.' + sorting_kind);
	}

	if (sorting_type == 'size') {
	  var $sorted_data = $filtered_data.sorted({
	    by: function(v) {
	      return parseFloat($(v).find('span').text());
	    }
	  });
	} else {
	  var $sorted_data = $filtered_data.sorted({
	    by: function(v) {
	      return $(v).find('strong').text().toLowerCase();
	    }
	  });
	}

	$list.quicksand($sorted_data, $preferences);

      }

      e.preventDefault();
    });

  });

  var high_performance = true;
  var $performance_container = $('#performance-toggle');
  var $original_html = $performance_container.html();

  $performance_container.find('a').live('click', function(e) {
    if (high_performance) {
      $preferences.useScaling = false;
      $performance_container.html('CSS3 scaling turned off. Try the demo again. <a href="#toggle">Reverse</a>.');
      high_performance = false;
    } else {
      $preferences.useScaling = true;
      $performance_container.html($original_html);
      high_performance = true;
    }
    e.preventDefault();
  });
});
</script>


<!-- Cufon -->
<script type="text/javascript">
	Cufon.replace('.header-title', {
	});
	Cufon.replace('#intro-column-container h2', {
		fontFamily: 'Cicle Semi'
	});
	Cufon.replace('#welcome-message-left', {
	});
	Cufon.replace('#welcome-message-right-content', {
		fontFamily: 'Cicle Semi'
	});
	Cufon.replace('a .read-more-text', {
		hover: true
	});
	Cufon.replace('.bottom-item-title', {
	});
	Cufon.replace('.PageTitle h1', {
	});
	Cufon.replace('.SubTitle h2', {
	});
	Cufon.replace('#sidebar h2', {
	});
	Cufon.replace('.blogtitle h1 a', {
	});
	Cufon.replace('h2.archives-title', {
	});
	Cufon.replace('H3#leave-reply', {
	});
	Cufon.replace('.entry-navigation a', {
		fontFamily: 'Cicle Semi'
	});
	Cufon.replace('h3#comments', {
	});
	Cufon.replace('.entry h1', {
	});
	Cufon.replace('.entry h2', {
	});
	Cufon.replace('.entry h3', {
	});
	Cufon.replace('.entry h4', {
	});
	Cufon.replace('.entry h5', {
	});
	Cufon.replace('.entry h6', {
	});
	Cufon.replace('.phone-number', {
		fontFamily: 'Bebas'
	});
	Cufon.replace('.FooterColumn h2', {
		fontFamily: 'Cicle Semi'
	});

</script>


<!-- Nivo Slider -->
<?php if ($home_page_option['header_on_off'] != "off") { ?>
	<script type="text/javascript">
		$(window).load(function() {
			$('#slider').nivoSlider({
				effect:'<?php echo $home_page_option['header_effect']; ?>',
				animSpeed:500, //Slide transition speed
				pauseTime: <?php if ($home_page_option['header_speed_option'] != "") {echo $home_page_option['header_speed_option'];} else {echo "6000";}  ?>
			});
		});
	</script>
<?php } ?>
</head>

<body <?php body_class(); ?>><div id="bgc"><div id="backgroundcontainer"></div></div>
<div id="container">
	<div id="top"></div>
	<div id="header-overlay">
	<div id="header">
		<?php if ($general_option['use_phone'] != "no"){ ?>
		<div id="phone">
			<img id="phone-img" src="<?php echo get_option('siteurl'); ?>/wp-content/themes/<?php echo get_current_theme() ?>/images/phone.png" alt="phone" />
			<div class="phone-number under">
				<?php echo $general_option['phone_number']; ?>
			</div>
			<div class="Clear"></div>
		</div>
		<div class="phone-number overlay">
				<?php echo $general_option['phone_number']; ?>
			</div>
		<?php } ?>
		<div id="logo">
			<a href="<?php echo get_option('home'); ?>/"><img src="<?php echo $general_option['logo_path']; ?>" /></a>
		</div>  <!-- logo -->				<div id="socialbox">			<a href="http://facebook.com/guytgunter" class="socialbuttons"><img src="./wp-content/uploads/2013/01/Bfacebook.jpg" style="border-width:1px; border-color:black; border-style:solid;"></a>			<a href="https://twitter.com/guytgunterappl" class="socialbuttons"><img src="./wp-content/uploads/2013/01/Btwitter.jpg" style="border-width:1px; border-color:black; border-style:solid;"></a>			<a href="http://pinterest.com/guytgunterappl/guy-t-gunter-associates-showroom-atlanta-ga/" class="socialbuttons"><img src="./wp-content/uploads/2013/01/Bpinterest.jpg" style="border-width:1px; border-color:black; border-style:solid;"></a>			<a href="http://www.youtube.com/user/GuyGunterappliances?feature=watch" class="socialbuttons"><img src="./wp-content/uploads/2013/01/Byoutube.jpg" style="border-width:1px; border-color:black; border-style:solid;"></a>			<a href="http://www.guytgunterappliances.com/feed/" class="socialbuttons"><img src="./wp-content/uploads/2013/01/Bblog.jpg" style="border-width:1px; border-color:black; border-style:solid;"></a>		</div>
	</div>  <!-- header -->
	<div id="wrapper-container">
		<div id="navigation">



                            <!-- Responsive Dropdown Menu panel start -->
                            <nav class="rdd-menu">
                                <ul>

                                    <!-- Top level menu item #1 -->
                                    <li class="active"><span>Home</span></li>


                                    <!-- Top level menu item #2 (with submenu): start -->
                                    <li class="parent" id="Showroom">
                                       <a href="http://catalystcircle.com/gunter2/?page_id=4537">Showroom</a>
                                        <!-- Dropdown submenu panel start -->
                                        <section class="submenu-panel">

											<div class="colgroup col">
												<div>
												<img src="<?php bloginfo('template_url') ?>/images/demo-1.gif" alt=""/>
												<a href="#">Link</a>
												</div>
												<div>
												<img src="<?php bloginfo('template_url') ?>/images/demo-1.gif" alt=""/>
												<a href="#">Link</a>
												</div>
												<div>
												<img src="<?php bloginfo('template_url') ?>/images/demo-1.gif" alt=""/>
												<a href="#">Link</a>
												</div>
												<div>
												<img src="<?php bloginfo('template_url') ?>/images/demo-1.gif" alt=""/>
												<a href="#">Link</a>
												</div>

											</div>


                                        </section>
                                        <!-- Dropdown submenu panel end -->

                                    </li>
                                    <!-- Top level menu item #2 (with submenu): end -->


                                    <!-- Top level menu item #3 (with submenu): start -->
                                    <li class="parent" id="Manufacturers">
                                        <a href="http://catalystcircle.com/gunter2/?page_id=26">Manufacturers</a>


                                        <!-- Dropdown submenu panel start -->
                                        <section class="submenu-panel">

                                        <div class="colgroup col">
												<div>
												<img src="<?php bloginfo('template_url') ?>/images/demo-1.gif" alt=""/>
												<a href="#">Link</a>
												</div>
												<div>
												<img src="<?php bloginfo('template_url') ?>/images/demo-1.gif" alt=""/>
												<a href="#">Link</a>
												</div>
												<div>
												<img src="<?php bloginfo('template_url') ?>/images/demo-1.gif" alt=""/>
												<a href="#">Link</a>
												</div>
												<div>
												<img src="<?php bloginfo('template_url') ?>/images/demo-1.gif" alt=""/>
												<a href="#">Link</a>
												</div>
											<div>
												<img src="<?php bloginfo('template_url') ?>/images/demo-1.gif" alt=""/>
												<a href="#">Link</a>
												</div>
												<div>
												<img src="<?php bloginfo('template_url') ?>/images/demo-1.gif" alt=""/>
												<a href="#">Link</a>
												</div>
												<div>
												<img src="<?php bloginfo('template_url') ?>/images/demo-1.gif" alt=""/>
												<a href="#">Link</a>
												</div>
												<div>
												<img src="<?php bloginfo('template_url') ?>/images/demo-1.gif" alt=""/>
												<a href="#">Link</a>
												</div>

											</div>


                                        </section>
                                        <!-- Dropdown submenu panel end -->

                                    </li>
                                    <!-- Top level menu item #3 (with submenu): end -->

									   <!-- Top level menu item #3 (with submenu): start -->
                                    <li class="parent" id="Manufacturers">
                                       <a href="#">Videos</a>


                                    </li>
                                    <!-- Top level menu item #3 (with submenu): end -->



                                    <!-- Top level menu item #4 (with submenu): start -->
                                    <li class="parent" id="Projects">
                                        <a href="http://catalystcircle.com/gunter2/?cat=12">Projects</a>



                                    </li>
                                    <!-- Top level menu item #4 (with submenu): end -->

                                    <!-- Top level menu item #5 (with submenu): start -->
                                    <li class="parent" id="Shop">
                                        <a href="http://catalystcircle.com/gunter2/?page_id=1882">Shop</a>



                                    </li>
									 <li class="parent" id="Contact">
                                       <a href="http://catalystcircle.com/gunter2/?page_id=1814">Contact</a>


                                    </li>


                                    <!-- Top level menu item #5 (with submenu): end -->

                                </ul>
                            </nav>



			<?php //get_search_form();  ?>
			<div class="Clear"></div>
		</div>  <!-- navigation -->
		<div id="wrapper">

</ul>