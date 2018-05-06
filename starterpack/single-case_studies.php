<?php
/**
 * The template for displaying all case studies
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

			<!-- Individual Case Studies Custom Fields -->
			
            <div class="our-case-study-container"> <!-- our case study container -->

				<section class="our-case-study"> <!-- our case study header -->

					<?php $image = get_field('our_study_header_picture'); ?> <!-- desktop our case study header picture -->

					<div class="picture-header" style="background: url(<?php echo $image['url']; ?>) no-repeat center center; background-size:cover">

						<?php if( get_field('our_study_header_title') ): ?>
							<h1 class="study-header-title"><?php the_field('our_study_header_title'); ?></h1>
						<?php endif;

						if( get_field('our_study_header_tagline') ): ?>
							<p class="study-header-tagline"><?php the_field('our_study_header_tagline'); ?></p>
						<?php endif; ?>

					</div> <!-- end desktop our case study header picture -->

					<?php $imagem = get_field('our_study_header_picture_mobile'); ?> <!-- mobile our case study header picture -->

					<div class="picture-header-mobile" style="background: url(<?php echo $imagem['url']; ?>) no-repeat center center; background-size:cover">

						<?php if( get_field('our_study_header_title') ): ?>
							<h1 class="study-header-title"><?php the_field('our_study_header_title'); ?></h1>
						<?php endif;

						if( get_field('our_study_header_tagline') ): ?>
							<p class="study-header-tagline"><?php the_field('our_study_header_tagline'); ?></p>
						<?php endif; ?>

					</div> <!-- end mobile our case study header picture-->

				</section> <!-- end our case study header -->

				<section class="studies-block">  <!-- case study intro -->

					<div class="individual-case">

						<div class="individual-content">

							<?php if( get_field('our_case_study_title') ): ?>
								<p class="study-title"><?php the_field('our_case_study_title'); ?></p>
							<?php endif;

							if( get_field('our_case_study_content') ): ?>
								<p class="study-description"><?php the_field('our_case_study_content'); ?></p>
							<?php endif; ?>

							<p class="study-roles-text">OUR ROLES:</p>

							<ul class="study-roles">
								
								<?php 
									if( have_rows('our_case_study_roles') ): ?>

										<?php while ( have_rows('our_case_study_roles') ) : the_row(); ?>

										<li><?php the_sub_field('case_study_role'); ?></li>

										<?php endwhile;  ?>

									<?php else : ?>

										<p>Our approach is tried and tested</p>

									<?php endif;
								?>

							</ul>

						</div>

						<div class="individual-image">
							<?php $image = get_field('our_case_study_image'); ?>
							<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
						</div>

					</div>

				</section> <!-- end case study intro -->

				<section class="case-study-achievements">

					<?php 
						if( have_rows('our_case_study_achievements') ): ?>

							<?php while ( have_rows('our_case_study_achievements') ) : the_row(); ?>

							<div class="achievement">

								<p class="achievement-stat"><?php the_sub_field('achievement_stat'); ?></p>

								<p class="achievement-text"><?php the_sub_field('achievement_text'); ?></p>

							</div>

							<?php endwhile;  ?>

						<?php else : ?>

							<p>Our approach is tried and tested</p>

						<?php endif;
					?>

				</section>

				<section class="case-study-testimonials"> <!-- case study testimonial -->

					<?php if( get_field('study_testimonial_quote') ): ?>
						<blockquote class="testimonial-quote"><?php the_field('study_testimonial_quote'); ?></blockquote>
					<?php endif; ?>

					<div class="testimonial-byline">

						<?php $image = get_field('study_testimonial_image'); ?>
							<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
						
						<div class="testimonial-author-info">

							<?php if( get_field('study_testimonial_name') ): ?>
								<p class="author-name"><?php the_field('study_testimonial_name'); ?></p>
							<?php endif;

							if( get_field('study_testimonial_position') ): ?>
								<p class="author-position"><?php the_field('study_testimonial_position'); ?></p>
							<?php endif; ?>

						</div>

					</div>

				</section> <!-- end case study testimonial -->


				<section class="study-challenge-solution-container"> <!-- case study challenge solution -->

					<div class="study-challenge-solution">	

						<?php if( get_field('study_challenge_solution_intro') ): ?>
							<h3 class="challenge-solution-intro"><?php the_field('study_challenge_solution_intro'); ?></h3>
						<?php endif; ?>

						<div class="study-challenge-section">

							<div class="study-challenge-text">

								<p class="challenge">Challenge</p>

								<?php if( get_field('study_challenge_content') ): ?>
									<p class="challenge-content"><?php the_field('study_challenge_content'); ?></p>
								<?php endif; ?>

							</div>

							<div class="study-challenge-image">

								<?php $image = get_field('study_challenge_image'); ?>
									<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
							
							</div>

						</div>

						<div class="study-solution-section">

							<p class="solution">Solution</p>

							<?php if( get_field('study_solution_content') ): ?>
								<p class="solution-content"><?php the_field('study_solution_content'); ?></p>
							<?php endif; ?>

						</div>

					</div>

				</section> <!-- end case study challenge solution -->

					<div class="parallax-img"></div>

				<section class="study-brand-images-container"> <!-- case study brand images -->

					<div class="study-brand-images">

						<?php 
							if( have_rows('study_brand_images') ): ?>

								<?php while ( have_rows('study_brand_images') ) : the_row();

								$image = get_sub_field('brand_image'); ?>
									<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">

								<?php endwhile;  ?>

							<?php else : ?>

								<p>Our approach is tried and tested</p>

							<?php endif;
						?>

					</div>

				</section> <!-- end case study brand images -->

				<section class="case-study-contact"> <!-- case study contact -->

					<div class="get-in-touch">

						<?php if( get_field('study_contact') ): ?>
							<h4><?php the_field('study_contact'); ?></h4>
						<?php endif; 

						$link = get_field('contact_link');

						if( $link ): ?>
							
							<a href="<?php echo $link['url']; ?>">
								<?php echo $link['title']; ?>
							</a>
						
						<?php endif; ?>

					</div>

					<?php if( get_field('study_contact_blurb') ): ?>
						<p class="contact-blurb"><?php the_field('study_contact_blurb'); ?></p>
					<?php endif; ?>

				</section> <!-- end case study contact -->

				<section class="case-study-performance-container">

					<div class="case-study-performance"> <!-- case study performance -->

						<?php if( get_field('study_performance_intro') ): ?>
							<h3><?php the_field('study_performance_intro'); ?></h3>
						<?php endif; 

						if( get_field('study_performance_content') ): ?>
							<p><?php the_field('study_performance_content'); ?></p>
						<?php endif;

						$image = get_field('study_performance_image'); ?>
							<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">

					</div> <!-- end case study performance -->

				</section>
				
			</div> <!-- end our case study container -->

			<!-- End Individual Case Studies -->

        </main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer(); ?>