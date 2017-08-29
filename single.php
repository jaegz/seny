<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package safetyexecsny
 */

get_header(); ?>

	<section id="banner">
		<h2><?php the_title(); ?></h2>
		<div class="entry-meta">
			<?php the_time('F jS, Y') ?>
		</div>
	</section>

	<section id="main" class="container">
		<div class="box">
		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', get_post_format() );

		endwhile; // End of the loop.
		?>
		</div>
	</section>

<?php
//get_sidebar();
get_footer();
