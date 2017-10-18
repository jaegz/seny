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
 * @package safetyexecsny
 */

get_header(); ?>

	<section id="banner">
		<h2><?php the_title();?></h2>
	</section>

	<section id="main" class="container">
		<div class="box">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); the_content(); endwhile; endif; ?>
		</div>
	</section>

<?php
get_footer();
