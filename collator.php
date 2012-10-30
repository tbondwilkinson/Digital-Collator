<!DOCTYPE html>
<html>
<head>
	<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/themes/start/jquery-ui.css" type="text/css" rel="Stylesheet" />
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.9.0/jquery-ui.min.js"></script>

	<script type='text/javascript'>
		function leftCanvasClick(e) {
			e.stopPropogation();
			alert(e);
		}

		window.onload = function() {
			var leftCanvas = document.getElementById("leftCanvas");
			var rightCanvas = document.getElementById("rightCanvas");
			leftCanvas.addEventListener("click", leftCanvasClick, false);

			var c = document.getElementById("leftCanvas");
			var ctx = c.getContext("2d");
			var img = new Image();
			img.src = "http://www.w3schools.com/html/img_the_scream.jpg";
			ctx.drawImage(img, 0, 0);
		}
	</script>
</head>
<body>
	<canvas id="leftCanvas" width="500" height="500"
	style="border:1px solid #000000; float: left" onclick="leftCanvasClick()">
	Your browser does not support the HTML5 canvas tag
	</canvas>
	<canvas id="rightCanvas" width="500" height="500"
	style="border:1px solid #000000; float: right">
	</canvas>
</body>
</html>

