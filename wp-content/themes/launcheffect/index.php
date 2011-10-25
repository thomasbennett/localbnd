<?php get_header(); ?>
<body>
  <div class="topbar"></div>
  <div class="rocker"></div>
  <div class="container"> 
    <h1 class="logo">Localbnd&trade;</h1>
    <span class="slogan">Discover new music where you live.</span>
    <div class="main">
      <p>Localbnd is a social discovery engine for the best in local independant music.  Friends can find, share, and vote on exciting new bands and musicians within their city and region.</p>
      <p>Localbnd isn’t bogged down by the mainstream music found on other sites – so the newest bands you want to listen to are just a couple clicks away.</p>
    </div>

    <div style="clear:both;"></div>

  </div>
  <div class="callout">
    <div class="centered">
      <div class="arrow"></div>
      <p class="h3">Would you like to try Localbnd?</p>
      
      <!-- STORE BASE URL FOR AJAX USE -->
      <span class="dirname"><?php bloginfo('url'); ?></span>					
      
      <!-- FORM (PRE-SIGNUP) -->
      <form id="form" action="">
        <fieldset>
          <input type="hidden" name="code" id="code" value="<?php codeCheck(); ?>" />
          <label for="email" style="margin-bottom: 15px">Sign up for our early beta invite (coming soon).</label>
          <input type="text" id="email" name="email" alt="Enter your email address" />
          <span id="submit-button-border"><input type="submit" name="submit" value="Go" id="submit-button" /></span>
          <div id="error"></div>
        </fieldset>
      </form>
    </div>
  </div>

  <div class="container" style="margin-top: 35px;">
    <div id="social-wrapper" class="extra-width">
      <span class="r15">You should</span>
      <div class="twitter social">Twitter</div>
      <span class="lr15">and</span>
      <div class="facebook social">Facebook</div>
    </div>
    
    <a href="/blog" class="blog-callout">Also, make sure to check out the Localbnd blog.</a>

    <div class="clear"></div>
  </div> 
  <?php get_footer(); ?>

  <div class="fake-background"></div>
  <!-- FORM (RETURNING USER) -->
  <form id="returning" action="">
    <fieldset>
      <h2>Welcome back <span class="user"> </span> !</h2>
      <p />
      <p>You've had <span class="clicks"> </span> clicked your link so far and <span class="conversions"> </span> signed up.<br /><br /></p>
      
      <h2 class="social-heading">TO SHARE WITH FRIENDS, CLICK TWEET, LIKE OR SEND: </h2>
      <div class="social-container">
        <div id="tweetblock-return"></div>
        <div id="fb-root"></div>
        <script src="http://connect.facebook.net/en_US/all.js#xfbml=1" type="text/javascript"></script>
        <div id="fblikeblock-return"></div>
      </div>
     
      <div style="clear:both;"></div>
      <label>OR COPY AND PASTE THE LINK BELOW:</label>
      <input type="text" id="returningcode" value="" onclick="SelectAll('returningcode');"/>
    </fieldset>
  </form>

  <!-- FORM (POST-SIGNUP) -->
  <form id="success" action="">
    <fieldset>
      <h2>Thanks for signing up.</h2>
      <p>We look forward to launching in the near future and subsequently blowing your mother-effing mind.</p>
      <p>Invite at least 3 friends using the link below and we'll hook you up with some awesome schwag at our launch date.</p>
      <span class="social-heading">TO SHARE WITH FRIENDS, CLICK TWEET, LIKE OR SEND:</span>
      <div class="social-container">
        <div id="tweetblock"></div>	
        <div id="fb-root"></div><script src="http://connect.facebook.net/en_US/all.js#xfbml=1" type="text/javascript"></script>
        <div id="fblikeblock"></div>
      </div>
      <label>OR COPY AND PASTE THE LINK BELOW:</label>
      <input type="text" id="successcode" value="" onclick="SelectAll('successcode');"/>	
    </fieldset>
  </form>
 </body>
</html>
