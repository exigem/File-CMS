<?php
session_start();
?>
<!DOCTYPE html>
<html lang="de">
<head>
  <title>Film</title>
  <?php	include ("../config.php"); ?>
  <?php include ("../inc/meta.php"); ?>
  
  <!-- icon -->
  <link rel="shortcut icon" href="../inc/icons/favicon.ico" />
  <!-- styles -->
  <link type="text/css" rel="stylesheet" href="../inc/css/style.css" />

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



<form name="login" method="post" action="verify.php" id="createArticle">
<table width="290" border="0" align="center" cellpadding="4" cellspacing="1">
    <tr> 
      <td colspan="2"><div align="left">Bitte Anmelden</div> 
      </td>
    </tr>
    <tr> 
      <td colspan="2"><div align="left"> 
          <input name="username" type="text" id="username" placeholder="Benutzername" />
        </div></td>
    </tr>
    <tr> 
      <td colspan="2"><div align="left"> 
          <input name="password" type="password" id="password" placeholder="Passwort" />
        </div></td>
    </tr>
    <tr> 
      <td colspan="2"><div align="left" style="margin:10px 0 0 0;"> 
          <input class="button" type="submit" name="Submit" value="Anmelden" />
           
          <input class="button" type="reset" name="reset" id="reset" value="Zur&uuml;cksetzen" />
        </div></td>
    </tr>

	<tr>
	<td colspan=2 align=center>
	<?php echo $_SESSION["error"]; ?>
	</td>

  </table>
</form>

<div class="right bkbtn"><a href="../index.php">Zur&uuml;ck</a> </div>

</div>
</article>
</div>  <!-- close #content --> 
	<?php include ("../inc/footer.php"); ?>
</div>
</body>
</html>
