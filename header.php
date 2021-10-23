<!DOCTYPE html>
<html <?php language_attributes(); ?> <?php html_schema(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title itemprop="name"><?php bloginfo('name'); ?> | <?php is_front_page() ? bloginfo('description') : wp_title(''); ?></title>
  <meta name="description" content="<?php bloginfo('description') ?>">
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
  <!-- JQuery -->
  <script src="https://code.jquery.com/jquery-3.2.1.min.js" language="javascript "type="text/javascript"></script>
  <!-- Bootstrap -->
  <link href="<?php bloginfo('template_url');?>/src/css/bootstrap/<?php esc_html_e( get_theme_mod( 'theme_selector' ) ); ?>.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="<?php bloginfo('template_url');?>/src/css/font-awesome.min.css" rel="stylesheet">
  <!-- Owl Carousel -->
  <link href="<?php bloginfo('template_url');?>/src/css/owl-carousel.css" rel="stylesheet">
  <!-- Particles -->
  <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
  <!-- Main Css -->
  <link href="<?php bloginfo('template_url');?>/src/css/wordpress_widgets.css" rel="stylesheet">
  <link rel="stylesheet" href="https://getbootstrap.com/docs/3.3/assets/css/docs.min.css">
  <link href="<?php bloginfo('stylesheet_url');?>" rel="stylesheet">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
  <header>
      <nav class="navbar navbar-collapse navbar-default navbar-static-top <?php if(is_front_page()) : ?>absolute-full-width no-margin transparent <?php endif; ?>">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <?php if(has_custom_logo()) : the_custom_logo(); else : ?>
            <a class="navbar-brand" href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a>
          <?php endif; ?>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <?php
          wp_nav_menu( array(
            'menu'              => 'primary',
            'theme_location'    => 'primary',
            'depth'             => 2,
            'container'         => '',
            'container_class'   => '',
            'container_id'      => '',
            'menu_class'        => 'nav navbar-nav',
            'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
            'walker'            => new wp_bootstrap_navwalker())
          );
          ?>
          <?php
          wp_nav_menu( array(
            'menu'              => 'secondary',
            'theme_location'    => 'secondary',
            'depth'             => 2,
            'container'         => '',
            'container_class'   => '',
            'container_id'      => '',
            'menu_class'        => 'nav navbar-nav navbar-right',
            'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
            'walker'            => new wp_bootstrap_navwalker())
          );
          ?>
        </div>
        <!-- /.navbar-collapse -->
      </nav>
  </header>
  <!-- Section: Main -->
  <main>
