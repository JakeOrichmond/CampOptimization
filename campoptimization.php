<?php
  require_once 'vendor/autoload.php';
  session_start();
  include 'keys.php';
  $client_id = $ob_client_id;
  $Email_address = $ob_email_address;
  $key_file_location = $ob_key_file_location;
  $client = new Google_Client();
  $client->setApplicationName("5 in 30 Events");
  $key = file_get_contents($key_file_location);
  $scopes ="https://www.googleapis.com/auth/calendar.readonly";
  $cred = new Google_Auth_AssertionCredentials(
      $Email_address,
      array($scopes),
      $key
      );
  $client->setAssertionCredentials($cred);
  if($client->getAuth()->isAccessTokenExpired()) {
      $client->getAuth()->refreshTokenWithAssertion($cred);
  }
  $service = new Google_Service_Calendar($client);
  $myEvents = array();
  $eventObject = new stdClass();
  $calendarList  = $service->calendarList->listCalendarList();

  while(true) {
    foreach ($calendarList->getItems() as $calendarListEntry) {
      $events = $service->events->listEvents($calendarListEntry->id);
      foreach ($events->getItems() as $event) {
        $eventObject = (object) ['startTime' => $event->getStart()->dateTime, 'location' => $event->getLocation(), 'endTime' => $event->getEnd()->dateTime, 'summary' => $event->getSummary(), 'eventType' => $event->getKind()];
        $myEvents[] = $eventObject;
      }
    }
    $pageToken = $calendarList->getNextPageToken();
    if ($pageToken) {
        $optParams = array('pageToken' => $pageToken);
        $calendarList = $service->calendarList->listCalendarList($optParams);
    } else {
        break;
    }
  }
?>
<script type="text/javascript">
    events = <?php echo json_encode($myEvents, JSON_PRETTY_PRINT) ?>;

</script>
<script   src="https://code.jquery.com/jquery-3.1.0.min.js"   integrity="sha256-cCueBR6CsyA4/9szpPfrX3s49M9vUU5BgtiJj06wt/s="   crossorigin="anonymous"></script>
<script src="https://apis.google.com/js/client.js?onload=handleClientLoad"></script>
<script src="displayEvents.js"></script>
<script src="scripts.js"></script>
<?php
/**
 * Handle camp-o speaker form submission
 */
$leadName = isset($_POST['name']) ? $_POST['name'] : null;
$leadEmail = isset($_POST['email']) ? $_POST['email'] : null;
$leadMessage = isset($_POST['message']) ? $_POST['message'] : null;


if($leadName && $leadEmail && $leadMessage) {
    $emailContent = "Name: " . $leadName . " <br />";
    $emailContent .= "Email: " . $leadEmail . " <br />";
    $emailContent .= "Message: " . $leadMessage . " <br />";

    $headers = "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
    $headers .= "X-Mailer: PHP/" . phpversion();
    $headers .= "From: hello@teamroboboogie.com \r\n";

    if(mail('darius@teamroboboogie.com', 'Speaker Submission', $emailContent, $headers)) {
        mail('darius@teamroboboogie.com', 'Speaker Submission', $emailContent, $headers);
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
    <div id="body" class="event">
        <div class="my-hero">
            <div class="hero-video-overlay">
                <img class="camp-o-logo" src="lib/img/icons/campo_tile_logo.png">
                <h3>Camp Optimization's mission is simple:</h3>
                <h4>Provide a casual, fun and informative forum for digital marketers and technologists to share optimization best practices, challenges and wins.</h4>
            </div>
            <div class="get-involved-container">
                <p class="">Get involved</p>
                <div class="circle-with-arrow"><div class="get-involved-arrow"></div></div>
            </div>
        <video loop autoplay muted>
          <source src="lib/img/heroes/event_hero.mp4" type="video/mp4">
          <source src="lib/img/heroes/event_hero.webm" type="video/webm">
                  Your browser does not support the video tag.
              </video>
      </div>
        <div class="container-fluid event-container">
            <div class="row">
                <div class="side-margin">
          <div class="left-side">
                        <div class="next-speaker">
              <h4 class="next-event-label">Next Event</h4>
              <div class="splash-ticket-container">
                <div class="grey-background"></div>
                <div class="ticket">
                  <div class="ticket-image-container"><img src="lib/img/icons/event-ticket.png" alt="" /></div>
                  <div class="ticket-blurbs-container">
                    <div class="ticket-when">
                      <p class="ticket-when-title">WHEN:</p>
                      <div id="day-of-week-div"></div>
                      <div id="day-of-month-div"></div>
                      <div id="month-div"></div>
                      <div id="time-of-day-div"></div>
                      <p id="time-of-day" class="time-of-day"></p>
                    </div>
                    <div class="ticket-where">
                      <p class="ticket-where-title">WHERE:</p>
                      <div id="venue-div"></div>
                      <div id="address-div"></div>
                      <div id="city-state-zip-div"></div>
                    </div>
                    <div class="ticket-rsvp">
                      <input type="submit" value="RSVP" class="event-page-button">
                    </div>
                  </div>
                </div><!--
           --><div class="splash">
                                <div class="topic"><h4>TOPIC:</h4></div>
                                <div class="title-topic"><simpla-text class="title-topic" placeholder="Topic Title" sid="title_topic"></simpla-text></div>
                                <div class="topic-text"><simpla-text  placeholder="Topic information" sid="topic_text"></simpla-text></div>
                                <div class="speaker-image"><simpla-img sid="image"></simpla-img></div>
                                <div class="speaker-name"><simpla-text placeholder="Speaker name" sid="speaker_name"></simpla-text></div>
                                <div class="speaker-title"><simpla-text placeholder="Speaker Name @ Company" sid="speaker_title"></simpla-text></div>
                                <div class="speaker-notes"><simpla-text  placeholder="Speaker notes" sid="speaker_notes"></simpla-text></div>
                            </div>
                        </div>
            </div>
            <div class="calendar-content">
                            <h2>Upcoming Events</h2>
                            <div id="upcomingEventsSidebar">
                                <div id="upcomingEventsMobile" class="upcoming-events-mobile"></div>
                            </div>
                            <div id="event-response"></div>
                        </div>
            <div class="flex-container">
              <div id="slider" class="flexslider running ">
                <ul class="slides">
                  <li style="background-image:url(imgs/whatever1.jpg);"/>
                    <div class="slider-overlay events-page">
                      <span></span>
                      <p class="blurb-one">Meetup</p>
                      <p class="blurb-two">Date | Location</p>
                    </div>
                  </li>
                  <li style="background-image:url(imgs/whatever2.jpg);"/>
                    <div class="slider-overlay events-page">
                      <span></span>
                      <p class="blurb-one">Meetup</p>
                      <p class="blurb-two">Date | Location</p>
                    </div>
                  </li>
                  <li style="background-image:url(imgs/whatever3.jpg);"/>
                    <div class="slider-overlay events-page">
                      <span></span>
                      <p class="blurb-one">Meetup</p>
                      <p class="blurb-two">Date | Location</p>
                    </div>
                  </li>
                  <li style="background-image:url(imgs/whatever4.jpg);"/>
                    <div class="slider-overlay events-page">
                      <span></span>
                      <p class="blurb-one">Meetup</p>
                      <p class="blurb-two">Date | Location</p>
                    </div>
                  </li>
                </ul>
              </div>
              <div>
                <h3 class="t-gutter-lg"></h3>
              </div>
            </div>
            <div class="event-showcase">
              <h4>Event Showcase</h4>
              <div class="showcase-wrap">
                <div class="past-event">
                  <div id="past-event1">
                      <div class="topic-name"><simpla-text class="topic-name" placeholder="Topic Name1" sid="topic_name1"></simpla-text></div>
                      <div class="past-speaker-name"><simpla-text class="past-speaker-name" placeholder="Speaker Name1" sid="past_speaker_name1"></simpla-text></div>
                      <div class="past-speaker-title"><simpla-text class="past-speaker-title" placeholder="Speaker title and company1" sid="past_speaker_title1"></simpla-text></div>
                      <div class="past-speaker-date"><simpla-text class="past-speaker-date" placeholder="Date and Location1" sid="past_speaker_date1"></simpla-text></div>
                      <div class="past-speaker-notes"><simpla-text class="past-speaker-notes"  placeholder="Speaker notes1" sid="past_speaker_notes1"></simpla-text></div>
                      <div class="download-notes"><simpla-text class="download-notes"  placeholder="Download Speaker notes1" sid="download_notes1"></simpla-text></div>
                  </div>
                  <div id="past-event2">
                      <div class="topic-name"><simpla-text class="topic-name" placeholder="Topic Name2" sid="topic_name2"></simpla-text></div>
                      <div class="past-speaker-name"><simpla-text class="past-speaker-name" placeholder="Speaker Name2" sid="past_speaker_name2"></simpla-text></div>
                      <div class="past-speaker-title"><simpla-text class="past-speaker-title" placeholder="Speaker title and company2" sid="past_speaker_title2"></simpla-text></div>
                      <div class="past-speaker-date"><simpla-text class="past-speaker-date" placeholder="Date and Location2" sid="past_speaker_date2"></simpla-text></div>
                      <div class="past-speaker-notes"><simpla-text class="past-speaker-notes"  placeholder="Speaker notes2" sid="past_speaker_notes2"></simpla-text></div>
                      <div class="download-notes"><simpla-text class="download-notes"  placeholder="Download Speaker notes2" sid="download_notes2"></simpla-text></div>
                  </div>
                  <div id="past-event3">
                      <div class="topic-name"><simpla-text id="topic-name3" class="topic-name" placeholder="Topic Name3" sid="topic_name3"></simpla-text></div>
                      <div class="past-speaker-name"><simpla-text id="past-speaker-name3" class="past-speaker-name" placeholder="Speaker Name3" sid="past_speaker_name3"></simpla-text></div>
                      <div class="past-speaker-title"><simpla-text id="past-speaker-title3" class="past-speaker-title" placeholder="Speaker title and company3" sid="past_speaker_title3"></simpla-text></div>
                      <div class="past-speaker-date"><simpla-text id="past-speaker-date3" class="past-speaker-date" placeholder="Date and Location3" sid="past_speaker_date3"></simpla-text></div>
                      <div class="past-speaker-notes"><simpla-text id="past-speaker-notes3"  class="past-speaker-notes"  placeholder="Speaker notes3" sid="past_speaker_notes3"></simpla-text></div>
                      <div class="download-notes"><simpla-text id="download-notes3" class="download-notes"  placeholder="Download Speaker notes2" sid="download_notes3"></simpla-text></div>
                  </div>
                  <button class="del-event event-page-button" id="del-event" type="button" name="Del">This is the delete event button</button>
                </div>
              </div>
            </div>
            <div class="speaker-culture-email-container">
                        <div class="speaker-application-container">
                <h4 class="campo-speaker-signup blurb1">Interested in becoming a speaker?</h4>
                <p class="campo-speaker-signup blurb1">Lorem ipsum dolor sit amet, his illum dolorem appellantur cu. Laboramus instructior id vix. Te senserit persecuti cum, ea dicit nominavi signiferumque vix. Qui eirmod sententiae eu.</p>
                <form id="campo-speaker-signup-form" class="campo-speaker-signup-form" action="index.php" method="post">
                  <input id="name" name="name" type="text" class="campo-speaker-signup name-input" required placeholder="Enter your full name"></input>
                  <input id="email" name="email" type="text" class="campo-speaker-signup email-input" required placeholder="Enter your email address"></input>
                  <textarea placeholder="Tell us about yourself and what you would like the share." name="message" id="message" form="campo-speaker-signup-form"></textarea>
                  <input id="campo-speaker-send-email" class="event-page-button campo-speaker-send-email" type="submit" value="Send It"></input>
                </form>
                        </div>
                        <div class="culture-page-link-container">
                            <h4>Who is roboboogie?</h4>
                            <p>Commodo culpa deserunt excepteur Lorem irure cupidatat id do laborum dolore nulla aliquip exercitation. Lorem in nostrud nisi est irure aute ullamco qui. Dolor officia laborum anim est labore ea proident occaecat excepteur qui irure. Fugiat sit enim magna ea ipsum dolor non tempor nulla quis pariatur.</p>
                            <a href="/culture" class="blue-hover event-page-button">See what we do</a>
                        </div>
                        <div class="email-client-launch-container">
                            <h4>Questions?</h4>
                            <a href="mailto:darius@teamroboboogie.com" class="blue-hover event-page-button">Email us</a>
                        </div>
            </div>
          </div>
                    <div class="right-side">
                        <div class="calendar-content">
                            <h2>Upcoming<br> Events</h2>
                            <div id="upcomingEventsSidebar">
                                <div id="upcomingEventsDesktop" class="upcoming-events-desktop"></div>
                            </div>
                            <div id="event-response"></div>
                        </div>
            <div class="speaker-culture-email-container">
                        <div class="speaker-application-container">
                <h4 class="campo-speaker-signup blurb1">Interested in Presenting At Camp Optimization?</h4>
                <p class="campo-speaker-signup blurb1">Lorem ipsum dolor sit amet, his illum dolorem appellantur cu. Laboramus instructior id vix. Te senserit persecuti cum, ea dicit nominavi signiferumque vix. Qui eirmod sententiae eu.</p>
                <form id="campo-speaker-signup-form" class="campo-speaker-signup-form" action="index.php" method="post">
                  <input id="name" name="name" type="text" class="campo-speaker-signup name-input" required placeholder="Enter your full name"></input>
                  <input id="email" name="email" type="text" class="campo-speaker-signup email-input" required placeholder="Enter your email address"></input>
                  <textarea placeholder="Tell us about yourself and what you would like the share." name="message" id="message" form="campo-speaker-signup-form"></textarea>
                  <input id="campo-speaker-send-email" class="event-page-button campo-speaker-send-email" type="submit" value="Send It"></input>
                </form>
                        </div>
                        <div class="culture-page-link-container">
                            <h4>Who is roboboogie?</h4>
                            <p>Commodo culpa deserunt excepteur Lorem irure cupidatat id do laborum dolore nulla aliquip exercitation. Lorem in nostrud nisi est irure aute ullamco qui. Dolor officia laborum anim est labore ea proident occaecat excepteur qui irure. Fugiat sit enim magna ea ipsum dolor non tempor nulla quis pariatur.</p>
                            <a href="/culture" class="blue-hover event-page-button">See what we do</a>
                        </div>
                        <div class="email-client-launch-container">
                            <h4>Questions?</h4>
                            <a href="mailto:jesi@teamroboboogie.com" class="blue-hover event-page-button">Email us</a>
                        </div>
            </div>
          </div>
                </div>
            </div>
            <div class="row">
                    <link href="//cdn-images.mailchimp.com/embedcode/classic-10_7.css" rel="stylesheet" type="text/css">
                    <div id="mc_embed_signup" class="mc_embed_signup">
                    <form action="https://teamroboboogie.us6.list-manage.com/subscribe/post?u=d0f1f28f1474c98d098d99746&amp;id=00dbdf97aa" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate mc-embedded-subscribe-form" target="_blank" novalidate>
                            <div id="mc_embed_signup_scroll" class="mc_embed_signup_scroll">
                                <h2>Sign-up to get updates about Camp Optimization</h2><!--
                                --><div class="mc-field-group">
                                        <label for="mce-EMAIL"></label>
                                        <input placeholder="Enter your email address" type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL"><!--
                                --><div class="clear events-campo-signup-submit"><!--
                                    --><input type="submit" value="Sign up" name="subscribe" id="mc-embedded-subscribe" class="btn-light-blue button events-campo-signup-submit-button"><!--
                                --></div><!--
                            --></div><!--
                            --><div id="mce-responses" class="clear">
                                        <div class="response" id="mce-error-response" style="display:none"></div>
                                        <div class="response" id="mce-success-response" style="display:none"></div>
                                </div><!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups
                                --><div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_d0f1f28f1474c98d098d99746_00dbdf97aa" tabindex="-1" value=""></div>
                            </div>
                            <!--End mc_embed_signup-->
                    </form>
                    </div>
            </div>
            <div class="row">
                <div class="pre-footer-footer-container">
                    <div class="footer-overlay-events">
                        <div class="campo-footer-logo"><img class="camp-o-logo" src="lib/img/icons/campo_tile_logo.png"></div>
                        <div class="footer-blurbs">
                            <h4>"Science does not know its debt to imagination"</h4><!-- TODO quotes dont look right-->
                            <h5>- Ralph Waldo Emerson</h5>
                        </div>
                    </div>
                    <img src="lib/img/heroes/event_footer.jpg" alt="" />
                </div>
            </div>
        </div>
       <?php include "footer.inc.php" ?>
  </div>
    <?php include "script.inc.php" ?>
</body>
