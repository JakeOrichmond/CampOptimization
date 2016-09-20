var clientId = '116600611530-4e5q1okr4h90neo4o67qm949fp4cf7ne.apps.googleusercontent.com';
var apiKey = 'AIzaSyBsYyfV35epC8rYabeR32I0fZdFBLjSXpE';
var scopes = 'https://www.googleapis.com/auth/calendar';
var resource;

function handleClientLoad() {
  gapi.client.setApiKey(apiKey);
  window.setTimeout(checkAuth,1);
  checkAuth();
}

function checkAuth() {
  gapi.auth.authorize({client_id: clientId, scope: scopes, immediate: true},
      handleAuthResult);
}

function handleAuthResult(authResult) {
  var authorizeButton = document.getElementById('saveTheDateButton');
  if (authResult) {
    addEvent(resource);
  } else {
    authorizeButton.onclick = handleAuthClick;
    // console.log("RES:", resource)
    addEvent(resource);
   }
}

function handleAuthClick(event) {
  gapi.auth.authorize(
      {client_id: clientId, scope: scopes, immediate: false},
      handleAuthResult);
  return false;
}


function addEvent(resource) {

  gapi.client.load('calendar', 'v3', function() {
    var request = gapi.client.calendar.events.insert({
      'calendarId':		'primary',
      "resource":			resource
    });
    request.execute(function(resp) {
      if(resp.status=='confirmed') {
        window.open(resp.htmlLink, '_blank');
      } else {
        alert("Unable to add event to your calendar, please check your Google credentials and try again.");
      }
    });
  });
}

$(function() {

  var upcomingEvents = [];
  events.reverse();
  for (i = 0; i < events.length; i++) {
    upcomingEvents.push(events[i]);
  }
  displayEvents(upcomingEvents);

  var modalContent = document.getElementById('modal-content');

  $("div").on("click", "#saveTheDateButton", function(event){
    event.stopPropagation();

    var dataSplit = this.getAttribute("data-rsvp-button").split("-");
    var clickedEventNumber = dataSplit.splice(1,1);
    clickedEvent = upcomingEvents[clickedEventNumber];

    resource = {
      "summary": clickedEvent.summary,
      "location": clickedEvent.location,
      "start": {
        "dateTime": clickedEvent.startTime,
      },
      "end": {
        "dateTime": clickedEvent.endTime
      }
    };
  });

  if(window.location.href.indexOf("edit") != -1){
   $("#del-event").css("display", "block");
  } else {
    //TODO this will not work with slower connections
    var maxTries  = 0;
    var textTries = 5;
    var showAnyLateLoadingBlocks = function() {
      $.each( $('.past-event > div'), function(i,v) {
        if ( $(v).text().trim() !== '') {
          $(v).removeClass('hide');        }
      });
      if ( textTries > 0 ) {
        textTries--;
        setTimeout(showAnyLateLoadingBlocks, 400);
      }
    };
    var hideEmptySimplaBlocks = function() {
      $.each( $('.past-event > div'), function(i,v) {
        if ( $(v).text().trim() === '') {
          $(v).addClass('hide');
        }
      });
      showAnyLateLoadingBlocks();
    };
    var checkIfSimplaIsLoaded = function() {
      var textPresent = false;
      $.each( $('.past-event > div'), function(i,v) {
        if ( $(v).text().trim() !== '') {
          textPresent = true;
        }
      });
      if ( textPresent ) {
        hideEmptySimplaBlocks();
      } else if (maxTries = 100) {
        maxTries++;
        setTimeout(checkIfSimplaIsLoaded, 100);
      } else {
        hideEmptySimplaBlocks();
      }
    };
    checkIfSimplaIsLoaded();
  }
  $(window).on('hashchange', function(e){
    if(window.location.href.indexOf("edit") != -1){
      $("#del-event").css("display", "block")
    } else {
      checkIfSimplaIsLoaded();
    }
  });
  var setTextFields = function(simplaTextFieldsInFirstBlock, simplaTextFieldsInSecondBlock, simplaTextFieldsInThirdBlock){
    for (var i = 0; i < simplaTextFieldsInSecondBlock.length; i++) {
        // copy two to three
        Simpla('S1RXX0Hn').set($(simplaTextFieldsInThirdBlock[i]).attr("sid"), {
          text: $(simplaTextFieldsInSecondBlock[i]).html()
        }).then(function(){});

        // one to two
        Simpla('S1RXX0Hn').set($(simplaTextFieldsInSecondBlock[i]).attr("sid"), {
          text: $(simplaTextFieldsInFirstBlock[i]).html()
        }).then(function(){});

        // clear one
        Simpla('S1RXX0Hn').set($(simplaTextFieldsInFirstBlock[i]).attr("sid"), {
          text: $(simplaTextFieldsInThirdBlock[i]).html() // TODO "" for production
        }).then(function(){});
      }
  };

  $("#del-event").off().click(function(){
    var pastEventBlocks = $(".past-event").children("div");
    var simplaTextFieldsInFirstBlock = $(pastEventBlocks[0]).find("simpla-text");
    var simplaTextFieldsInSecondBlock = $(pastEventBlocks[1]).find("simpla-text");
    var simplaTextFieldsInThirdBlock = $(pastEventBlocks[2]).find("simpla-text");
    setTextFields(simplaTextFieldsInFirstBlock, simplaTextFieldsInSecondBlock, simplaTextFieldsInThirdBlock);
    window.location.reload();
  })
})
