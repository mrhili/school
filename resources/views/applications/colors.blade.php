<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->


<style media="screen">
@import url(https://fonts.googleapis.com/css?family=Cherry+Swash);
.options {
text-align: center;
color: #222;
padding: 8px;
}
.options__heading {
margin-bottom: 50px;
font-family: 'Cherry Swash';
font-size: 40px;
}
.options__value {
display: inline-block;
font-size: 18px;
line-height: 30px;
padding: 0 8px;
margin: 8px;
border-radius: 3px;
}
.options__value:hover {
cursor: pointer;
}

</style>




    </head>
    <body>

      <div class="options">
        <h1 class="options__heading">Named Colors</h1>

        <p>Click a color value to set it as the background color.</p>

        <!-- Color List -->
      </div>

	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>



  <script type="text/javascript">
  var colors = [
"aliceblue",
"antiquewhite",
"aqua",
"aquamarine",
"azure",
"beige",
"bisque",
"black",
"blanchedalmond",
"blue",
"blueviolet",
"brown",
"burlywood",
"cadetblue",
"chartreuse",
"chocolate",
"coral",
"cornflowerblue",
"cornsilk",
"crimson",
"cyan",
"darkblue",
"darkcyan",
"darkgoldenrod",
"darkgray",
"darkgreen",
"darkkhaki",
"darkmagenta",
"darkolivegreen",
"darkorange",
"darkorchid",
"darkred",
"darksalmon",
"darkseagreen",
"darkslateblue",
"darkslategray",
"darkturquoise",
"darkviolet",
"deeppink",
"deepskyblue",
"dimgray",
"dodgerblue",
"firebrick",
"floralwhite",
"forestgreen",
"fuchsia",
"gainsboro",
"ghostwhite",
"gold",
"goldenrod",
"gray",
"green",
"greenyellow",
"honeydew",
"hotpink",
"indianred",
"indigo",
"ivory",
"khaki",
"lavender",
"lavenderblush",
"lawngreen",
"lemonchiffon",
"lightblue",
"lightcoral",
"lightcyan",
"lightgoldenrodyellow",
"lightgray",
"lightgreen",
"lightpink",
"lightsalmon",
"lightseagreen",
"lightskyblue",
"lightslategray",
"lightsteelblue",
"lightyellow",
"lime",
"limegreen",
"linen",
"magenta",
"maroon",
"mediumaquamarine",
"mediumblue",
"mediumorchid",
"mediumpurple",
"mediumseagreen",
"mediumslateblue",
"mediumspringgreen",
"mediumturquoise",
"mediumvioletred",
"midnightblue",
"mintcream",
"mistyrose",
"moccasin",
"navajowhite",
"navy",
"oldlace",
"olive",
"olivedrab",
"orange",
"orangered",
"orchid",
"palegoldenrod",
"palegreen",
"paleturquoise",
"palevioletred",
"papayawhip",
"peachpuff",
"peru",
"pink",
"plum",
"powderblue",
"purple",
"rebeccapurple",
"red",
"rosybrown",
"royalblue",
"saddlebrown",
"salmon",
"sandybrown",
"seagreen",
"seashell",
"sienna",
"silver",
"skyblue",
"slateblue",
"slategray",
"snow",
"springgreen",
"steelblue",
"tan",
"teal",
"thistle",
"tomato",
"turquoise",
"violet",
"wheat",
"white",
"whitesmoke",
"yellow",
"yellowgreen"
]

$.each(colors, function(index, value) {
$('.options').append(
   '<span class="options__value" style="background: ' + value +';" data-value="' + value +'">'
    + value +
    '</span> '
 );
});

$('.options__value').on('click', function() {
var setColor = $(this).data('value');
$('body').css('background', setColor);
});
  </script>


    </body>
</html>
