<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Grid Garden - A game for learning CSS grid layout</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:url"           content="http://cssgridgarden.com">
    <meta property="og:type"          content="website">
    <meta property="og:title"         content="Grid Garden">
    <meta property="og:description"   content="A game for learning CSS grid layout">
    <meta property="og:image"         content="http://cssgridgarden.com/images/screenshot.png">
    <meta name="twitter:url"          content="http://cssgridgarden.com">
    <meta name="twitter:title"        content="Grid Garden">
    <meta name="twitter:description"  content="A game for learning CSS grid layout">
    <meta name="twitter:image"        content="http://cssgridgarden.com/images/screenshot.png">
    <link rel="stylesheet" href="{!! asset('games/gg/node_modules/animate.css/animate.min.css') !!}">
    <link href='https://fonts.googleapis.com/css?family=PT+Sans|Autour+One|Source+Code+Pro' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{!! asset('games/gg/css/style.css') !!}">
  </head>
  <body>
    <section id="sidebar">
      <div class="header">
        <div>
          <h1 class="title">Grid Garden</h1>
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
          <div class="line-numbers">1<br>2<br>3<br>4<br>5<br>6<br>7<br>8<br>9<br>10<br>11<br>12<br>13<br>14</div>
          <pre id="before"></pre>
          <textarea id="code" autofocus></textarea>
          <pre id="after"></pre>
        </div>
        <button id="next" class="translate">Next</button>
      </div>
      <div id="share">
        <p class="img-next">
          <a href="http://flexboxfroggy.com"><img src="images/next-flexboxfroggy.png"></a>
          <a href="http://treehouse.7eer.net/c/371033/228915/3944?subId1=gridgarden"><img src="images/next-treehouse.png"></a>
        </p>
        <p class="social">
          <span id="tweet">
            <a href="https://twitter.com/share" class="twitter-share-button"{count} data-url="http://cssgridgarden.com" data-via="playcodepip" data-text="I just beat Grid Garden, a game for learning CSS grid layout!">Tweet</a>
            <a href="https://twitter.com/playcodepip" class="twitter-follow-button" data-show-count="false">Follow @playcodepip</a>
          </span>
          <span class="fb-like" data-href="http://cssgridgarden.com" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true"></span>
        </p>
      </div>
      <div class="credits">
        <span id="labelFooter" class="translate">Grid Garden is created by</span>
        <a href="https://codepip.com">Codepip</a> •
        <a href="https://github.com/thomaspark/gridgarden/">GitHub</a> •
        <a href="https://twitter.com/playcodepip">Twitter</a> •
        <span id="language">
          <span id="languageActive" class="toggle translate">English</span>
          <span class="tooltip">
            <a href="#en">English</a>
            <a href="#es">Español</a>
            <a href="#fr">Français</a>
            <a href="#de">Deutsch</a>
            <a href="#nl">Nederlands</a>
            <a href="#it">Italiano</a>
            <a href="#pt-br">Português(BR)</a>
            <a href="#pt-pt">Português(PT)</a>
            <a href="#sv">Svenska</a>
            <a href="#no">Norsk</a>
            <a href="#pl">Polski</a>
            <a href="#ro">Română</a>
            <a href="#bg">Български</a>
            <a href="#ru">Русский</a>
            <a href="#ua">Українська</a>
            <a href="#el">Ελληνικά</a>
            <a href="#tr">Türkçe</a>
            <a href="#fa">فارسی</a>
            <a href="#zh-cn">简体中文</a>
            <a href="#zh-tw">繁體中文</a>
            <a href="#ja">日本語</a>
            <a href="#ko">한국어</a>
          </span>
        </span>
      </div>
      <div class="credits">
        <span id="flexboxFroggy" class="translate">Want to learn CSS flexbox? Play</span> <a href="https://flexboxfroggy.com">Flexbox Froggy</a>.
      </div>
    </section>
    <section id="view">
      <div id="board">
        <div id="overlay">
          <span class="plot"></span>
          <span class="plot"></span>
          <span class="plot"></span>
          <span class="plot"></span>
          <span class="plot"></span>
          <span class="plot"></span>
          <span class="plot"></span>
          <span class="plot"></span>
          <span class="plot"></span>
          <span class="plot"></span>
          <span class="plot"></span>
          <span class="plot"></span>
          <span class="plot"></span>
          <span class="plot"></span>
          <span class="plot"></span>
          <span class="plot"></span>
          <span class="plot"></span>
          <span class="plot"></span>
          <span class="plot"></span>
          <span class="plot"></span>
          <span class="plot"></span>
          <span class="plot"></span>
          <span class="plot"></span>
          <span class="plot"></span>
          <span class="plot"></span>
          <span class="plot"></span>
          <span class="plot"></span>
          <span class="plot"></span>
          <span class="plot"></span>
          <span class="plot"></span>
          <span class="plot"></span>
          <span class="plot"></span>
          <span class="plot"></span>
          <span class="plot"></span>
          <span class="plot"></span>
          <span class="plot"></span>
          <span class="plot"></span>
          <span class="plot"></span>
          <span class="plot"></span>
          <span class="plot"></span>
        </div>
        <div id="plants"></div>
        <div id="garden"></div>
        <div id="soil">
          <span class="plot"></span>
          <span class="plot"></span>
          <span class="plot"></span>
          <span class="plot"></span>
          <span class="plot"></span>
          <span class="plot"></span>
          <span class="plot"></span>
          <span class="plot"></span>
          <span class="plot"></span>
          <span class="plot"></span>
          <span class="plot"></span>
          <span class="plot"></span>
          <span class="plot"></span>
          <span class="plot"></span>
          <span class="plot"></span>
          <span class="plot"></span>
          <span class="plot"></span>
          <span class="plot"></span>
          <span class="plot"></span>
          <span class="plot"></span>
          <span class="plot"></span>
          <span class="plot"></span>
          <span class="plot"></span>
          <span class="plot"></span>
          <span class="plot"></span>
          <span class="plot"></span>
          <span class="plot"></span>
          <span class="plot"></span>
          <span class="plot"></span>
          <span class="plot"></span>
          <span class="plot"></span>
          <span class="plot"></span>
          <span class="plot"></span>
          <span class="plot"></span>
          <span class="plot"></span>
          <span class="plot"></span>
          <span class="plot"></span>
          <span class="plot"></span>
          <span class="plot"></span>
          <span class="plot"></span>
        </div>
      </div>

    <script src="{!! asset('games/gg/node_modules/jquery/dist/jquery.min.js') !!}"></script>

    <script src="{!! asset('games/gg/js/levels.js') !!}"></script>
    <script src="{!! asset('games/gg/js/docs.js') !!}"></script>
    <script src="{!! asset('games/gg/js/messages.js') !!}"></script>
    <script src="{!! asset('games/gg/js/game.js') !!}"></script>

    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-23019901-18', 'auto');
      ga('send', 'pageview');
    </script>
    <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');
    </script>
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5&appId=1820320434958041";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
  </body>
</html>
