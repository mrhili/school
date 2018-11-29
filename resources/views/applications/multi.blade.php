
@extends('back.layouts.topnav')


@section('styles')

<style media="screen">
@import url("https://fonts.googleapis.com/css?family=Fredoka+One");


.wrapper{
  background-color: inherit !important;
  box-sizing: border-box;
    text-align: center;
    font: 16px/1 Arial, sans-serif;
}

.board {
  display: inline-block;
  padding: 10px 20px 20px;
  border-radius: 30px;
  background-color: #f00;
  background: linear-gradient(135deg, #f00, #900);
  font-size: 0;
  box-shadow: inset 1px 1px 4px rgba(255, 255, 255, 0.4), inset -1px -1px 4px rgba(0, 0, 0, 0.4), 4px 4px 16px rgba(0, 0, 0, 0.6);
}
/*
header {
  margin: 0 50px 10px;
  padding: 10px;
  border-radius: 40px;
  color: #f00;
  background-color: #fff;
  background-image: linear-gradient(to bottom, transparent, transparent 14px, #ccf 14px), linear-gradient(to right, transparent, transparent 14px, #ccf 14px);
  background-size: 15px 15px;
  background-position: 50% 50%;
  font-family: "Fredoka One", sans-serif;
  box-shadow: inset 2px 2px 4px rgba(0, 0, 0, 0.4);
}
*/
h1 {
  display: inline-block;
  margin: 0;
  font-weight: normal;
  font-size: 1.6rem;
}

h2 {
  display: inline-block;
  margin: 0 0 0 10px;
  font-weight: normal;
  font-size: 1.2rem;
}

.keys {
  counter-reset: first-factor;
  padding: 20px 15px;
  border-radius: 20px;
  box-shadow: inset 2px 2px 4px rgba(0, 0, 0, 0.4), inset -2px -2px 4px rgba(255, 255, 255, 0.4);
}

.row {
  counter-reset: second-factor product;
  counter-increment: first-factor;
  white-space: nowrap;
}

.row:nth-child(1) .key {
  counter-increment: second-factor product 1;
}

.row:nth-child(2) .key {
  counter-increment: second-factor product 2;
}

.row:nth-child(3) .key {
  counter-increment: second-factor product 3;
}

.row:nth-child(4) .key {
  counter-increment: second-factor product 4;
}

.row:nth-child(5) .key {
  counter-increment: second-factor product 5;
}

.row:nth-child(6) .key {
  counter-increment: second-factor product 6;
}

.row:nth-child(7) .key {
  counter-increment: second-factor product 7;
}

.row:nth-child(8) .key {
  counter-increment: second-factor product 8;
}

.row:nth-child(9) .key {
  counter-increment: second-factor product 9;
}

.key {
  -webkit-appearance: none;
     -moz-appearance: none;
          appearance: none;
  display: inline-block;
  margin: 5px 8px;
  padding: 6px 8px;
  border: none;
  border-radius: 4px;
  font: inherit;
  font-weight: bold;
  color: #009;
  background-color: rgba(255, 255, 255, 0.8);
  box-shadow: inset 0 0 16px #fff, 4px 4px 16px rgba(0, 0, 0, 0.8);
  cursor: pointer;
  transition: all 0.5s;
}
.key:focus {
  outline: none;
  background-color: rgba(255, 255, 255, 0.7);
  box-shadow: inset 0 0 16px #fff, 2px 2px 8px rgba(0, 0, 0, 0.8);
  -webkit-transform: scale(0.95);
          transform: scale(0.95);
}
.key:focus dt {
  -webkit-filter: blur(1px);
          filter: blur(1px);
}

dl {
  margin: 0;
}

dt {
  margin-bottom: 3px;
  font-size: 1.4rem;
  -webkit-filter: blur(12px);
          filter: blur(12px);
  transition: all 0.5s;
}
dt::before {
  content: counter(product);
}

dd {
  margin: 0;
  font-size: 1rem;
}
dd::before {
  content: counter(first-factor) "X" counter(second-factor);
}


</style>


@endsection



@section('content')








<div class="wrapper">
  <div class='board'>
    <header>
      <h1>Educational Keyboard</h1>
      <h2>Multiplication X</h2>
    </header>
    <div class='keys'>
      <div class='row'>
        <div class='key' tabindex='0'>
          <dl>
            <dt></dt>
            <dd></dd>
          </dl>
        </div>
        <div class='key' tabindex='0'>
          <dl>
            <dt></dt>
            <dd></dd>
          </dl>
        </div>
        <div class='key' tabindex='0'>
          <dl>
            <dt></dt>
            <dd></dd>
          </dl>
        </div>
        <div class='key' tabindex='0'>
          <dl>
            <dt></dt>
            <dd></dd>
          </dl>
        </div>
        <div class='key' tabindex='0'>
          <dl>
            <dt></dt>
            <dd></dd>
          </dl>
        </div>
        <div class='key' tabindex='0'>
          <dl>
            <dt></dt>
            <dd></dd>
          </dl>
        </div>
        <div class='key' tabindex='0'>
          <dl>
            <dt></dt>
            <dd></dd>
          </dl>
        </div>
        <div class='key' tabindex='0'>
          <dl>
            <dt></dt>
            <dd></dd>
          </dl>
        </div>
        <div class='key' tabindex='0'>
          <dl>
            <dt></dt>
            <dd></dd>
          </dl>
        </div>
      </div>
      <div class='row'>
        <div class='key' tabindex='0'>
          <dl>
            <dt></dt>
            <dd></dd>
          </dl>
        </div>
        <div class='key' tabindex='0'>
          <dl>
            <dt></dt>
            <dd></dd>
          </dl>
        </div>
        <div class='key' tabindex='0'>
          <dl>
            <dt></dt>
            <dd></dd>
          </dl>
        </div>
        <div class='key' tabindex='0'>
          <dl>
            <dt></dt>
            <dd></dd>
          </dl>
        </div>
        <div class='key' tabindex='0'>
          <dl>
            <dt></dt>
            <dd></dd>
          </dl>
        </div>
        <div class='key' tabindex='0'>
          <dl>
            <dt></dt>
            <dd></dd>
          </dl>
        </div>
        <div class='key' tabindex='0'>
          <dl>
            <dt></dt>
            <dd></dd>
          </dl>
        </div>
        <div class='key' tabindex='0'>
          <dl>
            <dt></dt>
            <dd></dd>
          </dl>
        </div>
        <div class='key' tabindex='0'>
          <dl>
            <dt></dt>
            <dd></dd>
          </dl>
        </div>
      </div>
      <div class='row'>
        <div class='key' tabindex='0'>
          <dl>
            <dt></dt>
            <dd></dd>
          </dl>
        </div>
        <div class='key' tabindex='0'>
          <dl>
            <dt></dt>
            <dd></dd>
          </dl>
        </div>
        <div class='key' tabindex='0'>
          <dl>
            <dt></dt>
            <dd></dd>
          </dl>
        </div>
        <div class='key' tabindex='0'>
          <dl>
            <dt></dt>
            <dd></dd>
          </dl>
        </div>
        <div class='key' tabindex='0'>
          <dl>
            <dt></dt>
            <dd></dd>
          </dl>
        </div>
        <div class='key' tabindex='0'>
          <dl>
            <dt></dt>
            <dd></dd>
          </dl>
        </div>
        <div class='key' tabindex='0'>
          <dl>
            <dt></dt>
            <dd></dd>
          </dl>
        </div>
        <div class='key' tabindex='0'>
          <dl>
            <dt></dt>
            <dd></dd>
          </dl>
        </div>
        <div class='key' tabindex='0'>
          <dl>
            <dt></dt>
            <dd></dd>
          </dl>
        </div>
      </div>
      <div class='row'>
        <div class='key' tabindex='0'>
          <dl>
            <dt></dt>
            <dd></dd>
          </dl>
        </div>
        <div class='key' tabindex='0'>
          <dl>
            <dt></dt>
            <dd></dd>
          </dl>
        </div>
        <div class='key' tabindex='0'>
          <dl>
            <dt></dt>
            <dd></dd>
          </dl>
        </div>
        <div class='key' tabindex='0'>
          <dl>
            <dt></dt>
            <dd></dd>
          </dl>
        </div>
        <div class='key' tabindex='0'>
          <dl>
            <dt></dt>
            <dd></dd>
          </dl>
        </div>
        <div class='key' tabindex='0'>
          <dl>
            <dt></dt>
            <dd></dd>
          </dl>
        </div>
        <div class='key' tabindex='0'>
          <dl>
            <dt></dt>
            <dd></dd>
          </dl>
        </div>
        <div class='key' tabindex='0'>
          <dl>
            <dt></dt>
            <dd></dd>
          </dl>
        </div>
        <div class='key' tabindex='0'>
          <dl>
            <dt></dt>
            <dd></dd>
          </dl>
        </div>
      </div>
      <div class='row'>
        <div class='key' tabindex='0'>
          <dl>
            <dt></dt>
            <dd></dd>
          </dl>
        </div>
        <div class='key' tabindex='0'>
          <dl>
            <dt></dt>
            <dd></dd>
          </dl>
        </div>
        <div class='key' tabindex='0'>
          <dl>
            <dt></dt>
            <dd></dd>
          </dl>
        </div>
        <div class='key' tabindex='0'>
          <dl>
            <dt></dt>
            <dd></dd>
          </dl>
        </div>
        <div class='key' tabindex='0'>
          <dl>
            <dt></dt>
            <dd></dd>
          </dl>
        </div>
        <div class='key' tabindex='0'>
          <dl>
            <dt></dt>
            <dd></dd>
          </dl>
        </div>
        <div class='key' tabindex='0'>
          <dl>
            <dt></dt>
            <dd></dd>
          </dl>
        </div>
        <div class='key' tabindex='0'>
          <dl>
            <dt></dt>
            <dd></dd>
          </dl>
        </div>
        <div class='key' tabindex='0'>
          <dl>
            <dt></dt>
            <dd></dd>
          </dl>
        </div>
      </div>
      <div class='row'>
        <div class='key' tabindex='0'>
          <dl>
            <dt></dt>
            <dd></dd>
          </dl>
        </div>
        <div class='key' tabindex='0'>
          <dl>
            <dt></dt>
            <dd></dd>
          </dl>
        </div>
        <div class='key' tabindex='0'>
          <dl>
            <dt></dt>
            <dd></dd>
          </dl>
        </div>
        <div class='key' tabindex='0'>
          <dl>
            <dt></dt>
            <dd></dd>
          </dl>
        </div>
        <div class='key' tabindex='0'>
          <dl>
            <dt></dt>
            <dd></dd>
          </dl>
        </div>
        <div class='key' tabindex='0'>
          <dl>
            <dt></dt>
            <dd></dd>
          </dl>
        </div>
        <div class='key' tabindex='0'>
          <dl>
            <dt></dt>
            <dd></dd>
          </dl>
        </div>
        <div class='key' tabindex='0'>
          <dl>
            <dt></dt>
            <dd></dd>
          </dl>
        </div>
        <div class='key' tabindex='0'>
          <dl>
            <dt></dt>
            <dd></dd>
          </dl>
        </div>
      </div>
      <div class='row'>
        <div class='key' tabindex='0'>
          <dl>
            <dt></dt>
            <dd></dd>
          </dl>
        </div>
        <div class='key' tabindex='0'>
          <dl>
            <dt></dt>
            <dd></dd>
          </dl>
        </div>
        <div class='key' tabindex='0'>
          <dl>
            <dt></dt>
            <dd></dd>
          </dl>
        </div>
        <div class='key' tabindex='0'>
          <dl>
            <dt></dt>
            <dd></dd>
          </dl>
        </div>
        <div class='key' tabindex='0'>
          <dl>
            <dt></dt>
            <dd></dd>
          </dl>
        </div>
        <div class='key' tabindex='0'>
          <dl>
            <dt></dt>
            <dd></dd>
          </dl>
        </div>
        <div class='key' tabindex='0'>
          <dl>
            <dt></dt>
            <dd></dd>
          </dl>
        </div>
        <div class='key' tabindex='0'>
          <dl>
            <dt></dt>
            <dd></dd>
          </dl>
        </div>
        <div class='key' tabindex='0'>
          <dl>
            <dt></dt>
            <dd></dd>
          </dl>
        </div>
      </div>
      <div class='row'>
        <div class='key' tabindex='0'>
          <dl>
            <dt></dt>
            <dd></dd>
          </dl>
        </div>
        <div class='key' tabindex='0'>
          <dl>
            <dt></dt>
            <dd></dd>
          </dl>
        </div>
        <div class='key' tabindex='0'>
          <dl>
            <dt></dt>
            <dd></dd>
          </dl>
        </div>
        <div class='key' tabindex='0'>
          <dl>
            <dt></dt>
            <dd></dd>
          </dl>
        </div>
        <div class='key' tabindex='0'>
          <dl>
            <dt></dt>
            <dd></dd>
          </dl>
        </div>
        <div class='key' tabindex='0'>
          <dl>
            <dt></dt>
            <dd></dd>
          </dl>
        </div>
        <div class='key' tabindex='0'>
          <dl>
            <dt></dt>
            <dd></dd>
          </dl>
        </div>
        <div class='key' tabindex='0'>
          <dl>
            <dt></dt>
            <dd></dd>
          </dl>
        </div>
        <div class='key' tabindex='0'>
          <dl>
            <dt></dt>
            <dd></dd>
          </dl>
        </div>
      </div>
      <div class='row'>
        <div class='key' tabindex='0'>
          <dl>
            <dt></dt>
            <dd></dd>
          </dl>
        </div>
        <div class='key' tabindex='0'>
          <dl>
            <dt></dt>
            <dd></dd>
          </dl>
        </div>
        <div class='key' tabindex='0'>
          <dl>
            <dt></dt>
            <dd></dd>
          </dl>
        </div>
        <div class='key' tabindex='0'>
          <dl>
            <dt></dt>
            <dd></dd>
          </dl>
        </div>
        <div class='key' tabindex='0'>
          <dl>
            <dt></dt>
            <dd></dd>
          </dl>
        </div>
        <div class='key' tabindex='0'>
          <dl>
            <dt></dt>
            <dd></dd>
          </dl>
        </div>
        <div class='key' tabindex='0'>
          <dl>
            <dt></dt>
            <dd></dd>
          </dl>
        </div>
        <div class='key' tabindex='0'>
          <dl>
            <dt></dt>
            <dd></dd>
          </dl>
        </div>
        <div class='key' tabindex='0'>
          <dl>
            <dt></dt>
            <dd></dd>
          </dl>
        </div>
      </div>
    </div>
  </div>
</div>












@endsection


@section('scriptes')

<script type="text/javascript">







</script>


@endsection