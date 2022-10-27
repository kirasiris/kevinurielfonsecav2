<?php get_header(); ?>
<!-- Section: Page-header -->
<?php include('includes/page-header.php'); ?>
<div class="<?php esc_html_e( get_theme_mod( 'theme_container' ) ); ?> mb-25">
  <div class="row content-row">
    <div class="col-md-8 content-area">
      <?php if(have_posts()) : the_post(); ?>
        <article class="<?php the_ID().the_slug(); ?>">
          <?php the_content(); ?>
        </article>
        <!-- Section: Comments -->
        <?php comments_template(); ?>
      <?php else : ?>
        <div class="alert alert-danger">No posts</div>
      <?php endif; ?>
    </div>
    <!-- Section: Sidebar -->
    <?php get_sidebar(); ?>
  </div>
</div>
<?php get_footer(); ?>
