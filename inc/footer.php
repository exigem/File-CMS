<footer>
  <div>
    <div class="left">
      
      <?php
      $width_counter = "0";
      if (FOOTER_HOME == "1") {$width_counter = $width_counter + "32";}
      if (FOOTER_CONTACT == "1") {$width_counter = $width_counter + "32";}
      if (FEEDS == "1") {$width_counter = $width_counter + "32";}
      if (IMDB == "1") {$width_counter = $width_counter + "48";}
      if (TWITTER == "1") {$width_counter = $width_counter + "32";}
      if (FACEBOOK == "1") {$width_counter = $width_counter + "32";}
      if (GITHUB == "1") {$width_counter = $width_counter + "32";}
      if (IGG == "1") {$width_counter = $width_counter + "32";}
      if (FLATTR == "1") {$width_counter = $width_counter + "103";}
      ?>
      
      
      <ul id="social">
      
        <?php 
          if (!empty($lang)) {
            if ($lang == "de") {
              $foot_main = "&Uuml;bersicht";
              $foot_fbtitle = "Auf Facebook teilen";
              $foot_contact = "Kontakt";
              $foot_contact_var = $lang . "/";
              $foot_contact_title = "Kontaktieren Sie uns";
              $foot_twittitle = "Auf Twitter folgen";
              $foot_github = "Auf GitHub folgen";
              $foot_feedstitle = "Feeds abonieren";
              $foot_flattr = "Spenden via Flattr";
              $foot_igg = "Crowdfounding auf IndieGoGo";
            } else if ($lang == "en") {
              $foot_main = "Main Site";
              $foot_fbtitle = "Share on Facebook";
              $foot_contact = "Contact";
              $foot_contact_var = $lang . "/";
              $foot_contact_title = "Contact us";
              $foot_twittitle = "Follow on Twitter";
              $foot_github = "Fork on GitHub";
              $foot_feedstitle = "Subscribe to Feeds";
              $foot_flattr = "Flattr us";
              $foot_igg = "Crowdfounding on IndieGoGo";
            }
          } else {
            $foot_main = "&Uuml;bersicht";
            $foot_fbtitle = "Auf Facebook teilen";
            $foot_contact = "Kontakt";
            $foot_contact_var = DEFAULT_LANGUAGE . "/";
            $foot_contact_title = "Kontaktieren Sie uns";
            $foot_twittitle = "Auf Twitter folgen";
            $foot_github = "Auf GitHub folgen";
            $foot_imdb = "";
            $foot_feedstitle = "Feeds abonieren";
            $foot_flattr = "Spenden via Flattr";
            $foot_igg = "Crowdfounding auf IndieGoGo";
          }

        
      if (FOOTER_HOME == "1") {
        echo '
        <li class="foot_home hov">
          <a href="'.BASE.'index.php">
            <img src="'.BASE.'inc/img/icons/home.png" title="'.$foot_main.'" width="22" height="22" alt="Home" />
          </a>
        </li>';
      }  

      if (FOOTER_CONTACT == "1") {
        echo '<li class="foot_contact hov">
          <a href="'. BASE . $foot_contact_var . $foot_contact .'.php" title="'.$foot_contact_title.'">
            <img src="'.BASE.'inc/img/icons/mail.png" width="22" height="22" alt="<?php echo $foot_contact ; ?>" />
          </a>
        </li>';
      }
            
      if (TWITTER == "1") {
        echo '
        <li class="foot_twit hov">
          <a href="'.TWITTER_URL.'" title="'.$foot_twittitle.'" target="_blank">
            <img src="'.BASE.'inc/img/icons/twit_icon.png" width="22" height="22" alt="twitter" />
          </a>
        </li>';
      }
      
      if (FACEBOOK == "1") {
        echo '
        <li class="foot_fb hov">
          <a href="'.FACEBOOK_URL.'" title="'.$foot_fbtitle.'" target="_blank">
            <img src="'.BASE.'inc/img/icons/fb_icon.png" width="22" height="22" alt="facebook" />
          </a>
        </li>';
      }
      
      if (GITHUB == "1") {
        echo '
        <li class="foot_gh hov">
          <a href="'.GITHUB_URL.'" title="'.$foot_github.'" target="_blank">
            <img src="'.BASE.'inc/img/icons/github.png" width="22" height="22" alt="github" />
          </a>
        </li>';
      }

      if (IGG == "1") {
        echo '
        <li class="foot_igg hov">
          <a href="'.IGG_URL.'" title="'.$foot_igg.'" target="_blank">
            <img src="'.BASE.'inc/img/icons/igg.png" width="22" height="22" alt="igg" />
          </a>
        </li>';
      }      

      if (FLATTR == "1") {
        echo '
        <li class="foot_flattr hov">
          <a href="'.FLATTR_URL.'" title="'.$foot_flattr.'">
            <img src="'.BASE.'inc/img/icons/flattr.png" width="93" height="20" alt="flattr" />
          </a>
        </li>';
      }

      if (IMDB == "1") {
        echo '
        <li class="foot_imdb hov">
          <a href="'.IMDB_URL.'" title="'.$foot_imdb.'" target="_blank">
            <img src="'.BASE.'inc/img/icons/imdb.png" width="38" height="20" alt="imdb" />
          </a>
        </li>';
      }

      if (FEEDS == "1") {
        echo '
        <li class="foot_feeds hov">
          <a href="'.BASE.'feed.php" title="'.$foot_feedstitle.'">
            <img src="'.BASE.'inc/img/icons/feed.png" width="22" height="22" alt="feeds" />
          </a>
        </li>';
      }      
 
      ?>
      </ul>
    </div>
    
    <?php echo '<div style="text-align:center;margin:0 '.$width_counter.'px -22px 0;">copyright © '. date("Y") .' <a href="http://www.exigem.com/" target="_blank">exigem Media</a> </div>'; ?>
    
    <?php
    // auf index.php Hauptseite im Footer recht angezeigen
    $url_footer = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['SCRIPT_NAME'];
    $url_footer_val = BASE . "index.php";
    $url_footer_val_feed = BASE . "feed.php";
    $url_footer_val_admin = BASE . "admin/index.php";
    
    if ($url_footer_val == $url_footer) {
      echo '<div class="right">';
      
      if (VALIDATOR == "1") {
        echo '  <a href="http://validator.w3.org/check?uri='. urlencode($url_footer) .';verbose=1" title="w3c validiert" target="_blank">valid</a> webdesign';
      }
      
      echo ' by <a href="http://www.exigem.com/" title="created by exigem" target="_blank">exigem</a>';
      echo '</div>';
    } else if (($url_footer_val_admin == $url_footer) or ($url_footer_val_feed == $url_footer)) {
    
      echo '<div class="right" style="text-align:right;">';
      echo '<p><script type="text/javascript">writeclock() </script></p>';
      echo '</div>';
    } else {
      
      echo '<div class="right">';
      
      $movie_de = "Film";
      $movie_en = "Movie";
      
      $about_de = "&#220;ber";
      $about_en = "About";
      
      $contact_de = "Kontakt";
      $contact_en = "Contact";
      $news_de = "Neuigkeiten";
      $news_en = "News";
      $de_news = $news_de."/index.php";
      $news = $news_en."/index.php";
      
      $langvar_val = "/" . $lang;
      $langvar_full = $base_sub . $langvar_val;
      
      $langvar = str_replace($langvar_full,"",$_SERVER['SCRIPT_NAME']);
      $langvar = str_replace("/","",$langvar_val);   
         
      $raw_fileuri = str_replace("$base_sub/","",$_SERVER['SCRIPT_NAME']);
      
      $language_varible_str = str_replace($langvar_full.$raw_fileuri,"",$_SERVER['SCRIPT_NAME']);
      $language_varible_str = str_replace($base_sub,"",$language_varible_str);
      $language_varible_str = str_replace($lang,"",$language_varible_str);
      $language_varible_str = str_replace("/","",$language_varible_str);
      $language_varible = str_replace($language_varible_str,"",$_SERVER['SCRIPT_NAME']);
      $language_varible = str_replace($base_sub,"",$language_varible);
      $language_varible = str_replace($news,"",$language_varible);
      $language_varible = str_replace($de_news,"",$language_varible);
      $language_varible = str_replace("/","",$language_varible);

      if (!empty($language_varible)) {
      
      $url_lang_val = $raw_fileuri;
        
        echo '<ul id="footer_lang">';
        
        if ($language_varible == "de") {
          $langrequest = str_replace($language_varible,"en",$url_lang_val);

          // Unterordner "de" zerstört unseren index.php Ordnerlink
          if (strpos($langrequest. $news, $news) !== false) {
            $langrequest = str_replace("inenx.php","index.php",$langrequest);
          }
          
          // Neuigkeiten -> News
          if(strpos($langrequest, $news_de) !== false) {
            $langrequest = str_replace($news_de,$news_en,$langrequest);
          }
          
          // Über -> About
          if(strpos($langrequest, $about_de) !== false) {
            $langrequest = str_replace($about_de,$about_en,$langrequest);
          }
          
          // Film -> Movie
          if(strpos($langrequest, $movie_de) !== false) {
            $langrequest = str_replace($movie_de,$movie_en,$langrequest);
          }

          // Kontakt -> Contact
          if(strpos($langrequest, $contact_de) !== false) {
            $langrequest = str_replace($contact_de,$contact_en,$langrequest);
          }
          
          $datei = BASE . $langrequest;
          if(filter_var($datei, FILTER_VALIDATE_URL) === FALSE) {
            // echo '<li class="hov"><img src="'.BASE.'inc/img/icons/en_flag.png" alt="english" width="22" height="22" title="Keine &Uuml;bersetzte Version" class="lang_flag" /> </li>';
          } else {
            echo '<li class="hov"><a href="'. BASE . $langrequest.'"><img src="'.BASE.'inc/img/icons/en_flag.png" alt="english" width="22" height="22" title="Seite auf Englisch anzeigen" class="lang_flag" /></a> </li>';
          }
          
        } else if ($language_varible == "en") {
          $langrequest = str_replace($language_varible,"de",$url_lang_val);
          
          // News -> Neuigkeiten
          if(strpos($langrequest, $news_en) !== false) {
            $langrequest = str_replace($news_en,$news_de,$langrequest);
          }
          
          // About -> Über
          if(strpos($langrequest, $about_en) !== false) {
            $langrequest = str_replace($about_en,$about_de,$langrequest);
          }
          
          // Movie -> Film
          if(strpos($langrequest, $movie_en) !== false) {
            $langrequest = str_replace($movie_en,$movie_de,$langrequest);
          }

          // Contact -> Kontakt
          if(strpos($langrequest, $contact_en) !== false) {
            $langrequest = str_replace($contact_en,$contact_de,$langrequest);
          }
          
          $datei = BASE . $langrequest;
          if(filter_var($datei, FILTER_VALIDATE_URL) === FALSE) {
            // echo '<li class="hov"><img src="'.BASE.'inc/img/icons/de_flag.png" alt="deutsch" width="22" height="22" title="No translated version" class="lang_flag" /> </li>';
          } else  {
            echo '<li class="hov"><a href="'. BASE . $langrequest.'"><img src="'.BASE.'inc/img/icons/de_flag.png" alt="deutsch" width="22" height="22" title=" View Page in german" class="lang_flag" /></a> </li>';
          }
          
          
        }
        echo '</ul>';
      }
      echo '</div>';
    }
    
    ?>

  </div>

</footer>
