<?php
/**
 * @package WordPress
 * @subpackage neptune
 * Template Name: Contact
 */

// Define plugin's admin variables
	$general_option = get_option('general_option');
	$design_option = get_option('design_option');
	$home_page_option = get_option('home_page_option');
	$portfolio_option = get_option('portfolio_option');
	$contact_option = get_option('contact_option');

get_header(); ?>
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

				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<div class="post" id="post-<?php the_ID(); ?>">
					<div id="contact">
						<div id="contact-right">
							<div id="contact-info">
								<?php if ($contact_option['contact_address'] != ""){ ?>
								<div class="label">Address:</div><div class="contantInfoItem"><?php echo $contact_option['contact_address']; ?></div>
								<?php } ?>
								<?php if ($contact_option['contact_phone'] != ""){ ?>
								<div class="label">Phone:</div><div class="contantInfoItem"><?php echo $contact_option['contact_phone']; ?></div>
								<?php } ?>
								<?php if ($contact_option['contact_fax'] != ""){ ?>
								<div class="label">Fax:</div><div class="contantInfoItem"><?php echo $contact_option['contact_fax']; ?></div>
								<?php } ?>
								<?php if ($contact_option['contact_email'] != ""){ ?>
								<div class="label">Email:</div><div class="contantInfoItem"><?php echo $contact_option['contact_email']; ?></div>
								<?php } ?>
								<div class="Clear"></div>
							</div>
							<?php if ($contact_option['contact_address'] != "" || $contact_option['contact_phone'] != "" || $contact_option['contact_fax'] != "" || $contact_option['contact_email'] != "" && $contact_option['google_maps'] != ""){ ?>
							<br />
							<?php } ?>
							<?php if ($contact_option['google_maps'] != ""){ ?>
							<div id="google-map">
								<?php echo $contact_option['google_maps']; ?>
							</div>
							<?php } ?>
						</div> <!-- contact-right -->
						<div id="contact-left">
							<div class="entry">
								<?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>
							</div>
							<div id="respond">
							<?php
								$contactsubmitted = $_POST['contactsubmitted'];
								$contactname = $_POST['contactname'];
								$contactemail = $_POST['contactemail'];
								$contactwebsite = $_POST['contactwebsite'];
								$contactmessage = $_POST['contactmessage'];

								if (trim($contactname) == ""){
									$contactError = "Error: 'Name' field is blank <br />";
								}
								if (trim($contactemail) == ""){
									$contactError .= "Error: 'Email' field is blank <br />";
								}

								if ($contactsubmitted == "yes"){
									if ($contactError != ""){
										echo "<div id='contact-failed'>" . $contactError . "</div>";
									}
									else{
										echo "<div id='contact-success'>Thanks! Your contact submission has been sent!</div>";
										$contactEmailMessage = "
	Name: " . $contactname . "
	Email: ".$contactemail . "
	Website: ".$contactwebsite . "
	Message: ".$contactmessage;
										$contactHeaders = 'From: '.$contactemail . "\r\n" .
														'Reply-To: '.$contactemail . "\r\n" .
														'X-Mailer: PHP/' . phpversion();
										mail (get_option('admin_email'), "Blog Contact Submission", $contactEmailMessage, $contactHeaders);
									}
								}

							?>
								<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" id="commentform">

								<input type="hidden" id="contactsubmitted" name="contactsubmitted" value="yes">

								<p><input type="text" name="contactname" id="contactname" value="<?php echo $contactname; ?>" size="22" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> />
								<label for="author"><small>Name (required) </small></label></p>

								<p><input type="text" name="contactemail" id="contactemail" value="<?php echo $contactemail; ?>" size="22" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> />
								<label for="email"><small>Email (required) </small></label></p>

								<p><input type="text" name="contactwebsite" id="contactwebsite" value="<?php echo $contactwebsite; ?>" size="22" tabindex="3" />
								<label for="url"><small>Website</small></label></p>

								<p><textarea name="contactmessage" id="contactmessage" cols="50" rows="10" tabindex="4"><?php echo $contactmessage; ?></textarea></p>

								<p><input name="submit" type="submit" id="submit" tabindex="5" value="Submit" />
								</p>

								</form>
							</div> <!-- respond -->
						</div> <!-- contact-left -->
						<div class="Clear"></div>
					</div> <!-- contact -->
				</div> <!-- post -->
				<?php endwhile; endif; ?>

				<div class="Clear"></div>
			</div> <!-- widecolumn -->
			<div class="Clear"></div>
		</div> <!-- page -->
	</div> <!-- content -->



<?php get_footer(); ?>
