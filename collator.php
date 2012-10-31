<!DOCTYPE html>
<html>
<head>
	<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/themes/start/jquery-ui.css" type="text/css" rel="Stylesheet" />
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.9.0/jquery-ui.min.js"></script>
	<script src="jcanvas.min.js"></script>

	<script type='text/javascript'>
	var lCtx, rCtx;

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

			rCtx.moveTo(x - 5, y);
			rCtx.lineTo(x + 5, y);
			rCtx.stroke();
			rCtx.moveTo(x, y - 5);
			rCtx.lineTo(x, y + 5);
			rCtx.stroke();
		}
	}

	window.onload = function() {
		var leftCanvas = document.getElementById("leftCanvas");
		var rightCanvas = document.getElementById("rightCanvas");
		lCtx = leftCanvas.getContext("2d");
		rCtx = rightCanvas.getContext("2d");
		rightCanvas.addEventListener("click", rightCanvasClick, false);

		var leftImg = new Image();
		leftImg.src = "http://ec2-54-245-10-30.us-west-2.compute.amazonaws.com/~tbondwilkinson/SC179_BoD_1/SC179_Bod_1_A1.jpg";
    	leftImg.onload = function() {
    		leftCanvas.width = window.innerWidth;
    		var scale = leftCanvas.width / leftImg.width;
    		leftCanvas.height = leftImage.height * scale;
    		$("#leftCanvas").drawImage({
    			layer: true,
    			source: "http://ec2-54-245-10-30.us-west-2.compute.amazonaws.com/~tbondwilkinson/SC179_BoD_1/SC179_Bod_1_A1.jpg",
    			x: 0,
    			y: 0,
    			fromCenter: false,
    			width: leftCanvas.width,
    			height: leftCanvas.height,
    			click: function(layer) {
    				$("#leftCanvas").drawLine({
    					layer: true,
    					fillStyle: "black",
    				  	strokeStyle: "#000",
    				  	strokeWidth: 1,
    				  	x1: layer.mouseX - 5, y1: layer.mouseY,
    				  	x2: layer.mouseX + 5, y2: layer.mouseY
    				});
    				$("#leftCanvas").drawLine({
    					layer: true,
    					fillStyle: "black",
    				  	strokeStyle: "#000",
    				  	strokeWidth: 1,
    				  	x1: layer.mouseX, y1: layer.mouseY - 5,
    				  	x2: layer.mouseX, y2: layer.mouseY + 5
    				});
    			 }
    		});

    	};

		var rightImg = new Image();
		rightImg.src = "http://ec2-54-245-10-30.us-west-2.compute.amazonaws.com/~tbondwilkinson/SC179_HRH_1/SC179_HRH_1_A1.jpg";

    	rightImg.onload = function() {	
			rCtx.drawImage(rightImg, 0, 0, 587, 802);
    	};
    };
	</script>

	<style>
	html, body {
	  width:  100%;
	  height: 100%;
	  margin: 0px;
	}
	</style>
</head>
<body>
	<canvas id="leftCanvas"
	style="border:1px solid #000000; float: left">
	Your browser does not support the HTML5 canvas tag
	</canvas>
	<canvas id="rightCanvas" width="587" height="802"
	style="border:1px solid #000000; float: right">
	</canvas>
</body>
</html>

