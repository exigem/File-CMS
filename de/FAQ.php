<!DOCTYPE html>
<html lang="de">
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

  <?php	include ("../inc/menu_de.php"); ?>
  <?php	include ("../inc/header.php"); ?>
 

  <div id="content">  
  <article>
    
    <div class="left cont_left shadowed">
      <h1>&Uuml;ber <?= SITE_NAME ?></h1>
      <p><?= SITE_NAME ?> basiert auf Dateien und generiert daraus den Inhalt der Seiten und die Newseinträge.</p>
      <p>Zur Zeit befindet sich das System noch in einer frühen Entwicklungsphase. Wir arbeiten jedoch kontinuierlich an der Erweiterung und Aktualität. </p>
      <p>Hintergrundbild von <a href="http://www.subtlepatterns.com/">www.subtlepatterns.com</a></p>
      <h1>Features</h1>
      <ul id="news">
        <li>Datei basierend</li>
        <li>Keine extra Datenbank (NoSQL)</li>
        <li>Automatische Menu generierung aus den Dateinamen (inkl. Ordner)</li>
        <li>Automatische News und Feeds generierung aus xml Dateien (inkl. Vimeo, YouTube und normale URLs)</li>
        <li>Mehrsprachiger Seitenaufbau durch einfachen Aufbau</li>
        <li>Einfaches Theme erstellung mittels css Datei</li>
        <li>&nbsp;</li>
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
