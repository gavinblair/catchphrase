<?php

if($_POST && $_POST['q']) {
	$word = "";
	$text = file_get_contents("media/words.txt");
	if($_POST['q'] != "Everything" && $_POST['q'] != "null" && $_POST['q'] != "0") {
		//category
		$parts = explode("#".$_POST['q']."\n", $text);
		$text = $parts[1];
		$parts = explode("#", $text);
		$text = $parts[0];
		$lines = explode("\n", $text);
	} else {
		//everything
		$parts = explode("\n", $text);
		foreach($parts as $k => $v) {
			if(substr($v, 0, 1) == "#") {
				unset($parts[$k]);
			}
		}
		$lines = $parts;
	}
	foreach($lines as $key => $value) {
		if(strlen(trim($value)) == 0) {
			unset($lines[$key]);
		}
	}
	shuffle($lines);
	echo $lines[0];
} else if(!$_POST){
	//list categories
	$cats = array('Everything');
	$text = file_get_contents("media/words.txt");
	$lines = explode("\n", $text);
	foreach($lines as $line) {
		if(substr($line, 0, 1) == "#") {
			$line = ltrim($line, "#");
			$cats[$line] = $line;
		}
	}
	echo json_encode($cats);
}
exit();