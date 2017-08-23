<?php
/**
 * Template Name: Presentations Page
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package safetyexecsny
 */

get_header(); ?>

<section id="banner">
	<h2><?php the_title(); ?></h2>
</section>

	<section id="main" class="container">
		<div class="box">
		THIS IS THE PRESENTATION PAGE STUFF
		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', get_post_format() );

		endwhile; // End of the loop.
		?>
		</div>
	</section>

<?php
get_footer();
