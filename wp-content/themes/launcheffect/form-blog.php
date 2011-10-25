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
