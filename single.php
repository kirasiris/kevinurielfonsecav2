<?php get_header(); ?>
<!-- Section: Page-header -->
<?php include('includes/page-header.php'); ?>
<div class="<?php esc_html_e( get_theme_mod( 'theme_container' ) ); ?> mb-25">
  <?php if(have_posts()) : the_post(); ?>
    <!-- Section: Meta -->
    <?php include('includes/meta.php'); ?>
    <div class="row content-row">
      <div class="col-md-8 content-area">
          <article class="<?php the_ID().the_slug(); ?>" itemscope itemtype="http://schema.org/BlogPosting" itemprop="blogPost">
            <?php the_content(); ?>
            <?php include('includes/amazon_ads.php') ?>
          </article>
      </div>
      <!-- Section: Sidebar -->
      <?php get_sidebar(); ?>
      <!-- Section: Related -->
      <?php // include('includes/related.php'); ?>
      <!-- Section: Comments -->
      <div class="col-md-12"><?php comments_template(); ?></div>
    </div>
  <?php else : ?>
    <div class="alert alert-danger">No posts</div>
  <?php endif; ?>
</div>
<?php get_footer(); ?>
