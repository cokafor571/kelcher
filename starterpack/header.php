<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Starterpack
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-svg">
<head>

<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-K4HJN6W');</script>
<!-- End Google Tag Manager -->

<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-K4HJN6W"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'starterpack' ); ?></a>

    <header id="masthead" class="site-header" role="banner">

        <div class="nav">

            <div class="site-branding">

                <?php if ( is_front_page() ) { 

                    the_custom_logo(); ?>

                    <a href="https://kelcherpromotions.com/" class="custom-logo-link" rel="home" itemprop="url">
                        <img src="https://kelcherpromotions.com/wp-content/uploads/2018/04/kelcher_logo_black.png" class="custom-logo-black" alt="kelcher promotions logo" itemprop="logo">
                    </a>

                <?php } else { ?>
                    <a href="https://kelcherpromotions.com/" class="custom-logo-link" rel="home" itemprop="url">
                        <img src="https://kelcherpromotions.com/wp-content/uploads/2018/04/kelcher_logo_black.png" class="custom-logo-black" alt="kelcher promotions logo" itemprop="logo">
                    </a>
                <?php } ?>

            </div><!-- .site-branding -->

            <nav id="site-navigation" class="main-navigation" role="navigation">
                
            <!-- <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><i class="fa fa-bars" aria-hidden="true"></i></button> -->
            
                <?php if ( is_front_page() ) { 
                    wp_nav_menu( array( 'theme_location' => 'menu-1', 'menu_id' => 'primary-menu' ) ); 
                } else {
                    wp_nav_menu( array( 'theme_location' => 'menu-2', 'menu_id' => 'pages-menu' ) );
                } ?>

            </nav><!-- #site-navigation -->

        </div> <!-- nav container -->

        <div class="login-nav"> <!-- login nav container -->
            <a href="kelcher.test/login">
                <h3>LogIn</h3>
            </a>
        </div> <!-- end login nav container -->
         
	</header><!-- #masthead -->

	<div id="content" class="site-content">
