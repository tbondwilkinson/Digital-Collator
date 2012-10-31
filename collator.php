<!DOCTYPE html>
<html>
<head>
	<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/themes/start/jquery-ui.css" type="text/css" rel="Stylesheet" />
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.9.0/jquery-ui.min.js"></script>
	<script src="jcanvas.min.js"></script>

	<script type='text/javascript'>
	window.onload = function() {
		var leftCanvas = document.getElementById("leftCanvas");
		var rightCanvas = document.getElementById("rightCanvas");

		var leftImg = new Image();
		leftImg.src = "http://ec2-54-245-10-30.us-west-2.compute.amazonaws.com/~tbondwilkinson/SC179_BoD_1/SC179_Bod_1_A1.jpg";
    	leftImg.onload = function() {
    		leftCanvas.width = window.innerWidth/2 - 2;
    		alert(leftCanvas.width);
    		var scale = leftCanvas.width / leftImg.width;
    		leftCanvas.height = leftImg.height * scale;
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
    				  	strokeStyle: "red",
    				  	strokeWidth: 1,
    				  	x1: layer.mouseX - 5, y1: layer.mouseY,
    				  	x2: layer.mouseX + 5, y2: layer.mouseY
    				});
    				$("#leftCanvas").drawLine({
    					layer: true,
    				  	strokeStyle: "red",
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
			rightCanvas.width = window.innerWidth/2 - 2;
    		var scale = rightCanvas.width / rightImg.width;
    		rightCanvas.height = rightImg.height * scale;
    		$("#rightCanvas").drawImage({
    			layer: true,
    			source: "http://ec2-54-245-10-30.us-west-2.compute.amazonaws.com/~tbondwilkinson/SC179_HRH_1/SC179_HRH_1_A1.jpg",
    			x: 0,
    			y: 0,
    			fromCenter: false,
    			width: rightCanvas.width,
    			height: rightCanvas.height,
    			click: function(layer) {
    				alert(scale);
    				$("#rightCanvas").drawLine({
    					layer: true,
    				  	strokeStyle: "red",
    				  	strokeWidth: 1,
    				  	x1: layer.mouseX - 5, y1: layer.mouseY,
    				  	x2: layer.mouseX + 5, y2: layer.mouseY
    				});
    				$("#rightCanvas").drawLine({
    					layer: true,
    				  	strokeStyle: "red",
    				  	strokeWidth: 1,
    				  	x1: layer.mouseX, y1: layer.mouseY - 5,
    				  	x2: layer.mouseX, y2: layer.mouseY + 5
    				});
    			 }
    		});
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
	<canvas id="rightCanvas"
	style="border:1px solid #000000; float: right">
	</canvas>
</body>
</html>

