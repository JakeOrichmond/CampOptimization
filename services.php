<?php
/**
 * Handle contact form submission
 */
$leadName = isset($_POST['name']) ? $_POST['name'] : null;
$leadEmail = isset($_POST['email']) ? $_POST['email'] : null;
$leadCompany = isset($_POST['company']) ? $_POST['company'] : null;
$leadMessage = isset($_POST['message']) ? $_POST['message'] : null;

if($leadName && $leadEmail && $leadCompany) {
	$emailContent = "Name: " . $leadName . " <br />";
	$emailContent .= "Email: " . $leadEmail . " <br />";
	$emailContent .= "Company: " . $leadCompany . " <br />";
	$emailContent .= "Message: " . $leadMessage . " <br />";

	$headers = "MIME-Version: 1.0\r\n";
	$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
	$headers .= "X-Mailer: PHP/" . phpversion();
	$headers .= "From: hello@teamroboboogie.com \r\n";

	if(mail('john@teamroboboogie.com', 'Service Inquiry', $emailContent, $headers)) {
		mail('hello@teamroboboogie.com', 'Service Inquiry', $emailContent, $headers);
		$message = "Your message has been sent";
	} else {
		error_log('Message not sent...');
		$message = "We encountered an error while sending your message. Please try again.";
	}
}
?>
<!DOCTYPE html>
<?php include "head.inc.php" ?>
<body class="content-page">
<?php
	if(isset($message)) {
		echo '<div class="notification">' . $message . '<span class="close">x</span></div>';
	}
?>
<div id="body" class="services">
	<?php include "nav.inc.php" ?>
	<div class="hero">
		<div class="hero-text-container side-margin">
			<h2>Our Services</h2>
			<p>roboboogie partners closely with innovative marketers to help them do more with their customer data. We provide a suite of optimization, user experience design and personalization services we call <span>DataActions</span>.</p>
		</div>
	</div>
	<div class="tabs-container side-margin">
		<!-- Nav tabs -->
		<ul class="nav nav-tabs" role="tablist"><!--
		    --><li id="insights-tab" role="presentation"><a href="#insights" aria-controls="insights" role="tab" data-toggle="tab"><h5><span>Data</span>Insights</h5><p>Get to know your customers better.</p><i class="chevron"></i></a></li><!--
		    --><li id="design-tab" role="presentation"><a href="#design" aria-controls="design" role="tab" data-toggle="tab"><h5><span>Data</span>Design</h5><p>Create a beautiful digital experience that gets results.</p><i class="chevron"></i></a></li><!--
		    --><li id="convert-tab" role="presentation"><a href="#convert" aria-controls="convert" role="tab" data-toggle="tab"><h5><span>Data</span>Convert</h5><p>Get more from your digital experiences.</p><i class="chevron"></i></a></li><!--
		    --><li id="target-tab" role="presentation"><a href="#target" aria-controls="target" role="tab" data-toggle="tab"><h5><span>Data</span>Target</h5><p>Unlock the power of personalization.</p><i class="chevron"></i></a></li><!--
	 --></ul>
		<!-- Tab panes -->
		<div class="tab-contact-container">
			<ul class="tab-content">
				<a id="insights-tab-mobile" class="mobile-tabs active" href="#insights" aria-controls="insights" role="tab" data-toggle="tab">
					<div>
						<i class="icon"></i>
						<i class="arrow"></i>
					</div><!--
				 --><div class="right-side">
					    <div>
					        <h5><span>Data</span>Insights</h5><p>Get to know your customers better.</p>
					    </div>
					</div>
				</a>
				<li role="tabpanel" class="tab-pane active" id="insights">
					<div>
						<img src="/lib/img/icons/datainsights_icon_mobile.png"><!--
						 --><h4><span>Data</span>Insights</h4>
						 <p>We de-clutter customer data to tell the 'what, why, when and how' stories you can use build more profitable customer relationships. Our insights include qualitative research, analytics and journey mapping to fully understand and document customer needs and motivations.</p>
					</div>
					<div>
						<div class="data-section"><!--
						 --><div class="data-left">
								<img src="/lib/img/services-page/behavioral-analytics.jpg" alt="">
							</div><!--
						 --><div class="data-right">
								<h5>Behavioral Analytics</h5>
								<p>Drowning in customer data, or simply need some deeper insights to inform your optimization, marketing, or personalization efforts? Our experienced analysts see stories in customer data and are laser-focused on identifying actionable insights to get results.</p>
							</div>
						</div>
						<div class="data-section"><!--
						 --><div class="data-left">
								<img src="/lib/img/services-page/digital-experience-audit.jpg" alt="">
							</div><!--
						 --><div class="data-right">
								<h5>Digital Experience Audit</h5>
								<p>Looking for an objective, expert evaluation of your digital experience? Our experience audits provide best-practice insights on the effectiveness of messaging, overall usability, content clarity, calls-to-action, and product positioning/merchandising. It is a cost effective ways to uncover actionable optimization opportunities.</p>
							</div>
						</div>
						<div class="data-section"><!--
						 --><div class="data-left">
								<img src="/lib/img/services-page/customer-journey-mapping.jpg" alt="">
							</div><!--
						 --><div class="data-right">
								<h5>Customer Journey Mapping</h5>
								<p>Want to know how to delight customers and unlock the best strategies for reaching them effectively? We combine qualitative and quantitative (data-backed) research to identify customer segments and clearly document an ideal journey focused on driving sales and conversions.</p>
							</div>
						</div>
						<div class="data-section"><!--
						 --><div class="data-left">
								<img src="/lib/img/services-page/usability-testing.jpg" alt="">
							</div><!--
						 --><div class="data-right">
								<h5>Usability Testing</h5>
								<p>You can learn a lot about your digital experience simply by watching customers use it. User Testing is a powerful tool for identifying optimization opportunities, and confirm enhancements are working as intended. These days you don't need a sophisticated lab or a huge pile of cash to make it happen.</p>
							</div>
						</div>
					</div>
					<div class="mobile-show">
						<a class="previous" href="#target" aria-controls="previous" role="tab" data-toggle="tab" title="Previous dataACTION"><i></i>Prev<span>ious DataAction</span></a>
						<a class="next" href="#design" aria-controls="next" role="tab" data-toggle="tab" title="Next dataACTION">Next<span> DataAction</span><i></i></a>
					</div>
				</li>
				<a id="design-tab-mobile" class="mobile-tabs" href="#design" aria-controls="design" role="tab" data-toggle="tab">
					<div>
						<i class="icon"></i>
						<i class="arrow"></i>
					</div><!--
				 --><div class="right-side">
				    	<div>
				        	<h5><span>Data</span>Design</h5><p>Create a beautiful digital experience that gets results.</p>
				    	</div>
				    </div>
				</a>
				<li role="tabpanel" class="tab-pane" id="design">
					<div>
						<img src="/lib/img/icons/datadesign_icon_mobile.png"><!--
						 --><h4><span>Data</span>Design</h4>
						 <p>Our proven customer-centric, data-backed design process guarantees both form and function. Whether you're looking for a ground-up redesign, or want to make some design enhancements to your digital experience, we've got the skills to take your digital experience to the next level.</p>
					</div>
					<div>
						<div class="data-section"><!--
						 --><div class="data-left">
								<img src="/lib/img/services-page/digital-experience-design.jpg" alt="">
							</div><!--
						 --><div class="data-right">
						 		<h5>Digital Experience Design</h5>
								<p>An inspiring digital experience should be the only thing between you and your customers. It's our mission to design digital experiences that delight customers and get results. We've proudly designed and optimized experiences for some of the world's most innovative brands including Nike, Specialized Bikes, WACOM, HP, LEVI's, and more.</p>
							</div>
						</div>
						<div class="data-section"><!--
						 --><div class="data-left">
								<img src="/lib/img/services-page/data-backed-design.jpg" alt="">
							</div><!--
						 --><div class="data-right">
						 		<h5>Data-backed Design Validation</h5>
								<p>Looking to validate a design idea? A/B and multivariate testing are powerful ways to remove subjectivity from the design process and let the data inform design. Design Validation services are scalable to fit anything from a full site redesign, to the enhancement of a specific landing page, site feature, or other digital experience.</p>
							</div>
						</div>
						<div class="data-section"><!--
						 --><div class="data-left">
								<img src="/lib/img/services-page/digital-prototyping.jpg" alt="">
							</div><!--
						 --><div class="data-right">
						 		<h5>Digital Prototyping &amp; Data Visualization</h5>
								<p>We love applying our strategic design skills and love for data in creative ways. We can help you build a proof-of-concept prototype to solicit requirements and validate design assumptions, or design infographics, iconography and gamification badges. If it involves data and design, we are into it.</p>
							</div>
						</div>
						<div class="data-section"><!--
						 --><div class="data-left">
								<img src="/lib/img/services-page/digital-experience-strat.jpg" alt="">
							</div><!--
						 --><div class="data-right">
						 		<h5>Digital Experience Strategy</h5>
								<p>Need some help solving an experience design challenge? We'd love to add some creative horsepower and share the wisdom gained over the past 15 years designing and optimizing world class digital experiences.</p>
							</div>
						</div>
					</div>
					<div class="mobile-show">
						<a class="previous" href="#insights" aria-controls="previous" role="tab" data-toggle="tab" title="Previous dataACTION"><i></i>Prev<span>ious DataAction</span></a>
						<a class="next" href="#convert" aria-controls="next" role="tab" data-toggle="tab" title="Next dataACTION">Next<span> DataAction</span><i></i></a>
					</div>
				</li>
				<a id="convert-tab-mobile" class="mobile-tabs" href="#convert" aria-controls="convert" role="tab" data-toggle="tab">
				    <div>
						<i class="icon"></i>
						<i class="arrow"></i>
					</div><!--
				 --><div class="right-side">
				    	<div>
				        	<h5><span>Data</span>Convert</h5><p>Get more from your digital experiences.</p>
				    	</div>
				    </div>
				</a>
				<li role="tabpanel" class="tab-pane" id="convert">
					<div>
						<img src="/lib/img/icons/dataconvert_icon_mobile.png"><!--
						 --><h4><span>Data</span>Convert</h4>
						 <p>Whether you're just starting out with conversion rate optimization (CRO), or you're looking to take your CRO program to the next level, our proven customer-centric, data-backed, design-forward approach can help you exceed your online sales and conversion goals.</p>
					</div>
					<div>
						<div class="data-section"><!--
						 --><div class="data-left">
								<img src="/lib/img/services-page/cro.jpg" alt="">
							</div><!--
						 --><div class="data-right">
						 		<h5>Conversion Rate Optimization (CRO)</h5>
								<p>Looking to increase sales, double fan base, attract more members and improve engagement? No problem. Our Optimization Task Force is the perfect solution for clients who know the power of ongoing A/B testing and iterative optimization. Our experienced multi-discipline teams are a cost effective way to get results and maximize your investment in optimization.</p>
							</div>
						</div>
						<div class="data-section"><!--
						 --><div class="data-left">
								<img src="/lib/img/services-page/optimization-jumpstart.jpg" alt="">
							</div><!--
						 --><div class="data-right">
						 		<h5>Optimization Jumpstart</h5>
								<p>We understand timing is everything and are happy to grow our engagement with your success. Our Optimization Jump Start program is the perfect low cost way to get some quick optimization wins and demonstrate ROI for deeper investment in optimization.</p>
							</div>
						</div>
						<div class="data-section"><!--
						 --><div class="data-left">
								<img src="/lib/img/services-page/consulting-one.jpg" alt="">
							</div><!--
						 --><div class="data-right">
						 		<h5>Strategic Consulting</h5>
								<p>Already have resources dedicated to optimization but looking to get more out of your program? We are happy to lend a hand, or a brain to your efforts. Whether you need fresh ideas and strategies or help designing or development tests, we'd love partner closely with you.</p>
							</div>
						</div>
					</div>
					<div class="mobile-show">
						<a class="previous" href="#design" aria-controls="previous" role="tab" data-toggle="tab" title="Previous dataACTION"><i></i>Prev<span>ious DataAction</span></a>
						<a class="next" href="#target" aria-controls="next" role="tab" data-toggle="tab" title="Next dataACTION">Next<span> DataAction</span><i></i></a>
					</div>
				</li>
				<a id="target-tab-mobile" class="mobile-tabs" href="#target" aria-controls="target" role="tab" data-toggle="tab">
				    <div>
						<i class="icon"></i>
						<i class="arrow"></i>
					</div><!--
				 --><div class="right-side">
				    	<div>
				        	<h5><span>Data</span>Target</h5><p>Unlock the power of personalization.</p>
				    	</div>
				    </div>
				</a>
				<li role="tabpanel" class="tab-pane" id="target">
					<div>
						<img src="/lib/img/icons/datatarget_icon_mobile.png"><!--
						 --><h4><span>Data</span>Target</h4>
						 <p>Reach the right customers, with the perfect message, at the ideal time and place, and they will convert. Whether you need  creative ideas for your next targeted campaign, or you're seeking a strategic partner to roll out a comprehensive personalization program, we've got the tools and experience to help you get the most out of personalization.</p>
					</div>
					<div>
						<div class="data-section"><!--
						 --><div class="data-left">
								<img src="/lib/img/services-page/personal-mgmt.jpg" alt="">
							</div><!--
						 --><div class="data-right">
						 		<h5>Personalization Program Management</h5>
								<p>When properly executed, personalization campaigns result in significant revenue and conversion lift. However, marketing to an increasing number of customer segments is time and resource consuming. From ideation to design and execution,  we help innovative brands more effectively and efficiently manage their personalization programs.</p>
							</div>
						</div>
						<div class="data-section"><!--
						 --><div class="data-left">
								<img src="/lib/img/services-page/personalization.jpg" alt="">
							</div><!--
						 --><div class="data-right">
						 		<h5>Personalization Jumpstart</h5>
								<p>We are firm believers in walking before you run. Our Personalization Jump Start program is the perfect low-cost way to get some quick personalization wins and demonstrate ROI for deeper investment in personalization.</p>
							</div>
						</div>
						<div class="data-section"><!--
						 --><div class="data-left">
								<img src="/lib/img/services-page/consulting-two.jpg" alt="">
							</div><!--
						 --><div class="data-right">
						 		<h5>Strategic Consulting</h5>
								<p>Already rockin' with personalization? Good for you. We're here to help if you need some fresh campaign ideas, want help identifying or understanding your customer segments, or help finding the best personalization technologies.</p>
							</div>
						</div>
					</div>
					<div class="mobile-show">
						<a class="previous" href="#convert" aria-controls="previous" role="tab" data-toggle="tab" title="Previous dataACTION"><i></i>Prev<span>ious DataAction</span></a>
						<a class="next" href="#insights" aria-controls="next" role="tab" data-toggle="tab" title="Next dataACTION">Next<span> DataAction</span><i></i></a>
					</div>
				</li>
				<div class="mobile-remove">
					<a class="previous" href="" aria-controls="previous" role="tab" data-toggle="tab" title="Previous dataACTION"><i></i>Prev<span>ious DataAction</span></a>
					<a class="next" href="" aria-controls="next" role="tab" data-toggle="tab" title="Next dataACTION">Next<span> DataAction</span><i></i></a>
				</div>
			</ul>
			<div class="contact-container">
				<div class="company-form">
					<h4>Get in Touch.</h4>
					<p>We'd love to take a look at your site and provide some insights. Contact us and we'll gladly help you out.</p>
					<form method="post" id="contact-form" action="/services">
						<div class="col-md-12">
							<div class="form-group">
								<label for="name">Name</label>
								<input placeholder="Name" type="text" id="name" name="name" required/>
							</div>
							<div class="t-gutter-md form-group">
								<label for="email">Email</label>
								<input placeholder="Email" type="email" id="email" name="email" required/>
							</div>
							<div class="t-gutter-md form-group">
								<label for="company">Company</label>
								<input placeholder="Company" type="text" id="company" name="company"/>
							</div>
							<div class="t-gutter-md b-gutter-md">
								<label for="message">Message</label>
								<textarea placeholder="Whatcha thinkin'? Ready to do more with your customer data?" name="message" id="message" form="contact-form"></textarea>
							</div>
						</div>
						<div class="col-md-12">
							<button class="btn btn-light-blue">Contact us now</button>
						</div>
					</form>
					<div class="width-1-3 mobile-hide"></div>
				</div>
				<div class="sugg-container">
					<div style="background-image:url(/lib/img/sugg-boxes/sugg_5in30_tile.jpg);"">
						<h4>5 <span>IN</span> 30</h4>
						<p><span>5</span> key insights presented by our optimization experts in <span>30</span> minutes or less</p>
						<a class="btn-light-blue" href="/5in30" title=""><p>Learn more</p></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="size-reset"></div>
<div class="logo-bar col-xs-12">
	<h1 class="side-margin">Our Partners</h1>
	<ul class="side-margin">
	    <li>
	        <a href="http://optimizely.com" title="Optimizely"><img src="/lib/img/logos/optimizely-two-star.png"></a>
	    </li><!--
     --><li>
            <a href="http://analytics.google.com" class="google-icon" title="Google Analytics"><img src="/lib/img/logos/google-analytics.png"></a>
        </li><!--
     --><li>
            <a href="http://usertesting.com" title="User Testing"><img src="/lib/img/logos/user-testing.svg"></a>
        </li><!--
	 --><li>
	        <a href="http://qubit.com" title="Qubit"><img src="/lib/img/logos/qubit.gif"></a>
	    </li><!--
     --><li>
            <a href="http://crazyegg.com" title="Crazy Egg"><img src="/lib/img/logos/crazyegg.png"></a>
        </li><!--
	 --><li>
	        <a href="http://getlytics.com" title="Lytics"><img src="/lib/img/logos/lytics-blue.png"></a>
	    </li><!--
     --><li>
            <a href="http://vwo.com" title="VWO"><img src="/lib/img/logos/vwo.png"></a>
        </li><!--
	 --><li>
	        <a href="http://hotjar.com" title="Hotjar"><img src="/lib/img/logos/hotjar.png"></a>
	    </li>
	</ul>
</div>
<?php include "footer.inc.php" ?>
<?php include "script.inc.php" ?>
</body>
</html>