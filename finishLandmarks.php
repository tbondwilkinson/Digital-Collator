<?php

$leftLandmarks = json_decode($_POST['leftLandmarks']);
$rightLandmarks = json_decode($_POST['rightLandmarks']);

print_r($leftLandmarks);

for($i = 0; $i < count($leftLandmarks); $i++) {
	if (empty($leftLandmarks[$i])) {
		continue;
	}
	$scanName = "landmarkFiles/" . substr_replace($leftLandmarks[$i][0]->name, "txt", -3);
	$file = fopen($scanName, 'w') or die("Cannot open file");
	$topOfFile = "Index\txSource\tySource\txTarget\tyTarget\n";
	fwrite($file, $topOfFile);
	for ($j = 0; $j < count($leftLandmarks[$i]); $j++) {
		$landmark = "" . $j . "\t" . $leftLandmarks[$i][$j]->x . "\t" . $leftLandmarks[$i][$j]->y . 
			"\t" . $rightLandmarks[$i][$j]->x . "\t" . $leftLandmarks[$i][$j]->y . "\n";
		fwrite($file, $landmark);
		fclose($file);
	}
}

exit;
?>