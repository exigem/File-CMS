<?php 
error_reporting(E_ALL ^ E_NOTICE); // hide all basic notices from PHP

session_start();
?>
<!DOCTYPE html>
<html lang="de">
<head>
  <title><?= str_replace(".php","",basename($_SERVER['PHP_SELF'])) ?></title>
  <?php 
    include ("../config.php");
    include ("../inc/meta.php"); 

  
  ?>
  
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
<?php 

$sessionstringnew = null;
$sessionstringadd = null;
if (!isset($_COOKIE[session_name()])) {
    $sessionstringnew = '?' . session_name() . "=" . session_id();
    $sessionstringadd = '&amp;' . session_name() . "=" . session_id();
}

$valid = sha1(trim(strip_tags(strtoupper($_POST['code']))));
$revalid = $_SESSION['P91Captcha_code'];

$r1 = array("Ä","ä","Ü","ü","Ö","ö","ß","@","€","\$","’");
$r2 = array("Ae","ae","Ue","ue","Oe","oe","ss","[at]","Euro","Dollar","'"); // Simple by vaddi

//If the form is submitted
if(isset($_POST['submitted'])) {
	
	// captcha 
	if (empty($_POST['code'])) {
		$captchaError = 'Sie haben kein Captcha eingegeben.';
		$hasError = true;
	} else if (sha1(trim(strip_tags(strtoupper($_POST['code'])))) != $_SESSION['P91Captcha_code']) {
		$captchaError = 'Das Captcha ist falsch, bitte nochmal!';
		$hasError = true;
	}

	// require a name from user
	if(trim($_POST['contactName']) === '') {
		$nameError =  'Bitte geben Sie einen Namen ein!'; 
		$hasError = true;
	} else {
		$name = trim($_POST['contactName']);
		$name = str_replace($r1, $r2, $name);
		$name = str_replace('[^\w\s[:punct:]]*', ' ', $name);

	}
	
	// need valid email
	if(trim($_POST['email']) === '')  {
		$emailError = 'Bitte geben Sie eine g&uuml;ltige email Adresse ein.';
		$hasError = true;
	} else if (!preg_match("/^[[:alnum:]][a-z0-9_.-]*@[a-z0-9.-]+\.[a-z]{2,4}$/i", trim($_POST['email']))) {
		$emailError = 'Sie haben keine g&uuml;ltige email Adresse eingegeben.';
		$hasError = true;
	} else {
		$email = trim($_POST['email']);
	}
		
	// we need at least some content
	if(trim($_POST['comments']) === '') {
		$commentError = 'Bitte geben Sie eine Nachrich an uns ein!';
		$hasError = true;
	} else {
		if(function_exists('stripslashes')) {
			$comments = stripslashes(trim($_POST['comments']));
			//$comments = stripslashes(trim(strip_tags($_POST['comments'])));
			$comments = str_replace($r1, $r2, $comments);
			$comments = str_replace('[^\w\s[:punct:]]*', ' ', $comments);
		} else {
			$comments = trim($_POST['comments']);
		}
	}
		
	// upon no failure errors let's email now!
	if(!isset($hasError)) {
			$ip = $_SERVER['REMOTE_ADDR'];
			$host = gethostbyaddr($ip);
			$timestamp = time ();
			$datum = date ("d.m.Y", $timestamp);
			$uhrzeit = date ("H:i:s", $timestamp);
		$emailTo = html_entity_decode(MAIL,null,'UTF-8');
		$subject = 'Webformular Nachricht von '.$name;
		$sendCopy = trim($_POST['sendCopy']);

// Emailbody Start

    $body = "\n";
    $body .= $name." hat Ihnen eine neue Nachricht von ihrer Webseite http://www.brother-film.de/ gesendet.\n";
    $body .= "\n---------- Nachricht ----------\n";
    $body .= $comments."\n";
    $body .= "-------- Nachrichtende --------\n\n";
    $body .= "Versendet am ". $datum .' um '. $uhrzeit ." \nvon ". $ip .' ('. $host .")\n\n";

// Emailbody End

	// Add Recipient and set default Mailencoding to 8bit HTML 

		$headers = "From: $name <$email>\n";
		$headers .= "Content-Type: text/html\n";
		$headers .= "Content-Transfer-Encoding: 8bit\n";

		mail($emailTo, $subject, $body, $headers);
        
        // set our boolean completion value to TRUE
		$emailSent = true;
	}
}

?>

<script type="text/javascript">
function P91Captcha(sid){
	var pas = new Image();
	var heuri = new Date();
	pas.src="../inc/captcha_form.php?x="+heuri.getTime()+sid;
	document.getElementById("P91Captcha").src=pas.src;
}
</script>

<article>

  <div class="left cont_left shadowed">
    <table>
      <tr>
        <td>TEAM</td>
        <td>Maik Vattersen<br /><a href="mailto:m&#46;vattersen&#64;exigem&#46;com">m&#46;vattersen&#64;exigem&#46;com</a></td>
      </tr>

      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      
      <tr>
        <td>&nbsp;</td>
        <td>Gerd Fabek<br /><a href="mailto:g&#46;fabek&#64;exigem&#46;com">g&#46;fabek&#64;exigem&#46;com</a></td>
      </tr>

      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
    
      <tr>
        <td>PRODUKTION</td>
        <td>
          eXigem Media GbR <br />
          Uhlandstr. 29<br />
          38102 Braunschweig<br />
          +49 5314 2877 630<br />
          <a href="mailto:kontakt&#64;exigem&#46;com">kontakt&#64;exigem&#46;com</a> <br />
          <a href="http://www.exigem.com/">www.exigem.com</a> </td>
      </tr>

    </table>
  
  </div>
		
	  <?php if(isset($emailSent) && $emailSent == true) { ?>

	  <meta http-equiv="refresh" content="3; url=<?php echo $_SERVER['SCRIPT_NAME']; ?>" />	  
    <div class="right cont_right shadowed" style="widht:240px;margin:180px 0 0 20px;">
      <div id="contact" class="section">
        <div class="container content">
    	    <p style="font-size:450%;margin:50px 0 50px 10px;" class="left info">&#10004;</p>
          <p style="margin:50px 0;" class="left boldfirst">Vielen Dank, <br /><br />Ihre Nachricht wurde <br />erfolgreich an uns versendet.</p>
        </div>
      </div>
    </div>
    
    <?php } else { ?>
    
    <div class="right cont_right shadowed">
    <div id="contact" class="section">
    <div class="container content">
    
	  <div id="contact-form" style="margin:25px 0 0 75px;max-width:350px;">
	    <?php if(isset($hasError) || isset($captchaError) ) { ?>
<!--          <p class="alert">Error submitting the form</p> -->
            <?php } ?>
				
	    <form id="contact-us" action="<?php echo $_SERVER['SCRIPT_NAME']; ?>" method="post">

	      <div class="formblock">
		<label class="screen-reader-text"></label>
		<input type="text" name="contactName" id="contactName" value="<?php if(isset($_POST['contactName'])) echo $_POST['contactName'];?>" class="txt requiredField <?php if($nameError != '') { echo inputError; } ?>" placeholder="Name:" />
		<?php if($nameError != '') { ?>
		  <span class="error"><?php echo $nameError;?></span> 
		<?php } ?>
	      </div>
                        
	      <div class="formblock">
		<label class="screen-reader-text"></label>
		<input type="text" name="email" id="email" value="<?php if(isset($_POST['email']))  echo $_POST['email'];?>" class="txt requiredField email <?php if($emailError != '') { echo 'inputError'; } ?>" placeholder="Email:" />
		<?php if($emailError != '') { ?>
		  <span class="error"><?php echo $emailError;?></span>
		<?php } ?>
	      </div>
                        
	      <div class="formblock">
		<label class="screen-reader-text"></label>
		<textarea name="comments" id="commentsText" class="txtarea requiredField <?php if($commentError != '') { echo 'inputError'; } ?>" placeholder="Nachricht:"><?php if(isset($_POST['comments'])) { if(function_exists('stripslashes')) { echo stripslashes($_POST['comments']); } else { echo $_POST['comments']; } } ?></textarea>
		<?php if($commentError != '') { ?>
		  <span class="error"><?php echo $commentError;?></span> 
		<?php } ?>
	      </div>
                        
	      <div class="formblock">
		<label class="screen-reader-text"></label>	
		<input type="text" name="code" id="code" class="text requiredField code <?php if($captchaError != '') { echo 'inputError'; } ?>" maxlength="50" placeholder="Captcha-Code" size="10" style="float:right;" />						
		<img src="../inc/captcha_form.php<?=$sessionstringnew;?>" alt="Captcha" id="P91Captcha" /> 
		<br /><a href="javascript:P91Captcha('<?=$sessionstringadd;?>');">Neuer Code?</a>
		<br />
		<?php if($captchaError != '') { 
		echo $sessionstringnew ;?>
		  <span class="error"><?php echo $captchaError;?></span> 
		<?php } ?>
	      </div>



	      <div class="formblock">
	      <button name="submit" type="submit" class="subbutton">Absenden</button>
	      <input type="hidden" name="submitted" id="submitted" value="true" />
	      </div>

	    </form>	
	    
	  </div>
	  
		<?php } ?>		
	  
	</div>
    </div><!-- End #contact -->
	
<script type="text/javascript">
	<!--//--><![CDATA[//><!--
	$(document).ready(function() {
		$('form#contact-us').submit(function() {
			$('form#contact-us .error').remove();
			var hasError = false;
			$('.requiredField').each(function() {
				if($.trim($(this).val()) == '') {
					var labelText = $(this).prev('label').text();
					$(this).parent().append('<span class="error">Sie haben '+labelText+' vergessen anzugeben.</span>');
					$(this).addClass('inputError');
					hasError = true;
				} else if($(this).hasClass('email')) {
					var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
					if(!emailReg.test($.trim($(this).val()))) {
						var labelText = $(this).prev('label').text();
						$(this).parent().append('<span class="error">Sorry! Die von Ihnen eingegebene '+labelText+' ist fehlerhaft.</span>');
						$(this).addClass('inputError');
						hasError = true;
					}
				} else {
					var codeReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
					if (sha1(trim(strip_tags(strtoupper($_POST['code'])))) != $_SESSION['P91Captcha_code']) {
						var labelText = $(this).prev('label').text();
						$(this).parent().append('<span class="error">Sorry! Das von Ihnen eingegebene '+labelText+' ist fehlerhaft.</span>');
						$(this).addClass('inputError');
						hasError = true;
					}
				}
			});
			if(!hasError) {
				var formInput = $(this).serialize();
				$.post($(this).attr('action'),formInput, function(data){
					$('form#contact-us').slideUp("fast", function() {				   
						$(this).before('<p class="tick"><strong>Danke!</strong> Ihre Nachricht an uns wurde zugestellt.</p>');
					captcha_});
				});
			}

			return false;	
		});
	});
	//-->!]]>
</script>

    </div>

    </article>
  </div>


	<?php include ("../inc/footer.php"); ?>
</div>
</body>
</html>
