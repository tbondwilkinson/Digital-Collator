<!DOCTYPE html>
<html>
<head>
	<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/themes/start/jquery-ui.css" type="text/css" rel="Stylesheet" />
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.9.0/jquery-ui.min.js"></script>
	<script src="jcanvas.min.js"></script>

	<script type='text/javascript'>
	var leftFolder = "SC179_BoD_1/";
	var rightFolder = "SC179_HRH_1/";
	var leftLandmarks = new Array();
	var rightLandmarks = new Array();

	var leftImages = new Array();
	var rightImages = new Array();
	var leftCanvas;
	var rightCanvas;

	function getLeftImagesCallback(event) {
		"use strict";

		if (event.target.responseText === "") {
			return;
		}

		var json = JSON.parse(event.target.responseText);

		jQuery.each(json.images, function () {
			leftImages.push("http://ec2-54-245-10-30.us-west-2.compute.amazonaws.com/~tbondwilkinson/" + leftFolder + this);
		});

		leftCanvas = document.getElementById("leftCanvas");
		
		drawImages($("#leftCanvas"), leftCanvas, leftImages, leftLandmarks);
	}

	function getRightImagesCallback(event) {
		"use strict";

		if (event.target.responseText === "") {
			return;
		}

		var json = JSON.parse(event.target.responseText);

		jQuery.each(json.images, function () {
			rightImages.push("http://ec2-54-245-10-30.us-west-2.compute.amazonaws.com/~tbondwilkinson/"
						+ rightFolder + this);
		});

		rightCanvas = document.getElementById("rightCanvas");

		drawImages($("#rightCanvas"), rightCanvas, rightImages, rightLandmarks);
	}

	function finishLandmarks(landmarksArray) {
		$.post("finishLandmarks.php", landmarksArray.serialize());
	}

	function drawImages(jcanvas, canvas, imageArray, landmarksArray) {
		var img = new Image();
		if (imageArray.length == 0) {
			finishLandmarks(landmarksArray);
		}
		img.src = imageArray.pop();
		landmarksArray.push(new Array());
    	img.onload = function() {
    		var scale = canvas.width / img.width;
    		canvas.height = img.height * scale;
    		jcanvas.drawImage({
    			layer: true,
    			source: img.src,
    			x: 0,
    			y: 0,
    			fromCenter: false,
    			width: canvas.width,
    			height: canvas.height,
    			click: function(layer) {
    				var point = new Object();
    				point.name = img.src.substring(img.src.lastIndexOf("/") + 1);
    				point.x = Number(Math.round(layer.mouseX / scale));
    				point.y = Number(Math.round(layer.mouseY / scale));
    				landmarksArray[landmarksArray.length - 1].push(point);
    				jcanvas.drawLine({
    					layer: true,
    				  	strokeStyle: "red",
    				  	strokeWidth: 1,
    				  	x1: layer.mouseX - 5, y1: layer.mouseY,
    				  	x2: layer.mouseX + 5, y2: layer.mouseY
    				});
    				jcanvas.drawLine({
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

	var nextImage = function(event) {
		if (event.keyCode !== 39) {
			return true;
		}

		$("#leftCanvas").clearCanvas();
		$("#rightCanvas").clearCanvas();

		drawImages($("#leftCanvas"), leftCanvas, leftImages, leftLandmarks);
		drawImages($("#rightCanvas"), rightCanvas, rightImages, rightLandmarks);

    	return false;
	}

	window.onload = function() {
		// Get the list of images that we will be landmarking from the server.
		xmlHttp = new XMLHttpRequest();
		xmlHttp.open("GET", "getImages.php?folder=../" + leftFolder);
		xmlHttp.addEventListener("load", getLeftImagesCallback, false);
		xmlHttp.send(null);

		xmlHttp = new XMLHttpRequest();
		xmlHttp.open("GET", "getImages.php?folder=../" + rightFolder);
		xmlHttp.addEventListener("load", getRightImagesCallback, false);
		xmlHttp.send(null);

		leftCanvas = document.getElementById("leftCanvas");
		leftCanvas.width = window.innerWidth/2 - 2;
		rightCanvas = document.getElementById("rightCanvas");
		rightCanvas.width = window.innerWidth/2 - 2;

		if ($.browser.mozilla) {
		    $(document).keypress(nextImage);
		} else {
		    $(document).keydown(nextImage);
		}
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

