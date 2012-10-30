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

				var x;
				var y;
				if (e.pageX || e.pageY) { 
				  x = e.pageX;
				  y = e.pageY;
				}
				else { 
				  x = e.clientX + document.body.scrollLeft + document.documentElement.scrollLeft; 
				  y = e.clientY + document.body.scrollTop + document.documentElement.scrollTop; 
				} 
				x -= leftCanvas.offsetLeft;
				y -= leftCanvas.offsetTop;

				var ctx = leftCanvas.getContext("2d");
				ctx.moveTo(x - 5, y);
				ctx.lineTo(x + 5, y);
				ctx.stroke();
				ctx.moveTo(x, y - 5);
				ctx.lineTo(x, y + 5);
				ctx.stroke();
			}
		}

		function rightCanvasClick(e) {
			if (e != null) {
				var rightCanvas = document.getElementById("rightCanvas");

				var x;
				var y;
				if (e.pageX || e.pageY) { 
				  x = e.pageX;
				  y = e.pageY;
				}
				else { 
				  x = e.clientX + document.body.scrollLeft + document.documentElement.scrollLeft; 
				  y = e.clientY + document.body.scrollTop + document.documentElement.scrollTop; 
				} 
				x -= rightCanvas.offsetLeft;
				y -= rightCanvas.offsetTop;

				var ctx = rightCanvas.getContext("2d");
				ctx.moveTo(x - 5, y);
				ctx.lineTo(x + 5, y);
				ctx.stroke();
				ctx.moveTo(x, y - 5);
				ctx.lineTo(x, y + 5);
				ctx.stroke();
			}
		}

		window.onload = function() {
			var leftCanvas = document.getElementById("leftCanvas");
			var rightCanvas = document.getElementById("rightCanvas");
			leftCanvas.addEventListener("click", leftCanvasClick, false);
			rightCanvas.addEventListener("click", rightCanvasClick, false);

			var leftCtx = leftCanvas.getContext("2d");
			var rightCtx = rightCanvas.getContext("2d");

			var leftImg = new Image();
			leftImg.src = "http://ec2-54-245-10-30.us-west-2.compute.amazonaws.com/~tbondwilkinson/SC179_BoD_1/SC179_Bod_1_A1.jpg";
        	leftImg.onload = function() {	
				leftCtx.drawImage(leftImg, 0, 0, 587, 802);
        	};

			var rightImg = new Image();
			rightImg.src = "http://ec2-54-245-10-30.us-west-2.compute.amazonaws.com/~tbondwilkinson/SC179_HRH_1/SC179_HRH_1_A1.jpg";

        	rightImg.onload = function() {	
				rightCtx.drawImage(rightImg, 0, 0, 587, 802);
        	};
		}
	</script>
</head>
<body>
	<canvas id="leftCanvas" width="587" height="802"
	style="border:1px solid #000000; float: left" onclick="leftCanvasClick()">
	Your browser does not support the HTML5 canvas tag
	</canvas>
	<canvas id="rightCanvas" width="587" height="802"
	style="border:1px solid #000000; float: right">
	</canvas>
</body>
</html>

