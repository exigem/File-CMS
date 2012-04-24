<?php 

//
// Konfigurationsdatei 
//

// Seitendaten
define ("BASE", "http://spike/vaddi/fcms/"); // Basisurl mit end /
define ("ABS_BASE", "/var/www");      // Absoluter Pfad OHNE end /
define ("REL_BASE", "/vaddi/fcms");         // Relativer Pfad OHNE end /

define ("SITE_NAME", "File-CMS");			// Der Name der Seite
define ("SITE_TITLE", "Filebased Content Managment System"); // Untertitel oder Slogan
define ("SITE_DESCRIPTION", "Datei basiertes Content Managment System"); // Der Name der Seite
define ("SITE_KEYWORDS", "cms, file-cms, fcms, exigem"); // Der Name der Seite
define ("SITE_PUBLISHER", "eXigem Media"); // Der Name der Seite

define ("DEFAULT_LANGUAGE", "de");		// Der Name der Seite

define ("DEFAULT_FEED", "atom");      // Standard Newsfeedformat
define ("MAXNEWS", "3");              // Maximale News
define ("NEWS_ARCHIVE", "1");         // News Archive anzeigen
define ("NEWS_ARCHIVE_MAX", "42");    // Maximale News Archive Einträge 
define ("NEWS_FEED_MAX", "10");       // Maximale News Feed Einträge

// SICHERHEIT
define ("SITE_OWNER", "admin");				// Der verwendete Benutzername
define ("SITE_PASSWD", "nimda");			// Das verwendete Passwort

// Social
define ("FOOTER_HOME", "1");          // Anzeigen von Home (index.php) im Footer
define ("FOOTER_CONTACT", "1");       // Anzeigen von Kontakt im Footer
define ("FEEDS", "1"); 	              // Anzeigen von Feeds im Footer 
define ("FLATTR", "0"); 	            // IMDB 
define ("FLATTR_URL", "http://flattr.com/"); // IMDB URL
define ("IMDB", "0"); 	              // IMDB 
define ("IMDB_URL", "http://imdb.com/"); // IMDB URL
define ("IGG", "1");   	          // Twitter
define ("IGG_URL", "http://www.indiegogo.com/"); 	// Twitter URL
define ("TWITTER", "1");   	          // Twitter
define ("TWITTER_URL", "https://twitter.com/#!/exigem"); 	// Twitter URL
define ("GITHUB", "1"); 	            // GitHub
define ("GITHUB_URL", "https://github.com/exigem"); 	// IMDB URL
define ("FACEBOOK", "1");   	        // Facebook
define ("FACEBOOK_URL", "https://www.facebook.com/pages/Exigem-Media-GbR/133882766677923"); // Facebook URL

// Menu
define ("MENU_HOME", "0");		        // Anzeigen von Home (index.php) im Menu

// Validator
define ("VALIDATOR", "1");            // Anzeigen des w3c validators

?>
