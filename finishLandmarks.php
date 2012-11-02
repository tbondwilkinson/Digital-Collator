<?php

$leftLandmarks = json_decode($_POST['leftLandmarks']);
$rightLandmarks = json_decode($_POST['rightLandmarks']);

print_r($leftLandmarks);

for($i = 0; $i < count($leftLandmarks); $i++) {
	$scanName = $leftLandmarks[$i][0]->name;
	$file = fopen($scanName, 'w') or die("Cannot open file");
	$topOfFile = "Index\txSource\tySource\txTarget\tyTarget";
	fwrite($file, $topOfFile);
	for ($j = 0; $j < count($leftLandmarks[$i]); $j++) {
		fwrite($file, $j . "\t" . $leftLandmarks[$i][$j]->x . "\t" . $leftLandmarks[$i][$j]->y . 
			"\t" . $rightLandmarks[$i][$j]->x . "\t" $leftLandmarks[$i][$j]->y);
		fclose($file);
	}
}

exit;
?>