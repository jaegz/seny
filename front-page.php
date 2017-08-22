<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package safetyexecsny
 */

get_header(); ?>

	<section id="banner">
		<h2>Founded in 1944 to further the progress of the safety professional and advance the theory and practice of safety management.</h2>
		<!--
		<ul class="actions">
			<li><a href="#" class="button special">Sign Up</a></li>
			<li><a href="#" class="button">Learn More</a></li>
		</ul>
		-->
	</section>

	<section id="main" class="container front-page">
		<section class="box two-col">
			<div class="main-col">
				<header>
					<h2>Latest News</h2>
				</header>

				<?php
				if ( have_posts() ) :

					if ( is_home() && ! is_front_page() ) : ?>
						<header>
							<h1 class="page-title screen-reader-text">
								<?php single_post_title(); ?>	
							</h1>
						</header>

					<?php
					endif;

					/* Start the Loop */
					while ( have_posts() ) : the_post();

						/*
						 * Include the Post-Format-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( 'template-parts/content-excerpt', get_post_format() );

					endwhile;

					the_posts_navigation();

				else :

					get_template_part( 'template-parts/content', 'none' );

				endif; ?>
			</div>

			<aside>
				<?php get_sidebar() ?>
			</aside>
		</section>

		<section class="box">
			<header>
				<h2>Who We Are</h2>
				<img src="" alt="">
				<p>add custom field</p>
			</header>
		</section>
	</section><!-- #primary -->

<?php
get_footer();
