<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

        <style>
        $red: #E74C3C;

        * {
          box-sizing: border-box;
        }

        ::selection {
          background: darken($red, 10%);
        }

        ::-moz-selection {
          background: darken($red, 10%);
        }

        html, body {
          background: #E74C3C;
        }

        .title {
          text-align: center;
          font-weight: 300;
          color: white;
        }

        .subtitle {
          text-align: center;
          margin-bottom: 50px;
          color: white;
        }

        .top-wrapper {
          width: 60%;
          max-width: 700px;
          margin: 0 auto;

          @media only screen and (max-width: 600px) {
            width: 90%;
          }
        }

        .input {
          width: 100% !important;
          max-width: 100% !important;
          margin: 0;
          padding: 0;
          display: block;
          float: left;
          padding: 15px;
          height: 250px;
          border: none;

          &:focus, &:active {
            outline: none;
          }
        }

        .run, .clear {
          height: 50px;
          width: 49%;
          margin: 0;
          padding: 0;
          display: block;
          float: left;
          background: $red;
          border: 1px solid white;
          color: white;
          margin-top: 5%;
          transition: 300ms ease;

          &:hover {
            background: white;
            color: $red;
          }

          &:active, &:focus {
            outline: none;
          }
        }

        .run {
          margin-right: 1%;
        }

        .clear {
          margin-left: 1%;
        }

        .output {
          letter-spacing: 2px;
          display: block;
          width: 60%;
          max-width: 700px;
          margin: 0 auto;
          padding-top: 50px;
          font-family: 'monospace';
          color: white;

          @media only screen and (max-width: 600px) {
            width: 90%;
          }
        }

        </style>
    </head>
    <body>

      <h1 class="title">Morse Code Generator</h1>
      <p class="subtitle">Convert regular old english to super awesome morse code.</p>
      <div class="top-wrapper">
        <textarea class="input" placeholder="Type something here"></textarea>
        <button class="run">Run</button>
        <button class="clear">Clear</button>
      </div>
      <pre class="output"></pre>

	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

  <script>
  class MorseCode {
constructor() {
  this.DOT = 'dot';
  this.DASH = 'dash';
  this.SPACE = 'space';
  this.map = {
    'a': [this.DOT, this.DASH],
    'b': [this.DASH, this.DOT, this.DOT, this.DOT],
    'c': [this.DASH, this.DOT, this.DASH, this.DOT],
    'd': [this.DASH, this.DOT, this.DOT],
    'e': [this.DOT],
    'f': [this.DOT, this.DOT, this.DASH, this.DOT],
    'g': [this.DASH, this.DASH, this.DAT],
    'h': [this.DOT, this.DOT, this.DOT, this.DOT],
    'i': [this.DOT, this.DOT],
    'j': [this.DOT, this.DASH, this.DASH, this.DASH],
    'k': [this.DASH, this.DOT, this.DASH],
    'l': [this.DOT, this.DASH, this.DOT, this.DOT],
    'm': [this.DASH, this.DASH],
    'n': [this.DASH, this.DOT],
    'o': [this.DASH, this.DASH, this.DASH],
    'p': [this.DOT, this.DASH, this.DASH, this.DOT],
    'q': [this.DASH, this.DASH, this.DOT, this.DASH],
    'r': [this.DOT, this.DASH, this.DOT],
    's': [this.DOT, this.DOT, this.DOT],
    't': [this.DASH],
    'u': [this.DOT, this.DOT, this.DASH, this.DASH],
    'v': [this.DOT, this.DOT, this.DOT, this.DASH],
    'w': [this.DOT, this.DASH, this.DASH],
    'x': [this.DASH, this.DOT, this.DOT, this.DASH],
    'y': [this.DASH, this.DOT, this.DASH, this.DASH],
    'z': [this.DASH, this.DASH, this.DOT, this.DOT],
    ' ': [this.SPACE],
    '1': [this.DOT, this.DASH, this.DASH, this.DASH, this.DASH],
    '2': [this.DOT, this.DOT, this.DASH, this.DASH, this.DASH],
    '3': [this.DOT, this.DOT, this.DOT, this.DASH, this.DASH],
    '4': [this.DOT, this.DOT, this.DOT, this.DOT, this.DASH],
    '5': [this.DOT, this.DOT, this.DOT, this.DOT, this.DOT],
    '6': [this.DASH, this.DOT, this.DOT, this.DOT, this.DOT],
    '7': [this.DASH, this.DASH, this.DOT, this.DOT, this.DOT],
    '8': [this.DASH, this.DASH, this.DASH, this.DOT, this.DOT],
    '9': [this.DASH, this.DASH, this.DASH, this.DASH, this.DOT],
    '0': [this.DASH, this.DASH, this.DASH, this.DASH, this.DASH],
    '.': [this.DOT, this.DASH, this.DOT, this.DASH, this.DOT, this.DASH],
    ',': [this.DASH, this.DASH, this.DOT, this.DOT, this.DASH, this.DASH],
    '\'': [this.DASH, this.DOT, this.DASH, this.DOT, this.DASH, this.DOT],
    '!': [this.DASH, this.DOT, this.DASH, this.DOT, this.DASH, this.DASH],
    '-': [this.DASH, this.DOT, this.DOT, this.DOT, this.DOT, this.DASH],
    '&': [this.DOT, this.DASH, this.DOT, this.DOT, this.DOT],
    '?': [this.DOT, this.DOT, this.DASH, this.DASH, this.DOT, this.DOT],
    '/': [this.DASH, this.DOT, this.DOT, this.DASH, this.DOT],
    '(': [this.DASH, this.DOT, this.DASH, this.DASH, this.DOT],
    ')': [this.DASH, this.DOT, this.DASH, this.DASH, this.DOT, this.DASH],
    ':': [this.DASH, this.DASH, this.DASH, this.DOT, this.DOT, this.DOT],
    ';': [this.DASH, this.DOT, this.DASH, this.DOT, this.DASH, this.DOT],
    '=': [this.DASH, this.DOT, this.DOT, this.DOT, this.DASH],
    '+': [this.DOT, this.DASH, this.DOT, this.DASH, this.DOT],
    '_': [this.DOT, this.DOT, this.DASH, this.DASH, this.DOT, this.DASH],
    '"': [this.DOT, this.DASH, this.DOT, this.DOT, this.DASH, this.DOT],
    '$': [this.DOT, this.DOT, this.DOT, this.DASH, this.DOT, this.DOT, this.DASH],
    '@': [this.DOT, this.DASH, this.DASH, this.DOT, this.DASH, this.DOT]
  };
}

parse(input) {
  input = input.split('');


  for (let i=0, ii=input.length; i<ii; i++) {
    input[i] = {
      original: input[i].toLowerCase(),
      sequence: this.map[input[i].toLowerCase()]
    };
  }

  console.log(input);
  return input;
}

humanReadable(input) {
  let text = ' ';
  input = this.parse(input);

  for (let i=0, ii=input.length; i < ii; i++) {
    let current = input[i];

    for (let c=0, cc=current.sequence.length; c < cc; c++) {
      let char;

      switch (current.sequence[c]) {
        case this.SPACE:
          char = '\n';
          break;
        case this.DOT:
          char = '•';
          break;
        case this.DASH:
          char = '–';
      }

      text += char;
    }

    text += ' ';
  }

  console.log(text);
  return text;
}
}

let morseCode = new MorseCode();

let input = $('textarea.input');
let run = $('button.run');
let output = $('pre.output');
let clear = $('button.clear');

run.on('click', (e) => {
let inputText = input.val();
console.log('run');

output.text(morseCode.humanReadable(inputText));
});

clear.on('click', (e) => {
input.val('');
output.text('');
});
  </script>

    </body>
</html>
