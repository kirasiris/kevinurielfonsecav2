<?php
  function wpb_customize_register($wp_customize){
    /*
    *
    * DEFAULT SITE ICON
    *
    */
    $wp_customize->add_setting( 'site_icon' , array(
      'default' => get_bloginfo('template_directory').'/site_icon.png',
      'type'    => 'theme_mod'
    ));
    /*
    *
    * DEFAULT SITE LOGO
    *
    */
    $wp_customize->add_setting( 'custom_logo' , array(
      'default' => get_bloginfo('template_directory').'/site_logo.png',
      'type'    => 'theme_mod'
    ));    
    /*
    *
    * SHOWCASE SECTION
    *
    */
    $wp_customize->add_section('showcase', array(
      'title'   => __('Showcase', 'kevinurielfonsecav2'),
      'description' => sprintf(__('Options for showcase','kevinurielfonsecav2')),
      'priority'    => 130
    ));
    /*
    *
    * SHOWCASE BACKGROUND FILE ATTACHMENT
    *
    */
    $wp_customize->add_setting('showcase_image', array(
      'default'   => get_bloginfo('template_directory').'/src/images/showcase.jpg',
      'type'      => 'theme_mod'
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'showcase_image', array(
      'label'   => __('Showcase Image', 'kevinurielfonsecav2'),
      'section' => 'showcase',
      'settings' => 'showcase_image',
      'priority'  => 1
    )));
    /*
    *
    * SHOWCASE THEME SELECTOR
    *
    */
    $wp_customize->add_setting('theme_selector', array(
      'default'   => _x('bootstrap', 'kevinurielfonsecav2'),
      'type'      => 'theme_mod'
    ));

    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'theme_selector', array(
    'label'       => __( 'Select Theme Name', 'kevinurielfonsecav2' ), //Admin-visible name of the control
    'description' => __( 'Using this option you can change the theme colors' ),
    'priority'    => 90, //Determines the order this control appears in for the specified section
    'section'     => 'title_tagline', //ID of the section this control should render in (can be one of yours, or a WordPress default section)
    'type'        => 'select',
    'choices'     => array(
        'bootstrap'   => 'Default',
        'cerulean'  => 'Cerulean',
        'cosmo'     => 'Cosmo',
        'cyborg'    => 'Cyborg',
        'darkly'    =>  'Darkly',
        'flatly'    =>  'Flatly',
        'journal'   =>  'Journal',
        'lumen'     =>  'Lumen',
        'paper'     =>  'Paper',
        'readable'  =>  'Readable',
        'sandstone' =>  'Sandstone',
        'simplex'   =>  'Simplex',
        'slate'     =>  'Slate',
        'solar'     =>  'Solar',
        'spacelab'  =>  'Spacelab',
        'superhero' =>  'Superhero',
        'united'    =>  'United',
        'yeti'      =>  'Yeti',
      )
    )));
    /*
    *
    * SHOWCASE THEME CONTAINER SELECTOR
    *
    */
    $wp_customize->add_setting('theme_container', array(
      'default'   => _x('container', 'kevinurielfonsecav2'),
      'type'      => 'theme_mod'
    ));

    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'theme_container', array(
    'label'       => __( 'Select Theme Container', 'kevinurielfonsecav2' ), //Admin-visible name of the control
    'description' => __( 'Using this option you can change the theme container' ),
    'priority'    => 90, //Determines the order this control appears in for the specified section
    'section'     => 'title_tagline', //ID of the section this control should render in (can be one of yours, or a WordPress default section)
    'type'        => 'select',
    'choices'     => array(
        'container'          => 'Container',
        'container-fluid'    => 'Container Fluid',
      )
    )));
    /*
    *
    * SHOWCASE THEME SIDEBAR POSITION SELECTOR
    *
    */
    $wp_customize->add_setting('theme_sidebar_position', array(
      'default'   => _x('right', 'kevinurielfonsecav2'),
      'type'      => 'theme_mod'
    ));

    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'theme_sidebar_position', array(
    'label'       => __( 'Select Sidebar Theme Position', 'kevinurielfonsecav2' ), //Admin-visible name of the control
    'description' => __( 'Using this option you can change the sidebar theme position' ),
    'priority'    => 90, //Determines the order this control appears in for the specified section
    'section'     => 'title_tagline', //ID of the section this control should render in (can be one of yours, or a WordPress default section)
    'type'        => 'select',
    'choices'     => array(
        'left'     => 'Left',
        'right'    => 'Right',
      )
    )));
    /*
    *
    * SHOWCASE HEADING TEXT
    *
    */
    $wp_customize->add_setting('showcase_heading', array(
      'default'   => _x('Custom Bootstrap Portfolio Wordpress Theme', 'kevinurielfonsecav2'),
      'type'      => 'theme_mod'
    ));

    $wp_customize->add_control('showcase_heading', array(
      'label'   => __('Showcase Heading', 'kevinurielfonsecav2'),
      'section' => 'showcase',
      'priority'  => 3
    ));
    /*
    *
    * SHOWCASE PARAGRAPH TEXT
    *
    */
    $wp_customize->add_setting('showcase_text', array(
      'default'   => _x('Sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aenean eu leo quam', 'kevinurielfonsecav2'),
      'type'      => 'theme_mod'
    ));

    $wp_customize->add_control('showcase_text', array(
      'label'   => __('Text', 'kevinurielfonsecav2'),
      'section' => 'showcase',
      'priority'  => 4
    ));
    /*
    *
    * SHOWCASE FIRST BTN TEXT
    *
    */
    $wp_customize->add_setting('btn_text_first', array(
      'default'   => _x('Read more', 'kevinurielfonsecav2'),
      'type'      => 'theme_mod'
    ));

    $wp_customize->add_control('btn_text_first', array(
      'label'   => __('First button text', 'kevinurielfonsecav2'),
      'section' => 'showcase',
      'priority'  => 6
    ));
    /*
    *
    * SHOWCASE FIRST BTN URL
    *
    */
    $wp_customize->add_setting('btn_url_first', array(
      'default'   => _x('#', 'kevinurielfonsecav2'),
      'type'      => 'theme_mod'
    ));

    $wp_customize->add_control('btn_url_first', array(
      'label'   => __('First button URL', 'kevinurielfonsecav2'),
      'section' => 'showcase',
      'priority'  => 7
    ));
    /*
    *
    * SHOWCASE SECOND BTN TEXT
    *
    */
    $wp_customize->add_setting('btn_text_second', array(
      'default'   => _x('Read more', 'kevinurielfonsecav2'),
      'type'      => 'theme_mod'
    ));

    $wp_customize->add_control('btn_text_second', array(
      'label'   => __('Second button text', 'kevinurielfonsecav2'),
      'section' => 'showcase',
      'priority'  => 8
    ));
    /*
    *
    * SHOWCASE SECOND BTN URL
    *
    */
    $wp_customize->add_setting('btn_url_second', array(
      'default'   => _x('#', 'kevinurielfonsecav2'),
      'type'      => 'theme_mod'
    ));

    $wp_customize->add_control('btn_url_second', array(
      'label'   => __('Second button URL', 'kevinurielfonsecav2'),
      'section' => 'showcase',
      'priority'  => 9
    ));
    /*
    *
    * SHOWCASE THIRD BTN TEXT
    *
    */
    $wp_customize->add_setting('btn_text_third', array(
      'default'   => _x('Read more', 'kevinurielfonsecav2'),
      'type'      => 'theme_mod'
    ));

    $wp_customize->add_control('btn_text_third', array(
      'label'   => __('Third button text', 'kevinurielfonsecav2'),
      'section' => 'showcase',
      'priority'  => 10
    ));
    /*
    *
    * SHOWCASE THIRD BTN URL
    *
    */
    $wp_customize->add_setting('btn_url_third', array(
      'default'   => _x('#', 'kevinurielfonsecav2'),
      'type'      => 'theme_mod'
    ));

    $wp_customize->add_control('btn_url_third', array(
      'label'   => __('Third button URL', 'kevinurielfonsecav2'),
      'section' => 'showcase',
      'priority'  => 11
    ));
// end of customizer function //
  }
  add_action('customize_register', 'wpb_customize_register');
