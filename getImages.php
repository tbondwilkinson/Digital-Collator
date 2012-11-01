<?php
session_start();

$dir = scandir($_GET['folder']);

$images = array("folder" => $_GET['folder']);

$imageSrcs = array();

foreach($dir as $value) {
	echo $value;
	if (preg_match("/\.jpg$/i", $value)) {
		array_push($imgSrcs, $value);
		echo "WE FOUND A MATCH!!!";
	}
}

array_push($images, $imageSrcs);

echo json_encode($images);

exit;
?>