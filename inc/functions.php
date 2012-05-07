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

// News URL Formater
function news_form($description) {
  $description = preg_replace('#http://(player\.)?vimeo\.com/video/(\d+)#', '[vimeo=$2]', $description); # vimeo id
  $description = preg_replace('~[^\s]*youtube\.com[^\s]*?v=([-\w]+)~','[youtube=$1]', $description); # youtube id
  $description = preg_replace('~[[:alpha:]]+://[^<>[:space:]]+[[:alnum:]/]~','<a href=\"\\0\" target=\"_blank\">\\0</a>', $description); # Links klickbar machen
  $description = preg_replace('/\[vimeo\=(.+?)]/s','<iframe src="http://player.vimeo.com/video/$1" width="350" height="197" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>',$description); # vimeo frame
  $description = preg_replace('/\[youtube\=(.+?)]/s','<iframe width="350" height="197" src="http://www.youtube.com/embed/$1" frameborder="0" allowfullscreen></iframe>',$description); # youtube frame
  return $description;
}

?>
