<?php
/**
 * The template for displaying landing page
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
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

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">


            <div class="website-blowout-sale"> <!-- website sale container -->

                <?php $image = get_field('website_sale_header_background'); ?>

                <section class="website-sale-header" style="background: url(<?php echo $image['url']; ?>) repeat center center"> <!-- website sale nav -->

                    <header role="banner"> <!-- navigation section -->

                        <nav role="navigation">
                            
                            <?php the_custom_logo();
                            
                                wp_nav_menu( array( 'theme_location' => 'menu-3', 'menu_id' => 'landing-page-menu' ) ); 
                            ?>

                        </nav><!-- #site-navigation -->

                    </header><!-- #masthead end navigation -->

                    <div class="website-sale-intro">

                        <?php if( get_field('website_sale_intro_header') ): ?>
                            <h2><?php the_field('website_sale_intro_header'); ?></h2>
                        <?php endif; ?> 

                        <?php if( get_field('website_sale_intro_content') ): ?>
                            <p><?php the_field('website_sale_intro_content'); ?></p>
                        <?php endif; ?> 

                        <?php if( get_field('website_sale_form') ):
                            the_field('website_sale_form');
                        endif; ?> 
                    
                    </div>

                </section>

                <section class="website-sale-faq"> <!--website sale faq -->

                    <div class="website-sale-column1">

                        <?php if( have_rows('faq_column1') ): ?>

                            <?php while ( have_rows('faq_column1') ) : the_row(); ?>

                                <div class="faq-column"> 

                                    <?php if( get_sub_field('faq_title') ): ?>
                                        <h3 class="faq-title"><?php the_sub_field('faq_title'); ?></h3>
                                    <?php endif;

                                    if( get_sub_field('faq_content') ): ?>
                                        <p class="faq-content"><?php the_sub_field('faq_content'); ?></p>
                                    <?php endif; ?>

                                </div>  <!-- end faq column -->

                            <?php endwhile;  ?>

                        <?php else : ?>

                            <p>Our approach is tried and tested</p>

                        <?php endif; ?>

                    </div> <!-- end faq column 1 -->

                    <div class="website-sale-column2">

                        <?php if( have_rows('faq_column2') ): ?>

                            <?php while ( have_rows('faq_column2') ) : the_row(); ?>

                                <div class="faq-column"> 

                                    <?php if( get_sub_field('faq_title') ): ?>
                                        <h3 class="faq-title"><?php the_sub_field('faq_title'); ?></h3>
                                    <?php endif;

                                    if( get_sub_field('faq_content') ): ?>
                                        <p class="faq-content"><?php the_sub_field('faq_content'); ?></p>
                                    <?php endif; ?>

                                </div>  <!-- end faq column -->

                            <?php endwhile;  ?>

                        <?php else : ?>

                            <p>Our approach is tried and tested</p>

                        <?php endif; ?>

                    </div> <!-- end faq column 2 -->

                </section> <!--end faq column container -->

            </div> <!--end website sale container -->

			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php wp_footer(); ?>
</body>
</html>