<!-- FORM (RETURNING USER) -->
<form id="returning" action="" style="width: 500px;height: 500px;background: pink;">
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
