<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package mad_design
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<!--[if IE ]> <html class="ie" <?php language_attributes(); ?>> <![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/img/favicon.ico" type="image/x-icon">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <style>
        .preloader {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            z-index: 9999;
            background-color: #fff;
        }
        .pulse {
            position: relative;
            left: 50%;
            top: 50vh;
            margin: -40px 0 0 -40px;
        }
        .pulse::after, .pulse::before {
           content: '';
           border: 5px solid #121212;
           height: 80px;
           width: 80px;
           -webkit-border-radius: 50%;
           border-radius: 50%;
           position: absolute;
        }
        .pulse::before {
             -webkit-animation: pulse-outer .8s ease-in infinite;
             animation: pulse-outer .8s ease-in infinite;
        }
        .pulse::after {
             -webkit-animation: pulse-inner .8s ease-in infinite;
             animation: pulse-inner .8s ease-in infinite;
        }


        @-webkit-keyframes pulse-outer {
            0% {
                opacity: .1;
            }
            50% {
                opacity: .5;
            }
            100% {
                opacity: 0;
            }
        }
        @keyframes pulse-outer {
            0% {
                opacity: .1;
            }
            50% {
                opacity: .5;
            }
            100% {
                opacity: 0;
            }
        }
        @-webkit-keyframes pulse-inner {
            0% {
                opacity: 1;
                -webkit-transform: scale(0);
                transform: scale(0);
            }
            100% {
                opacity: 0;
                -webkit-transform: scale(1);
                transform: scale(1);
            }
        }
        @keyframes pulse-inner {
            0% {
                opacity: 1;
                -webkit-transform: scale(0);
                transform: scale(0);
            }
            100% {
                opacity: 0;
                -webkit-transform: scale(1);
                transform: scale(1);
            }
        }
    </style>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div class="preloader">
    <div class="pulse"></div>
</div>
<header>
    <nav class="navbar navbar-expand-md fixed-top">
        <div class="container">
            <div class="navbar-brand d-md-flex align-items-center">
                <span class="col logo pl-0"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php the_custom_logo(); ?></a></span>
				<a class="phone-number d-block d-md-none" href="tel:+380676706165">+38 067 670 6165</a>
                <?php
                $mad_design_description = get_bloginfo( 'description', 'display' );
                if ( $mad_design_description || is_customize_preview() ) :
                    ?>
                    <span class="col slogan"><?php echo $mad_design_description; /* WPCS: xss ok. */ ?></span>
                <?php endif; ?>
            </div>
            <button class="navbar-toggler hamburger hamburger--collapse " type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
              <span class="hamburger-box">
                <span class="hamburger-inner"></span>
              </span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <?php
                wp_nav_menu( array(
                    'theme_location'  => 'top-menu',
                    'depth'           => 2,
                    'container'       => 'div',
                    'container_class' => 'ml-auto',
                    'menu_class'      => 'nav navbar-nav mr-auto',
                    'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
                    'walker'          => new WP_Bootstrap_Navwalker()
                ) );
                ?>
                <div class="form-inline mt-2 mt-md-0">
                    <div class="phone-box">
                      	<a class="phone-number" href="tel:+380676706165">+38 067 670 6165</a>
                        <div class="clearfix"></div>
                        <a href="#" class="phone-btn tdu" data-toggle="modal" data-target="#leave-a-request">Замовити дзвінок</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>
<div id="page" class="site">
	<div id="content" class="container site-content">