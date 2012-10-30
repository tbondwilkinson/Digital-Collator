<!DOCTYPE html>
<html>
<head>
	<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/themes/start/jquery-ui.css" type="text/css" rel="Stylesheet" />
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.9.0/jquery-ui.min.js"></script>

	<script type='text/javascript'>
		function ready() {
			var c=document.getElementById("leftCanvas");
			var ctx=c.getContext("2d");
			var img=document.getElementById("image1");
			ctx.drawImage(img, 0, 0);
		}

		$(document).ready(ready);
	</script>
</head>
<body>
	<canvas id="leftCanvas" width="500" height="500"
	style="border:1px solid #000000; float: left">
	</canvas>
	<canvas id="rightCanvas" width="500" height="500"
	style="border:1px solid #000000; float: right">
	</canvas>
	<div id="images" style="display:none">
		<img id="image1" src="http://www.w3schools.com/html/img_the_scream.jpg" width="220" height="277">
		<img id="image2" src="http://www.w3schools.com/html/img_the_scream.jpg">
	</div>
</body>
</html>

