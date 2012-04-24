<!DOCTYPE html>
<html lang="en">
<head>
  <?php	include ("../config.php"); ?>
  <title><?= str_replace(".php","",basename($_SERVER['PHP_SELF'])) ?></title>
  <?php include ("../inc/meta.php"); ?>
  
  <!-- icon -->
  <link rel="shortcut icon" href="../inc/icons/favicon.ico" />
  <!-- styles -->
  <link type="text/css" rel="stylesheet" href="../inc/css/style.css" />

</head>
<body>

<div id="wrap">

  <?php	include ("../inc/menu_en.php"); ?>
  <?php	include ("../inc/header.php"); ?>
 

  <div id="content">  
  <article>
    
    <div class="left cont_left shadowed">
      <h1>About <?= SITE_NAME ?></h1>
      <p><?= SITE_NAME ?> basiert auf Dateien und generiert daraus den Inhalt der Seiten und die Newseinträge.</p>
      <p>Zur Zeit befindet sich das System noch in einer frühen Entwicklungsphase. Wir arbeiten jedoch kontinuierlich an der Erweiterung und Aktualität. </p>
      
      <h1>Features</h1>
      <ul id="news">
        <li>File based</li>
        <li>No extra Database (NoSQL)</li>
        <li>Automatic menu generation from filenames (inkl. Subfolders)</li>
        <li>Automatic generated feedsfrom News posts.</li>
        <li>Multilanguage support</li>
        <li>Simple Themeable by css</li>
        <li></li>
      </ul>
      
    </div>
    
    <div class="right cont_right shadowed">
      <p class="symbol">?</p>
      
    </div>
    
  </article>
  </div>


	<?php include ("../inc/footer.php"); ?>
</div>
</body>
</html>
