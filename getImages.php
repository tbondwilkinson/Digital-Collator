<?php
session_start();

$dir = scandir($_GET['folder']);

$images = array("folder" => $_GET['folder']);

$imageSrcs = array();

foreach($dir as $value) {
	echo $value;
	if (preg_match("jpg$", $value)) {
		$imagesSrcs[] = $value;
	}
}

$images[] = $imageSrcs;

echo json_encode($images);

exit;
?>