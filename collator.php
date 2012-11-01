<!DOCTYPE html>
<html>
<head>
	<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/themes/start/jquery-ui.css" type="text/css" rel="Stylesheet" />
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.9.0/jquery-ui.min.js"></script>
	<script src="jcanvas.min.js"></script>

	<script type='text/javascript'>
	var leftFolder = "../SC179_BoD_1";
	var rightFolder = "../SC179_HRH_1";
	var leftLandmarks = new Array();
	var rightLandamrks = new Array();

	var leftImages = new Array();
	var rightImages = new Array();

	function getLeftImagesCallback(event) {
		"use strict";

		if (event.target.responseText === "") {
			return;
		}

		var json = JSON.parse(event.target.responseText);

		jQuery.each(json.images, function () {
			leftImages.push("http://ec2-54-245-10-30.us-west-2.compute.amazonaws.com/~tbondwilkinson/"
						+ json.folder + this.src);
		});

		var leftCanvas = document.getElementById("leftCanvas");
		var leftImg = new Image();
		leftImg.src = leftFolder + leftImages.pop();
    	leftImg.onload = function() {
    		leftCanvas.width = window.innerWidth/2 - 2;
    		var scale = leftCanvas.width / leftImg.width;
    		leftCanvas.height = leftImg.height * scale;
    		$("#leftCanvas").drawImage({
    			layer: true,
    			source: leftImg.src,
    			x: 0,
    			y: 0,
    			fromCenter: false,
    			width: leftCanvas.width,
    			height: leftCanvas.height,
    			click: function(layer) {
    				var point = new Object();
    				point.x = Number(Math.round(layer.mouseX / scale));
    				point.y = Number(Math.round(layer.mouseY / scale));
    				leftLandmarks[leftLandmarks.length] = point;
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
	}

	function getRightImagesCallback(event) {
		"use strict";

		if (event.target.responseText === "") {
			return;
		}

		var json = JSON.parse(event.target.responseText);

		jQuery.each(json.images, function () {
			rightImages.push("http://ec2-54-245-10-30.us-west-2.compute.amazonaws.com/~tbondwilkinson/"
						+ json.folder + this.src);
		});

		var rightCanvas = document.getElementById("rightCanvas");

		var rightImg = new Image();
		rightImg.src = rightFolder + rightImages.pop();
    	rightImg.onload = function() {	
			rightCanvas.width = window.innerWidth/2 - 2;
    		var scale = rightCanvas.width / rightImg.width;
    		rightCanvas.height = rightImg.height * scale;
    		$("#rightCanvas").drawImage({
    			layer: true,
    			source: rightImg.src,
    			x: 0,
    			y: 0,
    			fromCenter: false,
    			width: rightCanvas.width,
    			height: rightCanvas.height,
    			click: function(layer) {
	    			var point = new Object();
	    			point.x = Number(Math.round(layer.mouseX / scale));
	    			point.y = Number(Math.round(layer.mouseY / scale));
	    			rightLandmarks[rightLandmarks.length] = point;
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
	}

	function nextImage(event) {


		$("#leftCanvas").clearCanvas();
		$("#rightCanvas").clearCanvas();

		var leftImg = new Image();
		leftImg.src = leftFolder + leftImages.pop();
    	leftImg.onload = function() {
    		var scale = leftCanvas.width / leftImg.width;
    		leftCanvas.height = leftImg.height * scale;
    		$("#leftCanvas").drawImage({
    			layer: true,
    			source: leftImg.src,
    			x: 0,
    			y: 0,
    			fromCenter: false,
    			width: leftCanvas.width,
    			height: leftCanvas.height,
    			click: function(layer) {
    				var point = new Object();
    				point.x = Number(Math.round(layer.mouseX / scale));
    				point.y = Number(Math.round(layer.mouseY / scale));
    				leftLandmarks[leftLandmarks.length] = point;
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
		rightImg.src = rightFolder + rightImages.pop();
    	rightImg.onload = function() {	
			rightCanvas.width = window.innerWidth/2 - 2;
    		var scale = rightCanvas.width / rightImg.width;
    		rightCanvas.height = rightImg.height * scale;
    		$("#rightCanvas").drawImage({
    			layer: true,
    			source: rightImg.src,
    			x: 0,
    			y: 0,
    			fromCenter: false,
    			width: rightCanvas.width,
    			height: rightCanvas.height,
    			click: function(layer) {
	    			var point = new Object();
	    			point.x = Number(Math.round(layer.mouseX / scale));
	    			point.y = Number(Math.round(layer.mouseY / scale));
	    			rightLandmarks[rightLandmarks.length] = point;
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
	}

	window.onload = function() {
		// Get the list of images that we will be landmarking from the server.
		xmlHttp = new XMLHttpRequest();
		xmlHttp.open("GET", "getImages.php?folder=" + leftFolder);
		xmlHttp.addEventListener("load", getLeftImagesCallback, false);
		xmlHttp.send(null);

		xmlHttp = new XMLHttpRequest();
		xmlHttp.open("GET", "getImages.php?folder=" + rightFolder);
		xmlHttp.addEventListener("load", getRightImagesCallback, false);
		xmlHttp.send(null);

    	document.onkeypress(nextImage);
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

