
<!DOCTYPE html>
    <head>
      <meta charset="utf-8">
      <title> >Randompedia< </title>
      <meta name="description" content="">
      <meta name="author" content="">

      <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Raleway:400,300,600">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/skeleton/2.0.4/skeleton.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullPage.js/2.7.7/jquery.fullPage.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.2.3/animate.min.css">
      <style>
      /*--Text Color
      ----------------------------------------------->*/

      .txt-white {
        color: #fff;
      }


      /*--Text Alignment
      -----------------------------------*/

      .txt-center {
        text-align: center;
      }


      /*--Layouts
      ----------------------------------*/

      .intro {
        background-image: url("https://upload.wikimedia.org/wikipedia/commons/6/67/Inside_the_Batad_rice_terraces.jpg");
        background-position: center center;
        background-size: cover;
        transition: background 3s ease;
      }

      .intro:before {
        content: '';
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        background-image: linear-gradient(to right, rgba(255, 255, 255, 0.95) 50%, rgba(255, 255, 255, 0.8) 65%, rgba(220, 66, 37, 0.4) 100%);
      }

      input.choice {
        height: 50px;
        font-size: 9;
        white-space: normal;
        padding: 10px 8px;
        line-height: 18px;
      }

      .question {}

      .question:before {
        content: '';
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        background-image: linear-gradient(to bottom, rgba(255, 255, 255, 0.3) 50%, rgba(255, 255, 255, 1) 100%);
      }


      /*--
      Glass border -----------------*/

      .box {
        border: 5px solid transparent;
        background-clip: padding-box;
        box-shadow: 0 3px 9px black, inset 0 0 4px #999;
      }


      /*--Buttons
      ---------------------------------*/

      .choice-sp {
        margin: 50px 0 25px 0;
      }


      /*--Sections
      ---------------------------------*/

      .section.low {
        opacity: 0.8;
      }

      .box {
        background-color: #fff;
        padding: 10px;
        border-radius: 15px;
      }

      #fullpage {
        display: none;
      }

      .section {
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
      }

      .section {
        -webkit-animation-duration: 1.5s;
        -moz-animation-duration: 1.5s;
        -o-animation-duration: 1.5s;
        animation-duration: 1.5s;
      }


      /*-- Helpers
      ---------------------------------*/

      .hidden {
        visibility: hidden;
      }

      .wrong {
        color: red !important;
      }

      .correct {
        color: green !important;
      }


      /*--Responsive Layouts
      ----------------------------------*/


      /* Larger than mobile */

      @media (min-width: 400px) {
        .choice-sp {
          margin: 10px 0 5px 0;
        }
      }


      /* Larger than phablet */

      @media (min-width: 550px) {}


      /* Larger than tablet */

      @media (min-width: 750px) {}


      /* Larger than desktop */

      @media (min-width: 1000px) {
        .choice-sp {
          margin: 50px 0 25px 0;
        }
      }


      /* Larger than Desktop HD */

      @media (min-width: 1200px) {}

      </style>
    <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

    </head>
    <body>


        <div class="loader">Loading...</div>
        <!-- Primary Page Layout
        –––––––––––––––––––––––––––––––––––––––––––––––––– -->
        <div id="fullpage">
          <div class="section intro">
            <div class="container">
              <h1>Randompedia</h1>
              <h4>Koding Hackathon 2016 Participant</h4>

              <div class="row">
                <div class="one-half column">
                  <h4>Encyclopedic game about questions and answers</h4>
                  <p>It's an educational game you are supposed to answer the questions about universal culture from your mind. When you're ready then click "Ready?" button to begin. <br />
                    <small>Rules: Do not try to look the question up in wikipedia! </small> </p>
                  <a id="ready" class="button" href="#">Ready?</a>
                </div>
              </div>
            </div>
          </div>


        </div>


        <!-- End Document
        –––––––––––––––––––––––––––––––––––––––––––––––––– -->




<script>

var countQ = 0;
var newQ = 0;
var imgBgIntro = [];
var secs = 3;
var imgCount = 0;
var transImg = false;
var numBs = [];
//Firebase call API



  // Initialize Firebase
  var config = {
    apiKey: "AIzaSyA5kH-rbBGTWbgcldsOssFqrqewvQhmISM",
    authDomain: "dazzling-torch-8197.firebaseapp.com",
    databaseURL: "https://dazzling-torch-8197.firebaseio.com",
    projectId: "dazzling-torch-8197",
    storageBucket: "",
    messagingSenderId: "478974690366"
  };
  firebase.initializeApp(config);

var randompediaDB = firebase.database().ref();


$(window).on("load", function() {

  //Sort random questions

  ///Generate Random number, No duplicated.
  randompediaDB.on("value", function(snapshot) {
    //Fetch total of questions in DB
    //Sorry... too many queries
    totalQs = snapshot.val().length - 1;

    while (numBs.length <= totalQs) {
      var n = Math.round(Math.random() * totalQs);
      if (numBs.indexOf(n) == -1) numBs.push(n);
    }

  });

  //Cheater?
  // var maybeCheater = false;
  // function blurr(event){
  //     if (!maybeCheater) {
  //  maybeCheater = true;
  //  alert("Cheater?");
  // } else {
  //  window.removeEventListener('blur', blurr);
  // }
  // }
  // document.body.focus();
  // window.addEventListener('blur', blurr, false);

  ///Call DB to push URL in this array
  // for (var i = 0; i < numBs.length; i++) {
  //   randompediaDB.child(numBs[i]).on("value", function(snapshot) {
  //     imgBgIntro.push(snapshot.val().imgRef);
  //   });
  // }

  //Do crossfade for intro
  //   function animBG() {

  //     if (imgCount >= imgBgIntro.length-1) {
  //       imgCount = 0;
  //     } else {
  //       imgCount++;
  //     }

  //     imgs = imgBgIntro[imgCount];

  //     $(".intro").css('background-image', 'url(' + imgs + ')');
  //   }

  //needs to toggle
  //if(transImg === true){
  //window.setInterval(animBG, 7000);
  //}

  //After loader...
  $(".loader").remove();

  function fullpageInit() {
    $('#fullpage').fullpage({
      onLeave: callQ,
      afterLoad: slideAfter
    });

    //  Disable user input
    $.fn.fullpage.setMouseWheelScrolling(false);

    $.fn.fullpage.setKeyboardScrolling(false);
    $.fn.fullpage.setAllowScrolling(false);
  }

  fullpageInit();

  $("#fullpage").delay(600).fadeIn(1600, function() {
    //animBG();
    transImg = true;
  });

  //Next Question with BG image
  function callQ() {

    randompediaDB.child(numBs[countQ]).on("value", function(snapshot) {
      BGimg = snapshot.val().imgRef;
    }, function(error) {
      alert("Ugh! there is something wrong in this. Code: " + error);
    });

    $('.section').last().css('background-image', 'url(' + BGimg + ')');

    $('.section').waitForImages().done(function() {
      // All descendant images have loaded, now slide up.
      //alert("imageLoaded");

      $.fn.fullpage.moveSectionDown();
    });

  };

  function slideAfter(anchorLink, index) {
    if (index > 1) {
      //alert("load complete");

      $(".section").removeClass("hidden").addClass("animated fadeIn");

      $('.section').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {
        $(".box").last().removeClass("hidden").addClass("animated bounceInUp");
      });

    }

  };

  //rebuild page
  function rebuildPage() {

    //alert("apppend done");
    $.fn.fullpage.reBuild();
    fullpageInit();
    $.fn.fullpage.moveSectionDown();
  }

  //Disable scrolling input

  //$.fn.fullpage.setKeyboardScrolling(false);

  //Array of already seen questions
  //count of corrected answers
  //count of incorrected answers
  //count of unfocused browser
  //trigger to next question if browser is infocused (for some reason if he is looking up wikipedia)
  //

  //--After of Ready button
  $("#ready").click(function() {

    //need to call API to get random question
    //Apply CSS background in next question
    newQ++;
    nextQ();

  });

  //Backgound Img effect function

  //--Correct Function
  //--Generate another question Function
  //Next Question
  function nextQ() {

    //More DOMs = bad memory
    if ($(".question").length > 2) {
      $(".question").first().remove();
    }

    if (countQ == numBs.length - 1) {
      alert("All questions are completed! \n Thanks for your playing, I hope you have enjoyed it :) ");
      alert($(".question").length);
    }

    //clean answered question
    countQ++;

    $('.box').remove();

    randompediaDB.child(numBs[newQ]).on("value", function(snapshot) {

      $("#fullpage").append(

        '<div class="section hidden question">' +
        '<div class="container box hidden border-bot">' +
        '<p class="txt-center"><small><i>' + snapshot.val().category + '</i></small></p>' +
        '<h2 class="txt-center">' +
        snapshot.val().question +
        '</h2>' +
        '<div class="row txt-center">' +
        '<div class="six columns">' +
        '<input class="choice" type="button" value="' + snapshot.val().choice1 + '">' +
        '</div>' +
        '<div class="six columns">' +
        '<input class="choice" type="button" value="' + snapshot.val().choice2 + '">' +
        '</div>' +
        '</div>' +
        '<div class="row txt-center">' +
        '<div class="six columns">' +
        '<input class="choice" type="button" value="' + snapshot.val().choice3 + '">' +
        '</div>' +
        '<div class="six columns">' +
        '<input class="choice" type="button" value="' + snapshot.val().choice4 + '">' +
        '</div>' +
        '</div>' +
        '</div>' +
        '</div>'
      );
      $('.section').last().css('background-image', snapshot.val().imgRef);

      rebuildPage();

    }, function(errorObject) {
      console.log("The read failed: " + errorObject.code);

    });

    //     for(var s = 0; s < 4; s++){
    //    if ($('.choice:eq('+s+')').attr("value").length > 24) {
    //   $('input.choice').css("font-size", "8px");
    // }
    // else {
    //   $('input.choice').css("font-size", "11px");
    // }
    // }

  }

  //Click button event DELEGATION

  $(document).on("click", ".choice", function(e) {

    var btns = $(e.target)
    var userChoice = $(this).attr("value");
    //alert( $( this ).attr("value") );

    randompediaDB.child(numBs[countQ]).on("value", function(snapshot) {
      //alert("Real answer: " + snapshot.val().answer);

      if (userChoice == snapshot.val().answer) {
        //alert("It's correct");
        $(btns).addClass("correct animated swing");
        setTimeout(function() {
          newQ++;
          nextQ();

        }, 1600)

      } else {
        //alert("Not correct!")
        $(btns).addClass("wrong animated shake").prop("disabled");
      }

    });

  });

});


</script>
    </body>
</html>
