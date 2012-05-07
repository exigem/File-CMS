<!DOCTYPE html>
<html lang="de">
<head>
  <title>Neuigkeiten</title>
  <?php	include ("../../config.php"); ?>
  <?php include ("../../inc/meta.php"); ?>
  
  <!-- icon -->
  <link rel="shortcut icon" href="../../inc/icons/favicon.ico" />
  <!-- styles -->
  <link type="text/css" rel="stylesheet" href="../../inc/css/style.css" />

</head>
<body>

<div id="wrap">

  <?php	include ("../../inc/menu_de.php"); ?>
  <?php	include ("../../inc/header.php"); ?>

  <div id="content">  
  <article>
  
  <?php
  
  // Some output variables
  $r1 = array("  ","\n");
  $r2 = array("&nbsp; ","<br />");
  
  if (isset($_REQUEST['archive'])) {
    $newswide = "archive";
  } else if (isset($_REQUEST['item'])) {
    $newswide = "item";
  } else {
    $newswide = "index";
  }
  ?>
  
  <div class="left shadowed news cont_<?php echo $newswide; ?>">
  <?php

  if (PHP_VERSION>='5') require_once('../../inc/domxml-php4-to-php5.php');
  include("../../config.php");
  include("../../inc/functions.php");

  $verzeichnis_raw = $lang.'/';
  
  // Wenn ein eintrag gewählt wurde zeigen wir diesen einzeln an
  if (isset($_REQUEST['item'])) {
  
    // Die vorletzte und nächste Datei finden als Link verwenden
    $file = $_REQUEST['item'];
    $verzeichnis_glob = glob($verzeichnis_raw . '*.xml');

    foreach ( $verzeichnis_glob as $key => $value) {
      if ($value == $verzeichnis_raw.$file) {
        if ($key < "0") {
          $key = $key +1;
      
        }

        $prev = $key -1;
        $next = $key +1;
       
        foreach ($verzeichnis_glob as $key2 => $value2) {
          if ($key2 == $prev) {
              $prev_url = str_replace($verzeichnis_raw, '', $value2);
              $xml = domxml_open_file($value2);    
              $root = $xml->root();
              $prev_array = $root->get_elements_by_tagname("title");    
              $prev_name = extractText($prev_array);
              
          } 
          if ($key2 == $next) {
              $next_url = str_replace($verzeichnis_raw, '', $value2);
              $xml = domxml_open_file($value2);    
              $root = $xml->root();
              $next_array = $root->get_elements_by_tagname("title");    
              $next_name = extractText($next_array);
          }
        }
      }
    }
    
    
    $file = $verzeichnis_raw . $_REQUEST['item'];
    
    $open = $file;    
    $xml = domxml_open_file($open);    
   
    $root = $xml->root();

    $stat_array = $root->get_elements_by_tagname("status");    
    $status = extractText($stat_array);    
 
    $headline_array = $root->get_elements_by_tagname("title");    
    $headline = extractText($headline_array);
 
    $authors_array = $root->get_elements_by_tagname("authors");    
    $authors = extractText($authors_array);
 
    $desc_array = $root->get_elements_by_tagname("description");
    $description = extractText($desc_array);
#    $description = htmlspecialchars("$description", ENT_NOQUOTES, "UTF-8");
    // Replace Linebreaks
    $description = str_replace( $r1, $r2, $description );
    // Replace vimeo, youtube and urls
    $description = news_form($description);
    
    $date = date('d M. Y H:i \\U\\h\\r', filemtime($file));
    $newsurl = str_replace($verzeichnis_raw,"",$file);
   
    if ($status != "online") {    
      continue;    
    }
    
    echo '    <ul id="news">';
    
    echo '      <li>';
    
    // Pagination
    echo '        <span class="pagination">';
    if (!empty($prev_url)) { 
      echo '<a href="index.php?item='. $prev_url .'" class="button" title="'. $prev_name.'">«</a> '; } 
    echo '<a href="index.php" class="button">Zur&uuml;ck zur &Uuml;bersicht</a>';
    if (!empty($next_url)) { echo ' <a href="index.php?item='. $next_url .'" class="button" title="'. $next_name.'">»</a>'; } 
    echo '      </span>';

    echo '        <span class="date">'.$date.'</span> ';
    echo '        <h2>'.$headline."</h2>\n";
    echo '        <p class="boldfirst">'.$description."</p>\n";
    echo '      </li>';
    echo '    </ul>';
    echo '    <div class="right bkbtn"><a href="'.$_SERVER['SCRIPT_NAME'].'" class="button">Zur&uuml;ck</a> </div>';
            
  } else {
  
    // Anzeigen der letzen x News
    if (NEWS_ARCHIVE == "1") {
      if (isset($_REQUEST['archive'])) {
        $maxnews = NEWS_ARCHIVE_MAX;
      } else {
        $maxnews = MAXNEWS; 
      } 
    } else {
      $maxnews = MAXNEWS;
    }
    
    // Get all Elements by glob
    $verzeichnis_glob = glob($verzeichnis_raw . '*.xml', GLOB_NOSORT);
    array_multisort(array_map('filemtime', $verzeichnis_glob), SORT_NUMERIC, SORT_DESC, $verzeichnis_glob);
  
    echo '<ul id="news">';
  
    foreach($verzeichnis_glob as $key => $file) {
    
      $open = $file;    
      $xml = domxml_open_file($open);    
   
      $root = $xml->root();    

      $stat_array = $root->get_elements_by_tagname("status");    
      $status = extractText($stat_array);    
 
      $headline_array = $root->get_elements_by_tagname("title");    
      $headline = extractText($headline_array);
 
      $authors_array = $root->get_elements_by_tagname("authors");    
      $authors = extractText($authors_array);
 
      $desc_array = $root->get_elements_by_tagname("description");
      $description = extractText($desc_array);
      $description = trim_text($description, 200, $ellipses = true, $strip_html = true);
      // Replace Linebreaks
      $description = str_replace( $r1, $r2, $description );
      // Replace vimeo, youtube and urls
      $description = news_form($description);
      
      $date = date('d M. Y H:i \\U\\h\\r', filemtime($file)); // Normal Format
      $newsurl = str_replace($verzeichnis_raw,"",$file);
   
      if ($status != "online"){    
        continue;    
      }
    
      if ($key >= $maxnews){    
        continue;    
      }    
    
      echo '  <li>'."\n";
      echo '      <span class="date">'.$date.'</span> ';
      echo '      <a href="'.$_SERVER['SCRIPT_NAME'].'?item='.$newsurl.'">'.$headline."</a>\n";
      echo '        <p class="boldfirst">'.$description."</p>\n";
      echo '    </li>'."\n";
    }
    echo '</ul>';
    if (NEWS_ARCHIVE == "1") {
      if (isset($_REQUEST['archive'])) {
        echo '    <div class="right bkbtn"><a href="'.$_SERVER['SCRIPT_NAME'].'" class="button">Zur&uuml;ck</a> </div>';
      } else {
        echo '    <div class="right bkbtn"><a href="'.$_SERVER['SCRIPT_NAME'].'?archive=all" class="button">&Auml;ltere</a> </div>';
      }
    } 
  }
  ?> 
  </div>
  
  <div class="right cont_right shadowed">
    <p class="symbol">&#9920;</p>
  </div>
  
  </article>
  </div>


	<?php include ("../../inc/footer.php"); ?>
</div>
</body>
</html>
