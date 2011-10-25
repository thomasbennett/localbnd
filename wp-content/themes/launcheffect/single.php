<?php get_header(); ?>
<body>
  <div class="right-col">
    <?php if(have_posts(): while(have_posts()): the_post(); ?>
      <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
      <span class="post-meta">by <span><?php the_author(); ?></span> on <span><?php the_time(); ?></span> in <span><?php the_category(); ?></span> with <span>comments_number(); ?> comments</span></span>

      <div class="entry"><?php the_content(); ?></div>
    <?php endwhile; endif; ?>
  </div>

  <div class="left-col">
    <h1 class="logo">Localbnd&trade;</h1>
    <span>Discover new music where you live.</span>
    <p>Would you like to try Localbnd?</p>
    <?php include('form-blog.php'); ?>
  </div>

  <div class="clear"></div>
  <?php get_footer(); ?>
</body>
</html>
