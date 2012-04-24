<?php

$base = ABS_BASE;
$base_sub = REL_BASE;
$lang = "en";

$dir_var = $base . $base_sub . "/". $lang . "/";
$dir = $dir_var . "*";  
$folder_var = glob($dir, GLOB_NOSORT);
array_multisort(array_map('filemtime', $folder_var), SORT_NUMERIC, SORT_DESC, $folder_var);
$folder = $folder_var;

echo "\n<nav>\n";
echo "  <ul>\n";

if (MENU_HOME == "1") {
  echo '    <li class="hov"><a href="'.BASE.'index.php">Home</a> </li>'."\n";
}

foreach($folder_var as $file)  
{  
  // Get the rawnames
  $base_var = $dir_var;
  $purename_var = str_replace($base_var,"",$file);
  $lang_var = $lang . "/";
  $purename = str_replace($lang_var,"",$purename_var);
  $name = str_replace(".php","",$purename);
  
  // get the url
  $url_var = $base ;
  $url = str_replace($url_var,"",$file);
  
  // get active
  $url_curr = str_replace("/index.php","",$_SERVER['SCRIPT_NAME']);
  if ($url == $url_curr) {
    echo '    <li class="curr hov"><a href="'.$url.'">'.$name.'</a> </li>'."\n";
  } else {
    echo '    <li class="hov"><a href="'.$url.'">'.$name.'</a> </li>'."\n";
  }
  
  
}  

echo "  </ul>\n";
echo "</nav>\n";


?>
