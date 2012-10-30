<!DOCTYPE html>
<head>
	<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/themes/start/jquery-ui.css" type="text/css" rel="Stylesheet" />
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.9.0/jquery-ui.min.js"></script>

	<script type='text/javascript'>
		function ready() {
			var canvas, ctx, img;
			canvas = document.getElementById("leftCanvas");
			ctx = canvas.getContext("2d");
			img = document.getElementById("image1");
			alert(img);
			alert(canvas);
			ctx.drawImage(img, 0, 0);
			alert(img[0].attr("height"));
			alert(img[0].attr("width"));
		}

		$(document).ready(ready);
	</script>
</head>
<body>
	<canvas id="leftCanvas" width="200" height="100"
	style="border:1px solid #000000; float: left">
	</canvas>
	<canvas id="rightCanvas" width="200" height="100"
	style="border:1px solid #000000; float: right">
	</canvas>
	<div id="images" style="display:none">
		<img id="image1" src="http://www.w3schools.com/html/img_the_scream.jpg">
		<img id="image2" src="http://www.w3schools.com/html/img_the_scream.jpg">
	</div>
</body>

