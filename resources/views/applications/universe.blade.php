<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

        <style media="screen">
        /*
        all original code by Adam Crockett @rare+square, I would love to work at space.com.
        */
        html,
        body{
          height:100%;
          overflow:hidden;
          background:#000;
        }
        #obviously{
          color:#808080;
          padding:.5rem;
        }
        #demo{
          width:100%;
          height:100vw;
          border-radius:50%;
          position:relative;
        }
        .center{
          position:absolute;
          left:0;
          right:0;
          top:0;
          bottom:0;
          margin:auto;
        }
        .grad{
        background-color:black;
        background-image:
        radial-gradient(white, rgba(255,255,255,.2) 2px, transparent 40px),
        radial-gradient(white, rgba(255,255,255,.15) 1px, transparent 30px),
        radial-gradient(white, rgba(255,255,255,.1) 2px, transparent 40px),
        radial-gradient(rgba(255,255,255,.4), rgba(255,255,255,.1) 2px, transparent 30px);
        background-size: 275px 275px, 175px 175px, 125px 125px, 75px 75px;
        background-position: 0 0, 40px 60px, 130px 270px, 70px 100px;
          opacity:0.2;
            transform:rotate(0deg);
        }
        .shad:before{
          background: -moz-linear-gradient(180deg,  rgba(0,0,0,1) 0%, rgba(0,0,0,0) 100%); /* FF3.6+ */
        background: -webkit-gradient(linear, left bottom, right top, color-stop(0%,rgba(0,0,0,0.65)), color-stop(100%,rgba(0,0,0,0))); /* Chrome,Safari4+ */
        background: -webkit-linear-gradient(180deg,  rgba(0,0,0,0.1) 0%,rgba(0,0,0,0) 100%); /* Chrome10+,Safari5.1+ */
        background: -o-linear-gradient(180deg,  rgba(0,0,0,1) 0%,rgba(0,0,0,0) 100%); /* Opera 11.10+ */
        background: -ms-linear-gradient(180deg,  rgba(0,0,0,1) 0%,rgba(0,0,0,0) 100%); /* IE10+ */
        background: linear-gradient(180deg,  rgba(0,0,0,1) 0%,rgba(0,0,0,0) 100%); /* W3C */
        filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#a6000000', endColorstr='#00000000',GradientType=1 ); /* IE6-9 fallback on horizontal gradient */

        }
        @-webkit-keyframes rotate{
          100%{
            transform:rotate(360deg);
          }
        }
        .grad{
          -webkit-animation: rotate 300s infinite;
        }
        .sun{
          width:30px;
          height:30px;
          background:orange;
          border-radius:50%;
        }

        @-webkit-keyframes fushion{
          0%{
            -webkit-box-shadow: 0px 0px 35px 5px rgba(255,119,0,1);
        -moz-box-shadow: 0px 0px 35px 5px rgba(255,119,0,1);
        box-shadow: 0px 0px 35px 5px rgba(255,119,0,1);
          }
          50%{
            -webkit-box-shadow: 0px 0px 35px 5px rgba(255,119,0,1);
        -moz-box-shadow: 0px 0px 25px 5px rgba(255,119,0,1);
        box-shadow: 0px 0px 25px 5px rgba(255,119,0,1);
          }
          100%{
            -webkit-box-shadow: 0px 0px 35px 5px rgba(255,119,0,1);
        -moz-box-shadow: 0px 0px 35px 5px rgba(255,119,0,1);
        box-shadow: 0px 0px 35px 5px rgba(255,119,0,1);
          }
        }

        .natural-light{
          -webkit-animation:fushion 2s infinite ease-in-out;
        }
        .solar-system{
          width:700px;
          height:700px;
          background:rgba(0,0,0,0.5);
          border:1px solid #ccc;
          border-radius:50%;
          top:0;

          -webkit-box-shadow: 10px 10px 300px -38px rgba(255,255,255,0.2);
        -moz-box-shadow: 10px 10px 300px -38px rgba(255,255,255,0.2);
        box-shadow: 10px 10px 300px -38px rgba(255,255,255,0.2);
        }

        .orbit:before{
          content:"";
          width:10px;
          height:10px;
          border-radius:50%;
          display:block;
          margin:0 auto;
          margin-top:-5px;
        }
        .orbit:after{
          content:"";
          border-radius:50%;
          display:block;
          margin:0 auto;
        }

        .orbit{
          border:#333 1px solid;
          border-radius:50%;
        }
        @-webkit-keyframes orbit{
          to{
            transform:rotate(360deg);
          }
        }
        /*planets*/
        .orbit[name="murcury"]:before{
          background-color:#ca7c3c;
        }
        .orbit[name="venus"]:before{
          background-color:#c0a16b;
        }
        .orbit[name="earth"]:before{
          background-color:#2162a6;
        }
        .orbit[name="earth"]:after{
          content:"\2022"!important;
          width:25px;
          height:25px;
          margin-top:-15px;
          opacity:0.5;
          color:#fff;
          font-size:.8rem;
           -webkit-animation:orbit 8.8s infinite linear;
        }
        .orbit[name="mars"]:before{
          background-color:#BA4614;
        }
        .orbit[name="jupiter"]:before{
          background-color:#A89978;
          width:15px;
          height:15px;
          margin-top:-7.5px;
        }
        .orbit[name="saturn"]:before{
          background-color:#A8993E;
        }
        .orbit[name="saturn"]:after{
          width:18px;
          height:18px;
          border:1px solid #A8A17E;
          box-sizing:border-box;
          margin-top:-14px;
          opacity:0.5;
        }
        .orbit[name="uranus"]:before{
          background-color:#AADEE8;
        }
        .orbit[name="neptune"]:before{
          background-color:#7F3CFF;
        }
        .orbit[name="pluto"]:before{
          background-color:#D0C7FF;
          width:5px;
          height:5px;
          margin-top:-2.5px;
        }
        /*orbits*/
        .orbit[name="murcury"]{
          width:100px;
          height:100px;
          -webkit-animation:orbit 8.8s infinite linear;
        }
        .orbit[name="venus"]{
          width:150px;
          height:150px;
          -webkit-animation:orbit 22s infinite linear;
        }
        .orbit[name="earth"]{
          width:200px;
          height:200px;
          -webkit-animation:orbit 36s infinite linear;
        }
        .orbit[name="mars"]{
          width:250px;
          height:250px;
          -webkit-animation:orbit 68s infinite linear;
        }
        .orbit[name="jupiter"]{
          width:300px;
          height:300px;
          -webkit-animation:orbit 432s infinite linear;
        }
        .orbit[name="saturn"]{
          width:350px;
          height:350px;
          -webkit-animation:orbit 1044s infinite linear;
        }
        .orbit[name="uranus"]{
          width:400px;
          height:400px;
          -webkit-animation:orbit 3024s infinite linear;
        }
        .orbit[name="neptune"]{
          width:450px;
          height:450px;
          -webkit-animation:orbit 5940s infinite linear;
        }
        .orbit[name="pluto"]{
          width:500px;
          height:500px;
          -webkit-animation:orbit 8928s infinite linear;
        }
        .toggle-view{
          position:fixed;
          left:0;
          bottom:0;
          margin:.5rem;
        }
        .toggle-view:after{
          content:"perspective";
          color:#fff;
          margin-left:20px;
          color: #808080;
          font-size: 80%;
        }


        .toggle-view:checked + .solar-system{
          transform: rotateX(45deg);
          transition:transform 1s;
        }
        .toggle-view:not(:checked) + .solar-system{
          transform: rotateX(0deg);
          transition:transform .5s;
        }
        .toggle-view:checked + .solar-system .orbit:before{
           -webkit-transform: rotateX(-45deg);
            transform: rotateX(-45deg);
          transition:transform 1s;
        }
        </style>

    </head>
    <body>
      <small id="obviously">Not to scale</small>
      <div id="demo" class="grad center">
      </div>

    <input class="toggle-view" role="navigation" type="checkbox">

      <div class="solar-system center">

      <div class="orbit center shad" value="9" name="pluto">
        <div class="orbit center shad" value="8" name="neptune">
          <div class="orbit center shad" value="7" name="uranus">
            <div class="orbit center shad" value="6" name="saturn">
              <div class="orbit center shad" value="5" name="jupiter">
                <div class="orbit center shad" value="4" name="mars">
                  <div class="orbit center shad" value="3" name="earth">
                    <div class="orbit center shad" value="2" name="venus">
                      <div class="orbit center shad" value="1" name="murcury">
                        <div class="sun natural-light center" name="that big bright thing"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
    </body>
</html>
