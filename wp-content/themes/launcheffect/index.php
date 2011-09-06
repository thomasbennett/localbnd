<?php
session_start();

header('HTTP/1.1 200 OK'); ?>

<!DOCTYPE html> 
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en"> 

<head>
  <meta charset="utf-8" />
	<title><?php if(!is_page('stats')) { le(page_title, 'Localbnd'); } else { echo 'Stats - '; le(page_title, 'Localbnd'); } ?></title>
	
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
	<meta name="description" content="<?php le(bkt_metadesc, ''); ?>"  /> 
	<meta name="keywords" content="<?php le(bkt_metakey, ''); ?>"  /> 
	
	<meta property="og:title" content="<?php le(page_title, 'Localbnd'); ?>"/> 
	<meta property="og:image" content="<?php echo leimg(bkt_thumb, bkt_thumbdisable); ?>"/>

	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/reset.css" />
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" />
	
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js" type="text/javascript"></script> 
	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/init.js"></script>
	
<?php get_header(); 

include('functions/le-functions.php');

// STORE REFERRED BY CODE
$_SESSION['referredBy'] = $referredBy;

// LOG VISITS AND CONVERSIONS
logVisits($referredBy, $stats_table);
?>
</head>

<body <?php if(is_page('stats')) { echo 'id="stats"'; }?>>
  <div class="container"> 
    <h1 class="logo">Localbnd&trade;</h1>
    <span class="slogan">Discover new music where you live.</span>
    <div class="main">
      <p>Localbnd is a social discovery engine for the best in local independant music.  Friends can find, share, and vote on exciting new bands and musicians within their city and region.</p>
      <p>Localbnd isn’t bogged down by the mainstream music found on other sites – so the newest bands you want to listen to are just a couple clicks away.</p>
    </div>

    <div style="clear:both;"></div>
    
    <p class="h3">Would you like to try Localbnd?</p>

    <!-- STORE BASE URL FOR AJAX USE -->
    <span class="dirname"><?php bloginfo('url'); ?></span>					
    
    <!-- FORM (PRE-SIGNUP) -->
    <form id="form" action="">
      <fieldset>
        <input type="hidden" name="code" id="code" value="<?php codeCheck(); ?>" />
        <label for="email">Sign up for our early beta invite.</label>
        <input type="text" id="email" name="email" alt="Enter your email address" />
        <span id="submit-button-border"><input type="submit" name="submit" value="Go" id="submit-button" /></span>
        <div id="error"></div>
      </fieldset>
    </form>

    <div id="social-wrapper">
      <span class="r15">You should</span>
      <div class="twitter social">Twitter</div>
      <span class="lr15">and</span>
      <div class="facebook social">Facebook</div>
    </div>

    <div style="clear:both"></div>

    <!-- FORM (POST-SIGNUP) -->
    <form id="success" action="">
      <fieldset>
        <h2 class="social-heading">TO SHARE WITH FRIENDS, CLICK TWEET, LIKE OR SEND:</h2>
        <div class="social-container">
          <div class="social">
            <div id="fb-root"></div><script src="http://connect.facebook.net/en_US/all.js#xfbml=1" type="text/javascript"></script>
            <div id="tweetblock"></div>	
            <div id="fblikeblock"></div>
          </div>
        </div>
        <label for="email">OR, COPY AND PASTE THE THE LINK BELOW:</label>
        <input type="text" id="successcode" value="" onclick="SelectAll('successcode');"/>	
      </fieldset>
    </form>

    <div style="clear:both"></div>

    <!-- FORM (RETURNING USER) -->
    <form id="returning" action="">
      <fieldset>
        <h2>HELLO!</h2>
        <p>Welcome back <span class="user"> </span>.<br /><span class="clicks"> </span> clicked your link so far and <span class="conversions"> </span> signed up.<br /><br /></p>
        
        <h2 class="social-heading">FOR YOUR REFERENCE, SHARE WITH THESE: </h2>
        <div class="social-container">
          <div class="social">
            <div id="fb-root"></div><script src="http://connect.facebook.net/en_US/all.js#xfbml=1" type="text/javascript"></script>
            <div id="tweetblock-return"></div>
            <div id="fblikeblock-return"></div>
          </div>
        </div>
        
        <label>AND HERE'S YOUR UNIQUE URL:</label>
        <input type="text" id="returningcode" value="" onclick="SelectAll('returningcode');"/>
      </fieldset>
    </form>
    
    <div class="clear"></div>
  </div> 
  
  <div id="footer">
    <div class="container">
      <p>Are you a band, musician or label interested in getting your music 
      on Localbnd? Contact us for more details on how to get hosted. 
      Send your contact info to <a href="mailto:submissions@localbnd.com">submissions@localbnd.com</a>.</p>

      <p><small>We take every conact seriously and will be back in touch within 24 hours.</small></p>
      <p><small>Localbnd &copy;<?php echo date('Y') ?>. All rights reserved.</small></p>

      <?php global $user_login; get_currentuserinfo(); if ($user_login) :?>
        <a href="stats" target="_blank">Stats</a><br />
        <a href="wp-admin/themes.php" target="_blank">Theme Options</a>
      <?php endif; ?>

      <div class="logo2">Fuck Your Top 40</div>
      <?php get_footer(); ?>
    </div>
  </div>
  <script>
    jQuery(function($){
      $('#email').each(function(){
        var curval = $(this).val();
        var altval = $(this).attr('alt');
        if (curval == "" || curval == altval) {
          $(this).css({"color":"#999"});
          $(this).val(altval);
        } else {
          $(this).css({"color":"#000"});
        }
      });

      // if focus, clear if necessary
      $('#email').focus(function(){
        var curval = $(this).val();
        var altval = $(this).attr('alt');
        $(this).css({"color":"#000"});
        if(curval==altval){
          $(this).val("");
        }
      });

      // if blur, put default text back and gray if necessary
      $('#email').blur(function(){
        var curval = $(this).val();
        var altval = $(this).attr('alt');
        if(curval==""){
          $(this).css({"color":"#999"});
          $(this).val(altval);
        }
      });
    });
  </script>
</body>
</html>
