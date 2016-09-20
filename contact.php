<?php
/**
 * Handle contact form submission
 */
$leadName = isset($_POST['name']) ? $_POST['name'] : null;
$leadEmail = isset($_POST['email']) ? $_POST['email'] : null;
$leadWebsite = isset($_POST['website']) ? $_POST['website'] : null;
$leadMessage = isset($_POST['message']) ? $_POST['message'] : null;
$dataAnalytics = 'Checkboxes Included: ';
$leadDataAnalytics = isset($_POST['services']) ? $_POST['services'] : null;
foreach ($leadDataAnalytics as $services){
    $dataAnalytics .= $services . " ";
}

if($leadName && $leadEmail && $leadMessage) {
	$emailContent = "Name: " . $leadName . " <br />";
	$emailContent .= "Email: " . $leadEmail . " <br />";
	$emailContent .= "Website: " . $leadWebsite . " <br />";
	$emailContent .= "Message: " . $leadMessage . " <br />";
	$emailContent .= "Services: " . $dataAnalytics . " <br />";

	$headers = "MIME-Version: 1.0\r\n";
	$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
	$headers .= "X-Mailer: PHP/" . phpversion();
	$headers .= "From: hello@teamroboboogie.com \r\n";

	if(mail('john@teamroboboogie.com', 'Service Inquiry', $emailContent, $headers)) {
		mail('hello@teamroboboogie.com', 'Service Inquiry', $emailContent, $headers);
		$message = "Thanks for sending us a note. We will be in touch soon.";
	} else {
		error_log('Message not sent...');
		$message = "We encountered an error while sending your message. Please try again.";
	}
}
?>
<!DOCTYPE html>
<?php include 'head.inc.php'; ?>
<body class="content-page">
<?php
	if(isset($message)) {
		echo '<div class="notification">' . $message . '<span class="close">x</span></div>';
	}
?>
<?php include 'nav.inc.php'; ?>
	<div id="body" class="contact">
		<div class="hero">
			<div class="side-margin">
			    <h1>Contact Us</h1>
			    <p>You've got some options.</p>
			</div>
		</div>
		<div class="container-fluid contact-container">
			<div class="row">
				<div class="side-margin">
					<div class="left-side">
						<h4 class="dark">We'd love to hear from you.</h4>
						<h5 class="tall">Send us an email.</h5>
						<a href="mailto:hello@teamroboboogie.com" class="blue-hover">hello@teamroboboogie.com</a>
						<h5 class="tall">Drop in.</h5>
						<a href="https://www.google.com/maps/place/Revolution+Hall/@45.518962,-122.652093,17z/data=!3m1!4b1!4m2!3m1!1s0x5495a0a3908584d3:0x3cb055df21a4d485" target="_blank" rel="nofollow">1300 SE Stark St. Suite 111 Portland, Or. 97214</a>
						<h5>Give us a ring.</h5>
						<a href="tel:+15035446934" class="blue-hover">503.544.6934</a>
						<h5>Socialize with us.</h5>
						<div class="social-icons">
							<a target="_blank" href="https://www.facebook.com/roboboogiePDX/"><img src="/lib/img/icons/facebook_icon.png" alt=""></a>
							<a target="_blank" href="https://twitter.com/roboboogiepdx"><img src="/lib/img/icons/twitter_icon.png" alt=""></a>
							<a target="_blank" href="https://www.instagram.com/roboboogiepdx/"><img src="/lib/img/icons/instagram_icon.png" alt=""></a>
						</div>
					</div>
					<div class="right-side">
						<h4>File some paperwork.</h4>
						<form method="post" id="contact-form" action="/contact">
							<div class="col-md-12">
								<div class="form-group">
									<label for="name">Name</label>
									<input placeholder="Your name" type="text" id="name" name="name" required/>
								</div>
								<div class="t-gutter-md form-group">
									<label for="email">Email</label>
									<input placeholder="Email addy" type="email" id="email" name="email" required/>
								</div>
								<div class="t-gutter-md form-group">
									<label for="website">Website</label>
									<input placeholder="URL you are looking to optimize" type="text" id="website" name="website"/>
								</div>
								<div class="t-gutter-md">
									<label for="message">Message</label>
									<textarea placeholder="Whatcha thinkin'? Ready to do more with your customer data?" name="message" id="message" form="contact-form"></textarea>
								</div>
								<div class="t-gutter-md form-group services-checklist">
									<label for="services" class="show">What services are you most interested in?</label>
									<input type="checkbox" name="services[]" id="services" value="Customer Data Analytics">Customer Data Analytics<br>
									<input type="checkbox" name="services[]" id="services" value="User Experience Design">User Experience Design<br>
									<input type="checkbox" name="services[]" id="services" value="A/B Testing">A/B Testing<br>
									<input type="checkbox" name="services[]" id="services" value="Personalization">Personalization<br>
									<input type="checkbox" name="services[]" id="services" value="Customer Journey Mapping">Customer Journey Mapping<br>
								</div>
							</div>
							<div class="col-md-12">
								<button class="btn btn-light-blue">Send it!</button>
							</div>
						</form>
						<div class="width-1-3 mobile-hide"></div>
					</div>
				</div>
			</div>
		</div>
		<div id="contact-map"></div>
	</div>
	<?php include "footer.inc.php" ?>
	<?php include "script.inc.php" ?>
</body>
