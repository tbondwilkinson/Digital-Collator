<?php
session_start();

$dir = scandir($_GET['folder']);

$images = array("folder" => $_GET['folder']);

$imageSrcs = array();

foreach($dir as $value) {
	echo $value + "\n";
	if (preg_match("/\.jpg$/i", $value)) {
		$imagesSrcs[] = $value;
		echo "WE FOUND A MATCH!!!";
	}
}

$images[] = $imageSrcs;

echo json_encode($images);

exit;
?>