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
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'starterpack' ); ?></a>

    <header id="masthead" class="site-header" role="banner">
		<div class="site-branding">

            <?php the_custom_logo(); ?>

            <div class="site-branding-text">
                <?php
                if ( is_front_page() && is_home() ) : ?>
                    <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                <?php else : ?>
                    <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                <?php
                endif;

                $description = get_bloginfo( 'description', 'display' );
                if ( $description || is_customize_preview() ) : ?>
                    <p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
                <?php
                endif; ?>
            </div>
		</div><!-- .site-branding -->
		<nav id="site-navigation" class="main-navigation" role="navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><i class="fa fa-bars" aria-hidden="true"></i></button>
            <?php if ( is_front_page() ) { 
                wp_nav_menu( array( 'theme_location' => 'menu-1', 'menu_id' => 'primary-menu' ) ); 
            } else {
                wp_nav_menu( array( 'theme_location' => 'menu-2', 'menu_id' => 'pages-menu' ) );
            } ?>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->
    <?php
        if ( is_front_page() ) : ?>
            <h1 class="blinking-text">Market Yourself</h1>
            <div class="scroll-to-content" id="scroll-to-content"><a href="#content"><i class="fa fa-chevron-down" aria-hidden="true"></i></a></div>
    <?php endif; ?>

    <?php if ( is_front_page() ) { ?>
        <figure class="header-video"> <?php the_custom_header_markup(); ?> </figure>
    <?php } else { ?>
        <figure class="header-image"> <?php the_custom_header_markup(); ?> </figure>
    <?php } ?>
	

	<div id="content" class="site-content">
