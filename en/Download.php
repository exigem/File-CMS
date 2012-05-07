<!DOCTYPE html>
<html lang="en">
<head>
  <title><?= str_replace(".php","",basename($_SERVER['PHP_SELF'])) ?></title>
  <?php	include ("../config.php"); ?>
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
  <?php 
  
  ?>
    <h1><?= str_replace(".php","",basename($_SERVER['PHP_SELF'])) ?></h1>  
  
  <p>Here you will find the Link to GitHub.</p>
  <p><a href="https://github.com/exigem/File-CMS" target="_blank">File-CMS</a> &#64;github</p>
    
  </div>
  
  <div class="right cont_right shadowed">
    <p class="symbol">&#9759;</p>
  </div>
  
  </article>
  </div>


	<?php include ("../inc/footer.php"); ?>
</div>
</body>
</html>
