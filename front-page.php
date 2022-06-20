<style>
  #particles-js{
    background: linear-gradient(to bottom, rgba(0,0,0,0.7) 0%,rgba(0,0,0,0.7) 100%), url(<?php echo get_theme_mod('showcase_image', get_bloginfo('template_url').'/src/images/showcase.jpg'); ?>) no-repeat center center;
    /*background: linear-gradient(to bottom, rgba(255, 255, 255, 0.7) 0%,rgba(255, 255, 255, 0.7) 100%), url(<?php echo get_theme_mod('showcase_image', get_bloginfo('template_url').'/src/images/showcase.jpg'); ?>) no-repeat center center;*/
  }
</style>
<script src="https://unpkg.com/typewriter-effect@2.3.1/dist/core.js" charset="utf-8"></script>
<?php get_header(); ?>
<section class="showcase" id="particles-js">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 text-center">
                <h1><?php echo get_theme_mod('showcase_heading', 'Welcome to Showcase Wordpress Theme'); ?></h1>
                <p class="lead" id="headline-typewriter"></p>
                <?php if(get_theme_mod ('btn_text_first', 'Get Started') != '' || get_theme_mod ('btn_text_second', 'Get Started') != '' || get_theme_mod('btn_text_third', 'Get Started') != '' ) : ?>
                  <?php if(get_theme_mod ('btn_text_first', 'Get Started') != '') : ?>
                    <a class="btn btn-danger btn-md" href="<?php echo get_theme_mod('btn_url_first', '#'); ?>"><?php echo get_theme_mod('btn_text_first', 'Get Started'); ?></a>
                  <?php endif; ?>
                  <?php if(get_theme_mod ('btn_text_second', 'Get Started') != '') : ?>
                    <a class="btn btn-info btn-md" href="<?php echo get_theme_mod('btn_url_second', '#'); ?>"><?php echo get_theme_mod('btn_text_second', 'Get Started'); ?></a>
                  <?php endif; ?>
                  <?php if(get_theme_mod ('btn_text_third', 'Get Started') != '') : ?>
                    <a class="btn btn-default btn-md" href="<?php echo get_theme_mod('btn_url_third', '#'); ?>"><?php echo get_theme_mod('btn_text_third', 'Get Started'); ?></a>
                  <?php endif; ?>
                  <?php if(is_active_sidebar('front_page')) : ?>
                    	<?php dynamic_sidebar('front_page')  ?>
					        <?php else : ?>
						          <a href="<?= admin_url() ?>" class="btn btn-info btn-md">Administration</a>
                  <?php endif; ?>
                <?php endif;?>
            </div>
        </div>
    </div>
</section>
<!-- /Showcase -->
<script type="text/javascript">
/*
*
* particlesJS
*
*/
particlesJS("particles-js", {
  "particles": {
    "number": {
      "value": 180,
      "density": {
        "enable": true,
        "value_area": 800
      }
    },
    "color": {
      "value": "#ffffff"
    },
    "shape": {
      "type": "circle",
      "stroke": {
        "width": 0,
        "color": "#000000"
      },
      "polygon": {
        "nb_sides": 5
      }
    },

    "size": {
      "value": 3,
      "random": true,
      "anim": {
        "enable": false,
        "speed": 40,
        "size_min": 0.1,
        "sync": false
      }
    },

    "move": {
      "enable": true,
      "speed": 6,
      "direction": "none",
      "random": true,
      "straight": false,
      "out_mode": "out",
      "bounce": true,
      "attract": {
        "enable": false,
        "rotateX": 600,
        "rotateY": 1200
      }
    }
  },
  "interactivity": {
    "detect_on": "canvas",
    "events": {
      "onhover": {
        "enable": true,
        "mode": "repulse"
      },
      "onclick": {
        "enable": false,
        "mode": "push"
      },
      "resize": true
    },
    "modes": {
      "grab": {
        "distance": 140,
        "line_linked": {
          "opacity": 1
        }
      },
      "bubble": {
        "distance": 400,
        "size": 40,
        "duration": 2,
        "opacity": 8,
        "speed": 3
      },
      "repulse": {
        "distance": 100,
        "duration": 0.4
      },
      "push": {
        "particles_nb": 4
      },
      "remove": {
        "particles_nb": 2
      }
    }
  },
  "retina_detect": true
});
/*
*
* Typewriter
*
*/
var app = document.getElementById('headline-typewriter');

var typewriter = new Typewriter(app, {
    loop: true
});

typewriter
    .typeString('<?php echo get_theme_mod('showcase_text', 'Sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aenean eu leo quam'); ?>')
    .pauseFor(1500)
    .deleteAll()
    .start();
</script>
<?php get_footer(); ?>
