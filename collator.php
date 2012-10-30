<!DOCTYPE html>
<html>
<head>
	<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/themes/start/jquery-ui.css" type="text/css" rel="Stylesheet" />
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.9.0/jquery-ui.min.js"></script>

	<script type='text/javascript'>
		function leftCanvasClick(e) {
			if (e != null) {
				var leftCanvas = document.getElementById("leftCanvas");
				var ctx = leftCanvas.getContext("2d");
				ctx.moveTo(e.clientX - 5, e.clientY);
				ctx.lineTo(e.clientX + 5, e.clientY);
				ctx.stroke();
				ctx.moveTo(e.clientX, e.clientY - 5);
				ctx.lineTo(e.clientX, e.clientY + 5);
				ctx.stroke();
			}
		}

		window.onload = function() {
			var leftCanvas = document.getElementById("leftCanvas");
			var rightCanvas = document.getElementById("rightCanvas");
			leftCanvas.addEventListener("click", leftCanvasClick, false);

			var ctx = leftCanvas.getContext("2d");
			var img = new Image();
			img.src = "~/SC179_BoD_1/SC179_Bod_1_A1.jpg";
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

