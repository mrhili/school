
@extends('back.layouts.topnav')


@section('styles')

<style media="screen">
/* -------------------
*Author:			Brady Sammons
*Version:			1.0.0
*Website:			bradysammons.com
-------------------- */
@import url(https://fonts.googleapis.com/css?family=Tauri);
html, body, div, span, applet, object, iframe,
h1, h2, h3, h4, h5, h6, p, blockquote, pre,
a, abbr, acronym, address, big, cite, code,
del, dfn, em, img, ins, kbd, q, s, samp,
small, strike, strong, sub, sup, tt, var,
b, u, i, center,
dl, dt, dd, ol, ul, li,
fieldset, form, label, legend,
table, caption, tbody, tfoot, thead, tr, th, td,
article, aside, canvas, details, embed,
figure, figcaption, footer, header, hgroup,
menu, nav, output, ruby, section, summary,
time, mark, audio, video {
margin: 0;
padding: 0;
border: 0;
font: inherit;
font-size: 100%;
vertical-align: baseline;
}

html {
line-height: 1;
}

ol, ul {
list-style: none;
}

table {
border-collapse: collapse;
border-spacing: 0;
}

caption, th, td {
text-align: left;
font-weight: normal;
vertical-align: middle;
}

q, blockquote {
quotes: none;
}
q:before, q:after, blockquote:before, blockquote:after {
content: "";
content: none;
}

a img {
border: none;
}

article, aside, details, figcaption, figure, footer, header, hgroup, main, menu, nav, section, summary {
display: block;
}

/* -------------------
Variables
-------------------- */
html {
min-height: 100%;
background-image: url('data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4gPHN2ZyB2ZXJzaW9uPSIxLjEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGRlZnM+PGxpbmVhckdyYWRpZW50IGlkPSJncmFkIiBncmFkaWVudFVuaXRzPSJvYmplY3RCb3VuZGluZ0JveCIgeDE9IjAuNSIgeTE9IjAuMCIgeDI9IjAuNSIgeTI9IjEuMCI+PHN0b3Agb2Zmc2V0PSIwJSIgc3RvcC1jb2xvcj0iIzU1NTU1NSIvPjxzdG9wIG9mZnNldD0iMTAwJSIgc3RvcC1jb2xvcj0iIzIyMjIyMiIvPjwvbGluZWFyR3JhZGllbnQ+PC9kZWZzPjxyZWN0IHg9IjAiIHk9IjAiIHdpZHRoPSIxMDAlIiBoZWlnaHQ9IjEwMCUiIGZpbGw9InVybCgjZ3JhZCkiIC8+PC9zdmc+IA==');
background-size: 100%;
background-image: -webkit-gradient(linear, 50% 0%, 50% 100%, color-stop(0%, #555555), color-stop(100%, #222222));
background-image: -moz-linear-gradient(#555555, #222222);
background-image: -webkit-linear-gradient(#555555, #222222);
background-image: linear-gradient(#555555, #222222);
background-repeat: no-repeat;
}

body {
font-size: 100%;
font-family: helvetica, arial, sans-serif;
}

h1, h3 {
font-family: 'Tauri', sans-serif;
letter-spacing: -.05em;
}

h1 {
font-size: 2em;
margin-top: 30px;
color: #eee;
text-transform: uppercase;
text-shadow: 1px 1px 0 #333, 2px 2px 0 #999;
}

h3 {
margin: 10px 0 20px 0;
color: #888;
font-weight: normal;
}

span.swatch {
display: inline-block;
width: 14px;
height: 14px;
background: #eee;
margin-right: 10px;
}

#key {
position: absolute;
left: 165px;
z-index: 100;
margin-top: 55px;
}
#key ul {
float: left;
margin-right: 40px;
}
#key ul li {
line-height: 1.5em;
font-size: .8em;
color: #B6B6B6;
}

#wrapper {
width: 990px;
margin: 0 auto 30px auto;
height: 600px;
position: relative;
}

[class^="element-"] {
cursor: pointer;
position: relative;
z-index: 1;
color: #333;
-moz-box-sizing: border-box;
-webkit-box-sizing: border-box;
box-sizing: border-box;
width: 55px;
height: 55px;
font-size: 12px;
display: block;
float: left;
-moz-perspective: 1000;
-webkit-perspective: 1000;
perspective: 1000;
}
[class^="element-"] .chip {
width: 100%;
height: 100%;
-moz-transform-style: preserve-3d;
-webkit-transform-style: preserve-3d;
transform-style: preserve-3d;
-moz-transition-property: all;
-o-transition-property: all;
-webkit-transition-property: all;
transition-property: all;
-moz-transition-duration: 0.5s;
-o-transition-duration: 0.5s;
-webkit-transition-duration: 0.5s;
transition-duration: 0.5s;
-moz-transition-timing-function: ease-out;
-o-transition-timing-function: ease-out;
-webkit-transition-timing-function: ease-out;
transition-timing-function: ease-out;
}
[class^="element-"] .chip.long .front strong {
margin-top: 8px;
font-size: 1.38em;
}
[class^="element-"] .chip.long .back p {
margin-top: 20px;
}
[class^="element-"]:hover .chip {
-moz-transform: rotateY(180deg);
-webkit-transform: rotateY(180deg);
transform: rotateY(180deg);
}
[class^="element-"] .face {
position: absolute;
width: 100%;
height: 100%;
-moz-backface-visibility: hidden;
-webkit-backface-visibility: hidden;
backface-visibility: hidden;
}
[class^="element-"] .face.front, [class^="element-"] .face.back {
-moz-box-sizing: border-box;
-webkit-box-sizing: border-box;
box-sizing: border-box;
}
[class^="element-"] .face.front {
padding: 4px;
-moz-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.4), inset 0 -1px 0 rgba(0, 0, 0, 0.3), inset 1px 0 0 rgba(255, 255, 255, 0.2), inset -1px 0 0 rgba(0, 0, 0, 0.15);
-webkit-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.4), inset 0 -1px 0 rgba(0, 0, 0, 0.3), inset 1px 0 0 rgba(255, 255, 255, 0.2), inset -1px 0 0 rgba(0, 0, 0, 0.15);
box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.4), inset 0 -1px 0 rgba(0, 0, 0, 0.3), inset 1px 0 0 rgba(255, 255, 255, 0.2), inset -1px 0 0 rgba(0, 0, 0, 0.15);
}
[class^="element-"] .face.front i {
display: block;
font-size: .8em;
}
[class^="element-"] .face.front strong {
font-size: 2.2em;
display: block;
font-weight: bold;
text-shadow: 0 1px 0 rgba(255, 255, 255, 0.2);
text-align: center;
margin-top: 4px;
background: rgba(0, 0, 0, 0.1);
}
[class^="element-"] .face.back {
display: block;
-moz-transform: rotateY(180deg);
-webkit-transform: rotateY(180deg);
transform: rotateY(180deg);
-moz-box-sizing: border-box;
-webkit-box-sizing: border-box;
box-sizing: border-box;
background: #eee;
color: #111;
}
[class^="element-"] .face.back p {
margin-top: 16px;
line-height: 1.2;
text-align: center;
font-size: .7em;
font-weight: 600;
}
[class^="element-"] .face.back p span {
display: block;
}

/* -------------------
Elements
-------------------- */
span.swatch.element-metal {
background-image: url('data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4gPHN2ZyB2ZXJzaW9uPSIxLjEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGRlZnM+PGxpbmVhckdyYWRpZW50IGlkPSJncmFkIiBncmFkaWVudFVuaXRzPSJvYmplY3RCb3VuZGluZ0JveCIgeDE9IjAuMCIgeTE9IjAuMCIgeDI9IjEuMCIgeTI9IjEuMCI+PHN0b3Agb2Zmc2V0PSIwJSIgc3RvcC1jb2xvcj0iI2M2YzZjNiIvPjxzdG9wIG9mZnNldD0iMTAwJSIgc3RvcC1jb2xvcj0iIzg2ODY4NiIvPjwvbGluZWFyR3JhZGllbnQ+PC9kZWZzPjxyZWN0IHg9IjAiIHk9IjAiIHdpZHRoPSIxMDAlIiBoZWlnaHQ9IjEwMCUiIGZpbGw9InVybCgjZ3JhZCkiIC8+PC9zdmc+IA==');
background-size: 100%;
background-image: -webkit-gradient(linear, 0% 0%, 100% 100%, color-stop(0%, #c6c6c6), color-stop(100%, #868686));
background-image: -moz-linear-gradient(left top, #c6c6c6, #868686);
background-image: -webkit-linear-gradient(left top, #c6c6c6, #868686);
background-image: linear-gradient(to right bottom, #c6c6c6, #868686);
}
span.swatch.element-non-metal {
background-image: url('data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4gPHN2ZyB2ZXJzaW9uPSIxLjEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGRlZnM+PGxpbmVhckdyYWRpZW50IGlkPSJncmFkIiBncmFkaWVudFVuaXRzPSJvYmplY3RCb3VuZGluZ0JveCIgeDE9IjAuMCIgeTE9IjAuMCIgeDI9IjEuMCIgeTI9IjEuMCI+PHN0b3Agb2Zmc2V0PSIwJSIgc3RvcC1jb2xvcj0iI2E1YjNiOCIvPjxzdG9wIG9mZnNldD0iMTAwJSIgc3RvcC1jb2xvcj0iIzYyNzU3YyIvPjwvbGluZWFyR3JhZGllbnQ+PC9kZWZzPjxyZWN0IHg9IjAiIHk9IjAiIHdpZHRoPSIxMDAlIiBoZWlnaHQ9IjEwMCUiIGZpbGw9InVybCgjZ3JhZCkiIC8+PC9zdmc+IA==');
background-size: 100%;
background-image: -webkit-gradient(linear, 0% 0%, 100% 100%, color-stop(0%, #a5b3b8), color-stop(100%, #62757c));
background-image: -moz-linear-gradient(left top, #a5b3b8, #62757c);
background-image: -webkit-linear-gradient(left top, #a5b3b8, #62757c);
background-image: linear-gradient(to right bottom, #a5b3b8, #62757c);
}
span.swatch.element-alkali-metal {
background-image: url('data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4gPHN2ZyB2ZXJzaW9uPSIxLjEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGRlZnM+PGxpbmVhckdyYWRpZW50IGlkPSJncmFkIiBncmFkaWVudFVuaXRzPSJvYmplY3RCb3VuZGluZ0JveCIgeDE9IjAuMCIgeTE9IjAuMCIgeDI9IjEuMCIgeTI9IjEuMCI+PHN0b3Agb2Zmc2V0PSIwJSIgc3RvcC1jb2xvcj0iI2M2ZDg2NyIvPjxzdG9wIG9mZnNldD0iMTAwJSIgc3RvcC1jb2xvcj0iIzg2OTkyNyIvPjwvbGluZWFyR3JhZGllbnQ+PC9kZWZzPjxyZWN0IHg9IjAiIHk9IjAiIHdpZHRoPSIxMDAlIiBoZWlnaHQ9IjEwMCUiIGZpbGw9InVybCgjZ3JhZCkiIC8+PC9zdmc+IA==');
background-size: 100%;
background-image: -webkit-gradient(linear, 0% 0%, 100% 100%, color-stop(0%, #c6d867), color-stop(100%, #869927));
background-image: -moz-linear-gradient(left top, #c6d867, #869927);
background-image: -webkit-linear-gradient(left top, #c6d867, #869927);
background-image: linear-gradient(to right bottom, #c6d867, #869927);
}
span.swatch.element-alkali-earth-metal {
background-image: url('data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4gPHN2ZyB2ZXJzaW9uPSIxLjEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGRlZnM+PGxpbmVhckdyYWRpZW50IGlkPSJncmFkIiBncmFkaWVudFVuaXRzPSJvYmplY3RCb3VuZGluZ0JveCIgeDE9IjAuMCIgeTE9IjAuMCIgeDI9IjEuMCIgeTI9IjEuMCI+PHN0b3Agb2Zmc2V0PSIwJSIgc3RvcC1jb2xvcj0iIzhlZDViMyIvPjxzdG9wIG9mZnNldD0iMTAwJSIgc3RvcC1jb2xvcj0iIzNkYTY3NCIvPjwvbGluZWFyR3JhZGllbnQ+PC9kZWZzPjxyZWN0IHg9IjAiIHk9IjAiIHdpZHRoPSIxMDAlIiBoZWlnaHQ9IjEwMCUiIGZpbGw9InVybCgjZ3JhZCkiIC8+PC9zdmc+IA==');
background-size: 100%;
background-image: -webkit-gradient(linear, 0% 0%, 100% 100%, color-stop(0%, #8ed5b3), color-stop(100%, #3da674));
background-image: -moz-linear-gradient(left top, #8ed5b3, #3da674);
background-image: -webkit-linear-gradient(left top, #8ed5b3, #3da674);
background-image: linear-gradient(to right bottom, #8ed5b3, #3da674);
}
span.swatch.element-transition-metal {
background-image: url('data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4gPHN2ZyB2ZXJzaW9uPSIxLjEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGRlZnM+PGxpbmVhckdyYWRpZW50IGlkPSJncmFkIiBncmFkaWVudFVuaXRzPSJvYmplY3RCb3VuZGluZ0JveCIgeDE9IjAuMCIgeTE9IjAuMCIgeDI9IjEuMCIgeTI9IjEuMCI+PHN0b3Agb2Zmc2V0PSIwJSIgc3RvcC1jb2xvcj0iI2IwZGNmZSIvPjxzdG9wIG9mZnNldD0iMTAwJSIgc3RvcC1jb2xvcj0iIzMyYTVmZCIvPjwvbGluZWFyR3JhZGllbnQ+PC9kZWZzPjxyZWN0IHg9IjAiIHk9IjAiIHdpZHRoPSIxMDAlIiBoZWlnaHQ9IjEwMCUiIGZpbGw9InVybCgjZ3JhZCkiIC8+PC9zdmc+IA==');
background-size: 100%;
background-image: -webkit-gradient(linear, 0% 0%, 100% 100%, color-stop(0%, #b0dcfe), color-stop(100%, #32a5fd));
background-image: -moz-linear-gradient(left top, #b0dcfe, #32a5fd);
background-image: -webkit-linear-gradient(left top, #b0dcfe, #32a5fd);
background-image: linear-gradient(to right bottom, #b0dcfe, #32a5fd);
}
span.swatch.element-lanthoid {
background-image: url('data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4gPHN2ZyB2ZXJzaW9uPSIxLjEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGRlZnM+PGxpbmVhckdyYWRpZW50IGlkPSJncmFkIiBncmFkaWVudFVuaXRzPSJvYmplY3RCb3VuZGluZ0JveCIgeDE9IjAuMCIgeTE9IjAuMCIgeDI9IjEuMCIgeTI9IjEuMCI+PHN0b3Agb2Zmc2V0PSIwJSIgc3RvcC1jb2xvcj0iI2ZmZWUzYSIvPjxzdG9wIG9mZnNldD0iMTAwJSIgc3RvcC1jb2xvcj0iI2JhYWEwMCIvPjwvbGluZWFyR3JhZGllbnQ+PC9kZWZzPjxyZWN0IHg9IjAiIHk9IjAiIHdpZHRoPSIxMDAlIiBoZWlnaHQ9IjEwMCUiIGZpbGw9InVybCgjZ3JhZCkiIC8+PC9zdmc+IA==');
background-size: 100%;
background-image: -webkit-gradient(linear, 0% 0%, 100% 100%, color-stop(0%, #ffee3a), color-stop(100%, #baaa00));
background-image: -moz-linear-gradient(left top, #ffee3a, #baaa00);
background-image: -webkit-linear-gradient(left top, #ffee3a, #baaa00);
background-image: linear-gradient(to right bottom, #ffee3a, #baaa00);
}
span.swatch.element-actinoid {
background-image: url('data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4gPHN2ZyB2ZXJzaW9uPSIxLjEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGRlZnM+PGxpbmVhckdyYWRpZW50IGlkPSJncmFkIiBncmFkaWVudFVuaXRzPSJvYmplY3RCb3VuZGluZ0JveCIgeDE9IjAuMCIgeTE9IjAuMCIgeDI9IjEuMCIgeTI9IjEuMCI+PHN0b3Agb2Zmc2V0PSIwJSIgc3RvcC1jb2xvcj0iI2ZmYzg0NyIvPjxzdG9wIG9mZnNldD0iMTAwJSIgc3RvcC1jb2xvcj0iI2M3OGIwMCIvPjwvbGluZWFyR3JhZGllbnQ+PC9kZWZzPjxyZWN0IHg9IjAiIHk9IjAiIHdpZHRoPSIxMDAlIiBoZWlnaHQ9IjEwMCUiIGZpbGw9InVybCgjZ3JhZCkiIC8+PC9zdmc+IA==');
background-size: 100%;
background-image: -webkit-gradient(linear, 0% 0%, 100% 100%, color-stop(0%, #ffc847), color-stop(100%, #c78b00));
background-image: -moz-linear-gradient(left top, #ffc847, #c78b00);
background-image: -webkit-linear-gradient(left top, #ffc847, #c78b00);
background-image: linear-gradient(to right bottom, #ffc847, #c78b00);
}
span.swatch.element-metalloid {
background-image: url('data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4gPHN2ZyB2ZXJzaW9uPSIxLjEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGRlZnM+PGxpbmVhckdyYWRpZW50IGlkPSJncmFkIiBncmFkaWVudFVuaXRzPSJvYmplY3RCb3VuZGluZ0JveCIgeDE9IjAuMCIgeTE9IjAuMCIgeDI9IjEuMCIgeTI9IjEuMCI+PHN0b3Agb2Zmc2V0PSIwJSIgc3RvcC1jb2xvcj0iI2U1OGE4YSIvPjxzdG9wIG9mZnNldD0iMTAwJSIgc3RvcC1jb2xvcj0iI2M0MmIyYiIvPjwvbGluZWFyR3JhZGllbnQ+PC9kZWZzPjxyZWN0IHg9IjAiIHk9IjAiIHdpZHRoPSIxMDAlIiBoZWlnaHQ9IjEwMCUiIGZpbGw9InVybCgjZ3JhZCkiIC8+PC9zdmc+IA==');
background-size: 100%;
background-image: -webkit-gradient(linear, 0% 0%, 100% 100%, color-stop(0%, #e58a8a), color-stop(100%, #c42b2b));
background-image: -moz-linear-gradient(left top, #e58a8a, #c42b2b);
background-image: -webkit-linear-gradient(left top, #e58a8a, #c42b2b);
background-image: linear-gradient(to right bottom, #e58a8a, #c42b2b);
}
span.swatch.element-halogen {
background-image: url('data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4gPHN2ZyB2ZXJzaW9uPSIxLjEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGRlZnM+PGxpbmVhckdyYWRpZW50IGlkPSJncmFkIiBncmFkaWVudFVuaXRzPSJvYmplY3RCb3VuZGluZ0JveCIgeDE9IjAuMCIgeTE9IjAuMCIgeDI9IjEuMCIgeTI9IjEuMCI+PHN0b3Agb2Zmc2V0PSIwJSIgc3RvcC1jb2xvcj0iI2NkYjI3NSIvPjxzdG9wIG9mZnNldD0iMTAwJSIgc3RvcC1jb2xvcj0iIzhlNzMzNCIvPjwvbGluZWFyR3JhZGllbnQ+PC9kZWZzPjxyZWN0IHg9IjAiIHk9IjAiIHdpZHRoPSIxMDAlIiBoZWlnaHQ9IjEwMCUiIGZpbGw9InVybCgjZ3JhZCkiIC8+PC9zdmc+IA==');
background-size: 100%;
background-image: -webkit-gradient(linear, 0% 0%, 100% 100%, color-stop(0%, #cdb275), color-stop(100%, #8e7334));
background-image: -moz-linear-gradient(left top, #cdb275, #8e7334);
background-image: -webkit-linear-gradient(left top, #cdb275, #8e7334);
background-image: linear-gradient(to right bottom, #cdb275, #8e7334);
}
span.swatch.element-noble-gas {
background-image: url('data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4gPHN2ZyB2ZXJzaW9uPSIxLjEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGRlZnM+PGxpbmVhckdyYWRpZW50IGlkPSJncmFkIiBncmFkaWVudFVuaXRzPSJvYmplY3RCb3VuZGluZ0JveCIgeDE9IjAuMCIgeTE9IjAuMCIgeDI9IjEuMCIgeTI9IjEuMCI+PHN0b3Agb2Zmc2V0PSIwJSIgc3RvcC1jb2xvcj0iI2FkYWRkYSIvPjxzdG9wIG9mZnNldD0iMTAwJSIgc3RvcC1jb2xvcj0iIzU1NTViMiIvPjwvbGluZWFyR3JhZGllbnQ+PC9kZWZzPjxyZWN0IHg9IjAiIHk9IjAiIHdpZHRoPSIxMDAlIiBoZWlnaHQ9IjEwMCUiIGZpbGw9InVybCgjZ3JhZCkiIC8+PC9zdmc+IA==');
background-size: 100%;
background-image: -webkit-gradient(linear, 0% 0%, 100% 100%, color-stop(0%, #adadda), color-stop(100%, #5555b2));
background-image: -moz-linear-gradient(left top, #adadda, #5555b2);
background-image: -webkit-linear-gradient(left top, #adadda, #5555b2);
background-image: linear-gradient(to right bottom, #adadda, #5555b2);
}

.element-metal .front {
color: #2d2d2d;
background-image: url('data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4gPHN2ZyB2ZXJzaW9uPSIxLjEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGRlZnM+PGxpbmVhckdyYWRpZW50IGlkPSJncmFkIiBncmFkaWVudFVuaXRzPSJvYmplY3RCb3VuZGluZ0JveCIgeDE9IjAuMCIgeTE9IjAuMCIgeDI9IjEuMCIgeTI9IjEuMCI+PHN0b3Agb2Zmc2V0PSIwJSIgc3RvcC1jb2xvcj0iI2M2YzZjNiIvPjxzdG9wIG9mZnNldD0iMTAwJSIgc3RvcC1jb2xvcj0iIzg2ODY4NiIvPjwvbGluZWFyR3JhZGllbnQ+PC9kZWZzPjxyZWN0IHg9IjAiIHk9IjAiIHdpZHRoPSIxMDAlIiBoZWlnaHQ9IjEwMCUiIGZpbGw9InVybCgjZ3JhZCkiIC8+PC9zdmc+IA==');
background-size: 100%;
background-image: -webkit-gradient(linear, 0% 0%, 100% 100%, color-stop(0%, #c6c6c6), color-stop(100%, #868686));
background-image: -moz-linear-gradient(left top, #c6c6c6, #868686);
background-image: -webkit-linear-gradient(left top, #c6c6c6, #868686);
background-image: linear-gradient(to right bottom, #c6c6c6, #868686);
}
.element-metal .face.back {
background-color: #c6c6c6;
}

.element-alkali-metal .front {
color: #3b4311;
background-image: url('data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4gPHN2ZyB2ZXJzaW9uPSIxLjEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGRlZnM+PGxpbmVhckdyYWRpZW50IGlkPSJncmFkIiBncmFkaWVudFVuaXRzPSJvYmplY3RCb3VuZGluZ0JveCIgeDE9IjAuMCIgeTE9IjAuMCIgeDI9IjEuMCIgeTI9IjEuMCI+PHN0b3Agb2Zmc2V0PSIwJSIgc3RvcC1jb2xvcj0iI2M2ZDg2NyIvPjxzdG9wIG9mZnNldD0iMTAwJSIgc3RvcC1jb2xvcj0iIzg2OTkyNyIvPjwvbGluZWFyR3JhZGllbnQ+PC9kZWZzPjxyZWN0IHg9IjAiIHk9IjAiIHdpZHRoPSIxMDAlIiBoZWlnaHQ9IjEwMCUiIGZpbGw9InVybCgjZ3JhZCkiIC8+PC9zdmc+IA==');
background-size: 100%;
background-image: -webkit-gradient(linear, 0% 0%, 100% 100%, color-stop(0%, #c6d867), color-stop(100%, #869927));
background-image: -moz-linear-gradient(left top, #c6d867, #869927);
background-image: -webkit-linear-gradient(left top, #c6d867, #869927);
background-image: linear-gradient(to right bottom, #c6d867, #869927);
}
.element-alkali-metal .face.back {
background-color: #d5e38f;
}

.element-alkali-earth-metal .front {
color: #133323;
background-image: url('data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4gPHN2ZyB2ZXJzaW9uPSIxLjEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGRlZnM+PGxpbmVhckdyYWRpZW50IGlkPSJncmFkIiBncmFkaWVudFVuaXRzPSJvYmplY3RCb3VuZGluZ0JveCIgeDE9IjAuMCIgeTE9IjAuMCIgeDI9IjEuMCIgeTI9IjEuMCI+PHN0b3Agb2Zmc2V0PSIwJSIgc3RvcC1jb2xvcj0iIzhlZDViMyIvPjxzdG9wIG9mZnNldD0iMTAwJSIgc3RvcC1jb2xvcj0iIzNkYTY3NCIvPjwvbGluZWFyR3JhZGllbnQ+PC9kZWZzPjxyZWN0IHg9IjAiIHk9IjAiIHdpZHRoPSIxMDAlIiBoZWlnaHQ9IjEwMCUiIGZpbGw9InVybCgjZ3JhZCkiIC8+PC9zdmc+IA==');
background-size: 100%;
background-image: -webkit-gradient(linear, 0% 0%, 100% 100%, color-stop(0%, #8ed5b3), color-stop(100%, #3da674));
background-image: -moz-linear-gradient(left top, #8ed5b3, #3da674);
background-image: -webkit-linear-gradient(left top, #8ed5b3, #3da674);
background-image: linear-gradient(to right bottom, #8ed5b3, #3da674);
}
.element-alkali-earth-metal .face.back {
background-color: #b3e3cc;
}

.element-transition-metal .front {
color: #012948;
background-image: url('data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4gPHN2ZyB2ZXJzaW9uPSIxLjEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGRlZnM+PGxpbmVhckdyYWRpZW50IGlkPSJncmFkIiBncmFkaWVudFVuaXRzPSJvYmplY3RCb3VuZGluZ0JveCIgeDE9IjAuMCIgeTE9IjAuMCIgeDI9IjEuMCIgeTI9IjEuMCI+PHN0b3Agb2Zmc2V0PSIwJSIgc3RvcC1jb2xvcj0iI2IwZGNmZSIvPjxzdG9wIG9mZnNldD0iMTAwJSIgc3RvcC1jb2xvcj0iIzMyYTVmZCIvPjwvbGluZWFyR3JhZGllbnQ+PC9kZWZzPjxyZWN0IHg9IjAiIHk9IjAiIHdpZHRoPSIxMDAlIiBoZWlnaHQ9IjEwMCUiIGZpbGw9InVybCgjZ3JhZCkiIC8+PC9zdmc+IA==');
background-size: 100%;
background-image: -webkit-gradient(linear, 0% 0%, 100% 100%, color-stop(0%, #b0dcfe), color-stop(100%, #32a5fd));
background-image: -moz-linear-gradient(left top, #b0dcfe, #32a5fd);
background-image: -webkit-linear-gradient(left top, #b0dcfe, #32a5fd);
background-image: linear-gradient(to right bottom, #b0dcfe, #32a5fd);
}
.element-transition-metal .face.back {
background-color: #b0dcfe;
}

.element-lanthoid .front {
color: #443e00;
background-image: url('data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4gPHN2ZyB2ZXJzaW9uPSIxLjEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGRlZnM+PGxpbmVhckdyYWRpZW50IGlkPSJncmFkIiBncmFkaWVudFVuaXRzPSJvYmplY3RCb3VuZGluZ0JveCIgeDE9IjAuMCIgeTE9IjAuMCIgeDI9IjEuMCIgeTI9IjEuMCI+PHN0b3Agb2Zmc2V0PSIwJSIgc3RvcC1jb2xvcj0iI2ZmZWUzYSIvPjxzdG9wIG9mZnNldD0iMTAwJSIgc3RvcC1jb2xvcj0iI2JhYWEwMCIvPjwvbGluZWFyR3JhZGllbnQ+PC9kZWZzPjxyZWN0IHg9IjAiIHk9IjAiIHdpZHRoPSIxMDAlIiBoZWlnaHQ9IjEwMCUiIGZpbGw9InVybCgjZ3JhZCkiIC8+PC9zdmc+IA==');
background-size: 100%;
background-image: -webkit-gradient(linear, 0% 0%, 100% 100%, color-stop(0%, #ffee3a), color-stop(100%, #baaa00));
background-image: -moz-linear-gradient(left top, #ffee3a, #baaa00);
background-image: -webkit-linear-gradient(left top, #ffee3a, #baaa00);
background-image: linear-gradient(to right bottom, #ffee3a, #baaa00);
}
.element-lanthoid .face.back {
background-color: #ffee3a;
}

.element-actinoid .front {
color: #140e00;
background-image: url('data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4gPHN2ZyB2ZXJzaW9uPSIxLjEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGRlZnM+PGxpbmVhckdyYWRpZW50IGlkPSJncmFkIiBncmFkaWVudFVuaXRzPSJvYmplY3RCb3VuZGluZ0JveCIgeDE9IjAuMCIgeTE9IjAuMCIgeDI9IjEuMCIgeTI9IjEuMCI+PHN0b3Agb2Zmc2V0PSIwJSIgc3RvcC1jb2xvcj0iI2ZmYzg0NyIvPjxzdG9wIG9mZnNldD0iMTAwJSIgc3RvcC1jb2xvcj0iI2M3OGIwMCIvPjwvbGluZWFyR3JhZGllbnQ+PC9kZWZzPjxyZWN0IHg9IjAiIHk9IjAiIHdpZHRoPSIxMDAlIiBoZWlnaHQ9IjEwMCUiIGZpbGw9InVybCgjZ3JhZCkiIC8+PC9zdmc+IA==');
background-size: 100%;
background-image: -webkit-gradient(linear, 0% 0%, 100% 100%, color-stop(0%, #ffc847), color-stop(100%, #c78b00));
background-image: -moz-linear-gradient(left top, #ffc847, #c78b00);
background-image: -webkit-linear-gradient(left top, #ffc847, #c78b00);
background-image: linear-gradient(to right bottom, #ffc847, #c78b00);
}
.element-actinoid .face.back {
background-color: #ffc847;
}

.element-metalloid .front {
color: #320b0b;
background-image: url('data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4gPHN2ZyB2ZXJzaW9uPSIxLjEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGRlZnM+PGxpbmVhckdyYWRpZW50IGlkPSJncmFkIiBncmFkaWVudFVuaXRzPSJvYmplY3RCb3VuZGluZ0JveCIgeDE9IjAuMCIgeTE9IjAuMCIgeDI9IjEuMCIgeTI9IjEuMCI+PHN0b3Agb2Zmc2V0PSIwJSIgc3RvcC1jb2xvcj0iI2U1OGE4YSIvPjxzdG9wIG9mZnNldD0iMTAwJSIgc3RvcC1jb2xvcj0iI2M0MmIyYiIvPjwvbGluZWFyR3JhZGllbnQ+PC9kZWZzPjxyZWN0IHg9IjAiIHk9IjAiIHdpZHRoPSIxMDAlIiBoZWlnaHQ9IjEwMCUiIGZpbGw9InVybCgjZ3JhZCkiIC8+PC9zdmc+IA==');
background-size: 100%;
background-image: -webkit-gradient(linear, 0% 0%, 100% 100%, color-stop(0%, #e58a8a), color-stop(100%, #c42b2b));
background-image: -moz-linear-gradient(left top, #e58a8a, #c42b2b);
background-image: -webkit-linear-gradient(left top, #e58a8a, #c42b2b);
background-image: linear-gradient(to right bottom, #e58a8a, #c42b2b);
}
.element-metalloid .face.back {
background-color: #e58a8a;
}

.element-non-metal .front {
color: #131718;
background-image: url('data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4gPHN2ZyB2ZXJzaW9uPSIxLjEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGRlZnM+PGxpbmVhckdyYWRpZW50IGlkPSJncmFkIiBncmFkaWVudFVuaXRzPSJvYmplY3RCb3VuZGluZ0JveCIgeDE9IjAuMCIgeTE9IjAuMCIgeDI9IjEuMCIgeTI9IjEuMCI+PHN0b3Agb2Zmc2V0PSIwJSIgc3RvcC1jb2xvcj0iI2E1YjNiOCIvPjxzdG9wIG9mZnNldD0iMTAwJSIgc3RvcC1jb2xvcj0iIzYyNzU3YyIvPjwvbGluZWFyR3JhZGllbnQ+PC9kZWZzPjxyZWN0IHg9IjAiIHk9IjAiIHdpZHRoPSIxMDAlIiBoZWlnaHQ9IjEwMCUiIGZpbGw9InVybCgjZ3JhZCkiIC8+PC9zdmc+IA==');
background-size: 100%;
background-image: -webkit-gradient(linear, 0% 0%, 100% 100%, color-stop(0%, #a5b3b8), color-stop(100%, #62757c));
background-image: -moz-linear-gradient(left top, #a5b3b8, #62757c);
background-image: -webkit-linear-gradient(left top, #a5b3b8, #62757c);
background-image: linear-gradient(to right bottom, #a5b3b8, #62757c);
}
.element-non-metal .face.back {
background-color: #b9c4c8;
}

.element-halogen .front {
color: #0c0904;
background-image: url('data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4gPHN2ZyB2ZXJzaW9uPSIxLjEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGRlZnM+PGxpbmVhckdyYWRpZW50IGlkPSJncmFkIiBncmFkaWVudFVuaXRzPSJvYmplY3RCb3VuZGluZ0JveCIgeDE9IjAuMCIgeTE9IjAuMCIgeDI9IjEuMCIgeTI9IjEuMCI+PHN0b3Agb2Zmc2V0PSIwJSIgc3RvcC1jb2xvcj0iI2NkYjI3NSIvPjxzdG9wIG9mZnNldD0iMTAwJSIgc3RvcC1jb2xvcj0iIzhlNzMzNCIvPjwvbGluZWFyR3JhZGllbnQ+PC9kZWZzPjxyZWN0IHg9IjAiIHk9IjAiIHdpZHRoPSIxMDAlIiBoZWlnaHQ9IjEwMCUiIGZpbGw9InVybCgjZ3JhZCkiIC8+PC9zdmc+IA==');
background-size: 100%;
background-image: -webkit-gradient(linear, 0% 0%, 100% 100%, color-stop(0%, #cdb275), color-stop(100%, #8e7334));
background-image: -moz-linear-gradient(left top, #cdb275, #8e7334);
background-image: -webkit-linear-gradient(left top, #cdb275, #8e7334);
background-image: linear-gradient(to right bottom, #cdb275, #8e7334);
}
.element-halogen .face.back {
background-color: #d6c190;
}

.element-noble-gas .front {
color: #1b1b3a;
background-image: url('data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4gPHN2ZyB2ZXJzaW9uPSIxLjEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGRlZnM+PGxpbmVhckdyYWRpZW50IGlkPSJncmFkIiBncmFkaWVudFVuaXRzPSJvYmplY3RCb3VuZGluZ0JveCIgeDE9IjAuMCIgeTE9IjAuMCIgeDI9IjEuMCIgeTI9IjEuMCI+PHN0b3Agb2Zmc2V0PSIwJSIgc3RvcC1jb2xvcj0iI2FkYWRkYSIvPjxzdG9wIG9mZnNldD0iMTAwJSIgc3RvcC1jb2xvcj0iIzU1NTViMiIvPjwvbGluZWFyR3JhZGllbnQ+PC9kZWZzPjxyZWN0IHg9IjAiIHk9IjAiIHdpZHRoPSIxMDAlIiBoZWlnaHQ9IjEwMCUiIGZpbGw9InVybCgjZ3JhZCkiIC8+PC9zdmc+IA==');
background-size: 100%;
background-image: -webkit-gradient(linear, 0% 0%, 100% 100%, color-stop(0%, #adadda), color-stop(100%, #5555b2));
background-image: -moz-linear-gradient(left top, #adadda, #5555b2);
background-image: -webkit-linear-gradient(left top, #adadda, #5555b2);
background-image: linear-gradient(to right bottom, #adadda, #5555b2);
}
.element-noble-gas .face.back {
background-color: #adadda;
}

.element-lanthanoid-transitional-metal .front {
color: #1b1b3a;
background-image: url('data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4gPHN2ZyB2ZXJzaW9uPSIxLjEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGRlZnM+PGxpbmVhckdyYWRpZW50IGlkPSJncmFkIiBncmFkaWVudFVuaXRzPSJvYmplY3RCb3VuZGluZ0JveCIgeDE9IjAuMCIgeTE9IjAuMCIgeDI9IjEuMCIgeTI9IjEuMCI+PHN0b3Agb2Zmc2V0PSIwJSIgc3RvcC1jb2xvcj0iIzRiYjBmZCIvPjxzdG9wIG9mZnNldD0iMTAwJSIgc3RvcC1jb2xvcj0iI2QzYzEwMCIvPjwvbGluZWFyR3JhZGllbnQ+PC9kZWZzPjxyZWN0IHg9IjAiIHk9IjAiIHdpZHRoPSIxMDAlIiBoZWlnaHQ9IjEwMCUiIGZpbGw9InVybCgjZ3JhZCkiIC8+PC9zdmc+IA==');
background-size: 100%;
background-image: -webkit-gradient(linear, 0% 0%, 100% 100%, color-stop(0%, #4bb0fd), color-stop(100%, #d3c100));
background-image: -moz-linear-gradient(left top, #4bb0fd, #d3c100);
background-image: -webkit-linear-gradient(left top, #4bb0fd, #d3c100);
background-image: linear-gradient(to right bottom, #4bb0fd, #d3c100);
}
.element-lanthanoid-transitional-metal .face.back {
background-color: #b0dcfe;
}

.element-actinoid-transitional-metal .front {
color: #1b1b3a;
background-image: url('data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4gPHN2ZyB2ZXJzaW9uPSIxLjEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGRlZnM+PGxpbmVhckdyYWRpZW50IGlkPSJncmFkIiBncmFkaWVudFVuaXRzPSJvYmplY3RCb3VuZGluZ0JveCIgeDE9IjAuMCIgeTE9IjAuMCIgeDI9IjEuMCIgeTI9IjEuMCI+PHN0b3Agb2Zmc2V0PSIwJSIgc3RvcC1jb2xvcj0iIzRiYjBmZCIvPjxzdG9wIG9mZnNldD0iMTAwJSIgc3RvcC1jb2xvcj0iI2UwOWQwMCIvPjwvbGluZWFyR3JhZGllbnQ+PC9kZWZzPjxyZWN0IHg9IjAiIHk9IjAiIHdpZHRoPSIxMDAlIiBoZWlnaHQ9IjEwMCUiIGZpbGw9InVybCgjZ3JhZCkiIC8+PC9zdmc+IA==');
background-size: 100%;
background-image: -webkit-gradient(linear, 0% 0%, 100% 100%, color-stop(0%, #4bb0fd), color-stop(100%, #e09d00));
background-image: -moz-linear-gradient(left top, #4bb0fd, #e09d00);
background-image: -webkit-linear-gradient(left top, #4bb0fd, #e09d00);
background-image: linear-gradient(to right bottom, #4bb0fd, #e09d00);
}
.element-actinoid-transitional-metal .face.back {
background-color: #b0dcfe;
}

.element-blank {
background: transparent;
cursor: auto;
}
.element-blank.full {
height: 27.5px;
clear: both;
width: 100%;
}

/* -------------------
Media Queries
-------------------- */
@media screen and (max-width: 989px) {
#wrapper {
  width: 90%;
}
#wrapper .element-blank {
  display: none;
}

#key {
  position: static;
  width: 100%;
  left: 165px;
  z-index: 100;
  margin-top: 20px;
  margin-bottom: 10px;
}
#key:after {
  content: '';
  content: ".";
  display: block;
  clear: both;
  visibility: hidden;
  line-height: 0;
  height: 0;
}
#key ul {
  width: 28%;
  min-width: 150px;
  margin-right: 5%;
}
#key ul:nth-of-type(3) {
  margin-right: 0;
}
}

</style>


@endsection



@section('content')

  <div id='wrapper'>
  			<h1>The Periodic Table</h1>
  			<h3>by Brady Sammons</h3>
    <div id='key'>
  				<ul>
  					<li><span class='swatch element-metal'></span>Metals</li>
  					<li><span class='swatch element-non-metal'></span>Non-Metals</li>
  					<li><span class='swatch element-alkali-metal'></span>Alkali Metals</li>
  					<li><span class='swatch element-alkali-earth-metal'></span>Alkali Earth Metals</li>
  				</ul>
  				<ul>
  					<li><span class='swatch element-transition-metal'></span>Transitional Metals</li>
  					<li><span class='swatch element-lanthoid'></span>Lanthoids</li>
  					<li><span class='swatch element-actinoid'></span>Actinoids</li>
  				</ul>
  				<ul>
  					<li><span class='swatch element-metalloid'></span>Metaloids</li>
  					<li><span class='swatch element-halogen'></span>Halogens</li>
  					<li><span class='swatch element-noble-gas'></span>Noble Gas</li>
  				</ul>
  			</div>
  			<div id='elements'>
  				<!-- Row One -->
  				<div class='element-non-metal'>
  					<div class='chip'>
  						<div class="face front">
  							<i>1</i>
  							<strong>H</strong>
  						</div>
  						<div class='face back'>
  							<p>Hydrogen<span>1.0079</span><p>
  						</div>
  					</div>
  				</div>
  				<div class='element-blank'></div>
  				<div class='element-blank'></div>
  				<div class='element-blank'></div>
  				<div class='element-blank'></div>
  				<div class='element-blank'></div>
  				<div class='element-blank'></div>
  				<div class='element-blank'></div>
  				<div class='element-blank'></div>
  				<div class='element-blank'></div>
  				<div class='element-blank'></div>
  				<div class='element-blank'></div>
  				<div class='element-blank'></div>
  				<div class='element-blank'></div>
  				<div class='element-blank'></div>
  				<div class='element-blank'></div>
  				<div class='element-blank'></div>
  				<div class='element-noble-gas'>
  					<div class='chip'>
  						<div class='face front'>
  							<i>2</i>
  							<strong>He</strong>
  						</div>

  						<div class='face back'>
  							<p>Helium<span>4.0026</span><p>
  						</div>
  					</div>
  				</div><!-- //Row One -->

  				<!-- Row Two -->
  				<div class='element-alkali-metal'>
  					<div class='chip'>
  						<div class='face front'>
  							<i>3</i>
  							<strong>Li</strong>
  						</div>
  						<div class='face back'>
  							<p>Lithium<span>6.941</span><p>
  						</div>
  					</div>
  				</div>
  				<div class='element-alkali-earth-metal'>
  					<div class='chip'>
  						<div class='face front'>
  							<i>4</i>
  							<strong>Be</strong>
  						</div>
  						<div class='face back'>
  							<p>Beryllium<span>6.941</span><p>
  						</div>
  					</div>
  				</div>
  				<div class='element-blank'></div>
  				<div class='element-blank'></div>
  				<div class='element-blank'></div>
  				<div class='element-blank'></div>
  				<div class='element-blank'></div>
  				<div class='element-blank'></div>
  				<div class='element-blank'></div>
  				<div class='element-blank'></div>
  				<div class='element-blank'></div>
  				<div class='element-blank'></div>
  				<div class='element-metalloid'>
  					<div class='chip'>
  						<div class='face front'>
  							<i>5</i>
  							<strong>B</strong>
  						</div>
  						<div class='face back'>
  							<p>Baron<span>10.811</span><p>
  						</div>
  					</div>
  				</div>
  				<div class='element-non-metal'>
  					<div class='chip'>
  						<div class='face front'>
  							<i>6</i>
  							<strong>C</strong>
  						</div>
  						<div class='face back'>
  							<p>Carbon<span>12.0107</span><p>
  						</div>
  					</div>
  				</div>
  				<div class='element-non-metal'>
  					<div class='chip'>
  						<div class='face front'>
  							<i>7</i>
  							<strong>N</strong>
  						</div>
  						<div class='face back'>
  							<p>Nitrogen<span>14.0067</span><p>
  						</div>
  					</div>
  				</div>
  				<div class='element-non-metal'>
  					<div class='chip'>
  						<div class='face front'>
  							<i>8</i>
  							<strong>O</strong>
  						</div>
  						<div class='face back'>
  							<p>Oxygen<span>15.9994</span><p>
  						</div>
  					</div>
  				</div>
  				<div class='element-halogen'>
  					<div class='chip'>
  						<div class='face front'>
  							<i>9</i>
  							<strong>F</strong>
  						</div>
  						<div class='face back'>
  							<p>Fluorine<span>18.998</span><p>
  						</div>
  					</div>
  				</div>
  				<div class='element-noble-gas'>
  					<div class='chip'>
  						<div class='face front'>
  							<i>10</i>
  							<strong>Ne</strong>
  						</div>
  						<div class='face back'>
  							<p>Neon<span>20.1797</span><p>
  						</div>
  					</div>
  				</div><!-- //Row Two -->

  				<!-- Row Three -->
  				<div class='element-alkali-metal'>
  					<div class='chip'>
  						<div class='face front'>
  							<i>11</i>
  							<strong>Na</strong>
  						</div>
  						<div class='face back'>
  							<p>Sodium<span>6.941</span><p>
  						</div>
  					</div>
  				</div>
  				<div class='element-alkali-earth-metal'>
  					<div class='chip'>
  						<div class='face front'>
  							<i>12</i>
  							<strong>Mg</strong>
  						</div>
  						<div class='face back'>
  							<p>Magnesium<span>24.3050</span><p>
  						</div>
  					</div>
  				</div>
  				<div class='element-blank'></div>
  				<div class='element-blank'></div>
  				<div class='element-blank'></div>
  				<div class='element-blank'></div>
  				<div class='element-blank'></div>
  				<div class='element-blank'></div>
  				<div class='element-blank'></div>
  				<div class='element-blank'></div>
  				<div class='element-blank'></div>
  				<div class='element-blank'></div>
  				<div class='element-metal'>
  					<div class='chip'>
  						<div class='face front'>
  							<i>13</i>
  							<strong>Al</strong>
  						</div>
  						<div class='face back'>
  							<p>Aluminum<span>26.981</span><p>
  						</div>
  					</div>
  				</div>
  				<div class='element-metalloid'>
  					<div class='chip'>
  						<div class='face front'>
  							<i>14</i>
  							<strong>Si</strong>
  						</div>
  						<div class='face back'>
  							<p>Silicon<span>28.855</span><p>
  						</div>
  					</div>
  				</div>
  				<div class='element-non-metal'>
  					<div class='chip'>
  						<div class='face front'>
  							<i>15</i>
  							<strong>P</strong>
  						</div>
  						<div class='face back'>
  							<p>phosphorus<span>30.973</span><p>
  						</div>
  					</div>
  				</div>
  				<div class='element-non-metal'>
  					<div class='chip'>
  						<div class='face front'>
  							<i>16</i>
  							<strong>S</strong>
  						</div>
  						<div class='face back'>
  							<p>Sulfur<span>32.065</span><p>
  						</div>
  					</div>
  				</div>
  				<div class='element-halogen'>
  					<div class='chip'>
  						<div class='face front'>
  							<i>17</i>
  							<strong>Cl</strong>
  						</div>
  						<div class='face back'>
  							<p>Chlorine<span>35.453</span><p>
  						</div>
  					</div>
  				</div>
  				<div class='element-noble-gas'>
  					<div class='chip'>
  						<div class='face front'>
  							<i>18</i>
  							<strong>Ar</strong>
  						</div>
  						<div class='face back'>
  							<p>Argon<span>39.948</span><p>
  						</div>
  					</div>
  				</div><!-- //Row Three -->

  				<!-- Row Four -->
  				<div class='element-alkali-metal'>
  					<div class='chip'>
  						<div class='face front'>
  							<i>19</i>
  							<strong>K</strong>
  						</div>
  						<div class='face back'>
  							<p>Potassium<span>39.0983</span><p>
  						</div>
  					</div>
  				</div>
  				<div class='element-alkali-earth-metal'>
  					<div class='chip'>
  						<div class='face front'>
  							<i>20</i>
  							<strong>Ca</strong>
  						</div>
  						<div class='face back'>
  							<p>Calcium<span>40.078</span><p>
  						</div>
  					</div>
  				</div>
  				<div class='element-transition-metal'>
  					<div class='chip'>
  						<div class='face front'>
  							<i>21</i>
  							<strong>Sc</strong>
  						</div>
  						<div class='face back'>
  							<p>Scandium<span>44.955</span><p>
  						</div>
  					</div>
  				</div>
  				<div class='element-transition-metal'>
  					<div class='chip'>
  						<div class='face front'>
  							<i>22</i>
  							<strong>Ti</strong>
  						</div>
  						<div class='face back'>
  							<p>Titanium<span>47.861</span><p>
  						</div>
  					</div>
  				</div>
  				<div class='element-transition-metal'>
  					<div class='chip'>
  						<div class='face front'>
  							<i>23</i>
  							<strong>V</strong>
  						</div>
  						<div class='face back'>
  							<p>Vanadium<span>50.0915</span><p>
  						</div>
  					</div>
  				</div>
  				<div class='element-transition-metal'>
  					<div class='chip'>
  						<div class='face front'>
  							<i>24</i>
  							<strong>Cr</strong>
  						</div>
  						<div class='face back'>
  							<p>Chromium<span>51.9961</span><p>
  						</div>
  					</div>
  				</div>
  				<div class='element-transition-metal'>
  					<div class='chip'>
  						<div class='face front'>
  							<i>25</i>
  							<strong>Mn</strong>
  						</div>
  						<div class='face back'>
  							<p>Manganese<span>54.938</span><p>
  						</div>
  					</div>
  				</div>
  				<div class='element-transition-metal'>
  					<div class='chip'>
  						<div class='face front'>
  							<i>26</i>
  							<strong>Fe</strong>
  						</div>
  						<div class='face back'>
  							<p>Iron<span>55.845</span><p>
  						</div>
  					</div>
  				</div>
  				<div class='element-transition-metal'>
  					<div class='chip'>
  						<div class='face front'>
  							<i>27</i>
  							<strong>Co</strong>
  						</div>
  						<div class='face back'>
  							<p>Cobalt<span>58.933</span><p>
  						</div>
  					</div>
  				</div>
  				<div class='element-transition-metal'>
  					<div class='chip'>
  						<div class='face front'>
  							<i>28</i>
  							<strong>Ni</strong>
  						</div>
  						<div class='face back'>
  							<p>Nickel<span>58.6934</span><p>
  						</div>
  					</div>
  				</div>
  				<div class='element-transition-metal'>
  					<div class='chip'>
  						<div class='face front'>
  							<i>29</i>
  							<strong>Cu</strong>
  						</div>
  						<div class='face back'>
  							<p>Copper<span>63.546</span><p>
  						</div>
  					</div>
  				</div>
  				<div class='element-metal'>
  					<div class='chip'>
  						<div class='face front'>
  							<i>30</i>
  							<strong>Zn</strong>
  						</div>
  						<div class='face back'>
  							<p>Zinc<span>65.409</span><p>
  						</div>
  					</div>
  				</div>
  				<div class='element-metal'>
  					<div class='chip'>
  						<div class='face front'>
  							<i>31</i>
  							<strong>Ga</strong>
  						</div>
  						<div class='face back'>
  							<p>Gallium<span>69.732</span><p>
  						</div>
  					</div>
  				</div>
  				<div class='element-metalloid'>
  					<div class='chip'>
  						<div class='face front'>
  							<i>32</i>
  							<strong>Ge</strong>
  						</div>
  						<div class='face back'>
  							<p>Germanium<span>72.64</span><p>
  						</div>
  					</div>
  				</div>
  				<div class='element-metalloid'>
  					<div class='chip'>
  						<div class='face front'>
  							<i>33</i>
  							<strong>As</strong>
  						</div>
  						<div class='face back'>
  							<p>Arsenic<span>74.921</span><p>
  						</div>
  					</div>
  				</div>
  				<div class='element-non-metal'>
  					<div class='chip'>
  						<div class='face front'>
  							<i>34</i>
  							<strong>Se</strong>
  						</div>
  						<div class='face back'>
  							<p>Selenium<span>78.96</span><p>
  						</div>
  					</div>
  				</div>
  				<div class='element-halogen'>
  					<div class='chip'>
  						<div class='face front'>
  							<i>35</i>
  							<strong>Br</strong>
  						</div>
  						<div class='face back'>
  							<p>Bromine<span>79.904</span><p>
  						</div>
  					</div>
  				</div>
  				<div class='element-noble-gas'>
  					<div class='chip'>
  						<div class='face front'>
  							<i>18</i>
  							<strong>Ar</strong>
  						</div>
  						<div class='face back'>
  							<p>Argon<span>39.948</span><p>
  						</div>
  					</div>
  				</div><!-- //Row Four -->

  				<!-- Row Five -->
  				<div class='element-alkali-metal'>
  					<div class='chip'>
  						<div class='face front'>
  							<i>37</i>
  							<strong>Rb</strong>
  						</div>
  						<div class='face back'>
  							<p>Rubidium<span>85.4678</span><p>
  						</div>
  					</div>
  				</div>
  				<div class='element-alkali-earth-metal'>
  					<div class='chip'>
  						<div class='face front'>
  							<i>38</i>
  							<strong>Sr</strong>
  						</div>
  						<div class='face back'>
  							<p>Strontuim<span>87.62</span><p>
  						</div>
  					</div>
  				</div>
  				<div class='element-transition-metal'>
  					<div class='chip'>
  						<div class='face front'>
  							<i>39</i>
  							<strong>Y</strong>
  						</div>
  						<div class='face back'>
  							<p>Yttrium<span>88.905</span><p>
  						</div>
  					</div>
  				</div>
  				<div class='element-transition-metal'>
  					<div class='chip'>
  						<div class='face front'>
  							<i>40</i>
  							<strong>Zr</strong>
  						</div>
  						<div class='face back'>
  							<p>Zirconium<span>91.224</span><p>
  						</div>
  					</div>
  				</div>
  				<div class='element-transition-metal'>
  					<div class='chip'>
  						<div class='face front'>
  							<i>41</i>
  							<strong>Nb</strong>
  						</div>
  						<div class='face back'>
  							<p>Niobium<span>92.224</span><p>
  						</div>
  					</div>
  				</div>
  				<div class='element-transition-metal'>
  					<div class='chip'>
  						<div class='face front'>
  							<i>42</i>
  							<strong>Mo</strong>
  						</div>
  						<div class='face back'>
  							<p>Molybdenum<span>51.9961</span><p>
  						</div>
  					</div>
  				</div>
  				<div class='element-transition-metal'>
  					<div class='chip'>
  						<div class='face front'>
  							<i>43</i>
  							<strong>Tc</strong>
  						</div>
  						<div class='face back'>
  							<p>Technetium<span>[98]</span><p>
  						</div>
  					</div>
  				</div>
  				<div class='element-transition-metal'>
  					<div class='chip'>
  						<div class='face front'>
  							<i>44</i>
  							<strong>Ru</strong>
  						</div>
  						<div class='face back'>
  							<p>Ruthenium<span>101.07</span><p>
  						</div>
  					</div>
  				</div>
  				<div class='element-transition-metal'>
  					<div class='chip'>
  						<div class='face front'>
  							<i>45</i>
  							<strong>Rh</strong>
  						</div>
  						<div class='face back'>
  							<p>Rhodium<span>102.905</span><p>
  						</div>
  					</div>
  				</div>
  				<div class='element-transition-metal'>
  					<div class='chip'>
  						<div class='face front'>
  							<i>46</i>
  							<strong>Pd</strong>
  						</div>
  						<div class='face back'>
  							<p>Palladlum<span>106.42</span><p>
  						</div>
  					</div>
  				</div>
  				<div class='element-transition-metal'>
  					<div class='chip'>
  						<div class='face front'>
  							<i>47</i>
  							<strong>Ag</strong>
  						</div>
  						<div class='face back'>
  							<p>Silver<span>107.862</span><p>
  						</div>
  					</div>
  				</div>
  				<div class='element-metal'>
  					<div class='chip'>
  						<div class='face front'>
  							<i>48</i>
  							<strong>Cd</strong>
  						</div>
  						<div class='face back'>
  							<p>Cadmium<span>112.411</span><p>
  						</div>
  					</div>
  				</div>
  				<div class='element-metal'>
  					<div class='chip'>
  						<div class='face front'>
  							<i>49</i>
  							<strong>In</strong>
  						</div>
  						<div class='face back'>
  							<p>Indium<span>114.813</span><p>
  						</div>
  					</div>
  				</div>
  				<div class='element-metal'>
  					<div class='chip'>
  						<div class='face front'>
  							<i>50</i>
  							<strong>Sn</strong>
  						</div>
  						<div class='face back'>
  							<p>Tin<span>118.710</span><p>
  						</div>
  					</div>
  				</div>
  				<div class='element-metalloid'>
  					<div class='chip'>
  						<div class='face front'>
  							<i>51</i>
  							<strong>Sb</strong>
  						</div>
  						<div class='face back'>
  							<p>Antimony<span>121.760</span><p>
  						</div>
  					</div>
  				</div>
  				<div class='element-metalloid'>
  					<div class='chip'>
  						<div class='face front'>
  							<i>52</i>
  							<strong>Te</strong>
  						</div>
  						<div class='face back'>
  							<p>Tellurium<span>127.60</span><p>
  						</div>
  					</div>
  				</div>
  				<div class='element-halogen'>
  					<div class='chip'>
  						<div class='face front'>
  							<i>53</i>
  							<strong>I</strong>
  						</div>
  						<div class='face back'>
  							<p>Iodine<span>126.904</span><p>
  						</div>
  					</div>
  				</div>
  				<div class='element-noble-gas'>
  					<div class='chip'>
  						<div class='face front'>
  							<i>54</i>
  							<strong>Xe</strong>
  						</div>
  						<div class='face back'>
  							<p>Xenon<span>131.293</span><p>
  						</div>
  					</div>
  				</div><!-- //Row Five -->

  				<!-- Row Six -->
  				<div class='element-alkali-metal'>
  					<div class='chip'>
  						<div class='face front'>
  							<i>55</i>
  							<strong>Cs</strong>
  						</div>
  						<div class='face back'>
  							<p>Caesium<span>132.905</span><p>
  						</div>
  					</div>
  				</div>
  				<div class='element-alkali-earth-metal'>
  					<div class='chip'>
  						<div class='face front'>
  							<i>56</i>
  							<strong>Ba</strong>
  						</div>
  						<div class='face back'>
  							<p>Barium<span>137.327</span><p>
  						</div>
  					</div>
  				</div>
  				<div class='element-lanthanoid-transitional-metal'>
  					<div class='chip long'>
  						<div class='face front'>
  							<i>57-71</i>
  							<strong>La-Lu</strong>
  						</div>
  						<div class='face back'>
  							<p>Lanthanoids<span></span><p>
  						</div>
  					</div>
  				</div>
  				<div class='element-transition-metal'>
  					<div class='chip'>
  						<div class='face front'>
  							<i>72</i>
  							<strong>Hf</strong>
  						</div>
  						<div class='face back'>
  							<p>Hafnium<span>178.49</span><p>
  						</div>
  					</div>
  				</div>
  				<div class='element-transition-metal'>
  					<div class='chip'>
  						<div class='face front'>
  							<i>73</i>
  							<strong>Ta</strong>
  						</div>
  						<div class='face back'>
  							<p>Tantalum<span>180.947</span><p>
  						</div>
  					</div>
  				</div>
  				<div class='element-transition-metal'>
  					<div class='chip'>
  						<div class='face front'>
  							<i>74</i>
  							<strong>W</strong>
  						</div>
  						<div class='face back'>
  							<p>Tungsten<span>183.84</span><p>
  						</div>
  					</div>
  				</div>
  				<div class='element-transition-metal'>
  					<div class='chip'>
  						<div class='face front'>
  							<i>75</i>
  							<strong>Re</strong>
  						</div>
  						<div class='face back'>
  							<p>Rhenium<span>186.207</span><p>
  						</div>
  					</div>
  				</div>
  				<div class='element-transition-metal'>
  					<div class='chip'>
  						<div class='face front'>
  							<i>76</i>
  							<strong>Os</strong>
  						</div>
  						<div class='face back'>
  							<p>Osmium<span>190.23</span><p>
  						</div>
  					</div>
  				</div>
  				<div class='element-transition-metal'>
  					<div class='chip'>
  						<div class='face front'>
  							<i>77</i>
  							<strong>Ir</strong>
  						</div>
  						<div class='face back'>
  							<p>Iridium<span>192.217</span><p>
  						</div>
  					</div>
  				</div>
  				<div class='element-transition-metal'>
  					<div class='chip'>
  						<div class='face front'>
  							<i>78</i>
  							<strong>Pt</strong>
  						</div>
  						<div class='face back'>
  							<p>Platinum<span>195.084</span><p>
  						</div>
  					</div>
  				</div>
  				<div class='element-transition-metal'>
  					<div class='chip'>
  						<div class='face front'>
  							<i>79</i>
  							<strong>Au</strong>
  						</div>
  						<div class='face back'>
  							<p>Gold<span>196.966</span><p>
  						</div>
  					</div>
  				</div>
  				<div class='element-metal'>
  					<div class='chip'>
  						<div class='face front'>
  							<i>80</i>
  							<strong>Hg</strong>
  						</div>
  						<div class='face back'>
  							<p>Mercury<span>200.59</span><p>
  						</div>
  					</div>
  				</div>
  				<div class='element-metal'>
  					<div class='chip'>
  						<div class='face front'>
  							<i>81</i>
  							<strong>Tl</strong>
  						</div>
  						<div class='face back'>
  							<p>Thallium<span>204.3833</span><p>
  						</div>
  					</div>
  				</div>
  				<div class='element-metal'>
  					<div class='chip'>
  						<div class='face front'>
  							<i>82</i>
  							<strong>Pb</strong>
  						</div>
  						<div class='face back'>
  							<p>Lead<span>207.2</span><p>
  						</div>
  					</div>
  				</div>
  				<div class='element-metalloid'>
  					<div class='chip'>
  						<div class='face front'>
  							<i>83</i>
  							<strong>Bi</strong>
  						</div>
  						<div class='face back'>
  							<p>Bismuth<span>208.980</span><p>
  						</div>
  					</div>
  				</div>
  				<div class='element-metalloid'>
  					<div class='chip'>
  						<div class='face front'>
  							<i>84</i>
  							<strong>Po</strong>
  						</div>
  						<div class='face back'>
  							<p>Polonium<span>[209]</span><p>
  						</div>
  					</div>
  				</div>
  				<div class='element-halogen'>
  					<div class='chip'>
  						<div class='face front'>
  							<i>85</i>
  							<strong>At</strong>
  						</div>
  						<div class='face back'>
  							<p>Astatine<span>[210]</span><p>
  						</div>
  					</div>
  				</div>
  				<div class='element-noble-gas'>
  					<div class='chip'>
  						<div class='face front'>
  							<i>86</i>
  							<strong>Rn</strong>
  						</div>
  						<div class='face back'>
  							<p>Radon<span>[222]</span><p>
  						</div>
  					</div>
  				</div><!-- //Row Six -->

  				<!-- Row Seven -->
  				<div class='element-alkali-metal'>
  					<div class='chip'>
  						<div class='face front'>
  							<i>87</i>
  							<strong>Fr</strong>
  						</div>
  						<div class='face back'>
  							<p>Francium<span>[223]</span><p>
  						</div>
  					</div>
  				</div>
  				<div class='element-alkali-earth-metal'>
  					<div class='chip'>
  						<div class='face front'>
  							<i>88</i>
  							<strong>Ra</strong>
  						</div>
  						<div class='face back'>
  							<p>Radium<span>[226]</span><p>
  						</div>
  					</div>
  				</div>
  				<div class='element-actinoid-transitional-metal'>
  					<div class='chip long'>
  						<div class='face front'>
  							<i>89-103</i>
  							<strong>Ac-Lr</strong>
  						</div>
  						<div class='face back'>
  							<p>Actinoids<span></span><p>
  						</div>
  					</div>
  				</div>
  				<div class='element-transition-metal'>
  					<div class='chip'>
  						<div class='face front'>
  							<i>104</i>
  							<strong>Rf</strong>
  						</div>
  						<div class='face back'>
  							<p>Rutherfordium<span>[261]</span><p>
  						</div>
  					</div>
  				</div>
  				<div class='element-transition-metal'>
  					<div class='chip'>
  						<div class='face front'>
  							<i>105</i>
  							<strong>Db</strong>
  						</div>
  						<div class='face back'>
  							<p>Dubnium<span>[262]</span><p>
  						</div>
  					</div>
  				</div>
  				<div class='element-transition-metal'>
  					<div class='chip'>
  						<div class='face front'>
  							<i>106</i>
  							<strong>Sg</strong>
  						</div>
  						<div class='face back'>
  							<p>Seaborgium<span>[266]</span><p>
  						</div>
  					</div>
  				</div>
  				<div class='element-transition-metal'>
  					<div class='chip'>
  						<div class='face front'>
  							<i>107</i>
  							<strong>Bh</strong>
  						</div>
  						<div class='face back'>
  							<p>Bohrium<span>[264]</span><p>
  						</div>
  					</div>
  				</div>
  				<div class='element-transition-metal'>
  					<div class='chip'>
  						<div class='face front'>
  							<i>108</i>
  							<strong>Hs</strong>
  						</div>
  						<div class='face back'>
  							<p>Hassium<span>[277]</span><p>
  						</div>
  					</div>
  				</div>
  				<div class='element-transition-metal'>
  					<div class='chip'>
  						<div class='face front'>
  							<i>109</i>
  							<strong>Mt</strong>
  						</div>
  						<div class='face back'>
  							<p>Meltnerium<span>[268]</span><p>
  						</div>
  					</div>
  				</div>
  				<div class='element-transition-metal'>
  					<div class='chip'>
  						<div class='face front'>
  							<i>110</i>
  							<strong>Ds</strong>
  						</div>
  						<div class='face back'>
  							<p>Darmstadtium<span>[271]</span><p>
  						</div>
  					</div>
  				</div>
  				<div class='element-transition-metal'>
  					<div class='chip'>
  						<div class='face front'>
  							<i>111</i>
  							<strong>Rg</strong>
  						</div>
  						<div class='face back'>
  							<p>Roentgenium<span>[272]</span><p>
  						</div>
  					</div>
  				</div>
  				<div class='element-transition-metal'>
  					<div class='chip'>
  						<div class='face front'>
  							<i>112</i>
  							<strong>Cn</strong>
  						</div>
  						<div class='face back'>
  							<p>Copernicium<span>[285]</span><p>
  						</div>
  					</div>
  				</div><!-- //Row Seven -->

  				<div class='element-blank full'></div>

  				<!-- Row Eight -->
  				<div class='element-blank'></div>
  				<div class='element-blank'></div>
  				<div class='element-lanthoid'>
  					<div class='chip'>
  						<div class='face front'>
  							<i>57</i>
  							<strong>La</strong>
  						</div>
  						<div class='face back'>
  							<p>Lanthanum<span>138.905</span><p>
  						</div>
  					</div>
  				</div>
  				<div class='element-lanthoid'>
  					<div class='chip'>
  						<div class='face front'>
  							<i>58</i>
  							<strong>Ce</strong>
  						</div>
  						<div class='face back'>
  							<p>Cerium<span>140.116</span><p>
  						</div>
  					</div>
  				</div>
  				<div class='element-lanthoid'>
  					<div class='chip'>
  						<div class='face front'>
  							<i>59</i>
  							<strong>Pr</strong>
  						</div>
  						<div class='face back'>
  							<p>Praseodymium<span>140.907</span><p>
  						</div>
  					</div>
  				</div>
  				<div class='element-lanthoid'>
  					<div class='chip'>
  						<div class='face front'>
  							<i>60</i>
  							<strong>Nd</strong>
  						</div>
  						<div class='face back'>
  							<p>Neodymium<span>144.242</span><p>
  						</div>
  					</div>
  				</div>
  				<div class='element-lanthoid'>
  					<div class='chip'>
  						<div class='face front'>
  							<i>61</i>
  							<strong>Pm</strong>
  						</div>
  						<div class='face back'>
  							<p>Promethium<span>[145]</span><p>
  						</div>
  					</div>
  				</div>
  				<div class='element-lanthoid'>
  					<div class='chip'>
  						<div class='face front'>
  							<i>62</i>
  							<strong>Sm</strong>
  						</div>
  						<div class='face back'>
  							<p>Samarium<span>150.36</span><p>
  						</div>
  					</div>
  				</div>
  				<div class='element-lanthoid'>
  					<div class='chip'>
  						<div class='face front'>
  							<i>63</i>
  							<strong>Eu</strong>
  						</div>
  						<div class='face back'>
  							<p>Europium<span>151.36</span><p>
  						</div>
  					</div>
  				</div>
  				<div class='element-lanthoid'>
  					<div class='chip'>
  						<div class='face front'>
  							<i>64</i>
  							<strong>Gd</strong>
  						</div>
  						<div class='face back'>
  							<p>Gadolinium<span>157.25</span><p>
  						</div>
  					</div>
  				</div>
  				<div class='element-lanthoid'>
  					<div class='chip'>
  						<div class='face front'>
  							<i>65</i>
  							<strong>Tb</strong>
  						</div>
  						<div class='face back'>
  							<p>Terbium<span>158.925</span><p>
  						</div>
  					</div>
  				</div>
  				<div class='element-lanthoid'>
  					<div class='chip'>
  						<div class='face front'>
  							<i>66</i>
  							<strong>Dy</strong>
  						</div>
  						<div class='face back'>
  							<p>Dysprosium<span>162.500</span><p>
  						</div>
  					</div>
  				</div>
  				<div class='element-lanthoid'>
  					<div class='chip'>
  						<div class='face front'>
  							<i>67</i>
  							<strong>Ho</strong>
  						</div>
  						<div class='face back'>
  							<p>Holmium<span>164.930</span><p>
  						</div>
  					</div>
  				</div>
  				<div class='element-lanthoid'>
  					<div class='chip'>
  						<div class='face front'>
  							<i>68</i>
  							<strong>Er</strong>
  						</div>
  						<div class='face back'>
  							<p>Erbium<span>167.259</span><p>
  						</div>
  					</div>
  				</div>
  				<div class='element-lanthoid'>
  					<div class='chip'>
  						<div class='face front'>
  							<i>69</i>
  							<strong>Tm</strong>
  						</div>
  						<div class='face back'>
  							<p>Thulium<span>168.934</span><p>
  						</div>
  					</div>
  				</div>
  				<div class='element-lanthoid'>
  					<div class='chip'>
  						<div class='face front'>
  							<i>70</i>
  							<strong>Yb</strong>
  						</div>
  						<div class='face back'>
  							<p>Ytterbium<span>173.04</span><p>
  						</div>
  					</div>
  				</div>
  				<div class='element-lanthoid'>
  					<div class='chip'>
  						<div class='face front'>
  							<i>71</i>
  							<strong>Lu</strong>
  						</div>
  						<div class='face back'>
  							<p>Lutetium<span>174.967</span><p>
  						</div>
  					</div>
  				</div>
  				<div class='element-blank'></div>
  				<!-- //Row Eight -->

  				<!-- Row Nine -->
  				<div class='element-blank'></div>
  				<div class='element-blank'></div>
  				<div class='element-actinoid'>
  					<div class='chip'>
  						<div class='face front'>
  							<i>89</i>
  							<strong>Ac</strong>
  						</div>
  						<div class='face back'>
  							<p>Actinium<span>[227]</span><p>
  						</div>
  					</div>
  				</div>
  				<div class='element-actinoid'>
  					<div class='chip'>
  						<div class='face front'>
  							<i>90</i>
  							<strong>Th</strong>
  						</div>
  						<div class='face back'>
  							<p>Thorium<span>232.038</span><p>
  						</div>
  					</div>
  				</div>
  				<div class='element-actinoid'>
  					<div class='chip'>
  						<div class='face front'>
  							<i>91</i>
  							<strong>Pa</strong>
  						</div>
  						<div class='face back'>
  							<p>Protactinium<span>232.038</span><p>
  						</div>
  					</div>
  				</div>
  				<div class='element-actinoid'>
  					<div class='chip'>
  						<div class='face front'>
  							<i>92</i>
  							<strong>U</strong>
  						</div>
  						<div class='face back'>
  							<p>Uranium<span>238.028</span><p>
  						</div>
  					</div>
  				</div>
  				<div class='element-actinoid'>
  					<div class='chip'>
  						<div class='face front'>
  							<i>93</i>
  							<strong>Np</strong>
  						</div>
  						<div class='face back'>
  							<p>Neptunium<span>[237]</span><p>
  						</div>
  					</div>
  				</div>
  				<div class='element-actinoid'>
  					<div class='chip'>
  						<div class='face front'>
  							<i>94</i>
  							<strong>Pu</strong>
  						</div>
  						<div class='face back'>
  							<p>Plutonium<span>[244]</span><p>
  						</div>
  					</div>
  				</div>
  				<div class='element-actinoid'>
  					<div class='chip'>
  						<div class='face front'>
  							<i>95</i>
  							<strong>Am</strong>
  						</div>
  						<div class='face back'>
  							<p>Americium<span>[243]</span><p>
  						</div>
  					</div>
  				</div>
  				<div class='element-actinoid'>
  					<div class='chip'>
  						<div class='face front'>
  							<i>96</i>
  							<strong>Cm</strong>
  						</div>
  						<div class='face back'>
  							<p>Curium<span>[247]</span><p>
  						</div>
  					</div>
  				</div>
  				<div class='element-actinoid'>
  					<div class='chip'>
  						<div class='face front'>
  							<i>97</i>
  							<strong>Bk</strong>
  						</div>
  						<div class='face back'>
  							<p>Berkelium<span>[247]</span><p>
  						</div>
  					</div>
  				</div>
  				<div class='element-actinoid'>
  					<div class='chip'>
  						<div class='face front'>
  							<i>98</i>
  							<strong>Cf</strong>
  						</div>
  						<div class='face back'>
  							<p>Californium<span>[251]</span><p>
  						</div>
  					</div>
  				</div>
  				<div class='element-actinoid'>
  					<div class='chip'>
  						<div class='face front'>
  							<i>99</i>
  							<strong>Es</strong>
  						</div>
  						<div class='face back'>
  							<p>Einsteinium<span>[257]</span><p>
  						</div>
  					</div>
  				</div>
  				<div class='element-actinoid'>
  					<div class='chip'>
  						<div class='face front'>
  							<i>100</i>
  							<strong>Fm</strong>
  						</div>
  						<div class='face back'>
  							<p>Fermium<span>[257]</span><p>
  						</div>
  					</div>
  				</div>
  				<div class='element-actinoid'>
  					<div class='chip'>
  						<div class='face front'>
  							<i>101</i>
  							<strong>Md</strong>
  						</div>
  						<div class='face back'>
  							<p>Mendelevium<span>[258]</span><p>
  						</div>
  					</div>
  				</div>
  				<div class='element-actinoid'>
  					<div class='chip'>
  						<div class='face front'>
  							<i>102</i>
  							<strong>No</strong>
  						</div>
  						<div class='face back'>
  							<p>Nobelium<span>[259]</span><p>
  						</div>
  					</div>
  				</div>
  				<div class='element-actinoid'>
  					<div class='chip'>
  						<div class='face front'>
  							<i>103</i>
  							<strong>Lr</strong>
  						</div>
  						<div class='face back'>
  							<p>Lawrencium<span>[262]</span><p>
  						</div>
  					</div>
  				</div>
  				</div><!-- //Row Nine -->

  			</div><!-- //Elements -->
  		</div> <!-- //Wrapper -->

@endsection
