function  displayEvents(events) {
  var days = ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"];
  var months =
  ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
  var eventTypeLabel;
  console.log(events);
  for(i = 0; i < 3; i++) {
    if (i === 0) {
      var nextEvent = events[i];
      var event = events[i];
    } else {
      var event = events[i];
    }
    var eventStart = new Date(event.startTime);
    var nextEventStart = new Date(nextEvent.startTime);
    var eventFinish = new Date(event.endTime);
    var nextEventFinish = new Date(nextEvent.endTime);
    var eventStartDay = eventStart.getDate();
    var nextEventStartDay = nextEventStart.getDate();
    var eventStartDayName = days[eventStart.getDay()];
    var nextEventStartDayName = days[nextEventStart.getDay()];
    var eventStartMonth = months[eventStart.getMonth()];
    var nextEventStartMonth = months[nextEventStart.getMonth()];
    var eventType;
    if(event.location == null) {
      eventLocation = "TBD";
      // eventStreetAdress = "TBD";
      // eventCity = "TBD";
      // eventState = "TBD";
      // eventCountry = "TBD";
    } else if (event.location != null) {
      eventLocation = event.location.split(",");
      eventType = eventLocation[0];
      eventVenue = eventLocation[1];
      eventStreetAdress = eventLocation[2];
      eventCity = eventLocation[3];
      eventState = eventLocation[4];
      eventCountry = eventLocation[5];
    }
    console.log(eventType, eventVenue, eventStreetAdress, eventCity, eventState, eventCountry);
    if(nextEventStart.getHours() > 12 && nextEventStart.getMinutes() === 0) {
      var nextEventStartHour = nextEventStart.getHours() - 12;
      var nextEventStartMinute = "00";
    } else if(nextEventStart.getHours() > 12 && nextEventStart.getMinutes() != 0) {
      var nextEventStartHour = nextEventStart.getHours() - 12;
      var nextEventStartMinute = "" + nextEventStart.getMinutes();
    } else if (nextEventStart.getHours() < 12 && nextEventStart.getMinutes() === 0) {
      var nextEventStartHour = nextEventStart.getHours();
      var nextEventStartMinute = "00";
    } else if(nextEventStart.getHours() < 12 && nextEventStart.getMinutes() != 0) {
      var nextEventStartHour = nextEventStart.getHours();
      var nextEventStartMinute = "" + nextEventStart.getMinutes();
    }

    if(nextEventFinish.getHours() > 12 && nextEventFinish.getMinutes() === 0) {
      var nextEventFinishHour = nextEventFinish.getHours() - 12;
      var nextEventFinishMinute = "00pm";
    } else if(nextEventFinish.getHours() < 12 && nextEventFinish.getMinutes() != 0) {
      var nextEventFinishHour = nextEventFinish.getHours();
      var nextEventFinishMinute = "" + nextEventFinish.getMinutes() + "am";
    } else if(nextEventFinish.getHours() > 12 && nextEventFinish.getMinutes() != 0) {
      var nextEventFinishHour = nextEventFinish.getHours() - 12;
      var nextEventFinishMinute = "" + nextEventFinish.getMinutes() + "pm";
    } else if (nextEventFinish.getHours() < 12 && nextEventFinish.getMinutes() === 0){
      var nextEventFinishHour = nextEventFinish.getHours();
      var nextEventFinishMinute = "00am";
    }

    var nextEventStartTime = nextEventStartHour.toString() + ":" + nextEventStartMinute;
    var nextEventFinishTime = nextEventFinishHour.toString() + ":" + nextEventFinishMinute

    var nextEventTimeframe = nextEventStartTime + "-" + nextEventFinishTime;

    //Training_Icon
    var eventTypeIconTraining = "<?xml version=\"1.0\" encoding=\"UTF-8\" standalone=\"no\"?>"
      +"<svg width=\"80px\" height=\"80px\" viewBox=\"0 0 80 80\" version=\"1.1\" xmlns=\"http:\/\/www.w3.org\/2000\/svg\" xmlns:xlink=\"http:\/\/www.w3.org\/1999\/xlink\">"
      +"    <!-- Generator: Sketch 39.1 (31720) - http:\/\/www.bohemiancoding.com\/sketch -->"
      +"    <title>Training_Icon<\/title>"
      +"    <desc>Created with Sketch.<\/desc>"
      +"    <defs><\/defs>"
      +"    <g id=\"Page-1\" stroke=\"none\" stroke-width=\"1\" fill=\"none\" fill-rule=\"evenodd\">"
      +"        <g id=\"Training_Icon\">"
      +"            <g id=\"Swiss_Army_Knife\">"
      +"                <g id=\"Group\">"
      +"                    <circle id=\"Oval\" fill=\"#5DC7C7\" cx=\"40\" cy=\"40\" r=\"40\"><\/circle>"
      +"                    <path d=\"M42.9021918,29.1730571 L40.7257534,29.1730571 L40.7257534,27.0585429 C40.7257534,25.8902571 39.7863014,24.9432 38.6282192,24.9432 C37.470137,24.9432 36.5315068,25.8902571 36.5315068,27.0585429 L36.5315068,29.1730571 L34.3542466,29.1730571 C33.1961644,29.1730571 32.2575342,30.1192857 32.2575342,31.2875714 C32.2575342,32.4558571 33.1961644,33.4012571 34.3542466,33.4012571 L36.5315068,33.4012571 L36.5315068,35.5166 C36.5315068,36.6848857 37.470137,37.6302857 38.6282192,37.6302857 C39.7871233,37.6302857 40.7257534,36.6840571 40.7257534,35.5166 L40.7257534,33.4012571 L42.9021918,33.4012571 C44.0610959,33.4012571 44.999726,32.4550286 44.999726,31.2875714 C44.999726,30.1192857 44.060274,29.1730571 42.9021918,29.1730571 L42.9021918,29.1730571 Z\" id=\"Shape\" fill=\"#FFFFFF\"><\/path>"
      +"                    <path d=\"M69.8076712,58.5252 L51.6112329,18.7662 C49.8268493,14.2248 45.4369863,11 40.3041096,11 L36.9490411,11 C30.2413699,11 24.7838356,16.5017143 24.7838356,23.2645143 L24.7838356,29.5732571 C21.6934247,26.2167143 18.4871233,25.355 16.0345205,25.355 C13.7224658,25.355 12.1361644,26.1396571 11.9627397,26.2291429 C10.9624658,26.7461714 10.5432877,27.9658286 11.0142466,28.9957429 L13.9747945,35.476 C14.3175342,36.2242 15.0589041,36.7039429 15.8758904,36.7056 C16.9336986,36.7089143 17.7942466,37.5772571 17.7942466,38.6436286 C17.7942466,39.2095429 17.5394521,39.6304571 17.3249315,39.884 C16.7964384,40.5112286 16.6764384,41.3903429 17.0175342,42.1385429 C17.0175342,42.1385429 23.7063014,56.6294286 25.9484932,61.4525429 C27.8865753,65.6210857 32.0882192,68.5128 36.9490411,68.5128 L40.3049315,68.5128 C47.0126027,68.5128 52.470137,63.0119143 52.470137,56.2491143 L52.470137,56.2482857 C54.7032877,58.9519143 57.2126027,60.7764286 59.9750685,61.6895143 C61.4084932,62.1634571 62.7506849,62.3333143 63.9367123,62.3333143 C66.7953425,62.3333143 68.7441096,61.3498 68.8575342,61.2918 C69.8586301,60.7756 70.2778082,59.5551143 69.8076712,58.5252 L69.8076712,58.5252 Z M24.7838356,48.5160571 L21.3136986,41.4309429 C21.7542466,40.5684 21.9893151,39.6130571 21.9893151,38.6436286 C21.9893151,35.7428 19.9863014,33.2985143 17.3010959,32.6472571 L15.9021918,29.5848571 C15.9457534,29.5832 15.9893151,29.5832 16.0345205,29.5832 C19.2219178,29.5832 22.3936986,32.0183714 24.7838356,36.6326857 L24.7838356,48.5160571 L24.7838356,48.5160571 Z M40.3049315,64.2837714 L36.9490411,64.2837714 C32.5542466,64.2837714 28.9789041,60.6794857 28.9789041,56.2491143 L28.9789041,23.2636857 C28.9789041,18.8324857 32.5550685,15.2282 36.949863,15.2282 L40.3049315,15.2282 C44.699726,15.2282 48.2758904,18.8333143 48.2758904,23.2628571 L48.2767123,56.2491143 C48.2758904,60.6794857 44.7005479,64.2837714 40.3049315,64.2837714 L40.3049315,64.2837714 Z M52.4709589,48.4671714 L52.470137,30.6810571 L64.9715068,58.0487714 C62.1975342,58.3785429 57.0087671,57.5093714 52.4709589,48.4671714 L52.4709589,48.4671714 Z\" id=\"Shape\" fill=\"#FFFFFF\"><\/path>"
      +"                <\/g>"
      +"            <\/g>"
      +"        <\/g>"
      +"    <\/g>"
      +"<\/svg>";

    //cofee cup and stuff
    var eventTypeIconParty = "<?xml version=\"1.0\" encoding=\"UTF-8\" standalone=\"no\"?>"
      + "<svg width=\"80px\" height=\"80px\" viewBox=\"0 0 80 80\" version=\"1.1\" xmlns=\"http:\/\/www.w3.org\/2000\/svg\" xmlns:xlink=\"http:\/\/www.w3.org\/1999\/xlink\">"
      + "    <!-- Generator: Sketch 39.1 (31720) - http:\/\/www.bohemiancoding.com\/sketch -->"
      + "    <title>event_icon<\/title>"
      + "    <desc>Created with Sketch.<\/desc>"
      + "    <defs><\/defs>"
      + "    <g id=\"Page-1\" stroke=\"none\" stroke-width=\"1\" fill=\"none\" fill-rule=\"evenodd\">"
      + "        <g id=\"event_icon\">"
      + "            <circle id=\"Oval\" fill=\"#5DC7C7\" cx=\"40\" cy=\"40\" r=\"40\"><\/circle>"
      + "            <path d=\"M39.6677778,45.0280556 L21.37,45.0280556 C20.4878785,45.0280556 19.7727778,45.7431563 19.7727778,46.6252778 C19.7727778,47.5073993 20.4878785,48.2225 21.37,48.2225 L21.8044444,48.2225 L21.8044444,48.6505556 L20.6927778,48.6505556 C18.6547714,48.6540724 17.0035168,50.305327 17,52.3433333 L17,54.5347222 C17.0035168,56.5727286 18.6547714,58.2239832 20.6927778,58.2275 L21.8363889,58.2275 C22.1149496,60.6179787 24.138348,62.4217409 26.545,62.425 L34.4863889,62.425 C37.1030663,62.4214806 39.223425,60.3011218 39.2269444,57.6844444 L39.2269444,48.2225 L39.6613889,48.2225 C40.5435104,48.2242642 41.2600413,47.5105937 41.2618056,46.6284722 C41.2635698,45.7463507 40.5498993,45.0298198 39.6677778,45.0280556 L39.6677778,45.0280556 Z M21.7788889,55.0330556 L20.6927778,55.0330556 C20.4189952,55.0296113 20.1978887,54.8085048 20.1944444,54.5347222 L20.1944444,52.3433333 C20.1944444,52.0645829 20.4204163,51.8386111 20.6991667,51.8386111 L21.8044444,51.8386111 L21.8044444,55.0330556 L21.7788889,55.0330556 Z M36.0388889,57.6780556 C36.0388889,58.5354776 35.343811,59.2305556 34.4863889,59.2305556 L26.545,59.2305556 C25.6875779,59.2305556 24.9925,58.5354776 24.9925,57.6780556 L24.9925,48.2225 L36.0388889,48.2225 L36.0388889,57.6780556 L36.0388889,57.6780556 Z\" id=\"Shape\" fill=\"#FFFFFF\"><\/path>"
      + "            <path d=\"M26.0913889,42.3958333 C26.9735104,42.3958333 27.6886111,41.6807326 27.6886111,40.7986111 L27.6886111,33.4513889 C27.6886111,32.5692674 26.9735104,31.8541667 26.0913889,31.8541667 C25.2092674,31.8541667 24.4941667,32.5692674 24.4941667,33.4513889 L24.4941667,40.7986111 C24.4941667,41.6807326 25.2092674,42.3958333 26.0913889,42.3958333 L26.0913889,42.3958333 Z\" id=\"Shape\" fill=\"#FFFFFF\"><\/path>"
      + "            <path d=\"M36.0580556,42.3958333 C36.940177,42.3958333 37.6552778,41.6807326 37.6552778,40.7986111 L37.6552778,33.4513889 C37.6552778,32.5692674 36.940177,31.8541667 36.0580556,31.8541667 C35.1759341,31.8541667 34.4608333,32.5692674 34.4608333,33.4513889 L34.4608333,40.7986111 C34.4608333,41.6807326 35.1759341,42.3958333 36.0580556,42.3958333 L36.0580556,42.3958333 Z\" id=\"Shape\" fill=\"#FFFFFF\"><\/path>"
      + "            <path d=\"M31.0555556,38.7222222 C31.937677,38.7222222 32.6527778,38.0071215 32.6527778,37.125 L32.6527778,29.7777778 C32.6527778,28.8956563 31.937677,28.1805556 31.0555556,28.1805556 C30.1734341,28.1805556 29.4583333,28.8956563 29.4583333,29.7777778 L29.4583333,37.125 C29.4583333,38.0071215 30.1734341,38.7222222 31.0555556,38.7222222 L31.0555556,38.7222222 Z\" id=\"Shape\" fill=\"#FFFFFF\"><\/path>"
      + "            <path d=\"M61.4027778,33.7963889 L59.8502778,33.7963889 L59.8502778,31.7327778 L61.4027778,31.7327778 C62.2848993,31.7327778 63,31.017677 63,30.1355556 C63,29.2534341 62.2848993,28.5383333 61.4027778,28.5383333 L59.8502778,28.5383333 L59.8502778,21.7405556 C59.8467584,19.1238782 57.7263996,17.0035194 55.1097222,17 L46.1652778,17 C43.5461081,17.0035251 41.4247198,19.1277724 41.4247222,21.7469444 L41.4247222,60.8277778 C41.4247222,61.7098993 42.139823,62.425 43.0219444,62.425 L58.2530556,62.425 C59.135177,62.425 59.8502778,61.7098993 59.8502778,60.8277778 L59.8502778,36.9844444 L61.4027778,36.9844444 C62.2440107,36.9311602 62.8990333,36.2333354 62.8990333,35.3904167 C62.8990333,34.5474979 62.2440107,33.8496731 61.4027778,33.7963889 L61.4027778,33.7963889 Z M56.6622222,59.2305556 L44.6319444,59.2305556 L44.6319444,36.9844444 L56.6622222,36.9844444 L56.6622222,59.2305556 L56.6622222,59.2305556 Z M56.6622222,33.79 L44.6319444,33.79 L44.6319444,31.7327778 L56.6622222,31.7327778 L56.6622222,33.7963889 L56.6622222,33.79 Z M56.6622222,28.5383333 L44.6319444,28.5383333 L44.6319444,21.7469444 C44.6319444,20.8895224 45.3270224,20.1944444 46.1844444,20.1944444 L55.1288889,20.1944444 C55.986311,20.1944444 56.6813889,20.8895224 56.6813889,21.7469444 L56.6813889,28.5447222 L56.6622222,28.5383333 Z\" id=\"Shape\" fill=\"#FFFFFF\"><\/path>"
      + "        <\/g>"
      + "    <\/g>"
      + "<\/svg>";

    var eventTypeIconMeetup = "?xml version=\"1.0\" encoding=\"UTF-8\" standalone=\"no\"?>"
      + "<svg width=\"65px\" height=\"65px\" viewBox=\"0 0 65 65\" version=\"1.1\" xmlns=\"http:\/\/www.w3.org\/2000\/svg\" xmlns:xlink=\"http:\/\/www.w3.org\/1999\/xlink\">"
      + "    <!-- Generator: Sketch 39.1 (31720) - http:\/\/www.bohemiancoding.com\/sketch -->"
      + "    <title>_Campfire<\/title>"
      + "    <desc>Created with Sketch.<\/desc>"
      + "    <defs><\/defs>"
      + "    <g id=\"Page-1\" stroke=\"none\" stroke-width=\"1\" fill=\"none\" fill-rule=\"evenodd\">"
      + "        <g id=\"_Campfire\">"
      + "            <path d=\"M32.5,65 C50.4492544,65 65,50.4492544 65,32.5 C65,14.5507456 50.4492544,0 32.5,0 C14.5507456,0 0,14.5507456 0,32.5 C0,50.4492544 14.5507456,65 32.5,65 Z\" id=\"Oval\" fill=\"#5DC7C7\"><\/path>"
      + "            <path d=\"M51.9682214,43.4544993 L50.1887875,35.3650909 C50.1099729,35.0075839 49.88907,34.6944944 49.5743666,34.4962405 C49.2596633,34.2979867 48.8766909,34.2297353 48.5103695,34.3061118 L45.4310497,34.9534162 C46.1265053,33.5179714 46.549995,31.9433155 46.6410204,30.3107002 C46.9202017,25.3001855 43.5977777,16.1880903 33.4923026,13.0642375 C33.0332908,12.9228597 32.5332066,13.0181949 32.163555,13.3172008 C31.7933484,13.6167483 31.6046374,14.0793407 31.6629158,14.5446415 C31.667356,14.5782255 32.0336774,17.9810421 30.2664542,20.1369177 L29.9012429,20.5881348 C29.5149404,21.0664359 29.1547243,21.5122363 28.7484406,21.9331195 C28.4481681,20.7175957 28.5863711,19.6011988 28.5880362,19.5887403 C28.6540851,19.1201894 28.4692593,18.6505552 28.0984977,18.3461326 C27.728291,18.0411683 27.2232115,17.942583 26.7614246,18.0855858 C18.7728431,20.5545508 16.1697411,28.1786585 16.4061849,32.4048246 C16.441707,33.0467122 16.544388,33.683183 16.7020172,34.3039451 L16.4899948,34.2595276 C16.1247835,34.1826094 15.7412561,34.2508607 15.4259977,34.4491146 C15.1112943,34.6479102 14.8898364,34.960458 14.8115768,35.3185066 L13.0315879,43.4084567 C12.8684084,44.1527213 13.3535067,44.8861524 14.1161212,45.0459471 L15.2278511,45.2794101 L16.4661284,50.9101453 C16.544943,51.2676523 16.766401,51.5802001 17.0811043,51.7789957 C17.3114428,51.9241652 17.5778583,52 17.8481591,52 C17.9475099,52 18.0468607,51.9897081 18.1451015,51.9685827 L32.608691,48.9303149 L46.8547078,51.9225401 C46.9529486,51.9425822 47.0522994,51.9528741 47.1516502,51.9528741 C47.4213959,51.9528741 47.6883665,51.8775809 47.918705,51.7324114 C48.2334083,51.5341575 48.4548663,51.2210681 48.5331258,50.8641028 L49.7503119,45.3303277 L50.8842431,45.0919897 C51.6468576,44.9316532 52.131956,44.1987639 51.9682214,43.4544993 L51.9682214,43.4544993 Z M32.1213725,22.2927932 L32.4732631,21.8594514 C33.9019165,20.1163339 34.3603733,17.9604584 34.4847005,16.3814691 C41.2688617,19.3715277 44.049019,26.0216996 43.8186806,30.160114 C43.7021238,32.256405 42.9023221,34.2254019 41.5696892,35.7637654 L33.6388312,37.429423 C34.6883974,35.9148933 35.2389896,34.1208582 35.1696105,32.2780721 C35.0685946,29.6048948 32.7951819,27.1770972 30.9685702,25.225434 C30.7021547,24.9410534 30.4440646,24.6653397 30.2037356,24.4010012 C30.9791159,23.7033208 31.5591247,22.9899319 32.1213725,22.2927932 L32.1213725,22.2927932 Z M25.7973333,21.4374848 C25.9394216,22.6481335 26.3429301,24.1507463 27.3769555,25.4112293 C27.813766,25.9436981 28.3327213,26.4983756 28.8822034,27.0855538 C30.3968869,28.7040854 32.282887,30.7185832 32.3456056,32.3793658 C32.4144297,34.1788177 31.5968669,35.9132683 30.1504525,37.1287921 L19.9411863,34.9842918 C19.5321275,34.1349418 19.2801427,33.2059653 19.2268596,32.2542383 C19.0831062,29.6628542 20.568928,24.0326606 25.7973333,21.4374848 L25.7973333,21.4374848 Z M18.9332475,48.9823159 L18.2588831,45.9158809 L25.8939089,47.5197873 L18.9332475,48.9823159 L18.9332475,48.9823159 Z M46.0671168,48.9362733 L16.0914816,42.6398167 L17.2775858,37.2463361 L47.2532211,43.5433344 L46.0671168,48.9362733 L46.0671168,48.9362733 Z M39.3251382,39.0560798 L47.7227785,37.2929203 L48.536456,40.9920344 L39.3251382,39.0560798 L39.3251382,39.0560798 Z\" id=\"Shape\" fill=\"#FFFFFF\"><\/path>"
      + "        <\/g>"
      + "    <\/g>"
      + "<\/svg>";

    if (eventType === "Event") {
      var eventTypeIcon = eventTypeIconParty;
      console.log("Event");
    } else if (eventType === "Training") {
      eventTypeIcon = eventTypeIconTraining;
      console.log("Training");
    } else if (eventType === "Meetup"){
      eventTypeIcon = eventTypeIconMeetup;
      console.log("Meetup");
    } else {
      eventTypeIcon = eventTypeIconParty;
      console.log("ELSE");
    }

    $("#upcomingEventsDesktop").append(
      "<div id='upcomingEvent' class='upcoming-event'>" +
        eventTypeIcon +
        "<p class='event-type'>" + eventType + "</p>" +
        "<p class='event-start-time'>" + eventStartDayName + "</p>" +
        "<p class='event-start-day'>" + eventStartDay + "</p>" +
        "<p class='event-start-month'>" + eventStartMonth + "</p>" +
        "<p class='event-summary'><strong>TOPIC: </strong>" + event.summary + "</p>" +
        "<button id='saveTheDateButton' class='event-page-button' data-toggle='modal' data-rsvp-button='rsvp-" + [i] + "'type='button' onclick='handleAuthClick(event)'>Save the Date</button>" +
        "</div>" +
        "<hr>");
    $("#upcomingEventsMobile").append(
      "<div id='upcomingEvent' class='upcoming-event'>" +
        eventTypeIcon +
        "<p class='event-type'>" + eventType + "</p>" +
        "<p class='event-start-time'>" + eventStartDayName + "</p>" +
        "<p class='event-start-day'>" + eventStartDay + "</p>" +
        "<p class='event-start-month'>" + eventStartMonth + "</p>" +
        "<p class='event-summary'><strong>TOPIC: </strong>" + event.summary + "</p>" +
        "<button id='saveTheDateButton' class='event-page-button' data-toggle='modal' data-rsvp-button='rsvp-" + [i] + "'type='button' onclick='handleAuthClick(event)'>Save the Date</button>" +
        "<hr>" +
      "</div>");
  }
  $("#day-of-week-div").append("<p id='day-of-week' class='day-of-week'>" + nextEventStartDayName + "</p>");
  $("#day-of-month-div").append("<p id='day-of-month' class='day-of-month'>" + nextEventStartDay + "</p>");
  $("#month-div").append("<p id='month' class='month'>" + nextEventStartMonth + "</p>");
  $("#time-of-day-div").append("<p id='time-of-day' class='time-of-day'>" + nextEventTimeframe + "</p>");
  if(eventLocation === "TBD") {
    $("#venue-div").append("<p id='venue' class='venue'>TBD</p>");
  } else {
    $("#venue-div").append("<p id='venue' class='venue'>" + eventVenue + "</p>");
    $("#address-div").append("<p id='address' class='address'>" + eventStreetAdress + "</p>");
    $("#city-state-zip-div").append("<p id='city-state-zip' class='city-state-zip'>" + eventCity + " " + eventState + "</p>");
  }
}
