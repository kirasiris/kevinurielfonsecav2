<?php get_header(); ?>
<!-- Section: Page-header -->
<?php include('includes/page-header.php'); ?>
<div class="<?php esc_html_e( get_theme_mod( 'theme_container' ) ); ?> mb-25">
  <?php if(have_posts()) : the_post(); ?>
    <!-- Section: Meta -->
    <?php include('includes/meta.php'); ?>
    <div class="row">
      <!-- Section: Container -->
      <div class="col-md-7">
          <article class="<?php the_ID().the_slug(); ?>" itemscope itemtype="http://schema.org/BlogPosting" itemprop="blogPost">
            <?php if(has_post_thumbnail()) : ?>
              <?php the_post_thumbnail(); ?>
            <?php else : ?>
              <?php no_image(); ?>
            <?php endif; ?>
          </article>
      </div>
      <!-- Section: Sidebar -->
      <aside>
        <div class="col-md-5">
          <?php the_content(); ?>
          <?php if(is_active_sidebar('edd_sidebar')) {
            dynamic_sidebar('edd_sidebar');
          }
          ?>
          <hr>
          <?php $demostracion_url = get_post_meta($post->ID, 'preview_link', true); ?>
          <?php if ($demostracion_url == '#') : ?>
          <?php else : ?>
            <a href="<?php echo preview_link(get_the_ID()); ?>" class="btn btn-default btn-sm" target="_blank" rel="noopener nofollow noreferrer">View Demo</a>
          <?php endif; ?>
        </div>
      </aside>
      <!-- Section: Related -->
      <div class="col-md-12">
        <h3 class="page-header">Related</h3>
      </div>
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
          <div class="col-sm-3 col-xs-6 related-portfolios">
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
      <!-- Section: Comments -->
		<div class="col-md-12">
       <?php comments_template(); ?>
      </div>
   </div>
  <?php else : ?>
    <div class="alert alert-danger">No post found</div>
  <?php endif; ?>
</div>
<?php get_footer(); ?>