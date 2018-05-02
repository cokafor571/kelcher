<?php
/**
 * The template for displaying all pages
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

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<!-- Home Page Custom Fields -->

			<?php if( is_page( 'Kelcher Promotions' ) ) : ?>

			<div class="home-page"> <!-- home container -->

				<section class="home-header"> <!-- video and picture header -->

					<div class="video-header"> <!-- video header -->

						<?php

						// get iframe HTML
						$iframe = get_field('home_header_video');

						// use preg_match to find iframe src
						preg_match('/src="(.+?)"/', $iframe, $matches);
						$src = $matches[1];

						// add extra params to iframe src
						$params = array(
							'controls'    => 0,
							'loop'    => 1,
							'disablekb'    => 1,
							'showinfo'    => 0,
							'modestbranding'    => 0,
							'branding'    => 0,
							'background'    => 1,
							'rel'    => 0,
							'autoplay'    => 1,
							'hd'        => 1,
							'autohide'    => 1
						);

						$new_src = add_query_arg($params, $src);

						$iframe = str_replace($src, $new_src, $iframe);

						// add extra attributes to iframe html
						$attributes = 'frameborder="0"';

						$iframe = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $iframe);

						// echo $iframe
						echo $iframe;

						?>

						<div class="video-header-content">

							<?php if( get_field('home_header_title') ): ?>
								<h1 class="title"><?php the_field('home_header_title'); ?></h1>
							<?php endif;
						 	if( get_field('home_header_tagline') ): ?>
								<p class="tagline"><?php the_field('home_header_tagline'); ?></p>
							<?php endif; ?>

							<div class="header-buttons">

								<?php $link = get_field('header_about_link');

								if( $link ): ?>
									
									<a class="btn1" href="<?php echo $link['url']; ?>">
										<?php echo $link['title']; ?>
									</a>
								
								<?php endif;

								$link = get_field('header_work_link');

								if( $link ): ?>
									
									<a class="btn2" href="<?php echo $link['url']; ?>">
										<?php echo $link['title']; ?>
									</a>
								
								<?php endif; ?>

							</div>

						</div>

					</div> <!-- end video header -->

					<?php $image = get_field('home_header_picture'); ?>

					<div class="picture-header" style="background: url(<?php echo $image['url']; ?>) no-repeat center center; background-size:cover"> <!-- picture header -->

						<div class="picture-header-content">

							<?php if( get_field('home_header_title') ): ?>
								<h1 class="title"><?php the_field('home_header_title'); ?></h1>
							<?php endif;
							if( get_field('home_header_tagline') ): ?>
								<p class="tagline"><?php the_field('home_header_tagline'); ?></p>
							<?php endif; ?>

							<div class="header-buttons">

								<?php $link = get_field('header_about_link');

								if( $link ): ?>
									
									<a class="btn1" href="<?php echo $link['url']; ?>">
										<?php echo $link['title']; ?>
									</a>
								
								<?php endif;

								$link = get_field('header_services_link');

								if( $link ): ?>
									
									<a class="btn2" href="<?php echo $link['url']; ?>">
										<?php echo $link['title']; ?>
									</a>
								
								<?php endif; ?>

							</div>

						</div>

					</div> <!-- end picture header -->

				</section> <!-- end video picture header -->

				<section class="intro-text"> <!-- intro header text -->

					<?php if( get_field('intro_heading') ): ?>
						<h1><?php the_field('intro_heading'); ?></h1>
					<?php endif;
					
					if( get_field('intro_tagline') ): ?>
						<p class="home-tagline"><?php the_field('intro_tagline'); ?></p>
					<?php endif;

					if( get_field('intro_description') ): ?>
						<p class="home-description"><?php the_field('intro_description'); ?></p>
					<?php endif; ?>

				</section> <!-- end intro header -->

				<section class="home-approach"> <!-- home our approach -->

					<?php 
						if( have_rows('home_our_approach') ): ?>

							<?php while ( have_rows('home_our_approach') ) : the_row(); ?>

								<div class="approach-block"> <!-- our approach block -->

									<?php $image = get_sub_field('our_approach_image'); ?>
									<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
									
									<?php if( get_sub_field('our_approach_title') ): ?>
										<p class="approach-title"><?php the_sub_field('our_approach_title'); ?></p>
									<?php endif;
									
									if( get_sub_field('our_approach_description') ): ?>
										<p class="approach-description"><?php the_sub_field('our_approach_description'); ?></p>
									<?php endif; ?>

								</div> <!-- end our approach block -->

							<?php endwhile;  ?>

						<?php else : ?>

							<p>Our approach is tried and tested</p>

						<?php endif;
					?>

				</section> <!-- end home approach -->

				<section class="home-services"> <!-- home services -->

					<div class="full-service-list">

						<?php if( get_field('intro_service_text') ): ?>
							<h3><?php the_field('intro_service_text'); ?></h3>
						<?php endif;

						$link = get_field('services_link');

						if( $link ): ?>
							
							<a href="<?php echo $link['url']; ?>">
								<?php echo $link['title']; ?>
							</a>
						
						<?php endif; ?>

					</div>

					<div class="individual-services"> <!-- begin individual services -->

					<?php 
						if( have_rows('home_individual_services') ): ?>

							<?php while ( have_rows('home_individual_services') ) : the_row(); ?>

								<div class="individual-service"> <!-- individual service -->

									<div class="animated-field"> <!-- begin visible service field -->

										<?php $icon = get_sub_field('animated_icon'); ?>
										<i class="<?php the_sub_field('animated_icon'); ?>"></i>
										
										<?php if( get_sub_field('animated_title') ): ?>
											<h3><?php the_sub_field('animated_title'); ?></h3>
										<?php endif; ?>
									
									</div> <!-- end visible service field -->

									<div class="hidden-field"> <!-- begin hidden service field -->
										
										<?php if( get_sub_field('hidden_text') ): ?>
											<p><?php the_sub_field('hidden_text'); ?></p>
										<?php endif;

										$link = get_sub_field('hidden_service_link');

										if( $link ): ?>
											
											<a href="<?php echo $link['url']; ?>">
												<?php echo $link['title']; ?>
											</a>
										
										<?php endif; ?>
									
									</div> <!-- end hidden service field -->

								</div> <!-- end individual service -->

							<?php endwhile;  ?>

						<?php else : ?>

							<p>Our approach is tried and tested</p>

						<?php endif;
					?>

					</div> <!-- end individual services -->

				</section> <!-- end home services -->

				<section class="home-work-section"> <!-- home work section -->

					<div class="home-work-text">

						<?php if( get_field('work_headline') ): ?>
							<h4><?php the_field('work_headline'); ?></h4>
						<?php endif;

						if( get_field('work_body') ): ?>
							<p><?php the_field('work_body'); ?></p>
						<?php endif;

						$link = get_field('work_link');

						if( $link ): ?>
							
							<a class="home-work-link" href="<?php echo $link['url']; ?>">
								<?php echo $link['title']; ?>
							</a>
						
						<?php endif; ?>

					</div>

					<div class="home-work-image">
						<?php $image = get_field('work_image'); ?>
						<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
					</div>

				</section> <!-- end home work -->

				<section class="home-brands-section"> <!-- home brands section -->

					<div class="home-brand-text">

						<?php if( get_field('brand_headline') ): ?>
							<h4><?php the_field('brand_headline'); ?></h4>
						<?php endif;

						if( get_field('brand_body') ): ?>
							<p><?php the_field('brand_body'); ?></p>
						<?php endif;

						$link = get_field('brand_link');

						if( $link ): ?>
							
							<a class="home-brand-link" href="<?php echo $link['url']; ?>">
								<?php echo $link['title']; ?>
							</a>
						
						<?php endif; ?>

					</div>

					<div class="home-brand-image">
						<?php $image = get_field('brand_image'); ?>
						<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
					</div>

				</section> <!-- end home brands -->

				<section class="homepage-contact"> <!-- home contact section -->

					<?php $image = get_field('contact_image'); ?>

					<div class="homepage-contact-container" style="background: url(<?php echo $image['url']; ?>) no-repeat center center; background-size:cover">
						
						<?php if( get_field('contact_title') ): ?>
							<h4><?php the_field('contact_title'); ?></h4>
						<?php endif;

						if( get_field('contact_tagline') ): ?>
							<p><?php the_field('contact_tagline'); ?></p>
						<?php endif;

						$link = get_field('contact_link');

						if( $link ): ?>
							
							<a class="home-contact-link" href="<?php echo $link['url']; ?>"><?php echo $link['title']; ?></a>
						
						<?php endif; ?>

					</div>

				</section> <!-- end home contact -->

			</div> <!-- end home container -->

			<?php endif; ?> 

		<!-- End Home Custom Fields -->
		

		<!-- Services Custom Fields -->

		<?php if( is_page( 'Services' ) ) : ?>

		<div class="services"> <!-- Services container -->

			<section class="services-header"> <!-- services header -->

				<?php $image = get_field('services_header_picture'); ?> <!-- desktop services header picture -->

				<div class="picture-header" style="background: url(<?php echo $image['url']; ?>) no-repeat center center; background-size:cover">

					<?php if( get_field('services_header_title') ): ?>
						<h1 class="header-title"><?php the_field('services_header_title'); ?></h1>
					<?php endif;

					if( get_field('services_header_tagline') ): ?>
						<p class="header-tagline"><?php the_field('services_header_tagline'); ?></p>
					<?php endif; ?>

				</div> <!-- end desktop services header picture -->

				<?php $imagem = get_field('services_header_picture_mobile'); ?> <!-- mobile services header picture -->

				<div class="picture-header-mobile" style="background: url(<?php echo $imagem['url']; ?>) no-repeat center center; background-size:cover">

					<?php if( get_field('services_header_title') ): ?>
						<h1 class="header-title"><?php the_field('services_header_title'); ?></h1>
					<?php endif;

					if( get_field('services_header_tagline') ): ?>
						<p class="header-tagline"><?php the_field('services_header_tagline'); ?></p>
					<?php endif; ?>

				</div> <!-- end mobile services header picture-->

			</section> <!-- end services header -->

			<section class="page-intro"> <!-- services intro text -->

				<?php if( get_field('services_intro_heading') ): ?>
					<h2><?php the_field('services_intro_heading'); ?></h2>
				<?php endif;

				if( get_field('services_intro_description') ): ?>
					<p class="description"><?php the_field('services_intro_description'); ?></p>
				<?php endif; ?>

			</section> <!-- end services intro -->

			<section class="services-block"> <!-- begin services -->

				<?php 
					if( have_rows('services') ): ?>

						<?php while ( have_rows('services') ) : the_row(); ?>

							<div class="individual-service"> 

								<?php $icon = get_sub_field('service_fa_icon'); ?>
								<i class="<?php the_sub_field('service_fa_icon'); ?>"></i>

								<?php if( get_sub_field('service_title') ): ?>
									<h3 class="service-title"><?php the_sub_field('service_title'); ?></h3>
								<?php endif;

								if( get_sub_field('service_content') ): ?>
									<p class="service-description"><?php the_sub_field('service_content'); ?></p>
								<?php endif;
								
								$link = get_sub_field('service_link');

								if( $link ): ?>
									
									<a href="<?php echo $link['url']; ?>">
										<?php echo $link['title']; ?>
									</a>
								
								<?php endif; ?>

							</div> 

						<?php endwhile;  ?>

					<?php else : ?>

						<p>Our approach is tried and tested</p>

					<?php endif;
				?>

			</section> <!-- end services -->

			<section class="page-contact"> <!-- page contact section -->

				<?php if( get_field('contact_body') ): ?>
					<h4><?php the_field('contact_body'); ?></h4>
				<?php endif;

				$link = get_field('contact_link');

				if( $link ): ?>
					
					<a href="<?php echo $link['url']; ?>">
						<?php echo $link['title']; ?>
					</a>
				
				<?php endif; ?>

			</section> <!-- end page contact -->

		</div> <!-- end services container -->

			<?php endif; ?> 

		<!-- End Services Custom Fields -->


		<!-- Our Work Custom Fields -->

		<?php if( is_page( 'Our Work' ) ) : ?>

		<div class="our-work"> <!-- our work container -->

			<section class="work-header"> <!-- work header -->

				<?php $image = get_field('work_header_picture'); ?> <!-- desktop work header image -->

				<div class="picture-header" style="background: url(<?php echo $image['url']; ?>) no-repeat center center; background-size:cover">

					<?php if( get_field('work_header_title') ): ?>
						<h1 class="header-title"><?php the_field('work_header_title'); ?></h1>
					<?php endif;
					
					if( get_field('work_header_tagline') ): ?>
						<p class="header-tagline"><?php the_field('work_header_tagline'); ?></p>
					<?php endif; ?>

				</div> <!-- end desktop work header image -->

				<?php $imagem = get_field('work_header_picture_mobile'); ?>  <!-- mobile work header image -->

				<div class="picture-header-mobile" style="background: url(<?php echo $imagem['url']; ?>) no-repeat center center; background-size:cover">

					<?php if( get_field('work_header_title') ): ?>
						<h1 class="header-title"><?php the_field('work_header_title'); ?></h1>
					<?php endif;

					if( get_field('work_header_tagline') ): ?>
						<p class="header-tagline"><?php the_field('work_header_tagline'); ?></p>
					<?php endif; ?>

				</div> <!-- end mobile work header image -->

			</section> <!-- end work header -->

			<section class="work-web-block"> <!-- work web design -->

				<?php $image = get_field('work_web_picture'); ?>
				<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">

				<div class="work-web-design">

					<?php if( get_field('work_web_design_title') ): ?>
						<h2 class="work-title"><?php the_field('work_web_design_title'); ?></h2>
					<?php endif;

					if( get_field('work_web_design_description') ): ?>
						<p class="work-description"><?php the_field('work_web_design_description'); ?></p>
					<?php endif; 

					$link = get_field('work_page_link');

					if( $link ): ?>
						
						<a href="<?php echo $link['url']; ?>">
							<?php echo $link['title']; ?>
						</a>
					
					<?php endif; ?>

				</div>

			</section> <!-- end work web design -->

			<section class="work-studies-block"> <!-- work case studies -->

				<div class="work-case-study">

					<?php if( get_field('work_studies_title') ): ?>
						<h2 class="studies-title"><?php the_field('work_studies_title'); ?></h2>
					<?php endif;

					if( get_field('work_studies_description') ): ?>
						<p class="studies-description"><?php the_field('work_studies_description'); ?></p>
					<?php endif; 

					$link = get_field('case_studies_link');

					if( $link ): ?>
						
						<a href="<?php echo $link['url']; ?>">
							<?php echo $link['title']; ?>
						</a>
					
					<?php endif; ?>

				</div>

				<?php $image = get_field('work_studies_picture'); ?>
				<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">

			</section> <!-- end work case studies -->

			<section class="page-contact"> <!-- page contact section -->

				<?php if( get_field('contact_body') ): ?>
					<h4><?php the_field('contact_body'); ?></h4>
				<?php endif;

				$link = get_field('contact_link');

				if( $link ): ?>
					
					<a href="<?php echo $link['url']; ?>">
						<?php echo $link['title']; ?>
					</a>
				
				<?php endif; ?>

			</section> <!-- end page contact -->

		</div> <!-- end our work container -->

		<?php endif; ?> 

		<!-- End Our Work Custom Fields -->


		<!-- About Custom Fields -->

		<?php if( is_page( 'About' ) ) : ?>

		<div class="about"> <!-- about container -->

			<section class="about-header"> <!-- about header -->

				<?php $image = get_field('about_header_picture'); ?> <!-- desktop about header image -->

				<div class="picture-header" style="background: url(<?php echo $image['url']; ?>) no-repeat 0% 100%; background-size:cover">

					<?php if( get_field('about_header_title') ): ?>
						<h1 class="header-title"><?php the_field('about_header_title'); ?></h1>
					<?php endif;

					if( get_field('about_header_tagline') ): ?>
						<p class="header-tagline"><?php the_field('about_header_tagline'); ?></p>
					<?php endif; ?>

				</div> <!-- end desktop about header image -->

				<?php $imagem = get_field('about_header_picture_mobile'); ?> <!-- mobile about header image -->

				<div class="picture-header-mobile" style="background: url(<?php echo $imagem['url']; ?>) no-repeat 0% 100%; background-size:cover">

					<?php if( get_field('about_header_title') ): ?>
						<h1 class="header-title"><?php the_field('about_header_title'); ?></h1>
					<?php endif;

					if( get_field('about_header_tagline') ): ?>
						<p class="header-tagline"><?php the_field('about_header_tagline'); ?></p>
					<?php endif; ?>

				</div> <!-- end mobile about header image -->

			</section> <!-- end about header -->

			<section class="page-intro"> <!-- about intro text -->

				<?php if( get_field('about_intro_heading') ): ?>
					<h2><?php the_field('about_intro_heading'); ?></h2>
				<?php endif; ?>

				<?php if( get_field('about_intro_description') ): ?>
					<p><?php the_field('about_intro_description'); ?></p>
				<?php endif; ?>

			</section> <!-- end about intro -->

			<section class="about-gallery"> <!-- about picture gallery -->

				<?php $image = get_field('about_gallery'); ?>
				<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">

			</section> <!-- end about picture gallery -->

			<section class="team"> <!-- about team -->

				<?php $image = get_field('team_header_image'); ?>

				<div class="team-header" style="background-image: url(<?php echo $image['url']; ?>); repeat center center; background-size:cover">

					<?php if( get_field('about_team_header') ): ?>
						<h3><?php the_field('about_team_header'); ?></h3>
					<?php endif; ?>

				</div>

				<div class="team-members">

					<?php 
						if( have_rows('team_members') ): ?>

							<?php while ( have_rows('team_members') ) : the_row(); ?>

								<div class="individual-member"> 

									<?php $image = get_sub_field('member_image'); ?>
									<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">

									<?php if( get_sub_field('member_name') ): ?>
										<p class="member-name"><?php the_sub_field('member_name'); ?></p>
									<?php endif;

									if( get_sub_field('member_position') ): ?>
										<p class="member-position"><?php the_sub_field('member_position'); ?></p>
									<?php endif; ?>
									
								</div> 

							<?php endwhile;  ?>

						<?php else : ?>

							<p>Our approach is tried and tested</p>

						<?php endif;
					?>

				</div>

			</section> <!-- end about team -->

			<section class="page-contact"> <!-- page contact section -->

				<?php if( get_field('contact_body') ): ?>
					<h4><?php the_field('contact_body'); ?></h4>
				<?php endif;

				$link = get_field('contact_link');

				if( $link ): ?>
					
					<a href="<?php echo $link['url']; ?>">
						<?php echo $link['title']; ?>
					</a>
				
				<?php endif; ?>

			</section> <!-- end page contact -->

		</div> <!-- about container -->

		<?php endif; ?>

		<!-- End About Custom Fields -->


		<!-- Contact Custom Fields -->

		<?php if( is_page( 'Contact' ) ) : ?>

		<div class="contact"> <!-- contact container -->

			<section class="contact-header"> <!-- contact header -->

					<?php if( get_field('contact_header_title') ): ?>
						<h1 class="header-title"><?php the_field('contact_header_title'); ?></h1>
					<?php endif;

					if( get_field('contact_header_tagline') ): ?>
						<p class="header-tagline"><?php the_field('contact_header_tagline'); ?></p>
					<?php endif; ?>

			</section> <!-- end contact header -->

			<section class="contact-section"> <!-- contact now container -->

				<div class="contact-form">

					<?php if( get_field('contact_form_heading') ): ?>
						<h3><?php the_field('contact_form_heading'); ?></h3>
					<?php endif;

					if( get_field('contact_form_shortcode') ): ?>
						<div class="form"><?php the_field('contact_form_shortcode'); ?></div>
					<?php endif; ?>
					
				</div>

				<div class="contact-info">

					<?php if( get_field('contact_information') ): ?>
						<div class="form"><?php the_field('contact_information'); ?></div>
					<?php endif; ?>

				</div>

			</section> <!-- end contact now container -->

			<section class="contact-newsletter"> <!-- contact newsletter -->

				<?php if( get_field('contact_newsletter_heading') ): ?>
					<h4><?php the_field('contact_newsletter_heading'); ?></h4>
				<?php endif;

				if( get_field('contact_newsletter_tagline') ): ?>
					<p class="newsletter-tag"><?php the_field('contact_newsletter_tagline'); ?></p>
				<?php endif;

				if( get_field('contact_newsletter_shortcode') ): ?>
					<div><?php the_field('contact_newsletter_shortcode'); ?></div>
				<?php endif; ?>

			</section> <!-- end contact newsletter -->

		</div> <!-- end contact container -->

		<?php endif; ?>

		<!-- End Contact Custom Fields -->


		<!-- SEO Page Custom Fields -->

		<?php if( is_page( 'SEO' ) ) : ?>

		<div class="seo-page"> <!-- seo page container -->

			<section class="seo-header"> <!-- seo page header -->

				<?php $image = get_field('seo_header_picture'); ?> <!-- desktop seo header image -->

				<div class="picture-header" style="background: url(<?php echo $image['url']; ?>) no-repeat center center; background-size:cover">

					<?php if( get_field('seo_header_title') ): ?>
						<h1 class="header-title"><?php the_field('seo_header_title'); ?></h1>
					<?php endif;

					if( get_field('seo_header_tagline') ): ?>
						<p class="header-tagline"><?php the_field('seo_header_tagline'); ?></p>
					<?php endif; ?>

				</div> <!-- end desktop seo header image -->

				<?php $imagem = get_field('seo_header_picture_mobile'); ?> <!-- mobile seo header image -->

				<div class="picture-header-mobile" style="background: url(<?php echo $imagem['url']; ?>) no-repeat center center; background-size:cover">

					<?php if( get_field('seo_header_title') ): ?>
						<h1 class="header-title"><?php the_field('seo_header_title'); ?></h1>
					<?php endif;

					if( get_field('seo_header_tagline') ): ?>
						<p class="header-tagline"><?php the_field('seo_header_tagline'); ?></p>
					<?php endif; ?>

				</div> <!-- end mobile seo header image -->

			</section> <!-- end seo page header -->

			<section class="service-pages-intro"> <!-- seo text and picture intro -->

				<div class="service-pages-intro-text">

					<?php if( get_field('seo_heading_1') ): ?>
						<h3><?php the_field('seo_heading_1'); ?></h3>
					<?php endif;

					if( get_field('seo_content_1') ): ?>
						<p><?php the_field('seo_content_1'); ?></p>
					<?php endif;

					if( get_field('seo_heading_2') ): ?>
						<h3><?php the_field('seo_heading_2'); ?></h3>
					<?php endif;

					if( get_field('seo_content_2') ): ?>
						<p><?php the_field('seo_content_2'); ?></p>
					<?php endif; ?>

				</div>

				<div class="service-pages-intro-img">
					<?php $image = get_field('seo_intro_image'); ?>
						<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
				</div>

			</section> <!-- end seo text picture intro -->

			<section class="seo-service-list"> <!-- list of seo services -->

				<?php if( get_field('seo_service_heading') ): ?>
					<h2><?php the_field('seo_service_heading'); ?></h2>
				<?php endif; ?>

				<div class="list">

					<ul class="column-1">

						<?php 
							if( have_rows('seo_column_1') ):

								while ( have_rows('seo_column_1') ) : the_row(); 

									if( get_sub_field('seo_list_item') ): ?>
										<li class="seo-list-item"><i class="fas fa-check"></i> <?php the_sub_field('seo_list_item'); ?></li>
									<?php endif;

								endwhile;  ?>

							<?php else : ?>

								<p>Our approach is tried and tested</p>

							<?php endif;
						?>
						
					</ul>

					<ul class="column-2">

						<?php 
							if( have_rows('seo_column_2') ):

								while ( have_rows('seo_column_2') ) : the_row(); 

									if( get_sub_field('seo_list_item') ): ?>
										<li class="seo-list-item"><i class="fas fa-check"></i> <?php the_sub_field('seo_list_item'); ?></li>
									<?php endif;

								endwhile;  ?>

							<?php else : ?>

								<p>Our approach is tried and tested</p>

							<?php endif;
						?>

					</ul>

					<ul class="column-3">

						<?php 
							if( have_rows('seo_column_3') ):

								while ( have_rows('seo_column_3') ) : the_row(); 

									if( get_sub_field('seo_list_item') ): ?>
										<li class="seo-list-item"><i class="fas fa-check"></i> <?php the_sub_field('seo_list_item'); ?></li>
									<?php endif;

								endwhile;  ?>

							<?php else : ?>

								<p>Our approach is tried and tested</p>

							<?php endif;
						?>

					</ul>
				
				</div>

			</section> <!-- end list of seo services -->

			<section class="page-contact"> <!-- page contact section -->

				<?php if( get_field('contact_body') ): ?>
					<h4><?php the_field('contact_body'); ?></h4>
				<?php endif;

				$link = get_field('contact_link');

				if( $link ): ?>
					
					<a href="<?php echo $link['url']; ?>">
						<?php echo $link['title']; ?>
					</a>
				
				<?php endif; ?>

			</section> <!-- end page contact -->

		</div> <!-- end seo page container -->

		<?php endif; ?>

		<!-- End SEO Page Custom Fields -->


		<!-- Ads Page Custom Fields -->

		<?php if( is_page( 'Ads' ) ) : ?>

		<div class="ads-page"> <!-- ads page container -->

			<section class="ads-header"> <!-- ads page header -->

				<?php $image = get_field('ads_header_picture'); ?> <!-- desktop ads header image -->

				<div class="picture-header" style="background: url(<?php echo $image['url']; ?>) no-repeat center center; background-size:cover">

					<?php if( get_field('ads_header_title') ): ?>
						<h1 class="header-title"><?php the_field('ads_header_title'); ?></h1>
					<?php endif;

					if( get_field('ads_header_tagline') ): ?>
						<p class="header-tagline"><?php the_field('ads_header_tagline'); ?></p>
					<?php endif; ?>

				</div> <!-- end desktop ads header image -->

				<?php $imagem = get_field('ads_header_picture_mobile'); ?> <!-- mobile ads header image -->

				<div class="picture-header-mobile" style="background: url(<?php echo $imagem['url']; ?>) no-repeat center center; background-size:cover">

					<?php if( get_field('ads_header_title') ): ?>
						<h1 class="header-title"><?php the_field('ads_header_title'); ?></h1>
					<?php endif;

					if( get_field('ads_header_tagline') ): ?>
						<p class="header-tagline"><?php the_field('ads_header_tagline'); ?></p>
					<?php endif; ?>

				</div> <!-- end mobile ads header image -->

			</section> <!-- end ads page header -->

			<section class="service-pages-intro"> <!-- ads text and picture intro -->

				<div class="service-pages-intro-text">

					<?php if( get_field('ads_heading_1') ): ?>
						<h3><?php the_field('ads_heading_1'); ?></h3>
					<?php endif;

					if( get_field('ads_content_1') ): ?>
						<p><?php the_field('ads_content_1'); ?></p>
					<?php endif; ?>

				</div>

				<div class="service-pages-intro-img">
					<?php $image = get_field('ads_intro_image'); ?>
						<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
				</div>

			</section> <!-- end ads text picture intro -->

			<section class="ads-list"> <!-- list of ads -->

				<?php if( get_field('ads_list_heading') ): ?>
					<h3><?php the_field('ads_list_heading'); ?></h3>
				<?php endif;

					if( have_rows('ad_services') ):

						while ( have_rows('ad_services') ) : the_row(); ?>

						<div class="individual-ad-service">

							<?php $image = get_sub_field('ad_intro_image'); ?>
								<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>"> 

							<div>
								<?php if( get_sub_field('ad_service_title') ): ?>
									<h2 class="ad-service-title"><?php the_sub_field('ad_service_title'); ?></h2>
								<?php endif; ?>
								<?php if( get_sub_field('ad_service_content') ): ?>
									<p class="ad-service-content"><?php the_sub_field('ad_service_content'); ?></p>
								<?php endif; ?>
							</div>

						</div>

						<?php endwhile;  ?>

					<?php else : ?>

						<p>Our approach is tried and tested</p>

					<?php endif;
				?>

			</section> <!-- end ads list -->

			<section class="page-contact"> <!-- page contact section -->

				<?php if( get_field('contact_body') ): ?>
					<h4><?php the_field('contact_body'); ?></h4>
				<?php endif;

				$link = get_field('contact_link');

				if( $link ): ?>
					
					<a href="<?php echo $link['url']; ?>">
						<?php echo $link['title']; ?>
					</a>
				
				<?php endif; ?>

			</section> <!-- end page contact -->

		</div> <!-- end ads page container -->

		<?php endif; ?>

		<!-- End Ads Page Custom Fields -->


		<!-- Email Marketing Page Custom Fields -->

		<?php if( is_page( 'Email Marketing' ) ) : ?>

		<div class="email-page"> <!-- email page container -->

			<section class="email-header"> <!-- email page header -->

				<?php $image = get_field('email_header_picture'); ?> <!-- desktop email header image -->

				<div class="picture-header" style="background: url(<?php echo $image['url']; ?>) no-repeat center center; background-size:cover">

					<?php if( get_field('email_header_title') ): ?>
						<h1 class="header-title"><?php the_field('email_header_title'); ?></h1>
					<?php endif;

					if( get_field('email_header_tagline') ): ?>
						<p class="header-tagline"><?php the_field('email_header_tagline'); ?></p>
					<?php endif; ?>

				</div> <!-- end desktop email header image -->

				<?php $imagem = get_field('email_header_picture_mobile'); ?> <!-- mobile email header image -->

				<div class="picture-header-mobile" style="background: url(<?php echo $imagem['url']; ?>) no-repeat center center; background-size:cover">

					<?php if( get_field('email_header_title') ): ?>
						<h1 class="header-title"><?php the_field('email_header_title'); ?></h1>
					<?php endif;

					if( get_field('email_header_tagline') ): ?>
						<p class="header-tagline"><?php the_field('email_header_tagline'); ?></p>
					<?php endif; ?>

				</div> <!-- end mobile email header image -->

			</section> <!-- end email page header -->

			<section class="service-pages-intro"> <!-- email text and picture intro -->

				<div class="service-pages-intro-text">
					<?php if( get_field('email_heading_1') ): ?>
						<h3><?php the_field('email_heading_1'); ?></h3>
					<?php endif;
					if( get_field('email_content_1') ): ?>
						<p><?php the_field('email_content_1'); ?></p>
					<?php endif; ?>
				</div>

				<div class="service-pages-intro-img">
					<?php $image = get_field('email_intro_image'); ?>
						<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
				</div>

			</section> <!-- end email text picture intro -->

			<section class="page-contact"> <!-- page contact section -->

				<?php if( get_field('contact_body') ): ?>
					<h4><?php the_field('contact_body'); ?></h4>
				<?php endif;

				$link = get_field('contact_link');

				if( $link ): ?>
					
					<a href="<?php echo $link['url']; ?>">
						<?php echo $link['title']; ?>
					</a>
				
				<?php endif; ?>

			</section> <!-- end page contact -->

		</div> <!-- end email page container -->

		<?php endif; ?>

		<!-- End Email Marketing Page Custom Fields -->
		
		<!-- Content Marketing Page Custom Fields -->

		<?php if( is_page( 'Content Marketing' ) ) : ?>

		<div class="content-page"> <!-- content page container -->

			<section class="content-header"> <!-- content page header -->

				<?php $image = get_field('content_header_picture'); ?> <!-- desktop content header image -->

				<div class="picture-header" style="background: url(<?php echo $image['url']; ?>) no-repeat center center; background-size:cover">

					<?php if( get_field('content_header_title') ): ?>
						<h1 class="header-title"><?php the_field('content_header_title'); ?></h1>
					<?php endif;

					if( get_field('content_header_tagline') ): ?>
						<p class="header-tagline"><?php the_field('content_header_tagline'); ?></p>
					<?php endif; ?>

				</div> <!-- end desktop content header image -->

				<?php $imagem = get_field('content_header_picture_mobile'); ?> <!-- mobile content header image -->

				<div class="picture-header-mobile" style="background: url(<?php echo $imagem['url']; ?>) no-repeat center center; background-size:cover">

					<?php if( get_field('content_header_title') ): ?>
						<h1 class="header-title"><?php the_field('content_header_title'); ?></h1>
					<?php endif;

					if( get_field('content_header_tagline') ): ?>
						<p class="header-tagline"><?php the_field('content_header_tagline'); ?></p>
					<?php endif; ?>

				</div> <!-- end mobile content header image -->

			</section> <!-- end content page header -->

			<section class="service-pages-intro"> <!-- content text and picture intro -->

				<div class="service-pages-intro-text">

					<?php if( get_field('content_heading_1') ): ?>
						<h3><?php the_field('content_heading_1'); ?></h3>
					<?php endif;

					if( get_field('content_content_1') ): ?>
						<p><?php the_field('content_content_1'); ?></p>
					<?php endif; ?>

				</div>

				<div class="service-pages-intro-img">
					<?php $image = get_field('content_intro_image'); ?>
						<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
				</div>

			</section> <!-- end content text picture intro -->

			<section class="page-contact"> <!-- page contact section -->

				<?php if( get_field('contact_body') ): ?>
					<h4><?php the_field('contact_body'); ?></h4>
				<?php endif;

				$link = get_field('contact_link');

				if( $link ): ?>
					
					<a href="<?php echo $link['url']; ?>">
						<?php echo $link['title']; ?>
					</a>
				
				<?php endif; ?>

			</section> <!-- end page contact -->

		</div> <!-- end content page container -->

		<?php endif; ?>

		<!-- End Content Marketing Page Custom Fields -->


		<!-- Visual Page Custom Fields -->

		<?php if( is_page( 'Visual Branding' ) ) : ?>

		<div class="visual-page"> <!-- visual page container -->

			<section class="visual-header"> <!-- visual page header -->

				<?php $image = get_field('visual_header_picture'); ?> <!-- desktop visual header image -->

				<div class="picture-header" style="background: url(<?php echo $image['url']; ?>) no-repeat center center; background-size:cover">

					<?php if( get_field('visual_header_title') ): ?>
						<h1 class="header-title"><?php the_field('visual_header_title'); ?></h1>
					<?php endif;

					if( get_field('visual_header_tagline') ): ?>
						<p class="header-tagline"><?php the_field('visual_header_tagline'); ?></p>
					<?php endif; ?>

				</div> <!-- end desktop visual header image -->

				<?php $imagem = get_field('visual_header_picture_mobile'); ?> <!-- mobile ads header image -->

				<div class="picture-header-mobile" style="background: url(<?php echo $imagem['url']; ?>) no-repeat center center; background-size:cover">

					<?php if( get_field('visual_header_title') ): ?>
						<h1 class="header-title"><?php the_field('visual_header_title'); ?></h1>
					<?php endif;

					if( get_field('visual_header_tagline') ): ?>
						<p class="header-tagline"><?php the_field('visual_header_tagline'); ?></p>
					<?php endif; ?>

				</div> <!-- end mobile visual header image -->

			</section> <!-- end visual page header -->

			<section class="service-pages-intro"> <!-- visual text and picture intro -->

				<div class="service-pages-intro-text">

					<?php if( get_field('visual_heading_1') ): ?>
						<h3><?php the_field('visual_heading_1'); ?></h3>
					<?php endif;

					if( get_field('visual_content_1') ): ?>
						<p><?php the_field('visual_content_1'); ?></p>
					<?php endif; ?>

				</div>

				<div class="service-pages-intro-img">
					<?php $image = get_field('visual_intro_image'); ?>
						<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
				</div>

			</section> <!-- end visual text picture intro -->

			<section class="visual-list"> <!-- list of visual -->

				<?php if( get_field('visual_list_heading') ): ?>
					<h3><?php the_field('visual_list_heading'); ?></h3>
				<?php endif;

					if( have_rows('visual_services') ):

						while ( have_rows('visual_services') ) : the_row(); ?>

						<div class="individual-visual-service">

							<?php $image = get_sub_field('visual_service_image'); ?>
								<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>"> 

							<div>

								<?php if( get_sub_field('visual_service_title') ): ?>
									<h2><?php the_sub_field('visual_service_title'); ?></h2>
								<?php endif;

								if( get_sub_field('visual_service_content') ): ?>
									<p><?php the_sub_field('visual_service_content'); ?></p>
								<?php endif; ?>

							</div>

						</div>

						<?php endwhile;  ?>

					<?php else : ?>

						<p>Our approach is tried and tested</p>

					<?php endif;
				?>

				</div>

			</section> <!-- end visual list -->

			<section class="page-contact"> <!-- page contact section -->

				<?php if( get_field('contact_body') ): ?>
					<h4><?php the_field('contact_body'); ?></h4>
				<?php endif;

				$link = get_field('contact_link');

				if( $link ): ?>
					
					<a href="<?php echo $link['url']; ?>">
						<?php echo $link['title']; ?>
					</a>
				
				<?php endif; ?>

			</section> <!-- end page contact -->

		</div> <!-- end visual page container -->

		<?php endif; ?>

		<!-- End Visual Page Custom Fields -->


		<!-- Social Page Custom Fields -->

		<?php if( is_page( 'Social Media Management' ) ) : ?>

		<div class="social-page"> <!-- social page container -->

			<section class="social-header"> <!-- social page header -->

				<?php $image = get_field('social_header_picture'); ?> <!-- desktop social header image -->

				<div class="picture-header" style="background: url(<?php echo $image['url']; ?>) no-repeat center center; background-size:cover">
				
					<?php if( get_field('social_header_title') ): ?>
						<h1 class="header-title"><?php the_field('social_header_title'); ?></h1>
					<?php endif;

					if( get_field('social_header_tagline') ): ?>
						<p class="header-tagline"><?php the_field('social_header_tagline'); ?></p>
					<?php endif; ?>

				</div> <!-- end desktop social header image -->

				<?php $imagem = get_field('social_header_picture_mobile'); ?> <!-- mobile social header image -->

				<div class="picture-header-mobile" style="background: url(<?php echo $imagem['url']; ?>) no-repeat center center; background-size:cover">

					<?php if( get_field('social_header_title') ): ?>
						<h1 class="header-title"><?php the_field('social_header_title'); ?></h1>
					<?php endif;

					if( get_field('social_header_tagline') ): ?>
						<p class="header-tagline"><?php the_field('social_header_tagline'); ?></p>
					<?php endif; ?>

				</div> <!-- end mobile social header image -->

			</section> <!-- end social page header -->

			<section class="service-pages-intro"> <!-- social text and picture intro -->

				<div class="service-pages-intro-text">

					<?php if( get_field('social_heading_1') ): ?>
						<h3><?php the_field('social_heading_1'); ?></h3>
					<?php endif;

					if( get_field('social_content_1') ): ?>
						<p><?php the_field('social_content_1'); ?></p>
					<?php endif;

					if( get_field('social_heading_2') ): ?>
						<h3><?php the_field('social_heading_2'); ?></h3>
					<?php endif;

					if( get_field('social_content_2') ): ?>
						<p><?php the_field('social_content_2'); ?></p>
					<?php endif; ?>

				</div>

				<div class="service-pages-intro-img">
					<?php $image = get_field('social_intro_image'); ?>
						<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
				</div>

			</section> <!-- end social text picture intro -->

			<section class="page-contact"> <!-- page contact section -->

				<?php if( get_field('contact_body') ): ?>
					<h4><?php the_field('contact_body'); ?></h4>
				<?php endif;

				$link = get_field('contact_link');

				if( $link ): ?>
					
					<a href="<?php echo $link['url']; ?>">
						<?php echo $link['title']; ?>
					</a>
				
				<?php endif; ?>

			</section> <!-- end page contact -->

		</div> <!-- end social page container -->

		<?php endif; ?>

		<!-- End Social Page Custom Fields -->


		<!-- Design Page Custom Fields -->

		<?php if( is_page( 'Web Design' ) ) : ?>

		<div class="design-page"> <!-- design page container -->

			<section class="design-header"> <!-- design page header -->

				<?php $image = get_field('design_header_picture'); ?> <!-- desktop design header image -->

				<div class="picture-header" style="background: url(<?php echo $image['url']; ?>) no-repeat center center; background-size:cover">

					<?php if( get_field('design_header_title') ): ?>
						<h1 class="header-title"><?php the_field('design_header_title'); ?></h1>
					<?php endif;

					if( get_field('design_header_tagline') ): ?>
						<p class="header-tagline"><?php the_field('design_header_tagline'); ?></p>
					<?php endif; ?>

				</div> <!-- end desktop design header image -->

				<?php $imagem = get_field('design_header_picture_mobile'); ?> <!-- mobile design header image -->

				<div class="picture-header-mobile" style="background: url(<?php echo $imagem['url']; ?>) no-repeat center center; background-size:cover">

					<?php if( get_field('design_header_title') ): ?>
						<h1 class="header-title"><?php the_field('design_header_title'); ?></h1>
					<?php endif;

					if( get_field('design_header_tagline') ): ?>
						<p class="header-tagline"><?php the_field('design_header_tagline'); ?></p>
					<?php endif; ?>

				</div> <!-- end mobile design header image -->

			</section> <!-- end design page header -->

			<section class="service-pages-intro"> <!-- design text and picture intro -->

				<div class="service-pages-intro-text">

					<?php if( get_field('design_heading_1') ): ?>
						<h3><?php the_field('design_heading_1'); ?></h3>
					<?php endif;

					if( get_field('design_content_1') ): ?>
						<p><?php the_field('design_content_1'); ?></p>
					<?php endif;

					$link = get_field('design_link');

					if( $link ): ?>
						
						<a href="<?php echo $link['url']; ?>">
							<?php echo $link['title']; ?>
						</a>
					
					<?php endif; ?>

				</div>

				<div class="service-pages-intro-img">
					<?php $image = get_field('design_intro_image'); ?>
						<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
				</div>

			</section> <!-- end design text picture intro -->

			<section class="page-contact"> <!-- page contact section -->

				<?php if( get_field('contact_body') ): ?>
					<h4><?php the_field('contact_body'); ?></h4>
				<?php endif;

				$link = get_field('contact_link');

				if( $link ): ?>
					
					<a href="<?php echo $link['url']; ?>">
						<?php echo $link['title']; ?>
					</a>
				
				<?php endif; ?>

			</section> <!-- end page contact -->

		</div> <!-- end design page container -->

		<?php endif; ?>

		<!-- End Design Page Custom Fields -->


		<!-- Web Design Examples Custom Fields -->

		<?php if( is_page( 'Web Development' ) ) : ?>

		<div class="design-examples"> <!-- design examples container -->

			<section class="design-header"> <!-- design examples header -->

				<?php $image = get_field('design_header_picture'); ?> <!-- desktop design header image -->

				<div class="picture-header" style="background: url(<?php echo $image['url']; ?>) no-repeat center center; background-size:cover">

					<?php if( get_field('design_header_title') ): ?>
						<h1 class="header-title"><?php the_field('design_header_title'); ?></h1>
					<?php endif;

					if( get_field('design_header_tagline') ): ?>
						<p class="header-tagline"><?php the_field('design_header_tagline'); ?></p>
					<?php endif; ?>

				</div> <!-- end desktop design header image -->

				<?php $imagem = get_field('design_header_picture_mobile'); ?> <!-- mobile design examples header image -->

				<div class="picture-header-mobile" style="background: url(<?php echo $imagem['url']; ?>) no-repeat center center; background-size:cover">

					<?php if( get_field('design_header_title') ): ?>
						<h1 class="header-title"><?php the_field('design_header_title'); ?></h1>
					<?php endif;

					if( get_field('design_header_tagline') ): ?>
						<p class="header-tagline"><?php the_field('design_header_tagline'); ?></p>
					<?php endif; ?>

				</div> <!-- end mobile design examples header image -->

			</section> <!-- end design examples header -->

			<section class="development-intro"> <!-- social text and picture intro -->

					<?php if( get_field('development_heading_1') ): ?>
						<h3><?php the_field('development_heading_1'); ?></h3>
					<?php endif;

					if( get_field('development_content_1') ): ?>
						<p><?php the_field('development_content_1'); ?></p>
					<?php endif; ?>

			</section> <!-- end social text picture intro -->

			<section class="design-block"> <!-- begin design websites -->

				<?php 
					if( have_rows('design_examples') ):

						while ( have_rows('design_examples') ) : the_row(); ?>

							<div class="website">

								<?php 

								$link = get_sub_field('link');

								if( $link ): ?>
									
									<a class="website-link" href="<?php echo $link; ?>" target="_blank">

										<?php $image = get_sub_field('design_image'); ?>
										<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">

									</a>

								<?php endif; ?>

								<div class="website-info">

									<?php if( get_sub_field('website_name') ): ?>
										<h5><?php the_sub_field('website_name'); ?></h5>
									<?php endif;

									if( get_sub_field('website_description') ): ?>
										<p><?php the_sub_field('website_description'); ?></p>
									<?php endif; ?>

								</div>

							</div>

						<?php endwhile;  

					else : ?>

						<p>Our approach is tried and tested</p>

					<?php endif;
				?>

			</section> <!-- end design websites -->

			<section class="page-contact"> <!-- page contact section -->

				<?php if( get_field('contact_body') ): ?>
					<h4><?php the_field('contact_body'); ?></h4>
				<?php endif;

				$link = get_field('contact_link');

				if( $link ): ?>
					
					<a href="<?php echo $link['url']; ?>">
						<?php echo $link['title']; ?>
					</a>
				
				<?php endif; ?>

			</section> <!-- end page contact -->

		</div> <!-- end design examples container -->

		<?php endif; ?>

		<!-- End Design Examples Custom Fields -->


		<!-- Case Studies Custom Fields -->

		<?php if( is_page( 'Case Studies' ) ) : ?>

		<div class="case-studies"> <!-- case studies container -->

			<section class="studies-header"> <!-- studies header -->

				<?php $image = get_field('studies_header_picture'); ?> <!-- studies desktop header image -->

				<div class="picture-header" style="background: url(<?php echo $image['url']; ?>) no-repeat center center; background-size:cover">

					<?php if( get_field('studies_header_title') ): ?>
						<h1 class="header-title"><?php the_field('studies_header_title'); ?></h1>
					<?php endif;

					if( get_field('studies_header_tagline') ): ?>
						<p class="header-tagline"><?php the_field('studies_header_tagline'); ?></p>
					<?php endif; ?>

				</div> <!-- end studies desktop image -->

				<?php $imagem = get_field('studies_mobile_header_picture'); ?> <!-- studies mobile header image -->

				<div class="picture-header-mobile" style="background: url(<?php echo $imagem['url']; ?>) no-repeat center center; background-size:cover">

					<?php if( get_field('studies_header_title') ): ?>
						<h1 class="title"><?php the_field('studies_header_title'); ?></h1>
					<?php endif;

					if( get_field('studies_header_tagline') ): ?>
						<p class="tagline"><?php the_field('studies_header_tagline'); ?></p>
					<?php endif; ?>

				</div> <!-- end studies mobile header image -->

			</section> <!-- end studies header -->

			<section class="studies-block"> <!-- begin case studies -->

				<?php 
					if( have_rows('case_studies') ): ?>

						<?php while ( have_rows('case_studies') ) : the_row(); ?>

							<div class="individual-case"> 

								<div class="individual-content">

									<?php if( get_sub_field('case_study_title') ): ?>
										<p class="study-title"><?php the_sub_field('case_study_title'); ?></p>
									<?php endif;

									if( get_sub_field('case_study_content') ): ?>
										<p class="study-description"><?php the_sub_field('case_study_content'); ?></p>
									<?php endif;
									
									$link = get_sub_field('case_study_link');

									if( $link ): ?>
										
										<a href="<?php echo $link['url']; ?>">
											<?php echo $link['title']; ?>
										</a>
									
									<?php endif; ?>

								</div>

								<div class="individual-image">
									<?php $image = get_sub_field('case_study_image'); ?>
									<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
								</div>

							</div> 

						<?php endwhile;  ?>

					<?php else : ?>

						<p>Our approach is tried and tested</p>

					<?php endif;
				?>

			</section> <!-- end case studies -->

			<section class="page-contact"> <!-- page contact section -->

				<?php if( get_field('contact_body') ): ?>
					<h4><?php the_field('contact_body'); ?></h4>
				<?php endif;

				$link = get_field('contact_link');

				if( $link ): ?>
					
					<a href="<?php echo $link['url']; ?>">
						<?php echo $link['title']; ?>
					</a>
				
				<?php endif; ?>

			</section> <!-- end page contact -->

		</div> <!-- end case studies container -->

		<?php endif; ?>

		<!-- End Case Studies Custom Fields -->

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

<?php
get_footer();
