<?php
/* Script Base by David Zimmerman http://www.dizzysoft.com/

Recoded by Maik Vattersen http://www.exigem.com/vaddi/

Please feel free to use as long as you give me credit and understand there is no warranty that comes with this script. */

if (PHP_VERSION>='5') require_once('inc/domxml-php4-to-php5.php');
include("config.php");
include("inc/functions.php");
include("inc/feedcreator.class.php");

$sekunden = "10";
//$file = "error.log";
$max = NEWS_FEED_MAX; // max number of entries

$url= 'http://'.$_SERVER['HTTP_HOST'];
$url.= substr($_SERVER['REQUEST_URI'], 0, strrpos($_SERVER['REQUEST_URI'],'/')+1);
$url_raw = str_replace("inc/","",$url);

if(isset($_REQUEST['type'])) {
  $request = $_REQUEST['type'];
} else {
  $request = "";

?><!DOCTYPE html>
<html lang="de">
<head>
  <?php 
    include ("config.php");
    include ("inc/meta.php"); 
  ?>
  
  <!-- icon -->
  <link rel="shortcut icon" href="inc/icons/favicon.ico" />
  <!-- styles -->
  <link type="text/css" rel="stylesheet" href="inc/css/style.css" />
  <script type="text/javascript" src="inc/js/uhr.js"></script>
  <noscript><meta http-equiv="refresh" content="<?php echo $sekunden; ?>; url=<?php echo $_SERVER['SCRIPT_NAME']; ?>?type=<?php echo DEFAULT_FEED; ?>" /></noscript>
  
<style type="text/css">

#content {
  min-height: 457px;
}
</style>
<title>Newsfeeds</title>

<script type="text/javascript">
<!--
sek=<?php echo $sekunden; ?>;
function countdown(){
sek--;
document.getElementById('zaehler').innerHTML=sek;
if(sek>0)setTimeout('countdown()',1000);
else location.href='<?php echo $_SERVER["SCRIPT_NAME"] ; ?>?type=<?php echo DEFAULT_FEED ; ?>';
}
//-->
</script>

</head>
<body onload="countdown()">

<div id="wrap">

  <nav>
    <ul>
      <li>&nbsp;</li>
    </ul>
  </nav>

  <?php	include ("inc/header.php"); ?>

  <div id="content">  
  <article>
  
  <div class="main_index shadowed" style="padding:20px 0;">
    <div>
      <ul class="language" style="list-style:none;text-align:left;">
      <li><a href="<?php echo $_SERVER['SCRIPT_NAME'] ; ?>?type=atom">
        <img src="inc/img/icons/feed.png" alt="" width="22" height="22" /> Atom 1 Feeds</a></li>
      <li><a href="<?php echo $_SERVER['SCRIPT_NAME'] ; ?>?type=atom0">
        <img src="inc/img/icons/feed.png" alt="" width="22" height="22" /> Atom 0.3 Feeds</a></li>
      <li><a href="<?php echo $_SERVER['SCRIPT_NAME'] ; ?>?type=rss2">
        <img src="inc/img/icons/feed.png" alt="" width="22" height="22" /> RSS 2 Feeds</a></li>
      <li><a href="<?php echo $_SERVER['SCRIPT_NAME'] ; ?>?type=rss">
        <img src="inc/img/icons/feed.png" alt="" width="22" height="22" /> RSS 1 Feeds</a></li>

      </ul>
      
    </div>
  </div>

  <p style="text-align:center;text-shadow:2px 2px 0 #000;">In <span id="zaehler"><noscript>wenigen</noscript></span> Sekunden werden Sie auf den Standardfeed <b><?php echo DEFAULT_FEED; ?></b> weiter geleitet.</p>

  </article>
  </div>
  
  
	<?php include ("inc/footer.php");	?>
</div>

</body>
</html>


<?php
}

// if ( empty($request) ) {}

$rss = new UniversalFeedCreator();
$rss->useCached();
$rss->link = BASE . "de/Neuigkeiten/index.php";
$rss->syndicationURL = BASE . $PHP_SELF;

$image = new FeedImage();
$image->title = BASE . " logo";
$image->url = BASE . "inc/img/icons/feed.png";
$image->link = BASE;
$image->description = "Newsfeed von " . BASE . ". Klicken zum besuchen.";

$verzeichnis_raw = 'de/Neuigkeiten/de/' ;
$verzeichnis_glob = glob($verzeichnis_raw . '*.xml' , GLOB_NOSORT);
array_multisort(array_map('filemtime', $verzeichnis_glob), SORT_NUMERIC, SORT_DESC, $verzeichnis_glob);
$fileCount = 0;


//
// RSS v2
//

if (preg_match("/rss2/i",$request) || 
    preg_match("/RSS2/i",$request) || 
    preg_match("/rss2.xml/i",$request) || 
    preg_match("/RSS2.xml/i",$request) ) {

  $rss->title = BASE . " RSS 2 Feeds";
  $rss->description = "Der RSS 2 Newsfeed von " . BASE;
  
  $rss->image = $image;
  
  foreach($verzeichnis_glob as $key => $file) {
  
    // Get Info from each file
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
    $description = trim_text($description, 320, $ellipses = true, $strip_html = false);

    if ($status != "online"){    
      continue;    
    }

    // Create one Item
    $item = new FeedItem();
    $item->title = $headline;
    $item->link = $url_raw.str_replace($verzeichnis_raw,"de/Neuigkeiten/index.php?item=",$open);
    $description = preg_replace("~[[:alpha:]]+://[^<>[:space:]]+[[:alnum:]/]~","<a href=\"\\0\" target=\"_blank\">\\0</a>", $description); # Links klickbar machen
    $item->description = $description;
    $item->descriptionHtmlSyndicated = true;
    $item->date = date('r', filemtime($open));
    $item->source = $url_raw;
    $item->author = $authors;
    
    $rss->addItem($item);

    $fileCount++;
    
  }
  // close foreach
  
} else 


//
// RSS v1 
//

if ( preg_match("/rss/i", $request) || 
     preg_match("/RSS/i",$request) ||
     preg_match("/rss.xml/i",$request) || 
     preg_match("/RSS.xml/i",$request) ) {

  $rss->title = BASE . " RSS Feeds";
  $rss->description = "Der RSS Newsfeed von " . BASE;
  
  $rss->image = $image;

  foreach($verzeichnis_glob as $key => $file) {
  
    // Get Info from each file
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
    $description = trim_text($description, 320, $ellipses = true, $strip_html = true);

    if ($status != "online"){    
      continue;    
    }

    // Create one Item
    $item = new FeedItem();
    $item->title = $headline;
    $item->link = $url_raw.str_replace($verzeichnis_raw,"de/Neuigkeiten/index.php?item=",$open);
    $description = preg_replace("~[[:alpha:]]+://[^<>[:space:]]+[[:alnum:]/]~","<a href=\"\\0\" target=\"_blank\">\\0</a>", $description); # Links klickbar machen
    $item->description = $description;
    $item->descriptionHtmlSyndicated = true;
    $item->date = date('r', filemtime($open));
    $item->source = $url_raw;
    $item->author = $authors;
    
    $rss->addItem($item);

    $fileCount++;
    
  }
  // close foreach

} 


//
// Atom Feed 
// 

if (preg_match("/atom/i",$request) || 
    preg_match("/ATOM/i",$request) || 
    preg_match("/Atom/i",$request) || 
    preg_match("/atom.xml/i",$request) || 
    preg_match("/ATOM.xml/i",$request) || 
    preg_match("/Atom.xml/i",$request) ) {

  // create root node
  
  $rss->title = BASE . " Atom Feeds";
  $rss->description = "Der Atom Newsfeed von ". BASE;

  $rss->image = $image;

  foreach($verzeichnis_glob as $key => $file) {

    // Get Info from each file
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
    //$description = preg_replace($bbcode_regex, $bbcode_replace, $description);
    $description = trim_text($description, 320, $ellipses = true, $strip_html = true);

    if ($status != "online"){    
      continue;    
    }

    // Create Item
    
    $item = new FeedItem();
    $item->title = $headline;
    $item->link = $url_raw.str_replace($verzeichnis_raw,"de/Neuigkeiten/index.php?item=",$open);
    $description = preg_replace("~[[:alpha:]]+://[^<>[:space:]]+[[:alnum:]/]~","<a href=\"\\0\" target=\"_blank\">\\0</a>", $description); # Links klickbar machen
    $item->description = $description;
    $item->descriptionHtmlSyndicated = true;
    $item->date = date('r', filemtime($open));
    $item->source = $url_raw;
    $item->author = $authors;
    
    $rss->addItem($item);
    
    $fileCount++;

  }

  // close foreach
  
} 

if (preg_match("/rss2/i",$request) || 
    preg_match("/RSS2/i",$request) || 
    preg_match("/rss2.xml/i",$request) || 
    preg_match("/RSS2.xml/i",$request) ) {
      echo $rss->outputFeed("RSS2.0");
    } else if ( preg_match("/rss/i", $request) || 
    preg_match("/RSS/i",$request) ||
    preg_match("/rss.xml/i",$request) || 
    preg_match("/RSS.xml/i",$request) || 
    !empty($request) ) {
      echo $rss->outputFeed("RSS");
    } else if ($_REQUEST['type'] == 'atom') {
	    echo $rss->outputFeed("ATOM1.0"); 
    } else if ($_REQUEST['type'] == 'atom0'){
	    echo $rss->outputFeed("ATOM0.3"); 
    }

?>
