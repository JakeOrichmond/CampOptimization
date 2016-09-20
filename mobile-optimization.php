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
	$emailContent = sprintf("Name: %s %s <br>", $leadFistName, $leadLastName);
	$emailContent .= "Email: " . $leadEmail . "<br>";
	$emailContent .= "Company: " . $leadCompany . "<br>";
	$emailContent .= "URL: " . $leadUrl . "<br>";

	$headers = "MIME-Version: 1.0\r\n";
	$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
	$headers .= "X-Mailer: PHP/" . phpversion() . "\r\n";
	$headers .= "From: hello@teamroboboogie.com \r\n";

	if (mail('kayleigh@teamroboboogie.com', 'Mobile Optimization Service Inquiry', $emailContent, $headers)) {
		mail('hello@teamroboboogie.com', 'Mobile Optimization Service Inquiry', $emailContent, $headers);
		$message = "We're happy to see you are into FREE stuff as much as we are. We'll be in touch soon to start optimizing your website. " .
		    "In the meantime, check us out at <a href='http://www.teamroboboogie.com'>teamroboboogie.com</a>";
	}
	else {
		error_log('Message not sent...');
		$message = "We encountered an error while sending your message. Please try again.";
	}
}
?>
<!DOCTYPE html>
<?php include "head.inc.php" ?>
<body class="content-page promo-page mobile-optimization">
<?php
if (isset($message)) {
	echo '<div class="notification">' . $message . '<span class="close">x</span></div>';
}
?>
<div id="body">
	<?php include "nav.inc.php" ?>
	<div class="hero mobile-promo">
		<div class="block">
			<p>Ready to start optimizing your app?</p>

			<p><strong>Let us show you how</strong></p>

			<p class="text-center"><img src="lib/img/opto-logo-wht.png" alt="Optimizely Solutions Partner"/></p>
		</div>
	</div>
	<div class="block t-gutter-lg b-gutter-lg">
		<h2>Get a FREE customer experience evaluation valued at over $7,500!</h2>
	</div>
	<div class="block">
		<div class="width-1-2">
			<p><strong>roboboogie's mobile optimization Jump Start includes:</strong></p>
			<ul class="bulleted">
				<li>Heuristic user experience evaluation</li>
				<li>Up to 6 initial A/B test ideas</li>
				<li>Optimization strategy roadmap</li>
			</ul>

			<div class="skill-icons mobile-portrait-hide">
				<div class="width-1-3">
					<img src="/lib/img/icons/skills/ux_eval.png" alt="User Experience Design"/>

					<p>User Experience<br> Design</p>
				</div>
				<div class="width-1-3">
					<img src="/lib/img/icons/skills/ab_testing.png" alt="A/B Testing"/>

					<p>A/B<br> Testing</p>
				</div>
				<div class="width-1-3">
					<img src="/lib/img/icons/skills/strategic_plan.png" alt="Strategic Planning"/>

					<p>Strategic<br> Planning</p>
				</div>
			</div>
		</div>
		<div class="width-1-2">
			<form method="post" action="/mobile-optimization.php">
				<div class="width-full"><p><strong>Please complete the form below:</strong></p></div>
				<div class="width-1-2">
					<input type="text" id="firstName" name="firstName" placeholder="FIRST NAME" required/>
				</div>
				<div class="width-1-2 ">
					<input type="text" id="lastName" name="lastName" placeholder="LAST NAME" required/>
				</div>
				<input type="email" id="email" name="email" placeholder="EMAIL" required/>
				<input type="text" id="company" name="company" placeholder="YOUR COMPANY" required/>
				<input type="url" id="url" name="url" placeholder="WEBSITE URL" onblur="validateURI(this);" required/>
				<button type="submit" class="btn btn-primary right t-gutter-md">Get your free mobile evaluation</button>
			</form>
		</div>
	</div>
	<div class="block">
		<div class="width-1-2">
			<p><strong>About roboboogie:</strong></p>
			<p>roboboogie is an omni-channel customer experience optimization agency helping brands build more authentic,
				meaningful, and lucrative relationships with their customers. We combine over 12 years of user-centered design
				experience with data-driven strategic consulting to create more effective and engaging customer experiences.</p>
		</div>
	</div>
	<div class="block mobile-hide">
		<div class="width-full logo-block t-gutter-x-lg b-gutter-x-lg">
			<img src="/lib/img/mobile-optimization-logo-block-2.png" alt="Nike, Specialized, Benchmade, The Clymb" />
		</div>
	</div>
	<div class="block mobile-show t-gutter-x-lg b-gutter-x-lg">
		<div class="width-full logo-block">
			<img src="/lib/img/mobile-optimization-logo-stack-2.png" alt="Nike, Specialized" />
		</div>
	</div>
</div>
<div class="footer">
	<div class="block">
		<p>For more information contact Founder and CXO John Gentle at <a href="mailto:john@teamroboboogie.com">john@teamroboboogie.com</a>
			or check us out online at <a href="http://teamroboboogie.com">teamroboboogie.com</a></p>
	</div>
</div>
<?php include "script.inc.php" ?>
</body>
</html>