<?php if(is_single()) : ?>
  <div class="col-md-12"><h3 class="page-header">Related</h3></div>
  <div class="col-md-12 no-padding">
    <?php
    $categories = get_the_category($post->ID);
    if ($categories) {
      $category_ids = array();
      foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;
    }
    $args = array(
      'post_type'           => get_post_type(),
      'category__in'        => $category_ids,
      'post__not_in' 			  => array($post->ID),
      'post_status'         => 'publish',
      'orderby'             => 'rand',
      'posts_per_page'		  => 4, // Number of related posts that will be shown.
      'ignore_sticky_posts' => 1
    );
    $related_query = new wp_query( $args );
    ?>
    <?php while($related_query->have_posts()) : $related_query->the_post(); ?>
      <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 related-portfolios">
        <a href="<?php the_permalink(); ?>">
          <?php if(has_post_thumbnail()) : ?>
            <?php the_post_thumbnail(); ?>
          <?php else : ?>
            <?php no_image(); ?>
          <?php endif; ?>
        </a>
      </div>
    <?php endwhile; ?>
  </div>
<?php endif; ?>
