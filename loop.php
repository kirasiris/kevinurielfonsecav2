<?php while(have_posts()) : the_post(); ?>
  <article class="<?php the_ID().the_slug(); ?>" itemscope itemtype="http://schema.org/BlogPosting" itemprop="blogPost">
    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
      <?php if(has_post_thumbnail()) {
        the_post_thumbnail('portfolio-page', array('class' => 'img-responsive'));
      } else {
        no_image();
      }
      ?>
    </a>
    <div class="thumbnail no-radious no-padding">
      <div class="caption">
        <a href="<?php the_permalink(); ?>" itemprop="url" title="<?php the_title_attribute(); ?>"><h4 class="list-group-item-heading" itemprop="headline"><?php the_title(); ?></h4></a>
        <hr>
        <p class="list-group-item-text" itemprop="text"><?php echo get_the_excerpt(); ?></p>
        <hr>
        <div class="row">
          <div class="col-xs-12 col-md-6">
            <i class="fa fa-clock-o" aria-hidden="true"></i> <time itemprop="datePublished"><?php the_time('F jS, Y'); ?></time>
            <i class="fa fa-comments" aria-hidden="true"></i> <?php comments_number( '0', '1', '%' ); ?>
          </div>
          <div class="col-xs-12 col-md-6">
            <a class="btn btn-default btn-xs pull-right" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">Read more</a>
          </div>
        </div>
      </div>
    </div>
  </article>
  <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-7136941557526274"
     crossorigin="anonymous"></script>
<ins class="adsbygoogle"
     style="display:block"
     data-ad-format="fluid"
     data-ad-layout-key="-5z+bt+j-10+i1"
     data-ad-client="ca-pub-7136941557526274"
     data-ad-slot="3359520348"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>
<?php endwhile; ?>