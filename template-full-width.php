<?php
/*
*
* Template Name: Full-Width Page
* Template Post Type: page, post, snippets
*
*/
?>
<?php get_header(); ?>
<!-- Section: Page-header -->
<?php include('includes/page-header.php'); ?>
<div class="<?php esc_html_e( get_theme_mod( 'theme_container' ) ); ?> mb-25">
  <?php if(have_posts()) : the_post(); ?>
    <!-- Section: Meta -->
    <?php include('includes/meta.php'); ?>
    <div class="row">
      <div class="col-md-12">
          <article class="<?php the_ID().the_slug(); ?>" itemscope itemtype="http://schema.org/BlogPosting" itemprop="blogPost">
            <?php the_content(); ?>
          </article>
      </div>
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
