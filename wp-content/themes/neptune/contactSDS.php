<style type="text/css">
.contactside {
		background-color: white;
			
			-moz-background-clip: padding;     /* Firefox 3.6 */
			-webkit-background-clip: padding;  /* Safari 4? Chrome 6? */
			background-clip: padding-box;      /* Firefox 4, Safari 5, Opera 10, IE 9 */
						 
			border: 15px solid rgba(255,255,255, 0.3);		
							
			-webkit-border-radius: 40px;
			-moz-border-radius: 40px;
			border-radius: 40px; 
		
			padding: 10px;
			width: 400px;
			
			
	
}
.sideR { float:right;}
.sidrL {float:left;}
.contactright {
		background-color: white;
			
			-moz-background-clip: padding;     /* Firefox 3.6 */
			-webkit-background-clip: padding;  /* Safari 4? Chrome 6? */
			background-clip: padding-box;      /* Firefox 4, Safari 5, Opera 10, IE 9 */
						 
			border: 15px solid rgba(255,255,255, 0.3);		
							
			-webkit-border-radius: 40px;
			-moz-border-radius: 40px;
			border-radius: 40px; 
		
			padding: 10px;
			width: 450px;
			clear: right;
			float:right;
			
	
}
</style>
<?php



/**

 * @package WordPress

 * @subpackage neptune

 * Template Name: ContactSDS

 */



// Define plugin's admin variables

	$general_option = get_option('general_option');

	$design_option = get_option('design_option');

	$home_page_option = get_option('home_page_option');

	$portfolio_option = get_option('portfolio_option');

	$contact_option = get_option('contact_option');



get_header(); ?></div>



	
<div class="contactright">
<iframe width="450" height="250" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=1060+Southland+Circle+Nw+Atlanta,+GA+30318&amp;aq=&amp;sll=42.746632,-75.770041&amp;sspn=4.670819,9.876709&amp;t=h&amp;ie=UTF8&amp;hq=&amp;hnear=1060+Southland+Cir+NW,+Atlanta,+Georgia+30318&amp;ll=33.801548,-84.429882&amp;spn=0.009539,0.01929&amp;z=14&amp;output=embed"></iframe><br /><small><a href="https://www.google.com/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=1060+Southland+Circle+Nw+Atlanta,+GA+30318&amp;aq=&amp;sll=42.746632,-75.770041&amp;sspn=4.670819,9.876709&amp;t=h&amp;ie=UTF8&amp;hq=&amp;hnear=1060+Southland+Cir+NW,+Atlanta,+Georgia+30318&amp;ll=33.801548,-84.429882&amp;spn=0.009539,0.01929&amp;z=14" style="color:#0000FF;text-align:left">View Larger Map</a></small>
</div>
<div class="contactright">
<h3 align="center"> GUY T. GUNTER & ASSOCIATES</h3>
<p align="center"> 1610 Southland Circle Nw<br />
Atlanta, GA 30318<br />
Ph (404) 874-7529<br />
Fax (404)876-3830<br />
info@guytgunter.com<br />
</p>
</div>

	
			 <!-- contact-right -->

				

							

							<div class="contactside">
                            <h3>REQUEST A QUOTE</h3><br />
                            <i>Get in touch to discuss your next project or request a quote here.</i><br /><br />

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

<br />

								<input type="hidden" id="contactsubmitted" name="contactsubmitted" value="yes">



								<p><input type="text" name="contactname" id="contactname" value="<?php echo $contactname; ?>" size="22" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> />

								<label for="author"><small>Name (required) </small></label></p>


<br />
								<p><input type="text" name="contactemail" id="contactemail" value="<?php echo $contactemail; ?>" size="22" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> />

								<label for="email"><small>Email (required) </small></label></p>

<br />

								<p><input type="text" name="contactwebsite" id="contactwebsite" value="<?php echo $contactwebsite; ?>" size="22" tabindex="3" />

								<label for="url"><small>Website</small></label></p>

<br />

								<p>
                                <label for="contactmessage"><small>Inquiry</small></label>
                                <textarea name="contactmessage" id="contactmessage" cols="50" rows="10" tabindex="4"><?php echo $contactmessage; ?></textarea></p>
                               <p> <label for="removefromemaillist"><small>Check here to remove yourself from email newsletter.</small></label>

<input name="removefromemaillist" type="checkbox" value="removeplease" /></p>

								<p><input name="submit" type="submit" id="submit" tabindex="5" value="Submit" />

								</p>



								</form>

							</div> <!-- respond -->

						</div> <!-- contact-left -->


					</div> <!-- contact -->

				</div> <!-- post -->

	




			

		

	






<?php get_footer(); ?>

