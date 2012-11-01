<?php
session_start();

$dir = scandir($_GET['folder']);

$images = array("folder" => $_GET['folder']);

$imageSrcs = arary();

foreach($dir as $value) {
	if (preg_match("/jpg$/i", subject)) {
		$imagesSrcs[] = $value;
	}
}

$images[] = $imageSrcs;

echo json_encode($images);

exit;
?>