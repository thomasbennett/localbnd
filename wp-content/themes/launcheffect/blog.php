<?php 
/*
* Template name: Blog
*/
get_header(); 
?>
<body>
  <div class="topbar"></div>
  <div class="centered-container">
    <div class="right-col">
      <div class="inner-col">
        <?php 
          global $post;
          $args = array('numberposts' => 5);
          $blogposts = get_posts($args);

          foreach($blogposts as $post): setup_postdata($post);
        ?>
          <div class="article">
            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <span class="post-meta">
              by <span><?php the_author(); ?></span> 
              on <span><?php the_time('M d, Y'); ?></span> 
              in <span><?php the_category(', '); ?></span>&nbsp;
              with <span><?php comments_number(); ?></span>
            </span>

            <div class="entry"><?php the_excerpt(); ?></div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>

    <div class="left-col">
      <h1 class="logo">Localbnd&trade;</h1>
      <span class="slogan2">Discover new music where you live.</span>

      <div class="sub-callout">
        <span>Would you like to try Localbnd?</span>

        <!-- STORE BASE URL FOR AJAX USE -->
        <span class="dirname"><?php bloginfo('url'); ?></span>					
        
        <!-- FORM (PRE-SIGNUP) -->
        <form id="pre-signup-form" action="">
          <fieldset>
            <input type="hidden" name="code" id="code" value="<?php codeCheck(); ?>" />
            <label for="email">Sign up for our early beta invite.</label>
            <input type="text" id="email-small" name="email" alt="Enter your email address" />
            <span id="submit-button-border"><input type="submit" name="submit" value="Go" id="submit-button" /></span>
            <div id="error"></div>
          </fieldset>
        </form>
      </div>

      <div id="social-wrapper">
        <div class="twitter social">Twitter</div>
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
    </div>

  </div>
  <div class="clear"></div>
  <?php get_footer(); ?>
</body>
</html>
