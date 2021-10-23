<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php bloginfo('name'); ?> | <?php is_front_page() ? bloginfo('description') : wp_title(''); ?></title>
  <meta name="description" content="<?php bloginfo('description') ?>">
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
  <?php wp_head(); ?>
  <style type="text/css">
      body { color: #000000; background-color: #FFFFFF; }
      a:link { color: #0000CC; }
      p, address {margin-left: 3em;}
      span {font-size: smaller;}
  </style>
</head>
<body <?php body_class(); ?>>
<h1>Object not found!</h1>
<p>The requested URL was not found on this server.If you entered the URL manually please check your spelling and try again.</p>
<p>If you think this is a server error, please do not contact the <a href="<?php bloginfo('url'); ?>">webmaster</a></p>
<h2>Error 404</h2>
<address>
  <a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a><br />
  <span>Apache/2.4.27 (Win32) OpenSSL/1.0.2l PHP/7.1.8</span>
</address>
</body>
</html>
