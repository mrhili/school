<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Flexbox Froggy - A game for learning CSS flexbox</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:url"           content="http://flexboxfroggy.com">
    <meta property="og:type"          content="website">
    <meta property="og:title"         content="Flexbox Froggy">
    <meta property="og:description"   content="A game for learning CSS flexbox">
    <meta property="og:image"         content="http://flexboxfroggy.com/images/screenshot.png">
    <meta property="fb:app_id"        content="916849395036923">
    <meta name="twitter:url"          content="http://flexboxfroggy.com">
    <meta name="twitter:title"        content="Flexbox Froggy">
    <meta name="twitter:description"  content="A game for learning CSS flexbox">
    <meta name="twitter:image"        content="http://flexboxfroggy.com/images/screenshot.png">
    <link rel="stylesheet" href="{!!asset('games/ff/node_modules/animate.css/animate.min.css')!!}">
    <link href='https://fonts.googleapis.com/css?family=PT+Sans|Fredoka+One|Source+Code+Pro' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{!!asset('games/ff/css/style.css')!!}">
  </head>
  <body>
    <section id="sidebar">
      <div class="header">
        <div>
          <h1 class="title">Flexbox Froggy</h1>
        </div>
        <div id="level-counter">
          <span class="arrow left">◀</span>
          <span id="level-indicator">
            <span id="labelLevel" class="translate">Level</span>
            <span class="current">1</span>
            <span id="labelOf" class="translate">of</span>
            <span class="total">1</span>
            <span class="caret">▾</span>
          </span>
          <span class="arrow right">▶</span>
          <div id="levelsWrapper" class="tooltip">
            <div id="levels"></div>
            <div id="labelReset" class="translate">Reset</div>
          </div>
        </div>
      </div>
      <p id="instructions"></p>
      <div id="editor">
        <div id="css">
          <div class="line-numbers">1<br>2<br>3<br>4<br>5<br>6<br>7<br>8<br>9<br>10</div>
          <pre id="before"></pre>
          <textarea id="code" autofocus></textarea>
          <pre id="after"></pre>
        </div>
        <button id="next" class="translate">Next</button>
      </div>
      <div id="share">
        <p class="img-next">
          <a href="http://cssgridgarden.com"><img src="{!!asset('games/ff/images/next-gridgarden.png')!!}"></a>
          <a href="http://treehouse.7eer.net/c/371033/228915/3944?subId1=flexboxfroggy"><img src="images/next-treehouse.png"></a>
        </p>
        <p class="social">
          <span id="tweet">
            <a href="https://twitter.com/share" class="twitter-share-button"{count} data-url="http://flexboxfroggy.com" data-via="playcodepip">Tweet</a>
            <a href="https://twitter.com/playcodepip" class="twitter-follow-button" data-show-count="false">Follow @playcodepip</a>
          </span>
          <span class="fb-like" data-href="http://flexboxfroggy.com" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true"></span>
        </p>
      </div>

      <script src="js/native.js"></script>
      <script>_native.init("CK7D427U");</script>

      <div class="native-ad">
        <a href="#native_link#"><span class="sponsor">Sponsor</span> #native_company# — #native_desc#</a>
      </div>

      <div class="credits">
        <span id="labelFooter" class="translate">Flexbox Froggy is created by</span>
        <a href="https://codepip.com">Codepip</a> •
        <a href="https://github.com/thomaspark/flexboxfroggy/">GitHub</a> •
        <a href="https://twitter.com/playcodepip">Twitter</a> •
        <span id="settings">
          <span id="labelSettings" class="toggle translate">Settings</span>
          <span class="tooltip">
            <section>
              <h4 id="labelLanguage" class="translate">Language</h4>
              <select id="language">
                <option value="en">English</option>
                <option value="es">Español</option>
                <option value="fr">Français</option>
                <option value="de">Deutsch</option>
                <option value="nl">Nederlands</option>
                <option value="pt-br">Português</option>
                <option value="it">Italiano</option>
                <option value="sv">Svenska</option>
                <option value="pl">Polski</option>
                <option value="cs">Česky</option>
                <option value="hu">Magyar</option>
                <option value="ro">Română</option>
                <option value="bg">Български</option>
                <option value="lv">Latviešu</option>
                <option value="lt">Lietuvių</option>
                <option value="uk">Українська</option>
                <option value="ru">Русский</option>
                <option value="sr">Српски</option>
                <option value="mk">Македонски</option>
                <option value="el">Ελληνικά</option>
                <option value="tr">Türkçe</option>
                <option value="fa">فارسی</option>
                <option value="hi">हिंदी</option>
                <option value="ta">தமிழ்</option>
                <option value="ml">മലയാളം</option>
                <option value="zh-cn">简体中文</option>
                <option value="zh-tw">繁體中文</option>
                <option value="ja">日本語</option>
                <option value="ko">한국어</option>
                <option value="vi">Tiếng Việt</option>
                <option value="eo">Esperanto</option>
              </select>
            </section>
            <section>
              <h4 id="labelDifficulty" class="translate">Difficulty</h4>
              <form id="difficulty">
                <div>
                  <input type="radio" name="difficulty" id="difficultyEasy" value="easy" checked>
                  <label id="labelDifficultyEasy" for="difficultyEasy" class="translate">Beginner</label>
                </div>
                <div>
                  <input type="radio" name="difficulty" id="difficultyMedium" value="medium">
                  <label id="labelDifficultyMedium" for="difficultyMedium" class="translate">Intermediate - No Directions</label>
                </div>
                <div>
                  <input type="radio" name="difficulty" id="difficultyHard" value="hard">
                  <label id="labelDifficultyHard" for="difficultyHard" class="translate">Expert - No Directions &amp; Random Levels</label>
                </div>
              </form>
            </section>
            <section>
              <h4 id="labelColorblind" class="translate">Colorblind Mode</h4>
              <form id="colorblind">
                <div>
                  <div>
                    <input type="radio" name="colorblind" id="colorblindOff" value="false" checked>
                    <label id="labelColorblindOff" for="colorblindOff" class="translate">Off</label>
                  </div>
                  <div>
                    <input type="radio" name="colorblind" id="colorblindOn" value="true">
                    <label id="labelColorblindOn" for="colorblindOn" class="translate">On</label>
                  </div>
              </form>
            </section>
          </span>
        </span>
      </div>
      <div class="credits">
        <span id="gridGarden" class="translate">Want to learn CSS grid? Play</span> <a href="https://cssgridgarden.com">Grid Garden</a>.
      </div>
    </section>
    <section id="view">
      <div id="board">
        <div id="pond">
        </div>
        <div id="background">
        </div>
      </div>
    </section>
    <script src="{!!asset('games/ff/node_modules/jquery/dist/jquery.min.js') !!}"></script>
    <script src="{!!asset('games/ff/js/levels.js') !!}"></script>
    <script src="{!!asset('games/ff/js/docs.js') !!}"></script>
    <script src="{!!asset('games/ff/js/messages.js') !!}"></script>
    <script src="{!!asset('games/ff/js/game.js') !!}"></script>
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-23019901-13', 'auto');
      ga('send', 'pageview');
    </script>
    <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');
    </script>
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5&appId=916849395036923";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
  </body>
</html>