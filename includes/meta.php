<?php if(is_single()) : ?>
  <div class="row">
    <div class="col-xs-12 col-md-12">
      <i class="fa fa-clock-o" aria-hidden="true"></i> <time itemprop="datePublished"><?php the_time('F jS, Y'); ?></time> |
      <i class="fa fa-comments" aria-hidden="true"></i> <?php comments_number( '0', '1', '%' ); ?> |
      <i class="fa fa-user" aria-hidden="true"></i> <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php the_author(); ?></a> |
      <?php if(the_category(', ')){
        the_category(', ');
      } elseif ( the_terms( $post->ID, 'snippet_categories', 'Categories: ', ', ', '' ) ) {
        the_terms( $post->ID, 'snippet_categories', 'Categories: ', ', ', '' );
      } else {
        the_terms( $post->ID, 'download_category', 'Categories: ', ', ', '' );
      }
      ?>
      <?php if(the_tags()) {
        the_tags();
      } elseif ( the_terms( $post->ID, 'snippet_tags', 'Tags: ', ', ', '' ) ) {
        the_terms( $post->ID, 'snippet_tags', 'Tags: ', ', ', '' );
      } else {
        the_terms( $post->ID, 'download_tag', 'Tags: ', ', ', '' );
      }
      ?>
    </div>
  </div>
  <hr>
<?php endif; ?>
