<?php
    require_once 'vendor/autoload.php';
    session_start();
/************************************************
 The following 3 values an befound in the setting
 for the application you created on Google
 Developers console.         Developers console.
 The Key file should be placed in a location
 that is not accessable from the web. outside of
 web root.

 In order to access your GA account you must
 Add the Email address as a user at the
 ACCOUNT Level in the GA admin.
 ************************************************/
    $client_id = '703640713dbca3d6b9d420513636545a22f0cc16';
    $Email_address = 'events-5-in-30@ambient-depth-133623.iam.gserviceaccount.com';
    $key_file_location = 'vendor/stuffs2.p12';

    $client = new Google_Client();
    $client->setApplicationName("5 in 30 Events");
    $key = file_get_contents($key_file_location);

    // separate additional scopes with a comma
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

    // var_dump($service);

/**
 * Handle contact form submission
 */
$leadName = isset($_POST['name']) ? $_POST['name'] : null;
$leadEmail = isset($_POST['email']) ? $_POST['email'] : null;
$leadWebsite = isset($_POST['website']) ? $_POST['website'] : null;
$leadCalendarDate = isset($_POST['calendar']) ? $_POST['calendar'] : null;
$leadAltDate = isset($_POST['date']) ? $_POST['date'] : null;
$leadAltTime = isset($_POST['time']) ? $_POST['time'] : null;
$leadMessage = isset($_POST['message']) ? $_POST['message'] : null;

if($leadName && $leadEmail && $leadMessage) {

    $emailContent = "Name: " . $leadName . " <br />";
    $emailContent .= "Email: " . $leadEmail . " <br />";
    $emailContent .= "Website: " . $leadWebsite . " <br />";
    $emailContent .= "Google Calendar Date and Time: " . $leadCalendarDate . " <br />";
    $emailContent .= "Alternate Date: " . $leadAltDate . " <br />";
    $emailContent .= "Alternate Time: " . $leadAltTime . " <br />";
    $emailContent .= "Message: " . $leadMessage . " <br />";

    $headers = "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
    $headers .= "X-Mailer: PHP/" . phpversion();
    $headers .= "From: hello@teamroboboogie.com \r\n";

    if(mail('john@teamroboboogie.com', 'Service Inquiry', $emailContent, $headers)) {
        mail('hello@teamroboboogie.com', 'Service Inquiry', $emailContent, $headers);
        $message = "Cool, we'll get right on it. We'll be in touch to confirm the presentation date.";
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
    <div id="body" class="five-in-thirty">
        <div class="hero">
            <div class="side-margin">
                <div class="left-box">
                    <div class="overlay"></div>
                    <div>
                        <h4>5 <span>IN</span> 30</h4>
                        <p><span>5</span> key optimization insights presented in <span>30</span> minutes or less</p>
                    </div>
                </div>
                <div class="right-headline">
                    <h1>We know we've got to give a little, to get a little.</h1>
                </div>
            </div>
        </div>
        <div class="container-fluid contact-container">
            <div class="row">
                <div class="side-margin">
                    <div class="left-side">
                        <!-- <h4 class="mobile">We know we've got to give a little, to get a little.</h4> -->
                        <h4 class="dark">Connect with us to receive a FREE optimization opportunity audit from our experts.</h4>
                        <p>Connect with us to receive a FREE optimization opportunity audit from our experts.
                        Whether just getting started in optimization, or looking to get more from your existing program, an outside perspective is extremely valuable.</p>
                        <p>Just say hello, and we'll unleash our top optimization strategists on your digital experience. Pick a time and we'll present our top five actionable findings and creative optimization ideas in 30 minutes or less.</p>
                        <p>We've helped our clients uncover millions of dollars in 'hidden' revenue through A/B testing, personalization, and user experience design, we are confident we can find some dollars for you too.</p>
                        <p>Don't worry, we'll keep it chill.</p>
                    </div>
                    <div class="right-side">
                        <p>Enter your info:</p>
                        <form method="post" id="contact-form" action="/5in30">
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
                                    <input placeholder="URL you want us to check out" type="text" id="website" name="website"/>
                                </div>
                                <p>Please choose a time that works for you:</p>
                                <div class="form-group">
                                    <label for="calendar">calendar</label>
                                    <input placeholder="Calendar" type="text" id="calendar" name="calendar"/>
                                    <ul>
                                        <li class="days" id="tuesdays">
                                            <p id="next-tuesday"></p>
                                            <div data-time="12:30">12:30</div>
                                            <div data-time="2:30">2:30</div>
                                            <div data-time="3:30">3:30</div>
                                        </li>
                                        <li class="days" id="wednesdays">
                                            <p id="next-wednesday"></p>
                                            <div data-time="12:30">12:30</div>
                                            <div data-time="2:30">2:30</div>
                                            <div data-time="3:30">3:30</div>
                                        </li>
                                        <li class="days" id="thursdays">
                                            <p id="next-thursday"></p>
                                            <div data-time="12:30">12:30</div>
                                            <div data-time="2:30">2:30</div>
                                            <div data-time="3:30">3:30</div>
                                        </li>
                                    </ul>
                                </div>
                                <p>Or, suggest an alternate time and we'll try to make it work:</p>
                                <div class="form-group date-time">
                                    <label for="date">date</label>
                                    <input placeholder="Date (mm/dd)" type="date" id="date" name="date"/>
                                    <label for="time">Time</label>
                                    <select name="time" id="time">
                                        <option value="time" disabled selected>Time</option>
                                        <option value="09:00">9:00am</option>
                                        <option value="09:30">9:30am</option>
                                        <option value="10:00">10:00am</option>
                                        <option value="10:30">10:30am</option>
                                        <option value="11:00">11:30am</option>
                                        <option value="12:00">12:00pm</option>
                                        <option value="12:30">12:30pm</option>
                                        <option value="01:00">1:00pm</option>
                                        <option value="01:30">1:30pm</option>
                                        <option value="02:00">2:00pm</option>
                                        <option value="02:30">2:30pm</option>
                                        <option value="03:00">3:00pm</option>
                                        <option value="03:30">3:30pm</option>
                                        <option value="04:00">4:00pm</option>
                                        <option value="04:30">4:30pm</option>
                                        <option value="05:00">5:00pm</option>
                                        <option value="05:30">5:30pm</option>
                                    </select>
                                </div>
                                <div class="t-gutter-md">
                                    <label for="message">Message</label>
                                    <textarea placeholder="Anything we should know? Specific focus areas, goals, or optimization objective that you want us to focus on?" name="message" id="message" form="contact-form"></textarea>
                                </div>
                            </div>
                            <div class="t-gutter-md col-md-12">
                                <button class="btn">Get yours!</button>
                            </div>
                        </form>
                        <div class="width-1-3 mobile-hide"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
        $myEvents = array();
        $eventObject = new stdClass();
        $calendarList  = $service->calendarList->listCalendarList();

        // var_dump($calendarList);

        while(true) {
            foreach ($calendarList->getItems() as $calendarListEntry) {

                echo $calendarListEntry->getSummary()."<br>\n";


                // get events
                $events = $service->events->listEvents($calendarListEntry->id);

                foreach ($events->getItems() as $event) {

                  $eventObject->startTime = $event->getStart()->dateTime;

                  $eventObject->endTime = $event->getEnd()->dateTime;

                  $eventObject->summary = $event->getSummary();
                    echo "-----".$event->getStart()->dateTime."<br>";
                    echo
                    "-----".$event->getEnd()->dateTime."<br>";
                    echo
                    "-----".$event->getSummary()."<br>";
                    $myEvents[] = $eventObject;
                    var_dump($event);
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
        myEvents = <?php echo json_encode($myEvents, JSON_PRETTY_PRINT) ?>;
        console.log("My Events:", myEvents);
    </script>
    <?php include "footer.inc.php" ?>
    <?php include "script.inc.php" ?>
</body>
