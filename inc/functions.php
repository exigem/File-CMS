<?php

//this is a very simple, potentially very slow search
function extractText($array){
	if(count($array) <= 1){
		//we only have one tag to process!
		$value = "";
		for ($i = 0; $i<count($array); $i++){
			$node = $array[$i];
			$value = $node->get_content();
		}
		return $value;
	} 
}

// Simple trim Text
function trim_text($input, $length, $ellipses = true, $strip_html = true) {
	//strip tags, if desired
	if ($strip_html) {
		$input = strip_tags($input);
	}
 
	//no need to trim, already shorter than trim length
	if (strlen($input) <= $length) {
		return $input;
	}
 
	//find last space within length
	$last_space = strrpos(substr($input, 0, $length), ' ');
	$trimmed_text = substr($input, 0, $last_space);
 
	//add ellipses (...)
	if ($ellipses) {
		$trimmed_text .= '...';
	}
 
	return $trimmed_text;
}


?>
