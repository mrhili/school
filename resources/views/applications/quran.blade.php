<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Mouqadass </title>


    <link href="{!! asset('applications/quran/css/bootstrap.min.css') !!}" rel="stylesheet" />
    <link href="{!! asset('applications/quran/css/font-awesome.min.css') !!}" rel="stylesheet" />
    <link href="{!! asset('applications/quran/css/animate.min.css') !!}" rel="stylesheet" />
    <link href="{!! asset('applications/quran/css/prettyPhoto.css') !!}" rel="stylesheet" />
    <link href="{!! asset('applications/quran/css/main.css') !!}" rel="stylesheet" />
    <link href="{!! asset('applications/quran/css/responsive.css') !!}" rel="stylesheet" />
    <link href="{!! asset('applications/quran/css/mod.css') !!}" rel="stylesheet" />

    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
    <link href="https://fonts.googleapis.com/css?family=Amiri" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Markazi+Text:500&amp;subset=arabic" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/nprogress/0.2.0/nprogress.min.css" />

  </head>
  <body class="homepage">
    <header id="header">
      <div class="top-bar">
        <div class="container">
          <div class="row">
            <div class="col-sm-6 col-xs-4">
              <div class="top-number">
                <p><i class="fa fa-phone-square"></i> +0123 456 70 90</p>
              </div>
            </div>
            <div class="col-sm-6 col-xs-8">
              <div class="social">
                <ul class="social-share">
                  <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                  <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                  <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                  <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                  <li><a href="#"><i class="fa fa-skype"></i></a></li>
                </ul>
                <div class="search">
                  <form role="form">
                    <input type="text" class="search-form" autocomplete="off" placeholder="Search">
                    <i class="fa fa-search"></i>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <nav class="navbar navbar-inverse" role="banner">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.html"><img src="images/logo.png" alt="logo"></a>
          </div>
          <div class="collapse navbar-collapse navbar-right">
            <ul class="nav navbar-nav">
              <li class="active"><a href="index.html">Aya</a></li>

            </ul>
          </div>
        </div>
      </nav>
    </header>
    <section id="partner">
      <div class="container">
        <div class="center wow fadeInDown">
        <div class="col-xs-12">
          <div id="sajda" class="col-xs-6">

          </div>
          <div class="col-xs-6">
          </div>

        </div>

          <h2 class="quran">أعوذ بالله من الشيطان الرجيم | <span id="aya-number-read">0</span> </h2>
          <!--
          بِسْمِ اللَّهِ الرَّحْمَنِ الرَّحِيم أو
          -->
          <hr class="style18">
          <br />

          <h1 id="aya-display" class="quran"></h1>
          <hr class="style18">
          <br />
          <p class="lead" id="translation-display"></p>
          <button id="last" class="btn btn-success pull-left gen"><i class="fa fa fa-caret-left"></i> last</button>

          <button class="btn btn-default" id="speech">
                    <i class="fa fa-volume-up"></i> Read Translation
          </button>

          <button class="btn btn-default " id="stop">
                    <i class="fa fa-volume-off"></i> Stop Recitation
          </button>

          <button class="btn btn-default " id="recite">
                    <i class="fa fa-volume-up"></i> Recite Quran
          </button>



          <button class="btn btn-default cp" data-clipboard-target="#aya-display">
                    <i class="fa fa-clipboard"></i> copy Aya
          </button>
          <button class="btn btn-default cp" data-clipboard-target="#translation-display">
                    <i class="fa fa-clipboard"></i> copy Translation
          </button>
          <button id="random-aya" class="btn btn-success gen">Random Aya</button>


          <button id="next" class="btn btn-success pull-right gen" data-item="1">next <i class="fa fa fa-caret-right"></i></button>
          <hr class="style18">
          <div class="col-xs-12">

            <div class="col-md-6">
              <div class="alert alert-default">
                <h3>Informations about Surah:</h3>
                <hr class="style18">
                <p>Surrah: N° <span id="surah-num">...</span>
                <br />
                <span id="surah-name-en">...</span> | <span id="surah-name-ar">...</span></p>
                <p>Surrah name transation: <span id="surah-name-tr">...</span></p>

              </div>


            </div>


            <div class="col-md-6">


              <div class="alert alert-default">
                <h3>Additional info: </h3>
                <hr class="style18">
                <p>Juz : <span id="juz">...</span></p>
                <p>Page : <span id="page">...</span></p>
                <p>Hizb Quarter" : <span id="quart-hizb">...</span></p>

              </div>
            </div>

          </div>





        </div>
      </div>
    </section>


    <video id="vid" autobuffer="false" autoplay="false">
      <source id="vid-src" src="" type="audio/mp3">
    </video>















    <section id="feature">
      <div class="container">
        <div class="center wow fadeInDown animated" style="visibility: visible; animation-name: fadeInDown;">
          <h2 class="ar title-scripting"><i class="fa fa-search"></i> نتائج البحت عن الكلمات القرئانية في الدرر السنية</h2>
          <br>

          <div id="durar" class="scripting">
            المرجوا الظغط على الكلمات القرئانية لكي يتحقق البحت.<br />
            <a  data-scroll href="#aya-display"><i class="fa fa-5x fa-hand-o-up"></i></a>
          </div>
        </div>

        </div>
      </div>
    </section>























    <section id="bottom">
      <div class="container wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
        <div class="row">
          <div class="col-md-3 col-sm-6">
            <div class="widget">
              <h3>Information</h3>
              <ul>
                <li><a href="#">Link</a></li>

              </ul>
            </div>
          </div>
          <div class="col-md-3 col-sm-6">
            <div class="widget">
              <h3>Events</h3>
              <ul>
                <li><a href="#">Link</a></li>

              </ul>
            </div>
          </div>
          <div class="col-md-3 col-sm-6">
            <div class="widget">
              <h3>Volunteer</h3>
              <ul>
                <li><a href="#">Link</a></li>

              </ul>
            </div>
          </div>
          <div class="col-md-3 col-sm-6">
            <div class="widget">
              <h3>Recommended Links</h3>
              <ul>
                <li><a href="#">Link</a></li>

              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>
    <footer id="footer" class="midnight-blue">
      <div class="container">
        <div class="row">
          <div class="col-sm-6">
            &copy; 2018 <a target="_blank" href="https://freeislamictemplates.appspot.com/" title="Free Islamic Templates">Mouadass</a>. All Rights Reserved.
          </div>
          <div class="col-sm-6">
            <ul class="pull-right">
              <li><a href="index.html">Aya</a></li>

            </ul>
          </div>
        </div>
      </div>
    </footer>


    <script src="{!! asset('applications/quran/js/jquery.js') !!}"></script>
    <script src="{!! asset('applications/quran/js/bootstrap.min.js') !!}"></script>


    <script src='https://unpkg.com/nprogress@0.2.0/nprogress.js'></script>
    <link rel='stylesheet' href='https://unpkg.com/nprogress@0.2.0/nprogress.css'/>


    <script> NProgress.start();</script>


    <script src="{!! asset('applications/quran/js/jquery.prettyPhoto.js') !!}"></script>
    <script src="{!! asset('applications/quran/js/jquery.isotope.min.js') !!}"></script>

    <script> NProgress.inc();</script>



    <script src="{!! asset('applications/quran/js/main.js') !!}"></script>
    <script src="{!! asset('applications/quran/js/wow.min.js') !!}"></script>


    <script> NProgress.inc();</script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/clipboard@2/dist/clipboard.min.js"></script>

    <script> NProgress.inc();</script>
    <script src="https://cdn.jsdelivr.net/gh/cferdinandi/smooth-scroll@14.2.1/dist/smooth-scroll.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.26.14/sweetalert2.all.min.js"></script>
    <script> NProgress.inc();</script>
    <script src='https://code.responsivevoice.org/responsivevoice.js'></script>

    <script> NProgress.done();</script>

    <script type="text/javascript">new ClipboardJS('.cp');</script>
    <script>
    	var scroll = new SmoothScroll('a[href*="#"]');
    </script>
    <script>
      $(document).ready(function(){
        next = $("#next");
        last = $("#last");
        generators = $(".gen");
        ayadisp = $("#aya-display");
        transdisp = $("#translation-display");
        surahnum = $("#surah-num");
        surahNameEn = $("#surah-name-en");
        surahNameAr = $("#surah-name-ar");
        surahNameTr = $("#surah-name-tr");
        juz = $("#juz");
        page = $("#page");
        quartHizb = $("#quart-hizb");
        sajda = $("#sajda");
        aya_read = $("#aya-number-read");
        $durar = $("#durar");
        durarQ = document.querySelector('#durar');

        $speech = $("#speech");
        $stop = $("#stop");
        $stop.hide();

        $recite = $("#recite");

        $vid = $("#vid");
        $vidsrc = $("#vid-src");
        $vid.hide();

        var someAyat = [

            [
              "فَمَنْ تَوَلَّىٰ بَعْدَ ذَٰلِكَ فَأُولَٰئِكَ هُمُ الْفَاسِقُونَ",
              "And, henceforth, all who turn away [from this pledge] - it is they, they who are truly iniquitous!"
            ],
            [
              "بِسْمِ اللَّهِ الرَّحْمَٰنِ الرَّحِيمِ يَا أَيُّهَا النَّاسُ اتَّقُوا رَبَّكُمْ ۚ إِنَّ زَلْزَلَةَ السَّاعَةِ شَيْءٌ عَظِيمٌ",
              "O men! Be conscious of your Sustainer: for, verily the violent convulsion of the Last Hour will be an awesome thing!"
            ],
            [
              "وَمِنْهُمْ مَنْ يَسْتَمِعُ إِلَيْكَ ۖ وَجَعَلْنَا عَلَىٰ قُلُوبِهِمْ أَكِنَّةً أَنْ يَفْقَهُوهُ وَفِي آذَانِهِمْ وَقْرًا ۚ وَإِنْ يَرَوْا كُلَّ آيَةٍ لَا يُؤْمِنُوا بِهَا ۚ حَتَّىٰ إِذَا جَاءُوكَ يُجَادِلُونَكَ يَقُولُ الَّذِينَ كَفَرُوا إِنْ هَٰذَا إِلَّا أَسَاطِيرُ الْأَوَّلِينَ",
              "And there are among them such as [seem to] listen to thee [O Prophet]: but over their hearts We have laid veils which prevent them from grasping the truth, and into their ears, deafness. And were they to see every sign [of the truth], they would still not believe in it-so much so that when they come unto thee to contend with thee, those who are bent on denying the truth say, \"This is nothing but fables of ancient times!\""
            ],
            [
              "هَلْ يَنْظُرُونَ إِلَّا أَنْ تَأْتِيَهُمُ الْمَلَائِكَةُ أَوْ يَأْتِيَ رَبُّكَ أَوْ يَأْتِيَ بَعْضُ آيَاتِ رَبِّكَ ۗ يَوْمَ يَأْتِي بَعْضُ آيَاتِ رَبِّكَ لَا يَنْفَعُ نَفْسًا إِيمَانُهَا لَمْ تَكُنْ آمَنَتْ مِنْ قَبْلُ أَوْ كَسَبَتْ فِي إِيمَانِهَا خَيْرًا ۗ قُلِ انْتَظِرُوا إِنَّا مُنْتَظِرُونَ",
              "Do they, perchance, wait for the angels to appear unto them, or for thy Sustainer [Himself] to appear, or for some of thy Sustainer's [final] portents to appear? [But] on the Day when thy Sustainer's [final] portents do appear, believing will be of no avail to any human being who did not believe before, or who, while believing, did no good works. Say: \"Wait, [then, for the Last Day, O unbelievers:] behold, we [believers] are waiting, too!\""
            ]
         ];


        function getQuote(num){
          NProgress.start();
          ///editions/quran-uthmani,en.asad
            axios.get('http://api.alquran.cloud/ayah/'+num+'/editions/quran-simple,en.asad')
            .then(function (response) {
              // handle success

              NProgress.inc();

              data = response.data;

              joumla = String( data.data[0].text );

              joumla_splited = joumla.split(' ');

              joumla_splited =joumla_splited.map(function(klma){
                return '<span class="search_about pointer">'+klma+'</span>';
              });

              NProgress.inc();

              joumla_trimed = joumla_splited.join(' ');

              ayadisp.html(joumla_trimed);
              transdisp.text(data.data[1].text);

              surahnum.text(data.data[0].surah.number);
              surahNameEn.text(data.data[0].surah.englishName);
              surahNameAr.text(data.data[0].surah.name);
              surahNameTr.text(data.data[1].surah.englishNameTranslation);
              juz.text(data.data[0].juz);
              page.text(data.data[0].page);
              quartHizb.text(data.data[0].hizbQuarter);

              NProgress.inc();

              if(data.data[0].sajda){

                sajda.html('<img src="images/application/quran/sujud.png" height="150" width="150">');

              }

              NProgress.inc();


              next.attr('data-item', Number( response.data.data[0].number ) +1 );
              last.attr('data-item', Number( response.data.data[0].number ) -1 );


              NProgress.inc();

            if (window.localStorage) {
              localStorage.setItem('quran-aya', Number( response.data.data[0].number ) );
              old_read = Number (localStorage.getItem('aya-number-read') );
              localStorage.setItem('aya-number-read', old_read +1 );

              aya_read.text( old_read +1 );

            }

            window.aya = response.data.data[0].number;

            NProgress.done();

              console.log(response);
            })
            .catch(function (error) {
              // handle error
              console.log(error);
              NProgress.inc();
              swal({
                position: 'top-end',
                type: 'error',
                title: 'No internet',
                showConfirmButton: false,
                timer: 1500
              })

              NProgress.inc();

                var randomNumber = Math.floor(Math.random()*someAyat.length);

                ayadisp.html( someAyat[randomNumber][0] );
                transdisp.html( someAyat[randomNumber][1] );

              NProgress.inc();

                if (window.localStorage) {

                  localStorage.setItem('aya-number-read', old_read +1 );

                  aya_read.text( old_read +1 );

                }

              NProgress.done();
            })
        }


        function getDurar(keyWord){

          NProgress.start();

            $ .getJSON ( "http://dorar.net/dorar_api.json?skey="  + keyWord+  "&callback=?")
            .done(function(data) {

              NProgress.inc();
                    $durar .html ( "" ) ;
                    console.log( data );
                    $durar .append ( data.ahadith.result ) ;

                    scroll.animateScroll(durarQ);
            })
            .fail(function(error) {

              NProgress.inc();
              swal({
                position: 'top-end',
                type: 'error',
                title: 'No Hadith',
                showConfirmButton: false,
                timer: 1500
              })


            })

            .always(function() {

              NProgress.done();
            })
            ;

        }


        if (window.localStorage) {
          // Browser supports localStorage
          // Good to go
          if( localStorage.getItem('quran-aya') ){

            next.attr('data-item', localStorage.getItem('quran-aya') );

          }


          if( localStorage.getItem('aya-number-read') ){

            aya_read.text( localStorage.getItem('aya-number-read') );

          }


        }


        getQuote(next.attr('data-item'));


          $("#next").click(function(){

            generators.attr('disabled', true);

            getQuote( $(this).attr('data-item'));

            generators.attr('disabled', false);

          });

          $("#last").click(function(){

            generators.attr('disabled', true);

            getQuote( $(this).attr('data-item'));

            generators.attr('disabled', false);

          });



          $("#random-aya").click(function(){

            generators.attr('disabled', true);

            random = Math.floor(Math.random() * 6236) + 1;

            getQuote( random );

            generators.attr('disabled', false);

          });

          $recite.on('click', function(){
            NProgress.start();
            ///editions/quran-uthmani,en.asad
              axios.get('http://api.alquran.cloud/ayah/'+ window.aya +'/ar.alafasy')
              .then(function (response) {
                alert(response.data.data.audio);



                $vidsrc.attr('src', response.data.data.audio  );
                $vid.currentTime = 0;
            		$vid.trigger('pause');

                $vid.trigger('play');



                NProgress.done();

              })
              .catch(function (response) {
                alert( window.aya );

                NProgress.done();

                swal({
                  position: 'top-end',
                  type: 'error',
                  title: 'No Voice',
                  showConfirmButton: false,
                  timer: 1500
                });

              })


          });

          $speech.on('click',function(){

            if(responsiveVoice.voiceSupport()) {
              responsiveVoice.speak(transdisp.text(), 'UK English Male',{
                onstart: function(){
                  $speech.hide();
                  $stop.show();

                }, onend: function(){
                  $speech.show();
                  $stop.hide();

                }
            });
            }


          });

          $stop.on('click',function(){
              responsiveVoice.cancel();
              $(this).hide();
              $speech.show();


          });

          ayadisp.on('click', '.search_about', function(){

            getDurar( $(this).text() );

          });




      });

    </script>
  </body>
</html>
