function SelectAll(id)
{
  document.getElementById(id).focus();
  document.getElementById(id).select();
}

jQuery(function($){
  $("#form").submit(function(e){
    e.preventDefault();

    dataString = $("#form").serialize();
    
    $.ajax({
    type: "POST",
    url: "wp-content/themes/launcheffect/post.php",
    data: dataString,
    dataType: "json",
    success: 
      function(data) {

        if(data.email_check == "invalid"){
            $('#error').html('Invalid Email.');
        } else {

          // if returning user
          if(data.reuser == "true") {
            // lightbox the content in
            $('#error').hide();
            $('.fake-background').show();
            $('#returning fieldset').show();
            $('#returning').animate({ 
              opacity: 1 },  
              800, 
              'easeInBack',
              function(){
                $(this).show();
              }
            );

            var returningCode = $('span.dirname').text() + '/' + data.returncode;
            var returningtweetCode = 'http://twitter.com/share?url=' + returningCode;

            $('#returning span.user').text(data.email);
            $('#returning span.clicks').text(data.clicks);
            $('#returning span.conversions').text(data.conversions);
            $('#returning input#returningcode').attr('value',returningCode);

            $('#tweetblock-return').html('<a href="' + returningtweetCode + '" class="twitter-share-button" data-count="none">Tweet</a><script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>');	
            $("#fblikeblock-return").html('<fb:like id="fbLike" href="'+returningCode+'" send="true" layout="button_count" width="120" show_faces="false" font="arial"></fb:like>');
            FB.XFBML.parse(document.getElementById('fblikeblock-return'));
          
          } else {
          
            $('#error').hide();
            $('.fake-background').show();
            $('#success fieldset').show();
            $('#success').animate({ 
              opacity: 1 },  
              800, 
              'easeInBack',
              function(){
                $(this).show();
              }
            );

            var refermiCode = $('span.dirname').text() + '/' + data.code;
            var tweetCode = 'http://twitter.com/share?url=' + refermiCode;
            
            $('#success input#successcode').attr('value',refermiCode);
            
            $('#tweetblock').html('<a href="' + tweetCode + '" class="twitter-share-button" data-count="none">Tweet</a><script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>');	
            $("#fblikeblock").html('<fb:like id="fbLike" href="'+refermiCode+'" send="true" layout="button_count" width="120" show_faces="false" font="arial"></fb:like>');
            FB.XFBML.parse(document.getElementById('fblikeblock'));
          }
        }	
      }
    });          
  });

  // detect the browser size for fancybox
  var winHeight = $(window).height();
  var winWidth = $(window).width();
  $('.fake-background').css({'height': + winHeight + 'px', 'width': + winWidth + 'px'});

  // hide the lightbox
  $('.fake-background').click(function(){
    $(this).hide();
    $('#returning, #success').fadeOut(600);
  });
});
