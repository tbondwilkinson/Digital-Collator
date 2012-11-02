<?php

$dir = scandir($_GET['folder']);

$images = array("folder" => $_GET['folder']);

$imageSrcs = array();

foreach($dir as $value) {
	if (preg_match("/\.jpg$/i", $value)) {
		array_push($imageSrcs, $value);
	}
}

$images["images"] = array_reverse($imageSrcs);

echo json_encode($images);

exit;
?>