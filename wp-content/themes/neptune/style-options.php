<?php
	require ("../../../wp-config.php");
	header ("Content-type: text/css");

	// Define plugin's admin variables
	$general_option = get_option('general_option');
	$design_option = get_option('design_option');
	$home_page_option = get_option('home_page_option');
	$portfolio_option = get_option('portfolio_option');

	//define variable
	$theme = $_GET['theme'];
	if ($theme != "") {$design_option['theme_color'] = $theme;}

	$banner = $_GET['banner'];
	if ($banner != "") {$design_option['banner'] = $banner;}
?>

/*
Theme Name: neptune
*/

/************************************************************************
#  BANNER
*************************************************************************/
<?php if ($design_option['banner'] == "3"){ ?>
#banner-shadow{
	background:none;
	height:368px;
	position:relative;
	top:20px;
	margin:0 auto;
	width:979px;

}
<?php } elseif ($design_option['banner'] == "2"){ ?>
#banner-shadow{
	background: url(images/shadow_fold.png) bottom center no-repeat;
	height:388px;
	position:relative;
	top:20px;
	margin:0 auto;
	width:979px;
}
<?php } else{ ?>
#banner-shadow{
	background: url(images/shadow.png) bottom center no-repeat;
	height:402px;
	position:relative;
	top:20px;
	margin:0 auto;
	width:979px;
}
#banner-container1{
	box-shadow: 0px 0px 6px #666;
	-webkit-box-shadow:  0px 0px 6px #666;
	-moz-box-shadow: 0px 0px 6px #666;
}
<?php } ?>
/************************************************************************
#  END BANNER
*************************************************************************/

/************************************************************************
#  BACKGROUNDS
*************************************************************************/
body{
	background: url('images/<?php echo $design_option['theme_color']; ?>/bg.png');
}

<?php if ($design_option['background_color'] != "") { ?>
body{
	background: #<?php echo $design_option['background_color']; ?>
}
<?php }else{ ?>
body{
	background: url('images/<?php echo $design_option['theme_color']; ?>/bg.png');
}
<?php } ?>

#container #wrapper-container #wrapper-top{
	background: url('images/<?php echo $design_option['theme_color']; ?>/bg_top.png');
}

#navigation{
	
}

#navigation #nav-left{
	background: url('images/<?php echo $design_option['theme_color']; ?>/nav_left.png') bottom no-repeat;
}
#navigation #nav-right{
	background: url('images/<?php echo $design_option['theme_color']; ?>/nav_right.png') bottom no-repeat;
}
#navigation #nav-middle{
	background: url('images/<?php echo $design_option['theme_color']; ?>/nav_middle.png') bottom repeat-x;
}
#navigation ul li ul {
	<?php if ($design_option['theme_color'] == "blue"){ ?>background: url(images/nav_dropdown.png) #1D2D41; border:none; border-top:none;<?php }
	elseif ($design_option['theme_color'] == "bluegreen"){ ?>background: url(images/nav_dropdown.png) #1D3741; border:none; border-top:none;<?php }
	elseif ($design_option['theme_color'] == "green"){ ?>background: url(images/nav_dropdown.png) #1E4030; border:none; border-top:none;<?php }
	elseif ($design_option['theme_color'] == "orange"){ ?>background: url(images/nav_dropdown.png) #42311C; border:none; border-top:none;<?php }
	elseif ($design_option['theme_color'] == "red"){ ?>background: url(images/nav_dropdown.png) #40211E; border:none; border-top:none;<?php }
	elseif ($design_option['theme_color'] == "brown"){ ?>background: url(images/nav_dropdown.png) #3C3822; border:none; border-top:none;<?php }
	elseif ($design_option['theme_color'] == "purple"){ ?>background: url(images/nav_dropdown.png) #36223C; border:none; border-top:none;<?php }
	elseif ($design_option['theme_color'] == "pink"){ ?>background: url(images/nav_dropdown.png) #782D41; border:none; border-top:none;<?php }
	elseif ($design_option['theme_color'] == "tan"){ ?>background: url(images/nav_dropdown.png) #6A623A; border:none; border-top:none;<?php }
	else{ ?>background: url(images/nav_dropdown.png) #2C2E32; <?php } ?>
}

#copyright{
	<?php if ($design_option['theme_color'] == "tan"){ ?>color:#eee;<?php } ?>

}
	#copyright #top-link{
		<?php if ($design_option['theme_color'] == "tan"){ ?>color:#eee;<?php } ?>
	}
/************************************************************************
#  END BACKGROUNDS
*************************************************************************/


/************************************************************************
#  MATH
*************************************************************************/
.nivo-controlNav{
left: <?php echo ((919-($home_page_option['number_of_header_images']*26)-5)/2); ?>px;
}
/************************************************************************
#  WHITE THEME END
*************************************************************************/
<?php if ($design_option['theme_color'] == "white") { ?>
<?php } ?>