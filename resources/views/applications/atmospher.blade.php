<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

        <style>
        /*
         * Base
         */

        /* ----- Fonts ----- */
        @import url(https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,300,300italic,400italic,700,700italic,900,900italic);

        /* ----- Other ----- */
        *{
        	padding: 0;
        	margin: 0;
        }

        body{
        	color: #ffffff;
        	font-family: 'Source Sans Pro', sans-serif;
        }

        :focus{
        	outline: none !important;
        }

        /*
         * Compontents
         */

        /* ----- Reverse scroll ----- */
        .reverse{
        	position: fixed;
        	bottom: 0;
        	left: 0;
        	width: 100%;
        	display: block;
        }

        /* ----- Rocket ----- */
        .rocket{
        	position: fixed;
        	bottom: 30px;
        	left: 50%;
        	margin-left: -100px;
        	z-index: 1;
        	opacity: 1;
        	visibility: visible;
        	-webkit-transition: 500ms opacity, 500ms visibility;
        	transition: 500ms opacity, 500ms visibility;
        	height: 150px;
        }

        .rocket--hidden .rocket{
        	opacity: 0;
        	visibility: hidden;
        }

        /* ----- Layer title ----- */
        .layer-title{
        	position: absolute;
        	bottom: 30px;
        	text-align: center;
        	padding: 0 60px 0 15px;
        	display: none;
        }

        .layer-title h2{
        	text-transform: uppercase;
        	font-size: 40px;
        }

        .layer-title p{
        	font-size: 15px;
        	font-weight: 300;
        	line-height: 22px;
        }

        .layer-title--stratosphere{
        	position: absolute;
        	top: -260px;
        }

        .layer-title--mesosphere{
        	top: 200px;
        }

        .layer-title--thermosphere{
        	top: 1500px;
        }

        .layer-title--exosphere{
        	top: 0;
        }

        /* ----- Layers ----- */
        .layers{
        	overflow: hidden;
        	background: rgb(2,4,27);
        	background: -moz-linear-gradient(top,  rgba(2,4,27,1) 15%, rgba(175,214,224,1) 75%);
        	background: -webkit-linear-gradient(top,  rgba(2,4,27,1) 15%,rgba(175,214,224,1) 75%);
        	background: linear-gradient(to bottom,  rgba(2,4,27,1) 15%,rgba(175,214,224,1) 75%);
        	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#02041b', endColorstr='#afd6e0',GradientType=0 );
        }

        /* -- Troposphere -- */
        .layer--troposphere,
        .layer--mesosphere{
        	position: relative;
        }

        .layer--mesosphere{
        	height: 400px;
        }

        .layer--troposphere{
        	height: 260px;
        }

        .earth__ground{
        	width: 100%;
        	display: block;
        }

        .cloud{
        	position: absolute;
        	left: 0;
        	z-index: 999;
        	height: 35px;
        }

        .cloud--1{
        	top: 0;
        }

        .cloud--2{
        	top: 160px;
        }

        .cloud--3{
        	top: 120px;
        	display: none;
        }

        .cloud--4{
        	top: 120px;
        	display: none;
        }

        .cloud--5{
        	top: 50px;
        }

        .cloud--6{
        	top: 120px;
        }

        .cloud--7{
        	top: 380px;
        	display: none;
        }

        /* ----- Jet stream ----- */
        .layer--jetstream{
        	position: relative;
        	height: 250px;
        }

        .airplane{
        	position: absolute;
        	left: 0;
        	width: 100px;
        }

        .airplane--1{
        	top: 100px;
        }

        .airplane--2{
        	top: 300px;
        }

        .airplane--3{
        	top: 0;
        }

        /* ----- Stratosphere ----- */
        .layer--stratosphere{
        	position: relative;
        	height: 400px;
        }

        /* ----- Thermoosphere ----- */
        .layer--thermosphere{
        	position: relative;
        	height: 700px;
        }

        /* ----- Exosphere ----- */
        .layer--exosphere{
        	position: relative;
        	height: 350px;
        }

        /* ----- Meteoroids ----- */
        .meteoroid{
        	position: absolute;
        	left: 0;
        	top: 1000px;
        	-moz-transform: rotate(-45deg);
        	-webkit-transform: rotate(-45deg);
        	-o-transform: rotate(-45deg);
        	-ms-transform: rotate(-45deg);
        	transform: rotate(-45deg);
        }

        /* ----- Ballon ----- */
        .ballon{
        	position: absolute;
        	top: -50px;
        	left: 40px;
        	width: 100px;
        }

        /* ----- ISS ----- */
        .iss{
        	position: absolute;
        	right: 0;
        	top: 0;
        	width: 200px;
        }

        /* ----- Aurora ----- */
        .aurora{
        	position: absolute;
        	z-index: 1;
        }

        .aurora--1{
        	left: 0;
        	top: 300px;
        }

        .aurora--2{
        	right: 0;
        	top: 300px;
        }

        .aurora--3{
        	top: 320px;
        	left: 50%;
        	margin-left: -300px;
        }

        /* ----- Stars ----- */
        .star{
        	position: absolute;
        }

        .star--1{
        	top: 10px;
        	left: 60px;
        }

        .star--2{
        	top: 10px;
        	right: 200px;
        }

        .star--3{
        	top: 200px;
        	left: 300px;
        }

        .star--4{
        	top: 200px;
        	left: 800px;
        }

        .star--5{
        	top: 200px;
        	right: 50px;
        }

        .star--6{
        	top: 450px;
        	left: 60px;
        }

        .star--7{
        	top: 450px;
        	right: 200px;
        }

        .star--8{
        	top: 730px;
        	left: 660px;
        }

        .star--9{
        	top: 450px;
        	right: 700px;
        }

        .star--10{
        	top: 930px;
        	left: 200px;
        }

        .star--11{
        	top: 1200px;
        	right: 360px;
        }

        .star--12{
        	top: 1400px;
        	left: 200px;
        }

        .star--13{
        	top: 1400px;
        	right: 40%;
        }

        .star--14{
        	top: 1700px;
        	right: 60%;
        }

        .star--15{
        	top: 850px;
        	right: 20%;
        }

        /* ----- Popover ----- */
        .popover{
        	position: absolute;
        	z-index: 9999;
        	left: 50%;
        	margin-left: -25px;
        }

        .popover h3{
        	font-size: 20px;
        	margin: 0 0 15px 0;
        }

        .popover p{
        	font-size: 15px;
        	line-height: 25px;
        	margin: 0 0 15px 0;
        }

        .popover--mountain{
        	top: 0;
        }

        .popover--jetstream{
        	top: 0;
        }

        .popover--ballon{
        	top: 0;
        }

        .popover--mesosphere{
        	top: 0;
        }

        .popover--stratosphere{
        	top: -210px;
        }

        .popover--aurora{
        	top: 470px;
        	z-index: 2;
        }

        .popover--iss{
        	top: 150px;
        }

        .popover--sss{
        	top: 320px;
        }

        .popover--moon{
        	top: 500px;
        }

        .popover--mesosphere-title{
        	top: 170px;
        }

        .popover--thermosphere{
        	top: 665px;
        }

        .popover--exosphere{
        	top: 65px;
        }

        .popover--credits{
        	top: 20px;
        	right: 20px !important;
        	left: auto;
        }

        .popover--credits .popover__content{
        	top: 60px;
        	z-index: 99999;
        	right: 0;
        	left: auto !important;
        	border-radius: 3px;
        }

        .popover--credits .popover__content:before{
        	display: none !important;
        }

        .popover__button{
        	width: 50px;
        	height: 50px;
        	border: 0;
        	background-color: #fff;
        	border-radius: 50%;
        	font-size: 20px;
        	cursor: pointer;
        	-webkit-box-shadow: 0 0 20px 2px rgba(0,0,0,0.2);
        	box-shadow: 0 0 20px 2px rgba(0,0,0,0.2);
        	color: #444;
        }

        .popover__content{
        	position: absolute;
        	top: -240px;
        	right: -95px;
        	left: auto;
        	background-color: #fff;
        	color: #000;
        	width: 200px;
        	opacity: 0;
        	border-radius: 6px;
        	padding: 15px 20px;
        	visibility: hidden;
        	max-height: 200px;
        	overflow: scroll;
        	-webkit-overflow-scrolling: touch;
        	-webkit-transition: 200ms opacity, 200ms visibility;
        	transition: 200ms opacity, 200ms visibility;
        	display: none;
        }

        .popover__content:before{
        	content: '';
        	border-style: solid;
        	border-width: 17.5px 20px 17.5px 0;
        	border-color: transparent #ffffff transparent transparent;
        	position: absolute;
        	left: -20px;
        	top: 30px;
        	display: none;
        }

        .popover--active.popover__content{
        	display: block;
        	opacity: 1;
        	visibility: visible;
        }

        /* ----- Height meter ----- */
        .height-meter{
        	position: fixed;
        	bottom: 0;
        	right: 30px;
        	border-right: 17px solid #ffffff;
        	height: 100%;
        	display: none;
        }

        .height{
        	position: absolute;
        	top: 0;
        	right: 20px;
        	font-size: 20px;
        	font-weight: bold;
        	z-index: 999;
        }

        .height--stratosphere{
        	top: -200px;
        }

        .height--ballon{
        	top: 10px;
        }

        .height--mesosphere{
        	top: 180px;
        }

        .height--thermosphere{
        	top: 680px;
        }

        .height--aurora{
        	top: 480px;
        }

        .height--iss{
        	top: 160px;
        }

        .height--moon{
        	top: 230px;
        }

        .height--exosphere{
        	top: 80px;
        }

        /* ----- Last layer ----- */
        .layer--last{
        	position: relative;
        	height: 700px;
        }

        .moon{
        	position: absolute;
        	left: 50%;
        	top: 300px;
        	margin-left: -100px;
        	width: 200px;
        }

        .sss{
        	position: absolute;
        	top: 20px;
        	left: 50%;
        	width: 100px;
        	margin-left: -50px;
        }

        /* ----- Hide classes ----- */
        .hidden-sm{
        	display: none;
        }

        .visible-md{
        	display: block;
        }

        /* ----- Media queries ----- */
        @media (min-width: 768px){
        	.rocket{
        		bottom: 140px;
        		height: 240px;
        	}

        	.layer--troposphere{
        		height: 1049px;
        	}

        	.cloud{
        		height: auto;
        	}

        	.popover--left .popover__content{
        		right: auto;
        		left: -70px;
        	}

        	.popover__content:before{
        		display: block;
        	}

        	.popover--left .popover__content:before{
        		border-style: solid;
        		border-width: 17.5px 0 17.5px 20px;
        		border-color: transparent transparent transparent #ffffff;
        		left: auto;
        		right: -20px;
        	}

        	.airplane{
        		width: auto;
        	}

        	.layer--jetstream{
        		height: 700px;
        	}

        	.airplane--1{
        		top: 50px;
        	}

        	.airplane--3{
        		top: 390px;
        	}

        	.popover--jetstream{
        		top: 200px;
        	}

        	.layer--stratosphere{
        		height: 1000px;
        	}

        	.ballon{
        		width: auto;
        		left: 300px;
        	}

        	.popover__button{
        		width: 100px;
        		height: 100px;
        		font-size: 50px;
        	}

        	.popover--left .popover__button{
        		margin-left: 0;
        	}

        	.layer--mesosphere{
        		height: 1000px;
        	}

        	.popover--mesosphere{
        		right: 350px;
        		top: -500px;
        	}

        	.layer--thermosphere{
        		position: relative;
        		height: 3000px;
        	}

        	.hidden-sm{
        		display: block;
        	}

        	.height--iss{
        		top: 180px;
        	}

        	.iss{
        		right: 300px;
        		width: auto;
        	}

        	.aurora--1{
        		top: 930px;
        	}

        	.aurora--2{
        		top: 930px;
        	}

        	.aurora--3{
        		top: 950px;
        	}

        	.popover--aurora{
        		top: 1050px;
        	}

        	.layer--exosphere{
        		height: 800px;
        	}

        	.layer--last{
        		height: 2000px;
        	}

        	.moon{
        		width: auto;
        		margin-left: -190px;
        	}

        	.sss{
        		top: 170px;
        		left: 300px;
        		width: auto;
        		margin-left: 0;
        	}

        	.height--moon{
        		top: 580px;
        	}

        	.height--aurora{
        		top: 1060px;
        	}

        	.height--ballon{
        		top: 130px;
        	}

        	.height--thermosphere{
        		top: 1550px;
        	}

        	.height--mesosphere{
        		top: 120px;
        	}

        	.popover h3{
        		font-size: 30px;
        	}

        	.popover p{
        		font-size: 17px;
        	}

        	.popover--iss{
        		right: 400px;
        	}

        	.popover--jetstream{
        		right: 350px;
        	}

        	.popover.popover--sss{
        		left: 500px;
        	}

        	.popover--moon{
        		top: 500px;
        		right: 400px;
        	}

        	.popover--ballon{
        		top: 200px;
        	}

        	.popover--thermosphere{
        		top: 1530px;
        	}

        	.cloud--3,
        	.cloud--4,
        	.cloud--7{
        		display: block;
        	}

        	.height{
        		font-size: 35px;
        	}

        	.popover{
        		margin-left: -50px;
        	}
        }

        @media (min-width: 992px){
        	.layer-title p{
        		font-size: 19px;
        		line-height: 27px;
        	}

        	.layer-title{
        		padding: 0 60px;
        		bottom: 50px;
        	}

        	.rocket{
        		bottom: 200px;
        	}

        	.layer-title{
        		display: block;
        		right: 150px;
        		left: 150px;
        		padding: 0 150px;
        	}

        	.visible-sm{
        		display: none;
        	}

        	.popover.popover--mountain{
        		top: 20px;
        		left: 500px;
        	}

        	.popover.popover--ballon{
        		left: 500px;
        	}

        	.popover.popover--aurora{
        		left: 500px;
        	}

        	.height-meter{
        		display: block;
        	}

        	.height{
        		right: 80px;
        		font-size: 45px;
        	}

        	.height--mesosphere{
        		top: 300px;
        	}

        	.popover{
        		right: 350px;
        		left: auto;
        	}

        	.popover__button{
        		margin-left: -415px;
        	}

        	.popover__content{
        		top: 0;
        		width: 300px;
        		padding: 25px 30px 20px 30px;
        		max-height: none;
        		overflow: visible;
        		display: block;
        	}

        	.popover--left .popover__content{
        		left: -400px;
        	}

        	.popover--active.popover__content{
        		opacity: 1;
        		visibility: visible;
        	}

        	.popover--credits{
        		right: 80px !important;
        	}
        }

        @media (min-width: 1200px){
        	.layer-title h2{
        		font-size: 70px;
        	}

        	.layer-title{
        		bottom: 75px;
        	}

        	.rocket{
        		bottom: 260px;
        	}
        }

        @media (min-width: 1450px){
        	.layer-title{
        		bottom: 95px;
        	}

        	.rocket{
        		height: auto;
        	}
        }

        /* ----- Preloader ----- */
        .preloader{
        	position: fixed;
        	top: 0;
        	left: 0;
        	width: 100%;
        	height: 100%;
        	background-color: #ffffff;
        	z-index: 10000;
        	text-align: center;
        }

        .spinner-wrapper{
        	display: inline-block;
        	position: absolute;
        	top: 50%;
        }

        .spinner, .spinner:before, .spinner:after{
        	width: 5px;
        	height: 25px;
        	background-color: #00B285;
        	border-radius: 2px;
        }

        .spinner{
        	display: inline-block;
        	position: relative;
        }

        .spinner:before, .spinner:after{
        	content: '';
        	position: absolute;
        	display: block;
        	top: 0px;
        }

        .spinner:before{
        	left: -13px;
        }

        .spinner:after{
        	left: 13px;
        }

        @-webkit-keyframes bounce-middle {
          0% {
            height: 9px;
            margin-top: 13px;
            margin-bottom: 13px;
          }
          50% {
            height: 25px;
            margin-top: 5px;
            margin-bottom: 5px;
          }
          100% {
            height: 9px;
            margin-top: 13px;
            margin-bottom: 13px;
          }
        }
        @keyframes bounce-middle {
          0% {
            height: 9px;
            margin-top: 13px;
            margin-bottom: 13px;
          }
          50% {
            height: 25px;
            margin-top: 5px;
            margin-bottom: 5px;
          }
          100% {
            height: 9px;
            margin-top: 13px;
            margin-bottom: 13px;
          }
        }

        .spinner-bounce-middle {
          -webkit-animation: bounce-middle 0.8s ease 0.1s infinite;
                  animation: bounce-middle 0.8s ease 0.1s infinite;
        }

        .spinner-bounce-middle:before, .spinner-bounce-middle:after {
          top: 50%;
          -webkit-transform: translateY(-18px) translateZ(0);
                  transform: translateY(-18px) translateZ(0);
        }

        .spinner-bounce-middle:before {
          -webkit-animation: bounce-middle 0.8s ease 0s infinite;
                  animation: bounce-middle 0.8s ease 0s infinite;
        }

        .spinner-bounce-middle:after {
          -webkit-animation: bounce-middle 0.8s ease 0.2s infinite;
                  animation: bounce-middle 0.8s ease 0.2s infinite;
        }

        /* ----- Credits ----- */
        .credits__btn{
        	background-color: #fff;
        	border: 0;
        	border-radius: 3px;
        	padding: 14px 15px 15px 15px;
        	font-size: 14px;
        	text-transform: uppercase;
        	font-weight: bold;
        	cursor: pointer;
        	display: block;
        	z-index: 9999;
        	top: 20px;
        	margin-left: 0;
        	height: auto;
        	width: auto;
        }

        </style>

    </head>
    <body>

      <div class="preloader">
      			<div class="spinner-wrapper">
      				<div class="spinner spinner-bounce-middle"></div><!-- /.spinner -->
      			</div><!-- /.spinner wrapper -->
      		</div><!-- /.preloader -->

      		<div class="layers">
      			<div class="layer layer--last">
      				<img src="http://dev2.slicejack.com/rocket-launch/img/sss.svg" class="sss">

      				<div class="popover popover--sss popover--left">
      					<button class="popover__button" data-popover="popover-7">
      						<i class="fa fa-question"></i>
      					</button>

      					<div id="popover-7" class="popover__content">
      						<h3>Slicejack Space Station</h3>
      						<p>Slicejack Space Station (SSS) is a space station, or a habitable artificial satellite, placed near by WordPressMoon.</p>
      						<p>SSS is equipped with latest technology which allows crew members to develop beautiful, responsive and maintainable WordPress websites and web applications for its clients.</p>
      					</div><!-- /.content -->
      				</div><!-- /.popover -->

      				<img src="http://dev2.slicejack.com/rocket-launch/img/moon.svg" class="moon">

      				<div class="popover popover--moon">
      					<button class="popover__button" data-popover="popover-8">
      						<i class="fa fa-question"></i>
      					</button>

      					<div id="popover-8" class="popover__content">
      						<h3>WordPressMoon</h3>
      						<p>The WordPressMoon is Earth's only natural satellite. It is one of the largest natural satellites in the Solar System.</p>
      						<p>It takes 25% of entire Solar System in front of JoomlaMoon.</p>
      					</div><!-- /.content -->
      				</div><!-- /.popover -->

      				<span class="height height--moon">385,000 km</span><!-- /.height -->

      				<img src="http://dev2.slicejack.com/rocket-launch/img/star.svg" class="star star--1">
      				<img src="http://dev2.slicejack.com/rocket-launch/img/star.svg" class="star star--2">
      				<img src="http://dev2.slicejack.com/rocket-launch/img/star--big.svg" class="star star--3">
      				<img src="http://dev2.slicejack.com/rocket-launch/img/star.svg" class="star star--4">
      				<img src="http://dev2.slicejack.com/rocket-launch/img/star.svg" class="star star--5">
      				<img src="http://dev2.slicejack.com/rocket-launch/img/star--big.svg" class="star star--6">
      				<img src="http://dev2.slicejack.com/rocket-launch/img/star.svg" class="star star--7">
      				<img src="http://dev2.slicejack.com/rocket-launch/img/star.svg" class="star star--8">
      				<img src="http://dev2.slicejack.com/rocket-launch/img/star--big.svg" class="star star--9">
      				<img src="http://dev2.slicejack.com/rocket-launch/img/star.svg" class="star star--10">
      				<img src="http://dev2.slicejack.com/rocket-launch/img/star.svg" class="star star--11">
      				<img src="http://dev2.slicejack.com/rocket-launch/img/star.svg" class="star star--12">
      				<img src="http://dev2.slicejack.com/rocket-launch/img/star--big.svg" class="star star--13">
      				<img src="http://dev2.slicejack.com/rocket-launch/img/star.svg" class="star star--14">
      				<img src="http://dev2.slicejack.com/rocket-launch/img/star.svg" class="star star--15">
      			</div><!-- /.layer last -->

      			<div class="layer layer--exosphere">
      				<div class="layer-title layer-title--exosphere">
      					<h2>Exosphere</h2>
      					<p>The exosphere is a thin, atmosphere-like volume surrounding a planetary body where molecules are gravitationally bound to that body, but where the density is too low for them to behave as a gas by colliding with each other. The exosphere is the uppermost layer of atmosphere, where the atmosphere thins out and merges with interplanetary space. It is located directly above the thermosphere.</p>
      				</div><!-- /.layer title -->

      				<div class="popover popover--exosphere visible-sm visible-md">
      					<button class="popover__button" data-popover="popover-12">
      						<i class="fa fa-question"></i>
      					</button>

      					<div id="popover-12" class="popover__content">
      						<h3>Exosphere</h3>
      						<p>The exosphere is a thin, atmosphere-like volume surrounding a planetary body where molecules are gravitationally bound to that body, but where the density is too low for them to behave as a gas by colliding with each other. The exosphere is the uppermost layer of atmosphere, where the atmosphere thins out and merges with interplanetary space. It is located directly above the thermosphere.</p>
      					</div><!-- /.content -->
      				</div><!-- /.popover -->

      				<span class="height height--exosphere">600 km</span><!-- /.height -->

      				<img src="http://dev2.slicejack.com/rocket-launch/img/star.svg" class="star star--1">
      				<img src="http://dev2.slicejack.com/rocket-launch/img/star.svg" class="star star--2">
      				<img src="http://dev2.slicejack.com/rocket-launch/img/star--big.svg" class="star star--3">
      				<img src="http://dev2.slicejack.com/rocket-launch/img/star.svg" class="star star--4">
      				<img src="http://dev2.slicejack.com/rocket-launch/img/star.svg" class="star star--5">
      				<img src="http://dev2.slicejack.com/rocket-launch/img/star--big.svg" class="star star--6">
      				<img src="http://dev2.slicejack.com/rocket-launch/img/star.svg" class="star star--7">
      				<img src="http://dev2.slicejack.com/rocket-launch/img/star.svg" class="star star--8">
      				<img src="http://dev2.slicejack.com/rocket-launch/img/star--big.svg" class="star star--9">
      				<img src="http://dev2.slicejack.com/rocket-launch/img/star.svg" class="star star--10">
      			</div><!-- /.exosphere -->

      			<div class="layer layer--thermosphere">
      				<div class="layer-title layer-title--thermosphere">
      					<h2>Thermosphere</h2>
      					<p>The thermosphere is the layer of the Earth's atmosphere directly above the mesosphere and directly below the exosphere. The thermosphere begins about 85 kilometres above the Earth. Temperatures are highly dependent on solar activity, and can rise to 2,000 Â°C.</p>
      				</div><!-- /.layer title -->

      				<div class="popover popover--thermosphere visible-sm visible-md">
      					<button class="popover__button" data-popover="popover-11">
      						<i class="fa fa-question"></i>
      					</button>

      					<div id="popover-11" class="popover__content">
      						<h3>Thermosphere</h3>
      						<p>The thermosphere is the layer of the Earth's atmosphere directly above the mesosphere and directly below the exosphere. The thermosphere begins about 85 kilometres above the Earth. Temperatures are highly dependent on solar activity, and can rise to 2,000 Â°C.</p>
      					</div><!-- /.content -->
      				</div><!-- /.popover -->

      				<span class="height height--aurora">100 km</span><!-- /.height -->

      				<span class="height height--thermosphere">85 km</span><!-- /.height -->

      				<img src="http://dev2.slicejack.com/rocket-launch/img/star.svg" class="star star--1">
      				<img src="http://dev2.slicejack.com/rocket-launch/img/star.svg" class="star star--2">
      				<img src="http://dev2.slicejack.com/rocket-launch/img/star--big.svg" class="star star--3">
      				<img src="http://dev2.slicejack.com/rocket-launch/img/star.svg" class="star star--4">
      				<img src="http://dev2.slicejack.com/rocket-launch/img/star.svg" class="star star--5">
      				<img src="http://dev2.slicejack.com/rocket-launch/img/star--big.svg" class="star star--6">
      				<img src="http://dev2.slicejack.com/rocket-launch/img/star.svg" class="star star--7">
      				<img src="http://dev2.slicejack.com/rocket-launch/img/star.svg" class="star star--8 hidden-sm">
      				<img src="http://dev2.slicejack.com/rocket-launch/img/star--big.svg" class="star star--9 hidden-sm">
      				<img src="http://dev2.slicejack.com/rocket-launch/img/star.svg" class="star star--10 hidden-sm">
      				<img src="http://dev2.slicejack.com/rocket-launch/img/star.svg" class="star star--11 hidden-sm">
      				<img src="http://dev2.slicejack.com/rocket-launch/img/star.svg" class="star star--12 hidden-sm">
      				<img src="http://dev2.slicejack.com/rocket-launch/img/star--big.svg" class="star star--13 hidden-sm">
      				<img src="http://dev2.slicejack.com/rocket-launch/img/star.svg" class="star star--14 hidden-sm">
      				<img src="http://dev2.slicejack.com/rocket-launch/img/star.svg" class="star star--15 hidden-sm">

      				<div class="popover popover--aurora popover--left">
      					<button class="popover__button" data-popover="popover-5">
      						<i class="fa fa-question"></i>
      					</button>

      					<div id="popover-5" class="popover__content">
      						<h3>Aurora Borealis</h3>
      						<p>An aurora is a natural light display in the sky, predominantly seen in the high latitude (Arctic and Antarctic) regions.</p>
      						<p>Auroras are produced when the magnetosphere is sufficiently disturbed by the solar wind that the trajectories of charged particles in both solar wind and magnetospheric plasma, mainly in the form of electrons and protons, precipitate them into the upper atmosphere (thermosphere/exosphere), where their energy is lost.</p>
      					</div><!-- /.content -->
      				</div><!-- /.popover -->

      				<img src="http://dev2.slicejack.com/rocket-launch/img/aurora.png" class="aurora aurora--1">
      				<img src="http://dev2.slicejack.com/rocket-launch/img/aurora-2.png" class="aurora aurora--2">
      				<img src="http://dev2.slicejack.com/rocket-launch/img/aurora-3.png" class="aurora aurora--3">

      				<img src="http://dev2.slicejack.com/rocket-launch/img/iss.svg" class="iss">

      				<span class="height height--iss">350 km</span><!-- /.height -->

      				<div class="popover popover--iss">
      					<button class="popover__button" data-popover="popover-6">
      						<i class="fa fa-question"></i>
      					</button>

      					<div id="popover-6" class="popover__content">
      						<h3>International Space Station</h3>

      						<p>The International Space Station (ISS) is a space station, or a habitable artificial satellite, in low Earth orbit. Its first component launched into orbit in 1998, and the ISS is now the largest artificial body in orbit and can often be seen with the naked eye from Earth. ISS components have been launched by Russian Proton and Soyuz rockets as well as American Space Shuttles.</p>

      						<p>The ISS maintains an orbit with an altitude of between 330 and 435 km by means of reboost manoeuvres using the engines of the Zvezda module or visiting spacecraft. It completes 15.54 orbits per day.</p>
      					</div><!-- /.content -->
      				</div><!-- /.popover -->

      				<svg xmlns="http://www.w3.org/2000/svg" version="1.1" id="Layer_1" class="meteoroid meteoroid--1 hidden-sm" x="0px" y="0px" width="93px" height="265px" viewBox="0 0 93.667 265.667" enable-background="new 0 0 93.667 265.667" xml:space="preserve"><path fill="#FAE281" class="meteoroid--flame1" d="M55.97 46.013c0 0 51.663 188.283 2.73 207.536C2.748 275.561 0.616 149.375 39.947 45.618c0 0-13.673 67.712-6.991 73.552 10.496 9.173 11.188-83.313 12.149-85.392 0.554-1.195 2.228 64.759 2.461 72.435 0.283 9.333 2.348 25.218 6.513 11.946 4.165-13.273-2.587-72.068-2.587-72.068s7.935 54.452 11.318 63.524C68.124 123.867 57.525 54.155 55.97 46.013"/><path fill="#F89624" class="meteoroid--flame2" d="M65.626 140.969c0 0 30.185 86.277-7.588 108.536C22.184 270.633 0.432 201.07 30.504 123.572c0 0-3.538 40.961 2.578 42.038 5.613 0.988 8.638-35.138 11.575-41.241 2.939-6.104 6.118 24.067 7.196 28.88 1.457 6.511 3.859 16.026 8.888 7.967C65.911 152.932 63.546 136.63 65.626 140.969"/><path fill="#F26330" d="M60.333 244.962c-29.751 21.52-48.299-23.979-32.894-52.175 10.316-18.884 24.102-17.287 24.841-13.988 1 4.46 2.646 10.981 6.092 5.461C61.915 178.58 84.682 227.352 60.333 244.962"/><path fill="#F05432" d="M30.472 240.681c-5.737-3.189-9.121-11.017-7.592-13.183 5.09-7.207-4.166-14.736 6.308-23.621 2.295-1.947 6.496 0.642 8.26-0.601 12.108-8.544 15.928 1.228 27.337 6.246 8.926 3.924 10.009 23.473-1.528 30.142 -2.029 1.174-1.966 4.52-3.752 5.972C48.273 254.764 38.929 245.381 30.472 240.681"/><defs><rect id="SVGID_1_" x="24.507" y="197.803" transform="matrix(0.5115 -0.8593 0.8593 0.5115 -166.6528 144.1982)" width="37.974" height="41.731"/></defs><clipPath id="SVGID_2_"><use overflow="visible"/></clipPath><defs><rect id="SVGID_3_" x="35.76" y="219.592" transform="matrix(0.5115 -0.8593 0.8593 0.5115 -174.9886 154.2067)" width="24.747" height="22.833"/></defs><clipPath id="SVGID_4_"><use overflow="visible"/></clipPath><defs><rect id="SVGID_5_" x="45.42" y="239.688" transform="matrix(0.5114 -0.8594 0.8594 0.5114 -184.6686 161.0186)" width="7.68" height="6.426"/></defs><clipPath id="SVGID_6_"><use overflow="visible"/></clipPath><defs><rect id="SVGID_7_" x="30.258" y="212.374" transform="matrix(0.5114 -0.8593 0.8593 0.5114 -167.6597 134.6696)" width="8.685" height="4.806"/></defs><clipPath id="SVGID_8_"><use overflow="visible"/></clipPath><defs><rect id="SVGID_9_" x="58.448" y="216.64" transform="matrix(0.5116 -0.8593 0.8593 0.5116 -158.4581 160.9526)" width="7.784" height="6.424"/></defs><clipPath id="SVGID_10_"><use overflow="visible"/></clipPath></svg>

      				<svg xmlns="http://www.w3.org/2000/svg" version="1.1" id="Layer_1" class="meteoroid meteoroid--2 hidden-sm" x="0px" y="0px" width="93px" height="265px" viewBox="0 0 93.667 265.667" enable-background="new 0 0 93.667 265.667" xml:space="preserve"><path fill="#FAE281" class="meteoroid--flame1" d="M55.97 46.013c0 0 51.663 188.283 2.73 207.536C2.748 275.561 0.616 149.375 39.947 45.618c0 0-13.673 67.712-6.991 73.552 10.496 9.173 11.188-83.313 12.149-85.392 0.554-1.195 2.228 64.759 2.461 72.435 0.283 9.333 2.348 25.218 6.513 11.946 4.165-13.273-2.587-72.068-2.587-72.068s7.935 54.452 11.318 63.524C68.124 123.867 57.525 54.155 55.97 46.013"/><path fill="#F89624" class="meteoroid--flame2" d="M65.626 140.969c0 0 30.185 86.277-7.588 108.536C22.184 270.633 0.432 201.07 30.504 123.572c0 0-3.538 40.961 2.578 42.038 5.613 0.988 8.638-35.138 11.575-41.241 2.939-6.104 6.118 24.067 7.196 28.88 1.457 6.511 3.859 16.026 8.888 7.967C65.911 152.932 63.546 136.63 65.626 140.969"/><path fill="#F26330" d="M60.333 244.962c-29.751 21.52-48.299-23.979-32.894-52.175 10.316-18.884 24.102-17.287 24.841-13.988 1 4.46 2.646 10.981 6.092 5.461C61.915 178.58 84.682 227.352 60.333 244.962"/><path fill="#F05432" d="M30.472 240.681c-5.737-3.189-9.121-11.017-7.592-13.183 5.09-7.207-4.166-14.736 6.308-23.621 2.295-1.947 6.496 0.642 8.26-0.601 12.108-8.544 15.928 1.228 27.337 6.246 8.926 3.924 10.009 23.473-1.528 30.142 -2.029 1.174-1.966 4.52-3.752 5.972C48.273 254.764 38.929 245.381 30.472 240.681"/><defs><rect id="SVGID_1_" x="24.507" y="197.803" transform="matrix(0.5115 -0.8593 0.8593 0.5115 -166.6528 144.1982)" width="37.974" height="41.731"/></defs><clipPath id="SVGID_2_"><use overflow="visible"/></clipPath><defs><rect id="SVGID_3_" x="35.76" y="219.592" transform="matrix(0.5115 -0.8593 0.8593 0.5115 -174.9886 154.2067)" width="24.747" height="22.833"/></defs><clipPath id="SVGID_4_"><use overflow="visible"/></clipPath><defs><rect id="SVGID_5_" x="45.42" y="239.688" transform="matrix(0.5114 -0.8594 0.8594 0.5114 -184.6686 161.0186)" width="7.68" height="6.426"/></defs><clipPath id="SVGID_6_"><use overflow="visible"/></clipPath><defs><rect id="SVGID_7_" x="30.258" y="212.374" transform="matrix(0.5114 -0.8593 0.8593 0.5114 -167.6597 134.6696)" width="8.685" height="4.806"/></defs><clipPath id="SVGID_8_"><use overflow="visible"/></clipPath><defs><rect id="SVGID_9_" x="58.448" y="216.64" transform="matrix(0.5116 -0.8593 0.8593 0.5116 -158.4581 160.9526)" width="7.784" height="6.424"/></defs><clipPath id="SVGID_10_"><use overflow="visible"/></clipPath></svg>
      			</div><!-- /.thermosphere -->

      			<div class="layer layer--mesosphere">
      				<div class="layer-title layer-title--mesosphere">
      					<h2>Mesosphere</h2>
      					<p>The mesosphere is the layer of the Earth's atmosphere that is directly above the stratopause and directly below the mesopause. The exact upper and lower boundaries of the mesosphere vary with latitude and with season, but the lower boundary of the mesosphere is usually located at heights of about 50 kilometres above the Earth's surface and the mesopause is usually at heights near 100 kilometres, except at middle and high latitudes in summer where it descends to heights of about 85 kilometres.</p>
      				</div><!-- /.layer title -->

      				<div class="popover popover--mesosphere-title visible-sm visible-md">
      					<button class="popover__button" data-popover="popover-10">
      						<i class="fa fa-question"></i>
      					</button>

      					<div id="popover-10" class="popover__content">
      						<h3>Mesosphere</h3>
      						<p>The mesosphere is the layer of the Earth's atmosphere that is directly above the stratopause and directly below the mesopause. The exact upper and lower boundaries of the mesosphere vary with latitude and with season, but the lower boundary of the mesosphere is usually located at heights of about 50 kilometres above the Earth's surface and the mesopause is usually at heights near 100 kilometres, except at middle and high latitudes in summer where it descends to heights of about 85 kilometres.</p>
      					</div><!-- /.content -->
      				</div><!-- /.popover -->

      				<span class="height height--mesosphere">50 km</span><!-- /.height -->

      				<div class="popover popover--mesosphere hidden-sm">
      					<button class="popover__button" data-popover="popover-4">
      						<i class="fa fa-question"></i>
      					</button>

      					<div id="popover-4" class="popover__content">
      						<h3>Meteoroids in mesosphere</h3>
      						<p>Most meteors burn up as they travel through the mesosphere, we call them shooting stars. Still, 37 000 to 78 000 tons of space dust fall to Earth each year.</p>
      					</div><!-- /.content -->
      				</div><!-- /.popover -->
      			</div><!-- /.mesosphere -->

      			<div class="layer layer--stratosphere">
      				<span class="height height--ballon">39 km</span><!-- /.height -->

      				<img src="http://dev2.slicejack.com/rocket-launch/img/ballon.svg" class="ballon">

      				<div class="popover popover--ballon popover--left">
      					<button class="popover__button" data-popover="popover-3">
      						<i class="fa fa-question"></i>
      					</button>

      					<div id="popover-3" class="popover__content">
      						<h3>Red Bull Stratos</h3>
      						<p>Red Bull Stratos was a space diving project involving Austrian skydiver Felix Baumgartner. On 14 October 2012, Baumgartner flew approximately 39 kilometres (24 mi) into the stratosphere over New Mexico, United States, in a helium balloon before free falling in a pressure suit and then parachuting to Earth.</p>

      						<p>Reaching 1,357.64 km/h (843.6 mph) Baumgartner broke the sound barrier on his descent, thus becoming the first human to do so without any form of engine power.</p>
      					</div><!-- /.content -->
      				</div><!-- /.popover -->
      			</div><!-- /.stratosphere -->

      			<div class="layer layer--jetstream">
      				<span class="height height--stratosphere">20 km</span><!-- /.height -->

      				<div class="layer-title layer-title--stratosphere">
      					<h2>Stratosphere</h2>
      					<p>The stratosphere is the second major layer of Earth's atmosphere, just above the troposphere, and below the mesosphere. At moderate latitudes the stratosphere is situated between about 10â€“13 km and 50 km altitude above the surface, while at the poles it starts at about 8 km altitude, and near the equator it may start at altitudes as high as 18 km.</p>
      				</div><!-- /.layer title -->

      				<div class="popover popover--stratosphere visible-sm visible-md">
      					<button class="popover__button" data-popover="popover-9">
      						<i class="fa fa-question"></i>
      					</button>

      					<div id="popover-9" class="popover__content">
      						<h3>Stratosphere</h3>
      						<p>The stratosphere is the second major layer of Earth's atmosphere, just above the troposphere, and below the mesosphere. At moderate latitudes the stratosphere is situated between about 10â€“13 km and 50 km altitude above the surface, while at the poles it starts at about 8 km altitude, and near the equator it may start at altitudes as high as 18 km.</p>
      					</div><!-- /.content -->
      				</div><!-- /.popover -->

      				<img src="http://dev2.slicejack.com/rocket-launch/img/airplane.svg" class="airplane airplane--1">
      				<img src="http://dev2.slicejack.com/rocket-launch/img/airplane--right.svg" class="airplane airplane--3">
      				<img src="http://dev2.slicejack.com/rocket-launch/img/cloud.svg" class="cloud cloud--6">
      				<img src="http://dev2.slicejack.com/rocket-launch/img/cloud.svg" class="cloud cloud--7">

      				<div class="popover popover--jetstream popover--right">
      					<button class="popover__button" data-popover="popover-2">
      						<i class="fa fa-question"></i>
      					</button>

      					<div id="popover-2" class="popover__content">
      						<h3>Jet stream</h3>
      						<p>Jet streams are fast flowing, narrow air currents found in the atmosphere of some planets, including Earth. The main jet streams are located near the altitude of the tropopause.</p>
      						<p>It cut the trip time by over one-third, from 18 to 11.5 hours. Not only does it cut time off the flight, it also nets fuel savings for the airline industry. Within North America, the time needed to fly east across the continent can be decreased by about 30 minutes if an airplane can fly with the jet stream, or increased by more than that amount if it must fly west against it.</p>
      					</div><!-- /.content -->
      				</div><!-- /.popover -->
      			</div><!-- /.jetstream -->

      			<div class="layer layer--troposphere">
      				<span class="height">8,8 km</span><!-- /.height -->

      				<div class="popover popover--mountain popover--left">
      					<button class="popover__button" data-popover="popover-1">
      						<i class="fa fa-question"></i>
      					</button>

      					<div id="popover-1" class="popover__content">
      						<h3>Mount Everest</h3>
      						<p>Mount Everest, also known in Nepal as SagarmÄthÄ and in Tibet as Chomolungma, is Earth's highest mountain. It is located in the Mahalangur mountain range in Nepal. Its peak is 8,848 metres (29,029 ft) above sea level.</p>
      					</div><!-- /.content -->
      				</div><!-- /.popover -->

      				<img src="http://dev2.slicejack.com/rocket-launch/img/cloud.svg" class="cloud cloud--1">
      				<img src="http://dev2.slicejack.com/rocket-launch/img/cloud.svg" class="cloud cloud--3">
      				<img src="http://dev2.slicejack.com/rocket-launch/img/cloud.svg" class="cloud cloud--4">

      				<img src="http://dev2.slicejack.com/rocket-launch/img/earth.svg" class="earth__ground" style="position: absolute; bottom: 0;">

      				<div class="layer-title">
      					<h2>Troposphere</h2>
      					<p>The troposphere is the lowest layer of Earth's atmosphere. It extends from Earth's surface to an average height of about 12 km, although this altitude actually varies from about 9 km (30,000 ft) at the poles to 17 km (56,000 ft) at the equator, with some variation due to weather.</p>
      				</div><!-- /.layer title -->
      			</div><!-- /.troposphere -->
      		</div><!-- /.layers -->

      		<svg xmlns="http://www.w3.org/2000/svg" version="1.1" class="rocket" id="Layer_1" x="0px" y="0px" width="200px" viewBox="0 0 83.846 148.478" enable-background="new 0 0 83.846 148.478" xml:space="preserve"><polyline fill-rule="evenodd" clip-rule="evenodd" fill="#E7563D" points="56.234 83.073 83.846 108.798 82.192 115.697 52.673 109.732 "/><polyline fill-rule="evenodd" clip-rule="evenodd" fill="#E7563D" points="26.94 83.45 0 109.882 1.833 116.735 31.188 110.011 "/><path fill="#F3F3F3" d="M51.557 24.835L40.67 24.92l-10.889 0.083c0 0-9.044 8.514-8.828 36.734 0.219 28.218 7.987 55.714 7.987 55.714l12.444-0.097 12.442-0.097c0 0 7.343-27.61 7.125-55.83C60.734 33.209 51.557 24.835 51.557 24.835z"/><path fill="#E6E6E5" d="M40.976 59.389c4.557-0.035 8.238-3.772 8.203-8.333 -0.033-4.56-3.773-8.239-8.331-8.206 -4.556 0.037-8.24 3.776-8.205 8.333C32.678 55.746 36.418 59.424 40.976 59.389z"/><path fill="#3CBEE8" d="M40.99 61.215c5.575-0.043 10.058-4.597 10.017-10.174 -0.044-5.574-4.598-10.059-10.173-10.016 -5.576 0.042-10.059 4.596-10.014 10.172C30.861 56.774 35.417 61.257 40.99 61.215zM40.857 44.131c3.853-0.029 7.014 3.082 7.042 6.934 0.028 3.854-3.081 7.015-6.933 7.043 -3.854 0.03-7.013-3.079-7.044-6.936C33.894 47.321 37.005 44.161 40.857 44.131z"/><path fill="#E6E6E5" d="M41.265 80.053c2.202-0.019 3.978-1.822 3.963-4.024 -0.018-2.202-1.824-3.978-4.024-3.962 -2.2 0.017-3.98 1.823-3.961 4.024C37.258 78.292 39.064 80.069 41.265 80.053z"/><path fill="#3CBEE8" d="M41.272 80.934c2.692-0.021 4.856-2.221 4.836-4.912 -0.021-2.692-2.22-4.857-4.912-4.837 -2.692 0.022-4.858 2.22-4.837 4.912C36.382 78.789 38.581 80.954 41.272 80.934zM41.208 72.685c1.858-0.014 3.386 1.488 3.401 3.349 0.013 1.861-1.489 3.387-3.349 3.4 -1.86 0.015-3.385-1.487-3.4-3.349C37.845 74.224 39.349 72.699 41.208 72.685z"/><path fill="#E6E6E5" d="M41.501 98.29c2.201-0.017 3.977-1.82 3.962-4.023 -0.017-2.2-1.823-3.979-4.023-3.962 -2.201 0.018-3.979 1.821-3.963 4.023C37.495 96.531 39.3 98.308 41.501 98.29z"/><path fill="#3CBEE8" d="M41.507 99.173c2.692-0.021 4.858-2.221 4.837-4.913 -0.021-2.691-2.22-4.858-4.912-4.837 -2.692 0.021-4.857 2.22-4.835 4.912C36.618 97.027 38.816 99.192 41.507 99.173zM41.445 90.922c1.858-0.012 3.386 1.489 3.401 3.349 0.013 1.861-1.489 3.388-3.349 3.401 -1.861 0.015-3.386-1.487-3.4-3.35C38.081 92.463 39.583 90.938 41.445 90.922z"/><path fill-rule="evenodd" clip-rule="evenodd" fill="#F7AC3C" d="M32.476 119.037l19.098 0.504c0 0 3.081 11.104-1.624 23.258 0 0-1.305-2.114-3.199-4.689 0 0-0.39 5.073-4.67 10.368C42.08 148.478 29.039 143.459 32.476 119.037z" id="flame1"/><path fill-rule="evenodd" clip-rule="evenodd" fill="#F2D972" d="M34.354 119.072l15.006 0.395c0 0 3.02 7.916-0.674 17.467 0 0-1.604-2.024-2.509-3.916 0 0-0.914 5.025-4.276 9.185C41.902 142.202 31.654 138.261 34.354 119.072z" id="flame2"/><path fill="#D43D27" d="M32.193 119.719l-4.665 0.06c-0.803 0.01-1.463-0.633-1.474-1.437l0 0c-0.011-0.802 0.631-1.461 1.436-1.472l27.14-0.351c0.804-0.012 1.464 0.631 1.474 1.436l0 0c0.01 0.803-0.632 1.462-1.436 1.471L32.193 119.719"/><polygon fill="#E7563D" points="27.587 26.209 40.489 0 53.795 26.006 "/><path fill="#D43D27" d="M54.846 27.07c0.004 0.593-0.473 1.075-1.063 1.081l-26.15 0.202c-0.59 0.004-1.076-0.471-1.08-1.062l0 0c-0.005-0.592 0.473-1.076 1.064-1.081l26.149-0.202C54.354 26.003 54.84 26.48 54.846 27.07L54.846 27.07z"/></svg>

      		<div class="height-meter"></div><!-- /.height meter -->

      		<div class="popover popover--credits">
      			<button class="popover__button credits__btn" data-popover="popover-13">More info about project</button>

      			<div id="popover-13" class="popover__content">
      				<h3>Discover atmosphere with us</h3>
      				<p>We have to credit few authors that helped us to create this beautiful educational presentation.</p>
      				<p>For beautiful design we have to credit <a href="http://www.freepik.com" target="_blank">Freepik</a>.</p>
      				<p>For icons we have used <a href="http://fontawesome.io" target="_blank">Font Awesome</a> icons pack by Dave Gandy.</p>
      				<p>Smooth transitions and animations are created by <a href="https://greensock.com/get-started-js" target="_blank">GreenSock Animation Platform</a></p>
      				<p>If you want to learn more about this project then read our blog post at <a href="http://slicejack.com/?p=1957">SliceJack blog.</a></p>
      			</div><!-- /.content -->
      		</div><!-- /.popover -->

      		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
      		<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.18.0/TweenMax.min.js"></script>
      		<script src="https://cdnjs.cloudflare.com/ajax/libs/snap.svg/0.4.1/snap.svg-min.js"></script>



    <script>
    ( function( $, Snap ) {

    	// Window width
    		var $window_width = window.innerWidth;

    	// Load page from bottom
    	$(window).on('load', function () {
    		$('html, body').animate({scrollTop: $(document).height()-$(window).height()}, 1);
    	});

    	// setTimeout Preloader
    	setTimeout(function(){
    		$('.preloader').fadeOut('300');
    	}, 2000);

    	// Rocket fire animation
    		// Get flames
    		var flame1 = Snap("#flame1");
    		var flame2 = Snap("#flame2");

    		// Animations
    		var flame1_animation1 = function() {
    			flame1.animate( {
    				d: "M32.61,118.193l18.965,1.348c0,0,1.178,15.857-3.526,28.011c0,0,0.597-6.866-1.297-9.441c0,0,2.107,1.288-2.172,6.583C44.578,144.693,29.173,142.615,32.61,118.193z"
    			}, 400, flame1_animation2 );
    		};

    		var flame1_animation2 = function() {
    			flame1.animate( {
    				d: "M32.476,119.037l19.098,0.504c0,0,3.081,11.104-1.624,23.258c0,0-1.305-2.114-3.199-4.689c0,0-0.39,5.073-4.67,10.368C42.08,148.478,29.039,143.459,32.476,119.037z"
    			}, 400, flame1_animation1 );
    		};

    		var flame2_animation1 = function() {
    			flame2.animate( {
    				d: "M34.354,119.072l15.006,0.395c0,0,1.008,6.658-2.687,16.21c0,0,0.409-0.767-0.496-2.658c0,0-0.329,0.936-3.691,5.096C42.487,138.113,31.654,138.26,34.354,119.072z"
    			}, 400, flame2_animation2 );
    		};

    		var flame2_animation2 = function() {
    			flame2.animate( {
    				d: "M34.354,119.072l15.006,0.395c0,0,3.02,7.916-0.674,17.467c0,0-1.604-2.024-2.509-3.916c0,0-0.914,5.025-4.276,9.185C41.902,142.202,31.654,138.261,34.354,119.072z"
    			}, 400, flame2_animation1 );
    		};

    		// Start animation
    		flame1_animation1();
    		flame2_animation1();

    	// Clouds animation
    		// Get clouds
    		var $cloud_1 = $('.cloud--1');
    		var $cloud_2 = $('.cloud--2');
    		var $cloud_3 = $('.cloud--3');
    		var $cloud_4 = $('.cloud--4');
    		var $cloud_5 = $('.cloud--5');
    		var $cloud_6 = $('.cloud--6');
    		var $cloud_7 = $('.cloud--7');

    		// Cloud animations
    			// Cloud 1
    			TweenMax.fromTo( $cloud_1, 30, { x:-280, ease: Linear.easeNone }, { x:$window_width, repeat: -1, ease: Linear.easeNone });
    			// Cloud 2
    			TweenMax.fromTo( $cloud_2, 30, { x:-280, ease: Linear.easeNone }, { x:$window_width, repeat: -1, ease: Linear.easeNone, delay: 4 });
    			// Cloud 3
    			TweenMax.fromTo( $cloud_3, 30, { x:-280, ease: Linear.easeNone }, { x:$window_width, repeat: -1, ease: Linear.easeNone, delay: 8 });
    			// Cloud 4
    			TweenMax.fromTo( $cloud_4, 33, { x:-280, ease: Linear.easeNone }, { x:$window_width, repeat: -1, ease: Linear.easeNone, delay: 20 });
    			// Cloud 5
    			TweenMax.fromTo( $cloud_5, 30, { x:-280, ease: Linear.easeNone }, { x:$window_width, repeat: -1, ease: Linear.easeNone, delay: 13 });
    			// Cloud 6
    			TweenMax.fromTo( $cloud_6, 40, { x:-280, ease: Linear.easeNone }, { x:$window_width, repeat: -1, ease: Linear.easeNone });
    			// Cloud 7
    			TweenMax.fromTo( $cloud_7, 25, { x:-280, ease: Linear.easeNone }, { x:$window_width, repeat: -1, ease: Linear.easeNone });

    	// Airplanes animation
    		// Get airplanes
    		var $airplane_1 = $('.airplane--1');
    		var $airplane_2 = $('.airplane--2');
    		var $airplane_3 = $('.airplane--3');

    		// Cloud animations
    			// Airplane 1
    			TweenMax.fromTo( $airplane_1, 8, { x:$window_width, ease: Linear.easeNone }, { x:-280, repeat: -1, ease: Linear.easeNone });
    			// Airplane 2
    			TweenMax.fromTo( $airplane_2, 8, { x:-280, ease: Linear.easeNone }, { x:$window_width, repeat: -1, ease: Linear.easeNone });
    			// Airplane 3
    			TweenMax.fromTo( $airplane_3, 8, { x:-280, ease: Linear.easeNone, delay: 0 }, { x:$window_width, repeat: -1, ease: Linear.easeNone, delay: 3 });

    	// Ballon animation
    		// Get ballon
    		var $ballon = $('.ballon');

    		// Animation
    		TweenMax.to( $ballon, 20, { bezier:{ type:'quadratic', values:[ {x:0, y:0}, {x:100, y:0}, {x:100, y:100}, {x:100, y:200}, {x:0, y:200}, {x:-100, y:200}, {x:-100, y:100}, {x:-100, y:0},{x:0, y:0} ] }, ease: Linear.easeNone, repeat: -1 } );

    	// Meteoroid flames animation
    		// Get flames
    		var meteoroid_flame1 = Snap.selectAll(".meteoroid--flame1");
    		var meteoroid_flame2 = Snap.selectAll(".meteoroid--flame2");

    		// Animations
    		var meteoroid_flame1_animation1 = function() {
    			meteoroid_flame1.animate( {
    				d: "M55.97,46.013c0,0,51.663,188.283,2.73,207.536C2.748,275.561,0.616,149.375,39.947,45.618c0,0-13.673,67.712-6.991,73.552c10.496,9.173,11.188-83.313,12.149-85.392c0.554-1.195,2.228,64.759,2.461,72.435c0.283,9.333,2.348,25.218,6.513,11.946c4.165-13.273-2.587-72.068-2.587-72.068s7.935,54.452,11.318,63.524C68.124,123.867,57.525,54.155,55.97,46.013"
    			}, 400, meteoroid_flame1_animation2 );
    		};

    		var meteoroid_flame1_animation2 = function() {
    			meteoroid_flame1.animate( {
    				d: "M65.834,72.663c0,0,41.799,161.633-7.134,180.886C2.748,275.561-5.164,168.921,34.167,65.165c0,0-7.893,48.165-1.211,54.005c10.496,9.173,10.416-37.76,11.377-39.838c0.554-1.195,3,19.206,3.233,26.882c0.283,9.333,2.348,25.218,6.513,11.946c4.165-13.273-7.246-63.328-7.246-63.328s12.594,45.711,15.977,54.784C68.124,123.867,67.389,80.805,65.834,72.663"
    			}, 400, meteoroid_flame1_animation1 );
    		};

    		var meteoroid_flame2_animation1 = function() {
    			meteoroid_flame2.animate( {
    				d: "M65.626,140.969c0,0,30.185,86.277-7.588,108.536C22.184,270.633,0.432,201.07,30.504,123.572c0,0-3.538,40.961,2.578,42.038c5.613,0.988,8.638-35.138,11.575-41.241c2.939-6.104,6.118,24.067,7.196,28.88c1.457,6.511,3.859,16.026,8.888,7.967C65.911,152.932,63.546,136.63,65.626,140.969"
    			}, 300, meteoroid_flame2_animation2 );
    		};

    		var meteoroid_flame2_animation2 = function() {
    			meteoroid_flame2.animate( {
    				d: "M62.34,122.497c0,0,36.49,102.726-1.282,124.984c-35.854,21.128-64.438-19.756-34.366-97.254c0,0,0.275,14.306,6.391,15.383c5.613,0.988,5.315-3.177,8.252-9.28c2.939-6.104,9.44-7.894,10.519-3.081c1.457,6.511,3.859,16.026,8.888,7.967C65.911,152.932,60.26,118.158,62.34,122.497"
    			}, 500, meteoroid_flame2_animation1 );
    		};

    		// Start animation
    		meteoroid_flame1_animation1();
    		meteoroid_flame2_animation1();

    	// Meteoroids movement animations
    		// Get meteoroids
    		var $meteoroid_1 = $('.meteoroid--1');
    		var $meteoroid_2 = $('.meteoroid--2');

    		// Meteoroids animations
    			// Meteoroid 1
    			TweenMax.fromTo( $meteoroid_1, 5, { x:-280, y: 200, height: 265, ease: Linear.easeNone }, { x:$window_width, y: 1700, height: 140, repeat: -1, ease: Linear.easeNone, delay: 2 });

    			// Meteoroid 2
    			TweenMax.fromTo( $meteoroid_2, 7, { x:-280, y: 800, height: 265, ease: Linear.easeNone }, { x:$window_width, y: 2200, height: 140, repeat: -1, ease: Linear.easeNone, delay: 5 });

    	// ISS animation
    		// Get iss
    		var $iss = $('.iss');

    		// Animation
    		TweenMax.to( $iss, 20, { bezier:{ type:'quadratic', values:[ {x:0, y:0}, {x:50, y:0}, {x:50, y:50}, {x:50, y:100}, {x:0, y:100}, {x:-50, y:100}, {x:-50, y:50}, {x:-50, y:0},{x:0, y:0} ] }, ease: Linear.easeNone, repeat: -1 } );

    	// Aurora borealis animation
    		// Get aurora clouds
    		var $aurora_1 = $('.aurora--1');
    		var $aurora_2 = $('.aurora--2');
    		var $aurora_3 = $('.aurora--3');

    		// Animation
    			// Aurora 1
    			TweenMax.to( $aurora_1, 25, { bezier:{ type:'quadratic', values:[ {x:0, y:0}, {x:25, y:0}, {x:25, y:25}, {x:25, y:50}, {x:0, y:50}, {x:-25, y:50}, {x:-25, y:25}, {x:-25, y:0},{x:0, y:0} ] }, ease: Linear.easeNone, repeat: -1 } );

    			// Aurora 2
    			TweenMax.to( $aurora_2, 25, { bezier:{ type:'quadratic', values:[ {x:0, y:0}, {x:-25, y:0}, {x:-25, y:-25}, {x:-25, y:-50}, {x:0, y:-50}, {x:25, y:-50}, {x:25, y:-25}, {x:25, y:0},{x:0, y:0} ] }, ease: Linear.easeNone, repeat: -1 } );

    			// Aurora 3
    			TweenMax.to( $aurora_3, 15, { bezier:{ type:'quadratic', values:[ {x:0, y:0}, {x:-25, y:0}, {x:-25, y:-25}, {x:-25, y:-50}, {x:0, y:-50}, {x:25, y:-50}, {x:25, y:-25}, {x:25, y:0},{x:0, y:0} ] }, ease: Linear.easeNone, repeat: -1 } );

    	// Popover
    		// Get popover buttons
    		var $popover_button = $('.popover__button');

    		// Toggle class on tooltip when clicked
    		$popover_button.on('click', function(){
    			// Get current data value for this button
    			var $current_id = $(this).data('popover');
    			// Toggle class on element with same ID and data
    			$('#' + $current_id).toggleClass('popover--active');
    		});

    	// SSS animation
    		// Get iss
    		var $sss = $('.sss');

    		// Animation
    		TweenMax.to( $sss, 20, { bezier:{ type:'quadratic', values:[ {x:0, y:0}, {x:25, y:0}, {x:25, y:25}, {x:25, y:50}, {x:0, y:50}, {x:-25, y:50}, {x:-25, y:25}, {x:-25, y:0},{x:0, y:0} ] }, ease: Linear.easeNone, repeat: -1 } );

    	// Moon animation
    		// Get moon
    		var $moon = $('.moon');

    		// Animation
    		TweenMax.to( $moon, 20, { bezier:{ type:'quadratic', values:[ {x:0, y:0}, {x:-20, y:0}, {x:-20, y:-20}, {x:-20, y:-45}, {x:0, y:-45}, {x:20, y:-45}, {x:20, y:-20}, {x:20, y:0},{x:0, y:0} ] }, ease: Linear.easeNone, repeat: -1 } );

    } )( jQuery, Snap );
    </script>

    </body>
</html>
