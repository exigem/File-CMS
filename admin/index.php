<?php
session_start();

if ($_SESSION["login"] != "true"){
	header("Location:login.php");
	$_SESSION["error"] = "<font color=red>Sie haben nicht die erforderlichen Rechte f&uuml;r die Adminseite</font>";
exit;
}

 
?>
<!DOCTYPE html>
<html lang="de">
<head>
  <title>Admin &Uuml;bersicht</title>
  <?php	include ("../config.php"); ?>
  <?php include ("../inc/meta.php"); ?>
  
  <!-- icon -->
  <link rel="shortcut icon" href="../inc/icons/favicon.ico" />
  <!-- styles -->
  <link type="text/css" rel="stylesheet" href="../inc/css/style.css" />
  <script type="text/javascript" src="../inc/js/uhr.js"></script>
<style type="text/css">

#content {
  min-height: 502px;
}
</style>
</head>
<body>

<div id="wrap">

  <nav>
    <ul>
      <li>&nbsp;</li>
    </ul>
  </nav>
  
  <?php	include ("../inc/header.php"); ?>

  <div id="content"> 
  <article>
  
  <div class="left cont_left shadowed news">
  <div style="padding:5px 10px;">
    <h2><img src="../inc/img/icons/de_flag.png" alt="" width="22" height="22" /> Deutsch</h2>
    
    <p>Seiten</p>
    <ul>
    <?php	
    $base = ABS_BASE;
    $base_sub = REL_BASE;
    $lang = DEFAULT_LANGUAGE;

    $dir_var = $base . $base_sub . "/". $lang . "/";
    $dir = $dir_var . "*";  
    $folder_var = glob($dir, GLOB_NOSORT);

    foreach($folder_var as $file) {
      $fileuri = str_replace($base,"",$file);
      echo '<li><a href="'.$fileuri.'">'.$fileuri.'</a><br /></li>';
    }
    ?>
    </ul>

    <p>Neuigkeiten</p>
    <ul>
    <?php	
    $base_sub = REL_BASE . "/". $lang . "/Neuigkeiten";

    $dir_var = $base . $base_sub . "/". $lang . "/";
    $dir = $dir_var . "*";  
    $folder_var = glob($dir, GLOB_NOSORT);

    foreach($folder_var as $file) {
      $fileuri = str_replace($base,"",$file);
      echo '<li><a href="'.$fileuri.'">'.$fileuri.'</a><br /></li>';
    }
    $lang = DEFAULT_LANGUAGE;
    ?>
    </ul>

  </div>
  </div>
  
  <div class="right cont_right shadowed">
  <div style="padding:5px 10px;">
        <h2><img src="../inc/img/icons/en_flag.png" alt="" width="22" height="22" /> Englisch</h2>
    
    <p>Pages</p>
    <ul>
    <?php	
    $base = ABS_BASE;
    $base_sub = REL_BASE;
    $lang = "en";

    $dir_var = $base . $base_sub . "/". $lang . "/";
    $dir = $dir_var . "*";  
    $folder_var = glob($dir, GLOB_NOSORT);

    foreach($folder_var as $file) {
      $fileuri = str_replace($base,"",$file);
      echo '<li><a href="'.$fileuri.'">'.$fileuri.'</a><br /></li>';
    }
    ?>
    </ul>

    <p>News</p>
    <ul>
    <?php	
    $base_sub = REL_BASE . "/". $lang . "/News";

    $dir_var = $base . $base_sub . "/". $lang . "/";
    $dir = $dir_var . "*";  
    $folder_var = glob($dir, GLOB_NOSORT);

    foreach($folder_var as $file) {
      $fileuri = str_replace($base,"",$file);
      echo '<li><a href="'.$fileuri.'">'.$fileuri.'</a><br /></li>';
    }
    
    // Reset Language to default
    $lang = DEFAULT_LANGUAGE;
    
    ?>
    </ul>
  
  </div>
  </div>
  
  </article>
  </div>
	<?php include ("../inc/footer.php"); ?>
</div>
</body>
</html>
