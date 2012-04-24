<!DOCTYPE html>
<html lang="de">
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

  <?php	include ("../inc/menu_de.php"); ?>
  <?php	include ("../inc/header.php"); ?>
 

  <div id="content">  
  <article>

    <div class="right cont_right shadowed">
      <p class="symbol">&#9784;</p>
    </div>

  <div class="left">
  
    <div class="team shadowed">
      <img class="hov" src="../inc/img/vaddi.png" alt="" /><br />
      <p>
        <b>Maik Vattersen</b><br /><br />
        Code und Design<br />
      </p>
    </div>

<!--    <div class="team shadowed">
      <img class="hov" src="../inc/img/subnetzero.jpg" alt="" /><br />
      <p>
        <b>Jan Marienfeldt</b><br /><br />
        Texte<br />
      </p>
    </div> -->

    <div class="team shadowed">
      <img class="hov" src="../inc/img/drjack.png" alt="" /><br />
      <p>
        <b>Gerhard Fabek</b><br /><br />
        Beta-Tester<br />
      </p>
    </div>
            
  </div>


  </article>
  </div>


	<?php include ("../inc/footer.php"); ?>
</div>
</body>
</html>
