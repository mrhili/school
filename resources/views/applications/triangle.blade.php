<!DOCTYPE html>
<html>
<head>
	<title>Triangle Solver!</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<link rel="stylesheet" type="text/css" href="/applications/triangle/progeks.css" />
	<link rel="shortcut icon" href="/applications/triangle/favicon.ico">
	<h1 style="text-align:center; margin-bottom: 10px; font-family: Garamond;">IT & Programmerings Eksamensprojekt</h1>
	<div id="wmark">©2013 Emil Christian Lynegaard</div>

	<!-- Emergency Pytagoras
	<img src="pytright.PNG" style="position:fixed;left:1%;top:20%;">
	<img src="pytleft.PNG" style="position:fixed;right:1%;top:20%;">
	-->

</head>
<body>
	<div style="width:100%;margin:0;padding:0;">
	<div id="content" style="height:auto;width:770px;">

	<!-- Instructions -->
	<div id="rettriinstruction">
	Insert known values and press 'Calculate!'
	</div>
	<div id="triinstruction">
	Insert known values and press 'Calculate!'
	</div>

	<!--Smiley-->
	<canvas id="hello" width="200" height="150"></canvas><br>

	<!--Input form for ret trekant-->
	<div id="inputrettri">
	<form name="rettriform" method="post" id="rettriform" onkeypress="return isNumberKey(event)"><b>
	<label for="a1">a:</label><input type="text" id="a1" class="input"><br>
	<label for="b1">b:</label><input type="text" id="b1" class="input"><br>
	<label for="c1">c:</label><input type="text" id="c1" class="input"><br>
	<label for="A1">A°:</label><input type="text" id="A1" class="input"><br>
	<label for="B1">B°:</label><input type="text" id="B1" class="input"><br>
	<label for="C1">C°:</label><input type="text" id="C1" class="input" value="90°" readonly><br></b>
	<input type="button" onclick="calc()" value="Calculate!" class="button">
	<input type="button" onclick="clear0()" value="Clear!" class="button">
	</form>
	</div>

	<!--Triangle boxes-->
	<canvas id="rettriangle" width="200" height="250"></canvas>
	<canvas id="triangle" width="200" height="250"></canvas>

	<!--Input form for trekant-->
	<div id="inputtri">
	<form name="triform" method="post" id="triform" onkeypress="return isNumberKey(event)"><b>
	<label for="a2">a:</label><input type="text" id="a2" class="input"><br>
	<label for="b2">b:</label><input type="text" id="b2" class="input"><br>
	<label for="c2">c:</label><input type="text" id="c2" class="input"><br>
	<label for="A2">A°:</label><input type="text" id="A2" class="input"><br>
	<label for="B2">B°:</label><input type="text" id="B2" class="input"><br>
	<label for="C2">C°:</label><input type="text" id="C2" class="input"><br></b>
	<input type="button" onclick="calc1()" value="Calculate!" class="button">
	<input type="button" onclick="clear1()" value="Clear!" class="button">
	</form>
	</div>

	<!--Explanation output-->
	<h2>Explanation!</h2>
	<div id="output" style="background-color:white;height:300px;width:400px;">
	</div>
	</div>

	<script type="text/javascript" src="/applications/triangle/progeks.js"></script>
	</script>

	</div>

</body>
</html>
