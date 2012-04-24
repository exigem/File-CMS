<!DOCTYPE html>
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
<style type="text/css">

#content {
  min-height: 357px;
}
</style>
<title><?php echo SITE_NAME; ?></title>

</head>
<body>

<div id="wrap">

  <nav>
    <ul>
      <li>&nbsp;</li>
    </ul>
  </nav>

  <?php	include ("inc/header.php"); ?>

  <div id="content">  
  <article>
  
  <div class="main_greater">
    <h1><?php echo SITE_NAME; ?></h1>
    <p><?php echo SITE_DESCRIPTION; ?></p>
  </div>
  
  <div class="main_index shadowed">
    <div>
      <p class="language">

      <a href="en/News/">
        <img src="inc/img/icons/en_flag.png" alt="" width="22" height="22" class="lang_flag" /> English</a>
        <br /><br />
      <a href="de/Neuigkeiten/">
        <img src="inc/img/icons/de_flag.png" alt="" width="22" height="22" class="lang_flag" /> Deutsch</a>

      </p>
      
    </div>
  </div>


  </article>
  </div>
  
  
	<?php include ("inc/footer.php");	?>
</div>

</body>
</html>
