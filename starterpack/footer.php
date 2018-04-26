<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Starterpack
 */

?>

	</div><!-- #content -->

    <?php get_sidebar( 'footer' ); ?>

	<footer id="colophon" class="site-footer" role="contentinfo">
    <div class="footer-border"></div>
        <?php
        // Make sure there is a social menu to display.
        if ( has_nav_menu( 'social' ) ) { ?>
            <nav class="social-menu">
                <?php wp_nav_menu( array( 'theme_location' => 'social' ) ); ?>
            </nav><!-- .social-menu -->
        <?php } ?>
        
		<div class="site-info">
            <h2 class="footer-copy">&copy; Kelcher Promotions 2018</h2>
            <a href="https://www.facebook.com/kelcherpromotions/" target="_blank">
                <i class="fab fa-facebook-f"></i>
            </a>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>
