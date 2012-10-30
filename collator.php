<!DOCTYPE html>
<html>
<head>
	<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/themes/start/jquery-ui.css" type="text/css" rel="Stylesheet" />
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.9.0/jquery-ui.min.js"></script>

	<script type='text/javascript'>
	var lCtx, rCtx;
	var leftRestorePoints = [];
	var rightRestorePoints = [];

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


			var imgSrc = leftCanvas.toDataURL("image/png");
			leftRestorePoints.push(imgSrc);

			lCtx.moveTo(x - 5, y);
			lCtx.lineTo(x + 5, y);
			lCtx.stroke();
			lCtx.moveTo(x, y - 5);
			lCtx.lineTo(x, y + 5);
			lCtx.stroke();
		}
	}

	function rightCanvasClick(e) {
		if (e != null) {
			var leftCanvas = document.getElementById("rightCanvas");
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


			var imgSrc = rightCanvas.toDataURL("image/png");
			rightRestorePoints.push(imgSrc);

			rCtx.moveTo(x - 5, y);
			rCtx.lineTo(x + 5, y);
			rCtx.stroke();
			rCtx.moveTo(x, y - 5);
			rCtx.lineTo(x, y + 5);
			rCtx.stroke();
		}
	}

	function keydown(event) {
		var keyCode = ('which' in event) ? event.which : event.keyCode;
		if (keyCode === 8) {
			alert("Undo drawing");
			// If we have some restore points
			if (leftRestorePoints.length > 0) {
				alert("restore left");
				// Create a new Image object
				var oImg = new Image();
				// When the image object is fully loaded in the memory...
				oImg.onload = function() {
					// Get the canvas context
					var canvasContext = document.getElementById("leftCanvas").getContext("2d");		
					// and draw the image (restore point) on the canvas. That would overwrite anything
					// already drawn on the canvas, which will basically restore it to a previous point.
					canvasContext.drawImage(oImg, 0, 0);
				}
				// The source of the image, is the last restoration point
				oImg.src = restorePoints.pop();
			}
			// If we have some restore points
			if (rightRestorePoints.length > 0) {
				alert("restore right");
				// Create a new Image object
				var oImg = new Image();
				// When the image object is fully loaded in the memory...
				oImg.onload = function() {
					// Get the canvas context
					var canvasContext = document.getElementById("rightCanvas").getContext("2d");		
					// and draw the image (restore point) on the canvas. That would overwrite anything
					// already drawn on the canvas, which will basically restore it to a previous point.
					canvasContext.drawImage(oImg, 0, 0);
				}
				// The source of the image, is the last restoration point
				oImg.src = restorePoints.pop();
			}
			alert("End of undo");
			return false;
		}
		return true;
	}

	window.onload = function() {
		var leftCanvas = document.getElementById("leftCanvas");
		var rightCanvas = document.getElementById("rightCanvas");
		lCtx = leftCanvas.getContext("2d");
		rCtx = rightCanvas.getContext("2d");
		leftCanvas.addEventListener("click", leftCanvasClick, false);
		rightCanvas.addEventListener("click", rightCanvasClick, false);

		document.onkeydown = keydown;

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
    };
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

