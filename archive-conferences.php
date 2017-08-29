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
	<h2>PROFESSIONAL DEVELOPMENT CONFERENCES</h2>
</section>

	<section id="main" class="container">
		<?php
		while ( have_posts() ) : the_post();
			?>
			<div class="box">
			<?php
			get_template_part( 'template-parts/content-excerpt--conference', get_post_format() );
			?>
			</div>
			<?php
		endwhile; // End of the loop.
		?>

		<nav class="pagination">
			<?php pagination_bar(); ?>
		</nav>
	</section>

<?php
get_footer();
