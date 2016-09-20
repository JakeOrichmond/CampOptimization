<?php
/**
 * Handle contact form submission
 */
$leadFistName = isset($_POST['firstName']) ? $_POST['firstName'] : null;
$leadLastName = isset($_POST['lastName']) ? $_POST['lastName'] : null;
$leadEmail = isset($_POST['email']) ? $_POST['email'] : null;
$leadCompany = isset($_POST['company']) ? $_POST['company'] : null;
$leadUrl = isset($_POST['url']) ? $_POST['url'] : null;

if ($leadEmail) {
	$emailContent = sprintf("Nam e: %s %s <br>", $leadFistName, $leadLastName);
	$emailContent .= "Email: " . $leadEmail . "<br>";
	$emailContent .= "Company: " . $leadCompany . "<br>";
	$emailContent .= "URL: " . $leadUrl . "<br>";

	$headers = "MIME-Version: 1.0\r\n";
	$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
	$headers .= "X-Mailer: PHP/" . phpversion() . "\r\n";
	$headers .= "From: hello@teamroboboogie.com \r\n";

	if (mail('cuba@teamroboboogie.com', 'Cyber Monday Service Inquiry', $emailContent, $headers)) {
		mail('hello@teamroboboogie.com', 'Cyber Monday Service Inquiry', $emailContent, $headers);
		$message = "We're happy to see you are into FREE stuff as much as we are. We'll be in touch soon to start optimizing your website.";
	}
	else {
		error_log('Message not sent...');
		$message = "We encountered an error while sending your message. Please try again.";
	}
}
?>
<!DOCTYPE html>
<?php include "head.inc.php" ?>
<body class="content-page promo-page cyber-monday">
<?php
if (isset($message)) {
	echo '<div class="notification">' . $message . '<span class="close">x</span></div>';
}
?>
<div id="body">
	<?php include "nav.inc.php" ?>
	<div class="hero">
		<div class="block">
			<p>Make every day feel like</p>

			<p><strong>Cyber Monday</strong></p>

			<p class="text-center"><img src="lib/img/opto-logo-wht.png" alt="Optimizely Solutions Partner"/></p>
		</div>
	</div>
	<div class="block t-gutter-x-lg">
		<h2>Optimized sites are proven to increase engagement,
			conversions, customer loyalty, and revenue.</h2>
	</div>
	<div class="block">
		<div class="width-1-2">
			<p><strong>Get a FREE customer experience evaluation including over $7,500 in strategic design consulting
					services:</strong></p>
			<ul class="bulleted">
				<li>Heuristic user experience evaluation of up to 8 key pages</li>
				<li>Up to ten initial A/B test ideas</li>
				<li>Optimization strategy roadmap</li>
			</ul>

			<div class="skill-icons mobile-portrait-hide">
				<div class="width-1-3">
					<img src="/lib/img/icons/skills/ux_eval.png" alt="User Experience Design"/>

					<p>User Experience<br> Design</p>
				</div>
				<div class="width-1-3">
					<img src="/lib/img/icons/skills/ab_testing.png" alt="A/B Testing"/>

					<p>A/B<br> Testing</p></div>
				<div class="width-1-3">
					<img src="/lib/img/icons/skills/strategic_plan.png" alt="Strategic Planning"/>

					<p>Strategic<br> Planning</p></div>
			</div>
		</div>
		<div class="width-1-2">
			<form method="post" action="/cyber-monday.php">
				<div class="width-1-2">
					<input type="text" id="firstName" name="firstName" placeholder="FIRST NAME" required/>
				</div>
				<div class="width-1-2 ">
					<input type="text" id="lastName" name="lastName" placeholder="LAST NAME" required/>
				</div>
				<input type="email" id="email" name="email" placeholder="EMAIL" required/>
				<input type="text" id="company" name="company" placeholder="YOUR COMPANY" required/>
				<input type="url" id="url" name="url" placeholder="WEBSITE URL" required/>
				<button type="submit" class="btn btn-primary right t-gutter-md">Get your free evaluation</button>
			</form>
		</div>
	</div>
</div>
<div class="footer">
	<div class="block">
		<p>Roboboogie is a Portland-based strategic design agency that creates and Optimizes digital experiences.</p>

		<p>For more information contact Founder and CXO John Gentle at <a href="mailto:john@teamroboboogie.com">john@teamroboboogie.com</a>
			or check us out online at <a href="http://teamroboboogie.com">teamroboboogie.com</a>.</p>
	</div>
</div>
</div>
<?php include "script.inc.php" ?>
</body>
</html>
