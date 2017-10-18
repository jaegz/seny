<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package safetyexecsny
 */

get_header(); ?>

	<section id="banner">
		<h2><?php the_title();?></h2>
	</section>

	<section id="main" class="container">
		<div class="box">

			<section class="error-404 not-found">
				<header class="page-header">
					<h2 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'safetyexecsny' ); ?></h2>
				</header><!-- .page-header -->

				<div class="page-content">
					<p><?php esc_html_e( 'It looks like nothing was found at this location.', 'safetyexecsny' ); ?></p>
				</div><!-- .page-content -->
			</section><!-- .error-404 -->
		</div>
	</section>

<?php
get_footer();
