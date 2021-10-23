<?php get_header(); ?>
<!-- Section: Page-header -->
<?php include('includes/page-header.php'); ?>
<div class="<?php esc_html_e( get_theme_mod( 'theme_container' ) ); ?> mb-25">
  <!-- Section: Loop Container -->
  <div class="row">
    <!-- Section: Categories -->
    <div class="col-md-12 portfolio-categories-filter">
      <button class="btn btn-default btn-sm" data-toggle="portfilter" data-target="all">All</button>
      <?php
      $terms = get_terms("download_category"); // Get all the terms from the specific Custom Taxonomy
      $termsString .=  $term->slug;
      $count = count($terms); // How many terms?
      if ( $count > 0 ):  // If there are more than one
        foreach ( $terms as $term ) :  // For each term:
          echo "<button class='btn btn-sm btn-primary' data-toggle='portfilter' data-target='".$term->slug."'>".$term->name."</button>\n";
        endforeach;
      endif;
      ?>
    </div>
    <div class="col-md-12">
      <?php if(have_posts()) : ?>
        <div class="col">
          <?php while(have_posts()) : the_post();?>
            <?php
              $terms_portfolio = get_the_terms( $post->ID, 'download_category');
              if ($terms_portfolio) {
              $terms_portfolio_slugs = array();
              foreach ($terms_portfolio as $tp) {
                $terms_portfolio_slugs[] = $tp->slug;
              }
              $terms_portfolio_csv = implode (' ',$terms_portfolio_slugs);
            }
            ?>
            <article class="<?php the_ID().the_slug(); ?>" data-tag="<?php echo $terms_portfolio_csv; ?>" itemscope itemtype="http://schema.org/BlogPosting" itemprop="blogPost">
              <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                <?php if(has_post_thumbnail()) {
                  the_post_thumbnail('portfolio-page', array('class' => 'img-responsive'));
                } else {
                  no_image();
                }
                ?>
              </a>
            </article>
          <?php endwhile; ?>
        </div>
        <!-- Section: Pagination -->
        <div class="clearfix"></div>
        <div class="col-md-12"><?php numeric_pagination(); ?></div>
      <?php else : ?>
        <div class="alert alert-danger no-posts">No portfolio found</div>
      <?php endif; ?>
    </div>
  </div>
</div>
<!-- /.row -->
<?php get_footer(); ?>
