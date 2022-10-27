<?php get_header(); ?>
<!-- Section: Page-header -->
<?php include('includes/page-header.php'); ?>
<div class="<?php esc_html_e( get_theme_mod( 'theme_container' ) ); ?> mb-25">
  <div class="row content-row">
    <div class="col-lg-8 col-md-8 content-area">
      <?php if(have_posts()) : ?>
        <div class="col-blog" id='fetch-more'>
          <?php get_template_part('loop') ?>
        </div>
      <?php else : ?>
        <div class="alert alert-danger no-posts">No posts</div>
      <?php endif; ?>
      <!-- Section: Pagination -->
      <div class="clearfix"></div>
      <div class="col-lg-12">
        <?php numeric_pagination(); ?>
      </div>
    </div>
    <!-- Section: Sidebar -->
    <?php get_sidebar(); ?>
  </div>
</div>
<?php get_footer(); ?>
