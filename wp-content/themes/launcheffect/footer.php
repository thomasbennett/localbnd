<div id="footer">
  <div class="container" style="margin-top: 35px">
    <p>Are you a band, musician or label interested in getting your music 
    on Localbnd? Contact us for more details on how to get hosted. 
    Send your contact info to <a href="mailto:submissions@localbnd.com">submissions@localbnd.com</a>.</p>

    <p><small>We take every conact seriously and will be back in touch within 24 hours.</small></p>

    <div class="logo2">No More Top 40</div>
    <?php wp_footer(); ?>
  </div>
</div>
<p class="centered copyright">Localbnd &copy; <?php echo date('Y') ?>. &nbsp;All rights reserved. <span class="privacy-policy">View our <a class="normal-link" href="/privacy-policy">privacy policy</a>.</span></p>

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

<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/easing.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/init.js"></script>
